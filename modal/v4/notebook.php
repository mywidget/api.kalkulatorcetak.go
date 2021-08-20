<?php
	if (!empty($_POST['link'])){
	?>
	<div class="modal-header" style="background-color:<?= $warna; ?>;color:#f7f7f7;">
		<h4 class="modal-title text-white">Hitung <?= $namamod; ?></h4>
		<button type="button" class="close" id="not" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div class="modal-body p-2">
		<input type="hidden" id="min_cetak" value="20">
		<div class="form-row">
			<div class="form-group col-md-7">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Jml.</span>
					</div>
					<select name="jmlcetaks" id="jmlcetaksbu" class="custom-select form-control">
						<option value="10">10</option>
						<option value="20">20</option>
						<option value="30">30</option>
						<option value="40">40</option>
						<option value="50">50</option>
						<option value="">Custom</option>
					</select>
					<input type="text" class="form-control" value="10" id="jmlcetakbu" autofocus required>
					<div class="input-group-prepend">
						<span class="input-group-text">buku</span>
					</div>
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
			<div class="form-group col-md-12">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" aria-label="" id="lbrcetakbu">
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" aria-label="" id="tgcetakbu">
					<span class="input-group-text">cm</span>
				</div>
			</div>  
		</div>
		<div class="card p-0 mb-0">
			<div class="card-header p-0">
				<h6 class="mb-0 ml-2 p-0">Isi Notebook</h6>
			</div>
			<div class="panel-body isi1" style="padding: 2px; margin:2px">
				<div class="form-row">
					<div class="form-group col-md-6">
						<div class="input-group">
							<span class="input-group-text">Jml Warna</span>
							<input type="text" class="form-control" aria-label="" id="jmlwarnabu1" value="1">
							<span class="input-group-text">/</span>
							<input type="text" class="form-control" aria-label="" id="jmlwarnabu12" value="1" >
						</div>
					</div>
					
					<div class="form-group col-md-6">
						<div class="input-group">
							<span class="input-group-text">Jml Lembar</span>
							<input type="text" class="form-control" aria-label="" id="jmlhalbu1" value="50">
						</div>
					</div>
				</div>											
				<div class="form-row">
					
					<div class="form-group col-md-6">
						<div class="input-group">
							<span class="input-group-text">Mesin Cetak</span>
							<select id="j_mesin" class="custom-select form-control" data-style="btn-success">
								<option value="Offset" selected>Offset Besar</option>
								<option value="MiniOffset" >Offset Kecil</option>
							</select>
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text bg-warning text-white">Mesin</span>
							</div>
							<select name="idmesin" id="idmesin" class="custom-select form-control" data-mesin="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
							</select>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<div class="input-group">
							<span class="input-group-text">Bahan</span>
							<select name="bahanbu1" id="bahanbu1" class="custom-select form-control" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
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
			</div> 
		</div> 
		<div class="card p-0 mb-0">
			<div class="card-header p-0">
				<h6 class="mb-0 ml-2 p-0"><a data-toggle="collapse" href="#" id="more4" class="ni ni-bold-down text-warning"> Klik untuk detail Cover </a></h6>
			</div>
			<div class="panel-body" style="padding: 2px; margin:2px">
				<div class="form-row">
					<div class="form-group col-md-6">
						<div class="input-group">
							<span class="input-group-text">Jml Warna</span>
							<input type="text" class="form-control" aria-label="" id="jmlwarnacovbu" value="4">
							<span class="input-group-text">/</span>
							<input type="text" class="form-control" aria-label="" id="jmlwarnacovbu2" value="0">
						</div>
					</div>
					<div class="form-group col-md-6">
						<select id="jenisjilidbu" class="custom-select form-control" data-style="btn-success">
							<option value="1" selected>Jilid Soft Cover</option>
							<option value="2" >Hard Cover</option>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12 botbuku">
						<div class="input-group">
							<span class="input-group-text">Jenis Bot</span>
							<select name="botbuku" id="botbuku" class="custom-select form-control" required></select>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12 more4">
						<div class="input-group">
							<span class="input-group-text">Lebar</span>
							<input type="text" class="form-control" aria-label="" id="lbrcoverbu">
							<span class="input-group-text">Tinggi</span>
							<input type="text" class="form-control" aria-label="" id="tgcoverbu" >
							<span class="input-group-text lbrlembuku">Lebar Lem</span>
							<input type="text" class="form-control lbrlembuku" aria-label="" id="lbrlembuku" >
							<span class="input-group-text">Cm</span>
						</div>
					</div>  
				</div>  
				<div class="form-row">
					<div class="col-md-6 more4">	
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-text">
									<input type="checkbox" id="autopunggung">
								</span>
								<Label class="form-control">Lebar Punggung Automatis</label>
							</div>
						</div>  
					</div> 
					<div class="col-md-6 lebpungbu more4">	
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-text">Lebar Punggung</span>
								<input type="text" class="form-control" aria-label="" id="lebpungbu" >
								<span class="input-group-text">Cm</span>
								
							</div>
						</div>  
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-5">
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
					
					<div class="col-md-4">	
						<div class="form-group">
							<select id="jilidbu" class="custom-select form-control" data-style="btn-success">
								<option value="1" selected>Lem Panas</option>
								<option value="2" >Spiral Kawat</option>
								<option value="3" >Steples</option>
								<option value="4" >Jahit</option>
							</select>
						</div>
					</div>											
					
					<div class="col-md-3">	
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Posisi</span>
								</div>
								<select id="posjilidbu" class="custom-select form-control" data-style="btn-success">
									<option value="1" selected>Kiri</option>
									<option value="2" >Atas</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-6">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Bahan</span>
								</div>
								<select name="bahancovbu" id="bahancovbu" class="custom-select form-control" data-bahancovbu="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
								</select>
							</select>
						</div>
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
			<div class="form-row">
				<div class="col-md-4">	
					<div class="form-group">
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
				
				<div class="col-md-4">	
					<div class="form-group">
						<div class="input-group ">
							<span class="input-group-text">
								<input type="checkbox" id="minioffsetisi4">
							</span>
							<Label class="form-control">Mesin Minioffset</label>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<div class="input-group ">
							<span class="input-group-text">
								<input type="checkbox" id="spotuvbuku">
							</span>
							<Label class="form-control">SpotUV</label>
						</div><!-- /input-group -->	
					</div>
				</div>
			</div>
			<div class="more4">
				<div class="form-row">
					<div class="col-md-5">	
						<div class="form-group">
							<div class="input-group ">
								<span class="input-group-text">
									<input type="checkbox" id="polybuku">
								</span>
								<Label class="form-control">Poly</label>
							</div>
						</div>
					</div>
					<div class="col-md-7">	
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-text">Lebar</span>
								<input type="text" class="form-control" aria-label="" id="lbrpolybuk" value="1">
								<span class="input-group-text">Tinggi</span>
								<input type="text" class="form-control" aria-label="" id="tgpolybuk" value="1">
								<span class="input-group-text">cm</span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-5">	
						<div class="form-group">
							<div class="input-group ">
								<span class="input-group-text">
									<input type="checkbox" id="embosbuku">
								</span>
								<Label class="form-control">Embos</label>
							</div><!-- /input-group -->
						</div>
					</div>
					<div class="col-md-7">	
						<div class="form-group">
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
	</div>
	<div class="form-row">
		<div class="form-group col-md-12 has-danger ket<?= $mod; ?>">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">Keterangan</span>
				</div>
				<input type="text" class="form-control" id="ket<?= $mod; ?>" placeholder="Isi dulu keterangannya">
				<div class="input-group-prepend">
					<button  type="submit" id="button" class="btn btn-primary btnon" onclick="hitungbu1(1)">Hitung</button>
				</div>
			</div>
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
			<div id="tnotebook">
				<form action="/data/detail-hitung/" method="post" target="_blank">
					<input type="hidden" id="token" name="token">
					<input type="hidden" id="user"  name="user">	
					<input type="hidden" id="modul" name="modul">
					<input type="hidden" name="data1[]" id="databuku1"  value="">
					<input type="hidden" name="data2[]" id="databuku2" value="">
					<input type="hidden" name="data3[]" id="databuku3" value="">
					<input type="hidden" name="ket" id="ketnote" value="">
					<input type="hidden" name="jumlahcetak" id="jumlahcetakbuku" value="">
					
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
	
</div>  
<div id="customstyle"></div>
<?php
}//end token
else{
	echo json_encode(array(404 => "error"));
}
?>													