<?php

namespace Src\Views\Client\Page;

use Src\Views\Viewer;

class Account extends Viewer
{
    public static function render(array $data = [])
    {
?>
        <!-- $dataUser = $data['user'] ?? []; -->
        <!--breadcrumbs area start-->
        <div class="breadcrumbs_area">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>my account</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->

        <!-- Start Maincontent  -->
        <section class="main_content_area">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Dashboard</a>
                                </li>
                                <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                                <li><a href="#downloads" data-toggle="tab" class="nav-link">Downloads</a></li>
                                <li><a href="#address" data-toggle="tab" class="nav-link">Addresses</a></li>
                                <li><a href="#account-details" data-toggle="tab" class="nav-link">Tài khoản</a></li>
                                <li><a href="/logout" class="nav-link">logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade show active" id="dashboard">
                                <h3>Dashboard </h3>
                                <p>From your account dashboard. you can easily check &amp; view your <a
                                        href="#">recent orders</a>, manage your <a href="#">shipping and billing
                                        addresses</a> and <a href="#">Edit your password and account
                                        details.</a></p>
                            </div>
                            <div class="tab-pane fade" id="orders">
                                <h3>Orders</h3>
                                <div class="coron_table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Đơn hàng</th>
                                                <th>Ngày đặt</th>
                                                <th>Trạng thái</th>
                                                <th>Tổng tiền</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $dataOrder = $data['orders'] ?? [];
                                            foreach ($dataOrder as $index => $order) {
                                            ?>
                                                <tr>
                                                    <td><?= $index + 1 ?></td>
                                                    <td><?= $order['created_at'] ?></td>
                                                    <td><span class='statusClass'><?php
                                                                                    switch ($order['status']) {
                                                                                        case 1:
                                                                                            echo 'Đang xử lý';
                                                                                            break;
                                                                                        case 2:
                                                                                            echo 'Chờ thanh toán';
                                                                                            break;
                                                                                        case 3:
                                                                                            echo 'Đã thanh toán';
                                                                                            break;
                                                                                        case 4:
                                                                                            echo 'Đang vận chuyển';
                                                                                            break;
                                                                                        case 5:
                                                                                            echo 'Đã giao';
                                                                                            break;
                                                                                        default:
                                                                                            echo 'Đã hủy';
                                                                                            break;
                                                                                    }
                                                                                    ?></span></td>
                                                    <td><?= number_format($order['total_price'], 0, ',', '.') ?></td>
                                                    <td><a href='' class='view'>view</a></td>
                                                </tr>
                                            <?php                                          }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="downloads">
                                <h3>Downloads</h3>
                                <div class="coron_table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Downloads</th>
                                                <th>Expires</th>
                                                <th>Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Shopnovilla - Free Real Estate PSD Template</td>
                                                <td>May 10, 2018</td>
                                                <td><span class="danger">Expired</span></td>
                                                <td><a href="#" class="view">Click Here To Download Your
                                                        File</a></td>
                                            </tr>
                                            <tr>
                                                <td>Organic - ecommerce html template</td>
                                                <td>Sep 11, 2018</td>
                                                <td>Never</td>
                                                <td><a href="#" class="view">Click Here To Download Your
                                                        File</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <p>The following addresses will be used on the checkout page by default.</p>
                                <h4 class="billing-address">Billing address</h4>
                                <a href="#" class="view">Edit</a>
                                <p><strong>Bobby Jackson</strong></p>
                                <address>
                                    House #15<br>
                                    Road #1<br>
                                    Block #C <br>
                                    Banasree <br>
                                    Dhaka <br>
                                    1212
                                </address>
                                <p>Bangladesh</p>
                            </div>
                            <div class="tab-pane fade" id="account-details">
                                <h3>Tài khoản</h3>
                                <div class="login">
                                    <div class="login_form_container">
                                        <div class="account_login_form">
                                            <form action="#">
                                                <!-- <p>Already have an account? <a href="#">Log in instead!</a></p>
                                                        <div class="input-radio">
                                                            <span class="custom-radio"><input type="radio" value="1"
                                                                    name="id_gender"> Mr.</span>
                                                            <span class="custom-radio"><input type="radio" value="1"
                                                                    name="id_gender"> Mrs.</span>
                                                        </div> <br> -->
                                                <!-- <label>First Name</label>
                                                        <input type="text" name="first-name">
                                                        <label>Last Name</label>
                                                        <input type="text" name="last-name"> -->
                                                <label>Họ và Tên</label>
                                                <input type="text" name="fullname" value="<?= $data['fullname'] ??  '' ?>" placeholder='Thêm tên cho tài khoản'>
                                                <label>Email</label>
                                                <input type="text" name="email" value="<?= $data['email'] ?>">
                                                <label>Mật khẩu</label>
                                                <input type="password" name="password" placeholder="Đổi mật khẩu làm sau nếu kịp">
                                                <!-- <label>Birthdate</label>
                                                        <input type="text" placeholder="MM/DD/YYYY" value=""
                                                            name="birthday"> -->
                                                <!-- <span class="example">
                                                            (E.g.: 05/31/1970)
                                                        </span> -->
                                                <!--                                                        
                                                        <span class="custom_checkbox">
                                                            <input type="checkbox" value="1" name="optin">
                                                            <label>Receive offers from our partners</label>
                                                        </span>
                                                  
                                                        <span class="custom_checkbox">
                                                            <input type="checkbox" value="1" name="newsletter">
                                                            <label>Sign up for our newsletter<br><em>You may unsubscribe
                                                                    at any moment. For that purpose, please find our
                                                                    contact info in the legal notice.</em></label>
                                                        </span> -->
                                                <div class="save_button primary_btn default_button">
                                                    <a href="#">Lưu</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Maincontent  -->
        </div>
        <!--pos page inner end-->
        </div>
        </div>
        <!--pos page end-->


<?php   }
}

?>