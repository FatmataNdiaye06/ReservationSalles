<?php

declare(strict_types=1);

require_once __DIR__ . '/database.php';
initDatabase();

use App\Application;
use App\Controller\ReservationController;
use App\Controller\SalleController;
use App\Repository\EloquentReservationRepository;
use App\Repository\EloquentSalleRepository;
use App\Repository\ReservationRepositoryInterface;
use App\Repository\SalleRepositoryInterface;
use App\Service\Reservation\AnnulerReservationService;
use App\Service\Reservation\CreerReservationService;
use App\Service\Reservation\ListerReservationsService;
use App\Service\Reservation\TrouverReservationService;
use App\Service\Salle\CreerSalleService;
use App\Service\Salle\ListerSalleService;
use App\Service\Salle\ModifierSalleService;
use App\Service\Salle\TrouverSalleService;
use App\Validation\ReservationValidator;
use App\Validation\SalleValidator;
use FastRoute\Dispatcher;
use Illuminate\Database\Capsule\Manager as Capsule;

use function DI\autowire;
use function DI\factory;

return [
    Capsule::class => factory(function (): Capsule {
        return initDatabase();
    }),

    SalleRepositoryInterface::class => autowire(EloquentSalleRepository::class),
    ReservationRepositoryInterface::class => autowire(EloquentReservationRepository::class),

    SalleValidator::class => autowire(SalleValidator::class),
    ReservationValidator::class => autowire(ReservationValidator::class),

    ListerSalleService::class => autowire(ListerSalleService::class),
    CreerSalleService::class => autowire(CreerSalleService::class),
    ModifierSalleService::class => autowire(ModifierSalleService::class),
    TrouverSalleService::class => autowire(TrouverSalleService::class),

    ListerReservationsService::class => autowire(ListerReservationsService::class),
    TrouverReservationService::class => autowire(TrouverReservationService::class),
    CreerReservationService::class => autowire(CreerReservationService::class),
    AnnulerReservationService::class => autowire(AnnulerReservationService::class),

    SalleController::class => autowire(SalleController::class),
    ReservationController::class => autowire(ReservationController::class),

    Dispatcher::class => factory(function (): Dispatcher {
        $routeDefinitionCallback = require dirname(__DIR__) . '/routes/web.php';
        return \FastRoute\simpleDispatcher($routeDefinitionCallback);
    }),

    Application::class => autowire(Application::class),
];