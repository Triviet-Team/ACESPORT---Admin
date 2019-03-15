<div class="bg-white addHeight height-auto">
    <div class="ui-wid">
        <div class="form-head">
            <?= $title ?>
        </div>
        <div class="form-mid">
            <form action="" method="POST" id="frmSubmit" enctype="multipart/form-data">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Loại chơi</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="type_play">
                            <option value="1" <?= @$info->type_play == 1 ? 'selected' : '' ?>>Đơn</option>
                            <option value="2" <?= @$info->type_play == 2 ? 'selected' : '' ?>>Đôi</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tổng số người tham gia</label>
                    <div class="col-sm-10">
                        <input type="number" name="total_member" value="<?= isset($info->total_member) ? $info->total_member : set_value('total_member') ?>" id="vn_name" placeholder="Nhập số lượng người chơi trong nội dung của bạn Vd: 8, 16, 32..."   class="form-control">
                        <div class="error"><?= form_error('total_member') ?></div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Set</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="set">
                            <option value="1" <?= @$info->set == 1 ? 'selected' : '' ?>>1</option>
                            <option value="2" <?= @$info->set == 3 ? 'selected' : '' ?>>3</option>
                        </select>
                    </div>
                </div>

                <!--<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Cấu Hình</label>
                    <div class="col-sm-10">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" <?= @$info->is_home == 1 ? 'checked' : '' ?> value="1" name="is_home" id="is_home">
                            <label class="custom-control-label" for="is_home">Hiên thị trang chủ</label>
                        </div>
                    </div>
                </div>  -->

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
                </ul>
            </div>
        </div>
    </div>
</div>