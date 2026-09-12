<?php

require_once dirname(__DIR__)."/vendor/autoload.php";
require_once dirname(__DIR__)."/config/database.php";
initDatabase();
use App\Application;

$application = new Application();
$application->runApp();