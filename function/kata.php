<?php
//error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1)
{
	echo "<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>";
	exit("Direct access not permitted.");
}

function kata($string, $limit, $break=" ", $pad="...") {
// return with no change if string is shorter than $limit 
if(strlen($string) <= $limit) 
return $string; 
$string = substr($string, 0, $limit); 
if(false !== ($breakpoint = strrpos($string, $break))) { 
$string = substr($string, 0, $breakpoint); } 
return $string . $pad; 
}

?>
