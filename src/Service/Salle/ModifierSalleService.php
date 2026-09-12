<?php
namespace App\Service\Salle;

use App\DTO\CreerSalleDTO;
use App\Repository\SalleRepositoryInterface;
use App\Exception\SalleIndisponibleException;

class ModifierSalleService
{
    public function __construct(
        private SalleRepositoryInterface $salleRepository
    ) {}

    public function execute(int $id, CreerSalleDTO $dto): void
    {
        $salleExistante = $this->salleRepository->retrouverParId($id);

        if (!$salleExistante) {
            throw new SalleIndisponibleException("Impossible de modifier : la salle demandée est introuvable.");
        }

        $this->salleRepository->mettreAJour($id, $dto);
    }
}