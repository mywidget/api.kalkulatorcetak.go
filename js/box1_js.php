<?php
if (!empty($_POST['link'])){
?>
<script type="text/javascript">
			$(document).ready(function() {
				$("#bahan" + mod).change(function() {
					var deptid = $(this).val();
					$.ajaxAntri({
						url: host + "/kertas/",
						type: "post",
						data: {
							depart: deptid,
							app_id: app_id
						},
						dataType: "json",
						success: function(response) {
							var len = response.length;
							$("#idkertas").empty();
							for (var i = 0; i < len; i++) {
								var id = response[i]["id"];
								var name = response[i]["name"];
								$("#idkertas").append("<option value='" + id + "'>" + name + "</option>");
							}
						},
					});
				});
				$("#bahan" + mod).filter(function() {
					$("select[data-source]").each(function() {
						var $select = $(this);
						$select.append('<option value="0">Pilih kertas</option>');
						$.ajax({
							url: $select.attr("data-source"),
						}).then(function(options) {
							options.map(function(option) {
								var $option = $("<option>");
								$option.val(option[$select.attr("data-valueKey")]).text(option[$select.attr("data-displayKey")]);
								$select.append($option);
							});
						});
					});
				});
			});
			$(document).ready(function() {
				$('.harga').hide();
				$('.printpenawaran').hide();
				$(".alert").hide();
				$('.btnon, .btnd, .btnp').prop('disabled', true);
				$('#jmlcetak' + mod).keypress(validateNumber);
				$('#lbrcetak' + mod).keypress(validateNumber);
				$('#pjcetak' + mod).keypress(validateNumber);
				$('#jmlwarnabox1').keypress(validateNumber);
				$('#jmlwarnabox2').keypress(validateNumber);
				$('#lbrtutup' + mod).keypress(validateNumber);
				$('#tgcetak' + mod).keypress(validateNumber);
				$('#lbrpoly' + mod).keypress(validateNumber);
				$('#tgpoly' + mod).keypress(validateNumber);
				$('#ket' + mod).keyup(function() {
					$('.btnon').prop('disabled', this.value == "" ? true : false);
				})
			});
			var inputWdithReturn = '100%';
			var cekLebar = document.getElementById("lbrcetakbox1");
			var widthx = cekLebar.clientWidth;
			if (widthx < 50) {
				$('.input').focus(function() {
					$(this).animate({
						width: '60px'
					}, 500);
				});
			}
			$('.input').blur(function() {
				$(this).animate({
					width: inputWdithReturn
				}, 500);
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

			function move(a) {
				var elem = document.getElementById("myBar");
				var width = 1;
				var id = setInterval(frame, 10);

				function frame() {
					if (width >= 100) {
						clearInterval(id);
						if(a=='Y'){
						$("#tablebox1").show();
						}else{
						$("#tablebox1").hide();
						}
						$("#myBar").hide();
					} else {
						width++;
						elem.style.width = width + '%';
						$("#tablebox1").hide();
						$("#myBar").show();
					}
				}
			}
			$(document).ready(function() {
				$('#lbrcetakbox1').val('20');
				$('#tgcetakbox1').val('8');
				$('#pjcetakbox1').val('20');
				$('#bbbox1').val('1');
				$('#lbrtutupbox1').val('1.5');


			})


			function hitungbox1() {
				$('.btnon,.btnd,.btnp').prop('disabled', this.value == "" ? true : false);
				var lbr = document.getElementById("lbrcetakbox1").value;
				var tg = document.getElementById("tgcetakbox1").value;
				var pj = document.getElementById("pjcetakbox1").value;
				var lebartutup = document.getElementById("lbrtutupbox1").value;

				lbrcetak = parseFloat(pj) + (2 * parseFloat(tg));
				tgcetak = (2 * parseFloat(tg)) + (2 * parseFloat(lbr)) + parseFloat(lebartutup);


				var jmlcetak = document.getElementById("jmlcetakbox1").value;
				var bahan = document.getElementById("bahanbox1").value;
				var bb = document.getElementById("bbbox1").value;
				var jmlwarna = document.getElementById("jmlwarnabox1").value;
				var jmlwarna2 = document.getElementById("jmlwarnabox2").value;
				if (jmlwarna == 'Full Color') {
					jmlwarna = 4;
				}
				if (jmlwarna != null && jmlwarna < 1) {
					alert("Jumlah Warna Minimal 1!!");
					return;
				}
				var lam = document.getElementById("lambox1").value;
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
				var lbrf7 = 0;
				var tgf7 = 0;
				var finishing1 = 0;
				var finishing2 = 0;
				var finishing3 = 0;
				var finishing4 = 0;
				var finishing5 = 0;
				var finishing6 = 0;
				var finishing7 = 0;
				var finishing8 = 0;



				var modul = 'box1';
				var insheet = "1";
				var jml_satuan = 1;
				var cetak_bagi = "Y";
				var ket = document.getElementById("ketbox1").value;
				var ket_satuan = "pcs";
				var rim = 500;
				var box = 100;
				var ongpot = 'N';
				var idmesin = $('#idmesin').val();
				var idkertas = $('#idkertas').val();
				var j_mesin = '';
				var kethitung = '';

				//Pond
				lbrf3 = lbrcetak / jmlcetak; //karena di fungsihitung dikalikan jumlah cetak
				tgf3 = tgcetak;
				finishing2 = '12'; //Biaya Pon
				finishing3 = '13'; // Pisau Pon		

				if (document.getElementById("pond" + mod).checked == true) {
					lbrpondoffset = document.getElementById("lbrpond" + mod).value;
					tgpondoffset = document.getElementById("tgpond" + mod).value;
					finishing6 = '12'; //Press pond
					lbrf6 = lbrpondoffset / jmlcetak;
					tgf6 = tgpondoffset;
					finishing7 = '13'; //Plat pond
					lbrf7 = lbrpondoffset / jmlcetak;
					tgf7 = tgpondoffset;
				}
				//SpotUV
				if (document.getElementById("finishing4box1").checked == true) {
					finishing4 = '19';
					lbrf4 = lbrcetak;
					tgf4 = tgcetak;
				}

				if (document.getElementById("finishing1box1").checked == true) { //Poly
					lbrpolykop = document.getElementById("lbrpolybox1").value;
					tgpolykop = document.getElementById("tgpolybox1").value;
					finishing5 = '10'; //Press Poly
					lbrf5 = lbrpolykop;
					tgf5 = tgpolykop;
					finishing1 = '11'; //Plat Poly
					lbrf1 = lbrpolykop / jmlcetak;
					tgf1 = tgpolykop;

				}



				if (jmlcetak != null && jmlcetak < 1) {
					alert("Jumlah Cetakan Kosong!!");
					return;
				}
				if (lbrcetak != null && lbrcetak < 1) {
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
						myArr = JSON.parse(xmlhttp.responseText);

						data = myArr;

						if ($('#tablbox1').length) {
							$('#tablbox1 tr:gt(0)').remove();
							var table = $('#tablbox1').children();
							var i;
							var no = 1;
							var x;
							var ongkos_potong = 0;
							for (i = 0; i < data.length; i++) {

								if (data[i]['ongpot'] == 'Y') {
									ongkos_potong = data[i]['ongkos_potong'];
								}
								totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']) + parseInt(data[i]['finishing7']) + parseInt(data[i]['finishing8']);

								profit = data[i]['persen'];
								jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
								satuan = jual / jmlcetak / jml_satuan;
								perrim = satuan * rim;

								// alert(satuan);
								var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));

								x += "<tr class='text-md-left p-0'><td>" + data[i]['mesin'] + "</td><td class='text-md-right' >Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/rim <input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /><button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm hint--top-left' aria-label='Detail hitung' style='background-color:#ff8000;color:white;width:120px'>Rp." + formatMoney(jual) + "</button></td></tr>";

							}
							table.append(x);

						} else {

							$('#tablebox1').append("<div class='small table-responsive'><table id='tablbox1' class='table'><thead><tr style='background-color:#ff8000;color:white' class='p-0'><th  class='text-left'>Mesin</th><th class='text-md-right'>Harga</th></tr></thead></table></div>");


							var table = $('#tablbox1').children();
							var i;
							var no = 1;
							var ongkos_potong = 0;
							for (i = 0; i < data.length; i++) {

								if (data[i]['ongpot'] == 'Y') {
									ongkos_potong = data[i]['ongkos_potong'];
								}
								totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']) + parseInt(data[i]['finishing7']) + +parseInt(data[i]['finishing8']);

								profit = data[i]['persen'];
								jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
								satuan = jual / jmlcetak / jml_satuan;
								perrim = satuan * rim;
								// alert(jual);
								var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));

								x += "<tr class='text-left'><td>" + data[i]['mesin'] + "</td><td class='text-md-right' >Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/rim <button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm hint--top-left' aria-label='Detail hitung'  style='background-color:#ff8000;color:white;width:120px'>Rp." + formatMoney(jual) + "</button></td><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></tr>";
							}

							table.append(x);
						}

					}
				}
				var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna + "&jmlwarna2=" + jmlwarna2 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=" + finishing7 + "&finishing8=" + finishing8 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + lbrf7 + "&tgf7=" + tgf7 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;

				var url = host + '/sandbox/get/';
				xmlhttp.open('POST', url, true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send(isi);
			}
			//cekukuranbox1
			CustomStyle();
			$("#cekukuranbox1").click(function() {
				var e = $("#jmlcetakbox1").val(),
					k = $("#idkertas").val(),
					t = $("#idmesin").val(),
					b = $("#bahan"+mod).val(),
					v = $("#lbrpond"+mod).val(),
					w = $("#tgpond"+mod).val(),
					x = $("#ket"+mod).val();
			if (0 == Number(e)){
				alert("jumlah belum diisi");
			}else if (0 == t) {
				salert('warning', 'Oops...', iMsg['M']);
			}else if (0 == b) {
					salert('warning', 'Oops...', iMsg['B']);
			}else if (0 == k) {
					salert('warning', 'Oops...', iMsg['K']);
			}else if (document.getElementById("pond" + mod).checked == true && 0 == Number(v)){
					salert('warning', 'Oops...', iMsg['LP']);
			}else if (document.getElementById("pond" + mod).checked == true && 0 == Number(w)){
					salert('warning', 'Oops...', iMsg['TP']);
			}else if (x=="") {
					salert('warning', 'Oops...', iMsg['KT']);
			}else {
					var a = document.getElementById("lbrcetakbox1").value,
						l = document.getElementById("tgcetakbox1").value,
						c = document.getElementById("pjcetakbox1").value,
						o = document.getElementById("lbrtutupbox1").value;
					lbrcetak = parseFloat(c) + 2 * parseFloat(l), tgcetak = 2 * parseFloat(l) + 2 * parseFloat(a) + parseFloat(o), 
					$.ajaxAntri({
						url: host + "/cek/cekukuran/",
						type: "POST",
						data: {
							mesin: t,
							lbrcetak: lbrcetak,
							tgcetak: tgcetak,
							app_id: app_id
						},
						dataType: "json",
						beforeSend: function() {
						CustomStyle();
						move('N');
						},
						success: function(res) {
						if (res[0].toString() == 'N') {
							salert('warning', 'Oops...', iMsg['U'] +'<br>Ukuran cetak - '+lbrcetak+'x'+tgcetak+' cm<br>UK. '+res[1]+' - '+ res[2] +'x'+res[3]+' cm');
							move(res[0].toString());
						} else {
							move(res[0].toString());
							cekpond();
						}
						}
					});
				}
			});
			//cekpond
			function cekpond() {
				var e = document.getElementById("lbrcetakbox1").value,
					t = document.getElementById("pjcetakbox1").value,
					n = document.getElementById("lbrpond" + mod).value,
					r = document.getElementById("tgpond" + mod).value,
					a = new XMLHttpRequest;
				a.onreadystatechange = function() {
					if (4 == a.readyState && 200 == a.status) {
						if (myArr = JSON.parse(a.responseText), "N" == myArr.lp) return void  salert('warning', 'Oops...', iMsg['LPA']), move(myArr.lp);
						if ("N" == myArr.tp) return void salert('warning', 'Oops...', iMsg['TPA']), move(myArr.tp); 
						if ("N" == myArr) return void alert("error");
						hitungbox1()
					}
				};
				var o = "lbrcetak=" + e + "&tgcetak=" + t + "&lp=" + n + "&tp=" + r + "&app_id=" + app_id,
					d = host + "/cek/pond/";
				a.open("POST", d, !0), a.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), a.send(o)
			}
</script>
<?php
} //end token
else {
	echo json_encode(array(404 => "error"));
}
?>