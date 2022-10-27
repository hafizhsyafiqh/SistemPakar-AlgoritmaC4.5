<?php
$q = esc_field(_get('q'));
$rows = $db->get_results("SELECT *
    FROM tb_dataset d 
        INNER JOIN tb_atribut a ON a.id_atribut=d.id_atribut                 
    WHERE a.nama_atribut LIKE '%$q%'
    ORDER BY d.nomor, a.id_atribut");

get_atribut();
get_nilai();

$dataset = array();
foreach ($rows as $row) {
    $dataset[$row->nomor][$row->id_atribut]['nama_nilai'] = $NILAI[$row->id_nilai]['nama_nilai'];
}

?>
<div class="page-header">
    <h1>Dataset</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="dataset" />
            <!--<div class="form-group">-->
            <!--    <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />-->
            <!--</div>-->
            <!--<div class="form-group">-->
            <!--    <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Cari</button>-->
            <!--</div>-->
            <div class="form-group">
                <a class="btn btn-primary" href="?m=dataset_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group">
                <a class="btn btn-info" href="?m=dataset_import"><span class="glyphicon glyphicon-import"></span> Import</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr class="nw">
                    <th>Nomor</th>
                    <?php foreach ($ATRIBUT as $key => $val) : ?>
                        <th><?= $key ?></th>
                    <?php endforeach ?>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php

            foreach ($dataset as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= $v['nama_nilai'] ?></td>
                    <?php endforeach ?>
                    <td class="nw">
                        <a class="btn btn-xs btn-warning" href="?m=dataset_ubah&ID=<?= $key ?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a class="btn btn-xs btn-danger" href="aksi.php?act=dataset_hapus&ID=<?= $key ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>