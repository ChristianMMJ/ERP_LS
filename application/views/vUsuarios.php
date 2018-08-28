<div class="card m-3 border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-6 col-sm-6 float-left">
                <legend class="float-left">Usuarios</legend>
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
                        <legend >Usuario</legend>
                    </div>
                    <div class="col-12 col-sm-6 col-md-8" align="right">
                        <button type="button" class="btn btn-primary btn-sm" id="btnCancelar" >
                            <span class="fa fa-arrow-left" ></span> REGRESAR
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" id="btnEliminar">
                            <span class="fa fa-trash fa-1x"></span> ELIMINAR
                        </button>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="d-none">
                        <input type="text"  name="ID" class="form-control form-control-sm" >
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label for="Usuario" >Usuario*</label>
                        <input type="text" class="form-control form-control-sm"  name="Usuario" required >
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label for="Contrasena" >Contraseña*</label>
                        <input type="password" class="form-control form-control-sm"  name="Contrasena" required>
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label for="Nombre" >Nombre*</label>
                        <input type="text" id="Nombre" name="Nombre" class="form-control form-control-sm" placeholder="" required>
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label for="Apellidos" >Apellidos*</label>
                        <input type="text" id="Apellidos" name="Apellidos" class="form-control form-control-sm" placeholder="" required>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12">
                        <label for="" >Tipo Acceso*</label>
                        <select id="TipoAcceso" name="TipoAcceso" class="form-control form-control-sm required" >
                            <option value=""></option>
                            <option value="SUPER ADMINISTRADOR">SUPER ADMINISTRADOR</option>
                            <option value="ADMINISTRACION">ADMINISTRACIÓN</option>
                            <option value="CONTABILIDAD">CONTABILIDAD</option>
                            <option value="RECURSOS HUMANOS">RECURSOS HUMANOS</option>
                            <option value="VENTAS">VENTAS</option>
                            <option value="INGENIERIA">INGENIERÍA</option>
                            <option value="DISEÑO Y DESARROLLO">DISEÑO Y DESARROLLO</option>
                            <option value="ALMACEN">ALMACÉN</option>
                            <option value="PRODUCCION">PRODUCCIÓN</option>
                            <option value="CLIENTES">CLIENTES</option>
                            <option value="CALIDAD">CALIDAD</option>
                            <option value="RECEPCION">RECEPCIÓN</option>
                            <option value="PROVEEDORES">PROVEEDORES</option>
                            <option value="COBRANZA">COBRANZA</option>
                            <option value="COBRANZA">COBRANZA</option>
                            <option value="MAQUILAS">MAQUILAS</option>
                            <option value="AGENTES">MAQUILAS</option>
                            <option value="DESTAJOS">DESTAJOS</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label for="" >Empresa*</label>
                        <select id="Empresa" name="Empresa" class="form-control form-control-sm required" >
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label for="" >Estatus*</label>
                        <select id="Estatus" name="Estatus" class="form-control form-control-sm required" >
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
                    <button type="button" class="btn btn-info btn-lg btn-float" id="btnGuardar" data-toggle="tooltip" data-placement="left" title="Guardar">
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
    var master_url = base_url + 'index.php/Usuarios/';
    var btnNuevo = $("#btnNuevo");
    var pnlDatos = $("#pnlDatos");
    var pnlTablero = $("#pnlTablero");
    //Boton que guarda los datos del formulario
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnEliminar = $("#btnEliminar");
    var sEsCliente = pnlDatos.find("#TipoAcceso");
    var nuevo = true;
    $(document).ready(function () {

        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass('d-none');
            pnlDatos.find("input").val("");
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            pnlDatos.find("[name='Usuario']").removeClass('disabledForms');
            pnlDatos.find("[name='Usuario']").focus();
            nuevo = true;
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
                        onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO REGISTRO', 'success');
                        pnlDatos.find("[name='ID']").val(data);
                        nuevo = false;
                        getRecords();
                        pnlDatos.addClass("d-none");
                        pnlTablero.removeClass("d-none");
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
        /*CALLS*/
        getRecords();
        getEmpresas();
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
            $("#tblRegistros").html(getTable('tblUsuarios', data));
            $('#tblUsuarios tfoot th').each(function () {
                $(this).html('');
            });
            var tblSelected = $('#tblUsuarios').DataTable(tableOptions);
            $('#tblUsuarios_filter input[type=search]').focus();
            $('#tblUsuarios tbody').on('click', 'tr', function () {
                nuevo = false;
                $("#tblUsuarios").find("tr").removeClass("success");
                $("#tblUsuarios").find("tr").removeClass("warning");
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
                        url: master_url + 'getUsuarioByID',
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
                                pnlDatos.find("[name='" + k + "']")[0].selectize.setValue(v);
                            }
                        });
                        pnlTablero.addClass("d-none");
                        pnlDatos.removeClass('d-none');

                        pnlDatos.find("[name='Usuario']").addClass('disabledForms');
                        pnlDatos.find("[name='Contrasena']").focus().select();
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                } else {
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
                }
            });

        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getEmpresas() {
        $.getJSON(master_url + 'getEmpresas').done(function (data) {
            $.each(data, function (k, v) {
                pnlDatos.find("#Empresa")[0].selectize.addOption({text: v.Empresa, value: v.ID});
            });
        }).fail(function (x, y, z) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        });
    }
</script>