<div class="">
	<div class="card" style="width:100%;">
		<div class="card-body">
			<h2 class="card-title" style="color: black;">Tambah Data Tugas</h2>
			<hr>
			<p class="card-text"> After I ran into Helen at a restaurant, I realized she was just office pretty drop-dead date put in in a deck for our standup today. Who's responsible for the ask for this request? who's responsible for the ask for this request? but moving the goalposts gain traction.
			</p>
			<a href="#detail" class="btn btn-success">Saya paham dan
				ingin melanjutkan ⭢</a>
		</div>
	</div>
	<div class="card card-success">
		<div class="col-md-12 text-center">
			<p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 50px;">
				Tambah Tugas</p>
			<p style="line-height:-30px;margin-top:-20px;">Silahkan isi data data yang diperlukan
				dibawah </p>
			<hr>
		</div>
		<div id="detail" class="card-body">
			<form method="POST" enctype="multipart/form-data" action="<?= base_url('tugas/updated_tugas') ?>">
				<div class="col-md-12 bg-white" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
					<form method="post" enctype="multipart/form-data" action="<?= base_url('guru/add_tugas') ?>">
						<input type="hidden" value="<?= $data->id ?>" name="id">
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="inputEmail4">Nama Guru</label>
								<input autocomplete="on" required type="text" list="nama_guru" value="<?= ($data->nip) ?>" id="namaguru" name="nama_guru" class="form-control">
								<small>List guru sudah tersedia di autocomplete, kalian hanya
									tinggal klik input area nya atau dengan cara menulis namanya dan
									klik guru yang akan dipilih.</small>
								<datalist id=nama_guru>
									<?php
									include "koneksi.php";
									$qry = mysqli_query($koneksi, "SELECT nip, nama_guru From guru");
									while ($t = mysqli_fetch_array($qry)) {
										echo "<option value='$t[nip]'>$t[nama_guru]</option>";
									}
									?>
								</datalist>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail4">Judul Tugas</label>
							<input autocomplete="off" required type="text" value="<?= $data->nama_tugas ?>" id="nama_tugas" name="nama_tugas" class="form-control" placeholder="Judul">
						</div>
						<div class="form-group">
							<label for="inputState">Type Tugas</label>
							<select required id="inputState" name="type" class="form-control" required>
								<option value="<?= $data->jenis_tugas ?>" <?= $data->jenis_tugas != '' ? "selected" : '' ?>><?= $data->jenis_tugas == 0 ? 'Pilihan Ganda' : 'Essay' ?></option>
								<option value="0">Pilihan Ganda</option>
								<option value="1">Essay</option>
							</select>
						</div>
						<div class="form-group">
							<label for="inputEmail4">Nama Mapel</label>
							<input autocomplete="off" required type="text" list="nama_gurus" onkeyup="autofill2()" id="namagurus" name="nama_gurus" class="form-control">
							<small>List mapel sudah tersedia di autocomplete, kalian hanya
								tinggal klik input area nya atau dengan cara menulis nama mapel dan
								klik mapel yang akan dipilih.</small>
							<datalist id=nama_gurus>
								<?php
								include "koneksi.php";
								$qry = mysqli_query($koneksi, "SELECT * From mapel");
								while ($t = mysqli_fetch_array($qry)) {
									echo "<option name='nama_list' value='$t[id]'>$t[nama_mapel]</option>";
								}
								?>
							</datalist>
						</div>
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Durasi Pengerjaan (Menit)</label>
							<input type="number" class="form-control" value="<?= $data->durasi_pengerjaan ?>" required name="durasi" id="durasi" placeholder="Durasi">
						</div>
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Info Tugas</label>
							<textarea class="form-control" required name="info" id="exampleFormControlTextarea1" placeholder="info"><?= $data->info_tugas ?></textarea>
						</div>
						<div class="form-group">
							<label for="inputState">Status</label>
							<select required id="inputState" name="status" class="form-control" required>
								<option value="<?= $data->is_active ?>" <?= $data->is_active != null ? "selected" : '' ?>><?= $data->is_active == 1 ? 'Active' : 'Tidak Active' ?></option>
								<option value="0">Tidak Aktif</option>
								<option value="1">Aktif</option>
							</select>
						</div>
						<button type="submit" class="btn btn-block btn-success">Update
							Tugas ⭢
						</button>
				</div>
			</form>
		</div>
	</div>
	<br>
</div>
