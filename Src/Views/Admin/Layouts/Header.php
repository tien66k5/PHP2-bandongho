<?php

namespace Src\Views\Admin\Layouts;

use Src\views\Viewer;

class Header extends Viewer
{
    public static function render(array $data = [])
    { ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Bee Technova Admin</title>
            <link rel="stylesheet"
                href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
            <link rel="stylesheet" href="<?= getenv('APP_URL') ?>/node_modules/typicons.font/src/font/typicons.css">
            <link rel="stylesheet" href="<?= getenv('APP_URL') ?>/public/Assets/Admin/Styles/style.css">

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script
                src="https://code.jquery.com/jquery-3.7.1.min.js"
                integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
                crossorigin="anonymous"></script>
            <script src="<?= getenv('APP_URL') ?>/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <!-- Bootstrap 4 -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
            <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet"
                type="text/css" />
            <!-- Font Awesome 6 (Mới nhất) -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        </head>

        <body>


            <?php
            // var_dump($_SESSION);
            // die;
            ?>
            <div class="container mt-4">
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="custom-alert-container">
                        <div class="custom-alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                <?php
                                $errorMessages = is_array($_SESSION['error']) ? $_SESSION['error'] : explode("\n", $_SESSION['error']);
                                foreach ($errorMessages as $value) :
                                ?>
                                    <li><?= htmlspecialchars($value) ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                    </div>
                <?php
                    unset($_SESSION['error']);
                endif;
                unset($_SESSION['success']);
                unset($_SESSION['errors']);
                ?>
            </div>





            <div class="container-scroller">

                <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                    <div class="navbar-brand-wrapper d-flex justify-content-center">
                        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                            <!-- <a class="navbar-brand brand-logo" href="/admin/dashboard"><img src="<?= getenv('APP_URL') ?>public/assets/admin/images/beelogo.png" -->
                            <a class="navbar-brand brand-logo" href="/admin/dashboard"><img
                                    src="<?= getenv('APP_URL') ?>\public\Assets\Admin\Images\WebLogo.png" alt="logo" /></a>
                            <a class="navbar-brand brand-logo-mini" href="/admin/dashboard"
                                style="color: #fff; text-decoration: none;">Bee</a>
                            <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                                data-toggle="minimize">
                                <span class="typcn typcn-th-menu"></span>
                            </button>
                        </div>
                    </div>
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item dropdown">
                                <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center"
                                    id="messageDropdown" href="#" data-bs-toggle="dropdown">
                                    <i class="typcn typcn-cog-outline mx-0"></i>
                                    <span class="count"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                    aria-labelledby="messageDropdown">

                                </div>
                            </li>
                            <li class="nav-item dropdown mr-0">
                                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center"
                                    id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                                    <i class="typcn typcn-bell mx-0"></i>
                                    <span class="count"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                    aria-labelledby="notificationDropdown">
                                    <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-success">
                                                <i class="typcn typcn-info mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-normal">Application Error</h6>
                                            <p class="font-weight-light small-text mb-0 text-muted">
                                                Just now
                                            </p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-warning">
                                                <i class="typcn typcn-cog-outline mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-normal">Settings</h6>
                                            <p class="font-weight-light small-text mb-0 text-muted">
                                                Private message
                                            </p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-info">
                                                <i class="typcn typcn-user mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-normal">New user registration</h6>
                                            <p class="font-weight-light small-text mb-0 text-muted">
                                                2 days ago
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                            data-toggle="offcanvas">
                            <span class="typcn typcn-th-menu"></span>
                        </button>
                    </div>
                </nav>
                <div class="container-fluid page-body-wrapper">

                    <nav class="sidebar sidebar-offcanvas" id="sidebar">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/home">
                                    <i class="typcn typcn-device-laptop menu-icon"></i>
                                    <span class="menu-title">Về trang web</span>
                                    <div class="badge badge-danger">new</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/dashboard">
                                    <i class="typcn typcn-device-desktop menu-icon"></i>
                                    <span class="menu-title">Dashboard</span>
                                    <div class="badge badge-danger">new</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="" data-bs-toggle="collapse" data-bs-target="#userSubmenu">
                                    <i class="typcn typcn-business-card menu-icon"></i>
                                    <span class="menu-title">Người dùng</span>
                                </a>
                                <div id="userSubmenu" class="collapse submenu">
                                    <a class="nav-link" href="/admin/users">Danh sách người dùng</a>
                                    <a class="nav-link" href="/admin/users/add">Thêm người dùng</a>
                                </div>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#productsSubmenu">
                                    <i class="typcn typcn-archive menu-icon"></i>
                                    <span class="menu-title">Sản phẩm</span>
                                </a>
                                <div id="productsSubmenu" class="collapse submenu">
                                    <a class="nav-link" href="/admin/products">Danh sách sản phẩm</a>
                                    <a class="nav-link" href="/admin/product/add">Thêm sản phẩm</a>
                                </div>
                            </li>

                            <!-- <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#attributeSubmenu">
                            <i class="typcn typcn-archive menu-icon"></i>
                            <span class="menu-title">Thuộc Tính Sản phẩm</span>
                        </a>
                        <div id="attributeSubmenu" class="collapse submenu">
                            <a class="nav-link" href="/admin/allAttribute">Danh sách thuộc tính sản phẩm</a>
                            <a class="nav-link" href="/admin/attribute">Thêm thuộc tính</a>
                        </div>
                    </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#categoriesSubmenu">
                                    <i class="typcn typcn-th-small menu-icon"></i>
                                    <span class="menu-title">Phân loại sản phẩm</span>
                                </a>
                                <div id="categoriesSubmenu" class="collapse submenu">
                                    <a class="nav-link" href="/admin/category">Danh sách loại sản phẩm</a>
                                    <a class="nav-link" href="/admin/category/add">Thêm loại sản phẩm</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#ordersSubmenu">
                                    <i class="typcn typcn-clipboard menu-icon"></i>
                                    <span class="menu-title">Đơn hàng</span>
                                </a>
                                <div id="ordersSubmenu" class="collapse submenu">
                                    <a class="nav-link" href="/admin/orders">Danh sách đơn hàng</a>
                                </div>
                            </li>
                            <!-- <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#brandsSubmenu">
                            <i class="typcn typcn-tags menu-icon"></i>
                            <span class="menu-title">Thương hiệu</span>
                        </a>
                        <div id="brandsSubmenu" class="collapse submenu">
                            <a class="nav-link" href="/admin/brands">Danh sách thương hiệu</a>
                            <a class="nav-link" href="/admin/brand/add">Thêm thương hiệu</a>
                        </div>
                    </li> -->
                            <!-- <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#vouchersSubmenu">
                            <i class="typcn typcn-ticket menu-icon"></i>
                            <span class="menu-title">Mã giảm giá</span>
                        </a>
                        <div id="vouchersSubmenu" class="collapse submenu">
                            <a class="nav-link" href="/admin/vouchers">Danh sách mã giảm giá</a>
                            <a class="nav-link" href="/admin/create-voucher">Thêm mã giảm giá</a>
                        </div>
                    </li> -->
                            <!-- <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#commentsSubmenu">
                            <i class="typcn typcn-message menu-icon"></i>
                            <span class="menu-title">Bình luận</span>
                        </a>
                        <div id="commentsSubmenu" class="collapse submenu">
                            <a class="nav-link" href="/admin/comments">Danh sách Bình luận</a>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#ratingsSubmenu">
                            <i class="typcn typcn-star  menu-icon"></i>
                            <span class="menu-title">Đánh giá</span>
                        </a>
                        <div id="ratingsSubmenu" class="collapse submenu">
                            <a class="nav-link" href="/admin/ratings">Danh sách đánh giá</a>

                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#InstallmentsSubmenu">
                            <i class="typcn typcn-th-small menu-icon"></i>
                            <span class="menu-title">Kế Hoạch Trả Góp</span>
                        </a>
                        <div id="InstallmentsSubmenu" class="collapse submenu">
                            <a class="nav-link" href="/admin/tragop">Danh sách trả góp</a>
                            <a class="nav-link" href="/admin/tragop/add">Thêm đơn trả góp</a>
                        </div>
                    </li> -->

                        </ul>
                    </nav>

            <?php
        }
    }
