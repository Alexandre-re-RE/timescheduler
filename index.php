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
$request = APP_DIR !== '/' ? str_replace(APP_DIR, '', $_SERVER['REQUEST_URI']) : $_SERVER['REQUEST_URI'];
$method = !empty($_POST['method']) ? htmlspecialchars(strtoupper($_POST['method'])) : $_SERVER['REQUEST_METHOD'];

$splitedRequest = explode('/', trim($request, '/'));

$requestParams = [
    'endpoint' => $splitedRequest[0] ?? '',
    'action' => $splitedRequest[1] ?? '/',
    'param' => $splitedRequest[2] ?? '',
];


function redirectRoute($method, $requestParams, $controller)
{
    switch ($method) {
        case 'GET':
            switch ($requestParams['action']) {
                case 'add':
                    (new $controller())->create();
                    break;
                case 'update':
                    (new $controller())->update($requestParams['param']);
                    break;
                case 'view':
                    (new $controller())->view($requestParams['param']);
                    break;
                default:
                    (new $controller())->index();
            }
            break;
        case 'POST':
            (new $controller())->create();
            break;
        case 'DELETE':
            (new $controller())->delete($requestParams['param']);
            break;
        case 'UPDATE':
            (new $controller())->update($requestParams['param']);
            break;
        default:
            echo '404 not found method not allowed';
    }
}


switch ($requestParams['endpoint']) {
    case 'clients':
        redirectRoute($method, $requestParams, ClientController::class);
        break;
    case 'projects':
        redirectRoute($method, $requestParams, ProjectController::class);
        break;
    case 'roles':
        redirectRoute($method, $requestParams, RoleController::class);
        break;
    case 'status':
        redirectRoute($method, $requestParams, StatusController::class);
        break;
    case 'tasks':
        redirectRoute($method, $requestParams, TaskController::class);
        break;
    case 'users':
        redirectRoute($method, $requestParams, UserController::class);
        break;
    default:
        echo '404 not found';
}
