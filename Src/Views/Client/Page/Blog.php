<?php

namespace Src\Views\Client\Page;

use Src\Views\Viewer;

class Blog extends Viewer
{
    public static function render($array = [])
    {
?>

<!-- Khu vực điều hướng breadcrumb -->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Tin tức Laptop</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Kết thúc breadcrumb -->

<!-- Khu vực blog -->
<div class="blog_area">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="single_blog">
                <div class="blog_thumb">
                    <a href="blog-details.html"><img src="https://hanoicomputercdn.com/media/product/75761_laptop_hp_14s_ep0110tu__8c5k9pa____2_.jpg" alt="Laptop Gaming"></a>
                </div>
                <div class="blog_content">
                    <div class="blog_post">
                        <ul>
                            <li><a href="#">Gaming</a></li>
                        </ul>
                    </div>
                    <h3><a href="blog-details.html">Top 5 Laptop Gaming tốt nhất năm nay</a></h3>
                    <p>Khám phá những mẫu laptop gaming mạnh mẽ nhất với hiệu suất đỉnh cao, màn hình sắc nét và thiết kế ấn tượng.</p>
                    <div class="post_footer">
                        <div class="post_meta">
                            <ul>
                                <li>20 Tháng 6, 2024</li>
                                <li>5 Bình luận</li>
                            </ul>
                        </div>
                        <div class="Read_more">
                            <a href="blog-details.html">Xem thêm <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="single_blog">
                <div class="blog_thumb">
                    <a href="blog-details.html"><img src="https://hanoicomputercdn.com/media/product/75761_laptop_hp_14s_ep0110tu__8c5k9pa____2_.jpg" alt="Laptop Văn phòng"></a>
                </div>
                <div class="blog_content">
                    <div class="blog_post">
                        <ul>
                            <li><a href="#">Văn phòng</a></li>
                        </ul>
                    </div>
                    <h3><a href="blog-details.html">Những laptop mỏng nhẹ phù hợp cho dân văn phòng</a></h3>
                    <p>Các dòng laptop mỏng nhẹ, pin lâu, hiệu năng ổn định dành cho những ai thường xuyên di chuyển và làm việc linh hoạt.</p>
                    <div class="post_footer">
                        <div class="post_meta">
                            <ul>
                                <li>15 Tháng 7, 2024</li>
                                <li>3 Bình luận</li>
                            </ul>
                        </div>
                        <div class="Read_more">
                            <a href="blog-details.html">Xem thêm <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kết thúc khu vực blog -->

<!-- Phân trang -->
<div class="blog_pagination">
    <div class="row">
        <div class="col-12">
            <div class="page_number">
                <span>Trang: </span>
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
<!-- Kết thúc phân trang -->

<!-- Logo thương hiệu -->

<!-- Kết thúc logo thương hiệu -->


<?php
    }
}

?>