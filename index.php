<?php
require_once './bootstrap.php';

//controllers
use App\Controller\ClientController;
use App\Controller\ProjectController;
use App\Controller\RoleController;
use App\Controller\StatusController;
use App\Controller\TaskController;
use App\Controller\UserController;

//entrypoint
$request = $_SERVER['REQUEST_URI'];
$method = !empty($_POST['method']) ? htmlspecialchars(strtoupper($_POST['method'])) : $_SERVER['REQUEST_METHOD'];
$requestParts = explode('/', trim($request, '/'));

function redirectRoute($method, $idParams, $controller) {
    switch($method) {
        case 'GET':
            if($idParams) {
                (new $controller())->view($idParams);
            } else {
                (new $controller())->index();
            }
            break;
        case 'POST':
            (new $controller())->create();
            break;
        case 'DELETE':
            (new $controller())->delete($idParams);
            break;
        case 'UPDATE':
            (new $controller())->update($idParams);
            break;
    }
}


switch ($requestParts[0]) {
    case 'clients':
        redirectRoute($method, $requestParts[1], ClientController::class);
        break;
    case 'projects':
        redirectRoute($method, $requestParts[1], ProjectController::class);
        break;
    case 'roles':
        redirectRoute($method, $requestParts[1], RoleController::class);
        break;
    case 'status':
        redirectRoute($method, $requestParts[1], StatusController::class);
        break;
    case 'tasks':
        redirectRoute($method, $requestParts[1], TaskController::class);
        break;
    case 'users':
        redirectRoute($method, $requestParts[1], UserController::class);
        break;
    default:
        echo '404 not found';
}
