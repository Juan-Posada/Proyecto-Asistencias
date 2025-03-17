<?php
require_once '../app/config/global.php';
require_once '../app/controllers/LoginController.php'; 
require_once '../app/controllers/AmbienteController.php'; 
require_once '../app/controllers/AprendizController.php'; 
require_once '../app/controllers/AsistenciaController.php'; 
require_once '../app/controllers/CentroController.php'; 
require_once '../app/controllers/FichaController.php'; 
require_once '../app/controllers/ProgramaFormacionController.php'; 
require_once '../app/controllers/RegionalController.php'; 
require_once '../app/controllers/UsuarioController.php'; 
require_once '../app/controllers/MainController.php'; 


$url = $_SERVER['REQUEST_URI']; //Lo que se ingresa en la URL
$routes = include_once '../app/config/routes.php';

$matchedRoute = null;
foreach ($routes as $route => $routeConfig) {
    if(preg_match("#^$route$#", $url, $matches)) {
        $matchedRoute = $routeConfig;
        break;
    }
    // Las expresiones regulares encuentra un patrón en un String
}
if($matchedRoute){
    $controllerName = $matchedRoute['controller'];
    $actionName = $matchedRoute['action'];
    if(class_exists($controllerName) && method_exists($controllerName, $actionName)){
        $parameters = array_slice($matches, 1);
        $controller = new $controllerName();
        $controller->$actionName(...$parameters);
        exit;
    }
}

header('Location: /login/init');
