<?php

// include "../conn/referer.php";
if (($referer==$host OR $referer==$host.'index.php') ) {
$warnabar = "orange";
// $level = $_SESSION['leveluser'];
?>

<style>
.modal-dialog{
    width: 25%; /* respsonsive width */
    
}
</style>

<div class="modal-header" style="background-color:#A8216B;color:white;">
   <button type="button" class="close" id="am2" data-dismiss="modal" aria-hidden="true">&times;</button>
   <h4 class="modal-title"><?=$row['nama_produk'];?></h4>
</div>
<div class="modal-body" style="margin: 0;padding:0px">
		<div style="margin:0; padding:15px;line-height: 1.2em;background-color:#EC1B4B;"><?=$row['keterangan'];?></div>
		

</div>
 

<?php
	}//end token

?>