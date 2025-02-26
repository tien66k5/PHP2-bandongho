<?php

namespace Src\Views\Client\Page;

use Src\views\Viewer;

class Login extends Viewer
{
    public static function render(array $data = [])
    {
?>


 

        <div class="toast-container position-fixed top-0 end-0 p-3">
            <?php if (isset($_SESSION['success'])) : ?>
                <div id="toastSuccess" class="toast bg-success text-white" role="alert" data-bs-autohide="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <strong>Success!</strong> <?= $_SESSION['success'] ?>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                    </div>
                </div>
            <?php unset($_SESSION['success']);
            endif; ?>

            <?php if (isset($_SESSION['error'])) : ?>
                <div id="toastError" class="toast bg-danger text-white" role="alert" data-bs-autohide="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <strong>Error!</strong> <?= $_SESSION['error'] ?>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                    </div>
                </div>
            <?php unset($_SESSION['error']);
            endif; ?>
        </div>





        <div class="customer_login">
            <div class="row">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>Đăng nhập</h2>
                        <form action="/user/login" method="post">
                            <p>
                                <label>Vui lòng nhập email<span>*</span></label>
                                <input type="text" name="email">
                            </p>
                            <p>
                                <label>Mật khẩu<span>*</span></label>
                                <input type="password" name="password">
                            </p>
                            <div class="login_submit">
                                <button type="submit" class="rounded">Đăng nhập</button>
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
                        <form action="/register" method="post">
                            <p>
                                <label>Vui lòng nhập email<span>*</span></label>
                                <input type="email" name="email">
                            </p>
                            <p>
                                <label>Mật khẩu<span>*</span></label>
                                <input type="password" name="password">
                            </p>
                            <p>
                                <label>Nhập lại mật khẩu<span>*</span></label>
                                <input type="password" name="confirmPassword">
                            </p>
                            <div class="login_submit">
                                <button type="submit " class="rounded">Xác nhận</button>
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