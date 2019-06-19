<?php
	session_start();
	include'koneksi.php';
	$id_produk=$_GET['id'];

	/// Jika Keranjang produk sudah di tambahkan maka produknya +1
	if (isset($_SESSION['keranjang'][$id_produk])) 
	{
		$_SESSION['keranjang'][$id_produk]+=1;
	}
	/// blm ada produk didalam keranjang maka di beli 1
	else
	{
		$_SESSION['keranjang'][$id_produk]=1;
	}
    //	echo "<pre>";
	//print_r($_SESSION);
	//echo "</pre>";

	echo "<script>alert('produk masuk ke keranjang ');</script>";
	echo "<script>location='keranjang.php';</script>";
 ?>