<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-header">   
        <div class="row">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 text-center">
                <h3 class="font-weight-bold" style="margin-bottom: 0px;">Avance a tejido</h3>
            </div>
        </div>
    </div>
    <div class="card-body" style="padding-top: 0px; padding-bottom: 10px;">
        <div class="row">
            <div class="col-12 col-xs-12 col-sm-4 col-lg-4 col-xl-4">
                <label>Chofer</label>
                <select id="Chofer" name="Chofer" class="form-control form-control-sm"></select>
            </div>
            <div class="col-12 col-xs-12 col-sm-4 col-lg-4 col-xl-4">
                <label>Tejedora</label>
                <select id="Tejedora" name="Tejedora" class="form-control form-control-sm"></select>
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
                <select id="Color" name="Color" class="form-control form-control-sm"></select>
            </div>
            <div class="col-12 col-xs-12 col-sm-1 col-lg-1 col-xl-1">
                <label>Pares</label>
                <input type="text" id="Pares" name="Pares" class="form-control form-control-sm">
            </div>
            <div class="col-12 col-xs-12 col-sm-1 col-lg-1 col-xl-1">
                <label>Ava</label>
                <input id="Ava" name="Ava" class="form-control form-control-sm">
            </div>
            <div class="col-12 col-xs-12 col-sm-1 col-lg-1 col-xl-1">
                <label>Sem</label>
                <input id="Sem" name="Sem" class="form-control form-control-sm">
            </div>
            <div class="col-12 col-xs-12 col-sm-1 col-lg-1 col-xl-1">
                <label>Fecha</label>
                <input id="Fecha" name="Fecha" class="form-control form-control-sm date notEnter">
            </div>
            <div class="w-100 my-3"></div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h4>Controles listos para tejido</h4>
                <table id="tblControlesListosParaTejido" class="table  table-sm table-bordered" style="width:  100%;">
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
                            <th scope="col">Chof</th>
                            <th scope="col">Teje</th>
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
<script>
var pnlTablero = $("#pnlTablero");
var Chofer = pnlTablero.find("#Chofer"), Tejedora = pnlTablero.find("#Tejedora"), Estilo = pnlTablero.find("#Estilo");
var ControlesListosParaTejido, tblControlesListosParaTejido = pnlTablero.find("#tblControlesListosParaTejido"),
        ControlesEntregados, tblControlesEntregados = pnlTablero.find("#tblControlesEntregados");

$(document).ready(function () {
    getChoferes();
    getTejedoras();
    Estilo.on('keydown', function (e) {
        if (e.keyCode === 13) {
            $.getJSON("<?php print base_url('colores_x_estilo') ?>").done(function (x, y, z) {

            }).fail(function (x, y, z) {
                console.log(x, y, z);
                swal('OPS!', 'ALGO SALIO MAL, REVISE LA CONSOLA PARA MÁS DETALLE', 'error');
            }).always(function () {
                HoldOn.close();
            });
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
    ControlesListosParaTejido = tblControlesListosParaTejido.DataTable(xoptions);
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

function getChoferes() {
    HoldOn.open({
        theme: 'sk-rect'
    });
    $.getJSON('<?php print base_url('choferes'); ?>').done(function (x, y, z) {
        x.forEach(function (e) {
            Chofer[0].selectize.addOption({text: e.Empleado, value: e.ID});
        });
    }).fail(function (x, y, z) {
        console.log(x, y, z);
        swal('OPS!', 'ALGO SALIO MAL, REVISE LA CONSOLA PARA MÁS DETALLE', 'error');
    }).always(function () {
        HoldOn.close();
    });
}

function getTejedoras() {
    HoldOn.open({
        theme: 'sk-rect'
    });
    $.getJSON('<?php print base_url('tejedoras'); ?>').done(function (x, y, z) {
        x.forEach(function (e) {
            Tejedora[0].selectize.addOption({text: e.Empleado, value: e.ID});
        });
    }).fail(function (x, y, z) {
        console.log(x, y, z);
        swal('OPS!', 'ALGO SALIO MAL, REVISE LA CONSOLA PARA MÁS DETALLE', 'error');
    }).always(function () {
        HoldOn.close();
    }); 
}
</script>
<style>
    .card{
        background-color: #f9f9f9;
        border-width: 1px 2px 2px;
        border-style: solid; 
        border-image: linear-gradient(to bottom,  #2196F3, #99cc00, rgb(0,0,0,0)) 1 100% ;
        border-image: linear-gradient(to bottom,  #2196F3, #99cc00, rgb(0,0,0,0)) 1 100% ;

    }
    .card-header{ 
        background-color: transparent;
        border-bottom: 0px;
    }
</style>