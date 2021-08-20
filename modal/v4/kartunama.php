<?php
if (!empty($_POST['link'])) {
?>
   <div class="modal-header" style="background-color:<?= $warna; ?>;color:#f7f7f7;">
      <h4 class="modal-title text-white">Hitung <?= $namamod; ?></h4>
      <button type="button" class="close" id="kn" data-dismiss="modal" aria-hidden="true">&times;</button>
   </div>
   <div class="modal-body p-2">
      <div class="form-row">
         <div class="form-group col-md-12">
            <div class="input-group">
               <span class="input-group-text">Jumlah Cetak</span>
               <input type="text" class="form-control" value="10" id="jmlcetakkn" autofocus>
               <span class="input-group-text">box (1 box isi 100lbr)</span>
            </div>
         </div>
      </div>
      <div class="form-row">
         <div class="form-group col-md-6">
            <div class="input-group">
               <span class="input-group-text">Lebar</span>
               <input type="text" class="form-control" aria-label="" id="lbrcetakkn" onchange="cekukurankn()">
               <span class="input-group-text">Tinggi</span>
               <input type="text" class="form-control" aria-label="" id="tgcetakkn" onchange="cekukurankn()">
               <span class="input-group-text">cm</span>
            </div>
         </div>

         <div class="form-group col-md-6">
            <div class="input-group">
               <span class="input-group-text">Jumlah Warna</span>
               <input type="text" class="form-control" aria-label="" id="jmlwarnakn" value="4">
               <span class="input-group-text">/</span>
               <input type="text" class="form-control" aria-label="" id="jmlwarnakn2" value="0">
            </div>
         </div>
      </div>
      <div class="form-row">
			<div class="form-group col-md-4">
				<div class="input-group">
					<span class="input-group-text " id="not4">Mesin</span>
					<select name="pilih<?= $mod; ?>" id="pilih<?= $mod; ?>" class="custom-select form-control" required>
					<option value="1">Otomatis</option>
					<option value="2">Manual</option>
					</select>
				</div>
			</div>
         <div class="form-group col-md-4">
            <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text">Mesin</span>
               </div>
               <select name="idmesin" id="idmesin" class="custom-select form-control" data-mesin="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
               </select>
            </div>
         </div>
		  <div class="form-group col-md-4">
				<div class="input-group">
					<span class="input-group-text " id="not4">Plano</span>
					<select name="pilihb<?= $mod; ?>" id="pilihb<?= $mod; ?>" class="custom-select form-control" required>
					<option value="1">Otomatis</option>
					<option value="2">Manual</option>
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
               <select name="bahankn" id="bahankn" class="custom-select form-control" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
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
            <select id="lamkn" class="custom-select form-control" data-style="btn-warning">
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
            <div class="input-group ">
               <span class="input-group-text">
                  <input type="checkbox" id="finishing1kn">
               </span>
               <Label class="form-control">SpotUV</label>
            </div>
            <!-- /input-group -->
         </div>
      </div>
      <div class="form-row">
         <div class="form-group col-md-4">
            <div class="input-group ">
               <span class="input-group-text">
                  <input type="checkbox" id="finishing2kn">
               </span>
               <Label class="form-control">Poly</label>
            </div>
            <!-- /input-group -->
         </div>

         <div class="form-group col-md-8">
            <div class="input-group">
               <span class="input-group-text">Lebar</span>
               <input type="text" class="form-control" aria-label="" id="lbrpolykn" value="1">
               <span class="input-group-text">Tinggi</span>
               <input type="text" class="form-control" aria-label="" id="tgpolykn" value="1">
            </div>
         </div>
      </div>
      <div class="form-row">
         <div class="form-group col-md-12">
            <div class="input-group ">
               <span class="input-group-text">
                  <input type="checkbox" id="boxkartunama">
               </span>
               <Label class="form-control">Pakai Box</label>
            </div>
            <!-- /input-group -->
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
         <div class="col-md-12 text-center">
            <form action="/data/detail-hitung/" method="post" target="_blank">
               <input type="hidden" id="token" name="token">
               <input type="hidden" id="user" name="user">
               <input type="hidden" id="modul" name="modul">
               <div id="tablekn"></div>
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
