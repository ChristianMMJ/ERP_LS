<div class="card border-0 m-3" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Clientes</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div id="Clientes" class="row">
                <table id="tblClientes" class="table table-sm display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Clave</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="d-none animated fadeIn text-dark" id="pnlDatos">
    <form id="frmNuevo">
        <fieldset>
            <!--            PRIMER CONTENEDOR-->
            <div class="card  m-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 float-left">
                            <legend >Clientes</legend>
                        </div>
                        <div class="col-12 col-sm-6 col-md-8" align="right">
                            <button type="button" class="btn btn-primary btn-sm" id="btnCancelar" >
                                <span class="fa fa-arrow-left" ></span> REGRESAR
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="d-none">
                            <input type="text" id="ID" name="ID" class="form-control form-control-sm" >
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                            <label for="Clave" >Clave*</label>
                            <input type="text" class="form-control form-control-sm" id="Clave" name="Clave" maxlength="45"  placeholder="" readonly="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                            <label for="RazonS" >Razon Social*</label>
                            <input type="text" class="form-control form-control-sm" id="RazonS" name="RazonS" maxlength="45"  placeholder=""  required="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                            <label for="NombreP" >Nombre P*</label>
                            <input type="text" class="form-control form-control-sm" id="NombreP" name="NombreP" maxlength="45"  placeholder="" >
                        </div>

                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                            <label for="Sucursal" >Sucursal*</label>
                            <input type="text" class="form-control form-control-sm" id="Sucursal" name="Sucursal" maxlength="45"  placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                            <label for="Direccion" >Direccion*</label>
                            <input type="text" class="form-control form-control-sm" id="Direccion" name="Direccion" maxlength="45"  placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-1">
                            <label for="NoExt" >NoExt*</label>
                            <input type="text" class="form-control form-control-sm" id="NoExt" name="NoExt" maxlength="45"  placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-1">
                            <label for="NoInt" >NoInt*</label>
                            <input type="text" class="form-control form-control-sm" id="NoInt" name="NoInt" maxlength="45"  placeholder="">
                        </div>

                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                            <label for="Colonia" >Colonia*</label>
                            <input type="text" class="form-control form-control-sm" id="Colonia" name="Colonia" maxlength="45"  placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                            <label for="Ciudad" >Ciudad*</label>
                            <input type="text" class="form-control form-control-sm" id="Ciudad" name="Ciudad" maxlength="45"  placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                            <label for="Estado" >Estado*</label>
                            <select class="form-control form-control-sm" id="Estado" name="Estado" maxlength="45"  ></select>
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                            <label for="Pais" >Pais*</label>
                            <select class="form-control form-control-sm" id="Pais" name="Pais" maxlength="45"  ></select>
                        </div>

                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                            <label for="Agente" >Agente*</label>
                            <select class="form-control form-control-sm" id="Agente" name="Agente" maxlength="45"  ></select>
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-1">
                            <label for="TelOficina" >Tel Oficina*</label>
                            <input type="tel" class="form-control form-control-sm" id="TelOficina" name="TelOficina" maxlength="45"  placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-1">
                            <label for="TelPart" >Tel Particular*</label>
                            <input type="tel" class="form-control form-control-sm" id="TelPart" name="TelPart" maxlength="45"  placeholder="">
                        </div>


                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                            <label for="RFC" >RFC*</label>
                            <input type="text" class="form-control form-control-sm" id="RFC" name="RFC" maxlength="45"  placeholder=""  required="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-1">
                            <label for="CodigoPostal" >Código Postal*</label>
                            <input type="text" class="form-control form-control-sm" id="CodigoPostal" name="CodigoPostal" maxlength="45"  placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-1">
                            <label for="LimiteCredito" >Limite de credito*</label>
                            <input type="text" class="form-control form-control-sm" id="LimiteCredito" name="LimiteCredito" maxlength="45"  placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                            <label for="ListaPrecios" >Lista de precios*</label>
                            <select class="form-control form-control-sm" id="ListaPrecios" name="ListaPrecios"  ></select>
                        </div>

                        <div class="col-12 col-sm-4 col-md-3 col-lg-2 col-xl-1">
                            <label for="DiasPlazo" >Dias Plazo*</label>
                            <input type="text" class="form-control form-control-sm numbersOnly" id="DiasPlazo" name="DiasPlazo" maxlength="45"  placeholder=""  required="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-2 col-xl-2">
                            <label for="Transporte" >Transporte*</label>
                            <select class="form-control form-control-sm" id="Transporte" name="Transporte"  ></select>
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="ObservacionesTransporte" >Observaciones transporte*</label>
                            <input type="text" class="form-control form-control-sm" id="ObservacionesTransporte" name="ObservacionesTransporte" maxlength="190"  placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-1">
                            <label for="Descuento" >Descuento*</label>
                            <input type="text" class="form-control form-control-sm numbersOnly" id="Descuento" name="Descuento" maxlength="10"  placeholder="">
                        </div>

                        <div class="col-12 col-sm-4 col-md-3 col-lg-2 col-xl-2">
                            <label for="TipoCliente" >Tipo de cliente*</label>
                            <select class="form-control form-control-sm" id="TipoCliente" name="TipoCliente"  >
                                <option></option>
                                <option value="1">1 May</option>
                                <option value="2">2 Det</option>
                                <option value="3">3 Cata</option>
                            </select>
                        </div>

                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                            <label for="Clasificacion" >Clasificacion*</label>
                            <select class="form-control form-control-sm" id="Clasificacion" name="Clasificacion"  >
                                <option></option>
                                <option value="1">1 Bueno</option>
                                <option value="2">2 Regular</option>
                                <option value="3">3 Malo</option>
                                <option value="4">4 Sin clasificar</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!--            SEGUNDO CONTENEDOR-->
            <div class="card m-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label for="" >Encargado de compras</label>
                            <input type="text" class="form-control form-control-sm" id="EncargadoCompras" name="EncargadoCompras" maxlength="45"  placeholder="">
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label for="" >Gerente general</label>
                            <input type="text" class="form-control form-control-sm" id="GerenteGeneral" name="GerenteGeneral" maxlength="45"  placeholder="">
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label for="" >Encargado de pagos</label>
                            <input type="text" class="form-control form-control-sm" id="EncargadoDePagos" name="EncargadoDePagos" maxlength="45"  placeholder="">
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <label for="PrimerCorreo" >1er Correo*</label>
                            <input type="text" class="form-control form-control-sm" id="PrimerCorreo" name="PrimerCorreo" maxlength="45"  placeholder="">
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <label for="SegundoCorreo" >2do Correo*</label>
                            <input type="text" class="form-control form-control-sm" id="SegundoCorreo" name="SegundoCorreo" maxlength="45"  placeholder="">
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                            <label for="FormaPago" >Forma de pago*</label>
                            <select class="form-control form-control-sm" id="FormaPago" name="FormaPago"  >
                                <option></option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                            <label for="MetodoPago" >Método de pago*</label>
                            <select class="form-control form-control-sm" id="MetodoPago" name="MetodoPago"  >
                                <option></option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                            <label for="Zona" >Zona*</label>
                            <select class="form-control form-control-sm" id="Zona" name="Zona"  >
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <label for="Observaciones" >Observaciones*</label>
                            <input type="text" class="form-control form-control-sm" id="Observaciones" name="Observaciones" maxlength="99"  placeholder="">
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                            <label for="NoCuenta" >No.Cuenta*</label>
                            <input type="text" class="form-control form-control-sm" id="NoCuenta" name="NoCuenta" maxlength="99"  placeholder="">
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                            <label for="Banco" >Banco*</label>
                            <input type="text" class="form-control form-control-sm" id="Banco" name="Banco" maxlength="99"  placeholder="">
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <label for="Grupo" >Grupo*</label>
                            <select class="form-control form-control-sm" id="Grupo" name="Grupo"  >
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <button type="button" class="btn btn-info btn-lg btn-float" id="btnGuardar" data-toggle="tooltip" data-placement="left" title="Guardar">
                        <i class="fa fa-save"></i>
                    </button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<script>
    var master_url = base_url + 'index.php/Clientes/';
    var tblClientes = $('#tblClientes');
    var Clientes;
    var btnNuevo = $("#btnNuevo"), btnCancelar = $("#btnCancelar"), btnGuardar = $("#btnGuardar");
    var pnlTablero = $("#pnlTablero"), pnlDatos = $("#pnlDatos");
    var nuevo = false;

    $(document).ready(function () {
        /*FUNCIONES INICIALES*/
        init();
        handleEnter();

        //Valida RFC
        pnlDatos.find("[name='RFC']").blur(function () {
            var rfc = $(this).val().trim(); // -Elimina los espacios que pueda tener antes o después
            var rfcCorrecto = rfcValido(rfc); //Comprobar RFC
            if (rfcCorrecto) {
            } else {
                pnlDatos.find("[name='RFC']").val("");
            }
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
                        Clientes.ajax.reload();
                        Clientes.clear().draw();
                        pnlDatos.addClass("d-none");
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
                        nuevo = false;
                        Clientes.ajax.reload();
                        pnlDatos.addClass("d-none");
                        pnlTablero.removeClass("d-none");
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
            pnlDatos.removeClass("d-none").find("#Nombre").focus();
            $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
            getID();
        });

        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass("d-none");
            temp = 0;
        });
    });

    //FUNCIONES INICIALES

    function init() {
        getRecords();
        /*INICIALIZAR DETALLE*/
        getEstados();
        getPaises();
        getAgentes();
        getTransportes();
        getZonas();
        getGrupos();
        getFormasDePago();
        getMetodosDePago();
    }

    function getRecords() {
        temp = 0;
        HoldOn.open({
            theme: 'sk-cube',
            message: 'CARGANDO...'
        });
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblClientes')) {
            tblClientes.DataTable().destroy();
        }
        Clientes = tblClientes.DataTable({
            "dom": 'Bfrtip',
            buttons: buttons,
            "ajax": {
                "url": master_url + 'getRecords',
                "dataSrc": ""
            },
            "columns": [
                {"data": "ID"}, {"data": "Clave"}, {"data": "Nombre"}
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
            ],
            initComplete: function (a, b) {
                HoldOn.close();
            }
        });
        $('#tblClientes_filter input[type=search]').focus();
        tblClientes.find('tbody').on('click', 'tr', function () {
            HoldOn.open({
                theme: 'sk-cube',
                message: 'CARGANDO...'
            });
            nuevo = false;
            tblClientes.find("tbody tr").removeClass("success");
            $(this).addClass("success");
            var dtm = Clientes.row(this).data();
            temp = parseInt(dtm.ID);
            $.getJSON(master_url + 'getClienteByID', {ID: temp}).done(function (data) {
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
                pnlTablero.addClass("d-none");
                pnlDatos.removeClass('d-none');
            }).fail(function (x, y, z) {
                swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
                console.log(x.responseText);
            }).always(function () {
                HoldOn.close();
            });
        });
    }

    function getEstados() {
        $.getJSON(master_url + 'getEstados').done(function (data) {
            pnlDatos.find("#Estado")[0].selectize.addOption({text: '--', value: ''});
            $.each(data, function (k, v) {
                pnlDatos.find("#Estado")[0].selectize.addOption({text: v.Estado, value: v.Clave});
            });
        }).fail(function (x) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        }).always(function () {

        });
    }

    function getPaises() {
        $.getJSON(master_url + 'getPaises').done(function (data) {
            pnlDatos.find("#Pais")[0].selectize.addOption({text: '--', value: ''});
            $.each(data, function (k, v) {
                pnlDatos.find("#Pais")[0].selectize.addOption({text: v.Pais, value: v.Clave});
            });
        }).fail(function (x) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        }).always(function () {

        });
    }

    function getAgentes() {
        $.getJSON(master_url + 'getAgentes').done(function (data) {
            pnlDatos.find("#Agente")[0].selectize.addOption({text: '--', value: ''});
            $.each(data, function (k, v) {
                pnlDatos.find("#Agente")[0].selectize.addOption({text: v.Agente, value: v.Clave});
            });
        }).fail(function (x) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        }).always(function () {

        });
    }

    function getTransportes() {
        $.getJSON(master_url + 'getTransportes').done(function (data) {
            pnlDatos.find("#Transporte")[0].selectize.addOption({text: '--', value: ''});
            $.each(data, function (k, v) {
                pnlDatos.find("#Transporte")[0].selectize.addOption({text: v.Transporte, value: v.Clave});
            });
        }).fail(function (x) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        }).always(function () {

        });
    }

    function getZonas() {
        $.getJSON(master_url + 'getZonas').done(function (data) {
            pnlDatos.find("#Zona")[0].selectize.addOption({text: '--', value: ''});
            $.each(data, function (k, v) {
                pnlDatos.find("#Zona")[0].selectize.addOption({text: v.Zona, value: v.Clave});
            });
        }).fail(function (x) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        }).always(function () {

        });
    }

    function getGrupos() {
        $.getJSON(master_url + 'getGrupos').done(function (data) {
            pnlDatos.find("#Grupo")[0].selectize.addOption({text: '--', value: ''});
            $.each(data, function (k, v) {
                pnlDatos.find("#Grupo")[0].selectize.addOption({text: v.Grupo, value: v.Clave});
            });
        }).fail(function (x) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        }).always(function () {

        });
    }

    function getFormasDePago() {
        $.getJSON(master_url + 'getFormasDePago').done(function (data) {
            pnlDatos.find("#FormaPago")[0].selectize.addOption({text: '--', value: ''});
            $.each(data, function (k, v) {
                pnlDatos.find("#FormaPago")[0].selectize.addOption({text: v.FormaDePago, value: v.Clave});
            });
        }).fail(function (x) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        }).always(function () {
        });
    }

    function getMetodosDePago() {
        $.getJSON(master_url + 'getMetodosDePago').done(function (data) {
            pnlDatos.find("#MetodoPago")[0].selectize.addOption({text: '--', value: ''});
            $.each(data, function (k, v) {
                pnlDatos.find("#MetodoPago")[0].selectize.addOption({text: v["Metodo de pago"], value: v.Clave});
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