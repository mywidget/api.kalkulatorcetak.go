<?php
	if (!empty($_POST['link'])) {
	?>
	<div class="modal-header" style="background-color:<?= $warna; ?>;color:#f7f7f7;">
		<h4 class="modal-title text-white">Hitung <?= $namamod; ?></h4>
		<button type="button" class="close" id="bx3" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div id="printThis" class="modal-body p-2">
		<div class="form-row">
			<div class="form-group jml col-md-12">
				<div class="input-group">
					<div class="input-group-append">
						<span class="input-group-text">Jumlah Cetak</span>
					</div>
					<select name="jmlcetaks" id="jmlcetaks<?=$mod;?>" class="custom-select form-control">
						<option value="500">500</option>
						<option value="1000">1000</option>
						<option value="1500">1500</option>
						<option value="2000">2000</option>
						<option value="2500">2500</option>
						<option value="">Custom</option>
					</select>
					<input type="text" class="form-control" value="500" id="jmlcetakbox3">
					<div class="input-group-append">
						<span class="input-group-text">pcs</span>
					</div>
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
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text " id="not4">Mesin</span>
					<select name="pilih<?= $mod; ?>" id="pilih<?= $mod; ?>" class="custom-select form-control" required>
						<option value="1">Otomatis</option>
						<option value="2">Manual</option>
					</select>
				</div>
			</div>
			<div class="form-group col-md-6 idmesin">
				<div class="input-group">
					<span class="input-group-text">Mesin</span>
					<select name="idmesin" id="idmesin" class="custom-select form-control" data-mesin="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text " id="not4">Pisau Pond</span>
					<select name="pilihpond" id="pilihpond" class="custom-select form-control" required>
						<option value="13">Mudah</option>
						<option value="105">Sedang</option>
						<option value="106">Sulit</option>
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
			<div class="form-group col-md-6 bahan<?= $mod; ?>">
				<div class="input-group">
					<span class="input-group-text " id="not4">Bahan</span>
					<select name="bahan<?= $mod; ?>" id="bahan<?= $mod; ?>" class="custom-select form-control" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
			<div class="form-group col-md-6 idkertas">
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
			<div class="form-group col-md-12 ket<?= $mod; ?>">
				<div class="input-group">
					<span class="input-group-text">Keterangan</span>
					<input type="text" class="form-control" aria-label="" id="ketbox3" placeholder="Isi dulu keterangannya">
				<div class="input-group-append">
					<button type="submit" class="btn btn-warning btnon hint--top-left" aria-label='Hitung' id="cekukuranbox3">Hitung</button>
					<?php echo cNav('box3'); ?>
				</div>
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
				<form action="/data/detail-hitung/" method="post" target="_blank">
					<input type="hidden" id="bbbox3" value="1">
					<input type="hidden" id="token" name="token">
					<input type="hidden" id="user" name="user">
					<input type="hidden" id="modul" name="modul">
					<div id="tablebox3"></div>
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