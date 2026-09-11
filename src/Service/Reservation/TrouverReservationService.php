<?php
namespace App\Service\Reservation;

use App\Repository\ReservationRepositoryInterface;
use App\Exception\ReservationIntrouvableException;

class TrouverReservationService
{
    public function __construct(
        private ReservationRepositoryInterface $reservationRepository
    ) {}

    public function execute(int $id)
    {
        $reservation = $this->reservationRepository->retrouverParId($id);

        if (!$reservation) {
            throw new ReservationIntrouvableException("La réservation demandée est introuvable.");
        }

        return $reservation;
    }
}