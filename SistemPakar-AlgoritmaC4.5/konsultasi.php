<?php
if (_get('act'))
    $db->query("TRUNCATE TABLE tb_konsultasi");

$success = false;
$start = 0;
$row = $db->get_row("SELECT * FROM tb_konsultasi ORDER BY id_rule DESC LIMIT 1");

if ($row) {
    $jawaban = $row->jawaban;
    $row = $db->get_row("SELECT * FROM tb_rule WHERE parent='$row->id_rule' AND child='$jawaban'");

    if ($row->jenis == 'tanya') {
        $kode_gejala = $row->kode;
        $id_rule = $row->id_rule;
    } else {
        $kode_diagnosa = $row->kode;
        $success = true;
    }

    if ($success) {
        //$row = $db->get_row("SELECT * FROM tb_diagnosa WHERE kode_diagnosa='$kode_diagnosa'");
    } else {
        //$row = $db->get_row("SELECT * FROM tb_gejala WHERE kode_gejala='$kode_gejala'");
    }
} else {
    $start = true;
    $row = $db->get_row("SELECT * FROM tb_rule ORDER BY parent, child LIMIT 1");
    $kode_gejala = $row->kode;
    $id_rule = $row->id_rule;
}
?>
<div class="page-header">
    <h1>Konsultasi</h1>
</div>

<?php if ($success) : ?>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Hasil Konsultasi</h3>
        </div>
        <div class="panel-body text-center">
            <p>Adapun hasilnya adalah</p>
            <h3><?= $row->kode ?></h3>

            <?php
            $nilai = $db->get_row("SELECT * FROM tb_nilai WHERE nama_nilai='{$row->kode}'");
            $db->query("INSERT INTO tb_histori (waktu, id_user, id_nilai) VALUES (NOW(), '{$_SESSION['id_user']}', '$nilai->id_nilai')");
            ?>
            <div class="text-center"><img class="thumbnail" style="display: inline-block;" src="<?= get_image_url($nilai->gambar_nilai, 'nilai/') ?>" /></div>
            <p><b>Solusi</b>: <?= $nilai->ket_nilai ?></p>
            <p><b>Penyebab</b>: <?= $nilai->penyebab ?></p>
            <form action="simpan.php" method="post">
                <input type="hidden" name="kode_gejala" value="<?= $row->kode_gejala ?>" />
                <p>&nbsp;</p>
                <p>
                    <button name="new" class="btn btn-primary" value="1"><span class="glyphicon glyphicon-refresh"></span> Konsultasi Lagi</button>
                    <?php if ($_SESSION['level'] == 'siswa') : ?>
                        <a class="btn btn-default" href="cetak.php?m=konsultasi" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak Hasil</a>
                    <?php endif ?>
                </p>
            </form>
        </div>
    </div>
    <h3>Riwayat Pertanyaan</h3>
    <div class="list-group">
        <?php
        $rows = $db->get_results("SELECT * FROM tb_konsultasi");
        $no = 1;
        foreach ($rows as $row) : ?>
            <div class="list-group-item"><?= $no++ ?>. Apakah <?= strtolower($row->kode) ?>? <strong><?= $row->jawaban ?></strong></div>
        <?php endforeach ?>
    </div>
<?php else :
    $atribut = $db->get_row("SELECT * FROM tb_atribut WHERE nama_atribut='$kode_gejala'");
?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Jawablah pertanyaan berikut ini</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <img class="thumbnail" src="<?= get_image_url($atribut->gambar, 'atribut/small_') ?>" height="100" />
                </div>
                <div class="col-md-9">
                    <h3>Apakah <?= strtolower($kode_gejala) ?>?</h3>
                    <form action="simpan.php" method="post">
                        <input type="hidden" name="id_rule" value="<?= $id_rule ?>" />
                        <input type="hidden" name="kode" value="<?= $kode_gejala ?>" />
                        <p>&nbsp;</p>
                        <p>
                            <?php
                            $rows = $db->get_results("SELECT * FROM tb_rule WHERE parent='$id_rule' ORDER BY child DESC");
                            foreach ($rows as $row) : ?>
                                <button name="jawaban[<?= $row->child ?>]" class="btn btn-primary" value="<?= $row->child ?>"><?= $row->child ?></button>
                            <?php endforeach ?>
                            <?php if (!$start) : ?>
                                <a href="?m=konsultasi&act=new" class="btn btn-info pull-right">Batal</a>
                            <?php endif ?>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>