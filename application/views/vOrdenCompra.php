<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-body ">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Órdenes de Compra (PIEL, FORRO, PELETERIA, PLANTA)</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
            </div>
        </div>
        <div class="card-block mt-4">
            <div id="Articulos" class="table-responsive">
                <table id="tblArticulos" class="table table-sm display " style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Clave</th>
                            <th>Descripción</th>

                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card  m-3 d-none animated fadeIn text-dark" id="pnlDatos" style="z-index: 99 !important">
    <form id="frmNuevo">
        <fieldset>
            <!--            PRIMER CONTENEDOR-->
            <div class="card-body" >
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 float-left">
                        <legend >Orden Compra</legend>
                    </div>
                    <div class="col-12 col-sm-6 col-md-8" align="right">
                        <button type="button" class="btn btn-primary btn-sm" id="btnCancelar" >
                            <span class="fa fa-arrow-left" ></span> REGRESAR
                        </button>
                        <button type="button" class="btn btn-danger btn-sm " id="btnEliminar">
                            <span class="fa fa-trash fa-1x"></span> CANCELAR
                        </button>
                        <button type="button" class="btn btn-raised btn-success btn-sm d-none" id="btnIgualaPrecios">
                            <span class="fa fa-money-bill"></span> CERRAR ORDEN
                        </button>
                    </div>
                </div>
                <hr>
                <div class="row" >
                    <div class="d-none">
                        <input type="text" id="ID" name="ID" class="form-control form-control-sm" >
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-1">
                        <label for="Clave" >Tp*</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" maxlength="1" id="Tp" name="Tp" required="">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-1">
                        <label for="Folio" >Folio</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" readonly="" id="Folio" name="Folio" required="">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                        <label for="" >Tipo*</label>
                        <select id="Tipo" name="Tipo" class="form-control form-control-sm required" required="">
                            <option value=""></option>
                            <option value="10">10 PIEL/FORRO</option>
                            <option value="80">80 SUELA/PLANTA</option>
                            <option value="90">90 PELETERIA</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-4 col-md-3 col-xl-3">
                        <label for="" >Proveedor*</label>
                        <select id="Proveedor" name="Proveedor" class="form-control form-control-sm mb-2 required" required="">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-xl-2">
                        <label for="" >Fecha*</label>
                        <input type="text" class="form-control form-control-sm date notEnter" id="FechaOrden" name="FechaOrden" >
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-xl-1">
                        <label for="" >Maq.*</label>
                        <input type="text" class="form-control form-control-sm" id="Maq" name="Maq" required="">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-xl-1">
                        <label for="" >Año*</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" maxlength="2" id="Ano" name="Ano" required="">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-xl-1">
                        <label for="" >Sem.*</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" maxlength="2" id="Sem" name="Sem" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3 col-xl-2">
                        <label for="FechaEntrega" >Fecha Entrega*</label>
                        <input type="text" class="form-control form-control-sm date notEnter" id="FechaEntrega" name="FechaEntrega" required="">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-xl-5">
                        <label for="" >Consignar a*</label>
                        <input type="text" class="form-control form-control-sm" id="ConsignarA" name="ConsignarA" required="">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-xl-5">
                        <label for="Observaciones" >Observaciones</label>
                        <input type="text" class="form-control form-control-sm " maxlength="2" id="Observaciones" name="Observaciones" required="">
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<div class="card m-3 d-none animated fadeIn" id="pnlDatosDetalle">

    <div class="card-body text-dark">
        <button type="button" class="btn btn-info btn-lg btn-float" id="btnGuardar" data-toggle="tooltip" data-placement="left" title="Guardar">
            <i class="fa fa-save"></i>
        </button>
        <div class="row">
            <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <label for="Maquila" >Articulo*</label>
                <!--<input type="text" class="form-control form-control-sm" id="Maquila" name="Maquila" required placeholder="Maquila 1">-->
                <select id="Maquila" name="Maquila" class="form-control form-control-sm" >
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
                <button type="button" id="btnAgregarPrecio" class="btn btn-primary btn-sm d-sm-block "><span class="fa fa-plus"></span></button>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-2 table-responsive">
                <table id="tblPrecioVentaParaMaquilas" class="table table-sm display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Artículo</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Estatus</th>
                            <th scope="col">-</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var master_url = base_url + 'index.php/OrdenCompra/';
    var tblArticulos = $('#tblArticulos');
    var Articulos;
    var btnNuevo = $("#btnNuevo"), btnCancelar = $("#btnCancelar"), btnEliminar = $("#btnEliminar"), btnGuardar = $("#btnGuardar"), btnIgualaPrecios = $("#btnIgualaPrecios");
    var pnlTablero = $("#pnlTablero"), pnlDatos = $("#pnlDatos"), pnlDatosDetalle = $("#pnlDatosDetalle");
    var PrecioVentaParaMaquilas, tblPrecioVentaParaMaquilas = $("#tblPrecioVentaParaMaquilas");
    var nuevo = false, precio_actual = 0;
    var ClaveArticulo = 0;

    $(document).ready(function () {
        /*FUNCIONES INICIALES*/
        init();
        handleEnter();
        validacionSelectPorContenedor(pnlDatos);
        validacionSelectPorContenedor(pnlDatosDetalle);
        setFocusSelectToInputOnChange('#Departamento', '#Descripcion', pnlDatos);
        setFocusSelectToSelectOnChange('#Grupo', '#TipoArticulo', pnlDatos);
        setFocusSelectToSelectOnChange('#TipoArticulo', '#UnidadMedida', pnlDatos);
        setFocusSelectToSelectOnChange('#UnidadMedida', '#Tmnda', pnlDatos);
        setFocusSelectToInputOnChange('#Tmnda', '#Min', pnlDatos);
        setFocusSelectToInputOnChange('#ProveedorUno', '#PrecioUno', pnlDatos);
        setFocusSelectToInputOnChange('#ProveedorDos', '#PrecioDos', pnlDatos);
        setFocusSelectToInputOnChange('#ProveedorTres', '#PrecioTres', pnlDatos);
        setFocusSelectToInputOnChange('#Maquila', '#Precio', pnlDatosDetalle);


        pnlDatos.find("#Tp").change(function () {
            var tp = parseInt($(this).val());
            if (tp === 1 || tp === 2) {
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

        /*FUNCIONES X BOTON*/


        btnGuardar.click(function () {
            isValid('pnlDatos');
            if (valido) {
                var frm = new FormData(pnlDatos.find("#frmNuevo")[0]);
                if (!nuevo) {
                    if (PrecioVentaParaMaquilas.data().count()) {
                        var precios = [];
                        $.each(tblPrecioVentaParaMaquilas.find("tbody tr"), function (k, v) {

                            var r = PrecioVentaParaMaquilas.row($(this)).data();

                            if (r[3] === 'NUEVO') {
                                precios.push({
                                    Maquila: r[1],
                                    Precio: r[2]
                                });
                                console.log(precios);
                            }
                        });
                        frm.append('Precios', JSON.stringify(precios));
                    }
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
                        Articulos.ajax.reload();
                        PrecioVentaParaMaquilas.clear().draw();
                        pnlDatos.addClass("d-none");
                        pnlDatosDetalle.addClass('d-none');
                        pnlTablero.removeClass("d-none");
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                } else {
                    var precios = [];
                    frm.append('Precios', JSON.stringify(precios));
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
                        Articulos.ajax.reload();
                        swal({
                            title: "ATENCIÓN",
                            text: "ARTÍCULO GUARDADO",
                            icon: "success",
                            closeOnClickOutside: false,
                            closeOnEsc: false,
                            buttons: false,
                            timer: 1200
                        }).then((action) => {
                            pnlDatosDetalle.find('#Maquila')[0].selectize.focus();
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
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            pnlDatos.find("input,textarea").val("");
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass("d-none");
            pnlDatosDetalle.removeClass("d-none");
            btnEliminar.addClass("d-none");
            pnlDatos.find("#Tp").focus();
            PrecioVentaParaMaquilas.clear().draw();
            getID();
            $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
        });

        btnCancelar.click(function () {
            PrecioVentaParaMaquilas.clear().draw();
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass("d-none");
            pnlDatosDetalle.addClass("d-none");
            temp = 0;
            ClaveArticulo = 0;
        });
    });

    function init() {
        getRecords();
        getProveedores();
        getMaquilas();
        /*INICIALIZAR DETALLE*/
        PrecioVentaParaMaquilas = tblPrecioVentaParaMaquilas.DataTable({

            "dom": 'rti',
            buttons: buttons,
            language: lang,
            select: true,
            "autoWidth": true,
            "colReorder": true,
            "displayLength": 25,
            "bLengthChange": false,
            "deferRender": true,
            "scrollCollapse": false,
            "bSort": true,
            "aaSorting": [
                [4, 'asc']/*ID*/
            ],
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                }
                //,
//                {
//                    "targets": [3],
//                    "visible": false,
//                    "searchable": false
//                }
            ],
            createdRow: function (row, data, dataIndex, cells) {
                var event;
                if (isMobile) {
                    $(this).find("td:eq(1)").touch();
                    event = 'tap';
                } else {
                    event = 'dblclick';
                }
                if (!nuevo) {
                    $(row).find("td").eq(1).on(event, function () {
                        var r = PrecioVentaParaMaquilas.row(row).data();
                        var input = '<input type="text" class="form-control form-control-sm numbersOnly" maxlength="10" name="Precio" autofocus>';
                        var exist = $(this).find("#Precio").val();
                        var celda = $(this);
                        var componente = tblPrecioVentaParaMaquilas.find("[name='Precio']");
                        if (componente.val() !== undefined) {
                            var valor = componente.val();
                            var padre = componente.parent();
                            padre.html(valor);
                        }
                        if (exist === undefined && celda.text() !== '') {
                            var vActual = celda.text();
                            celda.html(input);
                            var input_precio = celda.find("[name='Precio']");
                            input_precio.val(getNumberFloat(vActual));
                            precio_actual = vActual;
                            var padre = celda.parent();
                            input_precio.focus().select();
                            input_precio.focusout(function () {
                                if (precio_actual !== vActual) {
                                    onModificarPrecioMaquila(r, padre, celda, this);
                                } else {
                                    celda.html(precio_actual);
                                }
                            }).change(function () {
                                onModificarPrecioMaquila(r, padre, celda, this);
                            }).keyup(function (e) {
                                if (e.keyCode === 13) {
                                    onModificarPrecioMaquila(r, padre, celda, this);
                                }
                            });
                        }
                    });
                }
            }
        });
    }
    function getRecords() {
        temp = 0;
        HoldOn.open({
            theme: 'sk-cube',
            message: 'CARGANDO...'
        });
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblArticulos')) {
            tblArticulos.DataTable().destroy();
        }
        Articulos = tblArticulos.DataTable({
            "dom": 'Bfrtip',
            buttons: buttons,
            "ajax": {
                "url": master_url + 'getRecords',
                "dataSrc": ""
            },
            "columns": [
                {"data": "ID"}, {"data": "Clave"}, {"data": "Descripcion"}
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
                [1, 'desc']/*ID*/
            ],
            initComplete: function (a, b) {
                HoldOn.close();
            }
        });

        $('#tblArticulos_filter input[type=search]').focus();

        tblArticulos.find('tbody').on('click', 'tr', function () {
            HoldOn.open({
                theme: 'sk-cube',
                message: 'CARGANDO...'
            });
            nuevo = false;
            tblArticulos.find("tbody tr").removeClass("success");
            $(this).addClass("success");
            var dtm = Articulos.row(this).data();
            temp = parseInt(dtm.ID);
            ClaveArticulo = parseInt(dtm.Clave);

            $.getJSON(master_url + 'getArticuloByID', {ID: temp}).done(function (data) {
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
                btnIgualaPrecios.removeClass("d-none");
                pnlTablero.addClass("d-none");
                pnlDatos.removeClass('d-none');
                pnlDatosDetalle.removeClass('d-none');
                pnlDatos.find("#Departamento")[0].selectize.focus();

                /*DESHABILITAR CAMPOS CLAVE DEL ARTICULO*/
                if (seg === 0) {
                    pnlDatos.find("#UnidadMedida")[0].selectize.disable();
                    pnlDatos.find("#PrecioUno").prop("readonly", true);
                    pnlDatos.find("#PrecioDos").prop("readonly", true);
                    pnlDatos.find("#PrecioTres").prop("readonly", true);
                }


                getDetalleByID(ClaveArticulo);


            }).fail(function (x, y, z) {
                swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
                console.log(x.responseText);
            }).always(function () {
                HoldOn.close();
            });
        });

    }

    function getDetalleByID(IDX) {
        /*DETALLE*/
        $.getJSON(master_url + 'getDetalleByID', {ID: IDX}).done(function (data) {
            if (data.length > 0) {
                $.each(data, function (k, v) {
                    PrecioVentaParaMaquilas.row.add([v.ID, v.Maquila, v.Precio, v.Estatus, v.ClaveMaquila, '<button type="button" class="btn btn-danger" onclick="onEliminarDetalle(' + v.ID + ',this)"><span class="fa fa-trash"></span></button>']).draw(false);
                });
            }
        }).fail(function (x, y, z) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        }).always(function () {
            $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
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
        }).always(function () {

        });
    }
    function getMaquilas() {
        $.getJSON(master_url + 'getMaquilas', {ID: temp}).done(function (data) {
            $.each(data, function (k, v) {
                pnlDatosDetalle.find("#Maquila")[0].selectize.addOption({text: v.Maquila, value: v.ID});
            });
        }).fail(function (x) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        }).always(function () {

        });
    }
    function getID() {
        $.getJSON(master_url + 'getID').done(function (data, x, jq) {
            if (data.length > 0) {
                var ID = $.isNumeric(data[0].CLAVE) ? parseInt(data[0].CLAVE) + 1 : 1;
                pnlDatos.find("#Clave").val(ID);
            } else {
                pnlDatos.find("#Clave").val('1');
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
</script>

