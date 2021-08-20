<?php
if (!empty($_POST['link'])) {
?>
	<div class="modal-header" style="background-color:<?= $warna; ?>;color:#f7f7f7;">
		<h6 class="modal-title" id="modal-title-default" style="color:#fff;margin-top:5px">Cetak Brosur</h6>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	</div>
	<div class="modal-body p-2">
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">Jml. Cetak</span>
					</div>
					<input type="text" class="form-control" id="jmlcetak" placeholder="0" autofocus>
					<div class="input-group-append">
						<span class="input-group-text">lembar</span>
					</div>
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Uk. Cetak</span>
					</div>
					<select name="ukuran" id="ukuran" class="custom-select form-control" required></select>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-8">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Lebar</span>
					</div>
					<input type="text" class="form-control" id="lbrcetak" value="0">
					<div class="input-group-append">
						<span class="input-group-text">Tinggi</span>
					</div>
					<input type="text" class="form-control" id="tgcetak" value="0">
					<div class="input-group-append">
						<span class="input-group-text">cm</span>
					</div>
				</div>
			</div>
			<div class="form-group col-md-4">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">bleed</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="bleed" value="0.4">
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Jml. Warna</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="jmlwarna" value="4">
					<div class="input-group-append">
						<span class="input-group-text">/</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="jmlwarna2" value="4">
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
		<div class="form-row mb-1">
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Bahan</span>
					</div>
					<select name="bahan" id="bahan" class="custom-select form-control" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/brosur/0" data-valueKey="id" data-displayKey="name" required>
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
				<select id="lam" class="custom-select form-control">
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

			<div class="form-group col-md-3 mt-2">
				<div class="custom-control custom-checkbox mb-3">
					<input type="checkbox" class="custom-control-input" id="finishing4">
					<label class="custom-control-label" for="finishing4">SpotUV</label>
				</div>
			</div>
			<div class="form-group col-md-3 mt-2">
				<div class="custom-control custom-checkbox mb-3">
					<input type="checkbox" class="custom-control-input" id="finishing1brosur">
					<label class="custom-control-label" for="finishing1brosur">Hot Foil</label>
				</div>
			</div>
		</div>
		<div class="form-row mb-1">
			<div class="form-group col-md-6">
				<select id="lipat" class="form-control custom-select" data-style="btn-warning">
					<option value="0" selected>Tanpa Lipat</option>
					<option value="1">Lipat Mesin
					</option>
					<option value="2">Lipat Pond
					</option>
				</select>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Jml Lipatan</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="lipatbro" value="0" readonly>
				</div>
			</div>
		</div>
		<div class="form-row mb-1">
			<div class="form-group col-md-12">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Lebar</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="lbrpolybrosur" value="1">
					<div class="input-group-append">
						<span class="input-group-text">Tinggi</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="tgpolybrosur" value="1">
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-9 has-danger ket<?= $mod; ?>">
				<div class="input-group">
					<span class="input-group-text">Keterangan</span>
					<input type="text" class="form-control" id="ket<?= $mod; ?>" placeholder="Isi dulu keterangannya">
				</div>
			</div>

			<div class="form-group col-md-3 ">
				<button type="submit" class="btn btn-primary btnon" id="cekukuran">Hitung</button>
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
			<div class="form-group col-md-12">
				<form action="/data/detail-hitung/" method="post" target="_blank">
					<input type="hidden" id="token" name="token">
					<input type="hidden" id="user" name="user">
					<input type="hidden" id="modul" name="modul">
					<div id="detailtablebro"></div>
				</form>
			</div>
		</div>
	</div>
	<div id="customstyle"></div>
<?php
} //end token
else {
	echo json_encode(array(404 => "error"));
}
?>