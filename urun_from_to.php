<?php
include('header.php');

include('sidebar.php');
?>

  
  <section id="main" class="column">
  
    <article class="module width_full">
      <header><h3>Ürün Çıkış</h3></header>
        <div class="module_content">
        
          <form action='urun_cikis.php' name='nerdenNereye' method='GET'>
            <table>
                  <tr>
                    <td>Nerden</td><td> : 
                        <select name="nerden" class='select_width'>
                          <option value="m_depo">Merkez Depo</option><br><br>
                          <option value="a_depo">Atölye</option>
                          <option value="arac_1">Araç 1</option>
                          <option value="arac_2">Araç 2</option>
                          <option value="arac_3">Araç 3</option>
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Nereye</td><td> : 
                    <select class='select_width' name="nereye">
                      <option value="musteri">Müşteriye</option>
                      <option value="a_depo">Atölye</option>
                      <option value="arac_1">Araç 1</option>
                      <option value="arac_2">Araç 2</option>
                      <option value="arac_3">Araç 3</option>
                    </select></td>
                  </tr>
                  <tr>
                    <td colspan='2' align='right'><input type='submit' name='ileri' value='İleri'/></td>
                  </tr>

            </table>
          </form>

        </div>
    </article><!-- end of styles article -->
    <div class="spacer"></div>
  </section>

<?php 
include('footer.php');
?>
