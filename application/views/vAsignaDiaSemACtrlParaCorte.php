<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-header"> 
        <h4 class="font-weight-bold text-center">
            Asigna dia semana a control para corte
        </h4> 
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8" align="center"> 
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-info">
                        <input type="radio" name="btnPiel" id="btnPiel" autocomplete="off" checked> PIEL
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="btnForro" id="btnForro" autocomplete="off"> FORRO
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="btnAmbas" id="btnAmbas" autocomplete="off"> AMBAS
                    </label>
                </div>
            </div>
            <div class="col-2">
            </div>
            <div class="w-100"></div>
            <div class="col-12 col-sm-12 col-md-2 col-lg-1 col-xl-1">
                <label>Año</label>
                <input type="text" id="Anio" name="Anio" class="form-control form-control-sm" maxlength="4">
            </div>
            <div class="col-12 col-sm-12 col-md-2 col-lg-1 col-xl-1">
                <label>Semana</label>
                <input type="text" id="Semana" name="Semana" class="form-control form-control-sm numbersOnly" maxlength="2">
            </div>
            <div class="col-12 col-sm-12 col-md-2 col-lg-1 col-xl-1">
                <label>Dia</label>
                <input type="text" id="Dia" name="Dia" class="form-control form-control-sm numbersOnly" maxlength="1"  data-toggle="tooltip" data-placement="left" title="Dias entre 1 y 7">
            </div>
            <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"> 
                <label>Dia/Nombre</label>
                <input type="text" id="DiaNombre" name="DiaNombre" class="form-control form-control-sm" readonly="" maxlength="2">
            </div>
            <div class="col-12 col-sm-12 col-md-2 col-lg-1 col-xl-1">
                <label>Fracción</label>
                <input type="text" id="Fraccion" name="Fraccion" class="form-control form-control-sm numbersOnly animated bounceIn" maxlength="5" data-toggle="tooltip" data-placement="left" title="Fracciones; Forro: 99, Piel: 100">
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <label>Cortador</label>
                <select id="Cortador" name="Cortador" class="form-control form-control-sm">
                </select>
            </div> 
            <div class="w-100"></div>
            <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <label>Control</label>
                <input type="text" id="Control" name="Control" class="form-control form-control-sm numbersOnly" maxlength="10">
            </div>
            <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
                <label>Estilo</label>
                <input type="text" id="Estilo" name="Estilo" class="form-control form-control-sm" maxlength="10">
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <label>Color</label>
                <input type="text" id="Color" name="Color" class="form-control form-control-sm d-none" maxlength="10">
                <input type="text" id="ColorNombre" name="ColorNombre" class="form-control form-control-sm" maxlength="10">
            </div>
            <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
                <label>Pares</label>
                <input type="text" id="Pares" name="Pares" class="form-control form-control-sm numbersOnly" maxlength="10">
            </div>
            <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <label>TxPar</label>
                <input type="text" id="TxPar" name="TxPar" class="form-control form-control-sm numbersOnly" maxlength="10">
            </div>
            <div class="col-12 col-sm-12 col-md-2 col-lg-1 col-xl-1">
                <label>Precio</label>
                <input type="text" id="Precio" name="Precio" class="form-control form-control-sm numbersOnly" maxlength="10">
            </div>
            <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
                <label>Tiempo</label>
                <input type="text" id="Tiempo" name="Tiempo" class="form-control form-control-sm numbersOnly" maxlength="10">
            </div>
            <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1 d-none">
                <label>Articulo</label>
                <input type="text" id="ClaveArticulo" name="ClaveArticulo" class="form-control form-control-sm d-none" readonly="" maxlength="50">
                <input type="text" id="Articulo" name="Articulo" class="form-control form-control-sm d-none" readonly="" maxlength="250">
            </div> 
            <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
                <label>Pesos</label>
                <input type="text" id="Pesos" name="Pesos" class="form-control form-control-sm numbersOnly" maxlength="10">
            </div> 
            <button type="button" class="btn btn-info btn-lg btn-float animated tada" id="btnGuardar" name="btnGuardar"  data-toggle="tooltip" data-placement="left" title="Guardar">
                <i class="fa fa-save"></i>
            </button>
            <div class="w-100 my-2"></div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <h3>Controles por asignar</h3> 
                <table id="tblControlesSinAsignarAlDia" class="table table-hover table-sm table-bordered  compact nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">ID</th><!--0-->
                            <th scope="col">Control</th><!--1-->
                            <th scope="col">Cliente</th><!--2-->
                            <th scope="col">Estilo</th><!--3-->
                            <th scope="col">Color</th><!--4-->
                            <th scope="col">Pares</th><!--5-->
                            <th scope="col">Semana</th><!--6-->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>0</td><!--0-->                            <td>1</td><!--1-->
                            <td>2</td><!--2-->                            <td>3</td><!--3-->
                            <td>4</td><!--4-->                            <td>5</td><!--5-->
                            <td>6</td><!--6-->
                        </tr>
                    </tbody>
                </table> 
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1 d-flex align-items-center justify-content-center flex-column"> 
                <button id="Anadir" name="Anadir" class="btn btn-primary m-1 animated slideInRight" data-toggle="tooltip" data-placement="left" title="Añadir"><span class="fa fa-arrow-right"></span></button>
                <button id="Quitar" name="Quitar" class="btn btn-danger m-1 animated slideInLeft"  data-toggle="tooltip" data-placement="left" title="Quitar"><span class="fa fa-arrow-left"></span></button>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <h3>Controles asignados a este día</h3> 
                <table id="tblControlesAsignadosAlDia" class="table table-hover table-sm table-bordered  compact nowrap"  style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">ID</th><!--0-->
                            <th scope="col">Emp</th><!--0-->
                            <th scope="col">Control</th><!--1-->
                            <th scope="col">Año</th><!--2-->
                            <th scope="col">Sem</th><!--3-->
                            <th scope="col">D&iacute;a</th><!--4-->
                            <th scope="col">Frac.</th><!--5-->
                            <th scope="col">Fecha</th><!--6-->
                            <th scope="col">Estilo</th><!--7-->
                            <th scope="col">Pares</th><!--8-->
                            <th scope="col">Tiempo</th><!--9-->
                            <th scope="col">Precio</th><!--10-->
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table> 
            </div>

        </div><!--END ROW-->
    </div><!--END CARD BODY-->
</div>
<script>
    var pnlTablero = $("#pnlTablero"), Anio = pnlTablero.find("#Anio"), Dia = pnlTablero.find("#Dia"),
            Semana = pnlTablero.find("#Semana"), Cortador = pnlTablero.find("#Cortador"),
            Fraccion = pnlTablero.find("#Fraccion"), Control = pnlTablero.find("#Control"),
            Estilo = pnlTablero.find("#Estilo"), Color = pnlTablero.find("#Color"), Pares = pnlTablero.find("#Pares"),
            Precio = pnlTablero.find("#Precio"), Tiempo = pnlTablero.find("#Tiempo"), btnGuardar = pnlTablero.find("#btnGuardar"),
            ColorNombre = pnlTablero.find("#ColorNombre"), TxPar = pnlTablero.find("#TxPar"), Pesos = pnlTablero.find("#Pesos"),
            ClaveArticulo = pnlTablero.find("#ClaveArticulo"), Articulo = pnlTablero.find("#Articulo");
    var tblControlesSinAsignarAlDia = pnlTablero.find("#tblControlesSinAsignarAlDia"), ControlesSinAsignarAlDia,
            tblControlesAsignadosAlDia = pnlTablero.find("#tblControlesAsignadosAlDia"), ControlesAsignadosAlDia,
            btnPiel = $("#btnPiel"), btnForro = $("#btnForro"), btnAmbas = $("#btnAmbas"),
            btnAnadir = $("#Anadir"), btnQuitar = $("#Quitar");
    var Cortadores = pnlTablero.find("#Cortador");
    var dias = {
        1: 'LUNES',
        2: 'MARTES',
        3: 'MIERCOLES',
        4: 'JUEVES',
        5: 'VIERNES',
        6: 'SABADO',
        7: 'DOMINGO'
    };
    var c = {};
    var options = {
        dom: 'Brtip',
        buttons: [
            {
                text: "Todos",
                className: 'btn btn-info btn-sm',
                titleAttr: 'Todos',
                action: function (dt) {
                    ControlesSinAsignarAlDia.rows().select();
                }
            },
            {
                extend: 'selectNone',
                className: 'btn btn-info btn-sm',
                text: 'Ninguno',
                titleAttr: 'Deseleccionar Todos'
            }
        ], "ajax": {
            "url": '<?= base_url('AsignaDiaSemACtrlParaCorte/getRecords') ?>',
            "dataSrc": "",
            "data": function (d) {
                d.ANIO = (Anio.val().trim());
                d.SEMANA = (Semana.val().trim());
                d.CORTADOR = (Cortador.val().trim());
                d.CONTROL = (Control.val().trim());
                d.ESTILO = (Estilo.val().trim());
                d.COLOR = (Color.val().trim());
            }
        },
        "columnDefs": [
            {
                "targets": [0],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [6],
                "visible": false,
                "searchable": true
            }],
        "columns": [
            {"data": "ID"}, /*0*/
            {"data": "Control"}, /*1*/
            {"data": "Cliente"}, /*2*/
            {"data": "Estilo"}, /*3*/
            {"data": "Color"}, /*4*/
            {"data": "Pares"}, /*5*/
            {"data": "Semana"} /*6*/
        ],
        language: lang,
        select: {
            style: 'single'
        },
        keys: true,
        "autoWidth": true,
        "colReorder": true,
        "displayLength": 500,
        "scrollY": "250px",
        "scrollX": true,
        "bLengthChange": false,
        "deferRender": true,
        "scrollCollapse": false,
        "bSort": true,
        "aaSorting": [
            [0, 'desc']/*ID*/
        ],
        initComplete: function () {
            Anio.focus();
        }
    };
    $(document).ready(function () {

        btnAnadir.click(function () {
            onAnadirAsignacion();
        });

        btnQuitar.click(function () {
            onEliminarAsignacion();
        });

        btnGuardar.click(function () {
            onGuardarAsignacionDeDiaXControl();
        });

        Fraccion.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            Fraccion.removeClass('bounceIn animated');
        });

        $("#btnAmbas, #btnPiel, #btnForro").change(function () {
            onBeep(3);
            switch ($(this).attr('id')) {
                case 'btnPiel':
                    Fraccion.val(100);
                    break;
                case 'btnForro':
                    Fraccion.val(99);
                    break;
                case 'btnAmbas':
                    Fraccion.val('99,100');
                    break;
            }
            Fraccion.addClass('bounceIn animated');
        });

        Dia.on('keydown keypress keyup', function () {
            if (parseInt(Dia.val()) >= 1 && parseInt(Dia.val()) <= 7) {
                if (Dia.val().length !== '') {
                    if (parseInt(Dia.val()) === 0) {
                        Dia.val(1);
                    }
                    $.each(dias, function (k, v) {
                        if (parseInt(Dia.val()) === parseInt(k))
                        {
                            pnlTablero.find("#DiaNombre").val(v);
                            return false;
                        }
                    });
                } else if (Dia.val().length === '') {
                    Dia.val('');
                    pnlTablero.find("#DiaNombre").val('');
                }
            }
        });

        Control.on('keydown focusout keyup', function (e) {
            if ($(this).val() !== '') {
                tblControlesSinAsignarAlDia.DataTable().column(1).search($(this).val()).draw();
            } else {
                tblControlesSinAsignarAlDia.DataTable().column(1).search('').draw();
            }
            if (e.keyCode === 13 && $(this).val() && $(this).val().length > 5) {
                console.log('Buscando...');
                getEstiloColorParesTxParPorControl($(this).val());
                tblControlesSinAsignarAlDia.DataTable().column(1).search($(this).val()).draw();
            }
        });

        Semana.on('keydown focusout keyup', function () {
            if ($(this).val() !== '') {
                tblControlesSinAsignarAlDia.DataTable().column(6).search($(this).val()).draw();
            } else {
                tblControlesSinAsignarAlDia.DataTable().column(6).search('').draw();
            }
        }).blur(function () {
            if (Semana.val() !== '') {
                tblControlesSinAsignarAlDia.DataTable().column(6).search(Semana.val()).draw();
            } else {
                tblControlesSinAsignarAlDia.DataTable().column(6).search('').draw();
            }
        });

        getCortadores();
        getControlesSinAsignarYAsignadosAlDia();
        Anio.val(new Date().getFullYear());
    });
    function getControlesSinAsignarYAsignadosAlDia() {
        ControlesSinAsignarAlDia = tblControlesSinAsignarAlDia.DataTable(options);
        ControlesAsignadosAlDia = tblControlesAsignadosAlDia.DataTable({
            dom: 'Brtip',
            buttons: [
                {
                    text: "Todos",
                    className: 'btn btn-info btn-sm',
                    titleAttr: 'Todos',
                    action: function (dt) {
                        ControlesAsignadosAlDia.rows().select();
                    }
                },
                {
                    extend: 'selectNone',
                    className: 'btn btn-info btn-sm',
                    text: 'Ninguno',
                    titleAttr: 'Deseleccionar Todos'
                }
            ],
            "ajax": {
                "url": '<?= base_url('AsignaDiaSemACtrlParaCorte/getProgramacion') ?>',
                "dataSrc": "",
                "data": function (d) {
                    d.ANIO = (Anio.val().trim());
                    d.SEMANA = (Semana.val().trim());
                    d.CORTADOR = (Cortador.val().trim());
                    d.CONTROL = (Control.val().trim());
                    d.ESTILO = (Estilo.val().trim());
                    d.COLOR = (Color.val().trim());
                }
            },
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                }],
            "columns": [
                {"data": "ID"}, /*0*/
                {"data": "Emp"}, /*1*/
                {"data": "Control"}, /*2*/
                {"data": "Ano"}, /*3*/
                {"data": "Sem"}, /*4*/
                {"data": "Dia"}, /*5*/
                {"data": "Frac"}, /*6*/
                {"data": "Fecha"}, /*7*/
                {"data": "Estilo"}, /*8*/
                {"data": "Pares"}, /*9*/
                {"data": "Tiempo"}, /*10*/
                {"data": "Precio"} /*11*/
            ],
            language: lang,
            select: {
                style: 'single'
            },
            keys: true,
            "autoWidth": true,
            "colReorder": true,
            "displayLength": 500,
            "scrollY": "250px",
            "scrollX": true,
            "bLengthChange": false,
            "deferRender": true,
            "scrollCollapse": false,
            "bSort": true,
            "aaSorting": [
                [0, 'desc']/*ID*/
            ]
        });
    }

    function getCortadores() {
        Cortadores[0].selectize.clear(true);
        Cortadores[0].selectize.clearOptions();
        $.getJSON('<?= base_url('AsignaDiaSemACtrlParaCorte/getCortadores') ?>').done(function (data) {
            $.each(data, function (k, v) {
                Cortadores[0].selectize.addOption({text: v.EMPLEADO, value: v.CLAVE});
            });
        }).fail(function (x) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        });
    }

    function getEstiloColorParesTxParPorControl(e) {
        HoldOn.open({
            theme: 'sk-bounce',
            message: 'Por favor espere un momento...'
        });
        $.getJSON('<?= base_url('AsignaDiaSemACtrlParaCorte/getEstiloColorParesTxParPorControl') ?>', {
            CONTROL: e, TIPO: Fraccion.val()
        }).done(function (data, x, jq) {
            var r = data[0];
            if (r) {
                Estilo.val(r.ESTILO);
                Color.val(r.COLOR);
                ColorNombre.val(r.DES_COLOR);
                Pares.val(r.PARES);
                Precio.val(r.PRECIO);
                TxPar.val(r.TXPAR);
                Tiempo.val(r.TIEMPO);
                Pesos.val(r.PESOS);
                Articulo.val(r.ARTICULO);
                ClaveArticulo.val(r.CLAVE_ARTICULO);
                Estilo.focus().select();
            } else {
                swal('ATENCIÓN', 'NO SE HAN ESTABLECIDO TIEMPOS PARA ESTE CONTROL', 'warning').then((value) => {
                    Control.focus().select();
                });
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function onGuardarAsignacionDeDiaXControl() {
        if (Anio.val() && Semana.val() && Dia.val() &&
                Fraccion.val() && Cortador.val() && Control.val() &&
                Estilo.val() && Color.val() && Pesos.val() &&
                Articulo.val() && ClaveArticulo.val()) {
            console.log('GUardando...');
            $.post('<?= base_url('AsignaDiaSemACtrlParaCorte/onGuardarAsignacionDeDiaXControl'); ?>',
                    {
                        CORTADOR: Cortador.val(),
                        CONTROL: Control.val(),
                        ANIO: Anio.val(),
                        SEMANA: Semana.val(),
                        DIA: Dia.val(),
                        FRACCION: Fraccion.val(),
                        ESTILO: Estilo.val(),
                        PARES: Pares.val(),
                        TIEMPO: Pares.val(),
                        PRECIO: Pares.val(),
                        ARTICULO: Articulo.val()
                    }).done(function (data, x, jq) {
                pnlTablero.find("input[type='text'].form-control").val('');
                Cortador[0].selectize.clear(true);
                ControlesSinAsignarAlDia.ajax.reload();
                ControlesAsignadosAlDia.ajax.reload();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            });
        } else {
            $.each(pnlTablero.find("input[type='text'].form-control:not(:read-only)"), function (k, v) {
                var field = $(v);
                if (!field.val()) {
                    field.focus();
                    field.addClass("highlight-input");
                    setTimeout(function () {
                        field.removeClass("highlight-input");
                    }, 3500);
                    return false;
                }
            });
        }
    }

    function onAnadirAsignacion() {
        if (Dia.val()) {
            if (Fraccion.val()) {
                if (Cortador.val()) {
                    var row = ControlesSinAsignarAlDia.row(tblControlesSinAsignarAlDia.find("tbody tr.selected")).data();
                    if (row) {
                        console.log('row', row)
                        row["ANIO"] = Anio.val();
                        row["DIA"] = Dia.val();
                        row["CORTADOR"] = Cortador.val();
                        row["FRACCION"] = Fraccion.val();
                        $.post('<?= base_url('AsignaDiaSemACtrlParaCorte/onAnadirAsignacion'); ?>', row).done(function (data, x, jq) {
                            console.log(data);
                            Cortador[0].selectize.clear(true);
                            ControlesSinAsignarAlDia.ajax.reload();
                            ControlesAsignadosAlDia.ajax.reload();
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        });
                    } else {
                        onBeep(2);
                        swal('ATENCIÓN', 'DEBE DE SELECCIONAR UN CONTROL (NO ASIGNADO)', 'warning').then((value) => {
                            tblControlesSinAsignarAlDia.find("tbody tr").addClass("highlight-rows");
                            setTimeout(function () {
                                tblControlesSinAsignarAlDia.find("tbody tr").removeClass("highlight-rows");
                            }, 1500);
                        });
                    }
                } else {
                    onBeep(2);
                    swal('ATENCIÓN', 'ES NECESARIO ESPECIFICAR UN CORTADOR', 'warning').then((value) => {
                        Cortador[0].selectize.focus();
                        Cortador[0].selectize.open();
                    });
                }
            } else {
                onBeep(2);
                swal('ATENCIÓN', 'ES NECESARIO ESPECIFICAR UNA FRACCIÓN', 'warning').then((value) => {
                    Fraccion.focus().addClass("highlight-input");
                    setTimeout(function () {
                        Fraccion.removeClass("highlight-input");
                    }, 1500);
                });
            }
        } else {
            onBeep(2);
            swal('ATENCIÓN', 'ES NECESARIO ESPECIFICAR UN DIA', 'warning').then((value) => {
                Dia.focus().addClass("highlight-input");
                setTimeout(function () {
                    Dia.removeClass("highlight-input");
                }, 1500);
            });
        }
    }

    function onEliminarAsignacion() {
        var row = ControlesAsignadosAlDia.row(tblControlesAsignadosAlDia.find("tbody tr.selected")).data();
        console.log(row);
        if (row) {
            HoldOn.open({
                theme: 'sk-bounce',
                message: 'Eliminando...'
            });
            $.post('<?= base_url('AsignaDiaSemACtrlParaCorte/onEliminarAsignacion'); ?>', row).done(function (data, x, jq) {
                console.log(data);
                HoldOn.close();
                ControlesSinAsignarAlDia.ajax.reload();
                ControlesAsignadosAlDia.ajax.reload();
            }).fail(function (x, y, z) {
                HoldOn.close();
                console.log(x, y, z);
            });
        } else {
            onBeep(2);
            swal('ATENCIÓN', 'DEBE DE SELECCIONAR UN CONTROL ASIGNADO', 'warning');
        }
    }
</script>
<style>
    .btn-info:not(:disabled):not(.disabled):active, 
    .btn-info:not(:disabled):not(.disabled).active, 
    .show > .btn-info.dropdown-toggle {
        color: #fff;
        background-color: #99cc00;
        border: 2px solid #99cc00;
        font-weight: bold;
    }   
    .highlight-input,.highlight-input:focus{  
        color: #000;
        background:#ffcc00;
        animation: illuminate .4s;
        font-weight: bold;
        -moz-animation:illuminate .4s infinite; /* Firefox */
        -webkit-animation:illuminate .4s infinite; /* Safari and Chrome */
    } 
    .highlight-rows,.highlight-rows:focus{  
        color: #000;
        background:#ffffff ;
        animation: illuminaterow .4s;
        font-weight: bold;
        -moz-animation:illuminaterow .4s infinite; /* Firefox */
        -webkit-animation:illuminaterow .4s infinite; /* Safari and Chrome */
    } 

    @-moz-keyframes illuminaterow /* Firefox */
    {
        0%   {    border: 1px solid #2196F3;        background:#ffffff ;}
        50%  {    border: 1px solid #ff0000;        font-weight: bold;        background:#ffcc00;}
        100%   {border: 1px solid #2196F3; background:#ffffff ;}
    }

    @-webkit-keyframes illuminaterow /* Firefox */
    {
        0%   {    border: 1px solid #2196F3; background:#ffffff;}
        50%  {    border: 1px solid #ff0000;font-weight: bold;        background:#ffcc00;}
        100%   {border: 1px solid #2196F3; background:#ffffff;}
    }


    @-moz-keyframes illuminate /* Firefox */
    {
        0%   {    border: 1px solid #2196F3;        background:#ff3300;}
        50%  {    border: 1px solid #ff0000;        font-weight: bold;        background:#ffcc00;}
        100%   {border: 1px solid #2196F3; background:#ff3300;}
    }

    @-webkit-keyframes illuminate /* Firefox */
    {
        0%   {    border: 1px solid #2196F3; background:#ff3300;}
        50%  {    border: 1px solid #ff0000;font-weight: bold;        background:#ffcc00;}
        100%   {border: 1px solid #2196F3; background:#ff3300;}
    }
</style>