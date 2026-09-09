<?php
namespace App\Repository;

use App\Model\Reservation;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Collection;

interface ReservationRepositoryInterface
{
    public function listerReservations(): Collection;
    public function retrouverReservation(int $id): ?Reservation;
    public function rechercherConflit(int $salleId, DateTimeInterface $debut, DateTimeInterface $fin): ?Reservation;
    public function enregistrerReservation(array $data): Reservation;
    public function annulerReservation(int $id): bool;
}