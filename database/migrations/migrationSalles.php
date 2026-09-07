<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

Capsule::schema()->create('salles', function (Blueprint $table) {
    $table->increments('id');
    $table->string('nom');
    $table->string('batiment');
    $table->integer('capacite');
    $table->enum('type', ['cours', 'informatique', 'laboratoire', 'amphitheatre', 'reunion']);
    $table->boolean('active')->default(true);
    $table->timestamps();
});