<?php

namespace Src\Validations\Admin;

use Src\Validations\ValidateEmpty;

class ProductValidate
{

    public static function productValidation($validate , $files) 
    {
        $error = []; 
    
        $emptyInput = ValidateEmpty::validateEmpty($validate);
        if ($emptyInput) {
            $error = $emptyInput;
        }
    

        if (isset($files['image']) && $files['image']['error'] === 4) { 
            $error['image'] = "Ảnh không được để trống";
        }
        if($validate['price'] < 0 ){
            $error['price'] = "Giá tiền không được âm";
            
        }
        return !empty($error) ? $error : null;
    }
    


}
