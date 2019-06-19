<?php
if (isset($_POST['username']) && $_POST['username']) {
    // koneksi ke database
    require_once 'koneksi.php';
    // menyimpan variable yang dikirim register.php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    // cek variable
    if (empty($username)) {
        header('location: registrasi.php?error=' .base64_encode('Username tidak boleh kosong'));  
    }
    else if (empty($email)) {
        header('location: registrasi.php?error=' .base64_encode('E-mail tidak boleh kosong'));
    }
    else if (empty($password)) {
        header('location: registrasi.php?error=' .base64_encode('Password tidak boleh kosong'));  
    }
    else if (empty($repassword)) {
        header('location: registrasi.php?error=' .base64_encode('Password kedua tidak boleh kosong'));  
    } 
    else if ($password != $repassword) { // jika tidak sama
        header('location: registrasi.php?error=' .base64_encode('Password tidak sama'));
    }
    else
    {
        // encryption dengan md5
        $password = md5($password);
   
        // SQL Insert
        $sql = "INSERT INTO admin (username, password, email) VALUES ('$username', '$password', '$email')";
        $insert = $koneksi->query($sql);
        // jika gagal
        if (! $insert) {
            echo "<script>alert('".$connection->error."'); window.location.href = 'register.php';</script>";
        } 
        else {
        echo "<script>alert('Insert Data Berhasil'); 
        window.location.href = 'index.html';</script>";
        }  
    }
}
else
{
    echo"database error";
}
?>