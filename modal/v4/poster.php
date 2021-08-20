<?php 
	if (!empty($_POST['link'])){ 	
	?>
	
	<div class="modal-header" style="background-color:<?= $warna; ?>;color:white;">
		<h4 class="modal-title text-white mb-2">Hitung <?= $namamod; ?></h4>
		<button type="button" class="close" id="p" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div class="modal-body p-2">
		<div class="form-row">
			<div class="jml form-group col-md-6 has-success">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" id="not1" for="jmlcetakp">Jml. Cetak</span>
					</div>
					<select name="jmlcetaksp" id="jmlcetaksp" class="custom-select form-control">
						<option value="500" selected>500</option>
						<option value="1000">1000</option>
						<option value="1500">1500</option>
						<option value="2000">2000</option>
						<option value="2500">2500</option>
						<option value="">Custom</option>
					</select>
					<input type="text" class="form-control" id="jmlcetakp" placeholder="0">
					<div class="input-group-append">
						<span class="input-group-text lembar">lbr</span>
					</div>
				</div>
			</div>
			
			<div class="form-group has-success col-md-6 ukuran ukuranp">
				<div class="input-group">
					<div class="input-group-append">
						<span class="input-group-text ">Uk. Cetak</span>
					</div>
					<select name="ukuranp" id="ukuranp" class="custom-select form-control" required></select>
				</div>
				
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-4 has-success lbrcetakp">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text ">Lebar</span>
					</div>
					<input type="text" class="form-control" id="lbrcetakp" placeholder="0" required>
					<div class="input-group-prepend">
						<span class="input-group-text">cm</span>
					</div>
				</div>
			</div>
			<div class="form-group col-md-4 has-success tgcetakp">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Tinggi</span>
					</div>
					<input type="text" class="form-control" id="tgcetakp" placeholder="0" required>
					<div class="input-group-prepend">
						<span class="input-group-text">cm</span>
					</div>
				</div>
			</div>
			<div class="form-group col-md-4">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Bleed</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="bleedp" value="0.4">
					<div class="input-group-prepend">
						<span class="input-group-text">cm</span>
					</div>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6 has-success jmlwarnap">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Jml Warna</span>
					</div>
					<input type="text" class="form-control" id="jmlwarnap" value="4">
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text " id="not4">Plano</span>
					</div>
					<select name="pilihb<?= $mod; ?>" id="pilihb<?= $mod; ?>" class="custom-select form-control" required>
						<option value="1">Otomatis</option>
						<option value="2">Manual</option>
					</select>
				</div>
			</div>
			
		</div>
		<div class="form-row">
			<div class="form-group col-md-6 has-danger bahanp">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text " id="not4">Bahan</span>
					</div>
					<select name="bahanp" id="bahanp" class="custom-select form-control" data-source="<?= $_link; ?>/katbahan/<?=$mod;?>/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
			<div class="form-group col-md-6 idkertas">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text ">Uk.plano</span>
					</div>
					<select id="idkertas" name="idkertas" class="custom-select form-control">
						<option value="0">- Pilih ukuran -</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text " id="not4">Mesin</span>
					</div>
					<select name="pilih<?= $mod; ?>" id="pilih<?= $mod; ?>" class="custom-select form-control" required>
						<option value="1">Otomatis</option>
						<option value="2">Manual</option>
					</select>
				</div>
			</div>
			<div class="form-group col-md-6 idmesin">
				<div class="input-group">
					<div class="input-group-append">
						<span class="input-group-text" id="not3">Mesin</span>
					</div>
					<select name="idmesin" id="idmesin" class="custom-select form-control" data-mesin="<?= $_link; ?>/mesin/<?=$mod;?>/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<select id="lamp" class="custom-select form-control" data-style="btn-warning">
					<option value="0" selected>Tanpa Laminasi</option>
					<option value="1">Varnish Satu Muka</option>
					<option value="3">Laminating Glosy Satu Muka</option>
					<option value="5">Laminating DOP Satu Muka</option>
				</select>
			</div>
			
			<div class="form-group col-md-6 mt-2">
				<div class="custom-control custom-checkbox mb-3">
					<input type="checkbox" class="custom-control-input" id="finishing4p">
					<label class="custom-control-label" for="finishing4p">SpotUV</label>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12 has-danger ket<?=$mod;?>">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Keterangan</span>
					</div>
					<input type="text" class="form-control" id="ketposter" placeholder="Isi dulu keterangannya">
					<div class="input-group-prepend">
						<button type="submit" class="btn btn-primary btnon" id="cekukuranp">Hitung</button>
					</div>
				</div>
			</div>
			
		</div>
		<div class="form-row text-center mt-1">
			<div class="col-md-12 display-hidden" id="hidemyBar">
				<div class="w3-light-grey">
					<div id="myBar" class="w3-green" style="height:5px;width:0"></div>
				</div>
			</div>
		</div>
		<div class="form-row text-center">
			<div class="col-md-12">
				<form action='/data/detail-hitung/' method='post' target='_blank'>
					<input type="hidden" id="token" name="token">
					<input type="hidden" id="user" name="user">
					<input type="hidden" id="modul" name="modul">
					<div id="tableposter"></div>
					<div id="table_poster"></div>
				</form>
			</div>
		</div>
	</div>
	<!--E:modal-body-->
	<div id="customstyle"></div>
	
	<?php
		// include "js/poster.php";
	} //end token
	else {
		echo json_encode(array(404 => "error"));
	}
?>