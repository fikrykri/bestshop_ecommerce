<?php

include_once("../../function/koneksi.php");
include_once("../../function/helper.php");

$button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";

$user = isset($_POST['user']) ? $_POST['user'] : false;
$level = isset($_POST['level']) ? $_POST['level'] : false;
$email = isset($_POST['email']) ? $_POST['email'] : false;
$alamat = isset($_POST['alamat']) ? $_POST['alamat'] : false;
$phone = isset($_POST['phone']) ? $_POST['phone'] : false;
$status = isset($_POST['status']) ? $_POST['status'] : false;

if ($button == "Add") {
  mysqli_query($koneksi, "INSERT INTO user (nama, level, email, phone, alamat, status) VALUES ('$user', '$level','$email', '$phone', '$alamat', '$status')");
} else if ($button == "Update") {
  $user_id = $_GET['user_id'];

  mysqli_query($koneksi, "UPDATE user SET nama = '$user', 
                                          level = '$level',
                                          email = '$email',
                                          phone = '$phone',
                                          alamat = '$alamat',
                                          status ='$status' WHERE user_id = '$user_id'");
} else if ($button == "Delete") {
  mysqli_query($koneksi, "DELETE FROM user WHERE user_id=$user_id");
}


header("location:" . BASE_URL . "index.php?page=my_profile&module=user&action=list");
