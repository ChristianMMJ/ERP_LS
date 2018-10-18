<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-body ">
        <div class="row">
            <div class="col-sm-8 float-left">
                <legend class="float-left">Material No Recibido</legend>
            </div>
            <div class="col-sm-4" align="right">
                <button type="button" class="btn btn-warning" id="btnLimpiarFiltros" data-toggle="tooltip" data-placement="right" title="Limpiar Filtros">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-2 col-md-2 col-lg-2 col-xl-1" data-column="3">
                <label>Tp</label>
                <input type="text" class="form-control form-control-sm  numbersOnly column_filter" id="col3_filter" autofocus maxlength="2" >
            </div>
            <div class="col-6 col-sm-2 col-md-2 col-lg-2 col-xl-1" data-column="1">
                <label>Año</label>
                <input type="text" class="form-control form-control-sm  numbersOnly column_filter" id="col1_filter" maxlength="4" >
            </div>
            <div class="col-6 col-sm-5 col-md-5 col-lg-3 col-xl-3" data-column="2">
                <label>Departamento</label>
                <input type="text" placeholder="10 PIEL/FORRO, 80 SUELA, 90 INDIR." class="form-control form-control-sm  numbersOnly column_filter" id="col2_filter" maxlength="2" >
            </div>

        </div>
        <div class="card-block mt-4">
            <div id="Compras" class="table-responsive">
                <table id="tblCompras" class="table table-sm display " style="width:100%">
                    <thead>
                        <tr>
                            <th>Group</th>
                            <th>Ano</th>
                            <th>Tipo</th>
                            <th>Tp</th>
                            <th>O.C.</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Artículo</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>SubTotal</th>
                            <th>Sem</th>
                            <th>Maq</th>
                            <th>Grupo</th>
                            <th>ID</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th>Group</th>
                            <th>Ano</th>
                            <th>Tipo</th>
                            <th>Tp</th>
                            <th>O.C.</th>
                            <th>Proveedor</th>
                            <th>Fecha Orden</th>
                            <th>Artículo</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>SubTotal</th>
                            <th>Sem</th>
                            <th>Maq</th>
                            <th>Grupo</th>
                            <th>ID</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    var master_url = base_url + 'index.php/MaterialNoRecibido/';
    var tblCompras = $('#tblCompras');
    var Compras;
    var pnlTablero = $("#pnlTablero");
    $(document).ready(function () {

        /*FUNCIONES INICIALES*/
        init();
        handleEnter();
        pnlTablero.find("input").val("");

        pnlTablero.find('#btnLimpiarFiltros').click(function () {
            pnlTablero.find("input").val("");
            tblCompras.DataTable().columns().search('').draw();
            $(':input:text:enabled:visible:first').focus();
        });

        pnlTablero.find("#col1_filter").change(function () {
            if (parseInt($(this).val()) < 2016 || parseInt($(this).val()) > 2020 || $(this).val() === '') {
                swal({
                    title: "ATENCIÓN",
                    text: "AÑO INCORRECTO",
                    icon: "warning",
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    buttons: false,
                    timer: 1000
                }).then((action) => {
                    pnlTablero.find("#col1_filter").val("");
                    pnlTablero.find("#col1_filter").focus();
                });
            }
        });

        pnlTablero.find("#col3_filter").keyup(function () {
            var tp = parseInt($(this).val());
            if (tp > 2) {
                $(this).val('').focus();
            }
        });

        pnlTablero.find("#col2_filter").change(function () {
            var tp = parseInt($(this).val());
            if (tp === 80 || tp === 90 || tp === 10) {

            } else if (isNaN(tp)) {
                $(this).val('').focus();
                tblCompras.DataTable().column(2).search("", false, true).draw();
            } else {
                $(this).val('').focus();
                tblCompras.DataTable().column(2).search("", false, true).draw();
            }
        });

        $('input.column_filter').on('keyup', function () {
            var i = $(this).parents('div').attr('data-column');
            tblCompras.DataTable().column(i).search($('#col' + i + '_filter').val()).draw();
        });
    });

    function init() {
        getRecords();
    }
    function getRecords() {
        temp = 0;
        HoldOn.open({
            theme: 'sk-cube',
            message: 'CARGANDO...'
        });
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblCompras')) {
            tblCompras.DataTable().destroy();
        }
        Compras = tblCompras.DataTable({
            "dom": 'Brtip',
            buttons: buttons,
            orderCellsTop: true,
            fixedHeader: true,
            "ajax": {
                "url": master_url + 'getRecords',
                "dataSrc": ""
            },
            "columns": [
                {"data": "GruposT"},
                {"data": "Ano"},
                {"data": "Tipo"},
                {"data": "Tp"},
                {"data": "Folio"},
                {"data": "NombreProveedor"},
                {"data": "FechaOrden"},
                {"data": "Articulo"},
                {"data": "Cantidad"},
                {"data": "Precio"},
                {"data": "SubTotal"},
                {"data": "Sem"},
                {"data": "Maq"},
                {"data": "Grupo"},
                {"data": "ID"}

            ],

            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": true
                },
                {
                    "targets": [1],
                    "visible": false,
                    "searchable": true
                },
                {
                    "targets": [2],
                    "visible": false,
                    "searchable": true
                },
                {
                    "targets": [3],
                    "visible": false,
                    "searchable": true
                },
                {
                    "targets": [10],
                    "render": function (data, type, row) {
                        return '$' + $.number(parseFloat(data), 2, '.', ',');
                    }
                },
                {
                    "targets": [14],
                    "visible": false,
                    "searchable": true
                }
            ],
            rowGroup: {
                endRender: function (rows, group) {
                    var stc = $.number(rows.data().pluck('Cantidad').reduce(function (a, b) {
                        return a + parseFloat(b);
                    }, 0), 2, '.', ',');
                    var stp = $.number(rows.data().pluck('SubTotal').reduce(function (a, b) {
                        return a + parseFloat(b);
                    }, 0), 2, '.', ',');
                    return $('<tr>')
                            .append('<td></td><td></td><td></td><td>Totales: </td>')
                            .append('<td>' + stc + '</td><td></td><td>$' + stp + '</td><td></td><td></td><td></td></tr>');
                },
                dataSrc: "GruposT"
            },
            language: lang,

            "autoWidth": true,
            "colReorder": true,
            "displayLength": 8,
            "bLengthChange": false,
            "deferRender": true,
            "scrollCollapse": false,
            "bSort": true,
            "aaSorting": [
                [4, 'asc'], [5, 'asc']/*Folio*/
            ],
            "createdRow": function (row, data, index) {
                $.each($(row).find("td"), function (k, v) {
                    var c = $(v);
                    var index = parseInt(k);
                    switch (index) {
                        case 1:
                            /*FECHA ORDEN*/
                            c.addClass('text-strong');
                            break;
                        case 3:
                            /*FECHA ENTREGA*/
                            c.addClass('text-success text-strong');
                            break;
                        case 4:
                            /*fecha conf*/
                            c.addClass('text-info text-strong');
                            break;
                    }
                });
            },
            initComplete: function (a, b) {
                HoldOn.close();
                $(':input:text:enabled:visible:first').focus();
            }
        });
        $('#tblCompras tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input class="form-control form-control-sm" type="text" placeholder="Buscar por ' + title + '" />');
        });
        Compras.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that.search(this.value).draw();
                }
            });
        });
        tblCompras.find('tbody').on('click', 'tr', function () {
            tblCompras.find("tbody tr").removeClass("success");
            $(this).addClass("success");
            var dtm = Compras.row(this).data();
            temp = parseInt(dtm.ID);


            swal("Imprimir", "Orden de Compra: " + dtm.Folio + ' \nProveedor: ' + dtm.NombreProveedor, {
                buttons: ["Cancelar", true]
            }).then((value) => {
                if (value) {
                    $.post(master_url + 'onImprimirOrdenCompra', {ID: temp}).done(function (data) {
                        onNotifyOld('fa fa-check', 'REPORTE GENERADO', 'success');
                        onImprimirReporteFancy(data);
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    });
                }
            });
        });
    }

</script>
<style>
    .text-strong {
        font-weight: bolder;
    }

    tr.group-start:hover td{
        background-color: #e0e0e0 !important;
        color: #000 !important;
    }
    tr.group-end td{
        background-color: #FFF !important;
        color: #000!important;
    }
    td{
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }

    td span.badge{
        font-size: 100% !important;
    }
</style>
