<?php
namespace App\Service\Salle;

Use App\Repository\SalleRepositoryInterface;

class SalleService{
    public function __construct(
        public SalleRepositoryInterface $salleRepository
    ){} 
    
    public function execute(){
        return $this->salleRepository->listerSalles();
    }
}