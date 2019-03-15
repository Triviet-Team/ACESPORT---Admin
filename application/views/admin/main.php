<!doctype html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>.:: Admin Cpanel ::.</title>

        

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <link href="<?= base_url() ?>public/admin/css/tagsinput.css" rel="stylesheet" type="text/css"/>

        <link href="<?= base_url() ?>public/admin/colorbox/colorbox.css" rel="stylesheet" type="text/css"/>

        <link href="<?= base_url() ?>public/admin/css/style.css" rel="stylesheet" type="text/css"/>  
        
        <link href="<?= base_url() ?>public/admin/css/responsive.css" rel="stylesheet" type="text/css"/>
        
        <link href="<?= base_url() ?>public/admin/css/select2.min.css" rel="stylesheet" type="text/css"/>
        
        <link href="<?= base_url() ?>public/admin/css/jquery.filthypillow.css" rel="stylesheet" type="text/css"/>
        
        <script> var url = '<?= base_url() ?>'; </script>

    </head>
    <body>

        <?php $this->load->view('admin/header') ?>

        <div class="wrap">
            <div class="row">
                <?php 
                    if ($tour == 'tournament'){
                        $this->load->view('admin/left_tournament');
                    }else if($tour == 'noidung')
                        $this->load->view('admin/left_noidung');
                    else {
                        $this->load->view('admin/left');
                    }
                ?>
                <div class="col-xl-10 col-lg-8 col-md-8">
                    <?php $this->load->view('admin/' . $temp) ?>
                </div>
            </div>
        </div>

        <?php $this->load->view('admin/footer') ?>
        
		<script src="<?= base_url() ?>public/admin/js/jquery-2.1.0.js" type="text/javascript"></script>
        <!--  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

        

        <script src="<?= base_url() ?>public/admin/ckeditor/ckeditor/ckeditor.js" type="text/javascript"></script>

        <script src="<?= base_url() ?>public/admin/ckeditor/ckfinder/ckfinder.js" type="text/javascript"></script>

        <script src="<?= base_url() ?>public/admin/js/jquery.number.min.js" type="text/javascript"></script>

        <script>var base = '<?= base_url() ?>'</script>

        <script src="<?= base_url() ?>public/admin/js/tagsinput.js" type="text/javascript"></script>

        <script src="<?= base_url() ?>public/admin/colorbox/jquery.colorbox-min.js" type="text/javascript"></script>
        
        
        <script src="<?= base_url() ?>public/admin/js/select2.min.js" type="text/javascript"></script>
        
        <script src="<?= base_url() ?>public/admin/js/jquery.validate.min.js" type="text/javascript"></script>
        
        <script src="<?= base_url() ?>public/admin/js/moment.js" type="text/javascript"></script>
        
        <script src="<?= base_url() ?>public/admin/js/jquery.filthypillow.min.js" type="text/javascript"></script>

        <script src="<?= base_url() ?>public/admin/js/main.js" type="text/javascript"></script>

    </body>
</html>