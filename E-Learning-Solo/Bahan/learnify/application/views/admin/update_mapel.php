<div class="">
	<div class="card" style="width:100%;">
		<div class="card-body">
			<h2 class="card-title" style="color: black;">Update Data Mapel</h2>
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
				Update Mapel</p>
			<p style="line-height:-30px;margin-top:-20px;">Silahkan isi data data yang diperlukan
				dibawah </p>
			<hr>
		</div>
		<div id="detail" class="card-body">
			<form method="POST" enctype="multipart/form-data" action="<?= base_url('mapel/updated_mapel') ?>">
				<div class="col-md-12 bg-white" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
					<form method="post" enctype="multipart/form-data" action="<?= base_url('guru/add_tugas') ?>">
						<input type="hidden" value="<?= $data->id ?>" name="id">
						<div class="form-group">
							<label for="inputEmail4">Nama Mapel</label>
							<input autocomplete="off" required type="text" value="<?= $data->nama_mapel ?>" id="nama_mapel" name="nama_mapel" class="form-control" placeholder="Nama Mapel">
						</div>
						<div class="form-group">
							<label for="inputEmail4">Nama Kelas</label>
							<input autocomplete="off" required type="text" list="nama_guru" onkeyup="autofill()" id="namaguru" name="nama_guru" class="form-control">
							<small>List mapel sudah tersedia di autocomplete, kalian hanya
								tinggal klik input area nya atau dengan cara menulis nama kelas dan
								klik kelas yang akan dipilih.</small>
							<datalist id=nama_guru>
								<?php
								include "koneksi.php";
								$qry = mysqli_query($koneksi, "SELECT * From kelas");
								while ($t = mysqli_fetch_array($qry)) {
									echo "<option value='$t[id]'>$t[kelas]</option>";
								}
								?>
							</datalist>
						</div>
						<button type="submit" class="btn btn-block btn-success">Tambah
							Mapel ⭢
						</button>
				</div>
			</form>
		</div>
	</div>
	<br>
</div>
