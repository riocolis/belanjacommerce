<h2>Detail Pembelian</h2>
<?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'"); 
	$detail=mysqli_fetch_assoc($ambil);
	$ongkir=50000;
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
			<th>Nama Produk</th>
			<th>Gambar Produk</th>
			<th>Harga</th>
			<th>jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$nomor=1; 
		$total=0;
		$ambil=$koneksi->query("SELECT * FROM produk_beli JOIN produk ON produk_beli.id_produk=produk.id WHERE produk_beli.id_pembelian='$_GET[id]'");
		while($array=mysqli_fetch_assoc($ambil)){?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $array['nama']; ?></td>
			<td><img src="../admin/gambar/<?php echo $array['gambar']; ?>" width="150"></td>
			<td>Rp.<?php echo number_format($array['harga']);?></td>
			<td><?php echo $array['jumlah']; ?></td>
			<td>
				Rp.<?php echo number_format($array['harga']*$array['jumlah']);?>
			</td>
		</tr>
		<?php $nomor++;
		$total+=$array['harga']*$array['jumlah'];
		} ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="5">Ongkir</th>
			<td>Rp. <?php echo number_format($ongkir) ?></td>
		</tr>
		<tr>
			<th colspan="5">Total</th>
			<td>Rp.<?php echo number_format($total) ?></td>
		</tr>
	</tfoot>
</table>
<?php 
		$ambil=$koneksi->query("SELECT * FROM produk_beli JOIN konfirmasi ON produk_beli.id_pembelian=konfirmasi.id_pembelian WHERE produk_beli.id_pembelian='$_GET[id]'"); 
		$array=mysqli_fetch_assoc($ambil); 
	if($array['id_pembelian']!=$_GET['id']) 
	{?>
		<h3 class="text-danger">PEMBELI BELUM TRANSFER</h3>
	<?php
	}
	else
	{?>
		<br><br><br><br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nama Bank</th>
					<th>Nama Rekening</th>
					<th>No Rekening</th>
					<th>Gambar</th>
					<th>Nominal</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $array['nama_bank']; ?></td>
					<td><?php echo $array['nama_rek']; ?></td>
					<td><?php echo $array['no_rek']; ?></td>
					<td><img src="../admin/bank/<?php echo $array['gambar_rek']; ?>" width="150"></td>
					<td>Rp.<?php echo number_format($array['nominal']); ?></td>
				</tr>
			</tbody>
		</table>
	<?php } ?>