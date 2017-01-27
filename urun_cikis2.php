<?php
    include('function.php');
    $nereye = $_GET['nereye'];
    $nerden = $_GET['nerden'];
    $stok_id = $_GET['stok_id'];

    $cikilacak = 1;
    
    $sorgu = mysql_query("SELECT * FROM $nerden WHERE stok_id = '$stok_id'");

    
    while($vt = mysql_fetch_assoc($sorgu))
      {
        $miktar_in_vt = $vt['urun_miktari'];
        $ad_in_vt = $vt['urun_adi'];
        $kod_in_vt = $vt['urun_kodu'];
        $aciklama_in_vt = $vt['urun_aciklamasi'];
      }
      if($miktar_in_vt<$cikilacak)
      {
        echo "<script>alert('Verilmek istenen adette ürün depoda bulunmamaktadır. Lütfen Kontrol Ediniz.');window.close();</script>";
      }
      else
      {
        $kalan_miktar = $miktar_in_vt - $cikilacak;
        $guncelle = mysql_query("UPDATE $nerden SET urun_miktari='$kalan_miktar' WHERE stok_id='$stok_id'");
        //Nerden deposundan ürün miktarini azalttım.
        $varmi = dataInTarget($nereye, $kod_in_vt);
        if($varmi == "yok")
        {

        //Nereye deposunda yok ise insert ile ekleme işlemi yapıyorm.
              $vt_ekle = mysql_query("INSERT INTO $nereye(urun_kodu,urun_adi,urun_miktari,urun_aciklamasi) VALUES('$kod_in_vt','$ad_in_vt','$cikilacak','$aciklama_in_vt')");
              if($vt_ekle)
              {
                      echo "<script>alert('Parça Başarıyla Çıkış Yapıldı. (INSERT)'); window.close();</script>";
              }
              else
              {
                      echo "<script>alert('Parça Çıkışında Sorun! Yöneticiniz ile görüşün.'); window.close();</script>";
              }
        }
        else //Hedefte var ise
        {
              $result = miktarArttir($nereye,$kod_in_vt,$cikilacak);
              if($result == "ok")
              {
                      echo "<script>alert('Parça Başarıyla Çıkış Yapıldı. (UPDATE)'); window.close();</script>"; 
              }
              else
              {
                      echo "<script>alert('Parça Çıkışında Sorun! Yöneticiniz ile görüşün. Er:Miktar Artışı'); window.close();</script>"; 
              }
        }
      }

?>