<div class="page-header">
    <h1>Tambah Atribut</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>ID Atribut <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="id_atribut" value="<?= set_value('id_atribut', kode_oto('id_atribut', 'tb_atribut', 'A', 2)) ?>" />
            </div>
            <div class="form-group">
                <label>Nama Atribut <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_atribut" value="<?= set_value('nama_atribut') ?>" />
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input class="form-control" type="file" name="gambar" value="<?= set_value('gambar') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=atribut"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>