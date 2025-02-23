<?php
ob_start();
define("ROOT_PATH", __DIR__);

require_once 'vendor/autoload.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE);
ini_set('error_log', './logs/php-errors.log');

use Src\Route;

$router = new Route();

// Định nghĩa các route ngoài admin
$router->add("/home", ["controller" => "HomeController", "action" => "show"], "GET");
$router->add("/products/list", ["controller" => "ProductController", "action" => "show"], "GET");
$router->add("/blog", ["controller" => "BlogController", "action" => "show"], "GET");
$router->add("/contact", ["controller" => "ContactController", "action" => "show"], "GET");
$router->add("/login", ["controller" => "LoginController", "action" => "add"], "GET");
$router->add("/register", ["controller" => "LoginController", "action" => "create"], "POST");

// Định nghĩa các route cho admin
// $router->add("/", ["controller" => "HomeController", "action" => "index"], "GET");
// $router->add("/home", ["controller" => "HomeController", "action" => "show"], "GET");
// $router->add("/product/list", ["controller" => "ProductListController", "action" => "show"], "GET");
// $router->add("/blog", ["controller" => "BlogController", "action" => "show"], "GET");
// $router->add("/contact", ["controller" => "ContactController", "action" => "show"], "GET");

// $router->add("/admin", ["controller" => "DashboardController", "action" => "show"], "GET");
// $router->add("/admin/dashboard", ["controller" => "DashboardController", "action" => "show"], "GET");
// $router->add("/admin/vouchers", ["controller" => "VouchersController", "action" => "show"], "GET");
// $router->add("/admin/users", ["controller" => "UserController", "action" => "show"], "GET");
// $router->add("/admin/create-user", ["controller" => "UserController", "action" => "add"], "GET");
$router->add("/admin/products", ["controller" => "ProductsController", "action" => "list"], "GET");
$router->add("/admin/product/add", ["controller" => "ProductsController", "action" => "add"], "GET");
$router->add("/admin/product/create", ["controller" => "ProductsController", "action" => "create"], "POST");
$router->add("/admin/product/edit/{id:\d+}", ["controller" => "ProductsController", "action" => "edit"], "GET");
$router->add("/admin/product/update/{id:\d+}", ["controller" => "ProductsController", "action" => "update"], "POST");
$router->add("/admin/product/delete/{id:\d+}", ["controller" => "ProductsController", "action" => "delete"], "GEt");
$router->add("/admin/category", ["controller" => "CategoryController", "action" => "list"], "GET");
$router->add("/admin/category/add", ["controller" => "CategoryController", "action" => "add"], "GET");
$router->add("/admin/category/create", ["controller" => "CategoryController", "action" => "create"], "POST");
$router->add("/admin/category/edit/{id:\d+}", ["controller" => "CategoryController", "action" => "edit"], "GET");
$router->add("/admin/category/update/{id:\d+}", ["controller" => "CategoryController", "action" => "update"], "POST");
$router->add("/admin/category/delete/{id:\d+}", ["controller" => "CategoryController", "action" => "delete"], "GEt");

// $router->add("/admin/allattribute", ["controller" => "UserController", "action" => "show"], "GET");
// $router->add("/admin/attribute", ["controller" => "AttributeController", "action" => "add"], "GET");
// $router->add("/admin/categories", ["controller" => "CategoryController", "action" => "show"], "GET");
// $router->add("/admin/category/add", ["controller" => "CategoryController", "action" => "add"], "GET");
// $router->add("/admin/brands", ["controller" => "BrandController", "action" => "show"], "GET");
// $router->add("/admin/brand/add", ["controller" => "BrandController", "action" => "add"], "GET");
// $router->add("/admin/comments", ["controller" => "CommentController", "action" => "show"], "GET");
// $router->add("/admin/orders", ["controller" => "OrdersController", "action" => "show"], "GET");


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
