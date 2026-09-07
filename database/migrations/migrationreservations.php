<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

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