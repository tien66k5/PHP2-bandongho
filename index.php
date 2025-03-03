<?php
ob_start();
define("ROOT_PATH", __DIR__);

require_once 'vendor/autoload.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE);
ini_set('error_log', './logs/php-errors.log');
session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Src\Route;

$router = new Route();

use Src\Middleware\AuthMiddleware;
// Định nghĩa các route ngoài admin
$router->add("/home", ["controller" => "HomeController", "action" => "show"], "GET");
$router->add("/error", ["controller" => "HomeController", "action" => "showError"], "GET");
$router->add("/thank", ["controller" => "HomeController", "action" => "showThank"], "GET");
$router->add("/products/list", ["controller" => "ProductController", "action" => "show"], "GET");
$router->add("/products/detail/{id:\d+}", ["controller" => "ProductController", "action" => "detail"], "GET");
$router->add("/blog", ["controller" => "BlogController", "action" => "show"], "GET");
$router->add("/contact", ["controller" => "ContactController", "action" => "show"], "GET");
$router->add("/login", ["controller" => "LoginController", "action" => "add"], "GET");
$router->add("/user/login", ["controller" => "LoginController", "action" => "login"], "POST");
$router->add("/user/cart", ["controller" => "CartController", "action" => "showCart"], "GET");
$router->add("/user/order", ["controller" => "AccountController", "action" => "showOder"], "GET");
$router->add("/user/order/detail/{id:\d+}", ["controller" => "AccountController", "action" => "showOderDetail"], "GET");
$router->add("/user/cart/remove", ["controller" => "CartController", "action" => "removeItem"], "POST");
$router->add("/user/cart/add/{id:\d+}", ["controller" => "CartController", "action" => "create"], "POST");
$router->add("/user/checkout", ["controller" => "CartController", "action" => "checkout"], "GET");
$router->add("/processCheckout", ["controller" => "CartController", "action" => "processCheckout"], "POST");
$router->add("/search", ["controller" => "SearchController", "action" => "show"], "GET");
$router->add("/register", ["controller" => "LoginController", "action" => "create"], "POST");
$router->add("/account", ["controller" => "AccountController", "action" => "show"], "GET");
$router->add("/logout", ["controller" => "LoginController", "action" => "logout"], "GET");


if (strpos($_SERVER["REQUEST_URI"], "/admin/") === 0) {
    AuthMiddleware::checkAdmin();

    $router->add("/admin/products", ["controller" => "ProductsController", "action" => "list"], "GET");
    $router->add("/admin/product/add", ["controller" => "ProductsController", "action" => "add"], "GET");
    $router->add("/admin/product/create", ["controller" => "ProductsController", "action" => "create"], "POST");
    $router->add("/admin/product/edit/{id:\d+}", ["controller" => "ProductsController", "action" => "edit"], "GET");
    $router->add("/admin/product/update/{id:\d+}", ["controller" => "ProductsController", "action" => "update"], "POST");
    $router->add("/admin/product/delete/{id:\d+}", ["controller" => "ProductsController", "action" => "delete"], "GET");
    $router->add("/admin/product/detail/{id:\d+}", ["controller" => "ProductsController", "action" => "detail"], "GET");
    $router->add("/admin/category", ["controller" => "CategoryController", "action" => "list"], "GET");
    $router->add("/admin/category/add", ["controller" => "CategoryController", "action" => "add"], "GET");
    $router->add("/admin/category/create", ["controller" => "CategoryController", "action" => "create"], "POST");
    $router->add("/admin/category/edit/{id:\d+}", ["controller" => "CategoryController", "action" => "edit"], "GET");
    $router->add("/admin/category/update/{id:\d+}", ["controller" => "CategoryController", "action" => "update"], "POST");
    $router->add("/admin/category/delete/{id:\d+}", ["controller" => "CategoryController", "action" => "delete"], "GET");
    $router->add("/admin/users", ["controller" => "UserController", "action" => "show"], "GET");
    $router->add("/admin/users/add", ["controller" => "UserController", "action" => "add"], "GET");
    $router->add("/admin/users/edit/{id:\d+}", ["controller" => "UserController", "action" => "edit"], "GET");
    $router->add("/admin/users/update/{id:\d+}", ["controller" => "UserController", "action" => "update"], "POST");
    $router->add("/admin/users/delete/{id:\d+}", ["controller" => "UserController", "action" => "delete"], "GET");
    $router->add("/admin/users/register", ["controller" => "UserController", "action" => "create"], "POST");
    $router->add("/admin/orders", ["controller" => "OrdersController", "action" => "show"], "GET");
    $router->add("/admin/order/update", ["controller" => "OrdersController", "action" => "updateStatus"], "POST");
}


use Src\Framework\ErrorHandler;

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$params = $router->match($path, $_SERVER['REQUEST_METHOD']);

if ($params === false) {
    ErrorHandler::notFound();
}

$controllerName = $params['controller'];
$action = $params['action'];

if (strpos($path, "/admin/") === 0) {
    $controllerClass = "\\Src\\Controllers\\Admin\\" . $controllerName;
} else {
    $controllerClass = "\\Src\\Controllers\\Client\\" . $controllerName;
}

if (!class_exists($controllerClass)) {
    ErrorHandler::notFound("Controller không tồn tại!");
}

$controller = new $controllerClass();

if (!method_exists($controller, $action)) {
    ErrorHandler::methodNotAllowed();
}

$request = Src\Framework\Request::createFromGlobal();
$response = new Src\Framework\Response();

$id = $params['id'] ?? null;

$controller->setRequest($request);
$controller->setResponse($response);
$controller->$action($id);
