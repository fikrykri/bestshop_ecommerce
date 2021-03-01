<div id="frame-tambah">

  <a href="<?= BASE_URL . "index.php?page=my_profile&module=kategori&action=form" ?>" class="tombol-action">+ Tambah Kategori</a>

</div>
<?php

$pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
$data_per_halaman = 3;
$mulai_dari = ($pagination - 1) * $data_per_halaman;

$queryKategory = mysqli_query($koneksi, "SELECT * FROM kategori LIMIT $mulai_dari, $data_per_halaman");

if (mysqli_num_rows($queryKategory) == 0) {
  echo "<h3>Saat ini beluma da nama kategori di dalam tabel kategori</h3>";
} else {
  echo "<table class='table-list'>";

  echo "<tr class='baris-title'>
            <th class='kolom-nomor'>No</th>
            <th class='kiri'>Kategori</th>
            <th class='tengah'>Status</th>
            <th class='tengah'>Action</th>
          </tr>";

  $no = 1;
  while ($row = mysqli_fetch_assoc($queryKategory)) {

    echo "<tr class='baris-data'>
              <td class='kolom-nomor'>$no</td>
              <td class='kiri'>$row[kategori]</td>
              <td class='tengah'>$row[status]</td>
              <td class='tengah'>
                <a href='" . BASE_URL . "index.php?page=my_profile&module=kategori&action=form&kategori_id=$row[kategori_id]' class='tombol-action'>Edit</a>

              </td>
            </tr>";

    $no++;
  }

  echo "</table>";
  $queryHitungKategory = mysqli_query($koneksi, "SELECT * FROM kategori");
  $total_data = mysqli_num_rows($queryHitungKategory);
  $total_halaman = ceil($total_data / $data_per_halaman); // ceil fungsi untuk membulatkan angka keatas

  echo "<ul class='pagination'>";
  for ($i = 1; $i <= $total_halaman; $i++) {
    if ($pagination == $i) {
      echo "<li><a href='" . BASE_URL . "index.php?page=my_profile&module=kategori&action=list&pagination=$i' class='active'>$i</a></li>";
    } else {
      echo "<li><a href='" . BASE_URL . "index.php?page=my_profile&module=kategori&action=list&pagination=$i'>$i</a></li>";
    }
  }
  echo "</ul>";
}

?>