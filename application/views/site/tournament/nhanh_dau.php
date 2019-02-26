<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?= @$title_site ? $title_site : $title_page ?></title>
    <link rel="stylesheet" href="<?=base_url('public/site/')?>css/jquery.bracket.min.css"/>
    <link rel="stylesheet" href="<?=base_url('public/site/')?>css/layout.css"/>
    <style>
      body {
        overflow: auto;
        font-size: 14px;
        background: white;
      }
      
    </style>
  </head>
  <body>
  <?php if($dataTournament) {?>
    <section class="watch-section">
      <h4 class="watch-branch-title"><?= @$dataTournament->vn_name ?></h4>
      <div class="watch-branch-round">
      	<?php if(@$obj_tournament_playing_category) { ?>
      		<?php foreach ($obj_tournament_playing_category[0]->list_fixture as $k => $row) {?>
            <div class="box-watch-branch">
              <h4><?= $k ?></h4>
            </div>
          <?php } ?>
      <?php }?>
      </div>
      <div class="watch-branch"></div>
    </section>
    
    <script src="<?=base_url('public/site/')?>js/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url('public/site/')?>js/jquery.bracket.min.js"></script>
    <script>
    
      var minimalData = {
          teams : <?=  @$arr_list_cap_dau ? json_encode($arr_list_cap_dau) : '' ?>,
          results : <?=  @$arr_list_ti_so ? json_encode($arr_list_ti_so) : '' ?>
        }
      
      var resizeParameters = {
        teamWidth: 180,
        scoreWidth: 20,
        matchMargin: 20,
        roundMargin: 35,
        init: minimalData
      };
      
      function updateResizeDemo() {
        $('.watch-branch').bracket(resizeParameters)
      }
      
      $(updateResizeDemo)
    </script>
  <?php }else {
      echo 'Dữ liệu đang cập nhật';}
  ?>
  </body>
</html>