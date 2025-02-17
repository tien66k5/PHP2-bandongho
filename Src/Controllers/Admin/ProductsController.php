<?php

namespace Src\Controllers\Admin;

use Src\Framework\Controller;
use Src\Models\Admin\Product;
use Src\Views\Admin\Layouts\Header;
use Src\Views\Admin\Layouts\Footer;
use Src\Views\Admin\Pages\Products\ProductList;
use Exception;

class ProductsController extends Controller
{
    // public function show() {
    //     echo $this->view->render('Admin/Pages/Products/ProductList');
    // }
    public function list()
    {
        try {
            $model = new Product();
            $products = $model->findAll();

            if (!$products) {
                throw new Exception("Không tìm thấy sản phẩm nào.");
            }
            Header::render();
            ProductList::render($products);
            Footer::render();
        } catch (Exception $e) {

            echo "Lỗi: " . $e->getMessage();
        }
    }

    // public function add(){
    //     echo $this->view->render('Admin/Pages/Products/ProductAdd');
    // }
    // public function edit(){
    //     echo $this->view->render('Admin/Pages/Products/ProductEdit');
    // }
}
