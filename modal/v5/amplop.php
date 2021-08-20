<?php
	if (!empty($_POST['link'])) {
	?>
	<div class="modal-header" style="background-color:<?= $warna; ?>;color:#f7f7f7;">
		<h4 class="modal-title">Hitung Amplop Custom</h4>
		<button type="button" class="close" id="bu" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div class="modal-body p-2">
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group">
					<span class="input-group-text">Jumlah Cetak</span>
					<input type="text" class="form-control" id="jmlcetakam" autofocus>
					<span class="input-group-text">box (Isi 100lbr)</span>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" id="lbrcetakam">
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" id="tgcetakam">
				</div>
			</div>
		</div>
		<div class="form-row">
			
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Jumlah Warna</span>
					<input type="text" class="form-control"  id="jmlwarnaam" value="4">
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text " id="not4">Plano</span>
					<select name="pilihb<?= $mod; ?>" id="pilihb<?= $mod; ?>" class="custom-select form-control" required>
						<option value="1">Otomatis</option>
						<option value="2">Manual</option>
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
					<select name="bahanam" id="bahanam" class="custom-select form-control" data-bahanam="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/amplop/0" data-valueKey="id" data-displayKey="name" required>
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
					<span class="input-group-text " id="not4">Mesin</span>
					<select name="pilih<?= $mod; ?>" id="pilih<?= $mod; ?>" class="custom-select form-control" required>
						<option value="1">Otomatis</option>
						<option value="2">Manual</option>
					</select>
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
				<select id="lamam" class="selectpicker form-control custom-select" data-style="btn-warning">
					<option value="0" selected>Tanpa Laminasi</option>
					<option value="1">Varnish Satu Muka</option>
					<option value="2">Varnish Bolak-balik</option>
					<option value="3">Laminating Glosy Satu Muka</option>
					<option value="4">Laminating Glosy BB</option>
					<option value="5">Laminating DOP Satu Muka</option>
					<option value="6">Laminating DOP BB</option>
				</select>
			</div>
			<div class="form-group col-md-6 mt-2">
				<div class="custom-control custom-checkbox mb-3">
					<input type="checkbox" class="custom-control-input" id="doubletape">
					<label class="custom-control-label" for="doubletape">Tutup Double Tape</label>
				</div>
			</div>
			
		</div> 
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="custom-control custom-checkbox mb-3">
					<input type="checkbox" class="custom-control-input" id="labelkaca">
					<label class="custom-control-label" for="labelkaca">Jendela Mika</label>
				</div>
			</div>
			
			<div class="form-group col-md-6">
				<div class="custom-control custom-checkbox mb-3">
					<input type="checkbox" class="custom-control-input" id="finishing1am">
					<label class="custom-control-label" for="finishing1am">Poly</label>											 
				</div>
			</div>
		</div>
		
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="number" pattern="[0-9]" class="form-control" id="lbrpolyam"  min="1" value="1" required="required" readonly >
					<span class="input-group-text">Tinggi</span>
					<input type="number" pattern="[0-9]" class="form-control" id="tgpolyam"  min="1" value="1" required="required" readonly>
				</div>
			</div>
		</div>
		
		<div class="form-row">
			<div class="form-group col-md-8 col-sm-12 col-xs-12 has-danger ket<?=$mod;?>">
				<div class="input-group">
					<span class="input-group-text">Keterangan</span>
					<input type="text" class="form-control" id="ket<?=$mod;?>" placeholder="Isi dulu keterangannya">
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-sm-12 col-xs-12">
				<div class="btn-group" role="group">
					<button type="submit" class="btn btn-warning btnon" onclick="cekukuranam()">Hitung</button>
					<?php echo cNav($mod); ?>
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
				<form action='/data/detail-hitung/' method='post' target='_blank'>
					<input type="hidden" id="modul">
					<div id="tableamp"></div>
				</form>
			</div>
		</div>
		</div>
		<div id="customstyle"></div>
		<?php
		}//end token
		else{
			echo json_encode(array(404 => "error 1"));
		}
	?>		