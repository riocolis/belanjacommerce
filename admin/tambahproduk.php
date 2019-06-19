<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-grup">
		<label>nama</label>
		<input type="text" class="form-control"name="nama" />
	</div>
	<div class="form-grup">
		<label>Jenis</label>
		<input type="text" class="form-control" name="jenis" />
	</div>
	<div class="form-grup">
		<label>Harga</label>
		<input type="number" class="form-control" name="harga"/>
	</div>
	<div class="form-grup">
		<label>Gambar</label>
		<input type="file" class="form-control" name="gambar" />
	</div>
	<hr />
	<button class="btn btn-primary" name='save'>Simpan</button>

</form>
<?php 
if (isset($_POST['save'])) 
{
	$nama=$_FILES['gambar']['name'];
	$lokasi=$_FILES['gambar']['tmp_name'];
	move_uploaded_file($lokasi, "../admin/gambar/".$nama);
	$koneksi->query("INSERT INTO produk (gambar, nama, jenis, harga) VALUES
		('$nama','$_POST[nama]','$_POST[jenis]','$_POST[harga]')");
	echo  "<div class='alert alert-info'>Data Tersimpan</div>";
 	echo  "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
 ?>