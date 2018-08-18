<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-body ">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Articulos</legend>
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
                            <th>Depto.Articulo</th>
                            <th>Descripción</th>
                            <th>U.M</th>
                            <th>Estatus</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card m-3 d-none animated fadeIn" id="pnlDatos">
    <div class="card-body text-dark">
        <form id="frmNuevo">
            <fieldset>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 float-left">
                        <legend >Articulos</legend>
                    </div>
                    <div class="col-12 col-sm-6 col-md-8" align="right">
                        <button type="button" class="btn btn-primary btn-sm" id="btnCancelar" >
                            <span class="fa fa-arrow-left" ></span> REGRESAR
                        </button>
                        <button type="button" class="btn btn-danger btn-sm d-none" id="btnEliminar">
                            <span class="fa fa-trash fa-1x"></span> ELIMINAR
                        </button>
                        <button type="button" class="btn btn-raised btn-success btn-sm d-none" id="btnIgualaPrecios">
                            <span class="fa fa-money-bill"></span> PRECIO MAQUILAS  = MAQ-1
                        </button>
                        <!--                        <button type="button" class="btn btn-raised btn-info btn-sm" id="btnGuardar">
                                                    <span class="fa fa-save "></span> GUARDAR
                                                </button>-->

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="d-none">
                        <input type="text" id="ID" name="ID" class="form-control form-control-sm" >
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <label for="Clave" >Clave*</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" id="Clave" name="Clave" required placeholder="20180814">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <label for="" >Tipo de articulo*</label>
                        <select id="Departamento" name="Departamento" class="form-control form-control-sm" >
                            <option value=""></option>
                            <option value="10">PIEL/FORRO</option>
                            <option value="80">SUELA/PLANTA</option>
                            <option value="90">PELETERIA</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label for="" >Descripción*</label>
                        <textarea id="Descripcion" name="Descripcion" class="form-control" rows="2" cols="4"></textarea>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-xl-3">
                        <label for="" >Grupo*</label>
                        <select id="Grupo" name="Grupo" class="form-control form-control-sm" >
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-xl-3">
                        <label for="" >Unidad*</label>
                        <select id="UnidadMedida" name="UnidadMedida" class="form-control form-control-sm" >
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-xl-3">
                        <label for="" >Moneda*</label>
                        <select id="Tmnda" name="Tmnda" class="form-control form-control-sm" >
                            <option value=""></option>
                            <option value="1">Nacional</option>
                            <option value="2">Dolar</option>
                            <option value="3">Libra</option>
                            <option value="4">Jen</option>
                            <option value="5">Euro</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-xl-3">
                        <label for="Min" >Min*</label>
                        <input type="text" class="form-control form-control-sm" id="Min" name="Min" required >
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-xl-3">
                        <label for="Max" >Max*</label>
                        <input type="text" class="form-control form-control-sm" id="Max" name="Max" >
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-3" align="center">
                        <legend>Proveedores</legend>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                        <select id="ProveedorUno" name="ProveedorUno" class="form-control form-control-sm mb-2" required >
                            <option value=""></option>
                        </select>
                        <input type="text" class="form-control form-control-sm numbersOnly mb-2" id="PrecioUno" name="PrecioUno" required  placeholder="Precio pactado">
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                        <select id="ProveedorDos" name="ProveedorDos" class="form-control form-control-sm mb-2" >
                            <option value=""></option>
                        </select>
                        <input type="text" class="form-control form-control-sm numbersOnly mb-2" id="PrecioDos" name="PrecioDos"   placeholder="Precio pactado">
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                        <select id="ProveedorTres" name="ProveedorTres" class="form-control form-control-sm mb-2" >
                            <option value=""></option>
                        </select>
                        <input type="text" class="form-control form-control-sm numbersOnly mb-2" id="PrecioTres" name="PrecioTres"   placeholder="Precio pactado">
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-3" align="center">
                        <legend>Ubicaciones</legend>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3 col-xl-3 mb-3">
                        <input type="text" class="form-control form-control-sm" id="UbicacionUno" name="UbicacionUno" required placeholder="Pasillo 1">
                    </div>
                    <div class="col-12 col-sm-3 col-md-3 col-xl-3 mb-3">
                        <input type="text" class="form-control form-control-sm" id="UbicacionDos" name="UbicacionDos"  placeholder="Aparador 1">
                    </div>
                    <div class="col-12 col-sm-3 col-md-3 col-xl-3 mb-3">
                        <input type="text" class="form-control form-control-sm" id="UbicacionTres" name="UbicacionTres"  placeholder="Pasillo 2">
                    </div>
                    <div class="col-12 col-sm-3 col-md-3 col-xl-3 mb-3">
                        <input type="text" class="form-control form-control-sm" id="UbicacionCuatro" name="UbicacionCuatro"  placeholder="Aparador 2">
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-xl-6">
                        <label for="" >Tipo*</label>
                        <select id="TipoArticulo" name="TipoArticulo" class="form-control form-control-sm" >
                            <option value=""></option>
                            <option value="0">PRODUCCIÓN</option>
                            <option value="222">PROTOTIPO</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-xl-6">
                        <label for="" >Estatus*</label>
                        <select id="Estatus" name="Estatus" class="form-control form-control-sm" >
                            <option value=""></option>
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                        </select>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-6 col-md-6 ">
                        <h6 class="text-danger">Los campos con * son obligatorios</h6>
                    </div>

                </div>
            </fieldset>
        </form>
    </div>
</div>
<div class="card m-3 d-none animated fadeIn" id="pnlDatosDetalle">

    <div class="card-body text-dark">
        <button type="button" class="btn btn-info btn-lg btn-float" id="btnGuardar" data-toggle="tooltip" data-placement="left" title="Guardar">
            <i class="fa fa-save"></i>
        </button>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <label for="Maquila" >Maquila*</label>
                <!--<input type="text" class="form-control form-control-sm" id="Maquila" name="Maquila" required placeholder="Maquila 1">-->
                <select id="Maquila" name="Maquila" class="form-control form-control-sm" >
                    <option value=""></option>
                </select>
            </div>
            <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                <label for="Precio" >Precio Maquila uno*</label>
                <input type="text" class="form-control form-control-sm numbersOnly" id="Precio" name="Precio" required placeholder="0.0">
            </div>
            <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1 my-2 d-sm-block ">
                <button type="button" id="btnAgregarPrecio" class="btn btn-primary btn-sm d-sm-block "><span class="fa fa-plus"></span></button>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-2 table-responsive">
                <table id="tblPrecioVentaParaMaquilas" class="table table-sm display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Maquila</th>
                            <th scope="col">Precio</th>
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
    var master_url = base_url + 'index.php/Articulos/';
    var tblArticulos = $('#tblArticulos');
    var Articulos;
    var btnNuevo = $("#btnNuevo"), btnCancelar = $("#btnCancelar"), btnEliminar = $("#btnEliminar"), btnGuardar = $("#btnGuardar"), btnIgualaPrecios = $("#btnIgualaPrecios");
    var pnlTablero = $("#pnlTablero"), pnlDatos = $("#pnlDatos"), pnlDatosDetalle = $("#pnlDatosDetalle");
    var PrecioVentaParaMaquilas, tblPrecioVentaParaMaquilas = $("#tblPrecioVentaParaMaquilas");
    var nuevo = false, precio_actual = 0;

    $(document).ready(function () {
        /*FUNCIONES INICIALES*/
        init();
        handleEnter();
        pnlDatos.find("input,select").addClass("animated slideInDown");
        /*FUNCIONES X BOTON*/
        btnIgualaPrecios.click(function () {
            swal({
                title: "¿Estas seguro?",
                text: "Nota: Esta acción no se puede deshacer",
                icon: "warning",
                buttons: {
                    cancelar: {
                        text: "Cancelar",
                        value: "cancelar"
                    },
                    cambiar: {
                        text: "Aceptar",
                        value: "cambiar"
                    }
                }
            }).then((value) => {
                switch (value) {
                    case "cambiar":
                        $.post(master_url + 'onIgualarPrecios', {ID: pnlDatos.find("#ID").val()}).done(function (data) {
                            console.log("\n", data);
                            swal('ATENCIÓN', 'SE HAN CAMBIADO LOS PRECIOS Y AGREGADO NUEVAS MAQUILAS', 'success');
                        }).fail(function (x, y, z) {
                            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
                            console.log(x.responseText);
                        });
                        console.log('CAMBIANDO PRECIO...');
                        break;
                    case "cancelar":
                        swal.close();
                        break;
                }
            });
        });

        pnlDatosDetalle.find("#btnAgregarPrecio").click(function () {
            var Maquila = pnlDatosDetalle.find("#Maquila"), Precio = pnlDatosDetalle.find("#Precio");
            if (Maquila.val() !== '' && Precio.val()) {
                var btn = '<button type="button" class="btn btn-danger" onclick="onEliminarDetalleSN(this)"><span class="fa fa-trash"></span></button>';
                PrecioVentaParaMaquilas.row.add([0, Maquila.val(), '$' + $.number(Precio.val(), 2, '.', ','), 'NUEVO', btn]).draw(false);
                Maquila.val('');
                Precio.val('');
                Maquila.focus();
            } else {
                swal('ATENCIÓN', 'DEBE DE ESTABLECER UNA MAQUILA Y UN PRECIO', 'warning').then((action) => {
                    (Maquila.val() === '') ? Maquila.focus() : Precio.focus();
                });
            }
        });

        btnGuardar.click(function () {
            isValid('pnlDatos');
            if (valido) {
                var frm = new FormData(pnlDatos.find("#frmNuevo")[0]);
                if (!nuevo) {
                    var precios = [];
                    $.each(tblPrecioVentaParaMaquilas.find("tbody tr"), function (k, v) {
                        var r = PrecioVentaParaMaquilas.row($(this)).data();
                        if (r[3] === 'NUEVO') {
                            precios.push({
                                Maquila: r[1],
                                Precio: r[2]
                            });
                        }
                    });
                    frm.append('Precios', JSON.stringify(precios));
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
                    console.log("\n * r * ");
                    $.each(tblPrecioVentaParaMaquilas.find("tbody tr"), function (k, v) {
                        console.log(v);
                        var r = PrecioVentaParaMaquilas.row($(this)).data();
                        precios.push({
                            Maquila: r[1],
                            Precio: r[2]
                        });
                    });
                    frm.append('Precios', JSON.stringify(precios));
                    $.ajax({
                        url: master_url + 'onAgregar',
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: frm
                    }).done(function (data, x, jq) {
                        console.log(data);
                        pnlDatos.find("[name='ID']").val(data);
                        nuevo = false;
                        Articulos.ajax.reload();
                        pnlDatos.addClass("d-none");
                        pnlDatosDetalle.addClass('d-none');
                        pnlTablero.removeClass("d-none");
                        swal('ATENCIÓN', 'SE HA AGREGADO UN NUEVO REGISTRO', 'success');
                        btnIgualaPrecios.addClass("d-none");
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                }
            } else {
                swal('ATENCIÓN', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'danger');
            }
        });

        btnEliminar.click(function () {
            swal({
                title: "¿Estas seguro?",
                text: "Nota: No se eliminara ninguna Articulo que tenga alguna relacion con otro dato dentro del sistema",
                icon: "warning",
                buttons: {
                    cancelar: {
                        text: "Cancelar",
                        value: "cancelar"
                    },
                    eliminar: {
                        text: "Finalizar",
                        value: "eliminar"
                    }
                }
            }).then((value) => {
                switch (value) {
                    case "eliminar":
                        $.post(master_url + 'onEliminar', {ID: temp}).done(function () {
                            swal('ATENCIÓN', 'SE HA ELIMINADO EL REGISTRO', 'success');
                            PrecioVentaParaMaquilas.clear().draw();
                            pnlDatos.addClass("d-none");
                            pnlDatosDetalle.addClass('d-none');
                            pnlTablero.removeClass("d-none");
                            Articulos.ajax.reload();
                        }).fail(function (x, y, z) {
                            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
                            console.log(x.responseText);
                        });
                        break;
                    case "cancelar":
                        swal.close();
                        break;
                }
            });
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
            pnlDatos.find("#Departamento")[0].selectize.focus();
            PrecioVentaParaMaquilas.clear().draw();
            getID();
            $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
            btnIgualaPrecios.addClass("d-none");
        });

        btnCancelar.click(function () {
            PrecioVentaParaMaquilas.clear().draw();
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass("d-none");
            pnlDatosDetalle.addClass("d-none");
            temp = 0;
        });
    });

    function init() {
        getRecords();
        getGrupos();
        getUnidades();
        getProveedores();
        /*INICIALIZAR DETALLE*/
        PrecioVentaParaMaquilas = tblPrecioVentaParaMaquilas.DataTable({

            "dom": 'frtip',
            buttons: buttons,
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
                [0, 'desc']/*ID*/
            ],
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [3],
                    "visible": false,
                    "searchable": false
                }
            ],
            createdRow: function (row, data, dataIndex, cells) {
                console.log($(row).find("td"));
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
                        if (exist === undefined && celda.text() !== '') {
                            console.log('CELDA TEXT ', celda.text());
                            var vActual = celda.text();
                            celda.html(input);
                            var input_precio = celda.find("[name='Precio']");
                            input_precio.val(getNumberFloat(vActual));
                            precio_actual = vActual;
                            var padre = celda.parent();
                            input_precio.focus().select();
                            input_precio.focusout(function () {
                                onModificarPrecioMaquila(r, padre, celda, this);
                            });
                            input_precio.change(function () {
                                onModificarPrecioMaquila(r, padre, celda, this);
                            });
                            input_precio.keyup(function (e) {
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

    function onModificarPrecioMaquila(r, padre, celda, field) {
        var input = $(field);
        var v = (input.val());
        if (v !== '' && $.isNumeric(v)) {
            swal({
                title: "¿Estas seguro?",
                text: "Nota: Al cambiar un precio puede afectar las fichas tecnicas que contengan este articulo",
                icon: "warning",
                buttons: {
                    cancelar: {
                        text: "Cancelar",
                        value: "cancelar"
                    },
                    aceptar: {
                        text: "Aceptar",
                        value: "aceptar"
                    }
                }
            }).then((value) => {
                switch (value) {
                    case "aceptar":
                        var precio_format = '$' + $.number(v, 2, '.', ',');
                        celda.html(precio_format);
                        PrecioVentaParaMaquilas.cell(padre, 2).data(precio_format).draw();
                        onEditarPrecioPorMaquila({PARENT: temp, ID: r[0], CELDA: 'PRECIO', VALOR: precio_format});
                        break;
                    case "cancelar":
                        var precio_format = '$' + $.number(precio_actual, 2, '.', ',');
                        celda.html(precio_format);
                        PrecioVentaParaMaquilas.cell(padre, 2).data(precio_format).draw();
                        swal.close();
                        break;
                }
            });
        } else {
            input.val('');
            swal({
                title: 'ATENCIÓN',
                text: "NO ES UN PRECIO VÁLIDO",
                icon: "warning",
                closeOnEsc: false,
                closeOnClickOutside: false
            }).then((action) => {
                var precio_format = '$' + $.number(precio_actual, 2, '.', ',');
                celda.html(precio_format);
                PrecioVentaParaMaquilas.cell(padre, 2).data(precio_format).draw();
            });
        }
    }

    function getID() {
        $.getJSON(master_url + 'getID').done(function (data, x, jq) {
            console.log(data);
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
                {"data": "ID"}, {"data": "Clave"}, {"data": "Departamento"}, {"data": "Descripcion"}, {"data": "UM"}, {"data": "Estatus"}
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
                [0, 'desc']/*ID*/
            ]
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
            getMaquilas();
            $.getJSON(master_url + 'getArticuloByID', {ID: temp}).done(function (data) {
                pnlDatos.find("input").val("");
                $.each(pnlDatos.find("select"), function (k, v) {
                    pnlDatos.find("select")[k].selectize.clear(true);
                });
                $.each(data[0], function (k, v) {
                    pnlDatos.find("[name='" + k + "']").val(v);
                    if (pnlDatos.find("[name='" + k + "']").is('select')) {
                        pnlDatos.find("[name='" + k + "']")[0].selectize.setValue(v);
                    }
                });
                btnIgualaPrecios.removeClass("d-none");
                pnlTablero.addClass("d-none");
                pnlDatos.removeClass('d-none');
                pnlDatosDetalle.removeClass('d-none');
                btnEliminar.removeClass("d-none");
                pnlDatos.find("#Departamento")[0].selectize.focus();
                /*DETALLE*/
                $.getJSON(master_url + 'getDetalleByID', {ID: temp}).done(function (data) {
                    console.log('getDetalleByID', data);
                    if (data.length > 0) {
                        $.each(data, function (k, v) {
                            PrecioVentaParaMaquilas.row.add([v.ID, v.Maquila, v.Precio, 'ACTIVO', '<button type="button" class="btn btn-danger" onclick="onEliminarDetalle(' + v.ID + ',this)"><span class="fa fa-trash"></span></button>']).draw(false);
                        });
                        if (PrecioVentaParaMaquilas.rows().data().count() === 1) {

                        }
                    }
                }).fail(function (x, y, z) {
                    swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
                    console.log(x.responseText);
                }).always(function () {
                    $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
                });
            }).fail(function (x, y, z) {
                swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
                console.log(x.responseText);
            }).always(function () {
                HoldOn.close();
            });
        });
        HoldOn.close();
    }
    function getGrupos() {
        $.getJSON(master_url + 'getGrupos').done(function (data) {
            $.each(data, function (k, v) {
                pnlDatos.find("#Grupo")[0].selectize.addOption({text: v.Grupo, value: v.ID});
            });
        }).fail(function () {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        }).always(function () {

        });
    }
    function getUnidades() {
        $.getJSON(master_url + 'getUnidades').done(function (data) {
            $.each(data, function (k, v) {
                pnlDatos.find("#UnidadMedida")[0].selectize.addOption({text: v.Unidad, value: v.ID});
            });
        }).fail(function (x, y, z) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        }).always(function () {

        });
    }

    function getProveedores() {
        $.getJSON(master_url + 'getProveedores').done(function (data) {
            $.each(data, function (k, v) {
                pnlDatos.find("#ProveedorUno")[0].selectize.addOption({text: v.Proveedor, value: v.ID});
                pnlDatos.find("#ProveedorDos")[0].selectize.addOption({text: v.Proveedor, value: v.ID});
                pnlDatos.find("#ProveedorTres")[0].selectize.addOption({text: v.Proveedor, value: v.ID});
            });
        }).fail(function () {
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
        }).fail(function () {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        }).always(function () {

        });
    }

    function getID() {
        $.getJSON(master_url + 'getID').done(function (data, x, jq) {
            console.log(data);
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

    function onEliminarDetalle(e, c) {
        swal({
            title: "¿Estas seguro?",
            text: "Nota: Esta acción no se puede deshacer",
            icon: "warning",
            buttons: {
                cancelar: {
                    text: "Cancelar",
                    value: "cancelar"
                },
                eliminar: {
                    text: "Finalizar",
                    value: "eliminar"
                }
            }
        }).then((value) => {
            switch (value) {
                case "eliminar":
                    $.post(master_url + 'onEliminarDetalle', {ID: e}).done(function () {
                        swal('ATENCIÓN', 'SE HA ELIMINADO EL REGISTRO', 'success');
                        PrecioVentaParaMaquilas.row($(c).parents('tr')).remove().draw();
                    }).fail(function (x, y, z) {
                        swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
                        console.log(x.responseText);
                    });
                    break;
                case "cancelar":
                    swal.close();
                    break;
            }
        });
    }
    function onEliminarDetalleSN(e) {
        PrecioVentaParaMaquilas.row($(e).parents('tr')).remove().draw();
    }

    function onEditarPrecioPorMaquila(x) {
        $.post(master_url + 'onEditarPrecioPorMaquila', x).done(function (data) {
            console.log(data);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }
</script>
<style>
    .selectize-input {
        border: 1px solid #9E9E9E;
    }
    .form-control {
        border: 1px solid #9E9E9E;
    }
</style>