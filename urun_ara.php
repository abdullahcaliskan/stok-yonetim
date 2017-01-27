<?php
include('header.php');

include('sidebar.php');
?>

  
  <section id="main" class="column">
  
    <article class="module width_full">
      <header><h3>Ürün Ara</h3></header>
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
          
        if (isset($_GET['ara']))
        {
          $a_konum = $_GET['arama_konumu'];
          $urun_kodu1 = $_GET['urun_kodu'];
          $urun_adi1 = $_GET['urun_adi'];

          if($a_konum == 'e')
          {

            if($urun_adi1 == "" and $urun_kodu1 == "")
            {
                
                $srg_arama = mysql_query("select * from m_depo WHERE urun_miktari != 0 and (urun_kodu =  '$urun_kodu1' or urun_adi LIKE '%$urun_adi1%') union all select * from a_depo WHERE urun_miktari != 0 and (urun_kodu = '$urun_kodu1' or urun_adi LIKE '%$urun_adi1%') union all select * from arac_1 WHERE urun_miktari != 0 and (urun_kodu = '$urun_kodu1' or urun_adi LIKE '%$urun_adi1%') union all select * from arac_2 WHERE urun_miktari != 0 and (urun_kodu = '$urun_kodu1' or urun_adi LIKE '%$urun_adi1%') union all select * from arac_3 WHERE urun_miktari != 0 and (urun_kodu = '$urun_kodu1' or urun_adi LIKE '%$urun_adi1%') ");  
            }
            else
            {
              

              if($urun_adi1 == "")
              {
                
                  $srg_arama = mysql_query("select * from m_depo WHERE urun_miktari != 0 and urun_kodu LIKE '%".$urun_kodu1."%' union all select * from a_depo WHERE urun_miktari != 0 and urun_kodu LIKE '%".$urun_kodu1."%'  union all select * from arac_1 WHERE urun_miktari != 0 and urun_kodu LIKE '%".$urun_kodu1."%' union all select * from arac_2 WHERE urun_miktari != 0 and urun_kodu LIKE '%".$urun_kodu1."%'  union all select * from arac_3 WHERE urun_miktari != 0 and urun_kodu LIKE '%".$urun_kodu1."%'"); 
              }
              else if($urun_kodu1 == "")
              {
                
                  $srg_arama = mysql_query("select * from m_depo WHERE (urun_miktari != 0) and (urun_adi LIKE '%$urun_adi1%') union all select * from a_depo WHERE (urun_miktari != 0) and (urun_adi LIKE '%$urun_adi1%') union all select * from arac_1 WHERE (urun_miktari != 0) and (urun_adi LIKE '%$urun_adi1%') union all select * from arac_2 WHERE (urun_miktari != 0) and (urun_adi LIKE '%$urun_adi1%') union all select * from arac_3 WHERE (urun_miktari != 0) and (urun_adi LIKE '%$urun_adi1%')");
              }
              else
              {
                
                $srg_arama = mysql_query("select * from m_depo WHERE urun_miktari != 0 and urun_kodu LIKE '%$urun_kodu1%' and urun_adi LIKE '%$urun_adi1%' union all select * from a_depo WHERE urun_miktari != 0 and urun_kodu LIKE '%$urun_kodu1%' and urun_adi LIKE '%$urun_adi1%' union all select * from arac_1 WHERE urun_miktari != 0 and urun_kodu LIKE '%$urun_kodu1%' and urun_adi LIKE '%$urun_adi1%'  union all select * from arac_2 WHERE urun_miktari != 0 and urun_kodu LIKE '%$urun_kodu1%' and urun_adi LIKE '%$urun_adi1%'  union all select * from arac_3 WHERE urun_miktari != 0 and urun_kodu LIKE '%$urun_kodu1%' and urun_adi LIKE '%$urun_adi1%' ");  
              }
              
            }

            /*
  - -   - --  ------------------------------------------------------------------------------------------

            KAÇ KAYIT OLDUGUNU BİLMEMİZİ SAĞLAYAN SQL SORGULARI YUKARIDADIR.

            -----------------------------------------------------------------------------------------------
            */
            $toplam_satir = mysql_num_rows($srg_arama);

            $toplam_sayfa = ceil($toplam_satir/$sayfada); // Toplam satırı, bir sayfada kaç tane olucak ifadeye bölüp üste yuvarlıyorum
            $limit = ($s-1)*$sayfada;
            $suan_get = "?arama_konumu=".$a_konum."&urun_adi=".$urun_adi1."&urun_kodu=".$urun_kodu1."&ara=Malzeme+Ara&";
            
            if(mysql_num_rows($srg_arama) == 0)
            {
              echo "<h4 class='alert_warning'>Malzeme Bulunamadı. Farklı isimler ile tekrar deneyin.</h4>";
            }
/*

------------------------------------------------------------------------------------------------------------------------
LİSTELEME SORGULARINI OLUSTURUYORUZ 
------------------------------------------------------------------------------------------------------------------------

*/
            else
            {
                    if($urun_adi1 == "" and $urun_kodu1 == "")
                  {
                   
                      $srg_arama = mysql_query("(select * from m_depo WHERE urun_miktari != 0 and (urun_kodu =  '$urun_kodu1' or urun_adi LIKE '%$urun_adi1%') LIMIT $limit,$sayfada) union all (select * from a_depo WHERE urun_miktari != 0 and (urun_kodu = '$urun_kodu1' or urun_adi LIKE '%$urun_adi1%') LIMIT $limit,$sayfada) union all (select * from arac_1 WHERE urun_miktari != 0 and (urun_kodu = '$urun_kodu1' or urun_adi LIKE '%$urun_adi1%') LIMIT $limit,$sayfada) union all (select * from arac_2 WHERE urun_miktari != 0 and (urun_kodu = '$urun_kodu1' or urun_adi LIKE '%$urun_adi1%') LIMIT $limit,$sayfada) union all (select * from arac_3 WHERE urun_miktari != 0 and (urun_kodu = '$urun_kodu1' or urun_adi LIKE '%$urun_adi1%') LIMIT $limit,$sayfada) ");  
                  }
                  else
                  {
                   

                    if($urun_adi1 == "")
                    {
                   
                        $srg_arama = mysql_query("(select * from m_depo WHERE urun_miktari != 0 and urun_kodu LIKE '%".$urun_kodu1."%' LIMIT $limit,$sayfada) union all (select * from a_depo WHERE urun_miktari != 0 and urun_kodu LIKE '%".$urun_kodu1."%' LIMIT $limit,$sayfada) union all (select * from arac_1 WHERE urun_miktari != 0 and urun_kodu LIKE '%".$urun_kodu1."%' LIMIT $limit,$sayfada) union all (select * from arac_2 WHERE urun_miktari != 0 and urun_kodu LIKE '%".$urun_kodu1."%' LIMIT $limit,$sayfada) union all (select * from arac_3 WHERE urun_miktari != 0 and urun_kodu LIKE '%".$urun_kodu1."%' LIMIT $limit,$sayfada)");
                    }
                    else if($urun_kodu1 == "")
                    {
                   
                        $srg_arama = mysql_query("(select * from m_depo WHERE (urun_miktari != 0) and (urun_adi LIKE '%$urun_adi1%') LIMIT $limit,$sayfada) union all (select * from a_depo WHERE (urun_miktari != 0) and (urun_adi LIKE '%$urun_adi1%') LIMIT $limit,$sayfada) union all (select * from arac_1 WHERE (urun_miktari != 0) and (urun_adi LIKE '%$urun_adi1%') LIMIT $limit,$sayfada) union all (select * from arac_2 WHERE (urun_miktari != 0) and (urun_adi LIKE '%$urun_adi1%') LIMIT $limit,$sayfada) union all (select * from arac_3 WHERE (urun_miktari != 0) and (urun_adi LIKE '%$urun_adi1%') LIMIT $limit,$sayfada)");
                        
                    }
                    else
                    {
                   
                      $srg_arama = mysql_query("(select * from m_depo WHERE urun_miktari != 0 and urun_kodu LIKE '%$urun_kodu1%' and urun_adi LIKE '%$urun_adi1%' LIMIT $limit,$sayfada) union all (select * from a_depo WHERE urun_miktari != 0 and urun_kodu LIKE '%$urun_kodu1%' and urun_adi LIKE '%$urun_adi1%' LIMIT $limit,$sayfada) union all (select * from arac_1 WHERE urun_miktari != 0 and urun_kodu LIKE '%$urun_kodu1%' and urun_adi LIKE '%$urun_adi1%' LIMIT $limit,$sayfada) union all (select * from arac_2 WHERE urun_miktari != 0 and urun_kodu LIKE '%$urun_kodu1%' and urun_adi LIKE '%$urun_adi1%' LIMIT $limit,$sayfada) union all (select * from arac_3 WHERE urun_miktari != 0 and urun_kodu LIKE '%$urun_kodu1%' and urun_adi LIKE '%$urun_adi1%' LIMIT $limit,$sayfada) ");  
                    }
                    
                  }

                      echo "<table width='100%'>";
                      echo "<tr class='baslik_sort'>";
                      echo "<td width='20%'>Ürün Kodu</td><td width='25%'>Ürün Adı</td><td width='10%'>Ürün Miktarı</td><td width='45%'>Ürün Açıklaması</td>";
                      echo "</tr>";
                      $i = 0;
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
                          $urun_db_kod = $oku['urun_kodu'];

                           echo "<tr class='liste_sort_".$cl."'>";
                           echo "<td>".$urun_db_kod."</td>";
                           echo "<td>".$oku['urun_adi']."</td>";
                           echo "<td style='padding-left:33px;'>".$oku['urun_miktari']."</td>";
                           echo "<td>".$oku['urun_aciklamasi']."</td>";
                          
                           echo "</tr>"; 
                        }  

                      
                      echo "</table><br>";
                     echo "<table border='0'>";
                  echo "<tr>";
                  for($j = 1; $j <= $toplam_sayfa; $j++) {
                           
                              echo "<td class='sayfalama_bg'><a href='".$suan_get."sayfa=".$j."'>".$j."</a></td> ";
                           
                      }
                      echo "</tr></table>";

            }
            
          }
          else {
    /*
------------------------------------------------------------------------------------------------------------------

HERYERDEN FARKLI OLARAK ÖZEL BİR DEPO SEÇİLMİŞ İSE BU KISIM ÇALIŞACAKTIR.

------------------------------------------------------------------------------------------------------------------

    */
          if($urun_kodu1 == "" and $urun_adi1 == "")
          {
              $srg_arama = mysql_query("select * from $a_konum WHERE urun_miktari != 0");  
          }
          else
          {
              if($urun_kodu1 == "")
              {
                  $srg_arama = mysql_query("select * from $a_konum WHERE urun_miktari != 0 and urun_adi LIKE '%$urun_adi1%'");
              }
              else if($urun_adi1 == "")
              {
                  $srg_arama = mysql_query("select * from $a_konum WHERE urun_miktari != 0 and urun_kodu LIKE '%$urun_kodu1%'");
              }
              else
              {
                  $srg_arama = mysql_query("select * from $a_konum WHERE urun_miktari != 0 and urun_adi LIKE '%$urun_adi1%' and LIKE '%$urun_kodu1%'");
              }
          }
          
/*
------------------------------------------------------------------------------------------------
FARKLI KONUMLU DEPODAN KAÇ ADET VERİ OLDUGUNU ÖGRENDİK
------------------------------------------------------------------------------------------------
*/
            $toplam_satir = mysql_num_rows($srg_arama);
            $toplam_sayfa = ceil($toplam_satir/$sayfada); // Toplam satırı, bir sayfada kaç tane olucak ifadeye bölüp üste yuvarlıyorum
            $limit = ($s-1)*$sayfada;
            $suan_get = "?arama_konumu=".$a_konum."&urun_adi=".$urun_adi1."&urun_kodu=".$urun_kodu1."&ara=Malzeme+Ara&";
            if(mysql_num_rows($srg_arama) == 0)
            {
              echo "<h4 class='alert_warning'>Malzeme Bulunamadı. Farklı isimler ile tekrar deneyin.</h4>";
            }

            else
            {
              /*
              ----------------------------------------------------------------
              LİSTELEME SORGUSU FARKLI BİR DEPOYA AİT OLAN LİSTELEME SORGULARI
                          A_KONUM IS DIFFERENT
              ----------------------------------------------------------------
              */
              if($urun_kodu1 == "" and $urun_adi1 == "")
              {
                  $srg_arama = mysql_query("select * from $a_konum WHERE urun_miktari != 0 LIMIT $limit,$sayfada");  
              }
              else
              {
                  if($urun_kodu1 == "")
                  {
                      $srg_arama = mysql_query("select * from $a_konum WHERE urun_miktari != 0 and urun_adi LIKE '%$urun_adi1%' LIMIT $limit,$sayfada");
                  }
                  else if($urun_adi1 == "")
                  {
                      $srg_arama = mysql_query("select * from $a_konum WHERE urun_miktari != 0 and urun_kodu LIKE '%$urun_kodu1%' LIMIT $limit,$sayfada");
                  }
                  else
                  {
                      $srg_arama = mysql_query("select * from $a_konum WHERE urun_miktari != 0 and urun_adi LIKE '%$urun_adi1%' and LIKE '%$urun_kodu1%' LIMIT $limit,$sayfada");
                  }
              }
                  $i=0;
                  echo "<table width='100%'>";
                      echo "<tr class='baslik_sort'>";
                      echo "<td width='20%'>Ürün Kodu</td><td width='25%'>Ürün Adı</td><td width='10%'>Ürün Miktarı</td><td width='45%'>Ürün Açıklaması</td>";
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
                           echo "<tr class='liste_sort_".$cl."'>";
                           echo "<td>".$oku['urun_kodu']."</td>";
                           echo "<td>".$oku['urun_adi']."</td>";
                           echo "<td style='text-align:center;'>".$oku['urun_miktari']."</td>";
                           echo "<td>".$oku['urun_aciklamasi']."</td>";
                           echo "</tr>"; 
                  }
                  echo "</table><br>";

                  echo "<table border='0'>";
                  echo "<tr>";
                  for($j = 1; $j <= $toplam_sayfa; $j++) {
                           
                              echo "<td class='sayfalama_bg'><a href='".$suan_get."sayfa=".$j."'>".$j."</a></td> ";
                           
                      }
                      echo "</tr></table>";
             }

        }

        }

        //SELECT ÖĞRENCİLER.NUMARA, ÖĞRENCİLER.ADI, ÖĞRENCİLER.SOYADI,
        //BÖLÜMLER.[BÖLÜM KODU], BÖLÜMLER.[BÖLÜM ADI]
        //FROM ÖĞRENCİLER, BÖLÜMLER
        //WHERE ÖĞRENCİLER.BÖLÜM = BÖLÜMLER.[BÖLÜM KODU]
        else
        {
         ?>

        <form action="urun_ara.php" method="GET" name='urun_ara'>
          <table>
            <tr>
              <td>Arama Konumu</td>
              <td> : <select class='select_width' name="arama_konumu">
                    <option value="e">Heryer</option>
                    <option value="m_depo">Merkez</option>
                    <option value="a_depo">Atölye</option>
                    <option value="arac_1">Araç 1</option>
                    <option value="arac_2">Araç 2</option>
                    <option value="arac_3">Araç 3</option>
                </select>
              </td>
            </tr>
            <tr>
                <td>Ürün Adı</td>
                <td> : <input type="text" name="urun_adi"/></td>
            </tr>
            <tr>
                <td>Ürün Kodu</td>
                <td> : <input type="text" name="urun_kodu"/></td>
            </tr>
            <tr>
                <td colspan='2' align='right'><input type='submit' name='ara' value='Malzeme Ara'/></td>
            </tr>
          </table>
        </form>
      </div>


      
        <?php } ?>
    </article><!-- end of styles article -->
    <div class="spacer"></div>
  </section>

<?php 
include('footer.php');
?>