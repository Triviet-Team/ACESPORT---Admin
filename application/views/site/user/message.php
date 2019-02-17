<article>
	<section class="bread-crumb">
		<div class="container">
			<div class="bc-icons">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
						<li class="breadcrumb-item active">Giải dấu</li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<section class="page-content">
		<div class="container">
			<div class="title-page text-center">
				<h1>
					<a>giải đấu</a>
				</h1>
			</div>
			<div class="grid-box">
				<!-- left -->
				<?php $this->load->view('site/sidebar'); ?>
				<!-- end left -->
				<div class="tour-main main">
					<div class="text-center">
                        <div class="alert alert-success" role="alert">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</section>
</article>
