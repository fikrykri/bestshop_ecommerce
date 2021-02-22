<div id="frame-tambah">

  <a href="<?= BASE_URL . "index.php?page=my_profile&module=barang&action=form" ?>" class="tombol-action">+ Tambah barang</a>

</div>
<?php

$query = mysqli_query($koneksi, "SELECT * FROM barang");

if (mysqli_num_rows($query) == 0) {
  echo "<h3>Saat ini beluma ada barang di dalam tabel barang</h3>";
} else {
  echo "<table class='table-list'>";

  echo "<tr class='baris-title'>
            <th class='kolom-nomor'>No</th>
            <th class='kiri'>Barang</th>
            <th class='kiri'>Harga</th>
            <th class='tengah'>Status</th>
            <th class='tengah'>Action</th>
          </tr>";

  $no = 1;
  while ($row = mysqli_fetch_assoc($query)) {

    echo "<tr class='baris-data'>
              <td class='kolom-nomor'>$no</td>
              <td class='kiri'>$row[barang]</td>
              <td class='kiri'>$row[harga]</td>
              <td class='tengah'>$row[status]</td>
              <td class='tengah'>
                <a href='" . BASE_URL . "index.php?page=my_profile&module=barang&action=form&barang_id=$row[barang_id]' class='tombol-action'>Edit</a>

              </td>
            </tr>";

    $no++;
  }

  echo "</table>";
}

?>