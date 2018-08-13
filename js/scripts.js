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

var tableOptionsDetalle = {
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
        }
    },
    "autoWidth": true,
    "colReorder": true,
    "displayLength": 35,
    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "Todos"] ],
    "bStateSave": true,
    //"scrollY":true,
    "bLengthChange": true,
    "deferRender": true,
    "scrollCollapse": false,
    "aaSorting": [
        [0, 'desc']
    ]
};

var tableOptionsTrabajos = {

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
        }
    },
    "autoWidth": true,
    "colReorder": true,
    "displayLength": 12,
    "bStateSave": false,
    //"scrollX": true,
    "bLengthChange": false,
    "deferRender": true,
    "scrollCollapse": false,
    "aaSorting": [
        [0, 'desc']
    ]
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
    $('body').on('keydown', 'input, select, textarea:not(.notEnter)', function (e) {
        var self = $(this)
                , form = self.parents('body')
                , focusable
                , next
                ;
        if (e.keyCode === 13) {
            focusable = form.find('input,a,select,button,textarea').filter(':visible:enabled').not('.disabledForms').not('.notEnter');
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