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
                            <option value="1" <?= (isset($filter['status']) && $filter['status'] == 1) ? 'selected' : '' ?>>Hiển thị</option>
                            <option value="2" <?= (isset($filter['status']) && $filter['status'] == 2) ? 'selected' : '' ?>>Ẩn</option>
                            <option value="3" <?= (isset($filter['status']) && $filter['status'] == 3) ? 'selected' : '' ?>>Xóa</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Họ tên</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" placeholder="Họ tên"  value="<?php echo set_value('name'); ?>">
                        <div class="error"><?= form_error('name') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>">
                        <div class="error"><?= form_error('username') ?></div>
                    </div>

                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="error"><?= form_error('password') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nhập lại password</label>
                    <div class="col-sm-10">
                        <input type="password" name="re_password" class="form-control" placeholder="Nhập lại password">
                        <div class="error"><?= form_error('re_password') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Chức vụ</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="tid">
                            <option value="1" <?= (isset($filter['tid']) && $filter['tid'] == 1) ? 'selected' : '' ?>>Customer</option>
                            <option value="2" <?= (isset($filter['tid']) && $filter['tid'] == 2) ? 'selected' : '' ?>>Manager</option>
                            <option value="3" <?= (isset($filter['tid']) && $filter['tid'] == 3) ? 'selected' : '' ?>>Admin</option>
                            <option value="4" <?= (isset($filter['tid']) && $filter['tid'] == 4) ? 'selected' : '' ?>>Founder</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" placeholder="Email"  value="<?= isset($filter['email']) ? $filter['email'] : ''?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Số điện thoại</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" value="<?php echo set_value('phone'); ?>">
                        <div class="error"><?= form_error('phone') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Địa chỉ</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" class="form-control" placeholder="Địa chỉ" value="<?= isset($filter['address']) ? $filter['address'] : ''?>">
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