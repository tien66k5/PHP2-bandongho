<?php

namespace Src\Controllers\Client;

use Src\Framework\Controller;
use Src\Views\Client\Layouts\Footer;
use Src\Views\Client\Layouts\Header;
use Src\Views\Client\Page\Product\ProductList;

class ProductController extends Controller
{
    public function show()
    {
        Header::render();
        ProductList::render();
        Footer::render();
    }
}
