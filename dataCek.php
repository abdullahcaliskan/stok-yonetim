<?php
include('sql_connect.php');
$nerden = $_POST['nerden'];
$nereye = $_POST['nereye'];
$aranan_ifade = $_POST['aranan_ifade'];
$belirtec = $_POST['belirtec'];
if(strlen($aranan_ifade)>=2)
{
    $urun_getir = mysql_query("SELECT * FROM $nerden WHERE $belirtec LIKE '%$aranan_ifade%' and urun_miktari != 0");
    if (mysql_num_rows($urun_getir) != 0) 
    {
          echo "<table width='100%'>";
          echo "<tr class='baslik_sort'>";
          echo "<td width='20%'>Ürün Kodu</td><td width='25%'>Ürün Adı</td><td width='10%'>Ürün Miktarı</td><td width='40%'>Ürün Açıklaması</td><td width='5%'>OK!</td>";
          echo "</tr>";
          $i=0;
          while($oku = mysql_fetch_assoc($urun_getir))
          {
            if($i % 2 == 0)
            {
              $cl = 'tek';
            }
            else
            {
              $cl = 'cift';
            }
            $i++;
             echo "<tr class='liste_sort_".$cl."'>";
            echo "<td>".$oku['urun_kodu']."</td>";
            echo "<td>".$oku['urun_adi']."</td>";
            echo "<td>".$oku['urun_miktari']."</td>";
            echo "<td>".$oku['urun_aciklamasi']."</td>";
            echo "<td><a style='color:#000;text-decoration:underline;' id='".$oku['stok_id']."' class='sec_buton' onclick=urun_cikis(this.id,'".$nerden."','".$nereye."') href='#'>SEÇ</a></td>";
            //onclick=urun_cikis(this.id,'".$nerden."','".$nereye."')
            //href='urun_cikis2.php?stok_id=".$oku['stok_id']."&nerden=".$nerden."&nereye=".$nereye."'
            echo "</tr>";
          }
          echo "</table>";
    }
}
?>