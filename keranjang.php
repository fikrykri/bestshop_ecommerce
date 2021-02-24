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
        <td class="tengah"><input type="text" name="<?= $barang_id ?>" value="<?= $quantity ?>" class="update-quantity" /></td>
        <td class="kanan"><?= rupiah($harga) ?></td>
        <td class="kanan hapus-item"><?= rupiah($total) ?> <a href="<?= BASE_URL . "hapus_item.php?barang_id='$barang_id'" ?>">X</a></td>
      </tr>

    <?php
      $no++;
    } ?>
  </table>

<?php } ?>

<script>
  $(".update-quantity").on("input", function(e) {
    var barang_id = $(this).attr("name");
    var value = $(this).val();

    $.ajax({
        method: "POST",
        url: "update_keranjang.php",
        data: "barang_id=" + barang_id + "&value=" + value
      })
      .done(function(data) {
        var json = $.parseJSON(data);
        if (json.status == true) {
          location.reload();
        } else {
          alert(json.pesan);
          location.reload();
        }
      })
  })
</script>