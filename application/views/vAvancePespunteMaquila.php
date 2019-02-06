<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-header">   
        <div class="row">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 text-center">
                <h3 class="font-weight-bold" style="margin-bottom: 0px;">Avance a pespunte x maquila</h3>
            </div>
        </div>
    </div>
    <div class="card-body" style="padding-top: 0px; padding-bottom: 10px;">
        <div class="row">
            <div class="col-12 col-xs-12 col-sm-4 col-lg-4 col-xl-4">
                <label>Maquila</label>
                <select id="Maquila" name="Maquila" class="form-control"></select>
            </div>
            <div class="col-12 col-xs-12 col-sm-4 col-lg-4 col-xl-4">
                <label>Empleado</label>
                <select id="Empleado" name="Empleado" class="form-control"></select>
            </div>
            <div class="col-12 col-xs-12 col-sm-4 col-lg-4 col-xl-4">
                <label>Documento</label>
                <input type="text" id="Documento" name="Documento" class="form-control form-control-sm">
            </div>
            <div class="col-12 col-xs-12 col-sm-2 col-lg-2 col-xl-2">
                <label>Control</label>
                <input type="text" id="Control" name="Control" class="form-control form-control-sm">
            </div>
            <div class="col-12 col-xs-12 col-sm-1 col-lg-1 col-xl-1">
                <label>Frac</label>
                <input type="text" id="Frac" name="Frac" class="form-control form-control-sm">
            </div>
            <div class="col-12 col-xs-12 col-sm-2 col-lg-2 col-xl-2">
                <label>Estilo</label>
                <input type="text" id="Estilo" name="Estilo" class="form-control form-control-sm">
            </div>
            <div class="col-12 col-xs-12 col-sm-2 col-lg-2 col-xl-2">
                <label>Color</label>
                <select id="Color" name="Color" class="form-control"></select>
            </div>
            <div class="col-12 col-xs-12 col-sm-1 col-lg-1 col-xl-1">
                <label>Pares</label>
                <input type="text" id="Pares" name="Pares" class="form-control form-control-sm numeric">
            </div>
            <div class="col-12 col-xs-12 col-sm-1 col-lg-1 col-xl-1">
                <label>Status</label>
                <input type="text" id="Ava" name="Ava" class="form-control form-control-sm">
            </div>
            <div class="col-12 col-xs-12 col-sm-1 col-lg-1 col-xl-1">
                <label>Sem</label>
                <input type="text"  id="Sem" name="Sem" class="form-control form-control-sm numeric">
            </div>
            <div class="col-12 col-xs-12 col-sm-1 col-lg-1 col-xl-1">
                <label>Fecha</label>
                <input id="Fecha" name="Fecha" class="form-control form-control-sm date notEnter">
            </div>
            <div class="col-12 col-xs-12 col-sm-1 col-lg-1 col-xl-1"> 
                <button type="button" id="btnAgregar" name="btnAgregar" class="btn btn-primary mt-4">
                    <span class="fa fa-check"></span>
                </button>
            </div>
            <div class="w-100 my-3"></div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h4>Controles listos para pespunte</h4>
                <table id="tblControlesListosParaPespunte" class="table  table-sm table-bordered" style="width:  100%;">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Control</th>
                            <th scope="col">Estilo</th>
                            <th scope="col">Color</th>
                            <th scope="col">Par</th>

                            <th scope="col">Entrega</th>
                            <th scope="col">Maq</th>
                        </tr>
                    </thead>
                    <tbody> 
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h4>Controles entregados</h4> 
                <table id="tblControlesEntregados" class="table table-hover table-sm table-bordered  compact nowrap" style="width:  100%;">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Maq</th>
                            <th scope="col">Emp</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Control</th>

                            <th scope="col">Estilo</th>
                            <th scope="col">Col</th>
                            <th scope="col">-</th>
                            <th scope="col">Pares</th>
                            <th scope="col">Docto</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
</div> 
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script>
    var pnlTablero = $("#pnlTablero"), Empleado = pnlTablero.find("#Empleado"), Maquila = pnlTablero.find("#Maquila");
    var ControlesListosParaPespunte, tblControlesListosParaPespunte = pnlTablero.find("#tblControlesListosParaPespunte"),
            ControlesEntregados, tblControlesEntregados = pnlTablero.find("#tblControlesEntregados"),
            Estilo = pnlTablero.find("#Estilo"), Color = pnlTablero.find("#Color"),
            btnAgregar = pnlTablero.find("#btnAgregar");

    $(document).ready(function () {
        getMaquilas();
        getEmpleados();
        Estilo.on('keydown', function (e) {
            if (e.keyCode === 13) {
                getColoresXEstilo(this);
            }
        });
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
        ControlesListosParaPespunte = tblControlesListosParaPespunte.DataTable(xoptions);
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
        ControlesEntregados = tblControlesEntregados.DataTable(xoptions);
    });

    function getColoresXEstilo(e) {
        $.getJSON("<?php print base_url('avance_a_pespunte_x_maquila_colores_x_estilo') ?>", {ESTILO: $(e).val()}).done(function (x, y, z) {
            x.forEach(function (i) {
                Color[0].selectize.addOption({text: i.COLOR, value: i.CLAVE});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
            swal('OPS!', 'ALGO SALIO MAL, REVISE LA CONSOLA PARA MÁS DETALLE', 'error');
        }).always(function () {
            HoldOn.close();
        });
    }

    function getMaquilas() {
        $.getJSON('<?php print base_url('avance_a_pespunte_x_maquila_maquilas'); ?>').done(function (x, y, z) {
            x.forEach(function (i) {
                Maquila[0].selectize.addOption({text: i.MAQUILA, value: i.CLAVE});
            });
        }).fail(function (x, y, z) {
            console.log(x.responseText);
            swal('OPS!', 'ALGO SALIO MAL, REVISE LA CONSOLA PARA MÁS DETALLE', 'error');
        }).always(function () {

        });
    }

    function getEmpleados() {
        $.getJSON('<?php print base_url('avance_a_pespunte_x_maquila_empleados'); ?>').done(function (x, y, z) {
            x.forEach(function (i) {
                Empleado[0].selectize.addOption({text: i.EMPLEADO, value: i.CLAVE});
            });
        }).fail(function (x, y, z) {
            console.log(x.responseText);
            swal('OPS!', 'ALGO SALIO MAL, REVISE LA CONSOLA PARA MÁS DETALLE', 'error');
        }).always(function () {

        });
    }
</script>
<style>
    .card{
        background-color: #f9f9f9;
        border-width: 1px 2px 2px;
        border-style: solid; 
        border-image: linear-gradient(to bottom,  #0099cc, #cc0000, rgb(0,0,0,0)) 1 100% ;
        border-image: linear-gradient(to bottom,  #0099cc, #cc0000, rgb(0,0,0,0)) 1 100% ;
        
    }
    .card-header{ 
        background-color: transparent;
        border-bottom: 0px;
        
    }
</style>