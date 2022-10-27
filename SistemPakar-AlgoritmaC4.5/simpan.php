<?php
require_once 'functions.php';
if ($_POST) {
    if ($_POST['jawaban']) {
        $jawaban = key($_POST['jawaban']);
        $db->query("INSERT INTO tb_konsultasi (id_rule, kode, jawaban) VALUES ('$_POST[id_rule]', '$_POST[kode]', '$jawaban')");
    } elseif ($_POST['new'])
        $db->query("TRUNCATE TABLE tb_konsultasi");

    header("location:index.php?m=konsultasi");
}
