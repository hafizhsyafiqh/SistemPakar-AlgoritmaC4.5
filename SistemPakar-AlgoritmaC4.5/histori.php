<div class="page-header">
    <h1>Histori</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="histori" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Cari</button>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr class="nw">
                    <th>No</th>
                    <th>Waktu</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Merk dan Tipe Smartphone</th>
                    <th>Hasil</th>
                    <th>Solusi</th>
                    <th>Penyebab</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(_get('q'));
            $rows = $db->get_results("SELECT * FROM tb_histori h INNER JOIN tb_user u ON u.id_user=h.id_user INNER JOIN tb_nilai n ON n.id_nilai=h.id_nilai WHERE nama LIKE '%$q%' OR nama_nilai LIKE '%$q%' ORDER BY waktu DESC LIMIT 25");
            $no = 1;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->waktu ?></td>
                    <td><?= $row->nama ?></td>
                    <td><?= $row->jk ?></td>
                    <td><?= $row->alamat ?></td>
                    <td><?= $row->merk ?></td>
                    <td><?= $row->nama_nilai ?></td>
                    <td><?= $row->ket_nilai ?></td>
                     <td><?= $row->penyebab ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>