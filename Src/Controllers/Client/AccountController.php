<?php

namespace Src\Controllers\Client;

use Exception;
use  Src\Framework\Controller;
use Src\Models\Client\AddressModel;
use Src\Models\Client\UserModel;
use Src\Views\Client\Page\Account;
use Src\Views\Client\Layouts\Footer;
use Src\Views\Client\Layouts\Header;

class AccountController extends Controller
{
    public function show()
    {
        try {
            $id = $_SESSION['user_id'];
            $user = new UserModel;
            $data = $user->find($id);
            Header::render();
            Account::render($data);
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
