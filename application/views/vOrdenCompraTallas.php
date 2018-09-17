<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-body ">
        <div class="row">
            <div class="col-sm-8 float-left">
                <legend class="float-left">Órdenes de Compra (PLANTAS, SUELAS, ENTRESUELAS)</legend>
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
                            <th>Departamento</th>
                            <th>Folio</th>
                            <th>Proveedor</th>
                            <th>Fecha</th>
                            <th>Año</th>
                            <th>Sem</th>
                            <th>Maq</th>
                            <th>Estatus</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Departamento</th>
                            <th>Folio</th>
                            <th>Proveedor</th>
                            <th>Fecha</th>
                            <th>Año</th>
                            <th>Semana</th>
                            <th>Maquila</th>
                            <th>Estatus</th>
                        </tr>
                    </tfoot>
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
                    <legend >Orden Compra por Tallas</legend>
                </div>
                <div class="col-12 col-sm-6 col-md-8" align="right">
                    <button type="button" class="btn btn-primary btn-sm" id="btnRegresar" >
                        <span class="fa fa-arrow-left" ></span> REGRESAR
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm " id="btnVerProveedores" >
                        <span class="fa fa-user-secret" ></span> PROVEEDORES
                    </button>
                    <button type="button" class="btn btn-info btn-sm " id="btnVerArticulos" >
                        <span class="fa fa-cube" ></span> ARTÍCULOS
                    </button>
                    <button type="button" class="btn btn-warning btn-sm d-none" id="btnImprimir" >
                        <span class="fa fa-print" ></span> IMPRIMIR O.C.
                    </button>
                    <button type="button" class="btn btn-danger btn-sm d-none" id="btnCancelar" >
                        <span class="fa fa-ban" ></span> CANCELAR O.C.
                    </button>
                    <button type="button" class="btn btn-success btn-lg btn-float d-none" id="btnCerrarOrden" data-toggle="tooltip" data-placement="left" title="Cerrar Orden">
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
                    <input type="text" class="form-control form-control-sm numbersOnly disabledForms" readonly="" id="Folio" name="Folio" required="">
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                    <label for="" >Tipo*</label>
                    <select id="Tipo" name="Tipo" class="form-control form-control-sm required" required="">
                        <option value=""></option>
                        <option value="80">80 SUELA</option>
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
                    <input type="text" class="form-control form-control-sm "  id="Observaciones" name="Observaciones">
                </div>

            </div>
        </form>
    </div>

</div>
<div class="card m-3 d-none animated fadeIn" id="pnlDatosDetalle" >
    <div class="card-body text-dark">
        <div class="row" id="ControlesDetalle">
            <div class="col-12 col-sm-4 col-md-3 col-xl-3" >
                <label for="" >Artículo CBZ*</label>
                <select id="Articulo" name="Articulo" class="form-control form-control-sm required" required="" >
                    <option value=""></option>
                </select>
            </div>
            <!--TALLAS-->
            <div class="col-12">
                <div class="table-responsive" style="overflow-x:auto; white-space: nowrap;">
                    <label class="font-weight-bold" for="Tallas"></label>
                    <table id="tblTallas" class="Tallas" >
                        <thead></thead>
                        <tbody>
                            <tr id="rArticulos">
                                <td class="font-weight-bold">Art.</td>
                                <?php
                                for ($index = 1; $index < 21; $index++) {
                                    print '<td><input type="text" style="width: 55px;" id="A' . $index . '" name="A' . $index . '" disabled></td>';
                                }
                                ?>
                            </tr>
                            <tr id="rPrecios">
                                <td class="font-weight-bold">Precio</td>
                                <?php
                                for ($index = 1; $index < 21; $index++) {
                                    print '<td><input type="text" style="width: 55px;" id="P' . $index . '" name="P' . $index . '" disabled></td>';
                                }
                                ?>
                            </tr>
                            <tr id="rTallasBuscaManual">
                                <td class="font-weight-bold">Tallas</td>
                                <?php
                                for ($index = 1; $index < 21; $index++) {
                                    print '<td><input type="text" style="width: 55px;" id="T' . $index . '" name="T' . $index . '" disabled></td>';
                                }
                                ?>
                                <td class="font-weight-bold">Agregar</td>
                            </tr>
                            <tr class="rCapturaCantidades" id="rCantidades">
                                <td class="font-weight-bold">Cant.</td>
                                <?php
                                for ($index = 1; $index < 21; $index++) {
                                    print '<td><input type="text" style="width: 55px;" id="C' . $index . '" class="form-control form-control-sm numbersOnly " name="C' . $index . '" ></td>';
                                }
                                ?>
                                <td>
                                    <button type="button" id="btnAgregar" class="btn btn-primary btn-sm d-sm-block" data-toggle="tooltip" data-placement="right" title="Agregar"><span class="fa fa-plus"></span></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--        DETALLE-->
        <div class="row">
            <div class="col-12 mt-4">
                <table id="tblComprasDetalle" class="table table-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th class="d-none">ID</th>
                            <th class="d-none">ClaveArticulo</th>
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
                            <td class="d-none"></td>
                            <td class="d-none"></td>
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
    var master_url = base_url + 'index.php/OrdenCompraTallas/';
    var tblCompras = $('#tblCompras');
    var Compras;
    var btnNuevo = $("#btnNuevo"), btnAgregar = $("#btnAgregar");
    var pnlTablero = $("#pnlTablero"), pnlDatos = $("#pnlDatos"), pnlDatosDetalle = $("#pnlDatosDetalle");
    var nuevo = false;
    var tblComprasDetalle = $("#tblComprasDetalle"), ComprasDetalle;
    var btnRegresar = pnlDatos.find("#btnRegresar");
    var btnCerrarOrden = pnlDatos.find('#btnCerrarOrden');
    var btnCancelar = pnlDatos.find('#btnCancelar');
    var btnImprimir = pnlDatos.find('#btnImprimir');
    var btnVerProveedores = pnlDatos.find('#btnVerProveedores');
    var btnVerArticulos = pnlDatos.find('#btnVerArticulos');
    var nuevoTemp = 0;
    $(document).ready(function () {
        /*FUNCIONES INICIALES*/
        init();
        handleEnter();
        validacionSelectPorContenedor(pnlDatos);
        validacionSelectPorContenedor(pnlDatosDetalle);
        setFocusSelectToSelectOnChange('#Tipo', '#Proveedor', pnlDatos);
        setFocusSelectToInputOnChange('#Proveedor', '#FechaOrden', pnlDatos);
        setFocusSelectToInputOnChange('#Articulo', '#C1', pnlDatosDetalle);

        pnlDatos.find("#Tp").change(function () {
            var tp = parseInt($(this).val());
            if (tp === 1 || tp === 2) {
                getFolio(tp);
                pnlDatos.find('#Tipo')[0].selectize.focus();
                getProveedores(tp);
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
                getCabecerosByProveedor($(this).val());
                getPorcentajesCompraByProveedor($(this).val());
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

        pnlDatosDetalle.find("#Articulo").change(function () {
            getArticulosCabecero($(this).val(), pnlDatos.find("#Proveedor").val());
        });

        /*FUNCIONES X BOTON*/
        btnImprimir.click(function () {
            //HoldOn.open({theme: 'sk-bounce', message: 'GENERANDO REPORTE...'});
            var movs = [];
            movs.push({
                ID: temp
            });
            movs.push({
                ID: (nuevoTemp === 0) ? 0 : nuevoTemp
            });
            $.post(master_url + 'onImprimirOrdenCompra', {movs: JSON.stringify(movs)}).done(function (data, x, jq) {
                if (data.length > 0) {

                    $.fancybox.open({
                        src: data,
                        type: 'iframe',
                        opts: {
                            afterShow: function (instance, current) {
                                console.info('done!');
                            },
                            iframe: {
                                // Iframe template
                                tpl: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowtransparency="true" src=""></iframe>',
                                preload: true,
                                // Custom CSS styling for iframe wrapping element
                                // You can use this to set custom iframe dimensions
                                css: {
                                    width: "100%",
                                    height: "100%"
                                },
                                // Iframe tag attributes
                                attr: {
                                    scrolling: "auto"
                                }
                            }
                        }
                    });


                } else {
                    swal({
                        title: "ATENCIÓN",
                        text: "NO EXISTE ORDEN DE COMPRA",
                        icon: "error"
                    });
                }
                HoldOn.close();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            });

        });

        btnCancelar.click(function () {
            if (temp !== 0 && temp !== undefined && temp > 0) {
                swal({
                    title: "Confirmar",
                    text: "Deseas cancelar el registro?",
                    icon: "warning",
                    buttons: ["Cancelar", "Aceptar"],
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        HoldOn.open({
                            theme: "sk-bounce",
                            message: "CARGANDO DATOS..."
                        });
                        $.post(master_url + 'onEliminar', {ID: temp}).done(function (data, x, jq) {
                            pnlTablero.removeClass("d-none");
                            pnlDatos.addClass("d-none");
                            pnlDatosDetalle.addClass("d-none");
                            Compras.ajax.reload();
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    }
                });
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
            }
        });

        btnAgregar.click(function () {

            isValid('pnlDatos');
            if (valido) {
                var frm = new FormData(pnlDatos.find("#frmNuevo")[0]);
                if (!nuevo) {
                    //AgregaDetalle
                    onAgregarDetalle(pnlDatos.find("#ID").val());
                } else {
                    $.ajax({
                        url: master_url + 'onAgregar',
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: frm
                    }).done(function (data, x, jq) {
                        pnlDatos.find("#ID").val(data);
                        temp = data;
                        Compras.ajax.reload();
                        //Deshabilida encabezado
                        pnlDatos.find('input').attr('readonly', true);
                        $.each(pnlDatos.find("select"), function (k, v) {
                            pnlDatos.find("select")[k].selectize.disable();
                        });
                        btnCancelar.removeClass('d-none');
                        btnCerrarOrden.removeClass('d-none');
                        //AgregaDetalle
                        onAgregarDetalle(data);
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
            nuevoTemp = 0;
            pnlDatos.find("input").val("");
            pnlDatosDetalle.find("input").val("");
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            $.each(pnlDatosDetalle.find("select"), function (k, v) {
                pnlDatosDetalle.find("select")[k].selectize.clear(true);
            });
            if ($.fn.DataTable.isDataTable('#tblComprasDetalle')) {
                ComprasDetalle.clear().draw();
            }
            pnlDatos.find('input').attr('readonly', false);
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.enable();
            });
            pnlDatos.find("#Tipo")[0].selectize.addItem('80', true);
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass("d-none");
            pnlDatosDetalle.removeClass("d-none");
            pnlDatosDetalle.find('#ControlesDetalle').removeClass('d-none');
            btnCancelar.addClass('d-none');
            btnCerrarOrden.addClass('d-none');
            btnImprimir.addClass('d-none');
            var d = new Date();
            var n = d.getFullYear();
            pnlDatos.find("#Ano").val(n);
            pnlDatos.find("#FechaOrden").val(getToday());
            pnlDatos.find("#Tp").focus();
            $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
            temp = 0;
        });

        btnRegresar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass("d-none");
            pnlDatosDetalle.addClass("d-none");
        });

        btnVerArticulos.click(function () {
            $.fancybox.open({
                src: base_url + '/Articulos/?origen=MATERIALES',
                type: 'iframe',
                opts: {
                    afterShow: function (instance, current) {
                        console.info('done!');
                    },
                    iframe: {
                        // Iframe template
                        tpl: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowtransparency="true" src=""></iframe>',
                        preload: true,
                        // Custom CSS styling for iframe wrapping element
                        // You can use this to set custom iframe dimensions
                        css: {
                            width: "85%",
                            height: "85%"
                        },
                        // Iframe tag attributes
                        attr: {
                            scrolling: "auto"
                        }
                    }
                }
            });
        });

        btnVerProveedores.click(function () {
            $.fancybox.open({
                src: base_url + '/Proveedores/?origen=MATERIALES',
                type: 'iframe',
                opts: {
                    afterShow: function (instance, current) {
                        console.info('done!');
                    },
                    iframe: {
                        // Iframe template
                        tpl: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowtransparency="true" src=""></iframe>',
                        preload: true,
                        // Custom CSS styling for iframe wrapping element
                        // You can use this to set custom iframe dimensions
                        css: {
                            width: "85%",
                            height: "85%"
                        },
                        // Iframe tag attributes
                        attr: {
                            scrolling: "auto"
                        }
                    }
                }
            });
        });

        btnCerrarOrden.click(function () {
            var FolioActual = pnlDatos.find("#Folio").val();
            swal({
                title: "Confirmar",
                text: "Deseas cerrar la Orden de Compra?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    if (!seParte) {

                        HoldOn.open({theme: "sk-bounce", message: "POR FAVOR ESPERE..."});
                        $.post(master_url + 'onCerrarOrden', {ID: temp}).done(function (data, x, jq) {
                            btnCancelar.addClass('d-none');
                            btnCerrarOrden.addClass('d-none');
                            btnImprimir.removeClass('d-none');
                            pnlDatosDetalle.find('#ControlesDetalle').addClass('d-none');
                            HoldOn.close();
                            Compras.ajax.reload();
                            btnImprimir.trigger('click');
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        });

                    } else {//Else de si se parte en dos o no
                        HoldOn.open({theme: "sk-bounce", message: "POR FAVOR ESPERE..."});
                        //Para encabezado nuevo de TP 2
                        $.getJSON(master_url + 'getOrdenCompraByID', {ID: temp}).done(function (dataEncabezado) {
                            var enc = dataEncabezado[0];
                            var frm = new FormData();
                            $.when($.getJSON(master_url + 'getFolio', {tp: '2'}).done(function (data, x, jq) {
                                if (data.length > 0) {
                                    folioNuevo = $.isNumeric(data[0].Folio) ? parseInt(data[0].Folio) + 1 : 1;
                                } else {
                                    folioNuevo = 1;
                                }
                            })).done(function (x) {
                                frm.append('Tp', 2);
                                frm.append('Ano', enc.Ano);
                                frm.append('Proveedor', enc.Proveedor);
                                frm.append('Tipo', enc.Tipo);
                                frm.append('Folio', folioNuevo);
                                frm.append('FechaOrden', enc.FechaOrden);
                                frm.append('FechaCaptura', enc.FechaCaptura);
                                frm.append('FechaEntrega', enc.FechaEntrega);
                                frm.append('ConsignarA', enc.ConsignarA);
                                frm.append('Sem', enc.Sem);
                                frm.append('Maq', enc.Maq);
                                frm.append('Ano', enc.Ano);
                                frm.append('Observaciones', enc.Observaciones);
                                frm.append('Estatus', 'CERRADA');
                                //Inserta nuevo encabezado y regresa el ID para agregarlo en el detalle del nuevo encabezado
                                //Partiendo del anterior encabezado y actualizando el movimiento anterior
                                $.ajax({
                                    url: master_url + 'onAgregarCompraPartida',
                                    type: "POST",
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: frm
                                }).done(function (data, x, jq) {
                                    nuevoTemp = data; //ID nuevo Encabezado
                                    //ACtualizamos estatus del encabezado anterior a CERRADO y TP siempre 1
                                    $.post(master_url + 'onCerrarOrdenAnterior', {ID: temp}).done(function (data, x, jq) {
                                        $.getJSON(master_url + 'getDetalleParaSepararByID', {ID: temp}).done(function (data) {
                                            $.each(data, function (k, v) {
                                                var Precio = v.Precio;
                                                var Articulo = v.Articulo;
                                                var NuevaCantidadNueva = v.Cantidad * PorRemision;
                                                var NuevaSubtotalNueva = NuevaCantidadNueva * Precio;
                                                //Para modificar anterior y restarle el porcentaje
                                                var NuevaCantidadAnterior = v.Cantidad * PorFactura;
                                                var NuevaSubtotalAnterior = NuevaCantidadAnterior * Precio;

                                                //insert OC Detalle
                                                var detalle = {
                                                    OrdenCompra: nuevoTemp,
                                                    Articulo: Articulo,
                                                    Cantidad: NuevaCantidadNueva,
                                                    Precio: Precio,
                                                    SubTotal: NuevaSubtotalNueva
                                                };
                                                //update actual o.c
                                                $.post(master_url + 'onAgregarDetalle', detalle).done(function (data) {
                                                    var detalleAnterior = {
                                                        ID: v.ID,
                                                        Cantidad: NuevaCantidadAnterior,
                                                        SubTotal: NuevaSubtotalAnterior
                                                    };
                                                    $.post(master_url + 'onModificarDetalle', detalleAnterior).done(function (data) {

                                                        HoldOn.close();
                                                        swal({
                                                            title: 'Importante',
                                                            text: 'Se ha cerrado la compra TP 1 con el FOLIO: ' + FolioActual,
                                                            icon: 'success'
                                                        }).then((value) => {
                                                            swal({
                                                                title: 'Importante',
                                                                text: 'Se ha cerrado la compra TP 2 con el FOLIO: ' + folioNuevo,
                                                                icon: 'success'
                                                            }).then((value) => {
                                                                btnCancelar.addClass('d-none');
                                                                btnCerrarOrden.addClass('d-none');
                                                                btnImprimir.removeClass('d-none');
                                                                pnlDatosDetalle.find('#ControlesDetalle').addClass('d-none');
                                                                ComprasDetalle.ajax.reload();
                                                                Compras.ajax.reload();
                                                                HoldOn.close();
                                                                btnImprimir.trigger('click');
                                                            });
                                                        });
                                                    }).fail(function (x, y, z) {
                                                        console.log(x, y, z);
                                                    });

                                                }).fail(function (x, y, z) {
                                                    console.log(x, y, z);
                                                });
                                            });
                                        }).fail(function (x) {
                                            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
                                            console.log(x.responseText);
                                        });
                                    }).fail(function (x, y, z) {
                                        console.log(x, y, z);
                                    }); //CERRAR ORDEN ANTERIOR
                                }).fail(function (x, y, z) {
                                    console.log(x, y, z);
                                });//AGREGA NUEVO ENCABEZADO
                            });
                        }).fail(function (x) {
                            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
                            console.log(x.responseText);
                        });//OBTENER COMPRA ACTUAL
                    }//IF DE PARTIR EN DOS
                }// Cierra IF de aceptar
            });//Cierra SWALL
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
            "dom": 'Bfrtip',
            buttons: buttons,
            "ajax": {
                "url": master_url + 'getRecords',
                "dataSrc": ""
            },
            "columns": [
                {"data": "ID"}, {"data": "Tp"}, {"data": "Tipo"},
                {"data": "Folio"}, {"data": "Proveedor"}, {"data": "Fecha"},
                {"data": "Ano"}, {"data": "Sem"}, {"data": "Maq"},
                {"data": "Estatus"}
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
                [1, 'desc'], [3, 'desc']/*Folio*/
            ],
            "createdRow": function (row, data, index) {
                $.each($(row).find("td"), function (k, v) {
                    var c = $(v);
                    var index = parseInt(k);
                    switch (index) {
                        case 2:
                            /*FOLIO*/
                            c.addClass('text-info text-strong');
                            break;
                        case 5:
                            /*ANO*/
                            c.addClass('text-info text-strong');
                            break;
                        case 6:
                            /*SEM*/
                            c.addClass('text-info text-strong');
                            break;
                        case 7:
                            /*MAQ*/
                            c.addClass('text-info text-strong');
                            break;
                    }
                });
            },
            initComplete: function (a, b) {
                HoldOn.close();
            }
        });

        $('#tblCompras tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Buscar por ' + title + '" class="form-control form-control-sm" style="width: 100%;"/>');
        });

        Compras.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that.search(this.value).draw();
                }
            });
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
            nuevoTemp = 0;

            $.getJSON(master_url + 'getOrdenCompraByID', {ID: temp}).done(function (data) {
                pnlDatos.find("input").val("");
                $.each(pnlDatos.find("select"), function (k, v) {
                    pnlDatos.find("select")[k].selectize.clear(true);
                });
                $.each(pnlDatosDetalle.find("select"), function (k, v) {
                    pnlDatosDetalle.find("select")[k].selectize.clear(true);
                });


                pnlTablero.addClass("d-none");
                pnlDatos.removeClass('d-none');
                pnlDatosDetalle.removeClass('d-none');


                pnlDatos.find('input').attr('readonly', true);
                $.each(pnlDatos.find("select"), function (k, v) {
                    pnlDatos.find("select")[k].selectize.disable();
                });
                estatus = data[0].Estatus;
                if (estatus === 'CERRADA') {
                    btnCancelar.addClass('d-none');
                    btnCerrarOrden.addClass('d-none');
                    btnImprimir.removeClass('d-none');
                    pnlDatosDetalle.find('#ControlesDetalle').addClass('d-none');
                } else {
                    btnCancelar.removeClass('d-none');
                    btnCerrarOrden.removeClass('d-none');
                    btnImprimir.addClass('d-none');
                }

                //Obtener proveedor en base al tp
                $.when($.getJSON(master_url + 'getProveedores').done(function (data) {
                    pnlDatos.find("#Proveedor")[0].selectize.clear(true);
                    pnlDatos.find("#Proveedor")[0].selectize.clearOptions();
                    $.each(data, function (k, v) {
                        pnlDatos.find("#Proveedor")[0].selectize.addOption({text: (data[0].Tp === 1) ? v.ProveedorF : v.ProveedorI, value: v.ID});
                    });
                })).done(function (x) {
                    $.each(data[0], function (k, v) {
                        pnlDatos.find("[name='" + k + "']").val(v);
                        if (pnlDatos.find("[name='" + k + "']").is('select')) {
                            pnlDatos.find("[name='" + k + "']")[0].selectize.addItem(v, true);
                        }
                    });
                    getCabecerosByProveedor(data[0].Proveedor);
                    getPorcentajesCompraByProveedor(data[0].Proveedor);
                });

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
    var estatus;
    var PorRemision = 0;
    var PorFactura = 0;
    var seParte = false;
    var tpParte = 0;
    var folioNuevo = 0;

    function getArticulosCabecero(Cabecero, Proveedor) {
        HoldOn.open({theme: 'sk-bounce', message: 'CARGANDO DATOS...'});
        $.ajax({
            url: master_url + 'getArticulosCabecero',
            type: "POST",
            dataType: "JSON",
            data: {
                ArticuloCBZ: Cabecero,
                Proveedor: Proveedor
            }
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                //Nos traemos el arreglo de articulos del encabezado
                $.each(data[0], function (k, v) {
                    var Can = k.replace("A", "C");
                    if (v === null || v === 'undefined' || v === '' || v === undefined || parseInt(v) === 0) {
                        pnlDatosDetalle.find('#rCantidades').find("[name='" + Can + "']").prop('disabled', true);
                    } else {
                        pnlDatosDetalle.find('#rCantidades').find("[name='" + Can + "']").prop('disabled', false);
                        pnlDatosDetalle.find('#tblTallas').find("[name='" + k + "']").val(v);
                    }
                });
            } else {
                pnlDatosDetalle.find('#tblTallas').find("input").val("");
                pnlDatosDetalle.find('#rCantidades').find("input").prop('disabled', true);
            }
            HoldOn.close();
            pnlDatosDetalle.find('#rCantidades').find('#C1').focus();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }

    function getPorcentajesCompraByProveedor(proveedor) {
        $.getJSON(master_url + 'getPorcentajesCompraByProveedor', {Proveedor: proveedor}).done(function (data) {
            if (data.length > 0) {
                PorRemision = parseFloat(data[0].PorRemision);
                PorFactura = parseFloat(data[0].PorFactura);
                if (PorRemision === 0 && PorFactura === 0) {
                    seParte = false;
                } else if (PorRemision === 1 || PorFactura === 1) {
                    seParte = false;
                } else {
                    seParte = true;
                    if (parseFloat(PorFactura) >= parseFloat(PorRemision)) {
                        tpParte = 1;
                    } else {
                        tpParte = 2;
                    }
                }
            } else {
                seParte = false;
            }
        }).fail(function (x) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        });
    }
    function getCabecerosByProveedor(proveedor) {
        $.getJSON(master_url + 'getCabecerosByProveedor', {Proveedor: proveedor}).done(function (data) {
            if (data.length > 0) {
                $.each(data, function (k, v) {
                    pnlDatosDetalle.find("#Articulo")[0].selectize.addOption({text: v.Articulo, value: v.CLAVE});
                });
            } else {
                swal({
                    title: "ATENCIÓN",
                    text: "NO HAY CABECEROS REGISTRADOS PARA ESTE PROVEEDOR",
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
                            pnlDatos.find("#Proveedor")[0].selectize.clear(true);
                            pnlDatos.find("#Proveedor")[0].selectize.focus();
                            break;
                    }
                });

            }
        }).fail(function (x) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        });

    }
    function getPrecioSerieArticulosCabecero(Articulo) {
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
    function getProveedores(tp) {
        pnlDatos.find("#Proveedor")[0].selectize.clear(true);
        pnlDatos.find("#Proveedor")[0].selectize.clearOptions();
        $.getJSON(master_url + 'getProveedores').done(function (data) {
            $.each(data, function (k, v) {
                pnlDatos.find("#Proveedor")[0].selectize.addOption({text: (tp === 1) ? v.ProveedorF : v.ProveedorI, value: v.ID});
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
            order: [[1, 'asc']],
            "initComplete": function (x, y) {
                HoldOn.close();
            }
        });

    }
    var cant_aux = 0;
    var total;
    function onAgregarDetalle(IDX) {
        HoldOn.open({theme: 'sk-bounce', message: 'CARGANDO DATOS...'});
        var table = pnlDatosDetalle.find('#tblTallas');
        var arts = pnlDatosDetalle.find("#tblTallas > tbody > tr").eq(0);
        var precios = pnlDatosDetalle.find("#tblTallas > tbody > tr").eq(1);

        $.when($.each(table.find("input.numbersOnly:enabled"), function (k, v) {
            if (parseFloat($(v).val()) > 0) {
                var precio = precios.find('td').eq($(this).parent().index()).find("input").val();
                var articulo = arts.find('td').eq($(this).parent().index()).find("input").val();
                var articuloAnt = arts.find('td').eq($(this).parent().index() - 1).find("input").val();
                var cantidad = parseFloat($(v).val());

                if (articuloAnt === undefined) {
                    cant_aux = cantidad;
                    total = precio * cant_aux;
                    var detalle = {
                        OrdenCompra: IDX,
                        Articulo: articulo,
                        Cantidad: cant_aux,
                        Precio: precio,
                        SubTotal: parseFloat(total)
                    };

                    $.post(master_url + 'onAgregarDetalle', detalle).done(function (data) {
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    });
                } else if (articulo === articuloAnt) {
                    cant_aux += cantidad;
                    total = cant_aux * precio;
                    var detalle = {
                        OrdenCompra: IDX,
                        Articulo: articulo,
                        Cantidad: cant_aux,
                        SubTotal: parseFloat(total)
                    };
                    $.post(master_url + 'onModificarDetalleByClave', detalle).done(function (data) {
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    });

                } else if (articuloAnt !== articulo) {
                    cant_aux = cantidad;
                    total = precio * cant_aux;
                    var detalle = {
                        OrdenCompra: IDX,
                        Articulo: articulo,
                        Cantidad: cant_aux,
                        Precio: precio,
                        SubTotal: parseFloat(total)
                    };
                    $.post(master_url + 'onAgregarDetalle', detalle).done(function (data) {
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    });
                }
            }
        })).then(function (data, textStatus, jqXHR) {
            if (nuevo) {
                getDetalleByID(IDX);
                nuevo = false;
            } else {
                ComprasDetalle.ajax.reload();
            }

            pnlDatosDetalle.find("input").val('');
            pnlDatosDetalle.find("[name='Articulo']")[0].selectize.clear(true);
            pnlDatosDetalle.find("[name='Articulo']")[0].selectize.focus();
            HoldOn.close();
        });
    }
    function onEliminarDetalleByID(IDX) {
        if (estatus === 'CERRADA') {
            swal({
                title: "COMPRA CERRADA",
                text: "NO SE PUEDE ELIMINAR ARTÍCULO",
                icon: "error",
                closeOnClickOutside: false,
                closeOnEsc: false,
                buttons: false,
                timer: 2000
            });
        } else {
            swal({
                buttons: ["Cancelar", "Aceptar"],
                title: 'Estas Seguro?',
                text: "Esta acción no se puede revertir",
                icon: "warning",
                closeOnEsc: false,
                closeOnClickOutside: false
            }).then((action) => {
                if (action) {
                    $.ajax({
                        url: master_url + 'onEliminarDetalleByID',
                        type: "POST",
                        data: {
                            ID: IDX
                        }
                    }).done(function (data, x, jq) {
                        ComprasDetalle.ajax.reload();
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                }
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

    table tbody tr:hover {
        background-color: #FFF;
        color: #000 !important;
    }
</style>

