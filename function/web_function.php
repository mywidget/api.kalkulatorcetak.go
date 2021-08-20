<?php
//error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1)
{
	echo "<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>";
	exit("Direct access not permitted.");
}

function clean($text){
$text = preg_replace('/[^a-zA-Z0-9\s]/', '', strip_tags(html_entity_decode($text)));
return $text;
}
function pisah_kata($kata){
$kata = str_replace("-"," ",$kata);
return $kata;
}
function tags2(){
//global $config,$db,$seo,$access;
$q=mysql_query("SELECT modul FROM `mesin`");
$TampungData = array();
while ($data_tags = mysql_fetch_array($q)) {
$tags = explode(' ',strtolower(trim($data_tags['modul'])));
if(empty($data_tags['modul'])){echo'';}else{
foreach($tags as $val) {
$TampungData[] = $val;
}}}
$totalTags = count($TampungData);
$jumlah_tag = array_count_values($TampungData);
ksort($jumlah_tag);
if ($totalTags > 0) {
$output = array();
foreach($jumlah_tag as $key=>$val) {
$output[] = '<option value="'.$key.'">'.$key.'</options>';
}
$tags= implode(' ',$output);
return $tags;
}}

function tags3($id){
//global $config,$db,$seo,$access;
$q=mysql_query("SELECT modul FROM `mesin` WHERE kdmesin=$id");
$TampungData = array();
while ($data_tags = mysql_fetch_array($q)) {
$tags = explode(',',strtolower(trim($data_tags['modul'])));
if(empty($data_tags['modul'])){echo'';}else{
foreach($tags as $val) {
$TampungData[] = $val;
}}}
$jumlah_tag = array_count_values($TampungData);
ksort($jumlah_tag);
$output = array();
foreach($jumlah_tag as $key=>$val) {
$output[] = '<option selected value="'.$key.'">'.$key.'</options>';
}

$tags= implode(' ',$output);
return $tags;
}

function open($type,$dir){
$open = "
<script type='text/javascript'>
function openKCFinder(field) {
    window.KCFinder = {
        callBack: function(url) {
            field.value = url;
            window.KCFinder = null;
        }
    };
    window.open('../kcfinder/browse.php?type=$type&dir=$dir', 'kcfinder_textbox',
        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
        'resizable=1, scrollbars=0, width=800, height=600,'
    );
}
</script>";
return $open;
}

// function rp($angka){
	// $konversi = ''.number_format($angka, 0, ',', '.');
	// return $konversi;
// }
// function rps($teks){
// $str = str_replace('.', '', $teks);
	// return $str;
// }
// FUNGSI DATE CONVERT
function date_sql($date){
	$exp = explode('-',$date);
	if(count($exp) == 3) {
		$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
	}
	return $date;
}
 
function date_str($date){
	$exp = explode('-',$date);
	if(count($exp) == 3) {
		$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
	}
	return $date;
}
//slash
function date_slash($date){
	$exp = explode('/',$date);
	if(count($exp) == 3) {
		$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
	}
	return $date;
}
//slash to dash
function date_slash_update($date){
	$exp = explode('/',$date);
	if(count($exp) == 3) {
		$date = $exp[0].'-'.$exp[1].'-'.$exp[2];
	}
	return $date;
}
//slash dash to slash y/m/d
function date_slash_2($date){
	$exp = explode('-',$date);
	if(count($exp) == 3) {
		$date = $exp[2].'/'.$exp[1].'/'.$exp[0];
	}
	return $date;
}
//potong kata
function kata($string, $limit, $break=" ", $pad="...") {
// return with no change if string is shorter than $limit 
if(strlen($string) <= $limit) 
return $string; 
$string = substr($string, 0, $limit); 
if(false !== ($breakpoint = strrpos($string, $break))) { 
$string = substr($string, 0, $breakpoint); } 
return $string . $pad; 
}
//date range
function frmDate($date,$code){
        $explode = explode("-",$date);
        $year  = $explode[0];
        $month = (substr($explode[1],0,1)=="0")?str_replace("0","",$explode[1]):$explode[1];
        $dated = $explode[2];
        $explode_time = explode(" ",$dated);
        $dates = $explode_time[0];
        switch($code){
            // Per Object
            case 4: $format = $dates; break;                                                    
            case 5: $format = $month; break;                                                        
            case 6: $format = $year; break;                
        }        
        return $format; 
		}
 function nmonth($month){
        $thn_kabisat = date("Y") % 4;
        ($thn_kabisat==0)?$feb=29:$feb=28;
        $init_month = array(1=>31,    // Januari
                            2=>$feb,    // Feb
                            3=>31,    // Mar
                            4=>30,    // Apr
                            5=>31,    // Mei
                            6=>30,    // Juni
                            7=>31,    // Juli
                            8=>31,    // Aug
                            9=>30,    // Sep
                            10=>31,    // Oct    
                            11=>30,    // Nov
                            12=>31);// Des
        $nmonth = $init_month[$month];
        return $nmonth;
    }
function dateRange($start,$end){
        $xdate    =frmDate($start,4);
        $ydate    =frmDate($end,4);
        $xmonth    =frmDate($start,5);
        $ymonth    =frmDate($end,5);
        $xyear    =frmDate($start,6);
        $yyear    =frmDate($end,6);
        // Jika Input tanggal berada ditahun yang sama
        if($xyear==$yyear){
            // Jika Input tanggal berada dibulan yang sama
            if($xmonth==$ymonth){
                $nday=$ydate-$xdate;
            } else {
                $r2=NULL;
                $nmonth = $ymonth-$xmonth;            
                $r1 = nmonth($xmonth)-$xdate;
                for($i=$xmonth+1;$i<$ymonth;$i++){
                    $r2 = $r2+nmonth($i);
                }
                $r3 = $ydate;
                $nday = $r1+$r2+$r3;
            }
        } else {
            // Jika Input tahun awal berbeda dengan tahun akhir
            $r2=NULL; $r3=NULL;
            $r1=nmonth($xmonth)-$xdate;

            for($i=$xmonth+1;$i<13;$i++){
                $r2 = $r2+nmonth($i);
            }
            for($i=1;$i<$ymonth;$i++){
                $r3 = $r3+nmonth($i);
            }
            $r4 = $ydate;
            $nday = $r1+$r2+$r3+$r4;
        }
        return $nday;
    }
	//end
?>
