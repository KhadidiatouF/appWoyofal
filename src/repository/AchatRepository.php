<?php

use App\Core\Abstract\AbstractRepository;
use App\Entity\AchatEntity;

class AchatRepository extends AbstractRepository{

     public function __construct()
    {
        parent::__construct();
    }


    public function save(AchatEntity $achat): AchatEntity
    {
        $sql = "INSERT INTO achat (reference, numero_compteur, code_recharge, montant, nombre_kwh, tranche, prix_kwh, date_achat, heure_achat, created_at) 
                VALUES (:reference, :numero_compteur, :code_recharge, :montant, :nombre_kwh, :tranche, :prix_kwh, :date_achat, :heure_achat, :created_at)";
        
        $stmt = $this->pdo->prepare($sql);
        $data = $achat->toArray();
        unset($data['id']);
        
        $stmt->execute($data);
        $achat->setId($this->pdo->lastInsertId());
        
        return $achat;
    }

    public function findByReference(string $reference): ?AchatEntity
    {
        $sql = "SELECT * FROM achat WHERE reference = :reference";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':reference', $reference);
        $stmt->execute();
        
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        return $data ? new AchatEntity($data) : null;
    }

    public function findByCompteur(string $numeroCompteur, int $limit = 10): array
    {
        $sql = "SELECT * FROM compte WHERE numero_compteur = :numero ORDER BY created_at DESC LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':numero', $numeroCompteur);
        $stmt->bindParam(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        return array_map(fn($data) => new AchatEntity($data), $results);
    }



    
}