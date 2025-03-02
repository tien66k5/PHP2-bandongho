<?php

namespace Src\Controllers\Client;

use Error;
use Src\Framework\Controller;
use Src\Controllers\BaseController;
use Src\Views\Client\Home\Home;
use Src\Views\Client\Layouts\Header;
use Src\Views\Client\Layouts\Footer;
use Exception;
use Src\Models\Client\HomeModel;
use Src\Models\Admin\CategoryModel;
use Src\Views\Client\Page\Error404;
use Src\Views\Client\Page\Thanks;

class HomeController extends Controller
{

    // public function show()
    // {

    //     Header::render();
    //     Home::render();
    //     Footer::render();
    // }


    public function show()
    {
        try {

            $model = new HomeModel();
            $products = $model->findAll();

            $categoryModel = new CategoryModel();
            $categories = $categoryModel->findAll();

            // var_dump($products);
            Header::render();
            Home::render([
                'products' => $products,
                'categories' => $categories
            ]);
            Footer::render();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function showError() {
        try {
            // var_dump($products);
            Header::render();
            Error404::render();
            Footer::render();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function showThank() {
        try {
            // var_dump($products);
            Header::render();
            Thanks::render();
            Footer::render();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
