<?php
if (empty($_SESSION['g_level'])){
header("Content-Type: application/json");
echo json_encode(array(401 => "error login"));
}else{
if (($referer==$host OR $referer==$_POST['link'])) {
$warnabar = "#4286f4";
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
<div class="modal-header" style="background-color:<?=$warnabar;?>;color:white;">
	<button type="button" class="close" id="pot" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Potong Kertas</h4>
</div>
<div class="modal-body">

                    <div class="row" >
                        <div class="col-md-12">
                                    
                                    <div class="col-md-12">
									<div class="alert2" style="padding:5px; margin-bottom:0px;color:#fff;font-weight:bold"></div>
									<div class="input-group">
									<span class="input-group-addon">Ukuran Plano</span>
 <select name="ukuranbh" id="ukuranbh" class="custom-select form-control" data-ukuranbh="//kalkulator.go/user/api/plano/plano/0" data-valueKey="id" data-displayKey="name" required>	 
</select>
<script>
$("#ukuranbh").filter(function() {
$('select[data-ukuranbh]').each(function() {
  var $select = $(this);
  $select.append('<option value="0">Pilih ukuran plano</option>');
  $.ajax({
    url: $select.attr('data-ukuranbh'),
  }).then(function(options) {
      options.map(function(option) {
      var $option = $('<option>');
      $option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
      $select.append($option);
    });
  });
});
});
</script>
											
                                        </div>

										<div class="form-group">
											<div class="input-group">
											  <span class="input-group-addon">Lebar Bahan</span>
											  <input type="text" class="form-control" aria-label="" id="lbrbh" >
											  <span class="input-group-addon">Tinggi</span>
											  <input type="text" class="form-control" aria-label="" id="tgbh" >
											  <span class="input-group-addon">cm</span>
											</div>
                                        </div>
										<div class="input-group">
											<span class="input-group-addon">Ukuran potong</span>
 <select name="ukuran" id="ukuran" class="custom-select form-control" data-ukuran="//kalkulator.go/user/api/ukuran/brosur/0" data-valueKey="id" data-displayKey="name" required>	 
</select>

<script>
$("#ukuran").filter(function() {
$('select[data-ukuran]').each(function() {
  var $select = $(this);
  $select.append('<option value="0">Pilih ukuran potong</option>');
  $.ajax({
    url: $select.attr('data-ukuran'),
  }).then(function(options) {
      options.map(function(option) {
      var $option = $('<option>');
      $option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
      $select.append($option);
    });
  });
});
});
</script>
                                        </div>  										
										<div class="form-group">
											<div class="input-group">
											  <span class="input-group-addon">Lebar Potong</span>
											  <input type="text" class="form-control" aria-label="" id="lbrpot">
											  <span class="input-group-addon">Tinggi</span>
											  <input type="text" class="form-control" aria-label="" id="tgpot" >
											  <span class="input-group-addon">cm</span>
											</div>
                                        </div>  
                                    </div>  
									
                                    <div class="col-md-12">			
                                        <div class="form-group">
											<button  type="submit" class="btn btn-primary" onclick="potong()">Hitung</button>
                                        </div>                                        
                                    </div>
									<div class="col-md-7">
									<canvas class="photo" id="myCanvas" style="width:100%;border:3px solid #0040ff; background-color:#bfefff;">
									Your browser tidak support untuk menampilkan gambar</canvas>
									
									</div>
									<div class="col-md-5 muat">
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
										<div class="form-group">
										<a id="download" class="btn btn-warning" download="myImage.jpg" href="#" onclick="download_img(this);">Download</a>
										</div>
									</div>
					</div>
				</div>

            </div>      
  <script type="text/javascript">
$(document).ready(function(){
	$('#myCanvas').hide();
	$('#download').hide();
	$('.muat').hide();
	$('.alert2').hide();
	
})
 $("#ukuran").change(function(){
        var ukuran = $(this).val();
        $.ajax({
            url: protocol + '://'+host+'/user/function/cariukuran.php',
            type: 'POST',
            data: {ukuran:ukuran},
            dataType: 'json',
            success:function(response){
			if(response[0]==0.0){
			$('#lbrpot').val(response[0]);
			$('#tgpot').val(response[1]);
			}else{
			$('#lbrpot').val(response[0]);
			$('#tgpot').val(response[1]);
			}
            }
        });
});
$("#ukuranbh").change(function(){
        var ukuran = $(this).val();
        $.ajax({
            url: protocol + '://'+host+'/user/function/cariukuranplano.php',
            type: 'POST',
            data: {ukuran:ukuran},
            dataType: 'json',
            success:function(response){
			if(response[0]==0.0){
			$('#lbrbh').val(response[0]);
			$('#tgbh').val(response[1]);
			}else{
			$('#lbrbh').val(response[0]);
			$('#tgbh').val(response[1]);
			}
            }
        });
});
		
		function potong(){
			var ukuran = $("#ukuran").val();

			var lbrbh = document.getElementById("lbrbh").value;
			var tgbh = document.getElementById("tgbh").value;			
			var lbrpot = document.getElementById("lbrpot").value;
			var tgpot = document.getElementById("tgpot").value;
			
			lbrbh = lbrbh.replace(',', '.');
			tgbh = tgbh.replace(',', '.');
			lbrpot = lbrpot.replace(',', '.');
			tgpot = tgpot.replace(',', '.');
			
			if(ukuran==0 || lbrbh == '0.0' || tgbh == "0.0"){
			$('.alert2').html('Isi dulu datanya!');
				flashIt('.alert2', 10, '_flash', 500)
				$('.alert2').show('slow').delay(2000).hide('slow');
				return;
			}
			
			if(lbrbh == "" || tgbh == "" || lbrpot=="" || tgpot == "" || lbrpot=="0.0" || tgpot == "0.0") {
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
				$('#download').show();
				$('.muat').show();
				jml = myArr[0]['jml'];
				
				luastotal = parseFloat(lbrbh) * parseFloat(tgbh);
				luasterpakai = jml * (parseFloat(lbrpot) * parseFloat(tgpot));
				sisa = luastotal - luasterpakai ;
				persen = sisa / luastotal * 100;
				
				document.getElementById("muat").value =jml;
				document.getElementById("sisa").value = parseFloat(persen).toFixed(2) +"%";
				
				var koor = myArr[0]['koor'].toString();
				var koor_pisah = new Array();
				var koor_pisah = koor.split(',');

				var canvas = document.getElementById("myCanvas");

				canvas.width = (lbrbh * 10)/4;
				canvas.height = (tgbh * 10)/4;
				var ctx = canvas.getContext("2d");
				ctx.fillStyle = "#eeeeee";

				var fLen, i, text, x;
				fLen = koor_pisah.length;
				for (i = 0; i < fLen; i++) {

					var x = new Array();
					var x = koor_pisah[i].split('|');
					
					// rectangle
					ctx.beginPath();
					ctx.lineWidth = "1";
					ctx.strokeStyle = "#ff0000";
					ctx.rect((x[0]/4),(x[1]/4),(x[2]/4),(x[3]/4));  
					ctx.stroke();
				}
				ctx.font='12px Arial';
				ctx.fillStyle = "#000000";
				ctx.textAlign = "center"; 
				ctx.fillText("www.kalkulatorcetak.com",140,15);
				download_img = function(el) {
				var image = canvas.toDataURL("image/jpg");
				el.href = image;
				};
			}
			}
			  xmlhttp.open("GET","function/hit_potong.php?lbr_plano="+lbrbh+"&tinggi_plano="+tgbh+"&lbr_pot="+lbrpot+"&tinggi_pot="+tgpot,true);
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