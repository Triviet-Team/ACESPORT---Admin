<div class="bg-white addHeight height-auto">
    <div class="ui-wid">
        <div class="form-head">
            <?= $title ?>
        </div>
        <div class="form-mid">
            <form action="" method="POST" id="frmSubmit" enctype="multipart/form-data">
            	<?php if($obj_registration_player) { ?>
            		<?php foreach ($obj_registration_player as $k => $row) { ?>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Người chơi <?= $k + 1 ?></label>
                            <div class="col-sm-10">
                                <select id="<?=$k?>" class="custom-select select-player" name="player[<?= $row->id ?>]">
                                	<option value="1" <?= @$info->status == 1 ? 'selected' : '' ?>>BCS OK</option>
                                </select>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>

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