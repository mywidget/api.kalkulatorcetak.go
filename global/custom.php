<?php
    define("BASEPATH", ''); 
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Credentials: true ");
    header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
    header("Access-Control-Allow-Headers: Content-Type, Depth, User-Agent, X-File-Size, X-Requested-With, If-Modified-Since, X-File-Name, Cache-Control");
    if (!empty($_POST['link'])){
        // $level = $_POST['level'];
    ?>
    <style>
        .title{
        font-family: 'Nunito Sans', sans-serif !important;
        }
        input:disabled {
        background: #66001a;
        }
        th{font-weight:700;text-align:center}.table>thead>tr>th{vertical-align:middle;padding:5px 5px!important}.blink-text{color:#fdfdff;font-weight:700;animation:blinkingText 2s infinite}@keyframes blinkingText{0%{color:#10c018}25%{color:#1056c0}50%{color:#ef0a1a}75%{color:#254878}100%{color:#04a1d5}}.blink-bg{color:#fff;animation:blinkingBackground 2s infinite}@keyframes blinkingBackground{0%{background-color:#10c018}25%{background-color:#1056c0}50%{background-color:#ef0a1a}75%{background-color:#254878}100%{background-color:#04a1d5}}th{font-weight:700;text-align:center}.table>thead>tr>th{vertical-align:middle;padding:2px 5px}
        .table th, .table td {
        padding: 5px;
        vertical-align: middle;
        border-top: 0.0625rem solid #dee2e6;
        }
        .table {
        margin-bottom: 0!important;
        }
        select.form-control-sm:not([size]):not([multiple]), .input-group-sm > select.form-control:not([size]):not([multiple]), .input-group-sm > select.input-group-addon:not([size]):not([multiple]), .input-group-sm > .input-group-btn > select.btn:not([size]):not([multiple]) {
        height: 30.75px;
        }
        .ket{height:35.75px!important}
        .v2{padding:10px!important}
        .form-group{margin-bottom:2px!important}
        .custom-select:disabled {color: #8898aa;background-color: #e9ecef;
        }
        [class*=hint--]{position:relative;display:inline-block}[class*=hint--]:after,[class*=hint--]:before{position:absolute;-webkit-transform:translate3d(0,0,0);-moz-transform:translate3d(0,0,0);transform:translate3d(0,0,0);visibility:hidden;opacity:0;z-index:1000000;pointer-events:none;-webkit-transition:.3s ease;-moz-transition:.3s ease;transition:.3s ease;-webkit-transition-delay:0s;-moz-transition-delay:0s;transition-delay:0s}[class*=hint--]:hover:after,[class*=hint--]:hover:before{visibility:visible;opacity:1}[class*=hint--]:hover:after,[class*=hint--]:hover:before{-webkit-transition-delay:.1s;-moz-transition-delay:.1s;transition-delay:.1s}[class*=hint--]:before{content:'';position:absolute;background:0 0;border:6px solid transparent;z-index:1000001}[class*=hint--]:after{background:#383838;color:#fff;padding:8px 10px;font-size:12px;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;line-height:12px;white-space:nowrap}[class*=hint--][aria-label]:after{content:attr(aria-label)}[class*=hint--][data-hint]:after{content:attr(data-hint)}[aria-label='']:after,[aria-label='']:before,[data-hint='']:after,[data-hint='']:before{display:none!important}.hint--top-left:before{border-top-color:#383838}.hint--top-right:before{border-top-color:#383838}.hint--top:before{border-top-color:#383838}.hint--bottom-left:before{border-bottom-color:#383838}.hint--bottom-right:before{border-bottom-color:#383838}.hint--bottom:before{border-bottom-color:#383838}.hint--left:before{border-left-color:#383838}.hint--right:before{border-right-color:#383838}.hint--top:before{margin-bottom:-11px}.hint--top:after,.hint--top:before{bottom:100%;left:50%}.hint--top:before{left:calc(50% - 6px)}.hint--top:after{-webkit-transform:translateX(-50%);-moz-transform:translateX(-50%);transform:translateX(-50%)}.hint--top:hover:before{-webkit-transform:translateY(-8px);-moz-transform:translateY(-8px);transform:translateY(-8px)}.hint--top:hover:after{-webkit-transform:translateX(-50%) translateY(-8px);-moz-transform:translateX(-50%) translateY(-8px);transform:translateX(-50%) translateY(-8px)}.hint--bottom:before{margin-top:-11px}.hint--bottom:after,.hint--bottom:before{top:100%;left:50%}.hint--bottom:before{left:calc(50% - 6px)}.hint--bottom:after{-webkit-transform:translateX(-50%);-moz-transform:translateX(-50%);transform:translateX(-50%)}.hint--bottom:hover:before{-webkit-transform:translateY(8px);-moz-transform:translateY(8px);transform:translateY(8px)}.hint--bottom:hover:after{-webkit-transform:translateX(-50%) translateY(8px);-moz-transform:translateX(-50%) translateY(8px);transform:translateX(-50%) translateY(8px)}.hint--right:before{margin-left:-11px;margin-bottom:-6px}.hint--right:after{margin-bottom:-14px}.hint--right:after,.hint--right:before{left:100%;bottom:50%}.hint--right:hover:before{-webkit-transform:translateX(8px);-moz-transform:translateX(8px);transform:translateX(8px)}.hint--right:hover:after{-webkit-transform:translateX(8px);-moz-transform:translateX(8px);transform:translateX(8px)}.hint--left:before{margin-right:-11px;margin-bottom:-6px}.hint--left:after{margin-bottom:-14px}.hint--left:after,.hint--left:before{right:100%;bottom:50%}.hint--left:hover:before{-webkit-transform:translateX(-8px);-moz-transform:translateX(-8px);transform:translateX(-8px)}.hint--left:hover:after{-webkit-transform:translateX(-8px);-moz-transform:translateX(-8px);transform:translateX(-8px)}.hint--top-left:before{margin-bottom:-11px}.hint--top-left:after,.hint--top-left:before{bottom:100%;left:50%}.hint--top-left:before{left:calc(50% - 6px)}.hint--top-left:after{-webkit-transform:translateX(-100%);-moz-transform:translateX(-100%);transform:translateX(-100%)}.hint--top-left:after{margin-left:12px}.hint--top-left:hover:before{-webkit-transform:translateY(-8px);-moz-transform:translateY(-8px);transform:translateY(-8px)}.hint--top-left:hover:after{-webkit-transform:translateX(-100%) translateY(-8px);-moz-transform:translateX(-100%) translateY(-8px);transform:translateX(-100%) translateY(-8px)}.hint--top-right:before{margin-bottom:-11px}.hint--top-right:after,.hint--top-right:before{bottom:100%;left:50%}.hint--top-right:before{left:calc(50% - 6px)}.hint--top-right:after{-webkit-transform:translateX(0);-moz-transform:translateX(0);transform:translateX(0)}.hint--top-right:after{margin-left:-12px}.hint--top-right:hover:before{-webkit-transform:translateY(-8px);-moz-transform:translateY(-8px);transform:translateY(-8px)}.hint--top-right:hover:after{-webkit-transform:translateY(-8px);-moz-transform:translateY(-8px);transform:translateY(-8px)}.hint--bottom-left:before{margin-top:-11px}.hint--bottom-left:after,.hint--bottom-left:before{top:100%;left:50%}.hint--bottom-left:before{left:calc(50% - 6px)}.hint--bottom-left:after{-webkit-transform:translateX(-100%);-moz-transform:translateX(-100%);transform:translateX(-100%)}.hint--bottom-left:after{margin-left:12px}.hint--bottom-left:hover:before{-webkit-transform:translateY(8px);-moz-transform:translateY(8px);transform:translateY(8px)}.hint--bottom-left:hover:after{-webkit-transform:translateX(-100%) translateY(8px);-moz-transform:translateX(-100%) translateY(8px);transform:translateX(-100%) translateY(8px)}.hint--bottom-right:before{margin-top:-11px}.hint--bottom-right:after,.hint--bottom-right:before{top:100%;left:50%}.hint--bottom-right:before{left:calc(50% - 6px)}.hint--bottom-right:after{-webkit-transform:translateX(0);-moz-transform:translateX(0);transform:translateX(0)}.hint--bottom-right:after{margin-left:-12px}.hint--bottom-right:hover:before{-webkit-transform:translateY(8px);-moz-transform:translateY(8px);transform:translateY(8px)}.hint--bottom-right:hover:after{-webkit-transform:translateY(8px);-moz-transform:translateY(8px);transform:translateY(8px)}.hint--large:after,.hint--medium:after,.hint--small:after{white-space:normal;line-height:1.4em;word-wrap:break-word}.hint--small:after{width:80px}.hint--medium:after{width:150px}.hint--large:after{width:300px}[class*=hint--]:after{text-shadow:0 -1px 0 #000;box-shadow:4px 4px 8px rgba(0,0,0,.3)}.hint--error:after{background-color:#b34e4d;text-shadow:0 -1px 0 #592726}.hint--error.hint--top-left:before{border-top-color:#b34e4d}.hint--error.hint--top-right:before{border-top-color:#b34e4d}.hint--error.hint--top:before{border-top-color:#b34e4d}.hint--error.hint--bottom-left:before{border-bottom-color:#b34e4d}.hint--error.hint--bottom-right:before{border-bottom-color:#b34e4d}.hint--error.hint--bottom:before{border-bottom-color:#b34e4d}.hint--error.hint--left:before{border-left-color:#b34e4d}.hint--error.hint--right:before{border-right-color:#b34e4d}.hint--warning:after{background-color:#c09854;text-shadow:0 -1px 0 #6c5328}.hint--warning.hint--top-left:before{border-top-color:#c09854}.hint--warning.hint--top-right:before{border-top-color:#c09854}.hint--warning.hint--top:before{border-top-color:#c09854}.hint--warning.hint--bottom-left:before{border-bottom-color:#c09854}.hint--warning.hint--bottom-right:before{border-bottom-color:#c09854}.hint--warning.hint--bottom:before{border-bottom-color:#c09854}.hint--warning.hint--left:before{border-left-color:#c09854}.hint--warning.hint--right:before{border-right-color:#c09854}.hint--info:after{background-color:#3986ac;text-shadow:0 -1px 0 #1a3c4d}.hint--info.hint--top-left:before{border-top-color:#3986ac}.hint--info.hint--top-right:before{border-top-color:#3986ac}.hint--info.hint--top:before{border-top-color:#3986ac}.hint--info.hint--bottom-left:before{border-bottom-color:#3986ac}.hint--info.hint--bottom-right:before{border-bottom-color:#3986ac}.hint--info.hint--bottom:before{border-bottom-color:#3986ac}.hint--info.hint--left:before{border-left-color:#3986ac}.hint--info.hint--right:before{border-right-color:#3986ac}.hint--success:after{background-color:#458746;text-shadow:0 -1px 0 #1a321a}.hint--success.hint--top-left:before{border-top-color:#458746}.hint--success.hint--top-right:before{border-top-color:#458746}.hint--success.hint--top:before{border-top-color:#458746}.hint--success.hint--bottom-left:before{border-bottom-color:#458746}.hint--success.hint--bottom-right:before{border-bottom-color:#458746}.hint--success.hint--bottom:before{border-bottom-color:#458746}.hint--success.hint--left:before{border-left-color:#458746}.hint--success.hint--right:before{border-right-color:#458746}.hint--always:after,.hint--always:before{opacity:1;visibility:visible}.hint--always.hint--top:before{-webkit-transform:translateY(-8px);-moz-transform:translateY(-8px);transform:translateY(-8px)}.hint--always.hint--top:after{-webkit-transform:translateX(-50%) translateY(-8px);-moz-transform:translateX(-50%) translateY(-8px);transform:translateX(-50%) translateY(-8px)}.hint--always.hint--top-left:before{-webkit-transform:translateY(-8px);-moz-transform:translateY(-8px);transform:translateY(-8px)}.hint--always.hint--top-left:after{-webkit-transform:translateX(-100%) translateY(-8px);-moz-transform:translateX(-100%) translateY(-8px);transform:translateX(-100%) translateY(-8px)}.hint--always.hint--top-right:before{-webkit-transform:translateY(-8px);-moz-transform:translateY(-8px);transform:translateY(-8px)}.hint--always.hint--top-right:after{-webkit-transform:translateY(-8px);-moz-transform:translateY(-8px);transform:translateY(-8px)}.hint--always.hint--bottom:before{-webkit-transform:translateY(8px);-moz-transform:translateY(8px);transform:translateY(8px)}.hint--always.hint--bottom:after{-webkit-transform:translateX(-50%) translateY(8px);-moz-transform:translateX(-50%) translateY(8px);transform:translateX(-50%) translateY(8px)}.hint--always.hint--bottom-left:before{-webkit-transform:translateY(8px);-moz-transform:translateY(8px);transform:translateY(8px)}.hint--always.hint--bottom-left:after{-webkit-transform:translateX(-100%) translateY(8px);-moz-transform:translateX(-100%) translateY(8px);transform:translateX(-100%) translateY(8px)}.hint--always.hint--bottom-right:before{-webkit-transform:translateY(8px);-moz-transform:translateY(8px);transform:translateY(8px)}.hint--always.hint--bottom-right:after{-webkit-transform:translateY(8px);-moz-transform:translateY(8px);transform:translateY(8px)}.hint--always.hint--left:before{-webkit-transform:translateX(-8px);-moz-transform:translateX(-8px);transform:translateX(-8px)}.hint--always.hint--left:after{-webkit-transform:translateX(-8px);-moz-transform:translateX(-8px);transform:translateX(-8px)}.hint--always.hint--right:before{-webkit-transform:translateX(8px);-moz-transform:translateX(8px);transform:translateX(8px)}.hint--always.hint--right:after{-webkit-transform:translateX(8px);-moz-transform:translateX(8px);transform:translateX(8px)}.hint--rounded:after{border-radius:4px}.hint--no-animate:after,.hint--no-animate:before{-webkit-transition-duration:0s;-moz-transition-duration:0s;transition-duration:0s}.hint--bounce:after,.hint--bounce:before{-webkit-transition:opacity .3s ease,visibility .3s ease,-webkit-transform .3s cubic-bezier(.71,1.7,.77,1.24);-moz-transition:opacity .3s ease,visibility .3s ease,-moz-transform .3s cubic-bezier(.71,1.7,.77,1.24);transition:opacity .3s ease,visibility .3s ease,transform .3s cubic-bezier(.71,1.7,.77,1.24)}
        #detailtablebro,#detailpos{max-height:160px;overflow-y:auto;}
    </style>
    <script>
        function counter(modul){
            $.ajax({
                url: host + '/counter/',
                type: 'POST',
                data: {
                    mod: modul,
                    app_id: app_id
                },
                dataType: 'json',
                success: function () {}
            });
        }
        // var level = '$level';
        if(level=='demo'){
			var waktuLog = 10;
			var max_count = 10; 
			}else{
			var waktuLog = 1;
			var max_count = 1; 
        }
		// console.log(level);
		var c = 0; logout = true;
		
		function startTimer(){
			setTimeout(function(){
				logout = true;
				c = 0; 
				// max_count = 5;
				$('.btn-sm').prop('disabled', true);
				$('.close').prop('disabled', true);
				$('.btnon').prop('disabled', true);
				$('#ket'+mod).prop('disabled', true);
				$('#cekukuran,#cekukuranp,#cekukuran'+mod).html(max_count);
				startCount();
            },waktuLog);
        }
		
		function callTimer(){
			20;
        }
		function resetTimer(){
			logout = false;
			startTimer();
			callTimer();
        }
		
		function timedCount() {
			c = c + 1;
			remaining_time = max_count - c;
			if( remaining_time == 0 && logout ){
				$('.btn-sm').prop('disabled', false);
				$('.close').prop('disabled', false);
				$('.btnon').prop('disabled', false);
				$('#cekukuran,#cekukuranp,#cekukuran'+mod).html("HITUNG");
				$('#ket'+mod).prop('disabled', false);
				$('.btnon').removeClass('btn-danger').addClass('btn-primary');;
				$("#ket"+mod).css("background-color","#ffffff");
				}else{
				$("#ket"+mod).css("background-color","#bbbbbb");
				$('#ket'+mod).prop('disabled', true);
				$('.btn-sm').prop('disabled', true);
				$('.close').prop('disabled', true);
				$('.btnon').prop('disabled', true);
				$('.btnon').removeClass('btn-primary').addClass('btn-danger');
				$('#cekukuran,#cekukuranp,#cekukuran'+mod).html(remaining_time);
				t = setTimeout(function(){timedCount()}, 1000);
            }
        }
		
		function startCount() {
			timedCount();
        }
		
        function ClearInput() {
            $('.btnon').prop('disabled', false);
            $("input").prop('disabled', false);
            // $("select").prop("disabled", false);
        }
        function disableInput() {
			$('.btnon').prop('disabled', true);
            $("input").prop('disabled', true);
            // $("select").prop("disabled", true);
        }
        $('#lbrtutup' + mod).blur(function () {
            if ($(this).val() == "") {
                $(".lbr").removeClass("has-success").addClass("has-danger");
                $('#lbrtutup' + mod).val(0);
                } else {
                $(".lbr").removeClass("has-danger").addClass("has-success");
            }
        });
        $('#jmlcetak' + mod).blur(function () {
            if ($(this).val() == "" || $(this).val() == '0') {
                $(".jml").removeClass("has-success").addClass("has-danger");
                } else {
                $(".jml").removeClass("has-danger").addClass("has-success");
                $('#not1').removeClass("blink-bg");
            }
        });
        $('#lbrcetak' + mod).blur(function () {
            if ($(this).val() == "" || $(this).val() == '0') {
                $(".lbrcetak" + mod).removeClass("has-success").addClass("has-danger");
                } else {
                $(".lbrcetak" + mod).removeClass("has-danger").addClass("has-success");
            }
        });
        $('#pjcetak' + mod).blur(function () {
            if ($(this).val() == "" || $(this).val() == '0') {
                $(".pjcetak" + mod).removeClass("has-success").addClass("has-danger");
                } else {
                $(".pjcetak" + mod).removeClass("has-danger").addClass("has-success");
            }
        });
        $('#tgcetak' + mod).blur(function () {
            if ($(this).val() == "" || $(this).val() == '0') {
                $(".tgcetakp" + mod).removeClass("has-success").addClass("has-danger");
                } else {
                $(".tgcetakp" + mod).removeClass("has-danger").addClass("has-success");
            }
        });
        $('#jmlwarna' + mod).blur(function () {
            if ($(this).val() == "" || $(this).val() == '0') {
                $(".jmlwarnap").removeClass("has-success").addClass("has-danger");
                return false;
                } else {
                $(".jmlwarnap").removeClass("has-danger").addClass("has-success");
            }
        });
        $('#idmesin').change(function () {
            if ($(this).val() == "" || $(this).val() == 0) {
                $(".idmesin" + mod).removeClass("has-success").addClass("has-danger");
                } else {
                $(".idmesin" + mod).removeClass("has-danger").addClass("has-success");
            }
        });
        $('#idmesinb').change(function () {
            if ($(this).val() == "" || $(this).val() == '0') {
                $(".idmesinb").removeClass("has-success").addClass("has-danger");
                } else {
                $(".idmesinb").removeClass("has-danger").addClass("has-success");
                $('#not5').removeClass("blink-bg");
            }
        });
        $('#bahan' + mod).change(function () {
            if ($(this).val() == "" || $(this).val() == '0') {
                $(".bahan" + mod).removeClass("has-success").addClass("has-danger");
                $(".idkertas").removeClass("has-success").addClass("has-danger");
                } else {
                $(".bahan" + mod).removeClass("has-danger").addClass("has-success");
                $(".idkertas").removeClass("has-danger").addClass("has-success");
                $('#not4').removeClass("blink-bg");
            }
        });
        $('#bahanbawah' + mod).change(function () {
            if ($(this).val() == "" || $(this).val() == '0') {
                $(".bahanbawah" + mod).removeClass("has-success").addClass("has-danger");
                $(".idkertasb").removeClass("has-success").addClass("has-danger");
                } else {
                $(".bahanbawah" + mod).removeClass("has-danger").addClass("has-success");
                $(".idkertasb").removeClass("has-danger").addClass("has-success");
            }
        });
        $('#ket' + mod).blur(function () {
            if ($(this).val() == "") {
                $(".ket" + mod).removeClass("has-success").addClass("has-danger");
                } else {
                $(".ket" + mod).removeClass("has-danger").addClass("has-success");
            }
        });
        $("#finishingpb").click(function () {
            var checked = $(this).is(':checked');
            if (checked) {
                $('#lbrpolypb').removeAttr("readonly");
                $('#tgpolypb').removeAttr("readonly");
                } else {
                $('#lbrpolypb').attr("readonly", true);
                $('#tgpolypb').attr("readonly", true);
                $('#lbrpolypb').val(1);
                $('#tgpolypb').val(1);
            }
        });
        $("#finishing1" + mod).click(function () {
            var checked = $(this).is(':checked');
            if (checked) {
                $('#lbrpoly' + mod).removeAttr("readonly");
                $('#tgpoly' + mod).removeAttr("readonly");
                } else {
                $('#lbrpoly' + mod).attr("readonly", true);
                $('#tgpoly' + mod).attr("readonly", true);
                $('#lbrpoly' + mod).val(1);
                $('#tgpoly' + mod).val(1);
            }
        });
        $("#nomoratornot").click(function () {
            var checked = $(this).is(':checked');
            if (checked) {
                $('#jmlnomnot').removeAttr("readonly");
                } else {
                $('#jmlnomnot').attr("readonly", true);
            }
        });
        $("#porporasinot").click(function () {
            var checked = $(this).is(':checked');
            if (checked) {
                $('#jmlpornot').removeAttr("readonly");
                } else {
                $('#jmlpornot').attr("readonly", true);
            }
        });
        $("#finishing1am2").click(function () {
            var checked = $(this).is(':checked');
            if (checked) {
                $('#lbrpolyam2').removeAttr("readonly");
                $('#tgpolyam2').removeAttr("readonly");
                } else {
                $('#lbrpolyam2').attr("readonly", true);
                $('#tgpolyam2').attr("readonly", true);
            }
        });
        $("#pond" + mod).click(function () {
            var checked = $(this).is(':checked');
            if (checked) {
                $('#lbrpond' + mod).removeAttr("readonly");
                $('#tgpond' + mod).removeAttr("readonly");
                } else {
                $('#lbrpond' + mod).attr("readonly", true);
                $('#tgpond' + mod).attr("readonly", true);
                $('#lbrpond' + mod).val(0);
                $('#tgpond' + mod).val(0);
            }
        });
        $("#jmlcetak"+mod).hide();
        $("#jmlcetaks"+mod).change(function () {
            var id = $("#jmlcetaks"+mod).val();
            if (id != '') {
                $("#jmlcetak"+mod).val(id);
                $("#jmlcetak"+mod).hide();
                } else {
                $("#jmlcetak"+mod).val("");
                $("#jmlcetak"+mod).show();
            }
        });
        $("#jmlcetakm").hide();
        $("#jmlcetakskm").change(function () {
            var id = $("#jmlcetakskm").val();
            if (id != '') {
                $("#jmlcetakm").val(id);
                $("#jmlcetakm").hide();
                } else {
                $("#jmlcetakm").val("");
                $("#jmlcetakm").show();
            }
        });
        $("#jmlcetakpb").hide();
        $("#jmlcetakspb").change(function () {
            var id = $("#jmlcetakspb").val();
            if (id != '') {
                $("#jmlcetakpb").val(id);
                $("#jmlcetakpb").hide();
                } else {
                $("#jmlcetakpb").val("");
                $("#jmlcetakpb").show();
            }
        });
        $("#jmlcetakbu").hide();
        $("#jmlcetaksbu").change(function () {
            var id = $("#jmlcetaksbu").val();
            if (id != '') {
                $("#jmlcetakbu").val(id);
                $("#jmlcetakbu").hide();
                } else {
                $("#jmlcetakbu").val("");
                $("#jmlcetakbu").show();
            }
        });
        var iMsg = {
            A  : "",
            B  : "Bahan belum dipilih",
            BC : "Bahan cover belum dipilih",
            Bi1 : "Bahan isi 1 belum dipilih",
            Bi2 : "Bahan isi 2 belum dipilih",
            Bi3 : "Bahan isi 3 belum dipilih",
            C  : "",
            D  : "",
            E  : "",
            F  : "",
            G  : "",
            H  : "Ukuran belum dipilih",
            J  : "Jumlah cetak kosong",
            JW : "Jumlah Warna kosong",
            L  : "Lebar cetak kosong",
            K  : "Kertas belum dipilih",
            KT : "Keterangan masih kosong",
            LT : "Lebar Tutup",
            LP : "Lebar Pond tidak boleh nol/kosong",
            LPA: "Lebar Pond kebesaran",
            TPA: "Tinggi Pond kebesaran",
            M  : "Mesin belum dipilih",
            Mi1 : "Mesin isi 1 belum dipilih",
            Mi2 : "Mesin isi 2 belum dipilih",
            Mi3 : "Mesin isi 3 belum dipilih",
            MC : "Mesin cover belum dipilih",
            P  : "Panjang masih kosong masih kosong",
            T  : "Tinggi masih kosong",
            TP : "Tinggi pond tidak boleh nol/kosong",
            U  : "Ukuran kebesaran",
            W  : "Jumlah Warna Minimal!!",
            W1  : "Jumlah Warna 1 masih kosong",
            W2  : "Jumlah Warna 2 masih kosong",
            Z  : ""
        };
        
    </script>
    <?php
        
    } //end token
    else {
        echo json_encode(array(404 => "error custom"));
    }
?>