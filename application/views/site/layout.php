
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="canonical" href="<?= base_url() ?>"/>
    <meta name='revisit-after' content='1 days' />
    <meta name="robots" content="index,follow" />
    <title><?= @$title_site ? $title_site : $title_page ?></title>
    <meta name="keywords" content="<?= @$keyword_site ? $keyword_site : $keyword_page ?>" />
    <meta name="description" content="<?= @$description_site ? $description_site : $description_page ?>" />

        <!--Meta share facebook-->
    <meta property="og:url"           content="<?= $url ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?= @$title_site ? $title_site : $title_page ?>" />
    <meta property="og:description"   content="<?= @$description_site ? $description_site : $description_page ?>" />
    <meta property="og:image"         content="<?= @$img_site ? $img_site : $img_page ?>" />
    <meta property="og:site_name" content="CÔNG TY CỔ PHẦN AN NINH DHS VIỆT NAM">
    
    <link rel="stylesheet" href="<?=base_url('public/site/')?>css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?=base_url('public/site/')?>css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?=base_url('public/site/')?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('public/site/')?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url('public/site/')?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url('public/site/')?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=base_url('public/site/')?>css/xzoom.css">
    <link rel="stylesheet" href="<?=base_url('public/site/')?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?=base_url('public/site/')?>css/animate.min.css">
    <link rel="stylesheet" href="<?=base_url('public/site/')?>css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?=base_url('public/site/')?>css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=base_url('public/site/')?>css/swiper.min.css">
    <link rel="stylesheet" href="<?=base_url('public/site/')?>css/sweetalert2.min.css">
    <link rel="stylesheet" href="<?=base_url('public/site/')?>css/layout.css">
    <link rel="stylesheet" href="<?=base_url('public/site/')?>css/cart.css">
    <link rel="shortcut icon" href="<?=base_url('public/site/')?>img/favicon.png">

    <script type="text/javascript">
		window.base_url = <?php echo json_encode(base_url()); ?>;
	</script>


</head>
<body>
    <!-- header -->

    <?php $this->load->view('site/header')?>
    <!-- content -->
    <?php $this->load->view('site/' . $temp)?>
    <!-- footer -->
    <?php $this->load->view('site/footer')?>
    
    
    <script src="<?=base_url('public/site/')?>js/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url('public/site/')?>js/jquery.touchSwipe.min.js"></script>
    <script src="<?=base_url('public/site/')?>js/jquery.slideandswipe.min.js"></script>
    <script src="<?=base_url('public/site/')?>js/bootstrap.min.js"></script>
    <script src="<?=base_url('public/site/')?>js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url('public/site/')?>js/owl.carousel.min.js"></script>
    <script src="<?=base_url('public/site/')?>js/wow.min.js"></script>
    <script src="<?=base_url('public/site/')?>js/xzoom.min.js"></script>
    <script src="<?=base_url('public/site/')?>js/magnific-popup.js"></script>
    <script src="<?=base_url('public/site/')?>js/jquery.fancybox.min.js"></script>
    <script src="<?=base_url('public/site/')?>js/swiper.min.js"></script>
    <script src="<?=base_url('public/site/')?>js/sweetalert2.min.js"></script>
    
    <script src="<?=base_url('public/site/')?>js/layout.js"></script>
    
    
    <script src="<?=base_url('public/site/')?>my-js/jquery.validate.min.js"></script>


	<script type="text/javascript" src="<?=base_url()?>public/site/my-js/main.js"></script>
	
	  <script>
    $('#submitEmail').click(function () {
        let email = $('#email').val();

        if (email) {
            $.ajax({
                method: "POST",
                url: "<?= base_url('home/email') ?>",
                data: {email: email}
            })
                    .done(function (msg) {

                        alert("Đăng kí email thành công! Cảm ơn bạn");
                        return false;
                    });
        }
    })
</script>
<audio controls autoplay loop>
  <source src="horse.ogg" type="audio/ogg">
  <source src="<?=base_url('nhacnen/Sinh Vien Hanh Khuc.mp3')?>" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
</body>
</html>








