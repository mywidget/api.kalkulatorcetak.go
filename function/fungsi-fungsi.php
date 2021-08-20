<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

function rp($angka){
	// $konversi = ''.number_format($angka, 0, ',', '.');
$konversi = number_format((int)$angka, 0, ',', '.');
	return $konversi;
}
// function cNav($x){
// $data = "<button  id='o-nav$x' type='submit' class='btn btn-success' data-toggle='popover' data-placement='left' onclick='openNav(\"$x\")' data-content='Lihat gambar'><i class='fa fa-file-image-o'></i></button>
// <button  id='c-nav$x' type='submit' class='btn btn-warning' data-toggle='popover' data-placement='left' onclick='closeNav(\"$x\")' data-content='Tutup gambar'><i class='fa fa-close'></i></button>";
// return $data;
// }


?>