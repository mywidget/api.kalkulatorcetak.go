<?php
define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
header("Content-Type: application/json");
include "../class/conn_db.php";
include "../class/data.inc.php";
include "../class/filter.inc.php";
$ukuran= filterpost('ukuran');
$data = array();
$ArrayUKertas = ArrayUKertas(2);
$value=pilih1Kertas($ArrayUKertas['kertas'],$ukuran);
$data = array(number_format($value['panjang'],1),number_format($value['lebar'],1),);
echo json_encode($data);	

?>