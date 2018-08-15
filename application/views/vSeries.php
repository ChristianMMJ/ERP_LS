<div class="card border-0 m-3" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Series</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive" id="tblRegistros"></div>
        </div>
    </div>
</div>
<!--GUARDAR-->
<div class="card border-0  d-none m-3" id="pnlDatos">
    <div class="card-body text-dark">
        <form id="frmNuevo">

            <div class="row">
                <div class="col-md-2 float-left">
                    <legend class="float-left">Series</legend>
                </div>
                <div class="col-md-7 float-right">

                </div>
                <div class="col-md-3 float-right" align="right">
                    <button type="button" class="btn btn-secondary btn-sm" id="btnCancelar"><span class="fa fa-arrow-left"></span> REGRESAR </button>
                </div>
            </div>
            <div class="row">
                <div class="d-none">
                    <input type="text" class="" id="ID" name="ID" >
                </div>
                <div class="col-sm">
                    <label for="Clave">Clave*</label>
                    <input type="text" class="form-control form-control-sm" id="Clave" name="Clave" required >
                </div>
                <div class="col-sm">
                    <label for="PuntoInicial">Punto Inicial*</label>
                    <input type="text" class="form-control form-control-sm numbersOnly" maxlength="4" id="PuntoInicial" name="PuntoInicial" required >
                </div>
                <div class="col-sm">
                    <label for="PuntoFinal">Punto Final*</label>
                    <input type="text"  class="form-control form-control-sm numbersOnly" maxlength="4" id="PuntoFinal" name="PuntoFinal" required >
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="MediosPuntos" checked="">
                        <label class="custom-control-label" for="MediosPuntos">Medios Puntos</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <br>
            </div>
            <div class=" " style=" overflow-x:auto; white-space: nowrap;" id="dSerie">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T1">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T2">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T3">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T4">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T5">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T6">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T7">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T8">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T9">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T10">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T11">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T12">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T13">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T14">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T15">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T16">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T17">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T18">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T19">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T20">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T21">
                <input type="text" style="width: 45px;" maxlength="4" class="numbersOnly"   name="T22">

            </div>

            <div class="row">
                <div class="col-sm">
                    <label for="Estatus">Estatus*</label>
                    <select class="form-control form-control-sm "  name="Estatus">
                        <option value=""></option>
                        <option>ACTIVO</option>
                        <option>INACTIVO</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3" >
                <div class="col-sm"align="right">
                    <button type="button" class="btn btn-primary btn-sm" id="btnGuardar"><span class="fa fa-save "></span> GUARDAR</button>
                </div>

            </div>
        </form>
    </div>
</div>

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Series/';
    var pnlDatos = $("#pnlDatos");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnModificar = pnlDatos.find("#btnModificar");
    var tempDetalle = 0;
    var nuevo = true;

    $(document).ready(function () {
        pnlDatos.find('#PuntoFinal').keydown(function (e) {
            if (e.keyCode === 13) {
                //Borramos los datos para evitar errores
                var contReset = 1;
                while (contReset <= 22) {
                    pnlDatos.find("[name='T" + contReset + "']").val("");
                    contReset++;
                }
                var incremento = parseFloat(pnlDatos.find('#PuntoInicial').val());
                //Se valida que no sea mas granda la talla inicial que la final
                if (parseFloat(pnlDatos.find('#PuntoFinal').val()) > parseFloat(pnlDatos.find('#PuntoInicial').val())) {

                    var cont = 1;
                    //Validamos si las tallas son con medios o sin medios puntos
                    if ($('#MediosPuntos').is(":checked"))
                    {
                        //Crear las tallas
                        while (incremento <= parseFloat(pnlDatos.find('#PuntoFinal').val())) {
                            pnlDatos.find("[name='T" + cont + "']").val(incremento);
                            incremento = incremento + 0.5;
                            cont++;
                        }
                    } else {
                        //Crear las tallas
                        while (incremento <= parseFloat(pnlDatos.find('#PuntoFinal').val())) {
                            pnlDatos.find("[name='T" + cont + "']").val(incremento);
                            incremento = incremento + 1;
                            cont++;
                        }
                    }
                    guardar = true;

                } else {
                    guardar = false;
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'EL PUNTO INICIAL NO DEBE SER MAYOR AL PUNTO FINAL', 'danger');
                }
            }

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
                        pnlDatos.find('#ID').val(data);
                        nuevo = false;
                        getRecords();
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                    });
                }
            } else {
                onNotify('<span class="fa fa-times fa-lg"></span>', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'danger');
            }



        });
        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass('d-none');
            pnlDatos.find("input").val("");
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            pnlDatos.find('input').removeClass('disabledForms');
            pnlDatos.find('#Clave').addClass('disabledForms');
            pnlDatos.find('#PuntoInicial').focus();
            nuevo = true;
            getUltimoRegistro();
        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass('d-none');
            nuevo = true;
        });
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
                $("#tblRegistros").html(getTable('tblSeries', data));
                $('#tblSeries tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblSeries thead th');
                var tfoot = $('#tblSeries tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblSeries tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });
                var tblSelected = $('#tblSeries').DataTable(tableOptions);
                $('#tblSeries_filter input[type=search]').focus();
                $('#tblSeries tbody').on('click', 'tr', function () {
                    $("#tblSeries tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var id = this.id;
                    var index = $.inArray(id, selected);
                    if (index === -1) {
                        selected.push(id);
                    } else {
                        selected.splice(index, 1);
                    }
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                    if (temp !== 0 && temp !== undefined && temp > 0) {
                        nuevo = false;
                        HoldOn.open({
                            theme: "sk-bounce",
                            message: "CARGANDO DATOS..."
                        });
                        $.ajax({
                            url: master_url + 'getSerieByID',
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
                            pnlDatos.find('input').addClass('disabledForms');
                            $(':input:text:enabled:visible:first').focus();
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    } else {
                        onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
                    }
                });
                // Apply the search
                tblSelected.columns().every(function () {
                    var that = this;
                    $('input', this.footer()).on('keyup change', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
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
            console.log(data[0].Clave);
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