<?php

namespace Src\Controllers\Client;

use Src\Framework\Controller;
use Src\Models\Client\CartModel;
use Src\Models\Client\UserModel;
use Src\Views\Client\Layouts\Header;
use Src\Views\Client\Layouts\Footer;
use Exception;
use Src\Views\Client\Page\Card;
use Src\Views\Client\Page\Checkout;

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

            // Kiểm tra nếu giỏ hàng rỗng
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
            // echo '<pre>';
            // var_dump($data);
            Header::render();
            Checkout::render($data);
            Footer::render();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function checkouts() {
        echo '<pre>';
        var_dump($_POST);
        
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
