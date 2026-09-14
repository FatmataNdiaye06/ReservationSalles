<?php
namespace App\Repository;

use App\Model\Reservation;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentReservationRepository implements ReservationRepositoryInterface
{
    public function listerReservations(): Collection
    {
        return Reservation::all();
    }

    public function retrouverReservation(int $id): ?Reservation
    {
        return Reservation::find($id);
    }

    public function estEnConflit(int $salleId, DateTimeInterface $debut, DateTimeInterface $fin): bool
    {
        return Reservation::where('salle_id', $salleId)
            ->where('statut', 'confirmée')
            ->where('date_debut', '<', $fin)
            ->where('date_fin', '>', $debut)
            ->exists();
    }

    public function enregistrerReservation($data): Reservation
    {
        if ($data instanceof Reservation) {
            $data->save();
            return $data;
        }

        return Reservation::create($data);
    }

    public function annulerReservation(int $id): bool
    {
        $reservation = Reservation::find($id);
        if (!$reservation) {
            return false;
        }
        $reservation->statut = 'annulée';
        return $reservation->save();
    }
}