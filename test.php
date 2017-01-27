<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Stok Takip Deneme sayfası</title>
    <?php include 'sql_connect.php'; ?>
  </head>
  <body>
    <?php
    echo "<table border='2px'>";
    echo "<tr>";
    echo "<td>Ürün Adı</td><td>Ürün Miktarı</td>";
    echo "</tr>";
    $sorgu = mysql_query("select urun_adi,urun_miktari from m_depo union all select urun_adi,urun_miktari from a_depo union all select urun_adi,urun_miktari from arac_1 union all select urun_adi,urun_miktari from arac_2 union all select urun_adi,urun_miktari from arac_3");

    $i = 0;

    while ($oku = mysql_fetch_assoc($sorgu)) {
      $i++;
      if ($i<=10) {
        echo "<tr>";
        echo "<td>".$oku['urun_adi']."</td><td>".$oku['urun_miktari']."</td>";
        echo "</tr>";
      }
    }





    echo "</table>";
     ?>
  </body>
</html>
