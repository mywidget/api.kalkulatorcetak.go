<?php 
	if (!empty($_POST['link'])){
	?>	
	<div class="modal-header" style="background-color:<?= $warna; ?>;color:white;">
		<h4 class="modal-title">Hitung <?= $namamod; ?></h4>
		<button type="button" class="close" id="bu" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div class="modal-body p-2">
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Jumlah</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="jumlah">
					<div class="input-group-prepend">
						<span class="input-group-text">Stiker</span>
					</div>
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Bahan</span>
					</div>
					<select name="bahanstiker" id="bahanstiker" class="custom-select form-control" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/stikercutting/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
		</div>
		<input type="hidden" class="form-control" aria-label="" id="hargastiker" value="60" readonly="readonly">
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Lebar Stiker</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="lbrbh" >
					<div class="input-group-prepend">
						<span class="input-group-text">cm</span>
					</div>
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Tinggi Stiker</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="tgbh">
					<div class="input-group-prepend">
						<span class="input-group-text">cm</span>
					</div>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Jumlah Warna</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="jmlwarna" >
					<div class="input-group-prepend">
						<button  type="submit" class="btn btn-primary" onclick="cekhitung()">Hitung</button>
					</div>
				</div>
			</div>  
		</div>                                                                                
		<div class="form-row">
			<div class="col-md-12">
				<div id="detailstiker"></div>
			</div>		
		</div>		
	</div>
	<div id="customstyle"></div>
	<?php
	} //end token
	else {
		echo json_encode(array(404 => "error"));
	}								