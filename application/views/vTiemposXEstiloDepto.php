<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-header" align="center">
        <h3 class="font-weight-bold">Tiempos por estilo departamento</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 d-none">
                <label>ID</label>
                <input type="text" class="form-control form-control-sm d-none" id="ID" maxlength="10" name="ID">
            </div> 
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2">
                <label>Estilo</label>     
                <input type="text" class="form-control form-control-sm" autofocus id="Estilo" name="Estilo" maxlength="10"  min="1" max="10">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2">
                <label>Linea</label>
                <input type="text" class="form-control form-control-sm" id="Linea" maxlength="10" name="Linea">
            </div> 
            <div id="EstiloDescripcion" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center" aling="center"> 
            </div>
            <div id="Departamentos" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-12 col-xl-12 m-2" align="left">
                <button type="button" class="btn btn-primary animated fadeIn" id="btnGuardarTiempo">GUARDAR</button>
                <button type="button" class="btn btn-danger animated fadeIn" id="btnCancelarTiempo">CANCELAR</button>
            </div>
            <div id="TiemposXEstiloDepto" class="table-responsive">
                <table id="tblTiemposXEstiloDepto" class="table table-sm display hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th><!--0-->
                            <th>LINEA</th><!--1-->

                            <th>ESTILO</th><!--2-->
                            <th>DEPARTAMENTO</th><!--3-->

                            <th>TIEMPO</th><!--4--> 
                            <th></th><!--5--> 
                            <th></th><!--6--> 
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>

                            <th></th>
                            <th></th>

                            <th></th> 
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var master_url = base_url + 'index.php/TiemposXEstiloDepto/';
    var pnlTablero = $("#pnlTablero");
    var Linea = pnlTablero.find("#Linea"), Estilo = pnlTablero.find("#Estilo");
    var btnGuardarTiempo = pnlTablero.find("#btnGuardarTiempo"), btnCancelarTiempo = pnlTablero.find("#btnCancelarTiempo");
    var TiemposXEstiloDepto;
    var tblTiemposXEstiloDepto = pnlTablero.find("#tblTiemposXEstiloDepto");
    var Departamentos = pnlTablero.find("#Departamentos");
    var nuevo = false;

    const isValidInput = (x) => {
        return x.val().trim().length > 0 ? true : false;
    };

    $(document).ready(function () {

        btnCancelarTiempo.click(function () {
            pnlTablero.find("input").val('');
            Departamentos.html('');
            Linea.attr('readonly', false);
            Estilo.attr('readonly', false);
            Linea.focus();
            tblTiemposXEstiloDepto.DataTable().column(1).search('').draw();
            tblTiemposXEstiloDepto.DataTable().column(2).search('').draw();
            Estilo.val('').focus();
            Linea.removeClass("highlight-input");
            pnlTablero.find("#EstiloDescripcion").html('');
        });

        Linea.on('keydown', function () {
            if (isValidInput(Linea)) {
                tblTiemposXEstiloDepto.DataTable().column(1).search($(this).val()).draw();
            } else {
                tblTiemposXEstiloDepto.DataTable().column(1).search('').draw();
            }
        });

        btnGuardarTiempo.click(function () {
            if (isValidInput(Linea) && isValidInput(Estilo)) {
                var deptos = [];
                $.each(pnlTablero.find("#Departamentos input.gen"), function () {
                    console.log($(this), ',', $(this).val());
                    deptos.push({DEPTO: $(this).attr('id'), DEPTOTIME: $(this).val().trim().length > 0 ? parseFloat($(this).val()) : 0});
                });
                $.post(master_url + 'onGuardarTiempos', {ID: pnlTablero.find("#ID").val(), LINEA: Linea.val(), ESTILO: Estilo.val(), TIEMPOS: JSON.stringify(deptos), N: (nuevo) ? 0 : 1}).done(function (data, x, jq) {
                    console.log(data);
                    onBeep(1);
                    pnlTablero.find("input").val('');
                    Departamentos.html('');
                    TiemposXEstiloDepto.ajax.reload();
                    nuevo = false;
                    Linea.attr('readonly', false);
                    Estilo.attr('readonly', false);
                    swal('ATENCIÓN', 'TIEMPOS GUARDADOS', 'success').then((value) => {
                        Estilo.focus();
                        tblTiemposXEstiloDepto.DataTable().column(1).search('').draw();
                        tblTiemposXEstiloDepto.DataTable().column(2).search('').draw();
                        pnlTablero.find("#EstiloDescripcion").html('');
                    });
                }).fail(function (x, y, z) {
                    console.log(x.responseText);
                }).always(function () {

                });
            } else {
                onBeep(2);
                swal('ATENCIÓN', 'LA LINEA Y EL ESTILO SON NECESARIOS PARA PODER GUARDAR ESTOS TIEMPOS', 'warning').then((value) => {
                    if (!isValidInput(Linea)) {
                        Linea.focus();
                    } else if (!isValidInput(Estilo)) {
                        Estilo.focus();
                    }
                });
            }
        });

        Estilo.on('keydown', function (e) {
            var input = $(this);
            if ($(this).val() !== '') {
                tblTiemposXEstiloDepto.DataTable().column(2).search($(this).val()).draw();
            } else {
                tblTiemposXEstiloDepto.DataTable().column(2).search('').draw();
            }
            if (e.keyCode === 13) {
                if (input.val().trim().length > 0) {
                    onBeep(1);
                    $.getJSON(master_url + 'getDepartamentosXEstilo', {ESTILO: input.val()}).done(function (data) {
                        console.log(data, data.length);
                        if (data.length > 0) {
                            var deptos = '<div class="row">';
                            $.each(data, function (k, v) {
                                deptos += '<div class="col-12 col-sm-4 col-md-3 col-lg-2 col-xl-2">';
                                deptos += '<label>' + v.Descripcion + '</label>';
                                deptos += '<input id="' + v.Clave + '" type="text" class="form-control form-control-sm numbersOnly gen" placeholder="0.0">';
                                deptos += '</div>';
                            });
                            deptos += '</div>';
                            Departamentos.html(deptos);
                            Departamentos.find("input:eq(0)").focus().select();
                            $.getJSON(master_url + 'onComprobarTiempoXEstiloDeptos', {ESTILO: input.val()}).done(function (dta) {
                                console.log('EXISTE ? ', dta);
                                if (dta.length > 0) {
                                    $.each(dta, function (k, v) {
                                        Departamentos.find("#" + v.CLAVE_DEPARTAMENTO).val(v.TIEMPO);
                                        Linea.val(v.LINEA);
                                        pnlTablero.find("#ID").val(v.ID);
                                    });
                                    Departamentos.find("input:eq(0)").focus().select();
                                    Linea.attr('readonly', true);
                                    Estilo.attr('readonly', true);
                                    nuevo = false;
                                } else {
                                    Linea.addClass("highlight-input");
                                    setTimeout(function () {
                                        Linea.removeClass("highlight-input");
                                    }, 3500);
                                    $.getJSON(master_url + 'getLineaXEstilo', {ESTILO: input.val()}).done(function (dt) {
                                        if (dt.length > 0) {
                                            Linea.val(dt[0].LINEA);
                                            pnlTablero.find("#EstiloDescripcion").html('<h1>' + dt[0].ESTILO + '</h1>');
                                        }
                                    });
                                    Linea.attr('readonly', false);
                                    Estilo.attr('readonly', false);
                                    nuevo = true;
                                }
                            }).fail(function (x, y, z) {
                                console.log(x.responseText);
                            }).always(function () {

                            });
                        } else {
                            onBeep(2);
                            nuevo = false;
                            Departamentos.html('');
                            Linea.val('');
                            swal('ATENCIÓN', 'EL ESTILO "' + input.val() + ' NO TIENE FICHA TÉCNICA O NO EXISTE', 'warning').then((value) => {
                                Estilo.focus().select();
                            });
                        }
                    }).fail(function (x, y, z) {
                        console.log(x.responseText);
                    }).always(function () {

                    });
                } else {
                    onBeep(2);
                    input.focus();
                }
            }
        });
        getTiemposXEstilo();
    });

    function getTiemposXEstilo() {

        var cols = [
            {"data": "ID"}/*0*/,
            {"data": "LINEA"}/*1*/,
            {"data": "ESTILO"}/*2*/,
            {"data": "DEPARTAMENTO"}/*3*/,
            {"data": "TIEMPO"}/*4*/,
            {"data": "TIEMPO_BTN"}/*5*/,
            {"data": "IDD"}/*5*/
        ];
        var coldefs = [
            {
                "targets": [0],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [1],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [2],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [3],
                "visible": true,
                "searchable": true,
                "orderable": false
            },
            {
                "targets": [4],
                "visible": true,
                "searchable": true,
                "orderable": false
            },
            {
                "targets": [5],
                "visible": true,
                "searchable": true,
                "orderable": false
            },
            {
                "targets": [6],
                "visible": false,
                "searchable": true,
                "orderable": false
            }
        ];
        const xoptions = {
            "dom": 'rt',
            buttons: buttons,
            "ajax": {
                "url": master_url + 'getTiemposXEstiloDepto',
                "dataSrc": ""
            },
            "columns": cols,
            "columnDefs": coldefs,
            language: lang,
            select: true,
            "autoWidth": true,
            "colReorder": false,
            "displayLength": 99999999,
            "bLengthChange": false,
            "deferRender": true,
            "scrollCollapse": false,
            "bSort": true,
            "scrollY": "400px",
            "scrollX": true,
            rowGroup: {
                startRender: function (rows, group) {
                    return '<span class="d-none row-id">' + $(rows.data().pluck('ID')).eq(0)[0] + '</span>Linea ' + $(rows.data().pluck('LINEA')).eq(0)[0] + ' | Estilo ' + group + ' | (' + rows.count() + ' deptos) | <span class="btn btn-danger" onclick="onEliminarTiemposXEstiloDeptos(this)"><span class="fa fa-trash"></span></span>';
                },
                endRender: function (rows, group) {
                    var stc = $.number(rows.data().pluck('TIEMPO').reduce(function (a, b) {
                        return a + parseFloat(b);
                    }, 0), 2, '.', ',');
                    return $('<tr>').append('<td align="right">Total del estilo ' + group + ', linea ' + $(rows.data().pluck('LINEA')).eq(0)[0] + '</td><td>' + stc + '</td><td></td></tr>');
                },
                dataSrc: "ESTILO"
            },
            createdRow: function (row, data, dataIndex) {
            }
        };
        TiemposXEstiloDepto = tblTiemposXEstiloDepto.DataTable(xoptions);
        tblTiemposXEstiloDepto.on('click', 'tr', function () {
            var data = TiemposXEstiloDepto.row(this).data();
        });
        Estilo.focus();
    }

    function onEliminarTiemposXEstiloDeptos(r) {
        onBeep(2);
        swal({
            buttons: ["Cancelar", "Aceptar"],
            title: 'Estás Seguro?',
            text: "Esta acción eliminará los tiempos de esta linea/estilo",
            icon: "warning",
            closeOnEsc: false,
            closeOnClickOutside: false
        }).then((action) => {
            if (action) {
                onBeep(1);
                var IDX = $(r).parents('.group-start').find("span.row-id").text();
                $.post(master_url + 'onEliminarDeptosXEstilo', {ID: IDX}).done(function (data) {
                    swal({
                        title: 'ATENCIÓN',
                        text: 'SE HAN ELIMINADO LOS TIEMPOS DE ESTE ESTILO',
                        icon: 'success',
                        timer: 2000
                    });
                    btnCancelarTiempo.trigger('click');
                    TiemposXEstiloDepto.ajax.reload();
                }).fail(function (x, y, z) {
                    console.log(x.responseText);
                    swal('ATENCIÓN', 'NO HA SIDO POSIBLE ELIMINAR ESTE TIEMPO, VERIFIQUE LA CONSOLA.', 'warning');
                }).always(function () {
                });
            }
        });
    }
    function onEliminarDeptoXEstilo(r) {
        var row = TiemposXEstiloDepto.row($(r).parents('tr')).data();
        $.post(master_url + 'onEliminarDeptoXEstilo', {ID: row.ID, IDD: row.IDD}).done(function (data) {
            console.log(data);
            Departamentos.html('');
            TiemposXEstiloDepto.row($(r).parents('tr')).remove().draw();
            swal({
                title: 'INFO',
                text: 'SE HA EL TIEMPO DE ESTE ESTILO',
                icon: 'success',
                timer: 2000
            });
        }).fail(function (x, y, z) {
            console.log(x.responseText);
            swal('ATENCIÓN', 'NO HA SIDO POSIBLE ELIMINAR ESTE TIEMPO, VERIFIQUE LA CONSOLA.', 'warning');
        }).always(function () {

        });
    }
</script>
<style>
    table.dataTable tr.group td{
        font-size: 14px;
        font-weight: normal;
    }

    table tbody tr.group-start:hover,table tbody tr.group-end:hover{
        background-color: #2C3E50;
        color: #000 !important;
    }

    tbody tr.group-start:hover td, table tbody tr.group-end:hover td{
        background-color: #2C3E50;
        color: #FFEB3B !important;
    }

    .highlight-input{  
        color: #000;
        background:#e1fcff;
        animation: myfirst .4s;
        -moz-animation:myfirst .4s infinite; /* Firefox */
        -webkit-animation:myfirst .4s infinite; /* Safari and Chrome */
    }

    .form-control[readonly].highlight-input {
        color: #000;
        background:#e1fcff;
        animation: myfirst .4s;
        -moz-animation:myfirst .4s infinite; /* Firefox */
        -webkit-animation:myfirst .4s infinite; /* Safari and Chrome */
    }

    @-moz-keyframes myfirst /* Firefox */
    {
        0%   {    border: 1px solid #2196F3}
        50%  {    border: 1px solid #ff0000;        font-weight: bold;}
        100%   {border: 1px solid #2196F3}
    }

    @-webkit-keyframes myfirst /* Firefox */
    {
        0%   {    border: 1px solid #2196F3}
        50%  {    border: 1px solid #ff0000;font-weight: bold;}
        100%   {border: 1px solid #2196F3}
    }
</style>