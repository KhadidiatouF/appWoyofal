<?php

namespace App\Service;

use App\Entity\AchatEntity;

interface IWoyofalService
{
    public function acheterCredit(string $numeroCompteur, float $montant): array;
    public function verifierCompteur(string $numeroCompteur): bool;
    public function calculerTranches(float $consommationActuelle, float $montant): array;
}
