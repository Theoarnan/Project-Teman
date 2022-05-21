<div class="card" style="width:100%;">
	<div class="card-body">
		<h2 class="card-title" style="color: black;">Detail Tugas | <?= $data->nama_guru ?></h2>
		<hr>
		<p class="card-text">After I ran into Helen at a restaurant, I realized she was just office pretty drop-dead date put in in a deck for our standup today. Who's responsible for the ask for this request? who's responsible for the ask for this request? but moving the goalposts gain traction.
		</p>
		<a href="#detail" class="btn btn-success">Saya paham dan
			ingin melanjutkan ⭢</a>
	</div>
</div>
<div id="detail" class="col-md-12 bg-white p-3" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
	<h3 class="font-weight-bold card-title text-center" style="color: black;">Detail Tugas </h3>
	<p class="text-center" style="line-height: 5px;">Berikut data detail pada tugas!</p>
	<hr>
	<table style="width: 100%" class=" text-center">
		<tbody class="pb-5">
			<tr>
				<td><span class="font-weight-bold">Judul</span></td>
				<td> <?= $data->nama_tugas ?></td>
			</tr>
			<tr>
				<td><span class="font-weight-bold">Nama Guru :</span></td>
				<td> <?= $data->nama_guru ?></td>
			</tr>
			<tr>
				<td><span class="font-weight-bold">Type Tugas</span></td>
				<td><?= $data->jenis_tugas == 0 ? 'Pilihan Ganda' : 'Essay' ?></td>
			</tr>
			<tr>
				<td><span class="font-weight-bold">Durasi</span></td>
				<td><?= $data->durasi_pengerjaan ?></td>
			</tr>
			<tr>
				<td><span class="font-weight-bold">Terbitkan Tugas</span></td>
				<td><a href="<?php echo site_url('tugas/terbitkan/' . $data->id . '/' . $data->tampil); ?>" class="btn btn-info"><?= $data->tampil == 0 ? 'Terbitkan Tugas' : 'Nonaktifkan Tugas' ?></a></td>
			</tr>
		</tbody>
	</table>
	<p style="font-weight:500px!important;font-size:18px;text-align:justify;" class="text-justify">
	</p>
	<a href="<?php echo site_url('tugas/add_soal/' . $data->id); ?>" class="btn btn-primary btn-block">Tambah Soal</a>
</div>
<br>
<div class="card" style="width:100%;">
	<div class="card-body">
		<h3 class="card-title" style="color: black;">List Soal</h3>
		<p class="text-left" style="line-height: 5px;">Berikut data soal-soal pada tugas <b><?= $data->nama_tugas ?></b>!</p>
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
					<p class="card-text pl-5">A. <?= $s->pilihan_a ?>
					<p class="card-text pl-5">B. <?= $s->pilihan_b ?>
					<p class="card-text pl-5">C. <?= $s->pilihan_c ?>
					<p class="card-text pl-5">D. <?= $s->pilihan_d ?>
					<p class="card-text pl-5">E. <?= $s->pilihan_e ?>
				</div>
				<div class="col-md-4">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Preview</h4>
						</div>
						<div class="card-body">
							<div class="imgWrap">
								<img id="imgView" alt="User Avatar" class="card-img-top" height="300" src='<?= base_url('assets/upload_soal/' . $s->gambar) ?>' onerror="this.onerror=null;this.src='<?= base_url() . "assets/img/no_image.png" ?>';" alt="<?= $s->gambar ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="row text-center">
				<div class="col-md-4">
					<p class="card-text">Kunci Jawaban :
					<p class="card-text">== <?= $s->kunci ?> ==
				</div>
				<div class="col-md-4">
					<p class="card-text">Bobot Nilai :
					<p class="card-text">== <?= $s->bobot ?> ==
				</div>
				<div class="col-md-4">
					<a href="<?php echo site_url('tugas/update_soal/' . $s->pertanyaan_id); ?>" class="btn btn-info">Update</a>
					<a href="<?php echo site_url('tugas/delete_soal/' . $s->pertanyaan_id); ?>" class="btn btn-danger remove">Delete</a>
				</div>
			</div>
		<?php } ?>
		<!-- <hr> -->
	</div>
</div>
