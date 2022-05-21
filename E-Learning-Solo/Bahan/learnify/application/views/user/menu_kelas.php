<div class="row mt-4 mb-5 justify-content-center">
	<div class="col-md-12">
		<div class="row">
			<?php
			foreach ($data as $d) { ?>
				<div class="col-sm-4 mb-2 d-flex justify-content-center " data-aos-duration="1900" data-aos="fade-right">
					<a href="<?= base_url('user/manu_mapel/' . $d->id) ?>">
						<div class="card-kelas text-center">
							<img src="<?= base_url('assets/') ?>img/back1.jpg" style="object-fit: cover;" class="card-img-top img-fluid" alt="...">
						</div>
						<div class="card-body">
							<h3 class="btn btn-success"><?= $d->kelas ?></h3>
						</div>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
