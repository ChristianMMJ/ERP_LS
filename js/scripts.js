var valido = false;

var lang = {
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