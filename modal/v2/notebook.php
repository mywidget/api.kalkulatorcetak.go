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
    $('.btnon, .btnd, .btnp').prop('disabled',true);
	$('#jmlcetakbu').keypress(validateNumber);
    $('#ketnote').keyup(function(){
        $('.btnon').prop('disabled', this.value == "" ? true : false);   
    })
});
</script>


<div class="modal-header" style="background-color:#76bf82;color:#FFF;">
	<button type="button" class="close" id="bu" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title"><?=$row['nama_produk'];?></h4>
</div>
<div class="modal-body" >
<div class="col-md-4" id="ketproduk">
	<div class="row" style="margin-right:5px;margin-left:5px">
		<div class="ket" style="margin:0; padding:5px; line-height: 1.2em;color:#000"><?=$row['keterangan'];?></div>
	</div>
</div>
<div class="col-md-8">
			<div class="col-md-7">
			<div class="form-group">
				<div class="input-group">
				  <span class="input-group-addon">Jml Cetak</span>
				  <input type="text" class="form-control" aria-label="" id="jmlcetakbu" autofocus>
				  <span class="input-group-addon">buku</span>
				</div>
			</div>
			</div>
			<div class="col-md-5">	
				<div class="form-group ukuran">
				<div class="input-group">
					<span class="input-group-addon">Ukuran</span>
					<?php $sql_ukur = mysql_query("SELECT * FROM ukuran_kertas where modul like '%buku%' ORDER BY ket_ukuran"); ?>
					<select id="ukuranbu"  class="chosen-select form-control" onchange="cariukuranbu()" data-style="btn-info" data-size="auto"  data-placeholder='Pilih Ukuran' required="required" >
					<?php while($row=mysql_fetch_array($sql_ukur)){
						if($row['id']==11){ ?>
							<option value="<?=$row['id'];?>" selected><?=$row['ket_ukuran'];?> <?php
						}else{	?>
							<option value="<?=$row['id'];?>"><?=$row['ket_ukuran'];?></option>
						<?php }} ?>
					</select>	
				</div>
				</div> 
			</div> 

											<input type="hidden" id="min_cetak" value="20">
			<div class="col-md-8">	
			<div class="form-group">
				<div class="input-group">
				  <span class="input-group-addon">Lebar</span>
				  <input type="text" class="form-control" aria-label="" id="lbrcetakbu">
				  <span class="input-group-addon">Tinggi</span>
				  <input type="text" class="form-control" aria-label="" id="tgcetakbu" onchange="cekukuranbu()">
				  <span class="input-group-addon">cm</span>
				</div>
			</div>  
			</div>
	

	
			
		<div class="col-md-12">
		  <div class="panel panel-default">
			<div class="panel-heading" style="font-size:13px; color:#000" >Isi 
			</div>
			<div class="panel-body isi1" style="padding: 2px; margin:2px">
			<div class="col-md-6">
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Jml Warna</span>
					<input type="text" class="form-control" aria-label="" id="jmlwarnabu1" value="1">
					<span class="input-group-addon">/</span>
					<input type="text" class="form-control" aria-label="" id="jmlwarnabu12" value="1" >
				</div>
				</div>
				
			</div>
												
			<div class="col-md-6">	
			<div class="form-group">
				<div class="input-group">
				  <span class="input-group-addon">Jml Lembar</span>
				  <input type="text" class="form-control" aria-label="" id="jmlhalbu1" value="50">
				</div>
			</div>
			</div>											
 
			<div class="col-md-6">
			<div class="form-group">
				<div class="input-group">
				<span class="input-group-addon">Kertas</span>
				<?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where modul like '%kopsurat%' AND pub='Y' ORDER BY id_kategori"); ?>
				<select id="bahanbu1"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
					<?php while($row=mysql_fetch_array($sql_bhn)){
					if($row['id_kategori']==10){ ?>
						<option value="<?=$row['id_kategori'];?>" selected><?=$row['nama_kategori'];?> <?php
					}else{	?>
						<option value="<?=$row['id_kategori'];?>"><?=$row['nama_kategori'];?></option>
					<?php }} ?>
				</select>	
				</div>
			</div>
			</div>

			
			<div class="col-md-6">	
			<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">Mesin Cetak</span>
				<select id="j_mesin" class="selectpicker form-control" data-style="btn-success">
				<option value="Offset" selected>Mesin Offset Besar</option>
				<option value="MiniOffset" >Mesin Offset Kecil</option>
				</select>
			</div>
			</div>
			</div>
			

			</div> 
		  </div> <!-- panel -->
		</div> 
		
	
	
  
		
	 <div class="col-md-12">	
	<div class="panel panel-default">
			<div class="panel-heading" style="font-size:13px; padding:3px 10px;">Cover Buku
			<a href="#"> <span style="color:#000;" class="glyphicon glyphicon-chevron-down pull-right" id="more4" ></span></a> </div>
			<div class="panel-body" style="padding: 2px; margin:2px">
			<div class="col-md-6">
				<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Jml Warna</span>
					<input type="text" class="form-control" aria-label="" id="jmlwarnacovbu" value="4">
					<span class="input-group-addon">/</span>
					<input type="text" class="form-control" aria-label="" id="jmlwarnacovbu2" value="0">
				</div>
				</div>
			</div>
												
			<div class="col-md-6">	
			<div class="form-group">
				<select id="jenisjilidbu" class="selectpicker form-control" data-style="btn-success">
				<option value="1" selected>Jilid Soft Cover</option>
				<option value="2" >Hard Cover</option>
				</select>
			</div>
			</div>
			<div class="col-md-6">	</div>  
			<div class="col-md-6">	  
			<div class="form-group botbuku">
			<div class="input-group">
				<span class="input-group-addon">Jenis Bot</span>
				<?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where modul like '%bot%' AND pub='Y' ORDER BY id_kategori"); ?>
				<select id="botbuku"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
				<?php while($row=mysql_fetch_array($sql_bhn)){
					if($row['id_kategori']==5){ ?>
						<option value="<?=$row['id_kategori'];?>" selected><?=$row['nama_kategori'];?> <?php
					}else{	?>
						<option value="<?=$row['id_kategori'];?>"><?=$row['nama_kategori'];?></option>
					<?php }} ?>
				</select>	
			</div>
			</div>
			</div>
			
			
			<div class="col-md-12 more4">	
			<div class="form-group">
				<div class="input-group">
				  <span class="input-group-addon">Lebar</span>
				  <input type="text" class="form-control" aria-label="" id="lbrcoverbu">
				  <span class="input-group-addon">Tinggi</span>
				  <input type="text" class="form-control" aria-label="" id="tgcoverbu" >
				  <span class="input-group-addon lbrlembuku">Lebar Lem</span>
				  <input type="text" class="form-control lbrlembuku" aria-label="" id="lbrlembuku" >
				  <span class="input-group-addon">Cm</span>
				  
				</div>
			</div>  
			</div>  
			
			<div class="col-md-6 more4">	
			<div class="form-group">
				<div class="input-group">
				  <span class="input-group-addon">
					<input type="checkbox" id="autopunggung">
				  </span>
				 <Label class="form-control">Lebar Punggung Automatis</label>
				 </div>
			</div>  
			</div> 
			<div class="col-md-6 lebpungbu more4">	
			<div class="form-group">
				<div class="input-group">
				  <span class="input-group-addon">Lebar Punggung</span>
				  <input type="text" class="form-control" aria-label="" id="lebpungbu" >
				  <span class="input-group-addon">Cm</span>
				  
				</div>
			</div>  
			</div>
			<div class="col-md-5">
			<div class="form-group">
				<div class="input-group">
				<span class="input-group-addon">Kertas</span>
				<?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where modul like '%buku%' AND pub='Y' ORDER BY id_kategori"); ?>
				<select id="bahancovbu"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
					<?php while($row=mysql_fetch_array($sql_bhn)){
					if($row['id_kategori']==5){ ?>
						<option value="<?=$row['id_kategori'];?>" selected><?=$row['nama_kategori'];?> <?php
					}else{	?>
						<option value="<?=$row['id_kategori'];?>"><?=$row['nama_kategori'];?></option>
					<?php }} ?>
				</select>
				</div>
				</div>
			</div>

			<div class="col-md-4">	
			<div class="form-group">
				<select id="jilidbu" class="selectpicker form-control" data-style="btn-success">
				<option value="1" selected>Lem Panas</option>
				<option value="2" >Spiral Kawat</option>
				<option value="3" >Steples</option>
				<option value="4" >Jahit</option>
				</select>
			</div>
			</div>											
			<div class="col-md-3">	
			<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">Posisi</span>
				<select id="posjilidbu" class="selectpicker form-control" data-style="btn-success">
				<option value="1" selected>Kiri</option>
				<option value="2" >Atas</option>
				</select>
			</div>
			</div>
			</div>
												
			<div class="col-md-6">	
			<div class="form-group">
					<select id="lamcovbu" class="selectpicker form-control" data-style="btn-warning">
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
						<input type="checkbox" id="minioffsetisi4">
					</span>
					<Label class="form-control">Mesin Minioffset</label>
					</div>
				</div>
				</div>
		<div class="more4">
			<div class="col-md-5">	
			<div class="form-group">
				<div class="input-group ">
				<span class="input-group-addon">
					<input type="checkbox" id="polybuku">
				</span>
				<Label class="form-control">Poly</label>
				</div>
			</div>
			</div>
			<div class="col-md-7">	
			<div class="form-group">
			   <div class="input-group">
				  <span class="input-group-addon">Lebar</span>
				  <input type="text" class="form-control" aria-label="" id="lbrpolybuk" value="1">
				  <span class="input-group-addon">Tinggi</span>
				  <input type="text" class="form-control" aria-label="" id="tgpolybuk" value="1">
				  <span class="input-group-addon">cm</span>
				</div>
			</div>
			</div>
			<div class="col-md-5">	
			<div class="form-group">
			<div class="input-group ">
				  <span class="input-group-addon">
					<input type="checkbox" id="embosbuku">
				  </span>
				  <Label class="form-control">Embos</label>
				</div><!-- /input-group -->
			</div>
			</div>
			<div class="col-md-7">	
			<div class="form-group">
			   <div class="input-group">
				  <span class="input-group-addon">Lebar</span>
				  <input type="text" class="form-control" aria-label="" id="lbrembosbuk" value="1">
				  <span class="input-group-addon">Tinggi</span>
				  <input type="text" class="form-control" aria-label="" id="tgembosbuk" value="1">
				  <span class="input-group-addon">cm</span>
				</div>
			</div>
			</div>

			<div class="col-md-5">
			<div class="form-group">
			<div class="input-group ">
				  <span class="input-group-addon">
					<input type="checkbox" id="spotuvbuku">
				  </span>
				  <Label class="form-control">SpotUV</label>
				</div><!-- /input-group -->	
			</div>
			</div>
					
			</div>
			</div>
			
		</div> <!-- panel -->
		</div>

  <div class="col-md-8">	
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Keterangan
            </span>
            <input type="text" class="form-control" aria-label="" id="ketnote"  placeholder="Isi dulu keterangannya">
          </div>
        </div>
      </div>
      <div class="col-md-4">	
        <div class="form-group">
          <button  type="submit" id="button" class="btn btn-primary btnon" onclick="hitungbu1(1)">Hitung
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
			<div id="tnotebook">
			<form action="detail-hitung/" method="post" target="_blank">
			<input type="hidden" id="token" name="token">
			<input type="hidden" id="user"  name="user">	
			<input type="hidden" id="modul" name="modul">
			<input type="hidden" name="data1[]" id="databuku1"  value="">
			<input type="hidden" name="data2[]" id="databuku2" value="">
			<input type="hidden" name="data3[]" id="databuku3" value="">
			<input type="hidden" name="ket" id="ketnote" value="">
			<input type="hidden" name="jumlahcetak" id="jumlahcetakbuku" value="">
			
			<table id='tablebuku' class='table table-striped table-responsive' >
			<thead >
			<tr style='background-color:<?=$warnabar;?>;color:white' >
			<th class='text-left'>Harga Jual</th><th></th>
			</tr>
			</thead>
			
			<tr><td class='text-left'> <span id="satuanbukuku"></span></td><td class='text-right' ><button type='submit' name='submit' value='0' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px' onclick="this.form.submit()"><span id="totjualbuku"></span></button></td></tr>
			</table>												
		</form> 
		</div>
      </div>
	
</div>  
<script>
$(document).ready(function(){
	
	$('#ukuranbu').val('11');
	$('#lbrcetakbu').val('14.8');
	$('#tgcetakbu').val('21');
	$('#lbrcoverbu').val('14.8');
	$('#tgcoverbu').val('21');
	$('.lbrlembuku').hide();
	$('.botbuku').hide();
	$('#lbrlembuku').val('1.5');
	$('#lebpungbu').prop('readonly', true);
	$('#autopunggung').attr('checked', 'checked');
	$('#tnotebook').hide();
	
	$('.more4').hide();
	$('.harga').hide();
	
})
	$( "#profits"+modulhit).keyup(function() {
		profit = $('#profits'+modulhit).val();
		tot = angka($('#totdumy'+modulhit).val());
		jual = parseFloat(profit * tot/100) + parseInt(tot);
		satuan = jual / $('#jmlcetakbu').val();
		perrim = satuan * 500;
		$('#satuan'+modulhit).val(formatMoney(satuan));
		$('#hargarim'+modulhit).val(formatMoney(perrim));
		$('#total'+modulhit).val(formatMoney(jual));
	})	
	$('#jenisjilidbu').on('change', function() {
		if( this.value == '2'){
			$('.lbrlembuku').show();
			$('.botbuku').show();
			
		}else{
			$('.lbrlembuku').hide();
			$('.botbuku').hide();
		}
	})
	
	


	
	$('#more4').click(function(){
		if($('.more4').is(":hidden")) 
        {
			$('.more4').show();
			$("#more4").removeClass("glyphicon glyphicon-chevron-down").addClass("glyphicon glyphicon-chevron-up");	
		}else{
			$('.more4').hide();
			$("#more4").removeClass("glyphicon glyphicon-chevron-up").addClass("glyphicon glyphicon-chevron-down");	
		}			
	});	
	
	

  
function hitungbu1() {
$('#button').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
$('#tnotebook').hide();
		//Isi Warna	
		var lbrcetak = document.getElementById("lbrcetakbu").value ;
		var tgcetak = document.getElementById("tgcetakbu").value;
		var jmlcetak = document.getElementById("jmlcetakbu").value;
		var jilidbu = document.getElementById("jilidbu").value;
		var posjilidbu = document.getElementById("posjilidbu").value;
		
		var jmlset = 1;
		var jmlcetak = parseInt(jmlcetak) * parseInt(document.getElementById("jmlhalbu1").value);
		
		var j_mesin = document.getElementById("j_mesin").value;
			
		if (jilidbu > 2){
			
				jmlcetak = parseFloat(jmlcetak) / 2;
				lbrcetak = parseFloat(lbrcetak);
				tgcetak = parseFloat(tgcetak) ;
			
		}else{
			lbrcetak = parseFloat(lbrcetak)  ;
			tgcetak = parseFloat(tgcetak) ;
		}
		
		var bahan = document.getElementById("bahanbu1").value;
		var bb = ""; //document.getElementById("bbbu1").value;
		var jmlwarna = document.getElementById("jmlwarnabu1").value;
		var jmlwarna2 = document.getElementById("jmlwarnabu12").value;
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!! " + jmlwarna);
				return;
			}			
		var lam = "0";
		var lbrf1= 1;		var tgf1 = 1;		
		var lbrf2= 1;		var tgf2 = 1;		
		var lbrf3= 1;		var tgf3 = 1;		
		var lbrf4= 1;		var tgf4 = 1;		
		var lbrf5= 1;		var tgf5 = 1;
		var lbrf6= 1;		var tgf6 = 1;
		var finishing6 = '0';		
		var finishing1 = 0;
		var finishing2 = 0;
		var finishing3 = 0;
		var finishing4 = 0;
		var finishing5 = 0;
		
		var modul = 'notebook';
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";
		var ket = document.getElementById("ketnote").value;
		var ket_satuan = "buku";
		var rim = 500;
		var box = 100;
		var ongpot = 'Y';
		var kethitung = 'Isi_Buku_1';
		var ongkos_lipat = 'N';
		
		
		
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
	//	alert(jmlcetak);
	//Hitung Isinya----------------------------------------	
		var xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				
			//	setTimeout(function(){$(".progress-bar").css('width','20%'); }, 1000); 	
				myArr = JSON.parse(xmlhttp.responseText);	
				data = myArr[0];
				
				hitungcoverbu(data);
				
				// var ongkos_potong = 0;
				// if (data[0]['ongpot'] == 'Y' ){ongkos_potong = data[0]['ongkos_potong'];}	
				// total = parseInt(data[0]['totcetak']) + parseInt(data[0]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[0]['tot_ctp']) + parseInt(data[0]['totlaminating']) + parseInt(data[0]['finishing1']) + parseInt(data[0]['finishing2']) + parseInt(data[0]['finishing3']) + parseInt(data[0]['finishing4']) + parseInt(data[0]['finishing5']) + parseInt(data[0]['finishing6']);	

				
				
				// profit = data[0]['persen'];
				// jual = (parseInt(total) * profit / 100) + parseInt(total);
				// //jual = rebuan(jual);
				// jmlctk = document.getElementById("jmlcetakbu").value;;
				// satuan = jual / jmlctk;
				
					

					// //$('#totjualbuku').html("Rp. " + formatMoney(jual));
					// $('#hasilhitung').show();
					// $('#hasilhitung').html("Harga Rp. " + formatMoney(satuan) + "/buku x " + jmlctk + " = Rp. " + formatMoney(jual) + "<p style='font-size:14px;color:#000;margin:0px'>Selesai Pekerjaan Minimal satu Minggu</p>");	
				
				}
		}	
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung+"&jilid="+posjilidbu+"&ongkos_lipat="+ongkos_lipat;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();

}
		
	
	


function hitungcoverbu(x) {
	$('#tnotebook').show();
		data1 = x;
		//Isi Warna	
		
		var lbrcetak = document.getElementById("lbrcetakbu").value;
		var tgcetak = document.getElementById("tgcetakbu").value;
		var jmlcetak = document.getElementById("jmlcetakbu").value;
		var jilidbu = document.getElementById("jilidbu").value;
		var jmlset = 1;
		
		//Ketebalan Buku (0.0013 x gramatur kertas) x (jumlah halaman / 2) mm
		//Konvert nama bahan kedalam number untuk mengambil angkanya saja
		
		var txt1 = document.getElementById("bahanbu1").value;
		var gramasi1 = txt1.match(/\d/g);
		gramasi1 = gramasi1.join("");		
				
		var jmlhal1 = document.getElementById("jmlhalbu1").value;
		var tblbuku1 = (0.0013 * gramasi1) * (jmlhal1/2);
		
		var tebalbuku = $('#lebpungbu').val();
		if(document.getElementById("minioffsetisi4").checked == true ){		
			var j_mesin = 'MiniOffset';
		}else{
			var j_mesin = '';
		}	

		if(document.getElementById("autopunggung").checked == true ){		
			tblbuku = parseFloat(tblbuku1);
			$('#lebpungbu').val(tblbuku);
		}else{
			tblbuku = $('#lebpungbu').val();
		}	
		
		
		
				
		if (jilidbu == '1'){
			finishing1 = 23;
			lbrf1 = tgcetak * tblbuku ;
			tgf1 =	1;	
		}else if(jilidbu == '2'){
			finishing1 = 24;
			lbrf1 = 1;
			tgf1 =	tgcetak;	
		}else if(jilidbu == '3'){
			finishing1 = 48;
			lbrf1 = 1;
			tgf1 =	1;	
		
		}else{
			finishing1 = 47;
			lbrf1 = 1;
			tgf1 =	1;	
		}
		
	
		
		
		
		tgcetak = parseFloat(tgcetak) ;
		lbrcetak = (lbrcetak * 2) + parseInt(Math.ceil(tblbuku));
		//Jilid Hardcover
		jenisjilidbu = document.getElementById("jenisjilidbu").value;
		if (jenisjilidbu=='2'){
			lbrcetak = parseFloat(lbrcetak) + (parseFloat(document.getElementById("lbrlembuku").value) * 2); 
			tgcetak = parseFloat(tgcetak) + (parseFloat(document.getElementById("lbrlembuku").value) * 2); 
		}
		
		var bahan = document.getElementById("bahancovbu").value;
		var bb = "";//document.getElementById("bbcovbu").value;
		var jmlwarna = document.getElementById("jmlwarnacovbu").value;
		var jmlwarna2 = document.getElementById("jmlwarnacovbu2").value;
			
		
		var lam = document.getElementById("lamcovbu").value;
		var lbrf2= 1;		var tgf2 = 1;		
		var lbrf3= 1;		var tgf3 = 1;		
		var lbrf4= 1;		var tgf4 = 1;		
		var lbrf5= 1;		var tgf5 = 1;
		var lbrf6= 1;		var tgf6 = 1;
		var lbrf7= 1;		var tgf7 = 1;
		var finishing2 = 0;
		var finishing3 = 0;
		var finishing4 = 0;
		var finishing5 = 0;
		var finishing6 = '0';		
		var finishing7 = '0';		
		
		var modul = 'notebook';
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";
		var ket = document.getElementById("ketnote").value;
		var ket_satuan = "lbr";
		var rim = 500;
		var box = 100;
		var ongpot = 'Y';
		// var j_mesin = '';
		var kethitung = "Cover";
		

	//	alert(jmlset);
		
//Poly
		if(document.getElementById("polybuku").checked == true ){
			finishing2 = '10'; //poly
			lbrf2= 1;
			tgf2 = 1;			
			finishing5 = '11'; //plat
			lbrf5= parseFloat(document.getElementById("lbrpolybuk").value) / jmlcetak;
			tgf5 = document.getElementById("tgpolybuk").value;
			//alert("d");
		}
//SpotUV		
		if(document.getElementById("spotuvbuku").checked == true ){
			finishing4 = '19';
			lbrf4= lbrcetak / jmlcetak;
			tgf4 = tgcetak;
		}
		
		//alert(lbrcetak + 'x' + tgcetak);		
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				
				var data2 = myArr[0];
				hitungbotbuku(data1,data2);
				
				
			}
		}	
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&finishing7="+finishing7+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&lbrf7="+lbrf7+"&tgf7="+tgf7+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();	
					

		}		
		
function hitungbotbuku(data1,data2){
		
		var jmlcetak = document.getElementById("jmlcetakbu").value;
		var jml_satuan=1;
		var modul = 'kalmej';
		var insheet="1";
		var cetak_bagi="Y";
		var ket = document.getElementById("ketnote").value;
		var ket_satuan = "buku";
		var ongpot = 'Y';
		var rim = 500;
		var kethitung = "Bot";
		
		var jenisjilidbu = document.getElementById("jenisjilidbu").value;
		if (jenisjilidbu=='2'){
			var lbrcetak = (parseFloat(document.getElementById("lbrcetakbu").value) * 2) + parseFloat(document.getElementById("lebpungbu").value);
			var tgcetak = document.getElementById("tgcetakbu").value;
			var bahan = document.getElementById("botbuku").value;		
			var jmlwarna = 0;			
			var jmlwarna2 = 0;			
			var lam = 0;
			var bb = 1;
			var jmlset = 1;
			var lbrf1= 1;		var tgf1 = 1;		
			var lbrf2= 1;		var tgf2 = 1;		
			var lbrf3= 1;		var tgf3 = 1;		
			var lbrf4= 1;		var tgf4 = 1;		
			var lbrf5= 1;		var tgf5 = 1;
			var lbrf6= 1;		var tgf6 = 1;
			var finishing1 = 0; var finishing2 = 0; var finishing3 = 0;var finishing4 = 0; var finishing5 = 0; var finishing6 = '0';	
			
			
			
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					
					myArr = JSON.parse(xmlhttp.responseText);	
					data3 = myArr[0];
				//	alert(JSON.stringify(data3))
					hasilbuku(data1,data2,data3);
				}
			}	
				isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&kethitung="+kethitung;
				
				isi=btoa(isi); //encode			
				xmlhttp.open("GET","wadah.php?isi="+isi,true);
				xmlhttp.send();
		}else{
			var data3 = {};
			hasilbuku(data1,data2,data3);
		}
		
}		
	
function hasilbuku(data1,data2,data3){
	
		var jmlcetak = document.getElementById("jmlcetakbu").value;
		var ket = document.getElementById("ketnote").value;
		
			if (data1['ongpot'] == 'Y' ){ ongkos_potong = data1['ongkos_potong'];}
				else{ ongkos_potong = 0; }				
				
				subtotal1 = parseInt(data1['totcetak']) + parseInt(data1['totbhn']) + parseInt(ongkos_potong) + parseInt(data1['tot_ctp']) + parseInt(data1['totlaminating']) + parseInt(data1['finishing1']) + parseInt(data1['finishing2']) + parseInt(data1['finishing3']) + parseInt(data1['finishing4']) + parseInt(data1['finishing5']) + parseInt(data1['finishing6'])+ parseInt(data1['tot_lipat']);
				var arrStr1 = btoa(encodeURIComponent(JSON.stringify(data1)));
				
		//data2		
				if(!!(data2['hrgbhn'])){ 				
					if (data2['ongpot'] == 'Y' ){ ongkos_potong = data2['ongkos_potong'];} else{ ongkos_potong = 0; }				
					
					subtotal2 = parseInt(data2['totcetak']) + parseInt(data2['totbhn']) + parseInt(ongkos_potong) + parseInt(data2['tot_ctp']) + parseInt(data2['totlaminating']) + parseInt(data2['finishing1']) + parseInt(data2['finishing2']) + parseInt(data2['finishing3']) + parseInt(data2['finishing4']) + parseInt(data2['finishing5']) + parseInt(data2['finishing6'])+ parseInt(data2['tot_lipat']);
					var arrStr2 = btoa(encodeURIComponent(JSON.stringify(data2)));
				}else{
					var subtotal2 = '0';
					var arrStr2 = '';
					//alert('a');
				}
				
		//data3
				if(!!(data3['hrgbhn'])){ 
					if (data3['ongpot'] == 'Y' ){ ongkos_potong = data3['ongkos_potong'];} else{ ongkos_potong = 0; }				
					
					subtotal3 = parseInt(data3['totcetak']) + parseInt(data3['totbhn']) + parseInt(ongkos_potong) + parseInt(data3['tot_ctp']) + parseInt(data3['totlaminating']) + parseInt(data3['finishing1']) + parseInt(data3['finishing2']) + parseInt(data3['finishing3']) + parseInt(data3['finishing4']) + parseInt(data3['finishing5']) + parseInt(data3['finishing6'])+ parseInt(data3['tot_lipat']);
					var arrStr3 = btoa(encodeURIComponent(JSON.stringify(data3)));
				}else{
					var subtotal3 = '0';
					var arrStr3 = '';
					//alert('a');
				}
						
						
			total = parseInt(subtotal1) + parseInt(subtotal2) + parseInt(subtotal3) ;
			profit = data1['persen'];
			jual = (parseInt(total) * parseInt(profit) / 100) + parseInt(total);
			jual = rebuan(jual);
			satuan = parseInt(jual / jmlcetak);

			//	alert(arrStr2);
			$('#databuku1').val(arrStr1);
			$('#databuku2').val(arrStr2);
			$('#databuku3').val(arrStr3);
			$('#ketnote').val(ket);
			$('#totjualbuku').html("Rp. " + formatMoney(jual));
			$('#satuanbukuku').html("Rp. " + formatMoney(satuan) + "/pcs");	
			$('#button').html('Hitung');
			
			if( level == 'admin' || level == 'member' ){
				$('#tnotebook').show(); 
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

		function cariukuranbu(){
			var ukuran = document.getElementById("ukuranbu").value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				document.getElementById("lbrcetakbu").value = myArr[0];
				document.getElementById("lbrcoverbu").value = myArr[0];
				document.getElementById("tgcetakbu").value = myArr[1];
				document.getElementById("tgcoverbu").value = myArr[1];
				document.getElementById("min_cetak").value = myArr[2];
			//alert(myArr[0].toString());
			}
			}
			  xmlhttp.open("GET","function/cariukuran.php?ukuran="+ukuran,true);
			  xmlhttp.send();	
		}
		
	
		function cekukuranbu(){
			var lbrcetak = document.getElementById("lbrcetakbu").value;
			var tgcetak = document.getElementById("tgcetakbu").value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				if (myArr[0].toString()=='N'){
				alert('Ukuran Kebesaran');
				document.getElementById("tgcetakbu").value = 0;
				document.getElementById("lbrcetakbu").value = 0;
				}
			}
			}
			  xmlhttp.open("GET","function/cekukuran_on.php?lbrcetak="+lbrcetak+"&tgcetak="+tgcetak,true);
			  xmlhttp.send();	
		}

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