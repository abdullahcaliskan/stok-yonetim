<?php
include('header.php');

include('sidebar.php');
?>

  
  <section id="main" class="column">
  
    <article class="module width_full">
      <header><h3>Ürün Düzenle</h3></header>
        <div class="module_content">
          <?php 
          if(empty($_GET['guncelle']))
          {
            $stok_id = $_GET['stok_id'];
            $cek_srg = mysql_query("SELECT * FROM m_depo WHERE stok_id = '$stok_id'");
            while($oku = mysql_fetch_array($cek_srg))
            {
              $urun_kodu = $oku['urun_kodu'];
              $urun_adi = $oku['urun_adi'];
              $urun_miktari = $oku['urun_miktari'];
              $urun_aciklamasi = $oku['urun_aciklamasi'];
            }
            ?>
            <form method="GET" action="urun_duzenle2.php" name='guncelle'>
              <table>
              <tr style='display:none'>
                <td colspan='2'><input type='text' name='id' value='<?php echo $stok_id ?>'/></td>
              </tr> 
                <tr>
                  <td>Ürün Kodu</td>
                  <td><input type='text' name='urun_kodu' value='<?php echo $urun_kodu; ?>'/></td>
                </tr>
                <tr>
                  <td>Ürün Adı</td>
                  <td><input type='text' name='urun_adi' value='<?php echo $urun_adi; ?>'/></td>
                </tr>
                <tr>
                  <td>Ürün Miktarı</td>
                  <td><input type='text' name='urun_miktari' value='<?php echo $urun_miktari; ?>'/></td>
                </tr>
                <tr>
                  <td>Ürün Açıklaması</td>
                  <td><textarea rows="6" cols="50" name='urun_aciklamasi'><?php echo $urun_aciklamasi; ?></textarea></td>
                </tr>
                <tr>
                  <td colspan='2'><input type='submit' name='guncelle' value='Güncelle'/></td>
                </tr>
              </table>
            </form>
            <?php } 
            else
            {
              $id = $_GET['id'];
              $urun_kodu = $_GET['urun_kodu'];
              $urun_adi = $_GET['urun_adi'];
              $urun_miktari = $_GET['urun_miktari'];
              $urun_aciklamasi = $_GET['urun_aciklamasi'];
              $guncellestir = mysql_query("UPDATE m_depo SET urun_kodu = '$urun_kodu', urun_adi = '$urun_adi', urun_miktari = '$urun_miktari', urun_aciklamasi = '$urun_aciklamasi' WHERE stok_id = '$id'");
              
              if($guncellestir)
              {
                echo "<script>";
                echo "alert('Başarılı..');";
                echo "window.location.href = 'default.php';";
                echo "</script>"; 
              }
              else
                echo "Hata. Sistem Yöneticinize başvurun.";
            }
            ?>
        </div>
    </article><!-- end of styles article -->
    <div class="spacer"></div>
  </section>

<?php 
include('footer.php');
?>