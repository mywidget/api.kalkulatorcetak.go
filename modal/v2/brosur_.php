<?php
if (empty($_SESSION['g_level'])){
echo json_encode(array(404 => "error"));
}else{
if (($referer==$host OR $referer==$host.'user/media.php?page=produk')) {
$warnabar = "#55aa5f";

$arrayb = ArrayBiaya($_SESSION['g_id']);
$Biaya =pilihBiaya($arrayb['biaya'],66);
?>

<script>

$(document).ready(function(){
	$('#lbrcetak,#tgcetak').attr('readonly', true); 
$('.harga').hide();
$('.printpenawaran').hide();
$(".alert").hide();
$('.btnon, .btnd, .btnp').prop('disabled',true);
$('#jmlcetak').keypress(validateNumber);
$('#lbrcetak,#tgcetak').keypress(validateNumber);
$('#ketbrosur').keyup(function(){
$('.btnon').prop('disabled', this.value == "" ? true : false);     
})
//tambahan untuk biaya lain-lain
$('.lain').hide();
$('#jmlcetak').keyup(function(){
$('.lain').show();    
});
//
}); 
var inputWdithReturn = '100%';
var cekLebar = document.getElementById("jmlcetak");
var widthx = cekLebar.clientWidth;
if(widthx < 50){
$('.input').focus(function(){
if ( $(this).attr('id') == 'jmlcetak') {
	inputWdith='100px';
// $('.input').focus(function() {$(this).animate({width: '100px'}, 500);});
}else{
	inputWdith='50px';
// $('.input').focus(function() {$(this).animate({width: '50px'}, 500);});
}
$(this).animate({width: inputWdith}, 400 )
}); 
}
$('.input').blur(function(){$(this).animate({width: inputWdithReturn}, 500);});
</script>
<div class="modal-header" style="background-color:<?=$warnabar;?>;color:white;">
	<button type="button" class="close" id="b" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Cetak Brosur</h4>
</div>
<div class="modal-body">
  <div class="row">
	<div class="col-md-12">	
		<div class="alert"></div>
	</div>
    <div class="col-md-12">
		<div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon warning">Jumlah Cetak
            </span>
            <input type="text" class="form-control input" id="jmlcetak" autofocus>
            <span class="input-group-addon">lembar
            </span>
          </div>
        </div>
        </div>
		<div class="col-md-6">
        <div class="form-group ukuran">
          <div class="input-group">
            <span class="input-group-addon">Ukuran</span>
 <select name="ukuran" id="ukuran" class="custom-select form-control" data-ukuran="http://kalkulator.go/user/api/ukuran/brosur" data-valueKey="id" data-displayKey="name" required>	 
</select>
          </div>
        </div> 
        </div> 
		<div class="col-md-8">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Lebar
            </span>
            <input type="text" class="form-control" id="lbrcetak" value="0">
            <span class="input-group-addon">Tinggi
            </span>
            <input type="text" class="form-control" id="tgcetak" value="0">
            <span class="input-group-addon">cm
            </span>
          </div>
        </div>  
        </div>  
		<div class="col-md-4">	
		<div class="form-group">
			<div class="input-group">
			  <span class="input-group-addon">Bleed</span>
			  <input type="text" class="form-control" aria-label="" id="bleed" value="0.4">
			</div>
		</div>
		</div>
		<div class="col-md-5">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Jumlah Warna</span>
            <input type="text" class="form-control input" aria-label="" id="jmlwarna" value="4" >
            <span class="input-group-addon">/</span>
            <input type="text" class="form-control input" aria-label="" id="jmlwarna2" value="4" >
          </div>
        </div>
        </div>

		<div class="col-md-7">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Kertas</span>
 <select name="bahan" id="bahan" class="custom-select form-control" data-source="http://kalkulator.go/user/api/katbahan/brosur" data-valueKey="id" data-displayKey="name" required>	 
</select>
          </div>
        </div>
        </div>
		<div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Mesin</span>
 <select name="idmesin" id="idmesin" class="custom-select form-control" data-mesin="http://kalkulator.go/user/api/mesin/brosur" data-valueKey="id" data-displayKey="name" required>	 
</select>
          </div>
        </div>
        </div>
		<div class="col-md-6">
        <div class="form-group">
          <select id="lam" class="custom-select form-control" data-style="btn-warning" >
            <option value="0" selected>Tanpa Laminasi
            </option>
            <option value="1">Varnish Satu Muka
            </option>
            <option value="2">Varnish Bolak-balik
            </option>
            <option value="3">Laminating Glosy Satu Muka
            </option>
            <option value="4">Laminating Glosy BB
            </option>
            <option value="5">Laminating DOP Satu Muka
            </option>
            <option value="6">Laminating DOP BB
            </option>
          </select>
        </div>
      </div>

      <div class="col-md-6">	
        <div class="form-group">
          <div class="input-group ">
            <span class="input-group-addon">
              <input type="checkbox" id="finishing4">
            </span>
            <Label class="form-control" >SpotUV
              </label>											 
          </div>
          <!-- /input-group -->
        </div>
      </div>
	  <div class="col-md-6">
        <div class="form-group">
          <select id="lipat" class="selectpicker form-control custom-select" data-style="btn-warning" ">
            <option value="0" selected>Tanpa Lipat
            </option>
            <option value="1">Lipat Mesin
            </option>
            <option value="2">Lipat Pond
            </option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group ">
            <span class="input-group-addon">Jml Lipatan</span>
            <input type="text" class="form-control" aria-label="" id="lipatbro" value="3" >
          </div>
          <!-- /input-group -->
        </div>
      </div>
      <div class="col-md-4">	
        <div class="form-group">
          <div class="input-group ">
            <span class="input-group-addon">
              <input type="checkbox" id="finishing1brosur">
            </span>
            <Label class="form-control" >Hot Foil
              </label>											 
          </div>
          <!-- /input-group -->
        </div>
      </div>
      <div class="col-md-8">	
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Lebar
            </span>
            <input type="text" class="form-control" aria-label="" id="lbrpolybrosur" value="1">
            <span class="input-group-addon">Tinggi
            </span>
            <input type="text" class="form-control" aria-label="" id="tgpolybrosur" value="1">
          </div>
        </div>
      </div>
	  <!--tambahan biaya-->
	  <div class="col-md-8 lain">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon" id="saved">Biaya Lain-lain</span>
            <input type="text" class="form-control" aria-label="" id="biayal" value="<?=$HargaLebih;?>">
          </div>
        </div>

      </div>
	 <div class="col-md-4 lain">	
        <div class="form-group">
          <button  type="submit" class="btn btn-success save"><i class="icon-save"></i></button>
        </div>
      </div>
	  <!--end biaya-->
	  <div class="col-md-8">	
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Keterangan
            </span>
            <input type="text" class="form-control" aria-label="" id="ketbrosur"  placeholder="Isi dulu keterangannya">
          </div>
        </div>
      </div>
      <div class="col-md-4">	
        <div class="form-group">
          <button  type="submit" class="btn btn-primary btnon" id="cekukuran">Hitung</button>
        </div>
      </div>
	<div class="col-md-12 display-hidden" id="hidemyBar">
	  <div class="w3-light-grey">
		<div id="myBar" class="w3-deep-orange" style="height:5px;width:0"></div>
	  </div>
	</div>
	   <div class="col-md-12">
	  <div class="col-md-3 harga">	
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Profit
            </span>
            <input type="text" class="form-control" aria-label="" id="profits<?=$modul;?>"  value="0">
			<span class="input-group-addon">%
            </span>
          </div>
        </div>
      </div>
	  <div class="col-md-4 harga">	
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Harga Satuan</span>
            <input type="text" class="form-control" aria-label="" id="satuan<?=$modul;?>"  value="">
          </div>
        </div>
      </div>	  
	  <div class="col-md-5 harga">	
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Harga PerRim</span>
            <input type="text" class="form-control" aria-label="" id="hargarim<?=$modul;?>"  value="">
          </div>
        </div>
      </div>
	  <div class="col-md-4 harga">	
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Total Jual</span>
            <input type="text" class="form-control" aria-label="" id="total<?=$modul;?>"  value="">
			<input type="hidden" id="totdumy<?=$modul;?>">
			<input type="hidden" id="data<?=$modul;?>">
          </div>
        </div>
      </div>
	   <div class="col-md-8 harga">	
        <div class="form-group">
         <button type="button" class="btn btn-info simpan" onclick="simpan('<?=$modul;?>')" >Simpan</button>
		 <button type="button" class="btn btn-primary printpenawaran"><i class="fa fa-external-link" aria-hidden="true"></i></button>	
        </div>
      </div>
      </div>
      <div class="col-md-12">	
			<form action="detail-hitung/" method="post" target="_blank">
			<input type="hidden" id="token" name="token">
			<input type="hidden" id="user"  name="user">	
			<input type="hidden" id="modul" name="modul">
          <div id="detailtablebro"></div>
        </form>
      </div>
    </div>
  </div>
</div> 
<script type="text/javascript">
$("#bahan").filter(function() {
$('select[data-source]').each(function() {
  var $select = $(this);
  $select.append('<option value="0">Pilih kertas</option>');
  $.ajax({
    url: $select.attr('data-source'),
  }).then(function(options) {
      options.map(function(option) {
      var $option = $('<option>');
      $option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
      $select.append($option);
    });
  });
});
});
$("#idmesin").filter(function() {
$('select[data-mesin]').each(function() {
  var $select = $(this);
  $select.append('<option value="0">Pilih mesin</option>');
  $.ajax({
    url: $select.attr('data-mesin'),
  }).then(function(options) {
      options.map(function(option) {
      var $option = $('<option>');
      $option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
      $select.append($option);
    });
  });
});
});
$("#ukuran").filter(function() {
$('select[data-ukuran]').each(function() {
  var $select = $(this);
  $select.append('<option value="0">Pilih ukuran</option>');
  $.ajax({
    url: $select.attr('data-ukuran'),
  }).then(function(options) {
      options.map(function(option) {
      var $option = $('<option>');
      $option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
      $select.append($option);
    });
  });
});
});
function move() {
  var elem = document.getElementById("myBar");   
  var width = 1;
  var id = setInterval(frame, 10);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
	  $("#detailtablebro").show();
	  $("#myBar").hide();
    } else {
      width++; 
      elem.style.width = width + '%'; 
	  $("#hidemyBar").removeClass("display-hidden");
	  $("#detailtablebro").hide();
	  $("#myBar").show();
    }
  }
}
// $(document).ready(function(){
	// $('#ukuran').val('10');
	// $('#lbrcetak').val('21');
	// $('#tgcetak').val('29.7');
	// $('#bahan').val('2');	
// })
	$( "#profits"+modulhit).keyup(function() {
		profit = $('#profits'+modulhit).val();
		tot = angka($('#totdumy'+modulhit).val());
		jual = parseFloat(profit * tot/100) + parseInt(tot);
		satuan = jual / $('#jmlcetak').val();
		perrim = satuan * 500;
		$('#satuan'+modulhit).val(formatMoney(satuan));
		$('#hargarim'+modulhit).val(formatMoney(perrim));
		$('#total'+modulhit).val(formatMoney(jual));
	})	
	

function hitung() {
	
		var bleed = document.getElementById("bleed").value;
		var lbrcetak = parseFloat(document.getElementById("lbrcetak").value) + ( 2 * parseFloat(bleed));
		var tgcetak = parseFloat(document.getElementById("tgcetak").value) + ( 2 * parseFloat(bleed));
	
		var jmlcetak = document.getElementById("jmlcetak").value;
		var bahan = document.getElementById("bahan").value;
		var jmlwarna = document.getElementById("jmlwarna").value;
		var jmlwarna2 = document.getElementById("jmlwarna2").value;
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}	
		var jml_satuan=1;	
		var lam = document.getElementById("lam").value;
		var jmlset = 1;
		var lbrf1= 1;		var tgf1 = 1;		
		var lbrf2= 1;		var tgf2 = 1;		
		var lbrf3= 1;		var tgf3 = 1;		
		var lbrf4= 1;		var tgf4 = 1;		
		var lbrf5= 1;		var tgf5 = 1;
		var lbrf6= 1;		var tgf6 = 1;
		var lbrf7= 1;		var tgf7 = 1;
		var lbrf8= 1;		var tgf8 = 1;
		var finishing1 = 0;
		var finishing2 = 0;
		var finishing3 = 0;
		var finishing4 = 0;
		var finishing5 = 0;
		var finishing6 = 0;
		var finishing7 = 0;
		var finishing8 = 0;
		var finishing9 = '66';
		var lbrf9= 1/(jmlcetak * jml_satuan);
		var tgf9 = 1;
// alert(lbrf9);
		//spot uv
		if(document.getElementById("finishing4").checked == true ){
			finishing4 = '19';
			lbrf4= lbrcetak;
			tgf4 = tgcetak;
			finishing8 = '60'; //film
			lbrf8 = 1 / (jmlcetak * jml_satuan);
		}
		//ongkos lipat
		//ongkos lipat
		var lipat = parseInt(document.getElementById("lipat").value);
		if (lipat == '1' ){
			lbrf5 = (lipat + 1) / 2;
			finishing5 = '52';
		}else if (lipat == '2' ){  //lipat pond
			lbrf5 = (lipat + 1) / 2;
			finishing5 = '56';
			
			lbrf6= lbrcetak/jmlcetak; //karena di fungsihitung dikalikan jumlah cetak
			tgf6 = tgcetak;
			finishing6 = '13'; // Pisau Pon		
		}
		if(document.getElementById("finishing1brosur").checked == true ){ //Poly
			lbrpoly = document.getElementById("lbrpolybrosur").value;
			tgpoly = document.getElementById("tgpolybrosur").value;
			finishing1 = '10'; //Press Poly
			lbrf1= lbrpoly;
			tgf1 = tgpoly;			
			finishing3 = '11'; //Plat Poly
			lbrf3= lbrpoly/jmlcetak;
			tgf3 = tgpoly;
			finishing7 = '60'; //film Poly
			lbrf7 = 1 / (jmlcetak * jml_satuan);

		}
		var modul="brosur";
		var insheet="1";
		
		var cetak_bagi="Y";
		var ket = document.getElementById("ketbrosur").value;

		var ket_satuan = "lbr";
		var rim = 500;
		var box = 100;
		var ongpot = 'Y';
		var idmesin = $('#idmesin').val();
		var j_mesin = '';
		var kethitung = '';
		
		if (jmlcetak != null && jmlcetak < 1){  
			alert("Jumlah Cetakan Kosong!!");
			return;
		}	
		if(lbrcetak != null && lbrcetak < 1){
		document.getElementById("total").value='';			
		document.getElementById("hargasatuan").value='';		
		document.getElementById("hargarim").value='';	
		 $('.btnd, .btnp').prop('disabled',true);  
			alert(" Lebar Cetakan Kosong!!");
			return;
		}
		if (tgcetak != null && tgcetak < 1){
			alert("Tinggi Cetakan Kosong!!");
			return;	
		}
		
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				// $('#ketbrosur').val(JSON.stringify(myArr));
				
					data = myArr;

					if( level == 'admin' || level == 'member' ){
			
								if( $('#here_table').length ){
									$('#here_table tr:gt(0)').remove();	
									
								var table = $('#here_table').children();					
								var i;
								var no=1;
								var x;
								var ongkos_potong = 0;
								for (i = 0; i < data.length; i++) {
									
									if (data[i]['ongpot'] == 'Y' ){
										ongkos_potong = data[i]['ongkos_potong'];
									}						
									totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']) + parseInt(data[i]['finishing7']) + parseInt(data[i]['finishing8']) + parseInt(data[i]['finishing9']);
									
									profit = data[i]['persen'];
									jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
									satuan = jual / jmlcetak / jml_satuan;
									perrim = satuan *  rim;
									
									var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
									
									x +="<tr class='text-md-left'><td>"+data[i]['mesin']+"</td><td class='text-md-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";	
									
								}
								table.append(x);
								
								}else{					
								
									$('#detailtablebro').append("<div id='detailamp2' class='small'> <table id='here_table' class='table table-striped' ><thead><tr style='background-color:<?=$warnabar ?>;color:white' ><th  class='text-md-left' style='width:30%!important'>Mesin</th><th class='text-md-right'>Harga</th></tr></thead></table></div>");
								var table = $('#here_table').children();
								
								var i;
								var no=1;
								var ongkos_potong = 0;
								for (i = 0; i < data.length; i++) {
									if (data[i]['ongpot'] == 'Y' ){
										ongkos_potong = data[i]['ongkos_potong'];
									}						
									totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']) + parseInt(data[i]['finishing7']) + parseInt(data[i]['finishing8']) + parseInt(data[i]['finishing9']);
									profit = data[i]['persen'];
									jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
									satuan = jual / jmlcetak / jml_satuan;
									perrim = satuan *  rim;
									
									var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
									
									x +="<tr class='text-md-left'><td>"+data[i]['mesin']+"</td><td class='text-md-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";
								}
								table.append(x);
								}	
					}else{
						var ongkos_potong = 0;
							if (data[0]['ongpot'] == 'Y' ){ongkos_potong = data[0]['ongkos_potong'];}	
							totalk = parseInt(data[0]['totcetak']) + parseInt(data[0]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[0]['tot_ctp']) + parseInt(data[0]['totlaminating']) + parseInt(data[0]['finishing1']) + parseInt(data[0]['finishing2']) + parseInt(data[0]['finishing3']) + parseInt(data[0]['finishing4']) + parseInt(data[0]['finishing5']) + parseInt(data[0]['finishing6']) + parseInt(data[0]['finishing7'])+ parseInt(data[0]['finishing8']) + parseInt(data[i]['finishing9']);
							
							var arrStr = btoa(encodeURIComponent(JSON.stringify(data[0])));
							
							$('.harga').show();
							profit = data[0]['persen'];
							jual = (parseInt(total) * profit / 100) + parseInt(total);
							satuan = jual / jmlcetak / jml_satuan;
							perrim = satuan *  rim;
							
							

						//	alert(arrStr1);
							$('#satuan'+modulhit).val(formatMoney(satuan));
							$('#hargarim'+modulhit).val(formatMoney(perrim));
							$('#total'+modulhit).val(formatMoney(jual));
							$('#totdumy'+modulhit).val(formatMoney(jual));
							$('#data'+modulhit).val(arrStr);
							$('#modul').val(modul);
					}

								
			}
			}
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&finishing7="+finishing7+"&finishing8="+finishing8+"&finishing9="+finishing9+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&lbrf7="+lbrf7+"&tgf7="+tgf7+"&lbrf8="+lbrf8+"&tgf8="+tgf8+"&lbrf9="+lbrf9+"&tgf9="+tgf9+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung+"&idmesin="+idmesin;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();	

		}
		
 $("#ukuran").change(function(){
        var ukuran = $(this).val();
        $.ajax({
            url: protocol + '://'+host+'/user/function/cariukuran.php',
            type: 'POST',
            data: {ukuran:ukuran},
            dataType: 'json',
            success:function(response){
			if(response[0]==0.0){
			$('#lbrcetak,#tgcetak').attr('readonly', false);
			$('#lbrcetak').val(response[0]);
			$('#tgcetak').val(response[1]);
			}else{
			$('#lbrcetak,#tgcetak').attr('readonly', true);
			$('#lbrcetak').val(response[0]);
			$('#tgcetak').val(response[1]);
			}
            }
        });
});

$("#cekukuran").click(function(){
        var jmlcetak = $('#jmlcetak').val();
        var ukuran = $('#ukuran').val();
        var idmesin = $('#idmesin').val();
        var bahan = $('#bahan').val();
		if(jmlcetak==''){
		alert('jumlah belum diisi');
		}else if(ukuran==0){
		alert('ukuran belum dipilih');
		}else if(idmesin==0){
		alert('mesin belum dipilih');
		}else if(bahan==0){
		alert('bahan belum dipilih');
		}else{
		var bleed = $('#bleed').val();
		var lbrcetak = parseFloat($('#lbrcetak').val()) + ( 2 * parseFloat(bleed));
		var tgcetak = parseFloat($('#tgcetak').val()) + ( 2 * parseFloat(bleed));
        $.ajax({
            url: protocol + '://'+host+'/user/function/cekukuran.php',
            type: 'GET',
            data: {mesin:idmesin,lbrcetak:lbrcetak,tgcetak:tgcetak},
            dataType: 'json',
            success:function(response){
			if (response[0].toString()=='N'){
			alert('Ukuran Kebesaran');
			}else{
			move();
			hitung();
			}
            }
        });
		}
});
</script>    

<style>th{font-weight:bold;text-align:center}.table > thead > tr > th{vertical-align:middle}</style>
<?php
	}//end token
	else{
echo json_encode(array(404 => "error"));
	}
}
?>