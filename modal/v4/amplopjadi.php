<?php
	if (!empty($_POST['link'])) {
	?>
	<div class="modal-header" style="background-color:<?= $warna; ?>;color:#f7f7f7;">
		<h4 class="modal-title">Hitung Amplpop Jadi</h4>
		<button type="button" class="close" id="bu" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div class="modal-body p-2">
		<div class="form-row">
            <div class="form-group col-md-12">
				<div class="input-group">
					<span class="input-group-text">Jumlah Cetak</span>
					<input type="text" class="form-control" aria-label="" id="jmlcetakam2" autofocus>
					<span class="input-group-text">box (Isi 100lbr)</span>
				</div>
			</div>
		</div>
		
		
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Bahan & Ukuran</span>
					</div>
					<select name="bahanam2" id="bahanam2" class="custom-select form-control" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
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
				<div class="form-group col-md-8">
					<div class="input-group">
						<span class="input-group-text">Lebar</span>
						<input type="text" class="form-control" aria-label="" id="lbrcetakam2" readonly='readonly'>
						<span class="input-group-text">Tinggi</span>
						<input type="text" class="form-control" aria-label="" id="tgcetakam2" readonly='readonly'>
					</div>
				</div>
				
				<div class="form-group col-md-4">
					<div class="input-group">
						<span class="input-group-text">Jumlah Warna</span>
						<input type="text" class="form-control" aria-label="" id="jmlwarnaam2" value="4">
					</div>
				</div>
			</div>
			<div class="form-row">
				
				
				<div class="form-group col-md-6">
					<div class="input-group ">
						<span class="input-group-text">
							<input type="checkbox" id="finishing1am2">
						</span>
						<Label class="form-control pt-2">Poly</label>											 
					</div>
					<!-- /input-group -->
				</div>
				<div class="form-group col-md-6">
					<div class="input-group">
						<span class="input-group-text">Lebar</span>
						<input type="text" class="form-control" aria-label="" id="lbrpolyam2" value="1" readonly>
						<span class="input-group-text">Tinggi</span>
						<input type="text" class="form-control" aria-label="" id="tgpolyam2" value="1" readonly>
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
					<button type="submit" class="btn btn-primary btnon" onclick="cekukuranam2(1)">Hitung</button>
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
					<form action='/data/detail-hitung/' method='post' target='_blank'>
						<input type="hidden" id="modul">
						<div id="tableamp2"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<div id="customstyle"></div>
<?php
}//end token
else{
	echo json_encode(array(404 => "error"));
}
?>