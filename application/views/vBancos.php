<div class="card m-3 border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-6 col-sm-6 float-left">
                <legend class="float-left">Bancos</legend>
            </div>
            <div class="col-6 col-sm-6  float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="bottom" title="Nuevo"><span class="fa fa-plus"></span><br></button>
            </div>
        </div>
        <div  id="tblRegistros" class="row"></div>
    </div>
</div>
<div class="card m-3 border-0  d-none" id="pnlDatos">
    <div class="card-body text-dark">
        <form id="frmNuevo">
            <fieldset>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 float-left">
                        <legend >Proveedor</legend>
                    </div>
                    <div class="col-12 col-sm-6 col-md-8" align="right">
                        <button type="button" class="btn btn-primary btn-sm" id="btnCancelar" >
                            <span class="fa fa-arrow-left" ></span> REGRESAR
                        </button>
                        <!--                        <button type="button" class="btn btn-danger btn-sm" id="btnEliminar">
                                                    <span class="fa fa-trash fa-1x"></span> ELIMINAR
                                                </button>-->
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="d-none">
                        <input type="text"  name="ID" class="form-control form-control-sm" >
                    </div>
                    <div class="col-12 col-md-4 col-sm-4">
                        <label for="Clave" >Clave*</label>
                        <input type="text" class="form-control form-control-sm disabledForms"  name="Clave" required >
                    </div>
                    <div class="col-12 col-md-4 col-sm-4">
                        <label for="Tp" >Tp*</label>
                        <input type="text" class="form-control form-control-sm"  name="Tp" required>
                    </div>
                    <div class="col-12 col-md-4 col-sm-4">
                        <label for="Nombre" >Nombre*</label>
                        <input type="text" class="form-control form-control-sm"  name="Nombre" required>
                    </div>
                    <div class="col-12 col-md-4 col-sm-4">
                        <label for="Direccion" >Dirección*</label>
                        <input type="text" class="form-control form-control-sm"  name="Direccion" required>
                    </div>
                    <div class="col-12 col-md-4 col-sm-4">
                        <label for="Colonia" >Colonia</label>
                        <input type="text" class="form-control form-control-sm"  name="Colonia" >
                    </div>

                    <div class="col-12 col-md-4 col-sm-4">
                        <label for="Ciudad" >Ciudad</label>
                        <input type="text" class="form-control form-control-sm"  name="Ciudad" >
                    </div>

                    <div class="col-12 col-md-2 col-sm-4">
                        <label for="CP">Código Postal</label>
                        <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="8" id="CP"   name="CP"  >
                    </div>
                    <div class="col-12 col-md-2 col-sm-4">
                        <label for="Telefono">Teléfono</label>
                        <input type="tel" class="form-control form-control-sm"  maxlength="15"  name="Telefono"  >
                    </div>
                    <div class="col-12 col-md-4 col-sm-4">
                        <label for="RFC">RFC*</label>
                        <input type="text" class="form-control form-control-sm"  maxlength="15" id="RFC" name="RFC" required >
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-2 col-sm-2">
                        <label for="NoCuenta">No. Cuenta</label>
                        <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="15"  name="NoCuenta"  >
                    </div>
                    <div class="col-12 col-md-2 col-sm-2">
                        <label for="">Clabe</label>
                        <input type="text" class="form-control form-control-sm" maxlength="20"  name="Clabe"  >
                    </div>
                    <div class="col-12 col-md-2 col-sm-2">
                        <label for="">Cta. Cheques</label>
                        <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="15"  name="CtaCheques"  >
                    </div>

                    <div class="col-12 col-md-2 col-sm-2">
                        <label for="UltCheque">Ult. Cheque</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" maxlength="15"  name="UltCheque"  >
                    </div>

                    <div class="col-12 col-md-2 col-sm-2">
                        <label for="">Cta Contable</label>
                        <input type="text" class="form-control form-control-sm numbersOnly"  name="CtaContable"  >
                    </div>

                </div>
                <div class="row">
                    <div class="col-12 col-md-2 col-sm-2">
                        <label for="">Saldo Inicial</label>
                        <input type="text" class="form-control form-control-sm numbersOnly"  name="SaldoInicial"  >
                    </div>
                    <div class="col-12 col-md-2 col-sm-2">
                        <label for="">Cargos</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" readonly=""  name="Cargos"  >
                    </div>
                    <div class="col-12 col-md-2 col-sm-2">
                        <label for="">Abonos</label>
                        <input type="text" class="form-control form-control-sm numbersOnly"  readonly="" name="Abonos"  >
                    </div>
                    <div class="col-12 col-md-2 col-sm-2">
                        <label for="">Saldo Final</label>
                        <input type="text" class="form-control form-control-sm numbersOnly"  readonly="" name="SaldoFinal"  >
                    </div>

                </div>
                <div class="row pt-2">
                    <div class="col-6 col-md-6 ">
                        <h6 class="text-danger">Los campos con * son obligatorios</h6>
                    </div>
                    <button type="button" class="btn btn-info btn-lg btn-float" id="btnGuardar"  data-toggle="tooltip" data-placement="left" title="Guardar">
                        <i class="fa fa-save"></i>
                    </button>
                    <!--                    <div class="col-6 col-sm-6 col-md-6" align="right">
                                            <button type="button" class="btn btn-raised btn-info btn-sm" id="btnGuardar">
                                                <span class="fa fa-save "></span> GUARDAR
                                            </button>
                                        </div>-->
                </div>
            </fieldset>
        </form>
    </div>
</div>
<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Bancos/';
    var btnNuevo = $("#btnNuevo");
    var pnlDatos = $("#pnlDatos");
    var pnlTablero = $("#pnlTablero");
    //Boton que guarda los datos del formulario
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnEliminar = $("#btnEliminar");
    var nuevo = true;
    $(document).ready(function () {


        validacionSelectPorContenedor(pnlDatos);
        setFocusSelectToInputOnChange('#Estado', '#CP', pnlDatos);

        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass('d-none');
            pnlDatos.find("input").val("");
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            pnlDatos.find("[name='Clave']").removeClass('disabledForms');
            pnlDatos.find("[name='Clave']").addClass('disabledForms');
            pnlDatos.find("[name='Tp']").focus();
            nuevo = true;
            getUltimoRegistro();
        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass('d-none');
        });
        //Evento clic del boton confirmar borrar
        btnEliminar.click(function () {
            swal({
                title: "Confirmar",
                text: "Deseas eliminar el registro?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"]
            }).then((willDelete) => {
                if (willDelete) {
                    HoldOn.open({
                        theme: "sk-bounce",
                        message: "CARGANDO DATOS..."
                    });
                    $.ajax({
                        url: master_url + 'onEliminar',
                        type: "POST",
                        data: {
                            ID: temp
                        }
                    }).done(function (data, x, jq) {
                        getRecords();
                        pnlDatos.addClass("d-none");
                        pnlTablero.removeClass("d-none");
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                }
            });
        });
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
                        onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA MODIFICADO EL REGISTRO', 'success');
                        getRecords();
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
                        pnlDatos.find("[name='ID']").val(data);
                        nuevo = false;
                        getRecords();
                        pnlDatos.addClass("d-none");
                        pnlTablero.removeClass("d-none");
                        pnlDatos.find("[name='Tp']").addClass('disabledForms');
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                }
            } else {
                onNotify('<span class="fa fa-times fa-lg"></span>', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'danger');
            }
        });
        //Valida RFC
        pnlDatos.find("[name='RFC']").blur(function () {
            var rfc = $(this).val().trim(); // -Elimina los espacios que pueda tener antes o después
            var rfcCorrecto = rfcValido(rfc); //Comprobar RFC
            if (rfcCorrecto) {
            } else {

                swal({
                    title: "ATENCIÓN",
                    text: "RFC NO VÁLIDO",
                    icon: "warning",
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    buttons: false,
                    timer: 1200
                }).then((action) => {
                    pnlDatos.find("[name='RFC']").val("");
                    pnlDatos.find("[name='RFC']").focus();
                });

            }
        });
        /*CALLS*/
        getRecords();
        handleEnter();
    });

    function getRecords() {
        temp = 0;
        HoldOn.open({
            theme: "sk-bounce",
            message: "CARGANDO DATOS..."
        });
        $.ajax({
            url: master_url + 'getRecords',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {

            if (data.length > 0) {
                $("#tblRegistros").html(getTable('tblBancos', data));
                $('#tblBancos tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblBancos thead th');
                var tfoot = $('#tblBancos tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblBancos tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });
                var tblSelected = $('#tblBancos').DataTable(tableOptions);
                $('#tblBancos_filter input[type=search]').focus();
                $('#tblBancos tbody').on('click', 'tr', function () {
                    nuevo = false;
                    $("#tblBancos").find("tr").removeClass("success");
                    $("#tblBancos").find("tr").removeClass("warning");
                    var id = this.id;
                    var index = $.inArray(id, selected);
                    if (index === -1) {
                        selected.push(id);
                    } else {
                        selected.splice(index, 1);
                    }
                    $(this).addClass('success');
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                    if (temp !== 0 && temp !== undefined && temp > 0) {
                        HoldOn.open({
                            theme: "sk-bounce",
                            message: "CARGANDO DATOS..."
                        });
                        $.ajax({
                            url: master_url + 'getBancoByID',
                            type: "POST",
                            dataType: "JSON",
                            data: {
                                ID: temp
                            }
                        }).done(function (data, x, jq) {
                            pnlDatos.find("input").val("");
                            $.each(pnlDatos.find("select"), function (k, v) {
                                pnlDatos.find("select")[k].selectize.clear(true);
                            });
                            $.each(data[0], function (k, v) {
                                pnlDatos.find("[name='" + k + "']").val(v);
                                if (pnlDatos.find("[name='" + k + "']").is('select')) {
                                    pnlDatos.find("[name='" + k + "']")[0].selectize.addItem(v, true);
                                }
                            });
                            pnlTablero.addClass("d-none");
                            pnlDatos.removeClass('d-none');
                            pnlDatos.find("[name='Tp']").addClass('disabledForms');
                            pnlDatos.find("[name='Nombre']").focus().select();

                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    } else {
                        onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
                    }
                });
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getUltimoRegistro() {
        $.getJSON(master_url + 'getUltimoRegistro').done(function (data, x, jq) {
            if (data.length > 0) {
                var ultimo = parseInt(data[0].Clave) + 1;
                pnlDatos.find("[name='Clave']").val(ultimo);
            } else {
                pnlDatos.find("[name='Clave']").val('1');
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }


</script>