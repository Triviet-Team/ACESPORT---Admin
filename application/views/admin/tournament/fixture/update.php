<div class="bg-white addHeight height-auto">
    <div class="ui-wid">
        <div class="form-head">
            <?= $title ?>
        </div>
        <div class="form-mid">
            <form action="" method="POST" id="frmSubmit" enctype="multipart/form-data">
            	<?php if(@$infoPlayer) { ?>
				<h2 class="text-center mt-5 mb-3" style="font-size: 21px; color: #005bec;"><?= $infoPlayer->tournament_type ?>-<?= $infoPlayer->tournament ?>-<?= $infoPlayer->noi_dung ?></h2>
				<table class="table mb-4">
					<thead>
						<tr>
							<th class="border-0"></th>
							
    							<th class="border-0 text-center">
    								Đội chơi 1
    								<div class="d-block mt-3">
    									<?php if($infoPlayer->doi_1){ ?>
                                    		<?php foreach ($infoPlayer->doi_1 as $k => $row_doi) { ?>
                                                    <?php 
                                                            $link_img = base_url().'public/admin/img/default-534x534.png';
                                                            if(!empty($row->image_link)){
                                                                $link_img = base_url().'uploads/images/product/421_561/'.$row->image_link;
                                                            }
                                                    ?>
                                                    <div class="d-inline-block mr-2 ml-2">
                    									<img style="width: 50px;" src="<?= $link_img ?>" />
                    									<h5 class="mt-2"><?= $row_doi->username ?>(<?= $row_doi->name ?>)</h5>
                									</div>
    
                                            <?php } ?>
    									<?php }?>
    								</div>
    							</th>
    							<th class="border-0 text-center">
    								Đội chơi 2
    								<div class="d-block mt-3">
    									<?php if($infoPlayer->doi_2){ ?>
                                    		<?php foreach ($infoPlayer->doi_2 as $k => $row_doi) { ?>
                                                    <?php 
                                                            $link_img = base_url().'public/admin/img/default-534x534.png';
                                                            if(!empty($row->image_link)){
                                                                $link_img = base_url().'uploads/images/product/421_561/'.$row->image_link;
                                                            }
                                                    ?>
                                                    <div class="d-inline-block mr-2 ml-2">
                    									<img style="width: 50px;" src="<?= $link_img ?>" />
                    									<h5 class="mt-2"><?= $row_doi->username ?>(<?= $row_doi->name ?>)</h5>
                									</div>
    
                                            <?php } ?>
    									<?php }?>
    								</div>    							
    							</th>
						</tr>
					</thead>
					<tbody>
						<?php if($infoPlayer->set) { ?>
							<?php for ($i = 1; $i <= $infoPlayer->set; $i++) { ?>
        						<tr>
        							<td class="border-0">Set <?= $i ?></td>
        							<td class="border-0">
        								<input class="form-control" type="number" min="0" name="set[<?= $i ?>][]" value="" placeholder="Game" />
        							</td>
        							<td class="border-0">
        								<input class="form-control" type="number"min="0"  name="set[<?= $i ?>][]" value="" placeholder="Game" />
        							</td>
        						</tr>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
			
				

			<div class="text-center">
                <h6 class="mb-2" id="cap-dau"></h6>
                <button class="eSave pl-4 pr-4 mb-5 btn btn-primary">Lưu</button>
                <button class="pl-4 pr-4 mb-5 btn btn-danger">Hủy</button>
            </div>
        <?php } ?>
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