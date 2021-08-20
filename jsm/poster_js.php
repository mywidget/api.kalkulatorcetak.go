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
        
            $("#jmlcetakp").val("500");
            $("#jmlcetakp").hide();
			$("#jmlcetaksp").change(function () {
				var id = $("#jmlcetaksp").val();
				if(id!=''){
					$("#jmlcetakp").val(id);
					$("#jmlcetakp").hide();
					}else{
					$("#jmlcetakp").show();
					$("#jmlcetakp").focus();
					$("#jmlcetakp").val("");
				}
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
        // $('#idmesin').attr("disabled", "disabled"); 
        $("#idkertas").attr("disabled", true);
        $('#pilihb'+mod).on('change', function() {
			if (this.value == '2') {
                $("#idkertas").attr("disabled", false);
                } else {
                $("#idkertas").attr("disabled", true);
            }
        });
        $("#idmesin").attr("disabled", true);
        $('#pilih'+mod).on('change', function() {
			if (this.value == '2') {
                $("#idmesin").attr("disabled", false);
                } else {
                $("#idmesin").attr("disabled", true);
            }
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
                    $select.append('<option value="0">Pilih bahan</option>');
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
        // $("#lbrcetakp").val("21");
        // $("#tgcetakp").val("29.7");
        $("#ukuranp").filter(function () {
            var deptid = 10;
            $.ajax({
                url: link+"/ukuran/"+mod+"/10",
                type: "GET",
                dataType: "json",
                beforeSend: function () {
                    $("#ukuranp").append("<option value='loading'>loading</option>");
                    $("#ukuranp").attr("disabled", true);
                },
                success: function (response) {
                    $("#ukuranp option[value='loading']").remove();
                    $("#ukuranp").attr("disabled", false);
                    $("#ukuranp").append("<option value=''>Pilih ukuran</option>");
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
        
        function move(a) {
            var elem = document.getElementById("myBar");
            var width = 1;
            var id = setInterval(frame, 10);
            function frame() {
                if (width >= 100) {
                    clearInterval(id);
                    ClearInput();
                    if(a=='Y'){
						$("#tableposter").show();
                        $("#myBar").removeClass('w3-green').addClass('w3-deep-orange');
						}else{
						$("#tableposter").hide();
                    }
                    // $("#myBar").hide();
                    } else {
                    width++;
                    elem.style.width = width + "%";
                    $("#hidemyBar").removeClass("display-hidden");
                    $("#tableposter").hide();
                    // $("#myBar").show();
                    $("#myBar").removeClass('w3-deep-orange').addClass('w3-green');
                    disableInput();
                }
            }
        }
        
        function hitungp() {
            startTimer();
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
            var kethitung = "";
            var ongpot = "Y";
            var tarikan = 1;
            var pakeplat = "";
            var idmesin = $("#idmesin").val();
            var pilimesin = $("#pilih"+mod).val();
            if(pilimesin==1){
                j_mesin='';
                }else{
                j_mesin=idmesin;
            }
            var idkertas = $("#idkertas").val();
            var pilihbahan = $("#pilihb"+mod).val();
            if(pilihbahan==1){
                idkertas=0;
                }else{
                idkertas=idkertas;
            }
            // alert(idkertas);
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
                    var myArrr = JSON.parse(JSON.stringify(xmlhttp.responseText));
					var myArr = JSON.parse(myArrr);
					data = myArr;
                    console.log(myArr[0]['data']['akses']);
                    $("#table_poster").html("");
                     if (myArr[0]['data']['akses'] == 'Y') 
                     {
                        move('Y');
                        $("#table_poster").hide();
                        if ($("#tablpos").length) {
                            $("#tablpos tr:gt(0)").remove();
                            var table = $("#tablpos").children();
                            var i;
                            var no = 1;
                            var x;
                            var ongkos_potong = 0;
                            for (i = 0; i < data.length; i++) {
                                
                                if (data[i]['data']["ongpot"] == "Y" && data[i]['data']["jenismesin"] !="PrintDigital") {
                                    ongkos_potong = data[i]['data']["ongkos_potong"];
                                }
                                // if (data[i]["jenismesin"] == "PrintDigital") {
                                // }else{
                                // }
                                //jmlcetak jenismesin
                                totalk = parseInt(data[i]['data']["totcetak"]) +
                                parseInt(data[i]['data']["totbhn"]) +
                                parseInt(ongkos_potong) +
                                parseInt(data[i]['data']["tot_ctp"]) +
                                parseInt(data[i]['data']["totlaminating"]) +
                                parseInt(data[i]['data']["finishing1"]) +
                                parseInt(data[i]['data']["finishing2"]) +
                                parseInt(data[i]['data']["finishing3"]) +
                                parseInt(data[i]['data']["finishing4"]) +
                                parseInt(data[i]['data']["finishing5"]) +
                                parseInt(data[i]['data']["finishing6"]);
                                profit = data[i]['data']["persen"];
                                jual = (parseInt(totalk) * profit) / 100 + parseInt(totalk);
                                satuan = jual / jmlcetak / jml_satuan;
                                if(parseInt(data[i]['data']["jmlcetak"]) > rim){
                                    perrim = satuan * rim;
                                    drim = "| Rp. " + formatMoney(perrim) + "/rim";
                                    }else{
                                    perrim = satuan * rim;
                                    drim = "";
                                }
                                var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i]['data'])));
                                x += "<tr id='ctr' class='text-md-left'><td>" +
                                data[i]['data']["mesin"] + "</td><td id='ctd' class='text-md-right' >Rp. " +
                                formatMoney(satuan) + "/pcs " +
                                drim + " <button type='submit' name='submit' value='" +
                                [i] + "' class='btn btn-warning btn-sm hint--top-left' aria-label='Klik Detail data' >Rp." +
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
                                if (data[i]['data']["ongpot"] == "Y") {
                                    ongkos_potong = data[i]['data']["ongkos_potong"];
                                }
                                totalk = parseInt(data[i]['data']["totcetak"]) +
                                parseInt(data[i]['data']["totbhn"]) +
                                parseInt(ongkos_potong) +
                                parseInt(data[i]['data']["tot_ctp"]) +
                                parseInt(data[i]['data']["totlaminating"]) +
                                parseInt(data[i]['data']["finishing1"]) +
                                parseInt(data[i]['data']["finishing2"]) +
                                parseInt(data[i]['data']["finishing3"]) +
                                parseInt(data[i]['data']["finishing4"]) +
                                parseInt(data[i]['data']["finishing5"]) +
                                parseInt(data[i]['data']["finishing6"]);
                                profit = data[i]['data']["persen"];
                                jual = (parseInt(totalk) * profit) / 100 + parseInt(totalk);
                                satuan = jual / jmlcetak / jml_satuan;
                                if(parseInt(data[i]['data']["jmlcetak"]) > rim){
                                    perrim = satuan * rim;
                                    drim = "| Rp. " + formatMoney(perrim) + "/rim";
                                    }else{
                                    perrim = satuan * rim;
                                    drim = "";
                                }
                                var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i]['data'])));
                                x += "<tr class='text-md-left'><td>" +
                                data[i]['data']["mesin"] + "</td><td class='text-md-right' >Rp. " +
                                formatMoney(satuan) + "/pcs " +
                                drim + " <button type='submit' name='submit' value='" +
                                [i] + "' class='btn btn-warning btn-sm hint--top-left' aria-label='Klik Detail data' >Rp." +
                                formatMoney(jual) + "</button></td><input type='hidden' name='jumlahcetak' value='" +
                                jmlcetak + "' /><input type='hidden' name='ket' value='" +
                                ket + "' /><input type='hidden' name='data1[]' value='" +
                                arrStr + "' /></tr>";
                            }
                            table.append(x);
                        }
                        }else{
                        $("#tableposter").hide();
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
            var url = host+"/sandboxm/get/";
            xmlhttp.open("POST", url, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(isi);
        }
        CustomStyle();
        $("#cekukuranp").click(function () {
            var jmlcetak = $("#jmlcetakp").val();
            var lbrcetakp = $("#lbrcetakp").val();
            var tgcetakp = $("#lbrcetakp").val();
            var ukuran = $("#ukuranp").val();
            var bahan = $("#bahanp").val();
            var jmlwarnap = $("#jmlwarnap").val();
            var idmesin = $("#idmesin").val();
            var pilih = $("#pilih"+mod).val();
            if(pilih==1){
                idmesin = pilih;
                }else{
                idmesin = $("#idmesin").val();
            }
            if (jmlcetak == "" || jmlcetak == "0") {
                $(".jml").addClass("has-danger");
                salert('warning', 'Oops...', iMsg['J']);
                } else if (ukuran == "" || ukuran == 0) {
                salert('warning', 'Oops...', iMsg['H']);
                } else if (lbrcetakp == "" || lbrcetakp == 0) {
                salert('warning', 'Oops...', iMsg['L']);
                } else if (tgcetakp == "" || tgcetakp == 0) {
                salert('warning', 'Oops...', iMsg['T']);
                } else if (jmlwarnap == "" || jmlwarnap == 0) {
                salert('warning', 'Oops...', iMsg['jw']);
                } else if (idmesin == 0) {
                salert('warning', 'Oops...', iMsg['M']);
                } else if (bahan == 0) {
                salert('warning', 'Oops...', iMsg['B']);
                } else {
                var bleed = $("#bleedp").val();
                var lbrcetak = parseFloat($("#lbrcetakp").val()) + 2 * parseFloat(bleed);
                var tgcetak = parseFloat($("#tgcetakp").val()) + 2 * parseFloat(bleed);
                $.ajax({
                    url: host+"/cekm/cekukuran/",
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
                        $("#cekukuranp").html("Loading");
                    },
                    success: function (response) {
                        if (response[0].toString() == "N") {
                            alertx("Ukuran Kebesaran");
                            } else {
                            counter('Poster');
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