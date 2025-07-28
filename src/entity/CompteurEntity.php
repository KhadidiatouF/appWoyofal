<?php

namespace App\Entity;

use App\Core\Abstract\AbstractEntity;

class CompteurEntity extends AbstractEntity
{
    private ?int $id = null;
    private string $numero;
    private int $clientId;
    private float $consommationMensuelle = 0.0;
    private string $dateResetTranche;
    private bool $actif = true;
    private string $createdAt;
    private string $updatedAt;

    public function __construct()
    {
        $this->dateResetTranche = date('Y-m-01'); // Premier du mois
        $this->createdAt = date('Y-m-d H:i:s');
        $this->updatedAt = date('Y-m-d H:i:s');
    }

    // Getters
    public function getId(): ?int { return $this->id; }
    public function getNumero(): string { return $this->numero; }
    public function getClientId(): int { return $this->clientId; }
    public function getConsommationMensuelle(): float { return $this->consommationMensuelle; }
    public function getDateResetTranche(): string { return $this->dateResetTranche; }
    public function isActif(): bool { return $this->actif; }
    public function getCreatedAt(): string { return $this->createdAt; }
    public function getUpdatedAt(): string { return $this->updatedAt; }

    // Setters
    public function setId(?int $id): self { $this->id = $id; return $this; }
    public function setNumero(string $numero): self { $this->numero = $numero; return $this; }
    public function setClientId(int $clientId): self { $this->clientId = $clientId; return $this; }
    public function setConsommationMensuelle(float $consommation): self { 
        $this->consommationMensuelle = $consommation; 
        $this->updatedAt = date('Y-m-d H:i:s');
        return $this; 
    }
    public function setDateResetTranche(string $date): self { $this->dateResetTranche = $date; return $this; }
    public function setActif(bool $actif): self { $this->actif = $actif; return $this; }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'numero' => $this->numero,
            'client_id' => $this->clientId,
            'consommation_mensuelle' => $this->consommationMensuelle,
            'date_reset_tranche' => $this->dateResetTranche,
            'actif' => $this->actif,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt
        ];
    }

    public static function toObject($data):static{

        $client =  new self(
           $data ['id'],
           $data['numero'],
           $data['client_id'],
           $data['consommation_mensuelle'],
           $data['date_reset_tranche'],
           $data['actif'],
           $data['created_at'],
           $data['updated_at']
        );

        return $client;
    }
}
