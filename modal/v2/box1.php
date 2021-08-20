<?php
if (!empty($_POST['link'])) {
?>
	<div class="modal-header bg-warning">
		<button type="button" class="close" id="bx1" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">Cetak Box 1</h4>
	</div>
	<div class="modal-body v2">
		<div class="row">
			<div class="col-md-12">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon square">Jumlah Cetak</span>
							<input type="text" class="form-control square" aria-label="" id="jmlcetakbox1" value="" autofocus>
							<span class="input-group-addon square">pcs</span>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon square">Lebar</span>
							<input type="text" class="form-control square input" id="lbrcetakbox1" placeholder="Lebar">
							<span class="input-group-addon square">Panjang</span>
							<input type="text" class="form-control square input" id="pjcetakbox1" placeholder="Panjang">
							<span class="input-group-addon square">Tinggi</span>
							<input type="text" class="form-control square input" id="tgcetakbox1" placeholder="Tinggi">
						</div>
					</div>
					</div>
				<div class="col-md-7">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon square">Jumlah Warna</span>
							<input type="text" class="form-control square" id="jmlwarnabox1" value="4">
							<span class="input-group-addon square">/</span>
							<input type="text" class="form-control square" id="jmlwarnabox2" value="0">

						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon square">Lebar Tutup</span>
							<input type="text" class="form-control square" id="lbrtutupbox1" placeholder="Lebar">
						</div>
					</div>
				</div>
				<!-- Tarikan -->
				<input type="hidden" id="bbbox1" value="1">
				<div class="col-md-12">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon square">Mesin</span>
							<select name="idmesin" id="idmesin" class="custom-select form-control square" data-mesin="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
							</select>
						</div>
					</div>

				</div>
				<div class="col-md-6">
				<div class="form-group has-danger bahan<?= $mod; ?>">
					<div class="input-group">
						<span class="input-group-addon square " id="not4">Bahan</span>
						<select name="bahan<?= $mod; ?>" id="bahan<?= $mod; ?>" class="custom-select form-control square" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
						</select>
					</div>
				</div>
				</div>
				<div class="col-md-6">
				<div class="form-group has-danger idkertas">
					<div class="input-group">
						<span class="input-group-addon square ">Uk.plano</span>
						<select id="idkertas" name="idkertas" class="custom-select form-control square">
							<option value="0">- Pilih ukuran -</option>
						</select>
					</div>
				</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<select id="lambox1" class="custom-select form-control form-control-sm square" data-style="btn-warning">
							<option value="0" selected>Tanpa Laminasi</option>
							<option value="1">Varnish </option>
							<option value="3">Laminating Glosy </option>
							<option value="5">Laminating DOP </option>
						</select>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<div class="input-group ">
							<span class="input-group-addon square">
								<input type="checkbox" id="finishing4box1">
							</span>
							<label class="form-control square">SpotUV</label>
						</div><!-- /input-group -->
					</div>

				</div>

				<div class="col-md-4">
				<div class="form-group">
					<div class="input-group ">
						<span class="input-group-addon square">
							<input type="checkbox" id="finishing1box1">
						</span>
						<label class="form-control square">Poly</label>
					</div><!-- /input-group -->
				</div>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon square">Lebar</span>
							<input type="text" class="form-control square" aria-label="" id="lbrpolybox1" value="1">
							<span class="input-group-addon square">Tinggi</span>
							<input type="text" class="form-control square" aria-label="" id="tgpolybox1" value="1">
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<div class="input-group ">
							<span class="input-group-addon square">
								<input type="checkbox" id="pond<?= $mod; ?>">
							</span>
							<label class="form-control square">Pond Mika</label>
						</div><!-- /input-group -->
					</div>
				</div>

				<div class="col-md-8">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon square">Lebar</span>
							<input type="text" class="form-control square" aria-label="" id="lbrpond<?= $mod; ?>" value="0" readonly>
							<span class="input-group-addon square">Tinggi</span>
							<input type="text" class="form-control square" aria-label="" id="tgpond<?= $mod; ?>" value="0" readonly>
							<span class="input-group-addon square">cm</span>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon square">Keterangan</span>
							<input type="text" class="form-control square ket" id="ketbox1" placeholder="Isi dulu keterangannya">
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="form-group">
					<div class="btn-group">
						<button type="submit" class="btn btn-success btnon square" id="cekukuranbox1">Hitung</button> <?php echo cNavu('box1'); ?>
						<button type="button" class="btn btn-danger  hidden-md-up" data-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="w3-light-grey">
						<div id="myBar" class="w3-green" style="height:5px;width:0"></div>
					</div>
				</div>
				<div class="col-md-12">
					<form action="data/detail-hitung/" method="post" target="_blank">
						<input type="hidden" id="token" name="token">
						<input type="hidden" id="user" name="user">
						<input type="hidden" id="modul" name="modul">
						<div id="tablebox1"></div>
					</form>
				</div>
			</div>
		</div>
		<div id="customstyle"></div>
<?php
} //end token
else {
	echo json_encode(array(401 => "error"));
}
?>