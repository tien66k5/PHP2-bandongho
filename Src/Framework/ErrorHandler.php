<?php

namespace Src\Framework;

class ErrorHandler
{
    /**
     * Xử lý lỗi HTTP chung
     * @param int $statusCode Mã lỗi HTTP
     * @param string $message Thông báo lỗi
     */
    public static function handle($statusCode, $message)
    {
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');

        echo json_encode([
            "error" => $message,
            "code" => $statusCode
        ], JSON_PRETTY_PRINT);
        exit;
    }

    // Lỗi 400 - Bad Request
    public static function badRequest($message = "Yêu cầu không hợp lệ!")
    {
        $_SESSION['error'] = "Lỗi: Không tìm thấy tài nguyên! ";
        header("Location: /error");
        // self::handle(400, $message);
    }

    // Lỗi 401 - Unauthorized
    public static function unauthorized($message = "Bạn chưa đăng nhập!")
    {
        $_SESSION['error'] = "Lỗi: Bạn chưa đăng nhập! ";
        header("Location: /error");
        // self::handle(401, $message);
    }

    // Lỗi 403 - Forbidden
    public static function forbidden($message = "Bạn không có quyền truy cập!")
    {
        $_SESSION['error'] = "Lỗi: Bạn không có quyền truy cập! ";
        header("Location: /error");
        // self::handle(403, $message);
    }

    // Lỗi 404 - Not Found
    public static function notFound($message = "Không tìm thấy tài nguyên!")
    {
        $_SESSION['error'] = "Lỗi: Không tìm thấy tài nguyên! ";
        header("Location: /error");
        // self::handle(404, $message);
    }

    // Lỗi 405 - Method Not Allowed
    public static function methodNotAllowed($message = "Phương thức không được phép!")
    {
        $_SESSION['error'] = "Lỗi: Phương thức không được phép! ";
        header("Location: /error");
        // self::handle(405, $message);
    }

    // Lỗi 500 - Internal Server Error
    public static function internalServerError($message = "Lỗi máy chủ nội bộ!")
    {
        $_SESSION['error'] = "Lỗi: Lỗi máy chủ nội bộ! ";
        header("Location: /error");
        // self::handle(500, $message);
    }

    // Lỗi 503 - Service Unavailable
    public static function serviceUnavailable($message = "Dịch vụ tạm thời không khả dụng!")
    {
        $_SESSION['error'] = "Lỗi: Dịch vụ tạm thời không khả dụng! ";
        header("Location: /error");
        // self::handle(503, $message);
    }
}
