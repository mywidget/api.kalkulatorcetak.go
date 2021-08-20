<?php
if (!empty($_POST['link'])) {
  $sql = $db->query("select * from modul where tag_mod='$modul'");
  $row = $sql->fetch_array();
  $id = $row['ID'];
  $query = $db->query("SELECT * FROM `modul` WHERE `ID` > '$id'");
  $rows = $query->fetch_array();
  if(!empty($row['embed'])){
  $embed = "//www.youtube.com/embed/".$_POST['embed']."?autoplay=1&mute=1&rel=0&modestbranding=1&playlist=".$rows['embed']."";
  }else{
  $embed = "https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;".$_POST['embed']."&#x2F;view?embed";
  }
?>
  <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
    <iframe class="embed-responsive-item" src="<?= $embed; ?>" frameborder="0" allowfullscreen></iframe>
  </div>
  <!--Footer-->
  <div class="modal-footer justify-content-center">
    <span class="mr-4">Cara Hitung <?= $_POST['modname']; ?></span>
    <a target="_blank" href="https://www.facebook.com/kalkulatorcetak" rel="nofollow" type="button" class="btn-floating btn-sm btn-fb"><i class="fab fa-facebook-f"></i></a>
    <!--Twitter-->
    <a target="_blank" href="https://twitter.com/kalkulatorcetak" rel="nofollow" type="button" class="btn-floating btn-sm btn-tw"><i class="fab fa-twitter"></i></a>
	<!--Instagram-->
    <a target="_blank" href="https://instagram.com/kalkulator_cetak" rel="nofollow" type="button" class="btn-floating btn-sm btn-ig"><i class="fab fa-instagram"></i></a>
    <a href="https://youtube.com/channel/UCex9iLaKPyuQDhHCC4GEJhw" target="_blank" type="button" class="btn-floating btn-sm btn-tw"><i class="fab fa-youtube"></i></a>
    <!--Google +-->
    <button type="button" class="btn btn-outline-default btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
  </div>
<?php
} //end token
else {
  echo json_encode(array(404 => "error"));
}
?>