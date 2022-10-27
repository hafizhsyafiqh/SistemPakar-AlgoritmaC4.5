<div class="page-header">
    <h1>C45 Tree</h1>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#c1" data-toggle="collapse">Perhitungan</a>
        </h3>
    </div>
    <div class="panel-body collapse" id="c1">
        <pre>
        <?php
        $rows_dataset = $db->get_results("SELECT * 
            FROM tb_dataset d 
                INNER JOIN tb_nilai n ON n.id_nilai=d.id_nilai 
                INNER JOIN tb_atribut a ON a.id_atribut=d.id_atribut
            ORDER BY nomor, d.id_atribut");

        $data = array();
        foreach ($rows_dataset as $row) {
            $data[$row->nomor][$row->nama_atribut] = $row->nama_nilai;
        }
        $data = array_values($data);

        $atribut = get_atribut();
        $target = $ATRIBUT[$TARGET];
        $c45 = new c45($data, $atribut, $target, true);

        ?>
        </pre>
    </div>
</div>
<?php
$db->query("TRUNCATE tb_rule");
$table = $c45->table();
$db->multi_query('tb_rule', $table);

// echo '<pre>' . print_r($table, 1) . '</pre>';
// echo '<pre>' . print_r($c45->tree, 1) . '</pre>';
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Tree</h3>
    </div>
    <div class="panel-body">
        <pre>
        <?php
        $c45->display();
        ?>
        </pre>
    </div>
</div>
<style type="text/css">
    .c45_tree {
        margin: 0;
        padding: 0;
    }

    .c45_tree li {
        list-style: none;
    }

    .c45_tree ul li {
        margin: 10px;
        position: relative;
    }

    .c45_tree li:before {
        content: "";
        position: absolute;
        top: -10px;
        left: -20px;
        border-left: 2px solid black;
        border-bottom: 2px solid black;
        border-radius: 0 0 0 0;
        width: 20px;
        height: 20px;
    }

    .c45_tree li::after {
        position: absolute;
        content: "";
        top: 8px;
        left: -20px;
        border-left: 2px solid black;
        border-top: 2px solid black;
        border-radius: 0 0 0 0;
        width: 20px;
        height: 100%;
    }

    .c45_tree a {
        min-width: 80px;
    }

    .c45_tree li:last-child::after {
        display: none
    }

    .c45_tree li:last-child:before {
        border-radius: 0 0 0 5px
    }

    ul.c45_tree>li:first-child::before {
        display: none
    }
</style>