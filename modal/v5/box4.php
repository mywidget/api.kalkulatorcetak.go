<?php
if (!empty($_POST['link'])) {
?>
	<div class="modal-header" style="background-color:<?= $warna; ?>;color:#f7f7f7;">
		<h4 class="modal-title text-white">Hitung <?= $namamod; ?></h4>
		<button type="button" class="close" id="bx4" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div class="modal-body p-2">
		<div class="form-row">
			<div class="form-group has-success col-md-12">
				<div class="input-group">
					<span class="input-group-text">Jumlah Cetak</span>
					<input type="text" class="form-control" aria-label="" id="jmlcetakbox4" value="500" autofocus>
					<span class="input-group-text">pcs</span>
					<span class="input-group-text">&nbsp;&nbsp;</span>
				</div>
			</div>
			<div class="form-group col-md-12">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control input" id="lbrcetakbox4" placeholder="Lebar">
					<span class="input-group-text">Panjang</span>
					<input type="text" class="form-control input" id="pjcetakbox4" placeholder="Panjang">
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control input" id="tgcetakbox4" placeholder="Tinggi">
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Lebar Lipatan</span>
					<input type="text" class="form-control" id="lbrtutupbox4" placeholder="Lebar">
				</div>
			</div>

			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Lebar Dimensi</span>
					<input type="text" class="form-control" id="lbrdimensi4" placeholder="Lebar Dimensi">
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Jumlah Warna</span>
					<input type="text" class="form-control" id="jmlwarnabox41" value="4">
					<span class="input-group-text">/</span>
					<input type="text" class="form-control" id="jmlwarnabox42" value="0">
				</div>
			</div>
			
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text " id="not4">Mesin</span>
					<select name="pilih<?= $mod; ?>" id="pilih<?= $mod; ?>" class="custom-select form-control" required>
					<option value="1">Otomatis</option>
					<option value="2">Manual</option>
					</select>
				</div>
			</div>

		</div>
		<div class="form-row">
		<div class="form-group has-danger col-md-6 idmesin<?= $mod; ?>">
				<div class="input-group">
					<span class="input-group-text" id="not3">Mesin</span>
					<select name="idmesin" id="idmesin" class="custom-select form-control" data-mesin="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
					</select>
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
		<div class="form-group col-md-5">
				<div class="input-group">
					<span class="input-group-text " id="not4">Pisau Pond</span>
					<select name="pilihpond" id="pilihpond" class="custom-select form-control" required>
					<option value="13">Mudah</option>
					<option value="105">Sedang</option>
					<option value="106">Sulit</option>
					</select>
				</div>
			</div>
			<div class="form-group col-md-4">
				<select id="lambox4" class="custom-select selectpicker form-control" data-style="btn-warning">
					<option value="0" selected>Tanpa Laminasi</option>
					<option value="1">Varnish </option>
					<option value="3">Laminating Glosy </option>
					<option value="5">Laminating DOP </option>
				</select>
			</div>

			<div class="form-group col-md-3">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="finishing4box4">
					</span>
					<Label class="form-control">SpotUV</label>
				</div><!-- /input-group -->
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="finishing1box4">
					</span>
					<Label class="form-control">Poly</label>
				</div><!-- /input-group -->
			</div>

			<div class="form-group col-md-8">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" aria-label="" id="lbrpolybox4" value="1" readonly>
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" aria-label="" id="tgpolybox4" value="1" readonly>
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
			<div class="form-group col-md-12">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="tutupboxbawah1" checked>
					</span>
					<Label class="form-control">Tutup Bawah tidak di cetak hanya di pond</label>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group gabungcetakbox4 ">
					<span class="input-group-text">
						<input type="checkbox" id="gabungcetakbox4" checked>
					</span>
					<Label class="form-control">Box atas dan bawah digabung cetaknya</label>
				</div>
			</div>
		</div>

		<div class="tutupbawah">
			<label>Tutup Bawah</label>
			<div class="form-row">
				<div class="form-group col-md-6">
					<div class="input-group">
						<span class="input-group-text">Jml Warna</span>
						<input type="text" class="form-control" aria-label="" id="jmlwarnabawahbox41" value="4">
						<span class="input-group-text">/</span>
						<input type="text" class="form-control" aria-label="" id="jmlwarnabawahbox42" value="0">
					</div>
				</div>
				<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text " id="not4">Plano</span>
					<select name="pilihbb<?= $mod; ?>" id="pilihbb<?= $mod; ?>" class="custom-select form-control" required>
					<option value="1">Otomatis</option>
					<option value="2">Manual</option>
					</select>
				</div>
			</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 has-danger bahanbawah<?= $mod; ?>">
					<div class="input-group">
						<span class="input-group-text " id="not4">Bahan</span>
						<select name="bahanbawah<?= $mod; ?>" id="bahanbawah<?= $mod; ?>" class="custom-select form-control" data-bawah="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKeys="id" data-displayKeys="name" required>
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
				<div class="form-group col-md-6">
					<select id="lambawah<?= $mod; ?>" class="custom-select form-control" data-style="btn-warning">
						<option value="0" selected>Tanpa Laminasi</option>
						<option value="1">Varnish Satu Muka</option>
						<option value="3">Laminating Glosy Satu Muka</option>
						<option value="5">Laminating DOP Satu Muka</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<div class="input-group ">
						<span class="input-group-text">
							<input type="checkbox" id="finishing4bawah<?= $mod; ?>">
						</span>
						<Label class="form-control">SpotUV</label>
					</div><!-- /input-group -->
				</div>
				<div class="form-group col-md-4">
					<div class="input-group ">
						<span class="input-group-text">
							<input type="checkbox" id="finishing1bawah<?= $mod; ?>">
						</span>
						<Label class="form-control">Poly</label>
					</div><!-- /input-group -->
				</div>
				<div class="form-group col-md-8">
					<div class="input-group">
						<span class="input-group-text">Lebar</span>
						<input type="text" class="form-control" aria-label="" id="lbrpolybawah<?= $mod; ?>" value="1">
						<span class="input-group-text">Tinggi</span>
						<input type="text" class="form-control" aria-label="" id="tgpolybawah<?= $mod; ?>" value="1">
					</div>
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-8 has-danger ket<?= $mod; ?>">
				<div class="input-group">
					<span class="input-group-text">Keterangan</span>
					<input type="text" class="form-control" aria-label="" id="ket<?= $mod; ?>" placeholder="Isi dulu keterangannya">
				</div>
			</div>
			<div class="col-md-4">
				<div class="btn-group" role="group">
					<button type="submit" class="btn btn-warning btnon" id="cekukuranbox4">Hitung</button>
					<?php echo cNav($mod); ?>
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
					<div id="table<?= $mod; ?>"></div>
					<div id="table_box"></div>
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