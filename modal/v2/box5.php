<?php
if (empty($_SESSION['g_level'])){
header("Content-Type: application/json");
echo json_encode(array(401 => "error login"));
}else{
if (($referer==$host OR $referer==$_POST['link'])) {
$warnabar = "#f44274";
?>

<script>
$(document).ready(function(){
$('.harga').hide();
$('.printpenawaran').hide();
$(".alert").hide();
$('.btnon, .btnd, .btnp').prop('disabled',true);
$('#jmlcetakbox5').keypress(validateNumber);
$('#ketbox5').keyup(function(){
$('.btnon').prop('disabled', this.value == "" ? true : false);     
})	
}); 
$('.modal').on('hidden.bs.modal', function(){
$(this).removeData('bs.modal');
});
</script>

<div class="modal-header" style="background-color:<?=$warnabar;?>;color:white;">
	<button type="button" class="close" id="bx5" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Cetak Box 5</h4>
</div>
<div id="printThis" class="modal-body">
                    <div class="row" >
						<div class="col-md-12"><div class="alert"></div></div>
                        <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<div class="input-group ">
											  <span class="input-group-addon bg-red white ">Jumlah Cetak</span>
											  <input type="text" class="form-control" aria-label="" id="jmlcetakbox5" autofocus>
											  <span class="input-group-addon">pcs</span>
											</div>
										</div>
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Lebar</span>
                                            <input type="text" class="form-control" id="lbrcetakbox5" placeholder="Lebar">
											<span class="input-group-addon">Panjang</span>
                                            <input type="text" class="form-control" id="pjcetakbox5" placeholder="Panjang">
											<span class="input-group-addon">Tinggi</span>
                                            <input type="text" class="form-control" id="tgcetakbox5" placeholder="Tinggi" >
                                        </div>
                                        </div>
                                    </div>
									
										<div class="col-md-6">	
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Lebar Lipatan Atas</span>
                                            <input type="text" class="form-control" id="llabox5" placeholder="Lebar">
										</div>
										</div>
										</div>
										<div class="col-md-6">	
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Lebar Lipatan Samping</span>
                                            <input type="text" class="form-control" id="llsbox5" placeholder="Lebar">
										</div>
										</div>
										</div>
											<input type="hidden"  id="bbbox5" value="1">

<div class="col-md-6">
		<div class="form-group">
			<div class="input-group">
	<span class="input-group-addon bg-red white">Jenis</span>
 	<select name="bahanbox5" id="bahanbox5" class="custom-select form-control" data-source="//kalkulator.go/user/api/katbahan/box5/0" data-valueKey="id" data-displayKey="name" required>	 
	</select>
<script>
$("#bahanbox5").filter(function() {
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
</script>
			</div>
		</div>
	</div>
										<div class="col-md-5">	
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Jml Warna</span>
                                            <input type="text" class="form-control" id="jmlwarnabox51" value="4" >
											<span class="input-group-addon">/</span>
                                            <input type="text" class="form-control" id="jmlwarnabox52" value="0" >
                                            
                                        </div>
                                        </div>
                                        </div>
										
										<div class="col-md-7">	
										<div class="form-group">
										<select id="lambox5" class="selectpicker form-control" data-style="btn-warning">
											<option value="0" selected>Tanpa Laminasi</option>
											<option value="1">Varnish </option>
											<option value="3">Laminating Glosy </option>
											<option value="5">Laminating DOP </option>
										</select>
										</div>
										</div>
										
											<div class="col-md-5">
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="finishing4box5">
											  </span>
											  <Label class="form-control" >SpotUV</label>											 
											</div><!-- /input-group -->

											</div>
										<div class="col-md-4">	
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="finishing1box5">
											  </span>
											  <Label class="form-control" >Poly</label>											 
											</div><!-- /input-group -->
											</div>
										<div class="col-md-12">	
										<div class="form-group">
                                           <div class="input-group">
											  <span class="input-group-addon">Lebar</span>
											  <input type="text" class="form-control" aria-label="" id="lbrpolybox5" value="1">
											  <span class="input-group-addon">Tinggi</span>
											  <input type="text" class="form-control" aria-label="" id="tgpolybox5" value="1">
											</div>
                                        </div>
                                        </div>
<div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon bg-red white">Mesin</span>
 <select name="idmesin" id="idmesin" class="custom-select form-control" data-mesin="//kalkulator.go/user/api/mesin/box2/0" data-valueKey="id" data-displayKey="name" required>	 
</select>
          </div>
        </div>
<script>
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

</script>
</div>
									<div class="col-md-8">	
                                        <div class="form-group">
										<div class="input-group">
										<span class="input-group-addon">Keterangan</span>
										<input type="text" class="form-control" aria-label="" id="ketbox5"  placeholder="Isi dulu keterangannya">
										</div>
										</div>
									</div>		
                                    <div class="col-md-4">		
										<div class="form-group hide-print">
											<button  type="submit" class="btn btn-primary btnon" onclick="cekukuranbox5(0)">Hitung</button>
											<?php echo cNav('box5');?>
											<button type="button" class="btn btn-primary printpenawaran"><i class="fa fa-external-link" aria-hidden="true"></i></button>	
                                        </div>                                     
                                    </div>
	<div class="col-md-12 display-hidden" id="hidemyBar">
	  <div class="w3-light-grey">
		<div id="myBar" class="w3-deep-orange" style="height:5px;width:0"></div>
	  </div>
	</div>
<div class="col-md-12">
	  <div class="col-md-6 harga">	
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Harga Satuan</span>
            <input type="text" class="form-control" aria-label="" id="satuan<?=$modul;?>"  value="">
          </div>
        </div>
      </div>	  
	  <div class="col-md-6 harga">	
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
            <span class="input-group-addon">Total Jual</span>
            <input type="text" class="form-control" aria-label="" id="total<?=$modul;?>"  value="">
			<input type="hidden" id="totdumy<?=$modul;?>">
			<input type="hidden" id="data<?=$modul;?>">
          </div>
        </div>
      </div>
	   <div class="col-md-4 harga">	
        <div class="form-group">
         <button type="button" class="btn btn-info simpan" onclick="simpan('<?=$modul;?>')" >Simpan</button>	
        </div>
      </div>
      </div>
<div class="col-md-12">	
			<form action="detail-hitung/" method="post" target="_blank">
			<input type="hidden" id="token" name="token">
			<input type="hidden" id="user"  name="user">	
			<input type="hidden" id="modul" name="modul">
<div id="tablebox5"></div>
</form>
</div>
</div>
</div>	
</div>
<script>
function move() {
  var elem = document.getElementById("myBar");   
  var width = 1;
  var id = setInterval(frame, 10);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
	  $("#tablebox5").show();
	  $("#myBar").hide();
    } else {
      width++; 
      elem.style.width = width + '%'; 
	  $("#hidemyBar").removeClass("display-hidden");
	  $("#tablebox5").hide();
	  $("#myBar").show();
    }
  }
}
$(document).ready(function(){
	$( "#profits"+modulhit).keyup(function() {
		profit = $('#profits'+modulhit).val();
		tot = angka($('#totdumy'+modulhit).val());
		jual = parseFloat(profit * tot/100) + parseInt(tot);
		satuan = jual / $('#jmlcetakbox5').val();
		perrim = satuan * 500;
		$('#satuan'+modulhit).val(formatMoney(satuan));
		$('#hargarim'+modulhit).val(formatMoney(perrim));
		$('#total'+modulhit).val(formatMoney(jual));
	})	
	$('#lbrcetakbox5').val('10');
	$('#tgcetakbox5').val('8');
	$('#pjcetakbox5').val('20');
	$('#bbbox5').val('1');
	$('#llabox5').val('5');
	$('#llsbox5').val('2');

	$('#bx5').click(function(){	
	if( $('#detailbox5').length ){
		$('#detailbox5').remove();
	}	
	if( $('#detailkertasbox5').length ){
		$('#detailkertasbox5').remove();
	}		
	
	});		
	
	
})
</script>

			
  <script type="text/javascript">

function hitungbox5(){
		var lbr = document.getElementById("lbrcetakbox5").value;
		var tg = document.getElementById("tgcetakbox5").value;
		var pj = document.getElementById("pjcetakbox5").value;
		var lla = document.getElementById("llabox5").value;
		var lls = document.getElementById("llsbox5").value;
		
	//	L=2LLS + 2T + P
	//	P=2T + 2L + LLA
		
		lbrcetak 	= (2 * parseFloat(lls)) + (2 * parseFloat(tg)) + parseFloat(pj);
		tgcetak 	= (2 * parseFloat(tg)) + (2 * parseFloat(lbr)) +  parseFloat(lla);

		var jmlcetak = document.getElementById("jmlcetakbox5").value;
		var bahan = document.getElementById("bahanbox5").value;
		var bb = document.getElementById("bbbox5").value;
		var jmlwarna = document.getElementById("jmlwarnabox51").value;
		var jmlwarna2 = document.getElementById("jmlwarnabox52").value;
			if (jmlwarna=='Full Color'){
			jmlwarna=4;
			}
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}
		
		
		var lam = document.getElementById("lambox5").value;
		var jmlset = 1;
		var lbrf1= 1;		var tgf1 = 1;		
		var lbrf2= 1;		var tgf2 = 1;		
		var lbrf3= 1;		var tgf3 = 1;		
		var lbrf4= 1;		var tgf4 = 1;		
		var lbrf5= 1;		var tgf5 = 1;
		var lbrf6= 1;						var tgf6 = 1;
		var finishing6 = '0';		
		var finishing1 = 0;
		var finishing2 = 0;
		var finishing3 = 0;
		var finishing4 = 0;
		var finishing5 = 0;
	
		var modul = 'box5';
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";	
		var ket = document.getElementById("ketbox5").value;
		var ket_satuan = "pcs";
		var rim = 500;
		var box = 100;
		var ongpot = 'N';
				var idmesin = $('#idmesin').val();
		
			//Pond
			lbrf3= lbrcetak/jmlcetak; //karena di fungsihitung dikalikan jumlah cetak
			tgf3 = tgcetak;
			finishing2 = '12'; //Biaya Pon
			finishing3 = '13'; // Pisau Pon		
		
		
		//SpotUV
		if(document.getElementById("finishing4box5").checked == true ){
			finishing4 = '19';
			lbrf4= lbrcetak;
			tgf4 = tgcetak;
		}
		
		if(document.getElementById("finishing1box5").checked == true ){ //Poly
			lbrpolykop = document.getElementById("lbrpolybox5").value;
			tgpolykop = document.getElementById("tgpolybox5").value;
			finishing5 = '10'; //Press Poly
			lbrf5= lbrpolykop;
			tgf5 = tgpolykop;			
			finishing1 = '11'; //Plat Poly
			lbrf1= lbrpolykop/jmlcetak;
			tgf1 = tgpolykop;

		}
		
		

		if (jmlcetak != null && jmlcetak < 1){  
			alert("Jumlah Cetakan Kosong!!");
			return;
		}	
		if(lbrcetak != null && lbrcetak < 1){
			alert(" Lebar Cetakan Kosong!!");
			return;
		}
		if (tgcetak != null && tgcetak < 1){
			alert("Tinggi Cetakan Kosong!!");
			return;	
		}
		//alert(lbrcetak);
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				
				data = myArr;
					if( level == 'admin' || level == 'member' ){
				if( $('#tablbox5').length ){
					$('#tablbox5 tr:gt(0)').remove();	
					var table = $('#tablbox5').children();					
					var i;
					var no=1;
					var x;
					var ongkos_potong = 0;
					for (i = 0; i < data.length; i++) {
						
						if (data[i]['ongpot'] == 'Y' ){
							ongkos_potong = data[i]['ongkos_potong'];
						}						
						totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']);
						
						profit = data[i]['persen'];
						jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
						satuan = jual / jmlcetak / jml_satuan;
						perrim = satuan *  rim;
						
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						// alert(totalk);
						// $('#keter').val(arrStr);
						x +="<tr class='text-md-left'><td>"+data[i]['mesin']+"</td><td class='text-md-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button><input type='hidden' name='ket' value='"+ket+"' /></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";	
					}
					table.append(x);
					
					}else{
						
						$('#tablebox5').append("<div id='detailbox5' class='small'><table id='tablbox5' class='table table-striped' ><thead ><tr style='background-color:<?=$warnabar;?>;color:white' ><th  class='text-md-left' style='width:30%'>Mesin</th><th class='text-md-right'>Harga</th></tr></thead></table></div>");
							
					
					var table = $('#tablbox5').children();
					var i;
					var no=1;
					var x;
					var ongkos_potong = 0;
					for (i = 0; i < data.length; i++) {
						
						if (data[i]['ongpot'] == 'Y' ){
							ongkos_potong = data[i]['ongkos_potong'];
						}						
						totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']);
						
						profit = data[i]['persen'];
						jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
						satuan = jual / jmlcetak / jml_satuan;
						perrim = satuan *  rim;
						
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						// alert(totalk);
						x +="<tr class='text-md-left'><td>"+data[i]['mesin']+"</td><td class='text-md-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button><input type='hidden' name='ket' value='"+ket+"' /></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";	
					}

					table.append(x);
					}	
					}else{
						var ongkos_potong = 0;
							if (data[0]['ongpot'] == 'Y' ){ongkos_potong = data[0]['ongkos_potong'];}	
							total = parseInt(data[0]['totcetak']) + parseInt(data[0]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[0]['tot_ctp']) + parseInt(data[0]['totlaminating']) + parseInt(data[0]['finishing1']) + parseInt(data[0]['finishing2']) + parseInt(data[0]['finishing3']) + parseInt(data[0]['finishing4']) + parseInt(data[0]['finishing5']) + parseInt(data[0]['finishing6']);
							
							var arrStr = btoa(encodeURIComponent(JSON.stringify(data[0])));
							
							$('.harga').show();
							profit = data[0]['persen'];
							jual = (parseInt(total) * profit / 100) + parseInt(total);
							satuan = jual / jmlcetak / jml_satuan;
							perrim = satuan *  rim;
							
							// alert(arrStr1);
							$('#satuan'+modulhit).val(formatMoney(satuan));
							$('#hargarim'+modulhit).val(formatMoney(perrim));
							$('#total'+modulhit).val(formatMoney(jual));
							$('#totdumy'+modulhit).val(formatMoney(jual));
							$('#data'+modulhit).val(arrStr);
							$('#modul').val(modul);
					}
			}
			}
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&idmesin="+idmesin;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();				

		}

		
		// function cariukuranbox5(){
			// var ukuran = document.getElementById("ukuranbox5").value;
			// var xmlhttp = new XMLHttpRequest();
			// xmlhttp.onreadystatechange = function() {
			// if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				// myArr = JSON.parse(xmlhttp.responseText);
				// document.getElementById("lbrcetakbox5").value = myArr[0];
				// document.getElementById("tgcetakbox5").value = myArr[1];
			// //alert(myArr[0].toString());
			// }
			// }
			  // xmlhttp.open("GET","function/cariukuran.php?ukuran="+ukuran,true);
			  // xmlhttp.send();	
		// }
 $("#jmlcetakbox5").blur(function(){
    $('#jmlcetakbox5').removeClass('border-red');
  }); 
 $("#bahanbox5").change(function(){
    $('#bahanbox5').removeClass('border-red');
  }); 
  $("#idmesin").change(function(){
  $('#idmesin').removeClass('border-red');
  });
function cekukuranbox5(x){
	var jmlcetak = document.getElementById("jmlcetakbox5").value;
	var jmlwarna = document.getElementById("jmlwarnabox51").value;
	var bahanbox4 = document.getElementById("bahanbox5").value;
	var idmesin = document.getElementById("idmesin").value;
if (jmlcetak != null && jmlcetak < 1){  
	// salert('warning','Oops...','Jumlah Cetakan Kosong!!');
		$('#jmlcetakbox5').addClass('border-red');
		$("#jmlcetakbox5").focus();
	return;
	}
	if (jmlwarna != null && jmlwarna < 1){  
		salert('warning','Oops...','Jumlah Warna Minimal 1!!');
		$('#jmlcetakbox5').addClass('border-red');
		return;
	}	
	if (bahanbox4 ==0){
		salert('warning','Oops...','bahan belum dipilih');
		$('#bahanbox5').addClass('border-red');
		return;
	}
	if (idmesin ==0){
		salert('warning','Oops...','mesin belum dipilih');
		$('#idmesin').addClass('border-red');
		return;
	}
		move();
		$('.simpan').prop('disabled', this.value == "" ? true : false); 
		$('.simpan').html('Simpan');
		$("#profits"+modulhit).val('0');
		xx=x;
		var lbr = document.getElementById("lbrcetakbox5").value;
		var tg = document.getElementById("tgcetakbox5").value;
		var pj = document.getElementById("pjcetakbox5").value;
		var lla = document.getElementById("llabox5").value;
		var lls = document.getElementById("llsbox5").value;
		
	//	L=2LLS + 2T + P
	//	P=2T + 2L + LLA
		
		lbrcetak 	= (2 * parseFloat(lls)) + (2 * parseFloat(tg)) + parseFloat(pj);
		tgcetak 	= (2 * parseFloat(tg)) + (2 * parseFloat(lbr)) +  parseFloat(lla);


		var xmlhttp = new XMLHttpRequest();

$('#tablebox5').hide();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				if (myArr[0].toString()=='N'){
					salert('warning','Oops...','Jumlah Cetakan Kosong!!');
					return;
				}else{
					
					hitungbox5(xx);
				}
			}
			}
			 xmlhttp.open("GET","function/cekukuran.php?mesin="+idmesin+"&lbrcetak="+lbrcetak+"&tgcetak="+tgcetak,true);
			  xmlhttp.send();	
		}
// $('.printpenawaran').click(function() {
// var value = $("#token").val();
// var urlencode = btoa(value);
// window.open('/penawaran-harga/' + urlencode, '_blank');
// });
</script>      
<?php
	}//end token
	else{
echo json_encode(array(404 => "error"));
	}
}
?>