<?php

namespace Src\Views\Client\Page;

use Src\Views\Viewer;

class Card extends Viewer
{
    public static function render($data = [])
    {

?>
        <div class="shopping_cart_area">
            <form action="#">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Xóa</th>
                                            <th class="product_thumb">Ảnh sản phẩm</th>
                                            <th class="product_name">Tên sản phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product_quantity">Số lượng</th>
                                            <th class="product_total">Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $item): ?>

                                            <tr>

                                                <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                                <td class="product_thumb"><a href="#"><img style="width: 50px;" src="/public/Uploads/<?= htmlspecialchars($item['image'])  ?>" alt=""></a></td>
                                                <td class="product_name"><a href="#"><?= $item['name'] ?></a></td>
                                                <td class="product-price"><?= number_format($item['price']) ?></td>
                                                <td class="product_quantity"><input min="0" max="100" value="<?= $item['quantity'] ?>" type="number"></td>
                                                <td class="product_total"><?= number_format(($item['quantity'] * $item['price'])) ?> </td>


                                            </tr>


                                        <?php endforeach; ?>

                                    </tbody>
                                </table>

                            </div>
                            <div class="cart_submit">
                                <button type="submit">Cập nhật đơn hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <!-- <div class="col-lg-6 col-md-6">
                            <div class="coupon_code">
                                <h3>Coupon</h3>
                                <div class="coupon_inner">
                                    <p>Enter your coupon code if you have one.</p>
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Apply coupon</button>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code">
                                <h3>Đơn hàng</h3>
                                <div class="coupon_inner">
                                    <div class="cart_subtotal">
                                        <p>Tổng cộng</p>
                                        <?php
                                        $totalPrice = 0;
                                        foreach ($data as $item) {
                                            $totalPrice += intval($item['quantity']) * floatval($item['price']);
                                        }
                                        ?>
                                        <p class="cart_amount"> <?= number_format($totalPrice) ?> VNĐ</p>
                                    </div>
                                    <div class="cart_subtotal ">
                                        <p>Vận chuyển</p>
                                        <p class="cart_amount">Đơn hàng của bạn được miễn phí vận chuyển</p>
                                    </div>

                                    <div class="cart_subtotal">
                                        <p>Tổng đơn</p>
                                        <?php
                                        $totalPrice = 0;
                                        foreach ($data as $item) {
                                            $totalPrice += intval($item['quantity']) * floatval($item['price']);
                                        }
                                        ?>
                                        <p class="cart_amount"> <?= number_format($totalPrice) ?> VNĐ</p>
                                    </div>
                                    <div class="checkout_btn">
                                        <a href="#">Thanh toán</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form>
        </div>
<?php
    }
}
