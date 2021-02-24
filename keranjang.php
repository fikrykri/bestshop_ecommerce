<?php

if ($total_barang == 0) {
  echo "<h3>Saat ini belum ada data didalam keranjang belanja anda</h3>";
} else {
  $no = 1;
?>

  <table class="table-list">
    <tr class="baris-title">
      <th class="tengah">No</th>
      <th class="kiri">Image</th>
      <th class="kiri">Nama Barang</th>
      <th class="kanan">Qty</th>
      <th class="kanan">Harga Satuan</th>
      <th class="kanan">Total</th>
    </tr>

    <?php foreach ($keranjang as $key => $value) {
      $barang_id = $key;

      $nama_barang = $value['nama_barang'];
      $gambar = $value['gambar'];
      $harga = $value['harga'];
      $quantity = $value['quantity'];

      $total = $quantity * $harga;
    ?>

      <tr>
        <td class="tengah"><?= $no ?></td>
        <td class="kiri"><img src="<?= BASE_URL . "images/barang/$gambar" ?>" height="100px"></td>
        <td class="kiri"><?= $nama_barang ?></td>
        <td class="tengah"><input type="number" name="<?= $barang_id ?>" value="<?= $quantity ?>" class="update-quantity" /></td>
        <td class="kanan"><?= rupiah($harga) ?></td>
        <td class="kanan"><?= rupiah($total) ?></td>
      </tr>

    <?php
      $no++;
    } ?>
  </table>

<?php } ?>