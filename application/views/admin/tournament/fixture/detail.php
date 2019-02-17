<div class="bg-white addHeight height-auto">
    <div class="ui-wid">
        <div class="form-head">
            <?= $title ?>
        </div>
        <div class="form-mid">
            <form action="" method="POST" id="frmSubmit" enctype="multipart/form-data">
            <?php if(!$infoNoiDung) {?>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ngày bắt đầu trận đấu</label>
                <div class="col-sm-10">
                    <input type="datetime-local" name="start_date" value="<?= @$infoNoiDung->start_date ? date('Y-m-d', @$infoNoiDung->start_date) : ''?>" class="form-control">
                    <div class="error"><?= form_error('start_date') ?></div>
                </div>
            </div>
            
           <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ngày kết thúc trận đấu</label>
                <div class="col-sm-10">
                    <input type="datetime-local" name="end_date" value="<?= @$infoNoiDung->end_date ? date('Y-m-d', @$infoNoiDung->end_date) : ''?>" class="form-control">
                    <div class="error"><?= form_error('end_date') ?></div>
                </div>
            </div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Chọn danh mục giải đấu</label>
				<div class="col-sm-10">
					<select class="custom-select" id="tournament_type" name="tournament_type">
                        <option value="">Chọn danh mục giải đấu</option>
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
                        <option value="">Chọn giải đấu</option>
                    </select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Chọn nội dung</label>
				<div class="col-sm-10">
                    <select noi_dung="<?= @$noi_dung ? $noi_dung : ''?>" class="custom-select" id="noi_dung" name="noi_dung">
                        <option value="">Chọn nội dung</option>
                    </select>
				</div>
			</div>

			<div class="row" id="user">
			   <div class="col-sm-6">
					<h6 class="mb-2 text-center">Đội chơi 1</h6>
					<select class=" mb-2" name="user1" id="user1">					
						<option value="">Người chơi thứ nhất của đội 1</option>
					</select> 
					
					<select class="mb-2" name="user2" id="user2">
						<option value="">Người chơi thứ hai của đội 1</option>
					</select>
				</div>

				<div class="col-sm-6 mb-3">
					<h6 class="mb-2 text-center">Đội chơi 2</h6>
					<select class=" mb-2" name="user3" id="user3">
						<option value="">Người chơi thứ nhất của đội 2</option>
					</select>
					<select class="mb-2" name="user4" id="user4">
						<option value="">Người chơi thứ hai của đội 2</option>
					</select>
				</div>
			</div>
		<?php }else { ?>
			<div class="form-group row">
                <label class="col-sm-2 col-form-label">Ngày bắt đầu trận đấu</label>
                <div class="col-sm-10">
                    <input type="datetime-local" name="start_date" value="<?= @$infoNoiDung->start_date ? date('Y-m-d', @$infoNoiDung->start_date) : ''?>" class="form-control">
                    <div class="error"><?= form_error('start_date') ?></div>
                </div>
            </div>
            
           <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ngày kết thúc trận đấu</label>
                <div class="col-sm-10">
                    <input type="datetime-local" name="end_date" value="<?= @$infoNoiDung->end_date ? date('Y-m-d', @$infoNoiDung->end_date) : ''?>" class="form-control">
                    <div class="error"><?= form_error('end_date') ?></div>
                </div>
            </div>
			<?php if ($infoNoiDung->type_play == 1) { ?>
        		<div class="row" id="user">
    			  <div class="col-sm-6">
    					<h6 class="mb-2 text-center">Đội chơi 1</h6>
    					<select class=" mb-2" name="user1" id="user1">					
    						<option value="">Người chơi thứ nhất của đội 1</option>
    					</select> 
    				</div>
    
    				<div class="col-sm-6 mb-3">
    					<h6 class="mb-2 text-center">Đội chơi 2</h6>
    					<select class=" mb-2" name="user3" id="user3">
    						<option value="">Người chơi thứ nhất của đội 2</option>
    					</select>
    				</div>
        		</div>
        		<?php }else {?>
        			<div class="row" id="user">
        			   <div class="col-sm-6">
        					<h6 class="mb-2 text-center">Đội chơi 1</h6>
        					<select class=" mb-2" name="user1" id="user1">					
        						<option value="">Người chơi thứ nhất của đội 1</option>
        					</select> 
        					
        					<select class="mb-2" name="user2" id="user2">
        						<option value="">Người chơi thứ hai của đội 1</option>
        					</select>
        				</div>
        
        				<div class="col-sm-6 mb-3">
        					<h6 class="mb-2 text-center">Đội chơi 2</h6>
        					<select class=" mb-2" name="user3" id="user3">
        						<option value="">Người chơi thứ nhất của đội 2</option>
        					</select>
        					<select class="mb-2" name="user4" id="user4">
        						<option value="">Người chơi thứ hai của đội 2</option>
        					</select>
        				</div>
        			</div>
        		<?php } ?>
		<?php } ?>
			<a href="<?= base_url('admincp/admin/add') ?>" target="_blank" class="btn btn-primary">Thêm người chơi</a>				
			<div class="text-center">
				<input id="full_person" type=hidden name="full_person" value="">
                <h6 class="mb-2" id="cap-dau"></h6>
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