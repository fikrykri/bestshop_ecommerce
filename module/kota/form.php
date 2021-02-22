<?php

$kota_id = isset($_GET['kota_id']) ? $_GET['kota_id'] : false;

$kota = "";
$tarif = "";
$status = "";
$button = "Add";

if ($kota_id) {
  $query = mysqli_query($koneksi, "SELECT * FROM kota WHERE kota_id='$kota_id'");

  $row = mysqli_fetch_assoc($query);

  $kota = $row['kota'];
  $tarif = $row['tarif'];
  $status = $row['status'];
  $button = "Update";
}

?>

<form action="<?= BASE_URL . "module/kota/action.php?kota_id=$kota_id" ?>" method="POST">

  <div class="element-form">
    <label>Kota</label>
    <span><input type="text" name="kota" value="<?= $kota ?>" /></span>
  </div>

  <div class="element-form">
    <label>Tarif</label>
    <span><input type="number" name="tarif" value="<?= $tarif ?>" /></span>
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