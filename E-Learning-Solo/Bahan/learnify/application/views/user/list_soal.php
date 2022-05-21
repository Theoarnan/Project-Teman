<div class="card" style="width:100%;">
	<div class="card-body">
		<h3 class="card-title" style="color: black;">List Soal</h3>
		<p class="text-left" style="line-height: 5px;">Berikut data soal-soal pada tugas <b></b>!</p>
		<form action="<?= base_url('user/submit_jawaban') ?>" method="POST">
			<input type="hidden" name="jumlah" value="<?= $jumlah ?>">
			<input type="hidden" name="id_tugas" value="<?= $id_tugas ?>">
			<?php
			$no = 1;
			foreach ($soal as $s) { ?>
				<hr>
				<div class="row">
					<div class="col-md-8">
						<p class="card-text">Soal <?= $no++ ?>!
						<p class="card-text"><?= $s->pertanyaan ?>
						</p>
						<p class="card-text">Jawab :
							<input type="hidden" name="id[]" value="<?= $s->pertanyaan_id ?>">
						<div class="form-check ">
							<input class="form-check-input " type="radio" name="pilihan[<?= $s->pertanyaan_id ?>]" id="exampleRadios1" value="A">
							<label class="form-check-label " for="exampleRadios1">
								A. <?= $s->pilihan_a ?>
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="pilihan[<?= $s->pertanyaan_id ?>]" id="exampleRadios1" value="B">
							<label class="form-check-label" for="exampleRadios1">
								B. <?= $s->pilihan_b ?>
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="pilihan[<?= $s->pertanyaan_id ?>]" id="exampleRadios1" value="C">
							<label class="form-check-label" for="exampleRadios1">
								C. <?= $s->pilihan_c ?>
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="pilihan[<?= $s->pertanyaan_id ?>]" id="exampleRadios1" value="D">
							<label class="form-check-label" for="exampleRadios1">
								D. <?= $s->pilihan_d ?>
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="pilihan[<?= $s->pertanyaan_id ?>]" id="exampleRadios1" value="E">
							<label class="form-check-label" for="exampleRadios1">
								E. <?= $s->pilihan_e ?>
							</label>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Preview</h4>
							</div>
							<div class="card-body">
								<div class="imgWrap">
									<img id="imgView" alt="User Avatar" class="card-img-top" height="300" src='<?= base_url('assets/upload_soal/' . $s->gambar) ?>' onerror="this.onerror=null;this.src='<?= base_url() . "assets/no-image.png" ?>';" alt="<?= $s->gambar ?>">
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
			<?php } ?>
			<button type="submit" class="btn btn-block btn-success">Submit
				Jawaban ⭢
			</button>
		</form>

		<!-- <hr> -->
	</div>
</div>
