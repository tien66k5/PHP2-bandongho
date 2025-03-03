<?php

namespace   Src\Models\Client;

use Src\Models\Model;
use PDOException;
use Pdo;

class OrderDetailModel extends Model
{
    protected $table = "order_details";
    public function findOrderDetail(int | string $id): array
    {
        try {
            $sql = "SELECT 
                o.id AS order_id,
                p.name AS product_name,
                p.price AS product_price,
                od.quantity AS quantity,
                o.created_at AS order_date,
                o.status AS order_status
            FROM orders o
            JOIN order_details od ON o.id = od.order_id
            JOIN products p ON od.product_id = p.id
            WHERE o.id = ?";

            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->execute([$id]);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $records ?: [];
        } catch (PDOException $e) {
            die("Lỗi truy vấn: " . $e->getMessage());
        }
    }
}
