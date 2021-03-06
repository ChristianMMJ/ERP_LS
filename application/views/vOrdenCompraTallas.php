<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-body ">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Órdenes de Compra (PLANTAS, SUELAS, ENTRESUELAS)</legend>
            </div>
            <div class="col-12 col-sm-6 col-md-6 animated bounceInLeft" align="right" id="Acciones">
                <button type="button" class="btn btn-primary btn-sm " id="btnBuscar" >
                    <span class="fa fa-search" ></span> BUSCAR O.C.
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

            </div>
            <div class="col-12 col-sm-6 col-md-6 d-none animated flipInX" id="Busqueda">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <input type="text" class="form-control form-control-sm numbersOnly" maxlength="1" id="TpB" placeholder="Tp">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control form-control-sm numbersOnly" id="FolioB" placeholder="Folio">
                        </div>
                        <div class="col-4 text-right">
                            <button type="button" id="btnAceptarBusqueda" class="btn btn-primary btn-sm ">
                                <span class="fa fa-check"></span> ACEPTAR
                            </button>
                            <button type="button" id="btnCancelarBusqueda" class="btn btn-secondary btn-sm " data-toggle="tooltip" data-placement="top" title="Cancelar Busqueda">
                                <span class="fa fa-arrow-left"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-block mt-4" id="pnlDatos">
            <form id="frmNuevo">

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
                        <input type="text" class="form-control form-control-sm numbersOnly" maxlength="3" id="Maq" name="Maq" required="">
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
        <div class="card-block mt-4" id="pnlDatosDetalle" >
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
                                </tr>
                                <tr class="rCapturaCantidades" id="rCantidades">
                                    <td class="font-weight-bold">Cant.</td>
                                    <?php
                                    for ($index = 1; $index < 21; $index++) {
                                        print '<td><input type="text" style="width: 55px;" id="C' . $index . '" class="form-control form-control-sm numbersOnly " name="C' . $index . '" ></td>';
                                    }
                                    ?>
                                    <td>
                                        <button type="button" id="btnAgregar" class="btn btn-primary btn-sm d-sm-block" data-toggle="tooltip" data-placement="right" title="Agregar">
                                            <span class="fa fa-plus"></span> AGREGAR
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm d-none" id="btnCerrarOrden">
                                            <i class="fa fa-money-bill"></i> CERRAR ORDEN
                                        </button>
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
</div>
<script>
    var master_url = base_url + 'index.php/OrdenCompraTallas/';
    var Compras;
    var btnAgregar = $("#btnAgregar");
    var pnlTablero = $("#pnlTablero"), pnlDatos = $("#pnlDatos"), pnlDatosDetalle = $("#pnlDatosDetalle");
    var nuevo = false;
    var tblComprasDetalle = $("#tblComprasDetalle"), ComprasDetalle;
    var btnRegresar = pnlTablero.find("#btnRegresar");
    var btnCerrarOrden = pnlTablero.find('#btnCerrarOrden');
    var btnCancelar = pnlTablero.find('#btnCancelar');
    var btnImprimir = pnlTablero.find('#btnImprimir');
    var btnVerProveedores = pnlTablero.find('#btnVerProveedores');
    var btnVerArticulos = pnlTablero.find('#btnVerArticulos');


    /*Busqueda*/
    var btnBuscar = $('#btnBuscar');
    var btnAceptarBusqueda = $('#btnAceptarBusqueda');
    var btnCancelarBusqueda = $('#btnCancelarBusqueda');

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
            pnlDatos.find("#Sem").trigger('change');
        });

        pnlDatos.find("#Maq").change(function () {
            onComprobarMaquilas($(this));
            pnlDatos.find("#Sem").trigger('change');
        });

        pnlDatos.find("#Sem").change(function () {
            var ano = pnlDatos.find("#Ano");
            var maq = pnlDatos.find("#Maq");
            onComprobarSemanasProduccion($(this), ano.val(), maq.val());
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
        btnBuscar.click(function () {
            pnlTablero.find('#Acciones').addClass('d-none');
            pnlTablero.find('#Busqueda').removeClass('d-none');
            pnlTablero.find('#Busqueda').find('#TpB').focus();
        });

        btnCancelarBusqueda.click(function () {
            pnlTablero.find('#Acciones').removeClass('d-none');
            pnlTablero.find('#Busqueda').addClass('d-none');
            pnlTablero.find('#Busqueda').find('input').val('');
        });

        btnAceptarBusqueda.click(function () {
            var TpB = pnlTablero.find('#Busqueda').find('#TpB').val();
            var FolioB = pnlTablero.find('#Busqueda').find('#FolioB').val();
            $.getJSON(master_url + 'getOrdenCompraByTpFolio', {
                Tp: TpB,
                Folio: FolioB
            }).done(function (data) {
                if (data.length > 0) {


                    //EL DOCUMENTO SOLO PUEDE SER TIPO 80
                    if (data[0].Tipo === '80') {
                        //NOS TRAEMOS LOS DATOS DE LA ORDEN DE COMPRA YA CAPTURADA EN BORRADOR Y BRINCAMOS EL FOCO A LOS ARTICULOS
                        if (data[0].Estatus === 'BORRADOR') {

                            //Obtener Proveedores y llenar campos de toda la orden
                            pnlDatos.find("#Proveedor")[0].selectize.clear(true);
                            pnlDatos.find("#Proveedor")[0].selectize.clearOptions();
                            $.when($.getJSON(master_url + 'getProveedores').done(function (data) {
                                $.each(data, function (k, v) {
                                    pnlDatos.find("#Proveedor")[0].selectize.addOption({text: (parseInt(TpB) === 1) ? v.ProveedorF : v.ProveedorI, value: v.ID});
                                });
                            })).done(function (x) {
                                $.each(data[0], function (k, v) {
                                    pnlDatos.find("[name='" + k + "']").val(v);
                                    if (pnlDatos.find("[name='" + k + "']").is('select')) {
                                        pnlDatos.find("[name='" + k + "']")[0].selectize.addItem(v, true);
                                    }
                                });
                            });

                            //Obtener Articulos del proveedor y el tipo
                            $.getJSON(master_url + 'getArticuloByDeptoByProveedor', {Departamento: data[0].Tipo, Proveedor: data[0].Proveedor}).done(function (data) {
                                if (data.length > 0) {
                                    $.each(data, function (k, v) {
                                        pnlDatosDetalle.find("#Articulo")[0].selectize.addOption({text: v.Articulo, value: v.CLAVE});
                                    });
                                }
                            });
                            //Verificamos el proveedor para saber si partimos la orden en base al %
                            getPorcentajesCompraByProveedor(data[0].Proveedor);
                            //Nos traemos el detalle
                            getDetalleByID(TpB, FolioB);
                            //Acciones secundarias previas a la captura
                            pnlTablero.find('#Acciones').removeClass('d-none');
                            pnlTablero.find('#Busqueda').addClass('d-none');
                            pnlTablero.find('#Busqueda').find('input').val('');
                            pnlDatos.find('input').attr('readonly', true);
                            $.each(pnlDatos.find("select"), function (k, v) {
                                pnlDatos.find("select")[k].selectize.disable();
                            });
                            btnCancelar.removeClass('d-none');
                            btnCerrarOrden.removeClass('d-none');
                            //Seteamos el foco en articulo para continuar capturando
                            pnlDatosDetalle.find("#Articulo")[0].selectize.focus();



                        } else { //SI LA ORDEN DE COMPRA YA EXISTE Y ESTATUS CONCLUIDA SOLO MOSTRAMOS AVISO DE QUE YA ESTA CERRADA
                            swal({
                                title: "ATENCIÓN",
                                text: "ORDEN DE COMPRA ACTIVA, PENDIENTE O RECIBIDA",
                                icon: "warning"
                            }).then((value) => {
                                pnlTablero.find('#Busqueda').find('input').val('');
                                pnlTablero.find('#Busqueda').find('#TpB').focus();
                            });
                        }
                    } else {//EL DOCUMENTO ES TIPO 10 O 90
                        swal({
                            title: "ATENCIÓN",
                            text: "ORDEN DE COMPRA SÓLO PUEDE SER DEL TIPO 80",
                            icon: "warning"
                        }).then((value) => {
                            pnlTablero.find('#Busqueda').find('input').val('');
                            pnlTablero.find('#Busqueda').find('#TpB').focus();
                        });
                    }


                } else {//EL DOCUMENTO NO EXISTE
                    swal({
                        title: "ATENCIÓN",
                        text: "ORDEN DE COMPRA INEXISTENTE",
                        icon: "warning"
                    }).then((value) => {
                        pnlTablero.find('#Busqueda').find('input').val('');
                        pnlTablero.find('#Busqueda').find('#TpB').focus();
                    });
                }
            }).fail(function (x, y, z) {
                swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
                console.log(x.responseText);
            });
        });

        btnImprimir.click(function () {
            //HoldOn.open({theme: 'sk-bounce', message: 'GENERANDO REPORTE...'});
            $.post(master_url + 'onImprimirOrdenCompra', {movs: JSON.stringify(movs)}).done(function (data, x, jq) {
                if (data.length > 0) {

                    $.fancybox.open({
                        src: data,
                        type: 'iframe',
                        opts: {
                            afterShow: function (instance, current) {
                                console.info('done!');
                                init();
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
            var tp = pnlDatos.find("#Tp").val();
            var folio = pnlDatos.find("#Folio").val();
            if (tp !== 0 && tp !== undefined && tp > 0) {
                if (folio !== 0 && folio !== undefined && folio > 0) {
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
                            $.post(master_url + 'onCancelar', {Tp: tp, Folio: folio}).done(function (data, x, jq) {
                                init();
                            }).fail(function (x, y, z) {
                                console.log(x, y, z);
                            }).always(function () {
                                HoldOn.close();
                            });
                        }
                    });
                } else {
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE CAPTURAR UN FOLIO', 'danger');
                }
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE CAPTURAR UN TP', 'danger');
            }
        });

        btnAgregar.click(function () {
            isValid('pnlDatos');
            if (valido) {
                //AgregaDetalle
                isValid('pnlDatosDetalle');
                if (valido) {
                    onAgregarDetalle();
                }
            } else {
                swal('ATENCIÓN', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'error');
            }
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
            var tpActual = pnlDatos.find("#Tp").val();
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
                        $.post(master_url + 'onCerrarOrden', {Tp: tpActual, Folio: FolioActual}).done(function (data, x, jq) {
                            btnCancelar.addClass('d-none');
                            btnCerrarOrden.addClass('d-none');
                            btnImprimir.removeClass('d-none');
                            pnlDatosDetalle.find('#ControlesDetalle').addClass('d-none');
                            //Agregamos al arreglo para poder imprimir el reporte
                            movs.push({
                                Tp: tpActual,
                                Folio: FolioActual
                            });
                            HoldOn.close();
                            btnImprimir.trigger('click');
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        });

                    } else {//Else de si se parte en dos o no
                        HoldOn.open({theme: "sk-bounce", message: "POR FAVOR ESPERE..."});
                        //Agregamos el mov para el reporte
                        movs.push({
                            Tp: tpActual,
                            Folio: FolioActual
                        });

                        //Para encabezado nuevo de TP 2
                        $.getJSON(master_url + 'getOrdenCompraByTpFolio', {Tp: tpActual, Folio: FolioActual}).done(function (dataEncabezado) {
                            var enc = dataEncabezado[0];
                            var tpNuevo = (parseInt(tpActual) > 1) ? '1' : '2';

                            $.when($.getJSON(master_url + 'getFolio', {tp: tpNuevo}).done(function (data, x, jq) {

                                if (data.length > 0) {
                                    folioNuevo = $.isNumeric(data[0].Folio) ? parseInt(data[0].Folio) + 1 : 1;
                                } else {
                                    folioNuevo = 1;
                                }
                            })).done(function (x) {
                                movs.push({
                                    Tp: tpNuevo,
                                    Folio: folioNuevo
                                });
                                //ACtualizamos estatus del encabezado anterior a ACTIVA
                                $.post(master_url + 'onCerrarOrdenAnterior', {Tp: tpActual, Folio: FolioActual}).done(function (data, x, jq) {
                                    //Partiendo del anterior encabezado y actualizando el movimiento anterior
                                    $.getJSON(master_url + 'getDetalleParaSepararByID', {Tp: tpActual, Folio: FolioActual}).done(function (data) {
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
                                                Tp: tpNuevo,
                                                Folio: folioNuevo,
                                                Tipo: enc.Tipo,
                                                Proveedor: enc.Proveedor,
                                                FechaOrden: enc.FechaOrden,
                                                Maq: enc.Maq,
                                                Ano: enc.Ano,
                                                Sem: enc.Sem,
                                                FechaEntrega: enc.FechaEntrega,
                                                ConsignarA: enc.ConsignarA,
                                                Observaciones: enc.Observaciones,
                                                Articulo: Articulo,
                                                Cantidad: NuevaCantidadNueva,
                                                Precio: Precio,
                                                SubTotal: NuevaSubtotalNueva,
                                                Estatus: 'ACTIVA'
                                            };
                                            //Inserta nuevos registros
                                            $.post(master_url + 'onAgregarDetalle', detalle).done(function (data) {
                                                var detalleAnterior = {
                                                    ID: v.ID,
                                                    Cantidad: NuevaCantidadAnterior,
                                                    SubTotal: NuevaSubtotalAnterior
                                                };

                                                //update actual o.c con las nuevas cantidades
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
        nuevo = true;
        movs = [];
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
                if (parseInt($(v).val()) > 98) {
                    swal({
                        title: "ATENCIÓN",
                        text: "LA MAQUILA NO ES VALIDA",
                        icon: "warning"
                    }).then((value) => {
                        $(v).val('').focus();
                    });
                } else {
                    pnlDatos.find('#ConsignarA').val(data[0].Direccion);
                }

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
    function onComprobarSemanasProduccion(v, ano, maq) {
        if ($(v).val() !== '') {
            $.getJSON(master_url + 'onComprobarSemanasProduccion', {Clave: $(v).val(), Ano: ano}).done(function (data) {
                if (data.length > 0) {

                    $.getJSON(master_url + 'onVerificarSemanaProdCerrada', {
                        Ano: ano,
                        Maq: maq,
                        Sem: $(v).val()
                    }).done(function (data) {
                        if (data.length > 0) {
                            if (data[0].Estatus === 'CERRADA') {//CERRADA
                                swal({
                                    title: "ATENCIÓN",
                                    text: "LA SEMANA YA ESTA CERRADA",
                                    icon: "warning"
                                }).then((value) => {
                                    $(v).val('').focus();
                                });
                            } else {//ABIERTA
                                onComprobarSemanaProdCerradaXDepartamento(ano, maq, v);
                            }
                        } else {//ABIERTA
                            onComprobarSemanaProdCerradaXDepartamento(ano, maq, v);
                        }
                    });
                } else {
                    swal({
                        title: "ATENCIÓN",
                        text: "LA SEMANA " + $(v).val() + " DEL " + ano + " " + "NO EXISTE",
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
    }
    function onComprobarSemanaProdCerradaXDepartamento(ano, maq, v) {
        $.getJSON(master_url + 'onVerificarSemanaProdDepartamentoCerrada', {
            Ano: ano,
            Maq: maq,
            Sem: $(v).val(),
            Departamento: '80'
        }).done(function (data) {
            if (data.length > 0) {
                if (data[0].Estatus === 'CERRADA') {//CERRADA X DEPTO
                    swal({
                        title: "ATENCIÓN",
                        text: "EL DEPARTAMENTO 80 DE ESTA SEMANA YA ESTA CERRADO",
                        icon: "warning"
                    }).then((value) => {
                        $(v).val('').focus();
                    });
                }
            }
        });
    }
    /*Detalle*/
    function getDetalleByID(tp, folio) {
        if ($.fn.DataTable.isDataTable('#tblComprasDetalle')) {
            tblComprasDetalle.DataTable().destroy();
        }
        ComprasDetalle = tblComprasDetalle.DataTable({
            "ajax": {
                "url": master_url + 'getDetalleByID',
                "dataSrc": "",
                "type": 'POST',
                "data": {
                    "Tp": tp,
                    "Folio": folio
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
    function onAgregarDetalle() {
        HoldOn.open({theme: 'sk-bounce', message: 'CARGANDO DATOS...'});
        var table = pnlDatosDetalle.find('#tblTallas');
        var arts = pnlDatosDetalle.find("#tblTallas > tbody > tr").eq(0);
        var precios = pnlDatosDetalle.find("#tblTallas > tbody > tr").eq(1);

        /*Encabezado*/
        var tp = pnlDatos.find("#Tp").val();
        var folio = pnlDatos.find("#Folio").val();
        var tipo = pnlDatos.find("#Tipo").val();
        var prov = pnlDatos.find("#Proveedor").val();
        var fecha = pnlDatos.find("#FechaOrden").val();
        var maq = pnlDatos.find("#Maq").val();
        var ano = pnlDatos.find("#Ano").val();
        var sem = pnlDatos.find("#Sem").val();
        var fechaEnt = pnlDatos.find("#FechaEntrega").val();
        var consignarA = pnlDatos.find("#ConsignarA").val();
        var observaciones = pnlDatos.find("#Observaciones").val();

        $.when($.each(table.find("input.numbersOnly:enabled"), function (k, v) {
            if (parseFloat($(v).val()) > 0) {
                var precio = precios.find('td').eq($(this).parent().index()).find("input").val();
                var articulo = arts.find('td').eq($(this).parent().index()).find("input").val();
                //var articuloAnt = arts.find('td').eq($(this).parent().index() - 1).find("input").val();
                var cantidad = parseFloat($(v).val());
                var detalle = {
                    Tp: tp,
                    Folio: folio,
                    Tipo: tipo,
                    Proveedor: prov,
                    FechaOrden: fecha,
                    Maq: maq,
                    Ano: ano,
                    Sem: sem,
                    FechaEntrega: fechaEnt,
                    ConsignarA: consignarA,
                    Observaciones: observaciones,
                    Articulo: articulo,
                    Cantidad: cantidad,
                    Precio: precio,
                    SubTotal: parseFloat(precio * cantidad),
                    Estatus: 'BORRADOR'
                };

                $.post(master_url + 'onAgregarDetalleTemp', detalle).done(function (data) {
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                });

            }
        })).then(function (data, textStatus, jqXHR) {

            $.post(master_url + 'onInsertarDetalleOptimizado', {Tp: tp, Folio: folio}).done(function (data) {
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            });

            if (nuevo) {
                getDetalleByID(tp, folio);
                nuevo = false;
            } else {
                ComprasDetalle.ajax.reload();
            }

            //Despues de que se guarda
            btnCancelar.removeClass('d-none');
            btnCerrarOrden.removeClass('d-none');
            pnlDatosDetalle.find("input").val('');
            pnlDatosDetalle.find("[name='Articulo']")[0].selectize.clear(true);
            pnlDatosDetalle.find("[name='Articulo']")[0].selectize.focus();
            //Deshabilida encabezado
            pnlDatos.find('input').attr('readonly', true);
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.disable();
            });
            HoldOn.close();
        });
    }
    function onEliminarDetalleByID(IDX) {
        if (estatus === 'ACTIVA') {
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

    #tblTallas tbody tr:hover {
        background-color: #FFF;
        color: #000 !important;
    }
</style>

