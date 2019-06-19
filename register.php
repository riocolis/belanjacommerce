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
						<div class="col-md-9">
							<div class="container">
							<h1>Daftar</h1>
							<p>Daftar Akun Baru Anda Sekarang !</p>
							<hr>
	  
							<label for="uname"><b>Nama Pengguna</b></label>
							<input type="text" placeholder="Masukkan Nama Pengguna" name="username">
	  
							<label for="email"><b>Email</b></label>
							<input type="text" placeholder="Masukkan Email" name="email">

							<label for="psw"><b>Kata Sandi</b></label>
							<input type="password" placeholder="Masukkan Kata Sandi" name="password">

							<label for="psw-repeat"><b>Ulang Kata Sandi </b></label>
							<input type="password" placeholder="Ulang kata Sandi" name="repassword">

							<label>
								<input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Ingat Saya
							</label>

							<p>Dengan Klik Daftar, Kamu telah menyetujui 
							<a href="#" style="color:dodgerblue">Aturan Penggunaan</a> dan Kebijakan Privasi dari Website Kami.</p>
							</div>
							<div class="clearfix">
							<button class="btn cancelbtn text-light">Batal</button>
							<button class="button1" type="submit" name="daftar">Daftar</button>
						</div>
						</div>
					</div>
				</div>
		</form>
		<?php 
		if (isset($_POST["daftar"])) 
		{
			$nama=$_POST["username"];
			$email=$_POST["email"];
			$password=$_POST["password"];

			$ambil=$koneksi->query("SELECT * from pelanggan WHERE email='$email'");
			$yangcocok=$ambil->num_rows;
			if ($yangcocok==1) 
			{
				echo "<script>alert('Mohon maaf, email sudah terdaftar, silahkan gunakan email lain,')</script>";
				echo "<script>location='register.php';</script>";	
			}
			else
			{
				$koneksi->query("INSERT INTO pelanggan (email,password,nama) VALUES ('$email','$password','$nama')");
				echo "<script>alert('Register anda Sukses, silahkan Login')</script>";
				echo "<script>location='login.php';</script>";
			}
		}

		 ?>
	</div>
	</body>
</html>