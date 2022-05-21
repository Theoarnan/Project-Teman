<div class="card" style="width:100%;">
	<div class="card-body">
		<h2 class="card-title" style="color: black;">Management Data Materi BioLearn</h2>
		<hr>
		<p class="card-text"> After I ran into Helen at a restaurant, I realized she was just office pretty drop-dead date put in in a deck for our standup today. Who's responsible for the ask for this request? who's responsible for the ask for this request? but moving the goalposts gain traction.</p>
		<a href="<?= base_url('admin/tambah_materi') ?>" class="btn btn-success">Tambah
			Data Materi ⭢</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="bg-white p-4" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
			<div class="table-responsive">
				<table id="example" class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr class="text-center">
							<th scope="col">ID</th>
							<th scope="col">Nama Guru</th>
							<th scope="col">Nama Mapel</th>
							<th scope="col">Deskripsi</th>
							<th scope="col">Option</th>
						</tr>
					</thead>

					<tbody>
						<?php

						foreach ($user as $u) {
						?>
							<tr class="text-center">

								<th scope="row">
									<?php echo $u->id ?>
								</th>

								<td>
									<?php echo $u->nama_guru ?>
								</td>

								<td>
									<?php echo convertMapel($u->nama_mapel) ?>
								</td>
								<td>
									<?= substr($u->deskripsi, 0, 30); ?>
									.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.
								</td>

								<td class="text-center">
									<a href="<?php echo site_url('admin/update_materi/' . $u->id); ?>" class="btn btn-info">Update ⭢</a>

									<a href="<?php echo site_url('admin/delete_materi/' . $u->id); ?>" class="btn btn-danger remove">Delete ✖</a>
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
