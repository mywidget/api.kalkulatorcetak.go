<?php
if (empty($_SESSION['g_level'])){
header("Content-Type: application/json");
echo json_encode(array(401 => "error login"));
}else{
if (($referer==$host OR $referer==$_POST['link'])) {
$warnabar = "#704e34";
?>

<script>
$(document).ready(function(){
$('.harga').hide();
$('.printpenawaran').hide();
$(".alert").hide();
	$('#print_foot').hide();
     $('.btnon, .btnd, .btnp').prop('disabled',true);
	$('#jmlcetakkm').keypress(validateNumber);
    $('#ketkalmej').keyup(function(){
        $('.btnon').prop('disabled', this.value == "" ? true : false);     
    })
});
$('.modal').on('hidden.bs.modal', function(){
	$(this).removeData('bs.modal');
});
</script>
<div class="modal-header" style="background-color:<?=$warnabar;?>;color:white;">
	<button type="button" class="close" id="km" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Cetak Kalender Meja</h4>
</div>
<div class="modal-body">
                        
								<div class="col-md-6">
									<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon">Jumlah Cetak</span>
										<input type="text" class="form-control" id="jmlcetakkm" placeholder="Jumlah Cetak" autofocus >
										
									</div>
									</div>
								</div> 
								<div class="col-md-6">
									<div class="form-group ukuran">
									<div class="input-group">
										<span class="input-group-addon">Ukuran</span>
										<?php $sql_ukur = mysql_query("SELECT * FROM ukuran_kertas where modul like '%kalmej%' ORDER BY ket_ukuran"); ?>
										<select id="ukurankm"  class="chosen-select form-control" onchange="cariukurankm()" data-style="btn-info" data-size="auto" data-placeholder='Pilih Ukuran' required="required" >
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
										<input type="text" class="form-control" id="lbrcetakkm" placeholder="Lebar">
										<span class="input-group-addon">Tinggi</span>
										<input type="text" class="form-control" id="tgcetakkm" placeholder="Tinggi" >
										<span class="input-group-addon">cm</span>
									</div>  
									</div> 
								</div> 
								<div class="col-md-4">	   
									<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon">Bleed</span>
										<input type="text" class="form-control" id="bleedkk" value="0.4" placeholder="Bleed">
										<span class="input-group-addon">cm</span>
									</div>  
									</div> 
								</div> 
                                       
									
									<div class="col-md-12">
									<div class="panel panel-default" >
											<div class="panel-heading" style="font-size:13px; height:20px; padding:3px 10px;">Isi Kalender Meja
											</div>
											<div class="panel-body">
											
												<div class="col-md-6">	
													<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon">Jumlah Warna</span>
														<input type="text" class="form-control" id="jmlwarnakm" value="4" >
														<span class="input-group-addon">/</span>
														<input type="text" class="form-control" aria-label="" id="jmlwarnakm2" value="4" >
													</div>
													</div>
												</div>
												<div class="col-md-6">	
													<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon">Jumlah Lembaran</span>
														<input type="text" class="form-control" id="jmlsetkm" value="13" >
														<span class="input-group-addon">Lembar</span>
													</div>
													</div>
													</div>
													<!-- Tarikan -->
												 <div class="col-md-6">	  
													<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon">Jenis Kertas</span>
														<?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where modul like '%kalmej%' AND pub='Y' ORDER BY id_kategori"); ?>
														<select id="bahankm"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
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
													

													<div class="col-md-6">
													<div class="form-group">
														<select id="lamkm" class="selectpicker form-control" data-style="btn-warning">
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
													
													<div class="col-md-3">
													<div class="form-group">
														<div class="input-group ">
														  <span class="input-group-addon">
															<input type="checkbox" id="finishing4km">
														  </span>
														  <Label class="form-control">SpotUv</label>
														</div>
													</div>
													</div>
													
													<div class="col-md-3">	
													<div class="form-group">
														<div class="input-group ">
														  <span class="input-group-addon">
															<input type="checkbox" id="finishing1kalmej">
														  </span>
														  <Label class="form-control" >Poly</label>											 
														</div><!-- /input-group -->
													</div>
													</div>
													<div class="col-md-6">	
													<div class="form-group">
													   <div class="input-group">
														  <span class="input-group-addon">Lebar poly</span>
														  <input type="text" class="form-control" aria-label="" id="lbrpolykalmej" value="1">
														  <span class="input-group-addon">x</span>
														  <input type="text" class="form-control" aria-label="" id="tgpolykalmej" value="1">
														</div>
													</div>
													</div>
                                       
                                        </div>
									</div>
									</div>
										
									<div class="col-md-12">	
									<div class="panel panel-default" >	
									<div class="panel-body">	
										<div class="col-md-6">
										<div class="form-group">
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="botkalmej">
											  </span>
											  <Label class="form-control" >Centang Dudukan Pakai Hard Bot</label>
											</div>
										</div>
										</div>
										<div class="col-md-6">	  
										<div class="form-group bahanbotkalmej">
										<div class="input-group">
											<span class="input-group-addon">Jenis Bot</span>
											<?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where modul like '%bot%' AND pub='Y' ORDER BY id_kategori"); ?>
											<select id="bahanbotkalmej"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
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
										
										
										<div class="col-md-7">	  
										<div class="form-group kertaspenutup">
										<div class="input-group">
											<span class="input-group-addon">Kertas Penutup Bot</span>
											<?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where modul like '%kalmej%' AND pub='Y' ORDER BY id_kategori"); ?>
											<select id="kertaspenutup"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
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
										
										<div class="col-md-5">	
													<div class="form-group jmlcetakpenutupbot">
													<div class="input-group">
														<span class="input-group-addon">Cetak Berapa Warna</span>
														<input type="text" class="form-control" id="jmlcetakpenutupbot" value="0" >
														
													</div>
													</div>
										</div>
										
										<div class="col-md-5 lampenutupbot">
													<div class="form-group ">
														<select id="lampenutupbot" class="selectpicker form-control" data-style="btn-warning">
														<option value="0" selected>Tanpa Laminasi</option>
														<option value="3">Laminating Glosy</option>
														<option value="5">Laminating DOP</option>
														</select>
													</div>
										</div>
										<div class="col-md-7">
										<div class="form-group ukurandudukan">
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="ukurandudukan">
											  </span>
											  <Label class="form-control" >Centang Jika Ukuran Dudukan Beda</label>
											</div>
										</div>
										</div>
										<div class="col-md-12">	   
											<div class="form-group ukurandudukankm">
											<div class="input-group">
												<span class="input-group-addon">Lebar</span>
												<input type="text" class="form-control" id="lbrcetakdudukankm" placeholder="Lebar">
												<span class="input-group-addon">Tinggi</span>
												<input type="text" class="form-control" id="tgcetakdudukankm" placeholder="Tinggi" >
												<span class="input-group-addon">Lebar Bawah</span>
												<input type="text" class="form-control" id="lebarbawahkm" placeholder="Lebar Bawah" >
												<span class="input-group-addon lemkm">Lem</span>
												<input type="text" class="form-control lemkm" id="lemkm" placeholder="Lem" >
												<span class="input-group-addon">cm</span>
											</div>  
											</div> 
										</div> 
										
										
										<div class="col-md-7">	  
										<div class="form-group kertasdudukan">
										<div class="input-group">
											<span class="input-group-addon">Jenis Kertas untuk Dudukan</span>
											<?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where modul like '%kalmej%' AND pub='Y' ORDER BY id_kategori"); ?>
											<select id="kertasdudukan"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
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
										<div class="col-md-5">
										<div class="form-group warnadudukan">
										<div class="input-group">
											<span class="input-group-addon">Dicetak berapa Warna</span>
                                            <input type="text" class="form-control" id="warnadudukan" value="0" >
                                        </div>
                                        </div>
										</div>		
                                        </div>
                                        </div>
                                        </div>
										
										
																			
										<div class="col-md-6">
										<div class="form-group">
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="boxkm">
											  </span>
											  <Label class="form-control" >Dikemas dalam Amplop</label>
											</div>
										</div>
										</div>
										
										<div class="col-md-6">
										<div class="form-group lebihukuranamplop">
										<div class="input-group">
											<span class="input-group-addon">Lebihkan ukuran</span>
                                            <input type="text" class="form-control" id="lebihukuranamplop" value="3" >
											<span class="input-group-addon">cm</span>
                                        </div>
                                        </div>
										</div>
										
										<div class="col-md-6">
										<div class="form-group warnaboxkm">
										<div class="input-group">
											<span class="input-group-addon">Jumlah Warna</span>
                                            <input type="text" class="form-control" id="warnaboxkm" value="0" >
                                        </div>
                                        </div>
                                        
										</div>										
										<div class="col-md-6">
										<div class="form-group bahanboxkm">
										<div class="input-group">
											<span class="input-group-addon">Jenis Kertas</span>
											<?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where pub='Y' ORDER BY id_kategori"); ?>
											<select id="bahanboxkm"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
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
										
											
									<div class="col-md-8">	
                                        <div class="form-group">
										<div class="input-group">
										<span class="input-group-addon">Keterangan</span>
										<input type="text" class="form-control" aria-label="" id="ketkalmej"  placeholder="Isi dulu keterangannya">
										</div>
										</div>
									</div>
                                        <div class="col-md-4">	
                                        <div class="form-group">
											<button type="submit" class="btn btn-primary btnon" onclick="hitungkm()">Hitung</button>
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
		 <button type="button" class="btn btn-primary printpenawaran"><i class="fa fa-external-link" aria-hidden="true"></i></button>	
        </div>
      </div>
      </div>
										
										<div class="col-md-12">
                                        <div class="form-group">
											<div id="tablekalmej">
			<form action="detail-hitung/" method="post" target="_blank">
			<input type="hidden" id="token" name="token">
			<input type="hidden" id="user"  name="user">	
			<input type="hidden" id="modul" name="modul">
												<input type="hidden" name="data1[]" id="data1"  value="">
												<input type="hidden" name="data2[]" id="data2" value="">
												<input type="hidden" name="data3[]" id="data3" value="">
												<input type="hidden" name="data4[]" id="data4" value="">
												<input type="hidden" name="data5[]" id="data5" value="">
												<input type="hidden" name="ket" id="ket" value="">
												<input type="hidden" name="jumlahcetak" id="jumlahcetak" value="">
												
												<div id='tablkm' class='small'>
												<table id='tablkm' class='table table-striped table-responsive' >
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
				

            </div>      
<script>






$(document).ready(function(){
	$('#ukurankm').val('29');
	$('#lbrcetakkm').val('24');
	$('#tgcetakkm').val('15');	
	$('#lbrcetakdudukankm').val('24');
	$('#tgcetakdudukankm').val('15');
	$('#lebarbawahkm').val('8');
	$('#lemkm').val('1.5');
	$('#bbkm').val('2');
	$('#lebihukuranamplop').val('3');
	$('.lebihukuranamplop').hide();
	$('#tablekalmej').hide();
	$('.bahanboxkm').hide();
	$('.warnaboxkm').hide();
	$('.warnadudukan').hide();
	$('.kertasdudukan').hide();
	$('.ukurandudukankm').hide();
	$('.harga').hide();
	$('#botkalmej').attr('checked', 'checked');
	
})

	$( "#profits"+modulhit).keyup(function() {
		profit = $('#profits'+modulhit).val();
		tot = angka($('#totdumy'+modulhit).val());
		jual = parseFloat(profit * tot/100) + parseInt(tot);
		satuan = jual / $('#jmlcetakkm').val();
		perrim = satuan * 500;
		$('#satuan'+modulhit).val(formatMoney(satuan));
		$('#hargarim'+modulhit).val(formatMoney(perrim));
		$('#total'+modulhit).val(formatMoney(jual));
	})	
	
	$( "#lbrcetakkm" ).keyup(function() {
		$('#lbrcetakdudukankm').val($('#lbrcetakkm').val());
	})	
	$( "#tgcetakkm" ).keyup(function() {
		$('#tgcetakdudukankm').val($('#tgcetakkm').val());
	})
	
	 $('#botkalmej').click(function() {
        if($(this).is(":checked"))
        {
			$('.bahanbotkalmej').show();
			$('.kertaspenutup').show();
			$('.jmlcetakpenutupbot').show();
			$('.kertasdudukan').hide();
			$('#warnadudukan').val('0');
			$('.warnadudukan').hide();
			$('.lampenutupbot').show();
			$('.lemkm').show();
        } else {
			$('.bahanbotkalmej').hide();
			$('.kertaspenutup').hide();
			$('.jmlcetakpenutupbot').hide();
			$('.kertasdudukan').show();
			$('.warnadudukan').show();
			$('#warnadudukan').val('0');
			$('.lampenutupbot').hide();
			$('.lemkm').hide();
			
        }
    });	 
	
	$('#boxkm').click(function() {
        if($(this).is(":checked"))
        {
			$('.bahanboxkm').show();
			$('.warnaboxkm').show();
			$('.lebihukuranamplop').show();
			$('#warnaboxkm').val('1');
        } else {
			$('.bahanboxkm').hide();
			$('.warnaboxkm').hide();
			$('.lebihukuranamplop').hide();
			$('#warnaboxkm').val('0');
        }
    });
		
		$('#ukurandudukan').click(function() {
        if($(this).is(":checked"))
        {
			$('.ukurandudukankm').show();
        } else {
			$('.ukurandudukankm').hide();
        }
    });
	

	
	
	

var totalisi = 0;
var totalcover = 0;
	
function hitungkm() {
		$(".progress-bar").css('background','red'); 
		$(".progress-bar").css('width','5%');
		$('#tablekalmej').hide();
		$(".harga").hide();
		$('#profits'+modulhit).val('0');
		// setTimeout(function(){$(".progress-bar").css('width','25%'); }, 1000); 		
		var bleed = document.getElementById("bleedkk").value;
		var lbrcetak = parseFloat(document.getElementById("lbrcetakkm").value) + ( 2 * parseFloat(bleed));
		var tgcetak = parseFloat(document.getElementById("tgcetakkm").value) + ( 2 * parseFloat(bleed));	
		
		var jmlcetak = document.getElementById("jmlcetakkm").value;
		var bahan = document.getElementById("bahankm").value;
		var bb = "";
		var jmlwarna = document.getElementById("jmlwarnakm").value;
		var jmlwarna2 = document.getElementById("jmlwarnakm2").value;
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}	
		var lam = document.getElementById("lamkm").value;
		var jmlset = document.getElementById("jmlsetkm").value;
		var lbrf1= 1;		var tgf1 = 1;		
		var lbrf2= 1;		var tgf2 = 1;		
		var lbrf3= 1;		var tgf3 = 1;		
		var lbrf4= 1;		var tgf4 = 1;		
		var lbrf5= 1;		var tgf5 = 1;
		var lbrf6= 1;						var tgf6 = 1;
		var finishing6 = '0';		
		var finishing2 = 0;
		var finishing3 = 0;
		var finishing4 = 0;
		var finishing5 = 0;
		var finishing1 = 0;
		
		var modul = 'kalmej';
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";
		var ket = document.getElementById("ketkalmej").value;
		var ket_satuan = "lbr";
		var rim = 500;
		var box = 100;
		var ongpot = 'Y';
		var kethitung = "Isi_Kalender"
		
		//ongkos komplit
		var jmllembar = jmlset;
				if(jmllembar > 1){
					finishing5 = '100';
					lbrf5= jmllembar;	
				}
		
		

		if(document.getElementById("finishing1kalmej").checked == true ){ //Poly
			lbrpolykalmej = document.getElementById("lbrpolykalmej").value;
			tgpolykalmej = document.getElementById("tgpolykalmej").value;
			finishing2 = '10'; //Press Poly
			lbrf2= lbrpolykalmej;
			tgf2 = tgpolykalmej;			
			finishing1 = '11'; //Plat Poly
			lbrf1= lbrpolykalmej/jmlcetak;
			tgf1 = tgpolykalmej;

		}
		
				
	//SPOT UV
		if(document.getElementById("finishing4km").checked == true ){
			finishing4 = '19';
			lbrf4= lbrcetak * jmlset;
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
	//Hitung Isinya----------------------------------------	
		var xmlhttp = new XMLHttpRequest();      
 xmlhttp.addEventListener("progress", function (evt)
 {if (evt.lengthComputable){var percentComplete = (evt.loaded / evt.total) *100;
 $("div.progress > div.progress-bar").css({ "width": percentComplete + "%" }); }},false);

		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				
				//$(".progress-bar").css('width','25%');
				myArr = JSON.parse(xmlhttp.responseText);	
				data = myArr;
				//$('#ketkalmej').val(JSON.stringify(data2));				
				// alert(JSON.stringify(data2));
				var tc = (data[0]['jmlcetak']).split("|"); //Jika ada 2 data 									
				if (tc.length == 2){
				//alert(JSON.stringify(myArr));	
						var arr = myArr[0];
						var a= "";
						var aa= "";
						var b = "";
						for (var key in arr) {
							// skip loop if the property is from prototype
							var obj = arr[key];
							if (arr.hasOwnProperty(key)) {
								dat = b + obj;	
								a += '"'+ key + '"' + ':'+ '"' + dat.toString().split("|",1) + '",' ;
								
								var n = dat.toString().indexOf("|");
								var dat2 = dat.substring(n+1,dat.length);
								aa += '"'+ key + '"' + ':'+ '"' + dat2 + '",' ;
							}
						}
						
						var newStr = a.substring(0, a.length-1);
						var newStr2 = aa.substring(0, aa.length-1);
						var data1= JSON.parse("{" + newStr + "}");
						var data2= JSON.parse("{" + newStr2 + "}");
			
				//	$('#ketkalmej').val(JSON.stringify(data1) + " --- " + JSON.stringify(data2) + " ---" + JSON.stringify(myArr));				
					//alert(data[0]['totcetak'].split("|"));
				}else{
					var data1 = myArr[0];
					var data2 = {};
					//$('#ketkalmej').val(data2[0]['jmlcetak']);		
					//alert(data[0]['totcetak']);
				}
				hitungbotkalmej(data1,data2)
				
			}
		}	
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&kethitung="+kethitung;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();			

		
}		


function hitungbotkalmej(x,y){
		var data1 = x;	
		var data2 = y;	
		 // $(".progress-bar").css('width','50%');
		
		if(document.getElementById("botkalmej").checked == true ){
			var lbrcetak = document.getElementById("lbrcetakdudukankm").value;
			var tgcetak = parseFloat(document.getElementById("tgcetakdudukankm").value) + (parseFloat(document.getElementById("lebarbawahkm").value) / 2);
			var bahan = document.getElementById("bahanbotkalmej").value;		
			var jmlcetak = parseInt(document.getElementById("jmlcetakkm").value) * 2;
			var jmlwarna = 0;	
//spiral
		finishing1 = '24';
		lbrf1= document.getElementById("lbrcetakkm").value / 2;

			
		}else{
			var lbrcetak = document.getElementById("lbrcetakdudukankm").value;
			var tgcetak = 2 * parseFloat(document.getElementById("tgcetakdudukankm").value) + (parseFloat(document.getElementById("lebarbawahkm").value));

			var bahan = document.getElementById("kertasdudukan").value;		
			var jmlcetak = parseInt(document.getElementById("jmlcetakkm").value);
			var jmlwarna = document.getElementById("warnadudukan").value;			

			//spiral
		finishing1 = '24';
		lbrf1= document.getElementById("lbrcetakkm").value;
			
		}
		
		
		
		var lam = 0;
		var bb = 1;
		var jmlset = 1;
		//var lbrf1= 1;		
		var tgf1 = 1;		
		var lbrf2= 1;		var tgf2 = 1;		
		var lbrf3= 1;		var tgf3 = 1;		
		var lbrf4= 1;		var tgf4 = 1;		
		var lbrf5= 1;		var tgf5 = 1;
		var lbrf6= 1;						var tgf6 = 1;
		//var finishing1 = 0;
		var finishing2 = 0;
		var finishing3 = 0;
		var finishing4 = 0;
		var finishing5 = 0;
		var finishing6 = '0';	


		
		
		var modul = 'kalmej';
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";
		var ket = document.getElementById("ketkalmej").value;
		var ket_satuan = "lbr";
		var rim = 500;
		var box = 100;
		var ongpot = 'Y';
		var kethitung = "Bot_Kalender"
		
		var xmlhttp = new XMLHttpRequest();
 xmlhttp.addEventListener("progress", function (evt)
 {if (evt.lengthComputable){var percentComplete = (evt.loaded / evt.total) *100;
 $("div.progress > div.progress-bar").css({ "width": percentComplete + "%" }); }},false);
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);	
				data3 = myArr[0];
				
				
				hitpenutupbot(data1,data2,data3);
				
					//$('#ketkalmej').val(JSON.stringify(data3));
			}
		}	
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&kethitung="+kethitung;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();
		
		
}

function hitpenutupbot(x,y,z){
		var data1 = x;	
		var data2 = y;	
		var data3 = z;	
		 // $(".progress-bar").css('width','75%');
		
		if(document.getElementById("botkalmej").checked == true ){
		
		
			var lbr = document.getElementById("lbrcetakdudukankm").value;
			var tg = parseFloat(document.getElementById("tgcetakdudukankm").value);
			var lbrbawah = document.getElementById("lebarbawahkm").value;
			var lemkm = document.getElementById("lemkm").value;
			//lipatan untuk lem 1,5cm
			//yg paling besar buat atas
			lbrkertas1 = parseFloat(lbr) + (parseFloat(lemkm) * 2) ;
			tgkertas1 = (2 * parseFloat(tg)) + parseFloat(lbrbawah) + (parseFloat(lemkm) * 2);
			
			//yang paling kecil buat bawah
			lbrkertas2 = lbr;
			tgkertas2 = (2 * parseFloat(tg)) + parseFloat(lbrbawah);
			
			//cari yang lebih panjang
			if (lbrkertas1 < tgkertas1){
				lbrcetak = parseFloat(lbrkertas1) + parseFloat(lbrkertas2);
				tgcetak = tgkertas1;
			}else{
				lbrcetak = parseFloat(tgkertas1) + parseFloat(tgkertas2);
				tgcetak = lbrkertas1;
			}
			
			//alert (lbrcetak + "x" +tgcetak);	
			
			var bahan = document.getElementById("kertaspenutup").value;
			var jmlcetak = parseInt(document.getElementById("jmlcetakkm").value);
			var jmlwarna = document.getElementById("jmlcetakpenutupbot").value;
			var lam = document.getElementById("lampenutupbot").value;
			var bb = 1;
			var jmlset = 1;
			var lbrf1= 1;		var tgf1 = 1;		
			var lbrf2= 1;		var tgf2 = 1;		
			var lbrf3= 1;		var tgf3 = 1;		
			var lbrf4= 1;		var tgf4 = 1;		
			var lbrf5= 1;		var tgf5 = 1;
			var lbrf6= 1;						var tgf6 = 1;
			var finishing1 = '91';
			var finishing2 = 0;
			var finishing3 = 0;
			var finishing4 = 0;
			var finishing5 = 0;
			var finishing6 = '0';		
			
			var modul = 'kalmej';
			var insheet="1";
			var jml_satuan=1;
			var cetak_bagi="Y";
			var ket = document.getElementById("ketkalmej").value;
			var ket_satuan = "lbr";
			var rim = 500;
			var box = 100;
			var ongpot = 'Y';
			var kethitung = "Penutup_Bot"
			
			var xmlhttp = new XMLHttpRequest();
 xmlhttp.addEventListener("progress", function (evt)
 {if (evt.lengthComputable){var percentComplete = (evt.loaded / evt.total) *100;
 $("div.progress > div.progress-bar").css({ "width": percentComplete + "%" }); }},false);
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					myArr = JSON.parse(xmlhttp.responseText);
					
					data4 = myArr[0];
					
					hitamplopkm(data1,data2,data3,data4);
					//	$('#ketkalmej').val(JSON.stringify(data4));
					
				}
			}	
				isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&kethitung="+kethitung;
				
				isi=btoa(isi); //encode			
				xmlhttp.open("GET","wadah.php?isi="+isi,true);
				xmlhttp.send();		
		}else{
			var data4={};
			// $(".progress-bar").css('width','75%');
			hitamplopkm(data1,data2,data3,data4);
		}				
			
}

	
		//Hitung Covernya
		
function hitamplopkm(r,s,t,u){	
		var data1 = r;	
		var data2 = s;	
		var data3 = t;	
		var data4 = u;
		
		
			
		
				//data1
				if (data1['ongpot'] == 'Y' ){ ongkos_potong = data1['ongkos_potong'];}
				else{ ongkos_potong = 0; }				
				
				subtotal1 = parseInt(data1['totcetak']) + parseInt(data1['totbhn']) + parseInt(ongkos_potong) + parseInt(data1['tot_ctp']) + parseInt(data1['totlaminating']) + parseInt(data1['finishing1']) + parseInt(data1['finishing2']) + parseInt(data1['finishing3']) + parseInt(data1['finishing4']) + parseInt(data1['finishing5']) + parseInt(data1['finishing6']);
				var arrStr1 = btoa(encodeURIComponent(JSON.stringify(data1)));
				
				
				if(!!(data2['hrgbhn'])){ 				
					//data2
					if (data2['ongpot'] == 'Y' ){ ongkos_potong = data2['ongkos_potong'];}
					else{ ongkos_potong = 0; }				
					
					subtotal2 = parseInt(data2['totcetak']) + parseInt(data2['totbhn']) + parseInt(ongkos_potong) + parseInt(data2['tot_ctp']) + parseInt(data2['totlaminating']) + parseInt(data2['finishing1']) + parseInt(data2['finishing2']) + parseInt(data2['finishing3']) + parseInt(data2['finishing4']) + parseInt(data2['finishing5']) + parseInt(data2['finishing6']);
					var arrStr2 = btoa(encodeURIComponent(JSON.stringify(data2)));
				}else{
					var subtotal2 = '0';
					var arrStr2 = '';
					//alert('a');
				}
				
				//data3
				if (data3['ongpot'] == 'Y' ){ ongkos_potong = data3['ongkos_potong'];}
				else{ ongkos_potong = 0; }				
				
				subtotal3 = parseInt(data3['totcetak']) + parseInt(data3['totbhn']) + parseInt(ongkos_potong) + parseInt(data3['tot_ctp']) + parseInt(data3['totlaminating']) + parseInt(data3['finishing1']) + parseInt(data3['finishing2']) + parseInt(data3['finishing3']) + parseInt(data3['finishing4']) + parseInt(data3['finishing5']) + parseInt(data3['finishing6']);
				var arrStr3 = btoa(encodeURIComponent(JSON.stringify(data3)));
				
				//alert(subtotal2);
				grandtotal = parseInt(subtotal1) + parseInt(subtotal2) + parseInt(subtotal3);
				
				if(document.getElementById("botkalmej").checked == true ){
					//data4
					if (data4['ongpot'] == 'Y' ){ ongkos_potong = data4['ongkos_potong'];}
					else{ ongkos_potong = 0; }				
					
					
					subtotal4 = parseInt(data4['totcetak']) + parseInt(data4['totbhn']) + parseInt(ongkos_potong) + parseInt(data4['tot_ctp']) + parseInt(data4['totlaminating']) + parseInt(data4['finishing1']) + parseInt(data4['finishing2']) + parseInt(data4['finishing3']) + parseInt(data4['finishing4']) + parseInt(data4['finishing5']) + parseInt(data4['finishing6']);
					var arrStr4 = btoa(encodeURIComponent(JSON.stringify(data4)));
					grandtotal = parseInt(subtotal1) + parseInt(subtotal2) + parseInt(subtotal3) + parseInt(subtotal4);
				}	
					//alert(JSON.stringify(data4));
					//alert(grandtotal);
		
		var lebihukuranamplop = document.getElementById("lebihukuranamplop").value;
		var lbrcetak = parseFloat(document.getElementById("lbrcetakkm").value) + parseFloat(lebihukuranamplop);
		var tgcetak = parseFloat(document.getElementById("tgcetakkm").value) + parseFloat(lebihukuranamplop);
		if(lbrcetak < tgcetak){
			lbrcetak = document.getElementById("tgcetakkm").value;
			tgcetak = document.getElementById("lbrcetakkm").value;
		}
		var lem = '3';
		var lidah = '2';	
		//Tentukan Ukuran Amplop
		lbrcetak 	= parseFloat(lbrcetak) + (2 * parseFloat(lem));
		tgcetak 	=  (2 * parseFloat(tgcetak)) + parseFloat(lidah);
		
		var jml_satuan = 1;
	
	//	alert(lbrcetak + "x" + tgcetak);
		var jmlcetak = document.getElementById("jmlcetakkm").value;
		var bahan = document.getElementById("bahanboxkm").value;
		var bb = "";
		var tarikan = 0;
		var lam = 0;
		var lbrf1= 1;		var tgf1 = 1;		
		var lbrf2= 1;		var tgf2 = 1;		
		var lbrf3= lbrcetak / (jmlcetak * jml_satuan);				var tgf3 = tgcetak;		 //Ukuran pisau Pond
		var lbrf4= 1;						var tgf4 = 1;		
		var lbrf5= 1;						var tgf5 = 1;
		var lbrf6= 1;						var tgf6 = 1;
		var finishing6 = '0';
		var finishing1 = '0';
		var finishing2 = '0'; 
		var finishing3 = '13'; // Pisau Pon
		var finishing4 = '12'; //Biaya Pon
		var finishing5 = '50'; //Biaya Lem


		
		
		var	jmlwarna = document.getElementById("warnaboxkm").value;			
		var	jmlset = 1;	
		var cetak_bagi='Y';
		var modul = 'amplop';
		var insheet = "1";
		var ket = document.getElementById("ketkalmej").value;
		var ket_satuan = "box";
		var rim = 500;
		
		var box = 100;
		var ongpot = 'N';	
		var kethitung = "Amplop_Kalender"		
		
		
		
		if($('#warnaboxkm').val()>0){			
			
		var xmlhttp = new XMLHttpRequest();
 xmlhttp.addEventListener("progress", function (evt)
 {if (evt.lengthComputable){var percentComplete = (evt.loaded / evt.total) *100;
 $("div.progress > div.progress-bar").css({ "width": percentComplete + "%" }); }},false);
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				
					data5 = myArr[0];
					//	$('#ketkalmej').val(JSON.stringify(data5));
					
						
				
				//data5
				if (data5['ongpot'] == 'Y' ){ ongkos_potong = data5['ongkos_potong'];}
				else{ ongkos_potong = 0; }				
				
				subtotal5 = parseInt(data5['totcetak']) + parseInt(data5['totbhn']) + parseInt(ongkos_potong) + parseInt(data5['tot_ctp']) + parseInt(data5['totlaminating']) + parseInt(data5['finishing1']) + parseInt(data5['finishing2']) + parseInt(data5['finishing3']) + parseInt(data5['finishing4']) + parseInt(data5['finishing5']) + parseInt(data5['finishing6']);
				var arrStr5 = btoa(encodeURIComponent(JSON.stringify(data5)));
						
				grandtotal5  = parseInt(grandtotal)+ parseInt(subtotal5);  		
						
				//$('#ketkalmej').val(grandtotal);
				//$('#ketkalmej').val(JSON.stringify(data1));
				
				total = grandtotal5;
				profit = data1['persen'];
				//alert(profit);
				jual = (parseInt(total) * profit / 100) + parseInt(total);
				satuan = jual / jmlcetak / jml_satuan;
				perrim = satuan *  rim;
				
				// $(".progress-bar").css('width','100%');
				setTimeout(function(){ $(".progress-bar").css('background','green'); }, 500); 
				
			//	alert(arrStr1);
				$('#data1').val(arrStr1);
				$('#data2').val(arrStr2);
				$('#data3').val(arrStr3);
				$('#data4').val(arrStr4);
				$('#data5').val(arrStr5);
				$('#jumlahcetak').val(jmlcetak);
				$('#ket').val(ket);
				$('#totjual').html("Rp. " + formatMoney(jual));
				$('#satuan').html("Rp. " + formatMoney(satuan) + "/pcs");
				
			level = '<?=$level;?>';
			if( level == 'admin' || level == 'member' ){
				setTimeout(function(){ $('#tablekalmej').show(); }, 500); 
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
			}
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2=0&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&kethitung="+kethitung;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();	

		}else{
			//$('#ketkalmej').val(grandtotal4);
			// $(".progress-bar").css('width','100%');
			setTimeout(function(){ $(".progress-bar").css('background','green'); }, 500); 

			total = grandtotal;
			profit = data1['persen'];
			jual = (parseInt(total) * profit / 100) + parseInt(total);
			satuan = jual / jmlcetak / jml_satuan;
			perrim = satuan *  rim;
			
			$('#data1').val(arrStr1);
			$('#data2').val(arrStr2);
			$('#data3').val(arrStr3);
			$('#data4').val(arrStr4);
			$('#data5').val('');
			$('#jumlahcetak').val(jmlcetak);
			$('#ket').val(ket);
			$('#totjual').html("Rp. " + formatMoney(jual));
			$('#satuan').html("Rp. " + formatMoney(satuan) + "/pcs");

			level = '<?=$level;?>';
			if( level == 'admin' || level == 'member' ){
				$('#tablekalmej').show(); 
			}else{
				$('.harga').show();
				$('#satuan'+modulhit).val(formatMoney(satuan));
				$('#hargarim'+modulhit).val(formatMoney(perrim));
				$('#total'+modulhit).val(formatMoney(jual));
				$('#totdumy'+modulhit).val(formatMoney(jual));
				$('#data'+modulhit).val(arrStr);
				$('#modul').val(modul);
			}
			return;
		}
	
		}
		
		function cariukurankm(){
			var ukuran = document.getElementById("ukurankm").value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				document.getElementById("lbrcetakkm").value = myArr[0];
				document.getElementById("lbrcetakdudukankm").value = myArr[0];
				document.getElementById("tgcetakkm").value = myArr[1];
				document.getElementById("tgcetakdudukankm").value = myArr[1];
				
			// alert(myArr[0].toString());
			}
			}
			  xmlhttp.open("GET","function/cariukuran.php?ukuran="+ukuran,true);
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