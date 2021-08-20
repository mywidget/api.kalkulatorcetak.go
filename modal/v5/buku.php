<?php
	if (!empty($_POST['link'])) {
	?>
	<div class="modal-header" style="background-color:<?= $warna; ?>;color:#f7f7f7;">
		<h5 class="modal-title text-white" id="exampleModalLabel">Hitung <?= $namamod; ?></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>
	<div class="modal-body p-2">
		<div class="form-row">
			<div class="form-group col-md-7">
				<div class="input-group">
					<span class="input-group-text">Jml Cetak</span>
					<input type="text" class="form-control" value="500" id="jmlcetakbu" autofocus>
					<span class="input-group-text">buku</span>
				</div>
			</div>
			<div class="form-group col-md-5">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Uk. Cetak</span>
					</div>
					<select name="ukuranbu" id="ukuranbu" class="custom-select form-control" required></select>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-8">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" aria-label="" id="lbrcetakbu">
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" aria-label="" id="tgcetakbu">
					<span class="input-group-text">cm</span>
				</div>
			</div>
			<div class="form-group col-md-4">
				<div class="input-group">
					<span class="input-group-text">Bleed</span>
					<input type="text" class="form-control" aria-label="" id="bleedbu1" value="0">
				</div>
			</div>
		</div>
		<div class="card p-0 mb-0">
			<div class="card-header p-0 ">
				<h6 class="mb-0 ml-2 p-0"><a data-toggle="collapse" href="#" id="more" class="ni ni-bold-down text-warning"> Isi buku 1 </a></h6>
			</div>
			
			<div class="card-body collapse show p-2">
				<div class="card-block isi1">
					<div class="form-row">
						<div class="form-group col-md-4">
							<div class="input-group">
								<span class="input-group-text">Jml Warna</span>
								<input type="text" class="form-control" aria-label="" id="jmlwarnabu1" value="4">
								<span class="input-group-text">/</span>
								<input type="text" class="form-control" aria-label="" id="jmlwarnabu12" value="4">
							</div>
						</div>
						
						<div class="form-group col-md-4">
							<div class="input-group">
								<span class="input-group-text">Jml Halaman</span>
								<input type="text" class="form-control" aria-label="" id="jmlhalbu1" value="20">
							</div>
						</div>
						<div class="form-group col-md-4">
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
					
					<div class="form-row">
						<div class="form-group col-md-4 has-danger idmesin">
							<div class="input-group">
								<div class="input-group-append">
									<span class="input-group-text" id="not3">Mesin</span>
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
						<div class="form-group col-md-7">
							<div class="input-group ">
								<span class="input-group-text">
									<input type="checkbox" id="isisama1">
								</span>
								<Label class="form-control">Isi Hal. Sama seperti buku tulis</label>
							</div>
						</div>
						
						<div class="form-group col-md-5">
							<div class="input-group ">
								<span class="input-group-text">
									<input type="checkbox" id="minioffsetisi1">
								</span>
								<Label class="form-control">Mesin Minioffset</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card p-0 mb-0">
			<div class="card-header p-0">
				<h6 class="mb-0 ml-2 p-0"><a data-toggle="collapse" href="#" id="more2" class="ni ni-bold-down text-warning"> Isi Buku 2 </a></h6>
			</div>
			<div class="card-body p-2 isi2">
				<div class="card-block">
					<div class="form-row">
						<div class="form-group col-md-6">
							<div class="input-group">
								<span class="input-group-text">Jml Warna</span>
								<input type="text" class="form-control" aria-label="" id="jmlwarnabu2" value="0">
								<span class="input-group-text">/</span>
								<input type="text" class="form-control" aria-label="" id="jmlwarnabu22" value="0">
								
							</div>
						</div>
						<div class="form-group col-md-6">
							<div class="input-group">
								<span class="input-group-text">Jml Halaman</span>
								<input type="text" class="form-control" aria-label="" id="jmlhalbu2" value="0">
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
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
						<div class="col-md-6">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text bg-warning text-white">Mesin 2</span>
									</div>
									<select name="j_mesin2" id="j_mesin2" class="custom-select form-control" data-mesin2="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
									</select>
									
								</div>
							</div>
						</div>
					</div>
					<div class="form-row">
						
						<div class="form-group col-md-6">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Bahan</span>
								</div>
								<select name="bahanbu2" id="bahanbu2" class="custom-select form-control" data-bahanbu2="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
								</select>
							</div>
						</div>
						<div class="form-group col-md-6">
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
						<div class="form-group col-md-7">
							<div class="input-group ">
								<span class="input-group-text">
									<input type="checkbox" id="isisama2">
								</span>
								<Label class="form-control">Isi Hal. Sama seperti buku tulis</label>
							</div>
						</div>
						
						<div class="form-group col-md-5">
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
		
		<div class="card p-0 mb-0">
			<div class="card-header" style="padding:5px 0">
				<h6 class="mb-0 ml-2 p-0"><a data-toggle="collapse" href="#" id="more3" class="ni ni-bold-down text-warning"> Isi buku 3</a></h6>
			</div>
			<div class="card-body p-2 isi3">
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
			<div class="card-body p-2 collapse show">
				<div class="card-block">
					<div class="form-row">
						<div class="form-group col-md-6" id="ganticol">
							<div class="input-group">
								<span class="input-group-text">Jml Warna</span>
								<input type="text" class="form-control" aria-label="" id="jmlwarnacovbu" value="4">
								<span class="input-group-text">/</span>
								<input type="text" class="form-control" aria-label="" id="jmlwarnacovbu2" value="0">
							</div>
						</div>
						
						<div class="form-group col-md-6" id="ganticol2">
							<select id="jenisjilidbu" class="custom-select form-control" data-style="btn-success">
								<option value="1" selected>Jilid Soft Cover</option>
								<option value="2">Hard Cover</option>
							</select>
						</div>
						
						<div class="form-group col-md-4 botbuku">
							<div class="input-group">
								<span class="input-group-text">Jenis Bot</span>
								<select name="botbuku" id="botbuku" class="custom-select form-control" required></select>
							</div>
						</div>
					</div>
					
					
					<div class="form-row">
						<div class="form-group col-md-12">
							<div class="input-group">
								<span class="input-group-text">Lebar</span>
								<input type="text" class="form-control" aria-label="" id="lbrcoverbu">
								<span class="input-group-text">Tinggi</span>
								<input type="text" class="form-control" aria-label="" id="tgcoverbu">
								<span class="input-group-text lbrlembuku">Lebar Lem</span>
								<input type="text" class="form-control lbrlembuku" aria-label="" id="lbrlembuku">
								<span class="input-group-text">Cm</span>
								
							</div>
						</div>
					</div>
					
					
					<div class="form-row">
						<div class="col-md-4">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text bg-warning text-white">Mesin</span>
									</div>
									<select name="j_mesincov" id="j_mesincov" class="custom-select form-control" data-j_mesincov="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
									</select>
									
								</div>
							</div>
						</div>
						<div class="form-group col-md-4">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Bahan</span>
								</div>
								<select name="bahancovbu" id="bahancovbu" class="custom-select form-control" data-bahanbu1="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
								</select>
							</div>
						</div>
						<div class="form-group col-md-4">
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
					<div class="form-row more4">
						<div class="form-group col-md-6">
							<div class="input-group">
								<span class="input-group-text">
									<input type="checkbox" id="autopunggung">
								</span>
								<Label class="form-control">Lebar Punggung Automatis</label>
							</div>
						</div>
						
						<div class="form-group col-md-6 lebpungbu">
							<div class="input-group">
								<span class="input-group-text">Lebar Punggung</span>
								<input type="text" class="form-control" aria-label="" id="lebpungbu">
								<span class="input-group-text">Cm</span>
								
							</div>
						</div>
					</div>
					<div class="form-row more4">
						<div class="form-group col-md-4">
							<select id="jilidbu" class="custom-select form-control" data-style="btn-success">
								<option value="1" selected>Lem Panas</option>
								<option value="2">Spiral Kawat</option>
								<option value="3">Steples</option>
								<option value="4">Jahit</option>
							</select>
						</div>
						
						<div class="form-group col-md-4">
							<div class="input-group">
								<span class="input-group-text">Posisi</span>
								<select id="posjilidbu" class="custom-select form-control" data-style="btn-success">
									<option value="1" selected>Kiri</option>
									<option value="2">Atas</option>
								</select>
							</div>
						</div>
						
						<div class="form-group col-md-4">
							<select id="lamcovbu" class="custom-select form-control" data-style="btn-warning">
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
					<div class="form-row more4">
						<div class="form-group col-md-4">
							<div class="input-group ">
								<span class="input-group-text">
									<input type="checkbox" id="wrappingbuku">
								</span>
								<Label class="form-control">Wrapping</label>
							</div>
						</div>
						<div class="form-group col-md-4">
							<div class="input-group ">
								<span class="input-group-text">
									<input type="checkbox" id="spotuvbuku">
								</span>
								<Label class="form-control">SpotUV</label>
							</div><!-- /input-group -->
						</div>
						<div class="form-group col-md-4">
							<div class="input-group ">
								<span class="input-group-text">
									<input type="checkbox" id="minioffsetisi4">
								</span>
								<Label class="form-control">Mesin Minioffset</label>
							</div>
						</div>
					</div>
					<div class="form-row more4">
						<div class="form-group col-md-4">
							<div class="input-group ">
								<span class="input-group-text">
									<input type="checkbox" id="polybuku">
								</span>
								<Label class="form-control">Poly</label>
							</div>
						</div>
						
						<div class="form-group col-md-8">
							<div class="input-group">
								<span class="input-group-text">Lebar</span>
								<input type="text" class="form-control" aria-label="" id="lbrpolybuk" value="1">
								<span class="input-group-text">Tinggi</span>
								<input type="text" class="form-control" aria-label="" id="tgpolybuk" value="1">
								<span class="input-group-text">cm</span>
							</div>
						</div>
					</div>
					<div class="form-row more4">
						<div class="form-group col-md-4">
							<div class="input-group ">
								<span class="input-group-text">
									<input type="checkbox" id="embosbuku">
								</span>
								<Label class="form-control">Embos</label>
							</div><!-- /input-group -->
						</div>
						
						<div class="form-group col-md-8">
							<div class="input-group">
								<span class="input-group-text">Lebar</span>
								<input type="text" class="form-control" aria-label="" id="lbrembosbuk" value="1">
								<span class="input-group-text">Tinggi</span>
								<input type="text" class="form-control" aria-label="" id="tgembosbuk" value="1">
								<span class="input-group-text">cm</span>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			
		</div>
		<div class="form-row">
			<div class="form-group col-md-9">
				<div class="input-group">
					<span class="input-group-text">Keterangan</span>
					<input type="text" class="form-control" aria-label="" id="ketbuku" placeholder="Isi dulu keterangannya">
				</div>
			</div>
			
			<div class="form-group col-md-3">
				<button type="submit" class="btn btn-primary btnon" onclick="hitungbu1()">Hitung</button>
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
				<form action="/data/detail-hitung/" method="post" target="_blank">
					<input type="hidden" name="data1[]" id="databuku1"  value="">
					<input type="hidden" name="data2[]" id="databuku2" value="">
					<input type="hidden" name="data3[]" id="databuku3" value="">
					<input type="hidden" name="data4[]" id="databuku4" value="">
					<input type="hidden" name="data5[]" id="databuku5" value="">
					<input type="hidden" name="data6[]" id="databuku6" value="">
					<input type="hidden" name="data7[]" id="databuku7" value="">
					<input type="hidden" name="data8[]" id="databuku8" value="">
					<input type="hidden" name="ket" id="ketbk" value="">
					<input type="hidden" name="jumlahcetak" id="jumlahcetakbuku">
					<table id='tablebuku' class='table table-striped'>
						<thead>
							<tr style='background-color:<?= $warna; ?>;color:white'>
								<th class='text-left'>Harga Jual</th>
								<th></th>
							</tr>
						</thead>
						<tr>
							<td class='text-left'> <span id="satuanbukuku"></span></td>
							<td class='text-right'><button type='submit' name='submit' value='0' class='btn btn-warning btn-sm btn-sm hint--top-left' aria-label='Detail hitung'><span id="totjualbuku"></span></button></td>
						</tr>
					</table>
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