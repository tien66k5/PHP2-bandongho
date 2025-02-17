<?php

namespace Src\Views;

/**
 * Class Abstract Viewer
 * Class Abstract là lớp không sử dụng từ khoá new để khởi tạo
 * Class Abstract có ít nhất một phương thức abstract
 * Class Abstract sẽ có phương thức và thuộc tính như một lớp bình thường
 * Các lớp con kế thừa lớp Abstract phải triển khai các phương thức abstract
 * @method render()
*/
abstract class Viewer{


    /**
     * Phương thức này dùng để render ra giao diện
     * Phương thức có chữ static là phương thức mà có thể được gọi ra
     * không cần phải khởi tạo đối tượng (chữ new)
     * @param array $data
     * @return void
     */
    abstract public static function render(array $data = []);
}