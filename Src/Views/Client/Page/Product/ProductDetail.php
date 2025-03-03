<?php

namespace Src\Views\Client\Page\Product;

use Src\Views\Viewer;

class ProductDetail extends Viewer
{
    public static function render(array $data = [])
    {
?>
        <!--breadcrumbs area start-->
        <div class="breadcrumbs_area">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">Trang chủ</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>Chi tiết sản phẩm</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->


        <!--product wrapper start-->
        <div class="product_details">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="product_tab fix">
                        <div class="product_tab_button">
                            <ul class="nav" role="tablist">



                                <li>
                                    <a class="active" data-toggle="tab" href="#p_tab1" role="tab" aria-controls="p_tab1" aria-selected="false"> <img src="/public/Uploads/<?= isset($data['product']['image']) ? htmlspecialchars($data['product']['image']) : 'default.jpg' ?>" alt="">
                                    </a>
                                </li>



                            </ul>
                        </div>
                        <div class="tab-content produc_tab_c">
                            <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">

                                <div class="modal_img">
                                    <a href="#"><img src="/public/Uploads/<?= isset($data['product']['image']) ? htmlspecialchars($data['product']['image']) : 'default.jpg' ?>" alt="">

                                    </a>
                                    <div class="img_icone">
                                        <img src="/public/Uploads/<?= isset($data['product']['image']) ? htmlspecialchars($data['product']['image']) : 'default.jpg' ?>" alt="">


                                    </div>
                                    <div class="view_img">
                                        <a class="large_view" href="assets\img\product\product13.jpg"><i class="fa fa-search-plus"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="product_d_right">
                        <h1><?= $data['product']['name'] ?></h1>
                        <div class="product_ratting mb-10">
                            <ul>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"> Đánh giá</a></li>
                            </ul>
                        </div>
                        <div class="product_desc">
                            <?= $data['product']['description'] ?>
                        </div>

                        <div class="content_price mb-15">
                            <!-- <span class="old-price">$118.00</span> -->
                            <span><?= number_format($data['product']['price']) ?></span>
                        </div>
                        <div class="box_quantity mb-20">
                            <form action="/user/cart/add/<?= $data['product']['id'] ?>" method="post">
                                <label for="quantity">Số lượng</label>
                                <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>">
                                <input name="quantity" id="quantity" min="1" max="100" value="1" type="number" required>
                                <button type="submit"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                            </form>

                            <a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a>
                        </div>
                        <!-- <div class="product_d_size mb-20">
                            <label for="group_1">size</label>
                            <select name="size" id="group_1">
                                <option value="1">S</option>
                                <option value="2">M</option>
                                <option value="3">L</option>
                            </select>
                        </div> -->

                        <!-- <div class="sidebar_widget color">
                            <h2>Choose Color</h2>
                            <div class="widget_color">
                                <ul>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li> <a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                </ul>
                            </div>
                        </div> -->

                        <!-- <div class="product_stock mb-20">
                            <p>299 items</p>
                            <span> In stock </span>
                        </div> -->
                        <!-- <div class="wishlist-share">
                            <h4>Share on:</h4>
                            <ul>
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
        <!--product details end-->



        </div>
        <!--pos page inner end-->
        </div>
        </div>
<?php

    }
}
