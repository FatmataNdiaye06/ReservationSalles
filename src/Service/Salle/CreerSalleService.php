<?php
namespace App\Service\Salle;

use App\DTO\CreerSalleDTO;
use App\Repository\SalleRepositoryInterface;

class CreerSalleService
{
    public function __construct(
        private SalleRepositoryInterface $salleRepository
    ) {}

    public function execute(CreerSalleDTO $dto): void
    {
        $this->salleRepository->enregistrerSalle($dto);
    }
}