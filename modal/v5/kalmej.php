<?php
if (!empty($_POST['link'])) {
	$warnabar = "#704e34";
?>
	<div class="modal-header" style="background-color:<?= $warna; ?>;color:#f7f7f7;">
		<h4 class="modal-title text-white">Hitung <?= $namamod; ?></h4>
		<button type="button" class="close" id="km" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div class="modal-body p-2">
		<div class="form-row">
			<div class="form-group col-md-5">
				<div class="input-group">
					<span class="input-group-text">Jumlah Cetak</span>
					<input type="text" class="form-control" id="jmlcetakkm" placeholder="1000" value="500" autofocus>

				</div>
			</div>
			<div class="form-group col-md-7 ukuran">
				<div class="input-group">
					<span class="input-group-text">Ukuran</span>
					<select name="ukurankm" id="ukurankm" class="custom-select form-control" required></select>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-8">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" id="lbrcetakkm" placeholder="Lebar">
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" id="tgcetakkm" placeholder="Tinggi">
					<span class="input-group-text">cm</span>
				</div>
			</div>
			<div class="form-group col-md-4">
				<div class="input-group">
					<span class="input-group-text">Bleed</span>
					<input type="text" class="form-control" id="bleedkk" value="0.4" placeholder="Bleed">
					<span class="input-group-text">cm</span>
				</div>
			</div>
		</div>



		<div style="font-size:13px; height:20px; padding:3px 10px;">Isi Kalender Meja</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Jml. Warna</span>
					<input type="text" class="form-control" id="jmlwarnakm" value="4">
					<span class="input-group-text">/</span>
					<input type="text" class="form-control" aria-label="" id="jmlwarnakm2" value="4">
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Jml. Lembaran</span>
					<input type="text" class="form-control" id="jmlsetkm" value="6">
					<span class="input-group-text">Lembar</span>
				</div>
			</div>
		</div>
		<!-- mesin -->
		<div class="form-row mb-1">
			<div class="form-group col-md-6">
				<select id="lamkm" class="custom-select form-control" data-style="btn-warning">
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
				<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text " id="not4">Mesin</span>
					</div>
					<select name="pilih<?= $mod; ?>" id="pilih<?= $mod; ?>" class="custom-select form-control" required>
					<option value="1">Otomatis</option>
					<option value="2">Manual</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-row mb-1">
		<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Mesin</span>
					</div>
					<select name="idmesin" id="idmesin" class="custom-select form-control" data-mesin="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text " id="not4">Plano</span>
					</div>
					<select name="pilihb<?= $mod; ?>" id="pilihb<?= $mod; ?>" class="custom-select form-control" required>
					<option value="1">Otomatis</option>
					<option value="2">Manual</option>
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
					<select name="bahankm" id="bahankm" class="custom-select form-control" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/kalding/0" data-valueKey="id" data-displayKey="name" required>
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


		<div class="form-row mb-1">
			<div class="form-group col-md-3">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="finishing4km">
					</span>
					<label class="form-control">SpotUv</label>
				</div>
			</div>

			<div class="form-group col-md-3">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="finishing1kalmej">
					</span>
					<label class="form-control">Poly</label>
				</div><!-- /input-group -->
			</div>

			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Lebar poly</span>
					<input type="text" class="form-control" aria-label="" id="lbrpolykalmej" value="1">
					<span class="input-group-text">x</span>
					<input type="text" class="form-control" aria-label="" id="tgpolykalmej" value="1">
				</div>
			</div>
		</div>


		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="botkalmej">
					</span>
					<label class="form-control">Centang Dudukan Pakai Hard Bot</label>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-5 bahanbotkalmej">
				<div class="input-group">
					<span class="input-group-text">Jenis Bot</span>
					<select name="bahanbotkalmej" id="bahanbotkalmej" class="custom-select form-control" required></select>
				</div>
			</div>

			<div class="form-group col-md-7 kertaspenutup">
				<div class="input-group">
					<span class="input-group-text">Kertas Penutup Bot</span>
					<select name="kertaspenutup" id="kertaspenutup" class="custom-select form-control" required></select>
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6 jmlcetakpenutupbot">
				<div class="input-group">
					<span class="input-group-text">Cetak Berapa Warna</span>
					<input type="text" class="form-control" id="jmlcetakpenutupbot" value="0">
				</div>
			</div>
			<div class="form-group col-md-6 lampenutupbot">
				<select id="lampenutupbot" class="custom-select form-control" data-style="btn-warning">
					<option value="0" selected>Tanpa Laminasi</option>
					<option value="3">Laminating Glosy</option>
					<option value="5">Laminating DOP</option>
				</select>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12 ukurandudukan">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="ukurandudukan">
					</span>
					<label class="form-control">Centang Jika Ukuran Dudukan Beda</label>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12 ukurandudukankm">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" id="lbrcetakdudukankm" placeholder="Lebar">
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" id="tgcetakdudukankm" placeholder="Tinggi">
					<span class="input-group-text">Lebar Bawah</span>
					<input type="text" class="form-control" id="lebarbawahkm" placeholder="Lebar Bawah">
					<span class="input-group-text lemkm">Lem</span>
					<input type="text" class="form-control lemkm" id="lemkm" placeholder="Lem">
					<span class="input-group-text">cm</span>
				</div>
			</div>
		</div>


		<div class="form-row">
			<div class="form-group col-md-12 kertasdudukan">
				<div class="input-group">
					<span class="input-group-text">Jenis Kertas untuk Dudukan</span>
					<select name="kertasdudukan" id="kertasdudukan" class="custom-select form-control" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/kalmej/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12 warnadudukan">
				<div class="input-group">
					<span class="input-group-text">Dicetak berapa Warna</span>
					<input type="text" class="form-control" id="warnadudukan" value="0">
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="boxkm">
					</span>
					<label class="form-control">Dikemas dalam Amplop</label>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6 lebihukuranamplop">
				<div class="input-group">
					<span class="input-group-text">Lebihkan ukuran</span>
					<input type="text" class="form-control" id="lebihukuranamplop" value="3">
					<span class="input-group-text">cm</span>
				</div>
			</div>

			<div class="form-group col-md-6 warnaboxkm">
				<div class="input-group">
					<span class="input-group-text">Jumlah Warna</span>
					<input type="text" class="form-control" id="warnaboxkm" value="0">
				</div>
			</div>

		</div>
		<div class="form-row mb-1">
			<div class="form-group col-md-6 bahanboxkm">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Bahan</span>
					</div>
					<select name="bahanboxkm" id="bahanboxkm" class="custom-select form-control" data-amplop="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/kalding/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
			<div class="form-group col-md-6 bahanboxkm">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Uk.plano</span>
					</div>
					<select id="idkertasboxkm" name="idkertasboxkm" class="custom-select form-control">
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
				<div class="form-group">
					<div id="tablekalmej">
						<form action="/data/detail-hitung/" method="post" target="_blank">
							<input type="hidden" id="token" name="token">
							<input type="hidden" id="user" name="user">
							<input type="hidden" id="modul" name="modul">
							<input type="hidden" name="data1[]" id="data1" value="">
							<input type="hidden" name="data2[]" id="data2" value="">
							<input type="hidden" name="data3[]" id="data3" value="">
							<input type="hidden" name="data4[]" id="data4" value="">
							<input type="hidden" name="data5[]" id="data5" value="">
							<input type="hidden" name="ket" id="ket" value="">
							<input type="hidden" name="jumlahcetak" id="jumlahcetak" value="">

							<div id='tablkm' class='small p-0'>
								<table id='tablkm' class='table table-striped'>
									<thead>
										<tr style='background-color:<?= $warnabar; ?>;color:white'>
											<th class='text-left'>Harga Jual</th>
											<th></th>
										</tr>
									</thead>

									<tr>
										<td class='text-left'> <span id="satuan"></span></td>
										<td class='text-right'><button type='submit' name='submit' value='0' class='btn btn-warning btn-sm' style='background-color:<?= $warnabar; ?>;color:white;width:120px' onclick="this.form.submit()"><span id="totjual"></span></button></td>
									</tr>
								</table>


							</div>


						</form>


					</div>
				</div>
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