<?php
$row = $db->get_row("SELECT * FROM tb_atribut WHERE id_atribut='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Atribut</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Id Atribut <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="id_atribut" readonly="readonly" value="<?= $row->id_atribut ?>" />
            </div>
            <div class="form-group">
                <label>Nama Atribut <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_atribut" value="<?= set_value('nama_atribut', $row->nama_atribut) ?>" />
            </div>
            <div class="form-group">
                <label>Gambar </label>
                <input class="form-control" type="file" name="gambar" accept="image/*" />
                <p class="help-block">Kosongkan jika tidak ingin mengubah gambar.
                    <img class="thumbnail" height="100" src="<?= get_image_url($row->gambar, 'atribut/small_') ?>" />
                </p>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=atribut"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>