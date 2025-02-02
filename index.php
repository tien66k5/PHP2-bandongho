<?php

use FastRoute\RouteCollector;
use League\Plates\Extension\URI;
use Src\Controllers\Client\BlogController;
use Src\Controllers\Client\ContactController;
use Src\Controllers\Client\HomeController;
use Src\Controllers\Client\ProductListController;

use Src\Controllers\Admin\DashboardController;
use Src\Controllers\Admin\VouchersController;
use Src\Controllers\Admin\UserController;
use Src\Controllers\Admin\ProductsController;
use Src\Controllers\Admin\OrdersController;
use Src\Controllers\Admin\BrandController;
use Src\Controllers\Admin\CommentController;
use Src\Controllers\Admin\CategoryController;
use Src\Controllers\Admin\AttributeController;

require_once 'vendor/autoload.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE);
ini_set('error_log', './logs/php-errors.log');




$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();





$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/home', [HomeController::class, 'show']);
    $r->addRoute('GET', '/', [HomeController::class, 'show']);
    $r->addRoute('GET', '/product/list', [ProductListController::class, 'show']);
    $r->addRoute('GET', '/blog', [BlogController::class, 'show']);
    $r->addRoute('GET', '/contact', [ContactController::class, 'show']);


    $r->addGroup('/admin', function (FastRoute\RouteCollector $r) {
        $r->get('', [DashboardController::class, 'show']);
        $r->get('/dashboard', [DashboardController::class, 'show']);
        $r->get('/vouchers', [VouchersController::class, 'show']);
        $r->get('/users', [UserController::class, 'show']);
        $r->get('/create-user', [UserController::class, 'add']);
        $r->get('/products', [productsController::class, 'show']);
        $r->get('/product/add', [productsController::class, 'add']);
        $r->get('/allattribute', [UserController::class, 'show']);
        $r->get('/attribute', [AttributeController::class, 'add']);
        $r->get('/categories', [CategoryController::class, 'show']);
        $r->get('/category/add', [CategoryController::class, 'add']);
        $r->get('/brands', [BrandController::class, 'show']);
        $r->get('/brand/add', [BrandController::class, 'add']);
        $r->get('/comments', [CommentController::class, 'show']);
        $r->get('/orders', [OrdersController::class, 'show']);
    });
});
















$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];


if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        echo 'Not Found';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo 'Forbidden Method';
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $method = $handler[1];
        // ... call $handler with $vars

        $controller = new $handler[0];
        $controller->$method($vars);
        break;
}
