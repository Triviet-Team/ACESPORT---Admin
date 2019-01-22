<div class="bg-white addHeight">
    <div class="ui-wid">
        <div class="form-head">
            <?= $title ?>
        </div>
        <div class="form-mid">
            <?php $this->load->view('admin/message') ?>
            <form method="POST" action="" id="frmSubmit">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mật khẩu cũ</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" placeholder="Nhập lại mật khẩu cũ">
                        <div class="error"><?= form_error('password') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mật khẩu mới</label>
                    <div class="col-sm-10">
                        <input type="password" name="n_password" class="form-control" placeholder="Nhập mật khẩu mới">
                        <div class="error"><?= form_error('n_password') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nhập lại mật khẩu</label>
                    <div class="col-sm-10">
                        <input type="password" name="re_password" class="form-control" placeholder="Nhập lại mật khẩu mới">
                        <div class="error"><?= form_error('re_password') ?></div>
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