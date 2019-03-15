

<div class="bg-white addHeight height-auto">
    <div class="ui-wid">
        <div class="form-head">
            <?= $title ?>
        </div>
        <div class="form-mid">

            <?php $this->load->view('admin/message') ?>

            <div class="horControlA">
                <div class="form-row">
                    <div class="col">
                        <input type="button" onclick="location.href = '<?= base_url('admincp/tournament/fixture/detail') ?>'" class="form-control hand btn-primary" value="Thêm mới">
                    </div>
                    <div class="col">
                        <input type="button" onclick="action_item_all('enable_all', '<?= base_url('admincp/tournament/fixture/config') ?>')" class="form-control hand btn-success" value="Hiển thị toàn bộ">
                    </div>
                    <div class="col">
                        <input type="button" onclick="action_item_all('disable_all', '<?= base_url('admincp/tournament/fixture/config') ?>')" class="form-control hand btn-warning" value="Ẩn toàn bộ">
                    </div>
                    <div class="col">
                        <input type="button" onclick="action_item_all('del_all', '<?= base_url('admincp/tournament/fixture/config') ?>')" class="form-control hand btn-danger" value="Xóa toàn bộ">
                    </div>
                    <div class="col">
                        <input type="button" onclick="location.href = '<?= base_url('admincp/tournament/fixture/clean_trash') ?>'" class="form-control hand btn btn-info" value="Dọn rác">
                    </div>
                </div>
            </div>

            <div class="title">
                <div class="titleicon">
                    <span>
                        <img src="<?= base_url() ?>public/admin/img/icon/action_3.png" alt="Ẩn"/>
                        Ẩn
                    </span>
                    <span>
                        <img src="<?= base_url() ?>public/admin/img/icon/action_1.png" alt="Hiển Thị"/>
                        Hiển Thị
                    </span>
                    <span>
                        <img src="<?= base_url() ?>public/admin/img/icon/action_3.png" alt="Xóa"/>
                        Xóa
                    </span>
                </div>
                <div class="num">
                    Tổng số : <b><?= $total_rows ?></b>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td colspan="9">
                            <form method="GET" action="">
                                <div class="form-row">
                                    <div class="col">
                                        <select class="custom-select" id="tournament_type" name="tournament_type">
                                            <option value="0">Chọn danh mục giải đấu</option>
                                            <?php foreach ($catalogs as $row) { ?>
                                                <option value="<?php echo $row->id ?>"  <?= @$tournament_type == $row->id ? 'selected' : '' ?>><?php echo $row->vn_name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select tournament="<?= @$tournament ? $tournament : ''?>" class="custom-select" id="tournament" name="tournament">
                                            <option value="0">Chọn giải đấu</option>
                                             <?php foreach ($list_tournament as $row) { ?>
                                                 <option value="<?php echo $row->id ?>"  <?= @$tournament == $row->id ? 'selected' : '' ?>><?php echo $row->vn_name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col">
                                        <select noi_dung="<?= @$noi_dung ? $noi_dung : ''?>" class="custom-select" id="noi_dung" name="noi_dung">
                                            <option value="0">Chọn nội dung</option>
                                            <?php foreach ($list_noi_dung as $val) { ?>
                                                <option value="<?php echo $val['id']; ?>"  <?= @$noi_dung == $val['id'] ? 'selected' : '' ?>><?php echo $val['vn_name'];  ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                     <div class="col">
                                        <select round="<?= @$round ? $round : ''?>" class="custom-select" id="round" name="round">
                                            <option value="0">Chọn vòng đấu</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <input type="submit" class="form-control hand btn-success" value="Lọc">
                                    </div>
                                    <div class="col-2">
                                        <input type="reset" onclick="location.href = '<?= base_url('admincp/tournament/fixture') ?>'" class="form-control hand btn-info" value="Reset">
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                </thead>

                <thead>
                    <tr>
                        <th scope="col" width=5%>Mã Số</th>
                        <th scope="col" width=20%>Giải đấu</th>
                        <th scope="col" width=25%>Đội 1</th>
                        <th scope="col" width=25%>Đội 2</th>
                        <th scope="col" width=8%>Tỉ số</th>
                        <th scope="col" style="width: 30px; text-align: left;">Ngày thi đấu</th>
                        <th scope="col" width=7% class="text-center">Hành động</th>
                    </tr>
                </thead>
                <?php if (@$list) { ?>
                    <tbody>
                        <?php
                        foreach ($list as $k => $row) {

                            $categorys = $this->category->get_info_rule(array('id' => $row->cid), 'vn_name');
                            ?>
                            <tr>
                                <td class="text-center"><?= $row->id ?></td>
                                <td><?= $row->tournament_type ?>/<?= $row->tournament ?>/<?= $row->noi_dung ?>/<?= $row->name_round ?></td>
                                <td class="text-center">
                                	<?php if($row->doi_1){ ?>
                                		<?php foreach ($row->doi_1 as $k => $row_doi) { ?>
                                			<div class="d-inline-block">
            									<div style="float: none" class="image_thumb">
                                                    <?php 
                                                            $link_img = base_url().'public/admin/img/default-534x534.png';
                                                            if(!empty($row->image_link)){
                                                                $link_img = base_url().'uploads/images/product/421_561/'.$row->image_link;
                                                            }
                                                    ?>
                                                    <img src="<?= $link_img ?>" alt=""/>
                                                </div>
                                                <div class="info_products">
                                                    <b><?= $row_doi->username ?></b>
                                                    <div><?= $row_doi->name ? $row_doi->name : 'No name' ?></div>
                                                </div>
                                            </div>
                                        <?php } ?>
									<?php }?>
                                </td>
                                <td class="text-center">
                               		<?php if($row->doi_2){ ?>
                                		<?php foreach ($row->doi_2 as $k => $row_doi) { ?>
                                			<div class="d-inline-block">
            									<div style="float: none" class="image_thumb">
                                                    <?php 
                                                            $link_img = base_url().'public/admin/img/default-534x534.png';
                                                            if(!empty($row->image_link)){
                                                                $link_img = base_url().'uploads/images/product/421_561/'.$row->image_link;
                                                            }
                                                    ?>
                                                    <img src="<?= $link_img ?>" alt=""/>
                                                </div>
                                                <div class="info_products">
                                                    <b><?= $row_doi->username ?></b>
                                                    <div><?= $row_doi->name ? $row_doi->name : 'No name' ?></div>
                                                </div>
                                            </div>
                                        <?php } ?>
									<?php }?>
                                </td>

                                <td class="text-center">
                                    Game <?= $row->set ?>:   <?= $row->game_1?>-<?= $row->game_2?>
                                </td>
                                
                                <td class="text-center"><?= date('H:m d/m/Y', $row->start_date) ?></td>
                                <td class="button_action text-center">
                                    <a href="<?= base_url('admincp/tournament/fixture/detail/' . $row->id) ?>" class="edit_item" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa"></a>
                                    <a href="<?= base_url('admincp/tournament/fixture/update/' . $row->id) ?>"  class="enable_item" data-toggle="tooltip" data-placement="top" title="Cập nhật tỉ số"></a>
                                    <!--<a href="javascript:(0)" onclick="action_item(<?= $row->id ?>, 'disable', '<?= base_url('admincp/tournament/fixture/config') ?>')" class="disable_item" data-toggle="tooltip" data-placement="top" title="Ẩn"></a>
                                    <a href="javascript:(0)" onclick="action_item(<?= $row->id ?>, 'del', '<?= base_url('admincp/tournament/fixture/config') ?>')" class="menu_item_delete" data-toggle="tooltip" data-placement="top" title="Xóa"></a>  -->
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="9">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <?php echo $this->pagination->create_links() ?>
                                    </ul>
                                </nav>
                            </td>
                        </tr>
                    </tfoot>
                <?php } else { ?>
                    <tbody>
                        <tr>
                            <td colspan="9" class="text-center">Chưa có dữ liệu trong bảng này</td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>