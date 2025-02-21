<?php

namespace Src\Validations;

class ValidateEmpty
{

    public static function validateEmpty($validate)
    {
        $errors = [];
        // echo '<pre>';
        // var_dump($validate);

        foreach ($validate as $key => $value) {
            if (in_array($key, ['submit', 'reset', 'button'])) {
                continue; // Bỏ qua các input không cần validate
            }

            // Bỏ trống nhưng vẫn cho phép số 0 hợp lệ
            if ($value === "" || $value === null) {
                $errors[$key] = ucfirst($key) . " không được để trống!";
            }

            // Nếu là checkbox hoặc radio button, kiểm tra isset()
            if (in_array($key, ['checkbox_field', 'radio_field']) && !isset($validate[$key])) {
                $errors[$key] = ucfirst($key) . " không được để trống!";
            }
        }

        return $errors;
    }
}
