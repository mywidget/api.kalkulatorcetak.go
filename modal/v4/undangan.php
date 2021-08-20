<?php
	if (!empty($_POST['link'])){
	?>
	<div class="modal-header" style="background-color:<?=$warna;?>;color:white;">
		<h4 class="modal-title text-white">Hitung <?= $namamod; ?></h4>
		<button type="button" class="close" id="un" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div class="modal-body p-1">
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group">
					<span class="input-group-text">Jumlah Cetak</span> <input aria-label="" autofocus="" class="form-control" id="jmlcetakund" type="text"> <span class="input-group-text">pcs</span>
				</div>
			</div>
		</div>
		<div class="card p-0">
			<div class="card-header p-0 ">
				<h6 class="mb-0 ml-2 p-0"><a data-toggle="collapse" href="#" id="moreisiund" class="ni ni-bold-down text-warning"> Klik detail Isi undangan</a></h6>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					<div class="input-group">
						<span class="input-group-text">Lebar Terbuka</span> <input aria-label="" class="form-control" id="lbrcetakund" type="text"> <span class="input-group-text">Tinggi</span> <input aria-label="" class="form-control" id="tgcetakund" type="text"> <span class="input-group-text">cm</span>
					</div>
				</div>
				
				
			</div>
			
			<div class="form-row">
				<div class="form-group col-md-6">
					<div class="input-group">
						<span class="input-group-text">Bleed</span>
						<input type="text" class="form-control" id="bleedund" value="0.4" placeholder="Bleed">
						<span class="input-group-text">cm</span>
					</div>
				</div>
				<div class="form-group col-md-6">
					<select id="lamisiund" class="custom-select form-control" data-style="btn-warning">
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
				<div class="form-group col-md-6">
					<div class="input-group">
						<span class="input-group-text">Jml Warna</span> <input aria-label="" class="form-control" id="jmlwarnaisiund" type="text" value="4">
						<span class="input-group-text">/</span> <input aria-label="" class="form-control" id="jmlwarnaisiund2" type="text" value="4">
					</div>
				</div>
				<div class="form-group col-md-6  idmesin">
					<div class="input-group">
						<div class="input-group-append">
							<span class="input-group-text" id="not3">Mesin</span>
						</div>
						<select name="j_mesin1" id="j_mesin1" class="custom-select form-control" data-mesin="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
						</select>
					</div>
				</div>
			</div>
			<div class="form-row">
				
				<div class="form-group col-md-6">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Bahan</span>
						</div>
						<select name="bahan" id="bahanisiund" class="custom-select form-control" data-bahanisi="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
						</select>
					</div>
				</div>
				<div class="form-group col-md-6">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Uk.plano</span>
						</div>
						<select id="idkertasisi" name="idkertasisi" class="custom-select form-control">
							<option value="0">Pilih</option>
						</select>
					</div>
				</div>
				
			</div>
            
			<div class="moreisiund">
				<div class="form-row">
					<div class="form-group col-md-5">
						<div class="input-group ">
							<span class="input-group-text">
								<input type="checkbox" id="polyisiund">
							</span>
							<Label class="form-control">Poly</label>
						</div>
					</div>
					
					<div class="form-group col-md-7">
						<div class="input-group">
							<span class="input-group-text">Lebar</span>
							<input type="text" class="form-control" aria-label="" id="lbrpolyisiund" value="1">
							<span class="input-group-text">Tinggi</span>
							<input type="text" class="form-control" aria-label="" id="tgpolyisiund" value="1">
							<span class="input-group-text">Jumlah</span>
							<input type="text" class="form-control" aria-label="" id="jmlpolyisiund" value="1">
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-5">
						<div class="input-group ">
							<span class="input-group-text">
								<input type="checkbox" id="embosisiund">
							</span>
							<Label class="form-control">Embos</label>
						</div>
						<!-- /input-group -->
					</div>
					
					<div class="form-group col-md-7">
						<div class="input-group">
							<span class="input-group-text">Lebar</span>
							<input type="text" class="form-control" aria-label="" id="lbrembosisiund" value="1">
							<span class="input-group-text">Tinggi</span>
							<input type="text" class="form-control" aria-label="" id="tgembosisiund" value="1">
							<span class="input-group-text">Jumlah</span>
							<input type="text" class="form-control" aria-label="" id="jmlembosisiund" value="1">
						</div>
					</div>
				</div>
			</div>
			
			<div class="card p-0">
				<div class="card-header p-0 ">
					<h6 class="mb-0 ml-2 p-0"><a data-toggle="collapse" href="#" id="morecovund" class="ni ni-bold-down text-warning"> Klik detail Cover undangan </a></h6>
				</div>
				
				<div class="form-row">
					<div class="form-group col-md-7">
						<div class="input-group">
							<span class="input-group-text">Jml Warna</span>
							<input type="text" class="form-control" aria-label="" id="jmlwarnacovund" value="4">
							<span class="input-group-text">/</span>
							<input type="text" class="form-control" aria-label="" id="jmlwarnacovund2" value="0">
						</div>
					</div>
					<div class="form-group col-md-5">
						<select id="jenisjilidund" class="custom-select form-control" data-style="btn-success">
							<option value="1" selected>Jilid Soft Cover</option>
							<option value="2" >Hard Cover</option>
						</select>
					</div>
					
				</div>
				<div class="form-row">
					<div class="form-group col-md-5 botund">
						<div class="input-group">
							<span class="input-group-text">Jenis Bot</span>
							<select name="botund" id="botund" class="custom-select form-control" required></select>
						</div>
					</div>
					<div class="form-group col-md-7 botund">
						<div class="input-group">
							<span class="input-group-text lbrlemund">Lebar Lem</span>
							<input type="text" class="form-control lbrlemund" aria-label="" id="lbrlemund" >
							<span class="input-group-text">Cm</span>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4  idmesin">
						<div class="input-group">
							<div class="input-group-append">
								<span class="input-group-text" id="not3">Mesin</span>
							</div>
							<select name="j_mesincov" id="j_mesincov" class="custom-select form-control" data-mesincover="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
							</select>
						</div>
					</div>
					<div class="form-group col-md-4">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">Bahan</span>
							</div>
							<select name="bahancovund" id="bahancovund" class="custom-select form-control" data-bahancover="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
							</select>
						</div>
					</div>
					<div class="form-group col-md-4">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">Uk.plano</span>
							</div>
							<select id="idkertascover" name="idkertascover" class="custom-select form-control">
								<option value="0">Pilih</option>
							</select>
						</div>
					</div>
					
				</div>
				<div class="form-row">
					<div class="form-group col-md-12 morecovund">
						<div class="input-group">
							<span class="input-group-text">Lebar</span>
							<input type="text" class="form-control" aria-label="" id="lbrcoverund">
							<span class="input-group-text">Tinggi</span>
							<input type="text" class="form-control" aria-label="" id="tgcoverund" >
						</div>
					</div>
					
					
				</div>
				
				<div class="form-row">
					
					
					<div class="form-group col-md-5">
						<div class="input-group ">
							<span class="input-group-text">
								<input type="checkbox" id="spotuvcovund">
							</span>
							<Label class="form-control">SpotUV</label>
						</div>
						<!-- /input-group -->	
					</div>
					
					<div class="form-group col-md-7">
						<select id="lamcovund" class="custom-select form-control" data-style="btn-warning">
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
				
				<div class="morecovund">
					<div class="form-row">
						<div class="form-group col-md-4">
							<div class="input-group ">
								<span class="input-group-text">
									<input type="checkbox" id="polycovund">
								</span>
								<Label class="form-control">Poly</label>
							</div>
						</div>
						
						<div class="form-group col-md-8">
							<div class="input-group">
								<span class="input-group-text">Lebar</span>
								<input type="text" class="form-control" aria-label="" id="lbrpolycovund" value="1">
								<span class="input-group-text">Tinggi</span>
								<input type="text" class="form-control" aria-label="" id="tgpolycovund" value="1">
								<span class="input-group-text">Jumlah</span>
								<input type="text" class="form-control" aria-label="" id="jmlpolycovund" value="1">
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<div class="input-group ">
								<span class="input-group-text">
									<input type="checkbox" id="emboscovund">
								</span>
								<Label class="form-control">Embos</label>
							</div>
							<!-- /input-group -->
						</div>
						
						<div class="form-group col-md-8">
							<div class="input-group">
								<span class="input-group-text">Lebar</span>
								<input type="text" class="form-control" aria-label="" id="lbremboscovund" value="1">
								<span class="input-group-text">Tinggi</span>
								<input type="text" class="form-control" aria-label="" id="tgemboscovund" value="1">
								<span class="input-group-text">Jumlah</span>
								<input type="text" class="form-control" aria-label="" id="jmlemboscovund" value="1">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4 pita">
					<div class="input-group">
						<span class="input-group-text"><input id="pitaund" type="checkbox"></span> <label class="form-control">Pita</label>
					</div>
					<!-- /input-group -->
				</div>
				<div class="form-group col-md-8 pitaund">
					<div class="input-group">
						<span class="input-group-text">Lebar Pita</span>
						<input type="text" class="form-control" aria-label="" id="lbrpita" value="22">
						<span class="input-group-text">cm</span>
					</div>
				</div>
				
				
				<div class="form-group col-md-4 kalkir">
					<div class="input-group">
						<span class="input-group-text"><input id="kalkirund" type="checkbox"></span> <label class="form-control">Kertas Kalkir</label>
					</div>
					<!-- /input-group -->
				</div>
				<div class="col-md-8 kalkirund warnakalkir">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-text">Jml Warna Kalkir</span>
							<input type="text" class="form-control" aria-label="" id="jmlwarnakalkir" value="4">
						</div>
					</div>
				</div>
				
				<div class="form-group col-md-8 kalkirund">
					<div class="input-group">
						<span class="input-group-text">Lebar Kalkir</span>
						<input type="text" class="form-control" aria-label="" id="lbrkalkir" value="22">
						<span class="input-group-text">Tinggi</span>
						<input type="text" class="form-control" aria-label="" id="tgkalkir" value="14">
						<span class="input-group-text">cm</span>
					</div>
				</div>
				<div class="form-group col-md-4 amplop">
					<div class="input-group">
						<span class="input-group-text"><input id="amplopund" type="checkbox"></span> <label class="form-control">Amplop</label>
					</div>
					<!-- /input-group -->
				</div>
			</div>
			<!-- amplop undangan -->
			<div class="form-row amplopund">
				<div class="form-group col-md-12  idmesin">
					<div class="input-group">
						<div class="input-group-append">
							<span class="input-group-text" id="not3">Mesin</span>
						</div>
						<select name="j_mesinam" id="j_mesinam" class="custom-select form-control" data-mesinam="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
						</select>
					</div>
				</div>
			</DIV>
			<div class="form-row amplopund">
				
				<div class="form-group col-md-7">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Kertas Amplop</span>
						</div>
						<select name="bahanamplopund" id="bahanamplopund" class="custom-select form-control" data-bahanam="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
						</select>
					</div>
				</div>
				<div class="form-group col-md-5">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Uk.plano</span>
						</div>
						<select id="idkertasamplop" name="idkertasamplop" class="custom-select form-control">
							<option value="0">Pilih</option>
						</select>
					</div>
				</div>
				
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 amplopund">
					<select id="lamamplopund" class="custom-select form-control" data-style="btn-warning">
						<option value="0" selected>Tanpa Laminasi</option>
						<option value="1">Varnish Satu Muka</option>
						<option value="3">Laminating Glosy Satu Muka</option>
						<option value="5">Laminating DOP Satu Muka</option>
					</select>
				</div>
				<div class="form-group col-md-6 amplopund">
					<div class="input-group">
						<span class="input-group-text">Jml Warna Amplop</span>
						<input type="text" class="form-control" aria-label="" id="jmlwarnaamplopund" value="4">
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12 amplopund">
					<div class="input-group">
						<span class="input-group-text">Lebar Amplop</span>
						<input type="text" class="form-control" aria-label="" id="lbramplopund" value="22">
						<span class="input-group-text">Tinggi</span>
						<input type="text" class="form-control" aria-label="" id="tgamplopund" value="28">
						<span class="input-group-text">cm</span>
					</div>
				</div>
			</div>
			<div class="amplopund">
				<div class="form-row">
					<div class="form-group col-md-5">
						<div class="input-group ">
							<span class="input-group-text">
								<input type="checkbox" id="polyamplopund">
							</span>
							<Label class="form-control">Poly Amplop</label>
						</div>
					</div>
					<div class="form-group col-md-7">
						<div class="input-group">
							<span class="input-group-text">Lebar</span>
							<input type="text" class="form-control" aria-label="" id="lbrpolyamplopund" value="1">
							<span class="input-group-text">Tinggi</span>
							<input type="text" class="form-control" aria-label="" id="tgpolyamplopund" value="1">
							<span class="input-group-text">Jumlah</span>
							<input type="text" class="form-control" aria-label="" id="jmlpolyamplopund" value="1">
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-5">
						<div class="input-group ">
							<span class="input-group-text">
								<input type="checkbox" id="embosamplopund">
							</span>
							<Label class="form-control">Embos Amplop</label>
						</div>
						<!-- /input-group -->
					</div>
					
					<div class="form-group col-md-7">
						<div class="input-group">
							<span class="input-group-text">Lebar</span>
							<input type="text" class="form-control" aria-label="" id="lbrembosamplopund" value="1">
							<span class="input-group-text">Tinggi</span>
							<input type="text" class="form-control" aria-label="" id="tgembosamplopund" value="1">
							<span class="input-group-text">Jumlah</span>
							<input type="text" class="form-control" aria-label="" id="jmlembosamplopund" value="1">
						</div>
					</div>
				</div>
			</div>
			
			
			
			<div class="form-row">
				<div class="form-group col-md-12">
					<div class="input-group">
						<span class="input-group-text"><input id="ucapanund" type="checkbox"></span> <label class="form-control">Kartu Ucapan</label>
					</div>
					<!-- /input-group -->
				</div>
			</div>
			<div class="form-row ucapanund">
				<div class="form-group col-md-4">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text bg-warning text-white">Mesin</span>
						</div>
						<select name="j_mesinkartu" id="j_mesinkartu" class="custom-select form-control" data-mesinkartu="<?= $host; ?>/api/<?= $app_id; ?>/mesin/agenda/0" data-valueKey="id" data-displayKey="name" required>
						</select>
						
					</div>
				</div>
				<div class="form-group col-md-4">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Bahan</span>
						</div>
						<select name="bahankartuucapan" id="bahankartuucapan" class="custom-select form-control" data-bahanakartu="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
						</select>
					</div>
				</div>
				<div class="form-group col-md-4">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Uk.plano</span>
						</div>
						<select id="idkertaskartu" name="idkertaskartu" class="custom-select form-control">
							<option value="0">Pilih</option>
						</select>
					</div>
				</div>
			</div>
			<div class="form-row ucapanund">
				<div class="form-group col-md-4">
					<div class="input-group">
						<span class="input-group-text">Jml Warna Kartu</span>
						<input type="text" class="form-control" aria-label="" id="jmlwarnakartu" value="4">
					</div>
				</div>
				
				<div class="form-group col-md-8">
					<div class="input-group">
						<span class="input-group-text">Lebar Kartu</span>
						<input type="text" class="form-control" aria-label="" id="lbrkartuucapan" value="9">
						<span class="input-group-text">Tinggi</span>
						<input type="text" class="form-control" aria-label="" id="tgkartuucapan" value="5">
						<span class="input-group-text">cm</span>
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Keterangan</span>
						</div>
						<input type="text" class="form-control" aria-label="" id="ketundangan" placeholder="Isi dulu keterangannya">
						<div class="input-group-prepend">
							<button type="submit" class="btn btn-primary btnon" onclick="hitungisiundangan()">Hitung</button>
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
			
		</div>
		<div class="form-row">
			<div class="col-md-12">
				<div id="tableundangan">
					<form action="/data/detail-hitung/" method="post" target="_blank">
						<input type="hidden" id="token" name="token">
						<input type="hidden" id="user"  name="user">	
						<input type="hidden" id="modul" name="modul">
						<input type="hidden" name="data1[]" id="dataund1"  value="">
						<input type="hidden" name="data2[]" id="dataund2" value="">
						<input type="hidden" name="data3[]" id="dataund3" value="">
						<input type="hidden" name="data4[]" id="dataund4" value="">
						<input type="hidden" name="data5[]" id="dataund5" value="">
						<input type="hidden" name="data6[]" id="dataund6" value="">
						<input type="hidden" name="data7[]" id="dataund7" value="">
						<input type="hidden" name="data[]" id="dataund8" value="">
						<input type="hidden" name="ket" id="ketbk" value="">
						<input type="hidden" name="jumlahcetak" id="jumlahcetakund" value="">
						<div id='tablund' class='small'>
							<table id='tablund' class='table table-striped' >
								<thead >
									<tr style='background-color:<?=$warnabar;?>;color:white' >
										<th class='text-left'>Harga Jual</th>
										<th></th>
									</tr>
								</thead>
								<tr>
									<td class='text-left'> <span id="satuanund"></span></td>
									<td class='text-right' ><button type='submit' name='submit' value='0' class='btn btn-warning btn-sm btn-sm hint--top-left' aria-label='Detail hitung' style='background-color:<?=$warnabar;?>;color:white;width:120px'><span id="totjualund"></span></button></td>
								</tr>
							</table>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div id="customstyle"></div>
	<?php
	}//end token
	else{
		echo json_encode(array(404 => "error undangan"));
	}
?>	