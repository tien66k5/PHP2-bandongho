<?php

namespace Src\Views\Admin\Pages\Users;

use Src\Views\Viewer;

class UsersList extends Viewer
{

    public static function render($data = [])
    {
?>
        <div class="container col-12">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="table-responsive pt-3">
                            <table class="table table-striped project-orders-table">
                                <thead>
                                    <tr>
                                        <th class="ml-5">ID </th>
                                        <th>Họ Tên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
                                        <th>Vai trò</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // echo '<pre>';
                                    // var_dump($data);

                                    ?>
                                    <?php
                                    if (empty($data)):
                                    ?>
                                        <h1>Không có dữ liệu</h1>
                                        <?php else:
                                        foreach ($data as $user):
                                        ?>
                                            <tr>
                                                <td><?= $user['id'] ?></td>
                                                <td><?= (!empty($user['fullname'])) ? $user['fullname'] : 'Chưa cập nhật'; ?></td>
                                                <td><?= $user['email'] ?></td>
                                                <td><?= (!empty($user['phone'])) ? $user['phone'] : 'Chưa cập nhật'; ?></td>
                                                <td><?= ($user['status'] == '1') ? 'Hoạt động' : 'Đã khóa'; ?>
                                                </td>
                                                <td><?= ($user['role'] == '0') ? 'admin' : 'Người dùng'; ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="/admin/users/edit/<?= $user['id'] ?>">
                                                            <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                                Sửa
                                                                <i class="typcn typcn-edit btn-icon-append"></i>
                                                            </button>
                                                        </a>
                                                        <form action="users/delete/<?= $user['id'] ?>" method="get" onsubmit="return confirm('Bạn chắc là xóa chứ?')">

                                                            <input type="hidden" name="method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger btn-sm btn-icon-text">Xóa</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}
