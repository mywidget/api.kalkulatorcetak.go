<?php
//error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1)
{
	echo "<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>";
	exit("Direct access not permitted.");
}
//status informasi pada saat eksekusi database
function alert($type,$text = null){
	if($type=='info'){
		echo "<font color='white'><div class='infofly go-front' id='status'>$text</div></font>";
	}
	else if($type=='error')	{
		echo "<font color='white'><div class='errorfly go-front' id='status'>$text</div></font>";
	}
	else if($type=='download')	{
		echo "<font color='black'><center>$text</center></font>";
	}
	else if($type=='loading')		
		echo "<div id='loading'><center>$text</center></div>";
	
}
function login_alert($type,$text = null){
	if($type=='info'){
		echo "<font color='black'><div class='infofly info_login' id='status'>$text</div></font>";
	}
	else if($type=='error')	{
		echo "<font color='black'><div class='errorfly error_login' id='status'>$text</div></font>";
	}
	else if($type=='loading')		
		echo "<div id='loading'><center>$text</center></div>";
}
function save_alert($type,$text = null){
	if($type=='save'){
	echo"<div class='box-body'><div class='alert alert-success alert-dismissable'>$text</div></div>";
	}
	else if($type=='error')	{
	echo"<div class='box-body'><div class='alert alert-danger alert-dismissable'>$text</div></div>";
	}
	else if($type=='delete')	{
	echo"<div class='alert alert-danger alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<h4><i class='icon fa fa-ban'></i> Alert!</h4>
		$text
		</div>";
	}
	else if($type=='update')
	echo"<div class='box-body'><div class='alert alert-success alert-dismissable'>$text</div></div>";
}
//fungsi redirect menggunakan php
function redirect($url) {
	header("location:".$url);
}

//fungsi redirect menggunakan html
function html1($link,$time = null) {
	if($time) $time = $time; else $time = 1;
	echo "<meta http-equiv='REFRESH' content='$time; url=$link'>";
}
//fungsi redirect menggunakan html
function htmlRedirect($link,$time = null) {
	if($time) $time = $time; else $time = 0;
	echo "<meta http-equiv='REFRESH' content='$time; url=$link'>";
}
//fungsi redirect menggunakan html
function LongRedirect($link,$time = null) {
	if($time) $time = $time; else $time = 3;
	echo "<meta http-equiv='REFRESH' content='$time; url=$link'>";
}
//fungsi redirect menggunakan html
function Redirect_Login($link,$time = null) {
	if($time) $time = $time; else $time = 2;
	echo "<meta http-equiv='REFRESH' content='$time; url=$link'>";
}
//fungsi redirect menggunakan html
function dlRedirect($link,$time = null) {
	if($time) $time = $time; else $time = 5;
	echo "<meta http-equiv='REFRESH' content='$time; url=$link'>";
}

function error_akses_panel(){
$msg = "<div class='row'>
            <div class='col-xs-12'>
              <div class='box box-default'>
                <div class='box-header with-border'>
                  <i class='fa fa-warning'></i>
                  <h3 class='box-title'>Alerts</h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
                  <div class='alert alert-danger alert-dismissable'>
                   
                    <h4><i class='icon fa fa-ban'></i> Alert!</h4>
                    Maaf anda tidak berhak mengakses halaman ini.
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div> <!-- /.row -->";
return $msg;
}
function breadcumb($mod){
	koneksi1_buka();
	$sq = mysql_query("SELECT nama_menu from menuadmin where link='$mod'");
	$n = mysql_fetch_array($sq);
	return $n['nama_menu'];
	koneksi1_tutup();
}
?>
