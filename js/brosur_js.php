<?php
if (!empty($_POST['link'])){
?>
<script type="text/javascript">

$(document).ready(function() {
	 CustomStyle();
			$('#lbrcetak,#tgcetak').attr('readonly', true);
			$('.harga').hide();
			$('.printpenawaran').hide();
			$(".alert").hide();
			$('.btnon, .btnd, .btnp').prop('disabled', true);
			$('#jmlcetak').keypress(validateNumber);
			$('#lbrcetak,#tgcetak').keypress(validateNumber);
			$('#ketbrosur').keyup(function() {
				$('.btnon').prop('disabled', this.value == "" ? true : false);
			})
			//tambahan untuk biaya lain-lain
			// $('.lain').hide();
			
			//
		});
	 function CustomStyle() {
	$.ajax({
    url: host+'/custom/',
	data: {link: link},
    type: 'POST',
    dataType: 'html',
    success: function (response) {
      $('#customstyle').html(response);
    },
  });
}
		
		$(document).ready(function() {
			$('#lbrcetak').val('21');
			$('#tgcetak').val('29.7');
			$("#ukuran").filter(function() {
				var deptid = 10;
				$.ajax({
					url: host + "/api/"+app_id+"/ukuran/brosur/10",
					type: 'GET',
					dataType: 'json',
					success: function(response) {
						var len = response.length;
						for (var i = 0; i < len; i++) {
							var id = response[i]['id'];
							var name = response[i]['name'];
							$("#ukuran").append("<option value='" + id + "'>" + name + "</option>");
						}
					}
				});
			});
$("#lipat").change(function () {
    var lipatbro = $('#lipat').val();
	// alert(lipatbro);
            if (lipatbro > 0) {
                $("#lipatbro").attr("readonly", false);
				$('#lipatbro').val(3);
            } else {
                $("#lipatbro").attr("readonly", true);
				$('#lipatbro').val(0);
            }
});
			
$("#ukuran").change(function () {
    var ukuran = $(this).val();
    $.ajax({
        url: host + "/cek/cariukuran/",
        type: "POST",
        data: {ukuran: ukuran,app_id:app_id},
        dataType: "json",
        success: function (response) {
            if (response[0] == 0.0) {
                $("#lbrcetak,#tgcetak").attr("readonly", false);
                $("#lbrcetak").val(response[0]);
                $("#tgcetak").val(response[1]);
            } else {
                $("#lbrcetak,#tgcetak").attr("readonly", true);
                $("#lbrcetak").val(response[0]);
                $("#tgcetak").val(response[1]);
            }
        },
    });
});
			$("#bahan").change(function() {
				var deptid = $(this).val();

				$.ajax({
					url: host+'/kertas/',
					type: 'post',
					data: {depart: deptid,app_id:app_id},
					dataType: 'json',
					success: function(response) {
						var len = response.length;
						$("#idkertas").empty();
						for (var i = 0; i < len; i++) {
							var id = response[i]['id'];
							var name = response[i]['name'];
							$("#idkertas").append("<option value='" + id + "'>" + name + "</option>");
						}
					}
				});
			});

		});

		$("#bahan").filter(function() {
			$('select[data-source]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih bahan</option>');
				$.ajax({
					url: $select.attr('data-source'),
				}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});
		$("#idmesin").filter(function() {
			$('select[data-mesin]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih mesin</option>');
				$.ajax({
					url: $select.attr('data-mesin'),
				}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});

		function move() {
			var elem = document.getElementById("myBar");
			var width = 1;
			var id = setInterval(frame, 10);

			function frame() {
				if (width >= 100) {
					clearInterval(id);
					$("#detailtablebro").show();
					$("#myBar").hide();
				} else {
					width++;
					elem.style.width = width + '%';
					$("#hidemyBar").removeClass("display-hidden");
					$("#detailtablebro").hide();
					$("#myBar").show();
				}
			}
		}


		
		function hitung() {

			var bleed = document.getElementById("bleed").value;
			var lbrcetak = parseFloat(document.getElementById("lbrcetak").value) + (2 * parseFloat(bleed));
			var tgcetak = parseFloat(document.getElementById("tgcetak").value) + (2 * parseFloat(bleed));

			var jmlcetak = document.getElementById("jmlcetak").value;
			var bahan = document.getElementById("bahan").value;
			var jmlwarna = document.getElementById("jmlwarna").value;
			var jmlwarna2 = document.getElementById("jmlwarna2").value;
			if (jmlwarna != null && jmlwarna < 1) {
				alert("Jumlah Warna Minimal 1!!");
				return;
			}
			var jml_satuan = 1;
			var lam = document.getElementById("lam").value;
			var jmlset = 1;
			var lbrf1 = 1;
			var tgf1 = 1;
			var lbrf2 = 1;
			var tgf2 = 1;
			var lbrf3 = 1;
			var tgf3 = 1;
			var lbrf4 = 1;
			var tgf4 = 1;
			var lbrf5 = 1;
			var tgf5 = 1;
			var lbrf6 = 1;
			var tgf6 = 1;
			var lbrf7 = 1;
			var tgf7 = 1;
			var lbrf8 = 1;
			var tgf8 = 1;
			var finishing1 = 0;
			var finishing2 = 0;
			var finishing3 = 0;
			var finishing4 = 0;
			var finishing5 = 0;
			var finishing6 = 0;
			var finishing7 = 0;
			var finishing8 = 0;
			var finishing9 = '66';
			var lbrf9 = 1 / (jmlcetak * jml_satuan);
			var tgf9 = 1;
			// alert(lbrf9);
			//spot uv
			if (document.getElementById("finishing4").checked == true) {
				finishing4 = '19';
				lbrf4 = lbrcetak;
				tgf4 = tgcetak;
				finishing8 = '60'; //film
				lbrf8 = 1 / (jmlcetak * jml_satuan);
			}
			//ongkos lipat
			//ongkos lipat
			var lipat = parseInt(document.getElementById("lipat").value);
			if (lipat == '1') {
				lbrf5 = (lipat + 1) / 2;
				finishing5 = '52';
			} else if (lipat == '2') { //lipat pond
				lbrf5 = (lipat + 1) / 2;
				finishing5 = '56';

				lbrf6 = lbrcetak / jmlcetak; //karena di fungsihitung dikalikan jumlah cetak
				tgf6 = tgcetak;
				finishing6 = '13'; // Pisau Pon		
			}
			if (document.getElementById("finishing1brosur").checked == true) { //Poly
				lbrpoly = document.getElementById("lbrpolybrosur").value;
				tgpoly = document.getElementById("tgpolybrosur").value;
				finishing1 = '10'; //Press Poly
				lbrf1 = lbrpoly;
				tgf1 = tgpoly;
				finishing3 = '11'; //Plat Poly
				lbrf3 = lbrpoly / jmlcetak;
				tgf3 = tgpoly;
				finishing7 = '60'; //film Poly
				lbrf7 = 1 / (jmlcetak * jml_satuan);

			}
			var modul = "brosur";
			var insheet = "1";

			var cetak_bagi = "Y";
			var ket = document.getElementById("ketbrosur").value;

			var ket_satuan = "lbr";
			var rim = 500;
			var box = 100;
			var ongpot = 'Y';
			var idmesin = $('#idmesin').val();
			var idkertas = $('#idkertas').val();
			var j_mesin = '';
			var kethitung = '';

			if (jmlcetak != null && jmlcetak < 1) {
				alert("Jumlah Cetakan Kosong!!");
				return;
			}
			if (lbrcetak != null && lbrcetak < 1) {
				document.getElementById("total").value = '';
				document.getElementById("hargasatuan").value = '';
				document.getElementById("hargarim").value = '';
				$('.btnd, .btnp').prop('disabled', true);
				alert(" Lebar Cetakan Kosong!!");
				return;
			}
			if (tgcetak != null && tgcetak < 1) {
				alert("Tinggi Cetakan Kosong!!");
				return;
			}

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					data = JSON.parse(xmlhttp.responseText);
					if(data[0]['akses']=='Y'){
					if ($('#here_table').length) {

						$('#here_table tr:gt(0)').remove();

						var table = $('#here_table').children();
						var i;
						var no = 1;
						var x;
						var ongkos_potong = 0;
						for (i = 0; i < data.length; i++) {
							if (data[i]['ongpot'] == 'Y' && data[i]['beratkertas'] != 0) {
								ongkos_potong = data[i]['ongkos_potong'];
							}
							totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']) + parseInt(data[i]['finishing7']) + parseInt(data[i]['finishing8']) + parseInt(data[i]['finishing9']);
							profit = data[i]['persen'];
							jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
							satuan = jual / jmlcetak / jml_satuan;
							perrim = satuan * rim;

							var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));

							x += "<tr class='text-left'><td>" + data[i]['mesin'] + "</td><td class='text-right' >Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/rim <button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm'>Rp." + formatMoney(jual) + "</button></td><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></tr>";
						}

						table.append(x);

					} else {

						$('#detailtablebro').append("<div class='small table-responsive'> <table id='here_table' class='table' ><thead><tr style='color:#000;padding:0!important'><th  class='text-md-left' style='width:30%!important'>Mesin</th><th class='text-md-right'>Harga</th></tr></thead></table></div>");
						var table = $('#here_table').children();

						var i;
						var no = 1;
						var ongkos_potong = 0;
						for (i = 0; i < data.length; i++) {
							if (data[i]['ongpot'] == 'Y' && data[i]['beratkertas'] != 0) {
								ongkos_potong = data[i]['ongkos_potong'];
							}
							totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']) + parseInt(data[i]['finishing7']) + parseInt(data[i]['finishing8']) + parseInt(data[i]['finishing9']);
							profit = data[i]['persen'];
							jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
							satuan = jual / jmlcetak / jml_satuan;
							perrim = satuan * rim;

							var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));

							x += "<tr class='text-left'><td>" + data[i]['mesin'] + "</td><td class='text-right' >Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/rim <button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm'>Rp." + formatMoney(jual) + "</button></td><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></tr>";
						}
						table.append(x);
					}
					}else{
			 $("#detailtablebro").hide();
			 $("#here_table").show();
			$("#here_table").append("<div class='small'>Data tidak ditemukan</div>");
			}
				}
			}
			var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&jmlwarna=" + jmlwarna + "&jmlwarna2=" + jmlwarna2 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=" + finishing7 + "&finishing8=" + finishing8 + "&finishing9=" + finishing9 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + lbrf7 + "&tgf7=" + tgf7 + "&lbrf8=" + lbrf8 + "&tgf8=" + tgf8 + "&lbrf9=" + lbrf9 + "&tgf9=" + tgf9 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&kethitung=" + kethitung + "&idmesin=" + idmesin + "&idkertas=" + idkertas+"&app_id="+app_id;

			// isi = btoa(isi); //encode			
			// xmlhttp.open("GET", "wadah.php?isi=" + isi, true);
			// xmlhttp.send();
			var url = host+'/sandbox/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(isi);
		}


CustomStyle();
			
		$("#cekukuran").click(function() {
			var jmlcetak = $('#jmlcetak').val();
			var ukuran = $('#ukuran').val();
			var idmesin = $('#idmesin').val();
			var bahan = $('#bahan').val();
			if (jmlcetak == '') {
				salert('warning', 'Oopss...', iMsg['J']);
			} else if (ukuran == 0) {
				salert('warning', 'Oopss...', iMsg['U']);
			} else if (idmesin == 0) {
				salert('warning', 'Oopss...', iMsg['M']);
			} else if (bahan == 0) {
				salert('warning', 'Oopss...', iMsg['B']);
			} else {
				var bleed = $('#bleed').val();
				var lbrcetak = parseFloat($('#lbrcetak').val()) + (2 * parseFloat(bleed));
				var tgcetak = parseFloat($('#tgcetak').val()) + (2 * parseFloat(bleed));
				$.ajax({
					url: host+'/cek/cekukuran/',
					type: 'POST',
					 data: {
					mesin: idmesin,
					lbrcetak: lbrcetak,
					tgcetak: tgcetak,
					app_id: app_id
					},
					dataType: 'json',
					 beforeSend: function () {
					move();
					CustomStyle();
					},
					success: function(res) {
						if (res[0].toString() == 'N') {
							salert('warning', 'Oopss...', iMsg['U'] +'<br>Ukuran cetak - '+lbrcetak+'x'+tgcetak+' cm<br>UK. '+res[1]+' - '+ res[2] +'x'+res[3]+' cm');
						} else {
							hitung();
						}
					}
				});
			}
		});
</script>
<?php
} //end token
else {
	echo json_encode(array(404 => "error"));
}
?>