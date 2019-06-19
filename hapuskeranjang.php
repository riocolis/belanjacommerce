<?php 
session_start();

if ($id=$_GET['id']) 
{
	unset($_SESSION["keranjang"][$id]);	
}
else 
{
	unset($_SESSION["keranjang"]);
}
echo "<script>alert('produk dihapus dr keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
 ?>