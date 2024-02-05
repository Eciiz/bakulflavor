<?php
include "proses/connect.php";
?>

<!--Content-->
<div class="col-lg-9 mt-2">
  <div class="card">
    <div class="card-header">
      Home
    </div>
    <div class="card-body">
      <h2 class="card-text">Halo! Selamat datang, <?php echo $hasil['nama']; ?></h2>
      <p class="card-text">Saat ini Anda login sebagai role <?php
              if ($hasil['level'] == 1) {
                echo "Admin";
              } elseif ($hasil['level'] == 2) {
                echo "Kasir";
              } elseif ($hasil['level'] == 3) {
                echo "Pelayan";
              } elseif ($hasil['level'] == 4) {
                echo "Dapur";
              }
              ?>
        </p>
    </div>
  </div>
</div>
<!--End Content-->
