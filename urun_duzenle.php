<?php
include('header.php');

include('sidebar.php');
?>

  
  <section id="main" class="column">
  
    <article class="module width_full">
      <header><h3>Ürün Düzenle</h3></header>
        <div class="module_content">

          <?php 
          if(empty($_GET['ara']))
          {
          ?>
          <form action="#" method="GET" name="ara">
            <table>
              <tr>
                <td>Ürün Kodu</td>
                <td><input type="text" name="urun_kodu"/></td>
              </tr>
              <tr>
                <td>Ürün Adı</td>
                <td><input type="text" name="urun_adi"/></td>
              </tr>
              <tr>
                <td colspan='2'>NOT: 2 Alandan en az birisi dolu olmalıdır.</td>
              </tr>
              <tr>
                <td colspan='2'><input type="submit" name="ara" value="Listele"/></td>
              </tr>
            </table>
          </form>
          <?php 
        }
        else
        {
          if(empty($_GET['urun_adi']))
          {
            if(empty($_GET['urun_kodu']))
            {
              echo "Alanları Doldurunuz.";
              $stat = 1;
            }
            else
            {
              $urun_kodu = $_GET['urun_kodu'];
              $srg_arama = mysql_query("SELECT * FROM m_depo WHERE urun_kodu = '$urun_kodu'");
            }
          }
          else if(empty($_GET['urun_kodu']))
          {
            $urun_adi = $_GET['urun_adi'];
            $srg_arama = mysql_query("SELECT * FROM m_depo WHERE urun_adi LIKE '%$urun_adi%'");
          }
          else
          {
            $urun_adi = $_GET['urun_adi'];
            $urun_kodu = $_GET['urun_kodu'];
            $srg_arama = mysql_query("SELECT * FROM m_depo WHERE urun_adi LIKE '%$urun_adi%' and urun_kodu = '$urun_kodu'");
          }
          if($stat != 1)
          {

            $sayfada = 40; // sayfada gösterilecek içerik miktarını belirtiyoruz.
  
            $sonuc = mysql_num_rows($srg_arama);
            $toplam_icerik = $sonuc;
             
            $toplam_sayfa = ceil($toplam_icerik / $sayfada);

            if(empty($_GET['sayfa']))
              $sayfa = 1;
            else
              $sayfa = $_GET['sayfa'];
            $suan_get = "?urun_kodu=".$urun_kodu."&urun_adi=".$urun_adi."&ara=Listele";
            $limit = ($sayfa - 1) * $sayfada;

            echo "<table width='100%'>";
            echo "<tr class='baslik_sort'>";
            echo "<td width='20%'>Ürün Kodu</td><td width='25%'>Ürün Adı</td><td width='10%'>Ürün Miktarı</td><td width='40%'>Ürün Açıklaması</td><td width='5%'>İşlem</td>";
            echo "</tr>";

            /*
    --------------- LISTELEME SORGULARI (LIMIT VAR) *************************

            */

          if(empty($_GET['urun_adi']))
          {
            if(empty($_GET['urun_kodu']))
            {
              echo "Alanları Doldurunuz.";
              $stat = 1;
            }
            else
            {
              $urun_kodu = $_GET['urun_kodu'];
              $srg_arama = mysql_query("SELECT * FROM m_depo WHERE urun_kodu = '$urun_kodu' LIMIT $limit,$sayfada");
            }
          }
          else if(empty($_GET['urun_kodu']))
          {
            $urun_adi = $_GET['urun_adi'];
            $srg_arama = mysql_query("SELECT * FROM m_depo WHERE urun_adi LIKE '%$urun_adi%' LIMIT $limit,$sayfada");
          }
          else
          {
            $urun_adi = $_GET['urun_adi'];
            $urun_kodu = $_GET['urun_kodu'];
            $srg_arama = mysql_query("SELECT * FROM m_depo WHERE urun_adi LIKE '%$urun_adi%' and urun_kodu = '$urun_kodu' LIMIT $limit,$sayfada");
          }

            $i = 0;
            while($oku = mysql_fetch_assoc($srg_arama))
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
              echo "<td><a href='urun_duzenle2.php?stok_id=".$oku['stok_id']."'>DUZENLE</a></td>";
              echo "</tr>";
            }
            echo "<table border='0'>";
                  echo "<tr>";
                  for($j = 1; $j <= $toplam_sayfa; $j++) {
                           
                              echo "<td class='sayfalama_bg'><a href='".$suan_get."sayfa=".$j."'>".$j."</a></td> ";
                           
                      }
                      echo "</tr></table>";
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