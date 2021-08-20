<?php
if (empty($_SESSION['g_level'])){
header("Content-Type: application/json");
echo json_encode(array(401 => "error login"));
}else{
if (($referer==$host OR $referer==$_POST['link'])) {
$warnabar = "#ed2300";
?>
<style>
._flash {background-color: #fc1144 !important;}
</style>
<script>
$('.modal').on('hidden.bs.modal', function(){
	$(this).removeData('bs.modal');
});
function flashIt(element, times, klass, delay) {
    for (var i = 0; i < times; i++) {
        setTimeout(function () {
            $(element).toggleClass(klass);
        }, delay + (300 * i));
    };
};
</script>

<style>
.modal-dialog{
    width: 50%; /* respsonsive width */
    
}
.form-group {
    margin-bottom: 2px;
}

.input-group-addon {
    font-size: 12px;
}
.form-control {
	padding: 8px;
    font-size: 12px;
}

col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7,  .col-md-8, .col-md-9,.col-md-10,.col-md-11, .col-md-12 {
    padding: 2px;
}
</style>

<div class="modal-header" style="background-color:#A8216B;color:white;">
   <button type="button" class="close" id="am2" data-dismiss="modal" aria-hidden="true">&times;</button>
   <h4 class="modal-title"><?=$row['nama_produk'];?></h4>
</div>
<div class="modal-body" style="margin: 0;padding:0px">
<div class="col-md-6">
		<div style="margin:0; padding:15px;line-height: 1.2em;background-color:#EC1B4B;"><?=$row['keterangan'];?></div>
</div>		
<div class="col-md-6" >
                                    
                                    <div class="col-md-12">
									<div class="alert2" style="padding:5px; margin-bottom:0px;color:#fff;font-weight:bold"></div>
									<div class="form-group">
											<div class="input-group">
											  <span class="input-group-addon">Jumlah Cetak</span>
											  <input type="text" class="form-control" aria-label="" id="jumlah">
											  <span class="input-group-addon">lbr</span>
											</div>
                                        </div>
									<div class="form-group">
										<div class="input-group">
										<span class="input-group-addon">Bahan</span>
										<select id="bahanstiker"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
											<option value="0" selected>Pilih Jenis Stiker</option>
											<option value="1" >Stiker China</option>
											<option value="2" >Stiker 3M</option>
										</select>	
										</div>
									</div>
										<input type="hidden" class="form-control" aria-label="" id="hargastiker" value="60" readonly="readonly">
									
										<div class="form-group">
											<div class="input-group">
											  <span class="input-group-addon">Lebar Stiker</span>
											  <input type="text" class="form-control" aria-label="" id="lbrbh" >
											  <span class="input-group-addon">Tinggi</span>
											  <input type="text" class="form-control" aria-label="" id="tgbh"   >
											  <span class="input-group-addon">cm</span>
											</div>
                                        </div>
										
										<div class="form-group">
											<div class="input-group">
											  <span class="input-group-addon">Jumlah Warna</span>
											  <input type="text" class="form-control" aria-label="" id="jmlwarna" >
											</div>
                                        </div>  
                                    		
                                        <div class="form-group">
											<button  type="submit" class="btn btn-primary" onclick="hitungstiker()">Hitung</button>
                                        </div>                                        
                                    </div>
									
									<div class="col-md-12">
									<h4 style="color: #2E9598;margin-bottom:0px;margin-left:10px" id="hasilhitung"></h4>
									</div>		
					</div>		

</div>
 
 <script type="text/javascript">
$(document).ready(function(){
	$('.alert2').hide();
	


	$('#bahanstiker').on('change', function() {
		var bhn =  $('#bahanstiker').val();
		//alert(bhn);
			if(bhn == "1"){
				$('#hargastiker').val('60');
			}else{
				$('#hargastiker').val('80');
			}
	});

});

function hitungstiker(){
			var lbrbh = document.getElementById("lbrbh").value;
			var tgbh = document.getElementById("tgbh").value;			
			var jmlwarna = document.getElementById("jmlwarna").value;
			var hargastiker = document.getElementById("hargastiker").value;
			var jumlah = document.getElementById("jumlah").value;
			
		//	alert(hargastiker);
			
			if(lbrbh == "" || tgbh == "" || jmlwarna=="") {
				//alert("kosong");
				
				$('.alert2').html('Isi dulu datanya!');
				flashIt('.alert2', 10, '_flash', 500)
				$('.alert2').show('slow').delay(2000).hide('slow');
				// return;
			}
			
		//	alert("a");
			
				
				luastotal = parseFloat(lbrbh) * parseFloat(tgbh) * parseInt(jmlwarna);
				total = luastotal * hargastiker ;
				grantotal = total * jumlah;
				$('#hasilhitung').html("Hasil : " + lbrbh + " x " + tgbh + " x " + jmlwarna + " x " + hargastiker + "  = Rp. " + formatMoney(total)
				+ "</br>Rp. " + formatMoney(total) + " x " + jumlah + " = " + formatMoney(grantotal));		
}
</script>  
<?php
	}//end token
	else{
echo json_encode(array(404 => "error"));
	}
}
?>