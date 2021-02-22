<?php

$barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;

// $barang = "";
$harga = "";
$status = "";
$button = "Add";

// if ($barang_id) {
//   $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id'");

//   $row = mysqli_fetch_assoc($query);

//   $barang = $row['barang'];
//   $barang = $row['harga'];
//   $status = $row['status'];
//   $button = "Update";
// }

?>

<form action="<?= BASE_URL . "module/barang/action.php?barang_id=$barang_id" ?>" method="POST">

  <div class="element-form">
    <label>Kategori</label>
    <span>
      <select name="kategori_id" id="">
        <?php

        $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");
        while ($row = mysqli_fetch_assoc($query)) {
          echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
        }

        ?>
      </select>
    </span>
  </div>

  <div class="element-form">
    <label>Harga</label>
    <span><input type="text" name="harga" value="" /></span>
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