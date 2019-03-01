<div class="bg-white addHeight height-auto">
    <div class="ui-wid">
        <div class="form-head">
            <?= $title ?>
        </div>
        <div class="form-mid">
            <form action="" method="POST" id="frmSubmit" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Chọn danh mục giải đấu</label>
				<div class="col-sm-10">
					<select class="custom-select" id="tournament_type" name="tournament_type">
                        <?php foreach ($catalogs as $row) { ?>
                            <?php if ($row->subs) { ?>
                                <optgroup label="<?php echo $row->vn_name ?>">
                                    <?php foreach ($row->subs as $sub) { ?>
                                        <option value="<?php echo $sub->id ?>" <?= @$info->tournament_type == $sub->id ? 'selected' : '' ?>><?php echo $sub->vn_name ?> </option>
                                    <?php } ?>
                                </optgroup>
                            <?php } else { ?>
                                <option value="<?php echo $row->id ?>"  <?= @$info->tournament_type == $row->id ? 'selected' : '' ?>><?php echo $row->vn_name ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Chọn giải đấu</label>
				<div class="col-sm-10">
                    <select tournament="<?= @$info->tournament ? @$info->tournament : '' ?>" class="custom-select" id="tournament" name="tournament">
                        <option value="">Chọn giải đấu</option>
                    </select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Chọn nội dung</label>
				<div class="col-sm-10">
                    <select noi_dung="<?= @$info->	tournament_playing_category_id ? @$info->	tournament_playing_category_id : ''?>" class="custom-select" id="noi_dung" name="noi_dung">
                        <option value="">Chọn nội dung</option>
                    </select>
				</div>
			</div>
			<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Danh sách vận động viên</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="10" id="editor" name="van_dong_vien"><?= isset($info->van_dong_vien) ? $info->van_dong_vien : set_value('van_dong_vien') ?></textarea>
                    </div>
            </div>		
            <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Danh sách vận động viên vòng loại</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="10" id="editor1" name="lich_thi_dau"><?= isset($info->lich_thi_dau) ? $info->lich_thi_dau : set_value('lich_thi_dau') ?></textarea>
                    </div>
            </div>		
			<div class="text-center">
                <button class="eSave1 pl-4 pr-4 mb-5 btn btn-primary">Lưu</button>
                <a " href="javascript:(0)" onclick="location.href = '<?= base_url('admincp/tournament/fixture') ?>'" class="pl-4 pr-4 mb-5 btn btn-danger">Hủy</a>
            </div>
            </form>
        </div>

        <!--<div class="form-bottom">
            <div class="horControlB">
                <ul>
                    <li>
                        <a class="eSave">
                            <span>Save</span>
                        </a>
                    </li>
                    <li>
                        <a class="eCancel" href="javascript:(0)" onclick="location.href = '<?= base_url('admincp/tournament/tournament') ?>'">
                            <span>Cancel</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>  -->
    </div>
</div>