<div class="card mt-2 mx-2 animated fadeIn" id="pnlTablero">
    <div class="card-header" align="center">
        <h3 class="font-weight-bold">Avance</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <!--SECCION UNO-->
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <input type="text" id="usuario" name="usuario" class="form-control form-control-sm"> 
                </div>
                <div class="w-100"></div>   
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <label>Fecha</label>
                    <input type="text" id="Fecha" name="Fecha" class="form-control form-control-sm date"> 
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <label>Departamento</label>
                    <select type="text" id="Departamento" name="Departamento" class="form-control form-control-sm"></select> 
                </div>
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <label>Semana</label>
                    <input type="text" id="Semana" name="Semana" class="form-control form-control-sm numbersOnly" maxlength="2">
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <label>Control</label>
                    <input type="text" id="Control" name="Control" class="form-control form-control-sm numbersOnly" maxlength="11">
                </div> 
                <div class="w-100"></div> 
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <ul id="deptos" class="list-group my-2"> 
                    </ul> 
                </div>
                <div class="w-100"></div>  
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <label>Proceso maquila</label>
                    <select id="ProcesoMaquila" name="ProcesoMaquila" class="form-control form-control-sm"></select>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
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
                <h3>Fracciones pagadas en nomina de este control</h3>
                <table id="tblAvance" class="table table-hover">
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
            Control = pnlTablero.find("#Control"), Avances;

    $(document).ready(function () {
        getDepartamentos();
        $("#usuario").val('<?php print $_SESSION['USERNAME']; ?>');
        $.getJSON('<?php print base_url('avance_semana_actual'); ?>').done(function (d) {
            var m = $(d)[0];
            Fecha.val(m.Fecha);
            Semana.val(m.Sem);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
        $.getJSON('<?php print base_url('avance_maqplant'); ?>').done(function (d) { 
            var ProcesoMaquila = pnlTablero.find("#ProcesoMaquila");
            $.each(d, function (k, v) {
                ProcesoMaquila[0].selectize.addOption({text: v.MaquilasPlantillas, value: v.Clave});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
        $.getJSON('<?php print base_url('avance_empleados'); ?>').done(function (d) {
            var Empleado = pnlTablero.find("#Empleado");
            $.each(d, function (k, v) {
                Empleado[0].selectize.addOption({text: v.EMPLEADO, value: v.CLAVE});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
        $.getJSON('<?php print base_url('avance_fracciones'); ?>').done(function (d) {
            var Fraccion = pnlTablero.find("#Fraccion");
            $.each(d, function (k, v) {
                Fraccion[0].selectize.addOption({text: v.FRACCION, value: v.CLAVE});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });

        Control.on('keydown', function (e) {
            console.log(e.keyCode);
        });
        Control.val('').focus();
    });

    function getRecords() {

    }

    function getDepartamentos() {
        $.getJSON('<?php print base_url('departamentos'); ?>').done(function (data) {
            var ul = $("#deptos"), ul_list = '';
            $.each(data, function (k, v) {
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
</style>