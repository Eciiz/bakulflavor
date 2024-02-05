<?php
session_start();
include "connect.php";
$id = (isset($_POST['id_usr'])) ? htmlentities($_POST['id_usr']) : "";
$passwordlama = (isset($_POST['passwordlama'])) ? md5(htmlentities($_POST['passwordlama'])) : "";
$passwordbaru = (isset($_POST['passwordbaru'])) ? md5(htmlentities($_POST['passwordbaru'])) : "";
$repasswordbaru = (isset($_POST['repasswordbaru'])) ? md5(htmlentities($_POST['repasswordbaru'])) : "";


if (!empty($_POST['ubah_password_validate'])){
    $query = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$_SESSION [username_bakul]' && password = '$passwordlama'");
    $hasil = mysqli_fetch_array($query);
    if ($hasil) {
        if ($passwordbaru == $repasswordbaru){
            $query = mysqli_query($conn, "UPDATE tb_users SET password='$passwordbaru' WHERE username = '$_SESSION[username_bakul]'");
            if($query) {
                $message = '<script>alert("Password berhasil diubah");
                        window.history.back()</script>';
            }else{
                $message = '<script>alert("Password gagal diubah");
                window.history.back()</script>';
            }
        }else{
            $message = '<script>alert("Password baru tidak sama");
            window.history.back()</script>';
        }
    }else{
        $message = '<script>alert("Password lama tidak sesuai");
        window.history.back()</script>';
    }
}else{
    header('location:../home');
}
echo $message;
?>
