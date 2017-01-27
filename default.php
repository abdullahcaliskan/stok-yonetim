<?php
include('header.php');

include('sidebar.php');
?>

	
	<section id="main" class="column">
		
		<h4 class="alert_info">Sistem Barındırıcınız Tarafından Gelen mesajlar </h4>
		
		<article class="module width_full">
		<header><h3 class="tabs_involved">RAPOR</h3>
		<ul class="tabs">
   			<li><a href="#tab1">Genel Stok Raporu</a></li>
		</ul>
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter yazi_orta" cellspacing="0" align="center"> 
			<thead> 
				<tr>
    				<th>Merkez</th> 
    				<th>Atölye</th> 
    				<th>Araç 1</th> 
    				<th>Araç 2</th> 
    				<th>Araç 3</th> 
				</tr> 
			</thead> 
			<tbody> 
				<tr> 
    				<td><b><?php echo sayiVer('m_depo'); ?></b></td>  
    				<td><b><?php echo sayiVer('a_depo'); ?></b></td>  
    				<td><b><?php echo sayiVer('arac_1'); ?></b></td>  
    				<td><b><?php echo sayiVer('arac_2'); ?></b></td>  
    				<td><b><?php echo sayiVer('arac_3'); ?></b></td>  
				</tr> 
				 
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->
		
<!-- RAPORLAMA BURADA BİTİYORRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR -->



		
		</article><!-- end of content manager article -->
		
		
		<div class="clear"></div>
		
		
		<!--<h4 class='alert_warning'>Alert</h4>
		
		<h4 class='alert_error'>Er</h4>
		
		<h4 class='alert_success'>Suc</h4>
		-->
		<article class="module width_full">
			<header><h3>Giriş</h3></header>
				<div class="module_content">
					
					<h2>Zorlu Soğutma Stok Takip</h2>
					<p>
						Sistemde Toplamda 5 depo bulunmaktadır.<br>
						<ul>
							<li>Merkez Depo</li>
							<li>Atölye</li>
							<li>Araç 1 - Plaka</li>
							<li>Araç 2 - Plaka</li>
							<li>Araç 3 - Plaka</li>
						</ul>
						Ürün girişi sadece Merkez Depoya yapılabilir.<br>
						Ürün çıkış sayesinde Merkez Depodan, Başka depolara yada müşteriye satış gerçekleştirebilir.<br>
						

					</p>
					<h2>Sistem İpuçları
					</h2>
					<p>
						<b>1. Ürün Arama</b><br>
						 Ürünleri Listeleyerek sayfa sayfa kontrol etmek yorucu ve zaman kaybıdır. Bunun Yerine Ürün Ara
						 sayfasını kullanarak, hem iş gücünden hemde zamandan kazanabilirsiniz.<bR>
						 <b>2. Ürün Çıkış </b><br>
						 Ürün çıkış işlemi sayesinde bir depodan bir depoya ürün aktarabilirsiniz. Bu işlem biraz mantıksız
						 geliyor olabilir. Ancak, sonuç olarak ürün depodan çıkmış oluyor.

					</p>
				</div>
		</article><!-- end of styles article -->
		<div class="spacer"></div>
	</section>

<?php 
include('footer.php');
?>