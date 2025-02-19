<?php

namespace Src\Controllers\Admin;

use Src\Framework\Controller;
use Src\Models\Admin\Product;
use Src\Views\Admin\Layouts\Header;
use Src\Views\Admin\Layouts\Footer;
use Src\Views\Admin\Pages\Products\ProductList;
use Src\Views\Admin\Pages\Products\ProductAdd;
use Src\Views\Admin\Pages\Products\ProductEdit;
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

    public function add()
    {
        try {
            Header::render();
            ProductAdd::render();
            Footer::render();
        } catch (Exception $e) {
            echo "Lỗi :" . $e->getMessage();
        }
    }
    public function create()
    {
        try {

            $data = [
                'name' => $_POST['name'] ?? '',
                'description' => $_POST['description'] ?? null,
                'price' => $_POST['price'] ?? 0,
                // 'image' => $_FILES['image']['name'] ?? ''
            ];

            // var_dump($data);
            $model = new Product();
            $record = $model->insert($data);
            if (!$record) {
                throw new Exception("Không thể thêm sản phẩm");
            }


            header("Location: " . $record . "/show");
            exit;
        } catch (Exception $e) {
            echo "" . $e->getMessage();
            // ProductNew::render([
            //     'errors' => $model->getErrors() ?? [$e->getMessage()],
            //     'product' => $data
            // ]);

            exit;
        }
    }
    // public function edit(){
    //     echo $this->view->render('Admin/Pages/Products/ProductEdit');
    // }
    public function edit(int $id)
    {
        try {
            $model = new Product();
            $product = $model->find($id);

            $data = [
                'product' => $product
            ];
            // var_dump($data);
            if (!$product) {
                throw new Exception("Sản phẩm không tồn tại: ID $id");
            } else {
                Header::render();
                ProductEdit::render($data);
                var_dump($data);
                Footer::render();
            }
        } catch (Exception $e) {

            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function update(int $id)
    {
        try {
            $model = new Product();
            $product = $model->find($id);

            if (!$product) {
                throw new Exception("Sản phẩm không tồn tại: ID $id");
            }
            $data = [
                'name' => htmlentities($_POST['name']),
                'description' => empty($_POST['description']) ? null : $_POST['description'],
                'price' => $_POST['price'],
                // filter_var(    email    )

                // 'image' => !empty($_FILES['image']['name']) ? $_FILES['image']['name'] : $product['image']
            ];
            // var_dump($data);
            if ($model->update($id, $data)) {

                header("Location: /admin/products");
            } else {

                ProductEdit::render(
                    [
                        'errors' => $model->getErrors(),
                        'product' => array_merge($product, $data)
                    ]
                );
                exit;
            }
        } catch (Exception $e) {

            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function showFormDelete($id)
    {

        $data = [
            'id' => $id
        ];

        // DeleteProduct::render($data);
    }

    public function delete(int $id)
    {
        try {
            $model = new Product();
            $product = $model->find($id);

            if (!$product) {
                throw new Exception("Sản phẩm không tồn tại: ID $id");
            }

            if ($model->delete($id)) {

                header("Location: /admin/products");
            } else {

                echo "Xóa sản phẩm không thành công";
            }
        } catch (Exception $e) {

            echo "Lỗi: " . $e->getMessage();
        }
    }
}
