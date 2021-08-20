<?php
if (!empty($_POST['link'])) {
	$warnabar = "#a07a51";
?>
	<div class="modal-header" style="background-color:<?= $warnabar; ?>;color:white;">
		<h4 class="modal-title text-white">Cetak <?= $_POST['namamod']; ?></h4>
		<button type="button" class="close" id="bx3" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div id="printThis" class="modal-body p-2">
		<div class="form-row">
			<div class="form-group has-success jml col-md-12">
				<div class="input-group">
					<span class="input-group-text">Jumlah Cetak</span>
					<input type="text" class="form-control" aria-label="" id="jmlcetakbox3" value="500" autofocus>
					<span class="input-group-text">pcs</span>
					<span class="input-group-text">&nbsp;&nbsp;</span>
				</div>
			</div>

		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" id="lbrcetakbox3" placeholder="0">
					<span class="input-group-text">Panjang</span>
					<input type="text" class="form-control" id="pjcetakbox3" placeholder="0">
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" id="tgcetakbox3" placeholder="0">
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-7">
				<div class="input-group">
					<span class="input-group-text">Jumlah Warna</span>
					<input type="text" class="form-control" id="jmlwarnabox31" value="4">
					<span class="input-group-text">/</span>
					<input type="text" class="form-control" id="jmlwarnabox32" value="0">
				</div>
			</div>

			<div class="form-group col-md-5">
				<div class="input-group">
					<span class="input-group-text">Lebar Tutup</span>
					<input type="text" class="form-control" id="lbrtutupbox3" placeholder="Lebar">
				</div>
			</div>
		</div>
		<!-- Tarikan -->
		<div class="form-row">
				<div class="form-group col-md-12 has-danger idmesin">
					<div class="input-group">
						<span class="input-group-text">Mesin</span>
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
			<div class="form-group col-md-6">
				<select id="lambox3" class="custom-select form-control" data-style="btn-warning">
					<option value="0" selected>Tanpa Laminasi</option>
					<option value="1">Varnish </option>
					<option value="3">Laminating Glosy </option>
					<option value="5">Laminating DOP </option>
				</select>
			</div>
			<div class="form-group col-md-5">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="finishing4box3">
					</span>
					<label class="form-control">SpotUV</label>
				</div><!-- /input-group -->

			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-4">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="finishing1box3">
					</span>
					<label class="form-control">Poly</label>
				</div><!-- /input-group -->
			</div>
			<div class="form-group col-md-8">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" aria-label="" id="lbrpolybox3" value="1" readonly>
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" aria-label="" id="tgpolybox3" value="1" readonly>
					<span class="input-group-text">cm</span>
				</div>
			</div>
		</div>
		<div class="form-row">
				<div class="form-group col-md-4">
					<div class="input-group ">
						<span class="input-group-text">
							<input type="checkbox" id="pond<?= $mod; ?>">
						</span>
						<label class="form-control">Pond Mika</label>
					</div><!-- /input-group -->
				</div>
				<div class="form-group col-md-8">
					<div class="input-group">
						<span class="input-group-text">Lebar</span>
						<input type="text" class="form-control" aria-label="" id="lbrpond<?= $mod; ?>" value="0" readonly>
						<span class="input-group-text">Tinggi</span>
						<input type="text" class="form-control" aria-label="" id="tgpond<?= $mod; ?>" value="0" readonly>
						<span class="input-group-text">cm</span>
					</div>
				</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-8 has-danger ket<?= $mod; ?>">
				<div class="input-group">
					<span class="input-group-text">Keterangan</span>
					<input type="text" class="form-control" aria-label="" id="ketbox3" placeholder="Isi dulu keterangannya">
				</div>
			</div>
			<div class="form-group col-md-4">
				<div class="btn-group" role="group">
					<button type="submit" class="btn btn-warning btnon hint--top-left" aria-label='Hitung' id="cekukuranbox3">Hitung</button>
					<?php echo cNav('box3'); ?>
				</div>

			</div>
		</div>
		<!--progress-->
		<div class="form-row mt-2">
			<div class="form-group col-md-12">
				<div class="w3-light-grey">
					<div id="myBar" class="w3-deep-orange" style="height:5px;width:0"></div>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-12">
				<form action="detail-hitung/" method="post" target="_blank">
					<input type="hidden" id="bbbox3" value="1">
					<input type="hidden" id="token" name="token">
					<input type="hidden" id="user" name="user">
					<input type="hidden" id="modul" name="modul">
					<div id="tablebox3"></div>
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