<?php

namespace Src\Views\Client\Layouts;

use Src\views\Viewer;

class Footer extends Viewer
{
    public static function render(array $data = [])
    { ?>

        <!-- khu vực chân trang bắt đầu -->
        <div class="footer_area">
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer_widget">
                                <h3>Về chúng tôi</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="footer_widget_contect">
                                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> 19 Interpro Road Madison, AL 35758, USA</p>

                                    <p><i class="fa fa-mobile" aria-hidden="true"></i> (012) 234 432 3568</p>
                                    <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact@plazathemes.com </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer_widget">
                                <h3>Tài khoản của tôi</h3>
                                <ul>
                                    <li><a href="#">Tài khoản của bạn</a></li>
                                    <li><a href="#">Đơn hàng của tôi</a></li>
                                    <li><a href="#">Phiếu tín dụng của tôi</a></li>
                                    <li><a href="#">Địa chỉ của tôi</a></li>
                                    <li><a href="#">Đăng nhập</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer_widget">
                                <h3>Thông tin</h3>
                                <ul>
                                    <li><a href="#">Khuyến mãi</a></li>
                                    <li><a href="#">Cửa hàng của chúng tôi!</a></li>
                                    <li><a href="#">Phiếu tín dụng của tôi</a></li>
                                    <li><a href="#">Điều khoản và điều kiện</a></li>
                                    <li><a href="#">Về chúng tôi</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer_widget">
                                <h3>Thêm</h3>
                                <ul>
                                    <li><a href="#">Thương hiệu</a></li>
                                    <li><a href="#">Phiếu quà tặng</a></li>
                                    <li><a href="#">Đối tác</a></li>
                                    <li><a href="#">Khuyến mãi</a></li>
                                    <li><a href="#">Chính sách bảo mật</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!--footer area end-->





        <!-- all js here -->
        <script src="<?= getenv('APP_URL')  ?>/public/assets/js/vendor/jquery-1.12.0.min.js"></script>
        <script src="<?= getenv('APP_URL')  ?>/public/assets/js/popper.js"></script>
        <script src="<?= getenv('APP_URL')  ?>/public/assets/js/bootstrap.min.js"></script>
        <script src="<?= getenv('APP_URL')  ?>/public/assets/js/ajax-mail.js"></script>
        <script src="<?= getenv('APP_URL')  ?>/public/assets/js/plugins.js"></script>
        <script src="<?= getenv('APP_URL')  ?>/public/assets/js/main.js"></script>
        </body>

        </html>
<?php
    }
}
