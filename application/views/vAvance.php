<div class="card mt-2 mx-2 animated fadeIn" id="pnlTablero">
    <div class="card-header" align="center">
        <div class="row" style="margin-right: 0px;">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <h3 class="font-weight-bold">Avance</h3>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <h3 class="font-weight-bold"></h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <!--SECCION UNO-->
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <input type="text" id="usuario" name="usuario" class="form-control form-control-sm"> 
                </div>
                <div class="w-100"></div>   
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <label>Control</label>
                    <div class="input-group mb-3">
                        <input type="text" id="Control" name="Control" autofocus="" class="form-control form-control-sm numbersOnly" maxlength="11" placeholder="Escriba un control...">
                        <div class="input-group-append">
                            <button type="button" id="btnBuscarControl" name="btnBuscarControl" class="btn btn-info"><span class="fa fa-search"></span></button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <label>Fecha</label>
                    <input type="text" id="Fecha" name="Fecha" class="form-control form-control-sm date" > 
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <label>Departamento</label>
                    <select type="text" id="Departamento" name="Departamento" class="form-control form-control-sm"></select> 
                </div>
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <label>Semana</label>
                    <input type="text" id="Semana" name="Semana" class="form-control form-control-sm numbersOnly" maxlength="2">
                </div>
                <div class="w-100"></div> 
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <ul id="deptos" class="list-group my-2"> 
                    </ul> 
                </div>
                <div class="w-100"></div>  
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <label>Proceso maquila</label>
                    <select id="ProcesoMaquila" name="ProcesoMaquila" class="form-control form-control-sm"></select>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <label>Empleado</label>
                    <select id="Empleado" name="Empleado" class="form-control form-control-sm"></select>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <label>Fracción</label>
                    <select id="Fraccion" name="Fraccion" class="form-control form-control-sm"></select>
                </div>
                <div class="w-100"></div> 
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <label>Estilo</label>
                    <input type="text" id="Estilo" name="Estilo" class="form-control form-control-sm numbersOnly" maxlength="2">
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <label>Depto.Actual</label>
                    <input type="text" id="DeptoActual" name="DeptoActual" class="form-control form-control-sm numbersOnly" maxlength="2">
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <label>Pares</label>
                    <input type="text" id="Pares" name="Pares" class="form-control form-control-sm numbersOnly" maxlength="5">
                </div>
            </div>
            <!--SECCION DOS-->
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <h4>Fracciones pagadas en nomina de este control</h4>
                <table id="tblAvance" class="table table-hover table-sm table-bordered  compact nowrap">
                    <thead>
                        <tr>
                            <th scope="col">Emp</th>
                            <th scope="col">Semana</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Control</th>
                            <th scope="col">Maq</th>
                            <th scope="col">Estilo</th>
                            <th scope="col">Frac</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Pares</th>
                            <th scope="col">SubTotal</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table> 
            </div>
            <!--SECCION TRES-->
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center">
                <img src="<?= base_url('img/LS.png'); ?>" class="img-responsive"> 
            </div>
        </div>
    </div>
</div>
<script>
    var master_url = '<?= base_url('Avance/') ?>', pnlTablero = $("#pnlTablero");
    var Fecha = pnlTablero.find("#Fecha"), Departamento = pnlTablero.find("#Departamento"),
            Semana = pnlTablero.find("#Semana"), tblAvance = pnlTablero.find("#tblAvance"),
            Control = pnlTablero.find("#Control"), Avances, btnBuscarControl = pnlTablero.find("#btnBuscarControl");

    $(document).ready(function () {

        btnBuscarControl.click(function () {
            if (Fecha.val() && Departamento.val() && Semana.val()) {
                getDeptosXControl($(this).parent().find("#Control"));
            } else {
                swal('ATENCIÓN', 'DEBE DE ESPECIFICAR UNA FECHA,')
            }
        });

        getDepartamentos();

        $("#usuario").val('<?php print $_SESSION['USERNAME']; ?>').prop('disabled', true);

        $.getJSON('<?php print base_url('avance_maqplant'); ?>').done(function (d) {
            var ProcesoMaquila = pnlTablero.find("#ProcesoMaquila");
            d.forEach(function (v) {
                ProcesoMaquila[0].selectize.addOption({text: v.MaquilasPlantillas, value: v.Clave});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });

        $.getJSON('<?php print base_url('avance_empleados'); ?>').done(function (d) {
            var Empleado = pnlTablero.find("#Empleado");
            d.forEach(function (v) {
                Empleado[0].selectize.addOption({text: v.EMPLEADO, value: v.CLAVE});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });

        $.getJSON('<?php print base_url('avance_fracciones'); ?>').done(function (d) {
            var Fraccion = pnlTablero.find("#Fraccion");
            d.forEach(function (v) {
                Fraccion[0].selectize.addOption({text: v.FRACCION, value: v.CLAVE});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });

        Control.on('keydown', function (e) {
            console.log(e.keyCode);
            if (e.keyCode === 13) {
                getDeptosXControl($(this));
            }
        });
        Fecha.val(getActualDate());

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
            "scrollY": "498px",
            "scrollX": true,
            createdRow: function (row, data, dataIndex) {
            }
        };
        Avances = tblAvance.DataTable(xoptions);
    });

    function getDeptosXControl(c) {
        HoldOn.open({
            theme: 'sk-rect',
            message: 'Comprobando...'
        });
        $.post('<?php print base_url('avance_buscar_avance_x_control'); ?>', {CONTROL: c.val()}).done(function (data, x, y) {
            var deptos = [10, 20], deptos_del_control = JSON.parse(data), c = 0;

            console.log('*DEPTOS*');
            deptos_del_control.forEach(function (item) {
                console.log(item);
                if (deptos.indexOf(item.DEPARTAMENTO) === -1) {
                    c += 1;
                }
            });
            if (c < deptos.length) {
                onBeep(2);
                swal('ATENCIÓN', 'EL CONTROL NO CUMPLE CON LOS DEPARTAMENTOS REQUERIDOS: CORTE Y RAYADO', 'warning').then((value) => {
                    c.focus().select();
                });
            } else if (c === deptos.length) {
                onBeep(5);
                swal('ATENCIÓN', 'EL CONTROL CUMPLE CON LOS DEPARTAMENTOS REQUERIDOS: CORTE Y RAYADO, SELECCIONE EL SIGUIENTE DEPARTAMENTO', 'success').then((value) => {
                    c.focus().select();
                });
            }
            /*
             swal('ATENCIÓN', 'ESTE CONTROL NO HA PASADO POR LOS DEPARTAMENTOS REQUERIDOS','warning').then((value) => {
             });*/
        }).fail(function (x, y, z) {
            console.log(x.responseText);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getActualDate() {
        var d = new Date();
        var day = addZero(d.getDate());
        var month = addZero(d.getMonth() + 1);
        var year = addZero(d.getFullYear());
        return day + "/" + month + "/" + year;
    }

    function addZero(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function getDepartamentos() {
        $.getJSON('<?php print base_url('departamentos'); ?>').done(function (data) {
            var ul = $("#deptos"), ul_list = '';
            data.forEach(function (v) {
                Departamento[0].selectize.addOption({text: v.Departamento, value: v.Clave});
                ul_list += '<li class="list-group-item d-flex justify-content-between align-items-center">';
                ul_list += '<span class="d-none">' + v.Clave + '</span>' + v.Departamento;
                ul_list += '<span class="badge badge-primary badge-pill">!</span>';
                ul_list += '</li>';
            });
            ul.html(ul_list);
            ul.find("li").click(function () {
                Departamento[0].selectize.setValue(parseInt($(this).find("span").first().text()));
                onBeep(3);
                Semana.focus().select();
            });
        }).fail(function (x, y, z) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        });
    }

    function onBuscarAvanceXControl() {
        $.getJSON('<?php print base_url('avance_buscar_avance_x_control'); ?>').done(function (dta) {
            console.log(dta);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {

        });
    }
</script>
<style>
    .card-body{
        padding-top: 10px;
    }
    .card-header{
        padding: 0px;
    }
    li.list-group-item {  
        padding-top: 3px;
        padding-bottom: 3px;
    }  
    li.list-group-item:hover { 
        font-weight: bold; 
        color: #fff;
        cursor: pointer;
        background-color: #3f51b5;  
        -webkit-box-shadow: 0px 3px 67px 4px rgba(47,56,99,1);
        -moz-box-shadow: 0px 3px 67px 4px rgba(47,56,99,1);
        box-shadow: 0px 3px 67px 4px rgba(47,56,99,1);
        padding-top: 3px;
        padding-bottom: 3px; 
        animation: myfirst .4s;
        -moz-animation:myfirst 1.4s infinite; /* Firefox */
        -webkit-animation:myfirst 1.4s infinite; /* Safari and Chrome */
        border-radius: 5px;
    }
    .dataTables_wrapper {
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 5px;
    }
    ul.list-group {
        animation: highlight .4s;
        -moz-animation:highlight 1.4s infinite; /* Firefox */
        -webkit-animation:highlight 1.4s infinite; /* Safari and Chrome */
        border-radius: 5px;
    }
    @-moz-keyframes myfirst /* Firefox */
    {
        0%   {    border: 1px solid #2196F3}
        50%  {    border: 1px solid #6610f2;        font-weight: bold;}
        100%   {border: 1px solid #2196F3}
    }

    @-webkit-keyframes myfirst /* Firefox */
    {
        0%   {    border: 1px solid #2196F3}
        50%  {    border: 1px solid #6610f2;font-weight: bold;}
        100%   {border: 1px solid #2196F3}
    }

    @-moz-keyframes highlight /* Firefox */
    {
        0%   {    border: 2px solid #3F51B5}
        50%  {    border: 2px solid #2196f3;        }
        100%   {border: 2px solid #3F51B5}
    }

    @-webkit-keyframes highlight /* Firefox */
    {
        0%   {    border: 2px solid #3F51B5}
        50%  {    border: 2px solid #2196f3;}
        100%   {border: 2px solid #3F51B5}
    }
</style>