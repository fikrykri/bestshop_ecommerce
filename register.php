<div id="container-user-akses">

  <form action="<?= BASE_URL . "proses_register.php" ?>" method="POST">

    <?php
    $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
    $nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
    $email = isset($_GET['email']) ? $_GET['email'] : false;
    $phone = isset($_GET['phone']) ? $_GET['phone'] : false;
    $alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;

    if ($notif == "require") {
      echo "<div class='notif'>Maaf, kamu harus melengkapi form dibawah ini!</div>";
    } else if ($notif == "password") {
      echo "<div class='notif'>Maaf, password yang kamu masukan tidak sama!</div>";
    }

    ?>

    <div class="element-form">
      <label>Nama Lengkap</label>
      <span><input type="text" name="nama_lengkap" value="<?= $nama_lengkap ?>" /></span>
    </div>

    <div class="element-form">
      <label>Email</label>
      <span><input type="email" name="email" value="<?= $email ?>" /></span>
    </div>

    <div class="element-form">
      <label>Nomor Telepon / Phone</label>
      <span><input type="number" name="phone" value="<?= $phone ?>" /></span>
    </div>

    <div class="element-form">
      <label>Alamat</label>
      <span><textarea name="alamat"><?= $alamat ?></textarea></span>
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
      <span><button type="submit">Register</button></span>
    </div>

  </form>

</div>