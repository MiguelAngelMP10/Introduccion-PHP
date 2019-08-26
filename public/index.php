<?php

ini_set('display_errors', 1);
ini_set('display_starup_error', 1);

error_reporting(E_ALL);

require_once '../vendor/autoload.php';


use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'cursophp',
    'username'  => 'root',
    'password'  => '',
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
    echo '<pre>';
    var_dump($request->getUri()->getPath());
    echo '</pre>';


    
    // $route = $_GET['route'] ?? '/' ;
    // if ($route == '/') {
    //     require '../index.php';
    // }elseif($route == 'addJob'){
    //     require '../addJob.php';
    // }