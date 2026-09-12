<?php
namespace App\Service\Reservation;

use App\DTO\CreerReservationDTO;
use App\Exception\SalleIndisponibleException;
use App\Model\Reservation;
use App\Repository\SalleRepositoryInterface;
use App\Repository\ReservationRepositoryInterface;

class CreerReservationService
{
    public function __construct(
       private SalleRepositoryInterface $salleRepository,
       private ReservationRepositoryInterface $reservationRepository
    ) {}

    public function execute(CreerReservationDTO $dto): Reservation
    {
        $this->verifierSalleActive($dto->salleId);
        $this->verifierPeriodeValide($dto->dateDebut, $dto->dateFin);
        $this->verifierDureeMaximale($dto->dateDebut, $dto->dateFin);
        $this->verifierDateFuture($dto->dateDebut);
        $this->verifierDisponibilite($dto->salleId, $dto->dateDebut, $dto->dateFin);

        $reservation = Reservation::addReservation($dto);
        $this->reservationRepository->enregistrerReservation($reservation);

        return $reservation;
    }

    private function verifierSalleActive(int $salleId): void
    {
        $salle = $this->salleRepository->retrouverSalle($salleId);

        if (!$salle) {
            throw new SalleIndisponibleException("La salle est introuvable.");
        }

        if (!$salle->active) {
            throw new SalleIndisponibleException("La salle demandée n'est pas active.");
        }
    }

    private function verifierPeriodeValide(\DateTimeImmutable $debut, \DateTimeImmutable $fin): void
    {
        if ($debut >= $fin) {
            throw new \InvalidArgumentException("La date de début doit précéder la date de fin.");
        }
    }

    private function verifierDureeMaximale(\DateTimeImmutable $debut, \DateTimeImmutable $fin): void
    {
        $diff = $debut->diff($fin);
        $heuresTotales = ($diff->days * 24) + $diff->h + ($diff->i / 60);

        if ($heuresTotales > 4) {
            throw new SalleIndisponibleException("La durée de la réservation ne peut pas dépasser 4 heures.");
        }
    }

    private function verifierDateFuture(\DateTimeImmutable $debut): void
    {
        if ($debut < new \DateTimeImmutable()) {
            throw new \InvalidArgumentException("La date de réservation doit être dans le futur.");
        }
    }

    private function verifierDisponibilite(int $salleId, \DateTimeImmutable $debut, \DateTimeImmutable $fin): void
    {
        $conflit = $this->reservationRepository->hasOverlap($salleId, $debut, $fin);

        if ($conflit) {
            throw new SalleIndisponibleException("La salle est déjà réservée sur ce créneau.");
        }
    }
}