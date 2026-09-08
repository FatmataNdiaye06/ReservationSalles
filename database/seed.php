<?php

require_once dirname(__DIR__).'/vendor/autoload.php';
require_once dirname(__DIR__).'/config/database.php';

initDatabase();

use App\Model\Salle;

$salles = [
    [
        'nom' => 'Amphithéâtre A',
        'batiment' => 'Principal',
        'capacite' => 250,
        'type' => 'amphitheatre',
        'active' => true
    ],
    [
        'nom' => 'Salle B12',
        'batiment' => 'Bâtiment B',
        'capacite' => 40,
        'type' => 'cours',
        'active' => true
    ],
    [
        'nom' => 'Laboratoire Chimie',
        'batiment' => 'Sciences',
        'capacite' => 24,
        'type' => 'laboratoire',
        'active' => true
    ],
    [
        'nom' => 'Salle Informatique 1',
        'batiment' => 'Technologie',
        'capacite' => 30,
        'type' => 'informatique',
        'active' => true
    ],
    [
        'nom' => 'Salle de réunion',
        'batiment' => 'Administration',
        'capacite' => 12,
        'type' => 'reunion',
        'active' => true
    ],
];

foreach ($salles as $data) {
    // Utilisation de firstOrCreate pour éviter les doublons basés sur le nom
    Salle::firstOrCreate(
        ['nom' => $data['nom']], 
        $data
    );
}

echo "Données initiales des salles insérées avec succès sans doublons !\n";