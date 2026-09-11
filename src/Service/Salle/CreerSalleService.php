<?php
namespace App\Service;

use App\DTO\CreerSalleDTO;
use App\Repository\SalleRepositoryInterface;

class CreerSalleService
{
    public function __construct(
        private SalleRepositoryInterface $salleRepository
    ) {}

    public function executer(CreerSalleDTO $dto): void
    {
        $this->salleRepository->enregistrerSalle($dto);
    }
}