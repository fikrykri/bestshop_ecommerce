<?php
$search = isset($_GET['search']) ? $_GET['search'] : false;

$where = "";
$search_url = "";
if ($search) {
  $search_url = "&search=$search";
  $where = "WHERE banner LIKE '%$search%'";
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
    <a href="<?= BASE_URL . "index.php?page=my_profile&module=banner&action=form" ?>" class="tombol-action">+ Tambah banner</a>
  </div>

</div>
<?php
$pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
$data_per_halaman = 5;
$mulai_dari = ($pagination - 1) * $data_per_halaman;

$query = mysqli_query($koneksi, "SELECT * FROM banner $where LIMIT $mulai_dari, $data_per_halaman");

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
                <a href='" . BASE_URL . "module/banner/action.php?button=Delete&banner_id=$row[banner_id]' class='tombol-action delete'>Delete</a>
              </td>
            </tr>";

    $no++;
  }

  echo "</table>";
  $queryHitungBanner = mysqli_query($koneksi, "SELECT * FROM banner $where");
  pagination($queryHitungBanner, $data_per_halaman, $pagination, "index.php?page=my_profile&module=banner&action=list$search_url");
}

?>