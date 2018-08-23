<div id="pnlTablero">
    <div class="card m-3" >
        <div class="card-body ">
            <div class="row">
                <div class="col-sm-6 float-left">
                    <legend class="float-left">Mat. Fijos Ficha Técnicas</legend>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                    <label for="" >Pieza*</label>
                    <select id="Pieza" name="Pieza" class="form-control form-control-sm" >
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                    <label for="" >Artículo*</label>
                    <select id="Articulo" name="Articulo" class="form-control form-control-sm" >
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                    <label for="Consumo">Consumo*</label>
                    <input type="text" maxlength="8" class="form-control form-control-sm numbersOnly"  name="Consumo">
                </div>
                <button type="button" class="btn btn-info btn-lg btn-float" id="btnGuardar" data-toggle="tooltip" data-placement="left" title="Guardar">
                    <i class="fa fa-save"></i>
                </button>
            </div>
            <div class="row pt-2">
                <div class="col-6 col-md-6 ">
                    <h6 class="text-danger">Los campos con * son obligatorios</h6>
                </div>
            </div>

        </div>
    </div>
    <div class="card m-3">
        <div class="card-body ">
            <div class="row">
                <div id="FichaTecnicaFijos" class="table-responsive">
                    <table id="tblFichaTecnicaFijos" class="table table-sm " style="width:100%">
                        <thead>
                            <tr>
                                <th>Pieza</th>
                                <th>Material</th>
                                <th>Consumo</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    var master_url = base_url + 'index.php/FichaTecnicaFija/';
    var tblFichaTecnicaFijos = $('#tblFichaTecnicaFijos');
    var FichaTecnicaFijos;
    var btnNuevo = $("#btnNuevo");
    btnCancelar = $("#btnCancelar");
    btnEliminar = $("#btnEliminar");
    btnGuardar = $("#btnGuardar");
    var pnlTablero = $("#pnlTablero");
    var nuevo = false;



    $(document).ready(function () {
        /*FUNCIONES INICIALES*/
        init();
        handleEnter();

        /*FUNCIONES X BOTON*/
        btnGuardar.click(function () {
            isValid('pnlTablero');
            if (valido) {

                if (!nuevo) {
                    var frm = new FormData();
                    frm.append('ID', pnlTablero.find("#ID").val());
                    frm.append('Clave', pnlTablero.find("#Clave").val());
                    frm.append('Descripcion', pnlTablero.find("#Descripcion").val());
                    frm.append('Serie', pnlTablero.find("#Serie").val());
                    frm.append('Maquila', pnlTablero.find("#Maquila").val());
                    for (var i = 1, max = 22; i <= max; i++) {
                        var e = pnlTablero.find("#rExistencias").find("input[name='Ex" + i + "']").val();
                        var c = pnlTablero.find("#rCantidades").find("input[name='C" + i + "']").val();
                        if (e !== '' && c !== '') {
                            frm.append('Ex' + i, e);
                            frm.append('C' + i, c);
                        }
                    }
                    $.ajax({
                        url: master_url + 'onModificar',
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: frm
                    }).done(function (data, x, jq) {
                        swal('ATENCIÓN', 'SE HA MODIFICADO EL REGISTRO', 'info');
                        Hormas.ajax.reload();
                        pnlTablero.addClass("d-none");
                        pnlTablero.removeClass("d-none");
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                } else {
                    var frm = new FormData(pnlTablero.find("#frmNuevo")[0]);
                    $.ajax({
                        url: master_url + 'onAgregar',
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: frm
                    }).done(function (data, x, jq) {
                        pnlTablero.find("[name='ID']").val(data);
                        nuevo = false;
                        Hormas.ajax.reload();
                        pnlTablero.addClass("d-none");
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
                        text: "Aceptar",
                        value: "eliminar"
                    }
                }
            }).then((value) => {
                switch (value) {
                    case "eliminar":
                        $.post(master_url + 'onEliminar', {ID: temp}).done(function () {
                            swal('ATENCIÓN', 'SE HA ELIMINADO EL REGISTRO', 'success');
                            Hormas.ajax.reload();
                            pnlTablero.addClass("d-none");
                            pnlTablero.removeClass("d-none");
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


    });

    function init() {
        getRecords();
//        getPiezas();
//        getMateriales();
    }



    function getRecords() {
        temp = 0;
        HoldOn.open({
            theme: 'sk-cube',
            message: 'CARGANDO...'
        });
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblFichaTecnicaFijos')) {
            tblFichaTecnicaFijos.DataTable().destroy();
        }
        FichaTecnicaFijos = tblFichaTecnicaFijos.DataTable({
            "dom": 'frtip',
            buttons: buttons,
            "ajax": {
                "url": master_url + 'getRecords',
                "dataSrc": ""
            },
            "columns": [
                {"data": "Pieza"},
                {"data": "Material"},
                {"data": "Consumo"},
                {"data": "Eliminar"}
            ],
            language: lang,
            select: true,
            "autoWidth": true,
            "colReorder": true,
            "displayLength": 40,
            "scrollX": true,
            "bLengthChange": false,
            "deferRender": true,
            "scrollCollapse": false,
            "bSort": true,
            initComplete: function (a, b) {
                HoldOn.close();
                $.each(pnlTablero.find("select"), function (k, v) {
                    pnlTablero.find("select")[k].selectize.clear(true);
                });
                pnlTablero.find("input").val("");
                pnlTablero.find("[name='Pieza']")[0].selectize.focus();
            }
        });
        tblFichaTecnicaFijos.find('tbody').on('click', 'tr', function () {
            tblFichaTecnicaFijos.find("tbody tr").removeClass("success");
            $(this).addClass("success");

        });

    }
    function getPiezas() {
        $.ajax({
            url: master_url + 'getSeries',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlTablero.find("[name='Serie']")[0].selectize.addOption({text: v.Serie, value: v.Clave});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }
    function getMateriales() {
        $.ajax({
            url: master_url + 'getMaquilas',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlTablero.find("[name='Maquila']")[0].selectize.addOption({text: v.Maquila, value: v.Clave});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }
</script>
