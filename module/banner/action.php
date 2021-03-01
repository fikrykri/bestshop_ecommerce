<?php

include_once("../../function/koneksi.php");
include_once("../../function/helper.php");

admin_only("banner", $level);

$button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
$banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : "";

$banner = isset($_POST['banner']) ? $_POST['banner'] : false;
$status = isset($_POST['status']) ? $_POST['status'] : false;
$link = isset($_POST['link']) ? $_POST['link'] : false;
$update_gambar = "";

if (!empty($_FILES["file"]["name"])) {
  $nama_file = $_FILES["file"]["name"];
  move_uploaded_file($_FILES["file"]["tmp_name"], "../../images/banner/" . $nama_file);

  $update_gambar = ", gambar='$nama_file'";
}

if ($button == "Add") {
  mysqli_query($koneksi, "INSERT INTO banner (banner, gambar, link, status ) 
                            VALUES ('$banner', '$nama_file', '$link', '$status')");
} else if ($button == "Update") {
  $banner_id = $_GET['banner_id'];

  mysqli_query($koneksi, "UPDATE banner SET banner='$banner', 
                                            link='$link',
                                            status='$status'
                                            $update_gambar WHERE banner_id='$banner_id'");
} else if ($button == "Delete") {
  mysqli_query($koneksi, "DELETE FROM banner WHERE banner_id=$banner_id");
}

header("location:" . BASE_URL . "index.php?page=my_profile&module=banner&action=list");
