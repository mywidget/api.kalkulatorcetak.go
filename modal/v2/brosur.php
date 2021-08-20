<?php
if (!empty($_POST['link'])){
$warnabar = "#55aa5f";
?>
<div class="modal-header" style="background-color:<?=$warnabar;?>;color:white;">
	<button type="button" class="close" id="b" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Cetak Brosur</h4>
</div>
<div class="modal-body v2">
  <div class="row">
		<div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon square btn btn-danger">Jumlah Cetak
            </span>
            <input type="text" class="form-control square input" id="jmlcetak" autofocus>
            <span class="input-group-addon square">lembar
            </span>
          </div>
        </div>
        </div>
		<div class="col-md-6">
        <div class="form-group ukuran">
          <div class="input-group">
            <span class="input-group-addon square btn-danger">Ukuran cetak</span>
			<select name="ukuran" id="ukuran" class="custom-select form-control square" required>	 
			</select>
          </div>
        </div> 
        </div> 
		<div class="col-md-8">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon square">Lebar
            </span>
            <input type="text" class="form-control square" id="lbrcetak" value="0">
            <span class="input-group-addon square">Tinggi
            </span>
            <input type="text" class="form-control square" id="tgcetak" value="0">
            <span class="input-group-addon square">cm
            </span>
          </div>
        </div>  
        </div>  
		<div class="col-md-4">	
		<div class="form-group">
			<div class="input-group">
			  <span class="input-group-addon square">Bleed</span>
			  <input type="text" class="form-control square" aria-label="" id="bleed" value="0.4">
			</div>
		</div>
		</div>
		<div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon square">Jumlah Warna</span>
            <input type="text" class="form-control square input" aria-label="" id="jmlwarna" value="4" >
            <span class="input-group-addon square">/</span>
            <input type="text" class="form-control square input" aria-label="" id="jmlwarna2" value="4" >
          </div>
        </div>
        </div>

		<div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon square btn-danger">Mesin</span>
 <select name="idmesin" id="idmesin" class="custom-select form-control square form-control-sm" data-mesin="<?= $host; ?>/api/<?= $app_id; ?>/mesin/brosur/0" data-valueKey="id" data-displayKey="name" required>	 
</select>
          </div>
        </div>

        </div>
		<div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
	<span class="input-group-addon square btn-danger">Bahan</span>
 <select name="bahan" id="bahan" class="custom-select form-control square form-control-sm" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/brosur/0" data-valueKey="id" data-displayKey="name" required>	 
</select>
          </div>
        </div>
        </div>
		<div class="col-md-6">
<div class="input-group">
	<span class="input-group-addon square btn-danger">Uk.plano</span>
<select id="idkertas" name="idkertas" class="custom-select form-control square form-control-sm">
   <option value="0">- Pilih ukuran -</option>
</select>
</div>
        </div>
		<div class="col-md-6">
        <div class="form-group">
          <select id="lam" class="custom-select form-control square form-control-sm">
            <option value="0" selected>Tanpa Laminasi
            </option>
            <option value="1">Varnish Satu Muka
            </option>
            <option value="2">Varnish Bolak-balik
            </option>
            <option value="3">Laminating Glosy Satu Muka
            </option>
            <option value="4">Laminating Glosy BB
            </option>
            <option value="5">Laminating DOP Satu Muka
            </option>
            <option value="6">Laminating DOP BB
            </option>
          </select>
        </div>
      </div>

      <div class="col-md-6">	
        <div class="form-group">
          <div class="input-group ">
            <span class="input-group-addon square">
              <input type="checkbox" id="finishing4">
            </span>
            <Label class="form-control square" >SpotUV
              </label>											 
          </div>
          <!-- /input-group -->
        </div>
      </div>
	  <div class="col-md-6">
        <div class="form-group">
          <select id="lipat" class="selectpicker form-control square custom-select" data-style="btn-warning" ">
            <option value="0" selected>Tanpa Lipat
            </option>
            <option value="1">Lipat Mesin
            </option>
            <option value="2">Lipat Pond
            </option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <div class="input-group ">
            <span class="input-group-addon square">Jml Lipatan</span>
            <input type="text" class="form-control square" aria-label="" id="lipatbro" value="3" >
          </div>
          <!-- /input-group -->
        </div>
      </div>

      <div class="col-md-6">	
        <div class="form-group">
          <div class="input-group ">
            <span class="input-group-addon square">
              <input type="checkbox" id="finishing1brosur">
            </span>
            <Label class="form-control square" >Hot Foil
              </label>											 
          </div>
          <!-- /input-group -->
        </div>
      </div>
      <div class="col-md-6">	
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon square">Lebar
            </span>
            <input type="text" class="form-control square" readonly id="lbrpolybrosur" value="1">
            <span class="input-group-addon square">Tinggi
            </span>
            <input type="text" class="form-control square" readonly id="tgpolybrosur" value="1">
          </div>
        </div>
      </div>
	  <!--end biaya-->
	  <div class="col-md-12">	
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon square btn-danger">Keterangan
            </span>
            <input type="text" class="form-control square ket" id="ketbrosur"  placeholder="Isi dulu keterangannya">
<span class="input-group-btn">
   <button  type="submit" class="btn btn-primary" id="cekukuran">Hitung</button>
      </span>
		
          </div>
        </div>
      </div>
	<div class="col-md-12 display-hidden" id="hidemyBar">
	  <div class="w3-light-grey">
		<div id="myBar" class="w3-deep-orange" style="height:5px;width:0"></div>
	  </div>
	</div>
      <div class="col-md-12">	
			<form action="detail-hitung/" method="post" target="_blank">
			<input type="hidden" id="token" name="token">
			<input type="hidden" id="user"  name="user">	
			<input type="hidden" id="modul" name="modul">
          <div id="detailtablebro"></div>
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