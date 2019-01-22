<div class="bg-white addHeight">
    <div class="ui-wid">
        <div class="form-head">
            <?= $title ?>
        </div>
        <div class="form-mid">
            <form method="POST" action="" id="frmSubmit">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Trạng Thái</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="status">
                            <option value="1" <?= $info_users->status == 1 ? 'selected' : '' ?>>Hiển thị</option>
                            <option value="2" <?= $info_users->status == 2 ? 'selected' : '' ?>>Ẩn</option>
                            <option value="3" <?= $info_users->status == 3 ? 'selected' : '' ?>>Xóa</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Chức vụ</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="tid">
                            <option value="2" <?= $info_users->tid == 2 ? 'selected' : '' ?>>Manager</option>
                            <option value="3" <?= $info_users->tid == 3 ? 'selected' : '' ?>>Admin</option>
                            <option value="4" <?= $info_users->tid == 4 ? 'selected' : '' ?>>Founder</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Họ tên</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="<?= $info_users->name ?>" class="form-control" placeholder="Họ tên">
                        <div class="error"><?= form_error('name') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" value="<?= $info_users->email ?>" class="form-control" placeholder="Email">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Số điện thoại</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" value="<?= $info_users->phone ?>" class="form-control" placeholder="Số điện thoại">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Địa chỉ</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" value="<?= $info_users->address ?>" class="form-control" placeholder="Địa chỉ">
                    </div>
                </div>

            </form>
        </div>
        <div class="form-bottom">
            <div class="horControlB">
                <ul>
                    <li>
                        <a class="eSave">
                            <span>Save</span>
                        </a>
                    </li>

                    <li>
                        <a class="eCancel" href="javascript:(0)" onclick="location.href = '<?= base_url('admincp/admin') ?>'">
                            <span>Cancel</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>