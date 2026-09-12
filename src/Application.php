<?php
namespace App;

require_once __DIR__ . '/Validation/SalleValidator.php';
require_once __DIR__ . '/Repository/EloquentSalleRepository.php';
require_once __DIR__ . '/Service/Salle/ListerSalleService.php';
require_once __DIR__ . '/Service/Salle/CreerSalleService.php';
require_once __DIR__ . '/Service/Salle/ModifierSalleService.php';
require_once __DIR__ . '/Service/Salle/TrouverSalleService.php';

use FastRoute\Dispatcher;

class Application {

    public function runApp() {
        $routeDefinitionCallback = require dirname(__DIR__) . '/routes/web.php';
        $dispatcher = \FastRoute\simpleDispatcher($routeDefinitionCallback);

        $httpMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri = $_SERVER['REQUEST_URI'] ?? '/';

        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);

        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                http_response_code(404);
                require_once dirname(__DIR__) . '/templates/error/404.php';
                break;

            case Dispatcher::METHOD_NOT_ALLOWED:
                http_response_code(405);
                require_once dirname(__DIR__) . '/templates/error/405.php';
                break;

            case Dispatcher::FOUND:
                $handler = $routeInfo[1]; 
                $vars = $routeInfo[2];    

                [$controllerClass, $method] = $handler;

                if ($controllerClass === \App\Controller\SalleController::class) {
                    $repository = new \App\Repository\EloquentSalleRepository();
                    $controller = new \App\Controller\SalleController(
                        new \App\Service\Salle\ListerSalleService($repository),
                        new \App\Service\Salle\CreerSalleService($repository),
                        new \App\Service\Salle\ModifierSalleService($repository),
                        new \App\Service\Salle\TrouverSalleService($repository),
                        new \App\Validation\SalleValidator()
                    );
                } elseif ($controllerClass === \App\Controller\ReservationController::class) {
                    $salleRepository = new \App\Repository\EloquentSalleRepository();
                    $reservationRepository = new \App\Repository\EloquentReservationRepository();
                    $controller = new \App\Controller\ReservationController(
                        new \App\Service\Reservation\ListerReservationsService($reservationRepository),
                        new \App\Service\Reservation\TrouverReservationService($reservationRepository),
                        new \App\Service\Reservation\CreerReservationService($salleRepository, $reservationRepository),
                        new \App\Service\Reservation\AnnulerReservationService($reservationRepository),
                        new \App\Validation\ReservationValidator()
                    );
                } else {
                    $controller = new $controllerClass();
                }

                $formData = $_POST ?? [];
                if ($method === 'store' || $method === 'update') {
                    $controller->$method($vars, $formData);
                } else {
                    $controller->$method($vars);
                }
                break;
        }
    }
}