<?php

namespace Src\Controllers\Admin;

use Src\Framework\Controller;
use Src\Views\Admin\Layouts\Footer;
use Src\Views\Admin\Layouts\Header;
use Src\Views\Admin\Pages\Category\CategoryList;
use Src\Views\Admin\Pages\Category\CategoryEdit;
use Src\Models\Admin\CategoryModel;
use Exception;
use PDOException;
use Src\Views\Admin\Pages\Category\CategoryAdd;

class CategoryController extends Controller
{
    public function list()
    {
        try {
            $model = new CategoryModel();
            $category = $model->findAll();

            if (!$category) {
                throw new Exception("Không tìm thấy sản phẩm nào.");
            }
            Header::render();
            CategoryList::render($category);
            Footer::render();
        } catch (Exception $e) {

            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function add()
    {
        try {
            Header::render();
            CategoryAdd::render();
            Footer::render();
        } catch (Exception $e) {
            echo "Lỗi :" . $e->getMessage();
        }
    }
    public function create()
    {
        try {
                    // tiến hành thêm sản phẩm
                    $data = [
                        'name' => $_POST['name'] ?? '',
                        'status' => $_POST['status'] ?? null,
                    ];

                    // var_dump($data);
                    $model = new CategoryModel();
                    $record = $model->insert($data);
                    if (!$record) {
                        throw new Exception("Không thể thêm sản phẩm");
                    }
                    header("Location: /admin/category");
                    exit;

                
        } catch (Exception $e) {
            echo "" . $e->getMessage();
            exit;
        }
    }









    public function edit(int $id)
    {
        try {
            $model = new CategoryModel();
            $category = $model->find($id);

            $data = [
                'category' => $category
            ];
            // var_dump($data);
            if (!$category) {
                throw new Exception("Sản phẩm không tồn tại: ID $id");
            } else {
                Header::render();
                CategoryEdit::render($data);
                Footer::render();
            }
        } catch (Exception $e) {

            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function update(int $id)
    {
        try {
            $model = new CategoryModel();
            $category = $model->find($id);

            if (!$category) {
                throw new Exception("Sản phẩm không tồn tại: ID $id");
            }
            $data = [
                'name' => htmlentities($_POST['name']),
                'status' => $_POST['status'] ?? null,
            ];
            // var_dump($data);
            if ($model->update($id, $data)) {
                header("Location: /admin/category");
            } else {

                categoryEdit::render(
                    [
                        'errors' => $model->getErrors(),
                        'category' => array_merge($category, $data)
                    ]
                );
                exit;
            }
        } catch (Exception $e) {

            echo "Lỗi: " . $e->getMessage();
        }
    }
    // // public function showFormDelete($id)
    // // {

    // //     $data = [
    // //         'id' => $id
    // //     ];

    // //     // Deletecategory::render($data);
    // // }

    public function delete(int $id)
    {
        try {
            $model = new categoryModel();
            $category = $model->find($id);

            if (!$category) {
                throw new Exception("Sản phẩm không tồn tại: ID $id");
            }

            if ($model->delete($id)) {

                header("Location: /admin/category");
            } else {

                echo "Xóa sản phẩm không thành công";
            }
        } catch (Exception $e) {

            echo "Lỗi: " . $e->getMessage();
        }
    }














}
