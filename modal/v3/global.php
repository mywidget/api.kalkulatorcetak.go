<?php
if (empty($_SESSION['g_level'])){
header("Content-Type: application/json");
echo json_encode(array(401 => "error login"));
}else{
if (($referer==$host OR $referer==$_POST['link'])) {
?>
<script>
$(document).ready(function() {
$('.saveprod').prop('disabled',true);
$('#keterangan').keyup(function(){
$('.saveprod').prop('disabled', this.value == "" ? true : false);     
})
$('.printpenawaran').hide();
$('.saveprod').on('click', function(e) {
    e.preventDefault();
		var keterangan = $("#keterangan").val();
		if (keterangan == "") {
			$('.alerts').addClass('has-error');
			$('.alerts').html('Mohon isi dulu datanya!');
			flashIt('.alerts', 10, '_flash', 500)
			$('.alerts').show('slow').delay(2000).hide('slow');
		}

    $.ajax({
        type: "POST",
        url: 'ajax.php',
        dataType: "json",
		data: {
			hasil: $("#hasil").val(),
			keterangan: $("#keterangan").val(),
			user: $("#user").val(),
			modul: $("#modul").val(),
			sesid: $("#token").val(),
			profits: $("#profits").val(),
			totalh: $("#totalh").val(),
			type: 'simpan_'
		},
        success: function(data) {
		$('.printpenawaran').show();
		$('.alert').html('Data sudah di simpan!');
		flashIt('.alert', 10, '_flash', 500)
		$('.alert').show('slow').delay(2000).hide('slow');
		$('.simpan').hide();
		$('.print').show();
        },
        error: function() {
            alert('Error');
        }
    });
    return false;

});
	$('.printpenawaran').click(function() {
		var value = $("#token").val();
		var urlencode = btoa(value);
		window.open('/penawaran-harga-' + urlencode, '_blank');
	});
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
<div class="modal-body">
<span class="alert"></span>
<span class="alerts"></span>
		<input type="hidden" id="modul" value="<?=$row['modal'];?>">	 
		<input type="hidden" id="hasil" value="">
		<input type="hidden" id="user"  value="<?=$_SESSION['mailuser'];?>">	
		<input type="hidden" id="token">	
		<input type="hidden" id="profits"  value="">
		<input type="hidden" id="totalh" value="">	
	<div class="row" style="margin-right:0px;margin-left:5px" id="ketproduk">
		<span class="more">
		<?=$row['keterangan'];?>
		</span>
	</div>
<div class="modal-footer">
	  <div class="col-md-8">	
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Keterangan
            </span>
            <input type="text" id="keterangan" class="form-control">	
          </div>
        </div>
      </div>
      <div class="col-md-4">	
        <div class="form-group">
<button type="button" class="btn btn-success saveprod">Simpan</button>
<button type="button" class="btn btn-primary printpenawaran"><i class="fa fa-external-link" aria-hidden="true"></i></button>	
        </div>
      </div>
	  
</div>
</div>

 <?php
	}//end token
	else{
echo json_encode(array(404 => "error"));
	}
}
?>