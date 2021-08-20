<?php
	if (!empty($_POST['link'])){
	?>
	<div class="modal-header" style="background-color:<?= $warna; ?>;color:#f7f7f7;">
		<h4 class="modal-title">Hitung <?= $namamod; ?></h4>
		<button type="button" class="close" id="m" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div class="modal-body p-2">
		<div class="form-row" >
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Jml</span>
					</div>
					<select name="jmlcetaks" id="jmlcetakskm" class="custom-select form-control">
						<option value="500">500</option>
						<option value="1000">1000</option>
						<option value="1500">1500</option>
						<option value="2000">2000</option>
						<option value="2500">2500</option>
						<option value="">Custom</option>
					</select>
					<input type="text" class="form-control" id="jmlcetakm" value="500" autofocus>
				</div>
			</div>
			<div class="form-group col-md-6 ukuran">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Uk. Cetak</span>
					</div>
					<select name="ukuranm" id="ukuranm" class="custom-select form-control" required></select>
				</div>
			</div>
			
		</div>
		<div class="form-row">
			<div class="form-group col-md-7">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" id="lbrcetakm" placeholder="Lebar" readonly>
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" onchange="cekukuranm()" id="tgcetakm" placeholder="Tinggi" readonly>
					<span class="input-group-text">cm</span>
				</div>
			</div>
			
			<div class="form-group col-md-5">
				<div class="input-group ">
					<span class="input-group-text">Lebar Kantong</span>
					<input type="text" class="form-control" id="lbrkantongmap" value="10">   
					<span class="input-group-text">cm</span>
				</div><!-- /input-group -->
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Mesin</span>
					</div>
					<select name="idmesin" id="idmesin" class="custom-select form-control" data-mesin="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
		</div>
		<div class="form-row mb-1">
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Bahan</span>
					</div>
					<select name="bahanm" id="bahanm" class="custom-select form-control" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/map/0" data-valueKey="id" data-displayKey="name" required>
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
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Jumlah Warna</span>
					<input type="text" class="form-control" aria-label="" id="jmlwarnam" value="4" >
					<span class="input-group-text">/</span>
					<input type="text" class="form-control" aria-label="" id="jmlwarnam2" value="0" >
				</div>
			</div>
			<div class="form-group col-md-6">
				<select id="lamm" class="custom-select form-control" data-style="btn-warning">
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
			<div class="form-group col-md-6 pb-0">
				<div class="custom-control custom-checkbox mb-0 mt-1">
					<input type="checkbox" class="custom-control-input" id="finishing4m">
					<label class="custom-control-label" for="finishing4m">SpotUV</label>
				</div>
			</div>
			<div class="form-group col-md-6 pb-0">
				<div class="custom-control custom-checkbox mb-0 mt-1">
					<input type="checkbox" class="custom-control-input" id="finishing5m" checked value="1">
					<label class="custom-control-label" for="finishing5m">Lem</label>
				</div>
			</div>
		</div>
		
		<div class="form-row">
			<div class="form-group col-md-12 pb-0">
				<div class="custom-control custom-checkbox mb-0 mt-1">
					<input type="checkbox" class="custom-control-input" id="cetakkantonggabung" checked value="1">
					<label class="custom-control-label" for="cetakkantonggabung">Centang Jika Kantong dicetak Gabung</label>
				</div>
			</div>
		</div>
		<div class="form-row">
			
			<div class="form-group col-md-6 pb-0 kantongpolos">
				<div class="custom-control custom-checkbox mb-0 mt-1">
					<input type="checkbox" class="custom-control-input" id="kantongpolos" checked value="0">
					<label class="custom-control-label" for="kantongpolos">Centang Jika Kantong Polos</label>
				</div>
			</div>
			
			<div class="form-group col-md-6 pb-0 jmlwarnakantong">
				<div class="custom-control custom-checkbox mb-0 mt-1">
					<input type="checkbox" class="custom-control-input" id="jmlwarnakantong" checked value="Full Color">
					<label class="custom-control-label" for="jmlwarnakantong">Jml Warna Kantong</label>
				</div>
			</div>
			
		</div>		
		
		
		
		<div class="form-row">
			<div class="form-group col-md-12 col-sm-12 has-danger ket<?=$mod;?>">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Keterangan</span>
					</div>
					<input type="text" class="form-control" id="ketmap" placeholder="Isi dulu keterangannya">
					<div class="input-group-prepend">
						<button type="submit" class="btn btn-warning btnon" onclick="cekukuranm()" id="cekukuran">Hitung</button>
						<?php echo cNav('map'); ?>
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
				<div class="form-group">
					<form action="/data/detail-hitung/" method="post" target="_blank">
						<input type="hidden" id="token" name="token">
						<input type="hidden" id="user"  name="user">	
						<input type="hidden" id="modul" name="modul">
						<input type="hidden" name="data1[]" id="data1"  value="">
						<input type="hidden" name="data2[]" id="data2" value="">
						<input type="hidden" name="ket" id="ket" value="">
						<input type="hidden" name="jumlahcetak" id="jumlahcetak" value="">
						
						<div id='tablemap' class='small'>
							<table id='tablemap' class='table table-striped' >
								<thead >
									<tr style='background-color:<?=$warnabar;?>;color:white' >
										<th class='text-left'>Harga Jual</th><th></th>
									</tr>
								</thead>
								
								<tr><td class='text-left'> <span id="satuan"></span></td><td class='text-right' ><button type='submit' name='submit' value='0' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'><span id="totjual"></span></button></td></tr>
							</table>												
							
						</div>
					</form> 
				</div>                                        
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