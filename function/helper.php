<?php
// code dibawah merupakan konstanta BASE_URL yang isi/ valuenya yang disebelah kanannya
define("BASE_URL", "http://localhost/bestshop_ecommerce/");

function rupiah($nilai = 0)
{
  $string = "Rp." . number_format($nilai);
  return $string;
}
