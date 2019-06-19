<?php 
 session_start();
 include'koneksi.php';
 $id_pembelian=$_GET["id"];
 //echo "<pre>";
 //print_r($_SESSION);
 //echo "</pre>";
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
				<h2>Detail Pembelian</h2>
				<?php
					$ongkir=50000;
					$subtotal=0;
					$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$id_pembelian'"); 
					while($detail=mysqli_fetch_assoc($ambil)){
				?>
				<!--<pre><?php print_r($detail) ?></pre>-->

				<strong>Nama : <?php echo $detail['nama']; ?></strong><br/>
				<strong>Email : <?php echo $detail['email']; ?></strong><br/>
				<p>
					Tanggal(yyyy-mm-dd) : <?php echo $detail['tanggal']; ?><br />
					Total(rp) : <?php echo number_format($detail['total']); ?>
				</p>

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>no</th>
							<th>Nama Pelanggan</th>
							<th>Harga</th>
							<th>jumlah</th>
							<th>Subtotal</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$nomor=1; 
						$ambil=$koneksi->query("SELECT * FROM produk_beli JOIN produk ON produk_beli.id_produk=produk.id WHERE produk_beli.id_pembelian='$id_pembelian'");
						while($array=mysqli_fetch_assoc($ambil)){?>
						<tr>
							<?php $subtotal=$array['harga']*$array['jumlah'];?>
							<td><?php echo $nomor;?></td>
							<td><?php echo $array['nama']; ?></td>
							<td><?php echo number_format($array['harga']);?></td>
							<td><?php echo $array['jumlah']; ?></td>
							<td>
								<?php echo number_format($subtotal);?>
							</td>
						</tr>
						<?php $nomor++;
						} ?>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="4">Ongkir</th>
							<td><?php echo number_format($ongkir); ?></td>
						</tr>
						<tr>
							<th colspan="4">Total</th>
							<th><?php echo number_format($subtotal+$ongkir); ?></th>
						</tr>
					</tfoot>
				</table>
				<div class="row">
					<div></div>
				</div>
		</div>
		<div class="container">
			<div class="col-md-8">
				<div class="alert alert-info">
					<p class="text-dark">
						Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total'] ) ?> ke</p>
						<select class="form-control">
							<option>BRI - 1002.22211.2232.111 a.n Toko Cotton On</option>
							<option>BCA - 222.11.23333.009 a.n Toko Cotton On</option>
							<option>BPD - 3042020.884739.22 a.n Toko Cotton On</option>
						</select>
						<br/>
						<strong class="text-dark">nomor pembelian(Harap dibaca) = <?php echo $id_pembelian; ?></strong>
						<br/>
						<strong class="text-danger">HARAP Mencatat Nomor Pembelian</strong>
						<?php } ?>
				</div>
			</div>
			<?php $ambil=$koneksi->query("SELECT * FROM pembelian WHERE pembelian.id_pembelian='$id_pembelian'");
				while ($detail=mysqli_fetch_assoc($ambil)) {?>
					<div class="col-md-4">	
					<a href="bank.php?id=<?php echo $detail['id_pembelian']; ?>" class="btn btn-secondary" name="beli">Konfirmasi pembayaran</a>			
					</div>
				<?php } ?>
		</div>
	</body>
	<footer class="page-footer font-small bg-primary">

		<div class="footer-copyright py-3 text-center">
			<h4>Ini hanya Desain Untuk membuat sebuah Website Saja</h4>	
		</div>
	</footer>
</html>