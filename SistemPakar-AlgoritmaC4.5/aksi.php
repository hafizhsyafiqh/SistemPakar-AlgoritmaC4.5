<?php
require_once 'functions.php';



/** Login user */
if ($mod == 'login') {
    $user = esc_field($_POST['user']);
    $pass = esc_field($_POST['pass']);

    $row = $db->get_row("SELECT * FROM tb_user WHERE user='$user' AND pass='$pass'");
    if ($row) {
        $_SESSION['login'] = $row->user;
        $_SESSION['user'] = $row;
        $_SESSION['id_user'] = $row->id_user;
        $_SESSION['level'] = $row->level;
        redirect_js("index.php");
    } else {
        print_msg("Salah kombinasi username dan password.");
    }
}
/** ubah passsword user */
else if ($mod == 'password') {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];

    $tb = $_SESSION['level'] == 'admin' ? 'tb_admin' : 'tb_user';

    $row = $db->get_row("SELECT * FROM $tb WHERE user='$_SESSION[login]' AND pass='$pass1'");

    if ($pass1 == '' || $pass2 == '' || $pass3 == '')
        print_msg('Field bertanda * harus diisi.');
    elseif (!$row)
        print_msg('Password lama salah.');
    elseif ($pass2 != $pass3)
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else {
        $db->query("UPDATE $tb SET pass='$pass2' WHERE user='$_SESSION[login]'");
        print_msg('Password berhasil diubah.', 'success');
    }
} elseif ($act == 'logout') {
    unset($_SESSION['login'], $_SESSION['level'], $_SESSION['user'], $_SESSION['id_user']);
    header("location:index.php?m=login");
}

/** menyimpan pendaftaran user baru */
elseif ($mod == 'daftar') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];
    $merk = $_POST['merk'];

if ($_POST['email'] != null) {
    $email = $_POST['email'];
    if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) {
  return $errorEmail['errorEmail'] = array('message' => 'Email salah', );
  return false;
}
    
}

    if ($nama == '' || $email == ''|| $user == ''  || $pass == '' || $jk == '' || $alamat == '' || $merk == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    
    elseif ($db->get_results("SELECT * FROM tb_user WHERE email='$user'"))
        print_msg("Email sudah ada!");    
    elseif ($db->get_results("SELECT * FROM tb_user WHERE user='$user'"))
        print_msg("User sudah ada!");
    else {
        $db->query("INSERT INTO tb_user (nama, email, user, pass, jk, alamat, merk, level) 
            VALUES ('$nama', '$email','$user', '$pass', '$jk', '$alamat', '$merk', 'user')");
        alert('Pendaftaran berhasil, silahkan login untuk melanjutkan!');
        redirect_js("index.php?m=login");



    }
}
/** ubah profil user */
elseif ($mod == 'profil') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $telpon = $_POST['merk'];

    if ($nama == '' || $email == '' || $user == '' || $alamat == '' || $jk == '' || $merk == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_user WHERE user='$user' AND id_user<>'$_SESSION[id_user]'"))
        print_msg("User sudah ada!");
    else {
        $db->query("UPDATE tb_user SET nama='$nama', email='$email', user='$user', jk='$jk', alamat='$alamat', merk='$merk' WHERE id_user='$_SESSION[id_user]'");
        print_msg('Profil berhasil diubah!', 'success');
    }
}

/** dataset */
elseif ($mod == 'dataset_tambah') {
    $nomor = $_POST['nomor'];

    $error = false;
    foreach ($_POST['nilai'] as $key => $val) {
        if (!$val)
            $error = true;
    }

    if ($error) {
        print_msg("Field yang bertanda * tidak boleh kosong!");
    } elseif ($db->get_row("SELECT * FROM tb_dataset WHERE nomor='$nomor'")) {
        print_msg("Nomor sudah ada");
    } else {
        foreach ($_POST['nilai'] as $key => $val) {
            $db->query("INSERT INTO tb_dataset (nomor, id_atribut, id_nilai) VALUES ('$nomor', '$key', '$val')");
        }
        redirect_js("index.php?m=dataset");
    }
} else if ($mod == 'dataset_ubah') {
    $error = false;
    foreach ($_POST['nilai'] as $key => $val) {
        if (!$val)
            $error = true;
    }

    if ($error) {
        print_msg("Field yang bertanda * tidak boleh kosong!");
    } else {
        foreach ($_POST['nilai'] as $key => $val) {
            $db->query("UPDATE tb_dataset SET id_nilai='$val' WHERE id_dataset='$key'");
        }
        redirect_js("index.php?m=dataset");
    }
} else if ($act == 'dataset_hapus') {
    $db->query("DELETE FROM tb_dataset WHERE nomor='$_GET[ID]'");
    header("location:index.php?m=dataset");
}

/** nilai atribut */
elseif ($mod == 'nilai_tambah') {
    $id_atribut = $_POST['id_atribut'];
    $nama_nilai = $_POST['nama_nilai'];
    $ket_nilai = $_POST['ket_nilai'];
    $gambar_nilai = $_FILES['gambar_nilai'];
    $penyebab = $_POST['penyebab'];

    if (!$id_atribut || !$nama_nilai)
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        if ($gambar_nilai['name']) {
            $file_name = rand(1000, 9999) . parse_file_name($gambar_nilai['name']);
            $img = new SimpleImage($gambar_nilai['tmp_name']);
            $img->best_fit(1024, 1024);
            $img->save('assets/images/nilai/' . $file_name);
            $img->thumbnail(300, 300);
            $img->save('assets/images/nilai/small_' . $file_name);
        } else {
            $file_name = '';
        }
        $db->query("INSERT INTO tb_nilai (id_atribut, nama_nilai, ket_nilai, gambar_nilai, penyebab) VALUES ('$id_atribut', '$nama_nilai', '$ket_nilai', '$file_name', '$penyebab')");
        redirect_js("index.php?m=nilai");
    }
} else if ($mod == 'nilai_ubah') {
    $id_atribut = $_POST['id_atribut'];
    $nama_nilai = $_POST['nama_nilai'];
    $ket_nilai = $_POST['ket_nilai'];
    $gambar_nilai = $_FILES['gambar_nilai'];
 $penyebab = $_POST['penyebab'];
    if (!$id_atribut || !$nama_nilai)
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        if ($gambar_nilai['name']) {
            hapus_gambar_nilai($_GET['ID']);
            $file_name = rand(1000, 9999) . parse_file_name($gambar_nilai['name']);
            $img = new SimpleImage($gambar_nilai['tmp_name']);
            $img->best_fit(1024, 1024);
            $img->save('assets/images/nilai/' . $file_name);
            $img->thumbnail(300, 300);
            $img->save('assets/images/nilai/small_' . $file_name);
            $sql_gambar_nilai = ", gambar_nilai='$file_name'";
        } else {
            $sql_gambar_nilai = '';
        }
        $db->query("UPDATE tb_nilai SET id_atribut='$id_atribut', nama_nilai='$nama_nilai', ket_nilai='$ket_nilai' ,penyebab ='$penyebab' $sql_gambar_nilai  WHERE id_nilai='$_GET[ID]'");
        redirect_js("index.php?m=nilai");
    }
} else if ($act == 'nilai_hapus') {
    hapus_gambar_nilai($_GET['ID']);
    $db->query("DELETE FROM tb_nilai WHERE id_nilai='$_GET[ID]'");
    header("location:index.php?m=nilai");
}

/** atribut */
elseif ($mod == 'atribut_tambah') {
    $id_atribut = $_POST['id_atribut'];
    $nama_atribut = $_POST['nama_atribut'];
    $gambar = $_FILES['gambar'];

    if (!$id_atribut || !$nama_atribut)
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_atribut WHERE id_atribut='$id_atribut'"))
        print_msg("Kode sudah ada!");
    else {
        if ($gambar['name']) {
            $file_name = rand(1000, 9999) . parse_file_name($gambar['name']);
            $img = new SimpleImage($gambar['tmp_name']);
            $img->best_fit(1024, 1024);
            $img->save('assets/images/atribut/' . $file_name);
            $img->thumbnail(300, 300);
            $img->save('assets/images/atribut/small_' . $file_name);
        } else {
            $file_name = '';
        }

        $db->query("INSERT INTO tb_atribut (id_atribut, nama_atribut, gambar) 
            VALUES ('$id_atribut', '$nama_atribut', '$file_name')");
        $db->query("INSERT INTO tb_dataset (nomor, id_atribut) SELECT nomor, '$id_atribut' FROM tb_dataset GROUP BY nomor");
        redirect_js("index.php?m=atribut");
    }
} else if ($mod == 'atribut_ubah') {
    $id_atribut = $_POST['id_atribut'];
    $nama_atribut = $_POST['nama_atribut'];
    $gambar = $_FILES['gambar'];

    if (!$id_atribut || !$nama_atribut)
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        if ($gambar['name']) {
            hapus_gambar_atribut($_GET['ID']);
            $file_name = rand(1000, 9999) . parse_file_name($gambar['name']);
            $img = new SimpleImage($gambar['tmp_name']);
            $img->best_fit(1024, 1024);
            $img->save('assets/images/atribut/' . $file_name);
            $img->thumbnail(300, 300);
            $img->save('assets/images/atribut/small_' . $file_name);
            $sql_gambar = ", gambar='$file_name'";
        } else {
            $sql_gambar = '';
        }
        $db->query("UPDATE tb_atribut SET nama_atribut='$nama_atribut' $sql_gambar WHERE id_atribut='$_GET[ID]'");
        redirect_js("index.php?m=atribut");
    }
} else if ($act == 'atribut_hapus') {
    hapus_gambar_atribut($_GET['ID']);
    $db->query("DELETE FROM tb_atribut WHERE id_atribut='$_GET[ID]'");
    $db->query("DELETE FROM tb_nilai WHERE id_atribut='$_GET[ID]'");
    $db->query("DELETE FROM tb_dataset WHERE id_atribut='$_GET[ID]'");
    header("location:index.php?m=atribut");
}
