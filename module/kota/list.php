<div id="frame-tambah">

  <a href="<?= BASE_URL . "index.php?page=my_profile&module=kota&action=form" ?>" class="tombol-action">+ Tambah Kota</a>

</div>
<?php

$pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
$data_per_halaman = 5;
$mulai_dari = ($pagination - 1) * $data_per_halaman;

$queryKategory = mysqli_query($koneksi, "SELECT * FROM kota LIMIT $mulai_dari, $data_per_halaman");

if (mysqli_num_rows($queryKategory) == 0) {
  echo "<h3>Saat ini beluma da nama kota di dalam tabel kota</h3>";
} else {
  echo "<table class='table-list'>";

  echo "<tr class='baris-title'>
            <th class='kolom-nomor'>No</th>
            <th class='kiri'>Kota</th>
            <th class='tengah'>tarif</th>
            <th class='tengah'>Status</th>
            <th class='tengah'>Action</th>
          </tr>";

  $no = 1;
  while ($row = mysqli_fetch_assoc($queryKategory)) {

    echo "<tr class='baris-data'>
              <td class='kolom-nomor'>$no</td>
              <td class='kiri'>$row[kota]</td>
              <td class='tengah'>" . rupiah($row['tarif']) . "</td>
              <td class='tengah'>$row[status]</td>
              <td class='tengah'>
                <a href='" . BASE_URL . "index.php?page=my_profile&module=kota&action=form&kota_id=$row[kota_id]' class='tombol-action'>Edit</a>

              </td>
            </tr>";

    $no++;
  }

  echo "</table>";
  $queryKota = mysqli_query($koneksi, "SELECT * FROM kota");
  pagination($queryKota, $data_per_halaman, $pagination, "index.php?page=my_profile&module=kota&action=list");
}

?>