<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "db_bestshop";

$koneksi = mysqli_connect($server, $username, $password, $database) or die("koneksi ke database gagal!");
