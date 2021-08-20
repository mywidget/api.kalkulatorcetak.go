<?php
// session_start();
//header('Content-Type: application/json');
//require_once "conn/koneksi.php";
include "reader2.php";
//include "function/fungsi-fungsi.php";
require_once "function.php";

//hitungcetak(
// GET('lbrcetak'] = $lbrcetak;
//$lbrcetak = $_GET['lbrcetak'];

$lbr_plano = $_GET['lbr_plano'];
$tinggi_plano = $_GET['tinggi_plano'];
$lbr_pot = $_GET['lbr_pot'];
$tinggi_pot = $_GET['tinggi_pot'];

	if ($tinggi_plano > $lbr_plano){
		$tinggi_plano	= $_GET['lbr_plano'];
		$lbr_plano 		= $_GET['tinggi_plano'];
	}	



		
	$hitpot = hitung($lbr_pot, $tinggi_pot,$lbr_plano,$tinggi_plano );	
//	echo json_encode($hitpot) . "<br>";
	$hasil = json_encode($hitpot[0]['jml']);
//	echo json_encode($hitpot[0]['koor']);
	
?>
<html>
<body>

<canvas id="myCanvas" width="<?=($lbr_plano * 10)/2;?>" height="<?=($tinggi_plano * 10)/2;?>" style="border:2px solid #5B8C2A; background-color:#B5ED7D;">
Your browser tidak support untuk menampilkan gambar</canvas>

<script>

var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");



var koor = <?php echo json_encode($hitpot[0]['koor']);?>.toString();
var koor_pisah = new Array();
var koor_pisah = koor.split(',');

var canvas = document.getElementById("myCanvas");
var ctx = canvas.getContext("2d");
ctx.fillStyle = "#000000";


var fLen, i, text, x;
fLen = koor_pisah.length;
for (i = 0; i < fLen; i++) {

	var x = new Array();
	var x = koor_pisah[i].split('|');
	
	// rectangle
	ctx.beginPath();
	ctx.lineWidth = "1";
	ctx.strokeStyle = "white";
	ctx.rect((x[0]/2),(x[1]/2),(x[2]/2),(x[3]/2));  
	ctx.stroke();
	

}
ctx.font='18px Arial';
ctx.fillText("<?='Ukuran bahan : ' . $tinggi_plano . ' x ' . $lbr_plano ;?>",10,30);
ctx.fillText("<?='Ukuran potong : ' . $lbr_pot . ' x ' . $tinggi_pot;?>",10,50);
ctx.fillText("<?='Hasil : ' . $hasil;?>",10,70);
ctx.font='12px Arial';
ctx.fillStyle = "#FFFFF";
ctx.fillText("www.kalkulatorcetak.com",10,250);












</script>


</body>
</html>
