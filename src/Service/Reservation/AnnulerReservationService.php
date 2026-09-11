<?php
namespace App\Service;

use App\Exception\ReservationIntrouvableException;
use App\Repository\ReservationRepositoryInterface;

class AnnulerReservationService
{
    private ReservationRepositoryInterface $reservationRepository;

    public function __construct(ReservationRepositoryInterface $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    public function annuler(int $reservationId): void
    {
        $reservation = $this->reservationRepository->find($reservationId);

        if (!$reservation) {
            throw new ReservationIntrouvableException("La réservation demandée est introuvable.");
        }

        $this->reservationRepository->annulerReservation($reservation);
    }
}