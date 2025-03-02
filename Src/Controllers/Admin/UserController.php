<?php

namespace Src\Controllers\Admin;

use Src\Framework\Controller;
use Src\Models\Admin\UserModel;
use Src\Validations\ValidateEmpty;
use Src\Views\Admin\Layouts\Footer;
use Src\Views\Admin\Layouts\Header;
use Src\Views\Admin\Pages\Users\UserAdd;
use Src\Views\Admin\Pages\Users\UserEdit;
use Src\Views\Admin\Pages\Users\UsersList;
use Exception;

class UserController extends Controller
{
    public function show()
    {
        $userModel = new UserModel();
        $data = $userModel->findAll();
        Header::render();
        UsersList::render($data);
        Footer::render();
    }
    public function add()
    {
        Header::render();
        UserAdd::render();
        Footer::render();
    }




    public function create()
    {
        try {
            $data = [
                'fullname'     => $_POST['name'] ?? '',
                'email'    => $_POST['email'] ?? '',
                'password' => $_POST['password'] ?? null,
                'phone'    => $_POST['phone'] ?? '',
                'role'     => $_POST['role'] ?? '0',
            ];

            $errors = [];
            $model = new UserModel();

            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email không hợp lệ!";
            }

            if (strlen($data['password']) < 6 || strlen($data['password']) > 13) {
                $errors[] = "Mật khẩu phải từ 6 đến 13 ký tự!";
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

            if (!preg_match('/^[0-9]{10,11}$/', $data['phone'])) {
                $errors[] = "Số điện thoại không hợp lệ!";
            }

            if (!empty($errors)) {
                $_SESSION['error'] = implode("<br>", $errors);
                header("Location: /admin/users/add");
                exit;
            }

            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

            $record = $model->insert($data);

            if (!$record) {
                $_SESSION['error'] = "Không thể đăng ký tài khoản!";
                header("Location: /admin/users/add");
                exit;
            }

            $_SESSION['success'] = "Đăng ký thành công!";
            header("Location: /admin/users");
            exit;
        } catch (Exception $e) {
            $_SESSION['error'] = "Lỗi: " . $e->getMessage();
            header("Location: /admin/users/add");
            exit;
        }
    }
    public function edit(int $id)
    {
        $UserModel = new UserModel();
        $data = $UserModel->find($id);
        // var_dump($data);
        Header::render();
        UserEdit::render($data);
        Footer::render();
    }


    public function update(int $id)
    {
        try {
            $userId = $_POST['id'] ?? null;
    
            if (!$userId) {
                $_SESSION['error'] = "Thiếu ID người dùng!";
                header("Location: /admin/users/edit/" . $id);
                exit;
            }
    
            $model = new UserModel();
            $existingUser = $model->find($id);
    
            if (!$existingUser) {
                $_SESSION['error'] = "Người dùng không tồn tại!";
                header("Location: /admin/users");
                exit;
            }
    
            $data = [
                'fullname' => $_POST['name'] ?? '',
                'email'    => $_POST['email'] ?? '',
                'phone'    => $_POST['phone'] ?? '',
                'role'     => $_POST['role'] ?? '0',
                'password' => $_POST['password'] ?? null, 
            ];
    
            $errors = [];
    
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email không hợp lệ!";
            }
    
            if (!preg_match('/^[0-9]{10}$/', trim($data['phone']))) {
                $errors[] = "Số điện thoại không hợp lệ!";
            }
    
            if ($existingUser['email'] != $_POST['email']) {
                if ($model->existsByEmail($data['email'])) {
                    $errors[] = "Email này đã được đăng ký!";
                }
            }
    
            if (!empty($data['password'])) {
                if (strlen($data['password']) < 6 || strlen($data['password']) > 13) {
                    $errors[] = "Mật khẩu phải từ 6 đến 13 ký tự!";
                }
    
                if (!preg_match('/[A-Z]/', $data['password'])) {
                    $errors[] = "Mật khẩu phải chứa ít nhất một chữ hoa!";
                }
    
                if (!preg_match('/[0-9]/', $data['password'])) {
                    $errors[] = "Mật khẩu phải chứa ít nhất một số!";
                }
    
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
            } else {
                $data['password'] = $existingUser['password'];
            }
    
            if (!empty($errors)) {
                $_SESSION['error'] = implode("<br>", $errors);
                header("Location: /admin/users/edit/" . $id);
                exit;
            }
    
            $update = $model->update($id, $data);
    
            if (!$update) {
                $_SESSION['error'] = "Không thể cập nhật thông tin người dùng!";
                header("Location: /admin/users/edit/" . $id);
                exit;
            }
    
            $_SESSION['success'] = "Cập nhật thông tin thành công!";
            header("Location: /admin/users");
            exit;
        } catch (Exception $e) {
            $_SESSION['error'] = "Lỗi: " . $e->getMessage();
            header("Location: /admin/users/edit/" . $id);
            exit;
        }
    }
    


    public function delete(int $id)
    {
        try {
            $model = new UserModel();
            $user = $model->find($id);

            if (!$user) {
                throw new Exception("Người dùng không tồn tại : ID $id");
            }

            if ($model->delete($id)) {

                header("Location: /admin/users");
            } else {

                echo "Xóa người dùng không thành công";
            }
        } catch (Exception $e) {

            echo "Lỗi: " . $e->getMessage();
        }
    }
}
