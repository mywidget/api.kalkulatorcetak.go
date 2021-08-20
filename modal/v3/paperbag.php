<?php
if (!empty($_POST['link'])) {
$warnabar = "#ed2300";
?>
<div class="modal-header" style="background-color:<?=$warnabar;?>;color:white;">
	<h4 class="modal-title">Cetak Paper Bag</h4>
	<button type="button" class="close" id="pb" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body p-2">
                   
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
											<div class="input-group">
											  <span class="input-group-text">Jumlah Cetak</span>
											  <input type="text" class="form-control" value="500" id="jmlcetakpb" autofocus>
											  <span class="input-group-text">pcs</span>
											</div>
										</div>
									</div>
                                    <div class="form-row">
										<div class="form-group col-md-12">
										<div class="input-group">
											<span class="input-group-text">Lebar</span>
                                            <input type="text" class="form-control" onchange="cekukuranpb()" id="pjcetakpb" placeholder="Panjang">
											<span class="input-group-text">Tinggi</span>
                                            <input type="text" class="form-control" onchange="cekukuranpb()" id="tgcetakpb" placeholder="Tinggi" >
											<span class="input-group-text">Lebar Samping</span>
                                            <input type="text" class="form-control" onchange="cekukuranpb()"  id="lbrcetakpb" placeholder="Lebar">
                                        </div>
                                        </div>
                                     </div>
									 <div class="form-row">																					
										<div class="form-group col-md-5">
										<div class="input-group">
											<span class="input-group-text">Jumlah Warna</span>
                                            <input type="text" class="form-control" id="jmlwarnapb" value="4" >
                                        </div>
                                        </div>
										<div class="form-group col-md-7">
										<div class="input-group ">
										  <span class="input-group-text">
											<input type="checkbox" id="bagi2">
										  </span>
										  <Label class="form-control" >Cetak bagi 2 (Bila tidak muat)</label>											 
										</div><!-- /input-group -->
										</div>
									</div>
<div class="form-row">
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
												<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Bahan</span>
					</div>
					<select name="bahanpb" id="bahanpb" class="custom-select form-control" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
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
										<select id="lampb" class="custom-select form-control" data-style="btn-warning">
											<option value="0" selected>Tanpa Laminasi</option>
											<option value="1">Varnish </option>
											<option value="3">Laminating Glosy </option>
											<option value="5">Laminating DOP </option>
										</select>
										</div>
									<div class="form-group col-md-6">
									<div class="input-group ">
									  <span class="input-group-text">
										<input type="checkbox" id="finishing4pb">
									  </span>
									  <Label class="form-control" >SpotUV</label>											 
									</div><!-- /input-group -->
									</div>
									</div>
									
									<div class="form-row">
											<div class="form-group col-md-5">										
											<div class="input-group ">
											  <span class="input-group-text">
												<input type="checkbox" id="finishingpb">
											  </span>
											  <Label class="form-control" >Poly</label>											 
											</div><!-- /input-group -->
											</div>
										
									<div class="form-group col-md-7">
									   <div class="input-group">
										  <span class="input-group-text">Lebar</span>
										  <input type="text" class="form-control" id="lbrpolypb" value="1">
										  <span class="input-group-text">Tinggi</span>
										  <input type="text" class="form-control" id="tgpolypb" value="1">
										  <span class="input-group-text">cm</span>
										</div>
									</div>
									</div>
<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Kertas u/ Lapisan Bawah</span>
					</div>
					<select name="kertasbawah" id="kertasbawah" class="custom-select form-control" data-sourcebw="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
			<div class="form-group col-md-12">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Uk.plano</span>
					</div>
					<select id="idkertasbw" name="idkertasbw" class="custom-select form-control">
						<option value="0">Pilih ukuran plano</option>
					</select>
				</div>
			</div>
		</div>
<div class="form-row">
				<div class="form-group col-md-8 col-sm-12 has-danger ket<?=$mod;?>">
					<div class="input-group">
						<span class="input-group-text">Keterangan</span>
						<input type="text" class="form-control" id="ket<?=$mod;?>" placeholder="Isi dulu keterangannya">
					</div>
				</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="btn-group" role="group">
					<button type="submit" class="btn btn-warning btnon"  id="cekukuran">Hitung</button>
					<?php echo cNav('paperbag'); ?>
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
		<div class="form-group">
			 <form action="/data/detail-hitung/" method="post" target="_blank">
			<input type="hidden" id="modul">
				<input type="hidden" name="data1[]" id="data1"  value="">
				<input type="hidden" name="data2[]" id="data2" value="">
				<input type="hidden" name="ket" id="ket" value="">
				<input type="hidden" name="jumlahcetak" id="jumlahcetak" value="">
				
				<div id='tablepb' class='small'>
				<table id='tablepb' class='table table-striped'>
				<thead >
				<tr style='background-color:<?=$warnabar;?>;color:white' >
				<th class='text-left'>Harga Jual</th><th></th>
				</tr>
				</thead>
				
				<tr><td class='text-left'> <span id="satuan"></span></td><td class='text-right' ><button type='submit' name='submit' value='0' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'><span id="totjual"></span></button></td></tr>
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
echo json_encode(array(404 => "error"));
	}
?>