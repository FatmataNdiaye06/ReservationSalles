<?php
namespace App\Model;

use App\DTO\CreerReservationDTO;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model {
    protected $table = 'reservations';
    public $timestamps = true;

    protected $fillable = [
        'salle_id',
        'responsable',
        'email',
        'motif',
        'date_debut',
        'date_fin',
        'statut'
    ];

    protected $casts = [
        'date_debut' => 'datetime',
        'date_fin' => 'datetime',
    ];

    public function salle() {
        return $this->belongsTo(Salle::class, 'salle_id', 'id');
    }

    public static function addReservation(CreerReservationDTO $dto): self
    {
        $reservation = new self();
        $reservation->salle_id = $dto->salleId;
        $reservation->responsable = $dto->responsable;
        $reservation->email = $dto->email;
        $reservation->motif = $dto->motif;
        $reservation->date_debut = $dto->dateDebut;
        $reservation->date_fin = $dto->dateFin;

        return $reservation;
    }
}