<?php
$pesanan_id = $_GET['pesanan_id'];

$query = mysqli_query($koneksi, "SELECT status FROM pesanan WHERE pesanan_id=$pesanan_id");
$row = mysqli_fetch_assoc($query);
$status = $row['status'];
?>

<form action="<?= BASE_URL . "module/pesanan/action.php?pesanan_id=$pesanan_id" ?>" method="POST">

  <div class="element-form">
    <label>Pesanan Id (Faktur Id)</label>
    <span><input type="text" name="pesanan_id" value="<?= $pesanan_id ?>" readonly="true" /></span>
  </div>

  <div class="element-form">
    <label>Status</label>
    <span>
      <select name="status">
        <?php
        foreach ($arrayStatusPesanan as $key => $value) {
          if ($status == $key) {
        ?>
            <option value="<?= $key ?>" selected="true"><?= $value ?></option>
          <?php } else { ?>
            <option value="<?= $key ?>"><?= $value ?></option>
          <?php } ?>
        <?php } ?>
      </select>
    </span>
  </div>

  <div class="element-form">
    <span><button type="submit" name="button" value="Edit Status">Edit Status</button></span>
  </div>

</form>