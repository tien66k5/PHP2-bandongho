<?php

namespace Src\Controllers\Client;

use Exception;
use  Src\Framework\Controller;
use Src\Models\Client\AddressModel;
use Src\Models\Client\OrderDetailModel;
use Src\Models\Client\OrdersModels;
use Src\Models\Client\UserModel;
use Src\Views\Client\Page\Account;
use Src\Views\Client\Layouts\Footer;
use Src\Views\Client\Layouts\Header;
use Src\Views\Client\Page\OrderDetail;

class AccountController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['error'] = "Lỗi: Vui lòng đăng nhập! ";
            header("Location: /login");

            exit;
        }
    }
    public function show()
    {
        try {
            $id = $_SESSION['user_id'];
            $userModel = new UserModel;
            $dataUser = $userModel->find($id);

            $ordersModel = new OrdersModels;
            $dataOder = $ordersModel->findAll();
            Header::render();
            // var_dump($dataOder);
            Account::render([
                'user' => $dataUser,
                'orders' => $dataOder
            ]);
            Footer::render();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function showOder()
    {
        try {
            $id = $_SESSION['user_id'];
            $user = new OrdersModels;
            $data = $user->find($id);
            Header::render();
            Account::render($data);
            Footer::render();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function showOderDetail($id)
    {
        try {
            $user = new OrderDetailModel;
            $data = $user->findOrderDetail($id);
            // echo '<pre>';
            // var_dump($data);
            Header::render();
            OrderDetail::render($data);
            Footer::render();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


    // public function createAddress()
    // {
    //     $city = $_POST['city'] ?? null;
    //     $district = $_POST['district'] ?? null;
    //     $ward = $_POST['ward'] ?? null;
    //     $address = $_POST['address'] ?? null;
    //     $phone = $_POST['phone'] ?? null;

    //     $user_id = $_SESSION['user_id'];

    //     $data = [
    //         'user_id' => $user_id,
    //         'province_id' => $city,
    //         'district_id' => $district,
    //         'ward_id' => $ward,
    //         'address' => $address,
    //         'phone' => $phone,
    //         'status' => 1
    //     ];

    //     $model = new AddressModel();
    //     $model->insert($data);
    // }
}
