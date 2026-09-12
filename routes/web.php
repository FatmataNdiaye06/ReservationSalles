<?php

use FastRoute\RouteCollector;
use App\Controller\SalleController;
use App\Controller\ReservationController;

return function (RouteCollector $r) {
    // Routes pour les salles
    $r->addRoute('GET', '/', [SalleController::class, 'home']);
    $r->addRoute('GET', '/salles', [SalleController::class, 'index']);
    $r->addRoute('GET', '/salles/create', [SalleController::class, 'create']);
    $r->post('/salles', [SalleController::class, 'store']);
    $r->addRoute('GET', '/salles/{id:\d+}', [SalleController::class, 'show']);

    $r->addRoute('GET', '/reservations', [ReservationController::class, 'index']);
    $r->addRoute('GET', '/reservations/{id:\d+}', [ReservationController::class, 'show']);
    $r->addRoute('GET', '/reservations/create', [ReservationController::class, 'create']);
    $r->post('/reservations', [ReservationController::class, 'store']);
};