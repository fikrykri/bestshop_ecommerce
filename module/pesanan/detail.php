<?php

$pesanan_id = $_GET['pesanan_id'];

$query = mysqli_query($koneksi, "SELECT pesanan.pesanan_id, 
                                        pesanan.nama_penerima, 
                                        pesanan.nomor_telepon, 
                                        pesanan.alamat, 
                                        pesanan.tanggal_pemesanan, 
                                        user.nama, 
                                        kota.kota, 
                                        kota.tarif 
                                  FROM pesanan JOIN user ON pesanan.user_id = user.user_id 
                                  JOIN kota ON pesanan.kota_id = kota.kota_id 
                                  WHERE pesanan.pesanan_id='$pesanan_id'");


$row = mysqli_fetch_assoc($query);

$tanggal_pemesanan = $row['tanggal_pemesanan'];
$nama_penerima = $row['nama_penerima'];
$nomor_telepon = $row['nomor_telepon'];
$alamat = $row['alamat'];
$tarif = $row['tarif'];
$nama = $row['nama'];
$kota = $row['kota'];

?>

<div id="frame-faktur">
  <h3>
    <center>Detail Pesanan</center>
  </h3>
  <hr>

  <table>
    <tr>
      <td>Nomor Faktur</td>
      <td>:</td>
      <td><?= $pesanan_id ?></td>
    </tr>
    <tr>
      <td>Nama Pemesan</td>
      <td>:</td>
      <td><?= $nama ?></td>
    </tr>
    <tr>
      <td>Nama Penerima</td>
      <td>:</td>
      <td><?= $nama_penerima ?></td>
    </tr>
    <tr>
      <td>Alamat Pengiriman</td>
      <td>:</td>
      <td><?= $alamat ?></td>
    </tr>
    <tr>
      <td>Nomor Telepon</td>
      <td>:</td>
      <td><?= $nomor_telepon ?></td>
    </tr>
    <tr>
      <td>Tanggal Pemesanan</td>
      <td>:</td>
      <td><?= $tanggal_pemesanan ?></td>
    </tr>
  </table>
</div>

<table class="table-list">
  <tr class="baris-title">
    <th class="no">No</th>
    <th class="kiri">Nama Barang</th>
    <th class="tengah">Qty</th>
    <th class="kanan">Harga Satuan</th>
    <th class="kanan">Total</th>
  </tr>


  <?php
  $queryDetail = mysqli_query($koneksi, "SELECT pesanan_detail.*,
                                                barang.nama_barang 
                                          FROM pesanan_detail JOIN barang ON pesanan_detail.barang_id = barang.barang_id WHERE pesanan_detail.pesanan_id=$pesanan_id");
  $no = 1;
  $subtotal = 0;
  while ($rowDetail = mysqli_fetch_assoc($queryDetail)) {
    $harga = $rowDetail['harga'];
    $quantity = $rowDetail['quantity'];
    $total = $harga * $quantity;
    $subtotal = $subtotal + $total
  ?>
    <tr>
      <td class="no"><?= $no++ ?></td>
      <td class="kiri"><?= $rowDetail['nama_barang'] ?></td>
      <td class="tengah"><?= $quantity ?></td>
      <td class="kanan"><?= rupiah($harga) ?></td>
      <td class="kanan"><?= rupiah($total) ?></td>
    </tr>
  <?php }
  $subtotal = $subtotal + $tarif;
  ?>
  <tr>
    <td colspan="4" class="kanan"><b>Biaya Pengiriman</b></td>
    <td class="kanan"><b><?= rupiah($tarif) ?></b></td>
  </tr>
  <tr>
    <td colspan="4" class="kanan"><b>Sub Total</b></td>
    <td class="kanan"><b><?= rupiah($subtotal) ?></b></td>
  </tr>
</table>

<div id="frame-keteragan-pembayaran">
  <p>
    Silahkan Lakukan Pembayaran ke Bang BCA <br>
    Nomor Account : 0000-5555-4444 (A/N BestShop) <br>
    Setelah melakukan pembayaran silahkan lakukan konfirmasi pembayaran
    <a href="<?= BASE_URL . "index.php?page=my_profile&module=pesanan&action=konfirmasi_pembayaran&pesanan_id=$pesanan_id" ?>">Disini</a>
  </p>
</div>