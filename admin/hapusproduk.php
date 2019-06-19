<?php 

$ambil = $koneksi->query("SELECT * FROM produk WHERE id='$_GET[id]'");
$array = mysqli_fetch_assoc($ambil);
$fotoproduk = $array['gambar'];
if(file_exists("../admin/gambar/$fotoproduk"))
{
	unlink("../admin/gambar/$fotoproduk");
}
$koneksi->query("DELETE FROM produk WHERE id='$_GET[id]'");

echo "<script>alert('produk dihapus');</script>";
echo "<script>location='index.php?halaman=produk';</script>";
 ?>