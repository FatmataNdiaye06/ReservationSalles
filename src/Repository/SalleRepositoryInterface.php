<?php
namespace App\Repository;

use App\Model\Salle;
use Illuminate\Database\Eloquent\Collection;

interface SalleRepositoryInterface
{
    public function listerSalles(): Collection;
    public function retrouverSalle(int $id): ?Salle;
    public function enregistrerSalle(array $data): Salle;
}