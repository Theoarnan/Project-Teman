<div class="">
	<div class="card" style="width:100%;">
		<div class="card-body">
			<h2 class="card-title" style="color: black;">Tambah Data Kelas</h2>
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
				Tambah Kelas</p>
			<p style="line-height:-30px;margin-top:-20px;">Silahkan isi data data yang diperlukan
				dibawah </p>
			<hr>
		</div>
		<div id="detail" class="card-body">
			<form method="POST" enctype="multipart/form-data" action="<?= base_url('kelas/tambah_kelas') ?>">
				<div class="col-md-12 bg-white" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
					<form method="post" enctype="multipart/form-data" action="<?= base_url('guru/add_tugas') ?>">
						<input type="hidden" name="id">
						<div class="form-group">
							<label for="inputEmail4">Nama Kelas</label>
							<input autocomplete="off" required type="text" id="nama_kelas" name="nama_kelas" class="form-control" placeholder="Nama Kelas">
						</div>
						<button type="submit" class="btn btn-block btn-success">Tambah
							Kelas ⭢
						</button>
				</div>
			</form>
		</div>
	</div>
	<br>
</div>
