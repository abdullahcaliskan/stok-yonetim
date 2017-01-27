<?php
include('header.php');

include('sidebar.php');
?>


  <section id="main" class="column">
  
    <article class="module width_full">
      <header><h3>Ürün Çıkış</h3></header>
        <div class="module_content">

          <?php
              $nerden = $_GET['nerden'];
              $nereye = $_GET['nereye'];
          ?>
          <form method="POST" name="urun_arat" action="#">
              <table>
                <tr style='display:none;'>
                  <td colspan='4'>
                    <input type='text' name='nerden' id='nerden' value='<?php echo $nerden; ?>'/>
                    <input type='text' name='nereye' id='nereye' value='<?php echo $nereye; ?>'/>
                  </td>
                </tr>
                <tr>
                  <td>Ürün Kodu</td><td> : <input type="text" name="urun_kodu" onkeyup='cikis_kod()' class="cikisInputKodu"/></td>
                  <td>Ürün Adı</td><td> : <input type="text" name="urun_adi" onkeyup='cikis_ad()' class="cikisInputAdi"/></td>
                </tr>
              </table>
          </form>
          <p>Her iki şekilde de arama yapabilirsiniz. Ancak en az 2 harf girmeniz gerekmektedir.</p>
          <div id='display'></div>
          
        </div>
    </article><!-- end of styles article -->
    <div class="spacer"></div>
  </section>

<?php 
include('footer.php');
?>