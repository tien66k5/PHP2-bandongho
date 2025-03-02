<?php

namespace   Src\Models\Admin;

use Src\Models\Model;
use PDOException;
use Exception;
class UserModel extends Model
{
    protected $table = "users";
    public function existsByEmail(string $email): bool
    {
        try {
            $sql = "SELECT COUNT(*) FROM {$this->table} WHERE email = ?";
            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->execute([$email]);

            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            throw new Exception("Lỗi kiểm tra email: " . $e->getMessage());
        }
    }
}
