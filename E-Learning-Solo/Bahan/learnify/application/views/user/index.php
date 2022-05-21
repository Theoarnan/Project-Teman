<!doctype html>
<html lang="en">

<head>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?= base_url('assets/') ?>img/favicon.png" type="image/png">
	<!-- Title -->
	<title>Selamat datang - <?php
							$data['user'] = $this->db->get_where('siswa', ['email' =>
							$this->session->userdata('email')])->row_array();
							echo $data['user']['nama'];
							?> - BioLearn Student Page</title>
	<!-- Bootstrap CSS -->
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/linericon/style.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/animate-css/animate.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/popup/magnific-popup.css">
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<!-- Main css -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/user_style.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/responsive.css">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
	<!-- Library -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.4/dist/sweetalert2.all.min.js"></script>

</head>

<body style="overflow-x:hidden;background-color:#fbf9fa">
	<!-- Start Navigation Bar -->
	<header class="header_area" style="background-color: white !important;">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="<?= base_url('welcome') ?>"><img src="<?= base_url('assets/') ?>img/clients-logo/logo.png" width="180" height="60" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item "><a class="nav-link" href="javascript:void(0)">Hai, <?php
																										$data['user'] = $this->db->get_where('siswa', ['email' =>
																										$this->session->userdata('email')])->row_array();
																										echo $data['user']['nama'];
																										?></a>
							</li>
							<li class="nav-item active"><a class="nav-link" href="<?= base_url('user') ?>">Beranda</a>
							</li>
							<li class=" nav-item "><a class=" nav-link text-danger" href="<?= base_url('welcome/logout') ?>">Log Out</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!-- End Navigation Bar -->
	<!-- Start Greetings Card -->
	<div class="container">
		<div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400" style="width: 100%; border-radius:10px;">
			<div class="row" style="color: black; font-family: 'poppins';">
				<div class="col-md-12 mt-1">
					<h1 class="display-4" style="color: black; font-family:'poppins';" data-aos="fade-down" data-aos-duration="1400">Selamat Datang
						di BioLearn <span style="font-size: 40px;">👋🏻
						</span> </h1>
					<p>Hello Students! , Ini merupakan halaman utama BioLearn ! Silahkan pilih kelas yang akan kamu
						akses
						dan pilih mata pelajaran yang ingin kamu pelajari. Selamat belajar ya students!</p>
					<hr>
					<h4 style="line-height: 4px;" data-aos="fade-down" data-aos-duration="1700"><?php
																								$data['user'] = $this->db->get_where('siswa', ['email' =>
																								$this->session->userdata('email')])->row_array();
																								echo $data['user']['nama'];
																								?> - BioLearn Students</h4>
					<p data-aos="fade-down" data-aos-duration="1800">Silahkan pilih kelas yang akan kamu akses
						dibawah
						ini!
					</p>

				</div>
			</div>
		</div>
	</div>
	<!-- End Greetings Card -->


	<br>


	<!-- Start Class Card -->
	<div class="container">
		<?php $this->load->view($page); ?>
	</div>
	<!-- End Class Card -->


	<br>


	<!-- Start Animate On Scroll -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#summernote').summernote();
		});
		AOS.init();
	</script>
	<!-- End Animate On Scroll -->
