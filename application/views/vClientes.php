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
            <div class="card  mx-3 mt-3 ">
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
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="Clave" >Clave*</label>
                            <input type="text" class="form-control form-control-sm" id="Clave" name="Clave" maxlength="45" required placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="Nombre" >Nombre*</label>
                            <input type="text" class="form-control form-control-sm" id="Nombre" name="Nombre" maxlength="45" required placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="RazonS" >Razon Social*</label>
                            <input type="text" class="form-control form-control-sm" id="RazonS" name="RazonS" maxlength="45" required placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="NombreP" >Nombre P*</label>
                            <input type="text" class="form-control form-control-sm" id="NombreP" name="NombreP" maxlength="45" required placeholder="">
                        </div>      

                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="Sucursal" >Sucursal*</label>
                            <input type="text" class="form-control form-control-sm" id="Sucursal" name="Sucursal" maxlength="45" required placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="Direccion" >Direccion*</label>
                            <input type="text" class="form-control form-control-sm" id="Direccion" name="Direccion" maxlength="45" required placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="NoExt" >NoExt*</label>
                            <input type="text" class="form-control form-control-sm" id="NoExt" name="NoExt" maxlength="45" required placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="NoInt" >NoInt*</label>
                            <input type="text" class="form-control form-control-sm" id="NoInt" name="NoInt" maxlength="45" required placeholder="">
                        </div>

                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="Colonia" >Colonia*</label>
                            <input type="text" class="form-control form-control-sm" id="Colonia" name="Colonia" maxlength="45" required placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="Ciudad" >Ciudad*</label>
                            <input type="text" class="form-control form-control-sm" id="Ciudad" name="Ciudad" maxlength="45" required placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="Estado" >Estado*</label>
                            <select class="form-control form-control-sm" id="Estado" name="Estado" maxlength="45" required ></select>
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="Pais" >Pais*</label>
                            <select class="form-control form-control-sm" id="Pais" name="Pais" maxlength="45" required ></select>
                        </div>

                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="Agente" >Agente*</label>
                            <select class="form-control form-control-sm" id="Agente" name="Agente" maxlength="45" required ></select>
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="TelOficina" >Tel Oficina*</label>
                            <input type="tel" class="form-control form-control-sm" id="TelOficina" name="TelOficina" maxlength="45" required placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="TelPart" >Tel Particular*</label>
                            <input type="tel" class="form-control form-control-sm" id="TelPart" name="TelPart" maxlength="45" required placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="Fax" >Fax*</label>
                            <input type="text" class="form-control form-control-sm" id="Fax" name="Fax" maxlength="45" required placeholder="">
                        </div>

                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="RFC" >RFC*</label>
                            <input type="text" class="form-control form-control-sm" id="RFC" name="RFC" maxlength="45" required placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="CodigoPostal" >Código Postal*</label>
                            <input type="text" class="form-control form-control-sm" id="CodigoPostal" name="CodigoPostal" maxlength="45" required placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="LimiteCredito" >Limite de credito*</label>
                            <input type="text" class="form-control form-control-sm" id="LimiteCredito" name="LimiteCredito" maxlength="45" required placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <label for="ListaPrecios" >Lista de precios*</label>
                            <select class="form-control form-control-sm" id="ListaPrecios" name="ListaPrecios" required ></select>
                        </div>

                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-4">
                            <label for="DiasPlazo" >Dias Plazo*</label>
                            <input type="text" class="form-control form-control-sm numbersOnly" id="DiasPlazo" name="DiasPlazo" maxlength="45" required placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-4">
                            <label for="Transporte" >Transporte*</label>
                            <select class="form-control form-control-sm" id="Transporte" name="Transporte" required ></select>
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-4">
                            <label for="ObservacionesTransporte" >Observaciones transporte*</label>
                            <input type="text" class="form-control form-control-sm" id="ObservacionesTransporte" name="ObservacionesTransporte" maxlength="190" required placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-4">
                            <label for="Descuento" >Descuento*</label>
                            <input type="text" class="form-control form-control-sm numbersOnly" id="Descuento" name="Descuento" maxlength="10" required placeholder="">
                        </div>

                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-4">
                            <label for="TipoCliente" >Tipo de cliente*</label>
                            <select class="form-control form-control-sm" id="TipoCliente" name="TipoCliente" required >
                                <option></option>
                                <option value="1">1 May</option>
                                <option value="2">2 Det</option>
                                <option value="3">3 Cata</option>
                            </select>
                        </div>

                        <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-4">
                            <label for="Clasificacion" >Clasificacion*</label>
                            <select class="form-control form-control-sm" id="Clasificacion" name="Clasificacion" required >
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
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card ml-3 mt-3 ">
                        <div class="card-body">
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card  mx-3 mt-3 ">
                        <div class="card-body">
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card mr-3 mt-3 ">
                        <div class="card-body">
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </fieldset>
    </form>
</div>
<script>
    var master_url = base_url + 'index.php/Clientes/';
    var tblClientes = $('#tblClientes');
    var Clientes;
    var btnNuevo = $("#btnNuevo"), btnCancelar = $("#btnCancelar"), btnEliminar = $("#btnEliminar"), btnGuardar = $("#btnGuardar");
    var pnlTablero = $("#pnlTablero"), pnlDatos = $("#pnlDatos");
    var nuevo = false;

    $(document).ready(function () {
        /*FUNCIONES INICIALES*/
        init();
        handleEnter();
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
                        console.log(data);
                        pnlDatos.find("[name='ID']").val(data);
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

        btnEliminar.click(function () {
            swal({
                title: "¿Estas seguro?",
                text: "Nota: No se eliminara ninguna Agente que tenga alguna relacion con otro dato dentro del sistema",
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
                            Clientes.clear().draw();
                            pnlDatos.addClass("d-none");
                            pnlTablero.removeClass("d-none");
                            Clientes.ajax.reload();
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
            $.getJSON(master_url + 'getAgenteByID', {ID: temp}).done(function (data) {
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
                /*DETALLE*/
                $.getJSON(master_url + 'getDetalleByID', {ID: dtm.Clave}).done(function (data) {
                    if (data.length > 0) {
                        $.each(data, function (k, v) {
                            ClientesDetalle.row.add([v.ID, v.Agente, v.Dias, v.A, v.Porcentaje, 'A', '<button type="button" class="btn btn-danger" onclick="onEliminarDetalle(this)"><span class="fa fa-trash"></span></button>']).draw(false);
                        });
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
    }
</script>