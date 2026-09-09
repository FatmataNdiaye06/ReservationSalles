<?php
namespace App\Repository;

use App\Model\Salle;
use Illuminate\Database\Eloquent\Collection;

class EloquentSalleRepository implements SalleRepositoryInterface
{
    public function listerSalles(): Collection
    {
        return Salle::all();
    }

    public function retrouverSalle(int $id): ?Salle
    {
        return Salle::find($id);
    }

    public function enregistrerSalle(array $data): Salle
    {
        return Salle::create($data);
    }
}