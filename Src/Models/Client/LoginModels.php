<?php

namespace   Src\Models\Client;

use Src\Models\Model;
use PDOException;
use Exception;
use Pdo;

class LoginModels extends Model
{
    protected $table = "users";
    public function existsByEmail(string $email): bool
    {
        try {
            $sql = "SELECT COUNT(*) FROM {$this->table} WHERE email = ?";
            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->execute([$email]);

            return $stmt->fetchColumn() > 0; // Trả về true nếu có email trong DB
        } catch (PDOException $e) {
            throw new Exception("Lỗi kiểm tra email: " . $e->getMessage());
        }
    }
    public function login(string $email, string $password): bool
    {
        try {
            $sql = "SELECT * FROM  {$this->table} WHERE email = ?";
            $stmt = $this->database->getConnection()->prepare(query: $sql);
            $stmt->execute([$email]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                return false;
            }

            // Kiểm tra mật khẩu
            if (!password_verify($password, $user['password'])) {
                return false;
            }

            // Lưu thông tin người dùng vào session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];

            return true;
        } catch (PDOException $e) {
            throw new Exception("Lỗi đăng nhập: " . $e->getMessage());
        }
    }
}
