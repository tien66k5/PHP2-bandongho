<?php

namespace Src\Controllers\Admin;

use Src\Framework\Controller;
use Src\Models\Admin\CategoryModel;
use Src\Models\Admin\Product;
use Src\Validations\Admin\ProductValidate;
use Src\Views\Admin\Layouts\Header;
use Src\Views\Admin\Layouts\Footer;
use Src\Views\Admin\Pages\Products\ProductDetail;
use Src\Views\Admin\Pages\Products\ProductList;
use Src\Views\Admin\Pages\Products\ProductAdd;
use Src\Views\Admin\Pages\Products\ProductEdit;
use Exception;
use Src\Models\Admin\ProductModel;
use Src\Middleware\AuthMiddleware;

class ProductsController extends Controller
{
    public function __construct()
    {
        AuthMiddleware::checkAdmin();
    }
    public function list()
    {
        try {

            $model = new ProductModel();
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

            $categoryModel = new CategoryModel();
            $categories = $categoryModel->findAllC();
            Header::render();
            ProductAdd::render($categories);
            Footer::render();
        } catch (Exception $e) {
            echo "Lỗi :" . $e->getMessage();
        }
    }
    public function create()
    {
        try {
            $validate = $_POST;
            $errors = ProductValidate::productValidation($validate, $_FILES);

            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header("Location: /admin/product/add");
            } else {

                $target_dir = $_ENV['UPLOAD_DIR'];
                date_default_timezone_set($_ENV['TIMEZONE']);

                $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
                $nameImage = date('YmdHis') . '.' . $imageFileType;
                $target_file = $target_dir . $nameImage;

                $data = [
                    'name' => $_POST['name'] ?? '',
                    'description' => $_POST['description'] ?? null,
                    'price' => $_POST['price'] ?? 0,
                    'quantity' => $_POST['quantity'] ?? '',
                    'image' => $nameImage ?? ''
                ];

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    echo 'okela';
                } else {
                    echo 'fix đi ný';
                }

                $model = new ProductModel();
                $record = $model->insert($data);
                if (!$record) {
                    $errors[] = "Không thể thêm sản phẩm";
                }
                header("Location: /admin/products");
                exit;
            }
        } catch (Exception $e) {
            echo "" . $e->getMessage();
            $errors[] = "Có lỗi trong quá trình xử lý!";

            exit;
        }
    }

    public function edit(int $id)
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
                ProductEdit::render($data);
                Footer::render();
            }
        } catch (Exception $e) {

            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function detail($id)
    {
        try {
            $model = new ProductModel();
            $data = $model->find($id);
            Header::render();
            ProductDetail::render($data);
            Footer::render();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function update(int $id)
    {
        try {
            $model = new ProductModel();
            $product = $model->find($id);

            if (!$product) {
                throw new Exception("Sản phẩm không tồn tại: ID $id");
            }

            $data = [
                'name' => htmlentities($_POST['name']),
                'description' => empty($_POST['description']) ? null : $_POST['description'],
                'price' => $_POST['price']
            ];

            // kiểm tra có ảnh ko có thì up ko thì thôi
            if (!empty($_FILES['image']['name'])) {
                $target_dir = $_ENV['UPLOAD_DIR'];
                date_default_timezone_set($_ENV['TIMEZONE']);

                $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
                $nameImage = date('YmdHis') . '.' . $imageFileType;
                $target_file = $target_dir . $nameImage;

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $data['image'] = $nameImage;
                } else {
                    throw new Exception("Lỗi khi upload ảnh.");
                }
            }
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
            $model = new ProductModel();
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
