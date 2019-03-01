<aside class="col-xl-2 col-lg-4 col-md-4 aside">
    <div class="boxTitle">
        Cấu trúc website
    </div>

    <div class="menu">
        <div class="widgets">
            <div class="widgetsTitle">
                <button type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                    <img src="<?= base_url() ?>public/admin/img/icon/quan-li-san-pham.png" alt="Danh"/>
                    Quản lí giải đấu
                </button>
            </div>
            <div class="widgetsSub">
                <div id="collapseThree" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <ul>
                        <li>
                            <a href="<?= base_url('admincp/tournament/tournament_category') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/thu-muc.png" alt="Danh mục sản phẩm"/>
                                Danh mục giải đấu
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admincp/tournament/tournament_category/detail') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/them.png" alt="Thêm danh mục"/>
                                Thêm danh mục
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
        <div class="widgets">
            <div class="widgetsTitle">
                <button type="button" data-toggle="collapse" data-target="#collapseFine" aria-expanded="true" aria-controls="collapseOne">
                    <img src="<?= base_url() ?>public/admin/img/icon/quan-li-trang-tinh.png" alt=""/>
                    Quản lí nội dung giải đấu
                </button>
            </div>

            <div class="widgetsSub">
                <div id="collapseFine" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <ul>
                        <li>
                            <a href="<?= base_url('admincp/tournament/playing_category/index') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/thu-muc.png" alt=""/>
                                Danh sách nội dung giải đấu
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admincp/tournament/playing_category/detail') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/them.png" alt=""/>
                                Thêm nội dung giải đấu
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admincp/tournament/content_tournament_playing_category') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/danh-sach.png" alt="Danh sách vận động viên cho nội dung và vòng loại"/>
                                Danh sách vận động viên cho nội dung và vòng loại
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admincp/tournament/content_tournament_playing_category/detail') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/them.png" alt=""/>
                                Thêm vận động viên cho nội dung
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    	<div class="widgets">
                <div class="widgetsTitle">
                    <button type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseOne">
                        <img src="<?= base_url() ?>public/admin/img/icon/quan-li-lien-he.png" alt="">
                        Quản lí người chơi
                    </button>
                </div>
    
                <div class="widgetsSub">
                    <div id="collapseSix" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <ul>
                            <li>
                                <a href="<?= base_url('admincp/tournament/fixture/detail') ?>">
                                    <img src="<?= base_url() ?>public/admin/img/icon/thu-muc.png" alt="">
                                    Thêm cặp đấu mới
                                </a>
                            </li>
                            <li>
                            <a href="<?= base_url('admincp/tournament/fixture') ?>">

                                <img src="<?= base_url() ?>public/admin/img/icon/thu-muc.png" alt=""/>

                                Danh sách cặp đấu

                            </a>
                       	</li>
                        </ul>
                    </div>
                </div>
            </div>

    </div>
</aside>