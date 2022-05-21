<div class="row mt-4 mb-5 justify-content-center">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12 d-flex justify-content-center " data-aos-duration="1900" data-aos="fade-right">
				<a href="<?= base_url('user/materi_mapel/') ?>">
					<div class="card text-center">
						<div class="row">
							<div class="col-6">
								<div class="card-body">
									<h3 class="btn btn-success"><i class="fas fa-checked"></i>Jumlah Soal: </br> <?= $jumlah_soal ?></h3>
								</div>
							</div>
							<div class="col-6">
								<div class="card-body">
									<h3 class="btn btn-warning"><i class="fas fa-checked"></i>Score: <?= $nilai ?></h3>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="card-body text-center">
									Total
									<h3><?= $hasil ?></h3>
								</div>
							</div>
						</div>
						<a href="<?php echo base_url('user'); ?>" class="btn btn-info">BACK TO MENU MAPEL</a>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
