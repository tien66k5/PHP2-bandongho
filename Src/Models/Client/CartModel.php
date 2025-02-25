<?php

namespace Src\Models\Client;

use PDO;
use PDOException;
use Exception;
use Src\Models\Model;

class CartModel extends Model
{
    protected $table = "carts";


    public function findProductInCart(int $userId, array $productIds): array
    {
        try {
            $placeholders = implode(',', array_fill(0, count($productIds), '?'));
            $sql = "SELECT 
                        carts.id AS cart_id,
                        carts.user_id,
                        carts.product_id,
                        carts.cart_quantity AS cart_quantity, 
                        products.name AS product_name,
                        products.price AS product_price,
                        products.image AS product_image
                    FROM carts
                    JOIN products ON carts.product_id = products.id
                    WHERE carts.user_id = ? AND carts.product_id IN ($placeholders)";

            $stmt = $this->database->getConnection()->prepare($sql);

            // Ghép $userId với danh sách product_id
            $params = array_merge([$userId], $productIds);

            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi truy vấn database: " . $e->getMessage();
            return [];
        }
    }


    public function insert(array $data): int
    {
        try {
            if (!isset($data['user_id'], $data['product_id'], $data['cart_quantity'])) {
                throw new Exception("Dữ liệu không hợp lệ.");
            }

            return parent::insert($data);
        } catch (PDOException $e) {
            throw new Exception("Lỗi khi thêm sản phẩm vào giỏ hàng: " . $e->getMessage());
        }
    }


    public function updateCart(int $cartId, array $data): bool
    {
        try {
            return parent::update($cartId, $data);
        } catch (PDOException $e) {
            throw new Exception("Lỗi khi cập nhật giỏ hàng: " . $e->getMessage());
        }
    }


    public function removeProduct(int $cartId): bool
    {
        return $this->delete($cartId);
    }

    public function clearCart(int $userId): bool
    {
        try {
            $sql = "DELETE FROM {$this->table} WHERE id = ?";
            $stmt = $this->database->getConnection()->prepare($sql);
            return $stmt->execute([$userId]);
        } catch (PDOException $e) {
            throw new Exception("Lỗi khi xóa giỏ hàng: " . $e->getMessage());
        }
    }
    public function deleteCartItem(int $cartId): bool
    {
        try {
            $sql = "DELETE FROM carts WHERE id = ?";
            $stmt = $this->database->getConnection()->prepare($sql);
            return $stmt->execute([$cartId]);
        } catch (PDOException $e) {
            throw new Exception("Lỗi khi xóa sản phẩm khỏi giỏ hàng: " . $e->getMessage());
        }
    }
    
}
