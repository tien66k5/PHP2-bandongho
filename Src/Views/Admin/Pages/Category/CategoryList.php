<?php

namespace Src\Views\Admin\Pages\Category;

use Src\Views\Viewer;

class CategoryList extends Viewer
{
    public static function render(array $data = []): void

    {

?>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách Loại sản phẩm</h4>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Loại sản phẩm</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $category): ?>

                                    <tr>
                                        <td><?= $category['id'] ?></td>
                                        <td><?= $category['name'] ?></td>
                                        <td><?= $category['status'] == 1 ? 'Hoạt động' : 'Không hoạt động' ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="category/edit/<?= $category['id'] ?>" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                    Sửa
                                                    <i class="typcn typcn-edit btn-icon-append"></i>
                                                </a>
                                                <a href="category/delete/<?= $category['id'] ?>" onclick="return confirm('Bạn chắc chứ?')"
                                                    class="btn btn-danger btn-sm btn-icon-text">
                                                    Xóa
                                                    <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <h4 class="text-center text-danger">Không có dữ liệu</h4>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}
