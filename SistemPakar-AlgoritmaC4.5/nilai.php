<div class="page-header">
    <h1>Nilai Atribut</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="nilai" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Cari</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=nilai_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
        </form>
    </div>

    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Atribut</th>
                <th>Nama Nilai Atribut</th>
                <th>Solusi</th>
                <th>Gambar</th>
                <th>Penyebab</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $q = esc_field(_get('q'));
        $pg = new Paging();
        $limit = 10;
        $offset = $pg->get_offset($limit, _get('page'));

        $from = "FROM tb_nilai n INNER JOIN tb_atribut a ON a.id_atribut=n.id_atribut";
        $where = "WHERE nama_atribut LIKE '%$q%' OR nama_nilai LIKE '%$q%'";
        $rows = $db->get_results("SELECT * $from $where ORDER BY n.id_atribut, n.nama_nilai LIMIT $offset, $limit");

        $jumrec = $db->get_var("SELECT COUNT(*) $from $where");

        $no = $offset;

        foreach ($rows as $row) : ?>
            <tr>
                <td><?= ++$no ?></td>
                <td><?= $row->id_atribut ?></td>
                <td><?= $row->nama_atribut ?></td>
                <td><?= $row->nama_nilai ?></td>
                <td><?= $row->ket_nilai ?></td>
                <td><img class="thumbnail" src="<?= get_image_url($row->gambar_nilai, 'nilai/small_') ?>" height="100" /></td>
                <td><?= $row->penyebab ?></td>
                <td class="nw">
                    <a class="btn btn-xs btn-warning" href="?m=nilai_ubah&ID=<?= $row->id_nilai ?>"><span class="glyphicon glyphicon-edit"></span></a>
                    <a class="btn btn-xs btn-danger" href="aksi.php?act=nilai_hapus&ID=<?= $row->id_nilai ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
        <?php endforeach;
        ?>
    </table>
    <div class="panel-footer">
        <ul class="pagination"><?= $pg->show("m=nilai&q=" . _get('q') . "&page=", $jumrec, $limit, _get('page')) ?></ul>
    </div>
</div>