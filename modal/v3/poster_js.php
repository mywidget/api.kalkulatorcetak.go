<?php
if (($referer==$host OR $referer==$_POST['link'])) {
$warnabar = "#ef8700";
?>
<script>
$(document).ready(function(){
$('.harga').hide();
$('.printpenawaran').hide();
$(".alert").hide();
   $('.btnon, .btnd, .btnp').prop('disabled',true);
	$('#jmlcetakp').keypress(validateNumber);
    $('#ketposter').keyup(function(){
        $('.btnon').prop('disabled', this.value == "" ? true : false);     
    })
}); 
$('.modal').on('hidden.bs.modal', function(){
	$(this).removeData('bs.modal');
});
</script>
<div class="modal-header" style="background-color:<?=$warnabar;?>;color:white;">
	<h4 class="modal-title">Cetak Poster</h4>
	<button type="button" class="close" id="p" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
                                   <div class="form-row">
                                       <div class="form-group col-md-6">
										<div class="input-group">
											<span class="input-group-text bg-danger text-white" id="not1" >Jumlah Cetak</span>
											<input type="text" class="form-control" id="jmlcetakp" placeholder="0" autofocus>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        </div>

										<div class="form-group col-md-6 ukuran">
          <div class="input-group">
		  <div class="input-group-append">
            <span class="input-group-text ">Ukuran cetak</span>
			</div>
			<select name="ukuranp" id="ukuranp" class="custom-select form-control" required>	 
			</select>
          </div>

                                        </div> 
                                        </div> 
										 <div class="form-row">
										<div class="form-group col-md-8">
										<div class="input-group">
											<span class="input-group-text">Lebar</span>
                                            <input type="text" class="form-control"  id="lbrcetakp" placeholder="Lebar">
											<span class="input-group-text">Tinggi</span>
                                            <input type="text" class="form-control" onchange="cekukuranp()" id="tgcetakp" placeholder="Tinggi" >
											<span class="input-group-text">cm</span>
                                        </div>  
                                        </div>  
										<div class="form-group col-md-4">
											<div class="input-group">
											  <span class="input-group-text">Bleed</span>
											  <input type="text" class="form-control" aria-label="" id="bleedp" value="0.4">
											</div>
										</div>
										</div>
										 <div class="form-row">
										<div class="form-group col-md-5">
										<div class="input-group">
											<span class="input-group-text">Jml Warna</span>
                                            <input type="text" class="form-control" id="jmlwarnap" value="4" >
                                        </div>
                                        </div>
                                       
          <div class="input-group col-md-7">
            <span class="input-group-text  bg-danger text-white" id="not2">Mesin</span>
 <select name="idmesin" id="idmesin" class="custom-select form-control" data-mesin="//kalkulator.go/user/api/mesin/brosur/0" data-valueKey="id" data-displayKey="name" required>	 
</select>
          </div>
        </div>
  <div class="form-row">
        <div class="form-group col-md-6">
          <div class="input-group">
	<span class="input-group-text  bg-danger text-white">Bahan</span>
 <select name="bahanp" id="bahanp" class="custom-select form-control" data-source="//kalkulator.go/user/api/katbahan/poster/0" data-valueKey="id" data-displayKey="name" required>	 
</select>
          </div>
        </div>
<div class="input-group col-md-6">
	<span class="input-group-text  bg-danger text-white">Uk.plano</span>
<select id="idkertas" name="idkertas" class="custom-select form-control">
   <option value="0">- Pilih ukuran -</option>
</select>
</div>


        </div>
<div class="form-row">
										<div class="form-group col-md-6">
										<select id="lamp" class="custom-select form-control" data-style="btn-warning">
											<option value="0" selected>Tanpa Laminasi</option>
											<option value="1">Varnish Satu Muka</option>
											<option value="3">Laminating Glosy Satu Muka</option>
											<option value="5">Laminating DOP Satu Muka</option>
										</select>
										</div>
					
											 <div class="form-group col-md-6">
											<div class="input-group ">
											  <span class="input-group-text">
												<input type="checkbox" id="finishing4p">
											  </span>
											  <Label class="form-control" >SpotUV</label>											 
											</div><!-- /input-group -->
											</div>
											</div>
									<div class="form-row">
                                        <div class="form-group col-md-9">
										<div class="input-group">
										<span class="input-group-text  btn btn-warning">Keterangan</span>
										<input type="text" class="form-control" aria-label="" id="ketposter"  placeholder="Isi dulu keterangannya">
										</div>
										</div>
										
                                        <div class="form-group col-md-3">
											<button  type="submit" class="btn btn-primary btnon" id="cekukuran">Hitung</button>
											<button type="button" class="btn btn-primary printpenawaran"><i class="fa fa-external-link" aria-hidden="true"></i></button>
                                        </div>                                        
                                    </div>
<div class="form-row text-center mt-1">
	<div class="col-md-12 display-hidden" id="hidemyBar">
	  <div class="w3-light-grey">
		<div id="myBar" class="w3-deep-orange" style="height:5px;width:0"></div>
	  </div>
	</div>
</div>
<div class="form-row text-center">
<form action='/detail-hitung/' method='post' target='_blank'>
			<input type="hidden" id="token" name="token">
			<input type="hidden" id="user"  name="user">	
			<input type="hidden" id="modul" name="modul">
<div id="tableposter"></div>
</form>
</div>
   </div><!--E:modal-body-->
<script>
$(document).ready(function(){
    $("#bahanp").change(function(){
        var deptid = $(this).val();

        $.ajax({
            url: '/global/kertas/',
            type: 'post',
            data: {depart:deptid},
            dataType: 'json',
            success:function(response){
                var len = response.length;
                $("#idkertas").empty();
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    $("#idkertas").append("<option value='"+id+"'>"+name+"</option>");
                }
            }
        });
    });
$("#bahanp").filter(function() {
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
	$('#lbrcetakp').val('21');
	$('#tgcetakp').val('29.7');
$("#ukuranp").filter(function() {
       var deptid = 10;
        $.ajax({
            url: protocol + '://'+host+'/global/api/ukuran/poster/10',
            type: 'GET',
            dataType: 'json',
            success:function(response){
                var len = response.length;
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    $("#ukuranp").append("<option value='"+id+"'>"+name+"</option>");
                }
            }
        });
});
 $("#ukuranp").change(function(){
        var ukuran = $(this).val();
        $.ajax({
            url: protocol + '://' + host + '/api/cariukuran',
            type: 'POST',
            data: {ukuran:ukuran},
            dataType: 'json',
            success:function(response){
			if(response[0]==0.0){
			$('#lbrcetakp,#tgcetakp').attr('readonly', false);
			$('#lbrcetakp').val(response[0]);
			$('#tgcetakp').val(response[1]);
			}else{
			$('#lbrcetakp,#tgcetakp').attr('readonly', true);
			$('#lbrcetakp').val(response[0]);
			$('#tgcetakp').val(response[1]);
			}
            }
        });
});

function move() {
  var elem = document.getElementById("myBar");   
  var width = 1;
  var id = setInterval(frame, 10);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
	  $("#tableposter").show();
	  $("#myBar").hide();
    } else {
      width++; 
      elem.style.width = width + '%'; 
	  $("#hidemyBar").removeClass("display-hidden");
	  $("#tableposter").hide();
	  $("#myBar").show();
    }
  }
}
$(document).ready(function(){
$( "#profits"+modulhit).keyup(function() {
	profit = $('#profits'+modulhit).val();
	tot = angka($('#totdumy'+modulhit).val());
	jual = parseFloat(profit * tot/100) + parseInt(tot);
	satuan = jual / $('#jmlcetakp').val();
	perrim = satuan * 500;
	$('#satuan'+modulhit).val(formatMoney(satuan));
	$('#hargarim'+modulhit).val(formatMoney(perrim));
	$('#total'+modulhit).val(formatMoney(jual));
})
	
	$('#ukuranp').val('10');
	$('#lbrcetakp').val('21');
	$('#tgcetakp').val('29.7');
	
	$('#p').click(function(){	
	if( $('#detailpos').length ){
		$('#detailpos').remove();
	}	
	});	
	
})

		function hitungp() {
			
		$('.btnd, .btnp').prop('disabled', this.value == "" ? true : false);
		
		var bleed = document.getElementById("bleedp").value;
		var lbrcetak = parseFloat(document.getElementById("lbrcetakp").value) + ( 2 * parseFloat(bleed));
		var tgcetak = parseFloat(document.getElementById("tgcetakp").value) + ( 2 * parseFloat(bleed));
		
		var jmlcetak = document.getElementById("jmlcetakp").value;
		var bahan = document.getElementById("bahanp").value;
		// alert(level);
		var bb = 1;
		var jmlwarna = document.getElementById("jmlwarnap").value;
			if (jmlwarna=='Full Color'){
			jmlwarna=4;
			}
			if (jmlwarna != null && jmlwarna < 1){
				alert("Jumlah Warna Minimal 1!!");
				return;
			}				

		var lam = document.getElementById("lamp").value;
		var jmlset = 1;
		var lbrf1= 1;		var tgf1 = 1;		
		var lbrf2= 1;		var tgf2 = 1;		
		var lbrf3= 1;		var tgf3 = 1;		
		var lbrf4= 1;		var tgf4 = 1;		
		var lbrf5= 1;		var tgf5 = 1;
		var lbrf6= 1; 		var tgf6 = 1;
		//global
		var lbrf7= 0; 		var tgf7 = 0;
		var lbrf8= 0; 		var tgf8 = 0;
		var lbrf9= 0; 		var tgf9 = 0;
		var lbrf10= 0; 		var tgf10 = 0;
		//
		var finishing6 = '0';		
		var finishing1 = 0;
		var finishing2 = 0;
		var finishing3 = 0;
		var finishing4 = 0;
		var finishing5 = 0;
		

		var cetak_bagi="Y";
		var modul="poster";
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";
		var ket = document.getElementById("ketposter").value;
		var ket_satuan = "lbr";
		var rim = 500;
		var box = 100;
		var idmesin = $('#idmesin').val();
		var idkertas = $('#idkertas').val();
		var j_mesin = '';
		var kethitung = '';
		var ongpot = 'Y';
		var tarikan = '';
		var pakeplat = '';

		if(document.getElementById("finishing4p").checked == true ){
			finishing4 = '19';
			lbrf4= lbrcetak;
			tgf4 = tgcetak;
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
		// alert(lbrcetak);
		var xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function () {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				
				data = myArr;
					
				if( $('#tablpos').length ){
					$('#tablpos tr:gt(0)').remove();	
					var table = $('#tablpos').children();					
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
						
						x +="<tr class='text-md-left'><td>"+data[i]['mesin']+"</td><td class='text-md-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";	
						
					}
					table.append(x);
					}else{
						
						$('#tableposter').append("<div id='detailpos' class='small'><table id='tablpos' class='table table-striped' ><thead ><tr style='background-color:<?=$warnabar;?>;color:white' ><th  class='text-left' style='width:30%'>Mesin</th><th class='text-right'>Harga</th></tr></thead></table></div>");
							
					
					var table = $('#tablpos').children();
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
						x +="<tr class='text-md-left'><td>"+data[i]['mesin']+"</td><td class='text-md-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";	
					}

					table.append(x);
					}	

			}
			}
			var isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2=0&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&finishing7=0&finishing8=0&finishing9=0&finishing10=0&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung+"&idmesin="+idmesin+"&idkertas="+idkertas+"&tarikan="+tarikan+"&lbrf7="+lbrf7+"&tgf7="+tgf7+"&lbrf8="+lbrf8+"&tgf8="+tgf8+"&lbrf9="+lbrf9+"&tgf9="+tgf9+"&lbrf10="+lbrf10+"&tgf10="+tgf10+"&pakeplat="+pakeplat+"&ongkos_lipat=0&jilid=0";
			
			var url='/sandbox/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(isi);
		}
		
$("#cekukuran").click(function(){
        var jmlcetak = $('#jmlcetakp').val();
        var ukuran = $('#ukuranp').val();
        var idmesin = $('#idmesin').val();
        var bahan = $('#bahanp').val();
		$('#not1, #not2, #not3').removeClass("blink-bg");
		if(jmlcetak==''){
		alertx('Jumlah belum diisi','not1');
		}else if(ukuran==0){
		alertx('ukuran belum dipilih');
		}else if(idmesin==0){
		alertx('mesin belum dipilih','not2');
		}else if(bahan==0){
		alertx('bahan belum dipilih','not3');
		}else{
		var bleed = $('#bleedp').val();
		var lbrcetak = parseFloat($('#lbrcetakp').val()) + ( 2 * parseFloat(bleed));
		var tgcetak = parseFloat($('#tgcetakp').val()) + ( 2 * parseFloat(bleed));
        $.ajax({
            url: '/api/cekukuran/',
            type: 'POST',
            data: {mesin:idmesin,lbrcetak:lbrcetak,tgcetak:tgcetak},
            dataType: 'json',
			beforeSend: function(){
				$('#not1').removeClass("blink-bg");
			},
            success:function(response){
			if (response[0].toString()=='N'){
			alertx('Ukuran Kebesaran');
			}else{
			move();
			hitungp();
			}
            }
        });
		}
});
function alertx(str,id){
	$('#notif').html(str);
	$('#'+id).addClass("blink-bg");
$(".notif .alert").fadeTo(2000, 500).slideUp(500, function() {
      $(".notif .alert").slideUp(500);
    });
}
</script>      
<style>
 th {
font-weight: bold;
text-align: center; }

.table > thead > tr > th {
    vertical-align: middle;
}
.blink-text{
		color: #fdfdff;
		font-weight: bold;
		animation: blinkingText 2s infinite;
	}
	@keyframes blinkingText{
		0%		{ color: #10c018;}
		25%		{ color: #1056c0;}
		50%		{ color: #ef0a1a;}
		75%		{ color: #254878;}
		100%	{ color: #04a1d5;}
	}
.blink-bg{
		color: #fff;
		animation: blinkingBackground 2s infinite;
	}
	@keyframes blinkingBackground{
		0%		{ background-color: #10c018;}
		25%		{ background-color: #1056c0;}
		50%		{ background-color: #ef0a1a;}
		75%		{ background-color: #254878;}
		100%	{ background-color: #04a1d5;}
	}
</style>
<?php
	}//end token
	else{
echo json_encode(array(404 => "error"));
	}
?>