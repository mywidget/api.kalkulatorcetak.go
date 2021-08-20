<?php
if (empty($_SESSION['g_level'])){
header("Content-Type: application/json");
echo json_encode(array(401 => "error login"));
}else{
if (($referer==$host OR $referer==$_POST['link'])) {
$warnabar = "#55aa5f";

?>
<style>
.test{
    width:100%;
    height:130px;
    display:block;
    padding:5px;
    overflow:hidden;
}
#more a{color:#000;}
#more a:hover{color:#000;}
</style>
<div class="modal-header" style="background-color:#76bf82;color:#FFF;">
	<button type="button" class="close" id="bu" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title"><?=$row['nama_produk'];?></h4>
</div>
<div class="modal-body" >
<div class="col-md-7" >
	<div class="row " style="margin-right:10px;margin-left:5px">
		<div class="ket" style="margin:0; padding:15px; line-height: 1.2em;color:#000">
	<div class="test">
		<?=$row['keterangan'];?>
	</div>
	<a id="more" href="#">detail...</a>
	</div>
</div>
</div>
<script>
$('#more').click(function(e) {
    e.stopPropagation();
    $('.test').css({
        'height': 'auto'
    })
});

$(document).click(function() {
    $('.test').css({
        'height': '130px'
    })
})
</script>
<div class="col-md-5">
		<div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon warning">Ketik Hurufnya
            </span>
            <input type="text" class="form-control" aria-label="" id="ketikan" autofocus>
            </span>
          </div>
        </div>
        </div>
		
		<div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Jumlah Huruf
            </span>
            <input type="text" class="form-control" aria-label="" id="jumlah" value="0" readonly="readonly">
            <span class="input-group-addon">Tinggi Huruf
            </span>
            <input type="number" class="form-control" aria-label="" id="tinggi">
            <span class="input-group-addon">cm
            </span>
          </div>
        </div>  
        </div>  
		

		<div class="col-md-12">
        <div class="form-group">
		<div class="input-group">
		 <span class="input-group-addon">Model Huruf
            </span>
          <select id="j_huruf" class="selectpicker form-control" data-style="btn-warning">
            <option value="1">Galvanis
            </option>
            <option value="2">Stainless Steel
            </option>
            <option value="3">Kuningan
            </option>            
			<option value="4">Pinggir Galvanis Depan Akrilik & Lampu
            </option>
            <option value="5">Pinggir Stainless Depan Akrilik & Lampu
            </option>
			<option value="6">Full Akrilik 
            </option>
			<option value="7">Full Akrilik & Lampu
            </option>
			<option value="8">Acrylic Solid Cutting Laser 2mm
            </option>
			<option value="9">Acrylic Solid Cutting Laser 3mm
            </option>			
			<option value="10">Acrylic Solid Cutting Laser 5mm
            </option>			
			<option value="11">Acrylic Solid Cutting Laser 10mm
            </option>
			<option value="12">Acrylic Solid Cutting Laser 15mm
            </option>
          </select>
        </div>
        </div>
      </div>
	  
		<div class="col-md-12 lebarlogo">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Lebar/Tinggi logo terpanjang
            </span>
            <input type="text" class="form-control" aria-label="" id="lebarlogo" value="0">
            <span class="input-group-addon">cm
            </span>
          </div>
        </div>  
        </div>  


      <div class="col-md-4">	
        <div class="form-group" >
          <button  style="height:34px; background-color: #2E9598;padding:3px;" type="submit" class="btn btn-primary" onclick="hitung()" >Hitung
          </button>
        </div>
      </div>
	  <div class="col-md-8">
			<h4 style="color: #2E9598;margin-bottom:0px" id="hasilhitung"></h4>
	  </div> 
</div> 
</div> 


<script type="text/javascript">
$(document).ready(function(){
	$('#tinggi').val('30');
	$('#j_huruf').val('1');	
	$('#hasilhitung').hide();	

})


$('#ketikan').keyup(function(){
	var mystring = $('#ketikan').val();
	jml = mystring.replace(/\s/g, "").length;
    $('#jumlah').val(jml);
});	

function hitung(){
	
		var jumlah = parseFloat(document.getElementById("jumlah").value) ;
		var tinggi = parseFloat(document.getElementById("tinggi").value) ;
		var jenis = parseFloat(document.getElementById("j_huruf").value) ;
		
		var lebarlogo = parseFloat(document.getElementById("lebarlogo").value) ;
		
		if (jenis == '1'){
			var harga = 14000;
		}else if(jenis == '2'){
			var harga = 15000;
		}else if(jenis == '3'){
			var harga = 17000;
		}else if(jenis == '4'){
			var harga = 19000;
		}else if(jenis == '5'){
			var harga = 21000;
		}else if(jenis == '6'){
			var harga = 16000;
		}else if(jenis == '7'){
			var harga = 17000;
		}else if(jenis == '8'){
			var harga = 200;
		}else if(jenis == '9'){
			var harga = 2800;
		}else if(jenis == '10'){
			var harga = 4300;
		}else if(jenis == '11'){
			var harga = 7500;
		}else{
			var harga = 10000;
		}		
		
		var hasillogo = parseFloat(lebarlogo) * parseFloat(harga) * 2;
		var hasil = jumlah * tinggi * harga;
		
		var total = parseInt(hasil) + parseInt(hasillogo);
		
		
		$('#hasilhitung').show();
		$('#hasilhitung').html("Harga Rp. " + formatMoney(total));
		
}


</script>
		
		
<?php
	}//end token
	else{
echo json_encode(array(404 => "error"));
	}
}
?>