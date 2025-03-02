<?php

namespace Src\Controllers\Client;

use Src\Framework\Controller;
use Src\Models\Client\SearchModel;
use Src\Views\Client\Layouts\Footer;
use Src\Views\Client\Layouts\Header;
use Src\Views\Client\Page\SearchResults;

class SearchController extends Controller
{
    public function show()
    {
        $searchModel = new SearchModel();
        $keyword = $_GET['search'] ?? '';
        $data = $searchModel->search($keyword);
        // echo '<pre>';
        // var_dump($data);
        Header::render();
        SearchResults::render($data);
        Footer::render();
    }
}
