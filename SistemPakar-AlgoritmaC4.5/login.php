<div class="page-header">
    <h1>Login</h1>
</div>
<div class="row">
    <div class="col-md-4">        
        <?php if($_POST) include 'aksi.php'; ?>
        <form method="post">
        <p class="help-block">Silahkan Login Terlebih Dahulu!</p>                        
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Username" name="user" autofocus />
            </div>
            <div class="form-group">            
                <label>Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" />  
            </div>      
            <div class="form-group">                
                <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-log-in"></span> Masuk</button>
                <p class="help-block">Lupa Username/Password ? : hafizhsyafiqh@gmail.com</p>
            </div>        
        </form>      
    </div>
</div>