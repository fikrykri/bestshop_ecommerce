<?php

include_once("function/helper.php");

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
          <a href="<?= BASE_URL . "index.php?page=login" ?>">
            Login
          </a>
          <a href="<?= BASE_URL . "index.php?page=register" ?>">
            Register
          </a>
        </div>

        <a href="<?php echo BASE_URL . "index.php?page=keranjang" ?>" id="btn-keranjang">
          <img src="<?php echo BASE_URL . "/images/cart.png" ?>" alt="logo" />
        </a>
      </div>
    </div>

    <div id="content">

    </div>

    <div id="footer">
      <p>Copyright BestShop 2021</p>
    </div>
  </div>

</body>

</html>