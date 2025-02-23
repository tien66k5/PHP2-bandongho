<?php

namespace Src\Validations;

class ValidateEmpty
{
    private static array $errors = [];

    public static function validateEmpty($validate): array
    {
        self::$errors = []; // Reset lỗi trước khi kiểm tra

        foreach ($validate as $key => $value) {
            if (in_array($key, ['submit', 'reset', 'button'])) {
                continue; 
            }

            // Kiểm tra rỗng, nhưng số 0 hợp lệ
            if ($value === "" || $value === null) {
                self::addErrors($key, ucfirst($key) . " không được để trống!");
            }

            // Kiểm tra checkbox hoặc radio button
            if (in_array($key, ['checkbox_field', 'radio_field']) && !isset($validate[$key])) {
                self::addErrors($key, ucfirst($key) . " không được để trống!");
            }
        }

        return self::$errors;
    }

    // Hàm thêm lỗi
    private static function addErrors(string $field, string $message): void
    {
        self::$errors[$field] = $message;
    }
}
