<?php
require_once dirname(__DIR__,2).'/vendor/autoload.php';

require_once dirname(__DIR__,2). '/config/database.php';

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

initDatabase();

try {
    Capsule::schema()->create('salles', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nom');
        $table->string('batiment');
        $table->integer('capacite');
        $table->enum('type', ['cours', 'informatique', 'laboratoire', 'amphitheatre', 'reunion']);
        $table->boolean('active')->default(true);
        $table->timestamps();
    });

    echo "Table 'salles' créée avec succès !\n";
} catch (\Exception $e) {
    echo "Erreur lors de la création de la table : " . $e->getMessage() . "\n";
}