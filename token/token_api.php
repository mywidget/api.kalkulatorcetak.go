<?php
error_reporting(0);
define("BASEPATH", '');
header("Access-Control-Allow-Origin: *");

include "../class/filter.inc.php";
$mods = filterpost('modul');
$app_id = filterpost('appid');
if(!empty($mods)){
include "../class/conn_db.php";
include "../class/fungsi-fungsi.php";
include "../class/data.inc.php";
include "../class/lib/function.php";
$host = "https://api.kalkulatorcetak.go";
	$x = "?".$mods;$var=decode($x);
	$mod = (isset($var['rowid']) ? $var['rowid'] : '');
	$uid = (isset($var['uid']) ? $var['uid'] : '');
	$link = (isset($_POST['link']) ? $_POST['link'] : '');
	$namamod = (isset($_POST['namamod']) ? $_POST['namamod'] : '');
	$warna = (isset($_POST['warna']) ? $_POST['warna'] : '');

$sql = $db->query("SELECT * FROM `data_biaya` WHERE id_user='$uid'");
$rows=$sql->fetch_array();
$dataJson = $rows['data_json'];
$ARRAY = json_decode($dataJson);

foreach ($ARRAY->biaya as $item) {
    if ($item->KdBiaya == '66') {
        $HargaLebih = $item->HargaLebih;
        break;
    }
}
	$arrayb = ArrayBiaya($uid);
	$rowc = pilihBiaya($arrayb['biaya'], 101);

function nota($uid,$vals){
	global $db;
$arrays = ArrayKertas($uid);
foreach ($arrays['katbahan'] as $current_key => $current_array) {
	$modz = explode(" ",$current_array['modul']);
	foreach ($modz as $key => $val) {
		if($val==$vals){
		$datas = array("id"=>$current_array['id_kategori'],"name"=>$current_array['nama_kategori']);
return $datas;
}
	}
}
}

	echo "<script>
	var protocol = window.location.href.indexOf('https://') == 0 ? 'https' : 'http';
var host = '$host';
	var link = '$link';
	var app_id = '$app_id';
	var ajaxAntri = $({});
$.ajaxAntri = function(ajaxOpts) {
  // Hold the original complete function
  var oldComplete = ajaxOpts.complete;

  // Queue our ajax request
  ajaxAntri.queue(function(next) {
    // Create a complete callback to invoke the next event in the queue
    ajaxOpts.complete = function() {
      // Invoke the original complete if it was there
      if (oldComplete) {
        oldComplete.apply(this, arguments);
      }

      // Run the next query in the queue
      next();
    };

    // Run the query
    $.ajax(ajaxOpts);
  });
};

	var level = '';
	var mod = '$mod';
	var app_mod = '#app_'+mod;
	var ch_mod = '#id_'+mod;
	var id_mod = 'id_'+mod;
	$('#hargamincov').val('$rowc[HargaMin]');
	$('#hargalebcov').val('$rowc[HargaLebih]');
	$('#jmlmincov').val('$rowc[JumlahMin]');
	$('#user').val('');
	$('#token').val('$app_id');
	$('#modul').val(mod);
	function salert(sicon,stitle,stext){
Swal.fire({
  icon: sicon,
  title: stitle,
  html: stext,
  footer: '<a href=\"#\">Mengapa saya memiliki masalah ini?</a>'
});
}
function CustomStyle() {
				$.ajax({
					url: host + '/custom/',
					data: {
						link: link
					},
					type: 'POST',
					dataType: 'html',
					success: function(res) {
						$('#customstyle').html(res);
					}
				})
}
	</script>";	

$pathFile = "../modal/v3/".$mod.".php";
$pathFileJs = "../js/".$mod."_js.php";
if (file_exists($pathFile))
{
	include $pathFile;
if (file_exists($pathFileJs))
{
	include $pathFileJs;
}
	// echo $htnl;
echo "<script>$('#modal-footer').removeClass('d-none');</script>";	
}else{
echo "<script>$('#modal-footer').addClass('d-none');</script>";	
	include "../modal/error_modal.php";
}
 }else{
header("Content-Type: application/json");
echo json_encode(array(404 => "error")); }
