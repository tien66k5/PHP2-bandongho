<?php

namespace Src\Views\Client\Page;

use Src\Views\Viewer;

class Thanks extends Viewer
{

    public static function render($data = [])
    {

?>
        <div class="error_section">
            <div class="row">
                <div class="col-12">
                    <div class="error_form">
                        <h2>Cảm ơn bạn đã đặt hàng!</h2>
                        <p>Đơn hàng của bạn đã được xác nhận và đang được xử lý. Chúng tôi sẽ sớm giao hàng đến bạn!
                        </p>
                        <img style="width:200px" src="https://demoda.vn/wp-content/uploads/2023/02/anh-dong-cam-on-cute.gif" alt="">
                        <a href="/home">Về trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
