<?php
include('header.php');

include('sidebar.php');
?>

  
  <section id="main" class="column">
  
    <article class="module width_full">
      <header><h3>Ürün Listele</h3></header>
        <div class="module_content">
        
        <form action="urun_gir.php" method="post">
          <table>

              <tr><td>Ürün Kodu</td><td> : <input type="text" name="urun_kodu"></td></tr>
              <tr><td>Ürün Adı</td><td>  : <input type="text" name="urun_adi"></td></tr>
              <tr><td>Ürün Miktarı</td><td> : <input type="text" name="urun_miktari"></td></tr>
              <tr><td>Ürün Açıklama</td><td> : <textarea name="urun_aciklamasi" rows="4" cols="23"></textarea></td></tr>
              <tr><td align='right' colspan='2'><input type="submit" name="kaydet" value="Kaydet"></td></tr>
            </table>
        </form>
    

    <?php
    if (isset($_POST['kaydet'])) {
      $u_kodu = $_POST['urun_kodu'];
      $u_adi = $_POST['urun_adi'];
      $u_miktari = $_POST['urun_miktari'];
      $u_aciklamasi = $_POST['urun_aciklamasi'];

      $urun_listesi = mysql_query("select * from m_depo where urun_kodu='$u_kodu'");

    if(mysql_num_rows($urun_listesi) != 0)
    {
      while($oku = mysql_fetch_assoc($urun_listesi))
      {
        $urun_miktari_in_db = $oku['urun_miktari'];

        $urun_miktari_in_db = $urun_miktari_in_db + $u_miktari; // DB deki ile text boxdaki deger toplanıyor

        //Buldugumuz bu yeni degeri topladaki veri ile güncellicez.

        $guncelle = mysql_query("UPDATE m_depo SET urun_miktari='$urun_miktari_in_db' WHERE urun_kodu='$u_kodu'");

        if ($guncelle) {
          echo "<h4 class='alert_success'>Ürün Miktarı Arttırıldı</h4>";
        }
        else {
        echo "<h4 class='alert_error'>Ürün Eklenemedi (Arttırma Process)</h4>";
        }
      }
        }
        else {
          $urun_ekle = mysql_query("insert into m_depo(urun_kodu,urun_adi,urun_miktari,urun_aciklamasi) values ('$u_kodu','$u_adi','$u_miktari','$u_aciklamasi')");
          if ($urun_ekle) {
            echo "<h4 class='alert_success'>Ürün Başarıyla Eklendi</h4>";
          }
          else {
            echo "<h4 class='alert_error'>Ürün Eklenemedi.</h4>";
          }
        }

      }


     ?>

        </div>
    </article><!-- end of styles article -->
    <div class="spacer"></div>
  </section>

<?php 
include('footer.php');
?>