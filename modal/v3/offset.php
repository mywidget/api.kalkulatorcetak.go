<?php
if (!empty($_POST['link'])){
$warnabar = "#9e4725";
?>
<div class="modal-header" style="background-color:<?=$warnabar;?>;color:white;">
	<h4 class="modal-title text-white">Cetak Offset Umum</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div id="printThis" class="modal-body p-2">

										<div class="form-row">
                                        <div class="form-group col-md-6">
											<div class="input-group">
											  <span class="input-group-text">Jumlah Cetak</span>
											  <input type="text" class="form-control" aria-label="" id="jmlcetakoffset" value="" autofocus>
											  <span class="input-group-text">pcs</span>
											</div>
										</div>
										
										<div class="form-group col-md-6">
										<div class="input-group">
											<span class="input-group-text">Jumlah Warna</span>
                                            <input type="text" class="form-control" aria-label=""  id="jmlwarnaoffset" value="4" >
											<span class="input-group-text">/</span>
											<input type="text" class="form-control" aria-label="" id="jmlwarnaoffset2" value="0" >
                                        </div>
                                        </div>
                                        </div>
										<div class="form-row">
										<div class="form-group col-md-8">
										<div class="input-group">
											<span class="input-group-text">Lebar</span>
                                            <input type="text" class="form-control" id="lbrcetakoffset" placeholder="Lebar">
											<span class="input-group-text">Tinggi</span>
                                            <input type="text" class="form-control" id="tgcetakoffset" placeholder="Tinggi">
											<span class="input-group-text">cm</span>
                                        </div>
                                        </div>
										<div class="form-group col-md-4">
										<div class="input-group">
											<span class="input-group-text">Bleed</span>
                                            <input type="text" class="form-control" id="bleedoffset" value="0.4" placeholder="Bleed">
											<span class="input-group-text">cm</span>
                                        </div>
                                        </div>
										</div>
<div class="form-row">
 <div class="form-group col-md-6  idmesin">
							<div class="input-group">
								<div class="input-group-append">
									<span class="input-group-text" id="not3">Mesin</span>
								</div>
								<select name="idmesin" id="idmesin" class="custom-select form-control" data-mesin="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
								</select>
							</div>
						</div>
						<div class="form-group col-md-6">
										<select id="lamoffset" class="custom-select form-control" data-style="btn-warning">
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
<div class="form-row">
				
					<div class="form-group col-md-6">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">Bahan</span>
							</div>
							<select name="bahanoffset" id="bahanoffset" class="custom-select form-control" data-bahan="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
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
										<div class="form-group col-md-3">
											<div class="input-group ">
											  <span class="input-group-text">
												<input type="checkbox" id="polyoffset">
											  </span>
											  <Label class="form-control" >Poly</label>											 
											</div><!-- /input-group -->
											</div>
										
										<div class="form-group col-md-9">
                                           <div class="input-group">
											  <span class="input-group-text">Lebar</span>
											  <input type="text" class="form-control" aria-label="" id="lbrpolyoffset" value="1">
											  <span class="input-group-text">Tinggi</span>
											  <input type="text" class="form-control" aria-label="" id="tgpolyoffset" value="1">
											  <span class="input-group-text">Jumlah</span>
											  <input type="text" class="form-control" aria-label="" id="jmlpolyoffset" value="1">
											  <span class="input-group-text">cm</span>
											</div>
                                        </div>
                                        </div>	
										<div class="form-row">
										<div class="form-group col-md-3">
											<div class="input-group ">
											  <span class="input-group-text">
												<input type="checkbox" id="embosoffset">
											  </span>
											  <Label class="form-control">Embos</label>											 
											</div><!-- /input-group -->
										</div>
										
										<div class="form-group col-md-9">
                                           <div class="input-group">
											  <span class="input-group-text">Lebar</span>
											  <input type="text" class="form-control" aria-label="" id="lbrembosoffset" value="1">
											  <span class="input-group-text">Tinggi</span>
											  <input type="text" class="form-control" aria-label="" id="tgembosoffset" value="1"> 
											  <span class="input-group-text">Jumlah</span>
											  <input type="text" class="form-control" aria-label="" id="jmlembosoffset" value="1">
											  <span class="input-group-text">cm</span>
											</div>
                                        </div>
                                        </div>		
										
										<div class="form-row">
										<div class="form-group col-md-4">
										<div class="input-group ">
										  <span class="input-group-text">
											<input type="checkbox" id="spotuvoffset">
										  </span>
										  <Label class="form-control" >SpotUV</label>											 
										</div><!-- /input-group -->
										</div>
										
										<div class="form-group col-md-8">
                                           <div class="input-group">
											  <span class="input-group-text">Lebar</span>
											  <input type="text" class="form-control" aria-label="" id="lbrspotuvoffset" value="1">
											  <span class="input-group-text">Tinggi</span>
											  <input type="text" class="form-control" aria-label="" id="tgspotuvoffset" value="1">
											  <span class="input-group-text">cm</span>
											</div>
                                        </div>
                                        </div>	
										<div class="form-row">
										<div class="form-group col-md-4">
											<div class="input-group ">
											  <span class="input-group-text">
												<input type="checkbox" id="pondoffset">
											  </span>
											  <Label class="form-control" >Pond</label>											 
											</div><!-- /input-group -->
											</div>
										<div class="form-group col-md-8">
                                           <div class="input-group">
											  <span class="input-group-text">Lebar</span>
											  <input type="text" class="form-control" aria-label="" id="lbrpondoffset" value="1">
											  <span class="input-group-text">Tinggi</span>
											  <input type="text" class="form-control" aria-label="" id="tgpondoffset" value="1">
											  <span class="input-group-text">cm</span>
											</div>
                                        </div>
                                        </div>
										
										<div class="form-row">
										<div class="form-group col-md-6">
											<div class="input-group ">
											  <span class="input-group-text">
												<input type="checkbox" id="nomoratoroffset">
											  </span>
											  <Label class="form-control">Nomorator</label>											 
											</div><!-- /input-group -->
											</div>
										
										<div class="form-group col-md-6">
                                           <div class="input-group">
											  <span class="input-group-text">Jml Titik</span>
											  <input type="text" class="form-control" aria-label="" id="jmlnomoratoroffset" value="1">
											</div>
                                        </div>
                                        </div>


										<div class="form-row">
										<div class="form-group col-md-6">
											<div class="input-group ">
											  <span class="input-group-text">
												<input type="checkbox" id="porporasioffset">
											  </span>
											  <Label class="form-control">Porporasi</label>											 
											</div><!-- /input-group -->
											</div>
										
										<div class="form-group col-md-6">
                                           <div class="input-group">
											  <span class="input-group-text">Jumlah</span>
											  <input type="text" class="form-control" aria-label="" id="jmlporporasioffset" value="1">
											</div>
                                        </div>
                                        </div>
										

										
<div class="form-row">
				<div class="form-group col-md-9">
					<div class="input-group">
						<span class="input-group-text">Keterangan</span>
						<input type="text" class="form-control" aria-label="" id="ket<?=$mod;?>" placeholder="Isi dulu keterangannya">
					</div>
				</div>

			<div class="form-group col-md-3">
				<button type="submit" class="btn btn-primary btnon" id="cekukuran">Hitung</button>
			</div>
			</div>
			
	<div class="form-row">
		<div class="col-md-12 mt-2">
			<div class="w3-light-grey">
				<div id="myBar" class="w3-green" style="height:5px;width:0"></div>
			</div>
		</div>
	</div>
<div class="form-row">

									  
									
                                    <div class="col-md-12">	
												<form action='/data/detail-hitung/' method='post' target='_blank'>												
												<input type="hidden" id="modul">
												<div id="tableoffset"></div>
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