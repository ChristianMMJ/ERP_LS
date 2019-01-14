<div class="card m-3 animated slideInDown" id="pnlTablero">
    <div class="card-header">   
        <div class="row">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 text-center">
                <h3 class="font-weight-bold" style="margin-bottom: 0px;">Avance por empleado y pago de nomina</h3>
            </div> 
        </div>
    </div>
    <div class="card-body" style="padding-top: 10px; padding-bottom: 10px;">
        <div class="row">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <label>Empleado</label>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <input type="text" id="NumeroDeEmpleado" name="NumeroDeEmpleado" class="form-control numeric" placeholder="2805" style="height: 75px; font-weight: bold; font-size: 50px;" autofocus="">
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <input type="text" id="NombreEmpleado" name="NombreEmpleado" class="form-control" placeholder="-" disabled="" style="height: 75px; font-weight: bold; font-size: 50px; text-align: center;">
            </div>
            <div class="w-100 my-1"></div>
            <!--FIN BLOQUE 2 COL 6-->
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" align="center">
                <h4>Fracciones de este empleado</h4>
                <table id="tblAvance" class="table table-hover table-sm table-bordered  compact nowrap" style="width: 100% !important;">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Control</th>

                            <th scope="col">Estilo</th>
                            <th scope="col">Frac.</th>
                            <th scope="col">Pares</th>

                            <th scope="col">Precio</th>
                            <th scope="col">SubTotal</th> 
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div><!--FIN BLOQUE 2 COL 6-->
            <!--INICIO BLOQUE 2 COL 6-->
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="row">  
                    <div id="ManoDeObra" class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 row" style="border-radius: 5px;">
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h4>Mano de obra</h4>  
                        </div> 
                        <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="chk99CorteForro">
                                <label class="custom-control-label" for="chk99CorteForro">99 Corte forro</label>
                            </div>
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> 
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="chk100CortePiel">
                                <label class="custom-control-label" for="chk100CortePiel">100 Corte piel</label>
                            </div>
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> 
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="chk96CorteMuestras">
                                <label class="custom-control-label" for="chk96CorteMuestras">96 Corte muestras</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <label>Semana</label>
                        <input type="text" id="Semana" name="Semana" class="form-control numeric" maxlength="2" disabled="">
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <label>Fecha</label>
                        <input type="text" id="Fecha" name="Fecha" class="form-control date notEnter">
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <label>Departamento</label>
                        <input type="text" id="Departamento" name="Departamento" class="form-control " maxlength="3">
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <label>Control</label>
                        <input type="text" id="Control" name="Control" class="form-control numeric" maxlength="10">
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <label>Estilo</label>
                        <input type="text" id="Estilo" name="Estilo" class="form-control">
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <label>Pares</label>
                        <input type="text" id="Pares" name="Pares" class="form-control numeric">
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <label>Avance</label>
                        <input type="text" id="Avance" name="Avance" class="form-control numeric">
                    </div>

                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-none">
                        <label>MO</label>
                        <input type="text" id="ManoDeOB" name="ManoDeOB" class="form-control numeric" readonly="">
                        <label>AN</label>
                        <input type="text" id="Anio" name="Anio" class="form-control numeric" readonly="">
                    </div> 

                    <div class="col-12 my-1">
                        <hr>
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" align="center">
                        <h3>Pago de nomina</h3>
                        <div id="DiasPagoDeNomina" class="row"></div>
                    </div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" align="center">
                        <h3>Estatus actual del avance</h3>
                        <input type="text" id="EstatusAvance" name="EstatusAvance" class="form-control" style="text-align: center">
                    </div>
                </div>
            </div><!--FIN BLOQUE 2 COL 6-->
        </div>
    </div>
</div>
<script>
    var dias = ["JUEVES", "VIERNES", "SABADO", "DOMINGO", "LUNES", "MARTES", "MIERCOLES"],
            ndias = ["LUNES", "MARTES", "MIERCOLES", "JUEVES", "VIERNES", "SABADO", "DOMINGO"],
            pnlTablero = $("#pnlTablero").find("div.card-body"),
            DiasPagoDeNomina = pnlTablero.find("#DiasPagoDeNomina"), Avance,
            tblAvance = pnlTablero.find("#tblAvance"),
            NumeroDeEmpleado = pnlTablero.find("#NumeroDeEmpleado"),
            NombreEmpleado = pnlTablero.find("#NombreEmpleado"),
            Semana = pnlTablero.find("#Semana"),
            Fecha = pnlTablero.find("#Fecha"),
            Control = pnlTablero.find("#Control"),
            Departamento = pnlTablero.find("#Departamento"),
            Estilo = pnlTablero.find("#Estilo"),
            Pares = pnlTablero.find("#Pares"),
            SigAvance = pnlTablero.find("#Avance"),
            EstatusAvance = pnlTablero.find("#EstatusAvance"),
            ManoDeOB = pnlTablero.find("#ManoDeOB"),
            Anio = pnlTablero.find("#Anio");

    var AvanceNomina = {
        NUMERO_EMPLEADO: 0,
        CONTROL: '',
        ESTILO: '',
        FRACCION: '',
        NUMERO_FRACCION: 0,
        PRECIO_FRACCION: 0,
        PARES: 0,
        FECHA: '',
        SEMANA: 0,
        DEPARTAMENTO: 0,
        ANIO: 0
    };

    // IIFE - Immediately Invoked Function Expression
    $(document).ready(function () {
        handleEnter();

        Anio.val(new Date().getFullYear());

        Control.on('keydown', function (e) {
            if (e.keyCode === 13) {
                HoldOn.open({
                    theme: 'sk-rect',
                    message: 'Espere...'
                });
                var fra = pnlTablero.find("#chk99CorteForro")[0].checked ? 99 : (pnlTablero.find("#chk100CortePiel")[0].checked ? 100 : (pnlTablero.find("#chk96CorteMuestras")[0] ? 96 : ''));
                $.getJSON('<?php print base_url('obtener_estilo_pares_por_control_fraccion'); ?>', {CR: Control.val(), FR: fra}).done(function (data) {
                    if (data.length > 0) {
                        var r = data[0];
                        Estilo.val(r.Estilo);
                        Pares.val(r.Pares);
                        ManoDeOB.val(r.CostoMO);
                        $.getJSON('<?php print base_url('obtener_ultimo_avance_por_control'); ?>', {C: Control.val()}).done(function (data) {
                            if (data.length > 0) {
                                SigAvance.val(data[0].Departamento);
                                EstatusAvance.val(data[0].DepartamentoT);
                                var d = new Date();
                                var n = d.getDay();
                                DiasPagoDeNomina.find("#txt" + ndias[n - 1]).val(parseFloat(r.Pares) * parseFloat(r.CostoMO));
                                var tt = 0;
                                ndias.forEach(function (i) {
                                    console.log('input dias: ', i, ' - ', $("#txt" + i).val());
                                    tt += parseFloat(pnlTablero.find("#txt" + i).val());
                                });
                                DiasPagoDeNomina.find("#txtTotal").val(parseFloat(r.Pares) * parseFloat(r.CostoMO));
                                AvanceNomina.NUMERO_EMPLEADO = NumeroDeEmpleado.val();
                                AvanceNomina.CONTROL = Control.val();
                                AvanceNomina.ESTILO = Estilo.val();
                                AvanceNomina.NUMERO_FRACCION = fra;
                                AvanceNomina.FRACCION = fra;
                                AvanceNomina.PRECIO_FRACCION = ManoDeOB.val();
                                AvanceNomina.PARES = Pares.val();
                                AvanceNomina.FECHA = Fecha.val();
                                AvanceNomina.SEMANA = Semana.val();
                                AvanceNomina.DEPARTAMENTO = Departamento.val();
                                AvanceNomina.ANIO = pnlTablero.find("#Anio").val();

                                $.post('<?php print base_url('avance_add_avance_x_empleado_add_nomina') ?>', AvanceNomina).done(function (data) {
                                    console.log("\n", "* AVANCE NOMINA *", "\n", data, JSON.parse(data));
                                    var dt = JSON.parse(data);
                                    if (data !== undefined && data.length > 0) {
                                        if (dt.AVANZO > 0) {
                                            Avance.ajax.reload();
                                            swal('ATENCIÓN', 'SE HA AVANZADO EL CONTROL Y SE HA HECHO EL PAGO AL EMPLEADO ' + NumeroDeEmpleado.val(), 'success');
                                            onClearMO();
                                            NumeroDeEmpleado.focus();
                                        } else {
                                            onBeep(2);
                                            Avance.ajax.reload();
                                            swal('ATENCIÓN', 'ESTE CONTROL YA TIENE UN AVANCE EN ESTA FRACCIÓN O AUN NO SE HA REGISTRADO UN RETORNO DE MATERIAL AL ALMACEN, POR FAVOR ESPECIFIQUE UN CONTROL DIFERENTE O UNA FRACCIÓN DIFERENTE, DE LO CONTRARIO REVISE CON EL AREA CORRESPONDIENTE', 'warning').then((value) => {
                                                onClearMO();
                                            });
                                        }
                                    }
                                }).fail(function (x, y, z) {
                                    console.log(x.responseText);
                                }).always(function () {
                                });
                            }
                        }).fail(function (x, y, z) {
                            console.log(x.responseText);
                            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, REVISE LA CONSOLA PARA MÁS DETALLE', 'error');
                        }).always(function () {
                            HoldOn.close();
                        });
                    } else {
                        swal('ATENCIÓN', 'LA FRACCIÓN O EL CONTROL NO SON CORRECTAS, ELIJA OTRA FRACCIÓN O ESPECIFIQUE UN CONTROL CON LA FRACCIÓN SELECCIONADA', 'error').then((value) => {
                            Control.focus().select();
                            Estilo.val('');
                            Pares.val('');
                            SigAvance.val('');
                        });
                    }
                }).fail(function (x, y, z) {
                    console.log(x.responseText);
                    swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, REVISE LA CONSOLA PARA MÁS DETALLE', 'error');
                }).always(function () {
                    HoldOn.close();
                });
            }
        });

        pnlTablero.find("input[type='checkbox']").change(function () {
            onCheckFraccion(this);
            if ($(this)[0].checked) {
                Control.focus().select();
                pnlTablero.find("#ManoDeObra label.custom-control-label").removeClass("highlight");
            } else {
                if (pnlTablero.find("input[type='checkbox']:checked").length <= 0) {
                    pnlTablero.find("#ManoDeObra label.custom-control-label").addClass("highlight");
                } else {
                    pnlTablero.find("#ManoDeObra label.custom-control-label").removeClass("highlight");
                }
            }
        });

        NumeroDeEmpleado.on('keydown', function (e) {
            if (e.keyCode === 13) {
                HoldOn.open({
                    theme: 'sk-rect',
                    message: 'Comprobando...'
                });
                $.post('<?php print base_url('comprobar_numero_de_empleado') ?>', {EMPLEADO: NumeroDeEmpleado.val()})
                        .done(function (data) {
                            var dt = JSON.parse(data);
                            if (dt.length > 0) {
                                NombreEmpleado.val(dt[0].NOMBRE_COMPLETO);
                                Departamento.val(dt[0].DEPTOCTO);
                                $.getJSON('<?php print base_url('obtener_semana_fecha'); ?>').done(function (data) {
                                    Semana.val((data.length > 0) ? data[0].Sem : '');
                                    Fecha.val((data.length > 0) ? data[0].Fecha : '');
                                    $.getJSON('<?php print base_url('obtener_pagos_de_nomina_x_empleado'); ?>',
                                            {EMPLEADO: NumeroDeEmpleado.val(), SEMANA: Semana.val()}).done(function (a) {
                                        if (a.length > 0) {
                                            var b = a[0];
                                            var tt = 0;
                                            ndias.forEach(function (i) {
                                                pnlTablero.find("#txt" + i).val(b[i]);
                                                tt += $.isNumeric(b[i]) ? parseFloat(b[i]) : 0;
                                            });
                                            pnlTablero.find("#txtTotal").val(tt);
                                        }
                                    }).fail(function (x, y, z) {
                                        console.log(x.responseText);
                                        onBeep(3);
                                        swal('ERROR', ' ERROR AL OBTENER LO PAGADO AL EMPLEADO, REVISE LA CONSOLA PARA MÁS DETALLE', 'error');
                                    }).always(function () {

                                    });
                                }).fail(function (x, y, z) {
                                    console.log(x.responseText);
                                    swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, REVISE LA CONSOLA PARA MÁS DETALLE', 'error');
                                }).always(function () {

                                });
                                swal('ATENCIÓN', 'SELECCIONE UNA FRACCIÓN', 'success').then((value) => {
                                    pnlTablero.find("#ManoDeObra label.custom-control-label").addClass("highlight");
                                });
                            } else {
                                NombreEmpleado.val('');
                                onBeep(2);
                                swal('ATENCIÓN', 'ESTE EMPLEADO NO ES APTO PARA DAR AVANCES O ESTA DADO DE BAJA', 'warning').then((value) => {
                                    NumeroDeEmpleado.focus().select();
                                });
                            }
                        }).fail(function (x, y, z) {
                    console.log(x.responseText);
                    swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, REVISE LA CONSOLA PARA MÁS DETALLE', 'error');
                }).always(function () {
                    HoldOn.close();
                });
            }
        });

        /*FRACCIONES*/
        var fracciones = '';
        dias.forEach(function (i) {
            fracciones += '<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 my-1">' +
                    '<label>' + i + '</label>' +
                    '</div>' +
                    '<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">' +
                    '<input type="text" id="txt' + i + '" name="txt' + i + '" class="form-control" placeholder="0"  style="font-weight: bold; text-align: center;" readonly="">' +
                    '</div>';
        });
        fracciones += '<div class="col-12"><hr></div><div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">' +
                '<label>TOTAL</label>' +
                '</div>' +
                '<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">' +
                '<input type="text" id="txtTotal" disabled="" name="txtTotal" class="form-control" placeholder="0"  style="font-weight: bold; text-align: center;">' +
                '</div>';
        DiasPagoDeNomina.html(fracciones);

        /*AVOID C&P*/
//        var _0x6b99 = ["\x63\x75\x74\x20\x63\x6F\x70\x79\x20\x70\x61\x73\x74\x65",
//            "\x70\x72\x65\x76\x65\x6E\x74\x44\x65\x66\x61\x75\x6C\x74",
//            "\x6F\x6E",
//            "\x62\x6F\x64\x79"];
//        $(_0x6b99[3])[_0x6b99[2]]
//                (_0x6b99[0], function (_0xd777x1) {
//                    _0xd777x1[_0x6b99[1]]();
//                });

        var cols = [
            {"data": "ID"}/*0*/, {"data": "FECHA"}/*1*/,
            {"data": "CONTROL"}/*2*/, {"data": "ESTILO"},
            {"data": "FRAC"}, {"data": "PARES"},
            {"data": "PRECIO"}, {"data": "SUBTOTAL"}
        ];
        var coldefs = [
            {
                "targets": [0],
                "visible": false,
                "searchable": false
            }
        ];
        var xoptions = {
            "dom": 'rit',
            buttons: buttons,
            "columns": cols,
            "columnDefs": coldefs,
            language: lang,
            select: true,
            "autoWidth": true,
            "colReorder": true,
            "displayLength": 99999999,
            "bLengthChange": false,
            "deferRender": true,
            "scrollCollapse": false,
            "bSort": true,
            "scrollY": "125px",
            "scrollX": true,
            createdRow: function (row, data, dataIndex) {
            }
        };
        xoptions.ajax = {
            "url": '<?php print base_url('obtener_avances_pago_nomina'); ?>',
            "type": "POST",
            "dataSrc": "",
            "data": function (d) {
            }
        };
        Avance = tblAvance.DataTable(xoptions);
    });

    function onCheckFraccion(e) {
        $.each(pnlTablero.find("input[type='checkbox']"), function (k, v) {
            if ($(e)[0].id !== $(v)[0].id) {
                $(v)[0].checked = false;
            }
        });
    }

    function onClearMO() {
        Control.focus().select();
        Estilo.val('');
        Pares.val('');
        SigAvance.val('');
        $.each(pnlTablero.find("input[type='checkbox']"), function (k, v) {
            $(v)[0].checked = false;
        });
        Semana.val('');
        Fecha.val('');
        Departamento.val('');
        ndias.forEach(function (i) {
            pnlTablero.find("#txt" + i).val('');
        });
        pnlTablero.find("#txtTotal").val('');
    }
</script>
<style>
    .custom-checkbox:hover, .custom-checkbox label:hover{
        cursor: pointer;
    }
    .custom-control-label{
        margin-top: 2px;
        border-radius: 4px;
        padding-left: 10px;
        padding-right: 10px;  
    }

    .highlight{
        border-radius: 4px;
        padding-left: 10px;
        padding-right: 10px;    
        background:#ffcc33;
        animation: highlight .5s;
        -moz-animation:highlight .5s infinite; /* Firefox */
        -webkit-animation:highlight .5s infinite; /* Safari and Chrome */
        font-weight: bold;
    }

    @-moz-keyframes highlight /* Firefox */
    {
        0%   {background:#cbe971;color:#000;}  
        75%  {background:#99cc00;color:#000;}
        100%   {background:#cbe971;color:#000;}
    }

    @-webkit-keyframes highlight /* Firefox */
    {
        0%   {background:#cbe971;color:#000;}  
        75%  {background:#99cc00;color:#000;}
        100%   {background:#cbe971;color:#000;}
    }

</style>