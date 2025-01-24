<?php

namespace Src\Controllers\Client;

use Src\Controllers\BaseController;

class BlogController extends BaseController
{
    public function show()
    {
        echo $this->view->render('Client/Page/Blog', ['Name' => 'Tien']);
    }
}
