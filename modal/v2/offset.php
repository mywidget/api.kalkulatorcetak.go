<?php
if (empty($_SESSION['g_level'])){
header("Content-Type: application/json");
echo json_encode(array(401 => "error login"));
}else{
if (($referer==$host OR $referer==$_POST['link'])) {
$warnabar = "#9e4725";
?>

<script>
$(document).ready(function(){
$('.harga').hide();
$('.printpenawaran').hide();
$(".alert").hide();
    $('.btnon, .btnd, .btnp').prop('disabled',true);
	$('#jmlcetakoffset').keypress(validateNumber);
    $('#ketoffset').keyup(function(){
        $('.btn').prop('disabled', this.value == "" ? true : false);     
    })
}); 
$('.btnon, .btnd, .btnp').on('hidden.bs.modal', function(){
	$(this).removeData('bs.modal');
});
</script>

<div class="modal-header" style="background-color:<?=$warnabar;?>;color:white;">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Cetak Offset Umum</h4>
</div>
<div id="printThis" class="modal-body">

										<div class="col-md-6">
                                        <div class="form-group">
											<div class="input-group">
											  <span class="input-group-addon">Jumlah Cetak</span>
											  <input type="text" class="form-control" aria-label="" id="jmlcetakoffset" value="" autofocus>
											  <span class="input-group-addon">pcs</span>
											</div>
										</div>
										</div>
										<div class="col-md-6">	
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Jumlah Warna</span>
                                            <input type="text" class="form-control" aria-label=""  id="jmlwarnaoffset" value="4" >
											<span class="input-group-addon">/</span>
											<input type="text" class="form-control" aria-label="" id="jmlwarnaoffset2" value="0" >
                                        </div>
                                        </div>
                                        </div>
										<div class="col-md-8">
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Lebar</span>
                                            <input type="text" class="form-control" id="lbrcetakoffset" placeholder="Lebar">
											<span class="input-group-addon">Tinggi</span>
                                            <input type="text" class="form-control" id="tgcetakoffset" placeholder="Tinggi">
											<span class="input-group-addon">cm</span>
                                        </div>
                                        </div>
										</div>
										
										<div class="col-md-4">
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Bleed</span>
                                            <input type="text" class="form-control" id="bleedoffset" value="0.4" placeholder="Bleed">
											<span class="input-group-addon">cm</span>
                                        </div>
                                        </div>
										</div>
										
										<div class="col-md-12">                                       
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Jenis Kertas</span>
											<?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where pub='Y' ORDER BY id_kategori"); ?>
											<select id="bahanoffset"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required" onchange="cekhargakertasoffset()">
												<?php while($row=mysql_fetch_array($sql_bhn)){ ?>
												<option value="<?=$row['id_kategori'];?>"><?=$row['nama_kategori'];?></option>
												<?php } ?>
											</select>	
                                        </div>
                                        </div>
										</div>

										<div class="col-md-6">	
										<div class="form-group">
										<select id="lamoffset" class="selectpicker form-control" data-style="btn-warning">
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
										</div>

	
										
										<div class="row"></div>
										<div class="col-md-3">	
										<div class="form-group">
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="polyoffset">
											  </span>
											  <Label class="form-control" >Poly</label>											 
											</div><!-- /input-group -->
											</div>
										</div>
											
										<div class="col-md-9">	
										<div class="form-group">
                                           <div class="input-group">
											  <span class="input-group-addon">Lebar</span>
											  <input type="text" class="form-control" aria-label="" id="lbrpolyoffset" value="1">
											  <span class="input-group-addon">Tinggi</span>
											  <input type="text" class="form-control" aria-label="" id="tgpolyoffset" value="1">
											  <span class="input-group-addon">Jumlah</span>
											  <input type="text" class="form-control" aria-label="" id="jmlpolyoffset" value="1">
											  <span class="input-group-addon">cm</span>
											</div>
                                        </div>
                                        </div>	
										<div class="col-md-3">
										<div class="form-group">
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="embosoffset">
											  </span>
											  <Label class="form-control">Embos</label>											 
											</div><!-- /input-group -->
										</div>
										</div>
										<div class="col-md-9">	
										<div class="form-group">
                                           <div class="input-group">
											  <span class="input-group-addon">Lebar</span>
											  <input type="text" class="form-control" aria-label="" id="lbrembosoffset" value="1">
											  <span class="input-group-addon">Tinggi</span>
											  <input type="text" class="form-control" aria-label="" id="tgembosoffset" value="1"> 
											  <span class="input-group-addon">Jumlah</span>
											  <input type="text" class="form-control" aria-label="" id="jmlembosoffset" value="1">
											  <span class="input-group-addon">cm</span>
											</div>
                                        </div>
                                        </div>		
										
										<div class="col-md-4">
										<div class="form-group">
										<div class="input-group ">
										  <span class="input-group-addon">
											<input type="checkbox" id="spotuvoffset">
										  </span>
										  <Label class="form-control" >SpotUV</label>											 
										</div><!-- /input-group -->
										</div>
										</div>
										<div class="col-md-8">	
										<div class="form-group">
                                           <div class="input-group">
											  <span class="input-group-addon">Lebar</span>
											  <input type="text" class="form-control" aria-label="" id="lbrspotuvoffset" value="1">
											  <span class="input-group-addon">Tinggi</span>
											  <input type="text" class="form-control" aria-label="" id="tgspotuvoffset" value="1">
											  <span class="input-group-addon">cm</span>
											</div>
                                        </div>
                                        </div>	
										<div class="col-md-4">	
										<div class="form-group">
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="pondoffset">
											  </span>
											  <Label class="form-control" >Pond</label>											 
											</div><!-- /input-group -->
											</div>
										</div>
											
										<div class="col-md-8">	
										<div class="form-group">
                                           <div class="input-group">
											  <span class="input-group-addon">Lebar</span>
											  <input type="text" class="form-control" aria-label="" id="lbrpondoffset" value="1">
											  <span class="input-group-addon">Tinggi</span>
											  <input type="text" class="form-control" aria-label="" id="tgpondoffset" value="1">
											  <span class="input-group-addon">cm</span>
											</div>
                                        </div>
                                        </div>
										
										<div class="col-md-6">	
										<div class="form-group">
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="nomoratoroffset">
											  </span>
											  <Label class="form-control">Nomorator</label>											 
											</div><!-- /input-group -->
											</div>
										</div>
										<div class="col-md-6">	
										<div class="form-group">
                                           <div class="input-group">
											  <span class="input-group-addon">Jml Titik</span>
											  <input type="text" class="form-control" aria-label="" id="jmlnomoratoroffset" value="1">
											</div>
                                        </div>
                                        </div>


										<div class="col-md-6">
										<div class="form-group">
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="porporasioffset">
											  </span>
											  <Label class="form-control">Porporasi</label>											 
											</div><!-- /input-group -->
										</div>
										</div>
										<div class="col-md-6">	
										<div class="form-group">
                                           <div class="input-group">
											  <span class="input-group-addon">Jumlah</span>
											  <input type="text" class="form-control" aria-label="" id="jmlporporasioffset" value="1">
											</div>
                                        </div>
                                        </div>
										

										

									
									<div class="col-md-8">	
                                        <div class="form-group">
										<div class="input-group">
										<span class="input-group-addon">Keterangan</span>
										<input type="text" class="form-control" aria-label="" id="ketoffset"  placeholder="Isi dulu keterangannya">
										</div>
										</div>
										</div>
                                    <div class="col-md-4">		
										<div class="form-group hide-print">
											<button  type="submit" class="btn btn-primary btnon" onclick="hitungoffset()">Hitung</button>
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
									  
									
                                    <div class="col-md-12">	
												<form action='detail-hitung/' method='post' target='_blank'>
												<input type="hidden" id="token" name="token" value="<?=$ssid;?>">
												<input type="hidden" id="user"  value="<?=$_SESSION['mailuser'];?>">	
												<input type="hidden" id="modul">
												<div id="tableoffset"></div>
										</form>
                                    </div>                                     
									</div> 
					</div>	
                                    
</div>
                        
				
				

<script>

$(document).ready(function(){
	$('#lbrcetakoffset').val('21');
	$('#tgcetakoffset').val('29.7');
	$('#bboffset').val('1');
	$('.harga').hide();

})

	$( "#profits"+modulhit).keyup(function() {
		profit = $('#profits'+modulhit).val();
		tot = angka($('#totdumy'+modulhit).val());
		jual = parseFloat(profit * tot/100) + parseInt(tot);
		satuan = jual / $('#jmlcetakoffset').val();
		perrim = satuan * 500;
		$('#satuan'+modulhit).val(formatMoney(satuan));
		$('#hargarim'+modulhit).val(formatMoney(perrim));
		$('#total'+modulhit).val(formatMoney(jual));
	})


$('#tutupboxbawah1').click(function(){
	
	 if ( $('#tutupboxbawah1').attr('checked')) {
        $('#tutupboxbawah1').attr('checked', false);
			$('#gabungcetakoffset').prop('checked', true);
			
			$('.gabungcetakoffset').show();
    } else {
        $('#tutupboxbawah1').attr('checked', 'checked');
			$('.gabungcetakoffset').hide();
			$('.tutupbawah').hide();
			
    }
});

$('#gabungcetakoffset').click(function(){
	
	 if ( $('#gabungcetakoffset').attr('checked')) {
        $('#gabungcetakoffset').attr('checked', false);
			$('.tutupbawah').show();
    } else {
        $('#gabungcetakoffset').attr('checked', 'checked');
			$('.tutupbawah').hide();
    }
});	

		
function hitungoffset(){
	$(".progress-bar").css('background','red'); 
	$(".progress-bar").css('width','5%');
		
		var bleed = document.getElementById("bleedoffset").value;
		var lbrcetak = parseFloat(document.getElementById("lbrcetakoffset").value) + ( 2 * parseFloat(bleed));
		var tgcetak = parseFloat(document.getElementById("tgcetakoffset").value) + ( 2 * parseFloat(bleed));
		
		var jmlcetak = document.getElementById("jmlcetakoffset").value;
		var bahan = document.getElementById("bahanoffset").value;
		var bb = "";
		var jmlwarna = document.getElementById("jmlwarnaoffset").value;
		var jmlwarna2 = document.getElementById("jmlwarnaoffset2").value;
		var lam = document.getElementById("lamoffset").value;
			
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}				
			 
		var jmlset = 1;
		var lbrf1= 1;		var tgf1 = 1;		
		var lbrf2= 1;		var tgf2 = 1;		
		var lbrf3= 1;		var tgf3 = 1;		
		var lbrf4= 1;		var tgf4 = 1;		
		var lbrf5= 1;		var tgf5 = 1;
		var lbrf6= 1;		var tgf6 = 1;
		var lbrf7= 1;		var tgf7 = 1;
		var lbrf8= 1;		var tgf8 = 1;
		var lbrf9= 1;		var tgf9 = 1;
		var lbrf10= 1;		var tgf10 = 1;
		var finishing1 = 0;
		var finishing2 = 0;
		var finishing3 = 0;
		var finishing4 = 0;
		var finishing5 = 0;
		var finishing6 = '0';		
		var finishing7 = '0';		
		var finishing8 = '0';		
		var finishing9 = '0';		
		var finishing10 = '0';		
		
		var modul="offset";
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";
		var ket = document.getElementById("ketoffset").value;
		var ket_satuan = "pcs";
		var rim = 500;
		var ongpot = 'Y';
		var kethitung = '';
		
		
		//SpotUV
		if(document.getElementById("spotuvoffset").checked == true ){
			finishing1 = '19';
			lbrf1= document.getElementById("lbrspotuvoffset").value;
			tgf1 = document.getElementById("tgspotuvoffset").value;
		}
		//poly
		if(document.getElementById("polyoffset").checked == true ){ 
			lbrpolyoffset = document.getElementById("lbrpolyoffset").value;
			tgpolyoffset = document.getElementById("tgpolyoffset").value;
			finishing2 = '10'; //Press Poly
			lbrf2= lbrpolyoffset;
			tgf2 = tgpolyoffset;			
			finishing3 = '11'; //Plat Poly
			lbrf3= lbrpolyoffset/jmlcetak;
			tgf3 = tgpolyoffset;

		}
				
		//embos
		if(document.getElementById("embosoffset").checked == true ){ 
			lbrembosoffset = document.getElementById("lbrembosoffset").value;
			tgembosoffset = document.getElementById("tgembosoffset").value;
			finishing4 = '14'; //Press embos
			lbrf4= lbrembosoffset;
			tgf4 = tgembosoffset;			
			finishing5 = '15'; //Plat embos
			lbrf5= lbrembosoffset/jmlcetak;
			tgf5 = tgembosoffset;
		}				
		//Pond
		if(document.getElementById("pondoffset").checked == true ){ 
			lbrpondoffset = document.getElementById("lbrpondoffset").value;
			tgpondoffset = document.getElementById("tgpondoffset").value;
			finishing6 = '12'; //Press pond
			lbrf6= lbrpondoffset;
			tgf6 = tgpondoffset;			
			finishing7 = '13'; //Plat pond
			lbrf7= lbrpondoffset/jmlcetak;
			tgf7 = tgpondoffset;
			ongpot = 'N';
		}		
		//Porporasi
		if(document.getElementById("porporasioffset").checked == true ){ 
			jml = document.getElementById("jmlporporasioffset").value;
			finishing8 = '21'; //Press porporasi
			lbrf8 = parseFloat(jml)/500;
		}
		//Nomorator
		if(document.getElementById("nomoratoroffset").checked == true ){ 
			jml = document.getElementById("jmlnomoratoroffset").value;
			finishing9 = '22'; //Press nomorator
			lbrf9 = jml;
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
			$('#tablekop').hide();
			 $("div.progress > div.progress-bar").css({ "width": percentComplete + "%" }); 
			if(percentComplete){setTimeout(function(){$(".progress-bar").css('background','green');$('#tablekop').show();}, 500);}}},false);
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);				

				//var data = myArr[0];
				//$('#ketoffset').val(JSON.stringify(formatMoney(data['total_jual'])));
				data = myArr;

				if( level == 'admin' || level == 'member' ){
					if( $('#tabloffset').length ){
					$('#tabloffset tr:gt(0)').remove();	
					var table = $('#tabloffset').children();					
					var i;
					var x;
					var ongkos_potong = 0;
					for (i = 0; i < data.length; i++) {
						
						if (data[i]['ongpot'] == 'Y' ){
							ongkos_potong = data[i]['ongkos_potong'];
						}						
						total = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6'])+ parseInt(data[i]['finishing7'])+ parseInt(data[i]['finishing8'])+ parseInt(data[i]['finishing9'])+ parseInt(data[i]['finishing10']);
						
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						
						profit = data[i]['persen'];
						jual = (parseInt(total) * profit / 100) + parseInt(total);
						satuan = jual / jmlcetak / jml_satuan;
						perrim = satuan *  rim;
						
						
						x +="<tr class='text-left'><td>"+data[i]['mesin']+"</td><td class='text-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";
						
					}
					table.append(x);
					
					}else{
						
						$('#tableoffset').append("<div  class='small'><table id='tabloffset' class='table table-striped table-responsive' ><thead ><tr style='background-color:<?=$warnabar;?>;color:white' ><th  class='text-left' style='width:30%'>Mesin</th><th class='text-right'>Harga</th></tr></thead></table></div>");

					var table = $('#tabloffset').children();
					var i;
					var x;
					var ongkos_potong = 0;
					for (i = 0; i < data.length; i++) {
						
						if (data[i]['ongpot'] == 'Y' ){
							ongkos_potong = data[i]['ongkos_potong'];
						}						
						total =  parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6'])+ parseInt(data[i]['finishing7'])+ parseInt(data[i]['finishing8'])+ parseInt(data[i]['finishing9'])+ parseInt(data[i]['finishing10']);
						
						
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						profit = data[i]['persen'];
						jual = (parseInt(total) * profit / 100) + parseInt(total);
						satuan = jual / jmlcetak / jml_satuan;
						perrim = satuan *  rim;
						
						
						x +="<tr class='text-left'><td>"+data[i]['mesin']+"</td><td class='text-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";
					}

					table.append(x);
					}		
				}else{

					var ongkos_potong = 0;
					if (data[0]['ongpot'] == 'Y' ){ongkos_potong = data[0]['ongkos_potong'];}	
					total =  parseInt(data[0]['totcetak']) + parseInt(data[0]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[0]['tot_ctp']) + parseInt(data[0]['totlaminating']) + parseInt(data[0]['finishing1']) + parseInt(data[0]['finishing2']) + parseInt(data[0]['finishing3']) + parseInt(data[0]['finishing4']) + parseInt(data[0]['finishing5']) + parseInt(data[0]['finishing6'])+ parseInt(data[0]['finishing7'])+ parseInt(data[0]['finishing8'])+ parseInt(data[0]['finishing9'])+ parseInt(data[0]['finishing10']);
						
					
					var arrStr = btoa(encodeURIComponent(JSON.stringify(data[0])));
					
					profit = data[0]['persen'];
					jual = (parseInt(total) * profit / 100) + parseInt(total);
					satuan = jual / jmlcetak ;
					perrim = satuan *  rim;
					
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
			
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&finishing7="+finishing7+"&finishing8="+finishing8+"&finishing9="+finishing9+"&finishing10="+finishing10+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&lbrf7="+lbrf7+"&tgf7="+tgf7+"&lbrf8="+lbrf8+"&tgf8="+tgf8+"&lbrf9="+lbrf9+"&tgf9="+tgf9+"&lbrf10="+lbrf10+"&tgf10="+tgf10+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
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