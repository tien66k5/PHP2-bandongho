<?php

namespace Src\Views\Client\Page\Product;

use Src\views\Viewer;

class ProductList extends Viewer
{
    public static function render(array $data = [])
    { ?>
        <!--breadcrumbs area start-->
        <div class="breadcrumbs_area">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->

        <!--pos home section-->
        <div class=" pos_home_section">
            <div class="row pos_home">
                <div class="col-lg-3 col-md-12">
                    <!--layere categorie"-->
                    <div class="sidebar_widget shop_c">
                        <div class="categorie__titile">
                            <h4>Loại sản phẩm</h4>
                        </div>
                        <div class="layere_categorie">
                            <ul>
                                <?php
                                if (empty($data['categories'])): ?>
                                    <p>Không có sản phẩm nào!</p>

                                    <?php else:
                                    foreach ($data['categories'] as $category): ?>

                                        <li>
                                            <input id="bag" type="checkbox">
                                            <label for="bag"><?= $category['name'] ?></label>
                                            <!-- <label for="bag"><?= $category['name'] ?><span>(4)</span></label> -->
                                        </li>
                                <?php endforeach;
                                endif; ?>
                            </ul>
                        </div>
                    </div>
                    <!--layere categorie end-->

                    <!--color area start-->
                    <!-- <div class="sidebar_widget color">
                        <h2>Color</h2>
                        <div class="widget_color">
                            <ul>

                                <li><a href="#">Black <span>(10)</span></a></li>

                                <li><a href="#">Orange <span>(12)</span></a></li>

                                <li> <a href="#">Blue <span>(14)</span></a></li>

                                <li><a href="#">Yellow <span>(15)</span></a></li>

                                <li><a href="#">pink <span>(16)</span></a></li>

                                <li><a href="#">green <span>(11)</span></a></li>

                            </ul>
                        </div>
                    </div> -->
                    <!--color area end-->

                    <!--price slider start-->
                    <!-- <div class="sidebar_widget price">
                        <h2>Price</h2>
                        <div class="ca_search_filters">

                            <input type="text" name="text" id="amount">
                            <div id="slider-range"></div>
                        </div>
                    </div> -->
                    <!--price slider end-->

                    <!--wishlist block start-->
                    <div class="sidebar_widget wishlist mb-30">
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
                    <!-- <div class="sidebar_widget newsletter mb-30">
                        <div class="block_title">
                            <h3>newsletter</h3>
                        </div>
                        <form action="#">
                            <p>Sign up for your newsletter</p>
                            <input placeholder="Your email address" type="text">
                            <button type="submit">Subscribe</button>
                        </form>
                    </div> -->
                    <!--newsletter block end-->

                    <!--special product start-->
                    <div class="sidebar_widget special">
                        <div class="block_title">
                            <h3>Sản phẩm đặc biệt</h3>
                        </div> <?php
                                if (empty($data['products'])): ?>
                            <p>Không có sản phẩm nào!</p>

                            <?php else:
                                    $limitedProducts = array_slice($data['products'], 0, 2); // Chỉ lấy 2 sản phẩm đầu tiên
                                    foreach ($limitedProducts as $product): ?>
                                <div class="special_product_inner mb-20">
                                    <div class="special_p_thumb " style=" width: 50px; ">
                                        <a href="single-product.html"><img src="/public/Uploads/<?= htmlspecialchars($product['image']) ?>" alt=""></a>
                                    </div>
                                    <div class="small_p_desc">
                                        <div class="product_ratting">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h3><a href="single-product.html"><?= htmlspecialchars($product['name']); ?></a></h3>
                                        <div class="special_product_proce">
                                            <span class="old_price"><?= number_format($product['price'], 0, ',', '.'); ?></span>
                                            <!-- <span class="new_price">$118.35</span> -->
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach;
                                endif; ?>

                    </div>
                    <!--special product end-->
                    <div>

                        <div class="block_content">
                            <p>2 products</p>
                            <a href="#">» My wishlists</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--banner slider start-->
                    <div class="banner_slider mb-35">
                        <img src="<?= getenv('APP_URL')  ?>/public/Assets/img/banner/bannner10.jpg" alt="">
                    </div>
                    <!--banner slider start-->

                    <!--shop toolbar start-->
                    <div class="shop_toolbar mb-35">

                        <div class="list_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#large" role="tab" aria-controls="large" aria-selected="true"><i class="fa fa-th-large"></i></a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="page_amount">
                            <p>1–9 / 21 kết quả</p>
                        </div>

                        <div class="select_option">
                            <form action="#">
                                <label>Sort By</label>
                                <select name="orderby" id="short">
                                    <option selected="" value="1">Position</option>
                                    <option value="1">Price: Lowest</option>
                                    <option value="1">Price: Highest</option>
                                    <option value="1">Product Name:Z</option>
                                    <option value="1">Sort by price:low</option>
                                    <option value="1">Product Name: Z</option>
                                    <option value="1">In stock</option>
                                    <option value="1">Product Name: A</option>
                                    <option value="1">In stock</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <!--shop toolbar end-->

                    <!--shop tab product-->
                    <div class="shop_tab_product">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="large" role="tabpanel">
                                <div class="row">
                                    <?php if (empty($data['products'])): ?>
                                        <p>Không có sản phẩm nào!</p>
                                        <?php else:
                                        foreach ($data['products'] as $product): ?>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single_product">
                                                    <div class="product_thumb">
                                                        <a href="single-product.html"><img src="/public/Uploads/<?= htmlspecialchars($product['image']) ?>" alt=""></a>
                                                        <div class="img_icone">
                                                            <img src="<?= getenv('APP_URL')  ?>/public/Assets/img/cart/span-new.png" alt="">
                                                        </div>
                                                        <div class="product_action">
                                                            <!-- <a href="#"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a> -->



                                                            <form  action="/user/cart/add/<?= $product['id'] ?>" method="post">
                                                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                                                <input class="d-none" name="quantity" id="quantity" min="1" max="100" value="1" type="number" required>
                                                                <button class="btn btn-success" type="submit"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                                            </form>


                                                        </div>
                                                    </div>
                                                    <div class="product_content">
                                                        <span class="product_price"><?= htmlspecialchars($product['price']); ?></span>
                                                        <h3 class="product_title"><a href="single-product.html"><?= htmlspecialchars($product['name']); ?></a></h3>
                                                    </div>
                                                    <div class="product_info">
                                                        <ul>
                                                            <li><a href="/products/detail/<?= $product['id'] ?>"> Mua ngay</a></li>

                                                            <li><a href="/products/detail/<?= $product['id'] ?>">Xem chi tiết</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php endforeach;
                                    endif; ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="list" role="tabpanel">
                                <div class="product_list_item mb-35">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="<?= getenv('APP_URL')  ?>/public/Assets/img/product/product2.jpg" alt=""></a>
                                                <div class="hot_img">
                                                    <img src="<?= getenv('APP_URL')  ?>/public/Assets/img/cart/span-hot.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-6 col-sm-6">
                                            <div class="list_product_content">
                                                <div class="product_ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="list_title">
                                                    <h3><a href="single-product.html">Lorem ipsum dolor</a></h3>
                                                </div>
                                                <p class="design"> in quibusdam accusantium qui nostrum consequuntur, officia, quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam vitae blanditiis quae perferendis minus eligendi</p>

                                                <p class="compare">
                                                    <input id="select" type="checkbox">
                                                    <label for="select">Select to compare</label>
                                                </p>
                                                <div class="content_price">
                                                    <span>$118.00</span>
                                                    <span class="old-price">$130.00</span>
                                                </div>
                                                <div class="add_links">
                                                    <ul>
                                                        <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                        <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                                        <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_list_item mb-35">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="<?= getenv('APP_URL')  ?>/public/Assets/img/product/product3.jpg" alt=""></a>
                                                <div class="img_icone">
                                                    <img src="<?= getenv('APP_URL')  ?>/public/Assets/img/cart/span-new.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-6 col-sm-6">
                                            <div class="list_product_content">
                                                <div class="product_ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="list_title">
                                                    <h3><a href="single-product.html">Quisque ornare dui</a></h3>
                                                </div>
                                                <p class="design"> in quibusdam accusantium qui nostrum consequuntur, officia, quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam vitae blanditiis quae perferendis minus eligendi</p>

                                                <p class="compare">
                                                    <input id="select1" type="checkbox">
                                                    <label for="select1">Select to compare</label>
                                                </p>
                                                <div class="content_price">
                                                    <span>$118.00</span>
                                                    <span class="old-price">$130.00</span>
                                                </div>
                                                <div class="add_links">
                                                    <ul>
                                                        <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                        <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                                        <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_list_item mb-35">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="<?= getenv('APP_URL')  ?>/public/Assets/img/product/product4.jpg" alt=""></a>
                                                <div class="img_icone">
                                                    <img src="<?= getenv('APP_URL')  ?>/public/Assets/img/cart/span-new.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-6 col-sm-6">
                                            <div class="list_product_content">
                                                <div class="product_ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="list_title">
                                                    <h3><a href="single-product.html">Maecenas sit amet</a></h3>
                                                </div>
                                                <p class="design"> in quibusdam accusantium qui nostrum consequuntur, officia, quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam vitae blanditiis quae perferendis minus eligendi</p>

                                                <p class="compare">
                                                    <input id="select2" type="checkbox">
                                                    <label for="select2">Select to compare</label>
                                                </p>
                                                <div class="content_price">
                                                    <span>$118.00</span>
                                                    <span class="old-price">$130.00</span>
                                                </div>
                                                <div class="add_links">
                                                    <ul>
                                                        <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                        <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                                        <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_list_item mb-35">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="<?= getenv('APP_URL')  ?>/public/Assets/img/product/product5.jpg" alt=""></a>
                                                <div class="img_icone">
                                                    <img src="<?= getenv('APP_URL')  ?>/public/Assets/img/cart/span-new.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-6 col-sm-6">
                                            <div class="list_product_content">
                                                <div class="product_ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="list_title">
                                                    <h3><a href="single-product.html">Sed non luctus turpis</a></h3>
                                                </div>
                                                <p class="design"> in quibusdam accusantium qui nostrum consequuntur, officia, quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam vitae blanditiis quae perferendis minus eligendi</p>

                                                <p class="compare">
                                                    <input id="select3" type="checkbox">
                                                    <label for="select3">Select to compare</label>
                                                </p>
                                                <div class="content_price">
                                                    <span>$118.00</span>
                                                    <span class="old-price">$130.00</span>
                                                </div>
                                                <div class="add_links">
                                                    <ul>
                                                        <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                        <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                                        <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_list_item mb-35">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="<?= getenv('APP_URL')  ?>/public/Assets/img/product/product6.jpg" alt=""></a>
                                                <div class="hot_img">
                                                    <img src="<?= getenv('APP_URL')  ?>/public/Assets/img/cart/span-hot.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-6 col-sm-6">
                                            <div class="list_product_content">
                                                <div class="product_ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="list_title">
                                                    <h3><a href="single-product.html">Donec dignissim eget</a></h3>
                                                </div>
                                                <p class="design"> in quibusdam accusantium qui nostrum consequuntur, officia, quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam vitae blanditiis quae perferendis minus eligendi</p>

                                                <p class="compare">
                                                    <input id="select4" type="checkbox">
                                                    <label for="select4">Select to compare</label>
                                                </p>
                                                <div class="content_price">
                                                    <span>$118.00</span>
                                                    <span class="old-price">$130.00</span>
                                                </div>
                                                <div class="add_links">
                                                    <ul>
                                                        <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                        <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                                        <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_list_item mb-35">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="<?= getenv('APP_URL')  ?>/public/Assets/img/product/product7.jpg" alt=""></a>
                                                <div class="img_icone">
                                                    <img src="<?= getenv('APP_URL')  ?>/public/Assets/img/cart/span-new.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-6 col-sm-6">
                                            <div class="list_product_content">
                                                <div class="product_ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="list_title">
                                                    <h3><a href="single-product.html">Lorem ipsum dolor</a></h3>
                                                </div>
                                                <p class="design"> in quibusdam accusantium qui nostrum consequuntur, officia, quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam vitae blanditiis quae perferendis minus eligendi</p>

                                                <p class="compare">
                                                    <input id="select5" type="checkbox">
                                                    <label for="select5">Select to compare</label>
                                                </p>
                                                <div class="content_price">
                                                    <span>$118.00</span>
                                                    <span class="old-price">$130.00</span>
                                                </div>
                                                <div class="add_links">
                                                    <ul>
                                                        <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                        <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                                        <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_list_item mb-35">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="<?= getenv('APP_URL')  ?>/public/Assets/img/product/product8.jpg" alt=""></a>
                                                <div class="img_icone">
                                                    <img src="<?= getenv('APP_URL')  ?>/public/Assets/img/cart/span-new.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-6 col-sm-6">
                                            <div class="list_product_content">
                                                <div class="product_ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="list_title">
                                                    <h3><a href="single-product.html">Donec ac congue</a></h3>
                                                </div>
                                                <p class="design"> in quibusdam accusantium qui nostrum consequuntur, officia, quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam vitae blanditiis quae perferendis minus eligendi</p>

                                                <p class="compare">
                                                    <input id="select6" type="checkbox">
                                                    <label for="select6">Select to compare</label>
                                                </p>
                                                <div class="content_price">
                                                    <span>$118.00</span>
                                                    <span class="old-price">$130.00</span>
                                                </div>
                                                <div class="add_links">
                                                    <ul>
                                                        <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                        <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                                        <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_list_item mb-35">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="<?= getenv('APP_URL')  ?>/public/Assets/img/product/product9.jpg" alt=""></a>
                                                <div class="hot_img">
                                                    <img src="<?= getenv('APP_URL')  ?>/public/Assets/img/cart/span-hot.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-6 col-sm-6">
                                            <div class="list_product_content">
                                                <div class="product_ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="list_title">
                                                    <h3><a href="single-product.html">Curabitur sodales</a></h3>
                                                </div>
                                                <p class="design"> in quibusdam accusantium qui nostrum consequuntur, officia, quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam vitae blanditiis quae perferendis minus eligendi</p>

                                                <p class="compare">
                                                    <input id="select7" type="checkbox">
                                                    <label for="select7">Select to compare</label>
                                                </p>
                                                <div class="content_price">
                                                    <span>$118.00</span>
                                                    <span class="old-price">$130.00</span>
                                                </div>
                                                <div class="add_links">
                                                    <ul>
                                                        <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                        <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                                        <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_list_item mb-35">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product_thumb">
                                                <a href="single-product.html"><img src="<?= getenv('APP_URL')  ?>/public/Assets/img/product/product1.jpg" alt=""></a>
                                                <div class="img_icone">
                                                    <img src="<?= getenv('APP_URL')  ?>/public/Assets/img/cart/span-new.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-6 col-sm-6">
                                            <div class="list_product_content">
                                                <div class="product_ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="list_title">
                                                    <h3><a href="single-product.html">Lorem ipsum dolor</a></h3>
                                                </div>
                                                <p class="design"> in quibusdam accusantium qui nostrum consequuntur, officia, quidem ut placeat. Officiis, incidunt eos recusandae! Facilis aliquam vitae blanditiis quae perferendis minus eligendi</p>

                                                <p class="compare">
                                                    <input id="select8" type="checkbox">
                                                    <label for="select8">Select to compare</label>
                                                </p>
                                                <div class="content_price">
                                                    <span>$118.00</span>
                                                    <span class="old-price">$130.00</span>
                                                </div>
                                                <div class="add_links">
                                                    <ul>
                                                        <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                        <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                                        <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--shop tab product end-->

                    <!--pagination style start-->
                    <div class="pagination_style">
                        <div class="item_page">
                            <form action="#">
                                <label for="page_select">show</label>
                                <select id="page_select">
                                    <option value="1">9</option>
                                    <option value="2">10</option>
                                    <option value="3">11</option>
                                </select>
                                <span>Products by page</span>
                            </form>
                        </div>
                        <div class="page_number">
                            <span>Pages: </span>
                            <ul>
                                <li>«</li>
                                <li class="current_number">1</li>
                                <li><a href="#">2</a></li>
                                <li>»</li>
                            </ul>
                        </div>
                    </div>
                    <!--pagination style end-->
                </div>
            </div>
        </div>
        <!--pos home section end-->
        </div>
        <!--pos page inner end-->
        </div>
        </div>
<?php
    }
}

?>