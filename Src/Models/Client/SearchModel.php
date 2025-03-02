<?php

namespace Src\Models\Client;

use Src\Models\Model;
use PDO;
use PDOException;

class SearchModel extends Model
{
    protected $table = "products";

    public function search($keyword): array
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE name LIKE :keyword";
            $conn = $this->database->getConnection();
            $stmt = $conn->prepare($sql);

            $searchTerm = "%{$keyword}%";
            $stmt->bindParam(":keyword", $searchTerm, PDO::PARAM_STR);

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi khi tìm kiếm sản phẩm: " . $e->getMessage();
            return [];
        }
    }
}
