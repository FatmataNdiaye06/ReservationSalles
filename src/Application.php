<?php
namespace App;

use App\Controller\ReservationController;
use App\Controller\SalleController;
use FastRoute\Dispatcher;

class Application {
    public function __construct(
        private Dispatcher $dispatcher,
        private SalleController $salleController,
        private ReservationController $reservationController
    ) {}

    public function run(): void {
        $httpMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri = $_SERVER['REQUEST_URI'] ?? '/';

        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $this->dispatcher->dispatch($httpMethod, $uri);

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

                $controller = match ($controllerClass) {
                    SalleController::class => $this->salleController,
                    ReservationController::class => $this->reservationController,
                    default => new $controllerClass(),
                };

                $formData = $_POST ?? [];
                if ($method === 'store') {
                    $controller->$method($formData);
                } elseif ($method === 'update') {
                    $controller->$method($vars, $formData);
                } else {
                    $controller->$method($vars);
                }
                break;
        }
    }

    public function runApp(): void
    {
        $this->run();
    }
}