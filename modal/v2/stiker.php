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


<div class="modal-header" style="background-color:#76bf82;color:#FFF;">
	<button type="button" class="close" id="bu" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title"><?=$row['nama_produk'];?></h4>
</div>
<div class="modal-body" >
<div class="col-md-6" id="ketproduk">
	<div class="row" style="margin-right:5px;margin-left:5px">
		<div class="ket" style="margin:0; padding:5px; line-height: 1.2em;color:#000"><?=$row['keterangan'];?></div>
	</div>
</div>	
<div class="col-md-6" >
                                    
                                    <div class="col-md-12">
									<div class="alert2" style="padding:5px; margin-bottom:0px;color:#fff;font-weight:bold"></div>
									<div class="form-group">
											<div class="input-group">
											  <span class="input-group-addon">Jumlah</span>
											  <input type="text" class="form-control" aria-label="" id="jumlah">
											  <span class="input-group-addon">lbr</span>
											</div>
                                        </div>
									<div class="form-group">
										<div class="input-group">
										<span class="input-group-addon">Bahan</span>
										<?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where modul like '%stiker%' AND pub='Y' ORDER BY id_kategori"); ?>
										<select id="bahanstiker"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
											<option value="," selected>Pilih Jenis Stiker</option>
											<?php while($row=mysql_fetch_array($sql_bhn)){
												?>
												<option value="<?=$row['modul'] . "," . $row['hrg_a3+'];?>"><?=$row['nama_kategori'];?></option>
											<?php } ?>
										</select>	
										</div>
									</div>
										<input type="hidden" class="form-control" aria-label="" id="hargastiker" readonly="readonly">
									
										<div class="form-group">
											<div class="input-group">
											  <span class="input-group-addon">Lebar Bahan</span>
											  <input type="text" class="form-control" aria-label="" id="lbrbh" readonly="readonly">
											  <span class="input-group-addon">Tinggi</span>
											  <input type="text" class="form-control" aria-label="" id="tgbh"   readonly="readonly">
											  <span class="input-group-addon">cm</span>
											</div>
                                        </div>
										
										<div class="form-group">
											<div class="input-group">
											  <span class="input-group-addon">Lebar Potong</span>
											  <input type="text" class="form-control" aria-label="" id="lbrpot" >
											  <span class="input-group-addon">Tinggi</span>
											  <input type="text" class="form-control" aria-label="" id="tgpot" >
											  <span class="input-group-addon">cm</span>
											</div>
                                        </div>  
                                    		
                                        <div class="form-group">
											<button  type="submit" class="btn btn-primary" onclick="potong()">Hitung</button>
                                        </div>                                        
                                    </div>
									<div class="col-md-7">
									<canvas class="photo" id="myCanvas" style="width:100%;border:2px solid #5B8C2A; background-color:#E7F6D9;">
									Your browser tidak support untuk menampilkan gambar</canvas>
									</div>
									<div class="col-md-12 muat">
										<div class="form-group">
										<div class="input-group">
										<span class="input-group-addon">Hasil</span>
										<input type="text" class="form-control" aria-label="" id="muat" >
										</div>
										</div>
										<div class="form-group">
										<div class="input-group">
										<span class="input-group-addon">Bahan Terbuang</span>
										<input type="text" class="form-control" aria-label="" id="sisa" >
										</div>
										</div>										
										<div class="form-group ">
										<div class="input-group">
										<span class="input-group-addon">Jumlah Cetak</span>
										<input type="text" class="form-control" aria-label="" id="pembagian" >
										</div>
										</div>
									</div>
									<div class="col-md-12">
									<h4 style="color: #2E9598;margin-bottom:0px;margin-left:10px" id="hasilhitung"></h4>
									</div>		
					</div>		

</div>
</div>
 
 <script type="text/javascript">
$(document).ready(function(){
	$('#myCanvas').hide();
	$('.muat').hide();
	$('.alert2').hide();
	
})


	$('#bahanstiker').on('change', function() {
		var pecah =  $('#bahanstiker').val().split(",");
			if(pecah[0] == "stikera3"){
				$('#lbrbh').val('32');
				$('#tgbh').val('48');
				$('#hargastiker').val(pecah[1]);
			}else{
				$('#lbrbh').val('120');
				$('#tgbh').val('85');
				$('#hargastiker').val(pecah[1]);
			}
	})

		
		function potong(){
			var lbrbh = document.getElementById("lbrbh").value;
			var tgbh = document.getElementById("tgbh").value;			
			var lbrpot = document.getElementById("lbrpot").value;
			var tgpot = document.getElementById("tgpot").value;
			
			lbrbh = lbrbh.replace(',', '.');
			tgbh = tgbh.replace(',', '.');
			lbrpot = lbrpot.replace(',', '.');
			tgpot = tgpot.replace(',', '.');
			
			
			
			if(lbrbh == "" || tgbh == "" || lbrpot=="" || tgpot == "") {
				//alert("kosong");
				
				$('.alert2').html('Isi dulu datanya!');
				flashIt('.alert2', 10, '_flash', 500)
				$('.alert2').show('slow').delay(2000).hide('slow');
				return;
			}
			
			
			
			if (parseFloat(lbrbh) < parseFloat(tgbh)){
					lbr = lbrbh;
					tg = tgbh;
					lbrbh = tg;
					tgbh = lbr;
			}
			
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				
				myArr = JSON.parse(xmlhttp.responseText);
				
				$('#myCanvas').show();
				$('.muat').show();
				jml = myArr[0]['jml'];
				
				luastotal = parseFloat(lbrbh) * parseFloat(tgbh);
				luasterpakai = jml * (parseFloat(lbrpot) * parseFloat(tgpot));
				sisa = luastotal - luasterpakai ;
				persen = sisa / luastotal * 100;
				
				var jumlah = document.getElementById("jumlah").value;
				
				
				
				var pecah =  $('#bahanstiker').val().split(",");
				if(pecah[0] == "stikera3"){
					var pembagian = Math.ceil(jumlah / jml);
					cariharga(pembagian);
				}else{
					var pembagian = roundToHalf(jumlah / jml);
					var hargastiker = $('#hargastiker').val();
					var total = hargastiker * pembagian;
					$('#hasilhitung').html("Harga Rp. " + hargastiker + " x " + pembagian + " = Rp. " + formatMoney(total));	
				}		
					
				
				document.getElementById("pembagian").value =pembagian;
				document.getElementById("muat").value =jml;
				document.getElementById("sisa").value = parseFloat(persen).toFixed(2) +"%";
				
				var koor = myArr[0]['koor'].toString();
				var koor_pisah = new Array();
				var koor_pisah = koor.split(',');

				var canvas = document.getElementById("myCanvas");

				canvas.width = (lbrbh * 10)/4;
				canvas.height = (tgbh * 10)/4;
				var ctx = canvas.getContext("2d");
				ctx.fillStyle = "#FFFFF";

				var fLen, i, text, x;
				fLen = koor_pisah.length;
				for (i = 0; i < fLen; i++) {

					var x = new Array();
					var x = koor_pisah[i].split('|');
					
					// rectangle
					ctx.beginPath();
					ctx.lineWidth = "1";
					ctx.strokeStyle = "#5D6258";
					ctx.rect((x[0]/4),(x[1]/4),(x[2]/4),(x[3]/4));  
					ctx.stroke();
				}
				ctx.font='12px Arial';
				ctx.fillStyle = "#FFFFF";
				ctx.fillText("www.sayuti.com",10,100);
				
				
				
				
			}
			}
			  xmlhttp.open("GET","function/hit_potong.php?lbr_plano="+lbrbh+"&tinggi_plano="+tgbh+"&lbr_pot="+lbrpot+"&tinggi_pot="+tgpot,true);
			  xmlhttp.send();	
		}
		
function roundToHalf(value) {
   var converted = parseFloat(value); // Make sure we have a number
   var decimal = (converted - parseInt(converted, 10));
   decimal = Math.round(decimal * 10);
   if(converted > 2 && converted < 3){
      return (parseInt(converted, 10)+1);
   }
   if(converted > 0 && converted < 1){
      return (1);
   }
   if (decimal == 5) { return (parseInt(converted, 10)+0.5); }
   if ( (decimal < 1) || (decimal > 5) ) {
      return Math.round(converted);
   } else {
      return (parseInt(converted, 10)+0.5);
   }
} 	
		
		function cariharga(x){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);

				var hargastiker = $('#hargastiker').val();
				var subtotal = parseInt(hargastiker) + parseInt(myArr[0]);
				var total = subtotal * x;
				// $('#hasilhitung').show();
				$('#hasilhitung').html("Harga Rp. " + subtotal + " x " + x + " = Rp. " + formatMoney(total));	
				
				}
			}
			  xmlhttp.open("GET","function/carihargaprint.php?mesin=1&"+"&jmlprint="+x,true);
			  xmlhttp.send();	
			
		}


</script>  
<?php
	}//end token
	else{
echo json_encode(array(404 => "error"));
	}
}
?>