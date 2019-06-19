<h2>Data Produk</h2><a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Data Produk</a>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>nama</th>
			<th>jenis</th>
			<th>harga</th>
			<th>gambar</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$nomor=1; 
		$ambil=$koneksi->query("Select * FROM produk");
		 while($array=mysqli_fetch_assoc($ambil)){ ?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $array['nama']; ?></td>
			<td><?php echo $array['jenis'];?></td>
			<td><?php echo $array['harga']; ?></td>
			<td>
				<img src="../admin/gambar/<?php echo $array['gambar']; ?>" width="150">
			</td>
			<td>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $array['id']; ?>"class="btn btn-danger">Hapus Produk</a>
				<a href="index.php?halaman=ubahproduk&id=<?php echo $array['id']; ?>"class="btn btn-primary">Ubah</a>
			</td>
		</tr>
		<?php $nomor++;
		} ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Data Produk</a>