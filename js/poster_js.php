<?php
if (!empty($_POST['link'])){
?>

<script type="text/javascript">
	$(document).ready(function () {
	 CustomStyle();
});
    $(".harga").hide();
    $(".printpenawaran").hide();
    $(".alert").hide();
    $(".btnon, .btnd, .btnp").prop("disabled", true);
	$('#lbrcetakp,#tgcetakp').attr('readonly', true);
    $("#jmlcetakp").keypress(validateNumber);
    $("#ketposter").keyup(function () {
        $(".btnon").prop("disabled", this.value == "" ? true : false);
    });
$('#jmlcetakp').blur(function () {
	if($(this).val() == "" || $(this).val() == '0'){
	$(".jml").removeClass( "has-success" ).addClass( "has-danger" );
    } else {
	$(".jml").removeClass( "has-danger" ).addClass( "has-success" );
	$('#not1').removeClass("blink-bg");
    }
});

$('#lbrcetakp').blur(function () {
	if($(this).val() == "" || $(this).val() == '0'){
	$(".lbrcetakp").removeClass( "has-success" ).addClass( "has-danger" );
    } else {
	$(".lbrcetakp").removeClass( "has-danger" ).addClass( "has-success" );
    }
});

$('#tgcetakp').blur(function () {
	if($(this).val() == "" || $(this).val() == '0'){
	$(".tgcetakp").removeClass( "has-success" ).addClass( "has-danger" );
    } else {
	$(".tgcetakp").removeClass( "has-danger" ).addClass( "has-success" );
    }
});

$('#jmlwarnap').blur(function () {
	if($(this).val() == "" || $(this).val() == '0'){
	$(".jmlwarnap").removeClass( "has-success" ).addClass( "has-danger" );
	return false;
    } else {
	$(".jmlwarnap").removeClass( "has-danger" ).addClass( "has-success" );
    }
});

$('#idmesin').change(function () {
	if($(this).val() == "" || $(this).val() == '0'){
	$(".idmesin").removeClass( "has-success" ).addClass( "has-danger" );
    } else {
	$(".idmesin").removeClass( "has-danger" ).addClass( "has-success" );
	$('#not3').removeClass("blink-bg");
    }
});
$('#ukuranp').change(function () {
	if($(this).val() == "" || $(this).val() == 0){
	$(".ukuranp").removeClass( "has-success" ).addClass( "has-danger" );
    } else {
	$(".ukuranp").removeClass( "has-danger" ).addClass( "has-success" );
	$(".lbrcetakp").removeClass( "has-danger" ).addClass( "has-success" );
	$(".tgcetakp").removeClass( "has-danger" ).addClass( "has-success" );
    }
});
$('#bahanp').change(function () {
	if($(this).val() == "" || $(this).val() == '0'){
	$(".bahanp").removeClass( "has-success" ).addClass( "has-danger" );
	$(".idkertas").removeClass( "has-success" ).addClass( "has-danger" );
    } else {
	$(".bahanp").removeClass( "has-danger" ).addClass( "has-success" );
	$(".idkertas").removeClass( "has-danger" ).addClass( "has-success" );
	$('#not4').removeClass("blink-bg");
    }
});

$('#ketposter').blur(function () {
	if($(this).val() == ""){
	$(".ketposter").removeClass( "has-success" ).addClass( "has-danger" );
    } else {
	$(".ketposter").removeClass( "has-danger" ).addClass( "has-success" );
    }
});
  $(".harga").hide();
  $(".printpenawaran").hide();
  $(".alert").hide();
  $(".btnon, .btnd, .btnp").prop("disabled", true);
  $("#jmlcetakp").keypress(validateNumber);
  $("#ketposter").keyup(function () {
    $(".btnon").prop("disabled", this.value == "" ? true : false);
  });

$(".modal").on("hidden.bs.modal", function () {
    $(this).removeData("bs.modal");
});
$('#idmesin').change(function () {
 var idnya = $(this).val();
        $.ajax({
            url: host+"/cek/mesin/",
            type: "post",
            data: {id:idnya,app_id:app_id},
            dataType: "json",
            success: function (response) {
                var len = response.jenis;
                if(len=='PrintDigital'){
				}else{
				}
            },
        });
});
$(document).ready(function () {
    $("#bahanp").change(function () {
        var deptid = $(this).val();
        $.ajax({
            url: host+"/kertas/",
            type: "post",
            data: {depart: deptid,app_id:app_id},
            dataType: "json",
            success: function (response) {
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
    $("#bahanp").filter(function () {
        $("select[data-source]").each(function () {
            var $select = $(this);
            $select.append('<option value="0">Pilih kertas</option>');
            $.ajax({
                url: $select.attr("data-source"),
            }).then(function (options) {
                options.map(function (option) {
                    var $option = $("<option>");
                    $option.val(option[$select.attr("data-valueKey")]).text(option[$select.attr("data-displayKey")]);
                    $select.append($option);
                });
            });
        });
    });
});
$("#idmesin").filter(function () {
    $("select[data-mesin]").each(function () {
        var $select = $(this);
        $select.append('<option value="0">Pilih mesin</option>');
        $.ajax({
            url: $select.attr("data-mesin"),
        }).then(function (options) {
            options.map(function (option) {
                var $option = $("<option>");
                $option.val(option[$select.attr("data-valueKey")]).text(option[$select.attr("data-displayKey")]);
                $select.append($option);
            });
        });
    });
});
$("#lbrcetakp").val("21");
$("#tgcetakp").val("29.7");
$("#ukuranp").filter(function () {
    var deptid = 10;
    $.ajax({
        url: host + "/api/"+app_id+"/ukuran/"+mod+"/10",
        type: "GET",
        dataType: "json",
        success: function (response) {
            var len = response.length;
            for (var i = 0; i < len; i++) {
                var id = response[i]["id"];
                var name = response[i]["name"];
                $("#ukuranp").append("<option value='" + id + "'>" + name + "</option>");
            }
        },
    });
});
$("#ukuranp").change(function () {
    var ukuran = $(this).val();
    $.ajax({
        url: host + "/cek/cariukuran/",
        type: "POST",
        data: {ukuran: ukuran,app_id:app_id},
        dataType: "json",
        success: function (response) {
            if (response[0] == 0.0) {
                $("#lbrcetakp,#tgcetakp").attr("readonly", false);
                $("#lbrcetakp").val(response[0]);
                $("#tgcetakp").val(response[1]);
            } else {
                $("#lbrcetakp,#tgcetakp").attr("readonly", true);
                $("#lbrcetakp").val(response[0]);
                $("#tgcetakp").val(response[1]);
            }
        },
    });
});

function move() {
    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, 10);
    function frame() {
        if (width >= 100) {
            clearInterval(id);
            $("#tableposter").show();
            $("#myBar").hide();
					// $("#tableposter").fadeIn("fast");
			// $("#myBar").fadeOut("fast");
        } else {
            width++;
            elem.style.width = width + "%";
            $("#hidemyBar").removeClass("display-hidden");
            $("#tableposter").hide();
            $("#myBar").show();
        }
    }
}

function hitungp() {
    $(".btnd, .btnp").prop("disabled", this.value == "" ? true : false);
    var bleed = document.getElementById("bleedp").value;
    var lbrcetak = parseFloat(document.getElementById("lbrcetakp").value) +
        2 * parseFloat(bleed);
    var tgcetak = parseFloat(document.getElementById("tgcetakp").value) +
        2 * parseFloat(bleed);
    var jmlcetak = document.getElementById("jmlcetakp").value;
    var bahan = document.getElementById("bahanp").value;
    var bb = 1;
    var jmlwarna = document.getElementById("jmlwarnap").value;
    if (jmlwarna == "Full Color") {
        jmlwarna = 4;
    }
    if (jmlwarna != null && jmlwarna < 1) {
        alert("Jumlah Warna Minimal 1!!");
        return;
    }
    var lam = document.getElementById("lamp").value;
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
    var lbrf8 = 0;
    var tgf8 = 0;
    var lbrf9 = 0;
    var tgf9 = 0;
    var lbrf10 = 0;
    var tgf10 = 0;
    var finishing1 = 0;
    var finishing2 = 0;
    var finishing3 = 0;
    var finishing4 = 0;
    var finishing5 = 0;
    var finishing6 = 0;
    var cetak_bagi = "Y";
    var modul = "poster";
    var insheet = "1";
    var jml_satuan = 1;
    var cetak_bagi = "Y";
    var ket = document.getElementById("ketposter").value;
    var ket_satuan = "lbr";
    var rim = 500;
    var box = 100;
    var idmesin = $("#idmesin").val();
    var idkertas = $("#idkertas").val();
    var j_mesin = "";
    var kethitung = "";
    var ongpot = "Y";
    var tarikan = "";
    var pakeplat = "";
    if (document.getElementById("finishing4p").checked == true) {
        finishing4 = "19";
        lbrf4 = lbrcetak;
        tgf4 = tgcetak;
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
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            data = JSON.parse(xmlhttp.responseText);
				$("#table_poster").html("");
			if(data[0]['akses']=='Y'){
				$("#table_poster").hide();
            if ($("#tablpos").length) {
                $("#tablpos tr:gt(0)").remove();
                var table = $("#tablpos").children();
                var i;
                var no = 1;
                var x;
                var ongkos_potong = 0;
                for (i = 0; i < data.length; i++) {
		
                    if (data[i]["ongpot"] == "Y" && data[i]["jenismesin"] !="PrintDigital") {
                        ongkos_potong = data[i]["ongkos_potong"];
                    }
                    // if (data[i]["jenismesin"] == "PrintDigital") {
					// }else{
					// }
					//jmlcetak jenismesin
                    totalk = parseInt(data[i]["totcetak"]) +
                        parseInt(data[i]["totbhn"]) +
                        parseInt(ongkos_potong) +
                        parseInt(data[i]["tot_ctp"]) +
                        parseInt(data[i]["totlaminating"]) +
                        parseInt(data[i]["finishing1"]) +
                        parseInt(data[i]["finishing2"]) +
                        parseInt(data[i]["finishing3"]) +
                        parseInt(data[i]["finishing4"]) +
                        parseInt(data[i]["finishing5"]) +
                        parseInt(data[i]["finishing6"]);
                    profit = data[i]["persen"];
                    jual = (parseInt(totalk) * profit) / 100 + parseInt(totalk);
                    satuan = jual / jmlcetak / jml_satuan;
					if(parseInt(data[i]["jmlcetak"]) > rim){
                    perrim = satuan * rim;
                    drim = "| Rp. " + formatMoney(perrim) + "/rim";
					}else{
                    perrim = satuan * rim;
                    drim = "";
					}
                    var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
                    x += "<tr id='ctr' class='text-md-left'><td>" +
                    data[i]["mesin"] + "</td><td id='ctd' class='text-md-right' >Rp. " +
                    formatMoney(satuan) + "/pcs " +
                    drim + " <button type='submit' name='submit' value='" +
                    [i] + "' class='btn btn-warning btn-sm' >Rp." +
                    formatMoney(jual) + "</button></td><input type='hidden' name='jumlahcetak' value='" +
                    jmlcetak + "' /><input type='hidden' name='ket' value='" +
                    ket + "' /><input type='hidden' name='data1[]' value='" +
                    arrStr + "' /></tr>";
                }
                table.append(x);
            } else {
                $("#tableposter").append("<div id='detailpos' class='small'><table id='tablpos' class='table table-striped'><thead ><tr id='ctrh'><th id='cthh' class='text-left'>Mesin</th><th class='text-right'>Harga</th></tr></thead></table></div>");
                var table = $("#tablpos").children();
                var i;
                var no = 1;
                var x;
                var ongkos_potong = 0;
                for (i = 0; i < data.length; i++) {
                    if (data[i]["ongpot"] == "Y") {
                        ongkos_potong = data[i]["ongkos_potong"];
                    }
                    totalk = parseInt(data[i]["totcetak"]) +
                        parseInt(data[i]["totbhn"]) +
                        parseInt(ongkos_potong) +
                        parseInt(data[i]["tot_ctp"]) +
                        parseInt(data[i]["totlaminating"]) +
                        parseInt(data[i]["finishing1"]) +
                        parseInt(data[i]["finishing2"]) +
                        parseInt(data[i]["finishing3"]) +
                        parseInt(data[i]["finishing4"]) +
                        parseInt(data[i]["finishing5"]) +
                        parseInt(data[i]["finishing6"]);
                    profit = data[i]["persen"];
                    jual = (parseInt(totalk) * profit) / 100 + parseInt(totalk);
                    satuan = jual / jmlcetak / jml_satuan;
                   if(parseInt(data[i]["jmlcetak"]) > rim){
                    perrim = satuan * rim;
                    drim = "| Rp. " + formatMoney(perrim) + "/rim";
					}else{
                    perrim = satuan * rim;
                    drim = "";
					}
                    var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
                    x += "<tr class='text-md-left'><td>" +
                    data[i]["mesin"] + "</td><td class='text-md-right' >Rp. " +
                    formatMoney(satuan) + "/pcs " +
                    drim + " <button type='submit' name='submit' value='" +
                    [i] + "' class='btn btn-warning btn-sm' >Rp." +
                    formatMoney(jual) + "</button></td><input type='hidden' name='jumlahcetak' value='" +
                    jmlcetak + "' /><input type='hidden' name='ket' value='" +
                    ket + "' /><input type='hidden' name='data1[]' value='" +
                    arrStr + "' /></tr>";
                }
                table.append(x);
            }
			}else{
			 $("#tableposter").hide();
			 // $("#table_poster").remove();
			 // $("#table_poster").show();
			$("#table_poster").html("<div class='small'>Data tidak ditemukan</div>");
			}
        }
    };
    var isi = "lbrcetak=" +
        lbrcetak + "&tgcetak=" +
        tgcetak + "&jmlcetak=" +
        jmlcetak + "&bahan=" +
        bahan + "&bb=" +
        bb + "&jmlwarna=" +
        jmlwarna + "&jmlwarna2=0&lam=" +
        lam + "&finishing1=" +
        finishing1 + "&finishing2=" +
        finishing2 + "&finishing3=" +
        finishing3 + "&finishing4=" +
        finishing4 + "&finishing5=" +
        finishing5 + "&finishing6=" +
        finishing6 + "&finishing7=0&finishing8=0&finishing9=0&finishing10=0&lbrf1=" +
        lbrf1 + "&tgf1=" +
        tgf1 + "&lbrf2=" +
        lbrf2 + "&tgf2=" +
        tgf2 + "&lbrf3=" +
        lbrf3 + "&tgf3=" +
        tgf3 + "&lbrf4=" +
        lbrf4 + "&tgf4=" +
        tgf4 + "&lbrf5=" +
        lbrf5 + "&tgf5=" +
        tgf5 + "&lbrf6=" +
        lbrf6 + "&tgf6=" +
        tgf6 + "&jmlset=" +
        jmlset + "&modul=" +
        modul + "&insheet=" +
        insheet + "&jml_satuan=" +
        jml_satuan + "&cetak_bagi=" +
        cetak_bagi + "&ket_satuan=" +
        ket_satuan + "&ongpot=" +
        ongpot + "&j_mesin=" +
        j_mesin + "&kethitung=" +
        kethitung + "&idmesin=" +
        idmesin + "&idkertas=" +
        idkertas + "&tarikan=" +
        tarikan + "&lbrf7=" +
        lbrf7 + "&tgf7=" +
        tgf7 + "&lbrf8=" +
        lbrf8 + "&tgf8=" +
        tgf8 + "&lbrf9=" +
        lbrf9 + "&tgf9=" +
        tgf9 + "&lbrf10=" +
        lbrf10 + "&tgf10=" +
        tgf10 + "&pakeplat=" +
        pakeplat + "&ongkos_lipat=0&jilid=0&app_id="+app_id;
    var url = host+"/sandbox/get/";
    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(isi);
}
 CustomStyle();
$("#cekukuranp").click(function () {
    var jmlcetak = $("#jmlcetakp").val();
    var lbrcetakp = $("#lbrcetakp").val();
    var ukuran = $("#ukuranp").val();
    var idmesin = $("#idmesin").val();
    var bahan = $("#bahanp").val();
    var jmlwarnap = $("#jmlwarnap").val();
    if (jmlcetak == "" || jmlcetak == "0") {
        $(".jml").addClass("has-danger");
        alertx("Jumlah belum diisi", "not1", "jmlcetakp");
    } else if (ukuran == 0) {
        alertx("ukuran belum dipilih", "not2", "ukuranp");
    } else if (lbrcetakp == "" || lbrcetakp == 0) {
        alertx("Lebar cetak belum diisi", "a", "lbrcetakp");
    } else if (tgcetakp == "" || tgcetakp == 0) {
        alertx("Tinggi cetak belum diisi", "a", "tgcetakp");
    } else if (jmlwarnap == "" || jmlwarnap == 0) {
        alertx("Jumlah warna belum diisi", "a", "jmlwarnap");
    } else if (idmesin == 0) {
        alertx("mesin belum dipilih", "not3", "idmesin");
    } else if (bahan == 0) {
        alertx("bahan belum dipilih", "not4", "bahanp");
    } else {
        var bleed = $("#bleedp").val();
        var lbrcetak = parseFloat($("#lbrcetakp").val()) + 2 * parseFloat(bleed);
        var tgcetak = parseFloat($("#tgcetakp").val()) + 2 * parseFloat(bleed);
        $.ajax({
            url: host+"/cek/cekukuran/",
            type: "POST",
            data: {
                mesin: idmesin,
                lbrcetak: lbrcetak,
                tgcetak: tgcetak,
                app_id: app_id
            },
            dataType: "json",
            beforeSend: function () {
			move();
			CustomStyle();
			$("#tableposter").hide();
			$("#not1").removeClass("blink-bg");
			$("#cekukuranp").html("Loading");
            },
            success: function (response) {
                if (response[0].toString() == "N") {
                    alertx("Ukuran Kebesaran");
                } else {
                    hitungp();
                $("#cekukuranp").html("HITUNG");
                }
            },
        });
    }
});
	</script>
<?php
// include "js/poster.php";
} //end token
else {
	echo json_encode(array(404 => "error"));
}