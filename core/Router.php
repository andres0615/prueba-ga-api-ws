<?php

class Router {

    private $routes = [];

    public function addRoute($path, $controller, $action) {
        $this->routes[] = compact('path', 'controller', 'action');
    }

    public function dispatch($requestUri) {        
        // $requestUri = str_replace('/test','',$requestUri);
        foreach ($this->routes as $route) {
            if ($route['path'] === $requestUri) {
                $controllerName = $route['controller'];
                $action = $route['action'];

                if (class_exists($controllerName)) {
                    $controller = new $controllerName();
                    if (method_exists($controller, $action)) {
                        return $controller->$action();
                    }
                }
                throw new Exception("Controlador o método no encontrado.");
            }
        }
        throw new Exception("Ruta no encontrada.");
    }
}
