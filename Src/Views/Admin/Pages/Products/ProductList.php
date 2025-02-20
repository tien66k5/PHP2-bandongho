<?php

namespace Src\Views\Admin\Pages\Products;

use Src\views\Viewer;

class ProductList extends Viewer
{
    public static function render(array $data = [])
    { ?>
        <div class="col-lg-10 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách Sản phẩm</h4>

                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php if (empty($data)): ?>
                                        <p>Không có sản phẩm nào!</p>
                                <tr>
                                    <td colspan="5" class="text-center text-danger">Không có dữ liệu</td>
                                </tr>
                            <?php else: ?>

                                <?php $index = 1;
                                        foreach ($data as $product): ?>

                                    <td><?= $index++; ?></td>

                                    <td><?= htmlspecialchars($product['name']); ?></td>
                                    <td><?= htmlspecialchars($product['price']); ?></td>
                                    <td><img src="/public/Uploads/<?= htmlspecialchars($product['image']) ?>" alt="Hình ảnh sản phẩm" width="100%"></td>
                                    <td>Hoạt động</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex" style="display: flex;" href="product/edit/<?= $product['id'] ?>">
                                                    <p class="m-0">Sửa</p>
                                                    <i class="ml-1 d-flex align-items-center justify-content-center typcn typcn-edit btn-icon-append"></i>
                                                </a>
                                                <a class="dropdown-item d-flex" href="product/delete/<?= $product['id'] ?>" onclick="return confirm('Bạn chắc chứ?')">
                                                    <p class="m-0">Xóa</p>
                                                    <i class="ml-1 d-flex align-items-center justify-content-center typcn typcn-delete-outline btn-icon-append"></i>
                                                </a>
                                                <a class="dropdown-item d-flex" href="#">
                                                    <p class="m-0">Chi tiết</p>
                                                    <i class="ml-1 d-flex align-items-center justify-content-center typcn typcn-edit btn-icon-append"></i>
                                                </a>
                                                <!-- <a class="dropdown-item d-flex" href="#">
                                                    <p class="m-0">Thêm thông số kỹ thuật</p>
                                                    <i class="ml-1 d-flex align-items-center justify-content-center typcn typcn-edit btn-icon-append"></i>
                                                </a> -->
                                            </div>
                                        </div>
                                    </td>
                                    </tr>

                            </tbody>
                        <?php endforeach; ?>
                    <?php endif; ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}
