<?php
if (!empty($_POST['link'])) {
?>
	<div class="modal-header bg-warning">
		<h4 class="modal-title text-white align-baseline">Box 1</h4>
		<button type="button" class="close" id="bx1" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div class="modal-body p-2">
		<input type="hidden" id="bbbox1" value="1">
		<div class="form-row">
			<div class="form-group has-success col-md-12 jml">
				<div class="input-group">
					<span class="input-group-text" id="not1">Jumlah Cetak</span>
					<input type="text" class="form-control" aria-label="" id="jmlcetakbox1" value="500" autofocus>
					<div class="input-group-append">
					<span class="input-group-text">pcs</span>
					</div>
					<div class="input-group-append">
					<span class="input-group-text">&nbsp;&nbsp;</span>
					</div>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-4 has-success lbrcetakbox1">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" id="lbrcetakbox1" placeholder="Lebar" required>
				</div>
			</div>
			<div class="form-group col-md-4 has-success pjcetakbox1">
				<div class="input-group">
					<span class="input-group-text">Panjang</span>
					<input type="text" class="form-control" id="pjcetakbox1" placeholder="Panjang" required>

				</div>
			</div>
			<div class="form-group col-md-4 has-success tgcetakbox1">
				<div class="input-group">
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" id="tgcetakbox1" placeholder="Tinggi" required>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-7">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-text">Jumlah Warna</span>
						<input type="text" class="form-control" id="jmlwarnabox1" value="4" required>
						<span class="input-group-text">/</span>
						<input type="text" class="form-control" id="jmlwarnabox2" value="0" required>

					</div>
				</div>
			</div>
				<div class="form-group col-md-5 has-success lbr">
					<div class="input-group">
						<span class="input-group-text">Lebar Tutup</span>
						<input type="text" class="form-control" id="lbrtutupbox1" placeholder="Lebar" required>
					</div>
				</div>
		</div>
		<!-- Tarikan -->

		<div class="form-row">
				<div class="form-group col-md-12 has-danger idmesin<?= $mod; ?>">
					<div class="input-group">
						<span class="input-group-text" id="not3">Mesin</span>
						<select name="idmesin" id="idmesin" class="custom-select form-control" data-mesin="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
						</select>
					</div>
				</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6 has-danger bahan<?= $mod; ?>">
				<div class="input-group">
					<span class="input-group-text " id="not4">Bahan</span>
					<select name="bahan<?= $mod; ?>" id="bahan<?= $mod; ?>" class="custom-select form-control" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
			<div class="form-group col-md-6 has-danger idkertas">
				<div class="input-group">
					<span class="input-group-text ">Uk.plano</span>
					<select id="idkertas" name="idkertas" class="custom-select form-control">
						<option value="0">Pilih ukuran</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6 col-sm-4 col-xs-6">
				<select id="lambox1" class="custom-select form-control" data-style="btn-warning">
					<option value="0" selected>Tanpa Laminasi</option>
					<option value="1">Varnish Satu Muka</option>
					<option value="2">Varnish Bolak-balik</option>
					<option value="3">Laminating Glosy Satu Muka</option>
					<option value="4">Laminating Glosy BB</option>
					<option value="5">Laminating DOP Satu Muka</option>
					<option value="6">Laminating DOP BB</option>
					<option value="7">Laminating DOP & Glosy BB</option>
				</select>
			</div>
			<div class="form-group col-md-6 col-sm-4 col-xs-3 mt-2">
 <div class="custom-control custom-switch ml-5">
    <input type="checkbox" class="custom-control-input" id="finishing4box1">
    <label class="custom-control-label" for="finishing4box1">SpotUV</label>
  </div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-3 col-xs-3">
			<div class="custom-control custom-checkbox mt-2">
  <input class="custom-control-input" id="finishing1box1" type="checkbox">
  <label class="custom-control-label" for="finishing1box1">Poly</label>
</div>
			</div>
			<div class="col-md-9 col-xs-9">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-text">Lebar</span>
						<input type="text" class="form-control" aria-label="" id="lbrpolybox1" value="1" readonly>
						<span class="input-group-text">Tinggi</span>
						<input type="text" class="form-control" aria-label="" id="tgpolybox1" value="1" readonly>
							<span class="input-group-text">cm</span>
					</div>
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="col-md-3 col-xs-3">
<div class="custom-control custom-checkbox mt-2">
  <input class="custom-control-input" id="pond<?= $mod; ?>" type="checkbox">
  <label class="custom-control-label" for="pond<?= $mod; ?>">Mika</label>
</div>
			</div>

			<div class="col-md-9 col-xs-9">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-text">Lebar</span>
						<input type="text" class="form-control" aria-label="" id="lbrpond<?= $mod; ?>" value="0" readonly>
						<span class="input-group-text">Tinggi</span>
						<input type="text" class="form-control" aria-label="" id="tgpond<?= $mod; ?>" value="0" readonly>
						<span class="input-group-text">cm</span>
					</div>
				</div>
			</div>
		</div>
		<div class="form-row">
				<div class="form-group col-md-8 col-sm-12 has-danger ket<?=$mod;?>">
					<div class="input-group">
						<span class="input-group-text">Keterangan</span>
						<input type="text" class="form-control" id="ketbox1" placeholder="Isi dulu keterangannya">
					</div>
				</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="btn-group" role="group">
					<button type="submit" class="btn btn-warning btnon" id="cekukuranbox1">Hitung</button>
					<?php echo cNav('box1'); ?>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-12 mt-2">
				<div class="w3-light-grey">
					<div id="myBar" class="w3-green" style="height:5px;width:0"></div>
				</div>
			</div>
		</div>

		<div class="form-row text-center">
			<div class="col-md-12">
				<form action="/data/detail-hitung/" method="post" target="_blank">
					<input type="hidden" id="token" name="token">
					<input type="hidden" id="modul" name="modul">
					<div id="tablebox1"></div>
				</form>
			</div>
		</div>
		<div id="customstyle"></div>
	<?php
} //end token
else {
	header("Content-Type: application/json");
	echo json_encode(array(401 => "error"));
}
	?>