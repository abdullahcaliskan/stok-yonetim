function geriAl(g_id)
{
	var dusulecek_miktar, container_id, nerden, urun_adi;

	nerden = $("#gizli_yazi").html();

	container_id = "urun_kodu"+g_id;
	urun_kodu = $("#"+container_id).text();
	
	container_id = "dusulecek_adet"+g_id;
	dusulecek_miktar = $("#"+container_id).val();

	var data = "nerden="+nerden+"&dusulecek_miktar="+dusulecek_miktar+"&stok_id="+g_id+"&urun_kodu="+urun_kodu;
	$.ajax({
		url:'geriAl.php',
		type:'POST',
		data:data,
		success:function(request){
			alert(request);
			window.location.href = 'default.php'
		}
	})

}

function sil (g_id) {
	nerden = $("#gizli_yazi").html();

	container_id = "dusulecek_adet"+g_id;
	dusulecek_miktar = $("#"+container_id).val();

	var data = "nerden="+nerden+"&dusulecek_miktar="+dusulecek_miktar+"&stok_id="+g_id;

	$.ajax({
		type:'POST',
		url:'sil.php',
		data:data,
		success:function(request){
			alert(request);
			window.location.href = 'default.php';
		}
	})
}

function urun_cikis(stok_id2, nerden2, nereye2)
{
	$('.sec_buton').css('display','none');
	
	var link = "urun_cikis2.php?nerden="+nerden2+"&nereye="+nereye2+"&stok_id="+stok_id2;
	
    var wnd = window.open(link);
    /*setTimeout(function() {
      wnd.close();
    }, 500);*/
    
	/*
	$.get( "urun_cikis2.php", { stok_id: stok_id2, nerden: nerden2, nereye: nereye2 } )
	  .done(function( data ) {
	    alert( "Data Loaded: " + data );
	  });*/
	
	$('.sec_buton').css('display','block');
	var urun_adi = $('.cikisInputAdi').val();
	var urun_kodu = $('.cikisInputKodu').val();
	if(urun_adi == '')
		cikis_kod();
	else
		cikis_ad();
}

function cikis_kod()
{
		var nerden = $('#nerden').val();
        var nereye = $('#nereye').val();
        $('.cikisInputAdi').val('');
        var textVal = $('.cikisInputKodu').val().toUpperCase();
        $.post(
          'dataCek.php',
          { 'aranan_ifade':textVal,
            'nerden':nerden,
            'nereye':nereye,
            'belirtec':'urun_kodu'
          },
          function(data){
            $('#display').html(data);
          });
}
function cikis_ad()
{
		var nerden = $('#nerden').val();
        var nereye = $('#nereye').val();
        $('.cikisInputKodu').val('');
        var textVal = $('.cikisInputAdi').val().toUpperCase();
        $.post(
          'dataCek.php',
          { 'aranan_ifade':textVal,
            'nerden':nerden,
            'nereye':nereye,
            'belirtec':'urun_adi'
          },
          function(data){
            $('#display').html(data);
          });
}


