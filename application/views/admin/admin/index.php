<div class="bg-white addHeight">
    <div class="ui-wid">
        <div class="form-head">
            <?= $title ?>
        </div>
        <div class="form-mid">

            <?php $this->load->view('admin/message'); ?>
            
            <div class="horControlA">
                <div class="form-row">
                    <div class="col">
                        <input type="button" onclick="location.href = '<?= base_url('admincp/admin/add') ?>'" class="form-control hand btn-primary" value="Thêm mới">
                    </div>
                    <div class="col">
                        <input type="button" onclick="action_item_all('enable_all', '<?= base_url('admincp/admin/config') ?>')" class="form-control hand btn-success" value="Hiển thị toàn bộ">
                    </div>
                    <div class="col">
                        <input type="button" onclick="action_item_all('disable_all', '<?= base_url('admincp/admin/config') ?>')" class="form-control hand btn-warning" value="Ẩn toàn bộ">
                    </div>
                    <div class="col">
                        <input type="button" onclick="action_item_all('del_all', '<?= base_url('admincp/admin/config') ?>')" class="form-control hand btn-danger" value="Xóa toàn bộ">
                    </div>
                    <div class="col">
                        <input type="button" onclick="location.href = '<?= base_url('admincp/admin/clean_trash') ?>'" class="form-control hand btn btn-info" value="Dọn rác">
                    </div>
                </div>
            </div>
            
            <div class="title">
                <div class="titleicon">
                    <span>
                        <img src="<?= base_url() ?>public/admin/img/icon/action_2.png" alt="Ẩn"/>
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
                    Tổng số : <b><?= count($list_user) ?></b>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td colspan="9">
                            <form method="GET" action="">
                                <div class="form-row">
                                    <div class="col-1">
                                        <input type="text" name="id" value="<?= isset($filter['id']) ? $filter['id'] : '' ?>" class="form-control" placeholder="Mã số">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="name" value="<?= isset($filter['name']) ? $filter['name'] : '' ?>" class="form-control" placeholder="Tên thành viên">
                                    </div>
                                    <div class="col">
                                        <select class="custom-select" name="tid">
                                            <option value="" selected>Chức vụ</option>
                                            <option value="1" <?= (isset($filter['tid']) && $filter['tid'] == 1) ? 'selected' : '' ?>>Customer</option>
                                            <option value="2" <?= (isset($filter['tid']) && $filter['tid'] == 2) ? 'selected' : '' ?>>Manager</option>
                                            <option value="3" <?= (isset($filter['tid']) && $filter['tid'] == 3) ? 'selected' : '' ?>>Admin</option>
                                            <option value="4" <?= (isset($filter['tid']) && $filter['tid'] == 4) ? 'selected' : '' ?>>Founder</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <input type="submit" class="form-control hand btn-success" value="Lọc">
                                    </div>
                                    <div class="col-2">
                                        <input type="reset" onclick="location.href = '<?= base_url('admincp/admin') ?>'" class="form-control hand btn-info" value="Reset">
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                </thead>
                <?php if (!empty($list_user)) { ?>
                    <thead>
                        <tr>
                            <th scope="col" style="width: 10px">
                                <input id="checkAll" type="checkbox">
                            </th>
                            <th scope="col" style="width: 61px">Mã Số</th>
                            <th scope="col">Thông tin</th>                            
                            <th scope="col" style="width: 130px;">Điểm</th>
                            <th scope="col" style="width: 130px;">Chức vụ</th>
                            <th scope="col" style="width: 83px;">Trạng thái</th>
                            <th scope="col" style="width: 137px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_user as $k => $row) { ?>
                            <tr>
                            	<th><input class="checkItem" name="id[]" value="<?= $row->id ?>" type="checkbox"></th>
                                <td class="text-center"><?= $row->id ?></td>
                                <td>
                                    <div class="image_thumb">
                                        <?php 
                                                $link_img = base_url().'public/admin/img/default-534x534.png';
                                                if(!empty($row->image_link)){
                                                    $link_img = base_url().'uploads/images/product/421_561/'.$row->image_link;
                                                }
                                        ?>
                                        <img src="<?= $link_img ?>" alt=""/>
                                    </div>
                                    <div class="info_products">
                                        <div>Username: <?= $row->username ?></div>
                                        <span>Tên: <?= $row->name ?></span>
                                        <div>Đơn vị/Tổ chức: <?= $row->organization ?></div>
                                    </div>
                                </td>
                                <td class="text-center"><input class="form-control iptPostion" onchange="position('<?= $row->id ?>', this.value, '<?= base_url('admincp/admin/position') ?>')" value="<?= $row->point ? $row->point : 0 ?>"/></td>
                                <td class="text-center">
                                    <b class="redB">
                                        <?= lang('tid_' . $row->tid) ?>
                                    </b>
                                </td>                                
                                <td class="text-center" id="status_<?= $row->id ?>">
                                    <img src="<?= base_url() ?>public/admin/img/icon/action_<?= $row->status ?>.png" alt="Xóa"/>
                                </td>
                                <td class="button_action text-center">
                                    <a href="<?= base_url('admincp/admin/edit/' . $row->id) ?>" class="edit_item" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa"></a>
                                    <a href="javascript:(0)" onclick="action_item(<?= $row->id ?>, 'enable', '<?= base_url('admincp/admin/config') ?>')" class="enable_item" data-toggle="tooltip" data-placement="top" title="Hiển thị"></a>
                                    <a href="javascript:(0)" onclick="action_item(<?= $row->id ?>, 'disable', '<?= base_url('admincp/admin/config') ?>')" class="disable_item" data-toggle="tooltip" data-placement="top" title="Ẩn"></a>
                                    <a href="javascript:(0)" onclick="action_item(<?= $row->id ?>, 'del', '<?= base_url('admincp/admin/config') ?>')" class="menu_item_delete" data-toggle="tooltip" data-placement="top" title="Xóa"></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="9">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <?php echo $this->pagination->create_links(); ?>
                                    </ul>
                                </nav>
                            </td>
                        </tr>
                    </tfoot>

                <?php } else { ?>
                    <tbody>
                            <tr>
                                <td class="text-center">Chưa có dữ liệu trong bảng này</td>
                            </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>