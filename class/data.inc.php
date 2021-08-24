<?php 
	if (! defined('BASEPATH')) exit('No direct script access allowed');
	
	function count_hitung_dua($id,$modul){
		global $db;
		$sql = $db->query("SELECT * FROM `data_counter` WHERE  id_user='$id'");
		
		$rows=$sql->fetch_array();
		$dataJson = $rows['data_json'];
		$ARRAY = json_decode($dataJson);
		
		foreach ($ARRAY->counter as $item) {
			if ($item->tag_mod == $modul) {
				$slug = $item->slug;
				$counter = $item->count_hitung;
				break;
			}
		}
		
		$sql = $db->query("SELECT * FROM `data_counter` WHERE  id_user='$id'");
		$rows=$sql->fetch_array();
		$dataJson = $rows['data_json'];
		$data = json_decode($dataJson);
		$valdata = $data->counter;
		foreach ($valdata as $key => $entry) {
			if ($entry->tag_mod == $modul) {
				$valdata[$key]->count_hitung = $counter +1;
			}
		}
		
		$update = json_encode($data);
		$db->query("UPDATE `data_counter` set data_json='$update' where  id_user='$id'");
		// return $update;
	}
	function cek_pembelian($id){
		global $db;
		$sel_prod = $db->query("SELECT 
		`gtbl_user`.`id_user`,
		`pembelian`.`status`,
		`pembelian`.`id_user`
		FROM
		`gtbl_user`
		INNER JOIN `pembelian` ON (`gtbl_user`.`id_user` = `pembelian`.`id_user`)
		WHERE
		`pembelian`.`end_date` > NOW() AND `pembelian`.`id_user`='$id'
		GROUP BY
		pembelian.status,
		pembelian.id_user");
		if($sel_prod->num_rows >0){
			$row=$sel_prod->fetch_array();
			if($row['status']==0){
				return 0;
				}elseif($row['status']==1){
				return 1;
				}elseif($row['status']==2){
				return 2;
				}else{
				return 3;
			}
			}else{
			return 3;
		}
	}
	function generate_id() {
		$s = '';
		for ($i = 0; $i < 5; $i++) {
			if ($s) {
				$s .= '-';
			}
			$s .= bin2hex(openssl_random_pseudo_bytes(2));
		}
		return $s;
	}
	
	function AppDomain(){
		global $db;
		$sql_cek = $db->query("SELECT * FROM `setting` where name='site_name'");
		$rows=$sql_cek->fetch_assoc();
		$data = array('site_name'=>$rows['value']);
		return $data;
	}
	function cekAPPId($val){
		global $db;
		$sql_cek = $db->query("SELECT * FROM api_key where app_id='$val' AND pub='0'");
		if($sql_cek->num_rows>0){
			$rows=$sql_cek->fetch_assoc();
			$data = array('status'=>1,'appid'=>$rows['app_id'],'appsecret'=>$rows['app_secret'],'appdomain'=>$rows['domain'],'appexp'=>$rows['expire'],'id'=>$rows['id_user']);
			}else{
			$data = array('status'=>0,'appid'=>'','appsecret'=>'','appdomain'=>'','appexp'=>'','id'=>0);
		}
		return $data;
	}
	
	function cekUser($val){
		global $db;
		$sql_bhn = $db->query("SELECT * FROM gtbl_user where email='$val' AND aktif='Y' OR id_user='$val' AND aktif='Y'");
		if($sql_bhn->num_rows>0){
			$rows=$sql_bhn->fetch_assoc();
			$data = array('status'=>1,'email'=>$rows['email'],'lv'=>$rows['level'],'id'=>$rows['id_user']);
			}else{
			$data = array('status'=>0,'email'=>'','lv'=>'','id'=>0);
		}
		return $data;
	}
	
	function cekApi($app_secret,$app_id){
		global $db;
		$sql_bhn = $db->query("SELECT 
		`gtbl_user`.`nama_lengkap`,
		`gtbl_user`.`email`,
		`gtbl_user`.`level`,
		`gtbl_user`.`id_user`,
		`api_key`.`app_id`,
		`api_key`.`domain`,
		`api_key`.`expire`,
		`gtbl_user`.`app_secret`
		FROM
		`api_key`
		INNER JOIN `gtbl_user` ON (`api_key`.`id_user` = `gtbl_user`.`id_user`) where `gtbl_user`.`app_secret`='$app_secret' AND `api_key`.`app_id`='$app_id' AND `api_key`.`pub`='0'");
		if($sql_bhn->num_rows>0){
			$rows=$sql_bhn->fetch_assoc();
			$data = array('status'=>1,'appid'=>$rows['app_id'],'appsecret'=>$rows['app_secret'],'appdomain'=>$rows['domain'],'appexp'=>$rows['expire'],'id'=>$rows['id_user'],'lvl'=>$rows['level']);
			}else{
			$data = array('status'=>0,'appid'=>'','appsecret'=>'','appdomain'=>'','appexp'=>'','id'=>0);
		}
		return $data;
	}
	function cekApiDomain($app_secret,$app_id,$domain){
		global $db;
		$sql_bhn = $db->query("SELECT 
		`gtbl_user`.`nama_lengkap`,
		`gtbl_user`.`email`,
		`gtbl_user`.`level`,
		`gtbl_user`.`id_user`,
		`api_key`.`app_id`,
		`api_key`.`domain`,
		`api_key`.`expire`,
		`gtbl_user`.`app_secret`
		FROM
		`api_key`
		INNER JOIN `gtbl_user` ON (`api_key`.`id_user` = `gtbl_user`.`id_user`) 
		");
		if($sql_bhn->num_rows>0){
			$rows=$sql_bhn->fetch_assoc();
			$data = array('status'=>1,'appid'=>$rows['app_id'],'appsecret'=>$rows['app_secret'],'appdomain'=>$rows['domain'],'appexp'=>$rows['expire'],'id'=>$rows['id_user'],'lvl'=>$rows['level']);
			}else{
			$data = array('status'=>0,'appid'=>'','appsecret'=>'','appdomain'=>'','appexp'=>'','id'=>0);
		}
		return $data;
	}
	function mMenu($url,$title,$icon){
		$html = '<li><a href="?'.protek(1,$url).'" data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$title.'"><i class="'.$icon.'"></i></a></li>';
		return $html;
	}
	
	function GMenu($module,$view,$index){
		$html = '<li><a href="?'.ShortMenu('page=home').'" data-toggle="tooltip" data-placement="top" data-original-title="Beranda"><i class="icon-home"></i></a></li>';
		$html .= '<li><a href="?'.ShortMenu('page='.$module).'" data-toggle="tooltip" data-placement="top" data-original-title="Kembali"><i class="icon-arrow-left4"></i></a></li>';
		$html .= '<li><a href="?'.ShortMenu("page=data&act=detail&view=".$view."&index=".$index."&ed=tambah&id=0").'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah"><i class="icon-plus"></i></a></li>';
		return $html;
	}
	function form($module,$act,$view,$index,$ed,$id){
		$html = '<form role="form" method="POST" action="?'.ShortMenu("page=".$module."&act=".$act."&view=".$view."&index=".$index."&ed=".$ed."&id=".$id).'">';
		return $html;
	}
	function BMenu($module,$view,$index){
		$html = '<ul class="list-inline mb-0">';
		$html .= '<li><a href="?'.ShortMenu('page='.$module).'" data-toggle="tooltip" data-placement="top" data-original-title="Kembali"> <i class="icon-arrow-left4"></i></a></li>';
		$html .= '<a href="?'.ShortMenu('page='.$module.'&act=detail&view='.$view.'&index='.$index).'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tutup"> <i class="icon-cross2"></i> </a>';
		$html .= '<li class="ml-1"><button type="submit" name="simpan" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Simpan">Simpan</button></li>';
		
		$html .= '</ul>';
		return $html;
	}
	
	function ArrayKertas($id){
		global $db;
		$sql_bhn = $db->query("SELECT * FROM data_katbahan where id_user='$id' AND publish='0'");
		$rows=$sql_bhn->fetch_assoc();
		$data = json_decode($rows['data_json'],true);
		return $data;
	}
	function pilihKertas($array,$str,$classid){
		echo '<select id="'.$classid.'"  class="custom-select form-control" data-style="btn-info" data-size="auto" data-placeholder="Pilih Bahan" required="required">';
		foreach ($array as $current_key => $current_array) {
			$mod = explode(" ",$current_array['modul']);
			foreach ($mod as $key => $val) {
				if($val==$str){
					echo '<option value="'.$current_array['id_kategori'].'">'.$current_array['nama_kategori'].'</option>';
				}
			}
		}
		echo '</select>';
	}
	
	function pilihKertas2($array,$id,$str,$classid){
		$data='';
		$data.= '<select id="'.$classid.'"  class="custom-select form-control" data-style="btn-info" data-size="auto" data-placeholder="Pilih Bahan" required="required">';
		foreach ($array as $current_key => $current_array) {
			$mod = explode(" ",$current_array['modul']);
			foreach ($mod as $key => $val) {
				if($val==$str){
					if($current_array['id_kategori']==$id){
						$data .= '<option value="'.$current_array['id_kategori'].'" selected>'.$current_array['nama_kategori'].'</option>';
						}else{
						$data .= '<option value="'.$current_array['id_kategori'].'">'.$current_array['nama_kategori'].'</option>';
					}
				}
			}
		}
		$data .= '</select>';
		return $data;
	}
	
	function pilihBahan($array,$str){
		foreach ($array as $current_key => $current_array) {
			$data =array();
			if($current_array['id_kategori']==$str){
				$data = array('idk'=>$current_array['id_kategori'],'nama_kategori'=> $current_array['nama_kategori'],'harga'=> $current_array['hrg_a3']);
				return $data;
			}
		}
	}
	
	function pilihUKBahan($array,$str){
	// $object = json_decode(json_encode($array));
		foreach ($array as $key => $val) {
			if($val->Kd_Bhn==$str AND $val->publish=='Y'){
				$data[] = array("Kd_Bhn"=>$val->Kd_Bhn,"Nm_Bhn"=>$val->Nm_Bhn,"Harga_Bahan"=>$val->Harga_Bahan,"Tebal"=>$val->Tebal,"Tinggi"=>$val->Tinggi,"Lebar"=>$val->Lebar);
			}
		}
		return $data;
	}
	function biaya($id){
		global $db;
		$sqlb = $db->query("SELECT * FROM `tbl_biaya` where KdBiaya='$id'");
		$row = $sqlb->fetch_array();
		echo $row['HargaMin'];
	}
	///
	function ArrayBiaya($id){
		global $db;
		$sql_bhn = $db->query("SELECT * FROM data_biaya where id_user='$id' AND publish='0'");
		$rows=$sql_bhn->fetch_assoc();
		$data = json_decode($rows['data_json'],true);
		return $data;
	}
	function pilihBiaya($array,$str){
	// print_r($array);
		$data =array();
		if(!empty($str) OR $str > 0){
			foreach ($array as $current_key => $current_array) {
				if($current_array['KdBiaya']==$str){
					$data = array(
					'HargaMin'=> (int)$current_array['HargaMin'],
					'HargaLebih'=> (int)$current_array['HargaLebih'],
					'JumlahMin'=> (int)$current_array['JumlahMin'],
					'Nama_Biaya'=> $current_array['Nama_Biaya'],
					'Grup'=> $current_array['Groups']
					);
				}
			}
			}else{
			$data = array(
					'HargaMin'  => 0,
					'HargaLebih'=> 0,
					'JumlahMin' => 0,
					'Nama_Biaya'=> 0,
					'Grup'      => 0
					);
		}
		return $data;
	}
	function pilihBiaya2($array,$str1,$str2){
		foreach ($array as $current_key => $current_array) {
			$data =array();
			if($current_array['KdBiaya']==$str1 AND $current_array['Groups']==''){
				$data = array(
				'HargaMin'=> (int)$current_array['HargaMin'],
				'HargaLebih'=> (int)$current_array['HargaLebih'],
				'JumlahMin'=> (int)$current_array['JumlahMin'],
				'Nama_Biaya'=> $current_array['Nama_Biaya'],
				'Grup'=> $current_array['Groups']
				);
				return $data;
				}elseif($current_array['KdBiaya']==$str1 AND $current_array['Groups']==$str2){
			}
		}
	}
	function ArrayMesinz($id){
		global $db;
		$sql_bhn = $db->query("SELECT * FROM data_mesin where id_user='$id' AND publish='0'");
		$rows=$sql_bhn->fetch_assoc();
		$data = json_decode($rows['data_json'],true);
		return $data;
	}
	function ArrayMesin($id){
		global $db;
		$sql_bhn = $db->query("SELECT * FROM data_mesin where id_user='$id' AND publish='0'");
		$rows=$sql_bhn->fetch_assoc();
		$data = $rows['data_json'];
		return $data;
	}
	
	function pilihJMesin($array,$str,$classid){
		echo '<select id="'.$classid.'"  class="custom-select form-control" data-style="btn-info" data-size="auto" data-placeholder="Pilih Mesin" required="required">';
		foreach ($array as $current_key => $current_array) {
			$mod = explode(" ",$current_array['modul']);
			foreach ($mod as $key => $val) {
				if($val==$str){
					echo '<option value="'.$current_array['kdmesin'].'">'.$current_array['namamesin'].'</option>';
				}
			}
		}
		echo '</select>';
	}
	function pilihIDMesin($array,$str,$classid){
		echo '<select id="'.$classid.'"  name="'.$classid.'" class="custom-select form-control" data-style="btn-info" data-size="auto" data-placeholder="Pilih Mesin" required="required">';
		foreach ($array as $key => $val) {
			if($val['kdmesin']==$str){
				echo '<option value="'.$val['kdmesin'].'" selected>'.$val['namamesin'].'</option>';
				}else{
				echo '<option value="'.$val['kdmesin'].'">'.$val['namamesin'].'</option>';
			}
		}
		echo '</select>';
	}
	function pilihMesin($array,$str){
		foreach ($array as $current_key => $current_array) {
			$data =array();
			if($current_array['kdmesin']==$str AND $current_array['aktif']=='Y'){
				$data = array(
				'HargaMin'=> (int)$current_array['HargaMin'],
				'HargaLebih'=> (int)$current_array['HargaLebih'],
				'JumlahMin'=>(int)$current_array['JumlahMin'],
				'Nama_Biaya'=> $current_array['Nama_Biaya']
				);
				return $data;
			}
		}
	}
	function pilihM3($products,$search_filter){
		if(!empty($search_filter)) {
            $filtered_products = array();
            foreach($products as $product) {
                if($product['aktif']=='Y') {
                    if( ( strpos($product['modul'], $search_filter) !== false || strpos($product['modul'], ucwords($search_filter)) !== false || strpos($product['modul'], ucfirst($search_filter)) !== false || strpos($product['modul'], strtoupper($search_filter)) !== false || $product['modul'] == $search_filter)) {
						// $filtered_products[] = $product;
						$filtered_products[] = array(
						"kdmesin"         => $product['kdmesin'],
						"jmesin"          => $product['jenis_mesin'],
						"hargamin"        => (int)$product['hargamin'],
						"jumlahmin"       => (int)$product['jumlahmin'],
						"hargalebih"      => (int)$product['hargalebih'],
						"lebarkertas"     => (int)$product['lebarkertas'],
						"panjangkertas"   => (int)$product['panjangkertas'],
						"lebarcetak"      => (int)$product['lebarcetak'],
						"panjangcetak"    => (int)$product['panjangcetak'],
						"min_lebar"       => (int)$product['min_lebar'],
						"min_panjang"     => (int)$product['min_panjang'],
						"hargactp"        => (int)$product['hargactp'],
						"namamesin"       => $product['namamesin'],
						"replat"          => (int)$product['replat'],
						"biayabbplatsama" => $product['biayabbplatsama'],
						"tarikan"         => $product['tarikan'],
						"aktif"           => $product['aktif']
						);
					}
				}
			}
            
            $products = $filtered_products;
		}
		return $products;
	}
	function pilihM3J($products,$search_filter){
		if(!empty($search_filter)) {
            $filtered_products = array();
            foreach($products as $product) {
                if($product['aktif']=='Y') {
                    if( ( strpos($product['jenis_mesin'], $search_filter) !== false || strpos($product['jenis_mesin'], ucwords($search_filter)) !== false || strpos($product['jenis_mesin'], ucfirst($search_filter)) !== false || strpos($product['jenis_mesin'], strtoupper($search_filter)) !== false || $product['jenis_mesin'] == $search_filter)) {
						$filtered_products[] = array(
						"kdmesin"         => $product['kdmesin'],
						"jmesin"          => $product['jenis_mesin'],
						"hargamin"        => (int)$product['hargamin'],
						"jumlahmin"       => (int)$product['jumlahmin'],
						"hargalebih"      => (int)$product['hargalebih'],
						"lebarkertas"     => (int)$product['lebarkertas'],
						"panjangkertas"   => (int)$product['panjangkertas'],
						"lebarcetak"      => (int)$product['lebarcetak'],
						"panjangcetak"    => (int)$product['panjangcetak'],
						"min_lebar"       => (int)$product['min_lebar'],
						"min_panjang"     => (int)$product['min_panjang'],
						"hargactp"        => (int)$product['hargactp'],
						"namamesin"       => $product['namamesin'],
						"replat"          => (int)$product['replat'],
						"biayabbplatsama" => $product['biayabbplatsama'],
						"tarikan"         => $product['tarikan'],
						"aktif"           => $product['aktif']
						);
					}
				}
			}
            
            $products = $filtered_products;
		}
		return $products;
	}
	function pilihMOffset($products,$search_filter){
		if(!empty($search_filter)) {
            $filtered_products = array();
            foreach($products as $product) {
                if($product['aktif']=='Y') {
                    if( ( strpos($product['jenis_mesin'], $search_filter) !== false || strpos($product['jenis_mesin'], ucwords($search_filter)) !== false || strpos($product['jenis_mesin'], ucfirst($search_filter)) !== false || strpos($product['jenis_mesin'], strtoupper($search_filter)) !== false || $product['jenis_mesin'] == $search_filter)) {
						// $filtered_products[] = $product;
						$filtered_products[] = array(
						"kdmesin"         => $product['kdmesin'],
						"jmesin"          => $product['jenis_mesin'],
						"hargamin"        => (int)$product['hargamin'],
						"jumlahmin"       => (int)$product['jumlahmin'],
						"hargalebih"      => (int)$product['hargalebih'],
						"lebarkertas"     => (int)$product['lebarkertas'],
						"panjangkertas"   => (int)$product['panjangkertas'],
						"lebarcetak"      => (int)$product['lebarcetak'],
						"panjangcetak"    => (int)$product['panjangcetak'],
						"min_lebar"       => (int)$product['min_lebar'],
						"min_panjang"     => (int)$product['min_panjang'],
						"hargactp"        => (int)$product['hargactp'],
						"namamesin"       => $product['namamesin'],
						"replat"          => (int)$product['replat'],
						"biayabbplatsama" => $product['biayabbplatsama'],
						"tarikan"         => $product['tarikan'],
						"aktif"           => $product['aktif']
						);
					}
				}
			}
            
            $products = $filtered_products;
		}
		return $products;
	}
	function CariMesin($products,$search_filter){
		if(!empty($search_filter)) {
            $filtered_products = array();
            foreach($products as $product) {
                if($product['aktif']=='Y') {
                    if($product['kdmesin'] == $search_filter){
						$filtered_products[] = array(
						"kdmesin"         => $product['kdmesin'],
						"jmesin"          => $product['jenis_mesin'],
						"hargamin"        => (int)$product['hargamin'],
						"jumlahmin"       => (int)$product['jumlahmin'],
						"hargalebih"      => (int)$product['hargalebih'],
						"lebarkertas"     => (int)$product['lebarkertas'],
						"panjangkertas"   => (int)$product['panjangkertas'],
						"lebarcetak"      => (int)$product['lebarcetak'],
						"panjangcetak"    => (int)$product['panjangcetak'],
						"min_lebar"       => (int)$product['min_lebar'],
						"min_panjang"     => (int)$product['min_panjang'],
						"hargactp"        => (int)$product['hargactp'],
						"namamesin"       => $product['namamesin'],
						"replat"          => (int)$product['replat'],
						"biayabbplatsama" => $product['biayabbplatsama'],
						"tarikan"         => $product['tarikan'],
						"aktif"           => $product['aktif']
						);
					}
				}
			}
            
            $products = $filtered_products;
		}
		return $products;
	}
	function JenisMesin($products,$search_filter){
		if(!empty($search_filter)) {
            $filtered_products = array();
            foreach($products as $product) {
                if(!empty($search_filter) ) {
                    if( ( strpos($product['jenis_mesin'], $search_filter) !== false || strpos($product['jenis_mesin'], ucwords($search_filter)) !== false || strpos($product['jenis_mesin'], ucfirst($search_filter)) !== false || strpos($product['jenis_mesin'], strtoupper($search_filter)) !== false || $product['jenis_mesin'] == $search_filter)) {
						$filtered_products = array(
						"kdmesin"         => $product['kdmesin'],
						"jmesin"          => $product['jenis_mesin'],
						);
					}
				}
			}
            
            $products = $filtered_products;
		}
		return $products;
	}
	function pilihM33($array,$str){
		foreach ($array as $current_key => $current_array) {
			$mod = explode(" ",$current_array->modul);
			foreach ($mod as $key => $val) {
				if($val==$str AND $current_array->aktif=='Y'){
					$data[] = array(
					"kdmesin" => $current_array->kdmesin,
					"jmesin" => $current_array->jenis_mesin,
					"hargamin" => $current_array->hargamin,
					"jumlahmin" => $current_array->jumlahmin,
					"hargalebih" => $current_array->hargalebih,
					"lebarkertas" => $current_array->lebarkertas,
					"panjangkertas" => $current_array->panjangkertas,
					"lebarcetak" => $current_array->lebarcetak,
					"panjangcetak" => $current_array->panjangcetak,
					"min_lebar" => $current_array->min_lebar,
					"min_panjang" => $current_array->min_panjang,
					"hargactp" => $current_array->hargactp,
					"namamesin" => $current_array->namamesin,
					"replat" => $current_array->replat,
					"biayabbplatsama" => $current_array->biayabbplatsama,
					"tarikan" => $current_array->tarikan,
					"aktif" => $current_array->aktif
					);
				}
			}
		}
		return $data;
	}
	function pilihM4($array,$modul,$j_mesin){
		foreach ($array as $current_key => $current_array) {
			$mod = explode(" ",$current_array->modul);
			foreach ($mod as $key => $val) {
				if($val==$modul AND $current_array->jenis_mesin==$j_mesin AND $current_array->aktif=='Y'){
					$data[] = array(
					"kdmesin" => $current_array->kdmesin,
					"jmesin" => $current_array->jenis_mesin,
					"hargamin" => (int)$current_array->hargamin,
					"jumlahmin" => (int)$current_array->jumlahmin,
					"hargalebih" => (int)$current_array->hargalebih,
					"lebarkertas" => $current_array->lebarkertas,
					"panjangkertas" => $current_array->panjangkertas,
					"lebarcetak" => $current_array->lebarcetak,
					"panjangcetak" => $current_array->panjangcetak,
					"min_lebar" => $current_array->min_lebar,
					"min_panjang" => $current_array->min_panjang,
					"hargactp" => $current_array->hargactp,
					"namamesin" => $current_array->namamesin,
					"replat" => $current_array->replat,
					"biayabbplatsama" => $current_array->biayabbplatsama,
					"tarikan" => $current_array->tarikan,
					"aktif" => $current_array->aktif
					);
				}
			}
		}
		return $data;
	}
	function pilihM2($array,$str){
		$object = json_decode(json_encode($array));
		foreach ($object as $key => $val) {
			if($val->kdmesin==$str AND $val->aktif=='Y'){
				$data[] = array(
				"kdmesin" => $val->kdmesin,
				"jmesin" => $val->jenis_mesin,
				"hargamin" => $val->hargamin,
				"jumlahmin" => $val->jumlahmin,
				"hargalebih" => $val->hargalebih,
				"lebarkertas" => $val->lebarkertas,
				"panjangkertas" => $val->panjangkertas,
				"lebarcetak" => $val->lebarcetak,
				"panjangcetak" => $val->panjangcetak,
				"min_lebar" => $val->min_lebar,
				"min_panjang" => $val->min_panjang,
				"hargactp" => $val->hargactp,
				"namamesin" => $val->namamesin,
				"replat" => $val->replat,
				"biayabbplatsama" => $val->biayabbplatsama,
				"tarikan" => $val->tarikan,
				"aktif" => $val->aktif
				);
			}
		}
		return $data;
	}
	function pilihMM($array,$str){
		foreach ($array as $key => $val) {
			if($val->kdmesin==$str AND $val->aktif=='Y'){
				$data = array("kdmesin"=>$val->kdmesin,"hargamin"=>$val->hargamin,"namamesin"=>$val->namamesin,"jmesin"=>$val->jenis_mesin,"lebarcetak"=>$val->lebarcetak,"panjangcetak"=>$val->panjangcetak);
				}elseif($val->jenis_mesin==$str AND $val->aktif=='Y'){
				$data = array("kdmesin"=>$val->kdmesin,"hargamin"=>$val->hargamin,"namamesin"=>$val->namamesin,"jmesin"=>$val->jenis_mesin,"lebarcetak"=>$val->lebarcetak,"panjangcetak"=>$val->panjangcetak);
			}
		}
		return $data;
	}
	function pilihMKat($array,$str){
		foreach ($array as $current_key => $value) {
			$data =array();
			if($value['kdmesin']==$str){
				$data = array('nama'=> $value['namamesin']);
				return $data;
			}
		}
	}
	function pilihHitMesin($array,$str){
		// $data =array();
		
		foreach ($array as $key => $val) {
			// $data[] = $val;
			if($val['kdmesin']==$str AND $val['aktif']=='Y'){
				// // $data = array(
				// // "hargaminim" => $val_mesin['hargamin'],
				// // "jmlminim" => $val_mesin['jumlahmin'],
				// // "hargadrek" => $val_mesin['hargalebih'],
				// // "lbrkertasmesin" => $val_mesin['lebarkertas'],
				// // "tgkertasmesin" => $val_mesin['panjangkertas'],
				// // "lebartext" => $val_mesin['lebarcetak'],
				// // "tinggitext" => $val_mesin['panjangcetak'],
				// // "lebarmin" => $val_mesin['min_lebar'],
				// // "tinggimin" => $val_mesin['min_panjang'],
				// // "ctp" => $val_mesin['hargactp'],
				// // "namamesin" => $val_mesin['namamesin'],
				// // "jenis_mesin" => $val_mesin['jenis_mesin'],
				// // "replat" => $val_mesin['replat']
				// // );
				return $val;
			}
		}
	}
	function pilihMmesin($array,$str,$jenis){
		return $array;
	}
	function pilihMmesinz($array,$str,$jenis){
		$data =array();
		foreach ($array as $current_key => $current_array) {
			$data1 = array(
			'kdmesin'=> $current_array['kdmesin'],
			'lebarcetak'=> $current_array['lebarcetak'],
			'panjangcetak'=> $current_array['panjangcetak'],
			'namamesin'=> $current_array['namamesin']
			);
			if($current_array['aktif']=='Y'){
				$modul = explode(" ",$current_array['modul']);
				foreach ($modul as $key => $val) {
					if($val==$str){
						if($current_array['jenis_mesin']==$jenis){
							return $data1;
						}
					}
				}
			}
		}
	}
	
	function pilihMmesinMod($array,$str){
		$data =array();
		foreach ($array as $current_key => $current_array) {
			$data1 = array(
			'kdmesin'=> $current_array['kdmesin'],
			'lebarcetak'=> $current_array['lebarcetak'],
			'panjangcetak'=> $current_array['panjangcetak'],
			'namamesin'=> $current_array['namamesin'],
			'modul'=> $current_array['modul'],
			'jmesin'=> $current_array['jenis_mesin']
			);
			if($current_array['aktif']=='Y'){
				$modul = explode(" ",$current_array['modul']);
				foreach ($modul as $key => $val) {
					if($val==$str){
						return $data1;
						
					}
				}
			}
		}
	}
	
	function ArrayBahanDua($id){
		global $db;
		$sql_bhn = $db->query("SELECT * FROM data_bahan where id_user='$id' AND publish='0'");
		$rows=$sql_bhn->fetch_array();
		$data = $rows['data_json'];
		return $data;
	}
	function pilih_kategori($array,$str){
		foreach ($array as $key => $val) {
			if($val->id_kategori==$str AND $val->publish=='Y'){
				$data[] = array("Kd_Bhn"=>$val->Kd_Bhn,"Nm_Bhn"=>$val->Nm_Bhn,"Harga_Bahan"=>$val->Harga_Bahan,"Tebal"=>$val->Tebal,"Tinggi"=>$val->Tinggi,"Lebar"=>$val->Lebar);
			}
		}
		return $data;
	}
	function pilihB2($array,$str){
		foreach ($array as $key => $val) {
			if($val->id_kategori==$str AND $val->Harga_Bahan >0 AND $val->publish=='Y'){
				$data[] = array("Kd_Bhn"=>$val->Kd_Bhn,"Nm_Bhn"=>$val->Nm_Bhn,"Harga_Bahan"=>$val->Harga_Bahan,"Tebal"=>$val->Tebal,"Tinggi"=>$val->Tinggi,"Lebar"=>$val->Lebar);
			}
		}
		return $data;
	}
	function pilihB4($array,$str){
		foreach ($array as $key => $val) {
			if($val->Kd_Bhn==$str AND $val->publish=='Y'){
				$data[] = array("Kd_Bhn"=>$val->Kd_Bhn,"Nm_Bhn"=>$val->Nm_Bhn,"Harga_Bahan"=>$val->Harga_Bahan,"Tebal"=>$val->Tebal,"Tinggi"=>$val->Tinggi,"Lebar"=>$val->Lebar);
			}
		}
		return $data;
	}
	function pilihB3($array,$str){
		foreach ($array as $key => $val) {
			if($val['id_kategori']==$str AND $val['pub']=='Y'){
				$data[] = array("id"=>$val['Kd_Bhn'],"nama"=>$val->Nm_Bhn,"harga"=>$val->Harga_Bahan,"Tebal"=>$val->Tebal,"Tinggi"=>$val->Tinggi,"Lebar"=>$val->Lebar);
			}
		}
		return $data;
	}
	function ArrayBahan($id){
		global $db;
		$sql_bhn = $db->query("SELECT * FROM data_bahan where id_user='$id' AND publish='0'");
		$rows=$sql_bhn->fetch_array();
		$data = json_decode($rows['data_json'],true);
		return $data;
	}
	function pilihARBahan($array,$str){
		foreach ($array as $key=>$val) {
			if($val['id_kategori']==$str){
				$data = array('id'=>$val['id_kategori'],'nama'=>$val['Nm_Bhn'],'Tinggi'=> $val['Tinggi'],'Lebar'=> $val['Lebar']);
				return $data;
			}
		}
	}
	function ArrayInsheet($id){
		global $db;
		$sql_bhn = $db->query("SELECT * FROM data_insheet where id_user='$id' AND publish='0'");
		$rows=$sql_bhn->fetch_assoc();
		$dataJson = $rows['data_json'];
		$data = json_decode($dataJson,true);
		return $data;
	}
	function pilihInsheet($array,$str){
		foreach ($array as $current_key => $current_array) {
			$data =array();
			if($str >= $current_array['dari'] && $str <= $current_array['sampai']){
				$data = array('insheet'=> $current_array['insheet'],'insheet_bb'=> $current_array['insheet_bb']
				);
				return $data;
			}
		}
	}
	function Insheet($array,$str){
		foreach ($array as $current_key => $current_array) {
			$dari[] = $current_array['dari'];
			$sampai[] = $current_array['sampai'];
		}
		$numbers = array_merge($dari,$sampai);
		$start = 1;
		$end = $str;
		$result = [];
		foreach($numbers as $num){
			if($num >= $start && $num <= $end) $result[] = $num;
		}
		sort($result);
		$result = end($result);
		foreach ($array as $item) {
			if ($item['dari'] == $result OR $item['sampai'] == $result ) {
				return array('insheet'=> $item['insheet'],'insheet_bb'=> $item['insheet_bb']);
				break;
			}
		}
	}
	function ArrayPrint($id){
		global $db;
		$sql_bhn = $db->query("SELECT * FROM data_hargaprint where id_user='$id' AND publish='0'");
		$rows=$sql_bhn->fetch_assoc();
		$data = json_decode($rows['data_json'],true);
		return $data;
	}
	function pilihPrint($array,$str=NULL,$mods=NULL){
		foreach ($array as $current_key => $value) {
			$data =array();
			// $mod = explode(" ",$value['modul']);
			if($str >= $value['jml_min'] && $str <= $value['jml_max']){
				// foreach ($mod as $key => $val) {
				if($value['kdmesin']==$mods){
					$data = array(
					'modul'=> $value['modul'],
					'harga'=> $value['harga'],
					'harga_laminating'=> $value['harga_laminating'],
					'jml_min'=> $value['jml_min'],
					'jml_max'=> $value['jml_max']
					);
					return $data;
				}
				// }
				
			}
		}
	}
	
	//plano
	function ArrayPlano($id){
		global $db;
		$sql_bhn = $db->query("SELECT * FROM data_plano where id_user='$id' AND publish='0'");
		$rows=$sql_bhn->fetch_assoc();
		$data = json_decode($rows['data_json'],true);
		return $data;
	}
	function pilihPlano($array,$str){
		foreach ($array as $key=>$val) {
			if($val['id']==$str){
				$data = array('panjang'=> $val['panjang'],'lebar'=> $val['lebar']);
				return $data;
			}
		}
	}
	//kertas
	function ArrayUKertas($id){
		global $db;
		$sql_bhn = $db->query("SELECT * FROM data_kertas where id_user='$id' AND publish='0'");
		if($sql_bhn->num_rows > 0){
			$rows=$sql_bhn->fetch_assoc();
			$data = json_decode($rows['data_json'],true);
			}else{
			$json = '{"kertas":[{"id":"1","ket_ukuran":"Custom","panjang":"0","lebar":"0","modul":"brosur poster paperbag kopsurat buku majalah agenda"}]}';
			$data = json_decode($json,true);
		}
		return $data;
	}
	function UKertas($array,$str,$classid,$js){
		$html= '<select id="'.$classid.'" class="custom-select form-control" onchange="'.$js.'" data-placeholder="Pilih Ukuran" required="required">';
		foreach ($array as $c_key => $c_array) {
			$mod = explode(" ",$c_array['modul']);
			foreach ($mod as $key => $val) {
				if($val==$str){
					$html.= '<option value="'.$c_array['id'].'">'.$c_array['ket_ukuran'].'</option>';
				}
			}
		}
		$html.= '</select>';
		return $html;
	}
	function pilihUKertas($array,$str,$classid,$js){
		$html= '<select id="'.$classid.'" class="chosen-select custom-select form-control" onchange="'.$js.'" data-placeholder="Pilih Ukuran" required="required">';
		foreach ($array as $current_key => $current_array) {
			$mod = explode(" ",$current_array['modul']);
			foreach ($mod as $key => $val) {
				if($val==$str){
					$html.= '<option value="'.$current_array['id'].'">'.$current_array['ket_ukuran'].'</option>';
				}
			}
		}
		$html.= '</select>';
		return $html;
	}
	function pilihUKertas2($array,$id,$str,$classid,$js){
		echo '<select id="'.$classid.'"  class="chosen-select custom-select form-control" onchange="'.$js.'" data-placeholder="Pilih Ukuran" required="required">';
		foreach ($array as $current_key => $current_array) {
			$mod = explode(" ",$current_array['modul']);
			foreach ($mod as $key => $val) {
				if($val==$str){
					if($current_array['id']==$id){
						echo '<option value="'.$current_array['id'].'" selected>'.$current_array['ket_ukuran'].'</option>';
						}else{
						echo '<option value="'.$current_array['id'].'">'.$current_array['ket_ukuran'].'</option>';
					}
				}
			}
		}
		echo '</select>';
	}
	function pilih1Kertas($array,$str){
		foreach ($array as $key=>$val) {
			if($val['id']==$str){
				$data = array('panjang'=> $val['panjang'],'lebar'=> $val['lebar']);
				return $data;
			}
		}
	}
	function tag_mod_o(){
		global $db;
		$tag = $db->query("SELECT * FROM modul ORDER BY tag_mod");
		$html='';
		while ($t=$tag->fetch_array()){
			$html .= '<option value="'.$t['tag_mod'].'">'.$t['nama_modul'].'</option>';
		}
		echo $html;
	}
	function tag_mod($arr){
		global $db;
		$tag = $db->query("SELECT * FROM modul ORDER BY tag_mod");
		// $html='';
		while ($t=$tag->fetch_array()){
			foreach($arr AS $mod){
				$output[] = '<option selected value="'.$mod.'">'.$mod.'</option>';
			}
			$output[] .= '<option value="'.$t['tag_mod'].'">'.$t['nama_modul'].'</option>';
		}
		// foreach($arr AS $mod){
		// $output[] = '<option selected value="'.$mod.'">'.$mod.'</option>';
		// }
		$tags= implode(' ',$output);
		return $tags;
	}
	function tag_modxxxz($tbl,$header,$id){
		global $db;
		$sqlb=$db->query("SELECT data_json FROM $tbl WHERE id=$id");
		$TampungData = array();
		$rowb=$sqlb->fetch_array();
		$dataKat = $rowb['data_json'];
		$ARRB = json_decode($dataKat);
		foreach ($ARRB->$header as $data_tags) {
			$tags = explode(' ',strtolower(trim($data_tags->modul)));
			if(empty($data_tags->modul)){echo'';}else{
				foreach($tags as $val) {
					$TampungData[] = $val;
				}}}
				$jumlah_tag = array_count_values($TampungData);
				ksort($jumlah_tag);
				$output = array();
				foreach($jumlah_tag as $key=>$val) {
					$output[] = '<option selected value="'.$key.'">'.$key.'</option>';
					// $output[] = $key;
				}
				
				$tags= implode(' ',$output);
				return $tags;
	}
	function tag_modxxx($id){
		global $db;
		$q=$db->query("SELECT modul FROM `mesin` WHERE kdmesin=$id");
		$TampungData = array();
		while ($data_tags = $q->fetch_array()) {
			$tags = explode(' ',strtolower(trim($data_tags['modul'])));
			if(empty($data_tags['modul'])){echo'';}else{
				foreach($tags as $val) {
					$TampungData[] = $val;
				}}}
				$jumlah_tag = array_count_values($TampungData);
				ksort($jumlah_tag);
				$output = array();
				foreach($jumlah_tag as $key=>$val) {
					$output[] = '<option selected value="'.$key.'">'.$key.'</option>';
				}
				
				$tags= implode(' ',$output);
				return $tags;
	}
	function countd($tbl,$name){
		$array_data = json_decode($tbl, true);  
		$count = count($array_data[$name]);
		return $count;
	}
	
	function ArrayJenis($id){
		global $db;
		$sql_bhn = $db->query("SELECT * FROM data_jenis where id_user='$id' AND pub='0'");
		$rows=$sql_bhn->fetch_assoc();
		$data = json_decode($rows['data_json'],true);
		return $data;
	}
	function pilihJenis($array,$str){
		foreach ($array as $current_key => $value) {
			$data =array();
			if($value['id_jenis']==$str){
				$data = array('nama'=> $value['nama_jenis']);
				return $data;
			}
		}
	}
	
	function ArrayKat($id){
		global $db;
		$sql_bhn = $db->query("SELECT * FROM data_katbahan where id_user='$id' AND publish='0'");
		$rows=$sql_bhn->fetch_assoc();
		$data = json_decode($rows['data_json'],true);
		return $data;
	}
	function pilihKat($array,$str){
		foreach ($array as $current_key => $value) {
			$data =array();
			if($value['id_kategori']==$str){
				$data = array('nama'=> $value['nama_kategori']);
				return $data;
			}
		}
	}
	function maxID($array,$key){
		$arr = max($array);
		$data = $arr->$key;
		return $data;
	}
	function maxIDT($array,$key){
		$arr = max($array);
		$data = $arr[$key]+1;
		return $data;
	}
	function sortByOrders($a, $b){
		return  $a < $b;
	}
	function sortByOrderss($a, $b){
		return  $a > $b;
	}
	function input($tblname, array $val_cols){
		global $db;
		$keysString = implode(", ", array_keys($val_cols));
		$i=0;
		foreach($val_cols as $key=>$value) {
			$StValue[$i] = "'".$value."'";
		    $i++;
		}
		
		$StValues = implode(", ",$StValue);
		
		if($db->query("INSERT INTO $tblname ($keysString) VALUES ($StValues)"))
		{
			$arr['status'] =  "ok";
			$arr['msg'] =  "Input berhasil";
			$arr['id'] = $db->insert_id;
			}else{
			$arr['status'] =  "error";
			$arr['msg'] =  "Gagal input data";
			$arr['id'] =  "";
		}
		return $arr;
	}
	//Set and Condition to be update row in the table
	// $set = array("LastName"=>'Cake',"Age"=>'27');
	// $condition = array("FirstName"=>'MD',"Age"=>'34');
	// update($con, $tablename, $set, $condition);
	function update($tblname, array $set_val_cols, array $cod_val_cols){
		global $db;
		$i=0;
		foreach($set_val_cols as $key=>$value) {
			$set[$i] = $key." = '".$value."'";
		    $i++;
		}
		
		$Stset = implode(", ",$set);
		
		$i=0;
		foreach($cod_val_cols as $key=>$value) {
			$cod[$i] = $key." = '".$value."'";
		    $i++;
		}
		
		$Stcod = implode(" AND ",$cod);
		$result = $db->query("UPDATE $tblname SET $Stset WHERE $Stcod");
		if($result){
			$arr['status'] =  "ok";
			$arr['msg'] =  "Data updated successfully";
		}
		else{
			$arr['status'] =  "error";
			$arr['msg'] =  "The data you want to updated is no loger exists";
		}
		
		return $arr;
	}
	function hapus($tblname, array $val_cols){
		global $db;
		$i=0;
		foreach($val_cols as $key=>$value) {
			$exp[$i] = $key." = '".$value."'";
			$i++;
		}
		
		$Stexp = implode(" AND ",$exp);
		
		if($db->query("DELETE FROM $tblname WHERE $Stexp")){
			if($db->affected_rows()){
				$arr['status'] =  "ok";
				$arr['msg'] = "Data berhasil dihapus";
			}
			else{
				$arr['status'] =  "error";
				$arr['msg'] = "Data tidak ditemukan";
			}
		}
		else{
			$arr['status'] =  "fatal";
			$arr['msg'] = "Error deleting data: " . $db->connect_error;
		}
		return $arr;
	}
	function count_hitung($id,$modul,$tgl_sekarang){
		global $db;
		
		$sql = $db->query("SELECT * FROM `data_counter` WHERE id_user='$id'");
		if($sql->num_rows >0){
			$rows=$sql->fetch_array();
			$dataJson = $rows['data_json'];
			$array_data = json_decode($dataJson, true);  
			$maxid = maxIDT($array_data['counter'],'ID');
			$valdata['ID'] = $maxid;
			$valdata['tag_mod'] = $modul;
			$valdata['count_hitung'] = 1;
			$valdata['create_at'] = $tgl_sekarang;
			array_push($array_data['counter'], $valdata);
			$insert =  json_encode($array_data); 
			$sql = $db->query("UPDATE `data_counter` set data_json='$insert' where  id_user='$id'");
		}
	}
?>