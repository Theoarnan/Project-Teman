<aside id="sidebar-wrapper">
	<div class="sidebar-brand text-danger">
		<div>
			<a href="<?= base_url('admin') ?>" style="font-size: 30px;font-weight:900;font-family: 'Poppins', sans-serif;" class="text-success text-center"><i style="font-size: 30px;" class="fas fa-graduation-cap"></i> |
				BioLearn <sup>3</sup></a>
		</div>
	</div>
	<!-- <div class="sidebar-brand sidebar-brand-sm">
						<a href="<?= base_url('admin') ?>">LY <sup>3</sup></a>
					</div> -->
	<ul class="sidebar-menu">
		<li class="menu-header ">Dashboard</li>
		<li class="nav-item dropdown active">
			<a href="<?= base_url('admin') ?>" class="nav-link"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
		</li>
		<li class="menu-header">Master Data</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-map-pin"></i>
				<span>Kelas</span></a>
			<ul class="dropdown-menu">
				<li><a class="nav-link" href="<?= base_url('kelas') ?>">Data Kelas</a></li>
			</ul>
		</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-bookmark"></i>
				<span>Mata Pelajaran</span></a>
			<ul class="dropdown-menu">
				<li><a class="nav-link" href="<?= base_url('mapel') ?>">Data Mata Pelajaran</a></li>
			</ul>
		</li>
		<li class="menu-header">Management Data</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i>
				<span>Siswa</span></a>
			<ul class="dropdown-menu">
				<li><a class="nav-link" href="<?= base_url('admin/data_siswa') ?>">Data Siswa</a></li>
			</ul>
		</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link has-dropdown"><i class="fas fa-chalkboard-teacher"></i>
				<span>Guru</span></a>
			<ul class="dropdown-menu">
				<li><a class="nav-link" href="<?= base_url('admin/data_guru') ?>">Data Guru</a>
				</li>
			</ul>
		</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i>
				<span>Materi</span></a>
			<ul class="dropdown-menu">
				<li><a class="nav-link" href="<?= base_url('admin/data_materi') ?>">Data Materi</a>
				</li>
			</ul>
		</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link has-dropdown"><i class="fas fa-tasks"></i>
				<span>Tugas</span></a>
			<ul class="dropdown-menu">
				<li><a class="nav-link" href="<?= base_url('tugas') ?>">Data Tugas</a>
				</li>
			</ul>
		</li>
		<!-- <li class="menu-header">About Developer</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link has-dropdown"><i class="fas fa-address-card"></i>
				<span>Developer</span></a>
			<ul class="dropdown-menu">
				<li><a class="nav-link" href="<?= base_url('admin/about_developer') ?>">Tentang
						Pembuat</a>
				</li>
				<li><a class="nav-link" href="<?= base_url('admin/about_learnify') ?>">Tentang
						BioLearn</a>
				</li>
			</ul>
		</li> -->
</aside>
