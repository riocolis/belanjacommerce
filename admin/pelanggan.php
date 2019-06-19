<h2>Data Pelanggan </h2>
 <table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>Nama Pelanggan</th>
			<th>E-mail</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$nomor=1; 
		$ambil=$koneksi->query("Select * FROM pelanggan");
		 while($array=mysqli_fetch_assoc($ambil)){ ?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $array['nama']; ?></td>
			<td><?php echo $array['email'];?></td>
			<td>
				<a href="index.php?halaman=hapuspelanggan&id=<?php echo $array['id_pelanggan']; ?>"class="btn btn-danger">Hapus Pelanggan</a>
			</td>
		</tr>
		<?php $nomor++;
		} ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahpelanggan" class="btn btn-primary">Tambah Data Pelanggan</a>