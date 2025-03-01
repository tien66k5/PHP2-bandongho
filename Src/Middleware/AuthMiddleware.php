<?php

namespace Src\Middleware;

class AuthMiddleware
{
public static function checkAdmin()
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] != '0') {
            header("Location: /login");
            exit;
        }
    }
}
