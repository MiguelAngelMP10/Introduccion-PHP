<?php

ini_set('display_errors', 1);
ini_set('display_starup_error', 1);

error_reporting(E_ALL);

require_once '../vendor/autoload.php';

session_start();
$dotenv = Dotenv\Dotenv::create(__DIR__ . '/..');
$dotenv->load();

use App\Services\JobService;
use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

use WoohooLabs\Harmony\Harmony;
use WoohooLabs\Harmony\Middleware\FastRouteMiddleware;
use WoohooLabs\Harmony\Middleware\DispatcherMiddleware;
use WoohooLabs\Harmony\Middleware\HttpHandlerRunnerMiddleware;
use Zend\Diactoros\Response;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

$container = new DI\Container();

$capsule = new Capsule;


function printElement($job)
{

    echo ' <li class="work-position">';
    echo '<h5>' . $job->title . '</h5>';
    echo '<p>' . $job->description . '</p>';
    echo '<p>' . $job->getDurationAsString($job->months) . '</p>';
    echo '<strong>Achievements:</strong>';
    echo '<ul>';
    echo '  <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '  <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '  <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '</ul>';
    echo '</li>';
}


$capsule->addConnection([
    'driver'    => getenv('DB_DRIVER'),
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv('DB_USER'),
    'password'  => getenv('DB_PASS'),
    'charset'   => 'utf8mb4',
    'collation' => 'utf8mb4_spanish_ci',
    'prefix'    => '',
]);


// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);



$routerContainer = new RouterContainer();

$map = $routerContainer->getMap();

$map->get('index', '/', [
    'App\Controllers\IndexController',
    'indexAction'
]);

$map->get('addJobs', '/jobs/add', [
    'App\Controllers\JobsController',
    'getAddJobAction',
    'auth' => true
]);

$map->get('indexJobs', '/jobs', [
    'App\Controllers\JobsController',
    'indexAction'
]);

$map->get('deleteJobs', '/jobs/delete', [
    'App\Controllers\JobsController',
    'deleteAction'
]);



$map->post('saveJobs', '/jobs/add', [
    'App\Controllers\JobsController',
    'getAddJobAction',
    'auth' => true
]);


$map->get('addProjects', '/projects/add', [
    'App\Controllers\ProjectsController',
    'getAddProjectAction',
    'auth' => true
]);

$map->post('saveProjects', '/projects/add', [
    'App\Controllers\ProjectsController',
    'getAddProjectAction',
    'auth' => true
]);

$map->get('addUsers', '/users/add', [
    'App\Controllers\UsersController',
    'getAddUserAction',
    'auth' => true
]);

$map->post('saveUsers', '/users/add', [
    'App\Controllers\UsersController',
    'getAddUserAction',
    'auth' => true
]);


$map->get('loginForm', '/login', [
    'App\Controllers\AuthController',
    'getLogin'
]);

$map->post('auth', '/auth', [
    'App\Controllers\AuthController',
    'postLogin'
]);



$map->get('admin', '/admin', [
    'App\Controllers\AdminController',
    'getIndex',
    'auth' => true
]);

$map->get('logout', '/logout', [
    'App\Controllers\AuthController',
    'getLogout',
    'auth' => true
]);




$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route) {
    echo 'No route';
} else {
    // $handlerData = $route->handler;
    // $controllerName  = $handlerData['controller'];
    // $actionName  = $handlerData['action'];
    $needsAuth =  $handlerData['auth'] ?? false;

    $sessionUserId = $_SESSION['userId'] ?? null;

    if ($needsAuth && !$sessionUserId) {
        $controllerName = 'App\controllers\AuthController';
        $actionName = 'getLogout';
    }

    $harmony = new Harmony($request, new Response());
    $harmony
        ->addMiddleware(new HttpHandlerRunnerMiddleware(new SapiEmitter()))
        ->addMiddleware(new Middlewares\AuraRouter($routerContainer))
        ->addMiddleware(new DispatcherMiddleware($container, 'request-handler'))
        ->run();
}