
<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-header">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-3">
                <button type="button" class="btn btn-default text-muted" id="btnReload"><span class="fa fa-retweet"></span></button>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
                <h3 class="font-weight-bold">
                    Asigna Piel, Forro, Textiles y Sintéticos a corte por control
                </h3>
            </div>
            <div class="col-12 col-sm-12 col-md-3"></div>
        </div>
    </div>
    <div class="card-body"> 
        <div class="row" style="padding-left: 15px">
            <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xl-1" align="left">
                <strong>Semana</strong>
                <input type="text" class="form-control form-control-sm column_filter" id="Semana" autofocus>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-2" align="left">
                <strong>Control</strong>
                <input type="text" class="form-control form-control-sm column_filter" id="Control">
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xl-2" align="left">
                <strong>Fracción</strong>
                <input type="text" class="form-control form-control-sm column_filter" id="Fraccion">
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-5 col-xl-3" align="left">
                <strong>Artículo</strong>
                <input type="text" class="form-control form-control-sm column_filter" id="Articulo">
            </div> 
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-1" align="left">
                <strong>Explosion</strong>
                <input type="text" class="form-control form-control-sm column_filter" id="Explosion">
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-1" align="left">
                <strong>Entregar</strong>
                <input type="text" class="form-control form-control-sm column_filter" id="Entregar">
            </div>
            <div class="col-2 col-sm-2 col-md-2 col-lg-1 col-xl-1 mt-4 text-center" align="center">
                <div class="custom-control custom-checkbox"  align="center" style="cursor: pointer !important;">
                    <input type="checkbox" class="custom-control-input" id="MaterialExtra" name="MaterialExtra" style="cursor: pointer !important;">
                    <label class="custom-control-label text-danger labelCheck" for="MaterialExtra" style="cursor: pointer !important;">Material Extra</label>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6" align="center">
                        <h2>Pieles</h2>
                        <div class="table-responsive">
                            <table id="tblPieles" class="table table-hover table-sm table-bordered  compact nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Control</th>
                                        <th scope="col">Articulo</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">U.M.</th>
                                        <th scope="col">Pz.</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Gpo</th>
                                        <th scope="col" class="sum">Cant.</th>
                                        <th scope="col">Semana</th><!--FILTRO-->
                                        <th scope="col">Fraccion</th><!--FILTRO-->
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th></th><!--0-->
                                        <th></th><!--1-->
                                        <th></th><!--2-->
                                        <th></th><!--3-->
                                        <th></th><!--4-->
                                        <th></th><!--5-->
                                        <th></th><!--6-->
                                        <th></th><!--7-->
                                        <th></th><!--8-->
                                        <th></th><!--9-->
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6" align="center">
                        <h2>Forros</h2>
                        <div class="table-responsive">
                            <table id="tblForros" class="table table-hover table-sm table-bordered  compact nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Control</th>
                                        <th scope="col">Articulo</th>

                                        <th scope="col">Descripcion</th>
                                        <th scope="col">U.M.</th>
                                        <th scope="col">Pz.</th>

                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Gpo</th>
                                        <th scope="col" class="sum">Cant.</th>

                                        <th scope="col">Semana</th><!--FILTRO-->
                                        <th scope="col">Fraccion</th><!--FILTRO-->
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th></th><!--0-->
                                        <th></th><!--1-->
                                        <th></th><!--2-->
                                        <th></th><!--3-->
                                        <th></th><!--4-->
                                        <th></th><!--5-->
                                        <th></th><!--6-->
                                        <th></th><!--7-->
                                        <th></th><!--8-->
                                        <th></th><!--9-->
                                        <th></th><!--10-->
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6" align="center">
                        <h2>Textiles</h2>
                        <div class="table-responsive">
                            <table id="tblTextiles" class="table table-hover table-sm table-bordered compact nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Control</th>
                                        <th scope="col">Articulo</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">U.M.</th>
                                        <th scope="col">Pz.</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Gpo</th>
                                        <th scope="col" class="sum">Cant.</th>
                                        <th scope="col">Semana</th><!--FILTRO-->
                                        <th scope="col">Fraccion</th><!--FILTRO-->
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th></th><!--0-->
                                        <th></th><!--1-->
                                        <th></th><!--2-->
                                        <th></th><!--3-->
                                        <th></th><!--4-->
                                        <th></th><!--5-->
                                        <th></th><!--6-->
                                        <th></th><!--7-->
                                        <th></th><!--8-->
                                        <th></th><!--9-->
                                        <th></th><!--10-->
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6" align="center">
                        <h2>Sintéticos</h2>
                        <div class="table-responsive">
                            <table id="tblSinteticos" class="table table-hover table-sm table-bordered compact nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th><!--0-->
                                        <th scope="col">Control</th><!--1-->
                                        <th scope="col">Articulo</th><!--2-->
                                        <th scope="col">Descripcion</th><!--3-->
                                        <th scope="col">U.M.</th><!--4-->

                                        <th scope="col">Pz.</th><!--5-->

                                        <th scope="col">Descripcion</th><!--6-->
                                        <th scope="col">Gpo</th><!--7-->
                                        <th scope="col" class="sum">Cant.</th><!--8-->
                                        <th scope="col">Semana</th><!--FILTRO-->
                                        <th scope="col">Fraccion</th><!--FILTRO-->
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th></th><!--0-->
                                        <th></th><!--1-->
                                        <th></th><!--2-->
                                        <th></th><!--3-->
                                        <th></th><!--4-->

                                        <th></th><!--5-->

                                        <th></th><!--6-->
                                        <th></th><!--7-->
                                        <th></th><!--8-->
                                        <th></th><!--9--> 
                                        <th></th><!--10--> 
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" align="center">
                <h2>Controles asignados</h2>
                <div class="table-responsive">
                    <table id="tblControlesAsignados" class="table table-hover table-sm table-bordered compact nowrap">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Emp</th>
                                <th scope="col">Art.</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Abono</th>
                                <th scope="col">Dev</th>
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
    var master_url = base_url + 'index.php/AsignaPFTSACXC/';
    var Semana = $("#Semana"), Control = $("#Control"), Fraccion = $("#Fraccion"),
            Articulo = $("#Articulo"), Explosion = $("#Explosion"), Entregar = $("#Entregar"),
            MaterialExtra = $("#MaterialExtra");

    var Pieles = $("#Pieles"), Forros = $("#Forros"),
            Textiles = $("#Textiles"), Sinteticos = $("#Sinteticos"),
            ControlesAsignados = $("#ControlesAsignados");

    var tblPieles = $("#tblPieles"), tblForros = $("#tblForros"),
            tblTextiles = $("#tblTextiles"), tblSinteticos = $("#tblSinteticos"),
            tblControlesAsignados = $("#tblControlesAsignados");

    var btnReload = $("#btnReload");

    var options = {
        "dom": 'rt',
        buttons: buttons,
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
        "aaSorting": [
            [4, 'asc']/*ID*/
        ],
        "columnDefs": [
            {
                "targets": [0],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [9],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [10],
                "visible": false,
                "searchable": true
            }
        ]
    };
    var options_ts = {
        "dom": 'rt',
        buttons: buttons,
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
        "aaSorting": [
            [4, 'asc']/*ID*/
        ],
        "columnDefs": [
            {
                "targets": [0],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [9],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [10],
                "visible": false,
                "searchable": true
            }
        ]
    };
    var options_c = {
        "dom": 'frt',
        buttons: buttons,
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
        "aaSorting": [
            [4, 'asc']/*ID*/
        ],
        "columnDefs": [
            {
                "targets": [0],
                "visible": false,
                "searchable": false
            }
        ]
    };

    $(document).ready(function () {

        btnReload.click(function () {
            init();
        });

        $("div > h2").removeClass("d-none");
        $("div > h2").addClass("animated fadeInDown");

        Semana.focus();

        Pieles = tblPieles.DataTable(options);
        tblPieles.on('click', 'tr', function () {
            var data = Pieles.row(this).data();
            Articulo.val(data[3]);
            getExplosionXSemanaControlFraccionArticulo(Semana, Control, Fraccion, data[2], 1);
        });

        Forros = tblForros.DataTable(options);
        tblForros.on('click', 'tr', function () {
            var data = Forros.row(this).data();
            Articulo.val(data[3]);
            getExplosionXSemanaControlFraccionArticulo(Semana, Control, Fraccion, data[2], 2);
        });

        Textiles = tblTextiles.DataTable(options_ts);
        tblTextiles.on('click', 'tr', function () {
            var data = Textiles.row(this).data();
            Articulo.val(data[3]);
            getExplosionXSemanaControlFraccionArticulo(Semana, Control, Fraccion, data[2], 34);
        });

        Sinteticos = tblSinteticos.DataTable(options_ts);
        tblSinteticos.on('click', 'tr', function () {
            var data = Sinteticos.row(this).data();
            Articulo.val(data[3]);
            getExplosionXSemanaControlFraccionArticulo(Semana, Control, Fraccion, data[2], 40);
        });

        ControlesAsignados = tblControlesAsignados.DataTable(options_c);

        Fraccion.on('keyup', function () {
            onBuscarX(10, Fraccion.val());
        });

        Semana.on('keyup', function () {
            onBuscarX(9, Semana.val());
        });

        Control.on('keyup', function () {
            onBuscarX(1, Control.val());
        });

        init();
    });

    function getExplosionXSemanaControlFraccionArticulo(S, C, F, A, G) {
        HoldOn.open({
            theme: 'sk-bounce',
            message: 'Cargando...'
        });
        $.getJSON(master_url + 'getExplosionXSemanaControlFraccionArticulo',
                {SEMANA: S.val(), CONTROL: C.val(), FRACCION: F.val(), ARTICULO: A, GRUPO: G}).done(function (data) {
            console.log(data, data.length);
            if (data.length > 0) {
                Explosion.val(data[0].EXPLOSION);
                Entregar.focus();
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function onBuscarX(i, v) {
        if (v.length > 0) {
            tblPieles.DataTable().column(i).search(v).draw();
            tblForros.DataTable().column(i).search(v).draw();
            tblTextiles.DataTable().column(i).search(v).draw();
            tblSinteticos.DataTable().column(i).search(v).draw();
            onCalcularAlBuscar();
        } else {
            tblPieles.DataTable().column(i).search('').draw();
            tblForros.DataTable().column(i).search('').draw();
            tblTextiles.DataTable().column(i).search('').draw();
            tblSinteticos.DataTable().column(i).search('').draw();
            onCalcularAlBuscar();
        }
    }

    function onCalcularAlBuscar() {
        $(Pieles.column(8).footer()).html($.number(
                Pieles.column(8, {page: 'current'}).data().reduce(function (a, b) {
            return parseFloat(a) + parseFloat(b);
        }, 0), 2, '.', ','));
        $(Forros.column(8).footer()).html($.number(
                Forros.column(8, {page: 'current'}).data().reduce(function (a, b) {
            return parseFloat(a) + parseFloat(b);
        }, 0), 2, '.', ','));
        $(Textiles.column(8).footer()).html($.number(
                Textiles.column(8, {page: 'current'}).data().reduce(function (a, b) {
            return parseFloat(a) + parseFloat(b);
        }, 0), 2, '.', ','));
        $(Sinteticos.column(8).footer()).html($.number(
                Sinteticos.column(8, {page: 'current'}).data().reduce(function (a, b) {
            return parseFloat(a) + parseFloat(b);
        }, 0), 2, '.', ','));
    }

    function init() {
        getPieles();
        getForros();
        getTextiles();
        getSinteticos();
        Semana.focus();
    }

    function onComprobarSemana(e) {
        $.getJSON(master_url + 'onComprobarSemana', {SEMANA: $(e).val()}).done(function (data) {
            console.log(data);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {

        });
    }

    function getPieles() {
        Pieles.clear().draw();
        HoldOn.open({
            theme: 'sk-bounce',
            message: 'Obteniendo pieles...'
        });
        $.getJSON(master_url + 'getPieles', {SEMANA: (Semana.val() !== '') ? Semana.val() : '', CONTROL: (Control.val() !== '') ? Control.val() : ''})
                .done(function (data) {
                    $.each(data, function (k, v) {
                        Pieles.row.add([v.ID, v.CONTROL, v.ARTICULO_CLAVE, v.ARTICULO_DESCRIPCION, v.UM, v.PIEZA, v.PIEZA_DESCRIPCION, v.GRUPO, v.CANTIDAD, v.SEMANA, v.FRACCION]).draw();
                    });
                })
                .fail(function (x, y, z) {
                    console.log(x, y, z);
                })
                .always(function () {
                    onCalcularAlBuscar();
                    HoldOn.close();
                    Pieles.order([1, 'desc']).draw();
                });
    }

    function getForros() {
        Forros.clear().draw();
        HoldOn.open({
            theme: 'sk-bounce',
            message: 'Obteniendo forros...'
        });
        $.getJSON(master_url + 'getForros', {SEMANA: (Semana.val() !== '') ? Semana.val() : '', CONTROL: (Control.val() !== '') ? Control.val() : ''})
                .done(function (data) {
                    $.each(data, function (k, v) {
                        Forros.row.add([v.ID, v.CONTROL, v.ARTICULO_CLAVE, v.ARTICULO_DESCRIPCION, v.UM, v.PIEZA, v.PIEZA_DESCRIPCION, v.GRUPO, v.CANTIDAD, v.SEMANA, v.FRACCION]).draw();
                    });
                })
                .fail(function (x, y, z) {
                    console.log(x, y, z);
                })
                .always(function () {
                    onCalcularAlBuscar();
                    HoldOn.close();
                    Forros.order([1, 'desc']).draw();
                });
    }

    function getTextiles() {
        Textiles.clear().draw();
        HoldOn.open({
            theme: 'sk-bounce',
            message: 'Obteniendo textiles...'
        });
        $.getJSON(master_url + 'getTextiles', {SEMANA: (Semana.val() !== '') ? Semana.val() : '', CONTROL: (Control.val() !== '') ? Control.val() : ''})
                .done(function (data) {
                    var tt = 0.0;
                    $.each(data, function (k, v) {
                        Textiles.row.add([v.ID, v.CONTROL, v.ARTICULO_CLAVE, v.ARTICULO_DESCRIPCION, v.UM, v.PIEZA, v.PIEZA_DESCRIPCION, v.GRUPO, v.CANTIDAD, v.SEMANA, v.FRACCION]).draw();
                    });
                })
                .fail(function (x, y, z) {
                    console.log(x, y, z);
                })
                .always(function () {
                    onCalcularAlBuscar();
                    HoldOn.close();
                    Textiles.order([1, 'desc']).draw();
                });
    }

    function getSinteticos() {
        Sinteticos.clear().draw();
        HoldOn.open({
            theme: 'sk-bounce',
            message: 'Obteniendo sinteticos...'
        });
        $.getJSON(master_url + 'getSinteticos', {SEMANA: (Semana.val() !== '') ? Semana.val() : '', CONTROL: (Control.val() !== '') ? Control.val() : ''})
                .done(function (data) {
                    $.each(data, function (k, v) {
                        Sinteticos.row.add([v.ID, v.CONTROL, v.ARTICULO_CLAVE, v.ARTICULO_DESCRIPCION, v.UM, v.PIEZA, v.PIEZA_DESCRIPCION, v.GRUPO, v.CANTIDAD, v.SEMANA, v.FRACCION]).draw();
                    });
                })
                .fail(function (x, y, z) {
                    console.log(x, y, z);
                })
                .always(function () {
                    onCalcularAlBuscar();
                    HoldOn.close();
                    Sinteticos.order([1, 'desc']).draw();
                });
    }

</script> 
<style>
    td {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }

    tr:hover td{
        background-color: #3276b1 !important;
        color: #fff;
    }
</style>