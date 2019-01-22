
<footer>
  <section class="footer">
  <div class="footer-top">
    <div class="container text-center">
      <a href="index.php"><img src="<?= base_url('public/site/img/') ?>logo.png" alt=""></a>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, tenetur. Tempora quis reiciendis ad quasi consequatur? Hic deserunt nihil accusantium ipsam nemo. Et quaerat est consequuntur asperiores temporibus laborum ab!</p>
    </div>
  </div>

  <div class="footer-mid">
    <div class="container-fluid">
      <div class="footer-mid-in">
        <div class="social text-center">
          <a href="<?= @$config->facebook ?>">
            <i class="mdi mdi-facebook"></i>
          </a>

          <a href="<?= @$config->twitter ?>">
            <i class="mdi mdi-twitter"></i>
          </a>

          <a href="<?= @$config->google ?>">
            <i class="mdi mdi-google-plus"></i>
          </a>

          <a href="<?= @$config->skype ?>">
            <i class="mdi mdi-skype"></i>
          </a>

          <a href="<?= @$config->instagram ?>">
            <i class="mdi mdi-instagram"></i>
          </a>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6">
            <div class="info">
              <div class="title-footer">
                <a data-toggle="collapse" href="#info" role="button" aria-expanded="false" aria-controls="info">
                  thông tin liên hệ <i class="mdi mdi-chevron-down"></i>
                </a>
              </div>

              <div class="collapse show" id="info">
                <div class="card card-body">
                  <ul>
                    <li>
                      <span class="mdi mdi-map-marker-radius"></span>
                      <?= @$config->address ?>
                    </li>

                    <li>
                      <span class="mdi mdi-phone-classic"></span>
                      <?= @$config->phone ?>
                    </li>

                    <li>
                      <span class="mdi mdi-fax"></span>
                      <?= @$config->fax ?> 
                    </li>

                    <li>
                      <span class="mdi mdi-phone-in-talk"></span>
                      Hotline: <?= @$config->phone ?>
                    </li>

                    <li>
                      <span class="mdi mdi-email-variant"></span>
                      <?= @$config->emai_1 ?>
                    </li>

                    <li>
                      <span class="mdi mdi-email-variant"></span>
                      <?= @$config->email_2 ?>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          
          	<?php if(@$categorys){?>
          		<?php foreach ($categorys as $row){?>
                <div class="col-xl-2 d-none d-xl-block">
                    <div class="cate-footer">
                      <div class="title-footer">
                        <a data-toggle="collapse" href="<?= base_url('danh-muc/') . $row->vn_slug ?>.html" role="button" aria-expanded="false" aria-controls="cate-footer-1">
                          <?= $row->vn_name ?> <i class="mdi mdi-chevron-down"></i>
                        </a>
                      </div>
        
                      <div class="collapse show" id="cate-footer-1">
                        <div class="card card-body">
                          <ul>
                            <?php if($row->categorys){?>
                          		<?php foreach ($row->categorys as $key => $row_cate){?>
                          			<?php if($key < 10){?>
                                        <li>
                                          <a href="<?= base_url('danh-muc/') . $row_cate->vn_slug ?>.html">
                                            <span class="mdi mdi-minus"></span> <?= $row_cate->vn_name ?>
                                          </a>
                                        </li>
                                    <?php }?>
                                <?php }?>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>                
                <?php } ?>
            <?php } ?>

          <div class="col-xl-3 col-md-6">
            <div class="info">
              <div class="title-footer">
                <a data-toggle="collapse" href="#info-2" role="button" aria-expanded="false" aria-controls="info-2">
                  chi nhánh đồng nai <i class="mdi mdi-chevron-down"></i>
                </a>
              </div>

              <div class="collapse show" id="info-2">
                <div class="card card-body">
                  <ul>
                    <li>
                      <span class="mdi mdi-map-marker-radius"></span>
                      QL51 xã Phước Thái, huyện Long Thành, tỉnh Đồng Nai.
                    </li>

                    <li>
                      <span class="mdi mdi-phone-classic"></span>
                      0251. 3551 500  
                    </li>

                    <li>
                      <span class="mdi mdi-fax"></span>
                      0251. 3551 565
                    </li>

                    <li>
                      <span class="mdi mdi-phone-in-talk"></span>
                      Hotline: 0932 732 893  -  0942 319 623 
                    </li>

                    <li>
                      <span class="mdi mdi-email-variant"></span>
                      kdnoithatvanphong@gmail.com
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container">
      <div class="copyright text-center">
        <h5>
          Copyright @ 2018 Sieu thi ghe van phong Thanh Thuy. All Reserved. Designed by Tri Viet
        </h5>
      </div>
    </div>
  </div>
  </section>
</footer>

