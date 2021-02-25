<?php
if ($user_id == false) {
  $_SESSION['proses_pesanan'] = true;

  header("location:" . BASE_URL . "index.php?page=login");
  exit;
}
?>

<div id="frame-data-pengiriman">
  <h3 class="label-data-pengiriman">Alamat Pengiriman Barang</h3>
  <div id="frame-form-pengiriman">
    <form action="<?= BASE_URL . "proses_pemesanan.php" ?>" method="POST">

      <div class="element-form">
        <label>Nama Penerima</label>
        <span><input type="text" name="nama_penerima" /></span>
      </div>

      <div class="element-form">
        <label>Nomor Telepon</label>
        <span><input type="number" name="nomor_telepon" /></span>
      </div>

      <div class="element-form">
        <label>Alamat Pengiriman</label>
        <span><textarea name="alamat"></textarea></span>
      </div>

      <div class="element-form">
        <label>Kota</label>
        <span>
          <select name="kota">
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM kota");

            while ($row = mysqli_fetch_assoc($query)) :
            ?>
              <option value="<?= $row['kota_id'] ?>"><?= $row['kota'] ?> (<?= rupiah($row['tarif']) ?>)</option>
            <?php endwhile ?>
          </select>
        </span>
      </div>

      <div class="element-form">
        <span><button type="submit">Submit</button></span>
      </div>

    </form>
  </div>
</div>

<div id="frame-data-detail">
  <h3 class="label-data-pengiriman">Detail Order</h3>

  <div id="frame-detail-order">
    <table class="table-list">
      <tr>
        <th class="kiri">Nama Barang</th>
        <th class="tengah">Qty</th>
        <th class="kanan">Total</th>
      </tr>

      <?php
      $subtotal = 0;
      foreach ($keranjang as $key => $value) {
        $barang_id = $key;
        $nama_barang = $value['nama_barang'];
        $harga = $value['harga'];
        $quantity = $value['quantity'];

        $total = $quantity * $harga;
        $subtotal = $subtotal + $total;

      ?>
        <tr>
          <td class="kiri"><?= $nama_barang ?></td>
          <td class="kanan"><?= $quantity ?></td>
          <td class="tengah"><?= rupiah($total) ?></td>
        </tr>
      <?php } ?>
      <tr>
        <td colspan="2" class="kanan"><b>Sub Total</b></td>
        <td class="kanan"><b><?= rupiah($subtotal) ?></b></td>
      </tr>

    </table>
  </div>

</div>