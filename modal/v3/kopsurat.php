<?php
if (!empty($_POST['link'])){
$warnabar = "#40af26";
?>
<div class="modal-header bg-success">
	<h4 class="modal-title text-white">Cetak Kop Surat</h4>
	<button type="button" class="close" id="kop" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body p-2">
   <div class="form-row">
      <div class="form-group col-md-6">
         <div class="input-group">
            <span class="input-group-text">Jumlah Cetak</span>
            <input type="text" class="form-control" aria-label="" id="jmlcetakkop" autofocus>
            <span class="input-group-text">rim</span>
         </div>
      </div>

   <div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Uk. Cetak</span>
					</div>
					<select name="ukurankop" id="ukurankop" class="custom-select form-control" required></select>
				</div>
			</div>
			</div>
    <div class="form-row">
      <div class="form-group col-md-8">
         <div class="input-group">
            <span class="input-group-text">Lebar</span>
            <input type="text" class="form-control" aria-label="" id="lbrcetakkop">
            <span class="input-group-text">Tinggi</span>
            <input type="text" class="form-control" aria-label="" id="tgcetakkop" onchange="cekukurankop()">
            <span class="input-group-text">cm</span>
         </div>
      </div>
     
	 <div class="col-md-4">	
		<div class="form-group">
			<div class="input-group">
			  <span class="input-group-text">Bleed</span>
			  <input type="text" class="form-control" aria-label="" id="bleedkop" value="0">
				<span class="input-group-text">cm</span>
			</div>
		</div>
		</div>
		</div>
	<div class="form-row">	
      <div class="form-group col-md-6">
         <div class="input-group">
            <span class="input-group-text">Jumlah Warna</span>
            <input type="text" class="form-control" aria-label="" id="jmlwarnakop" value="2">
         </div>
      </div>
	  <div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Mesin</span>
					</div>
					<select name="idmesin" id="idmesin" class="custom-select form-control" data-mesin="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
			</div>
      <div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Bahan</span>
					</div>
					<select name="bahankop" id="bahankop" class="custom-select form-control" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Uk.plano</span>
					</div>
					<select id="idkertas" name="idkertas" class="custom-select form-control">
						<option value="0">Pilih ukuran plano</option>
					</select>
				</div>
			</div>
		</div>
     
   <div class="form-row">
      <div class="form-group col-md-5">
         <div class="input-group ">
            <span class="input-group-text">
            <input type="checkbox" id="finishing2kop">
            </span>
            <Label class="form-control" >Poly</label>											 
         </div>
         <!-- /input-group -->
      </div>
  
      <div class="form-group col-md-7">
         <div class="input-group">
            <span class="input-group-text">Lebar</span>
            <input type="text" class="form-control" aria-label="" id="lbrpolykop" value="1">
            <span class="input-group-text">Tinggi</span>
            <input type="text" class="form-control" aria-label="" id="tgpolykop" value="1">
            <span class="input-group-text">cm</span>
         </div>
      </div>
   </div>
  <div class="form-row">
      <div class="form-group col-md-12 has-danger">
	  <div class="input-group">
	   <span class="input-group-text">Keterangan</span>
            <input type="text" class="form-control" id="ketkopsurat"  placeholder="Isi dulu keterangannya">
  <div class="input-group-append">
    <button type="submit" class="btn btn-warning btnon" id="cekukuran">Hitung</button>
  </div>
</div>
      </div>
   </div>
<div class="form-row">
			<div class="form-group col-md-12">
				<div class="w3-light-grey">
					<div id="myBar" class="w3-green" style="height:5px;width:0"></div>
				</div>
			</div>
		</div>
  <div class="form-row">
   <div class="col-md-12">
			<form action="/data/detail-hitung/" method="post" target="_blank">
			<input type="hidden" id="token" name="token">
			<input type="hidden" id="user"  name="user">	
			<input type="hidden" id="modul" name="modul">
         <div id="tablekop"></div>
      </form>
   </div>
</div>
</div>
<div id="customstyle"></div>
<?php
	}//end token
	else{
echo json_encode(array(404 => "error"));
	}
?>