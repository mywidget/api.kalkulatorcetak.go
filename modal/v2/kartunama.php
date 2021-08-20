<?php
if (empty($_SESSION['g_level'])){
header("Content-Type: application/json");
echo json_encode(array(401 => "error login"));
}else{
if (($referer==$host OR $referer==$_POST['link'])) {
$warnabar = "#4286f4";
?>

<script>
$(document).ready(function(){
$('.harga').hide();
$('.printpenawaran').hide();
$(".alert").hide();
	$('#print_foot').hide();
     $('.btnon, .btnd, .btnp').prop('disabled',true);
	$('#jmlcetakkn').keypress(validateNumber);
    $('#ketkn').keyup(function(){
        $('.btnon').prop('disabled', this.value == "" ? true : false);     
    })
}); 
$('.modal').on('hidden.bs.modal', function(){
	$(this).removeData('bs.modal');
});
</script>
<div class="modal-header" style="background-color:<?=$warnabar;?>;color:white;">
	<button type="button" class="close" id="kn" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Cetak Kartu Nama</h4>
</div>
<div class="modal-body">
   <div class="row" >
      <div class="col-md-12">
         <div class="alert"></div>
      </div>
      <div class="col-md-12">
         <div class="col-md-12">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Jumlah Cetak</span>
                  <input type="text" class="form-control" aria-label="" id="jmlcetakkn" autofocus>
                  <span class="input-group-addon">box (1 box isi 100lbr)</span>
               </div>
            </div>
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Lebar</span>
                  <input type="text" class="form-control" aria-label="" id="lbrcetakkn" onchange="cekukurankn()">
                  <span class="input-group-addon">Tinggi</span>
                  <input type="text" class="form-control" aria-label="" id="tgcetakkn" onchange="cekukurankn()">
                  <span class="input-group-addon">cm</span>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Jumlah Warna</span>
                  <input type="text" class="form-control" aria-label="" id="jmlwarnakn" value="4">
					<span class="input-group-addon">/</span>
					<input type="text" class="form-control" aria-label="" id="jmlwarnakn2" value="0" >
               </div>
            </div>
         </div>

         <div class="col-md-6">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Jenis Kertas</span>
                  <?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where modul like '%kartunama%' AND pub='Y' ORDER BY id_kategori"); ?>
                  <select id="bahankn"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
                     <?php while($row=mysql_fetch_array($sql_bhn)){ ?>
                     <option value="<?=$row['id_kategori'];?>"><?=$row['nama_kategori'];?></option>
                     <?php } ?>
                  </select>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
               <select id="lamkn" class="selectpicker form-control" data-style="btn-warning">
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
                  <input type="checkbox" id="finishing1kn">
                  </span>
                  <Label class="form-control" >SpotUV</label>
               </div>
               <!-- /input-group -->
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <div class="input-group ">
                  <span class="input-group-addon">
                  <input type="checkbox" id="finishing2kn">
                  </span>
                  <Label class="form-control" >Poly</label>											 
               </div>
               <!-- /input-group -->
            </div>
         </div>
         <div class="col-md-8">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Lebar</span>
                  <input type="text" class="form-control" aria-label="" id="lbrpolykn" value="1">
                  <span class="input-group-addon">Tinggi</span>
                  <input type="text" class="form-control" aria-label="" id="tgpolykn" value="1">
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="form-group">
               <div class="input-group ">
                  <span class="input-group-addon">
                  <input type="checkbox" id="boxkartunama" >
                  </span>
                  <Label class="form-control" >Pakai Box</label>
               </div>
               <!-- /input-group -->
            </div>
         </div>
         <div class="col-md-8">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Keterangan</span>
                  <input type="text" class="form-control" aria-label="" id="ketkn"  placeholder="Isi dulu keterangannya">
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <button  type="submit" class="btn btn-primary btnon" onclick="hitungkn()">Hitung</button>
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
                     <span class="input-group-addon">Harga PerBox</span>
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
         <div class="col-md-12 text-center">
			<form action="detail-hitung/" method="post" target="_blank">
			<input type="hidden" id="token" name="token">
			<input type="hidden" id="user"  name="user">	
			<input type="hidden" id="modul" name="modul">
               <div id="tablekn"></div>
            </form>
         </div>
      </div>
   </div>
</div>   
<script>
$(document).ready(function(){
	$('#lbrcetakkn').val('5.5');
	$('#tgcetakkn').val('9');
	$('#bahankn').val('5');
	$('#bbkn').val('1');
	$('#boxkartunama').attr('checked', 'checked');
	$('.harga').hide();
})

	$( "#profits"+modulhit).keyup(function() {
		profit = $('#profits'+modulhit).val();
		tot = angka($('#totdumy'+modulhit).val());
		jual = parseFloat(profit * tot/100) + parseInt(tot);
		satuan = jual / $('#jmlcetakkn').val()/100;
		perrim = satuan * 500;
		$('#satuan'+modulhit).val(formatMoney(satuan));
		$('#hargarim'+modulhit).val(formatMoney(perrim));
		$('#total'+modulhit).val(formatMoney(jual));
	})	
	
	$('#finishing2kn').click(function(){	
	if($(this).is(":checked"))
        {
		$('#imag').attr('src','images/kartunama.jpg');
		}else{
		$('#imag').attr('src','images/kartunamaoval.jpg');
		}
	});
	
	$('#kn').click(function(){	
	if( $('#detailkn').length ){
		$('#detailkn').remove();
	}	
	});	
	
		function hitungkn() {
		$(".progress-bar").css('background','red'); 
		$(".progress-bar").css('width','5%');
		$('.btnd, .btnp').prop('disabled', this.value == "" ? true : false);  	
		$('.harga').hide();
		var lbrcetak = document.getElementById("lbrcetakkn").value;
		var tgcetak = document.getElementById("tgcetakkn").value;
		var jmlcetak = parseInt(document.getElementById("jmlcetakkn").value);
		var bahan = document.getElementById("bahankn").value;
		var bb = "";
		var jmlwarna = document.getElementById("jmlwarnakn").value;
		var jmlwarna2 = document.getElementById("jmlwarnakn2").value;

			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}				
		var tarikan = 1;
		var lam = document.getElementById("lamkn").value;
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
		

		var cetak_bagi="Y";
		var modul="kartunama";
		var insheet="1";
		var jml_satuan=100;
		var ket = document.getElementById("ketkn").value;
		var ket_satuan = "box";
		var rim = 500;
		var box = 100;
		var ongpot = 'Y';		
		

		if(document.getElementById("finishing1kn").checked == true ){
			finishing1 = '19';
			lbrf1= lbrcetak;
			tgf1 = tgcetak;
		}
		if(document.getElementById("boxkartunama").checked == true ){
			finishing3 = '77';
			 tgf3 = tgf3 / jml_satuan;
		}
		
		if(document.getElementById("finishing2kn").checked == true ){ //Poly
			lbrpolykop = document.getElementById("lbrpolykn").value;
			tgpolykop = document.getElementById("tgpolykn").value;
			finishing5 = '10'; //Press Poly
			lbrf5= lbrpolykop/jmlcetak;
			tgf5 = tgpolykop;			
			finishing4 = '11'; //Plat Poly
			lbrf4= lbrpolykop/jmlcetak;
			tgf4 = tgpolykop;

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
$('#tablekn').hide();
 $("div.progress > div.progress-bar").css({ "width": percentComplete + "%" }); 
if(percentComplete){setTimeout(function(){$(".progress-bar").css('background','green');$('#tablekn').show();}, 500);}}},false);
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
			myArr = JSON.parse(xmlhttp.responseText);
				
				data = myArr;
				// jika marketing jangan tampilkan ini
				level = '<?=$level;?>';
				if( level == 'admin' || level == 'member' ){
				if( $('#tablkn').length ){
					$('#tablkn tr:gt(0)').remove();	
					var table = $('#tablkn').children();					
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
						perrim = satuan *  box;
						
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						
						x +="<tr class='text-left'><td>"+data[i]['mesin']+"</td><td class='text-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/box <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";	
						
					}
					table.append(x);
					
					}else{
						
						$('#tablekn').append("<div id='detailkn' class='small'><table id='tablkn' class='table table-striped table-responsive' ><thead ><tr style='background-color:<?=$warnabar;?>;color:white' ><th  class='text-left' style='width:30%'>Mesin</th><th class='text-right'>Harga</th></tr></thead></table></div>");
							
					
					var table = $('#tablkn').children();
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
						perrim = satuan *  box;
						
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						
						x +="<tr class='text-left'><td>"+data[i]['mesin']+"</td><td class='text-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/box <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";	
					}

					table.append(x);
					}
				}else{
					var ongkos_potong = 0;
					if (data[0]['ongpot'] == 'Y' ){ongkos_potong = data[0]['ongkos_potong'];}	
					total = parseInt(data[0]['totcetak']) + parseInt(data[0]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[0]['tot_ctp']) + parseInt(data[0]['totlaminating']) + parseInt(data[0]['finishing1']) + parseInt(data[0]['finishing2']) + parseInt(data[0]['finishing3']) + parseInt(data[0]['finishing4']) + parseInt(data[0]['finishing5']) + parseInt(data[0]['finishing6']);
					
					var arrStr = btoa(encodeURIComponent(JSON.stringify(data[0])));
					
					profit = data[0]['persen'];
					jual = (parseInt(total) * profit / 100) + parseInt(total);
					satuan = jual / jmlcetak / jml_satuan;
					perrim = satuan *  box;
					
					$('.harga').show();
					$('#satuan'+modulhit).val(formatMoney(satuan));
					$('#hargarim'+modulhit).val(formatMoney(perrim));
					$('#total'+modulhit).val(formatMoney(jual));
					$('#totdumy'+modulhit).val(formatMoney(jual));
					$('#data'+modulhit).val(arrStr);
					$('#modul').val(modul);	
				}					
			
			}
			
		}
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();	
		

		}

		function cekukurankn(){

			var lbrcetak = document.getElementById("lbrcetakkn").value;
			var tgcetak = document.getElementById("tgcetakkn").value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				if (myArr[0].toString()=='N'){
				alert('Ukuran Kebesaran');
				document.getElementById("tgcetakkn").value = '9';
				document.getElementById("lbrcetakkn").value = '5.5';
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
