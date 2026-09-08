<?php

require_once dirname(__DIR__,2).'/vendor/autoload.php';
require_once dirname(__DIR__,2). '/config/database.php';

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

initDatabase();

try {
    Capsule::schema()->create('reservations', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('salle_id');
        $table->foreign('salle_id')->references('id')->on('salles')->onDelete('cascade');
        $table->string('responsable');
        $table->string('email');
        $table->text('motif');
        $table->dateTime('date_debut');
        $table->dateTime('date_fin');
        $table->enum('statut', ['confirmée', 'annulée'])->default('confirmée'); 
        $table->timestamps();
    });

    echo "Table 'reservations' créée avec succès !\n";
} catch (\Exception $e) {
    echo "Erreur lors de la création de la table : " . $e->getMessage() . "\n";
}