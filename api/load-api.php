<?php
    define("BASEPATH", "");
    header("Access-Control-Allow-Origin: *");
    session_start();
    require_once '../class/Mobile_Detect.php';
    // include __DIR__ . '/../class/Mobile_Detect.php';
    include __DIR__ . '/../class/lib/function.php';
    include __DIR__ . '/../class/filter.inc.php';
    include __DIR__ . '/../class/web_function.php';
    include __DIR__ . '/../class/controler.php';
    include __DIR__ . '/../class/referer.php';
    include __DIR__ . '/../class/link.inc.php';
    include __DIR__ . '/../class/app_config.php';
    define("SITE_MOD", "api.kalkulatorcetak.go/api/".$_appid."/");
    $get = filterget('mod');
    $domain = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
    $std    = json_decode(file_get_contents("php://input"));
    $_SESSION['appid'] = $std->app_id;
   
    // echo $pagenum;
    switch($get){
        case "morea":
        $start = $pagenum;
        $limit = $pagelimit;
        $GAPPID = $_appid;
        $jenis = array('secret'=>$_appsecret,'app_id'=>$_appid,'domain'=>$domain,'start'=>$start,'limit'=>$limit);
        $sync = curl(URL_API,json_encode($jenis));
        
        $gApp = json_decode($sync,true);
        $data = json_decode($gApp['dstyle'], true);
        $arrt = $data['theme'];
        $arr = $gApp['dproduk'];
        $gProduk = $gApp['modul'];
        $rowCount = $gApp['count'];
        
    ?>
    <div class="container text-center list_content">
        <div class="row">
            <?php
                
                
                $animate = 0;
                if ($animate == 1) {
                    $ani = 'card-lift--hover';
                    } else {
                    $ani = '';
                }
                
                if ($detect->isMobile()) {
                    $cols = 6;
                    $mb = 1;
                    $mt = 3;
                    $none = 'd-none d-sm-block';
                    $shadow = '';
                    $border = '';
                    $btnhit = '<i class="ni ni-app"></i>';
                    $button = '<i class="ni ni-button-play"></i>';
                    $play = '<i class="ni ni-button-play thumb-icon text-danger"></i>';
                    } else {
                    $cols = 4;
                    $mb = 3;
                    $mt = 3;
                    $none = '';
                    $shadow = 'shadow';
                    $border = 'border-0';
                    $btnhit = '<span class="btn-inner--icon"><i class="ni ni-app"></i> Hitung</span>';
                    $button = '<span class="btn-inner--icon"><i class="ni ni-button-play text-d"></i> video</span>';
                    $play = '';
                }
                if(!empty($gProduk)) :
                foreach($gProduk AS $key=>$data){
                    
                    if ($data['css_class'] == '') {
                        $className = 'modal-md';
                        } else {
                        $className = 'modal-lg';
                    }
                    $rowid = paramEncrypt('rowid=' . $data['slug'] . '&uid=' . $gApp['uid']);
                    
                    $id_pid = $data['ID'];
                    $ap_pid = $GAPPID;
                    
                    $seo = "../";
                    
                    if(!empty($data['video'])){
                        $embed = $data['video'];
                        }else{
                        $embed = $data['video2'];
                    }
                    $img = "/produk/" . $data['slug'] . ".jpg";
                    $imgb = "/produk/" . $data['slug'] . "_big.jpg";
                    $hitung = '<a href="#" class="btn btn-success" data-modFile="modul" data-appId="' . $ap_pid . '" data-modWarna="' . $data['warna'] . '"  data-namaMod="' . $data['name'] . '" data-modName="modsatu" data-className="' . $className . '" data-modLink="' . SITE_MOD . '" id="onhidebtn" data-toggle="modal" data-id="' . $rowid . '" data-target="#myModalProd" data-backdrop="static" data-keyboard="false">' . $btnhit . '</a>';
                    
                    $video = '<a href="#" data-ModeName="' . $data['name'] . '" data-vidLink="' . SITE_MOD . '" data-embed="' . $embed . '" data-vid="' . $rowid . '" data-modFile="video" data-modWarna="' . $data['warna'] . '"  id="onhidebtn" data-toggle="modal"  data-target="#VideoDemo" data-backdrop="static" data-keyboard="false" data-container="body" data-animation="true" class="btn btn-warning btn-icon ">
                    ' . $button . '</a>';
                    
                    $btntest = btnplay($host, $rowid, $data['name'], SITE_MOD, $embed, $className, $ap_pid, $seo);
                    $styles = stylesx($arrt[0]['klass'], $arrt[0]['pub'], $mb, $ani, $cols, $data['name'], $data['warna'], $className, $img, $host, $rowid, $hitung, $video, $btntest, SITE_MOD, $ap_pid);
                    echo $styles;
                    $mods = $data['slug'];
                    $html .= "<div id='mySidenav" . $mods . "' class='sidenav'>
                    <span class='title'>Gambar " . $data['name'] . "</span><a href='javascript:void(0)' class='closebtn' onclick='closeNav(\"$mods\")'>&times;</a>
                    <img src='" . $imgb . "' class='img-responsive' alt=''>
                    </div>";
                    $html .= "<script>
                    $(document).on('hide.bs.modal', function () {
                    document.getElementById('mySidenav$mods').style.width = '0';
                    $('#c-nav$mods').hide();
                    });
                    </script>";
                    echo  $html;
                }
                endif;
            ?>
            </div>
        <nav aria-label="Page navigation example" class="mb-4 mt-<?= $mt; ?> ">
            <?php if($start <= $rowCount){ ?>
                <a class="btn btn-lmore" href="https://api.kalkulatorcetak.go/apiapp/moreb/<?=$start;?>/<?=$limit;?>/<?= $_appid; ?>/<?= $_appsecret; ?>">Hitungan Lainnya</a>
            <?php } ?>
        </nav>
    </div>
    <?php
        break;	
        case "moreb":
        $limit = 6;
        $start = $pagenum + $limit;
        $GAPPID = $_appid;
        $jenis = array('secret'=>$_appsecret,'app_id'=>$_appid,'domain'=>$domain,'start'=>$start,'limit'=>$limit);
        $sync = curl(URL_API,json_encode($jenis));
        $gApp = json_decode($sync,true);
        $data = json_decode($gApp['dstyle'], true);
        $arrt = $data['theme'];
        $arr = $gApp['dproduk'];
        $gProduk = $gApp['modul'];
        $rowCount = $gApp['count'];
        if($rowCount >1){
        ?>
        <div class="container text-center list_content">
            <div class="row">
                <?php
                    
                    
                    $animate = 0;
                    if ($animate == 1) {
                        $ani = 'card-lift--hover';
                        } else {
                        $ani = '';
                    }
                    
                    
                    
                    if ($detect->isMobile()) {
                        $cols = 6;
                        $mb = 1;
                        $mt = 3;
                        $none = 'd-none d-sm-block';
                        $shadow = '';
                        $border = '';
                        $btnhit = '<i class="ni ni-app"></i>';
                        $button = '<i class="ni ni-button-play"></i>';
                        $play = '<i class="ni ni-button-play thumb-icon text-danger"></i>';
                        } else {
                        $cols = 4;
                        $mb = 3;
                        $mt = 3;
                        $none = '';
                        $shadow = 'shadow';
                        $border = 'border-0';
                        $btnhit = '<span class="btn-inner--icon"><i class="ni ni-app"></i> Hitung</span>';
                        $button = '<span class="btn-inner--icon"><i class="ni ni-button-play text-d"></i> video</span>';
                        $play = '';
                    }
                    if(!empty($gProduk)) :
                    foreach($gProduk AS $key=>$data){
                        
                        if ($data['css_class'] == '') {
                            $className = 'modal-md';
                            } else {
                            $className = 'modal-lg';
                        }
                        $rowid = paramEncrypt('rowid=' . $data['slug'] . '&uid=' . $gApp['uid']);
                        
                        $id_pid = $data['ID'];
                        $ap_pid = $GAPPID;
                        
                        $seo = "../";
                        
                        if(!empty($data['video'])){
                            $embed = $data['video'];
                            }else{
                            $embed = $data['video2'];
                        }
                        $img = "/produk/" . $data['slug'] . ".jpg";
                        $imgb = "/produk/" . $data['slug'] . "_big.jpg";
                        $hitung = '<a href="#" class="btn btn-success" data-modFile="modul" data-appId="' . $ap_pid . '" data-modWarna="' . $data['warna'] . '"  data-namaMod="' . $data['name'] . '" data-modName="modsatu" data-className="' . $className . '" data-modLink="' . SITE_MOD . '" id="onhidebtn" data-toggle="modal" data-id="' . $rowid . '" data-target="#myModalProd" data-backdrop="static" data-keyboard="false">' . $btnhit . '</a>';
                        
                        $video = '<a href="#" data-ModeName="' . $data['name'] . '" data-vidLink="' . SITE_MOD . '" data-embed="' . $embed . '" data-vid="' . $rowid . '" data-modFile="video" data-modWarna="' . $data['warna'] . '"  id="onhidebtn" data-toggle="modal"  data-target="#VideoDemo" data-backdrop="static" data-keyboard="false" data-container="body" data-animation="true" class="btn btn-warning btn-icon ">
                        ' . $button . '</a>';
                        
                        $btntest = btnplay($host, $rowid, $data['name'], SITE_MOD, $embed, $className, $ap_pid, $seo);
                        $styles = stylesx($arrt[0]['klass'], $arrt[0]['pub'], $mb, $ani, $cols, $data['name'], $data['warna'], $className, $img, $host, $rowid, $hitung, $video, $btntest, SITE_MOD, $ap_pid);
                        echo $styles;
                        $mods = $data['slug'];
                        $html .= "<div id='mySidenav" . $mods . "' class='sidenav'>
                        <a href='javascript:void(0)' class='closebtn' onclick='closeNav(\"$mods\")'>&times;</a>
                        <span class='title'>Gambar " . $data['name'] . "</span>
                        <img src='" . $imgb . "' class='img-responsive' alt=''>
                        </div>";
                        $html .= "<script>
                        $(document).on('hide.bs.modal', function () {
                        document.getElementById('mySidenav$mods').style.width = '0';
                        $('#c-nav$mods').hide();
                        });
                        </script>";
                        echo  $html;
                    }
                    endif;
                ?>
            </div>
            <nav aria-label="Page navigation example" class="mb-4 mt-<?= $mt; ?> ">
                <?php if($start <= $rowCount){ ?>
                    <a class="btn btn-lmore" href="https://api.kalkulatorcetak.go/apiapp/moreb/<?=$start;?>/<?=$limit;?>/<?= $_appid; ?>/<?= $_appsecret; ?>">Hitungan Lainnya</a>
                <?php } ?>
            </nav>
        </div>
        <?php
        }
        break;	
        
        //case api mores
        case "mores":
        $GAPPID     = $std->app_id;
        $jenis      = array('secret'=>$std->secret,'app_id'=>$std->app_id,'domain'=>$std->domain,'start'=>$std->start,'limit'=>$std->limit);
        $sync       = curl(URL_API,json_encode($jenis));
        $gApp       = json_decode($sync,true);
        $data       = json_decode($gApp['dstyle'], true);
        $status     = $gApp['status'];
        $arrt       = $data['theme'];
        $gProduk    = $gApp['modul'];
        $rowCount   = $gApp['count'];
        
    ?>
    <div class="container text-center list_content">
        <div class="row">
            <?php
                if($status==0){
                    echo '<div class="col-md-3"></div><div class="col-md-6 mb-3"><div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>'.$gProduk[0]['name'].'</strong> </span>
                    </div></div><div class="col-md-3"></div>';
                    exit;
                }
                
                if($status==5){
                    echo '<div class="col-md-3"></div><div class="col-md-6 mb-3"><div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>'.$gProduk[0]['name'].'</strong> </span>
                    </div></div><div class="col-md-3"></div>';
                    exit;
                }
                
                $animate = 0;
                if ($animate == 1) {
                    $ani = 'card-lift--hover';
                    } else {
                    $ani = '';
                }
                
                if ( $detect->isMobile() ) {
                    $cols = 6;
                    $mb = 1;
                    $mt = 3;
                    $none = 'd-none d-sm-block';
                    $shadow = '';
                    $border = '';
                    $btnhit = '<i class="ni ni-app"></i>';
                    $button = '<i class="ni ni-button-play"></i>';
                    $play = '<i class="ni ni-button-play thumb-icon text-danger"></i>';
                    } else {
                    $cols = kolom($arrt[0]['kolom']);
                    $mb = 3;
                    $mt = 3;
                    $none = '';
                    $shadow = 'shadow';
                    $border = 'border-0';
                    $btnhit = '<span class="btn-inner--icon"><i class="ni ni-app"></i> Hitung</span>';
                    $button = '<span class="btn-inner--icon"><i class="ni ni-button-play text-d"></i> video</span>';
                    $play = '';
                }
                
                if(!empty($gProduk)) :
                foreach($gProduk AS $key=>$data){
                    
                    if ($data['className'] == '') {
                        $className = 'modal-md';
                        } else {
                        $className = 'modal-lg';
                    }
                    $rowid = paramEncrypt('rowid=' . $data['slug'] . '&uid=' . $gApp['uid']);
                    
                    $id_pid = $data['ID'];
                    $ap_pid = $GAPPID;
                    
                    $seo = "../";
                    
                    if(!empty($data['video'])){
                        $embed = $data['video'];
                        }else{
                        $embed = $data['video2'];
                    }
                    $img = "/produk/" . $data['slug'] . ".jpg";
                    $imgb = "/produk/" . $data['slug'] . "_big.jpg";
                    $hitung = '<a href="#" class="btn btn-success" data-modFile="modul" data-appId="' . $ap_pid . '" data-modWarna="' . $data['warna'] . '"  data-namaMod="' . $data['name'] . '" data-modName="modsatu" data-className="' . $className . '" data-modLink="' . $std->domain . '" id="onhidebtn" data-toggle="modal" data-id="' . $rowid . '" data-target="#myModalProd" data-backdrop="static" data-keyboard="false">' . $btnhit . '</a>';
                    
                    $video = '<a href="#" data-ModeName="' . $data['name'] . '" data-vidLink="' . $std->domain . '" data-embed="' . $embed . '" data-vid="' . $rowid . '" data-modFile="video" data-modWarna="' . $data['warna'] . '"  id="onhidebtn" data-toggle="modal"  data-target="#VideoDemo" data-backdrop="static" data-keyboard="false" data-container="body" data-animation="true" class="btn btn-warning btn-icon ">
                    ' . $button . '</a>';
                    
                    $btntest = btnplay($host, $rowid, $data['name'], $std->domain, $embed, $className, $ap_pid, $seo);
                    $styles = stylesx($arrt[0]['klass'], $arrt[0]['pub'], $mb, $ani, $cols, $data['name'], $data['warna'], $className, $img, $host, $rowid, $hitung, $video, $btntest, $std->domain, $ap_pid);
                    echo $styles;
                    $mods = $data['slug'];
                    $html .= "<div id='mySidenav" . $mods . "' class='sidenav'>
                    <span class='title'>Gambar " . $data['name'] . "</span><a href='javascript:void(0)' class='closebtn' onclick='closeNav(\"$mods\")'>&times;</a>
                    <img src='" . $imgb . "' class='img-responsive' alt=''>
                    </div>";
                    $html .= "<script>
                    $(document).on('hide.bs.modal', function () {
                    document.getElementById('mySidenav$mods').style.width = '0';
                    $('#c-nav$mods').hide();
                    });
                    </script>";
                    echo  $html;
                }
                endif;
            ?>
        </div>
        <nav aria-label="Page navigation example" class="mb-4 mt-<?= $mt; ?> ">
            <?php if($start <= $rowCount){ ?>
                <a class="btn btn-lmore" href="<?=$std->url_more;?>/<?=$std->start;?>/<?=$std->limit;?>">Hitungan Lainnya</a>
            <?php } ?>
        </nav>
    </div>
    <?php
        break;	
        case "more":
        $start  = $pagenum + $std->limit;
        $GAPPID = $std->app_id;
        $jenis  = array('secret'=>$std->secret,'app_id'=>$std->app_id,'domain'=>$std->domain,'start'=>$start,'limit'=>$std->limit);
        $sync   = curl(URL_API,json_encode($jenis));
        $gApp   = json_decode($sync,true);
        $data   = json_decode($gApp['dstyle'], true);
        $arrt   = $data['theme'];
        
        // $arr = $gApp['dproduk'];
        $gProduk = $gApp['modul'];
        $rowCount = $gApp['count'];
        if($rowCount >1){
        ?>
        <div class="container text-center list_content">
            <div class="row">
                <?php
                    
                    
                    $animate = 0;
                    if ($animate == 1) {
                        $ani = 'card-lift--hover';
                        } else {
                        $ani = '';
                    }
                    
                    
                    
                    if ($detect->isMobile()) {
                        $cols = 6;
                        $mb = 1;
                        $mt = 3;
                        $none = 'd-none d-sm-block';
                        $shadow = '';
                        $border = '';
                        $btnhit = '<i class="ni ni-app"></i>';
                        $button = '<i class="ni ni-button-play"></i>';
                        $play = '<i class="ni ni-button-play thumb-icon text-danger"></i>';
                        } else {
                        $cols = kolom($arrt[0]['kolom']);
                        $mb = 3;
                        $mt = 3;
                        $none = '';
                        $shadow = 'shadow';
                        $border = 'border-0';
                        $btnhit = '<span class="btn-inner--icon"><i class="ni ni-app"></i> Hitung</span>';
                        $button = '<span class="btn-inner--icon"><i class="ni ni-button-play text-d"></i> video</span>';
                        $play = '';
                    }
                    if(!empty($gProduk)) :
                    foreach($gProduk AS $key=>$data){
                        
                        if ($data['className'] == '') {
                            $className = 'modal-md';
                            } else {
                            $className = 'modal-lg';
                        }
                        $rowid = paramEncrypt('rowid=' . $data['slug'] . '&uid=' . $gApp['uid']);
                        
                        $id_pid = $data['ID'];
                        $ap_pid = $GAPPID;
                        
                        $seo = "../";
                        
                        if(!empty($data['video'])){
                            $embed = $data['video'];
                            }else{
                            $embed = $data['video2'];
                        }
                        $img = "/produk/" . $data['slug'] . ".jpg";
                        $imgb = "/produk/" . $data['slug'] . "_big.jpg";
                        $hitung = '<a href="#" class="btn btn-success" data-modFile="modul" data-appId="' . $ap_pid . '" data-modWarna="' . $data['warna'] . '"  data-namaMod="' . $data['name'] . '" data-modName="modsatu" data-className="' . $className . '" data-modLink="' . $std->domain . '" id="onhidebtn" data-toggle="modal" data-id="' . $rowid . '" data-target="#myModalProd" data-backdrop="static" data-keyboard="false">' . $btnhit . '</a>';
                        
                        $video = '<a href="#" data-ModeName="' . $data['name'] . '" data-vidLink="' . $std->domain . '" data-embed="' . $embed . '" data-vid="' . $rowid . '" data-modFile="video" data-modWarna="' . $data['warna'] . '"  id="onhidebtn" data-toggle="modal"  data-target="#VideoDemo" data-backdrop="static" data-keyboard="false" data-container="body" data-animation="true" class="btn btn-warning btn-icon ">
                        ' . $button . '</a>';
                        
                        $btntest = btnplay($host, $rowid, $data['name'], $std->domain, $embed, $className, $ap_pid, $seo);
                        $styles = stylesx($arrt[0]['klass'], $arrt[0]['pub'], $mb, $ani, $cols, $data['name'], $data['warna'], $className, $img, $host, $rowid, $hitung, $video, $btntest, $std->domain, $ap_pid);
                        echo $styles;
                        $mods = $data['slug'];
                        $html .= "<div id='mySidenav" . $mods . "' class='sidenav'>
                        <a href='javascript:void(0)' class='closebtn' onclick='closeNav(\"$mods\")'>&times;</a>
                        <span class='title'>Gambar " . $data['name'] . "</span>
                        <img src='" . $imgb . "' class='img-responsive' alt=''>
                        </div>";
                        $html .= "<script>
                        $(document).on('hide.bs.modal', function () {
                        document.getElementById('mySidenav$mods').style.width = '0';
                        $('#c-nav$mods').hide();
                        });
                        </script>";
                        echo  $html;
                    }
                    endif;
                ?>
            </div>
            <nav aria-label="Page navigation example" class="mb-4 mt-<?= $mt; ?> ">
                <?php if($start <= $rowCount){ ?>
                    <a class="btn btn-lmore" href="<?=$std->url_more;?>/<?=$start;?>/<?=$std->limit;?>">Hitungan Lainnya</a>
                <?php } ?>
            </nav>
        </div>
        <?php
        }
        break;	
        
    }
?>