<?php
	if (!empty($_POST['link'])) {
	?>
	<div class="modal-header" style="background-color:<?= $warna; ?>;color:#f7f7f7;">
		<h4 class="modal-title">Hitung <?= $namamod; ?></h4>
		<button type="button" class="close" id="pb" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div class="modal-body p-2">
		
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Jumlah Cetak</span>
					</div>
					<select name="jmlcetaks" id="jmlcetakspb" class="custom-select form-control">
						<option value="500">500</option>
						<option value="1000">1000</option>
						<option value="1500">1500</option>
						<option value="2000">2000</option>
						<option value="2500">2500</option>
						<option value="">Custom</option>
					</select>
					<input type="text" class="form-control" value="500" id="jmlcetakpb" autofocus>
					<div class="input-group-prepend">
						<span class="input-group-text">pcs</span>
					</div>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" id="pjcetakpb" placeholder="Panjang">
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" id="tgcetakpb" placeholder="Tinggi" >
					<span class="input-group-text">Lebar Samping</span>
					<input type="text" class="form-control" id="lbrcetakpb" placeholder="Lebar">
				</div>
			</div>
		</div>
		<div class="form-row">																					
			<div class="form-group col-md-5">
				<div class="input-group">
					<span class="input-group-text">Jumlah Warna</span>
					<input type="text" class="form-control" id="jmlwarnapb" value="4" >
				</div>
			</div>
			<div class="form-group col-md-7">
				<div class="custom-control custom-checkbox mb-3">
					<input type="checkbox" class="custom-control-input" id="bagi2">
					<label class="custom-control-label" for="bagi2">Cetak bagi 2 (Bila tidak muat)</label>
				</div>
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
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Bahan</span>
					</div>
					<select name="bahanpb" id="bahanpb" class="custom-select form-control" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
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
				<select id="lampb" class="custom-select form-control" data-style="btn-warning">
					<option value="0" selected>Tanpa Laminasi</option>
					<option value="1">Varnish </option>
					<option value="3">Laminating Glosy </option>
					<option value="5">Laminating DOP </option>
				</select>
			</div>
			<div class="form-group col-md-6">
				<div class="custom-control custom-checkbox mb-3">
					<input type="checkbox" class="custom-control-input" id="finishing4pb">
					<label class="custom-control-label" for="finishing4pb">SpotUV</label>
				</div>
			</div>
		</div>
		
		<div class="form-row">
			<div class="form-group col-md-4">
				<div class="custom-control custom-checkbox mb-3">
					<input type="checkbox" class="custom-control-input" id="finishingpb">
					<label class="custom-control-label" for="finishingpb">Poly</label>
				</div>
			</div>
			
			<div class="form-group col-md-8">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" id="lbrpolypb" value="1" readonly>
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" id="tgpolypb" value="1" readonly>
					<span class="input-group-text">cm</span>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Kertas u/ Lapisan Bawah</span>
					</div>
					<select name="kertasbawah" id="kertasbawah" class="custom-select form-control" data-sourcebw="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
			<div class="form-group col-md-12">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Uk.plano</span>
					</div>
					<select id="idkertasbw" name="idkertasbw" class="custom-select form-control">
						<option value="0">Pilih ukuran plano</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12 col-sm-12 has-danger ket<?=$mod;?>">
				<div class="input-group">
					<span class="input-group-text">Keterangan</span>
					<input type="text" class="form-control" id="ket<?=$mod;?>" placeholder="Isi dulu keterangannya">
					<div class="input-group-prepend">
						<button type="submit" class="btn btn-warning btnon"  id="cekukuran">Hitung</button>
						<?php echo cNav('paperbag'); ?>
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
						<input type="hidden" id="modul">
						<input type="hidden" name="data1[]" id="data1"  value="">
						<input type="hidden" name="data2[]" id="data2" value="">
						<input type="hidden" name="ket" id="ket" value="">
						<input type="hidden" name="jumlahcetak" id="jumlahcetak" value="">
						
						<div id='tablepb' class='small'>
							<table id='tablepb' class='table table-striped'>
								<thead >
									<tr style='background-color:<?=$warnabar;?>;color:white'>
										<th class='text-left'>Harga Satuan</th>
										<th class='text-right'>Harga Total</th>
									</tr>
								</thead>
								
								<tr><td class='text-left'> <span id="satuan"></span></td>
								<td align="right"><button type='submit' name='submit' value='0' class='btn btn-warning btn-sm btn-sm hint--top-left' aria-label='Detail hitung' style='background-color:<?=$warnabar;?>;color:white;width:120px'><span id="totjual"></span></button></td></tr>
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