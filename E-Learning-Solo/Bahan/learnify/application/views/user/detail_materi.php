<?php
foreach ($detail as $d) { ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mx-auto mt-4">
				<video class="afterglow" autoplay id="myvideo" width="1100" height="720">
					<source type="video/mp4" autoplay src="<?= base_url() . 'assets/materi_video/' . $d->video; ?>" />
				</video>
			</div>
		</div>
	</div>
	<!-- End Video Player -->
	<!-- Start Deskripsi Materi -->
	<div class="container">
		<div class="row mt-4">
			<div class="col-md-12 w-150 mb-4">
				<div class="card materi border-0">
					<div class="card-body p-5">
						<h1 class="card-title display-4"><?= convertGuru($d->nama_guru) ?></h1>
						<hr style="background-color: white;">
						<p class="card-text"> Deskripsi materi pelajaran : <br> <?= $d->deskripsi; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row mt-4">
			<div class="col-md-12 w-150 mb-4">
				<div class="card materi border-0">
					<div class="card-body p-5">

						<div class="form-group">
							<label for="isi">Isi Materi</label>
							<textarea class="summernote" rows="5" id="summernote" name="isi" readonly><?= htmlspecialchars_decode($d->materi_deks) ?></textarea>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
