<div class="card">
        <div class="card-header">
        Form Ubah
        </div>
        <div class="card-body">
    <form role="form" action="<?=site_url('softskill/prosesEdit/'.$softskill->id_softskill) ?>" method="post">
        <div class="card-body">
            
            <div class="form-group">
                <label>Nama Kegiatan</label>
                <input type="input" class="form-control"
                value="<?= $softskill->nm_kegiatan ?>" name="nm_kegiatan" id="namakegiatan" placeholder="Nama Kegiatan">
            </div>
            <div class="form-group">
                <label>Tanggal Kegiatan</label>
                <input type="input" class="form-control"
                value="<?= $softskill->tgl_kegiatan ?>" name="tgl_kegiatan" id="tglkegiatan" placeholder="Tanggal Kegiatan">
            </div>
            <!-- <div class="form-group">
                <label>Kategori Kegiatan</label>
                <input type="input" class="form-control"
                value="<?= $softskill->kat_kegiatan ?>" name="kat_kegiatan" id="katkegiatan" placeholder="Kategori Kegiatan">
            </div> -->
            <div class="form-group">
                <label>Point Kegiatan</label>
                <input type="input" class="form-control"
                value="<?= $softskill->poin_kegiatan ?>" name="poin_kegiatan" id="poinkegiatan" placeholder="Point Kegiatan">
            </div>
            <!-- <div class="form-group">
                <label>Gambar </label>
                <input type="input" class="form-control"
                value="<?= $softskill->gambar ?>" name="gambar" id="gambar" placeholder="Gambar">
            </div> -->
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-warning">Reset Data</button>
            <a  class="btn btn-secondary" href="<?= site_url("softskill") ?>">Batal</a>
        </div>
    </form>
    </div>