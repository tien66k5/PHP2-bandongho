<?php 
namespace Src\Controllers\Client;
use Src\Framework\Controller;
use Src\Views\Admin\Layouts\Footer;
use Src\Views\Client\Layouts\Header;
use Src\Views\Client\Page\Contact;

class ContactController extends Controller {
    public function show(){
        Header::render();
        Contact::render();
        Footer::render();
    }
}
