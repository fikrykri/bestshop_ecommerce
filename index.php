<?php

session_start();

include_once("function/helper.php");
include_once("function/koneksi.php");

// code dibawah merupakan pengecekan menggunakan isset
$page = isset($_GET['page']) ? $_GET['page'] : false;
$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

// session untuk login user
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
// session untuk keranjang
$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
$total_barang = count($keranjang);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BestShop | Ecommerce</title>

  <link rel="stylesheet" href="<?= BASE_URL . "css/banner.css" ?>" type="text/css">
  <link rel="stylesheet" href="<?= BASE_URL . "css/style.css" ?>" type="text/css">
  <script src="<?= BASE_URL . "js/jquery.min.js" ?>"></script>
  <script src="<?= BASE_URL . "js/slidesjs/source/jquery.slides.min.js" ?>"></script>

  <script>
    $(function() {
      $('#slides').slidesjs({
        height: 350,
        play: {
          auto: true,
          interval: 3000
        },
        navigation: false
      });
    });
  </script>
</head>

<body>

  <div id="container">
    <div id="header">
      <a href="<?php echo BASE_URL . "index.php" ?>">
        <img src="<?php echo BASE_URL . "/images/logo_bestshop.png" ?>" id="logo" />
      </a>

      <div id="menu">
        <div id="user">
          <?php

          if ($user_id) {
            echo "Hi <b>$nama</b>, 
                      <a href='" . BASE_URL . "index.php?page=my_profile&module=pesanan&action=list'>My Profile</a>
                      <a href='" . BASE_URL . "logout.php'>Logout</a>";
          } else {

            echo "<a href='" . BASE_URL . "login.html'>Login</a> 
                  <a href='" . BASE_URL . "register.html'>Register</a>";
          }

          ?>

        </div>

        <a href="<?php echo BASE_URL . "keranjang.html" ?>" id="btn-keranjang">
          <img src="<?php echo BASE_URL . "/images/cart.png" ?>" alt="logo" />
          <?php if ($total_barang != 0) :
          ?>
            <span class="total-barang"> <?= $total_barang ?></span>
          <?php endif ?>
        </a>
      </div>
    </div>

    <div id="content">

      <?php
      $filename = "$page.php";

      if (file_exists($filename)) {
        include_once($filename);
      } else {
        include_once("main.php");
      }
      ?>

    </div>

    <div id="footer">
      <p>Copyright BestShop 2021</p>
    </div>
  </div>

</body>

</html>