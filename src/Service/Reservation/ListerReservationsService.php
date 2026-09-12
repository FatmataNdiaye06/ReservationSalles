<?php
namespace App\Service\Reservation;

use App\Repository\ReservationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ListerReservationsService
{
    public function __construct(
        private ReservationRepositoryInterface $reservationRepository
    ) {}

    public function execute(): Collection
    {
        return $this->reservationRepository->listerReservations();
    }
}