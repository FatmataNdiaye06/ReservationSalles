<?php
namespace App\Service\Reservation;

use App\Repository\ReservationRepositoryInterface;

class ListerReservationsService
{
    public function __construct(
        private ReservationRepositoryInterface $reservationRepository
    ) {}

    public function execute(): array
    {
        return $this->reservationRepository->listerReservations();
    }
}