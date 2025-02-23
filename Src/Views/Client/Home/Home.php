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
                    <div class="sidebar_widget banner mb-35">
                        <div class="banner_img mb-35">
                            <a href="#"><img src="<?= getenv('APP_URL')  ?>/public/Assets/img/banner/banner5.jpg" alt=""></a>
                        </div>
                        <div class="banner_img">
                            <a href="#"><img src="<?= getenv('APP_URL')  ?>/public/Assets/img/banner/banner6.jpg" alt=""></a>
                        </div>
                    </div>
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
                                    <div class="cart_remove">
                                        <a title="Remove this item" href="#"><i class="fa fa-times-circle"></i></a>
                                    </div>
                                </div>
                        <?php endforeach;
                        endif; ?>

                        <div class="block_content">
                            <p>2 products</p>
                            <a href="#">» My wishlists</a>
                        </div>
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
                    <div class="sidebar_widget newsletter mb-35">
                        <div class="block_title">
                            <h3>newsletter</h3>
                        </div>
                        <form action="#">
                            <p>Sign up for your newsletter</p>
                            <input placeholder="Your email address" type="text">
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                    <!--newsletter block end-->

                    <!--sidebar banner-->
                    <div class="sidebar_widget bottom ">
                        <div class="banner_img">
                            <a href="#"><img src="<?= getenv('APP_URL')  ?>/public/Assets//img/banner/banner9.jpg" alt=""></a>
                        </div>
                    </div>
                    <!--sidebar banner end-->



                </div>
                <div class="col-lg-9 col-md-12">
                    <!--banner slider start-->
                    <div class="banner_slider slider_1">
                        <div class="slider_active owl-carousel">
                            <div class="single_slider" style="background-image: url(assets/img/slider/slide_1.png)">
                                <div class="slider_content">
                                    <div class="slider_content_inner">
                                        <h1>Women's Fashion</h1>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                        <a href="#">shop now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="single_slider" style="background-image: url(assets/img/slider/slider_2.png)">
                                <div class="slider_content">
                                    <div class="slider_content_inner">
                                        <h1>New Collection</h1>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                        <a href="#">shop now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="single_slider" style="background-image: url(assets/img/slider/slider_3.png)">
                                <div class="slider_content">
                                    <div class="slider_content_inner">
                                        <h1>Best Collection</h1>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                        <a href="#">shop now</a>
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
                                                    <a href="single-product.html"><img src="/public/Uploads/<?= htmlspecialchars($product['image']) ?>" alt=""></a>
                                                    <div class="img_icone">
                                                        <img src="<?= getenv('APP_URL')  ?>/public/Assets/img/cart/span-new.png" alt="">
                                                    </div>
                                                    <div class="product_action">
                                                        <a href="#"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
                                                    </div>
                                                </div>
                                                <div class="product_content">
                                                    <span class="product_price"><?= htmlspecialchars($product['price']); ?></span>
                                                    <h3 class="product_title"><a href="single-product.html"><?= htmlspecialchars($product['name']); ?></a></h3>
                                                </div>
                                                <div class="product_info">
                                                    <ul>
                                                        <li><a href="#" title=" Add to Wishlist ">Mua ngay</a></li>
                                                        <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">Xem chi tiết</a></li>
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
                                                    <a href="single-product.html"><img src="/public/Uploads/<?= htmlspecialchars($product['image']) ?>" alt=""></a>
                                                    <div class="img_icone">
                                                        <img src="<?= getenv('APP_URL')  ?>/public/Assets/img/cart/span-new.png" alt="">
                                                    </div>
                                                    <div class="product_action">
                                                        <a href="#"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
                                                    </div>
                                                </div>
                                                <div class="product_content">
                                                    <span class="product_price"><?= htmlspecialchars($product['price']); ?></span>
                                                    <h3 class="product_title"><a href="single-product.html"><?= htmlspecialchars($product['name']); ?></a></h3>
                                                </div>
                                                <div class="product_info">
                                                    <ul>
                                                        <li><a href="#" title=" Add to Wishlist ">Mua ngay</a></li>
                                                        <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">Xem chi tiết</a></li>
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
                    <div class="banner_area mb-60">
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
                    </div>
                    <!--banner area end-->

                    <!--brand logo strat-->
                    <div class="brand_logo mb-60">
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
                    </div>
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
