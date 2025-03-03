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
                            <li><a href="index.html">Trang chủ</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>Sản phẩm</li>
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

                        <!-- <div class="block_content">
                            <p>2 products</p>
                            <a href="#">» My wishlists</a>
                        </div> -->
                    </div>
                    <!--wishlist block end-->

                    <!--popular tags area-->
                    <!-- <div class="sidebar_widget tags mb-35">
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
                    </div> -->
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

                        <!-- <div class="block_content">
                            <p>2 products</p>
                            <a href="#">» My wishlists</a>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--banner slider start-->
                    <div class="banner_slider mb-20">
                        <img style="width: 100%; height: 150px; object-fit: cover;" src="https://img.freepik.com/free-psd/black-friday-sale-social-media-cover-design-template_47987-25244.jpg?t=st=1740915968~exp=1740919568~hmac=37f30dff79ff4538fb6f904a54a7e154be9fb464e2b101aa7077dda771c75241&w=1380" alt="">
                    </div>
                    <!--banner slider start-->

                   

                    <!--shop tab product-->
                    <div class="shop_tab_product">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="large" role="tabpanel">
                                <div class="row">
                                    <?php if (empty($data['products'])): ?>
                                        <p>Không có sản phẩm nào!</p>
                                        <?php else:
                                        $productsLimited = array_slice($data['products'], 0, 9);
                                        foreach ($productsLimited as $product): ?>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single_product">
                                                    <div class="product_thumb">
                                                        <a href="/products/detail/<?= $product['id'] ?>"><img src="/public/Uploads/<?= htmlspecialchars($product['image']) ?>" alt=""></a>
                                                        <div class="img_icone">
                                                            <img src="<?= getenv('APP_URL')  ?>/public/Assets/img/cart/span-new.png" alt="">
                                                        </div>
                                                        <div class="product_action">
                                                            <!-- <a href="#"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a> -->



                                                            <form action="/user/cart/add/<?= $product['id'] ?>" method="post">
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

                        </div>
                    </div>
                    <!--shop tab product end-->


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