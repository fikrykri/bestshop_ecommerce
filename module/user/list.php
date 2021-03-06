<?php
$search = isset($_GET['search']) ? $_GET['search'] : false;

$where = "";
$search_url = "";
if ($search) {
  $search_url = "&search=$search";
  $where = "WHERE nama LIKE '%$search%'";
}
?>

<div id="frame-tambah">

  <div id="left">
    <form action="<?= BASE_URL . "index.php" ?>" method="GET">
      <input type="hidden" name="page" value="<?= $_GET['page'] ?>" />
      <input type="hidden" name="module" value="<?= $_GET['module'] ?>" />
      <input type="hidden" name="action" value="<?= $_GET['action'] ?>" />
      <input type="text" name="search" value="<?= $search ?>" />
      <input type="submit" value="Search" />
    </form>
  </div>

  <div id="right">
    <a href="<?= BASE_URL . "index.php?page=my_profile&module=user&action=form" ?>" class="tombol-action">+ Tambah user</a>
  </div>

</div>
<?php

$pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
$data_per_halaman = 5;
$mulai_dari = ($pagination - 1) * $data_per_halaman;

$queryKategory = mysqli_query($koneksi, "SELECT * FROM user $where LIMIT $mulai_dari, $data_per_halaman");

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

  $no = 1 + $mulai_dari;
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
                <a href='" . BASE_URL . "module/user/action.php?button=Delete&user_id=$row[user_id]' class='tombol-action delete'>Delete</a>
              </td>
            </tr>";

    $no++;
  }

  echo "</table>";
  $queryHitungUser = mysqli_query($koneksi, "SELECT * FROM user $where");
  pagination($queryHitungUser, $data_per_halaman, $pagination, "index.php?page=my_profile&module=user&action=list$search_url");
}

?>