<?php

namespace Src\Controllers\Client;

use Exception;
use  Src\Framework\Controller;
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
}
