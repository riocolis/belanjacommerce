<?php 

$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id='$_GET[id]'");
$array = mysqli_fetch_assoc($ambil);

$koneksi->query("DELETE FROM pelanggan WHERE id='$_GET[id]'");

echo "<script>alert('produk dihapus');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";
 ?>