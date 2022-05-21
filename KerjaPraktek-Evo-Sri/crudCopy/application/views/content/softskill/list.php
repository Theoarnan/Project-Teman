<div class="card">
        <div class="card-header">
    <a class="btn btn-primary" href="<?= site_url('softskill/tambah') ?>">Tambah Data softskill</a>
        </div>
        <div class="card-body">
         


        <table id="table1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode softskill</th>
                <th>Nama Kegiatan</th>
                <th>Tanggal Kegiatan</th>
                <th>Kategori Kegiatan</th>
                <th>Point Kegiatan</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        foreach ($softskillList as $sof) {
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $sof->id_softskill ?></td>
                <td><?= $sof->nm_kegiatan ?></td>
                <td><?= $sof->tgl_kegiatan ?></td>
                <td><?= $sof->kat_kegiatan ?></td>
                <td><?= $sof->poin_kegiatan ?></td>
                <td><?= $sof->gambar ?></td>
                <td>
                    <a class="btn btn-sm btn-warning" href="<?= site_url('softskill/edit/' . $sof->id_softskill) ?>">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-sm btn-danger" href="<?= site_url('softskill/delete/' . $sof->id_softskill) ?>">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>


        </div>
      </div>

      
<script>
    $(function() {

        $('#table1').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'colvis'
            ]

        });


    });
</script>