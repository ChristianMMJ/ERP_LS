<div class="card m-2 animated fadeIn" id="pnlTablero">
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
                            <th>Departamento</th>
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
<div class="card m-2 d-none animated fadeIn" id="pnlDatos">
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
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="d-none">
                        <input type="text"  name="ID" class="form-control form-control-sm" >
                    </div>
                    <div class="col-12 col-md-6 col-sm-6 col-xl-6">
                        <label for="Clave" >Clave*</label>
                        <input type="text" class="form-control form-control-sm" id="Clave" name="Clave" required autofocus="">
                    </div>
                    <div class="col-12 col-md-6 col-sm-6 col-xl-6">
                        <label for="" >Departamento*</label>
                        <select id="Departamento" name="Departamento" class="form-control form-control-sm" >
                            <option value=""></option>
                            <option value="10">PIEL/FORRO</option>
                            <option value="80">SUELA/PLANTA</option>
                            <option value="90">PELETERIA</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <label for="" >Descripción*</label>
                        <textarea id="Descripcion" name="Descripcion" class="form-control" rows="2" cols="4"></textarea>
                    </div>
                    <div class="col-12 col-md-4 col-sm-4 col-xl-4">
                        <label for="" >Grupo*</label>
                        <select id="Grupo" name="Grupo" class="form-control form-control-sm" >
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4 col-sm-4 col-xl-4">
                        <label for="" >Unidad*</label>
                        <select id="Tmnda" name="Tmnda" class="form-control form-control-sm" >
                            <option value=""></option>
                            <option value="1">Nacional</option>
                            <option value="2">Dolar</option>
                            <option value="3">Libra</option>
                            <option value="4">Jen</option>
                            <option value="5">Euro</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4 col-sm-4 col-xl-4">
                        <label for="" >Moneda*</label>
                        <select id="Grupo" name="Grupo" class="form-control form-control-sm" >
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6 col-sm-6 col-xl-6">
                        <label for="Min" >Min*</label>
                        <input type="text" class="form-control form-control-sm" id="Min" name="Min" required autofocus="">
                    </div>
                    <div class="col-12 col-md-6 col-sm-6 col-xl-6">
                        <label for="Max" >Max*</label>
                        <input type="text" class="form-control form-control-sm" id="Max" name="Max" required autofocus="">
                    </div>
                    
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-4" align="center">
                        <legend>Proveedores</legend>
                    </div>
                    <div class="col-12 col-md-4 col-sm-4 col-xl-4"> 
                        <select id="ProveedorUno" name="ProveedorUno" class="form-control form-control-sm" >
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4 col-sm-4 col-xl-4">
                        <select id="ProveedorDos" name="ProveedorDos" class="form-control form-control-sm" >
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4 col-sm-4 col-xl-4"> 
                        <select id="ProveedorTres" name="ProveedorTres" class="form-control form-control-sm" >
                            <option value=""></option>
                        </select>
                    </div>
                    
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-4" align="center">
                        <legend>Ubicaciones</legend>
                    </div>
                    <div class="col-12 col-md-3 col-sm-6 col-xl-3"> 
                        <input type="text" class="form-control form-control-sm" id="UbicaiconUno" name="UbicaiconUno" required autofocus="">
                    </div>
                    <div class="col-12 col-md-3 col-sm-6 col-xl-3">
                        <input type="text" class="form-control form-control-sm" id="UbicacionDos" name="UbicacionDos" required autofocus="">
                    </div>
                    <div class="col-12 col-md-3 col-sm-6 col-xl-3"> 
                        <input type="text" class="form-control form-control-sm" id="UbicacionTres" name="UbicacionTres" required autofocus="">
                    </div>
                    <div class="col-12 col-md-3 col-sm-6 col-xl-3"> 
                        <input type="text" class="form-control form-control-sm" id="UbicacionCuatro" name="UbicacionCuatro" required autofocus="">
                    </div>
                    
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
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
                    <div class="col-6 col-sm-6 col-md-6" align="right">
                        <button type="button" class="btn btn-raised btn-info btn-sm" id="btnGuardar">
                            <span class="fa fa-save "></span> GUARDAR
                        </button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<script>
    var master_url = base_url + 'index.php/Articulos/';
    var tblArticulos = $('#tblArticulos');
    var Articulos;
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
                        swal('ATENCIÓN', 'SE HA MODIFICADO EL REGISTRO', 'info');
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
                        swal('ATENCIÓN', 'SE HA AGREGADO UN NUEVO REGISTRO  ', 'info');
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
                text: "Nota: No se eliminara ninguna unidad que tenga alguna relacion con otro dato dentro del sistema",
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
            pnlDatos.find("input").val("");
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass("d-none");
            btnEliminar.addClass("d-none");
            getID();
        });

        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass("d-none");
        });
    });

    function init() {
        getRecords();
    }

    function getID() {
        $.getJSON(master_url + 'getID').done(function (data, x, jq) {
            console.log(data);
            if (data.length > 0) {
                var ID = $.isNumeric(data[0].CLAVE) ? parseInt(data[0].CLAVE) + 1 : 1;
                pnlDatos.find("#Clave").val(ID).select().focus();
            } else {
                pnlDatos.find("#Clave").val('1').select().focus();
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
            tblArticulos.find("tbody tr").removeClass("success");
            $(this).addClass("success");
            var dtm = Articulos.row(this).data();
            temp = parseInt(dtm.ID);
            $.getJSON(master_url + 'getUnidadByID', {ID: temp}).done(function (data) {
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
                btnEliminar.removeClass("d-none");

                pnlDatos.find("#Clave").focus().select();
            }).fail(function (x, y, z) {
                swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
                console.log(x.responseText);
            }).always(function () {
                HoldOn.close();
            });
        });
        HoldOn.close();
    }
</script>