<?php
define("BASEPATH", '');
// define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
// error_reporting(0);
header("Access-Control-Allow-Origin: *");
session_start();
include "class/filter.inc.php";
$mod = filterpost('modul');
if($mod){
include "../class/conn_db.php";
include "../class/referer.php";
include "../class/fungsi-fungsi.php";
include "../class/data.inc.php";
include "../class/lib/function.php";
	$x = "?".$mod;
	$var=decode($x);
	$modul = (isset($var['rowid']) ? $var['rowid'] : '');
	$modfile = (isset($_POST['modfile']) ? $_POST['modfile'] : '');
	$ssid = session_id();
$pathFile = "../modal/v2/video.php";
if (file_exists($pathFile))
{
	if($modfile=='video'){
	include $pathFile;
	}elseif($modfile=='modul'){
	include "../modal/error.php";
	}else{
	include "../modal/error.php";
	}
}else{
echo json_encode(array(404 => "error"));
	//include "modal/global.php";
}
 }else{
echo json_encode(array(404 => "error")); }
?>
