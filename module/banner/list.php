<div id="frame-tambah">

  <a href="<?= BASE_URL . "index.php?page=my_profile&module=banner&action=form" ?>" class="tombol-action">+ Tambah banner</a>

</div>
<?php

$query = mysqli_query($koneksi, "SELECT * FROM banner");

if (mysqli_num_rows($query) == 0) {
  echo "<h3>Saat ini beluma ada banner di dalam tabel banner</h3>";
} else {
  echo "<table class='table-list'>";

  echo "<tr class='baris-title'>
            <th class='kolom-nomor'>No</th>
            <th class='kiri'>Banner</th>
            <th class='kiri'>Link</th>
            <th class='tengah'>Status</th>
            <th class='tengah'>Action</th>
          </tr>";

  $no = 1;
  while ($row = mysqli_fetch_assoc($query)) {

    echo "<tr class='baris-data'>
              <td class='kolom-nomor'>$no</td>
              <td class='kiri'>$row[banner]</td>
              <td class='kiri'>$row[link]</td>
              <td class='tengah'>$row[status]</td>
              <td class='tengah'>
                <a href='" . BASE_URL . "index.php?page=my_profile&module=banner&action=form&banner_id=$row[banner_id]' class='tombol-action'>Edit</a>

              </td>
            </tr>";

    $no++;
  }

  echo "</table>";
}

?>