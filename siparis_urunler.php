<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Stok Takip</title>
    <?php include 'sql_connect.php'; ?>
  </head>
  <body>
    <a href="main.php">Anasayfa</a>
    <?php
      $sorgu = mysql_query("select urun_adi, urun_miktari from m_depo union all select urun_adi, urun_miktari from a_depo union all select urun_adi, urun_miktari from arac_1 union all select urun_adi, urun_miktari from arac_2 union all select urun_adi, urun_miktari from arac_3 ");
      echo "<table border='1px' >";
      echo "<tr>";
      echo "<td>Ürün Adı</td><td>Ürün Miktarı</td>";
      echo "</tr>";
    while ($kayit = mysql_fetch_assoc($sorgu)) {
      if ($kayit['urun_miktari'] <= 0)
      {
        echo "<tr><td>";
        echo $kayit['urun_adi']."</td><td>".$kayit['urun_miktari'];
        echo "</td></tr>";
      }
    }
        echo "</table>";
     ?>
  </body>
</html>
