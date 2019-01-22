<div class="bg-white addHeight">
    <div class="ui-wid">
        <div class="form-head">
            <?= $title ?>
        </div>
        <div class="form-mid">

            <?php $this->load->view('admin/message'); ?>
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
                            <th scope="col" style="width: 57px">STT</th>
                            <th scope="col" style="width: 61px">Mã Số</th>
                            <th scope="col">Username</th>
                            <th scope="col">Họ tên</th>
                            <th scope="col" style="width: 130px;">Chức vụ</th>
                            <th scope="col" style="width: 83px;">Trạng thái</th>
                            <th scope="col" style="width: 97px;">Ngày taọ</th>
                            <th scope="col" style="width: 137px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_user as $k => $row) { ?>
                            <tr>
                                <td class="text-center"><?= $k ?></td>
                                <td class="text-center"><?= $row->id ?></td>
                                <td class="text-center"><?= $row->username ?></td>
                                <td>
                                    <div class="info_products text-center">
                                        <b><?= $row->name ?></b>
                                    </div>

                                </td>
                                <td class="text-center">
                                    <b class="redB">
                                        <?= lang('tid_' . $row->tid) ?>
                                    </b>
                                </td>
                                <td class="text-center">
                                    <img src="<?= base_url() ?>public/admin/img/icon/action_<?= $row->status ?>.png" alt=""/>
                                </td>
                                <td><?= get_date($row->created) ?></td>
                                <td class="button_action text-center">
                                    <a href="<?= base_url('admincp/admin/edit/' . $row->id) ?>" class="edit_item" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa"></a>
                                    <a href="<?= base_url('admincp/admin/del/' . $row->id) ?>" class="menu_item_delete" data-toggle="tooltip" data-placement="top" title="Xóa"></a>
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