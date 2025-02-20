<?php

namespace Src\Controllers\Client;

use Src\Framework\Controller;
use Src\Controllers\BaseController;
use Src\Views\Admin\Layouts\Home;
use Src\Views\Client\Layouts\Header;
use Src\Views\Client\Layouts\Footer;

class HomeController extends Controller
{

    public function show()
    {
        Header::render();
        Home::render();
        Footer::render();
    }
}
