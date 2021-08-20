<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
function rp($angka){
	// $konversi = ''.number_format($angka, 0, ',', '.');
$konversi = number_format($angka,0,',','.');
// $konversi = number_format((int)$angka, 0, ',', '.');
	return $konversi;
}
function cNav($x){
$data = "<button  id='o-nav$x' type='submit' class='btn btn-success hint--top-left' onclick='openNav(\"$x\")' aria-label='Lihat gambar'><i class='ni ni-image'></i></button>
<button  id='c-nav$x' type='submit' class='btn btn-danger  hint--top-left' onclick='closeNav(\"$x\")' aria-label='Tutup gambar'><i class='ni ni-fat-remove'></i></button>";
return $data;
}
function cNavu($x){
$data = "<button  id='o-nav$x' type='submit' class='btn btn-success hint--top-left' onclick='openNav(\"$x\")' aria-label='Lihat gambar'><i class='icon icon-picture-o'></i></button>
<button  id='c-nav$x' type='submit' class='btn btn-danger hint--top-left' onclick='closeNav(\"$x\")' aria-label='Tutup gambar'><i class='icon icon-times'></i></button>";
return $data;
}
function rupiah($angka){
	
	$hasil_rupiah = number_format($angka,2,',','.');
	return $hasil_rupiah;

}

?>