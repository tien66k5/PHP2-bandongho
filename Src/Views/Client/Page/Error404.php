<?php

namespace Src\Views\Client\Page;

use Src\Views\Viewer;

class Error404 extends Viewer
{

    public static function render($data = [])
    {

?>
        <div class="error_section">
            <div class="row">
                <div class="col-12">
                    <div class="error_form">
                        <h1>404</h1>
                        <h2>Vui lòng liên hệ với quản trị viên</h2>
                        <!-- <form action="#">
                            <input placeholder="Search..." type="text">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form> -->
                        <a href="/home">Về trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
