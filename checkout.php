<?php 
	session_start();
	include 'koneksi.php';

	$pelanggan2=$_SESSION["pelanggan"]["id_pelanggan"];
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
{
	echo "<script>alert('keranjang kosong, silahkan belanja dulu');</script>";
	echo "<script>location='index.php';</script>";
}
if (empty($_SESSION["pelanggan"]) OR !isset($_SESSION["pelanggan"])) 
{
	echo "<script>alert('Silahkan Login terlebih dahulu');</script>";
	echo "<script>location='login.php';</script>";
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
	<link rel="stylesheet" href="css/checkOut.css"> 
  
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
						<a href="logout.php" class="text-light">Keluar</a>
					<?php else : ?>
					<a href="login.php" class="text-light">Masuk</a>
					<a href="register.php" class ="text-light">Daftar</a>
					<?php endif ?>
				</div>
			</div>
		</nav>
		<br>
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
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; $totalbelanja=0;?>
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
					</tr>
					<?php  $nomor++; ?>
					<?php  $totalbelanja+=$subtotal; ?>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="5">Total Belanja</th>
						<th>Rp. <?php echo number_format($totalbelanja); ?></th>
					</tr>
				</tfoot>
			</table>

		</div>
				<div class="container">
					<form method="post">
						<?php $ongkir=50000;
							$loop=0; 
							$ambil=$koneksi->query("SELECT * FROM datapelanggan");
							while($array=mysqli_fetch_assoc($ambil)){
							?>
							<div class="row">
								<div class="col-md-12">
									<h3>Alamat Pengiriman Barang</h3>
										<label for="fname"><i class="fa fa-user"></i> Nama Lengkap :</label>
										<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama']; ?>" class="form-control bg-secondary text-light">
										<label for="email"><i class="fa fa-envelope"></i> Email :</label>
										<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['email']; ?>" class="form-control bg-secondary text-light">
										<label for="adr"><i class="fa fa-address-card-o"></i> Alamat(Harus di isi) :</label>
										<?php if ($pelanggan2!=$array['id_pelanggan']): ?>
											<input type="text" id="adr" name="alamat" placeholder="Jl. xxxxx, No xxx,"required class="text-dark">
										<?php else : ?>
											<input type="text" readonly value="<?php echo $array['alamat']; ?>" class="form-control bg-secondary text-light">
										<?php endif ?>
								</div>
									<div class="col-md-6">
										<label for="state">No HP (Harus di isi) :</label>
										<?php if ($pelanggan2!=$array['id_pelanggan']): ?>
											<input type="text" id="noHp" name="nohp" placeholder="08xxxxxxxxxxxx" required class="text-dark">
										<?php else : ?>
											<input type="text" readonly value="<?php echo $array['hp']; ?>" class="form-control bg-secondary text-light">
										<?php endif ?>
										<label for="zip">Kode Pos (Harus di isi) :</label>
										<?php if ($pelanggan2!=$array['id_pelanggan']): ?>
											<input type="text" id="kPos" name="kPos" placeholder="xxxxxx" required class="text-dark">
										<?php else : ?>
											<input type="text" readonly value="<?php echo $array['kodepos']; ?>" class="form-control bg-secondary text-light">
										<?php endif ?>
										<label for="ongkir">Ongkos Kirim :</label>
										<input type="text" id="kPos" name="ongkir" value="<?php echo number_format($ongkir);?> " class="form-control bg-secondary text-light">
									</div>
								</div>
								<?php } ?>
							
						<input type="submit" value="Konfirmasi" name="konfirmasi" class="btn btn-primary">
						<a href="hapuskeranjang.php"><button type="button" class="btn btn-danger">Batal</button></a>
					</form>
				</div>
				<?php 
				if (isset($_POST["konfirmasi"])) {
					
					$idpelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
					$tanggal=date("Y-m-d");
					$totalpembelian=$totalbelanja+$ongkir;
					// Menyimpan Data Alamat ke tabel pembelian
					$ambil=$koneksi->query("SELECT * FROM datapelanggan");
					while($array=mysqli_fetch_assoc($ambil)){
						if($_SESSION["pelanggan"]['id']!=$array['id_pelanggan'])
							{
							$koneksi->query("INSERT INTO datapelanggan(id_pelanggan,alamat,hp,kodepos) VALUES ('$idpelanggan','$_POST[alamat]','$_POST[nohp]','$_POST[kPos]' ) ");
							}
					}

					// Menyimpann DATA ke tabel pembelian
					$koneksi->query("INSERT INTO pembelian(id_pelanggan,tanggal,total) VALUES 
						('$idpelanggan','$tanggal','$totalpembelian')");
					// Mendapat id_pembelian
					$id_pembelian_barusan=$koneksi->insert_id;
					foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
					{
						$koneksi->query("INSERT INTO produk_beli (id_pembelian,id_produk,jumlah) VALUES ('$id_pembelian_barusan','$id_produk','$jumlah') ");
					}
					unset($_SESSION["keranjang"]);
					//tampilan dialihkan ke halaman konfirmasi, dari pembelian ini
					echo "<script>alert('pembelian sukses');</script>";
					echo "<script>location='konfirmasi.php?id=$id_pembelian_barusan';</script>";

				}
				 ?>
	</body>
	<br>
	<!--<pre><?php print_r($_SESSION['pelanggan']) ?></pre>
	<pre><?php print_r($_SESSION['keranjang']) ?></pre>-->
	<!--Footer-->
	<footer class="page-footer font-small bg-primary">

		<div class="footer-copyright py-3 text-center">
			<h4>Ini hanya Desain Untuk membuat sebuah Website Saja</h4>	
		</div>
		<!--/.Copyright-->
	</footer>
	
</html>