<?php

namespace Src\Controllers\Client;

use  Src\Framework\Controller;
use Src\Views\Client\Page\Account;
use Src\Views\Client\Layouts\Footer;
use Src\Views\Client\Layouts\Header;

class AccountController extends Controller
{
    public function show()
    {
        Header::render();
        Account::render();
        Footer::render();
    }

    
}
