<?php

include("sql_connect.php");

$nerden = $_POST['nerden'];
$dusulecek_miktar = $_POST['dusulecek_miktar'];
$stok_id = $_POST['stok_id'];
$urun_kodu = $_POST['urun_kodu'];

$veri_cek = mysql_query("SELECT * FROM $nerden WHERE stok_id = '$stok_id'");
while($oku = mysql_fetch_assoc($veri_cek))
{
	$miktar_in_db = $oku['urun_miktari'];	
}
if($miktar_in_db<$dusulecek_miktar)
{
	echo "Düşülmek istenen miktar, stoktaki miktardan fazla.";
}
else
{
	$yeni_miktar = $miktar_in_db - $dusulecek_miktar;
	$guncelle = mysql_query("UPDATE $nerden SET urun_miktari = '$yeni_miktar' WHERE stok_id = '$stok_id'");

	$merkez_cek = mysql_query("SELECT * FROM m_depo WHERE urun_kodu='$urun_kodu'");
	while($liste = mysql_fetch_assoc($merkez_cek))
	{
		$merkez_miktar = $liste['urun_miktari'];
	}
	$yeni_miktar = $merkez_miktar + $dusulecek_miktar;
	$guncelle = mysql_query("UPDATE m_depo SET urun_miktari = '$yeni_miktar' WHERE urun_kodu = '$urun_kodu'");
	if($guncelle)
	{
		echo "Malzeme Teslim Alındı";
	}
}
?>