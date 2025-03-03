<?php

namespace Src\Controllers\Admin;

use Src\Framework\Controller;
use Src\Middleware\AuthMiddleware;
use Src\Models\Admin\OrderModel;
use Src\Views\Admin\Layouts\Footer;
use Src\Views\Admin\Layouts\Header;
use Src\Views\Admin\Pages\Orders\OrdersList;

class OrdersController extends Controller
{

    public function __construct()
    {
        AuthMiddleware::checkAdmin();
    }
    public function show()
    {
        $orderModel = new OrderModel();
        $orders = $orderModel->findAllOrders();
        // var_dump(  $orders)
        Header::render();
        OrdersList::render($orders);
        Footer::render();
    }
    public function updateStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['order_id']) || !isset($_POST['status'])) {
                $_SESSION['error'] = "Dữ liệu không hợp lệ!";
                header("Location: /admin/orders");
                exit;
            }

            $orderId =  $_POST['order_id'];
            $status =  $_POST['status'];

            if ($orderId <= 0 || !in_array($status, [0, 1, 2, 3])) {
                $_SESSION['error'] = "Trạng thái đơn hàng không hợp lệ!";
                header("Location: /admin/orders");
                exit;
            }

            $orderModel = new OrderModel();
            if (!$orderModel->updateStatus($orderId, $status)) {
                $_SESSION['error'] = "Không thể cập nhật trạng thái đơn hàng!";
                header("Location: /admin/orders");
                exit;
            }

            $_SESSION['success'] = "Cập nhật trạng thái đơn hàng thành công!";
            header("Location: /admin/orders");
            exit;
        }

        $_SESSION['error'] = "Yêu cầu không hợp lệ!";
        header("Location: /admin/orders");
        exit;
    }
}
