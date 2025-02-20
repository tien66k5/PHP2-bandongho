<?php

namespace Src\Views\Client\Page;

use Src\Views\Viewer;

class Blog extends Viewer
{
    public static function render($array = [])
    {
?>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>blog</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--blog area start-->
<div class="blog_area">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="single_blog">
                <div class="blog_thumb">
                    <a href="blog-details.html"><img src="<?=  getenv('APP_URL')  ?>/public/Assets//img/blog/blog3.jpg" alt=""></a>
                </div>
                <div class="blog_content">
                    <div class="blog_post">
                        <ul>
                            <li>
                                <a href="#">Tech</a>
                            </li>
                        </ul>
                    </div>
                    <h3><a href="blog-details.html">When an unknown took a galley of type.</a></h3>
                    <p>Distinctively simplify dynamic resources whereas prospective core competencies. Objectively pursue multidisciplinary human capital for interoperable.</p>
                    <div class="post_footer">
                        <div class="post_meta">
                            <ul>
                                <li>Jun 20, 2018</li>
                                <li>3 Comments</li>
                            </ul>
                        </div>
                        <div class="Read_more">
                            <a href="blog-details.html">Read more <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="single_blog">
                <div class="blog_thumb">
                    <a href="blog-details.html"><img src="<?=  getenv('APP_URL')  ?>/public/Assets//img/blog/blog4.jpg" alt=""></a>
                </div>
                <div class="blog_content">
                    <div class="blog_post">
                        <ul>
                            <li>
                                <a href="#">Men</a>
                            </li>
                        </ul>
                    </div>
                    <h3><a href="blog-details.html">When an unknown took a galley of type.</a></h3>
                    <p>Distinctively simplify dynamic resources whereas prospective core competencies. Objectively pursue multidisciplinary human capital for interoperable.</p>
                    <div class="post_footer">
                        <div class="post_meta">
                            <ul>
                                <li>Jun 20, 2018</li>
                                <li>3 Comments</li>
                            </ul>
                        </div>
                        <div class="Read_more">
                            <a href="blog-details.html">Read more <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="single_blog">
                <div class="blog_thumb">
                    <a href="blog-details.html"><img src="<?=  getenv('APP_URL')  ?>/public/Assets//img/blog/blog1.jpg" alt=""></a>
                </div>
                <div class="blog_content">
                    <div class="blog_post">
                        <ul>
                            <li>
                                <a href="#">Women</a>
                            </li>
                        </ul>
                    </div>
                    <h3><a href="blog-details.html">When an unknown took a galley of type.</a></h3>
                    <p>Distinctively simplify dynamic resources whereas prospective core competencies. Objectively pursue multidisciplinary human capital for interoperable.</p>
                    <div class="post_footer">
                        <div class="post_meta">
                            <ul>
                                <li>Jun 20, 2018</li>
                                <li>3 Comments</li>
                            </ul>
                        </div>
                        <div class="Read_more">
                            <a href="blog-details.html">Read more <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="single_blog">
                <div class="blog_thumb">
                    <a href="blog-details.html"><img src="<?=  getenv('APP_URL')  ?>/public/Assets//img/blog/blog2.jpg" alt=""></a>
                </div>
                <div class="blog_content">
                    <div class="blog_post">
                        <ul>
                            <li>
                                <a href="#">fashion</a>
                            </li>
                        </ul>
                    </div>
                    <h3><a href="blog-details.html">When an unknown took a galley of type.</a></h3>
                    <p>Distinctively simplify dynamic resources whereas prospective core competencies. Objectively pursue multidisciplinary human capital for interoperable.</p>
                    <div class="post_footer">
                        <div class="post_meta">
                            <ul>
                                <li>Jun 20, 2018</li>
                                <li>3 Comments</li>
                            </ul>
                        </div>
                        <div class="Read_more">
                            <a href="blog-details.html">Read more <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="single_blog">
                <div class="blog_thumb">
                    <a href="blog-details.html"><img src="<?=  getenv('APP_URL')  ?>/public/Assets//img/blog/blog5.jpg" alt=""></a>
                </div>
                <div class="blog_content">
                    <div class="blog_post">
                        <ul>
                            <li>
                                <a href="#">featured</a>
                            </li>
                        </ul>
                    </div>
                    <h3><a href="blog-details.html">When an unknown took a galley of type.</a></h3>
                    <p>Distinctively simplify dynamic resources whereas prospective core competencies. Objectively pursue multidisciplinary human capital for interoperable.</p>
                    <div class="post_footer">
                        <div class="post_meta">
                            <ul>
                                <li>Jun 20, 2018</li>
                                <li>3 Comments</li>
                            </ul>
                        </div>
                        <div class="Read_more">
                            <a href="blog-details.html">Read more <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="single_blog">
                <div class="blog_thumb">
                    <a href="blog-details.html"><img src="<?=  getenv('APP_URL')  ?>/public/Assets//img/blog/blog11.jpg" alt=""></a>
                </div>
                <div class="blog_content">
                    <div class="blog_post">
                        <ul>
                            <li>
                                <a href="#">Tech</a>
                            </li>
                        </ul>
                    </div>
                    <h3><a href="blog-details.html">When an unknown took a galley of type.</a></h3>
                    <p>Distinctively simplify dynamic resources whereas prospective core competencies. Objectively pursue multidisciplinary human capital for interoperable.</p>
                    <div class="post_footer">
                        <div class="post_meta">
                            <ul>
                                <li>Jun 20, 2018</li>
                                <li>3 Comments</li>
                            </ul>
                        </div>
                        <div class="Read_more">
                            <a href="blog-details.html">Read more <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--blog area end-->

<!--pagination style start-->
<div class="blog_pagination">
    <div class="row">
        <div class="col-12">
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
    </div>
</div>
<!--pagination style end-->

<!--brand logo strat-->
<div class="brand_logo brand_about">
    <div class="block_title">
        <h3>Brands</h3>
    </div>
    <div class="row">
        <div class="brand_active owl-carousel">
            <div class="col-lg-2">
                <div class="single_brand">
                    <a href="#"><img src="<?=  getenv('APP_URL')  ?>/public/Assets//img/brand/brand1.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="single_brand">
                    <a href="#"><img src="<?=  getenv('APP_URL')  ?>/public/Assets//img/brand/brand2.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="single_brand">
                    <a href="#"><img src="<?=  getenv('APP_URL')  ?>/public/Assets//img/brand/brand3.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="single_brand">
                    <a href="#"><img src="<?=  getenv('APP_URL')  ?>/public/Assets//img/brand/brand4.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="single_brand">
                    <a href="#"><img src="<?=  getenv('APP_URL')  ?>/public/Assets//img/brand/brand5.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="single_brand">
                    <a href="#"><img src="<?=  getenv('APP_URL')  ?>/public/Assets//img/brand/brand6.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    }
}

?>