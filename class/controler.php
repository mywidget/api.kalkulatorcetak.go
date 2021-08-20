<?php
	function themes(){
		global $db;
		$query = $db->query("SELECT * FROM `themes` where publish='Y'");
		$data = $query->fetch_array();
		return $data;
	}
	function gProduk($arr,$start,$limit){
		global $db;
		$prod = $db->query("select * FROM modul where ID IN ($arr) AND publish='Y' ORDER BY FIELD(ID,$arr) limit $start,$limit");
		while ($data = $prod->fetch_array()) {
			$rows[] = ['name'=>$data['nama_modul'],'slug'=>$data['tag_mod'],'seo'=>$data['slug'],'video'=>$data['embed'],'video2'=>$data['embed2'],'className'=>$data['className'],'warna'=>$data['warna']];
		}
		return $rows;
	}
	function cProduk($arr){
		global $db;
		$queryNum = $db->query("SELECT COUNT(*) as postNum FROM modul WHERE ID IN ($arr) AND publish='Y' ORDER BY FIELD(ID,$arr)");
		$resultNum = $queryNum->fetch_assoc();
		return $resultNum['postNum'];
	}
	function gApp($val){
		global $db;
		$sql_cek = $db->query("SELECT 
		`data_theme`.`data_json` AS dstyle,
		`data_produk`.`data_json` as dproduk,
		`api_key`.`app_id`,
		`api_key`.`token`,
		`api_key`.`auth`,
		`api_key`.`domain`,
		`api_key`.`host`,
		`api_key`.`expire`,
		`api_key`.`id_user` AS uid
		
		FROM
		`data_theme`
		INNER JOIN `gtbl_user` ON (`data_theme`.`id_user` = `gtbl_user`.`id_user`)
		INNER JOIN `api_key` ON (`gtbl_user`.`id_user` = `api_key`.`id_user`)
		INNER JOIN `data_produk` ON (`gtbl_user`.`id_user` = `data_produk`.`id_user`)
		WHERE
		`api_key`.`app_id` = '$val' AND gtbl_user.aktif='Y'");
		if($sql_cek->num_rows>0){
			$rows=$sql_cek->fetch_array();
			$data = array('status'=>1,'uid'=>$rows['uid'],'dstyle'=>$rows['dstyle'],'dproduk'=>$rows['dproduk']);
			}else{
			$data = array('status'=>0,'uid'=>0,'dstyle'=>0,'dproduk'=>0);
		}
		return $data;
	}
	function APPId($val){
		global $db;
		$sql_cek = $db->query("SELECT 
		`gtbl_user`.`parent`,
		`gtbl_user`.`level`,
		`gtbl_user`.`app_secret`,
		`api_key`.`id_user`,
		`api_key`.`app_id`,
		`api_key`.`auth`,
		`api_key`.`domain`,
		`api_key`.`host`,
		`api_key`.`expire`,
		`api_key`.`token`
		FROM
		`gtbl_user`
		INNER JOIN `api_key` ON (`gtbl_user`.`id_user` = `api_key`.`id_user`) where `api_key`.`id_user`='$val' AND gtbl_user.aktif='Y'");
		if($sql_cek->num_rows>0){
			$rows=$sql_cek->fetch_array();
			$data = array('status'=>1,'appid'=>$rows['app_id'],'appsecret'=>$rows['app_secret'],'appdomain'=>$rows['domain'],'appexp'=>$rows['expire'],'id'=>$rows['id_user'],'level'=>$rows['level']);
			}else{
			$data = array('status'=>0,'appid'=>0,'appsecret'=>0,'appdomain'=>0,'appexp'=>0,'id'=>0,'level'=>0);
		}
		return $data;
	}
	function cekAPP_Id($val){
		global $db;
		$sql_cek = $db->query("SELECT 
		`gtbl_user`.`parent`,
		`gtbl_user`.`level`,
		`api_key`.`id_user`,
		`api_key`.`app_id`,
		`api_key`.`auth`,
		`api_key`.`domain`,
		`api_key`.`host`,
		`api_key`.`expire`,
		`api_key`.`token`
		FROM
		`gtbl_user`
		INNER JOIN `api_key` ON (`gtbl_user`.`id_user` = `api_key`.`id_user`) where `api_key`.`app_id`='$val' AND gtbl_user.aktif='Y'");
		if($sql_cek->num_rows>0){
			$rows=$sql_cek->fetch_array();
			$data = array('status'=>1,'appid'=>$rows['app_id'],'level'=>$rows['level'],'auth'=>$rows['level'],'domain'=>$rows['domain'],'host'=>$rows['host'],'expire'=>$rows['expire'],'token'=>$rows['token']);
			}else{
			$data = array('status'=>0,'appid'=>0,'level'=>0,'auth'=>0,'domain'=>0,'host'=>0,'expire'=>0,'token'=>0);
		}
		return $data;
	}
	
	function btnplay($host,$rowid,$nama_modul,$actual_link,$embed,$className,$appid,$seo){
		$detect = new Mobile_Detect();
		if($detect->isMobile()){
			$video ='<a href="#" data-modFile="modul" data-appId="'.$appid.'" data-modName="modsatu" data-namaMod="'.$nama_modul.'" data-className="'.$className.'" data-modLink="'.$actual_link.'"  data-toggle="modal" data-id="'.$rowid.'" data-target="#myModalProd" data-backdrop="static" data-keyboard="false"><button type="button" class="btn btn-outline-dark">Hitung</button></a>';
			
			$video .= '<a href="#" data-ModeName="'.$nama_modul.'" data-vidLink="'.$actual_link.'" data-embed="'.$embed.'" data-toggle="modal" data-vid="'.$rowid.'" data-modFile="video" id="onhidebtn" data-target="#VideoDemo" data-backdrop="static" data-keyboard="false" data-container="body" data-animation="true">
			<i class="ni ni-button-play thumb-icon text-danger"></i></a>';
			
			}else{
			$video = '<a href="/hitung/'.$seo.'">'.$nama_modul.'</a>';
		}
		return $video;
	}
	
	function stylesx($a,$b,$c,$d,$e,$nama,$warna,$className,$img,$host,$rowid,$hitung,$video,$btntest,$actual_link,$appid){
		$html = '';
		if($a=='satu'){
			$html .= '<div class="col-md-'.$e.' col-xs-6 col-sm-6  mb-0  container_foto text-center">
			<div class="ver_mas text-center">
			<small class="text-muted">'.$hitung.'</small>
			<small class="text-muted">'.$video.'</small>
			</div>
			<article class="text-left">
            <h2>'.$btntest.'</h2>
			</article>
			<a href="#" data-modName="modsatu" data-modFile="modul" data-appId="'.$appid.'" data-modWarna="'.$warna.'" data-namaMod="'.$nama.'" data-className="'.$className.'" data-modLink="'.$actual_link.'" data-toggle="modal" data-id="'.$rowid.'" data-target="#myModalProd" data-backdrop="static" data-keyboard="false"><img src="'.$img.'" class="card-img-top" alt="kalkulatorcetak.com">
			</a>
			</div>';
			}elseif($a=='dua'){
			$html .='<div class="col-md-'.$e.' col-xs-6 col-sm-6 mb-'.$c.'"><div class="card text-center '.$d.' shadow border-0">
			<a href="#" data-appId="'.$appid.'" data-modName="modsatu" data-modFile="modul" data-modWarna="'.$warna.'" data-namaMod="'.$nama.'" data-className="'.$className.'" data-modLink="'.$actual_link.'" data-toggle="modal" data-id="'.$rowid.'" data-target="#myModalProd" data-backdrop="static" data-keyboard="false"><img src="'.$img.'" class="card-img-top" alt="kalkulatorcetak.com">
			<div class="card-img-overlay loading">
			'.$btntest.'
			</div>
			</a>
			
			<div class="card-footer loading d-none d-sm-block">
			<small class="text-muted">'.$hitung.'</small>
			<small class="text-muted">'.$video.'</small>
			</div>
			</div>
			</div>';
			}elseif($a=='tiga'){
			$html .='<div class="col-md-'.$e.' col-xs-6 col-sm-6 mt-0 mb-0"><div class="card-content">
			<a class="spectrum-a" href="#" data-appId="'.$appid.'" data-modName="modsatu" data-modFile="modul" data-modWarna="'.$warna.'" data-namaMod="'.$nama.'" data-className="'.$className.'" data-modLink="'.$actual_link.'" data-toggle="modal" data-id="'.$rowid.'" data-target="#myModalProd" data-backdrop="static" data-keyboard="false"><img class="spectrum1" src="'.$img.'" alt="kalkulatorcetak">
			<h4 class="spectrum-h2 text-center">'.$btntest.'</h4>
			<div class="card-footer  loading d-none d-sm-block">
			<small class="text-muted ">'.$hitung.'</small>
			</div>
			</div>
			</div>';
			}elseif($a=='empat'){
			$html .='<div class="col-md-'.$e.' col-xs-6 col-sm-6 mt-0 mb-0"><div class="card-content">
			<a class="spectrum-a" href="#" data-appId="'.$appid.'" data-modName="modsatu" data-modFile="modul" data-modWarna="'.$warna.'" data-namaMod="'.$nama.'" data-className="'.$className.'" data-modLink="'.$actual_link.'" data-toggle="modal" data-id="'.$rowid.'" data-target="#myModalProd" data-backdrop="static" data-keyboard="false"><img class="spectrum1" src="'.$img.'" alt="kalkulatorcetak">
			<h4 class="spectrum-h2 text-center">'.$btntest.'</h4>
			<div class="card-footer  loading d-none d-sm-block">
			<small class="text-muted ">'.$hitung.'</small>
			<small class="text-muted">'.$video.'</small>
			</div>
			</div>
			</div>';
			}else{
			$html .='';
		}
		return $html;
	}
	function plugin($url='',$js='',$seo='',$module=''){
		global $db;
		if($url=='komentar' AND $js==1){
			$sql = $db->query("SELECT * FROM `plugin` WHERE id='1' AND pub='0'");
			if($sql->num_rows >0){
				$data=$sql->fetch_array();
				$plugin = "[".$data['plugin_arr']."]";
				$var = json_decode($plugin);
				$pages = $var[0]->pages;
				$site_name = $var[0]->site_name;
				$app_id = $var[0]->app_id;
				$html = '<meta property="og:url" content="'.canonical($module,$seo).'" />
				<meta property="og:type" content="website"/>
				<meta property="og:title" content="'.judul($seo).'" />
				<meta property="og:description" content="'.desc($module,$seo).'" />
				<meta property="og:image" content="'.gambar($module,$seo).'"/>
				<meta property="fb:pages" content="'.$pages.'" />
				<meta property="og:site_name" content="'.$site_name.'" />
				<meta property="fb:app_id" content="'.$app_id.'" />';
				}else{
				$html ='';
			}
			}elseif($url=='komentar' AND $js==2){
			$sql = $db->query("SELECT * FROM `plugin` WHERE id='1' AND pub='0'");
			if($sql->num_rows >0){
				$data=$sql->fetch_array();
				$plugin = "[".$data['plugin_arr']."]";
				$var = json_decode($plugin);
				$app_id = $var[0]->app_id;
				$html = "<div id='fb-root'></div>
				<script>
				window.fbAsyncInit = function() {
				FB.init({
				appId      : '$app_id',
				xfbml      : true,
				version    : 'v2.5'
				});
				FB.AppEvents.logPageView();
				};
				(function(d, s, id){
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement(s); js.id = id;
				js.src = '//connect.facebook.net/en_US/sdk.js';
				fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
				</script>";
				}else{
				$html ='';
			}
			}elseif($url=='komentar' AND $js==3){
			$sql = $db->query("SELECT * FROM `plugin` WHERE id='1' AND pub='0'");
			if($sql->num_rows >0){
				$data=$sql->fetch_array();
				$plugin = "[".$data['plugin_arr']."]";
				$var = json_decode($plugin);
				$site_name = $var[0]->site_name;
				$html ='<h3>Komentar</h3>
				<div class="comments-list" style="margin-left: 0">
				<div class="comment-block">
				<div class="fb-comments" data-colorscheme="light" data-href="'.$site_name.'/'.$seo.'" data-numposts="5" data-width="620"></div>
				</div>
				</div>';
				}else{
				$html ='';
			}
			}elseif($url=='map'){
			$sql = $db->query("SELECT * FROM `plugin` WHERE id='4' AND pub='0'");
			if($sql->num_rows >0){
				$data=$sql->fetch_array();
				$plugin = "[".$data['plugin_arr']."]";
				$var = json_decode($plugin);
				$embed = $var[0]->embed;
				$html = '<div id="map">
				<iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$embed.'"></iframe>';
				}else{
				$html ='';
			}
			}elseif($url=='tag'){
			$html ='<ul class="'.$js.'">';
			$type = explode(',',$seo);
			$html.= "<li><span>TAGS</span></li>";
			foreach($type as $tags) {
				$sqltag = $db->query("select * from tag where tag_seo ='$tags' AND type='$module'");
				$num_rows=$sqltag->num_rows;
				if ($num_rows > 0 ) {
					$rows=$sqltag->fetch_array();
					$html.= '<li><a href="/tag/'.$rows['tag_seo'].'">'.$rows['nama_tag'].'</a></li>';
				}
			}
			$html .= '</ul>';
			}elseif($url=='share'){
			$html ='<ul class=" td-post-small-box social-media mt-10">
			<li><a href="https://www.facebook.com/sharer/sharer.php?u='.$seo.'"><i class="fa fa-facebook"></i></a> </li>
			<li><a href="https://twitter.com/home?status='.$seo.'"><i class="fa fa-twitter"></i></a></li>
			<li><a href="https://plus.google.com/share?url='.$seo.'"><i class="fa fa-google-plus"></i></a> </li>
			<li><span>SHARE</span></li>
			</ul>';
			}elseif($url=='analytics'){
			$sql = $db->query("SELECT * FROM `plugin` WHERE id='3' AND pub='0'");
			if($sql->num_rows >0){
				$data=$sql->fetch_array();
				$plugin = "[".$data['plugin_arr']."]";
				$var = json_decode($plugin);
				$partnerid = $var[0]->partnerid;
				$html = "<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
				ga('create', '$partnerid', 'auto');
				ga('send', 'pageview');
				</script>";
				}else{
				$html ='';
			}
			}elseif($url=='cse' AND $js=1){
			$sql = $db->query("SELECT * FROM `plugin` WHERE id='2' AND pub='0'");
			if($sql->num_rows >0){
				$html = '<div class="widget widget_search">
				<div class="site-search-area">
				<form name="cse" action="/cari/"  accept-charset="utf-8" id="site-searchform">
				<div>
				<input class="input-text" name="q" id="q" placeholder="Cari Data/Produk..." type="text" required >
				<input id="searchsubmit" value="Search" type="submit">
				</div>
				</form>
				</div><!-- end site search -->
				</div>';
				// $html = '<div class="top-search">
				// <div class="container">
				// <div class="input-group">
				// <span class="input-group-addon"><i class="fa fa-search"></i></span>
				// <form name="cse" action="/cari/"  accept-charset="utf-8">
				// <input class="form-control cari" id="q" name="q" type="text" placeholder="Pencarian berita..." required="required" />
				// </form> 
				// <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
				// </div>
				// </div>
                // </div>';
				}else{
				$html = '<div class="top-search">
				<div class="container">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-search"></i></span>
				<form name="cse" action="/cari/"  accept-charset="utf-8">
				<div class="col-xs-12 col-sm-5 col-md-7">
				<input class="form-control cari" id="q" name="q" type="text" placeholder="Pencarian berita..." required="required" />
				</div>
				<div class="col-xs-12 col-sm-5 col-md-3">
				<select name="pencarian" id="year" required>
				<option value="0">-- Pilih --</option>
				<option value="Berita">Berita</option>
				<option value="Video">Video</option>
				<option value="Foto">Foto</option>
				<option value="Agenda">Agenda</option>
				<option value="Regulasi">Regulasi</option>
				</select>
				</div> 
				<div class="col-xs-12 col-sm-5 col-md-1">
				<span class="input-group-addon"><button class="btn" id="cari"><i class="fa fa-search"></i></button></span>
				</div> 
				</form> 
				<span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
				</div>
				</div>
                </div>';
			}
			}elseif($url=='csep'){
			$sql = $db->query("SELECT * FROM `plugin` WHERE id='2' AND pub='0'");
			if($sql->num_rows >0){
				$data=$sql->fetch_array();
				$plugin = "[".$data['plugin_arr']."]";
				$var = json_decode($plugin);
				$partnerid = $var[0]->partnerid;
				$html = "<script>
				var myCallback = function() {
				if (document.readyState == 'complete') {
				// Document is ready when CSE element is initialized.
				// Render an element with both search box and search results in div with id 'test'.
				google.search.cse.element.render(
				{
				div: 'pencarian',
				tag: 'search'
				});
				} else {
				// Document is not ready yet, when CSE element is initialized.
				google.setOnLoadCallback(function() {
				// Render an element with both search box and search results in div with id 'test'.
				google.search.cse.element.render(
				{
				div: 'pencarian',
				tag: 'search'
				});
				}, true);
				}
				};
				
				// Insert it before the CSE code snippet so that cse.js can take the script
				// parameters, like parsetags, callbacks.
				window.__gcse = {
				parsetags: 'explicit',
				callback: myCallback
				};
				
				(function() {
				var cx = '$partnerid'; // Insert your own Custom Search engine ID here
				var gcse = document.createElement('script'); gcse.type = 'text/javascript';
				gcse.async = true;
				gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
				})();
				</script>";
				
				// $html = "<script src='https://www.google.com/jsapi' type='text/javascript'></script>
				// <script type='text/javascript'> 
				// google.load('search', '1', {language : 'id', style : src='$js/css/search.min.css'});
				// google.setOnLoadCallback(function() {
				// var customSearchOptions = {};  var customSearchControl = new google.search.CustomSearchControl(
				// '$partnerid', customSearchOptions);
				// customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
				// var options = new google.search.DrawOptions();
				// options.enableSearchboxOnly('$seo');
				// customSearchControl.draw('cse-search-form', options);
				// }, true);
				// google.load('search', '1', {language : 'id', style : google.loader.themes.V2_DEFAULT});
				// google.setOnLoadCallback(function() {
				// var customSearchOptions = {};  var customSearchControl = new google.search.CustomSearchControl(
				// '$partnerid', customSearchOptions);
				// customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
				// customSearchControl.draw('cse');
				// function parseParamsFromUrl() {
				// var params = {};
				// var parts = window.location.search.substr(1).split('\x26');
				// for (var i = 0; i < parts.length; i++) {
				// var keyValuePair = parts[i].split('=');
				// var key = decodeURIComponent(keyValuePair[0]);
				// params[key] = keyValuePair[1] ?
				// decodeURIComponent(keyValuePair[1].replace(/\+/g, ' ')) :
				// keyValuePair[1];
				// }
				// return params;
				// }
				
				// var urlParams = parseParamsFromUrl();
				// var queryParamName = 'q';
				// if (urlParams[queryParamName]) {
				// customSearchControl.execute(urlParams[queryParamName]);
				// }
				// }, true);
				// </script>";
				}else{
				$html ='';
			}
		}
		return $html;
	}
	function pesan(){
		global $db;
		$sql = $db->query("select * from kotak_masuk where status=0 order by id desc limit 5");
		$hrml ='';
		while($row=$sql->fetch_array()){
			$html .= '<li><!-- start message -->
			<a href="?panel=pesan&act=baca&id='.$row['id'].'">
			<div class="pull-left">
			<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
			</div>
			<h4>
			'.$row['nama'].'
			<small><i class="fa fa-clock-o"></i>'.$row['tanggal'].'</small>
			</h4>
			<p>'.kata($row['pesan'],50).'</p>
			</a>
			</li><!-- end message -->';
		}
		return $html;
	}
	function kontakwa($status,$js='',$slug=''){
		global $db;
		if($status==1){
			$sql = $db->query("SELECT * FROM fo where pub='0' order by id asc");
			$hrml ='';
			while($data=$sql->fetch_array()){
				$html .='<li class="col-sm-2 col-md-2 col-lg-2">
				<a href="#"><img src="'.$js.'/img/clients/'.$data['slug'].'.png" width="210" alt="" /></a>
				</li>';
			}
			return $html;
			}elseif($status==2){
			$sql = $db->query("SELECT * FROM `fo`  where slug='$slug' AND pub='0'");
			$data=$sql->fetch_array();
			if($data['active']!=''){
				$act = $data['active'];
				}else{
				$act = '';
			}
			$plugin = "[".$data['data']."]";
			$var = json_decode($plugin);
			$namal = $var[0]->namal;
			$namap = $var[0]->namap;
			$telp = $var[0]->telp;
			$html ='<div class="'.$act.' item">
			<div class="testimonial-item">
			<div class="icon"><i class="fa fa-quote-right"></i></div>
			<blockquote>
			<p>Hubungi Front Office kami :</p>
			<p>Call/SMS/WA</p>
			<p>'.$telp.'</p>
			</blockquote>
			<div class="testimonial-review">
			<img src="'.$js.'/img/clients/'.$slug.'_m.png" alt="'.$namal.'">
			<h1>'.$namal.'<small>'.$namap.'</small></h1>
			<a href="whatsapp://send?phone='.$telp.'&text=Assalamualaikum '.$namal.'"><img style="float:right" src="'.$js.'/img/wa.png" alt="'.$namal.'" width="50"></a>
			</div>
			</div>
			</div>';
			return $html;
			}elseif($status==3){
			$sql = $db->query("SELECT * FROM fo where pub='0' order by id asc");
			$hrml ='';
			while($data=$sql->fetch_array()){
				if($data['active']!=''){
					$act = $data['active'];
					}else{
					$act = '';
				}
				$plugin = "[".$data['data']."]";
				$var = json_decode($plugin);
				$namal = $var[0]->namal;
				$namap = $var[0]->namap;
				$telp = $var[0]->telp;
				$html .='<div class="'.$act.' item">
				<div class="testimonial-item">
				<div class="icon"><i class="fa fa-quote-right"></i></div>
				<blockquote>
				<p>Hubungi Front Office kami :</p>
				<p>Call/SMS/WA</p>
				<p>'.$telp.'</p>
				</blockquote>
				<div class="testimonial-review">
				<img src="'.$js.'/img/clients/'.$data['slug'].'_m.png" alt="'.$namal.'">
				<h1>'.$namal.'<small>'.$namap.'</small></h1>
				<a href="whatsapp://send?phone='.$telp.'&text=Assalamualaikum '.$namal.'"><img style="float:right" src="'.$js.'/img/wa.png" alt="'.$namal.'" width="50"></a>
				</div>
				</div>
				</div>';
			}
			return $html;
		}
	}