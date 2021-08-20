<?php
if (empty($_SESSION['g_level'])){
header("Content-Type: application/json");
echo json_encode(array(401 => "error login"));
}else{
if (($referer==$host OR $referer==$_POST['link'])) {
$warnabar = "#40af26";
?>

<script>
$(document).ready(function() {
	$('.harga').hide();
	$('.printpenawaran').hide();
	$(".alert").hide();
	$('#print_foot').hide();
	$('.btnon, .btnd, .btnp').prop('disabled', true);
	$('#jmlcetakundb').keypress(validateNumber);
	$('#ketundbsurat').keyup(function() {
		$('.btnon').prop('disabled', this.value == "" ? true : false);
	})
});

</script>
<div class="modal-header" style="background-color:<?=$warnabar;?>;color:white;">
	<button type="button" class="close" id="undb" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Cetak Undangan Blangko</h4>
</div>
<div class="modal-body">
   
			<table class="table table-condensed" >
				<tr align="center">
					<th>No</th>
					<th>Kode</th>
					<th>Harga</th>
					<th>OC</th>
					<th>Master</th>
					<th>Plastik</th>
					<th>Jumlah</th>
					<th>Total</th>
					<th>Modal</th>
					<th>Jual</th>
					<th>Profit</th>
				</tr>
            <?php 
				$no = 1;
				$sql_bhn = mysql_query("SELECT * FROM tbl_und_blangko where kode='F7711' "); 
				while($row=mysql_fetch_array($sql_bhn)){ 
				
				$jml = 1;
				while ($jml < 11) {
					$harga 	= $row['harga'];
					$oc 	= $row['oc'];
					$master = $row['master'];
					$harga_plastik 	= $row['harga_plastik'];
					
					$total 	= ($jml * $harga * 100) + $master + ($oc * $jml) + ($harga_plastik * $jml);
					$satuan = ceil($total / ($jml * 100));
					$satuanagen = ceil(($total + ($total * (30/100))) / ($jml * 100));
					$profit = ($satuanagen - $satuan);
				   ?>
				   <tr align="center">
				   <td><?=$no;?></td>
				   <td><?=$row['kode'];?></td>
				   <td><?=$harga;?></td>
				   <td><?=$oc;?></td>
				   <td><?=$master;?></td>
				   <td><?=$harga_plastik;?></td>
				   <td><?=$jml;?></td>
				   <td><?=$total;?></td>
				   <td><?=$satuan;?></td>
				   <td><?=$satuanagen;?></td>
				   <td><?=$profit;?></td>
				   </tr>
				   
				   
				 <?php  
					$jml++;
					$no++;
				   } 
				}
			?>

			</table>
</div>
     
<style>
 th {
font-weight: bold;
text-align: center; }

.table > thead > tr > th {
    vertical-align: middle;
}

</style>
<?php
	}//end token
	else{
echo json_encode(array(404 => "error"));
	}
}
?>