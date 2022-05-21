<div class="card" style="width:100%;">
	<div class="card-body">
		<h2 class="card-title" style="color: black;">Management Data Tugas BioLearn</h2>
		<hr>
		<p class="card-text"> After I ran into Helen at a restaurant, I realized she was just office pretty drop-dead date put in in a deck for our standup today. Who's responsible for the ask for this request? who's responsible for the ask for this request? but moving the goalposts gain traction.</p>
		<a href="<?= base_url('tugas/add_tugas') ?>" class="btn btn-success">Tambah
			Data Tugas ⭢</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="bg-white p-4" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
			<div class="table-responsive">
				<table id="example" class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr class="text-center">
							<th scope="col">No</th>
							<th scope="col">Tugas</th>
							<th scope="col">Type Tugas</th>
							<th scope="col">Durasi</th>
							<th scope="col">Info</th>
							<th scope="col">Guru</th>
							<th scope="col">Keterangan</th>
							<th scope="col">Action</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$no = 1;
						foreach ($data as $u) {
						?>
							<tr class="text-center">

								<th scope="row">
									<?php echo $no++ ?>
								</th>

								<td>
									<?php echo $u->nama_tugas ?>
								</td>

								<td>
									<?php echo $u->jenis_tugas == 0 ? 'Pilihan Ganda' : 'Essay' ?>
								</td>
								<td>
									<?php echo $u->durasi_pengerjaan ?>
								</td>
								<td>
									<?= substr($u->info_tugas, 0, 30); ?>
									.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.
								</td>
								<td>
									<?php echo $u->nama_guru ?>
								</td>
								<td>
									<?php echo $u->tampil == 0 ? 'Tidak Terbit' : 'Terbit' ?>
								</td>
								<td class="text-center">
									<a href="<?php echo site_url('tugas/detailtugas/' . $u->id); ?>" class="btn btn-info">Detail ⭢</a>
									<a href="<?php echo site_url('tugas/update_tugas/' . $u->id); ?>" class="btn btn-info">Update ⭢</a>
									<a href="<?php echo site_url('tugas/delete_tugas/' . $u->id); ?>" class="btn btn-danger remove">Delete ✖</a>
								</td>

							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
			<p class="small font-weight-bold">Sebelum mengupload file, harus terlebih dahulu
				melakukan config max_upload di php.ini</p>
		</div>
	</div>
</div>
