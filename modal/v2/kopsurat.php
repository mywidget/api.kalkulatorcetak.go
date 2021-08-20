<?php
if (empty($_SESSION['g_level'])){
header("Content-Type: application/json");
echo json_encode(array(401 => "error login"));
}else{
if (($referer==$host OR $referer==$_POST['link'])) {
$warnabar = "#40af26";
?>

<script>
$(document).ready(function() {
	$('.harga').hide();
	$('.printpenawaran').hide();
	$(".alert").hide();
	$('#print_foot').hide();
	$('.btnon, .btnd, .btnp').prop('disabled', true);
	$('#jmlcetakkop').keypress(validateNumber);
	$('#ketkopsurat').keyup(function() {
		$('.btnon').prop('disabled', this.value == "" ? true : false);
	})
});

</script>
<div class="modal-header" style="background-color:<?=$warnabar;?>;color:white;">
	<button type="button" class="close" id="kop" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Cetak Kop Surat</h4>
</div>
<div class="modal-body">
   <div class="col-md-12">
      <div class="alert"></div>
   </div>
   <div class="col-md-6">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Jumlah Cetak</span>
            <input type="text" class="form-control" aria-label="" id="jmlcetakkop" autofocus>
            <span class="input-group-addon">rim</span>
         </div>
      </div>
   </div>
   <div class="col-md-6">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Ukuran</span>
            <?php $sql_ukur = mysql_query("SELECT * FROM ukuran_kertas where modul like '%kopsurat%' ORDER BY ket_ukuran"); ?>
            <select id="ukurankop"  class="chosen-select form-control" onchange="cariukurankop()" data-style="btn-info" data-size="auto" data-placeholder='Pilih Ukuran' required="required">
               <?php while($row=mysql_fetch_array($sql_ukur)){ ?>
               <option value="<?=$row['id'];?>"><?=$row['ket_ukuran'];?></option>
               <?php } ?>
            </select>
         </div>
      </div>
   </div>
   <div class="col-md-8">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Lebar</span>
            <input type="text" class="form-control" aria-label="" id="lbrcetakkop">
            <span class="input-group-addon">Tinggi</span>
            <input type="text" class="form-control" aria-label="" id="tgcetakkop" onchange="cekukurankop()">
            <span class="input-group-addon">cm</span>
         </div>
      </div>
     </div>
	 <div class="col-md-4">	
		<div class="form-group">
			<div class="input-group">
			  <span class="input-group-addon">Bleed</span>
			  <input type="text" class="form-control" aria-label="" id="bleedkop" value="0">
				<span class="input-group-addon">cm</span>
			</div>
		</div>
		</div>
	 <div class="col-md-12">		
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Jumlah Warna</span>
            <input type="text" class="form-control" aria-label="" id="jmlwarnakop" value="2">
         </div>
      </div>
      <!-- Tarikan -->
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Kertas</span>
            <?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where pub='Y' AND modul like '%kopsurat%' ORDER BY id_kategori"); ?>
            <select id="bahankop"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
               <?php while($row=mysql_fetch_array($sql_bhn)){ ?>
               <option value="<?=$row['id_kategori'];?>"><?=$row['nama_kategori'];?></option>
               <?php } ?>
            </select>
         </div>
      </div>
   </div>
   <div class="col-md-5">
      <div class="form-group">
         <div class="input-group ">
            <span class="input-group-addon">
            <input type="checkbox" id="finishing2kop">
            </span>
            <Label class="form-control" >Poly</label>											 
         </div>
         <!-- /input-group -->
      </div>
   </div>
   <div class="col-md-7">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Lebar</span>
            <input type="text" class="form-control" aria-label="" id="lbrpolykop" value="1">
            <span class="input-group-addon">Tinggi</span>
            <input type="text" class="form-control" aria-label="" id="tgpolykop" value="1">
            <span class="input-group-addon">cm</span>
         </div>
      </div>
   </div>
   <div class="col-md-8">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Keterangan</span>
            <input type="text" class="form-control" aria-label="" id="ketkopsurat"  placeholder="Isi dulu keterangannya">
         </div>
      </div>
   </div>
   <div class="col-md-4">
      <div class="form-group">
         <button type="submit" class="btn btn-primary" onclick="hitungkop()">Hitung</button>
         <button type="button" class="btn btn-primary printpenawaran"><i class="fa fa-external-link" aria-hidden="true"></i></button>	
      </div>
   </div>
   <div class="col-md-12">
      <div class="progress progress-striped active" style="height:5px;">
         <div class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;height:5px;">
         </div>
      </div>
   </div>
   <div class="col-md-6 harga">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Harga Satuan</span>
            <input type="text" class="form-control" aria-label="" id="satuankopsurat"  value="">
         </div>
      </div>
   </div>
   <div class="col-md-6 harga">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Harga PerRim</span>
            <input type="text" class="form-control" aria-label="" id="hargarimkopsurat"  value="">
         </div>
      </div>
   </div>
   <div class="col-md-4 harga">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Profit
            </span>
            <input type="text" class="form-control" aria-label="" id="profitkopsurat"  value="0">
            <span class="input-group-addon">%
            </span>
         </div>
      </div>
   </div>
   <div class="col-md-4 harga">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Total Jual</span>
            <input type="text" class="form-control" aria-label="" id="totalkopsurat"  value="">
            <input type="hidden" id="totdumykopsurat">
            <input type="hidden" id="datakopsurat">
         </div>
      </div>
   </div>
   <div class="col-md-4 harga">
      <div class="form-group">
         <button type="button" class="btn btn-info simpan" onclick="simpan('<?=$modul;?>')" >Simpan</button>
      </div>
   </div>
   <div class="col-md-12">
			<form action="detail-hitung/" method="post" target="_blank">
			<input type="hidden" id="token" name="token">
			<input type="hidden" id="user"  name="user">	
			<input type="hidden" id="modul" name="modul">
         <div id="tablekop"></div>
      </form>
   </div>
</div>
<script>
$(document).ready(function(){
	$('#ukurankop').val('10');
	$('#lbrcetakkop').val('21');
	$('#tgcetakkop').val('29.7');
	$('#bahankop').val('9');
})

	$('#kop').click(function(){	
	if( $('#detailkop').length ){
		$('#detailkop').remove();
	}	
	});	

	$( "#profitkopsurat" ).keyup(function() {
		profit = $('#profitkopsurat').val();
		tot = angka($('#totdumykopsurat').val());
		jual = parseFloat(profit * tot/100) + parseInt(tot);
		satuan = jual / parseInt($('#jmlcetakkop').val())/500;
		perrim = satuan * 500;
		
		$('#satuankopsurat').val(formatMoney(satuan));
		$('#hargarimkopsurat').val(formatMoney(perrim));
		$('#totalkopsurat').val(formatMoney(jual));
		
	})		
	
	
function hitungkop() {
		$(".progress-bar").css('background','red'); 
		$(".progress-bar").css('width','1%');
		$('.simpan').prop('disabled', this.value == "" ? true : false); 
		$('.simpan').html('Simpan');
		$("#profits"+modulhit).val('0');
		var bleed = document.getElementById("bleedkop").value;
		var lbrcetak = parseFloat(document.getElementById("lbrcetakkop").value) + ( 2 * parseFloat(bleed));
		var tgcetak = parseFloat(document.getElementById("tgcetakkop").value) + ( 2 * parseFloat(bleed));
		
		
		
		var jmlcetak = document.getElementById("jmlcetakkop").value;
		var bahan = document.getElementById("bahankop").value;
		var bb = '1';
		var jmlwarna = document.getElementById("jmlwarnakop").value;
			if (jmlwarna=='Full Color'){
			jmlwarna=4;
			}
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}			

			
		var tarikan = 0;
		var lam = '0';
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
		
		var cetak_bagi='Y';
		var jml_satuan = 500;
		var modul = 'kopsurat';
		var insheet = "0";
		var ket = document.getElementById("ketkopsurat").value;
		var ket_satuan = "rim";
		var rim = 500;
		var ongpot = 'N';
		

		if(document.getElementById("finishing2kop").checked == true ){
			lbrpolykop = document.getElementById("lbrpolykop").value;
			tgpolykop = document.getElementById("tgpolykop").value;
			finishing2 = '10';
			lbrf2= lbrpolykop;
			tgf2 = tgpolykop;			
			finishing1 = '11';
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
		 xmlhttp.addEventListener("progress", function (){
		 $(".progress-bar").css('width','100%');
		 $(".progress-bar").css('background','green');},false);
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);

					data = myArr;
					level = '<?=$level;?>';
					
					//alert(JSON.stringify(data[0]));
					if( level == 'admin' || level == 'member' ){
					
					if( $('#tablkop').length ){
					$('#tablkop tr:gt(0)').remove();	
					var table = $('#tablkop').children();					
					var i;
					var x;
					var ongkos_potong = 0;
					for (i = 0; i < data.length; i++) {
						
						if (data[i]['ongpot'] == 'Y' ){
							ongkos_potong = data[i]['ongkos_potong'];
						}						
						subtotal1 = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']);
						
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						
						
						total = subtotal1;
						profit = data[i]['persen'];
						jual = (parseInt(total) * profit / 100) + parseInt(total);
						satuan = parseInt(jual) / parseInt(jmlcetak) / parseInt(jml_satuan);
						perrim = satuan *  rim;
						
						
						x +="<tr class='text-left'><td>"+data[i]['mesin']+"</td><td class='text-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></td></tr>";		
						
					}
					table.append(x);
					
					}else{
						
						$('#tablekop').append("<div  class='small'><table id='tablkop' class='table table-striped table-responsive' ><thead ><tr style='background-color:<?=$warnabar;?>;color:white' ><th  class='text-left' style='width:30%'>Mesin</th><th class='text-right'>Harga</th></tr></thead></table></div>");

					var table = $('#tablkop').children();
					var i;
					var x;
					var ongkos_potong = 0;
					for (i = 0; i < data.length; i++) {
						
						if (data[i]['ongpot'] == 'Y' ){
							ongkos_potong = data[i]['ongkos_potong'];
						}						
						subtotal1 = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']);
						
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						
						
						total = subtotal1;
						profit = data[i]['persen'];
						jual = (parseInt(total) * profit / 100) + parseInt(total);
						satuan = parseInt(jual) / parseInt(jmlcetak) / parseInt(jml_satuan);
						perrim = satuan *  rim;
						
						
						x +="<tr class='text-left'><td>"+data[i]['mesin']+"</td><td class='text-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></td></tr>";	
					}

					table.append(x);
					}		
					
					}else{
						var ongkos_potong = 0;
							if (data[0]['ongpot'] == 'Y' ){ongkos_potong = data[0]['ongkos_potong'];}	
							total = parseInt(data[0]['totcetak']) + parseInt(data[0]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[0]['tot_ctp']) + parseInt(data[0]['totlaminating']) + parseInt(data[0]['finishing1']) + parseInt(data[0]['finishing2']) + parseInt(data[0]['finishing3']) + parseInt(data[0]['finishing4']) + parseInt(data[0]['finishing5']) + parseInt(data[0]['finishing6']);
							
							var arrStr = btoa(encodeURIComponent(JSON.stringify(data[0])));
							
					//	alert(JSON.stringify(data[0]));
							$('.harga').show();
							profit = data[0]['persen'];
							jual = (parseInt(total) * profit / 100) + parseInt(total);
							satuan = jual / jmlcetak / jml_satuan;
							perrim = satuan *  rim;
							
							
							
						//	alert(arrStr1);
							$('#satuankopsurat').val(formatMoney(satuan));
							$('#hargarimkopsurat').val(formatMoney(perrim));
							$('#totalkopsurat').val(formatMoney(jual));
							$('#totdumykopsurat').val(formatMoney(jual));
							$('#datakopsurat').val(arrStr);
							$('#modul').val(modul);
					}

				
			}
			}
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+0+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();					

		}
		
		
		function cariukurankop(){
			var ukuran = document.getElementById("ukurankop").value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				document.getElementById("lbrcetakkop").value = myArr[0];
				document.getElementById("tgcetakkop").value = myArr[1];
			//alert(myArr[0].toString());
			}
			}
			  xmlhttp.open("GET","function/cariukuran.php?ukuran="+ukuran,true);
			  xmlhttp.send();	  
			  
		}
		
		function cekukurankop(){
			var lbrcetak = document.getElementById("lbrcetakkop").value;
			var tgcetak = document.getElementById("tgcetakkop").value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				if (myArr[0].toString()=='N'){
				alert('Ukuran Kebesaran');
				document.getElementById("tgcetakkop").value = '29.7';
				document.getElementById("lbrcetakkop").value = '21';
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