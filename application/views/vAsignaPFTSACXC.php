<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-header">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-2">
                <button type="button" class="btn btn-default text-muted" id="btnReload"><span class="fa fa-retweet"></span></button>
            </div>
            <div class="col-12 col-sm-12 col-md-8">
                <h3 class="font-weight-bold">
                    Asigna Piel, Forro, Textiles y Sintéticos a corte por control
                </h3>
            </div>
            <div class="col-12 col-sm-12 col-md-2" align="right">
                <button type="button" class="btn btn-primary" id="btnRetornaMaterial">Retornar material</button>
            </div>
        </div>
    </div>
    <div class="card-body"> 
        <div class="row" style="padding-left: 15px">
            <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xl-1" align="left">
                <strong>Semana</strong>
                <input type="text" class="form-control form-control-sm column_filter numbersOnly" id="Semana" autofocus onkeyup="onChecarSemanaValida(this)">
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-2" align="left">
                <strong>Control</strong>
                <input type="text" class="form-control form-control-sm column_filter" id="Control">
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xl-2" align="left">
                <strong>Fracción</strong>
                <input type="text" class="form-control form-control-sm column_filter numbersOnly" id="Fraccion">
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-5 col-xl-3" align="left">
                <strong>Artículo</strong>
                <input type="text" class="form-control form-control-sm d-none" id="OrdenDeProduccion" readonly="">
                <input type="text" class="form-control form-control-sm d-none" id="ClaveArticulo" readonly="">
                <input type="text" class="form-control form-control-sm" id="Articulo" readonly="">
                <input type="text" class="form-control form-control-sm d-none" id="ClavePieza" readonly="">
                <input type="text" class="form-control form-control-sm d-none" id="Pieza" readonly="">
                <input type="text" class="form-control form-control-sm d-none" id="Pares" readonly="">
            </div> 
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-1" align="left">
                <strong>Explosion</strong>
                <input type="text" class="form-control form-control-sm" id="Explosion" readonly="">
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-1" align="left">
                <strong>Entregar</strong>
                <input type="text" class="form-control form-control-sm numbersOnly" readonly="" id="Entregar" onkeyup="">
            </div>
            <div class="col-2 col-sm-2 col-md-2 col-lg-1 col-xl-1 mt-4 text-center" align="center">
                <div class="custom-control custom-checkbox"  align="center" style="cursor: pointer !important;">
                    <input type="checkbox" class="custom-control-input selectNotEnter" id="MaterialExtra" name="MaterialExtra" style="cursor: pointer !important;">
                    <label class="custom-control-label text-danger labelCheck" for="MaterialExtra" style="cursor: pointer !important;">Material Extra</label>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6" align="center">
                        <h2>Pieles</h2>
                        <table id="tblPieles" class="table table-hover table-sm table-bordered  compact nowrap" style="width: 100% !important;">
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
                                    <th scope="col">Pares</th><!--INFORMATIVO-->
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
                                    <th></th><!--11-->
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6" align="center">
                        <h2>Forros</h2>
                        <table id="tblForros" class="table table-hover table-sm table-bordered  compact nowrap" style="width: 100% !important;">
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
                                    <th scope="col">Pares</th><!--INFORMATIVO-->
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
                                    <th></th><!--11-->
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6" align="center">
                        <h2>Textiles</h2>
                        <table id="tblTextiles" class="table table-hover table-sm table-bordered compact nowrap" style="width: 100% !important;">
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
                                    <th scope="col">Pares</th><!--INFORMATIVO-->
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
                                    <th></th><!--11-->
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6" align="center">
                        <h2>Sintéticos</h2> 
                        <table id="tblSinteticos" class="table table-hover table-sm table-bordered compact nowrap" style="width: 100% !important;">
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
                                    <th scope="col">Pares</th><!--INFORMATIVO-->
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
                                    <th></th><!--11--> 
                                </tr>
                            </tfoot>
                        </table> 
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" align="center">
                <h2>Controles asignados</h2>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"> 
                <table id="tblControlesAsignados" class="table table-hover table-sm table-bordered compact nowrap" style="width: 100% !important;">
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
<script>
    var master_url = base_url + 'index.php/AsignaPFTSACXC/';
    var Semana = $("#Semana"), Control = $("#Control"), Fraccion = $("#Fraccion"),
            Articulo = $("#Articulo"), ClaveArticulo = $("#ClaveArticulo"),
            Pieza = $("#Pieza"), ClavePieza = $("#ClavePieza"), Explosion = $("#Explosion"), Entregar = $("#Entregar"),
            MaterialExtra = $("#MaterialExtra"), OrdenDeProduccion = $("#OrdenDeProduccion"), Pares = $("#Pares");

    var Pieles = $("#Pieles"), Forros = $("#Forros"),
            Textiles = $("#Textiles"), Sinteticos = $("#Sinteticos"),
            ControlesAsignados = $("#ControlesAsignados");

    var tblPieles = $("#tblPieles"), tblForros = $("#tblForros"),
            tblTextiles = $("#tblTextiles"), tblSinteticos = $("#tblSinteticos"),
            tblControlesAsignados = $("#tblControlesAsignados");

    var btnReload = $("#btnReload"), btnRetornaMaterial = $("#btnRetornaMaterial");

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
        "scrollX": true,
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
            },
            {
                "targets": [11],
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
        "scrollX": true,
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
            },
            {
                "targets": [11],
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
        "scrollX": true,
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
        
        btnRetornaMaterial.click(function(){
            
        });
        
        Entregar.keydown(function (event) {
            if (event.which === 13) {
                onEntregar(this, event);
            }
        });

        btnReload.click(function () {
            Semana.val('');
            Control.val('');
            Fraccion.val('');
            init();
        });

        $("div > h2").removeClass("d-none");
        $("div > h2").addClass("animated fadeInDown");

        Semana.focus();

        Pieles = tblPieles.DataTable(options);
        tblPieles.on('click', 'tr', function () {
            if (Semana.val() !== '' && Control.val() !== '' && Fraccion.val() !== '') {
                var data = Pieles.row(this).data();
                console.log('PIELES', data);
                OrdenDeProduccion.val(data[0]);
                ClaveArticulo.val(data[2]);
                Articulo.val(data[3]);
                Pares.val(data[11]);
                getExplosionXSemanaControlFraccionArticulo(Semana, Control, Fraccion, data[2], 1);
            } else {
                onUnSelect();
            }
        });

        Forros = tblForros.DataTable(options);
        tblForros.on('click', 'tr', function () {
            if (Semana.val() !== '' && Control.val() !== '' && Fraccion.val() !== '') {
                var data = Forros.row(this).data();
                console.log('FORROS', data);
                ClaveArticulo.val(data[2]);
                Articulo.val(data[3]);
                Pares.val(data[11]);
                getExplosionXSemanaControlFraccionArticulo(Semana, Control, Fraccion, data[2], 2);
            } else {
                onUnSelect();
            }
        });

        Textiles = tblTextiles.DataTable(options_ts);
        tblTextiles.on('click', 'tr', function () {
            if (Semana.val() !== '' && Control.val() !== '' && Fraccion.val() !== '') {
                var data = Textiles.row(this).data();
                console.log('TEXTILES', data);
                ClaveArticulo.val(data[2]);
                Articulo.val(data[3]);
                Pares.val(data[11]);
                getExplosionXSemanaControlFraccionArticulo(Semana, Control, Fraccion, data[2], 34);
            } else {
                onUnSelect();
            }
        });

        Sinteticos = tblSinteticos.DataTable(options_ts);
        tblSinteticos.on('click', 'tr', function () {
            if (Semana.val() !== '' && Control.val() !== '' && Fraccion.val() !== '') {
                var data = Sinteticos.row(this).data();
                console.log('SINTETICOS', data);
                ClaveArticulo.val(data[2]);
                Articulo.val(data[3]);
                Pares.val(data[11]);
                getExplosionXSemanaControlFraccionArticulo(Semana, Control, Fraccion, data[2], 40);
            } else {
                onUnSelect();
            }
        });

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

        if (Semana.val() !== '' && Control.val() !== '' && Fraccion.val() !== '') {
            HoldOn.open({
                theme: 'sk-bounce',
                message: 'Cargando...'
            });
            $.getJSON(master_url + 'getExplosionXSemanaControlFraccionArticulo',
                    {SEMANA: S.val(), CONTROL: C.val(), FRACCION: F.val(), ARTICULO: A, GRUPO: G}).done(function (data) {
                console.log(data, data.length);
                if (data.length > 0) {
                    Explosion.val(data[0].EXPLOSION);
                    Entregar.prop('readonly', false);
                    Entregar.focus();
                }
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
            });
        } else {
            onUnSelect();
        }
    }

    function onUnSelect() {
        swal('ATENCIÓN', 'ES NECESARIO ESTABLECER UNA SEMANA, UN CONTROL Y UNA FRACCIÓN', 'warning').then((value) => {
            Pieles.rows('.selected').deselect();
            Forros.rows('.selected').deselect();
            Textiles.rows('.selected').deselect();
            Sinteticos.rows('.selected').deselect();
            if (Semana.val().trim() === '') {
                Semana.focus();
            } else if (Control.val().trim() === '') {
                Control.focus();
            } else if (Fraccion.val().trim() === '') {
                Fraccion.focus();
            }
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
        }, 0), 3, '.', ','));
        $(Forros.column(8).footer()).html($.number(
                Forros.column(8, {page: 'current'}).data().reduce(function (a, b) {
            return parseFloat(a) + parseFloat(b);
        }, 0), 3, '.', ','));
        $(Textiles.column(8).footer()).html($.number(
                Textiles.column(8, {page: 'current'}).data().reduce(function (a, b) {
            return parseFloat(a) + parseFloat(b);
        }, 0), 3, '.', ','));
        $(Sinteticos.column(8).footer()).html($.number(
                Sinteticos.column(8, {page: 'current'}).data().reduce(function (a, b) {
            return parseFloat(a) + parseFloat(b);
        }, 0), 3, '.', ','));
    }

    function init() {
        getPieles();
        getForros();
        getTextiles();
        getSinteticos();
        Semana.focus();

        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblControlesAsignados')) {
            tblControlesAsignados.DataTable().destroy();
        }
        ControlesAsignados = tblControlesAsignados.DataTable({
            "dom": 'Bfrtip',
            buttons: buttons,
            "ajax": {
                "url": master_url + 'getControlesAsignados',
                "dataSrc": ""
            },
            "columns": [
                {"data": "ID"}, {"data": "Empleado"}, {"data": "Articulo"}, {"data": "Descripcion"}, {"data": "Fecha"}, {"data": "Cargo"}, {"data": "Abono"}, {"data": "Dev"}
            ],
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                }
            ],
            language: lang,
            select: true,
            "autoWidth": true,
            "colReorder": true,
            "displayLength": 20,
            "bLengthChange": false,
            "deferRender": true,
            "scrollCollapse": false,
            "bSort": true,
            "aaSorting": [
                [1, 'desc']/*ID*/
            ],
            initComplete: function (a, b) {
                $("#tblControlesAsignados_filter").find("input").addClass("selectNotEnter");
            }
        });
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
                        Pieles.row.add([v.ID, v.CONTROL, v.ARTICULO_CLAVE, v.ARTICULO_DESCRIPCION, v.UM, v.PIEZA, v.PIEZA_DESCRIPCION, v.GRUPO, v.CANTIDAD, v.SEMANA, v.FRACCION, v.PARES]).draw();
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
                        Forros.row.add([v.ID, v.CONTROL, v.ARTICULO_CLAVE, v.ARTICULO_DESCRIPCION, v.UM, v.PIEZA, v.PIEZA_DESCRIPCION, v.GRUPO, v.CANTIDAD, v.SEMANA, v.FRACCION, v.PARES]).draw();
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
                        Textiles.row.add([v.ID, v.CONTROL, v.ARTICULO_CLAVE, v.ARTICULO_DESCRIPCION, v.UM, v.PIEZA, v.PIEZA_DESCRIPCION, v.GRUPO, v.CANTIDAD, v.SEMANA, v.FRACCION, v.PARES]).draw();
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
                        Sinteticos.row.add([v.ID, v.CONTROL, v.ARTICULO_CLAVE, v.ARTICULO_DESCRIPCION, v.UM, v.PIEZA, v.PIEZA_DESCRIPCION, v.GRUPO, v.CANTIDAD, v.SEMANA, v.FRACCION, v.PARES]).draw();
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

    function onChecarSemanaValida(e) {
        var n = $(e);
        if (n.val() !== '') {
            $.getJSON(master_url + 'onChecarSemanaValida', {ID: $(e).val()}).done(function (data) {
                if (parseInt(data[0].Semana) <= 0) {
                    var options = {
                        title: "INDIQUE UNA SEMANA DE PRODUCCIÓN VÁLIDA",
                        text: "LA SEMANA " + $(e).val() + " NO EXISTE O NO HA SIDO GENERADA.",
                        icon: "warning",
                        focusConfirm: true,
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    };
                    swal(options).then((value) => {
                        $(e).val('').focus().select();
                    });
                }
            }).fail(function (x) {
                swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
                console.log(x.responseText);
            }).always(function () {
            });
        }
    }

    function onEntregar(e, evt) {
        console.log(evt, evt.keyCode, MaterialExtra[0].checked);
        var seguro = true;
        if (evt.keyCode === 13) {
            console.log('KEY CODE 13');
            if (Entregar.val() > Explosion.val()) {
                swal({
                    title: "ATENCIÓN",
                    text: "VA ENTREGAR MATERIAL EXTRA, ¿ESTA SEGURO?",
                    icon: "info",
                    buttons: {
                        resumetour: {
                            text: "CANCELAR",
                            value: "cancelar"
                        },
                        endtour: {
                            text: "ACEPTAR",
                            value: "aceptar"
                        }
                    }}).then((value) => {
                    switch (value) {
                        case "aceptar":
                            seguro = true;
                            break;
                        case "cancelar":
                            seguro = false;
                            Entregar.focus();
                            break;
                    }
                });
            } else
            {
                console.log('Entregar.val() > Explosion.val() ELSE');
            }
            if (seguro) {
                $.post(master_url + 'onEntregarPielForroTextilSintetico', {
                    ORDENDEPRODUCCION: OrdenDeProduccion.val(),
                    PARES: Pares.val(),
                    SEMANA: Semana.val(),
                    CONTROL: Control.val(),
                    FRACCION: Fraccion.val(),
                    ARTICULO: ClaveArticulo.val(),
                    ARTICULOT: Articulo.val(),
                    EXPLOSION: Explosion.val(),
                    ENTREGA: Entregar.val(),
                    MATERIAL_EXTRA: MaterialExtra[0].checked ? 1 : 0
                }).done(function (data) {
                    console.log(data);
                    swal('ATENCIÓN', 'SE HA ENTREGADO ' + Entregar.val() + ' DEL MATERIAL SOLICITADO, EN LA SEMANA ' + Semana.val() + ' PARA LA FRACCIÓN "' + Fraccion.val(), 'success').then((value) => {
                        Semana.val('');
                        Control.val('');
                        Fraccion.val('');
                        ClaveArticulo.val('');
                        Articulo.val('');
                        Explosion.val('');
                        Entregar.val('');
                        Entregar.prop('readonly', true);
                        MaterialExtra[0].checked = false;
                        onBuscarX(1, '');
                        onBuscarX(9, '');
                        onBuscarX(10, '');
                        ControlesAsignados.ajax.reload();
                        Semana.focus();
                    });
                }).fail(function (x, y, z) {
                    console.log(x.responseText);
                }).always(function () {

                });
            }
        }
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
    .mdl-shadow--6dp {
        box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2);
    }
    .mdl-shadow--2dp {
        box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    }
</style>