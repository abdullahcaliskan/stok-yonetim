<?php
include('header.php');

include('sidebar.php');
?>

  
  <section id="main" class="column">
  
    <article class="module width_full">
      <header><h3>Merkez Depoya Teslim Al</h3></header>
        <div class="module_content">
           
        <?php

          $sayfada = 40; // Bir sayfada kaç satır göstereyim.??
          if(empty($_GET['sayfa']))
          {
            $s=1;
          }
          else
          {
            $s=$_GET['sayfa'];
          }
          
          $a_konum = $_GET['arama_konumu'];
          echo "<p id='gizli_yazi' class='gizli_yazi'>".$a_konum."</p>";

          $srg_arama = mysql_query("select * from $a_konum WHERE urun_miktari != 0");
          $toplam_satir = mysql_num_rows($srg_arama);
          $toplam_sayfa = ceil($toplam_satir/$sayfada); // Toplam satırı, bir sayfada kaç tane olucak ifadeye bölüp üste yuvarlıyorum
          $limit = ($s-1)*$sayfada;
          $suan_get = "?arama_konumu=".$a_konum;
          if(mysql_num_rows($srg_arama) == 0)
          {
            echo "<h4 class='alert_warning'>Depoda Malzeme Yok</h4>";
          }

          else
          {
                $srg_arama = mysql_query("select * from $a_konum WHERE urun_miktari != 0 LIMIT $limit,$sayfada");
                $i=0;
                echo "<table width='100%'>";
                    echo "<tr class='baslik_sort'>";
                    echo "<td width='15%'>Ürün Kodu</td><td width='22%'>Ürün Adı</td><td width='10%'>Ürün Miktarı</td><td width='35%'>Ürün Açıklaması</td><td width='8%'>Düşülecek Miktar</td><td width='7%'>GERİ AL</td><td width='3%'>SİL</td>";
                    echo "</tr>";
                while($oku=mysql_fetch_assoc($srg_arama))
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
                        $stok_id = $oku['stok_id'];
                         echo "<tr id='".$stok_id."' class='liste_sort_".$cl."'>";
                         echo "<td id='urun_kodu".$stok_id."'>".$oku['urun_kodu']."</td>";
                         echo "<td>".$oku['urun_adi']."</td>";
                         echo "<td style='text-align:center;'>".$oku['urun_miktari']."</td>";
                         echo "<td>".$oku['urun_aciklamasi']."</td>";
                         echo "<td><input type='text' class='textbox_width' id='dusulecek_adet".$stok_id."' value='1'/></td>";
                         echo "<td width='4%'><a href='#' id='".$stok_id."' onclick=geriAl(this.id)>GERİ AL</a></td>";
                         echo "<td width='3%'><a href='#' id='".$stok_id."' onclick=sil(this.id)>SİL</a></td>";
                         echo "</tr>"; 
                }
                echo "</table><br>";

                echo "<table border='0'>";
                echo "<tr>";
                for($j = 1; $j <= $toplam_sayfa; $j++) {
                         
                            echo "<td class='sayfalama_bg'><a class='yazi_siyah' href='".$suan_get."&sayfa=".$j."'>".$j."</a></td> ";
                         
                    }
                    echo "</tr></table>";
          }


        //SELECT ÖĞRENCİLER.NUMARA, ÖĞRENCİLER.ADI, ÖĞRENCİLER.SOYADI,
        //BÖLÜMLER.[BÖLÜM KODU], BÖLÜMLER.[BÖLÜM ADI]
        //FROM ÖĞRENCİLER, BÖLÜMLER
        //WHERE ÖĞRENCİLER.BÖLÜM = BÖLÜMLER.[BÖLÜM KODU]
        ?>
    </article><!-- end of styles article -->
    <div class="spacer"></div>
  </section>

<?php 
include('footer.php');
?>
