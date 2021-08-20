<?php
if (!empty($_POST['link'])){
$warnabar = "#F4A911";
?>

<script>
$(document).ready(function(){
$('.harga').hide();
$('.printpenawaran').hide();
$(".alert").hide();
    $('.btnon, .btnd, .btnp').prop('disabled',true);
	$('#jmlcetakbox2').keypress(validateNumber);
    $('#jmlcetakbox2').keyup(function(){
        $('.btnon,.btnd,.btnp').prop('disabled', this.value == "" ? true : false);
    })
}); 
var inputWdithReturn = '100%';
var cekLebar = document.getElementById("lbrcetakbox2");
var widthx = cekLebar.clientWidth;
if(widthx < 50){
$('.input').focus(function() {$(this).animate({width: '60px'}, 500);});
}
$('.input').blur(function(){$(this).animate({width: inputWdithReturn}, 500);});
</script>

<div class="modal-header" style="background-color:<?=$warnabar;?>;color:black;">
	<button type="button" class="close" id="bx2" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Cetak Box 2</h4>
</div>
<div id="printThis" class="modal-body">
                    <div class="row" >
	<div class="col-md-12"><div class="alert"></div></div>
                        <div class="col-md-12">
                                   <div class="col-md-12">
                                        <div class="form-group">
											<div class="input-group">
											  <span class="input-group-addon">Jumlah Cetak</span>
											  <input type="text" class="form-control" aria-label="" id="jmlcetakbox2" value="" autofocus>
											  <span class="input-group-addon">pcs</span>
											</div>
										</div>
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Lebar</span>
                                            <input type="text" class="form-control input" id="lbrcetakbox2" placeholder="Lebar">
											<span class="input-group-addon">Panjang</span>
                                            <input type="text" class="form-control input" id="pjcetakbox2" placeholder="Panjang">
											<span class="input-group-addon">Tinggi</span>
                                            <input type="text" class="form-control input" id="tgcetakbox2" placeholder="Tinggi" >
                                        </div>
                                        </div>
                                    </div>
										<div class="col-md-7">	
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Jumlah Warna</span>
                                            <input type="text" class="form-control" id="jmlwarnabox21" value="4" >
											<span class="input-group-addon">/</span>
                                            <input type="text" class="form-control" id="jmlwarnabox22" value="0" >
                                            
                                        </div>
                                        </div>
                                        </div>
										<div class="col-md-5">	
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Lebar Tutup</span>
                                            <input type="text" class="form-control" id="lbrtutupbox2" placeholder="Lebar">
										</div>
										</div>
										</div>
										<!-- Tarikan -->
											<input type="hidden"  id="bbbox2" value="1">
										
	<div class="col-md-6">
		<div class="form-group">
			<div class="input-group">
	<span class="input-group-addon">Jenis</span>
 	<select name="bahanbox2" id="bahanbox2" class="custom-select form-control" data-source="//kalkulator.go/user/api/katbahan/box2/0" data-valueKey="id" data-displayKey="name" required>	 
	</select>
<script>
$("#bahanbox2").filter(function() {
$('select[data-source]').each(function() {
  var $select = $(this);
  $select.append('<option value="0">Pilih jenis</option>');
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

										<div class="col-md-6">	
										<div class="form-group">
										<select id="lambox2" class="selectpicker form-control" data-style="btn-warning">
											<option value="0" selected>Tanpa Laminasi</option>
											<option value="1">Varnish </option>
											<option value="3">Laminating Glosy </option>
											<option value="5">Laminating DOP </option>
										</select>
										</div>
										</div>
											<div class="col-md-5">
											<div class="form-group">
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="finishing4box2">
											  </span>
											  <Label class="form-control" >SpotUV</label>											 
											</div><!-- /input-group -->

											</div>
											</div>
                                    
										<div class="col-md-4">	
											<div class="input-group ">
											  <span class="input-group-addon">
												  <input type="checkbox" id="finishing1box2">
											  </span>
											  <Label class="form-control" >Poly</label>											 
											</div><!-- /input-group -->
											</div>
										<div class="col-md-12">	
										<div class="form-group">
                                           <div class="input-group">
											  <span class="input-group-addon">Lebar</span>
											  <input type="text" class="form-control" aria-label="" id="lbrpolybox2" value="1">
											  <span class="input-group-addon">Tinggi</span>
											  <input type="text" class="form-control" aria-label="" id="tgpolybox2" value="1">
											</div>
                                        </div>
                                        </div>
<div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Mesin</span>
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
									<!--harga-->
									<div class="col-md-12">	
                                        <div class="form-group">
										<div class="input-group">
										<span class="input-group-addon">Keterangan</span>
										<input type="text" class="form-control" aria-label="" id="ketbox2"  placeholder="Isi dulu keterangannya">
										</div>
										</div>
										</div>
									<div class="col-md-4">		
										<div class="form-group">
											<button  type="submit" class="btn btn-primary btnon" id="cekukuranbox2">Hitung</button>
											<?php echo cNavu('box2');?>
											<button type="button" class="btn btn-primary printpenawaran"><i class="fa fa-external-link" aria-hidden="true"></i></button>
										</div>		
									</div>		
	<div class="col-md-12">
	  <div class="w3-light-grey">
		<div id="myBar" class="w3-orange" style="height:5px;width:0"></div>
	  </div>
	</div>
<div class="col-xl-12">		
<form action="detail-hitung/" method="post" target="_blank">
<input type="hidden" id="token" name="token">
<input type="hidden" id="user"  name="user">	
<input type="hidden" id="modul" name="modul">
<div id="tablebox2"></div>
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
	  $("#tablebox2").show();
	  $("#myBar").hide();
    } else {
      width++; 
      elem.style.width = width + '%'; 
	  $("#tablebox2").hide();
	  $("#myBar").show();
    }
  }
}
$("#ket"+modulhit).keypress(function(e) {
    if (e.keyCode === 13) {
        hitungbox1(0);
    }
});
$( "#profits"+modulhit).keyup(function() {
	profit = $('#profits'+modulhit).val();
	tot = angka($('#totdumy'+modulhit).val());
	jual = parseFloat(profit * tot/100) + parseInt(tot);
	satuan = jual / $('#jmlcetakbox2').val();
	perrim = satuan * 500;
	$('#satuan'+modulhit).val(formatMoney(satuan));
	$('#hargarim'+modulhit).val(formatMoney(perrim));
	$('#total'+modulhit).val(formatMoney(jual));
})	
$(document).ready(function(){
	$('#lbrcetakbox2').val('10');
	$('#tgcetakbox2').val('8');
	$('#pjcetakbox2').val('20');
	$('#bbbox2').val('1');
	$('#lbrtutupbox2').val('1.5');

	$('#bx2').click(function(){	
	if( $('#detailbox2').length ){
		$('#detailbox2').remove();
	}	
	if( $('#detailkertasbox2').length ){
		$('#detailkertasbox2').remove();
	}		
	
	});		
	
	
})
function hitungbox2(){
		// var submit = x;
		var lbr = document.getElementById("lbrcetakbox2").value;
		var tg = document.getElementById("tgcetakbox2").value;
		var pj = document.getElementById("pjcetakbox2").value;
		var lebartutup = document.getElementById("lbrtutupbox2").value;
		var lebarlem = 1.5;
		
		lbrcetak 	= parseFloat(pj) + (2 * parseFloat(tg)) + (2 * parseFloat(lebartutup));
		tgcetak 	= (2 * parseFloat(tg)) + (2 * parseFloat(lbr)) + parseFloat(lebarlem);

		var jmlcetak = document.getElementById("jmlcetakbox2").value;
		var bahan = document.getElementById("bahanbox2").value;
		var bb = document.getElementById("bbbox2").value;
		var jmlwarna = document.getElementById("jmlwarnabox21").value;
		var jmlwarna2 = document.getElementById("jmlwarnabox22").value;
			if (jmlwarna=='Full Color'){
			jmlwarna=4;
			}
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}				
		var lam = document.getElementById("lambox2").value;
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

		
				
		var modul = 'box2';
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";	
		var ket = document.getElementById("ketbox2").value;
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
		if(document.getElementById("finishing4box2").checked == true ){
			finishing4 = '19';
			lbrf4= lbrcetak;
			tgf4 = tgcetak;
		}
		
		if(document.getElementById("finishing1box2").checked == true ){ //Poly
			lbrpolykop = document.getElementById("lbrpolybox2").value;
			tgpolykop = document.getElementById("tgpolybox2").value;
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
				if( $('#tablbox2').length ){
					$('#tablbox2 tr:gt(0)').remove();	
					var table = $('#tablbox2').children();					
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
						
						x +="<tr class='text-left'><td>"+data[i]['mesin']+"</td><td class='text-md-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:black;width:120px'>Rp."+formatMoney(jual)+"</button></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";
						
					}
					table.append(x);
					
					}else{
						
						$('#tablebox2').append("<div id='detailbox2' class='small'><table id='tablbox2' class='table table-striped mb-0' ><thead ><tr style='background-color:<?=$warnabar;?>;color:black' ><th class='text-md-left'>Mesin</th><th class='text-md-right'>Harga</th></tr></thead></table></div>");
							
					
					var table = $('#tablbox2').children();
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
						
						x +="<tr class='text-md-left'><td>"+data[i]['mesin']+"</td><td class='text-md-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:black;width:120px'>Rp."+formatMoney(jual)+"</button></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";
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
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&idmesin="+idmesin;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();			

		}

		
			
// function cekukuranbox2(){
		// move();
		// $("#profits"+modulhit).val('0');
		// $('.simpan').prop('disabled', this.value == "" ? true : false); 
		// $(".simpan").html('Simpan'); 
		// var lbr = document.getElementById("lbrcetakbox2").value;
		// var tg = document.getElementById("tgcetakbox2").value;
		// var pj = document.getElementById("pjcetakbox2").value;
		// var lebartutup = 3;
		// var lebarlem = 1.5;
		
		// lbrcetak 	= parseFloat(pj) + (2 * parseFloat(tg)) + (2 * parseFloat(lebartutup));
		// tgcetak 	= (2 * parseFloat(tg)) + (2 * parseFloat(lbr)) + parseFloat(lebarlem);

		// var xmlhttp = new XMLHttpRequest();

			// xmlhttp.onreadystatechange = function() {
			// if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				// myArr = JSON.parse(xmlhttp.responseText);
				// if (myArr[0].toString()=='N'){
					// alert('Ukuran Kebesaran');
					// return;
				// }else{
					// hitungbox2();
				// }
			// }
			// }
			  // xmlhttp.open("GET","function/cekukuran.php?lbrcetak="+lbrcetak+"&tgcetak="+tgcetak,true);
			  // xmlhttp.send();	
		// }
$("#cekukuranbox2").click(function(){
        var jmlcetak = $('#jmlcetakbox2').val();
        var idmesin = $('#idmesin').val();
		if(jmlcetak==''){
		alert('jumlah belum diisi');
		}else if(idmesin==0){
		alert('mesin belum dipilih');
		}else{
		var lbr = document.getElementById("lbrcetakbox2").value;
		var tg = document.getElementById("tgcetakbox2").value;
		var pj = document.getElementById("pjcetakbox2").value;
		var lebartutup = document.getElementById("lbrtutupbox2").value;
		
		lbrcetak 	= parseFloat(pj) + (2 * parseFloat(tg));
		tgcetak 	= (2 * parseFloat(tg)) + (2 * parseFloat(lbr)) + parseFloat(lebartutup);
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
			hitungbox2();
			}
            }
        });
		}
});
// $('.printpenawaran').click(function() {
// var value = $("#token").val();
// var urlencode = btoa(value);
// window.open('/penawaran-harga/' + urlencode, '_blank');
// });
</script>      
<style>
 th {
font-weight: bold; }
</style>
<?php
	}//end token
	else{
echo json_encode(array(404 => "error"));
	}
?>