<?php
session_start();
DEFINE('ABSPATH', dirname(__FILE__) . '/');
include 'config.php';
include 'includes/db.php';
$db = new DB($config['server'], $config['username'], $config['password'], $config['database_name']);
include 'includes/paging.php';
include 'includes/SimpleImage.php';
include 'c45.php';

function _post($key, $val = null)
{
    global $_POST;
    if (isset($_POST[$key]))
        return $_POST[$key];
    else
        return $val;
}

function _get($key, $val = null)
{
    global $_GET;
    if (isset($_GET[$key]))
        return $_GET[$key];
    else
        return $val;
}

function _session($key, $val = null)
{
    global $_SESSION;
    if (isset($_SESSION[$key]))
        return $_SESSION[$key];
    else
        return $val;
}

$mod = _get('m');
$act = _get('act');


$ATRIBUT = array();
$TARGET = '';
$NILAI = array();
$DATASET = array();

/** =============== */
$rows = $db->get_results("SELECT * FROM tb_atribut");

function get_atribut($refresh = false)
{
    global $ATRIBUT, $db, $TARGET, $DICARI;
    if (!$ATRIBUT || $refresh) {
        $rows = $db->get_results("SELECT * FROM tb_atribut ORDER BY id_atribut");
        foreach ($rows as $row) {
            $ATRIBUT[$row->id_atribut] = $row->nama_atribut;
        }

        end($ATRIBUT);
        $TARGET = key($ATRIBUT);
        reset($ATRIBUT);

        $DICARI = $ATRIBUT;
        unset($DICARI[$TARGET]);
    }
    return $ATRIBUT;
}

function get_nilai($refresh = false)
{
    global $NILAI, $db;
    if (!$NILAI || $refresh) {
        $rows = $db->get_results("SELECT id_atribut, id_nilai, nama_nilai FROM tb_nilai ORDER BY id_nilai");
        foreach ($rows as $row) {
            $NILAI[$row->id_nilai] = array(
                'id_atribut' => $row->id_atribut,
                'nama_nilai' => $row->nama_nilai,
            );
        }
    }
    return $NILAI;
}

function get_dataset($refresh = false)
{
    global $DATASET, $db;
    if (!$DATASET || $refresh) {
        $rows = $db->get_results("SELECT d.nomor, d.id_nilai, n.id_atribut FROM tb_dataset d INNER JOIN tb_nilai n ON n.id_nilai=d.id_nilai ORDER BY nomor");
        foreach ($rows as $row) {
            $DATASET[$row->nomor][$row->id_atribut] = $row->id_nilai;
        }
    }
    return $DATASET;
}

function get_atribut_option($selected = '')
{
    $rows = get_atribut();
    $a = '';
    foreach ($rows as $key => $val) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>[$key] $val</option>";
        else
            $a .= "<option value='$key'>[$key] $val</option>";
    }
    return $a;
}

function get_jenis_option($selected = '')
{
    $arr = array(
        'Acak' => 'Acak',
        'Dari Awal' => 'Dari Awal',
        'Dari Akhir' => 'Dari Akhir',
    );
    $a = '';
    foreach ($arr as $key => $val) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>$val</option>";
        else
            $a .= "<option value='$key'>$val</option>";
    }
    return $a;
}

function get_nilai_option($id_atribut, $selected = '')
{
    $atribut = get_atribut();
    $nilai = get_nilai();
    $a = '';
    foreach ($nilai as $key => $val) {
        if ($val['id_atribut'] == $id_atribut) {
            if ($selected == $key)
                $a .= "<option value='$key' selected>$val[nama_nilai]</option>";
            else
                $a .= "<option value='$key'>$val[nama_nilai]</option>";
        }
    }
    return $a;
}

function get_nilai_atribut_option($id_atribut,  $selected = '')
{
    $nilai = get_nilai();
    $a = '';
    foreach ($nilai as $key => $val) {
        if ($val['id_atribut'] == $id_atribut) {
            if ($selected == $key)
                $a .= "<option value='$key' selected>$val[nama_nilai]</option>";
            else
                $a .= "<option value='$key'>$val[nama_nilai]</option>";
        }
    }
    return $a;
}
function get_words($str, $numb = 10, $suffix = '...')
{
    $str = strip_tags($str);
    $arr_str = explode(' ', $str, $numb + 1);
    if (count($arr_str) <= $numb) {
        return $str;
    } else {
        array_pop($arr_str);
        return implode(' ', $arr_str) . $suffix;
    }
}

function esc_field($str)
{
    if ($str)
        return addslashes($str);
}

function get_option($option_name)
{
    global $db;
    return $db->get_var("SELECT option_value FROM tb_options WHERE option_name='$option_name'");
}

function update_option($option_name, $option_value)
{
    global $db;
    return $db->query("UPDATE tb_options SET option_value='$option_value' WHERE option_name='$option_name'");
}

function redirect_js($url)
{
    echo '<script type="text/javascript">window.location.replace("' . $url . '");</script>';
}

function alert($url)
{
    echo '<script type="text/javascript">alert("' . $url . '");</script>';
}

function print_msg($msg, $type = 'danger')
{
    echo ('<div class="alert alert-' . $type . ' alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $msg . '</div>');
}

function kode_oto($field, $table, $prefix, $length)
{
    global $db;
    $var = (string) $db->get_var("SELECT $field FROM $table WHERE $field REGEXP '{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");
    if ($var) {
        return $prefix . substr(str_repeat('0', $length) . (substr($var, -$length) + 1), -$length);
    } else {
        return $prefix . str_repeat('0', $length - 1) . 1;
    }
}

function set_value($key = null, $default = null)
{
    global $_POST;
    if (isset($_POST[$key]))
        return $_POST[$key];

    if (isset($_GET[$key]))
        return $_GET[$key];

    return $default;
}

function get_image_url($filename, $pref_f = "", $pref_d = "")
{
    $location = "assets/images/{$pref_f}{$filename}";

    $file = ABSPATH . $location;
    if (is_file($file))
        return $pref_d . $location;
    else
        return $pref_d . "assets/images/no_image.png";
}
function parse_file_name($file_name)
{
    $x = strtolower($file_name);
    $x = str_replace(array(' '), '-', $x);
    return $x;
}

function hapus_gambar_atribut($ID)
{
    global $db;
    $row = $db->get_row("SELECT gambar FROM tb_atribut WHERE id_atribut='$ID'");
    if ($row) {
        $file1 = 'assets/images/atribut/' . $row->gambar;
        $file2 = 'assets/images/atribut/small_' . $row->gambar;
        if (is_file($file1))
            unlink($file1);
        if (is_file($file2))
            unlink($file2);
    }
}

function hapus_gambar_nilai($ID)
{
    global $db;
    $row = $db->get_row("SELECT gambar_nilai FROM tb_nilai WHERE id_nilai='$ID'");
    if ($row) {
        $file1 = 'assets/images/nilai/' . $row->gambar_nilai;
        $file2 = 'assets/images/nilai/small_' . $row->gambar_nilai;
        if (is_file($file1))
            unlink($file1);
        if (is_file($file2))
            unlink($file2);
    }
}
function get_jk_radio($selected)
{
    $array = array('Laki-laki', 'Perempuan');
    $a = '';
    foreach ($array as $arr) {
        if ($arr == $selected)
            $a .= "<label class='radio-inline'>
                  <input type='radio' name='jk' value='$arr' checked> $arr
                </label>";
        else
            $a .= "<label class='radio-inline'>
                  <input type='radio' name='jk' value='$arr'> $arr
                </label>";
    }
    return '<div class="radio">' . $a . '</div>';
}