<?php

namespace App\Entity;

use App\Core\Abstract\AbstractEntity;

class ClientEntity extends AbstractEntity
{
    private ?int $id = null;
    private string $nom;
    private string $prenom;
    private string $telephone;
    private string $adresse;
    private string $createdAt;
    private string $updatedAt;

    public function __construct()
    {
        $this->createdAt = date('Y-m-d H:i:s');
        $this->updatedAt = date('Y-m-d H:i:s');
    }

    // Getters
    public function getId(): ?int { return $this->id; }
    public function getNom(): string { return $this->nom; }
    public function getPrenom(): string { return $this->prenom; }
    public function getTelephone(): string { return $this->telephone; }
    public function getAdresse(): string { return $this->adresse; }
    public function getCreatedAt(): string { return $this->createdAt; }
    public function getUpdatedAt(): string { return $this->updatedAt; }

    // Setters
    public function setId(?int $id): self { $this->id = $id; return $this; }
    public function setNom(string $nom): self { $this->nom = $nom; return $this; }
    public function setPrenom(string $prenom): self { $this->prenom = $prenom; return $this; }
    public function setTelephone(string $telephone): self { $this->telephone = $telephone; return $this; }
    public function setAdresse(string $adresse): self { $this->adresse = $adresse; return $this; }

    public function getNomComplet(): string
    {
        return $this->prenom . ' ' . $this->nom;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'telephone' => $this->telephone,
            'adresse' => $this->adresse,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt
        ];
    }



    public static function toObject($data):static{

        $client =  new self(
           $data ['id'],
           $data['nom'],
           $data['prenom'],
           $data['telephone'],
           $data['adresse'],
           $data['create_at'],
           $data['updated_at']
        );

        return $client;
    }

}
