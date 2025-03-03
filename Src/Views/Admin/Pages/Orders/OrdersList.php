<?php

namespace Src\Views\Admin\Pages\Orders;

use Src\Views\Viewer;

class OrdersList extends Viewer
{
    public static function render($data = [])
    {

?>
        <style>
            .form-select {
                text-align: center;
                width: 110px;
                display: block;
                padding: 10px;
                -moz-padding-start: calc(0.75rem - 3px);
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                background-color: #fff;
                background-repeat: no-repeat;
                background-position: right .75rem center;
                background-size: 16px 12px;
                border: 1px solid #ced4da;
                border-radius: .25rem;
                transition: border-color .15sease-in-out, box-shadow .15sease-in-out;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
            }
        </style>
        <div class="container col-10">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="table-responsive pt-3">
                            <table class="table table-striped project-orders-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên người mua</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Tổng giá sản phẩm</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($data)): ?>
                                        <?php foreach ($data as $order): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($order['order_id']) ?></td>
                                                <td><?= htmlspecialchars($order['user_name']) ?></td>
                                                <td><?= htmlspecialchars($order['user_phone']) ?></td>
                                                <td><?= htmlspecialchars($order['user_address']) ?></td>
                                                <td><?= number_format($order['total_price'], 0, ',', '.') ?> VND</td>

                                                <td>
                                                    <form method="POST" action="/admin/order/update">
                                                        <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
                                                        <select class="form-select" name="status" onchange="this.form.submit()">
                                                            <?php
                                                            $statuses = [
                                                                1 => "Chờ duyệt",
                                                                2 => "Đã duyệt",
                                                                3 => "Đã giao",
                                                                4 => "Đã hủy"
                                                            ];
                                                            foreach ($statuses as $value => $label) {
                                                                if ($value < $order['status']) {
                                                                    continue;
                                                                }
                                                                $selected = ($order['status'] == $value) ? 'selected' : '';
                                                                echo "<option value='$value' $selected>$label</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Không có đơn hàng.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}
?>