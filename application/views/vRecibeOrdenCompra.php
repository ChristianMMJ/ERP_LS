<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-body ">
        <div class="row">
            <div class="col-sm-8 float-left">
                <legend class="float-left">Recepción de Órdenes de Compra</legend>
            </div>
            <div class="col-sm-4" align="right">
                <button type="button" class="btn btn-success btn-float" id="btnCerrarCompra" data-toggle="tooltip" data-placement="top" title="Cerrar Compra">
                    <i class="fa fa-check"></i>
                </button>
            </div>
        </div>
        <div class="row" id="Encabezado">
            <div class="col-6 col-sm-2 col-md-2 col-lg-2 col-xl-1" data-column="1">
                <label>Tp</label>
                <input type="text" class="form-control form-control-sm  numbersOnly column_filter captura" id="col1_filter" maxlength="2" >
            </div>
            <div class="col-6 col-sm-3 col-md-2 col-lg-2 col-xl-1" data-column="2">
                <label>O. Compra</label>
                <input type="text" class="form-control form-control-sm numbersOnly column_filter captura"  id="col2_filter" maxlength="10" required>
            </div>
            <div class="col-6 col-sm-3 col-md-2 col-lg-2 col-xl-2" >
                <label for="" >Fecha O.C.</label>
                <input type="text" class="form-control form-control-sm disabledForms" id="FechaOrden">
            </div>
            <div class="d-none" >
                <input type="text" class="form-control form-control-sm disabledForms" id="Proveedor" name="Proveedor">
            </div>
            <div class="col-12 col-sm-4 col-md-3 col-xl-3" >
                <label for="" >Proveedor</label>
                <input type="text" class="form-control form-control-sm disabledForms" id="NombreProveedor">
            </div>
            <div class="col-6 col-sm-2 col-md-2 col-lg-2 col-xl-1" >
                <label>Tp Doc.</label>
                <input type="text" class="form-control form-control-sm numbersOnly captura" id="Tp" name="Tp" maxlength="2" required>
            </div>
            <div class="col-6 col-sm-2 col-md-2 col-lg-2 col-xl-1" >
                <label>Doc.</label>
                <input type="text" class="form-control form-control-sm captura" id="Factura" name="Factura" maxlength="15" required>
            </div>
            <div class="col-6 col-sm-3 col-md-2 col-lg-2 col-xl-2" >
                <label>Fecha Doc.</label>
                <input type="text" class="form-control form-control-sm  numbersOnly date notEnter captura" id="FechaFactura" name="FechaFactura" maxlength="12" required>
            </div>
        </div>
        <div class="row" id="Detalle">
            <div class="col-6 col-sm-2 col-md-2 col-lg-2 col-xl-1" >
                <label for="" >Artículo</label>
                <input type="text" class="form-control form-control-sm captura disabledForms" id="Articulo" name="Articulo">
            </div>
            <div class="col-12 col-sm-4 col-md-3 col-xl-3" >
                <label for="" >Descripción</label>
                <input type="text" class="form-control form-control-sm disabledForms" id="NombreArtículo">
            </div>
            <div class="col-6 col-sm-2 col-md-2 col-lg-2 col-xl-1" >
                <label>Cant</label>
                <input type="text" class="form-control form-control-sm numbersOnly captura disabledForms" id="CantidadRecibida" name="CantidadRecibida" maxlength="9" >
            </div>
            <div class="col-6 col-sm-5 col-md-5 col-lg-2 col-xl-1 mt-4">
                <button type="button" class="btn btn-primary captura disabledForms" id="btnActualizaCantidad" data-toggle="tooltip" data-placement="right" title="Actualizar Cantidad">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="card-block mt-4">
            <div id="OrdenesCompra" class="table-responsive">
                <table id="tblOrdenesCompra" class="table table-sm display " style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tp</th>
                            <th>Folio</th>
                            <th>Articulo</th>
                            <th>Cantidad</th>
                            <th>Recibida</th>
                            <th>Precio</th>
                            <th>SubTotal</th>
                            <th>Maq</th>
                            <th>Sem</th>
                            <th>Tipo</th>
                            <th>C-Articulo</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    var master_url = base_url + 'index.php/RecibeOrdenCompra/';
    var tblOrdenesCompra = $('#tblOrdenesCompra');
    var OrdenesCompra;
    var pnlTablero = $("#pnlTablero");
    var btnActualizaCantidad = pnlTablero.find('#btnActualizaCantidad');
    var btnCerrarCompra = pnlTablero.find('#btnCerrarCompra');
    $(document).ready(function () {
        /*FUNCIONES INICIALES*/
        init();
        handleEnter();
        pnlTablero.find("input").val("");
        pnlTablero.find("#FechaFactura").val(getToday());
        pnlTablero.find("#FechaFactura").blur(function () {
            isValid('pnlTablero');
            if (valido) {
                pnlTablero.find('#Detalle').find('.captura').removeClass('disabledForms');
            } else {
                swal('ATENCION', 'Completa los campos requeridos', 'warning');
                pnlTablero.find('#Detalle').find('.captura').addClass('disabledForms');
            }
        });
        pnlTablero.find("#col1_filter").change(function () {
            onVerificarTp($(this));
        });
        pnlTablero.find("#Tp").change(function () {
            onVerificarTp($(this));
        });
        pnlTablero.find("#col2_filter").change(function () {
            var tp = pnlTablero.find("#col1_filter").val();
            getOrdenCompra($(this), tp);
        });
        pnlTablero.find("#Articulo").change(function () {
            var tp = pnlTablero.find("#col1_filter").val();
            var oc = pnlTablero.find("#col2_filter").val();
            getArticuloByTpByOC($(this), tp, oc);
        });
        btnActualizaCantidad.click(function () {
            var fact = pnlTablero.find('#Factura').val();
            var fecFact = pnlTablero.find('#FechaFactura').val();
            var tp = pnlTablero.find("#col1_filter").val();
            var oc = pnlTablero.find("#col2_filter").val();
            var art = pnlTablero.find("#Articulo").val();
            var prov = pnlTablero.find("#Proveedor").val();
            var cant_rec = pnlTablero.find("#CantidadRecibida").val();
            $.post(master_url + 'onModificarCantidadRecibidaByArtByOCByTp', {

                Factura: fact,
                FechaFactura: fecFact,
                Articulo: art,
                Proveedor: prov,
                OC: oc,
                Tp: tp,
                CantidadRecibida: cant_rec,
                Precio: Precio,
                Subtotal: cant_rec * Precio,
                Maq: Maq,
                Sem: Sem,
                Departamento: Departamento,
                TpOrdenCompra: TpOC
            }).done(function (data) {
                onNotifyOld('fa fa-check', 'CANTIDAD ACTUALIZADA', 'success');
                OrdenesCompra.ajax.reload();
                pnlTablero.find("#NombreArtículo").val('');
                pnlTablero.find("#CantidadRecibida").val('');
                pnlTablero.find("#Detalle").find('input').val('');
                pnlTablero.find("#Articulo").focus();
                Precio = 0;
                Subtotal = 0;
                Maq = 0;
                Sem = 0;
                Departamento = 0;
                pnlTablero.find('#Encabezado').find('.captura').addClass('disabledForms');
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            });
        });


        btnCerrarCompra.click(function () {
            var tp = pnlTablero.find("#col1_filter").val();
            var oc = pnlTablero.find("#col2_filter").val();
            $.post(master_url + 'onCerrarCompra', {
                Tp: tp,
                Folio: oc
            }).done(function (data) {
                console.log(data);
            }).fail(function (x, y, z) {
                swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
                console.log(x.responseText);
            });
        });

        $('input.column_filter').on('keyup', function () {
            var i = $(this).parents('div').attr('data-column');
            tblOrdenesCompra.DataTable().column(i).search($('#col' + i + '_filter').val()).draw();
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
        if ($.fn.DataTable.isDataTable('#tblOrdenesCompra')) {
            tblOrdenesCompra.DataTable().destroy();
        }
        OrdenesCompra = tblOrdenesCompra.DataTable({
            "dom": 'Bfrtip',
            buttons: buttons,
            orderCellsTop: true,
            fixedHeader: true,
            "ajax": {
                "url": master_url + 'getRecords',
                "dataSrc": ""
            },
            "columns": [
                {"data": "ID"},
                {"data": "Tp"},
                {"data": "Folio"},
                {"data": "Articulo"},
                {"data": "Cantidad"},
                {"data": "Recibida"},
                {"data": "Precio"},
                {"data": "Subtotal"},
                {"data": "Maq"},
                {"data": "Sem"},
                {"data": "Tipo"},
                {"data": "ClaveArticulo"}
            ],
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [6],
                    "render": function (data, type, row) {
                        return '$' + $.number(parseFloat(data), 2, '.', ',');
                    }
                },
                {
                    "targets": [7],
                    "render": function (data, type, row) {
                        return '$' + $.number(parseFloat(data), 2, '.', ',');
                    }
                },
                {
                    "targets": [8],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [9],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [10],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [11],
                    "visible": false,
                    "searchable": false
                }
            ],
            language: lang,
            "autoWidth": true,
            "colReorder": true,
            "displayLength": 15,
            "bLengthChange": false,
            "deferRender": true,
            "scrollCollapse": false,
            "bSort": true,
            "aaSorting": [
                [1, 'asc'], [2, 'asc'], [3, 'desc']
            ],
            "createdRow": function (row, data, index) {
                $.each($(row).find("td"), function (k, v) {
                    var c = $(v);
                    var index = parseInt(k);
                    switch (index) {
                        case 0:
                            /*FECHA ORDEN*/
                            c.addClass('text-strong');
                            break;
                        case 1:
                            /*FECHA ENTREGA*/
                            c.addClass('text-success text-strong');
                            break;
                        case 2:
                            /*fecha conf*/
                            c.addClass('text-info text-strong');
                            break;
                        case 3:
                            /*fecha conf*/
                            c.addClass('text-success text-strong');
                            break;
                        case 4:
                            /*fecha conf*/
                            c.addClass('text-warning text-strong');
                            break;
                    }
                });
            },
            initComplete: function (a, b) {
                HoldOn.close();
                pnlTablero.find('#col1_filter').focus().select();
            }
        });

        tblOrdenesCompra.find('tbody').on('click', 'tr', function () {
            tblOrdenesCompra.find("tbody tr").removeClass("success");
            $(this).addClass("success");
            isValid('pnlTablero');
            if (valido) {
                var dtm = OrdenesCompra.row(this).data();
                temp = parseInt(dtm.ID);
                var fact = pnlTablero.find('#Factura').val();
                var fecFact = pnlTablero.find('#FechaFactura').val();
                var tp = pnlTablero.find("#col1_filter").val();
                var oc = pnlTablero.find("#col2_filter").val();
                var prov = pnlTablero.find("#Proveedor").val();
                swal({
                    title: dtm.Articulo,
                    text: "CANTIDAD RECIBIDA: ",
                    content: 'input'
                }).then((value) => {
                    if (value) {
                        $.post(master_url + 'onModificarCantidadRecibidaByID', {
                            ID: temp,
                            CantidadRecibida: value,
                            Factura: fact,
                            FechaFactura: fecFact,

                            Articulo: dtm.ClaveArticulo,
                            Proveedor: prov,
                            OC: oc,
                            Tp: tp,
                            Precio: dtm.Precio,
                            Subtotal: dtm.Precio * value,
                            Maq: dtm.Maq,
                            Sem: dtm.Sem,
                            Departamento: dtm.Tipo,
                            TpOrdenCompra: dtm.Tp
                        }).done(function (data) {
                            onNotifyOld('fa fa-check', 'CANTIDAD ACTUALIZADA', 'success');
                            OrdenesCompra.ajax.reload();
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        });
                    }
                });
                var can_pen = dtm.Cantidad - dtm.Recibida;
                $('.swal-modal').find('input.swal-content__input').val(can_pen).focus().select();
            } else {
                swal('ATENCION', 'Completa los campos requeridos', 'warning');
                pnlTablero.find('#Detalle').find('.captura').addClass('disabledForms');
            }



        });
    }
    function getOrdenCompra(v, Tp) {
        $.getJSON(master_url + 'getOrdenCompra', {Folio: $(v).val(), Tp: Tp}).done(function (data) {
            if (data.length > 0) {
                //TRAER DATOS DE LA ORDEN
                pnlTablero.find('#FechaOrden').val(data[0].FechaOrden);
                pnlTablero.find('#Proveedor').val(data[0].Proveedor);
                pnlTablero.find('#NombreProveedor').val((Tp === 1) ? data[0].ProveedorF : data[0].ProveedorI);
            } else {
                swal({
                    title: "ATENCIÓN",
                    text: "NO EXISTE LA ORDEN DE COMPRA",
                    icon: "warning"
                }).then((value) => {
                    $(v).val('').focus();
                });
            }
        }).fail(function (x, y, z) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        });
    }
    var TpOC, Precio, Maq, Sem, Departamento;
    function getArticuloByTpByOC(v, Tp, Oc) {
        $.getJSON(master_url + 'getArticuloByTpByOC', {Articulo: $(v).val(), Tp: Tp, Oc: Oc}).done(function (data) {
            if (data.length > 0) {
                pnlTablero.find('#NombreArtículo').val(data[0].Descripcion);
                pnlTablero.find('#CantidadRecibida').focus().select();
                Precio = data[0].Precio;
                Maq = data[0].Maq;
                Sem = data[0].Sem;
                Departamento = data[0].Tipo;
                TpOC = data[0].Tp;
            } else {
                swal({
                    title: "ATENCIÓN",
                    text: "NO EXISTE EL ARTÍCULO EN ESTA ORDEN DE COMPRA",
                    icon: "error"
                }).then((value) => {
                    $(v).val('').focus();
                });
            }
        }).fail(function (x, y, z) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        });
    }
    function onVerificarTp(v) {
        var tp = parseInt(v.val());
        if (tp === 1 || tp === 2) {
        } else {
            swal({
                title: "ATENCIÓN",
                text: "EL TP SÓLO PUEDE SER 1 Ó 2",
                icon: "error",
                closeOnClickOutside: false,
                closeOnEsc: false,
                buttons: false,
                timer: 1000
            }).then((action) => {
                $(v).val('').focus();
            });
        }
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
