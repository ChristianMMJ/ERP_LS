

<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-body ">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Zonas</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
            </div>
        </div>
        <div class="card-block mt-4">
            <div id="Zonas" class="table-responsive">
                <table id="tblZonas" class="table table-sm display " style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Clave</th>
                            <th>Descripción</th>
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
                        <legend >Zona</legend>
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
                    <div class="col-12 col-md-6 col-sm-6">
                        <label for="Clave" >Clave*</label>
                        <input type="text" class="form-control form-control-sm disabledForms" id="Clave" name="Clave" required>
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label for="Descripcion" >Descripción*</label>
                        <input type="text" id="Descripcion" name="Descripcion" class="form-control form-control-sm" placeholder="" required>
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
<script>
    var master_url = base_url + 'index.php/Zonas/';
    var tblZonas = $('#tblZonas');
    var Zonas;
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
                        Zonas.ajax.reload();
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
                        Zonas.ajax.reload();
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
                text: "Nota: No se eliminara ninguna unidad que tenga alguna relacion con otro dato dentro del sistema",
                icon: "warning",
                buttons: {
                    cancelar: {
                        text: "Cancelar",
                        value: "cancelar"
                    },
                    eliminar: {
                        text: "Aceptar",
                        value: "eliminar"
                    }
                }
            }).then((value) => {
                switch (value) {
                    case "eliminar":
                        $.post(master_url + 'onEliminar', {ID: temp}).done(function () {
                            swal('ATENCIÓN', 'SE HA ELIMINADO EL REGISTRO', 'success');
                            Zonas.ajax.reload();
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
            pnlDatos.find("[name='Clave']").addClass('disabledForms');
            pnlDatos.find("[name='Descripcion']").focus();
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
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
        if ($.fn.DataTable.isDataTable('#tblZonas')) {
            tblZonas.DataTable().destroy();
        }
        Zonas = tblZonas.DataTable({
            "dom": 'Bfrtip',
            buttons: buttons,
            "ajax": {
                "url": master_url + 'getRecords',
                "dataSrc": ""
            },
            "columns": [
                {"data": "ID"}, {"data": "Clave"}, {"data": "Descripcion"}, {"data": "Estatus"}
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
            "scrollX": true,
            "bLengthChange": false,
            "deferRender": true,
            "scrollCollapse": false,
            "bSort": true,
            "aaSorting": [
                [0, 'desc']/*ID*/
            ]
        });

        $('#tblZonas_filter input[type=search]').focus();

        tblZonas.find('tbody').on('click', 'tr', function () {
            HoldOn.open({
                theme: 'sk-cube',
                message: 'CARGANDO...'
            });
            nuevo = false;
            tblZonas.find("tbody tr").removeClass("success");
            $(this).addClass("success");
            var dtm = Zonas.row(this).data();
            temp = parseInt(dtm.ID);
            $.getJSON(master_url + 'getZonaByID', {ID: temp}).done(function (data) {
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
                btnEliminar.removeClass("d-none");

                pnlDatos.find("[name='Clave']").addClass('disabledForms');
                pnlDatos.find("[name='Descripcion']").focus().select();
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

