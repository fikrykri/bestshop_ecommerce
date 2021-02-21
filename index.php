<?php

session_start();

include_once("function/helper.php");

// code dibawah merupakan pengecekan menggunakan isset
$page = isset($_GET['page']) ? $_GET['page'] : false;

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BestShop | Ecommerce</title>

  <link rel="stylesheet" href="<?= BASE_URL . "css/style.css" ?>" type="text/css" />
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
            echo "Hi <b>$nama</b>, <a href='" . BASE_URL . "index.php?page=my_profile&module=pesanan&action=list'>My Profile</a>";
          } else {

            echo "<a href='" . BASE_URL . "index.php?page=login'>Login</a> 
                  <a href='" . BASE_URL . "index.php?page=register'>Register</a>";
          }

          ?>

        </div>

        <a href="<?php echo BASE_URL . "index.php?page=keranjang" ?>" id="btn-keranjang">
          <img src="<?php echo BASE_URL . "/images/cart.png" ?>" alt="logo" />
        </a>
      </div>
    </div>

    <div id="content">

      <?php
      $filename = "$page.php";

      if (file_exists($filename)) {
        include_once($filename);
      } else {
        echo "Maaf, file tersebut tidak ada didalam sistem!";
      }
      ?>

    </div>

    <div id="footer">
      <p>Copyright BestShop 2021</p>
    </div>
  </div>

</body>

</html>