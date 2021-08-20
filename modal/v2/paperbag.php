<?php
if (empty($_SESSION['g_level'])){
header("Content-Type: application/json");
echo json_encode(array(401 => "error login"));
}else{
if (($referer==$host OR $referer==$_POST['link'])) {
$warnabar = "#ed2300";
?>
<script>
$(document).ready(function(){
$('.harga').hide();
$('.printpenawaran').hide();
$(".alert").hide();
	$('#print_foot').hide();
   $('.btnon, .btnd, .btnp').prop('disabled',true);
	$('#jmlcetakpb').keypress(validateNumber);
    $('#ketpb').keyup(function(){
        $('.btnon').prop('disabled', this.value == "" ? true : false);     
    })
}); 

</script>
<div class="modal-header" style="background-color:<?=$warnabar;?>;color:white;">
	<button type="button" class="close" id="pb" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Cetak Paper Bag</h4>
</div>
<div class="modal-body">
                   
                                    <div class="col-md-12">
                                        <div class="form-group">
											<div class="input-group">
											  <span class="input-group-addon">Jumlah Cetak</span>
											  <input type="text" class="form-control" aria-label="" id="jmlcetakpb" autofocus>
											  <span class="input-group-addon">pcs</span>
											</div>
										</div>
									</div>
                                    <div class="col-md-12">
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Lebar</span>
                                            <input type="text" class="form-control" onchange="cekukuranpb()" id="pjcetakpb" placeholder="Panjang">
											<span class="input-group-addon">Tinggi</span>
                                            <input type="text" class="form-control" onchange="cekukuranpb()" id="tgcetakpb" placeholder="Tinggi" >
											<span class="input-group-addon">Lebar Samping</span>
                                            <input type="text" class="form-control" onchange="cekukuranpb()"  id="lbrcetakpb" placeholder="Lebar">
                                        </div>
                                        </div>
                                     </div>
																														
                                    <div class="col-md-6">
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Jumlah Warna</span>
                                            <input type="text" class="form-control" id="jmlwarnapb" value="Full Color" >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        </div>
                                    </div>
									<div class="col-md-6">
										<div class="form-group">
										<div class="input-group ">
										  <span class="input-group-addon">
											<input type="checkbox" id="bagi2">
										  </span>
										  <Label class="form-control" >Cetak bagi 2 (Bila tidak muat)</label>											 
										</div><!-- /input-group -->
										</div>
									</div>
										<!-- Tarikan -->
									 <div class="col-md-12">	                                        
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Jenis Kertas</span>
											<?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where modul like '%paperbag%' AND pub='Y' ORDER BY id_kategori"); ?>
											<select id="bahanpb"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
												<?php while($row=mysql_fetch_array($sql_bhn)){ ?>
												<option value="<?=$row['id_kategori'];?>"><?=$row['nama_kategori'];?></option>
												<?php } ?>
											</select>	
                                        </div>
                                        </div>
                                     </div>
									 <div class="col-md-6">
									<div class="form-group">
										<select id="lampb" class="selectpicker form-control" data-style="btn-warning">
											<option value="0" selected>Tanpa Laminasi</option>
											<option value="1">Varnish </option>
											<option value="3">Laminating Glosy </option>
											<option value="5">Laminating DOP </option>
										</select>
										</div>
									</div>
									
									<div class="col-md-6">	
									<div class="form-group">
									<div class="input-group ">
									  <span class="input-group-addon">
										<input type="checkbox" id="finishing4pb">
									  </span>
									  <Label class="form-control" >SpotUV</label>											 
									</div><!-- /input-group -->
									</div>
									</div>
									
									<div class="col-md-5">
											<div class="form-group">										
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="finishingpb">
											  </span>
											  <Label class="form-control" >Poly</label>											 
											</div><!-- /input-group -->
											</div>
										</div>
									<div class="col-md-7">	
									<div class="form-group">
									   <div class="input-group">
										  <span class="input-group-addon">Lebar</span>
										  <input type="text" class="form-control" aria-label="" id="lbrpolypb" value="1">
										  <span class="input-group-addon">Tinggi</span>
										  <input type="text" class="form-control" aria-label="" id="tgpolypb" value="1">
										  <span class="input-group-addon">cm</span>
										</div>
									</div>
									</div>
									<div class="col-md-12">	                                        
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Kertas u/ Lapisan Bawah</span>
											<?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where modul like '%paperbag%' AND pub='Y' ORDER BY id_kategori"); ?>
											<select id="kertasbawah"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
												<?php while($row=mysql_fetch_array($sql_bhn)){ ?>
												<option value="<?=$row['id_kategori'];?>"><?=$row['nama_kategori'];?></option>
												<?php } ?>
											</select>	
                                        </div>
                                        </div>
                                     </div>

                                    <div class="col-md-8">	
                                        <div class="form-group">
										<div class="input-group">
										<span class="input-group-addon">Keterangan</span>
										<input type="text" class="form-control" aria-label="" id="ketpb"  placeholder="Isi dulu keterangannya">
										</div>
										</div>
									</div>													
                                    <div class="col-md-4">		
                                        <div class="form-group">
											<button type="submit" class="btn btn-primary btnon" onclick="hitungpb()">Hitung</button>
											<?php echo cNav('paperbag');?>
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
		<div class="form-group">
			 <form action="detail-hitung/" method="post" target="_blank">
			 <input type="hidden" id="token" name="token" value="<?=$ssid;?>">
			<input type="hidden" id="user"  value="<?=$_SESSION['mailuser'];?>">	
			<input type="hidden" id="modul">
				<input type="hidden" name="data1[]" id="data1"  value="">
				<input type="hidden" name="data2[]" id="data2" value="">
				<input type="hidden" name="ket" id="ket" value="">
				<input type="hidden" name="jumlahcetak" id="jumlahcetak" value="">
				
				<div id='tablepb' class='small'>
				<table id='tablepb' class='table table-striped table-responsive' >
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
<script>
$(document).ready(function(){
	$('#ukuranpb').val('20');
	$('#lbrcetakpb').val('10');
	$('#tgcetakpb').val('30');
	$('#pjcetakpb').val('22');
	$('#bbpb').val('1');
	$('#kertasbawah').val('13');
	$('#bahanpb').val('3');

	$('#tablepb').hide();
	$('.harga').hide();
	
})

	$( "#profits"+modulhit).keyup(function() {
		profit = $('#profits'+modulhit).val();
		tot = angka($('#totdumy'+modulhit).val());
		jual = parseFloat(profit * tot/100) + parseInt(tot);
		satuan = jual / $('#jmlcetakpb').val();
		perrim = satuan * 500;
		$('#satuan'+modulhit).val(formatMoney(satuan));
		$('#hargarim'+modulhit).val(formatMoney(perrim));
		$('#total'+modulhit).val(formatMoney(jual));
	})	
</script>

			
  <script type="text/javascript">
		
// function hitungkertaspb(data1){
		
		// var lbrcetak = parseFloat(document.getElementById("lbrcetakpb").value) - 1;
		// var tgcetak = parseFloat(document.getElementById("pjcetakpb").value) - 1;
		// var bahan = document.getElementById("kertasbawah").value;
		// var jmlcetak = document.getElementById("jmlcetakpb").value;
		// var bb = '1';
		// var jmlwarna = "";	
		// var lam = 0;
		// var jmlset = 1;

		// var lbrf1= 1;		var tgf1 = 1;		
		// var lbrf2= 1;		var tgf2 = 1;		
		// var lbrf3= 1;		var tgf3 = 1;		
		// var lbrf4= 1;		var tgf4 = 1;		
		// var lbrf5= 1;		var tgf5 = 1;
		// var lbrf6= 1;						var tgf6 = 1;
		// var finishing5 = '0';		
		// var finishing1 = 0;
		// var finishing2 = 0;
		// var finishing3 = 0;
		// var finishing4 = 0;
		// var finishing6 = '0'; //Ongkos Lem
		
		// var cetak_bagi='N';
		// var jml_satuan = 1;
		// var modul = 'paperbag';
		// var insheet = "1";
		// var ket = document.getElementById("ketpb").value;
		// var ket_satuan = "pcs";
		// var rim = 500;
		// var ongpot = 'N';
		// var j_mesin = '';
		// var kethitung = 'Kertas Bawah';
		
		// //alert(lbrcetak);
		// var xmlhttp = new XMLHttpRequest();
		// xmlhttp.onreadystatechange = function() {
			// if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				// myArr = JSON.parse(xmlhttp.responseText);
				// data1 = myArr[0];
				// //hitungkertaspb(data1);
				// //alert(JSON.stringify(data1));
				// $('#ketpb').val(JSON.stringify(myArr));
				// }
			// }
			
			// isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2=0"+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung;
			
		// //	alert (isi);
			// isi=btoa(isi); //encode			
			// xmlhttp.open("GET","wadah.php?isi="+isi,true);
			// xmlhttp.send();		
		
// }

		
function hasilpaperbag(data1,data2){
		var ket = document.getElementById("ketpb").value;

		if (data1['ongpot'] == 'Y' ){ ongkos_potong = data1['ongkos_potong'];}else{ ongkos_potong = 0; }				
		subtotal1 = parseInt(data1['totcetak']) + parseInt(data1['totbhn']) + parseInt(ongkos_potong) + parseInt(data1['tot_ctp']) + parseInt(data1['totlaminating']) + parseInt(data1['finishing1']) + parseInt(data1['finishing2']) + parseInt(data1['finishing3']) + parseInt(data1['finishing4']) + parseInt(data1['finishing1']) + parseInt(data1['finishing6']);
		var arrStr1 = btoa(encodeURIComponent(JSON.stringify(data1)));
		
//data2
		if(!!(data2['hrgbhn'])){
				if (data2['ongpot'] == 'Y' ){ ongkos_potong = data2['ongkos_potong'];} else{ ongkos_potong = 0; }				
				subtotal2 = parseInt(data2['totcetak']) + parseInt(data2['totbhn']) + parseInt(ongkos_potong) + parseInt(data2['tot_ctp']) + parseInt(data2['totlaminating']) + parseInt(data2['finishing1']) + parseInt(data2['finishing2']) + parseInt(data2['finishing3']) + parseInt(data2['finishing4']) + parseInt(data2['finishing2']) + parseInt(data2['finishing6']);
				var arrStr2 = btoa(encodeURIComponent(JSON.stringify(data2)));
			}else{
				var subtotal2 = '0';
				var arrStr2 = '';
			}	
	
				total  = parseInt(subtotal1)+ parseInt(subtotal2);  		
				profit = data1['persen'];
				jual = (parseInt(total) * profit / 100) + parseInt(total);
				satuan = jual / parseInt($('#jmlcetakpb').val());
				perrim = satuan *  500;
		
				
			//	alert(arrStr1);
				$('#data1').val(arrStr1);
				$('#data2').val(arrStr2);
				$('#jumlahcetak').val($('#jmlcetakpb').val());
				$('#ket').val(ket);
				$('#totjual').html("Rp. " + formatMoney(jual));
				$('#satuan').html("Rp. " + formatMoney(satuan) + "/pcs");
				
			if( level == 'admin' || level == 'member' ){
				setTimeout(function(){ $('#tablepb').show(); }, 500); 
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

function hitungpb(){	
		$(".progress-bar").css('background','red'); 
		$(".progress-bar").css('width','5%');
		$(".harga").hide();

		var lbr = document.getElementById("lbrcetakpb").value;
		var tg = document.getElementById("tgcetakpb").value;
		var pj = document.getElementById("pjcetakpb").value;
		var lebarlem = 1.5;
		var lebartutup = 3;
		
		if(document.getElementById("bagi2").checked == true ){
			var jmlset = 2;
			lbrcetak = (parseFloat(lbr)) + (parseFloat(pj)) + parseFloat(lebarlem);
			tgcetak = parseFloat(tg) + (1/2 * parseFloat(lbr)) + parseFloat(lebartutup) + parseFloat(lebarlem);			
		
		}else{
			var jmlset = 1;
			lbrcetak = (2 * parseFloat(lbr)) + (2 * parseFloat(pj)) + parseFloat(lebarlem);
			tgcetak = parseFloat(tg) + (1/2 * parseFloat(lbr)) + parseFloat(lebartutup) + parseFloat(lebarlem);			
		}

		var jmlcetak = document.getElementById("jmlcetakpb").value;
		var bahan = document.getElementById("bahanpb").value;
		var bb = '1';
		var jmlwarna = document.getElementById("jmlwarnapb").value;
			if (jmlwarna=='Full Color'){
			jmlwarna=4;
			}
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}				
		var lam = document.getElementById("lampb").value;
		
		var lbrf1= 1;		var tgf1 = 1;		
		var lbrf2= 1;		var tgf2 = 1;		
		var lbrf3= 1;		var tgf3 = 1;		
		var lbrf4= 1;		var tgf4 = 1;		
		var lbrf5= 1;		var tgf5 = 1;
		var lbrf6= 1;						var tgf6 = 1;
		var finishing5 = '0';		
		var finishing1 = 0;
		var finishing2 = 0;
		var finishing3 = 0;
		var finishing4 = 0;
		var finishing6 = '53'; //Ongkos Lem
		
		var cetak_bagi='Y';
		var jml_satuan = 1;
		var modul = 'paperbag';
		var insheet = "1";
		var ket = document.getElementById("ketpb").value;
		var ket_satuan = "pcs";
		var rim = 500;
		var ongpot = 'N';
		var j_mesin = '';
		var kethitung = '';
			
			//Pond
			lbrf3= lbrcetak/jmlcetak; //karena di fungsihitung dikalikan jumlah cetak
			tgf3 = tgcetak;
			finishing2 = '12'; //Biaya Pon
			finishing3 = '13'; // Pisau Pon		
		
		//alert (lbrcetak + "x" + tgcetak);
		//poly
		if(document.getElementById("finishingpb").checked == true ){
			lbrpolykop = document.getElementById("lbrpolypb").value;
			tgpolykop = document.getElementById("tgpolypb").value;
			finishing5 = '10';
			lbrf5= lbrpolykop;
			tgf5 = tgpolykop;	
			
			finishing4 = '11';
			lbrf4= lbrpolykop/jmlcetak;
			tgf4 = tgpolykop;
		}
		

		if(document.getElementById("finishing4pb").checked == true ){
			finishing1 = '19';
			lbrf1= lbrcetak;
			tgf1 = tgcetak;
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
	xmlhttp.addEventListener("progress", function (evt)
		 {if (evt.lengthComputable){var percentComplete = (evt.loaded / evt.total) *100;
		 $('.progress').show();
		$('#tablepb').hide();
		 $("div.progress > div.progress-bar").css({ "width": percentComplete + "%" }); 
		if(percentComplete){setTimeout(function(){$(".progress-bar").css('background','green');}, 500);}}},false);
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				data1 = myArr[0];
				data2 = {};
				hasilpaperbag(data1,data2);
				//alert(JSON.stringify(data1));
				//$('#ketpb').val(JSON.stringify(myArr));
				}
			}
			
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2=0"+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung;
			//alert (isi);
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();		

}

		
		// function cariukuranpb(){
			// var ukuran = document.getElementById("ukuranpb").value;
			// var xmlhttp = new XMLHttpRequest();
			// xmlhttp.onreadystatechange = function() {
			// if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				// myArr = JSON.parse(xmlhttp.responseText);
				// document.getElementById("lbrcetakpb").value = myArr[0];
				// document.getElementById("tgcetakpb").value = myArr[1];
			// //alert(myArr[0].toString());
			// }
			// }
			  // xmlhttp.open("GET","function/cariukuran.php?ukuran="+ukuran,true);
			  // xmlhttp.send();	
		// }
		
function cekukuranpb(){
	
	if(document.getElementById("bagi2").checked == false ){
		var lbr = document.getElementById("lbrcetakpb").value;
		var tg = document.getElementById("tgcetakpb").value;
		var pj = document.getElementById("pjcetakpb").value;
		var lebarlem = 1.5;
		var lebartutup = 3;
		lbrcetak = (2 * parseInt(lbr)) + (2 * parseInt(pj)) + parseInt(lebarlem);
		tgcetak = parseInt(tg) + (1/2 * parseInt(lbr)) + parseInt(lebartutup) + parseInt(lebarlem);			

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				if (myArr[0].toString()=='N'){
				alert('Ukuran Kebesaran');
				document.getElementById("tgcetakpb").value = 0;
				document.getElementById("lbrcetakpb").value = 0;
				}
			}
			}
			  xmlhttp.open("GET","function/cekukuran.php?lbrcetak="+lbrcetak+"&tgcetak="+tgcetak,true);
			  xmlhttp.send();	
	}
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