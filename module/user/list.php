<div id="frame-tambah">

  <a href="<?= BASE_URL . "index.php?page=my_profile&module=user&action=form" ?>" class="tombol-action">+ Tambah User</a>

</div>
<?php

$queryKategory = mysqli_query($koneksi, "SELECT * FROM user");

if (mysqli_num_rows($queryKategory) == 0) {
  echo "<h3>Saat ini beluma da nama user di dalam tabel user</h3>";
} else {
  echo "<table class='table-list'>";

  echo "<tr class='baris-title'>
            <th class='kolom-nomor'>No</th>
            <th class='kiri'>User</th>
            <th class='tengah'>Level</th>
            <th class='kiri'>Email</th>
            <th class='kiri'>Alamat</th>
            <th class='tengah'>Phone</th>
            <th class='tengah'>Status</th>
            <th class='tengah'>Action</th>
          </tr>";

  $no = 1;
  while ($row = mysqli_fetch_assoc($queryKategory)) {

    echo "<tr class='baris-data'>
              <td class='kolom-nomor'>$no</td>
              <td class='kiri'>$row[nama]</td>
              <td class='tengah'>$row[level]</td>
              <td class='kiri'>$row[email]</td>
              <td class='kiri'>$row[alamat]</td>
              <td class='tengah'>$row[phone]</td>
              <td class='tengah'>$row[status]</td>
              <td class='tengah'>
                <a href='" . BASE_URL . "index.php?page=my_profile&module=user&action=form&user_id=$row[user_id]' class='tombol-action'>Edit</a>

              </td>
            </tr>";

    $no++;
  }

  echo "</table>";
}

?>