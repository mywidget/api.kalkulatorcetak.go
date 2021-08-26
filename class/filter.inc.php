<?php 
if (! defined('BASEPATH')) exit('No direct script access allowed');

function filterar($str) {
$str   = filter_input_array(INPUT_POST, $str);
return $str;
}

function filterarr($str) {
$str   = filter_input(INPUT_POST, $str, FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
return $str;
}

function gets($str){
	$str 	= filter_input(INPUT_GET, $str, FILTER_SANITIZE_MAGIC_QUOTES);
	return $str;
}	
//int get
function filterpint($str){
	$str 	= filter_input(INPUT_POST, $str, FILTER_VALIDATE_INT);
	return $str;
}
//int post
function filtergint($str){
	$str 	= filter_input(INPUT_GET, $str, FILTER_VALIDATE_INT);
	return $str;
}

function filterget($str){
	$str 	= filter_input(INPUT_GET, $str, FILTER_SANITIZE_STRING);
	return $str;
}
function filterpost($str){
	$str 	= filter_input(INPUT_POST, $str, FILTER_SANITIZE_STRING);
	return $str;
}
function cleanInput($input) {
 
  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  );
 
    $output = preg_replace($search, '', $input);
    return $output;
  }
function sanitize($input) {
	global $db;
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = cleanInput($input);
        $output = mysqli_real_escape_string($db,$input);
    }
    return $output;
}

function checkint($str){
if (is_numeric($str)){
return;
}else{
	save_alert("error","Data tidak ditemukan");
	die();
}
}
function curl($url, $data){
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $output = curl_exec($ch); 
    curl_close($ch);      
    return $output;
}

function curl_get($url, $data){
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $output = curl_exec($ch); 
    curl_close($ch);      
    return $output;
}

?>