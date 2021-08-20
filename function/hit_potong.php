<?php
define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
include "reader2.php";

$lbr_plano = $_GET['lbr_plano'];
$tinggi_plano = $_GET['tinggi_plano'];
$lbr_pot = $_GET['lbr_pot'];
$tinggi_pot = $_GET['tinggi_pot'];

	if ($tinggi_plano > $lbr_plano){
		$tinggi_plano	= $_GET['lbr_plano'];
		$lbr_plano 		= $_GET['tinggi_plano'];
	}	

		
	$hitpot = hitung($lbr_pot, $tinggi_pot,$lbr_plano,$tinggi_plano );	
	echo json_encode($hitpot);

?>
