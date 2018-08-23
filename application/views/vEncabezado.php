<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="<?php print base_url(); ?>img/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php print base_url(); ?>img/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php print base_url(); ?>img/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php print base_url(); ?>img/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php print base_url(); ?>img/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php print base_url(); ?>img/apple-touch-icon-60x60.png" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php print base_url(); ?>img/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php print base_url(); ?>img/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php print base_url(); ?>img/apple-touch-icon-152x152.png" />
        <link rel="icon" type="image/png" href="<?php print base_url(); ?>img/favicon-196x196.png" sizes="196x196" />
        <link rel="icon" type="image/png" href="<?php print base_url(); ?>img/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/png" href="<?php print base_url(); ?>img/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php print base_url(); ?>img/favicon-16x16.png" sizes="16x16" />
        <link rel="icon" type="image/png" href="<?php print base_url(); ?>img/favicon-128.png" sizes="128x128" />

        <meta name="application-name" content="&nbsp;"/>
        <meta name="msapplication-TileColor" content="#FFFFFF" />
        <meta name="msapplication-TileImage" content="mstile-144x144.png" />
        <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
        <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
        <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
        <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />


        <meta name="theme-color" content="#ffffff">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>SHOESOFT ERP</title>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php print base_url(); ?>js/jquery-3.2.1.min.js"></script>
        <!--Estilo principal-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-flaty.css">
        <!--Submenu-->
        <link href="<?php print base_url('js/submenu-boostrap4/bootstrap-4-navbar.min.css') ?>" rel="stylesheet">

        <!--DataTables Plugin-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>js/tabletools/master/DataTables/datatables.min.css">
        <script src="<?php echo base_url(); ?>js/tabletools/master/DataTables/datatables.min.js"></script>

        <script src="<?php echo base_url(); ?>js/tabletools/master/DataTables/datatables.min.js"></script>
        <script src="<?php echo base_url(); ?>js/tabletools/master/DataTables/JSZip-3.1.3/jszip.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/tabletools/master/DataTables/Buttons-1.5.1/js/buttons.html5.min.js" type="text/javascript"></script>
        <!--select2 control-->
        <script src="<?php echo base_url(); ?>js/selectize/js/standalone/selectize.min.js"></script>
        <link href="<?php echo base_url(); ?>js/selectize/css/selectize.bootstrap.css" rel="stylesheet" />

        <!--Third Party-->

        <!-- PivotTable.js libs from ../dist -->
        <script  src="<?php print base_url(); ?>js/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="<?php print base_url(); ?>js/pivot/dist/pivot.css">
        <script  src="<?php print base_url(); ?>js/pivot/dist/pivot.js"></script>

        <!--Pace loading and performance for web applications-->
        <script src="<?php print base_url(); ?>js/pace.min.js"></script>
        <link href="<?php print base_url(); ?>css/pace.css" rel="stylesheet" />
        <!--Font Awesome Icons-->
        <script defer src="<?php print base_url(); ?>js/fontawesome-all.js"></script>
        <link rel="stylesheet" href="<?php print base_url(); ?>css/animate.min.css">
        <!--HoldOn Stupid Accions-->
        <link href="<?php print base_url(); ?>css/HoldOn.min.css" rel="stylesheet">
        <script src="<?php print base_url(); ?>js/HoldOn/HoldOn.min.js"></script>
        <!--HoldOn Stupid Accions-->
        <script src="<?php print base_url(); ?>js/touch/jquery.touch.min.js"></script>
        <!--MasekdAll-->
        <script src="<?php print base_url(); ?>js/inputmask/dependencyLibs/inputmask.dependencyLib.jquery.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/jquery.inputmask.bundle.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/inputmask.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/inputmask.extensions.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/inputmask.numeric.extensions.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/inputmask.date.extensions.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/inputmask.phone.extensions.js"></script>
        <script src="<?php print base_url(); ?>js/inputmask/jquery.inputmask.min.js"></script>


        <!--Masked number format money etc-->
        <script src="<?php print base_url(); ?>js/jquery.maskedinput.min.js"></script>
        <!--Masked number format money etc-->
        <script src="<?php print base_url(); ?>js/jquery.maskMoney.min.js"></script>
        <!--Modales simplificados-->
        <script src="<?php print base_url(); ?>js/swal/sweetalert.min.js"></script>

        <!--Notifiers-->
        <script src="<?php echo base_url(); ?>js/notify/bootstrap-notify-3.1.3/bootstrap-notify.min.js"></script>
        <!--jQuery Number Format-->
        <script src="<?php echo base_url(); ?>js/jnumber/jquery.number.min.js"></script>
        <!--JS XLXS API-->
        <script src="<?php echo base_url(); ?>js/js-xlsx/jszip.js"></script>
        <script src="<?php echo base_url(); ?>js/js-xlsx/xlsx.js"></script>
        <!--Final Modifiers for CSS-->
        <link href="<?php print base_url(); ?>css/style.css" rel="stylesheet" />
        <script src="<?php echo base_url(); ?>js/scripts.js"></script>

    </head>
    <script>
        var base_url = "<?php print base_url(); ?>";

        var isMobile = false;
        function mobilecheck() {
            (function (a) {
                if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4)))
                    isMobile = true;
            })(navigator.userAgent || navigator.vendor || window.opera);
            return isMobile;
        }


        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="popover"]').popover();
            $('.numbersOnly').keypress(function (event) {
                var charCode = (event.which) ? event.which : event.keyCode;
                if (
                        (charCode !== 45 || $(this).val().indexOf('-') !== -1) && // “-” CHECK MINUS, AND ONLY ONE.
                        (charCode !== 46 || $(this).val().indexOf('.') !== -1) && // “.” CHECK DOT, AND ONLY ONE.
                        (charCode < 48 || charCode > 57))
                    return false;

                return true;
            });
            $(window).click(function () {
                if (parseInt($('#myNav').width()) > 0) {
                    closeNav();
                }
            });
            $("select").selectize({
                hideSelected: true,
                openOnFocus: false
            });
//            $("select").not('.NotOpenDropDown').not('.notSelect').selectize({
//                hideSelected: true,
//                openOnFocus: true
//            });
//            $("select").filter('.NotOpenDropDown').not('.notSelect').selectize({
//                hideSelected: true,
//                openOnFocus: false
//            });


            $('.modal').on('shown.bs.modal', function (e) {
                $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
            });

            $(".date").inputmask({alias: "date"});

            $('.money').maskMoney({prefix: '$', allowNegative: false, thousands: ',', decimal: '.', affixesStay: false});

            $('[data-provide="datepicker"]').inputmask({alias: "date"});
            $('[data-provide="datepicker"]').addClass("notEnter");
            $('[data-provide="datepicker"]').val();

//            $('[data-provide="timepicker"]').inputmask({mask: "h:s t\\m",
//                placeholder: "hh:mm xm - hh:mm xm",
//                alias: "datetime",
//                hourFormat: "12"
//            });

            $('[data-provide="timepicker"]').inputmask("hh:mm:ss", {
                hourFormat: "24",
                placeholder: "HH:MM:SS",
                insertMode: false,
                showMaskOnHover: false

            }
            );

        });
        function onNotify(span, message, type) {
            swal((type === 'danger') ? 'ERROR' : 'ATENCIÓN', message, (type === 'danger') ? 'warning' : 'info');
        }
        function onNotifyOld(icon, message, type) {
            $.notify({
                icon: icon,
                message: message
            }, {
                type: type,
                z_index: 3031,
                delay: 2000,
                placement: {
                    from: "bottom",
                    align: "right"
                },
                animate: {
                    enter: 'animated flipInX',
                    exit: 'animated flipOutX'
                },

            });
        }
        function isValid(p) {
            var inputs = $('#' + p).find("input.form-control:required").length;
            var inputs_textarea = $('#' + p).find("textarea.form-control:required").length;
            var selects = $('#' + p).find("select.required").length;
            var valid_inputs = 0;
            var valid_inputs_textarea = 0;
            var valid_selects = 0;
            $.each($('#' + p).find("input.form-control:required"), function () {
                var e = $(this).parent().find("small.text-danger");
                if ($(this).val() === '' && e.length === 0) {
                    $(this).parent().find("label").after("<small class=\"text-danger\"> Este campo es obligatorio</small>");
                    $(this).css("border", "1px solid #d01010");
                    valido = false;
                } else {
                    if ($(this).val() !== '') {
                        $(this).css("border", "1px solid #ccc");
                        $(this).parent().find("small.text-danger").remove();
                        valid_inputs += 1;
                    }
                }
            });
            $.each($('#' + p).find("textarea.form-control:required"), function () {
                var e = $(this).parent().find("small.text-danger");
                if ($(this).val() === '' && e.length === 0) {
                    $(this).parent().find("label").after("<small class=\"text-danger\"> Este campo es obligatorio</small>");
                    $(this).css("border", "1px solid #d01010");
                    valido = false;
                } else {
                    if ($(this).val() !== '') {
                        $(this).css("border", "1px solid #ccc");
                        $(this).parent().find("small.text-danger").remove();
                        valid_inputs_textarea += 1;
                    }
                }
            });
            $.each($('#' + p).find("select.required"), function () {
                var e = $(this).parent().find("small.text-danger");
                if ($(this).val() === '' && e.length === 0) {
                    $(this).after("<small class=\"text-danger\"> Este campo es obligatorio</small>");
                    $(this).parent().find(".selectize-input").css("border", "1px solid #d01010");
                    valido = false;
                } else {
                    if ($(this).val() !== '') {
                        $(this).parent().find(".selectize-input").css("border", "1px solid #ccc");
                        $(this).parent().find("small.text-danger").remove();
                        valid_selects += 1;
                    }
                }
            });
            if (valid_inputs === inputs && valid_selects === selects && valid_inputs_textarea === inputs_textarea) {
                valido = true;
            }
        }
    </script>
