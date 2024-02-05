<?php
include "connect.php";
$id = (isset($_POST['id_usr'])) ? htmlentities($_POST['id_usr']) : "";

if (!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_users WHERE id = '$id'");
    if ($query) {
        $message = '<script>alert("Data berhasil dihapus");
                        window.location="../user"</script>';
    } else {
        $message = '<script>alert("Data gagal dihapus")</script>';
    }
}
echo $message;
