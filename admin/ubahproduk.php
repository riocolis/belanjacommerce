<h2>Ubah Produk</h2>
<?php 
$ambil = $koneksi->query("SELECT * FROM produk WHERE id='$_GET[id]'");
$array = mysqli_fetch_assoc($ambil);

echo "<pre>";
print_r($array);
echo "</pre>"; 
 ?>

 <form method="post" enctype="multipart/form-data">
	<div class="form-grup">
		<label>Nama</label>
		<input type="text" class="form-control"name="nama" value="<?php echo $array['nama']; ?>"/>
	</div>
	<div class="form-grup">
		<label>Jenis</label>
		<input type="text" class="form-control" name="jenis" value="<?php echo $array['jenis']; ?>"/>
	</div>
	<div class="form-grup">
		<label>Harga</label>
		<input type="number" class="form-control" name="harga" value="<?php echo $array['harga']; ?>"/>
	</div>
	<div class="form-grup">
		<img src="../admin/gambar/<?php echo $array['gambar'] ?>" width="200px"/><br />
	</div>
	<div class="form-grup">
		<label>Gambar</label>
		<input type="file" class="form-control" name="gambar"/>
	</div>
	<hr />
	<button class="btn btn-primary" name='ubah'>ubah</button>

</form>
<?php 
if (isset($_POST['ubah'])) 
{
	$namafoto=$_FILES['gambar']['name'];
	$lokasifoto=$_FILES['gambar']['tmp_name'];

	if (!empty($lokasifoto)) {
		move_uploaded_file($lokasifoto, "../admin/gambar/$namafoto");

		$koneksi->query("UPDATE produk SET nama='$_POST[nama]',harga='$_POST[harga]',jenis='$_POST[jenis]', gambar='$namafoto' WHERE id='$_GET[id]'");
	}
	else
	{
		$koneksi->query("UPDATE produk SET nama='$_POST[nama]',harga='$_POST[harga]',jenis='$_POST[jenis]' WHERE id='$_GET[id]'");	
	}
	echo "<script>alert('data produk diubah');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
}

 ?>