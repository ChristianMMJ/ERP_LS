<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-body ">
        <div class="row">
            <div class="col-sm-8 float-left">
                <legend class="float-left">Órdenes de Compra (PIEL, FORRO, PELETERIA, PLANTA)</legend>
            </div>
            <div class="col-sm-4 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
            </div>
        </div>
        <div class="card-block mt-4">
            <div id="Compras" class="table-responsive">
                <table id="tblCompras" class="table table-sm display " style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Folio</th>
                            <th>Proveedor</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card  m-3 d-none animated fadeIn text-dark" id="pnlDatos" style="z-index: 2 !important">
    <!--            PRIMER CONTENEDOR-->
    <div class="card-body" >
        <form id="frmNuevo">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 float-left">
                    <legend >Orden Compra</legend>
                </div>
                <div class="col-12 col-sm-6 col-md-8" align="right">
                    <button type="button" class="btn btn-primary btn-sm" id="btnCancelar" >
                        <span class="fa fa-arrow-left" ></span> REGRESAR
                    </button>
                    <button type="button" class="btn btn-warning btn-sm" id="btnImprimir" >
                        <span class="fa fa-print" ></span> IMPRIMIR O.C.
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" id="btnEliminar" >
                        <span class="fa fa-ban" ></span> CANCELAR O.C.
                    </button>
                    <button type="button" class="btn btn-success btn-lg btn-float" id="btnCerrarOrden" data-toggle="tooltip" data-placement="left" title="Cerrar Orden">
                        <i class="fa fa-money-bill"></i>
                    </button>
                </div>
            </div>
            <hr>
            <div class="row" >
                <div class="d-none">
                    <input type="text" id="ID" name="ID" class="form-control form-control-sm" >
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-1 col-xl-1">
                    <label for="Clave" >Tp*</label>
                    <input type="text" class="form-control form-control-sm numbersOnly" maxlength="1" id="Tp" name="Tp" required="">
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-2 col-xl-1">
                    <label for="Folio" >Folio</label>
                    <input type="text" class="form-control form-control-sm numbersOnly" readonly="" id="Folio" name="Folio" required="">
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                    <label for="" >Tipo*</label>
                    <select id="Tipo" name="Tipo" class="form-control form-control-sm required" required="">
                        <option value=""></option>
                        <option value="10">10 PIEL/FORRO</option>
                        <option value="90">90 PELETERIA</option>
                    </select>
                </div>
                <div class="col-12 col-sm-4 col-md-3 col-xl-3" >
                    <label for="" >Proveedor*</label>
                    <select id="Proveedor" name="Proveedor" class="form-control form-control-sm mb-2 required" required="" >
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-xl-2">
                    <label for="" >Fecha*</label>
                    <input type="text" class="form-control form-control-sm date notEnter" id="FechaOrden" name="FechaOrden" >
                </div>
                <div class="col-12 col-sm-6 col-md-1 col-xl-1">
                    <label for="" >Maq.*</label>
                    <input type="text" class="form-control form-control-sm" maxlength="3" id="Maq" name="Maq" required="">
                </div>
                <div class="col-12 col-sm-6 col-md-1 col-xl-1">
                    <label for="" >Año*</label>
                    <input type="text" class="form-control form-control-sm numbersOnly" maxlength="4" id="Ano" name="Ano" required="">
                </div>
                <div class="col-12 col-sm-6 col-md-1 col-xl-1">
                    <label for="" >Sem.*</label>
                    <input type="text" class="form-control form-control-sm numbersOnly" maxlength="2" id="Sem" name="Sem" required="">
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-xl-2">
                    <label for="FechaEntrega" >Fecha Entrega*</label>
                    <input type="text" class="form-control form-control-sm date notEnter" id="FechaEntrega" name="FechaEntrega" required="">
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-xl-5">
                    <label for="" >Consignar a*</label>
                    <input type="text" class="form-control form-control-sm" id="ConsignarA" name="ConsignarA" required="">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-5">
                    <label for="Observaciones" >Observaciones</label>
                    <input type="text" class="form-control form-control-sm " maxlength="2" id="Observaciones" name="Observaciones" required="">
                </div>

            </div>
        </form>
    </div>

</div>
<div class="card m-3 d-none animated fadeIn" id="pnlDatosDetalle" >

    <div class="card-body text-dark">
        <div class="row">
            <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <label for="Articulo" >Articulo*</label>
                <!--<input type="text" class="form-control form-control-sm" id="Maquila" name="Maquila" required placeholder="Maquila 1">-->
                <select id="Articulo" name="Articulo" class="form-control form-control-sm" >
                    <option value=""></option>
                </select>
            </div>
            <div class="col-12 col-sm-3 col-md-2 col-lg-2 col-xl-2">
                <label for="Precio" >Precio</label>
                <input type="text" class="form-control form-control-sm numbersOnly disabledForms" id="Precio" name="Precio" required placeholder="0.0">
            </div>
            <div class="col-12 col-sm-3 col-md-2 col-lg-2 col-xl-1">
                <label for="Precio" >Cantidad*</label>
                <input type="text" class="form-control form-control-sm numbersOnly" id="Precio" name="Precio" required placeholder="0.0">
            </div>
            <div class="col-12 col-sm-2 col-md-1 col-lg-1 col-xl-1 my-2 d-sm-block pt-3">
                <button type="button" id="btnAgregarPrecio" class="btn btn-primary btn-sm d-sm-block" data-toggle="tooltip" data-placement="right" title="Agregar"><span class="fa fa-plus"></span></button>
            </div>

            <div class="col-12 mt-4">
                <table id="tblComprasDetalle" class="table table-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ClaveArticulo</th>
                            <th>Articulo</th>
                            <th>Cantidad</th>
                            <th>Unidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>Total:</th>
                            <th>$0.0</th>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>

    </div>
</div>

<script>
    var master_url = base_url + 'index.php/OrdenCompra/';
    var tblCompras = $('#tblCompras');
    var Compras;
    var btnNuevo = $("#btnNuevo"), btnCancelar = $("#btnCancelar"), btnEliminar = $("#btnEliminar"), btnGuardar = $("#btnGuardar");
    var pnlTablero = $("#pnlTablero"), pnlDatos = $("#pnlDatos"), pnlDatosDetalle = $("#pnlDatosDetalle");
    var nuevo = false;
    var tblComprasDetalle = $("#tblComprasDetalle"), ComprasDetalle;

    $(document).ready(function () {
        /*FUNCIONES INICIALES*/
        init();
        handleEnter();
        validacionSelectPorContenedor(pnlDatos);
        validacionSelectPorContenedor(pnlDatosDetalle);
        setFocusSelectToSelectOnChange('#Tipo', '#Proveedor', pnlDatos);
        setFocusSelectToInputOnChange('#Proveedor', '#FechaOrden', pnlDatos);
        setFocusSelectToInputOnChange('#Articulo', '#Precio', pnlDatosDetalle);

        pnlDatos.find("#Tp").change(function () {
            var tp = parseInt($(this).val());
            if (tp === 1 || tp === 2) {
                getFolio(tp);
                pnlDatos.find('#Tipo')[0].selectize.focus();
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
                    $(this).val('').focus();
                });
            }
        });

        pnlDatos.find("#Ano").change(function () {
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
                    pnlDatos.find("#Ano").val("");
                    pnlDatos.find("#Ano").focus();
                });
            }
        });

        pnlDatos.find("#Maq").change(function () {
            onComprobarMaquilas($(this));
        });

        pnlDatos.find("#Sem").change(function () {
            var ano = pnlDatos.find("#Ano");
            onComprobarSemanasProduccion($(this), ano.val());
        });

        pnlDatos.find("#Proveedor").change(function () {
            pnlDatosDetalle.find("#Articulo")[0].selectize.clear(true);
            pnlDatosDetalle.find("#Articulo")[0].selectize.clearOptions();
            var tipo = pnlDatos.find("#Tipo").val();
            if (tipo !== '') {
                getArticuloByDeptoByProveedor(tipo, $(this).val());
            } else {
                swal({
                    title: "ATENCIÓN",
                    text: "DEBE ELEGIR UN TIPO DE COMPRA",
                    icon: "warning",
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    buttons: false,
                    timer: 1000
                }).then((action) => {
                    pnlDatos.find("#Tipo")[0].selectize.focus();
                });
            }
        });

        pnlDatos.find("#Tipo").change(function () {
            var prov = pnlDatos.find("#Proveedor").val();
            getArticuloByDeptoByProveedor($(this).val(), prov);
        });

        pnlDatosDetalle.find("#Articulo").change(function () {
            var prov = pnlDatos.find("#Proveedor").val();
            getPrecioCompraByArticuloByProveedor($(this).val(), prov);
        });

        /*FUNCIONES X BOTON*/
        btnGuardar.click(function () {
            isValid('pnlDatos');
            if (valido) {
                var frm = new FormData(pnlDatos.find("#frmNuevo")[0]);
                if (!nuevo) {
                    $.ajax({
                        url: master_url + 'onModificar',
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: frm
                    }).done(function (data, x, jq) {
                        swal('ATENCIÓN', 'SE HAN GUARDADO LOS CAMBIOS', 'info');
                        nuevo = false;
                        Compras.ajax.reload();
                        pnlDatos.addClass("d-none");
                        pnlDatosDetalle.addClass('d-none');
                        pnlTablero.removeClass("d-none");
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                } else {
                    $.ajax({
                        url: master_url + 'onAgregar',
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: frm
                    }).done(function (data, x, jq) {
                        pnlDatos.find("[name='ID']").val(data);
                        nuevo = false;
                        Compras.ajax.reload();
                        swal({
                            title: "ATENCIÓN",
                            text: "ORDEN DE COMPRA GUARDADA",
                            icon: "success",
                            closeOnClickOutside: false,
                            closeOnEsc: false,
                            buttons: false,
                            timer: 1200
                        }).then((action) => {
                            //Aqui se imprime el reporte
                        });
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                }
            } else {
                swal('ATENCIÓN', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'error');
            }
        });

        btnNuevo.click(function () {
            nuevo = true;
            pnlDatos.find("input").val("");
            pnlDatosDetalle.find("input").val("");
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            $.each(pnlDatosDetalle.find("select"), function (k, v) {
                pnlDatosDetalle.find("select")[k].selectize.clear(true);
            });
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass("d-none");
            pnlDatosDetalle.removeClass("d-none");
            btnEliminar.addClass("d-none");
            var d = new Date();
            var n = d.getFullYear();
            pnlDatos.find("#Ano").val(n);
            pnlDatos.find("#Tp").focus();
            $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
            temp = 0;
        });

        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass("d-none");
            pnlDatosDetalle.addClass("d-none");
        });
    });

    function init() {
        getRecords();
        getProveedores();
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
            "dom": 'Bfrtip',
            buttons: buttons,
            "ajax": {
                "url": master_url + 'getRecords',
                "dataSrc": ""
            },
            "columns": [
                {"data": "ID"}, {"data": "Tipo"}, {"data": "Folio"}, {"data": "Proveedor"}, {"data": "Fecha"}
            ],
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                }
            ],
            language: lang,
            select: true,
            "autoWidth": true,
            "colReorder": true,
            "displayLength": 20,
            "bLengthChange": false,
            "deferRender": true,
            "scrollCollapse": false,
            "bSort": true,
            "aaSorting": [
                [2, 'desc']/*Folio*/
            ],
            initComplete: function (a, b) {
                HoldOn.close();
            }
        });

        $('#tblCompras_filter input[type=search]').focus();

        tblCompras.find('tbody').on('click', 'tr', function () {
            HoldOn.open({
                theme: 'sk-cube',
                message: 'CARGANDO...'
            });
            nuevo = false;
            tblCompras.find("tbody tr").removeClass("success");
            $(this).addClass("success");
            var dtm = Compras.row(this).data();
            temp = parseInt(dtm.ID);

            $.getJSON(master_url + 'getOrdenCompraByID', {ID: temp}).done(function (data) {
                pnlDatos.find("input").val("");
                $.each(pnlDatos.find("select"), function (k, v) {
                    pnlDatos.find("select")[k].selectize.clear(true);
                });
                $.each(pnlDatosDetalle.find("select"), function (k, v) {
                    pnlDatosDetalle.find("select")[k].selectize.clear(true);
                });
                $.each(data[0], function (k, v) {
                    pnlDatos.find("[name='" + k + "']").val(v);
                    if (pnlDatos.find("[name='" + k + "']").is('select')) {
                        pnlDatos.find("[name='" + k + "']")[0].selectize.addItem(v, true);
                    }
                });
                pnlTablero.addClass("d-none");
                pnlDatos.removeClass('d-none');
                pnlDatosDetalle.removeClass('d-none');

                //Cargar Detalle
                getDetalleByID(temp);


            }).fail(function (x, y, z) {
                swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
                console.log(x.responseText);
            }).always(function () {
                HoldOn.close();
            });
        });

    }
    function getFolio(tp) {
        $.getJSON(master_url + 'getFolio', {tp: tp}).done(function (data, x, jq) {
            if (data.length > 0) {
                var Folio = $.isNumeric(data[0].Folio) ? parseInt(data[0].Folio) + 1 : 1;
                pnlDatos.find("#Folio").val(Folio);
            } else {
                pnlDatos.find("#Folio").val('1');
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }
    function getArticuloByDeptoByProveedor(Departamento, Proveedor) {
        if (pnlDatos.find("#Proveedor").val() !== "") {
            $.getJSON(master_url + 'getArticuloByDeptoByProveedor', {Departamento: Departamento, Proveedor: Proveedor}).done(function (data) {
                $.each(data, function (k, v) {
                    pnlDatosDetalle.find("#Articulo")[0].selectize.addOption({text: v.Articulo, value: v.CLAVE});
                });
            }).fail(function (x) {
                swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
                console.log(x.responseText);
            });
        }
    }
    function getPrecioCompraByArticuloByProveedor(Articulo, Proveedor) {
        $.getJSON(master_url + 'getPrecioCompraByArticuloByProveedor', {Articulo: Articulo, Proveedor: Proveedor}).done(function (data) {
            console.log(data);
            if (data.length > 0) {
                pnlDatosDetalle.find("#Precio").val(data[0].Precio);

            } else {

            }
        }).fail(function (x) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        });
    }
    function getProveedores() {
        $.getJSON(master_url + 'getProveedores').done(function (data) {
            $.each(data, function (k, v) {
                pnlDatos.find("#Proveedor")[0].selectize.addOption({text: v.Proveedor, value: v.ID});
            });
        }).fail(function (x) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        });
    }
    function onComprobarMaquilas(v) {
        $.getJSON(master_url + 'onComprobarMaquilas', {Clave: $(v).val()}).done(function (data) {
            if (data.length > 0) {
                pnlDatos.find('#ConsignarA').val(data[0].Direccion);
            } else {
                swal({
                    title: "ATENCIÓN",
                    text: "LA MAQUILA " + $(v).val() + " NO ES VALIDA",
                    icon: "warning",
                    buttons: {
                        eliminar: {
                            text: "Aceptar",
                            value: "aceptar"
                        }
                    }
                }).then((value) => {
                    switch (value) {
                        case "aceptar":
                            swal.close();
                            $(v).val('');
                            $(v).focus();
                            break;
                    }
                });
            }
        }).fail(function (x, y, z) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        });
    }
    function onComprobarSemanasProduccion(v, ano) {
        $.getJSON(master_url + 'onComprobarSemanasProduccion', {Clave: $(v).val(), Ano: ano}).done(function (data) {
            if (data.length > 0) {

            } else {
                swal({
                    title: "ATENCIÓN",
                    text: "LA SEMANA " + $(v).val() + " DEL " + ano + " " + "NO EXISTE",
                    icon: "warning",
                    buttons: {
                        eliminar: {
                            text: "Aceptar",
                            value: "aceptar"
                        }
                    }
                }).then((value) => {
                    switch (value) {
                        case "aceptar":
                            swal.close();
                            $(v).val('');
                            $(v).focus();
                            break;
                    }
                });
            }
        }).fail(function (x, y, z) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        });
    }

    /*Detalle*/
    function getDetalleByID(IDX) {
        if ($.fn.DataTable.isDataTable('#tblComprasDetalle')) {
            tblComprasDetalle.DataTable().destroy();
        }
        ComprasDetalle = tblComprasDetalle.DataTable({
            "ajax": {
                "url": master_url + 'getDetalleByID',
                "dataSrc": "",
                "type": 'POST',
                "data": {
                    "ID": IDX
                }
            },
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [1],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [5],
                    "render": function (data, type, row) {
                        return '$' + $.number(parseFloat(data), 2, '.', ',');
                    }
                },
                {
                    "targets": [6],
                    "render": function (data, type, row) {
                        return '$' + $.number(parseFloat(data), 2, '.', ',');
                    }
                }
            ],
            "columns": [
                {"data": "ID"}, /*0*/
                {"data": "ClaveArticulo"}, //1
                {"data": "Articulo"}, //2
                {"data": "Cantidad"}, //3
                {"data": "Unidad"}, //4
                {"data": "Precio"}, //5
                {"data": "Subtotal"}, //6
                {"data": "Eliminar"} //7
            ],
            "createdRow": function (row, data, index) {
                $.each($(row).find("td"), function (k, v) {
                    var c = $(v);
                    var index = parseInt(k);
                    switch (index) {
                        case 0:
                            /*ARTICULO*/
                            c.addClass('text-info text-strong');
                            break;
                        case 2:
                            /*UNIDAD*/
                            c.addClass('text-success text-strong');
                            break;
                        case 5:
                            /*UNIDAD*/
                            c.addClass('text-danger');
                            break;
                    }
                });
            },
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api();//Get access to Datatable API
                // Update footer
                var total = api.column(6).data().reduce(function (a, b) {
                    var ax = 0, bx = 0;
                    ax = $.isNumeric((a)) ? parseFloat(a) : 0;
                    bx = $.isNumeric(getNumberFloat(b)) ? getNumberFloat(b) : 0;
                    return  (ax + bx);
                }, 0);
                $(api.column(6).footer()).html(api.column(6, {page: 'current'}).data().reduce(function (a, b) {
                    return '$' + $.number(parseFloat(total), 2, '.', ',');
                }, 0));
            },
            "dom": 'rt',
            "autoWidth": true,
            language: lang,
            "displayLength": 500,
            "colReorder": true,
            "bLengthChange": false,
            "deferRender": true,
            "scrollY": 295,
            scrollX: true,
            "scrollCollapse": true,
            "bSort": true,
            "keys": true,
            select: true,
            order: [[0, 'asc']],
            "initComplete": function (x, y) {
                HoldOn.close();
            }
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
</style>

