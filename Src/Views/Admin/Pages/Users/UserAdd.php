<?php

namespace Src\Views\Admin\Pages\Users;

use Src\Views\Viewer;

class UserAdd extends Viewer
{
    public static function render($data = [])
    {

?>

        <div class="container col-10">
            <div class="row mt-4">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thêm người dùng</h4>
                            <form class="form-sample" action="/admin/users/register" method="POST">
                                <input type="hidden" name="method" value="POST" id="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Tên người dùng</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control border-primary border-primary" name="name" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Mật khẩu</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control border-primary" name="password" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control border-primary" name="email" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Số điện thoại</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control border-primary" name="phone" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Vai trò</label>
                                            <div class="col-sm-12">
                                                <select class="form-control border-primary" name="role" id="role">
                                                    <option value="1">client</option>
                                                    <option value="2">admin</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <button type="submit" class="btn btn-primary" name="submit">Thêm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
