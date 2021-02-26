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