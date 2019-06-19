 <h2>Data Pembelian</h2>
 <table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal</th>
			<th>Total</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$nomor=1; 
		$ambil=$koneksi->query("Select * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan");
		 while($array=mysqli_fetch_assoc($ambil)){ ?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $array['nama']; ?></td>
			<td><?php echo $array['tanggal'];?></td>
			<td><?php echo $array['total']; ?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $array['id_pembelian']?>"class="btn btn-primary">Detail</a>
			</td>
		</tr>
		<?php $nomor++;
		} ?>
	</tbody>
</table>