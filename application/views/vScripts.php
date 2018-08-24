<script>
    var valido = false;
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

    var lang = {
        processing: "Cargando datos...",
        search: "Buscar:",
        lengthMenu: "Mostrar _MENU_ Elementos",
        info: "Mostrando  _START_ de _END_ , de _TOTAL_ Elementos.",
        infoEmpty: "Mostrando 0 de 0 A 0 Elementos.",
        infoFiltered: "(Filtrando un total _MAX_ Elementos. )",
        infoPostFix: "",
        loadingRecords: "Procesando los datos...",
        zeroRecords: "No se encontro nada.",
        emptyTable: "No existen datos en la tabla.",
        paginate: {
            first: "Primero",
            previous: "Anterior",
            next: "Siguiente",
            last: "&Uacute;ltimo"
        },
        aria: {
            sortAscending: ": Habilitado para ordenar la columna en orden ascendente",
            sortDescending: ": Habilitado para ordenar la columna en orden descendente"
        },
        buttons: {
            copyTitle: 'Registros copiados a portapapeles',
            copyKeys: 'Copiado con teclas clave.',
            copySuccess: {
                _: ' %d Registros copiados',
                1: ' 1 Registro copiado'
            }
        }
    };

    var buttons = [
        {
            extend: 'excelHtml5',
            text: ' <i class="fa fa-file-excel"></i>',
            titleAttr: 'Excel',
            exportOptions: {
                columns: ':visible'
            }
        }
        ,
        {
            extend: 'colvis',
            text: '<i class="fa fa-columns"></i>',
            titleAttr: 'Seleccionar Columnas',
            exportOptions: {
                modifier: {
                    page: 'current'
                },
                columns: ':visible'
            }
        }

    ];
    /*******************************************************************************
     * VAR FOR TEMPORAL DATA
     *******************************************************************************/
    var temp = 0;
    /*******************************************************************************
     * EVENT FOR CLICK ROW
     *******************************************************************************/
    var selected = [];
    /*******************************************************************************
     * OPTIONS FOR TABLES
     *******************************************************************************/
    var tableOptions = {
        "dom": 'Bfrtip',
        buttons: buttons,
        language: {
            processing: "Proceso en curso...",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ Elementos",
            info: "Mostrando  _START_ de _END_ , de _TOTAL_ Elementos.",
            infoEmpty: "Mostrando 0 de 0 A 0 Elementos.",
            infoFiltered: "(Filtrando un total _MAX_ Elementos. )",
            infoPostFix: "",
            loadingRecords: "Procesando los datos...",
            zeroRecords: "No se encontro nada.",
            emptyTable: "No existen datos en la tabla.",
            paginate: {
                first: "Primero",
                previous: "Anterior",
                next: "Siguiente",
                last: "&Uacute;ltimo"
            },
            aria: {
                sortAscending: ": Habilitado para ordenar la columna en orden ascendente",
                sortDescending: ": Habilitado para ordenar la columna en orden descendente"
            },
            buttons: {
                copyTitle: 'Registros copiados a portapapeles',
                copyKeys: 'Copiado con teclas clave.',
                copySuccess: {
                    _: ' %d Registros copiados',
                    1: ' 1 Registro copiado'
                }
            }
        },
        "autoWidth": true,
        "colReorder": true,
        "displayLength": 12,
        "bStateSave": true,
        "bLengthChange": false,
        "deferRender": true,
        "scrollY": false,
        "scrollX": true,
        "scrollCollapse": false,
        "aaSorting": [
            [0, 'desc']
        ]
                //    ,
                //    "columnDefs": [
                //        {"width": "20%", "targets": [0]}
                //    ]
    };

    function yearValidation(year, ev, Input) {


        var text = /^[0-9]+$/;
        if (ev.type == "blur" || year.length == 4 && ev.keyCode != 8 && ev.keyCode != 46) {
            if (year != 0) {
                if ((year != "") && (!text.test(year))) {
                    $(Input).val('');
                    //alert("Please Enter Numeric Values Only");
                    return false;
                }

                if (year.length != 4) {
                    $(Input).val('');
                    // alert("Year is not proper. Please check");
                    return false;
                }
                var current_year = new Date().getFullYear();
                if ((year < 2000) || (year > current_year))
                {
                    $(Input).val('');
                    // alert("Year should be in range 1920 to current year");
                    return false;
                }
                return true;
            }
        }
    }


    function getToday() {
        var date = new Date();

        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10)
            month = "0" + month;
        if (day < 10)
            day = "0" + day;

        var today = day + "-" + month + "-" + year;
        return today;
    }

    function getTodayWithTime() {
        var date = new Date();

        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10)
            month = "0" + month;
        if (day < 10)
            day = "0" + day;

        var today = day + "-" + month + "-" + year;

        var hours = date.getHours();
        var minutes = date.getMinutes();
        var seconds = date.getSeconds();
        var ampm = hours >= 12 ? 'pm' : 'am';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        var strTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;

        return today + ' ' + strTime;
    }



    function getTable(tblname, data) {
        var column = '';
        var i = 0;
        var div = "<div class=\" \">";
        div = "<table id=\"" + tblname + "\" class=\" table table-sm  \"  width=\"100%\">";
        //Create header
        div += "<thead>";
        div += "<tr class=\"\" >";
        for (var key in data[i]) {
            column += "<th>" + key + "</th>";
        }
        div += column;
        div += "</tr></thead>";
        //Create Rows
        div += "<tbody>";
        $.each(data, function (key, value) {
            div += "<tr data-toggle='tooltip' title='Haga clic para editar' >";
            $.each(value, function (key, value) {
                div += "<td>" + value + "</td>";
            });
            div += "</tr>";
        });
        div += "</tbody>";
        //Create Footer
        div += "<tfoot>";
        div += "<tr class=\"\">";
        div += column;
        div += "</tr></tfoot>";
        div += "</table>";
        div += "</div>";
        return div;
    }

    function getTableConceptosTrabajos(tblname, data) {
        var column = '';
        var i = 0;
        var div = "<div class=\" \">";
        div = "<table id=\"" + tblname + "\" class=\"table table-striped table-hover \"  width=\"100%\">";
        //Create header
        div += "<thead>";
        div += "<tr class=\"\" >";
        for (var key in data[i]) {
            column += "<th>" + key + "</th>";
        }
        div += column;
        div += "</tr></thead>";
        //Create Rows
        div += "<tbody>";
        $.each(data, function (key, value) {
            div += "<tr data-toggle='tooltip' title='Haga clic para editar' >";
            $.each(value, function (key, value) {
                div += "<td>" + value + "</td>";
            });
            div += "</tr>";
        });
        div += "</tbody>";
        //Create Footer
        div += "<tfoot>";
        div += "<tr class=\"\">";
        div += column;
        div += "</tr></tfoot>";
        div += "</table>";
        div += "</div>";
        return div;
    }

    function getExt(filename) {
        var dot_pos = filename.lastIndexOf(".");
        if (dot_pos === -1)
            return "";
        return filename.substr(dot_pos + 1).toLowerCase();
    }

    function handleEnter() {

        $('input:not(.notEnter)').keyup(function () {
            $(this).val($(this).val().toUpperCase());
        });

        $('body').on('keydown', 'input, select, textarea:not(.notEnter)', function (e) {
            var self = $(this)
                    , form = self.parents('body')
                    , focusable
                    , next
                    ;
            if (e.keyCode === 13) {
                focusable = form.find('input,a,select,button,textarea').filter(':visible:enabled').not('.disabledForms');
                next = focusable.eq(focusable.index(this) + 1);
                if (next.length) {
                    next.focus();
                    next.select();
                }
                return false;
            }
        });
    }

    function getNumber(x) {
        return x.replace(/\s+/g, '').replace(/,/g, "").replace("$", "");
    }

    function getNumberFloat(x) {
        return parseFloat(x.replace(/\s+/g, '').replace(/,/g, "").replace("$", ""));
    }

    //Función para validar un RFC
    function rfcValido(rfc, aceptarGenerico = true) {
        const re = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
        var validado = rfc.match(re);

        if (!validado)  //Coincide con el formato general del regex?
            return false;

        //Separar el dígito verificador del resto del RFC
        const digitoVerificador = validado.pop(),
                rfcSinDigito = validado.slice(1).join(''),
                len = rfcSinDigito.length,
                //Obtener el digito esperado
                diccionario = "0123456789ABCDEFGHIJKLMN&OPQRSTUVWXYZ Ñ",
                indice = len + 1;
        var suma,
                digitoEsperado;

        if (len == 12)
            suma = 0
        else
            suma = 481; //Ajuste para persona moral

        for (var i = 0; i < len; i++)
            suma += diccionario.indexOf(rfcSinDigito.charAt(i)) * (indice - i);
        digitoEsperado = 11 - suma % 11;
        if (digitoEsperado == 11)
            digitoEsperado = 0;
        else if (digitoEsperado == 10)
            digitoEsperado = "A";

        //El dígito verificador coincide con el esperado?
        // o es un RFC Genérico (ventas a público general)?
        if ((digitoVerificador != digitoEsperado)
                && (!aceptarGenerico || rfcSinDigito + digitoVerificador != "XAXX010101000"))
            return false;
        else if (!aceptarGenerico && rfcSinDigito + digitoVerificador == "XEXX010101000")
            return false;
        return rfcSinDigito + digitoVerificador;
    }

    function Unidades(num) {

        switch (num)
        {
            case 1:
                return "UN";
            case 2:
                return "DOS";
            case 3:
                return "TRES";
            case 4:
                return "CUATRO";
            case 5:
                return "CINCO";
            case 6:
                return "SEIS";
            case 7:
                return "SIETE";
            case 8:
                return "OCHO";
            case 9:
                return "NUEVE";
        }

        return "";
    }

    function Decenas(num) {

        decena = Math.floor(num / 10);
        unidad = num - (decena * 10);

        switch (decena)
        {
            case 1:
            switch (unidad)
            {
                case 0:
                    return "DIEZ";
                case 1:
                    return "ONCE";
                case 2:
                    return "DOCE";
                case 3:
                    return "TRECE";
                case 4:
                    return "CATORCE";
                case 5:
                    return "QUINCE";
                default:
                    return "DIECI" + Unidades(unidad);
            }
            case 2:
            switch (unidad)
            {
                case 0:
                    return "VEINTE";
                default:
                    return "VEINTI" + Unidades(unidad);
            }
            case 3:
                return DecenasY("TREINTA", unidad);
            case 4:
                return DecenasY("CUARENTA", unidad);
            case 5:
                return DecenasY("CINCUENTA", unidad);
            case 6:
                return DecenasY("SESENTA", unidad);
            case 7:
                return DecenasY("SETENTA", unidad);
            case 8:
                return DecenasY("OCHENTA", unidad);
            case 9:
                return DecenasY("NOVENTA", unidad);
            case 0:
                return Unidades(unidad);
        }
    }//Unidades()

    function DecenasY(strSin, numUnidades) {
        if (numUnidades > 0)
            return strSin + " Y " + Unidades(numUnidades)

        return strSin;
    }//DecenasY()

    function Centenas(num) {

        centenas = Math.floor(num / 100);
        decenas = num - (centenas * 100);

        switch (centenas)
        {
            case 1:
                if (decenas > 0)
                    return "CIENTO " + Decenas(decenas);
                return "CIEN";
            case 2:
                return "DOSCIENTOS " + Decenas(decenas);
            case 3:
                return "TRESCIENTOS " + Decenas(decenas);
            case 4:
                return "CUATROCIENTOS " + Decenas(decenas);
            case 5:
                return "QUINIENTOS " + Decenas(decenas);
            case 6:
                return "SEISCIENTOS " + Decenas(decenas);
            case 7:
                return "SETECIENTOS " + Decenas(decenas);
            case 8:
                return "OCHOCIENTOS " + Decenas(decenas);
            case 9:
                return "NOVECIENTOS " + Decenas(decenas);
        }

        return Decenas(decenas);
    }//Centenas()

    function Seccion(num, divisor, strSingular, strPlural) {
        cientos = Math.floor(num / divisor)
        resto = num - (cientos * divisor)

        letras = "";

        if (cientos > 0)
            if (cientos > 1)
                letras = Centenas(cientos) + " " + strPlural;
            else
                letras = strSingular;

        if (resto > 0)
            letras += "";

        return letras;
    }//Seccion()

    function Miles(num) {
        divisor = 1000;
        cientos = Math.floor(num / divisor)
        resto = num - (cientos * divisor)

        strMiles = Seccion(num, divisor, "UN MIL", "MIL");
        strCentenas = Centenas(resto);

        if (strMiles == "")
            return strCentenas;

        return strMiles + " " + strCentenas;

        //return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);
    }//Miles()

    function Millones(num) {
        divisor = 1000000;
        cientos = Math.floor(num / divisor)
        resto = num - (cientos * divisor)

        strMillones = Seccion(num, divisor, "UN MILLON", "MILLONES");
        strMiles = Miles(resto);

        if (strMillones == "")
            return strMiles;

        return strMillones + " " + strMiles;

        //return Seccion(num, divisor, "UN MILLON", "MILLONES") + " " + Miles(resto);
    }//Millones()

    function NumeroALetras(num) {
        var data = {
            numero: num,
            enteros: Math.floor(num),
            centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
            letrasCentavos: "",
            letrasMonedaPlural: " PESOS",
            letrasMonedaSingular: " PESO"
        };

        if (data.centavos >= 0)
            data.letrasCentavos = " " + data.centavos + "/100 MXN";

        if (data.enteros == 0)
            return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
        if (data.enteros == 1)
            return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
        else
            return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
    }
</script>
