<?php

namespace Src\Models\Admin;

use PDO;
use Exception;
use Src\Models\Model;
use PDOException;

class OrderModel extends Model
{
    protected $table = "orders";


    public function findAllOrders(): array
    {
        try {
            $sql = "SELECT 
                        o.id AS order_id, 
                        o.total_price, 
                        o.status, 
                        o.created_at, 
                        u.fullname AS user_name, 
                        u.phone AS user_phone, 
                        a.address AS user_address
                    FROM {$this->table} o
                    JOIN users u ON o.user_id = u.id
                    JOIN checkout_addresses a ON o.address_id = a.id
                    ORDER BY o.created_at DESC";

            return $this->database->getConnection()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return [];
        }
    }


    public function updateStatus(int $orderId, int $status): bool
    {
        try {
            $sql = "UPDATE {$this->table} SET status = ? WHERE id = ?";
            $stmt = $this->database->getConnection()->prepare($sql);
            return $stmt->execute([$status, $orderId]);
        } catch (PDOException $e) {
            $_SESSION['error'] = "Lỗi cập nhật trạng thái đơn hàng: " . $e->getMessage();
            return false;
        }
    }
    
}
