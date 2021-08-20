<?php
if (!empty($_POST['link'])){
$warnabar = "#ef8700";
?>
<div class="modal-header" style="background-color:<?=$warnabar;?>;color:white;">
	<button type="button" class="close" id="p" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Cetak Poster</h4>
</div>
<div class="modal-body v2">

                    <div class="row" >
                                    <div class="col-md-6">
                                        <div class="form-group">
										<div class="input-group">
											<span class="input-group-addon square btn btn-danger" id="not1">Jumlah Cetak</span>
											<input type="text" class="form-control square" id="jmlcetakp" placeholder="Jumlah Cetak" autofocus>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        </div>
                                        </div>
										<div class="col-md-6">
       <div class="form-group ukuran">
          <div class="input-group">
            <span class="input-group-addon square  btn btn-danger">Ukuran cetak</span>
			<select name="ukuranp" id="ukuranp" class="custom-select form-control square" required>	 
			</select>
          </div>
        </div> 
                                        </div> 
										<div class="col-md-8">
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon square">Lebar</span>
                                            <input type="text" class="form-control square"  id="lbrcetakp" placeholder="Lebar">
											<span class="input-group-addon square">Tinggi</span>
                                            <input type="text" class="form-control square" onchange="cekukuranp()" id="tgcetakp" placeholder="Tinggi" >
											<span class="input-group-addon square">cm</span>
                                        </div>  
                                        </div>  
                                        </div>  
										<div class="col-md-4">	
										<div class="form-group">
											<div class="input-group">
											  <span class="input-group-addon square">Bleed</span>
											  <input type="text" class="form-control square" aria-label="" id="bleedp" value="0.4">
											</div>
										</div>
										</div>
										<div class="col-md-5">
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon square">Jml Warna</span>
                                            <input type="text" class="form-control square" id="jmlwarnap" value="4" >
                                        </div>
                                        </div>
                                        </div>
		<div class="col-md-7">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon square  btn btn-danger" id="not2">Mesin</span>
 <select name="idmesin" id="idmesin" class="custom-select form-control square form-control-sm" data-mesin="<?= $host; ?>/api/<?= $app_id; ?>/mesin/brosur/0" data-valueKey="id" data-displayKey="name" required>	 
</select>
          </div>
        </div>
        </div>
<div class="col-md-6">
        <div class="form-group">
          <div class="input-group">
	<span class="input-group-addon square  btn btn-danger">Bahan</span>
 <select name="bahanp" id="bahanp" class="custom-select form-control square form-control-sm" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/poster/0" data-valueKey="id" data-displayKey="name" required>	 
</select>
          </div>
        </div>
</div>
		<div class="col-md-6">
<div class="input-group">
	<span class="input-group-addon square  btn btn-danger">Uk.plano</span>
<select id="idkertas" name="idkertas" class="custom-select form-control square form-control-sm">
   <option value="0">- Pilih ukuran -</option>
</select>
</div>

        </div>
 <div class="col-md-12"></div>

										<div class="col-md-6">
										<div class="form-group">
										<select id="lamp" class="custom-select form-control square form-control-sm" data-style="btn-warning">
											<option value="0" selected>Tanpa Laminasi</option>
											<option value="1">Varnish Satu Muka</option>
											<option value="3">Laminating Glosy Satu Muka</option>
											<option value="5">Laminating DOP Satu Muka</option>
										</select>
										</div>
									</div>
											 <div class="col-md-6">	
											 <div class="form-group">
											<div class="input-group ">
											  <span class="input-group-addon square">
												<input type="checkbox" id="finishing4p">
											  </span>
											  <Label class="form-control square" >SpotUV</label>											 
											</div><!-- /input-group -->
											</div>
											</div>
									<div class="col-md-9">	
                                        <div class="form-group">
										<div class="input-group">
										<span class="input-group-addon square  btn btn-warning">Keterangan</span>
										<input type="text" class="form-control square ket" aria-label="" id="ketposter"  placeholder="Isi dulu keterangannya">
										</div>
										</div>
										</div>	
                                    <div class="col-md-3">					
                                        <div class="form-group">
											<button  type="submit" class="btn btn-primary btnon square" id="cekukuranp">Hitung</button>
                                        </div>                                        
                                    </div>
	<div class="col-md-12 display-hidden" id="hidemyBar">
	  <div class="w3-light-grey">
		<div id="myBar" class="w3-deep-orange" style="height:5px;width:0"></div>
	  </div>
	</div>
<div class="col-md-12">
<form action='detail-hitung/' method='post' target='_blank'>
			<input type="hidden" id="token" name="token">
			<input type="hidden" id="user"  name="user">	
			<input type="hidden" id="modul" name="modul">
<div id="tableposter"></div>
</form>
                                    </div>
         </div><!--end row-->
			

   </div><!--E:modal-body-->
<div id="customstyle"></div>
<?php
	}//end token
	else{
echo json_encode(array(404 => "error"));
	}
?>