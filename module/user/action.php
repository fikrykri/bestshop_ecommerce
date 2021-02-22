<?php

include_once("../../function/koneksi.php");
include_once("../../function/helper.php");

$user = $_POST['user'];
$level = $_POST['level'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$phone = $_POST['phone'];
$status = $_POST['status'];
$button = $_POST['button'];

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
}


header("location:" . BASE_URL . "index.php?page=my_profile&module=user&action=list");
