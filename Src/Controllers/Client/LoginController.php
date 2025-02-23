<?php

namespace   Src\Controllers\Client;

use Src\Framework\Controller;
use Exception;
use Src\Views\Client\Layouts\Footer;
use Src\Views\Client\Layouts\Header;
use Src\Views\Client\Page\Login;
use Src\Models;
use Src\Models\Client\LoginModels;
use Src\Validations\ValidateEmpty;
class LoginController extends Controller
{
    public function add()
    {
        Header::render();
        Login::render();
        Footer::render();
    }

    public function create()
    {
        try {
            $data = [
                'email' => $_POST['email'] ?? '',
                'password' => $_POST['password'] ?? null,
                'confirmPassword' => $_POST['confirmPassword'] ?? null,
            ];

            $errors = [];
            $model = new LoginModels();
            // var_dump($data);
            $errors = ValidateEmpty::validateEmpty($data);

            if (empty($data['email']) || empty($data['password']) || empty($data['confirmPassword'])) {
                $errors[] = "Không được bỏ trống trường nào!";
            }
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email không hợp lệ!";
            }
            if ($data['password'] !== $data['confirmPassword']) {
                $errors[] = "Mật khẩu không khớp!";
            }
            if (strlen($data['password']) < 6 || strlen($data['password']) > 13) {
                $errors[] = "Mật khẩu phải từ 6 đến 13 ký tự";
            }
            if (!preg_match('/[A-Z]/', $data['password'])) {
                $errors[] = "Mật khẩu phải chứa ít nhất một chữ hoa!";
            }
            if (!preg_match('/[0-9]/', $data['password'])) {
                $errors[] = "Mật khẩu phải chứa ít nhất một số!";
            }
            if ($model->existsByEmail($data['email'])) {
                $errors[] = "Email này đã được đăng ký!";
            }
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo $error . "<br>";
                }
                return;
            }
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
            unset($data['confirmPassword']);

            $record = $model->insert($data);

            if (!$record) {
                echo ("Không thể đăng ký tài khoản!");
            }

            header("Location: /login");
            exit;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            exit;
        }
    }
    public function login()
{
    try {
        $data = [
            'email' => $_POST['email'] ?? '',
            'password' => $_POST['password'] ?? '',
        ];

        $errors = ValidateEmpty::validateEmpty($data);

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email không hợp lệ!";
        }

        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
            return;
        }

        $model = new LoginModels();
        $user = $model->login($data['email'], $data['password']); 

        if (!$user) {
            echo "Sai email hoặc mật khẩu!";
            return;
        }   

        header("Location: /home");
        exit;
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
        exit;
    }
}
public function logout()
{
    session_unset(); 
    header("Location: /login");
    exit;
}

}
