<div class="">
	<div class="card" style="width:100%;">
		<div class="card-body">
			<h2 class="card-title" style="color: black;">Tambah Data Soal</h2>
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
				Tambah Soal</p>
			<p style="line-height:-30px;margin-top:-20px;">Silahkan isi data data yang diperlukan
				dibawah </p>
			<hr>
		</div>
		<div id="detail" class="card-body">
			<form method="POST" enctype="multipart/form-data" action="<?= base_url('tugas/tambah_soal') ?>">
				<div class="col-md-12 bg-white" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
					<form method="post" enctype="multipart/form-data" action="<?= base_url('guru/add_tugas') ?>">
						<input type="hidden" value="<?= $id ?>" name="id">
						<div class="input-group mt-3 mx-auto" style="width: 50%;">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="image" name="image" aria-describedby="inputGroupFileAddon01">
								<label class="custom-file-label" for="inputGroupFile01">Upload Gambar</label>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail4">Bobot</label>
							<input autocomplete="off" required type="number" id="bobot" name="bobot" class="form-control" placeholder="Isikan Nilai Bobot Pertanyaan">
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="inputEmail4">Pertanyaan?</label>
								<textarea autocomplete="on" required type="text" rows="4" id="pertanyaan" name="pertanyaan" class="form-control" placeholder="Masukkan Pertanyaan Soal"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail4">Jawaban A</label>
							<input autocomplete="off" required type="text" id="jawaban1" name="jawaban1" class="form-control" placeholder="Jawaban Untuk pilihan A">
						</div>
						<div class="form-group">
							<label for="inputEmail4">Jawaban B</label>
							<input autocomplete="off" required type="text" id="jawaban2" name="jawaban2" class="form-control" placeholder="Jawaban Untuk pilihan B">
						</div>
						<div class="form-group">
							<label for="inputEmail4">Jawaban C</label>
							<input autocomplete="off" required type="text" id="jawaban3" name="jawaban3" class="form-control" placeholder="Jawaban Untuk pilihan C">
						</div>
						<div class="form-group">
							<label for="inputEmail4">Jawaban D</label>
							<input autocomplete="off" required type="text" id="jawaban4" name="jawaban4" class="form-control" placeholder="Jawaban Untuk pilihan D">
						</div>
						<div class="form-group">
							<label for="inputEmail4">Jawaban E</label>
							<input autocomplete="off" required type="text" id="jawaban5" name="jawaban5" class="form-control" placeholder="Jawaban Untuk pilihan E">
						</div>
						<div class="form-group">
							<label for="inputState">Pilih Kunci Jawaban</label>
							<select required id="inputState" name="kunci" class="form-control" required>
								<option selected>Pilih</option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="D">D</option>
								<option value="E">E</option>
							</select>
						</div>
						<div class="form-group">
							<label for="inputEmail4">Alasan</label>
							<input autocomplete="off" required type="text" id="alasan" name="alasan" class="form-control" placeholder="Alasan">
						</div>
						<button type="submit" class="btn btn-block btn-success">Tambah
							Soal ⭢
						</button>
				</div>
			</form>
		</div>
	</div>
	<br>
</div>
