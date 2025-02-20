<?php 
namespace   Src\Controllers\Client;

use Src\Framework\Controller;
use Exception;
use Src\Views\Client\Layouts\Footer;
use Src\Views\Client\Layouts\Header;
use Src\Views\Client\Page\Login;

class LoginController extends Controller {
    public function add(){
        Header::render();
        Login::render( );
        Footer::render();
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

            // // var_dump($data);
            // $model = new Product();
            // $record = $model->insert($data);
            // if (!$record) {
            //     throw new Exception("Không thể thêm sản phẩm");
            // }
            // header("Location: /admin/products");
            // exit;
        } catch (Exception $e) {
            echo "" . $e->getMessage();
            // ProductNew::render([
            //     'errors' => $model->getErrors() ?? [$e->getMessage()],
            //     'product' => $data
            // ]);

            exit;
        }
    }


}