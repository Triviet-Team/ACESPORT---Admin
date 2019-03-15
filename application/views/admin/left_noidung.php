<aside class="col-xl-2 col-lg-4 col-md-4 aside">
    <div class="boxTitle">
        Cấu trúc website
    </div>

    <div class="menu">
        <div class="widgets">
            <div class="widgetsTitle">
                <button type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                    <img src="<?= base_url() ?>public/admin/img/icon/quan-li-san-pham.png" alt="Danh"/>
                    Quản lí nội dung giải đấu
                </button>
            </div>
            <div class="widgetsSub">
                <div id="collapseThree" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <ul>
                        <li>
                            <a href="<?= base_url('admincp/noidung') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/thu-muc.png" alt="Danh mục sản phẩm"/>
                                Thông tin chung
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admincp/tournament/tournament_category/detail') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/them.png" alt="Thêm danh mục"/>
                                Thêm người chơi
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admincp/tournament/tournament_category') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/thu-muc.png" alt="Danh mục sản phẩm"/>
                                Danh mục giải đấu
                            </a>
                        </li>


                        <li>
                            <a href="<?= base_url('admincp/tournament/tournament') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/danh-sach.png" alt="Danh sách sản phẩm"/>
                                Danh sách giải đấu
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admincp/tournament/tournament/detail') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/them.png" alt="Thêm sản phẩm"/>
                                Thêm giải đấu
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</aside>