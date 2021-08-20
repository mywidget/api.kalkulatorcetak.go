<?php
if (!empty($_POST['link'])) {
	$warnabar = "#0cada5";
?>

	<div class="modal-header p-t-5 p-b-5" style="background-color:<?= $warnabar; ?>;color:#fff;">
		<h5 class="modal-title text-white" id="exampleModallabel">Cetak Kalender Dinding</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body p-2">
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Jumlah Cetak</span>
					<input type="text" class="form-control" id="jmlcetakk" value="500" placeholder="Jumlah Cetak" autofocus>
				</div>
			</div>
			<div class="form-group col-md-6 ukuran">
				<div class="input-group">
					<span class="input-group-text">Ukuran</span>
					<select name="ukurank" id="ukurank" class="custom-select form-control" required></select>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" id="lbrcetakk" placeholder="Lebar">
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control"  id="tgcetakk" placeholder="Tinggi">
					<span class="input-group-text">cm</span>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group  col-md-6">
				<div class="input-group">
					<span class="input-group-text">Jumlah Warna</span>
					<input type="text" class="form-control" id="jmlwarnak1" value="4">
					<span class="input-group-text">/</span>
					<input type="text" class="form-control" id="jmlwarnak2" value="0">
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Jumlah Lembaran</span>
					<input type="text" class="form-control" id="jmlsetk" value="1">
					<input type="hidden" id="tarikank" value="1">
					<span class="input-group-text">Lembar</span>
				</div>
			</div>
		</div>
		<div class="form-row mb-1">
			<div class="form-group col-md-12">
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
					<select name="bahan" id="bahank" class="custom-select form-control" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/kalding/0" data-valueKey="id" data-displayKey="name" required>
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
				<select id="lamk" class="custom-select form-control" data-style="btn-warning">
					<option value="0" selected>Tanpa Laminasi</option>
					<option value="1">Varnish Satu Muka</option>
					<option value="2">Varnish Bolak-balik</option>
					<option value="3">Laminating Glosy Satu Muka</option>
					<option value="4">Laminating Glosy BB</option>
					<option value="5">Laminating DOP Satu Muka</option>
					<option value="6">Laminating DOP BB</option>
				</select>
			</div>
			<div class="form-group col-md-6">
				<select name="finishing1k" id="finishing1k" class="custom-select form-control" data-source="<?= $host; ?>/api/<?= $app_id; ?>/biaya/kalender/0" data-valueKey="id" data-displayKey="name" required>
					<option value="0" selected>Tanpa Kaleng</option>
				</select>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="finishing4k">
					</span>
					<label class="form-control">SpotUv</label>
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="covkal">
					</span>
					<label class="form-control">Cover Depan</label>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12 warnacovkal">
				<div class="input-group">
					<span class="input-group-text">Jumlah Warna</span>
					<input type="text" class="form-control" id="warnacovkal1" value="1">
					<span class="input-group-text">/</span>
					<input type="text" class="form-control" id="warnacovkal2" value="0">
				</div>
			</div>
		</div>

		<div class="form-row mb-1">
			<div class="form-group col-md-6 bahancovkal">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Bahan</span>
					</div>
					<select name="bahancovkal" id="bahancovkal" class="custom-select form-control" data-sourcec="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/kalding/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
			<div class="form-group col-md-6 bahancovkal">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Uk.plano</span>
					</div>
					<select id="idkertascov" name="idkertascov" class="custom-select form-control">
						<option value="0">Pilih ukuran plano</option>
					</select>
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
			<div class="col-md-12">
				<!--div id="tablekalding"></div-->
				<form action="/data/detail-hitung/" method="post" target="_blank">
					<input type="hidden" id="token" name="token">
					<input type="hidden" id="user" name="user">
					<input type="hidden" id="modul" name="modul">
					<input type="hidden" name="data1[]" id="data1" value="">
					<input type="hidden" name="data2[]" id="data2" value="">
					<input type="hidden" name="ket" id="ket" value="">
					<input type="hidden" name="jumlahcetak" id="jumlahcetak" value="">
					<div id='tablkk' class='small'>
						<table id='tablkk' class='table table-striped'>
							<thead>
								<tr style='background-color:<?= $warnabar; ?>;color:white'>
									<th class='text-left'>Mesin</th>
									<th class='text-left'>Harga Jual</th>
									<th>Total</th>
								</tr>
							</thead>
							<tr>
								<td class='text-left'><span id="mesinc"></span></td>
								<td class='text-left'><span id="satuan"></span></td>
								<td class='text-right'><button type='submit' name='submit' value='0' class='btn btn-warning btn-sm' style='background-color:<?= $warnabar; ?>;color:white;width:120px'><span id="totjual"></span></button></td>
							</tr>
						</table>


					</div>
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