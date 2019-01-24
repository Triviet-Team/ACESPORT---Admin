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
                        <option value="0">Chọn danh mục giải đấu</option>
                        <?php foreach ($catalogs as $row) { ?>
                            <?php if ($row->subs) { ?>
                                <optgroup label="<?php echo $row->vn_name ?>">
                                    <?php foreach ($row->subs as $sub) { ?>
                                        <option value="<?php echo $sub->id ?>" <?= @$tournament_type == $sub->id ? 'selected' : '' ?>><?php echo $sub->vn_name ?> </option>
                                    <?php } ?>
                                </optgroup>
                            <?php } else { ?>
                                <option value="<?php echo $row->id ?>"  <?= @$tournament_type == $row->id ? 'selected' : '' ?>><?php echo $row->vn_name ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Chọn giải đấu</label>
				<div class="col-sm-10">
                    <select tournament="<?= @$tournament ? $tournament : ''?>" class="custom-select" id="tournament" name="tournament">
                        <option value="0">Chọn giải đấu</option>
                    </select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Chọn nội dung</label>
				<div class="col-sm-10">
                    <select noi_dung="<?= @$noi_dung ? $noi_dung : ''?>" class="custom-select" id="noi_dung" name="noi_dung">
                        <option value="0">Chọn nội dung</option>
                    </select>
				</div>
			</div>

			<div class="row" id="user">
				<div class="col-sm-5">
					<h6 class="mb-2">Đội chơi 1</h6>
					<select class="form-control mb-2" name="user_1[]" id="">
						<option value="">123</option>
						<option value="">123</option>
					</select> <select class="form-control mb-2" name="user_1[]" id="">
						<option value="">123</option>
						<option value="">123</option>
					</select>
				</div>

				<div class="col-sm-5 mb-3">
					<h6 class="mb-2">Đội chơi 2</h6>
					<select class="form-control mb-2" name="user_2[]" id="">
						<option value="">123</option>
						<option value="">123</option>
					</select> <select class="form-control mb-2" name="user_2[]" id="">
						<option value="">123</option>
						<option value="">123</option>
					</select>
					<select class="form-control tour-select"></select>
					
					<select class="form-control js-example-data-ajax"></select>
					
					
				</div>

			</div>
			
			
				<div class="col-sm-2">
					<button class="mt-5 btn btn-primary">Thêm người chơi</button>
				</div>

			<div class="text-center">
                <h6 class="mb-2">Số cặp đấu còn lại 6 cặp / Đã thêm 10 cặp</h6>
                <button class="pl-4 pr-4 mb-5 btn btn-primary">Lưu</button>
                <button class="pl-4 pr-4 mb-5 btn btn-danger">Hủy</button>
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