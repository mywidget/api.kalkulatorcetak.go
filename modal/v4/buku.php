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
					<span class="input-group-text">Jumlah Cetak</span>
					<select name="jmlcetaks" id="jmlcetaksbu" class="custom-select form-control">
						<option value="50">50</option>
						<option value="100">100</option>
						<option value="1500">150</option>
						<option value="200">200</option>
						<option value="250">250</option>
						<option value="500">500</option>
						<option value="1000">1000</option>
						<option value="">Custom</option>
					</select>
					<input type="text" class="form-control" value="50" id="jmlcetakbu" autofocus>
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
					<input type="text" class="form-control" readonly="" id="lbrcetakbu">
					<span class="input-group-text">cm | Tinggi</span>
					<input type="text" class="form-control" readonly="" id="tgcetakbu">
					<span class="input-group-text">cm</span>
				</div>
			</div>
			<div class="form-group col-md-4">
				<div class="input-group">
					<span class="input-group-text">Bleed</span>
					<input type="text" class="form-control" aria-label="" id="bleedbu1" value="0">
					<span class="input-group-text">cm</span>
				</div>
			</div>
		</div>
		<div class="card p-0 mb-0">
			<div class="card-header p-0">
				<h6 class="mb-0 ml-2 p-0"><span class="title"> Isi buku 1 </span></a></h6>
			</div>
			
			<div class="card-body collapse show p-2">
				<div class="card-block isi1 <?=$rowx;?> pt-0 pb-0">
					<div class="form-row">
						<div class="form-group col-md-4">
							<div class="input-group">
								<span class="input-group-text">Warna</span>
								<input type="text" class="form-control"  id="jmlwarnabu1" value="4">
								<span class="input-group-text">/</span>
								<input type="text" class="form-control"  id="jmlwarnabu12" value="4">
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
						
						<div class="form-group col-md-6">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="not3">Mesin</span>
								</div>
								<select id="pilih_mesin" class="custom-select form-control" data-style="btn-success">
									<option value="Offset" selected>Mesin Offset Besar</option>
									<option value="MiniOffset" >Mesin Offset Kecil</option>
									<option value="PrintDigital" >Print Digital</option>
									<option value="0" >Mesin Custom</option>
								</select>
							</div>
						</div>
						<div class="form-group col-md-6">
							<select name="j_mesin1" id="j_mesin1" class="custom-select form-control" data-mesin="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
							</select>
						</div>
						<div class="form-group col-md-6">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Bahan</span>
								</div>
								<select name="bahan" id="bahanbu1" class="custom-select form-control" data-bahanbu1="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
								</select>
							</div>
						</div>
						<div class="form-group col-md-6">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Uk.plano</span>
								</div>
								<select id="idkertasbu1" name="idkertasbu1" class="custom-select form-control">
									<option value="0">Pilih ukuran plano</option>
								</select>
							</div>
						</div>
						
						<div class="form-group col-md-12">
							<div class="custom-control custom-checkbox mb-0 mt-1">
								<input type="checkbox" class="custom-control-input" id="isisama1">
								<label class="custom-control-label" for="isisama1">Isi Hal. Sama seperti buku tulis</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card p-0 mb-0">
			<div class="card-header p-0">
				<h6 class="mb-0 ml-2 p-0"><a data-toggle="collapse" href="#" id="more2" class="ni ni-bold-down text-warning"><span class="title"> Isi Buku 2 </span></a></h6>
			</div>
			<div class="card-body p-2 isi2">
				<div class="card-block <?=$rowx;?> pt-0 pb-0">
					<div class="form-row">
						<div class="form-group col-md-4">
							<div class="input-group">
								<span class="input-group-text">Warna</span>
								<input type="text" class="form-control" aria-label="" id="jmlwarnabu2" value="0">
								<span class="input-group-text">/</span>
								<input type="text" class="form-control" aria-label="" id="jmlwarnabu22" value="0">
								
							</div>
						</div>
						<div class="form-group col-md-4">
							<div class="input-group">
								<span class="input-group-text">Jml Halaman</span>
								<input type="text" class="form-control" aria-label="" id="jmlhalbu2" value="0">
							</div>
						</div>
						
						<div class="form-group col-md-4">
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
						<div class="form-group col-md-6">
							<div class="input-group">
								<div class="input-group-append">
									<span class="input-group-text" id="not3">Mesin</span>
								</div>
								<select id="pilih_mesin_2" class="custom-select form-control" data-style="btn-success">
									<option value="Offset" selected>Mesin Offset Besar</option>
									<option value="MiniOffset" >Mesin Offset Kecil</option>
									<option value="PrintDigital" >Print Digital</option>
									<option value="0" >Mesin Custom</option>
								</select>
							</div>
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
						
						<div class="form-group col-md-7 pb-0">
							<div class="custom-control custom-checkbox mb-0 mt-1">
								<input type="checkbox" class="custom-control-input" id="isisama2">
								<label class="custom-control-label" for="isisama2">Isi Hal. Sama seperti buku tulis</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="card p-0 mb-0">
			<div class="card-header" style="padding:5px 0">
				<h6 class="mb-0 ml-2 p-0"><a data-toggle="collapse" href="#" id="more3" class="ni ni-bold-down text-warning"><span class="title"> Isi buku 3</span></a></h6>
			</div>
			<div class="card-body p-2 isi3">
				<div class="card-block<?=$rowx;?> pt-0 pb-0">
					<div class="form-row">
						
						<div class="form-group col-md-4">
							<div class="input-group">
								<span class="input-group-text">Warna</span>
								<input type="text" class="form-control" id="jmlwarnabu3" value="0">
								<span class="input-group-text">/</span>
								<input type="text" class="form-control" id="jmlwarnabu32" value="0">
								
							</div>
						</div>
						
						<div class="form-group col-md-4">
							<div class="input-group">
								<span class="input-group-text">Jml Halaman</span>
								<input type="text" class="form-control" id="jmlhalbu3" value="0">
							</div>
						</div>
						<div class="form-group col-md-4">
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
						<div class="form-group col-md-6">
							<div class="input-group">
								<div class="input-group-append">
									<span class="input-group-text" id="not3">Mesin</span>
								</div>
								<select id="pilih_mesin_3" class="custom-select form-control" data-style="btn-success">
									<option value="Offset" selected>Mesin Offset Besar</option>
									<option value="MiniOffset" >Mesin Offset Kecil</option>
									<option value="PrintDigital" >Print Digital</option>
									<option value="0" >Mesin Custom</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
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
						<div class="form-group col-md-6">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Bahan</span>
								</div>
								<select name="bahanbu3" id="bahanbu3" class="custom-select form-control" data-bahanbu2="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
								</select>
							</div>
						</div>
						<div class="form-group col-md-6">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Uk.plano</span>
								</div>
								<select id="idkertasbu3" name="idkertasbu3" class="custom-select form-control">
									<option value="0">Pilih ukuran plano</option>
								</select>
							</div>
						</div>
						
						<div class="form-group col-md-7 pb-0">
							<div class="custom-control custom-checkbox mb-0 mt-1">
								<input type="checkbox" class="custom-control-input" id="isisama3">
								<label class="custom-control-label" for="isisama3">Isi Hal. Sama seperti buku tulis</label>
							</div>
						</div>
						
						<div class="form-group col-md-5 pb-0">
							<div class="custom-control custom-checkbox mb-0 mt-1">
								<input type="checkbox" class="custom-control-input" id="minioffsetisi3">
								<label class="custom-control-label" for="minioffsetisi3">Mesin Minioffset</label>
							</div>
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
		<div class="card p-0 mb-0">
			<div class="card-header p-0">
				<h6 class="mb-0 ml-2 p-0"><a data-toggle="collapse" href="#" id="more4" class="ni ni-bold-down text-warning"><span class="title"> Klik untuk detail finishing Cover</span></a></h6>
			</div>
			<div class="card-body p-2 collapse show">
				<div class="card-block <?=$rowx;?> pt-0 pb-0">
					<div class="form-row">
						<div class="form-group col-md-6" id="ganticol">
							<div class="input-group">
								<span class="input-group-text">Warna</span>
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
						<div class="form-group col-md-12">
							<div class="input-group">
								<span class="input-group-text">Lebar</span>
								<input type="text" class="form-control" aria-label="" id="lbrcoverbu">
								<span class="input-group-text">cm | Tinggi</span>
								<input type="text" class="form-control" aria-label="" id="tgcoverbu">
								<span class="input-group-text lbrlembuku">Lebar Lem</span>
								<input type="text" class="form-control lbrlembuku" aria-label="" id="lbrlembuku">
								<span class="input-group-text">cm</span>
								
							</div>
						</div>
						
						
						<div class="form-group col-md-4">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="not3">Mesin</span>
								</div>
								<select id="pilih_mesin_4" class="custom-select form-control" data-style="btn-success">
									<option value="Offset" selected>Mesin Offset Besar</option>
									<option value="MiniOffset" >Mesin Offset Kecil</option>
									<option value="PrintDigital" >Print Digital</option>
									<option value="0" >Mesin Custom</option>
								</select>
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
						
						
							<div class="form-group col-md-4 more4">
								<select name="j_mesincov" id="j_mesincov" class="custom-select form-control" data-j_mesincov="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
								</select>
							</div>
							<div class="form-group col-md-4 more4">
								<div class="custom-control custom-checkbox mb-0 mt-1">
									<input type="checkbox" class="custom-control-input" id="autopunggung">
									<label class="custom-control-label" for="autopunggung">Lebar Punggung Automatis</label>
								</div>
							</div>
							
							<div class="form-group col-md-4 lebpungbu more4">
								<div class="input-group">
									<span class="input-group-text">Lebar Punggung</span>
									<input type="text" class="form-control" aria-label="" id="lebpungbu">
									<span class="input-group-text">cm</span>
									
								</div>
							</div>
							
							<div class="form-group col-md-4 more4">
								<select id="jilidbu" class="custom-select form-control" data-style="btn-success">
									<option value="1" selected>Lem Panas</option>
									<option value="2">Spiral Kawat</option>
									<option value="3">Steples</option>
									<option value="4">Jahit</option>
								</select>
							</div>
							
							<div class="form-group col-md-4 more4">
								<div class="input-group">
									<span class="input-group-text">Posisi</span>
									<select id="posjilidbu" class="custom-select form-control" data-style="btn-success">
										<option value="1" selected>Kiri</option>
										<option value="2">Atas</option>
									</select>
								</div>
							</div>
							
							<div class="form-group col-md-4 more4">
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
							
							<div class="form-group col-md-4 pb-0 more4">
								<div class="custom-control custom-checkbox mb-0 mt-1">
									<input type="checkbox" class="custom-control-input" id="wrappingbuku">
									<label class="custom-control-label" for="wrappingbuku">Wrapping</label>
								</div>
							</div>
							<div class="form-group col-md-4 pb-0 more4">
								<div class="custom-control custom-checkbox mb-0 mt-1">
									<input type="checkbox" class="custom-control-input" id="spotuvbuku">
									<label class="custom-control-label" for="spotuvbuku">SpotUV</label>
								</div>
							</div>
							
							
							<div class="form-group col-md-4 pb-0 more4">
								<div class="custom-control custom-checkbox mb-0 mt-1">
									<input type="checkbox" class="custom-control-input" id="polybuku">
									<label class="custom-control-label" for="polybuku">Poly</label>
								</div>
							</div>
							
							
							<div class="form-group col-md-8 more4">
								<div class="input-group">
									<span class="input-group-text">Lebar</span>
									<input type="text" class="form-control" aria-label="" id="lbrpolybuk" value="1">
									<span class="input-group-text">cm | Tinggi</span>
									<input type="text" class="form-control" aria-label="" id="tgpolybuk" value="1">
									<span class="input-group-text">cm</span>
								</div>
							</div>
							
							<div class="form-group col-md-4 pb-0 more4">
								<div class="custom-control custom-checkbox mb-0 mt-1">
									<input type="checkbox" class="custom-control-input" id="embosbuku">
									<label class="custom-control-label" for="embosbuku">Embos</label>
								</div>
							</div>
							
							<div class="form-group col-md-8 more4">
								<div class="input-group">
									<span class="input-group-text">Lebar</span>
									<input type="text" class="form-control" aria-label="" id="lbrembosbuk" value="1">
									<span class="input-group-text">cm | Tinggi</span>
									<input type="text" class="form-control" aria-label="" id="tgembosbuk" value="1">
									<span class="input-group-text">cm</span>
								</div>
							</div>
						
						<div class="form-group col-md-12">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Keterangan</span>
								</div>
								<input type="text" class="form-control" aria-label="" id="ketbuku" placeholder="Isi dulu keterangannya">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-primary btnon" id="cekukuran">Hitung</button>
								</div>
							</div>
						</div>
						
					</div>
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