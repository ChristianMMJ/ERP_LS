<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-body ">
        <div class="row">
            <div class="col-sm-9 float-left">
                <legend class="float-left">Captura Inventario Inicial Fiscal de Materia Prima</legend>
            </div>
            <div class="col-sm-3" align="right">

                <button type="button" class="btn btn-warning btn-sm " id="btnVerArticulos" >
                    <span class="fa fa-file-pdf" ></span> IMPRIMIR INV.
                </button>
                <button type="button" class="btn btn-success btn-float" id="btnCerrarInv" data-toggle="tooltip" data-placement="top" title="Cerrar Inventario">
                    <i class="fa fa-check"></i>
                </button>
            </div>
        </div>
        <div class="row" id="Encabezado">
            <div class="col-12 col-sm-4 col-md-3 col-xl-3" >
                <label for="" >Material</label>
                <select id="Clave" name="Clave" class="form-control form-control-sm required" required="" >
                    <option value=""></option>
                </select>
            </div>
            <div class="col-12 col-sm-6 col-md-1 col-xl-1">
                <label for="" >U.M.</label>
                <input type="text" class="form-control form-control-sm" disabled="" maxlength="3" id="Unidad" name="Unidad">
            </div>
            <div class="col-6 col-sm-2 col-md-2 col-lg-2 col-xl-1" >
                <label>Precio</label>
                <input type="text" class="form-control form-control-sm numbersOnly " id="Pinvini" name="Pinvini" maxlength="15" required>
            </div>
            <div class="col-6 col-sm-2 col-md-2 col-lg-2 col-xl-1" >
                <label>Existencia</label>
                <input type="text" class="form-control form-control-sm numbersOnly " id="Invini" name="Invini" maxlength="15" required>
            </div>
            <div class="col-6 col-sm-5 col-md-5 col-lg-2 col-xl-1 mt-4">
                <button type="button" class="btn btn-primary" id="btnGuardar" data-toggle="tooltip" data-placement="right" title="Capturar Existencia">
                    <i class="fa fa-save"></i>
                </button>
            </div>
        </div>
        <div class="row" id="Detalle">
            <div class="col-12 col-sm-6 col-md-3 col-xl-2">
                <label for="" >Mes Inventario</label>
                <select id="Mes" name="Mes" class="form-control form-control-sm" >
                    <option value=""></option>
                    <option value="Ene">1 ENERO</option>
                    <option value="Feb">2 FEBRERO</option>
                    <option value="Mar">3 MARZO</option>
                    <option value="Abr">4 ABRIL</option>
                    <option value="May">5 MAYO</option>
                    <option value="Jun">6 JUNIO</option>
                    <option value="Jul">7 JULIO</option>
                    <option value="Ago">8 AGOSTO</option>
                    <option value="Sep">9 SEPTIEMBRE</option>
                    <option value="Oct">10 OCTUBRE</option>
                    <option value="Nov">11 NOVIEMBRE</option>
                    <option value="Dic">12 DICIEMBRE</option>
                </select>
            </div>

        </div>
    </div>
</div>
<script>
    var master_url = base_url + 'index.php/InicialMaterialPrima/';
    var pnlTablero = $("#pnlTablero");
    var btnGuardar = pnlTablero.find('#btnGuardar');
    var btnCerrarInv = pnlTablero.find('#btnCerrarInv');
    $(document).ready(function () {
        /*FUNCIONES INICIALES*/
        validacionSelectPorContenedor(pnlTablero);
        setFocusSelectToInputOnChange('#Clave', '#Precio', pnlTablero);
        setFocusSelectToInputOnChange('#Mes', '#btnCerrarInv', pnlTablero);
        handleEnter();
        pnlTablero.find("input").val("");
        $.each(pnlTablero.find("select"), function (k, v) {
            pnlTablero.find("select")[k].selectize.clear(true);
        });
        getMateriales();
        pnlTablero.find("#Clave").change(function () {
            getDatosByMaterial($(this).val());
        });
        btnGuardar.click(function () {
            isValid('pnlTablero');
            if (valido) {
                var mat = pnlTablero.find("#Clave").val();
                var pinvini = pnlTablero.find("#Pinvini").val();
                var invini = pnlTablero.find('#Invini').val();
                $.post(master_url + 'onModificar', {
                    Clave: mat,
                    Pinvini: pinvini,
                    Invini: invini
                }).done(function (data) {
                    onNotifyOld('fa fa-check', 'REGISTRO GUARDADO', 'info');
                    pnlTablero.find("input").val("");
                    $.each(pnlTablero.find("select"), function (k, v) {
                        pnlTablero.find("select")[k].selectize.clear(true);
                    });
                    pnlTablero.find("#Clave")[0].selectize.focus();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                });
            } else {
                swal('ATENCION', 'Completa los campos requeridos', 'warning');
            }
        });

        btnCerrarInv.click(function () {
            if (pnlTablero.find("#Mes").val() !== '') {
                swal({
                    buttons: ["Cancelar", "Aceptar"],
                    title: 'Estas Seguro?',
                    text: "Esta acción capturará el inv. incial en el mes que seleccionaste",
                    icon: "warning",
                    closeOnEsc: false,
                    closeOnClickOutside: false
                }).then((action) => {
                    if (action) {
                        var mes = pnlTablero.find("#Mes").val();
                        $.post(master_url + 'onCerrarInv', {
                            Mes: mes,
                        }).done(function (data) {
                            onNotifyOld('fa fa-check', 'INVENTARIO CERRADO', 'info');
                            pnlTablero.find("input").val("");
                            $.each(pnlTablero.find("select"), function (k, v) {
                                pnlTablero.find("select")[k].selectize.clear(true);
                            });
                            pnlTablero.find("#Clave")[0].selectize.focus();
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        });
                    }
                });
            } else {
                swal({
                    title: "ATENCIÓN",
                    text: "DEBES DE SELECCIONAR UN MES",
                    icon: "error",
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    buttons: false,
                    timer: 1000
                }).then((action) => {
                    pnlTablero.find("#Mes")[0].selectize.focus();
                });
            }
        });
    });
    function getDatosByMaterial(mat) {
        $.getJSON(master_url + 'getDatosByMaterial', {
            Material: mat
        }).done(function (data) {
            if (data.length > 0) {
                pnlTablero.find('#Pinvini').val(data[0].Pinvini);
                pnlTablero.find('#Invini').val(data[0].Invini);
                pnlTablero.find('#Unidad').val(data[0].Unidad);
                pnlTablero.find('#Pinvini').focus().select();
            }
        }).fail(function (x, y, z) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        });
    }
    function getMateriales() {
        HoldOn.open({theme: 'sk-bounce', message: 'INCIALIZANDO DATOS...'});
        $.when($.getJSON(master_url + 'getMateriales').done(function (data) {
            $.each(data, function (k, v) {
                pnlTablero.find("#Clave")[0].selectize.addOption({text: v.Material, value: v.ID});
            });
        }).fail(function (x) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        })).then(function (x) {
            HoldOn.close();
            pnlTablero.find("#Clave")[0].selectize.focus();
        });

    }
</script>



