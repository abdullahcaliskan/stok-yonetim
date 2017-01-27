<?php
	include("sql_connect.php");
	$nerden = $_POST['nerden'];
	$dusulecek_miktar = $_POST['dusulecek_miktar'];
	$stok_id = $_POST['stok_id'];

	$veri_cek = mysql_query("SELECT * FROM $nerden WHERE stok_id = '$stok_id'");
	while($oku = mysql_fetch_assoc($veri_cek))
	{
		$miktar_in_db = $oku['urun_miktari'];	
	}
	if($miktar_in_db<$dusulecek_miktar)
	{
		echo "Silinmek istenen miktar, stoktaki miktardan fazla.";
	}
	else
	{
		$yeni_miktar = $miktar_in_db - $dusulecek_miktar;
		$guncelle = mysql_query("UPDATE $nerden SET urun_miktari = '$yeni_miktar' WHERE stok_id = '$stok_id'");

		if($guncelle)
		{
			echo "Malzeme Silindi";
		}
	}
?>