<div id="kiri">

  <div id="menu-kategori">

    <ul>
      <?php
      $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");

      while ($row = mysqli_fetch_assoc($query)) :
      ?>
        <li><a href="<?= BASE_URL . "index.php?kategori_id=$row[kategori_id]" ?>"><?= $row['kategori'] ?></a></li>
      <?php endwhile ?>
    </ul>

  </div>

</div>
<div id="kanan"></div>