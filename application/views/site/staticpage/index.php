 <article>
    <section class="bread-crumb mt-5 mt-md-0">
      <div class="container-fluid">
		<?php $this->load->view('site/breadcrumb'); ?>
      </div>
    </section>

    <section class="page-content">
      <div class="container">
        <div class="aboutus-page">
          <h2 class="text-center"><h1><?= @$staticpage->vn_name?></h1></h2>

		        <div>
			 <?= @$staticpage->vn_detail?>
        </div>
        </div>
      </div>
    </section>
  </article>