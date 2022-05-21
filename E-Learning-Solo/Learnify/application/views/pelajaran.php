<!--
@Project: Learnify
@Author/Programmer: Syauqi Zaidan Khairan Khalaf
@URL: syauqi.js.org
Author E-mail: Zaidanline67@Gmail.com

@About-Learnify :
Web Edukasi Open Source yang
dibuat oleh Syauqi Zaidan Khairan Khalaf.
Learnify adalah Web edukasi yang dilengkapi video, materi, dan soal ( Coming soon )
yang didesign semenarik dan sesimple mungkin. Learnify dibuat ditujukan agar para siswa
dan guru dapat terus belajar dan mengajar dimana saja dan kapan saja.
-->


<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="pelajaran bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
		</div>
		<div class="container">
			<div class="banner_content text-center">
				<h2>Pelajaran</h2>
				<div class="page_link">
					<a href="<?= base_url('welcome') ?>">Beranda</a>
					<a href="<?= base_url('welcome/pelajaran') ?>">Pelajaran</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->


<!--================Courses Area =================-->
<section class="courses_area p_120">
	<div class="container">
		<div class="main_title">
			<h2>Pelajaran Yang Tersedia</h2>
			<p>Dibawah ini merupakan mata pelajaran yang tersedia di website BioLearn. Tiap kelas mempunyai
				materi yang berbeda namun dengan mata pelajaran yang sama. Oleh karena itu nikmati materi dan selamat
				belajar! tunggu update selanjutnya untuk penambahan mata pelajaran!</p>
		</div>
		<div class="row courses_inner">
			<div class="col-lg-9">
				<div class="grid_inner">
					<div class="grid_item wd55">
						<div class="courses_item">
							<img src="<?= base_url('assets/') ?>img/courses/course-1.jpg" alt="">
							<div class="hover_text">
								<a class="cat" href="#">Gratis</a>
								<a href="javaScript:void(0);">
									<h4>Kelas Biologi Basic</h4>
								</a>
								<ul class="list">
									<li><a href="#"><i class="lnr lnr-users"></i>3</a></li>
									<li><a href="#"><i class="lnr lnr-bubble"></i> 0</a></li>
									<li><a href="#"><i class="lnr lnr-user"></i>Pengampu Ardhananes W.A</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="grid_item wd44">
						<div class="courses_item">
							<img src="<?= base_url('assets/') ?>img/courses/course-2.jpg" alt="">
							<div class="hover_text">
								<a class="cat" href="#">Gratis</a>
								<a href="javaScript:void(0);">
									<h4>Kelas Biologi Intermediate</h4>
								</a>
								<ul class="list">
									<li><a href="#"><i class="lnr lnr-users"></i> 4</a></li>
									<li><a href="#"><i class="lnr lnr-bubble"></i> 0</a></li>
									<li><a href="#"><i class="lnr lnr-user"></i>Pengampu Ardhananes W.A</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="grid_item wd44">
						<div class="courses_item">
							<img src="<?= base_url('assets/') ?>img/courses/course-4.jpg" alt="">
							<div class="hover_text">
								<a class="cat" href="#">Gratis</a>
								<a href="javaScript:void(0);">
									<h4>Kelas Biologi Expert</h4>
								</a>
								<ul class="list">
									<li><a href="#"><i class="lnr lnr-users"></i> 7</a></li>
									<li><a href="#"><i class="lnr lnr-bubble"></i> 0</a></li>
									<li><a href="#"><i class="lnr lnr-user"></i>Pengampu Ardhananes W.A</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="course_item">
					<img src="<?= base_url('assets/') ?>img/courses/course-1.jpg" alt="">
					<div class="hover_text">
						<a class="cat" href="#">Gratis</a>
						<a href="javaScript:void(0);">
							<h4>Kelas Biologi Extra</h4>
						</a>
						<ul class="list">
							<li><a href="#"><i class="lnr lnr-users"></i> 35</a></li>
							<li><a href="#"><i class="lnr lnr-bubble"></i> 0</a></li>
							<li><a href="#"><i class="lnr lnr-user"></i>Pengampu Ardhananes W.A</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
<!--================End Courses Area =================-->
