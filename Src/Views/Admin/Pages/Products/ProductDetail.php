<?php

namespace Src\Views\Admin\Pages\Products;

use Src\Views\Viewer;

class ProductDetail extends Viewer
{
    public static function render(array $data = [])
    {
        // echo '<pre>';
        // var_dump($data);
?>
        <div class="col-lg-10 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <h4>Chi tiết sản phẩm</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="/public/uploads/<?= htmlspecialchars($data['image']) ?>" alt="<?= htmlspecialchars($data['name']) ?>" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h5><?= htmlspecialchars($data['name']) ?></h5>
                            <p>Mô tả:</p>
                            <div><?= htmlspecialchars_decode($data['description']); ?></div>
                            <p>Giá: <?= number_format($data['price'], 0, ',', '.') ?> VND</p>
                            <p>Trạng thái: <?= $data['status'] ? 'Hoạt động' : 'Ngừng bán' ?></p>
                            <p>Ngày tạo: <?= date('d/m/Y', strtotime($data['created_at'])); ?></p>
                            <p>Ngày cập nhật: <?= date('d/m/Y', strtotime($data['updated_at'])); ?></p>
                            <a href="../edit/<?= $data['id'] ?>" class="btn btn-primary">Sửa</a>
                            <a href="../delete/<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn chắc chứ?')">Xóa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php
    }
}
