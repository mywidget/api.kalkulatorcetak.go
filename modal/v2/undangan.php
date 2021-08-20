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
    $('.btnon, .btnd, .btnp').prop('disabled',true);
	$('#jmlcetakun').keypress(validateNumber);
    $('#ketundangan').keyup(function(){
        $('.btnon').prop('disabled', this.value == "" ? true : false);     
    })
}); 

</script>
<div class="modal-header" style="background-color:<?=$warnabar;?>;color:white;">
	<button type="button" class="close" id="un" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Cetak Undangan</h4>
</div>
<div class="modal-body">
   <div class="col-md-12">
      <div class="alert"></div>
   </div>
   <div class="col-md-12">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Jumlah Cetak</span> <input aria-label="" autofocus="" class="form-control" id="jmlcetakund" type="text"> <span class="input-group-addon">pcs</span>
         </div>
      </div>
   </div>
   <div class="col-md-12">
      <div class="panel panel-default">
         <div class="panel-heading" style="font-size:13px; height:20px; padding:3px 10px;">Isi Undangan
            <a href="#"> <span class="glyphicon glyphicon-chevron-down pull-right" id="moreisiund" ></span></a> 
         </div>
         <div class="panel-body">
            <div class="col-md-8">
               <div class="form-group">
                  <div class="input-group">
                     <span class="input-group-addon">Lebar Terbuka</span> <input aria-label="" class="form-control" id="lbrcetakund" type="text"> <span class="input-group-addon">Tinggi</span> <input aria-label="" class="form-control" id="tgcetakund" type="text"> <span class="input-group-addon">cm</span>
                  </div>
               </div>
            </div>
			<div class="col-md-4">
			<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">Bleed</span>
				<input type="text" class="form-control" id="bleedund" value="0.4" placeholder="Bleed">
				<span class="input-group-addon">cm</span>
			</div>
			</div>
			</div>
										
            <div class="col-md-6">
               <div class="form-group">
                  <div class="input-group">
                     <span class="input-group-addon">Kertas</span> <?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where modul like '%undangan%' AND pub='Y' ORDER BY id_kategori"); ?> 
                     <select class="chosen-select form-control" data-placeholder='Pilih Bahan' data-size="auto" data-style="btn-info" id="bahanisiund" required="required">
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
                  <div class="input-group">
                     <span class="input-group-addon">Jml Warna</span> <input aria-label="" class="form-control" id="jmlwarnaisiund" type="text" value="4">
                     <span class="input-group-addon">/</span> <input aria-label="" class="form-control" id="jmlwarnaisiund2" type="text" value="4">
                  </div>
               </div>
            </div>

            <div class="col-md-6">
               <div class="form-group">
                  <select id="lamisiund" class="selectpicker form-control" data-style="btn-warning">
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
			<div class="row"></div>
            <div class="moreisiund">
               <div class="col-md-5">
                  <div class="form-group">
                     <div class="input-group ">
                        <span class="input-group-addon">
                        <input type="checkbox" id="polyisiund">
                        </span>
                        <Label class="form-control">Poly</label>
                     </div>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon">Lebar</span>
                        <input type="text" class="form-control" aria-label="" id="lbrpolyisiund" value="1">
                        <span class="input-group-addon">Tinggi</span>
                        <input type="text" class="form-control" aria-label="" id="tgpolyisiund" value="1">
                        <span class="input-group-addon">Jumlah</span>
                        <input type="text" class="form-control" aria-label="" id="jmlpolyisiund" value="1">
                     </div>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="form-group">
                     <div class="input-group ">
                        <span class="input-group-addon">
                        <input type="checkbox" id="embosisiund">
                        </span>
                        <Label class="form-control">Embos</label>
                     </div>
                     <!-- /input-group -->
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon">Lebar</span>
                        <input type="text" class="form-control" aria-label="" id="lbrembosisiund" value="1">
                        <span class="input-group-addon">Tinggi</span>
                        <input type="text" class="form-control" aria-label="" id="tgembosisiund" value="1">
                        <span class="input-group-addon">Jumlah</span>
                        <input type="text" class="form-control" aria-label="" id="jmlembosisiund" value="1">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-12">
      <div class="panel panel-default">
         <div class="panel-heading" style="font-size:13px; height:20px; padding:3px 10px;">Cover Undangan
            <a href="#"> <span class="glyphicon glyphicon-chevron-down pull-right" id="morecovund" ></span></a> 
         </div>
         <div class="panel-body">
            <div class="col-md-6">
               <div class="form-group">
                  <div class="input-group">
                     <span class="input-group-addon">Jml Warna</span>
                     <input type="text" class="form-control" aria-label="" id="jmlwarnacovund" value="4">
					 <span class="input-group-addon">/</span>
                     <input type="text" class="form-control" aria-label="" id="jmlwarnacovund2" value="0">
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <select id="jenisjilidund" class="selectpicker form-control" data-style="btn-success">
                     <option value="1" selected>Jilid Soft Cover</option>
                     <option value="2" >Hard Cover</option>
                  </select>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <div class="input-group">
                     <span class="input-group-addon">Kertas</span>
                     <?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where modul like '%undangan%' AND pub='Y' ORDER BY id_kategori"); ?>
                     <select id="bahancovund"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
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
            <div class="col-md-6 morecovund">
               <div class="form-group">
                  <div class="input-group">
                     <span class="input-group-addon">Lebar</span>
                     <input type="text" class="form-control" aria-label="" id="lbrcoverund">
                     <span class="input-group-addon">Tinggi</span>
                     <input type="text" class="form-control" aria-label="" id="tgcoverund" >
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group botund">
                  <div class="input-group">
                     <span class="input-group-addon">Jenis Bot</span>
                     <?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where modul like '%bot%' AND pub='Y' ORDER BY id_kategori"); ?>
                     <select id="botund"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
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
               <div class="form-group botund">
                  <div class="input-group">
                     <span class="input-group-addon lbrlemund">Lebar Lem</span>
                     <input type="text" class="form-control lbrlemund" aria-label="" id="lbrlemund" >
                     <span class="input-group-addon">Cm</span>
                  </div>
               </div>
            </div>

            <div class="col-md-4">
               <div class="form-group">
                  <div class="input-group ">
                     <span class="input-group-addon">
                     <input type="checkbox" id="spotuvcovund">
                     </span>
                     <Label class="form-control">SpotUV</label>
                  </div>
                  <!-- /input-group -->	
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <select id="lamcovund" class="selectpicker form-control" data-style="btn-warning">
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
            <div class="morecovund">
               <div class="col-md-5">
                  <div class="form-group">
                     <div class="input-group ">
                        <span class="input-group-addon">
                        <input type="checkbox" id="polycovund">
                        </span>
                        <Label class="form-control">Poly</label>
                     </div>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon">Lebar</span>
                        <input type="text" class="form-control" aria-label="" id="lbrpolycovund" value="1">
                        <span class="input-group-addon">Tinggi</span>
                        <input type="text" class="form-control" aria-label="" id="tgpolycovund" value="1">
                        <span class="input-group-addon">Jumlah</span>
                        <input type="text" class="form-control" aria-label="" id="jmlpolycovund" value="1">
                     </div>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="form-group">
                     <div class="input-group ">
                        <span class="input-group-addon">
                        <input type="checkbox" id="emboscovund">
                        </span>
                        <Label class="form-control">Embos</label>
                     </div>
                     <!-- /input-group -->
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon">Lebar</span>
                        <input type="text" class="form-control" aria-label="" id="lbremboscovund" value="1">
                        <span class="input-group-addon">Tinggi</span>
                        <input type="text" class="form-control" aria-label="" id="tgemboscovund" value="1">
                        <span class="input-group-addon">Jumlah</span>
                        <input type="text" class="form-control" aria-label="" id="jmlemboscovund" value="1">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- panel -->
   </div>
   <div class="col-md-4">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon"><input id="pitaund" type="checkbox"></span> <label class="form-control">Pita</label>
         </div>
         <!-- /input-group -->
      </div>
   </div>
   <div class="col-md-4 pitaund">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Lebar Pita</span>
            <input type="text" class="form-control" aria-label="" id="lbrpita" value="22">
            <span class="input-group-addon">cm</span>
         </div>
      </div>
   </div>
   <div class="row pitaund"></div>
   <div class="col-md-4">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon"><input id="kalkirund" type="checkbox"></span> <label class="form-control">Kertas Kalkir</label>
         </div>
         <!-- /input-group -->
      </div>
   </div>
   <div class="row kalkirund">
   </div>
   <div class="col-md-4 kalkirund">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Jml Warna Kalkir</span>
            <input type="text" class="form-control" aria-label="" id="jmlwarnakalkir" value="4">
         </div>
      </div>
   </div>
   <div class="col-md-8 kalkirund">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Lebar Kalkir</span>
            <input type="text" class="form-control" aria-label="" id="lbrkalkir" value="22">
            <span class="input-group-addon">Tinggi</span>
            <input type="text" class="form-control" aria-label="" id="tgkalkir" value="14">
            <span class="input-group-addon">cm</span>
         </div>
      </div>
   </div>
   <div class="col-md-4">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon"><input id="amplopund" type="checkbox"></span> <label class="form-control">Amplop</label>
         </div>
         <!-- /input-group -->
      </div>
   </div>
   <!-- amplop undangan -->
   <div class="col-md-8 amplopund">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Kertas Amplop</span>
            <?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where modul like '%undangan%' AND pub='Y' ORDER BY id_kategori"); ?>
            <select id="bahanamplopund"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
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
   <div class="col-md-4 amplopund">
      <div class="form-group">
         <select id="lamamplopund" class="selectpicker form-control" data-style="btn-warning">
            <option value="0" selected>Tanpa Laminasi</option>
            <option value="1">Varnish Satu Muka</option>
            <option value="3">Laminating Glosy Satu Muka</option>
            <option value="5">Laminating DOP Satu Muka</option>
         </select>
      </div>
   </div>
   <div class="col-md-4 amplopund">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Jml Warna Amplop</span>
            <input type="text" class="form-control" aria-label="" id="jmlwarnaamplopund" value="4">
         </div>
      </div>
   </div>
   <div class="col-md-8 amplopund">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Lebar Amplop</span>
            <input type="text" class="form-control" aria-label="" id="lbramplopund" value="22">
            <span class="input-group-addon">Tinggi</span>
            <input type="text" class="form-control" aria-label="" id="tgamplopund" value="28">
            <span class="input-group-addon">cm</span>
         </div>
      </div>
   </div>
             <div class="amplopund">
               <div class="col-md-5">
                  <div class="form-group">
                     <div class="input-group ">
                        <span class="input-group-addon">
                        <input type="checkbox" id="polyamplopund">
                        </span>
                        <Label class="form-control">Poly Amplop</label>
                     </div>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon">Lebar</span>
                        <input type="text" class="form-control" aria-label="" id="lbrpolyamplopund" value="1">
                        <span class="input-group-addon">Tinggi</span>
                        <input type="text" class="form-control" aria-label="" id="tgpolyamplopund" value="1">
                        <span class="input-group-addon">Jumlah</span>
                        <input type="text" class="form-control" aria-label="" id="jmlpolyamplopund" value="1">
                     </div>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="form-group">
                     <div class="input-group ">
                        <span class="input-group-addon">
                        <input type="checkbox" id="embosamplopund">
                        </span>
                        <Label class="form-control">Embos Amplop</label>
                     </div>
                     <!-- /input-group -->
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon">Lebar</span>
                        <input type="text" class="form-control" aria-label="" id="lbrembosamplopund" value="1">
                        <span class="input-group-addon">Tinggi</span>
                        <input type="text" class="form-control" aria-label="" id="tgembosamplopund" value="1">
                        <span class="input-group-addon">Jumlah</span>
                        <input type="text" class="form-control" aria-label="" id="jmlembosamplopund" value="1">
                     </div>
                  </div>
               </div>
            </div>
   
   
   
   <div class="col-md-4">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon"><input id="ucapanund" type="checkbox"></span> <label class="form-control">Kartu Ucapan</label>
         </div>
         <!-- /input-group -->
      </div>
   </div>
   <div class="col-md-8 ucapanund">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Kertas Kartu</span>
            <?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where modul like '%undangan%' AND pub='Y' ORDER BY id_kategori"); ?>
            <select id="bahankartuucapan"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
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
   <div class="col-md-4 ucapanund">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Jml Warna Kartu</span>
            <input type="text" class="form-control" aria-label="" id="jmlwarnakartu" value="4">
         </div>
      </div>
   </div>
   <div class="col-md-8 ucapanund">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Lebar Kartu</span>
            <input type="text" class="form-control" aria-label="" id="lbrkartuucapan" value="9">
            <span class="input-group-addon">Tinggi</span>
            <input type="text" class="form-control" aria-label="" id="tgkartuucapan" value="5">
            <span class="input-group-addon">cm</span>
         </div>
      </div>
   </div>
   <div class="row"></div>
   <div class="col-md-8">
      <div class="form-group">
         <div class="input-group">
            <span class="input-group-addon">Keterangan</span>
            <input type="text" class="form-control" aria-label="" id="ketundangan"  placeholder="Isi dulu keterangannya">
         </div>
      </div>
   </div>
   <div class="col-md-4">
      <button class="btn btn-primary btnon" onclick="hitungisiundangan()" type="submit">Hitung</button> 
      <button type="button" class="btn btn-primary printpenawaran"><i class="fa fa-external-link" aria-hidden="true"></i></button>
   </div>
   <div class="col-md-12">
      <div class="progress progress-striped active" style="height:5px;">
         <div class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;height:5px;">
         </div>
      </div>
   </div>
 
   <div class="col-md-12">
      <div id="tableundangan">
			<form action="detail-hitung/" method="post" target="_blank">
			<input type="hidden" id="token" name="token">
			<input type="hidden" id="user"  name="user">	
			<input type="hidden" id="modul" name="modul">
            <input type="hidden" name="data1[]" id="dataund1"  value="">
            <input type="hidden" name="data2[]" id="dataund2" value="">
            <input type="hidden" name="data3[]" id="dataund3" value="">
            <input type="hidden" name="data4[]" id="dataund4" value="">
            <input type="hidden" name="data5[]" id="dataund5" value="">
            <input type="hidden" name="data6[]" id="dataund6" value="">
            <input type="hidden" name="data7[]" id="dataund7" value="">
            <input type="hidden" name="data[]" id="dataund8" value="">
            <input type="hidden" name="ket" id="ketbk" value="">
            <input type="hidden" name="jumlahcetak" id="jumlahcetakund" value="">
            <div id='tablund' class='small'>
               <table id='tablund' class='table table-striped table-responsive' >
                  <thead >
                     <tr style='background-color:<?=$warnabar;?>;color:white' >
                        <th class='text-left'>Harga Jual</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tr>
                     <td class='text-left'> <span id="satuanund"></span></td>
                     <td class='text-right' ><button type='submit' name='submit' value='0' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px' onclick="this.form.submit()"><span id="totjualund"></span></button></td>
                  </tr>
               </table>
            </div>
         </form>
      </div>
   </div>
</div>
<script>
$(document).ready(function(){

	
	$('#lbrcetakund').val('22');
	$('#tgcetakund').val('28');
	$('#lbrcoverund').val('22');
	$('#tgcoverund').val('28');
	$('.kalkirund').hide();
	$('#warnaamplopund').val('0');
	$('.botund').hide();
	$('#lbrlemund').val('1.5');
	$('.lbrlemund').hide();
	$('.morecovund').hide();
	$('.moreisiund').hide();
	$('.pitaund').hide();
	$('.amplopund').hide();
	$('#tableundangan').hide();
	$('.ucapanund').hide();
	$('#bbisiund').val('2');
	$('.harga').hide();
	
	
})

$( "#profits"+modulhit).keyup(function() {
	profit = $('#profits'+modulhit).val();
	tot = angka($('#totdumy'+modulhit).val());
	jual = parseFloat(profit * tot/100) + parseInt(tot);
	satuan = jual / $('#jmlcetakund').val();
	perrim = satuan * 500;
	$('#satuan'+modulhit).val(formatMoney(satuan));
	$('#hargarim'+modulhit).val(formatMoney(perrim));
	$('#total'+modulhit).val(formatMoney(jual));
})	


	$('#jenisjilidund').on('change', function() {
		if( this.value == '2'){
			$('.lbrlemund').show();
			$('.botund').show();
			$('#bbcovund').val('1');
			$('#bbcovund').hide();
			
		}else{
			$('.lbrlemund').hide();
			$('.botund').hide();
			$('#bbcovund').show();
		}
	})

	$('#lbrcetakund').on('change', function() {
			$('#lbrcoverund').val($('#lbrcetakund').val());
			$('#lbrpita').val($('#lbrcetakund').val());
	})	
	$('#tgcetakund').on('change', function() {
			$('#tgcoverund').val($('#tgcetakund').val());
	})
	
	$('#morecovund').click(function(){
		if($('.morecovund').is(":hidden")) 
        {
			$('.morecovund').show();
			$("#morecovund").removeClass("glyphicon glyphicon-chevron-down").addClass("glyphicon glyphicon-chevron-up");	
		}else{
			$('.morecovund').hide();
			$("#morecovund").removeClass("glyphicon glyphicon-chevron-up").addClass("glyphicon glyphicon-chevron-down");	
		}			
	});
	
	$('#kalkirund').click(function(){
		if($('.kalkirund').is(":hidden")) 
        {
			$('.kalkirund').show();
		}else{
			$('.kalkirund').hide();
		}			
	});
	$('#pitaund').click(function(){
		if($('.pitaund').is(":hidden")) 
        {
			$('.pitaund').show();
		}else{
			$('.pitaund').hide();
		}			
	});		
	
	$('#ucapanund').click(function(){
		if($('.ucapanund').is(":hidden")) 
        {
			$('.ucapanund').show();
		}else{
			$('.ucapanund').hide();
		}			
	});	
	
	$('#amplopund').click(function(){
		if($('.amplopund').is(":hidden")) 
        {
			$('.amplopund').show();
		}else{
			$('.amplopund').hide();
		}			
	});
	
	$('#moreisiund').click(function(){
		if($('.moreisiund').is(":hidden")) 
        {
			$('.moreisiund').show();
			$("#moreisiund").removeClass("glyphicon glyphicon-chevron-down").addClass("glyphicon glyphicon-chevron-up");	
		}else{
			$('.moreisiund').hide();
			$("#moreisiund").removeClass("glyphicon glyphicon-chevron-up").addClass("glyphicon glyphicon-chevron-down");	
		}			
	});
	

			
	
	  $('#kalkirund').click(function() {
        if($(this).is(":checked"))
        {
			$('.kalkirund').show();
			$('#kalkirund').val('1');
        } else {
			$('.kalkirund').hide();
			$('#kalkirund').val('0');
        }
    });	
	
	$('#bahancovun').change(function() {
			$('#bahanisiun').val($('#bahancovun').val())  ;
			$('#bahanamplopun').val($('#bahancovun').val())  ;
    });	
	$('#jmlwarnacovun').change(function() {
			$('#jmlwarnaun2').val($('#jmlwarnacovun').val())  ;
    });		
	$('#bbcovun').change(function() {
			$('#bbun1').val($('#bbcovun').val())  ;
    });	
	
	

</script>

			
  <script type="text/javascript">
  

  
  function hitungisiundangan() {
		$(".progress-bar").css('background','red'); 
		$(".progress-bar").css('width','5%');
		$("#profits"+modulhit).val('0');
		$('.simpan').prop('disabled', this.value == "" ? true : false); 
		$(".simpan").html('Simpan'); 
		$('.printpenawaran').hide();
		$('#tableundangan').hide();
			

		var bleed = document.getElementById("bleedund").value;
		var lbrcetak = parseFloat(document.getElementById("lbrcetakund").value) + ( 2 * parseFloat(bleed));
		var tgcetak = parseFloat(document.getElementById("tgcetakund").value) + ( 2 * parseFloat(bleed));
			
		var jmlcetak = document.getElementById("jmlcetakund").value;
		var bahan = document.getElementById("bahanisiund").value;
		var bb = "";//document.getElementById("bbisiund").value;
		var jmlwarna = document.getElementById("jmlwarnaisiund").value;
		var jmlwarna2 = document.getElementById("jmlwarnaisiund2").value;
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}			
		var lam = document.getElementById("lamisiund").value;
		var lbrf1= 1;		var tgf1 = 1;		
		var lbrf2= 1;		var tgf2 = 1;		
		var lbrf3= 1;		var tgf3 = 1;		
		var lbrf4= 1;		var tgf4 = 1;		
		var lbrf5= 1;		var tgf5 = 1;
		var lbrf6= 1;		var tgf6 = 1;
		var finishing1 = 4; //plastik undangan
		var finishing2 = 0;
		var finishing3 = 0;
		var finishing4 = 0;
		var finishing5 = 0;
		var finishing6 = 0;		
		
		var modul = 'undangan';
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";
		var ket = document.getElementById("ketundangan").value;
		var ket_satuan = "pcs";
		var rim = 500;
		var box = 100;
		var ongpot = 'Y';
		var kethitung = 'Isi_Undangan';
		var jmlset = 1;
		var j_mesin = '';
		
				
//Poly
		if(document.getElementById("polyisiund").checked == true ){
			finishing2 = '10'; //poly
			lbrf2= (document.getElementById("jmlpolyisiund").value);
			tgf2 = 1;
				
			finishing5 = '11'; //plat
			lbrf5= parseFloat(document.getElementById("lbrpolyisiund").value) / jmlcetak;
			tgf5 = document.getElementById("tgpolyisiund").value;
			//alert("d");
		}
//Embos		
		if(document.getElementById("embosisiund").checked == true ){
			finishing3 = '14';
			lbrf3= (document.getElementById("jmlembosisiund").value);
			tgf3 = 1;
			finishing6 = '15';
			lbrf6= document.getElementById("lbrembosisiund").value / jmlcetak;
			tgf6 = document.getElementById("tgembosisiund").value;
			
		}
//Pita		
		if(document.getElementById("pitaund").checked == true ){
			finishing4 = '83';
			lbrf4= (document.getElementById("lbrpita").value);
			tgf4 = 1;
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
		//alert(jmlcetak);
	//Hitung Isinya----------------------------------------	
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				
			//	setTimeout(function(){$(".progress-bar").css('width','20%'); }, 1000); 	
				myArr = JSON.parse(xmlhttp.responseText);	
				data = myArr[0];
				
				//$('#ketundangan').val(JSON.stringify(myArr));				
				
				hitungcoverund(data);
				
			}
		}	
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();
			
}
		
function hitungcoverund(x) {
		var data = x;
		//Isi Undangan
		var lbrcetak = document.getElementById("lbrcoverund").value;
		var tgcetak = document.getElementById("tgcoverund").value;
		var jmlcetak = document.getElementById("jmlcetakund").value;
		
		var bahan = document.getElementById("bahancovund").value;
		var bb = "";// document.getElementById("bbcovund").value;
		var jmlwarna = document.getElementById("jmlwarnacovund").value;
		var jmlwarna2 = document.getElementById("jmlwarnacovund2").value;
			
		var lam = document.getElementById("lamcovund").value;
		var lbrf1= 1;		var tgf1 = 1;		
		var lbrf2= 1;		var tgf2 = 1;		
		var lbrf3= 1;		var tgf3 = 1;		
		var lbrf4= 1;		var tgf4 = 1;		
		var lbrf5= 1;		var tgf5 = 1;
		var lbrf6= 1;		var tgf6 = 1;
		var finishing1 = 0;
		var finishing2 = 0;
		var finishing3 = 0;
		var finishing4 = 0;
		var finishing5 = 0;
		var finishing6 = 0;	
		
		jenisjilidund = document.getElementById("jenisjilidund").value;
		if (jenisjilidund=='2'){
			
			if(parseFloat(lbrcetak) < parseFloat(tgcetak)){
				lbrcetak = (parseFloat(lbrcetak) * 2) + (parseFloat(document.getElementById("lbrlemund").value) * 2); 
				tgcetak = (parseFloat(tgcetak)) + (parseFloat(document.getElementById("lbrlemund").value) * 2); 
			}else{
				lbrcetak = (parseFloat(lbrcetak)) + (parseFloat(document.getElementById("lbrlemund").value) * 2); 
				tgcetak = (parseFloat(tgcetak)* 2) + (parseFloat(document.getElementById("lbrlemund").value) * 2); 
			}
			
			finishing1 = 54;
		}

		
		
		var modul = 'undangan';
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";
		var ket = document.getElementById("ketundangan").value;
		var ket_satuan = "pcs";
		var rim = 500;
		var box = 100;
		var ongpot = 'Y';
		var kethitung = 'Cover_Undangan';
		var jmlset = 1;
		var j_mesin = '';
		
//Poly
		if(document.getElementById("polycovund").checked == true ){
			finishing2 = '10'; //poly
			lbrf2= (document.getElementById("jmlpolycovund").value);
			tgf2 = 1;
				
			finishing5 = '11'; //plat
			lbrf5= parseFloat(document.getElementById("lbrpolycovund").value) / jmlcetak;
			tgf5 = document.getElementById("tgpolycovund").value;
			//alert("d");
		}
//Embos		
		if(document.getElementById("emboscovund").checked == true ){
			finishing3 = '14';
			lbrf3= (document.getElementById("jmlemboscovund").value);
			tgf3 = 1;
			finishing6 = '15';
			lbrf6= document.getElementById("lbremboscovund").value / jmlcetak;
			tgf6 = document.getElementById("tgemboscovund").value;
			
		}

//spot uv		
		if(document.getElementById("spotuvcovund").checked == true ){
			finishing4 = '19';
			lbrf4= lbrcetak / jmlcetak;
			tgf4 = tgcetak;
		}
		
		if(jmlwarna < 1 && jmlwarna != null){
				data2 = {};
				hitungbot(data,data2);
		}else{		

		//alert(jmlcetak);
	//Hitung Isinya----------------------------------------	
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				
			//	setTimeout(function(){$(".progress-bar").css('width','20%'); }, 1000); 	
				myArr = JSON.parse(xmlhttp.responseText);	
				data2 = myArr[0];
				//$('#ketundangan').val(JSON.stringify(myArr));				
				hitungbot(data,data2);
			
			}
		}	
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();

		}	
}	

function hitungbot(x,y) {
	data1 = x; data2 = y;
	var jmlwarna = document.getElementById("jmlwarnacovund").value;
	
	jenisjilidund = document.getElementById("jenisjilidund").value;
	if (jenisjilidund=='2' &&  (jmlwarna < 1 || jmlwarna != null )){
		
		var lbrcetak = document.getElementById("lbrcoverund").value;
		var tgcetak = document.getElementById("tgcoverund").value;
		var jmlcetak = document.getElementById("jmlcetakund").value;
		
		var bahan = document.getElementById("botund").value;
		var bb = "";
		var jmlwarna = 0;		
		var lam = 0;
		var lbrf1= 1;		var tgf1 = 1;		
		var lbrf2= 1;		var tgf2 = 1;		
		var lbrf3= 1;		var tgf3 = 1;		
		var lbrf4= 1;		var tgf4 = 1;		
		var lbrf5= 1;		var tgf5 = 1;
		var lbrf6= 1;		var tgf6 = 1;
		var finishing1 = 0;
		var finishing2 = 0;
		var finishing3 = 0;
		var finishing4 = 0;
		var finishing5 = 0;
		var finishing6 = 0;	
		
		var modul = 'undangan';
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";
		var ket = document.getElementById("ketundangan").value;
		var ket_satuan = "pcs";
		var rim = 500;
		var box = 100;
		var ongpot = 'Y';
		var kethitung = 'Bot';
		var jmlset = 1;
		var j_mesin = '';

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				
			//	setTimeout(function(){$(".progress-bar").css('width','20%'); }, 1000); 	
				myArr = JSON.parse(xmlhttp.responseText);	
				data3 = myArr[0];
				//$('#ketundangan').val(JSON.stringify(myArr));				
				hitungkalkirun(data1,data2,data3);
				
			}
		}	
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();
	}else{
		data3 = {};
		hitungkalkirun(data1,data2,data3);
		
	}	
	

}
function hitungkalkirun(x,y,z) {
	data1=x; data2=y; data3=z;
		
	if(document.getElementById("kalkirund").checked == true ){
		
		var lbrcetak = document.getElementById("lbrkalkir").value;
		var tgcetak = document.getElementById("tgkalkir").value;
		var jmlcetak = document.getElementById("jmlcetakund").value;
		
		var bahan = 41;
		var bb = "";
		var jmlwarna = document.getElementById("jmlwarnakalkir").value;		
		var lam = 0;
		var lbrf1= 1;		var tgf1 = 1;		
		var lbrf2= 1;		var tgf2 = 1;		
		var lbrf3= 1;		var tgf3 = 1;		
		var lbrf4= 1;		var tgf4 = 1;		
		var lbrf5= 1;		var tgf5 = 1;
		var lbrf6= 1;		var tgf6 = 1;
		var finishing1 = 0;
		var finishing2 = 0;
		var finishing3 = 0;
		var finishing4 = 0;
		var finishing5 = 0;
		var finishing6 = 0;	
		
		var modul = 'undangan';
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";
		var ket = document.getElementById("ketundangan").value;
		var ket_satuan = "pcs";
		var rim = 500;
		var box = 100;
		var ongpot = 'Y';
		var kethitung = 'Kalkir';
		var jmlset = 1;
		var j_mesin = '';

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				
			//	setTimeout(function(){$(".progress-bar").css('width','20%'); }, 1000); 	
				myArr = JSON.parse(xmlhttp.responseText);	
				data4 = myArr[0];
				//$('#ketundangan').val(JSON.stringify(myArr));				
				hitungamplopund(data1,data2,data3,data4);
				
			}
		}	
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();

		}else{
			var data4 = {};
			hitungamplopund(data1,data2,data3,data4);
			
		}
}		
		

	
function hitungamplopund(r,s,t,u){
	data1=r; data2=s; data3=t; data4=u;
	
	if(document.getElementById("amplopund").checked == true ){
		
		var lbrcetak = document.getElementById("lbramplopund").value;
		var tgcetak = document.getElementById("tgamplopund").value;
		var jmlcetak = document.getElementById("jmlcetakund").value;
		
		var bahan = document.getElementById("bahanamplopund").value;
		var bb = "";
		var jmlwarna = document.getElementById("jmlwarnaamplopund").value;		
		var lam =  document.getElementById("lamamplopund").value;		
		var lbrf1 = parseFloat(lbrcetak) / parseFloat(jmlcetak);
		var tgf1 = tgcetak; //Ukuran pisau Pond		
		var lbrf2= 1;		var tgf2 = 1;		
		var lbrf3= 1;		var tgf3 = 1;		
		var lbrf4= 1;		var tgf4 = 1;		
		var lbrf5= 1;		var tgf5 = 1;
		var lbrf6= 1;		var tgf6 = 1;
		var lbrf7= 1;		var tgf7 = 1;
		var lbrf8= 1;		var tgf8 = 1;
		var finishing1 = '13'; // Pisau Pon
		var finishing2 = '12'; //Biaya Pon
		var finishing3 = '50'; //Biaya Lem
		var finishing4 = 0;
		var finishing5 = 0;
		var finishing6 = 0;	
		var finishing7 = 0;	
		var finishing8 = 0;	
		
	
		if(document.getElementById("polyamplopund").checked == true ){
			finishing5 = '10'; //poly
			lbrf5= (document.getElementById("jmlpolyamplopund").value);
			tgf5 = 1;
				
			finishing6 = '11'; //plat
			lbrf6= parseFloat(document.getElementById("lbrpolyamplopund").value) / jmlcetak;
			tgf6 = document.getElementById("tgpolyamplopund").value;
			//alert("d");
		}
//Embos		
		if(document.getElementById("embosamplopund").checked == true ){
			finishing7 = '14';
			lbrf7= (document.getElementById("jmlembosamplopund").value);
			tgf7 = 1;
			finishing8 = '15';
			lbrf8= document.getElementById("lbrembosamplopund").value / jmlcetak;
			tgf8 = document.getElementById("tgembosamplopund").value;
			
		}
	
		var modul = 'undangan';
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";
		var ket = document.getElementById("ketundangan").value;
		var ket_satuan = "pcs";
		var rim = 500;
		var box = 100;
		var ongpot = 'N';
		var kethitung = 'Amplop';
		var jmlset = 1;
		var j_mesin = '';

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				
			//	setTimeout(function(){$(".progress-bar").css('width','20%'); }, 1000); 	
				myArr = JSON.parse(xmlhttp.responseText);	
				data5 = myArr[0];
				//$('#ketundangan').val(JSON.stringify(myArr));				
				hitungkartuucapan(data1,data2,data3,data4,data5);
				
			}
		}	
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&finishing7="+finishing7+"&finishing8="+finishing8+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&lbrf7="+lbrf7+"&tgf7="+tgf7+"&lbrf8="+lbrf8+"&tgf8="+tgf8+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();

		}else{
			var data5 = {};
			hitungkartuucapan(data1,data2,data3,data4,data5);
			
		}

}

function hitungkartuucapan(r,s,t,u,v){
	
	data1=r; data2=s; data3=t; data4=u; data5=v;
	var lbrcetak = document.getElementById("lbrkartuucapan").value;
	var tgcetak = document.getElementById("tgkartuucapan").value;
	var jmlcetak = document.getElementById("jmlcetakund").value;

	var bahan = document.getElementById("bahankartuucapan").value;
	var bb = 1;
	var jmlwarna = document.getElementById("jmlwarnakartu").value;		
	var lam =  0;		
	var lbrf1= 1;		var tgf1 = 1;		
	var lbrf2= 1;		var tgf2 = 1;		
	var lbrf3= 1;		var tgf3 = 1;		
	var lbrf4= 1;		var tgf4 = 1;		
	var lbrf5= 1;		var tgf5 = 1;
	var lbrf6= 1;		var tgf6 = 1;
	var finishing1 = 0;
	var finishing2 = 0;
	var finishing3 = 0;
	var finishing4 = 0;
	var finishing5 = 0;
	var finishing6 = 0;	

	var modul = 'undangan';
	var insheet="1";
	var jml_satuan=1;
	var cetak_bagi="Y";
	var ket = document.getElementById("ketundangan").value;
	var ket_satuan = "pcs";
	var rim = 500;
	var box = 100;
	var ongpot = 'Y';
	var kethitung = 'Kartu_Ucapan';
	var jmlset = 1;
	var j_mesin = '';
	
	if (data1['ongpot'] == 'Y' ){ ongkos_potong = data1['ongkos_potong'];} else{ ongkos_potong = 0; }				
	subtotal1 = parseInt(data1['totcetak']) + parseInt(data1['totbhn']) + parseInt(ongkos_potong) + parseInt(data1['tot_ctp']) + parseInt(data1['totlaminating']) + parseInt(data1['finishing1']) + parseInt(data1['finishing2']) + parseInt(data1['finishing3']) + parseInt(data1['finishing4']) + parseInt(data1['finishing5']) + parseInt(data1['finishing6']);
	var arrStr1 = btoa(encodeURIComponent(JSON.stringify(data1)));

	if(!!(data2['hrgbhn'])){ 				
		if (data2['ongpot'] == 'Y' ){ ongkos_potong = data2['ongkos_potong'];} else{ ongkos_potong = 0; }				
		
		subtotal2 = parseInt(data2['totcetak']) + parseInt(data2['totbhn']) + parseInt(ongkos_potong) + parseInt(data2['tot_ctp']) + parseInt(data2['totlaminating']) + parseInt(data2['finishing1']) + parseInt(data2['finishing2']) + parseInt(data2['finishing3']) + parseInt(data2['finishing4']) + parseInt(data2['finishing5']) + parseInt(data2['finishing6']);
		var arrStr2 = btoa(encodeURIComponent(JSON.stringify(data2)));
	}else{
		var subtotal2 = '0';
		var arrStr2 = '';
		//alert('a');
	}
				

	if(!!(data3['hrgbhn'])){ 				
		if (data3['ongpot'] == 'Y' ){ ongkos_potong = data3['ongkos_potong'];} else{ ongkos_potong = 0; }				
		subtotal3 = parseInt(data3['totcetak']) + parseInt(data3['totbhn']) + parseInt(ongkos_potong) + parseInt(data3['tot_ctp']) + parseInt(data3['totlaminating']) + parseInt(data3['finishing1']) + parseInt(data3['finishing2']) + parseInt(data3['finishing3']) + parseInt(data3['finishing4']) + parseInt(data3['finishing5']) + parseInt(data3['finishing6']);
		var arrStr3 = btoa(encodeURIComponent(JSON.stringify(data3)));		
	}else{subtotal3 = 0; var arrStr3 = ""; }		
	
	if(!!(data4['hrgbhn'])){ 	
		if (data4['ongpot'] == 'Y' ){ ongkos_potong = data4['ongkos_potong'];} else{ ongkos_potong = 0; }				
		subtotal4 = parseInt(data4['totcetak']) + parseInt(data4['totbhn']) + parseInt(ongkos_potong) + parseInt(data4['tot_ctp']) + parseInt(data4['totlaminating']) + parseInt(data4['finishing1']) + parseInt(data4['finishing2']) + parseInt(data4['finishing3']) + parseInt(data4['finishing4']) + parseInt(data4['finishing5']) + parseInt(data4['finishing6']);
		var arrStr4 = btoa(encodeURIComponent(JSON.stringify(data4)));
	}else{ subtotal4 = 0; var arrStr4 = ""; }
	
	if(!!(data5['hrgbhn'])){ 
		if (data5['ongpot'] == 'Y' ){ ongkos_potong = data5['ongkos_potong'];} else{ ongkos_potong = 0; }				
		subtotal5 = parseInt(data5['totcetak']) + parseInt(data5['totbhn']) + parseInt(ongkos_potong) + parseInt(data5['tot_ctp']) + parseInt(data5['totlaminating']) + parseInt(data5['finishing1']) + parseInt(data5['finishing2']) + parseInt(data5['finishing3']) + parseInt(data5['finishing4']) + parseInt(data5['finishing5']) + parseInt(data5['finishing6']);
		var arrStr5 = btoa(encodeURIComponent(JSON.stringify(data5)));
	}else{ subtotal5 = 0; var arrStr5 = ""; }
	
				
	if(document.getElementById("ucapanund").checked == true ){
		//alert('ok');


		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				
			//	setTimeout(function(){$(".progress-bar").css('width','20%'); }, 1000); 	
				myArr = JSON.parse(xmlhttp.responseText);	
				data6 = myArr[0];
				//$('#ketundangan').val(JSON.stringify(myArr));				
				//hitungkartuucapan(data1,data2,data3,data4,data5);
				
								
				if (data6['ongpot'] == 'Y' ){ ongkos_potong = data6['ongkos_potong'];} else{ ongkos_potong = 0; }				
				subtotal6 = parseInt(data6['totcetak']) + parseInt(data6['totbhn']) + parseInt(ongkos_potong) + parseInt(data6['tot_ctp']) + parseInt(data6['totlaminating']) + parseInt(data6['finishing1']) + parseInt(data6['finishing2']) + parseInt(data6['finishing3']) + parseInt(data6['finishing4']) + parseInt(data6['finishing5']) + parseInt(data6['finishing6']);
				var arrStr6 = btoa(encodeURIComponent(JSON.stringify(data6)));
				
				
				//$('#ketbuku').val(JSON.stringify(data));
				total  = parseInt(subtotal1) + parseInt(subtotal2) + parseInt(subtotal3) + parseInt(subtotal4) + parseInt(subtotal5) + parseInt(subtotal6) ; 
				profit = data1['persen'];
				jual = (parseInt(total) * parseInt(profit) / 100) + parseInt(total);
				satuan = jual / jmlcetak / jml_satuan;
				
				$(".progress-bar").css('width','100%'); 
				setTimeout(function(){  $(".progress-bar").css('background','green'); }, 500); 
				
				if( level == 'admin' || level == 'member' ){				
				//	alert(arrStr1);
				$('#tableundangan').show();
					$('#dataund1').val(arrStr1);
					$('#dataund2').val(arrStr2);
					$('#dataund3').val(arrStr3);
					$('#dataund4').val(arrStr4);
					$('#dataund5').val(arrStr5);
					$('#dataund6').val(arrStr6);
					// $('#dataund7').val(arrStr7);
					// $('#dataund8').val(arrStr8);
					$('#ketbk').val(ket);
					$('#totjualund').html("Rp. " + formatMoney(jual));
					$('#satuanund').html("Rp. " + formatMoney(satuan) + "/pcs");
				}else{
						
							$('.harga').show();
							profit = data1['persen'];
							jual = (parseInt(total) * profit / 100) + parseInt(total);
							satuan = jual / jmlcetak / jml_satuan;
							perrim = satuan *  rim;
							
						//	alert(arrStr1);
							$('#satuan'+modulhit).val(formatMoney(satuan));
							$('#hargarim'+modulhit).val(formatMoney(perrim));
							$('#total'+modulhit).val(formatMoney(jual));
							$('#totdumy'+modulhit).val(formatMoney(jual));
							$('#data'+modulhit).val(arrStr1);
							$('#modul').val(modul);
				}
			}
		}	
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();

		}else{
				total  = parseInt(subtotal1) + parseInt(subtotal2) + parseInt(subtotal3) + parseInt(subtotal4) + parseInt(subtotal5); 
				//alert ( parseInt(subtotal1) + " - " + parseInt(subtotal2) + " - " + parseInt(subtotal3) + " - " + parseInt(subtotal4) + " - " + parseInt(subtotal5))
				profit = data1['persen'];
				jual = (parseInt(total) * parseInt(profit) / 100) + parseInt(total);
				satuan = jual / jmlcetak / jml_satuan;
				//alert(total);
				
				$(".progress-bar").css('width','100%'); 
				setTimeout(function(){ $(".progress-bar").css('background','green'); }, 500); 
							
			if( level == 'admin' || level == 'member' ){
				  $('#tableundangan').show();
							
			//	alert(arrStr1);
				$('#dataund1').val(arrStr1);
				$('#dataund2').val(arrStr2);
				$('#dataund3').val(arrStr3);
				$('#dataund4').val(arrStr4);
				$('#dataund5').val(arrStr5);
				//$('#dataund6').val(arrStr6);
				// $('#dataund7').val(arrStr7);
				// $('#dataund8').val(arrStr8);
				$('#ketbk').val(ket);
				$('#totjualund').html("Rp. " + formatMoney(jual));
				$('#satuanund').html("Rp. " + formatMoney(satuan) + "/pcs");
		//	hitungkartuucapan(data1,data2,data3,data4,data5);
		
		}else{
						
							$('.harga').show();
							profit = data1['persen'];
							jual = (parseInt(total) * profit / 100) + parseInt(total);
							satuan = jual / jmlcetak / jml_satuan;
							perrim = satuan *  rim;
							
						//	alert(arrStr1);
							// $('#satuanund').val(formatMoney(satuan));
							// $('#hargarimund').val(formatMoney(perrim));
							// $('#totalund').val(formatMoney(jual));
							// $('#totdumyund').val(formatMoney(jual));
							// $('#dataund').val(arrStr);
							// $('#modul').val(modul);
							$('#satuan'+modulhit).val(formatMoney(satuan));
							$('#hargarim'+modulhit).val(formatMoney(perrim));
							$('#total'+modulhit).val(formatMoney(jual));
							$('#totdumy'+modulhit).val(formatMoney(jual));
							$('#data'+modulhit).val(arrStr1);
							$('#modul').val(modul);
				}
			
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
echo json_encode(array(404 => "error undangan"));
	}
}
?>