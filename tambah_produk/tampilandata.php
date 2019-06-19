<html>
<head>
  <title>Tampilan Produk</title>
</head>
<body>
  <h1>Data Produk</h1>
  <a href="tambah_produk.html">Tambah Data</a><br><br>
  <table border="1" width="100%">
  <tr>
    <th>id</th>
    <th>Foto</th>
    <th>Nama</th>
    <th>Jenis</th>
    <th>Harga</th>
    <th>Aksi</th>
  </tr>
  <?php
  // Load file koneksi.php
  include "koneksi.php";
  
  $query = "SELECT * FROM produk"; // Query untuk menampilkan semua data siswa
  $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
  
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
    echo "<td>".$data['id']."</td>";
    echo "<td><img src='images/".$data['gambar']."' width='200' height='200'></td>";
    echo "<td>".$data['nama']."</td>";
    echo "<td>".$data['jenis']."</td>";
    echo "<td>".$data['harga']."</td>";
    echo "<td><a href='proses_hapus.php?id=".$data['id']."'>Hapus</a></td>";
    echo "</tr>";
  }
  ?>
  </table>
</body>
</html>