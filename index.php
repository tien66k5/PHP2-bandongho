<?php
// phpinfo();
ob_start();
// print_r(PDO::getAvailableDrivers());
define("ROOT_PATH", __DIR__);
// echo ROOT_PATH;
if (!file_exists(ROOT_PATH . "/uploads")) {
}
require_once 'vendor/autoload.php';


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE);
ini_set('error_log', './logs/php-errors.log');



use Src\Route;

$router = new Route();



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
$router->add("/admin/product/delete/{id:\d+}", ["controller" => "ProductsController", "action" => "delete"], "GET");
// $router->add("/admin/allattribute", ["controller" => "UserController", "action" => "show"], "GET");
// $router->add("/admin/attribute", ["controller" => "AttributeController", "action" => "add"], "GET");
// $router->add("/admin/categories", ["controller" => "CategoryController", "action" => "show"], "GET");
// $router->add("/admin/category/add", ["controller" => "CategoryController", "action" => "add"], "GET");
// $router->add("/admin/brands", ["controller" => "BrandController", "action" => "show"], "GET");
// $router->add("/admin/brand/add", ["controller" => "BrandController", "action" => "add"], "GET");
// $router->add("/admin/comments", ["controller" => "CommentController", "action" => "show"], "GET");
// $router->add("/admin/orders", ["controller" => "OrdersController", "action" => "show"], "GET");

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$params = $router->match($path, $_SERVER['REQUEST_METHOD']);

if ($params === false) {
    exit("Trang không tồn tại! 404 Not Found");
}

$controllerName = $params['controller'];
$action = $params['action'];

$controllerClass = "\\Src\\Controllers\\Admin\\" . $controllerName;
if (!class_exists($controllerClass)) {
    echo $controllerClass;
    echo '<\n>';
    exit("Controller không tồn tại! 404 Not Found");
}

$controller = new $controllerClass();
if (!method_exists($controller, $action)) {
    exit("Action không tồn tại! 404 Not Found");
}

$request = Src\Framework\Request::createFromGlobal();
$response = new Src\Framework\Response();

$id = isset($params['id']) ? $params['id'] : null;
$action = isset($params['action']) ? $params['action'] : 'index';

$controlllerObject = new $controller();
$controlllerObject->setRequest($request);
$controlllerObject->setResponse($response);
$controlllerObject->$action($id);
