<?php

namespace Src\Controllers\Client;

use Src\Framework\Controller;
use Src\Models\Client\AddressModel;
use Src\Models\Client\CartModel;
use Src\Models\Client\OrderDetailModel;
use Src\Models\Client\OrdersModels;
use Src\Models\Client\UserModel;
use Src\Views\Client\Layouts\Header;
use Src\Views\Client\Layouts\Footer;
use Exception;
use Src\Models\Client\OrdersDetailModels;
use Src\Views\Client\Page\Card;
use Src\Views\Client\Page\Checkout;
use Src\Notifications\Notification;
use Cake\Database\Query;

class CartController extends Controller
{


    public function show() {}

    public function showCart()
    {
        try {
            $model = new CartModel();
            $cartItems = $model->findAll();
            $userId = $_SESSION['user_id'] ?? null;

            if (!$userId) {
                header("Location: /login");
                $_SESSION['error'] = "Lỗi: Vui lòng đăng nhập! ";
                exit();
            }

            $productIds = array_column($cartItems, 'product_id');

            // Kiểm tra nếu giỏ hàng rỗng
            if (empty($productIds)) {
                $data = [];
            } else {
                $data = $model->findProductInCart($userId, $productIds);
            }

            Header::render();
            Card::render($data);
            Footer::render();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!isset($_SESSION['user_id'])) {
                header("Location: /login");
                exit();
            }

            $userId = $_SESSION['user_id'];
            $productId = $_POST['product_id'] ?? null;
            $quantity = $_POST['quantity'] ?? 1;

            if (!$productId || $quantity <= 0) {
                header("Location: /list");
                exit();
            }

            $cartModel = new CartModel();

            try {
                $findExisted = $cartModel->findProductInCart($userId, [$productId]);

                if (!empty($findExisted)) {
                    // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
                    $newQuantity = $findExisted[0]['cart_quantity'] + $quantity;
                    $cartModel->updateCart($findExisted[0]['cart_id'], ['cart_quantity' => $newQuantity]);
                } else {
                    // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
                    $cartModel->insert([
                        'user_id' => $userId,
                        'product_id' => $productId,
                        'cart_quantity' => $quantity
                    ]);
                }

                header("Location: /user/cart");
                exit();
            } catch (Exception $e) {
                echo "Lỗi: " . $e->getMessage();
                exit();
            }
        } else {
            header("Location: /");
            exit();
        }
    }



    public function checkout()
    {
        try {
            $userId = $_SESSION['user_id'] ?? null;

            $CartModel = new CartModel();
            $cartItems = $CartModel->findAll();

            $productIds = array_column($cartItems, 'product_id');

            if (empty($productIds)) {
                $dataCart = [];
            } else {
                $dataCart = $CartModel->findProductInCart($userId, $productIds);
            }
            $user = new UserModel();
            $dataUser = $user->find($userId);
            $data = [
                'dataCart' => $dataCart,
                'dataUser' =>  $dataUser
            ];
            Header::render();
            Checkout::render($data);
            Footer::render();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function processCheckout()
    {
        try {
            // Lấy dữ liệu từ request và xử lý đầu vào
            $total_price = (int) str_replace(',', '', $_POST['totalPrice'] ?? 0);
            $user_id = $_POST['user_id'] ?? null;
            $phone = $_POST['phone'] ?? null;
            $detailedAddress = $_POST['detailedAddress'] ?? '';

            if (!$user_id) {
                throw new Exception('Lỗi: Thiếu thông tin người dùng.');
            }

            if ($total_price <= 0) {
                throw new Exception('Lỗi: Tổng giá trị đơn hàng không hợp lệ.');
            }

            // Tạo địa chỉ giao hàng
            $fullAddress = trim(
                ($_POST['tinh_ten'] ?? '') . ', ' .
                    ($_POST['quan_ten'] ?? '') . ', ' .
                    ($_POST['phuong_ten'] ?? '') . ', ' .
                    ($_POST['detailedAddress'] ?? '')
            );

            $addressModel = new AddressModel();
            $address_id = $addressModel->insert([
                'user_id' => $user_id,
                'address' => $fullAddress,
                'phone' => $phone,
                'status' => 1
            ]);

            if (!$address_id) {
                throw new Exception('Lỗi: Không thể tạo địa chỉ giao hàng.');
            }

            // Tạo đơn hàng
            $orderModel = new OrdersModels();
            $order_id = $orderModel->insert([
                'total_price' => $total_price,
                'user_id' => $user_id,
                'address_id' => $address_id
            ]);

            if (!$order_id) {
                throw new Exception('Lỗi: Không thể tạo đơn hàng.');
            }

            // Lấy danh sách sản phẩm trong giỏ hàng
            $cartModel = new CartModel();
            $cartItems = $cartModel->getCartByUser($user_id);

            if (!$cartItems) {
                throw new Exception('Lỗi: Giỏ hàng trống.');
            }

            $orderDetailModel = new OrderDetailModel();

            foreach ($cartItems as $item) {
                // Thêm chi tiết đơn hàng (không cần kiểm tra bảng product_skus)
                $orderDetailModel->insert([
                    'order_id' => $order_id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['product_price']
                ]);
            }

            // Xóa giỏ hàng sau khi đặt hàng thành công
            $cartModel->clearCart($user_id);

            // Chuyển hướng đến trang cảm ơn
            header("Location: /thank");
            exit;
        } catch (Exception $e) {
            echo $e->getMessage();
            return;
        }
    }


    public function removeItem()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart_id'])) {
            $cartId = intval($_POST['cart_id']);
            $cartModel = new CartModel();

            try {
                $cartModel->deleteCartItem($cartId);

                header("Location: /user/cart");
                exit();
            } catch (Exception $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        }
    }
}
