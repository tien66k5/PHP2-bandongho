<?php

namespace Src\Views\Client\Page;

use Src\Views\Viewer;

class SearchResults extends Viewer
{
    public static function render($data = [])
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


                <div class="col-lg-12 col-md-12">


                    <!--shop toolbar start-->
                    <div class="shop_toolbar mb-35">

                        <div class="list_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#large" role="tab" aria-controls="large" aria-selected="true"><i class="fa fa-th-large"></i></a>
                                </li>
                                <!-- <li>
                                    <a data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="page_amount">
                            <?php if (empty($data)): ?>
                                <p>Không có sản phẩm nào!</p>
                            <?php else: ?>
                                <h4>Có <?= count($data) ?> sản phẩm được tìm thấy.</h4>
                            <?php
                            endif;
                            ?>
                        </div>

                        <div class="select_option">
                            <!-- <form action="#">
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
                            </form> -->
                        </div>
                    </div>
                    <!--shop toolbar end-->

                    <!--shop tab product-->
                    <div class="shop_tab_product">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="large" role="tabpanel">
                                <div class="row">
                                    <?php if (empty($data)): ?>
                                        <p>Không có sản phẩm nào!</p>
                                    <?php else: ?>
                                        <?php foreach ($data as $product): ?>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single_product">
                                                    <div class="product_thumb">
                                                        <a href="single-product.html">
                                                            <img src="/public/Uploads/<?= htmlspecialchars($product['image']) ?>" alt="">
                                                        </a>
                                                        <div class="img_icone">
                                                            <img src="<?= getenv('APP_URL') ?>/public/Assets/img/cart/span-new.png" alt="">
                                                        </div>
                                                        <div class="product_action">
                                                            <form action="/user/cart/add/<?= $product['id'] ?>" method="post">
                                                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                                                <input class="d-none" name="quantity" id="quantity" min="1" max="100" value="1" type="number" required>
                                                                <button class="btn btn-success" type="submit">
                                                                    <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="product_content">
                                                        <span class="product_price"><?= htmlspecialchars(number_format($product['price'], 0, ',', '.')); ?>đ</span>
                                                        <h3 class="product_title">
                                                            <a href="single-product.html"><?= htmlspecialchars($product['name']); ?></a>
                                                        </h3>
                                                    </div>
                                                    <div class="product_info">
                                                        <ul>
                                                            <li><a href="/products/detail/<?= $product['id'] ?>"> Mua ngay</a></li>
                                                            <li><a href="/products/detail/<?= $product['id'] ?>">Xem chi tiết</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

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

        <!-- <div class="breadcrumbs_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb_content">
                            <ul>
                                <li><a href="index.html">home</a></li>
                                <li><i class="fa fa-angle-right"></i></li>
                                <li>portfolio</li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        breadcrumbs area end

        
        <div class="portfolio_section_area">
            <div class="portfolio_button">
                <div class="row">
                    <div class="col-12">
                        <button class="active" data-filter="*">all</button>
                        <button data-filter=".company">Company</button>
                        <button data-filter=".computers">Computers</button>
                        <button data-filter=".general">General</button>
                        <button data-filter=".hipster">Hipster</button>
                        <button data-filter=".food">Just Food</button>

                    </div>
                </div>
            </div>
            <div class="row portfolio_gallery">
                <div class="col-lg-3 col-md-4 col-sm-6 gird_item computers general">
                    <div class="single_portfolio_inner">
                        <div class="portfolio_thumb">
                            <a href="#"><img src="assets\img\portfolio\port1.jpg" alt=""></a>
                            <div class="portfolio_popup">
                                <a class="port_popup" href="assets\img\portfolio\port1.jpg"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="portfolio_link">
                                <a href="portfolio-details.html"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="portfolio__content">
                            <a href="portfolio-details.html">Coffee & Cookie Time</a>
                            <span>admin</span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 gird_item computers food">
                    <div class="single_portfolio_inner">
                        <div class="portfolio_thumb">
                            <a href="#"><img src="assets\img\portfolio\port2.jpg" alt=""></a>
                            <div class="portfolio_popup">
                                <a class="port_popup" href="assets\img\portfolio\port2.jpg"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="portfolio_link">
                                <a href="portfolio-details.html"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="portfolio__content">
                            <a href="portfolio-details.html">Coffee & Cookie Time</a>
                            <span>admin</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 gird_item company general">
                    <div class="single_portfolio_inner">
                        <div class="portfolio_thumb">
                            <a href="#"><img src="assets\img\portfolio\port3.jpg" alt=""></a>
                            <div class="portfolio_popup">
                                <a class="port_popup" href="assets\img\portfolio\port3.jpg"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="portfolio_link">
                                <a href="portfolio-details.html"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="portfolio__content">
                            <a href="#">Coffee & Cookie Time</a>
                            <span>admin</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 gird_item computers hipster">
                    <div class="single_portfolio_inner">
                        <div class="portfolio_thumb">
                            <a href="#"><img src="assets\img\portfolio\port4.jpg" alt=""></a>
                            <div class="portfolio_popup">
                                <a class="port_popup" href="assets\img\portfolio\port4.jpg"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="portfolio_link">
                                <a href="portfolio-details.html"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="portfolio__content">
                            <a href="portfolio-details.html">Coffee & Cookie Time</a>
                            <span>admin</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 gird_item computers general food">
                    <div class="single_portfolio_inner">
                        <div class="portfolio_thumb">
                            <a href="#"><img src="assets\img\portfolio\port5.jpg" alt=""></a>
                            <div class="portfolio_popup">
                                <a class="port_popup" href="assets\img\portfolio\port5.jpg"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="portfolio_link">
                                <a href="portfolio-details.html"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="portfolio__content">
                            <a href="portfolio-details.html">Coffee & Cookie Time</a>
                            <span>admin</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 gird_item company general hipster">
                    <div class="single_portfolio_inner">
                        <div class="portfolio_thumb">
                            <a href="#"><img src="assets\img\portfolio\port6.jpg" alt=""></a>
                            <div class="portfolio_popup">
                                <a class="port_popup" href="assets\img\portfolio\port6.jpg"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="portfolio_link">
                                <a href="portfolio-details.html"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="portfolio__content">
                            <a href="portfolio-details.html">Coffee & Cookie Time</a>
                            <span>admin</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 gird_item computers company food">
                    <div class="single_portfolio_inner">
                        <div class="portfolio_thumb">
                            <a href="#"><img src="assets\img\portfolio\port7.jpg" alt=""></a>
                            <div class="portfolio_popup">
                                <a class="port_popup" href="assets\img\portfolio\port7.jpg"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="portfolio_link">
                                <a href="portfolio-details.html"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="portfolio__content">
                            <a href="portfolio-details.html">Coffee & Cookie Time</a>
                            <span>admin</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 gird_item computers general Hipster">
                    <div class="single_portfolio_inner">
                        <div class="portfolio_thumb">
                            <a href="#"><img src="assets\img\portfolio\port8.jpg" alt=""></a>
                            <div class="portfolio_popup">
                                <a class="port_popup" href="assets\img\portfolio\port9.jpg"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="portfolio_link">
                                <a href="portfolio-details.html"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="portfolio__content">
                            <a href="portfolio-details.html">Coffee & Cookie Time</a>
                            <span>admin</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 gird_item company general hipster food">
                    <div class="single_portfolio_inner">
                        <div class="portfolio_thumb">
                            <a href="#"><img src="assets\img\portfolio\port9.jpg" alt=""></a>
                            <div class="portfolio_popup">
                                <a class="port_popup" href="assets\img\portfolio\port9.jpg"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="portfolio_link">
                                <a href="portfolio-details.html"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="portfolio__content">
                            <a href="portfolio-details.html">Coffee & Cookie Time</a>
                            <span>admin</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 gird_item computers company hipster food">
                    <div class="single_portfolio_inner">
                        <div class="portfolio_thumb">
                            <a href="#"><img src="assets\img\portfolio\port10.jpg" alt=""></a>
                            <div class="portfolio_popup">
                                <a class="port_popup" href="assets\img\portfolio\port10.jpg"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="portfolio_link">
                                <a href="portfolio-details.html"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="portfolio__content">
                            <a href="portfolio-details.html">Coffee & Cookie Time</a>
                            <span>admin</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 gird_item computers company general food">
                    <div class="single_portfolio_inner">
                        <div class="portfolio_thumb">
                            <a href="#"><img src="assets\img\portfolio\port11.jpg" alt=""></a>
                            <div class="portfolio_popup">
                                <a class="port_popup" href="assets\img\portfolio\port11.jpg"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="portfolio_link">
                                <a href="portfolio-details.html"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="portfolio__content">
                            <a href="portfolio-details.html">Coffee & Cookie Time</a>
                            <span>admin</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 gird_item computers company general hipster">
                    <div class="single_portfolio_inner">
                        <div class="portfolio_thumb">
                            <a href="#"><img src="assets\img\portfolio\port12.jpg" alt=""></a>
                            <div class="portfolio_popup">
                                <a class="port_popup" href="assets\img\portfolio\port12.jpg"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="portfolio_link">
                                <a href="portfolio-details.html"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="portfolio__content">
                            <a href="portfolio-details.html">Coffee & Cookie Time</a>
                            <span>admin</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        portfolio section end -->

<?php
    }
}
