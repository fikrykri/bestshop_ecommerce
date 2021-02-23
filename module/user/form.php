<?php

$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : false;

$user = "";
$level = "";
$alamat = "";
$email = "";
$phone = "";
$status = "";
$button = "Add";

if ($user_id) {
  $query = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");

  $row = mysqli_fetch_assoc($query);

  $user = $row['nama'];
  $level = $row['level'];
  $alamat = $row['alamat'];
  $email = $row['email'];
  $phone = $row['phone'];
  $status = $row['status'];
  $button = "Update";
}

?>
<script src="<?= BASE_URL . "js/ckeditor/ckeditor.js" ?>"></script>
<form action="<?= BASE_URL . "module/user/action.php?user_id=$user_id" ?>" method="POST">

  <div class="element-form">
    <label>User</label>
    <span><input type="text" name="user" value="<?= $user ?>" /></span>
  </div>

  <div class="element-form">
    <label>Level</label>
    <span><input type="text" name="level" value="<?= $level ?>" /></span>
  </div>

  <div class="element-form">
    <label>Email</label>
    <span><input type="email" name="email" value="<?= $email ?>" /></span>
  </div>

  <div style="margin-bottom: 15px; font-size: 15px;">
    <label><b>Alamat</b></label>
    <span>
      <textarea name="alamat" id="editor"><?= $alamat ?></textarea>
    </span>
  </div>

  <div class="element-form">
    <label>Phone</label>
    <span><input type="number" name="phone" value="<?= $phone ?>" /></span>
  </div>

  <div class="element-form">
    <label>Level</label>
    <span>
      <input type="radio" name="level" value="superadmin" <?php if ($level == "superadmin") {
                                                            echo "checked='true'";
                                                          } ?> /> Superadmin
      <input type="radio" name="level" value="customer" <?php if ($level == "customer") {
                                                          echo "checked='true'";
                                                        } ?> /> Customer
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

<script>
  CKEDITOR.replace("editor");
</script>