<?php

namespace Src\Validations\Admin;

use Src\Validations\ValidateEmpty;

class ProductValidate
{

    public static function productValidation($validate, $files)
    {
        // $errors = []; 

        // $emptyInput = ValidateEmpty::validateEmpty($validate);
        // if ($emptyInput) {
        //     $errors = $emptyInput;
        // }


        // if (isset($files['image']) && $files['image']['error'] === 4) { 
        //     $errors['image'] = "Ảnh không được để trống";

        // }
        // if($validate['price'] < 0 ){
        //     $errors['price'] = "Giá tiền không được âm";

        // }
        // return !empty($errors) ? $errors : null;

        $errors = [];

        $emptyInput = ValidateEmpty::validateEmpty($validate);
        if ($emptyInput) {
            $errors = $emptyInput;
        }

        if (isset($files['image']) && $files['image']['error'] === 4) {
            $errors['image'] = "Ảnh không được để trống";
        }

        if ($validate['price'] < 0) {
            $errors['price'] = "Giá tiền không được âm";
        }

        // Nếu có lỗi, lưu vào session
        if (!empty($errors)) {
            $_SESSION['error'] = $errors;
            return $errors;
        }

        return null;
    }
}
