<div id="container-user-akses">

  <form action="<?= BASE_URL . "proses_register.php" ?>" method="POST">

    <div class="element-form">
      <label>Nama Lengkap</label>
      <span><input type="text" name="nama_lengkap" /></span>
    </div>

    <div class="element-form">
      <label>Email</label>
      <span><input type="email" name="email" /></span>
    </div>

    <div class="element-form">
      <label>Nomor Telepon / Phone</label>
      <span><input type="number" name="phone" /></span>
    </div>

    <div class="element-form">
      <label>Alamat</label>
      <span><textarea name="alamat"></textarea></span>
    </div>

    <div class="element-form">
      <label>Password</label>
      <span><input type="password" name="password" /></span>
    </div>

    <div class="element-form">
      <label>Re-type Password</label>
      <span><input type="password" name="re_password" /></span>
    </div>

    <div class="element-form">
      <span><input type="submit" value="Register" /></span>
    </div>

  </form>

</div>