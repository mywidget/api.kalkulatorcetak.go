<?php
if ($_POST['link']) {
  $warnabar = "#55aa5f";
  $sql = $db->query("select * from modul where tag_mod='$modul'");
  $row = $sql->fetch_array();
  $id = $row['ID'];
  $query = $db->query("SELECT * FROM `modul` WHERE `ID` > '$id'");
  $rows = $query->fetch_array();
  $embed = $rows['embed'];
?>
  <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/<?= $_POST['embed']; ?>?autoplay=1&mute=1&rel=0&modestbranding=1&playlist=<?= $embed; ?>" frameborder="0" allowfullscreen></iframe>
  </div>
  <!--Footer-->
  <div class="modal-footer justify-content-center">
    <span class="mr-4">Cara Hitung <?= $_POST['modname']; ?></span>
    <a type="button" class="btn-floating btn-sm btn-fb"><i class="icon-social-facebook"></i></a>
    <!--Twitter-->
    <a type="button" class="btn-floating btn-sm btn-tw"><i class="icon-social-twitter"></i></a>
    <a href="https://youtube.com/channel/UCex9iLaKPyuQDhHCC4GEJhw" target="_blank" type="button" class="btn-floating btn-sm btn-tw"><i class="icon-social-youtube"></i></a>
    <!--Google +-->
    <button type="button" class="btn btn-outline-default btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
  </div>
<?php
} //end token
else {
  echo json_encode(array(404 => "error"));
}
?>