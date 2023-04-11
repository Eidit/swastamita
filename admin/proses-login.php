<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'assets/php/koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM tb_pengguna WHERE username = '$username' AND password = '$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
    $data = mysqli_fetch_assoc($login);
 
    // cek jika user login sebagai admin
    if($data['level']=="Admin"){
 
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "Admin";
        // alihkan ke halaman dashboard admin
        header("location:index.php");
 
    // cek jika user login sebagai pegawai
    }else if($data['level']=="Pemilik"){
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "Pemilik";
        // alihkan ke halaman dashboard pegawai
        header("location:pemilik/halaman_pemilik.php");
 
    // cek jika user login sebagai pengurus
    }else if($data['level']=="Karyawan"){
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "Karyawan";
        // alihkan ke halaman dashboard pengurus
        header("location:halaman_pengurus.php");
 
    }else{
 
        // alihkan ke halaman login kembali
        echo "<script>
            window.location.href = 'login.php?passwordfail';
        </script>";
    }  
}else{
 echo "<script>
            window.location.href = 'login.php?passwordfail';
            alert ('Username atau Password Salah!');
        </script>";
}
 
?>