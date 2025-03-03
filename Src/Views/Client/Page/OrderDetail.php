<?php

namespace Src\Views\Client\Page;

use Src\Views\Viewer;

class OrderDetail extends Viewer
{
    public static function render($data = [])
    {
?>
        <div class="container mt-5">
            <h2 class="mb-4">Chi Tiết Đơn Hàng</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Ngày Tạo</th>
                        <th>Ngày Cập Nhật</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $order) : ?>
                        <tr>
                            <td><?= $order["order_id"] ?></td>
                            <td><?= $order["product_name"] ?></td>
                            <td><?= number_format($order["product_price"], 0, ',', '.') ?> VND</td>
                            <td><?= $order["quantity"] ?></td>
                            <td><?= $order["order_date"] ?></td>
                            <td><?= $order["order_status"] == 0 ? 'Đang xử lý' : 'Hoàn thành' ?></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>

            </table>
        </div>
<?php
    }
}
