<div class="">
	<div class="card" style="width:100%;">
		<div class="card-body">
			<h2 class="card-title" style="color: black;">Update Data Materi</h2>
			<hr>
			<p class="card-text"> After I ran into Helen at a restaurant, I realized she was just office pretty drop-dead date put in in a deck for our standup today. Who's responsible for the ask for this request? who's responsible for the ask for this request? but moving the goalposts gain traction.
			</p>
			<a href="#detail" class="btn btn-success">Saya paham dan
				ingin melanjutkan ⭢</a>
		</div>
	</div>
</div>
<div class="card card-success">
	<div class="col-md-12 text-center">
		<p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 50px;">
			Update Data Materi</p>
		<p style="line-height:-30px;margin-top:-20px;">Silahkan isi data data yang diperlukan
			dibawah </p>
		<hr>
	</div>
	<?php foreach ($user as $u) { ?>
		<div class="card-body">
			<form method="POST" action="<?= base_url('admin/materi_edit') ?>">
				<input type="hidden" name="id" value="<?= $u->id ?>">
				<div class="form-group">
					<label for="nip">Nama Guru</label>
					<input readonly id="nama_guru" type="text" class="form-control" value="<?= $u->nama_guru ?>" name="nama_guru">
					<?= form_error('nama_guru', '<small class="text-danger">', '</small>'); ?>
					<div class="invalid-feedback">
					</div>
				</div>
				<!-- <div class="form-group">
					<label for="nama_mapel">Mata Pelajaran</label>
					<input readonly id="nama_mapel" type="text" value="<?= convertMapel($u->nama_mapel) ?>" class="form-control" name="nama_mapel">
					<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
					<div class="invalid-feedback">
					</div>
				</div> -->
				<div class="form-group">
					<label for="exampleFormControlTextarea1">Deskripsi Materi</label>
					<textarea class="form-control txtarea" name="deskripsi" id="exampleFormControlTextarea1" rows="3">
                                        <?= $u->deskripsi ?></textarea>
				</div>
				<div class="form-group">
					<label for="inputEmail4">Nama Mapel</label>
					<input autocomplete="off" required type="text" list="nama_gurus" value="<?= convertMapel($u->nama_mapel) ?>" onkeyup="autofill2()" id="namagurus" name="nama_gurus" class="form-control">
					<small>List mapel sudah tersedia di autocomplete, kalian hanya
						tinggal klik input area nya atau dengan cara menulis nama mapel dan
						klik mapel yang akan dipilih.</small>
					<datalist id=nama_gurus>
						<?php
						include "koneksi.php";
						$qry = mysqli_query($koneksi, "SELECT id, nama_mapel from mapel");
						while ($y = mysqli_fetch_array($qry)) {
							// d($y['nama_mapel']);
							echo "<option name='nama_list' value='$y[id]'>$y[nama_mapel]</option>";
						}
						?>
					</datalist>
				</div>
				<div class="form-group">
					<label for="isi">Isi Materi</label>
					<!-- <textarea type="text" name="isi" id="isi" class="form-control @error('isi') is-invalid @enderror"></textarea> -->
					<textarea class="summernote" rows="5" id="summernote" name="isi"><?= htmlspecialchars_decode($u->materi_deks) ?></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success btn-lg btn-block">
						Update ⭢
					</button>
				</div>
			</form>
		<?php } ?>
		</div>
</div>
