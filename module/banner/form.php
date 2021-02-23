<?php

$banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : false;

$banner = "";
$gambar = "";
$link = "";
$status = "";
$button = "Add";
$keterangan_gambar = "";

if ($banner_id) {
  $query = mysqli_query($koneksi, "SELECT * FROM banner WHERE banner_id='$banner_id'");

  $row = mysqli_fetch_assoc($query);

  $banner = $row['banner'];
  $gambar = $row['gambar'];
  $link = $row['harga'];
  $status = $row['status'];
  $button = "Update";

  $keterangan_gambar = "(Klik pilih gambar jika ingin mengganti gambar disamping)";
  $gambar = "<img src='" . BASE_URL . "images/slide/$gambar' style='width:200px; vertical-align: middle;' />";
}

?>

<form action="<?= BASE_URL . "module/banner/action.php?banner_id=$banner_id" ?>" method="POST" enctype="multipart/form-data">

  <div class="element-form">
    <label>Banner</label>
    <span><input type="text" name="banner" value="<?= $banner ?>" /></span>
  </div>

  <div class="element-form">
    <label>Link</label>
    <span><input type="text" name="link" value="<?= $link ?>" /></span>
  </div>

  <div class="element-form">
    <label>Gambar Produk <?= $keterangan_gambar ?></label>
    <span>
      <input type="file" name="file" /> <?= $gambar; ?>
    </span>
  </div>

  <div class="element-form">
    <label>Status</label>
    <span>
      <input type="radio" name="status" value="on" <?php if ($status == "on") {
                                                      echo "checked='true'";
                                                    } ?> /> On
      <input type="radio" name="status" value="off" <?php if ($status == "off") {
                                                      echo "checked='true'";
                                                    } ?> /> Off
    </span>
  </div>

  <div class="element-form">
    <span><button type="submit" name="button" value="<?= $button ?>"><?= $button ?></button></span>
  </div>

</form>