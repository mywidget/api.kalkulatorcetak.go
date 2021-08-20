<?php
	if (!empty($_POST['link'])){
	?>
	<div class="modal-header" style="background-color:<?= $warna; ?>;color:#f7f7f7;">
		<h4 class="modal-title text-white">Hitung <?= $namamod; ?></h4>
		<button type="button" class="close" id="not" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div class="modal-body p-2">
		<div class="form-row">
			<div class="col-md-7">	
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-text">Jml Cetak</span>
						<input type="text" class="form-control" aria-label="" id="jmlcetaknot" autofocus>
						<span class="input-group-text">buku</span>
					</div>
				</div>
			</div>
			
			<div class="form-group col-md-5 ukuran">
				<div class="input-group">
					<span class="input-group-text">Ukuran</span>
					<select name="ukurannot" id="ukurannot" class="custom-select form-control" required></select>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-8">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" aria-label="" id="lbrcetaknot">
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" aria-label="" id="tgcetaknot" onchange="cekukurannot()">
					<span class="input-group-text">cm</span>
				</div>
			</div>  
			
			<div class="form-group col-md-4">
				<div class="input-group">
					<span class="input-group-text">Bleed</span>
					<input type="text" class="form-control" aria-label="" id="bleednot" value="0">
				</div>
			</div>
		</div>	
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Jml Warna</span>
					<input type="text" class="form-control" aria-label="" id="jmlwarnanot1" value="2">
					<span class="input-group-text">/</span>
					<input type="text" class="form-control" aria-label="" id="jmlwarnanot2" value="0" >
				</div>
			</div>
			
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Jml Set Perbuku</span>
					<input type="text" class="form-control" aria-label="" id="jmlsetnot" value="50">
				</div>
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
			<div class="form-group col-md-4">		
				<div class="input-group">
					<?php $top = nota($uid,'top'); ?>
					<input type="hidden" class="form-control" aria-label="" id="bahantop" value="<?=$top['id'];?>">
					<span class="input-group-text">Jml <?=$top['name'];?></span>
					<input type="text" class="form-control" aria-label="" id="jmltop" value="1">
				</div>
			</div>
			<div class="form-group col-md-4">		
				<div class="input-group">
					<?php $middle = nota($uid,'middle'); ?>
					<input type="hidden" class="form-control" aria-label="" id="bahanmiddle" value="<?=$middle['id'];?>">
					<span class="input-group-text"><?=$middle['name'];?></span>
					<input type="text" class="form-control" aria-label="" id="jmlmiddle" value="0">
				</div>
			</div>
			
			<div class="form-group col-md-4">		
				<div class="input-group">
					<?php $bottom = nota($uid,'bottom'); ?>
					<input type="hidden" class="form-control" aria-label="" id="bahanbottom" value="<?=$bottom['id'];?>">
					<span class="input-group-text"><?=$bottom['name'];?></span>
					<input type="text" class="form-control" aria-label="" id="jmlbottom" value="1">
				</div>
			</div>
		</div>										
		
		
		
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Kertas</span>
					<input type="text" class="form-control" aria-label="" value="NCR" readonly="readonly">
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Cover</span>
					<input type="text" class="form-control" aria-label="" value="Samson" readonly="readonly">
				</div>
			</div>
		</div>
		
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="nomoratornot">
					</span>
					<label class="form-control pt-2">Nomorator</label>											 
				</div><!-- /input-group -->
			</div>
			
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Jml Titik</span>
					<input type="text" class="form-control" aria-label="" id="jmlnomnot" value="1" readonly>
				</div>
			</div>
		</div>
		
		
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="porporasinot">
					</span>
					<label class="form-control pt-2">Porporasi</label>											 
				</div><!-- /input-group -->
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Jumlah</span>
					<input type="text" class="form-control" aria-label="" id="jmlpornot" value="1">
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
				<button type="submit" class="btn btn-primary btnon" onclick="hitungnot()" id="cekukuran">Hitung</button>
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
				<div id="hasilhota">
					<form action="/data/detail-hitung/" method="post" target="_blank">
						<input type="hidden" id="modul">
						<input type="hidden" name="data1[]" id="datanota1"  value="">
						<input type="hidden" name="data2[]" id="datanota2" value="">
						<input type="hidden" name="data3[]" id="datanota3" value="">
						<input type="hidden" name="ket" id="ketnota" value="">
						<input type="hidden" name="jumlahcetak" id="jumlahcetaknota" value="">
						<div class='small table-responsive'><table id='tablenota' class='table' >
							<thead><tr style='color:#000;padding:0!important'><th class='text-md-left'>Mesin</th><th class='text-left'>Harga Satuan</th><th class='text-md-right'>Harga Jual </th></tr></thead>
							<tr>
								<td class='text-left'><span id="mesin"></span></td>
								<td class='text-left'><span id="satuanota"></span></td>
								<td class='text-right' ><button type='submit' name='submit' value='0' class='btn btn-warning btn-sm'><span id="totjualnota"></span></button></td>
							</tr>
						</table></div>											
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