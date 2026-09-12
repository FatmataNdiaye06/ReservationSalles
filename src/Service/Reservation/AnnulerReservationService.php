<?php
namespace App\Service\Reservation;

use App\Exception\ReservationIntrouvableException;
use App\Repository\ReservationRepositoryInterface;

class AnnulerReservationService
{
    public function __construct(
        private ReservationRepositoryInterface $reservationRepository
    ) {}

    public function execute(int $reservationId): void
    {
        $reservation = $this->reservationRepository->retrouverReservation($reservationId);

        if (!$reservation) {
            throw new ReservationIntrouvableException("La réservation demandée est introuvable.");
        }

        $this->reservationRepository->annulerReservation($reservationId);
    }
}