<?php
if (empty($_SESSION['g_level'])){
header("Content-Type: application/json");
echo json_encode(array(401 => "error login"));
}else{
if (($referer==$host OR $referer==$_POST['link'])) {
$warnabar = "#ed2300";
?>
<div class="modal-header" style="background-color:#A8216B;color:white;">
   <button type="button" class="close" id="am2" data-dismiss="modal" aria-hidden="true">&times;</button>
   <h4 class="modal-title">UPGRADE</h4>
</div>
<div class="modal-body" style="margin:0;padding:0px">
		<div style="margin:-35px 0 0 0">
                <div class="col-md-6">                           
                    <div class="price_table_container">
                        <div class="price_table_body">
                            <div class="price_table_row cost primary-bg"><strong>15 K</strong><span>/BULAN</span></div>
                            <div class="price_table_row">Semua Produk</div>
                            <div class="price_table_row">Database</div>
                            <div class="price_table_row">Save & Cetak Hitungan</div>
                            <div class="price_table_row">Gratis Backup</div>
                            <div class="price_table_row">Cetak Penawaran</div>                                                
                            <div class="price_table_row">Logo Sendiri</div>                                                
                        </div>
                        <a data-toggle="modal" href="#bulanan" data-dismiss="modal" class="btn btn-primary btn-lg btn-block">Upgrade</a>
                    </div>
                </div>
                <div class="col-md-6">        
                    <div class="price_table_container">
                        <div class="price_table_body">
                            <div class="price_table_row cost success-bg"><strong>300 K</strong><span>/TAHUN</span></div>
                            <div class="price_table_row">Semua Produk</div>
                            <div class="price_table_row">Database</div>
                            <div class="price_table_row">Save & Cetak Hitungan</div>
                            <div class="price_table_row">Gratis Backup</div>
                            <div class="price_table_row">Cetak Penawaran</div>                                                
                            <div class="price_table_row">Logo Sendiri</div>                                                
                        </div>
                        <a data-toggle="modal" href="#tahunan" data-dismiss="modal" class="btn btn-success btn-lg btn-block">Upgrade</a>
                    </div>
                </div>
</div>
</div>
<div class="modal" id="bulanan" data-backdrop="static">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Upgrade</h4>
        </div><div class="container"></div>
        <div class="modal-body">
		<form  method="post" action="upgrade_proses.php?<?=paramEncrypt("type=type1");?>">
		<div class="form-group">
		<input type="hidden" name="paket" value="2">
		<input type="hidden" name="type1" value="type1">
        <input type="email" class="form-control" name="email" id="email" value="<?=$_SESSION['mailuser'];?>" rel="txtTooltip" data-toggle="tooltip" title="email" readonly />
		 <span id="check-e"></span>
        </div>
		<div class="form-group">
        <select name="durasi" id="durasi" class="form-control" onchange="hitung()">
		<option value="0">- Pilih - </option>
		<option value="6">6 Bulan</option>
		</select>
        </div>
		<div class="form-group">
        <input type="text" class="form-control" name="harga" id="harga" value="" readonly />
		 <span id="check-e"></span>
        </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn btn-danger">Tutup</a>
		  <input type="submit" value="submit" value="upgrade" class="btn btn-primary">
        </div>
        </form>
        </div>

      </div>
    </div>
</div>
<div class="modal" id="tahunan" data-backdrop="static">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Upgrade</h4>
        </div><div class="container"></div>
        <div class="modal-body">
		<form class="form-signin" method="post" action="upgrade_proses.php?<?=paramEncrypt("type=type2");?>">
		<div class="form-group">
		<input type="hidden" name="paket2" value="3">
		<input type="hidden" name="type2" value="type2">
        <input type="email" class="form-control" name="email2" id="email2" value="<?=$_SESSION['mailuser'];?>" rel="txtTooltip" data-toggle="tooltip" title="email" readonly />
		 <span id="check-e"></span>
        </div>
		<div class="form-group">
        <select name="durasi2" id="durasi2" class="form-control" onchange="hitung2()">
		<option value="0">- Pilih - </option>
		<option value="1">1 Tahun</option>
		<option value="2">2 Tahun</option>
		<option value="3">3 Tahun</option>
		</select>
        </div>
		<div class="form-group">
        <input type="text" class="form-control" name="harga" id="harga2" value="" readonly />
		 <span id="check-e"></span>
        </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn btn-danger">Tutup</a>
		  <input type="submit" value="submit" value="upgrade" class="btn btn-primary">
        </div>
        </form>
        </div>
      </div>
    </div>
</div>
  <script type="text/javascript">
function hitung() {
    var durasi = document.getElementById("durasi").value;
    document.getElementById("harga").value = durasi*26000;
}
function hitung2() {
    var durasi = document.getElementById("durasi2").value;
    document.getElementById("harga2").value = durasi*300000;
}
</script> 
<?php
	}//end token
	else{
echo json_encode(array(404 => "error"));
	}
}
?>