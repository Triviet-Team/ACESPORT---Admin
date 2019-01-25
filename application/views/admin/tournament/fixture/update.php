<div class="bg-white addHeight height-auto">
    <div class="ui-wid">
        <div class="form-head">
            <?= $title ?>
        </div>
        <div class="form-mid">
            <form action="" method="POST" id="frmSubmit" enctype="multipart/form-data">
			
				<table class="table mb-4">
					<thead>
						<tr>
							<th class="border-0"></th>
							<th class="border-0 text-center">
								Người chơi 1 
								<div class="d-block mt-3">
									<div class="d-inline-block mr-2 ml-2">
    									<img style="width: 50px;" src="<?=base_url().'public/admin/img/default-534x534.png' ?>" />
    									<h5 class="mt-2">username</h5>
									</div>
									<div class="d-inline-block mr-2 ml-2">
    									<img style="width: 50px;" src="<?=base_url().'public/admin/img/default-534x534.png' ?>" />
    									<h5 class="mt-2">username</h5>
									</div></div>
							</th>
							<th class="border-0 text-center">Người chơi 2</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="border-0">Set1</td>
							<td class="border-0">
								<input class="form-control" type="number" placeholder="Game" />
							</td>
							<td class="border-0">
								<input class="form-control" type="number" placeholder="Game" />
							</td>
						</tr>
						<tr>
							<td class="border-0">Set1</td>
							<td class="border-0">
								<input class="form-control" type="number" placeholder="Game" />
							</td>
							<td class="border-0">
								<input class="form-control" type="number" placeholder="Game" />
							</td>
						</tr>
						<tr>
							<td class="border-0">Set1</td>
							<td class="border-0">
								<input class="form-control" type="number" placeholder="Game" />
							</td>
							<td class="border-0">
								<input class="form-control" type="number" placeholder="Game" />
							</td>
						</tr>
					</tbody>
				</table>
			
				

			<div class="text-center">
                <h6 class="mb-2" id="cap-dau"></h6>
                <button class="eSave pl-4 pr-4 mb-5 btn btn-primary">Lưu</button>
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