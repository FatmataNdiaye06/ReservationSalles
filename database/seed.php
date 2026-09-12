<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/config/database.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

initDatabase();

use App\Model\Reservation;
use App\Model\Salle;

$salles = [
    [
        'nom' => 'Amphithéâtre A',
        'batiment' => 'Principal',
        'capacite' => 250,
        'type' => 'amphitheatre',
        'active' => true,
    ],
    [
        'nom' => 'Salle B12',
        'batiment' => 'Bâtiment B',
        'capacite' => 40,
        'type' => 'cours',
        'active' => true,
    ],
    [
        'nom' => 'Laboratoire Chimie',
        'batiment' => 'Sciences',
        'capacite' => 24,
        'type' => 'laboratoire',
        'active' => true,
    ],
    [
        'nom' => 'Salle Informatique 1',
        'batiment' => 'Technologie',
        'capacite' => 30,
        'type' => 'informatique',
        'active' => true,
    ],
    [
        'nom' => 'Salle de réunion',
        'batiment' => 'Administration',
        'capacite' => 12,
        'type' => 'reunion',
        'active' => true,
    ],
];

foreach ($salles as $data) {
    Salle::firstOrCreate(['nom' => $data['nom']], $data);
}

if (Reservation::count() === 0) {
    $seedReservations = [
        [
            'salle_id' => Salle::where('nom', 'Salle B12')->value('id'),
            'responsable' => 'Awa Ndiaye',
            'email' => 'awa.ndiaye@universite.sn',
            'motif' => "Cours d'architecture logicielle",
            'date_debut' => (new \DateTimeImmutable('+1 day'))->setTime(10, 0),
            'date_fin' => (new \DateTimeImmutable('+1 day'))->setTime(12, 0),
            'statut' => 'confirmée',
        ],
        [
            'salle_id' => Salle::where('nom', 'Amphithéâtre A')->value('id'),
            'responsable' => 'Fatou Diop',
            'email' => 'fatou.diop@universite.sn',
            'motif' => 'Soutenance de projet',
            'date_debut' => (new \DateTimeImmutable('+2 day'))->setTime(14, 0),
            'date_fin' => (new \DateTimeImmutable('+2 day'))->setTime(16, 0),
            'statut' => 'confirmée',
        ],
        [
            'salle_id' => Salle::where('nom', 'Laboratoire Chimie')->value('id'),
            'responsable' => 'Moussa Fall',
            'email' => 'moussa.fall@universite.sn',
            'motif' => 'Travaux pratiques',
            'date_debut' => (new \DateTimeImmutable('+3 day'))->setTime(9, 0),
            'date_fin' => (new \DateTimeImmutable('+3 day'))->setTime(11, 0),
            'statut' => 'confirmée',
        ],
        [
            'salle_id' => Salle::where('nom', 'Salle Informatique 1')->value('id'),
            'responsable' => 'Ousmane Ba',
            'email' => 'ousmane.ba@universite.sn',
            'motif' => 'Atelier développement web',
            'date_debut' => (new \DateTimeImmutable('+4 day'))->setTime(13, 0),
            'date_fin' => (new \DateTimeImmutable('+4 day'))->setTime(15, 0),
            'statut' => 'confirmée',
        ],
        [
            'salle_id' => Salle::where('nom', 'Salle de réunion')->value('id'),
            'responsable' => 'Aminata Sarr',
            'email' => 'aminata.sarr@universite.sn',
            'motif' => 'Réunion de coordination',
            'date_debut' => (new \DateTimeImmutable('+5 day'))->setTime(11, 0),
            'date_fin' => (new \DateTimeImmutable('+5 day'))->setTime(12, 0),
            'statut' => 'annulée',
        ],
    ];

    foreach ($seedReservations as $reservationData) {
        Reservation::firstOrCreate(
            ['responsable' => $reservationData['responsable'], 'date_debut' => $reservationData['date_debut']->format('Y-m-d H:i:s')],
            [
                'salle_id' => $reservationData['salle_id'],
                'responsable' => $reservationData['responsable'],
                'email' => $reservationData['email'],
                'motif' => $reservationData['motif'],
                'date_debut' => $reservationData['date_debut'],
                'date_fin' => $reservationData['date_fin'],
                'statut' => $reservationData['statut'],
            ]
        );
    }
}