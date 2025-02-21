<?php

namespace Src\Validations\Admin;

use Src\Validations\ValidateEmpty;

class ProductValidate
{

    public static function productValidation($validate , $files) 
    {
        $error = []; // Khởi tạo mảng chứa lỗi
    
        // Kiểm tra bỏ trống 
        $emptyInput = ValidateEmpty::validateEmpty($validate);
        if ($emptyInput) {
            $error = $emptyInput;
        }
    

        if (isset($files['image']) && $files['image']['error'] === 4) { // error 4: Không có file nào được chọn
            $error['image'] = "Ảnh không được để trống";
        }
        // Trả về danh sách lỗi nếu có, nếu không trả về null
        return !empty($error) ? $error : null;
    }
    


}
