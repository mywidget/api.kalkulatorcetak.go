<?php
if (!empty($_POST['link'])) {
?>
	<div class="modal-header" style="background-color:<?= $warna; ?>;color:#f7f7f7;">
		<h4 class="modal-title">Cetak Agenda</h4>
		<button type="button" class="close" id="bu" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div class="modal-body p-2">
		<div class="card p-0 mb-0">
			<div class="form-row">
				<div class="form-group col-md-6">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text bg-warning text-white">Jumlah Cetak</span>
						</div>
						<input type="text" class="form-control" id="jmlcetakag" autofocus>
						<div class="input-group-append">
							<span class="input-group-text">agenda</span>
						</div>
					</div>
				</div>
				<div class="form-group col-md-6 ukuranbu">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text bg-warning text-white">Ukuran Cetak</span>
						</div>
						<select name="ukuranbu" id="ukuranbu" class="custom-select form-control" required>
						</select>
					</div>
				</div>
			</div>
			
			<div class="form-row">
				<div class="col-md-12">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Lebar</span>
						</div>
						<input type="text" class="form-control" id="lbrcetakbu">
						<div class="input-group-append">
							<span class="input-group-text">Tinggi</span>
						</div>
						<input type="text" class="form-control" id="tgcetakbu">
						<div class="input-group-append">
							<span class="input-group-text">cm</span>
						</div>
						<div class="input-group-prepend">
							<span class="input-group-text">Bleed</span>
						</div>
						<input type="text" class="form-control" id="bleedbu1" value="0.4">
					</div>
				</div>
			</div>
		</div>
		<!-- isi1 -->
		<div class="card p-0 mb-0">
			<div class="card-header p-0 ">
				<h6 class="mb-0 ml-2 p-0"><a data-toggle="collapse" href="#" id="more" class="ni ni-bold-down text-warning"> Isi agenda 1 </a></h6>
			</div>
			<div class="card-body collapse show p-0">
				<div class="card-block isi1">
					<div class="form-row">
						<div class="form-group col-md-4">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Jml Warna</span>
								</div>
								<input type="text" class="form-control" id="jmlwarnabu1" value="1">
								<div class="input-group-prepend">
									<span class="input-group-text">/</span>
								</div>
								<input type="text" class="form-control" id="jmlwarnabu12" value="1">
							</div>
						</div>
						<div class="form-group col-md-4">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Jml Halaman</span>
								</div>
								<input type="text" class="form-control" id="jmlhalbu1" value="100">
							</div>
						</div>
						<div class="form-group col-md-4">
							<div class="input-group">
								<select id="lambu1" class="custom-select form-control" data-style="btn-warning">
									<option value="0" selected>Tanpa Laminasi</option>
									<option value="1">Varnish Satu Muka</option>
									<option value="2">Varnish Bolak-balik</option>
									<option value="3">Laminating Glosy Satu Muka</option>
									<option value="4">Laminating Glosy BB</option>
									<option value="5">Laminating DOP Satu Muka</option>
									<option value="6">Laminating DOP BB</option>
								</select>
							</div>
						</div>
					</div>
					
					<div class="form-row">
						<div class="form-group col-md-4 has-danger idmesin">
							<div class="input-group">
								<div class="input-group-append">
									<span class="input-group-text" id="not3">Mesin 1</span>
								</div>
								<select name="j_mesin1" id="j_mesin1" class="custom-select form-control" data-mesin="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
								</select>
							</div>
						</div>
						<div class="form-group col-md-4">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Bahan</span>
								</div>
								<select name="bahan" id="bahanbu1" class="custom-select form-control" data-bahanbu1="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
								</select>
							</div>
						</div>
						<div class="form-group col-md-4">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Uk.plano</span>
								</div>
								<select id="idkertasbu1" name="idkertasbu1" class="custom-select form-control">
									<option value="0">Pilih ukuran plano</option>
								</select>
							</div>
						</div>
						
					</div>
					<div class="form-row">
						
						<div class="form-group col-md-6">
							<div class="custom-control custom-checkbox mb-2">
								<input class="custom-control-input" id="isisama1" type="checkbox">
								<label class="custom-control-label" for="isisama1">Isi Sama seperti buku tulis</label>
							</div>
						</div>
						<div class="form-group col-md-6">
							<div class="custom-control custom-checkbox mb-2">
								<input class="custom-control-input" id="minioffsetisi1" type="checkbox">
								<label class="custom-control-label" for="minioffsetisi1">Mesin Minioffset</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- isi1  end -->
		
		<div class="card p-0 mb-0">
			<div class="card-header p-0">
				<h6 class="mb-0 ml-2 p-0"><a data-toggle="collapse" href="#" id="more2" class="ni ni-bold-down text-warning"> Isi agenda 2 </a></h6>
			</div>
			<div class="card-body p-0 isi2">
				<div class="card-block">
					<div class="form-row">
						<div class="form-group col-md-4">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Jml Warna</span>
								</div>
								<input type="text" class="form-control" id="jmlwarnabu2" value="0">
								<div class="input-group-prepend">
									<span class="input-group-text">/</span>
								</div>
								<input type="text" class="form-control" id="jmlwarnabu22" value="0">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-text">Jml Halaman</span>
									<input type="text" class="form-control" id="jmlhalbu2" value="0">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<select id="lambu2" class="custom-select form-control" data-style="btn-warning">
									<option value="0" selected>Tanpa Laminasi</option>
									<option value="1">Varnish Satu Muka</option>
									<option value="2">Varnish Bolak-balik</option>
									<option value="3">Laminating Glosy Satu Muka</option>
									<option value="4">Laminating Glosy BB</option>
									<option value="5">Laminating DOP Satu Muka</option>
									<option value="6">Laminating DOP BB</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-4">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text bg-warning text-white">Mesin 2</span>
									</div>
									<select name="j_mesin2" id="j_mesin2" class="custom-select form-control" data-mesin2="<?= $host; ?>/api/<?= $app_id; ?>/mesin/agenda/0" data-valueKey="id" data-displayKey="name" required>
									</select>
									
								</div>
							</div>
						</div>
						<div class="form-group col-md-4">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Bahan</span>
								</div>
								<select name="bahanbu2" id="bahanbu2" class="custom-select form-control" data-bahanbu2="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
								</select>
							</div>
						</div>
						<div class="form-group col-md-4">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Uk.plano</span>
								</div>
								<select id="idkertasbu2" name="idkertasbu2" class="custom-select form-control">
									<option value="0">Pilih ukuran plano</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-7">
							<div class="form-group">
								<div class="input-group ">
									<span class="input-group-text">
										<input type="checkbox" id="isisama2">
									</span>
									<Label class="form-control">Isi Sama seperti buku tulis</label>
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<div class="input-group ">
									<span class="input-group-text">
										<input type="checkbox" id="minioffsetisi2">
									</span>
									<Label class="form-control">Mesin Minioffset</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="card p-0 mb-0">
			<div class="card-header p-0">
				<h6 class="mb-0 ml-2 p-0"><a data-toggle="collapse" href="#" id="more3" class="ni ni-bold-down text-warning"> Isi agenda 3</a></h6>
			</div>
			<div class="card-body p-0 isi3">
				<div class="card-block ">
					<div class="form-row">
						
						<div class="form-group col-md-6">
							<div class="input-group">
								<span class="input-group-text">Jml Warna</span>
								<input type="text" class="form-control" id="jmlwarnabu3" value="0">
								<span class="input-group-text">/</span>
								<input type="text" class="form-control" id="jmlwarnabu32" value="0">
								
							</div>
						</div>
						
						<div class="form-group col-md-3">
							<div class="input-group">
								<span class="input-group-text">Jml Halaman</span>
								<input type="text" class="form-control" id="jmlhalbu3" value="0">
							</div>
						</div>
						<div class="form-group col-md-3">
							<select id="lambu3" class="custom-select form-control" data-style="btn-warning">
								<option value="0" selected>Tanpa Laminasi</option>
								<option value="1">Varnish Satu Muka</option>
								<option value="2">Varnish Bolak-balik</option>
								<option value="3">Laminating Glosy Satu Muka</option>
								<option value="4">Laminating Glosy BB</option>
								<option value="5">Laminating DOP Satu Muka</option>
								<option value="6">Laminating DOP BB</option>
							</select>
							
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-4">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text bg-warning text-white">Mesin 3</span>
									</div>
									<select name="j_mesin3" id="j_mesin3" class="custom-select form-control" data-mesin3="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
									</select>
									
								</div>
							</div>
						</div>
						<div class="form-group col-md-4">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Bahan</span>
								</div>
								<select name="bahanbu3" id="bahanbu3" class="custom-select form-control" data-bahanbu2="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
								</select>
							</div>
						</div>
						<div class="form-group col-md-4">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Uk.plano</span>
								</div>
								<select id="idkertasbu3" name="idkertasbu3" class="custom-select form-control">
									<option value="0">Pilih ukuran plano</option>
								</select>
							</div>
						</div>
					</div>
					
					<div class="form-row">
						<div class="form-group col-md-7">
							<div class="input-group ">
								<span class="input-group-text">
									<input type="checkbox" id="isisama3">
								</span>
								<Label class="form-control">Isi Sama seperti buku tulis</label>
							</div>
						</div>
						
						<div class="form-group col-md-5">
							<div class="input-group ">
								<span class="input-group-text">
									<input type="checkbox" id="minioffsetisi3">
								</span>
								<label class="form-control">Mesin Minioffset</label>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="card p-0 mb-0">
			<div class="card-header p-0">
				<h6 class="mb-0 ml-2 p-0"><a data-toggle="collapse" href="#" id="more4" class="ni ni-bold-down text-warning"> Cover agenda</a></h6>
			</div>
			<div class="card-body p-0 collapse show">
				<div class="card-block">
					<input type="hidden" class="form-control" id="jmlwarnacovbu" value="0">
					<input type="hidden" class="form-control" id="jmlwarnacovbu2" value="0">
					<input type="hidden" class="form-control" id="jenisjilidbu" value="1">
					<input type="hidden" class="form-control" id="botbuku" value="1">
					<input type="hidden" class="form-control" id="posjilidbu" value="1">
					<input type="hidden" class="form-control" id="lamcovbu" value="0">
					
					<input type="hidden" class="form-control" id="hargamincov">
					<input type="hidden" class="form-control" id="hargalebcov">
					<input type="hidden" class="form-control" id="jmlmincov">
					<div class="form-row more4">
						<div class="form-group col-md-12" id="ganticol">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Lebar</span>
								</div>
								<input type="text" class="form-control" id="lbrcoverbu">
								<div class="input-group-prepend">
									<span class="input-group-text">Tinggi</span>
								</div>
								<input type="text" class="form-control" id="tgcoverbu">
							</div>
						</div>
						<div class="form-group col-md-6 lbrlembuku">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Lebar Lem</span>
								</div>
								<input type="text" class="form-control lbrlembuku" id="lbrlembuku">
								<div class="input-group-prepend">
									<span class="input-group-text">Cm</span>
								</div>
							</div>
						</div>
					</div>
					
					<div class="form-row more4">
						<div class="form-group col-md-4">
							<div class="input-group">
								<span class="input-group-text">Jilid</span>
								<select id="jilidbu" class="form-control custom-select" data-style="btn-success">
									<option value="1" selected>Lem Panas</option>
									<option value="2">Spiral Kawat</option>
									<option value="3">Steples</option>
									<option value="4">Jahit</option>
								</select>
							</div>
						</div>
						<div class="form-group col-md-4">
							<div class="input-group">
								<span class="input-group-text">
									<input type="checkbox" id="autopunggung">
								</span>
								<Label class="form-control">Lebar Punggung Auto</label>
							</div>
						</div>
						<div class="form-group col-md-4 lebpungbu">
							<div class="input-group">
								<span class="input-group-text ">Lebar Punggung</span>
								<input type="text" class="form-control" id="lebpungbu">
								<span class="input-group-text ">Cm</span>
								
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Bahan</span>
								</div>
								<select name="bahancovbu" id="bahancovbu" class="custom-select form-control" data-bahanbu1="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
								</select>
							</div>
						</div>
						<div class="form-group col-md-6">
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
					
				</div>
			</div>
		</div>
		
		
		<div class="form-row mt-2">
			<div class="form-group col-md-9">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text bg-info text-white">Keterangan</span>
					</div>
					<input type="text" class="form-control" id="ketbuku" placeholder="Isi dulu keterangannya">
				</div>
			</div>
			<div class="form-group col-md-3">
				<button type="submit" class="btn btn-primary btnon" id="cekukuranbu">Hitung</button>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-12 mt-2">
				<div class="w3-light-grey">
					<div id="myBar" class="w3-green" style="height:5px;width:0"></div>
				</div>
			</div>
		</div>
		
		<div class="form-row">
			<div class="col-md-12">
				<div id="tablebuku">
					<form action="/data/detail-hitung/" method="post" target="_blank">
						<input type="hidden" id="token" name="token">
						<input type="hidden" id="user" name="user">
						<input type="hidden" id="modul" name="modul">
						<input type="hidden" name="data1[]" id="databuku1" value="">
						<input type="hidden" name="data2[]" id="databuku2" value="">
						<input type="hidden" name="data3[]" id="databuku3" value="">
						<input type="hidden" name="data4[]" id="databuku4" value="">
						<input type="hidden" name="data5[]" id="databuku5" value="">
						<input type="hidden" name="data6[]" id="databuku6" value="">
						<input type="hidden" name="data7[]" id="databuku7" value="">
						<input type="hidden" name="data8[]" id="databuku8" value="">
						<input type="hidden" name="ket" id="ketbk" value="">
						<input type="hidden" name="jumlahcetak" id="jumlahcetakbuku" value="">
						
						<table id='tablebuku' class='table table-striped'>
							<thead>
								<tr style='background-color:<?= $warnabar; ?>;color:white;width:100%!important'>
									<th style="width:60%!important;text-align:left!important" class='text-left'>Harga Jual</th>
									<th style="width:40%!important" class='text-right'>Total</th>
								</tr>
							</thead>
							<tr class="p-0">
								<td class='text-left'><span id="satuanbukuku"></span></td>
								<td class='text-right'><button type='submit' name='submit' value='0' class='btn btn-warning btn-sm btn-sm hint--top-left' aria-label='Detail hitung' style='width:100%;text-align:right!important'><span id="totjualbuku"></span></button>
								</td>
							</tr>
						</table>
					</form>
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