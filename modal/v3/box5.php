<?php
if (!empty($_POST['link'])) {
	$warnabar = "#f44274";
?>
	<div class="modal-header" style="background-color:<?= $warnabar; ?>;color:white;">
		<h4 class="modal-title text-white">Cetak Box 5</h4>
		<button type="button" class="close" id="bx5" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div id="printThis" class="modal-body p-2">
		<input type="hidden" id="bbbox5" value="1">
		<div class="form-row">
			<div class="form-group has-success col-md-12">
				<div class="input-group ">
					<span class="input-group-text">Jumlah Cetak</span>
					<input type="text" class="form-control" value="500" id="jmlcetakbox5" autofocus>
					<span class="input-group-text">pcs</span>
					<span class="input-group-text">&nbsp;&nbsp;</span>
				</div>
			</div>
			<div class="form-group col-md-12">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" id="lbrcetakbox5" placeholder="Lebar">
					<span class="input-group-text">Panjang</span>
					<input type="text" class="form-control" id="pjcetakbox5" placeholder="Panjang">
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" id="tgcetakbox5" placeholder="Tinggi">
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Lebar Lipatan Atas</span>
					<input type="text" class="form-control" id="llabox5" placeholder="Lebar">
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Lebar Lipatan Samping</span>
					<input type="text" class="form-control" id="llsbox5" placeholder="Lebar">
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Jml Warna</span>
					<input type="text" class="form-control" id="jmlwarnabox51" value="4">
					<span class="input-group-text">/</span>
					<input type="text" class="form-control" id="jmlwarnabox52" value="0">

				</div>
			</div>
			<div class="form-group col-md-6 has-danger idmesin<?= $mod; ?>">
				<div class="input-group">
					<div class="input-group-append">
						<span class="input-group-text" id="not3">Mesin</span>
					</div>
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
						<option value="0">- Pilih ukuran -</option>
					</select>
				</div>
			</div>


		</div>
		<div class="form-row">
			<div class="form-group col-md-7">
				<select id="lambox5" class="custom-select form-control" data-style="btn-warning">
					<option value="0" selected>Tanpa Laminasi</option>
					<option value="1">Varnish </option>
					<option value="3">Laminating Glosy </option>
					<option value="5">Laminating DOP </option>
				</select>
			</div>

			<div class="form-group col-md-5">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="finishing4box5">
					</span>
					<label class="form-control">SpotUV</label>
				</div><!-- /input-group -->

			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<div class="input-group">
					<span class="input-group-text">
						<input type="checkbox" id="finishing1box5">
					</span>
					<Label class="form-control">Poly</label>
				</div><!-- /input-group -->
			</div><!-- /input-group -->
			<div class="form-group col-md-8">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" aria-label="" id="lbrpolybox5" value="1" readonly>
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" aria-label="" id="tgpolybox5" value="1" readonly>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-4">
				<div class="form-group">
					<div class="input-group ">
						<span class="input-group-text">
							<input type="checkbox" id="pond<?= $mod; ?>">
						</span>
						<Label class="form-control">Pond Mika</label>
					</div><!-- /input-group -->
				</div>
			</div>

			<div class="col-md-8">
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
			<div class="form-group col-md-8 has-danger ket<?= $mod; ?>">
				<div class="input-group">
					<span class="input-group-text">Keterangan</span>
					<input type="text" class="form-control" aria-label="" id="ketbox5" placeholder="Isi dulu keterangannya">
				</div>
			</div>
			<div class="form-group col-md-4 hide-print">
				<div class="btn-group" role="group">
					<button type="submit" class="btn btn-warning btnon" id="cekukuranbox5">Hitung</button>
					<?php echo cNav('box5'); ?>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-12 display-hidden" id="hidemyBar">
				<div class="w3-light-grey">
					<div id="myBar" class="w3-deep-orange" style="height:5px;width:0"></div>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-12">
				<form action="detail-hitung/" method="post" target="_blank">
					<input type="hidden" id="token" name="token">
					<input type="hidden" id="user" name="user">
					<input type="hidden" id="modul" name="modul">
					<div id="tablebox5"></div>
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