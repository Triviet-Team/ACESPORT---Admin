
<div class="left">
	<div class="box-left">
		<div class="title-left">
			<h5>bảng điểm</h5>
		</div>
		<ul>
			<li><a href="<?= base_url('bang-diem.html') ?>"> <i class="mdi mdi-tennis"></i>Tất cả</a></li>
			<li><a class="score-btn-male" href="<?= base_url('bang-diem/nam') ?>"> <i class="mdi mdi-tennis"></i>Nam</a></li>
			<li><a class="score-btn-female" href="<?= base_url('bang-diem/nu') ?>"> <i class="mdi mdi-tennis"></i>Nữ</a></li>
		</ul>
	</div>
	<?php if ($objTournamentSidebar){ ?>
    	<div class="box-left">
    		<div class="title-left">
    			<h5>giải đấu sắp diễn ra</h5>
    		</div>
    		<ul>
        		<?php if ($objTournamentSidebar['gd_sap_dien_ra']) { ?>
        			<?php foreach ($objTournamentSidebar['gd_sap_dien_ra'] as $row) {?>
        				<li><a title="" href="<?= base_url('chi-tiet-giai-dau/') . $row->vn_slug ?>.html"> <i class="mdi mdi-tennis"></i><?= $row->vn_name ?></a></li>
        			<?php } ?>
        		<?php } ?>
    		</ul>
    	</div>
    	<div class="box-left">
    		<div class="title-left">
    			<h5>giải đấu đang diễn ra</h5>
    		</div>
    		<ul>
        		<?php if ($objTournamentSidebar['gd_dang_dien_ra']) { ?>
        			<?php foreach ($objTournamentSidebar['gd_dang_dien_ra'] as $row) {?>
        				<li><a title="" href="<?= base_url('chi-tiet-giai-dau/') . $row->vn_slug ?>.html"> <i class="mdi mdi-tennis"></i><?= $row->vn_name ?></a></li>
        			<?php } ?>
        		<?php } ?>
    		</ul>
    	</div>
	<?php } ?>
</div>