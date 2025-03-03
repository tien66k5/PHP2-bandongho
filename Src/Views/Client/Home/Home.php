<?php

namespace Src\Views\Client\Home;

use Src\views\Viewer;

class Home extends Viewer
{
    public static function render(array $data = [])
    {

?>
        <!--pos home section-->
        <div class=" pos_home_section">
            <div class="row pos_home">
                <div class="col-lg-3 col-md-8 col-12">
                    <!--sidebar banner-->
                    <!-- <div class="sidebar_widget banner mb-35">
                        <div class="banner_img mb-35">
                            <a href="#"><img src="<?= getenv('APP_URL')  ?>/public/Assets/img/banner/banner5.jpg" alt=""></a>
                        </div>
                        <div class="banner_img">
                            <a href="#"><img src="<?= getenv('APP_URL')  ?>/public/Assets/img/banner/banner6.jpg" alt=""></a>
                        </div>
                    </div> -->
                    <!--sidebar banner end-->

                    <!--categorie menu start-->
                    <div class="sidebar_widget catrgorie mb-35">
                        <h3>Loại sản phẩm</h3>
                        <ul>
                            <?php
                            if (empty($data['categories'])): ?>
                                <p>Không có sản phẩm nào!</p>

                                <?php else:
                                foreach ($data['categories'] as $category): ?>

                                    <li class="has-sub"><a href="#"><i class="fa fa-caret-right"></i><?= $category['name'] ?></a>
                                        <!-- <ul class="categorie_sub">
                                            <li><a href="#"><i class="fa fa-caret-right"></i> Accessories</a>
                                                <ul class="categorie_sub">
                                                    <li><a href="#"><i class="fa fa-caret-right"></i> Accessories</a></li>
                                                    <li><a href="#"><i class="fa fa-caret-right"></i> Dresses</a></li>
                                                    <li><a href="#"><i class="fa fa-caret-right"></i> Tops</a></li>
                                                    <li><a href="#"><i class="fa fa-caret-right"></i> HandBags</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#"><i class="fa fa-caret-right"></i> Dresses</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right"></i> Tops</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right"></i> HandBags</a></li>
                                        </ul> -->
                                    </li>
                            <?php endforeach;
                            endif; ?>

                        </ul>
                    </div>
                    <!--categorie menu end-->

                    <!--wishlist block start-->
                    <div class="sidebar_widget wishlist mb-35">
                        <div class="block_title">
                            <h3><a href="#">Sản phẩm yêu thích</a></h3>
                        </div>
                        <?php
                        if (empty($data['products'])): ?>
                            <p>Không có sản phẩm nào!</p>

                            <?php else:
                            $limitedProducts = array_slice($data['products'], 0, 2); // Chỉ lấy 2 sản phẩm đầu tiên
                            foreach ($limitedProducts as $product): ?>
                                <div class="cart_item">
                                    <div class="cart_img">
                                        <a href="#"><img src="/public/Uploads/<?= htmlspecialchars($product['image']) ?>" alt=""></a>
                                    </div>
                                    <div class="cart_info">
                                        <a href="#"><?= htmlspecialchars($product['name']); ?></a>
                                        <span class="cart_price"><?= number_format($product['price'], 0, ',', '.'); ?> VND</span>
                                    </div>
                                   
                                </div>
                        <?php endforeach;
                        endif; ?>

                      
                    </div>
                    <!--wishlist block end-->

                    <!--popular tags area-->
                    <div class="sidebar_widget tags mb-35">
                        <div class="block_title">
                            <h3>Loại phổ biến</h3>
                        </div>
                        <div class="block_tags">
                            <?php
                            if (empty($data['categories'])): ?>
                                <p>Không có sản phẩm nào!</p>

                                <?php else:
                                foreach ($data['categories'] as $category): ?>

                                    <a href="#"><?= $category['name'] ?></a>
                            <?php endforeach;
                            endif; ?>

                        </div>
                    </div>
                    <!--popular tags end-->

                    <!--newsletter block start-->
                    <!-- <div class="sidebar_widget newsletter mb-35">
                        <div class="block_title">
                            <h3>Bản tin</h3>
                        </div>
                        <form action="#">
                            <p>Đăng ký nhận bản tin của bạn</p>
                            <input placeholder="Your email address" type="text">
                            <button type="submit">Subscribe</button>
                        </form>
                    </div> -->
                    <!--newsletter block end-->

                    <!--sidebar banner-->
                    <div class="sidebar_widget bottom ">
                        <div class="banner_img">
                            <a href="#"><img style=" border-radius:10px;" src="https://img.freepik.com/free-psd/black-friday-product-sale-social-media-post-design-template_47987-24560.jpg?t=st=1740919759~exp=1740923359~hmac=36d4f52851093bf5bc5d8018f344c098bef554e5ea685a07a1f83285cf655dc6&w=740" alt=""></a>
                        </div>
                    </div>
                    <!--sidebar banner end-->



                </div>
                <div class="col-lg-9 col-md-12">
                    <!--banner slider start-->
                    <div class="banner_slider slider_1">
                        <div class="slider_active owl-carousel">
                            <div class="single_slider" style="background-image: url(https://cdn.hoanghamobile.com/Uploads/2024/04/16/laptop-4.jpg)">
                                <div class="slider_content">
                                    <div class="slider_content_inner">
                                        <h1>Laptop gaming</h1>
                                        <p>Laptop Gaming – Sự Lựa Chọn Hoàn Hảo Cho Game Thủ </p>
                                        <a href="#">Xem ngay</a>
                                    </div>
                                </div>
                            </div>
                            <div class="single_slider" style="background-image: url(https://cdn.thewirecutter.com/wp-content/media/2024/07/laptopsunder500-2048px-5452.jpg)">
                                <div class="slider_content">
                                    <div class="slider_content_inner">
                                        <h1>Laptop Đồ Họa</h1>
                                        <p>Dành Cho Designer, Editor, Kỹ Sư</p>
                                        <a href="#">Xem ngay</a>
                                    </div>
                                </div>
                            </div>
                            <div class="single_slider" style="background-image: url(https://hanoicomputercdn.com/media/product/84654_laptop_hp_15_fd1058tu_9z2x6pa_ultra_7_155u_16gb_ram_1tb_ssd_15__5_.jpg)">
                                <div class="slider_content">
                                    <div class="slider_content_inner">
                                        <h1>Ultrabook </h1>
                                        <p>Siêu Nhẹ, Sang Trọng, Cao Cấp</p>
                                        <a href="#">Xem ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--banner slider start-->

                    <!--new product area start-->
                    <div class="new_product_area">
                        <div class="block_title">
                            <h3>Sản phẩm mới</h3>
                        </div>
                        <div class="row">
                            <div class="product_active owl-carousel">

                                <?php

                                if (empty($data['products'])): ?>
                                    <p>Không có sản phẩm nào!</p>

                                    <?php else:
                                    foreach ($data['products'] as $product): ?>

                                        <div class="col-lg-3">
                                            <div class="single_product">
                                                <div class="product_thumb">
                                                    <a href="/products/detail/<?= $product['id'] ?>"><img src="/public/Uploads/<?= htmlspecialchars($product['image']) ?>" alt=""></a>
                                                    <div class="img_icone">
                                                        <img src="<?= getenv('APP_URL')  ?>/public/Assets/img/cart/span-new.png" alt="">
                                                    </div>
                                                    <div class="product_action">
                                                        <form action="/user/cart/add/<?= $product['id'] ?>" method="post">
                                                            <button class="btn btn-success" type="submit"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                                        </form>
                                                        <!-- <a href=""> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a> -->
                                                    </div>
                                                </div>
                                                <div class="product_content">
                                                    <span class="product_price"><?= htmlspecialchars($product['price']); ?></span>
                                                    <h3 class="product_title"><a href="/products/detail/<?= $product['id'] ?>"><?= htmlspecialchars($product['name']); ?></a></h3>
                                                </div>
                                                <div class="product_info">
                                                    <ul>
                                                        <li><a href="/products/detail/<?= $product['id'] ?>" title=" Add to Wishlist ">Mua ngay</a></li>
                                                        <li><a href="/products/detail/<?= $product['id'] ?>">Xem chi tiết</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                <?php endforeach;
                                endif; ?>

                            </div>
                        </div>
                    </div>
                    <!--new product area start-->

                    <!--featured product start-->
                    <div class="featured_product">
                        <div class="block_title">
                            <h3>Sản phẩm nổi bật</h3>
                        </div>
                        <div class="row">
                            <div class="product_active owl-carousel">
                                <?php
                                if (empty($data['products'])): ?>
                                    <p>Không có sản phẩm nào!</p>

                                    <?php else:
                                    foreach ($data['products'] as $product): ?>

                                        <div class="col-lg-3">
                                            <div class="single_product">
                                                <div class="product_thumb">
                                                    <a href="/products/detail/<?= $product['id'] ?>"><img src="/public/Uploads/<?= htmlspecialchars($product['image']) ?>" alt=""></a>
                                                    <div class="img_icone">
                                                        <img src="<?= getenv('APP_URL')  ?>/public/Assets/img/cart/span-new.png" alt="">
                                                    </div>
                                                    <div class="product_action">
                                                        <!-- <a href="#"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a> -->
                                                        <form action="/user/cart/add/<?= $product['id'] ?>" method="post">
                                                            <button class="btn btn-success" type="submit"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="product_content">
                                                    <span class="product_price"><?= htmlspecialchars($product['price']); ?></span>
                                                    <h3 class="product_title"><a href="/products/detail/<?= $product['id'] ?>"><?= htmlspecialchars($product['name']); ?></a></h3>
                                                </div>
                                                <div class="product_info">
                                                    <ul>
                                                        <li><a href="#" title=" Add to Wishlist ">Mua ngay</a></li>
                                                        <li><a href="/products/detail/<?= $product['id'] ?>">Xem chi tiết</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                <?php endforeach;
                                endif; ?>

                            </div>
                        </div>
                    </div>
                    <!--featured product end-->

                    <!--banner area start-->
                    <!-- <div class="banner_area mb-60">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="single_banner">
                                    <a href="#"><img src="<?= getenv('APP_URL')  ?>/public/Assets//img/banner/banner7.jpg" alt=""></a>
                                    <div class="banner_title">
                                        <p>Up to <span> 40%</span> off</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single_banner">
                                    <a href="#"><img src="<?= getenv('APP_URL')  ?>/public/Assets//img/banner/banner8.jpg" alt=""></a>
                                    <div class="banner_title title_2">
                                        <p>sale off <span> 30%</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!--banner area end-->

                    <!--brand logo strat-->
                    <!-- <div class="brand_logo mb-60">
                        <div class="block_title">
                            <h3>Brands</h3>
                        </div>
                        <div class="row">
                            <div class="brand_active owl-carousel">
                                <div class="col-lg-2">
                                    <div class="single_brand">
                                        <a href="#"><img src="<?= getenv('APP_URL')  ?>/public/Assets//img/brand/brand1.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="single_brand">
                                        <a href="#"><img src="<?= getenv('APP_URL')  ?>/public/Assets//img/brand/brand2.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="single_brand">
                                        <a href="#"><img src="<?= getenv('APP_URL')  ?>/public/Assets//img/brand/brand3.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="single_brand">
                                        <a href="#"><img src="<?= getenv('APP_URL')  ?>/public/Assets//img/brand/brand4.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="single_brand">
                                        <a href="#"><img src="<?= getenv('APP_URL')  ?>/public/Assets//img/brand/brand5.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="single_brand">
                                        <a href="#"><img src="<?= getenv('APP_URL')  ?>/public/Assets//img/brand/brand6.jpg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!--brand logo end-->
                </div>
            </div>
        </div>
        <!--pos home section end-->
        </div>
        <!--pos page inner end-->
        </div>
        </div>
        <!--pos page end-->

<?php
    }
}
