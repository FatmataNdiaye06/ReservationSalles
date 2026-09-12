<?php

require_once __DIR__ . '/vendor/autoload.php';

use FastRoute\RouteCollector;

// 1. Charger le fichier de routes (qui retourne la closure de FastRoute)
$routeDefinitionCallback = require __DIR__ . '/routes/web.php';

$dispatcher = FastRoute\simpleDispatcher($routeDefinitionCallback);

// 2. Définir des scénarios de test (Méthode HTTP + URI)
$tests = [
    ['GET', '/accueil'],
    ['GET', '/salles'],
    ['GET', '/salles/create'],
    ['POST', '/salles'],
    ['GET', '/salles/42'],         // Doit matcher avec la contrainte \d+
    ['GET', '/salles/abc'],        // Doit renvoyer NOT_FOUND (car 'abc' n'est pas un nombre)
    ['POST', '/salles/42/edit'],
    ['GET', '/reservations'],
    ['POST', '/reservations/10/cancel'],
    ['GET', '/route-inexistante']  // Doit renvoyer NOT_FOUND
];

echo "=== DÉBUT DES TESTS DU ROUTEUR (FastRoute) ===\n\n";

foreach ($tests as [$method, $uri]) {
    $routeInfo = $dispatcher->dispatch($method, $uri);
    
    switch ($routeInfo[0]) {
        case FastRoute\Dispatcher::NOT_FOUND:
            echo "❌ [$method $uri] -> 404 NOT FOUND\n";
            break;
            
        case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
            $allowedMethods = implode(', ', $routeInfo[1]);
            echo "⚠️  [$method $uri] -> 405 METHOD NOT ALLOWED (Permis : $allowedMethods)\n";
            break;
            
        case FastRoute\Dispatcher::FOUND:
            $handler = $routeInfo[1];
            $vars = $routeInfo[2];
            $controller = $handler[0];
            $action = $handler[1];
            
            $varsString = !empty($vars) ? ' | Vars: ' . json_encode($vars) : '';
            echo "✅ [$method $uri] -> TROUVÉ ! Contrôleur: {$controller} @ {$action}{$varsString}\n";
            break;
    }
}

echo "\n=== FIN DES TESTS ==-\n";