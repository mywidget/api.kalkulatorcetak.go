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
					<input type="text" class="form-control" value="100" id="jumlah">
					<div class="input-group-prepend">
						<span class="input-group-text">lbr</span>
					</div>
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Bahan</span>
					</div>
					<select name="bahanstiker" id="bahanstiker" class="custom-select form-control" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/stiker/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
			<input type="hidden" class="form-control" aria-label="" id="hargastiker" readonly="readonly">
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
						<span class="input-group-text">Lebar Bahan</span>
					</div>
					<input type="text" class="form-control" placeholder="0" id="lbrbh" readonly="readonly">
					<div class="input-group-prepend">
						<span class="input-group-text">cm</span>
					</div>
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Tinggi</span>
					</div>
					<input type="text" class="form-control" placeholder="0" id="tgbh"   readonly="readonly">
					<div class="input-group-prepend">
						<span class="input-group-text">cm</span>
					</div>
				</div>
			</div>
			
			<div class="form-group col-md-9">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Lebar Potong</span>
					</div>
					<input type="text" class="form-control" value="5" id="lbrpot" >
					<div class="input-group-prepend">
						<span class="input-group-text">Tinggi</span>
					</div>
					<input type="text" class="form-control" value="5" id="tgpot" >
					<div class="input-group-prepend">
						<span class="input-group-text">cm</span>
					</div>
				</div>
			</div>  
			
			<div class="form-group col-md-3">
				<button  type="submit" class="btn btn-primary" onclick="potong()">Hitung</button>
			</div>                                        
		</div>          
		<div class="form-row">
			<div class="col-md-6">
				<canvas class="photo" id="myCanvas" style="width:100%;border:2px solid #5B8C2A; background-color:#E7F6D9;">
				Your browser tidak support untuk menampilkan gambar</canvas>
			</div>
			
			<div class="col-md-6 muat">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-text">Hasil potongan</span>
						<input type="text" class="form-control" aria-label="" id="muat" >
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-text">Bahan Terbuang</span>
						<input type="text" class="form-control" aria-label="" id="sisa" >
					</div>
				</div>										
				<div class="form-group ">
					<div class="input-group">
						<span class="input-group-text">Jumlah Cetak</span>
						<input type="text" class="form-control" aria-label="" id="pembagian" >
						<span class="input-group-text">lbr</span>
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
		<div class="form-row detail">
			<div class="col-md-12">
				<div id="hasilhitung"></div>
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