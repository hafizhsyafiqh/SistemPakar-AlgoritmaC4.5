<?php
include 'functions.php';
// if (empty($_SESSION['login']))
// 	header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="assets/favicon.ico" />
	<title>Source Code Algoritma C45</title>
	<link href="assets/css/flatly-bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/general.css" rel="stylesheet" />
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="?">C45 Pakar</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<?php if (_session('level') == 'admin') : ?>
						<li><a href="?m=atribut"><span class="glyphicon glyphicon-th-large"></span> Atribut</a></li>
						<li><a href="?m=nilai"><span class="glyphicon glyphicon-th"></span> Nilai Atribut</a></li>
						<li><a href="?m=dataset"><span class="glyphicon glyphicon-star"></span> Dataset</a></li>
						<li><a href="?m=c45_tree"><span class="glyphicon glyphicon-signal"></span> Tree</a></li>
						<li><a href="?m=konsultasi&act=new"><span class="glyphicon glyphicon-signal"></span> Konsultasi</a></li>
						<li><a href="?m=histori"><span class="glyphicon glyphicon-calendar"></span> Histori</a></li>
						<li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
						<li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					<?php elseif (_session('level') == 'user') : ?>
						<li><a href="?m=konsultasi&act=new"><span class="glyphicon glyphicon-signal"></span> Konsultasi</a></li>
						<li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
						<li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					<?php else : ?>
						<li><a href="?m=daftar"><span class="glyphicon glyphicon-user"></span> Daftar</a></li>
						<li><a href="?m=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					<?php endif ?>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<?php
		if (file_exists($mod . '.php'))
			include $mod . '.php';
		else
			include 'home.php';
		?>
	</div>
<footer class="footer bg-primary">
		<div class="container">
			<p> Hafizh Umar Syafiqh <em class="pull-right">Sistem Pakar Diagnosa Kerusakan Smartphone Algoritma C45</em></p>
		</div>
	</footer>
	<script type="text/javascript">
		$('.form-control').attr('autocomplete', 'off');
	</script>
</body>

</html>