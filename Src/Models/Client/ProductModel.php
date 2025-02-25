<?php

namespace   Src\Models\Client;

use Src\Models\Model;

class ProductModel extends Model
{
    protected $table = "products";



    // public function findByIds($ids)
    // {
    //     // Lấy các sản phẩm từ cơ sở dữ liệu dựa trên mảng id
    //     $idsPlaceholder = implode(',', array_fill(0, count($ids), '?'));
    //     $sql = "SELECT * FROM products WHERE id IN ($idsPlaceholder)";
    //     $stmt = $this->database->getConnection()->prepare($sql);
    //     $stmt->execute($ids);
    //     return $stmt->fetchAll();
    // }
}
