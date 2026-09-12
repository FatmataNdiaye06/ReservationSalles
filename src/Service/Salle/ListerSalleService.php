<?php
namespace App\Service\Salle;

Use App\Repository\SalleRepositoryInterface;

class ListerSalleService{
    public function __construct(
        public SalleRepositoryInterface $salleRepository
    ){} 
    
    public function execute(){
        return $this->salleRepository->listerSalles();
    }
}