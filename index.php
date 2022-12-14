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

function redirectRoute($method, $requestParts, $controller) {
    switch($method) {
        case 'GET':
            switch($requestParts[1]) {
                case 'add':
                    (new $controller())->create();
                    break;
                case 'update':
                    (new $controller())->update($requestParts[2]);
                    break;
                case 'view':
                    (new $controller())->view($requestParts[2]);
                    break;
                default:
                    (new $controller())->index();
            }
            break;
        case 'POST':
            (new $controller())->create();
            break;
        case 'DELETE':
            (new $controller())->delete($requestParts[1]);
            break;
        case 'UPDATE':
            (new $controller())->update($requestParts[1]);
            break;
        default:
            echo '404 not found method not allowed';
    }
}


switch ($requestParts[0]) {
    case 'clients':
        redirectRoute($method, $requestParts, ClientController::class);
        break;
    case 'projects':
        redirectRoute($method, $requestParts, ProjectController::class);
        break;
    case 'roles':
        redirectRoute($method, $requestParts, RoleController::class);
        break;
    case 'status':
        redirectRoute($method, $requestParts, StatusController::class);
        break;
    case 'tasks':
        redirectRoute($method, $requestParts, TaskController::class);
        break;
    case 'users':
        redirectRoute($method, $requestParts, UserController::class);
        break;
    default:
        echo '404 not found';
}
