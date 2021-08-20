<?php
if (!empty($_POST['link'])) {
?>
	<div class="modal-header" style="background-color:<?= $warna; ?>">
		<h4 class="modal-title text-white mb-2">Cetak Box 6</h4>
		<button type="button" class="close" id="bx6" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div id="printThis" class="modal-body p-2">
		<div class="form-row">
			<div class="form-group col-md-12 has-success jml">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" id="not1">Jumlah Cetak</span>
					</div>
					<input type="text" class="form-control" id="jmlcetakbox6" value="500" placeholder="Jumlah harus diisi" autofocus>
					<div class="input-group-append">
						<span class="input-group-text">pcs</span>
					</div>
					<div class="input-group-append">
						<span class="input-group-text">&nbsp;&nbsp;</span>
					</div>
				</div>
			</div>
			<div class="form-group col-md-6 has-success lbrcetakbox6">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" id="lbrcetakbox6" placeholder="Lebar">
				</div>
			</div>
			<div class="form-group col-md-6 has-success pjcetakbox6">
				<div class="input-group">
					<span class="input-group-text">Panjang</span>
					<input type="text" class="form-control" id="pjcetakbox6" placeholder="Panjang">
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Tinggi Tutup Atas</span>
					<input type="text" class="form-control" id="tgtutupatasbox6">

				</div>
			</div>

			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Tinggi Tutup Bawah</span>
					<input type="text" class="form-control" id="tgtutupbawahbox6">
				</div>
			</div>
		</div>



		<div class="form-row">
			<div class="form-group col-md-7">
				<div class="input-group">
					<span class="input-group-text">Jml. Warna</span>
					<input type="text" class="form-control" id="jmlwarnabox61" value="4">
					<span class="input-group-text">/</span>
					<input type="text" class="form-control" id="jmlwarnabox62" value="0">

				</div>
			</div>
			<div class="form-group col-md-5 has-danger idmesin">
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
			<div class="form-group col-md-6 has-danger bahanbox6">
				<div class="input-group">
					<span class="input-group-text " id="not4">Bahan</span>
					<select name="bahanbox6" id="bahanbox6" class="custom-select form-control" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
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
			<div class="form-group col-md-8">
				<select id="lambox6" class="custom-select form-control">
					<option value="0" selected>Tanpa Laminasi</option>
					<option value="1">Varnish </option>
					<option value="3">Laminating Glosy </option>
					<option value="5">Laminating DOP </option>
				</select>
			</div>

			<div class="form-group col-md-4">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="finishing4box6">
					</span>
					<Label class="form-control">SpotUV</label>
				</div><!-- /input-group -->
			</div><!-- /input-group -->

		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="finishing1box6">
					</span>
					<Label class="form-control">Poly</label>
				</div><!-- /input-group -->
			</div>
			<div class="form-group col-md-8">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" id="lbrpolybox6" value="1">
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" id="tgpolybox6" value="1">
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="tutupboxbawahbox6" checked>
					</span>
					<Label class="form-control">Tutup Bawah tidak di cetak hanya di pond</label>
				</div>
			</div>
			<div class="form-group col-md-12">
				<div class="input-group gabungcetakbox6">
					<span class="input-group-text">
						<input type="checkbox" id="gabungcetakbox6" checked>
					</span>
					<Label class="form-control">Box atas dan bawah digabung cetaknya</label>
				</div><!-- /input-group -->
			</div><!-- /input-group -->
		</div><!-- /input-group -->
		<div class="tutupbawah">
			<label>Tutup Bawah</label>
			<div class="form-row">
				<div class="form-group col-md-6">
					<div class="input-group">
						<span class="input-group-text">Jml Warna</span>
						<input type="text" class="form-control input" id="jmlwarnabawahbox61" value="4">
						<span class="input-group-text">/</span>
						<input type="text" class="form-control input" id="jmlwarnabawahbox62" value="0">
					</div>
				</div>

				<div class="form-group col-md-6">
					<select id="lambawahbox6" class="form-control custom-select">
						<option value="0" selected>Tanpa Laminasi</option>
						<option value="1">Varnish Satu Muka</option>
						<option value="3">Laminating Glosy Satu Muka</option>
						<option value="5">Laminating DOP Satu Muka</option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 has-danger bahanbawahbox6">
					<div class="input-group">
						<span class="input-group-text " id="not4">Bahan</span>
						<select name="bahanbawahbox6" id="bahanbawahbox6" class="custom-select form-control" data-bawah="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKeys="id" data-displayKeys="name" required>
						</select>
					</div>
				</div>
				<div class="form-group col-md-6 has-danger idkertasb">
					<div class="input-group">
						<span class="input-group-text ">Uk.plano</span>
						<select id="idkertasb" name="idkertasb" class="custom-select form-control">
							<option value="0">- Pilih ukuran -</option>
						</select>
					</div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6 has-danger idmesin">
					<div class="input-group">
						<div class="input-group-append">
							<span class="input-group-text " id="not3">Mesin</span>
						</div>
						<select name="idmesinb" id="idmesinb" class="custom-select form-control" data-mesinb="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKeys="id" data-displayKeys="name" required>
						</select>
					</div>
				</div>
				<div class="form-group col-md-6">
					<div class="input-group ">
						<span class="input-group-text">
							<input type="checkbox" id="finishing4bawahbox6">
						</span>
						<Label class="form-control">SpotUV</label>
					</div><!-- /input-group -->
				</div>
			</div>

			<div class="form-row">

				<div class="form-group col-md-4">
					<div class="input-group ">
						<span class="input-group-text">
							<input type="checkbox" id="finishing1bawahbox6">
						</span>
						<Label class="form-control">Poly</label>
					</div><!-- /input-group -->
				</div>

				<div class="form-group col-md-8">
					<div class="input-group">
						<span class="input-group-text">Lebar</span>
						<input type="text" class="form-control" id="lbrpolybawahbox6" value="1">
						<span class="input-group-text">Tinggi</span>
						<input type="text" class="form-control" id="tgpolybawahbox6" value="1">
					</div>
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-8 has-danger ket<?= $mod; ?>">
				<div class="input-group">
					<div class="input-group-append">
						<span class="input-group-text">Keterangan</span>
					</div>
					<input type="text" class="form-control" id="ketbox6" placeholder="Isi dulu keterangannya">
				</div>
			</div>

			<div class="form-group col-md-4 p-0">
				<div class="btn-group" role="group">
					<button type="submit" class="btn btn-primary btnon cekukuranbox6" id="cekukuran<?= $mod; ?>">Hitung</button>
					<?php echo cNav('box6'); ?>
				</div>
			</div>
		</div>
		<div class="form-row text-center mt-2">
			<div class="col-md-12">
				<div class="w3-light-grey">
					<div id="myBar" class="w3-deep-orange" style="height:5px;width:0"></div>
				</div>
			</div>
		</div>
		<div class="form-row text-center mt-2">
			<div class="col-md-12">
				<input type="hidden" id="bbbox6" value="1">
				<form action="/data/detail-hitung/" method="post" target="_blank">
					<input type="hidden" id="modul" name="modul">
					<div id="app_<?= $mod; ?>"></div>
				</form>
			</div>
		</div>
	</div>

	<div id="customstyle"></div>
<?php
	// include "js/poster.php";
} //end token
else {
	echo json_encode(array(404 => "error"));
}
?>