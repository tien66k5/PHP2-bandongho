<?php

namespace   Src\Models\Client;

use Src\Models\Model;
use PDOException;
use Exception;

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

}
