<div class="row mt-4 mb-5 justify-content-center">
	<div class="col-md-12">
		<div class="row">
			<?php
			foreach ($datas as $d) { ?>
				<div class="col-sm-4 mb-2 d-flex justify-content-center " data-aos-duration="1900" data-aos="fade-right">
					<a href="<?= base_url('user/materi_soal/' . $d->id) ?>">
						<div class="card-kelas text-center">
							<div class="row">
								<div class="col-5">
									<div class="card-body">
										<h3 class="btn btn-success"><?= $d->jenis_tugas == 0 ? 'Pilihan Ganda' : 'Essay' ?></h3>
									</div>
								</div>
								<div class="col-4">
									<div class="card-body">
										<h3 class="btn btn-warning"><?= $d->durasi_pengerjaan ?> Menit</h3>
									</div>
								</div>
							</div>
							<img src="<?= base_url('assets/') ?>img/back1.jpg" style="object-fit: cover;" class="card-img-top img-fluid" alt="...">
							<div class="row">
								<div class="col-12">
									<div class="card-body text-center">
										<h3><?= $d->nama_tugas ?></h3>
										<p class="card-title text-left"><?= convertGuru($d->guru_id) ?></p>
									</div>
								</div>
								<div class="col-12">
									<div class="card-body">
										<a href="<?= base_url('user/materi_soal/' . $d->id) ?>" class="btn btn-rounded btn-primary">Kerjakan Sekarang?</a>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			<?php } ?>
			<?php
			foreach ($materi as $d) { ?>
				<div class="col-sm-4 mb-2 d-flex justify-content-center " data-aos-duration="1900" data-aos="fade-right">
					<a href="<?= base_url('user/materi_detail/' . $d->nama_mapel) ?>">
						<div class="card-kelas text-center">
							<div class="row">
								<div class="col-5">
									<div class="card-body">
										<h3 class="btn btn-success">Teori</h3>
									</div>
								</div>
								<div class="col-4">
									<div class="card-body">
										<h3 class="btn btn-warning">0 Menit</h3>
									</div>
								</div>
							</div>
							<img src="<?= base_url('assets/') ?>img/back1.jpg" style="object-fit: cover;" class="card-img-top img-fluid" alt="...">
							<div class="row">
								<div class="col-12">
									<div class="card-body text-center">
										<p class="card-title text-left"><?= convertGuru($d->nama_guru) ?></p>
									</div>
								</div>
								<div class="col-12">
									<div class="card-body">
										<a href="<?= base_url('user/materi_detail/' . $d->id) ?>" class="btn btn-rounded btn-primary">Lihat Materi?</a>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
