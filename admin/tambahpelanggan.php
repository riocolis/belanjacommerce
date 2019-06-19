<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-grup">
		<label>Nama</label>
		<input type="text" class="form-control"name="nama" />
	</div>
	<div class="form-grup">
		<label>Email</label>
		<input type="email" class="form-control" name="email" />
	</div>
	<div class="form-grup">
		<label>Password</label>
		<input type="password" class="form-control" name="password"/>
	</div>
	<hr />
	<button class="btn btn-primary" name='save'>Simpan</button>

</form>
<?php 
if (isset($_POST['save'])) 
{
	$koneksi->query("INSERT INTO pelanggan (nama, email, password) VALUES
		('$_POST[nama]','$_POST[email]','$_POST[password]')");
	echo  "<div class='alert alert-info'>Data Tersimpan</div>";
 	echo  "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
}
 ?>