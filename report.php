<?php
include "proses/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tb_order.*,tb_bayar.*,nama, SUM(harga*jumlah) AS harganya FROM tb_order
LEFT JOIN tb_users ON tb_users.id_usr = tb_order.pelayan
LEFT JOIN tb_list_order ON tb_list_order.kode_order = tb_order.id_order
LEFT JOIN tb_menu ON tb_menu.id = tb_list_order.menu
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
GROUP BY id_order ORDER BY waktu_order ASC");
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
}
 
//$select_kat_menu = mysqli_query($conn, "SELECT id_kat_menu,kategori_menu FROM tb_kategori_menu");
?>
<!--Content-->
<div class="col-lg-9 mt-2">
  <div class="card">
    <div class="card-header">
      Halaman Laporan
    </div>
    <div class="card-body">
      <div class="row">

      <?php
      if (empty($result)) {
        echo "Data menu makanan atau minuman tidak ada";
      } else {
        foreach ($result as $row) {
      ?>

        <?php
        }
        ?>
        <div class="table-responsif">
          <table class="table table-hover">
            <thead>
              <tr class="text-nowrap">
                <th scope="col">NO</th>
                <th scope="col">Kode Order</th>
                <th scope="col">Waktu Order</th>
                <th scope="col">Waktu Bayar</th>
                <th scope="col">Pelanggan</th>
                <th scope="col">Meja</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Pelayan</th>
                <!-- <th scope="col">Aksi</th> -->
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($result as $row) {
              ?>
                <tr>
                  <th scope="row"><?php echo $no++ ?></th>
                  <td><?php echo $row['id_order'] ?></td>
                  <td><?php echo $row['waktu_order'] ?></td>
                  <td><?php echo $row['waktu_bayar'] ?></td>
                  <td><?php echo $row['pelanggan'] ?></td>
                  <td><?php echo $row['meja'] ?></td>
                  <td><?php echo number_format((int)$row['harganya'], 0, ',', '.') ?></td>
                  <td><?php echo $row['nama'] ?></td>
                  <!-- <td>
                    <div class="d-flex">
                      <a class="btn btn-info btn-sm me-1" href="./?=view_item & order=<?php echo $row['id_order'] . "&meja=" . $row['meja'] . "&pelanggan=" . $row['pelanggan'] ?>">
                        <i class="bi bi-eye"></i></a>
                    </div>
                  </td> -->
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</div>
<!--End Content-->