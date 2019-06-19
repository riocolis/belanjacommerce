<?php 
session_start();
include 'koneksi.php';
 ?>
<html>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/bootstrap-reboot.css">
	<link rel="stylesheet" href="css/bootstrap-reboot-min.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/login.css">
 
  
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/mainscript.js"></script>	
	<script src="js/bootstrap.bundle.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<body>
		<nav class="navbar navbar-inverse navbar-expand-sm bg-dark navbar-dark sticky-top">
			<div class="container-fluid">
				<div class="nav">
					<a href="index.php"><button class="active button2"><a href="index.php">Beranda</a></button></a>
					<div class="dropdown">
					<button class="button2" data-toggle="dropdown">Belanja</button>
					  <ul class="dropdown-menu dropdown2-color">
						<li class="dropdown2-font"><a href="belanja1.php">Kaos</a></li>
						<li class="dropdown2-font"><a href="belanja2.php">Jaket</a></li>
						<li class="dropdown2-font"><a href="belanja3.php">Dress</a></li>
					  </ul>
				</div>
					<a href="keranjang.php"><button class="button2"><a href="keranjang.php">Keranjang</a></button></a>	
				</div>
				<div class="navbar-header">
					<a style="font-size:35px;" class="navbar-brand navbar-dark" href="index.php">TOKO COTTON ON</a>
				</div>
				<div class="nav navbar-nav navbar-right">
					<?php if(isset($_SESSION["pelanggan"])): ?>
						<h5 class="text-light"><?php echo $_SESSION["pelanggan"]["nama"] ?></h5>
						<a href="logout.php" class="text-light btn btn-dark">Keluar</a>
					<?php else : ?>
					<a href="login.php" class="text-light btn btn-dark">Masuk</a>
					<a href="register.php" class ="text-light btn btn-dark">Daftar</a>
					<a href="admin/login.php" class="text-light btn btn-dark">Admin</a>
					<?php endif ?>
				</div>
			</div>
		</nav>
		<div class="container">
			<form method="post">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-7">
							<div class="container">
								<h1>Login</h1>
								<p>Silakan masuk ke dalam akun kamu</p>
								<hr>
							</div>
							<div class="container">
								<label ><b>Nama Pelanggan / Email Pelanggan</b></label>
								<input type="text" placeholder="Masukkan Nama Pengguna" name="username">

								<label ><b>Kata Sandi</b></label>
								<input type="password" placeholder="Masukkan Kata Sandi" name="password">
			
								<button class="button1" type="submit" value="login" name="simpan">Masuk</button>
								<label>
									<input type="checkbox" checked="checked" name="remember"> Ingat saya
								</label>
							</div>

								<div class="container">
								<button type="button" class="cancelbtn">Batal</button>
								<span class="psw">Lupa <a href="#">kata sandi?</a></span>
							</div>
						</div>
					</div>
				</div>
		</form>
		<?php 
if (isset($_POST["simpan"])) 
{
	$username=$_POST['username'];
	$password=$_POST['password'];

	$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email='$username' OR nama='$username' AND password='$password'");
	$akuncocok=$ambil->num_rows;

	if ($akuncocok==1) 
	{
		$akun=mysqli_fetch_assoc($ambil);
		$_SESSION["pelanggan"]=$akun;
		echo "<script>alert('anda sukses login');</script>";
		echo "<script>location='index.php';</script>";
	}
	else
	{
		echo "<script>alert('anda gagal login');</script>";
		echo "<script>location='login.php';</script>";
	}

}

		 ?>
	</div>
	</body>
</html>