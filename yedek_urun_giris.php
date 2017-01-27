<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Stok Takip</title>
  </head>
  <body>
    <form action="m_depo_giris.php" method="post">
      Ürün kodu:
      <input type="text" name="urun_kodu"><br><br>
      Ürün adı:
      <input type="text" name="urun_adi"><br><br>
      Ürün miktarı:
      <input type="text" name="urun_miktari"><br><br>
      Ürün açıklaması:
      <input type="textarea" name="urun_aciklamasi" rows="5" cols="50"/><br><br>
      <input type="submit" name="gonder">
    </form>

<?php
include 'sql_connect.php';
if(isset($_POST['gonder']))
{
  $u_kod = $_POST['urun_kodu'];
  $u_adi = $_POST['urun_adi'];
  $u_miktari = $_POST['urun_miktari'];
  $u_aciklamasi = $_POST['urun_aciklamasi'];

  $sorgu = mysql_query("insert into m_depo(urun_kodu,urun_adi,urun_miktari,urun_aciklamasi) values('$u_kod','$u_adi','$u_miktari','$u_aciklamasi')");
  if ($sorgu) {
    echo "Kayıt başarıyla yapıldı.";
  }
  else {
    echo "Kayıt başarısız";
  }

}
else {
  echo "Birşeyler ters gitti!";
}

 ?>

  </body>
</html>
