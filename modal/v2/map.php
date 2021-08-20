<?php
if (empty($_SESSION['g_level'])){
header("Content-Type: application/json");
echo json_encode(array(401 => "error login"));
}else{
if (($referer==$host OR $referer==$_POST['link'])) {
$warnabar = "#1f918b";

?>
<script>
$(document).ready(function(){
$('.harga').hide();
$('.printpenawaran').hide();
$(".alert").hide();
     $('.btnon, .btnd, .btnp').prop('disabled',true);
	$('#jmlcetakm').keypress(validateNumber);
    $('#ketmap').keyup(function(){
        $('.btnon').prop('disabled', this.value == "" ? true : false);     
    })
}); 
$('.modal').on('hidden.bs.modal', function(){
	$(this).removeData('bs.modal');
});
</script>
<div class="modal-header" style="background-color:<?=$warnabar;?>;color:white;">
	<button type="button" class="close" id="m" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Cetak M A P</h4>
</div>
<div class="modal-body">

                    <div class="row" >
                        <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Jumlah Cetak</span>
											<input type="text" class="form-control" id="jmlcetakm" placeholder="Jumlah Cetak" autofocus>
                                        </div>
                                        </div>
                                        </div>
										<div class="col-md-6">
                                        <div class="form-group ukuran">
										<div class="input-group">
											<span class="input-group-addon">Ukuran Map Tertutup</span>
											<?php $sql_ukur = mysql_query("SELECT * FROM ukuran_kertas where modul like '%map%' ORDER BY ket_ukuran"); ?>
											<select id="ukuranm"  class="chosen-select form-control" onchange="cariukuranm()" data-style="btn-info" data-size="auto" data-placeholder='Pilih Ukuran' required="required"  >
												<?php while($row=mysql_fetch_array($sql_ukur)){ ?>
												<option value="<?=$row['id'];?>"><?=$row['ket_ukuran'];?></option>
												<?php } ?>
											</select>	
                                        </div> 
                                        </div>
                                        </div>
										<div class="col-md-7">
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Lebar</span>
                                            <input type="text" class="form-control" id="lbrcetakm" placeholder="Lebar">
											<span class="input-group-addon">Tinggi</span>
                                            <input type="text" class="form-control" onchange="cekukuranm()" id="tgcetakm" placeholder="Tinggi" >
											<span class="input-group-addon">cm</span>
                                        </div>
                                        </div>
									</div>	
										
										<div class="col-md-5">
											<div class="form-group">
											<div class="input-group ">
												<span class="input-group-addon">Lebar Kantong</span>
												<input type="text" class="form-control" id="lbrkantongmap" value="10">   
												<span class="input-group-addon">cm</span>
											</div><!-- /input-group -->
											</div>
											</div>
											                                           		
                                        <div class="col-md-6">
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Jenis Kertas</span>
											<?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where modul like '%map%' AND pub='Y' ORDER BY id_kategori"); ?>
											<select id="bahanm"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
												<?php while($row=mysql_fetch_array($sql_bhn)){ ?>
												<option value="<?=$row['id_kategori'];?>"><?=$row['nama_kategori'];?></option>
												<?php } ?>
											</select>	
                                        </div>
                                        </div>
                                        </div>
										<div class="col-md-6">									
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Jumlah Warna</span>
											<input type="text" class="form-control" aria-label="" id="jmlwarnam" value="4" >
											<span class="input-group-addon">/</span>
											<input type="text" class="form-control" aria-label="" id="jmlwarnam2" value="0" >
                                        </div>
                                        </div>
                                        </div>

										<div class="col-md-6">
										<div class="form-group">
										<select id="lamm" class="selectpicker form-control" data-style="btn-warning">
											<option value="0" selected>Tanpa Laminasi</option>
											<option value="1">Varnish Satu Muka</option>
											<option value="2">Varnish Bolak-balik</option>
											<option value="3">Laminating Glosy Satu Muka</option>
											<option value="4">Laminating Glosy BB</option>
											<option value="5">Laminating DOP Satu Muka</option>
											<option value="6">Laminating DOP BB</option>
										</select>
										</div>
										</div>
										
                                    
											 <div class="col-md-6">	
											 <div class="form-group">
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="finishing4m">
											  </span>
											  <Label class="form-control" >SpotUV</label>											 
											</div><!-- /input-group -->
											</div>
											</div>
											<div class="col-md-6">
											<div class="form-group">											
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="finishing5m" checked value="1">
											  </span>
											  <Label class="form-control" >Lem</label>
											</div><!-- /input-group -->
											</div>
											</div>
											
											<div class="col-md-6">
											<div class="form-group">
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="cetakkantonggabung" checked value="1">
											  </span>
											  <Label class="form-control" >Centang Jika Kantong dicetak Gabung</label>
											</div>
											</div>
											</div>
											<div class="col-md-6 kantongpolos ">
											<div class="form-group ">
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="kantongpolos" checked value="0">
											  </span>
											  <Label class="form-control" >Centang Jika Kantong Polos</label>
											</div>
											</div>		
											</div>
											<div class="col-md-6 jmlwarnakantong">									
											<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">Jml Warna Kantong</span>
												<input type="text" class="form-control" id="jmlwarnakantong" value="Full Color" >
												<p class="help-block text-danger"></p>
											</div>
											</div>											
											</div>		
											
											
											
									<div class="col-md-8">	
                                        <div class="form-group">
										<div class="input-group">
										<span class="input-group-addon">Keterangan</span>
										<input type="text" class="form-control" aria-label="" id="ketmap"  placeholder="Isi dulu keterangannya">
										</div>
										</div>
									</div>
                                        <div class="col-md-4">	
                                        <div class="form-group">
											<button type="submit" class="btn btn-primary btnon" onclick="cekukuranm()">Hitung</button>
											<?php echo cNav('map');?>
											<button type="button" class="btn btn-primary printpenawaran"><i class="fa fa-external-link" aria-hidden="true"></i></button>	
                                        </div>                                        
                                        </div> 
	  <div class="col-md-12">
	     <div class="progress progress-striped active" style="height:5px;">
          <div class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;height:5px;">
          </div>
        </div>
        </div>


	<div class="col-md-12">
		<div class="form-group">
			<form action="detail-hitung/" method="post" target="_blank">
			<input type="hidden" id="token" name="token">
			<input type="hidden" id="user"  name="user">	
			<input type="hidden" id="modul" name="modul">
				<input type="hidden" name="data1[]" id="data1"  value="">
				<input type="hidden" name="data2[]" id="data2" value="">
				<input type="hidden" name="ket" id="ket" value="">
				<input type="hidden" name="jumlahcetak" id="jumlahcetak" value="">
				
				<div id='tablemap' class='small'>
				<table id='tablemap' class='table table-striped table-responsive' >
				<thead >
				<tr style='background-color:<?=$warnabar;?>;color:white' >
				<th class='text-left'>Harga Jual</th><th></th>
				</tr>
				</thead>
				
				<tr><td class='text-left'> <span id="satuan"></span></td><td class='text-right' ><button type='submit' name='submit' value='0' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px' onclick="this.form.submit()"><span id="totjual"></span></button></td></tr>
				</table>												
				
				</div>
			</form> 
		</div>                                        
	</div>
										


                        </div>
                    </div>



            </div>      
<script>
$(document).ready(function(){
	$('#ukuranm').val('20');
	$('#lbrcetakm').val('25');
	$('#tgcetakm').val('36');
	$('#bbm').val('1');
	$('.kantongpolos').hide();
	$('.jmlwarnakantong').hide();
	$('#jmlwarnakantong').val(0);
	$('#tablemap').hide();
	$('.harga').hide();
	
})

	$( "#profits"+modulhit).keyup(function() {
		profit = $('#profits'+modulhit).val();
		tot = angka($('#totdumy'+modulhit).val());
		jual = parseFloat(profit * tot/100) + parseInt(tot);
		satuan = jual / $('#jmlcetakm').val();
		perrim = satuan * 500;
		$('#satuan'+modulhit).val(formatMoney(satuan));
		$('#hargarim'+modulhit).val(formatMoney(perrim));
		$('#total'+modulhit).val(formatMoney(jual));
	})	
		
	$('#cetakkantonggabung').click(function(){	
	 if ( $('#cetakkantonggabung').attr('checked')) {
        $('#cetakkantonggabung').attr('checked', false);
			$('.kantongpolos').show();
    } else {
        $('#cetakkantonggabung').attr('checked', 'checked');
			$('.kantongpolos').hide();
    }
	});	
	
	$('#kantongpolos').click(function(){
	
	 if ( $('#kantongpolos').attr('checked')) {
        $('#kantongpolos').attr('checked', false);
			$('.jmlwarnakantong').show();
    } else {
        $('#kantongpolos').attr('checked', 'checked');
			$('.jmlwarnakantong').hide();
    }
	});	
	

</script>

			
  <script type="text/javascript">


function hitungkantong(x){

		var data1 = x;	
		var tgcetak = parseFloat(document.getElementById("lbrkantongmap").value) + 1.5;
		var lbrcetak = parseFloat(document.getElementById("lbrcetakm").value) + 1.5;
		var bahan = document.getElementById("bahanm").value;
		var jmlcetak = document.getElementById("jmlcetakm").value;

		var bb = 1;
		var jmlwarna = document.getElementById("jmlwarnakantong").value;			 
		var lam = 0;
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
		
		var modul="map";
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";
		var ket = document.getElementById("ketmap").value;
		var ket_satuan = "pcs";
		var rim = 500;
		var box = 100;
		var ongpot = 'Y';	
		
		var kethitung = 'Kantong';
		
		if(document.getElementById("cetakkantonggabung").checked == false ){
			
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				var data2 = myArr[0];
				hasilmap(data1,data2);
				}
			}
			
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&kethitung="+kethitung;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();	
		}else{
			var data2 = {};
			hasilmap(data1,data2);
		}	
			
}		
		
function hasilmap(data1,data2){	
		// var modul="map";
		var ket = document.getElementById("ketmap").value;

	
		if (data1['ongpot'] == 'Y' ){ ongkos_potong = data1['ongkos_potong'];}else{ ongkos_potong = 0; }				
		subtotal1 = parseInt(data1['totcetak']) + parseInt(data1['totbhn']) + parseInt(ongkos_potong) + parseInt(data1['tot_ctp']) + parseInt(data1['totlaminating']) + parseInt(data1['finishing1']) + parseInt(data1['finishing2']) + parseInt(data1['finishing3']) + parseInt(data1['finishing4']) + parseInt(data1['finishing5']) + parseInt(data1['finishing6']);
		var arrStr1 = btoa(encodeURIComponent(JSON.stringify(data1)));
		
//data2
		if(!!(data2['hrgbhn'])){
				if (data2['ongpot'] == 'Y' ){ ongkos_potong = data2['ongkos_potong'];} else{ ongkos_potong = 0; }				
				subtotal2 = parseInt(data2['totcetak']) + parseInt(data2['totbhn']) + parseInt(ongkos_potong) + parseInt(data2['tot_ctp']) + parseInt(data2['totlaminating']) + parseInt(data2['finishing1']) + parseInt(data2['finishing2']) + parseInt(data2['finishing3']) + parseInt(data2['finishing4']) + parseInt(data2['finishing5']) + parseInt(data2['finishing6']);
				var arrStr2 = btoa(encodeURIComponent(JSON.stringify(data2)));
			}else{
				var subtotal2 = '0';
				var arrStr2 = '';
			}	
	
				total  = parseInt(subtotal1)+ parseInt(subtotal2);  		
				profit = data1['persen'];
				jual = (parseInt(total) * profit / 100) + parseInt(total);
				satuan = jual / parseInt($('#jmlcetakm').val());
				perrim = satuan *  500;
		
	
			//	alert(arrStr1);
				$('#data1').val(arrStr1);
				$('#data2').val(arrStr2);
				$('#jumlahcetak').val($('#jmlcetakm').val());
				$('#ket').val(ket);
				$('#totjual').html("Rp. " + formatMoney(jual));
				$('#satuan').html("Rp. " + formatMoney(satuan) + "/pcs");
				$('#modul').val(modul);
			if( level == 'admin' || level == 'member' ){
				setTimeout(function(){ $('#tablemap').show(); }, 500); 
			}else{
				$('.harga').show();
				$('#satuan'+modulhit).val(formatMoney(satuan));
				$('#hargarim'+modulhit).val(formatMoney(perrim));
				$('#total'+modulhit).val(formatMoney(jual));
				$('#totdumy'+modulhit).val(formatMoney(jual));
				$('#data'+modulhit).val(arrStr);
				$('#modul').val(modul);
			}
}	

function hitungmap(){		
		var lbrcetak = document.getElementById("lbrcetakm").value;
		var tgcetak = document.getElementById("tgcetakm").value;
		var lbrkantongmap = document.getElementById("lbrkantongmap").value;
		
		var jmlcetak = document.getElementById("jmlcetakm").value;
		var bahan = document.getElementById("bahanm").value;
		var bb = "";
		var jmlwarna = document.getElementById("jmlwarnam").value;
		var jmlwarna2 = document.getElementById("jmlwarnam2").value;
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}				
		
		var lam = document.getElementById("lamm").value;
		var jmlset = 1;
		var lbrf1= 1;		var tgf1 = 1;		
		var lbrf2= 1;		var tgf2 = 1;		
		var lbrf3= 1;		var tgf3 = 1;		
		var lbrf4= 1;		var tgf4 = 1;		
		var lbrf5= 1;		var tgf5 = 1;
		var lbrf6= 1;						var tgf6 = 1;
		var finishing1 = '0';
		var finishing2 = '0'; //Biaya Pon
		var finishing3 = '0'; // Pisau Pon
		var finishing4 = '0';
		var finishing5 = '0';
		var finishing6 = '0';		
		
		var modul="map";
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";
		var ket = document.getElementById("ketmap").value;
		var ket_satuan = "lbr";
		var rim = 500;
		var box = 100;
		var ongpot = 'Y';
		var kethitung = 'Map';
			
		
		if(document.getElementById("cetakkantonggabung").checked == true ){
			lbrcetak = parseFloat(lbrcetak) * 2;
			tgcetak = parseFloat(tgcetak) + parseFloat(lbrkantongmap) ;	
			lbrf3= lbrcetak/jmlcetak; //karena di fungsihitung dikalikan jumlah cetak
			tgf3 = tgcetak;
			finishing2 = '12'; //Biaya Pon
			finishing3 = '13'; // Pisau Pon			
			ongpot = 'N';
		}else{
			lbrcetak = parseFloat(lbrcetak) * 2;
			tgcetak = parseFloat(tgcetak);
			lbrf3= 1/jmlcetak; //karena di fungsihitung dikalikan jumlah cetak
			//finishing2 = '12'; //Biaya Pon
		//	finishing3 = '13'; // Pisau Pon		
		}
		

		if(document.getElementById("finishing4m").checked == true ){
			finishing4 = '19';
			lbrf4= lbrcetak;
			tgf4 = tgcetak;

		}
		if(document.getElementById("finishing5m").checked == true ){
			finishing5 = '49';
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
		//alert(lbrcetak + 'x' + tgcetak);
		var xmlhttp = new XMLHttpRequest();
		 xmlhttp.addEventListener("progress", function (evt)
		 {if (evt.lengthComputable){var percentComplete = (evt.loaded / evt.total) *100;
		 $('.progress').show();
		$('#tablemap').hide();
		 $("div.progress > div.progress-bar").css({ "width": percentComplete + "%" }); 
		if(percentComplete){setTimeout(function(){$(".progress-bar").css('background','green');}, 500);}}},false);
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				data1 = myArr[0];
				hitungkantong(data1);				
			}
			}
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&kethitung="+kethitung;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();		

		}
		
		
		function cekukuranm(){
		$(".progress-bar").css('background','red'); 
		$(".progress-bar").css('width','1%');
		$('.simpan').prop('disabled', this.value == "" ? true : false); 
		$('.simpan').html('Simpan');
		$("#profits"+modulhit).val('0');
		var lbrcetak = document.getElementById("lbrcetakm").value;
		var tgcetak = document.getElementById("tgcetakm").value;
		var lbrkantongmap = document.getElementById("lbrkantongmap").value;
		if(document.getElementById("cetakkantonggabung").checked == true ){
			lbrcetak = parseFloat(lbrcetak) * 2;
			tgcetak = parseFloat(tgcetak) + parseFloat(lbrkantongmap) ;			
		}else{
			lbrcetak = lbrcetak * 2;
			tgcetak = tgcetak;
		}
			var xmlhttp = new XMLHttpRequest();

			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				if (myArr[0].toString()=='N'){
				alert('Ukuran Kebesaran');
				document.getElementById("tgcetakm").value = 0;
				document.getElementById("lbrcetakm").value = 0;
				}else{
					hitungmap();
				}
			}
			}
			  xmlhttp.open("GET","function/cekukuran.php?lbrcetak="+lbrcetak+"&tgcetak="+tgcetak,true);
			  xmlhttp.send();	
		}
	$('.printpenawaran').click(function() {
		var value = $("#token").val();
		var urlencode = btoa(value);
		window.open('/penawaran-harga/' + urlencode, '_blank');
	});
</script>      
<style>
 th {
font-weight: bold;
text-align: center; }

.table > thead > tr > th {
    vertical-align: middle;
}

</style>
<?php
	}//end token
	else{
echo json_encode(array(404 => "error"));
	}
}
?>