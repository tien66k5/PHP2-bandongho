<?php

namespace Src\Controllers\Client;

use Src\Framework\Controller;
use Src\Models\Admin\CategoryModel;
use Src\Models\Client\ProductModel;
use Src\Views\Client\Layouts\Footer;
use Src\Views\Client\Layouts\Header;
use Src\Views\Client\Page\Product\ProductDetail;
use Src\Views\Client\Page\Product\ProductList;
use Exception;

class ProductController extends Controller
{
    public function show()
    {
        try {

            $model = new ProductModel();
            $products = $model->findAll();

            $categoryModel = new CategoryModel();
            $categories = $categoryModel->findAll();

            // var_dump($products);
            Header::render();
            ProductList::render([
                'products' => $products,
                'categories' => $categories
            ]);
            Footer::render();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function detail($id)
    {
        try {

            $model = new ProductModel();
            $product = $model->find($id);

            $data = [
                'product' => $product
            ];
            // var_dump($data);
            if (!$product) {
                throw new Exception("Sản phẩm không tồn tại: ID $id");
            } else {
                Header::render();
                ProductDetail::render($data);
                Footer::render();
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
