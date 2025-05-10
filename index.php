<?php

require_once 'config.php';
require_once 'core/Router.php';
require_once 'core/BaseController.php';
require_once 'core/BaseModel.php';
require_once 'controller/QuoteController.php';
require_once 'model/QuoteModel.php';

// Configuración de CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// definir rutas
$router = new Router();
$router->addRoute('/', 'QuoteController', 'index');
$router->addRoute('/cotizar', 'QuoteController', 'cotizar');

$requestUri = $_SERVER['REQUEST_URI'];

try {
    $router->dispatch($requestUri);
} catch (Throwable $e) {
    echo $e->getMessage();
}