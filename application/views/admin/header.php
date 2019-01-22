<header class="container-fluid">            
    <div class="row">
        <div class="col-lg-3">
            <div class="name-cpanel">
                <h1>Admin Cpanel</h1>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="helloAdmin">
                <p>Xin chào : <?= $this->session->userdata('name') ?></p>
            </div>
        </div>
        <div class="col-lg-6">
            <ul class="actionHead">
                <li>
                    <a href="<?= base_url() ?>" target="_blank">
                        Xem trang 
                    </a>
                </li>

<!--                <li>
                    <a href="#">
                        <img src="<?= base_url() ?>public/admin/img/icon/lien-he.png" alt="Liên hệ"/>
                        Liên hệ
                    </a>
                </li>-->
                <li>
                    <a href="<?= base_url('admincp/admin/change_password') ?>">
                        <img src="<?= base_url() ?>public/admin/img/icon/doi-mat-khau.png" alt="Đổi mật khẩu"/>
                        Đổi mật khẩu
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admincp/admin/logout') ?>">
                        <img src="<?= base_url() ?>public/admin/img/icon/thoat.png" alt="Thoát"/>
                        Thoát
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>