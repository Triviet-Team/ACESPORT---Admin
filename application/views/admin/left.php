<aside class="col-xl-2 col-lg-4 col-md-4 aside">
    <div class="boxTitle">
        Cấu trúc website
    </div>

    <div class="menu">

        <div class="widgets">
            <div class="widgetsTitle">
                <button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <img src="<?= base_url() ?>public/admin/img/icon/quan-li-website.png" alt=""/>
                    Quản lí website
                </button>
            </div>

            <div class="widgetsSub">
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <ul>
                        <li>
                            <a href="<?= base_url('admincp') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/bang-dieu-khien.png" alt="Bảng điều khiển"/>
                                Bảng điều khiển
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admincp/configs') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/cau-hinh-tong-quat.png" alt="Cấu hình tổng quát"/>
                                Cấu hình tổng quát
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>                   

        <div class="widgets">
            <div class="widgetsTitle">
                <button type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                    <img src="<?= base_url() ?>public/admin/img/icon/quan-li-tai-khoan.png" alt=""/>
                    Quản lí tài khoản
                </button>
            </div>

            <div class="widgetsSub">
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <ul>
                        <li>
                            <a href="<?= base_url('admincp/admin') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/thu-muc.png" alt="Danh sách tài khoản"/>
                                Danh sách tài khoản quản trị
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admincp/admin/user') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/thu-muc.png" alt="Thêm tài khoản"/>
                                Quản lí thành viên
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admincp/admin/add') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/them.png" alt="Thêm tài khoản"/>
                                Thêm tài khoản
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="widgets">
            <div class="widgetsTitle">
                <button type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                    <img src="<?= base_url() ?>public/admin/img/icon/quan-li-san-pham.png" alt="Danh"/>
                    Quản lí giải đấu và cặp đấu
                </button>
            </div>

            <div class="widgetsSub">
                <div id="collapseThree" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <ul>
                        <li>
                            <a href="<?= base_url('admincp/tournament/tournament') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/thu-muc.png" alt="Danh mục sản phẩm"/>
                                Quản lí giải đấu
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admincp/tournament/fixture') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/them.png" alt="Thêm danh mục"/>
                               Quản lí cặp đấu
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="widgets">
            <div class="widgetsTitle">
                <button type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseOne">
                    <img src="<?= base_url() ?>public/admin/img/icon/icon-bai-viet.png" alt=""/>
                    Quản lí tin tức
                </button>
            </div>

            <div class="widgetsSub">
                <div id="collapseFour" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <ul>
                        <li>
                            <a href="<?= base_url('admincp/articles_category') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/thu-muc.png" alt=""/>
                                Danh mục
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admincp/articles_category/detail') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/them.png" alt=""/>
                                Thêm danh mục
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admincp/articles/index') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/danh-sach.png" alt=""/>
                                Danh sách tin tức
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admincp/articles/detail') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/them.png" alt=""/>
                                Thêm bài mới
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
                    Quản lí trang tĩnh
                </button>
            </div>

            <div class="widgetsSub">
                <div id="collapseFine" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <ul>
                        <li>
                            <a href="<?= base_url('admincp/staticpage') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/thu-muc.png" alt=""/>
                                Danh sách trang tĩnh
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admincp/staticpage/detail') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/them.png" alt=""/>
                                Thêm trang tĩnh
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    	<!--<div class="widgets">
                <div class="widgetsTitle">
                    <button type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseOne">
                        <img src="<?= base_url() ?>public/admin/img/icon/quan-li-lien-he.png" alt="">
                        Quản lí liên hệ
                    </button>
                </div>
    
                <div class="widgetsSub">
                    <div id="collapseSix" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <ul>
                            <li>
                                <a href="<?= base_url('admincp/contact') ?>">
                                    <img src="<?= base_url() ?>public/admin/img/icon/thu-muc.png" alt="">
                                    Danh sách liên hệ
                                </a>
                            </li>
                            <li>
                                <a href="http://dogonguyenhoang.com/admincp/emailregister">
                                    <img src="http://dogonguyenhoang.com/public/admin/img/icon/thu-muc.png" alt=""/>
                                    Đăng kí nhận email
                                </a>
                            </li>
                            <li>

                            <a href="<?= base_url('admincp/emailregister') ?>">

                                <img src="<?= base_url() ?>public/admin/img/icon/thu-muc.png" alt=""/>

                                Đăng kí nhận email

                            </a>

                        </li>
                        </ul>
                    </div>
                </div>
            </div>  -->


        <div class="widgets">
            <div class="widgetsTitle">
                <button type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseOne">
                    <img src="<?= base_url() ?>public/admin/img/icon/quan-li-ads.png" alt=""/>
                    Quản lí ADS
                </button>
            </div>

            <div class="widgetsSub">
                <div id="collapseSeven" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <ul>
                        <li>
                            <a href="<?= base_url('admincp/ads_category') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/thu-muc.png" alt=""/>
                                Danh mục ADS
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admincp/ads_category/detail') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/them.png" alt=""/>
                                Thêm danh mục ADS
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admincp/ads') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/thu-muc.png" alt=""/>
                                Danh sách ADS
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admincp/ads/detail') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/them.png" alt=""/>
                                Thêm ADS
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
         <!-- <div class="widgets">
            <div class="widgetsTitle">
                <button type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseOne">
                    <img src="<?= base_url() ?>public/admin/img/icon/icon-dowload.png" alt=""/>
                    Quản lí các dịch vụ
                </button>
            </div>

            <div class="widgetsSub">
                <div id="collapseSeven" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <ul>
                        <li>
                            <a href="<?= base_url('admincp/manager_service') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/thu-muc.png" alt=""/>
                                Danh sách dịch vụ
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admincp/manager_service/detail') ?>">
                                <img src="<?= base_url() ?>public/admin/img/icon/them.png" alt=""/>
                                Thêm dịch vụ
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>-->
        
        
        
    </div>
</aside>