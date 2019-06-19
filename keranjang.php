 <?php 
 session_start();
 include'koneksi.php';

 //echo "<pre>";
 //print_r($_SESSION);
 //echo "</pre>";

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
{
	echo "<script>alert('keranjang kosong, silahkan belanja dulu');</script>";
	echo "<script>location='index.php';</script>";
}


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
			<h1>Keranjang Anda</h1>
			<hr/>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Foto</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subtotal</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php foreach ($_SESSION["keranjang"] as $id => $jumlah):?>
					<?php
					$ambil=$koneksi->query("SELECT * FROM produk WHERE id='$id'");
					$array=mysqli_fetch_assoc($ambil);
					$subtotal=$array["harga"]*$jumlah;
					//echo "<pre>";
 					//print_r($array);
 					//echo "</pre>";
					 ?>
					<tr>
						<td><?php echo $nomor ?></td>
						<td><img src="admin/gambar/<?php echo $array['gambar']; ?>" width="100"></td>
						<td><?php echo $array['nama']; ?></td>
						<td>RP. <?php echo number_format($array['harga']);  ?></td>
						<td><?php echo $jumlah ?></td>
						<td>RP. <?php echo number_format($subtotal);  ?></td>
						<td>
							<a href="hapuskeranjang.php?id=<?php echo $id ?>" class="btn btn-danger">Hapus</a>
						</td>
					</tr>
					<?php  $nomor++; ?>
					<?php endforeach ?>
				</tbody>
			</table>
			<a href="index.php" class="btn btn-default btn-success">Belanja Lagi</a>
			<a href="checkout.php" class="btn btn-default btn-primary" name="checkout">Checkout</a>
		</div>
	</body>
	<footer class="page-footer font-small bg-primary">

		<div class="footer-copyright py-3 text-center">
			<h4>Ini hanya Desain Untuk membuat sebuah Website Saja</h4>	
		</div>
	</footer>
</html>