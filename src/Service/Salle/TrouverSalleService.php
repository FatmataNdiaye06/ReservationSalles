<?php
namespace App\Service\Salle;

use App\Repository\SalleRepositoryInterface;
use App\Exception\SalleIndisponibleException;

class TrouverSalleService
{
    public function __construct(
        private SalleRepositoryInterface $salleRepository
    ) {}

    public function execute(int $id)
    {
        $salle = $this->salleRepository->retrouverSalle($id);

        if (!$salle) {
            throw new SalleIndisponibleException("La salle demandée est introuvable.");
        }

        return $salle;
    }
}