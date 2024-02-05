<?php 
include "connect.php";
$id = (isset($_POST['id_usr'])) ? htmlentities($_POST['id_usr']) : "" ;

if(!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($conn, "UPDATE tb_users SET password=md5('password') WHERE id='$id'");
    if($query){
        $message = '<script>alert("Password berhasil direset");
        window.location="../user"</script>';
    }else{
        $message = '<script>alert("Password gagal direset");
        window.location="../user"</script>';
    }
}echo $message;
?>