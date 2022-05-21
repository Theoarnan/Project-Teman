<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div>
        <div class="card card-info">
            <div class="card-header">
                <h1>Data Pegawai</h1>
            </div>
            <div class="card-footer">
                <a href="<?= site_url(array("PegawaiSuper", "register")) ?>" class="btn btn-success "><i class="fas fa-folder-plus"></i>
                    Tambah Data Pegawai
                </a> &nbsp;
                <a href="<?= site_url("Report/pegawai") ?>" target="_blank" class="btn btn-success">
                    <i class="fas fa-file-excel"></i> Report Data Pegawai
                </a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="text-align:center"> No</th>
                            <th style="text-align:center"> Id Anggota</th>
                            <th style="text-align:center">Nama Anggota</th>
                            <th style="text-align:center">Jabatan </th>
                            <th style="text-align:center">Alamat</th>
                            <th style="text-align:center">Telepon</th>
                            <th style="text-align:center">Keterangan</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pegawais as $pegawai) {
                        ?>
                            <tr id="<?= $pegawai->id_anggota ?>">
                                <td style="text-align:center"><?= $no++ ?></td>
								<td style="text-align:center"><?= $pegawai->id_anggota ?></td>
                                <td style="text-align:center"><?= $pegawai->nama_anggota ?></td>
                                <td style="text-align:center"><?= $pegawai->jabatan ?></td>
                                <td style="text-align:center"><?= $pegawai->alamat_anggota ?></td>
                                <td style="text-align:center"><?= $pegawai->telepon_anggota ?></td>
                                <td style="text-align:center"><?= $pegawai->keterangan_anggota ?></td>
                                <td style="text-align:center">
                                    <a href="<?= site_url("PegawaiSuper/update/$pegawai->id_anggota") ?>" class="btn btn-sm btn-warning" data-title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="#" data-id="<?= $pegawai->id_anggota ?>" id="delete_id" class="btn btn-sm btn-danger tombolHapus">
                                        <fas class="fas fa-trash"></fas>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        </section>
    </div>
    <!-- <div class="modal fade" id="modal-confirm-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Anda yakin hapus data Pegawai ini?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-info">Tidak</button>
                    <button type="button" id="btn-delete" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    <form method="post" id="form-delete" action="<?= site_url("pegawai/proses_hapus") ?>">

    </form> -->
    <script>
         $(function() {
            let idPegawai = 0;
            $(".tombolHapus").on("click", function() {
                var id = $(this).data('id');
                SwalDelete(id);
                console.log(id);
                // e.preventDefault();
            });
        });

        function SwalDelete(id) {
            Swal.fire({
                title: ' Hapus Data Pegawai Ini?',
                text: " ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#20B2AA',
                cancelButtonColor: '#FF7F00',
                confirmButtonText: 'Hapus Data ',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        var url = "pegawai/proses_hapus/"
                        $.ajax({
                                url: '<?= base_url() ?>' + url + id,
                                type: "POST",
                            })
                            .done(function(id) {
                                window.location.replace("<?= site_url("Pegawai") ?>");
                                Swal.fire('Hapus Data Berhasil', 'Data Anda Telah Terhapus!', 'success')
                            })
                            .fail(function() {
                                Swal.fire('Maaf', 'Data Anda Sudah Masuk proses Transaksi', 'error')
                            });
                    });
                },
            });
        }
    </script>