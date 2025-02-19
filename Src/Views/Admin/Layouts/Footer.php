<?php

namespace Src\Views\Admin\Layouts;

use Src\views\Viewer;

class Footer extends Viewer
{
    public static function render(array $data = [])
    { ?>
        <div class="main-panel">

            <div class="content-wrapper">


            </div>


            <footer class="footer">

                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                                2024 <a href="#" class="text-muted" target="_blank">Bee Technova</a>.
                                All rights reserved.</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">Bee
                                <a href="#" class="text-muted" target="_blank">Technova
                                    Admin</a></span>
                        </div>
                    </div>
                </div>
            </footer>

        </div>

        </div>

        </div>
        <!-- <script src="<?= getenv('APP_URL') ?>/public/assets/admin/vendors/js/vendor.bundle.base.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- <script src="<?= getenv('APP_URL') ?>/node_modules/chart.js/dist/Chart.min.js"></script>
          -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="<?= getenv('APP_URL') ?>/public/Assets/Admin/js/off-canvas.js"></script>
        <script src="<?= getenv('APP_URL') ?>/public/Assets/Admin/js/hoverable-collapse.js"></script>
        <script src="<?= getenv('APP_URL') ?>/public/Assets/Admin/js/template.js"></script>
        <script src="<?= getenv('APP_URL') ?>/public/Assets/Admin/js/settings.js"></script>
        <script src="<?= getenv('APP_URL') ?>/public/Assets/Admin/js/todolist.js"></script>
        <script src="<?= getenv('APP_URL') ?>/public/Assets/Admin/js/dashboard.js"></script>
        <script src="<?= getenv('APP_URL') ?>/public/Assets/Admin/js/variations.js"></script>

        </body>

        </html>
<?php
    }
}
