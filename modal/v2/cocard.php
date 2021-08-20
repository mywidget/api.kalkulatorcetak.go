<?php
if (empty($_SESSION['g_level'])){
header("Content-Type: application/json");
echo json_encode(array(401 => "error login"));
}else{
if (($referer==$host OR $referer==$_POST['link'])) {
$warnabar = "#55aa5f";
?>

<script>
$(document).ready(function(){
$('.harga').hide();
$('.printpenawaran').hide();
$(".alert").hide();
$('#jmlcetak').keypress(validateNumber);

}); 
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
</script>



<div class="col-md-12">
<div class="modal-header" style="background-color:#A8216B;color:#FFF;">
	<button type="button" class="close" id="b" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title"><?=$row['nama_produk'];?></h4>
</div>
<div class="modal-body" style="background-color:#eaeef2">
<div class="row">
<div class="col-md-12">
		<div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon warning">Jumlah Cetak
            </span>
            <input type="number" class="form-control" aria-label="" id="jmlcetak" autofocus>
            <span class="input-group-addon">lbr
            </span>
          </div>
        </div>
        </div>

		<div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Lebar
            </span>
            <input type="number" class="form-control" aria-label="" id="lbrcetak">
            <span class="input-group-addon">Tinggi
            </span>
            <input type="number" class="form-control" aria-label="" id="tgcetak" onchange="cekukuran()">
            <span class="input-group-addon">cm
            </span>
          </div>
        </div>  
        </div>  
			  <input type="hidden" class="form-control" aria-label="" id="bleed" value="0.4">
		<div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Jumlah Warna</span>
            <input type="text" class="form-control" aria-label="" id="jmlwarna" value="4" >
            <span class="input-group-addon">/</span>
            <input type="text" class="form-control" aria-label="" id="jmlwarna2" value="0" >
          </div>
        </div>
        </div>

		<div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Kertas
            </span>
            <select id="bahan"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required" onchange="bersihb()">
				<?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where modul like '%cocard%' AND pub='Y' ORDER BY id_kategori"); while($row=mysql_fetch_array($sql_bhn)){ ?>
					<option value="<?=$row['id_kategori'];?>"><?=$row['nama_kategori'];?></option>
				<?php }?>
            </select>	
          </div>
        </div>
        </div>
		
		<div class="col-md-6">
        <div class="form-group">
          <select id="tali" class="selectpicker form-control" data-style="btn-warning" onchange="bersihb()">
				<?php 
				$nom =1;
				$sql_bhn = mysql_query("SELECT * FROM tbl_biaya where Groups like '%tali%' AND publish='Y'"); while($row=mysql_fetch_array($sql_bhn)){ ?>
					<option value="<?=$nom;?>"><?=$row['Nama_Biaya'];?></option>
				<?php $nom++; }?>
          </select>
        </div>
      </div>
  <div class="col-md-8">	
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Keterangan
            </span>
            <input type="text" class="form-control" aria-label="" id="ketcocard"  placeholder="Isi dulu keterangannya">
          </div>
        </div>
      </div>
      <div class="col-md-4">	
        <div class="form-group">
          <button  type="submit" class="btn btn-primary btnon" onclick="cekukuran(1)">Hitung
          </button>
        </div>
      </div>
	  <div class="col-md-12">
	     <div class="progress progress-striped active" style="height:5px;">
          <div class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;height:5px;">
          </div>
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
          <div id="detailtableco"></div>
        </form>
      </div>
    </div>

</div> 
</div> 
</div> 
<script type="text/javascript">
$(document).ready(function(){
	$('#lbrcetak').val('9');
	$('#tgcetak').val('13');
	$('#bahan').val('4');	
	$('#hasilhitung').hide();	
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


		var tali = document.getElementById("tali").value;
		if (tali == '1'){
			harga_tali = 1500;
		}else if(tali == '2'){
			harga_tali = 3000;
		}else{
			if (jmlcetak < 100){  
				alert("Minimal 100pcs !");
				$('#hasilhitung').hide();
				return;
			}	
			harga_tali = 6000;
		}
		

		var modul="kartunama";
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";
		var ket = document.getElementById("ketcocard").value;
		var ket_satuan = "lbr";
		var rim = 500;
		var box = 100;
		var ongpot = 'Y';
		var j_mesin = '';
		var kethitung = '';
		
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
		
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.addEventListener("progress",function(e){if(e.lengthComputable){var r=e.loaded/e.total*100;$(".progress").show(),$("#detailtableco").hide(),$("div.progress > div.progress-bar").css({width:r+"%"}),r&&setTimeout(function(){$(".progress-bar").css("background","green"),$("#detailtableco").show()},500)}},!1);
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
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
									totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']);
									tot_tali =  parseInt(harga_tali) * parseInt(jmlcetak);
									profit = data[i]['persen'];
									jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
									jual = rebuan(jual)  + tot_tali;
									satuan = jual / jmlcetak / jml_satuan;
									perrim = satuan *  rim;
									
									var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
									
									x +="<tr class='text-left'><td>"+data[i]['mesin']+"</td><td class='text-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";	
									
								}
								table.append(x);
								
								}else{
								
									$('#detailtableco').append("<div id='detailamp2' class='small'> <table id='here_table' class='table table-striped table-responsive' ><thead ><tr style='background-color:<?=$warnabar ?>;color:white' ><th  class='text-left' style='width:30%'>Mesin</th><th class='text-right'>Harga</th></tr></thead></table></div>");
								var table = $('#here_table').children();
								
								var i;
								var no=1;
								var ongkos_potong = 0;
								for (i = 0; i < data.length; i++) {
									if (data[i]['ongpot'] == 'Y' ){
										ongkos_potong = data[i]['ongkos_potong'];
									}						
									totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']);
									tot_tali =  parseInt(harga_tali) * parseInt(jmlcetak);
									profit = data[i]['persen'];
									jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
									jual = rebuan(jual)  + tot_tali;
									satuan = jual / jmlcetak / jml_satuan;
									perrim = satuan *  rim;
									
									var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
									
									x +="<tr class='text-left'><td>"+data[i]['mesin']+"</td><td class='text-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";
								}
								table.append(x);
								}	
					}else{
					var ongkos_potong = 0;
					if (data[0]['ongpot'] == 'Y' ){ongkos_potong = data[0]['ongkos_potong'];}	
					total = parseInt(data[0]['totcetak']) + parseInt(data[0]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[0]['tot_ctp']) + parseInt(data[0]['totlaminating']) + parseInt(data[0]['finishing1']) + parseInt(data[0]['finishing2']) + parseInt(data[0]['finishing3']) + parseInt(data[0]['finishing4']) + parseInt(data[0]['finishing5']) + parseInt(data[0]['finishing6']) ;				
					
					var arrStr = btoa(encodeURIComponent(JSON.stringify(data[0])));
					//harga Tali & Tempat ID card
					$('.harga').show();
					tot_tali =  parseInt(harga_tali) * parseInt(jmlcetak);
					profit = data[0]['persen'];
					jual = (parseInt(total) * profit / 100) + parseInt(total);
					jual = rebuan(jual)  + tot_tali;
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
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();	

		}

		
		function cariukuran(){
			
			var ukuran = document.getElementById("ukuran").value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				document.getElementById("lbrcetak").value = myArr[0];
				document.getElementById("tgcetak").value = myArr[1];
			bersihb();
			
			}
			}
			  xmlhttp.open("GET","function/cariukuran.php?ukuran="+ukuran,true);
			  xmlhttp.send();	
		}
		
		function cekukuran(x){
		$(".progress-bar").css('background','red'); 
		$(".progress-bar").css('width','5%');
		$("#profits"+modulhit).val('0');
		$('.simpan').prop('disabled', this.value == "" ? true : false); 
		$(".simpan").html('Simpan'); 
		var bleed = document.getElementById("bleed").value;
		var lbrcetak = parseFloat(document.getElementById("lbrcetak").value) + ( 2 * parseFloat(bleed));
		var tgcetak = parseFloat(document.getElementById("tgcetak").value) + ( 2 * parseFloat(bleed));

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				if (myArr[0].toString()=='N'){
				alert('Ukuran Kebesaran');
				document.getElementById("tgcetak").value = 0;
				document.getElementById("lbrcetak").value = 0;
				
				}else{
					hitung();
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

<style>th{font-weight:bold;text-align:center}.table > thead > tr > th{vertical-align:middle}</style>
<?php
	}//end token
	else{
echo json_encode(array(404 => "error"));
	}
}
?>