<?php

namespace Src\Views\Admin\Pages\Category;

use Src\Views\Viewer;

class CategoryEdit extends Viewer
{
    public static function render(array $data = []): void

    {
?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sửa Loại sản phẩm</h4>
                    <form action="/admin/category/update/<?= $data['category']['id'] ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">ID</label>
                            <input type="text" class="form-control" id="id" placeholder="id" name="id" value="<?= $data['category']['id'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tên Loại sản phẩm</label>
                            <input type="text" class="form-control form-control-lg" name="name" placeholder="Bàn phím.." value="<?= $data['category']['name'] ?>" aria-label="Category Name">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <div class="form-check form-check-success">
                            <select class="form-control form-control-sm col-lg-4" name="status">
                                <option value="1" <?= $data['category']['status'] == 1 ? 'selected' : ''; ?>>Hoạt động</option>
                                <option value="2" <?= $data['category']['status'] == 2 ? 'selected' : ''; ?>>Không hoạt động</option>
                            </select>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit" style="justify-self: flex-end;">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

    }
}
