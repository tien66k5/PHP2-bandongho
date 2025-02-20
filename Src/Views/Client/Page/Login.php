<?php

namespace Src\Views\Client\Page;

use Src\views\Viewer;

class Login extends Viewer
{
    public static function render(array $data = [])
    {
?>
        <div class="customer_login">
            <div class="row">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>login</h2>
                        <form action="#">
                            <p>
                                <label>Vui lòng nhập email<span>*</span></label>
                                <input type="text" name="email">
                            </p>
                            <p>
                                <label>Mật khẩu<span>*</span></label>
                                <input type="password" name="password">
                            </p>
                            <div class="login_submit">
                                <button type="submit">login</button>
                                <!-- <label for="remember">
                                    <input id="remember" type="checkbox">
                                Lưu trên thiết bị này
                                </label> -->
                                <a href="#">Quên mật khẩu ?</a>
                            </div>

                        </form>
                    </div>
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Tạo tài khoản</h2>
                        <form action="#">
                            <p>
                                <label>Vui lòng nhập email<span>*</span></label>
                                <input type="email" name="email">
                            </p>
                            <p>
                                <label>Mật khẩu<span>*</span></label>
                                <input type="password" name="password">
                            </p>
                            <div class="login_submit">
                                <button type="submit">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
<?php   }
}

?>