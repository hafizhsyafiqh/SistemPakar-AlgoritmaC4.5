<!-- Form pendaftaran user baru-->
<div class="page-header">
    <h1>Daftar</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>  
       
        <form method="post" onsubmit="return emailValidation()">
            <div class="form-group">
                <label>Nama <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" onkeypress='return hanyaHuruf(event)' value="<?= set_value('nama') ?>" />
            </div>
            <div class="form-group">
                <label>Email <span class="text-danger">*</span></label>
                <input class="form-control" type="email" name="email"  value="<?= set_value('email') ?>" />
                 <?php if (isset($errorEmail)) { ?>
            <div> <p class="text-danger">email salah</p> </div>
        <?php } ?>
                
            </div>
            <div class="form-group">
                <label>Username <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="user" value="<?= set_value('user') ?>" />
            </div>
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="pass" value="<?= set_value('pass') ?>" />
            </div>
            <div class="form-group">
                <label>Jenis kelamin <span class="text-danger">*</span></label>
                <?= get_jk_radio(set_value('jk', 'Laki-laki')) ?>
            </div>
            <div class="form-group">
                <label>Alamat <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="alamat" value="<?= set_value('alamat') ?>" />
            </div>
            <div class="form-group">
                <label>Merk dan Tipe Smartphone <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="merk" value="<?= set_value('merk') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-save"></span> Daftar</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function hanyaHuruf(evt){
        var huruf = (evt.which) ? evt.which : event.keyCode //var huruf dideskripsikan berisi nilai evt.which dimana evt.which bernilai event.keyCode, event.keyCode : jika form menerima inputan dari keyboard
        if ((huruf < 65 || huruf > 90)&&(huruf <97 || huruf > 122)&&huruf > 32) //javascript keycode
        return false;
        return true;
    }
</script>

<!-- <script type="text/javascript">
 function cekemail(email){
            if(email.indexOf("@")!=-1 && email.indexOf(".")!=-1){
                alert("ini adalah email");
            }
            else{
                alert("ini bukan email");
            }
        }
    </script>
 -->

<script type="text/javascript"> 
function emailValidation() {

    let email = document.getElementsByName("email")[0].value;
  
   if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
    // Return Error - Invalid Email
    $msg = 'The email you have entered is invalid, please try again.';
}else{
    // Return Success - Valid Email
    $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
}
</script>