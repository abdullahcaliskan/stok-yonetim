<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Stok Takip</title>
    <?php
    include('sql_connect.php');
     ?>
  </head>
  <body>

    <form action="urun_gir.php" method="post">
      Ürün kodu:
      <input type="text" name="urun_kodu"><br><br>
      Ürün adı:
      <input type="text" name="urun_adi"><br><br>
      Ürün miktarı:
      <input type="text" name="urun_miktari"><br><br>
      Ürün açıklaması:
      <textarea name="urun_aciklamasi" rows="8" cols="40"></textarea><br><br>
      <select name="kayit_konumu">
        <option value="m_depo">Merkez</option>
        <option value="a_depo">Atölye</option>
        <option value="arac_1">Araç 1</option>
        <option value="arac_2">Araç 2</option>
        <option value="arac_3">Araç 3</option>
      </select><br><br>
      <input type="submit" name="kaydet" value="Kaydet">
    </form>

    <?php


    if (isset($_POST['kaydet'])) {

          $u_kodu = $_POST['urun_kodu'];
          $u_adi = $_POST['urun_adi'];
          $u_miktari = $_POST['urun_miktari'];
          $u_aciklamasi = $_POST['urun_aciklamasi'];
          $k_konumu=$_POST['kayit_konumu'];

          $urun_varmi = mysql_query("select urun_kodu from m_depo, a_depo, arac_1, arac_2, arac_3 where urun_kodu = '$u_kodu'");

          if($urun_varmi == $u_kodu)
          {
            $urun_var = mysql_query("select urun_miktari from m_depo, a_depo, arac_1, arac_2, arac_3 where urun_kodu = '$urun_kodu'");
            $urun_var = $urun_var + $u_miktari;
          }
          else {
            $kayit_sql = mysql_query("insert into $k_konumu(urun_kodu,urun_adi,urun_miktari,urun_aciklamasi) values ('$u_kodu','$u_adi','$u_miktari','$u_aciklamasi')");
            if ($kayit_sql) {
              echo "kayıt başarılı";
            }
          else {
            echo "Kayıt başarısız";
          }
        }
    }
    else {
      echo "veri alamıyom";
    }

     ?>
  </body>
</html>
