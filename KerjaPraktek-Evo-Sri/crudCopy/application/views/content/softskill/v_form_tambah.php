<div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
         
    <form role="form" action="<?=site_url('softskill/prosesTambah')?>" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Kode softskill </label>
                <input type="input"  class="form-control" 
             name="id_softskill" id="kodesoftskill" placeholder="Kode softskill">
         </div>
            <div class="form-group">
                <label>Nama Kegiatan</label>
                <input type="input" class="form-control"
name="nm_kegiatan" id="namakegiatan" placeholder="Nama Kegiatan">
            </div>
            <div class="form-group">
                <label>Tanggal Kegiatan</label>
                <input type="input" class="form-control"
name="tgl_kegiatan" id="tglkegiattan" placeholder="Tanggal Kegiatan">
            </div>
            <div class="form-group">
                <label>Kategori Kegiatan</label>
                <input type="input" class="form-control"
name="kat_kegiatan" id="katkegiatan" placeholder="Kategori Kegiatan">

<div class="form-group">
<label>Jenis</label>
<select class="form-control" id="jenis" name="jenis">
					<option value="" disabled selected> Pilih Jenis</option>
<?php 
foreach($jenis as $j){
    echo"<option value='".$j->jenis_id."'>".$j->nama_jenis."</option>";
}
?>     

</select>
</div>             

<div class="form-group">
<label>Tingkat</label>
<select class="form-control" name="tingkat" id="tingkat">
<option value="" disabled selected> Pilih Tingkat</option>

                    </select>
</div>
<div class="form-group">
<label>Perolehan</label>
<select class="form-control" name="perolehan" id="perolehan">
<option value="" disabled selected> Pilih Perolehan</option>

                    </select>
</div>

            <div class="form-group">
                <label>Point Kegiatan</label>
                <input type="input" class="form-control"
name="poin_kegiatan" id="poinkegiatan" placeholder="Point Kegiatan">
            </div>
            <div class="form-group">
                <label>Gambar </label>
                <input type="input" class="form-control"
name="gambar" id="gambar" placeholder="Gambar">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-warning">Reset Data</button>
            <a  class="btn btn-secondary" href="<?= site_url("softskill") ?>">Batal</a>
        </div>
    </form>
</div>
</div>
<script>
$(document).ready(function(){
    $("#jenis").change(function(){
        $("#tingkat").hide();
        $.ajax({
            type: "POST",
            url : "<?php echo base_url("/jenis/subJenis");?>",
            data: {
                jenis_id: $("#jenis").val()
            },
            dataType: "json",
            success:function(response){
                $("#tingkat").html(response.listTingkat).show();
            }
        });
    });
    $("#tingkat").change(function(){
        $("#perolehan").hide();
        $.ajax({
            type: "POST",
            url : "<?php echo base_url("/jenis/subTingkat");?>",
            data: {
                tingkat_id: $("#tingkat").val()
            },
            dataType: "json",
            success:function(response){
                $("#perolehan").html(response.ListPerolehan).show();
            }
        });
    });
    
});

</script>