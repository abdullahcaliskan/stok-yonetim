<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Stok Takip</title>
    <?php include 'sql_connect.php'; ?>
  </head>
  <body>
İşlemler
<li>
  <ul>
    <a href="urun_gir.php">Ürün Gir</a>
  </ul>
  <ul>
    <a href="urun_ara.php">Ürün Ara</a>
  </ul>
  <ul>
    <a href="urun_cikis.php">Ürün Çıkış</a>
  </ul>
  <ul>
    <a href="siparis_urunler.php">Sipariş Geçilecek Ürünler</a>
  </ul>
</li>

<div class=".urun_goruntule" align="left">
  <?php
  $sorgu = mysql_query("select urun_kodu, urun_adi, urun_miktari, urun_aciklamasi from m_depo union all select urun_kodu, urun_adi, urun_miktari, urun_aciklamasi from a_depo union all select urun_kodu, urun_adi, urun_miktari, urun_aciklamasi from arac_1 union all select urun_kodu, urun_adi, urun_miktari, urun_aciklamasi from arac_2 union all select urun_kodu, urun_adi, urun_miktari, urun_aciklamasi from arac_3 ");
  echo "<table border='1px' align=center >";
  echo "<tr>";
  echo "<td>Ürün Sayısı</td><td>Ürün Kodu</td><td>Ürün Adı</td><td>Ürün Miktarı</td><td>Ürün Açıklaması</td>";
  echo "</tr>";
  $i = 0;
  while ($kayit = mysql_fetch_assoc($sorgu)) {
    $i++;
    echo "<tr align=center>";
    echo '<td>'.$i.'</td>';
    echo '<td>'.$kayit["urun_kodu"].'</td>';
    echo '<td>'.$kayit["urun_adi"].'</td>';
    echo '<td>'.$kayit["urun_miktari"].'</td>';
    echo '<td>'.$kayit["urun_aciklamasi"].'</td>';
    echo "</tr>";
  }
  echo "</table>";
   ?>
</div>

  </body>
</html>
