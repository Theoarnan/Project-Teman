<div class="card" style="width:100%;">
	<div class="card-body">
		<h2 class="card-title" style="color: black;">Management Data Mapel BioLearn</h2>
		<hr>
		<p class="card-text"> After I ran into Helen at a restaurant, I realized she was just office pretty drop-dead date put in in a deck for our standup today. Who's responsible for the ask for this request? who's responsible for the ask for this request? but moving the goalposts gain traction. </p>
		<a href="<?= base_url('mapel/add_mapel') ?>" class="btn btn-success">Tambah
			Data Mapel ⭢</a>
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
							<th scope="col">Nama Mapel</th>
							<th scope="col">Option</th>
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
									<?php echo $u->nama_mapel ?>
								</td>
								<td class="text-center">
									<a href="<?php echo site_url('mapel/update_mapel/' . $u->id); ?>" class="btn btn-info">Update ⭢</a>

									<a href="<?php echo site_url('mapel/delete_mapel/' . $u->id); ?>" class="btn btn-danger remove">Delete ✖</a>
								</td>

							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
