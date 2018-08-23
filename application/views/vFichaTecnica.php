<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Fichas Técnicas</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive" id="FichaTecnica">
                <table id="tblFichaTecnica" class="table table-sm display " style="width:100%">
                    <thead>
                        <tr>
                            <th>EstiloId</th>
                            <th>ColorId</th>
                            <th>Estilo</th>
                            <th>Color</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--MODALES-->
<!--GUARDAR-->
<div class="card border-0 m-3 d-none animated fadeIn" id="pnlDatos">
    <div class="card-body text-dark">
        <form id="frmNuevo">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 float-left">
                    <legend class="float-left">Ficha Técnica</legend>
                </div>
                <div class="col-12 col-sm-6 col-md-8" align="right">
                    <button type="button" class="btn btn-primary btn-sm" id="btnCancelar" >
                        <span class="fa fa-arrow-left" ></span> REGRESAR
                    </button>
                    <button type="button" class="btn btn-danger btn-sm d-none" id="btnEliminar">
                        <span class="fa fa-trash fa-1x"></span> ELIMINAR
                    </button>
                </div>
            </div>
            <div class=" row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="Estilo">Estilo*</label>
                    <select class="form-control form-control-sm required " id="Estilo" name="Estilo" required>
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="Color">Color*</label>
                    <select class="form-control form-control-sm required " id="Color" name="Color" required>
                    </select>
                </div>
            </div>
        </form>
        <!--AGREGAR DETALLE-->
        <div class="d-none" id="pnlControlesDetalle">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-2">
                    <label for="Pieza">Pieza</label>
                    <select class="form-control form-control-sm" id="Pieza"  name="Pieza">
                    </select>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-2">
                    <label for="Grupo">Grupo</label>
                    <select class="form-control form-control-sm " id="Grupo"  name="Grupo">
                    </select>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-2">
                    <label for="Articulo">Articulo</label>
                    <select class="form-control form-control-sm " id="Articulo"  name="Articulo">
                    </select>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-2">
                    <label for="Consumo">PzXPar</label>
                    <input type="text" id="PzXPar" name="PzXPar" class="form-control form-control-sm numbersOnly" maxlength="4">
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-2">
                    <label for="Consumo">Consumo</label>
                    <input type="text"  id="Consumo" name="Consumo" class="form-control form-control-sm numbersOnly" maxlength="7">
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-2">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="AfectaPV" name="AfectaPV" checked="">
                                <label class="custom-control-label" for="AfectaPV">A.PV</label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <button type="button" id="btnAgregar" class="btn btn-primary mt-4"><span class="fa fa-check"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--DETALLE-->
<div class="card d-none m-3 animated fadeIn" id="pnlDetalle">
    <div class="card-body" >
        <!--DETALLE-->
        <div class="row">
            <div class=" col-md-9 ">
                <div class="row">
                    <div class="table-responsive" id="FichaTecnicaDetalle">
                        <table id="tblFichaTecnicaDetalle" class="table table-sm display " style="width:100%">
                            <thead>
                                <tr>
                                    <th>Pieza_ID</th>
                                    <th>Pieza</th>
                                    <th>Articulo_ID</th>

                                    <th>Articulo</th>
                                    <th>Unidad</th>
                                    <th>Precio</th>

                                    <th>Consumo</th>
                                    <th>Piel</th>
                                    <th>PzaXPar</th>

                                    <th>Importe</th>
                                    <th>ID</th>
                                    <th>Eliminar</th>
                                    <th>DeptoCat</th>
                                    <th>DEP</th>
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
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th style="text-align:right">Total:</th>
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
            <div class="col-md-3">
                <label for="">Foto del Artículo</label>
                <div id="VistaPrevia" >
                    <img src="<?php echo base_url(); ?>img/camera.png" class="img-thumbnail img-fluid"/>
                </div>
            </div>
        </div>
        <!--FIN DETALLE-->
    </div>
</div>

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/FichaTecnica/';
    var pnlDatos = $("#pnlDatos");
    var pnlControlesDetalle = $('#pnlControlesDetalle');
    var pnlTablero = $("#pnlTablero");
    var pnlDetalle = $("#pnlDetalle");
    var btnNuevo = $("#btnNuevo");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnEliminar = $("#btnEliminar");
    var Estilo = pnlDatos.find("#Estilo");
    var Color = pnlDatos.find("#Color");
    var IdMovimiento = 0;
    var nuevo = true;
    var btnAgregar = pnlControlesDetalle.find("#btnAgregar");

    $(document).ready(function () {

        btnAgregar.click(function () {
            onAgregar();
        });

        pnlDatos.find("[name='Estilo']").change(function () {
            if (nuevo) {
                pnlDatos.find("[name='Color']")[0].selectize.clear(true);
                pnlDatos.find("[name='Color']")[0].selectize.clearOptions();
                temp = $(this).val();
                getColoresXEstilo($(this).val());
                getFotoXEstilo($(this).val());
            }
        });

        pnlDatos.find("[name='Color']").change(function () {
            if (nuevo) {
                onComprobarExisteEstiloColor(pnlDatos.find("[name='Estilo']").val(), $(this).val());
            }
        });

        pnlDatos.find("[name='Grupo']").change(function () {
            console.log($(this).val());
            pnlControlesDetalle.find("[name='Articulo']")[0].selectize.clear(true);
            pnlControlesDetalle.find("[name='Articulo']")[0].selectize.clearOptions();
            getArticulosRequeridos($(this).val());
        });

        btnEliminar.click(function () {
            if (temp !== 0 && temp !== undefined && temp > 0) {
                swal({
                    buttons: ["Cancelar", "Aceptar"],
                    title: 'Estas Seguro?',
                    text: "Esta acción no se puede revertir",
                    icon: "warning",
                    closeOnEsc: false,
                    closeOnClickOutside: false
                }).then((action) => {
                    if (action) {
                        $.post(master_url + 'onEliminar', {ID: temp}).done(function (data, x, jq) {
                            onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'REIGISTRO ELIMINADO', 'danger');
                            getRecords();
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    }
                });
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
            }
        });

        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass('d-none');
            pnlDatos.find("input").val("");
            pnlControlesDetalle.find("input").val("");
            pnlControlesDetalle.removeClass('d-none');
            pnlDetalle.find("#tblFichaTecnicaDetalle tbody").html('');
            Estilo[0].selectize.enable();
            Color[0].selectize.enable();
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            $(':input:text:enabled:visible:first').focus();
            nuevo = true;
            if ($.fn.DataTable.isDataTable('#tblFichaTecnicaDetalle')) {
                FichaTecnicaDetalle.clear().draw();
            }
            pnlDatos.find("#Estilo")[0].selectize.focus();
        });

        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass('d-none');
            pnlDetalle.addClass('d-none');
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            Estilo[0].selectize.enable();
            Color[0].selectize.enable();
            if ($.fn.DataTable.isDataTable('#tblFichaTecnicaDetalle')) {
                FichaTecnicaDetalle.clear().draw();
            }
            nuevo = true;
        });

        getRecords();
        getEstilos();
        getPiezas();
        getGrupos();
        handleEnter();
    });

    var tblFichaTecnicaDetalle = pnlDetalle.find('#tblFichaTecnicaDetalle');
    var FichaTecnicaDetalle;
    function getFichaTecnicaDetalleByID(Estilo, Color) {
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblFichaTecnicaDetalle')) {
            tblFichaTecnicaDetalle.DataTable().destroy();
        }
//        $.getJSON(master_url + 'getFichaTecnicaDetalleByID', {"Estilo": Estilo, "Color": Color}).done(function (data) {
//            console.log(data);
//        });
        FichaTecnicaDetalle = tblFichaTecnicaDetalle.DataTable({
            "ajax": {
                "url": master_url + 'getFichaTecnicaDetalleByID',
                "dataSrc": "",
                "data": {
                    "Estilo": Estilo,
                    "Color": Color
                }
            },
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [2],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [10],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [12],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [13],
                    "visible": false,
                    "searchable": false
                }
            ],
            "columns": [
                {"data": "Pieza_ID"}, /*0*/
                {"data": "Pieza"}, /*1*/
                {"data": "Articulo_ID"}, /*2*/
                {"data": "Articulo"}, /*3*/
                {"data": "Unidad"}, /*4*/
                {"data": "Precio"}, /*5*/
                {"data": "Consumo"}, /*6*/
                {"data": "TipoPiel"}, /*7*/
                {"data": "PzXPar"}, /*8*/
                {"data": "Importe"}, /*9*/
                {"data": "ID"},
                {"data": "Eliminar"},
                {"data": "DeptoCat"}, /*12*/
                {"data": "DEPTO"}/*13*/
            ],
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api();//Get access to Datatable API
                // Update footer
                var total = api.column(9).data().reduce(function (a, b) {
                    var ax = 0, bx = 0;
                    ax = $.isNumeric(a) ? parseFloat(a) : 0;
                    bx = $.isNumeric(getNumberFloat(b)) ? getNumberFloat(b) : 0;
                    return  (ax + bx);
                }, 0);
                $(api.column(9).footer()).html(api.column(9, {page: 'current'}).data().reduce(function (a, b) {
                    return '$' + $.number(parseFloat(total), 2, '.', ',');
                }, 0));
            },
            "dom": 'frt',
            "processing": true,
            "serverSide": true,
            "autoWidth": true,
            language: lang,
            "displayLength": 500,
            "colReorder": true,
            "bLengthChange": false,
            "deferRender": true,
            "scrollY": 295,
            "scrollCollapse": true,
            "bSort": true,
            "keys": true,
            order: [[13, 'asc']],
            rowGroup: {
                endRender: function (rows, group) {
                    var stc = $.number(rows.data().pluck('Consumo').reduce(function (a, b) {
                        return a + parseFloat(b);
                    }, 0), 4, '.', ',');
                    var stt = $.number(rows.data().pluck('Importe').reduce(function (a, b) {
                        return a + getNumberFloat(b);
                    }, 0), 4, '.', ',');
                    return $('<tr>').append('<td></td><td></td><td colspan="2">Totales de: ' + group + '</td>').append('<td>' + stc + '</td><td colspan="2"></td><td>$' + stt + '</td><td></td></tr>');
                },
                dataSrc: "DeptoCat"
            },
            "createdRow": function (row, data, index) {
                $.each($(row).find("td"), function (k, v) {
                    var c = $(v);
                    var index = parseInt(k);
                    switch (index) {
                        case 0:
                            /*PIEZA*/
                            c.addClass('Pieza bold-text');
                            break;
                        case 1:
                            /*MATERIAL*/
                            c.addClass('Articulo bold-text');
                            break;
                        case 2:
                            /*UNIDAD*/
                            c.addClass('Unidad bold-text');
                            break;
                        case 3:
                            /*PRECIO*/
                            c.addClass('Precio bold-text');
                            break;
                        case 4:
                            /*PARES*/
                            c.addClass('Consumo text-danger bold-text');
                            break;
                        case 5:
                            /*CONSUMO*/
                            c.addClass('Piel');
                            break;
                        case 6:
                            /*PZAXPAR*/
                            c.addClass('PzaXPar');
                            break;
                        case 7:
                            /*IMPORTE*/
                            c.addClass('Importe bold-text text-success');
                            break;
                        case 9:
                            /*ELIMINAR*/
                            c.addClass('Eliminar bold-text text-danger');
                            break;
                    }
                });
            },
            "initComplete": function (x, y) {
                HoldOn.close();
            }
        });

        FichaTecnicaDetalle.on('key', function (e, datatable, key, cell, originalEvent) {
            var cell_td = $(this).find("td.focus:not(.Pieza):not(.Articulo):not(.Unidad):not(.Editar)");
            if (key === 13) {
                if (cell_td.hasClass("Precio")) {
                    var txt = getNumberFloat(cell.data());
                    var g = '<input id="Editor" type="text" class="form-control form-control-sm numbersOnly" maxlength="10" value="' + txt + '" autofocus>';
                    cell_td.html(g);
                    cell_td.find("#Editor").focus().select();
                } else if (cell_td.hasClass("Consumo")) {
                    var txt = (cell.data());
                    var g = '<input id="Editor" type="text" class="form-control form-control-sm numbersOnly" maxlength="10" value="' + txt + '" autofocus>';
                    cell_td.html(g);
                    cell_td.find("#Editor").focus().select();
                } else if (cell_td.hasClass("PzaXPar")) {
                    var txt = (cell.data());
                    var g = '<input id="Editor" type="text" class="form-control form-control-sm numbersOnly" maxlength="10" value="' + txt + '" autofocus>';
                    cell_td.html(g);
                    cell_td.find("#Editor").focus().select();
                }
            }
        }).on('key-blur', function (e, datatable, cell) {
            var t = $('#tblFichaTecnicaDetalle > tbody');
            var a = t.find("#Editor");
            if (a.val() !== 'undefined' && a.val() !== undefined) {
                var b = FichaTecnicaDetalle.cell(a.parent()).index();
                var d = a.parent();
                var row = FichaTecnicaDetalle.row(a.parent().parent()).data();// SOLO OBTENDRA EL ID
                var params;
                if (d.hasClass('Precio')) {
                    var precio = getNumberFloat(a.val());
                    var precio_format = '$' + $.number(precio, 2, '.', ',');
                    d.html(precio_format);
                    //DRAW NEW DATA
                    FichaTecnicaDetalle.cell($(d).parent(), 5).data(precio_format).draw();
                    var tr = FichaTecnicaDetalle.row($(d).parent()).data();
                    var cantidad = parseFloat(tr.Consumo);
                    var importe_total = cantidad * precio;
                    //DRAW NEW DATA
                    FichaTecnicaDetalle.cell($(d).parent(), 9).data('$' + $.number(importe_total, 3, '.', ',')).draw();
                    //SHORT POST
                    params = {ID: row.ID, CELDA: 'PRECIO', VALOR: precio};
                } else if (d.hasClass('Consumo')) {
                    d.html(a.val());
                    FichaTecnicaDetalle.cell(d, b).data(a.val()).draw();

                    //DRAW NEW DATA
                    var tr = FichaTecnicaDetalle.row($(d).parent()).data();
                    var precio = getNumberFloat(tr.Precio);
                    var cantidad = parseFloat(tr.Consumo);
                    var importe_total = cantidad * precio;
                    //DRAW NEW DATA
                    FichaTecnicaDetalle.cell($(d).parent(), 9).data('$' + $.number(importe_total, 3, '.', ',')).draw();

                    //SHORT POST
                    params = {
                        ID: row.ID,
                        CELDA: 'CONSUMO',
                        VALOR: a.val()
                    };
                } else if (d.hasClass('PzaXPar')) {
                    d.html(a.val().toUpperCase());
                    //SHORT POST
                    params = {
                        ID: row.ID,
                        CELDA: 'PZAXPAR',
                        VALOR: a.val()
                    };
                    //DRAW NEW DATA
                    FichaTecnicaDetalle.cell(d, b).data(a.val()).draw();
                }
                swal({
                    title: "¿Deseas cambiar el registro? ", text: "*El registro se modificará de forma permanente*", icon: "warning", buttons: ["Cancelar", "Aceptar"]
                }).then((willDelete) => {
                    if (willDelete) {
                        $.post(master_url + 'onEditarFichaTecnicaDetalle', params).done(function (data, x, jq) {
                            $.notify({
                                // options
                                message: 'LOS DATOS HAN SIDO ACTUALIZADOS'
                            }, {
                                // settings
                                type: 'success',
                                delay: 500,
                                animate: {
                                    enter: 'animated flipInX',
                                    exit: 'animated flipOutX'
                                },
                                placement: {
                                    from: "top",
                                    align: "right"
                                }
                            });
                        }).fail(function (x, y, z) {
                            console.log('ERROR', x, y, z);
                        }).always(function () {
                            console.log('DATOS ACTUALIZADOS');
                        });
                    } else {
                        FichaTecnicaDetalle.ajax.reload();
                    }
                });
            }
        });

        tblFichaTecnicaDetalle.find('tbody').on('click', 'tr', function () {
            tblFichaTecnicaDetalle.find("tbody tr").removeClass("success");
            $(this).addClass("success");
            var tr = $(this);
            var dtm = FichaTecnicaDetalle.row(tr).data();
            console.log(dtm);
        });

    }

    var tblFichaTecnica = $('#tblFichaTecnica');
    var FichaTecnica;
    function getRecords() {
        temp = 0;
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblFichaTecnica')) {
            tblFichaTecnica.DataTable().destroy();
        }
        FichaTecnica = tblFichaTecnica.DataTable({
            "dom": 'Bfrtip',
            buttons: buttons,
            "ajax": {
                "url": master_url + 'getRecords',
                "dataType": "json",
                "type": 'POST',
                "dataSrc": ""
            },
            "columns": [
                {"data": "EstiloId"},
                {"data": "ColorId"},
                {"data": "Estilo"},
                {"data": "Color"}
            ],
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [1],
                    "visible": false,
                    "searchable": false
                }],
            language: lang,
            "autoWidth": true,
            "colReorder": true,
            "displayLength": 20,
            "bLengthChange": false,
            "deferRender": true,
            "scrollCollapse": false,
            keys: true,
            "bSort": true,
            "aaSorting": [
                [0, 'desc']/*ID*/
            ],
            "initComplete": function (x, y) {
                HoldOn.close();
            }
        });
        $('#tblFichaTecnica_filter input[type=search]').focus();

        tblFichaTecnica.find('tbody').on('click', 'tr', function () {
            nuevo = false;
            tblFichaTecnica.find("tbody tr").removeClass("success");
            $(this).addClass("success");
            var dtm = FichaTecnica.row(this).data();
            console.log(dtm);
            $.getJSON(master_url + 'getFichaTecnicaByEstiloByColor', {Estilo: dtm.EstiloId, Color: dtm.ColorId}).done(function (data, x, jq) {
                pnlDatos.find("input").val("");
                $.each(pnlDatos.find("select"), function (k, v) {
                    pnlDatos.find("select")[k].selectize.clear(true);
                });
                Estilo[0].selectize.disable();
                Color[0].selectize.disable();
                $.getJSON(master_url + 'getColoresXEstilo', {Estilo: dtm.EstiloId}).done(function (data, x, jq) {
                    $.each(data, function (k, v) {
                        pnlDatos.find("[name='Color']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
                    });
                    pnlDatos.find("[name='Color']")[0].selectize.setValue(dtm.ColorId);
                }).fail(function (x, y, z) {
                    console.log(x.responseText);
                    console.log("\n");
                    console.log(x, y, z);
                }).always(function () {
                });
                pnlControlesDetalle.find("[name='Pieza']")[0].selectize.focus();
                pnlDatos.find("#Estilo")[0].selectize.setValue(data[0].Estilo);
                getFotoXEstilo(dtm.EstiloId);
                getFichaTecnicaDetalleByID(dtm.EstiloId, dtm.ColorId);
                pnlTablero.addClass("d-none");
                pnlDetalle.removeClass('d-none');
                pnlControlesDetalle.removeClass('d-none');
                pnlDatos.removeClass('d-none');
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
            });
        });
    }

    function getEstilos() {
        $.getJSON(master_url + 'getEstilos').done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("#Estilo")[0].selectize.addOption({text: v.Estilo, value: v.Clave});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getPiezas() {
        $.getJSON(master_url + 'getPiezas').done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Pieza']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getGrupos() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.getJSON(master_url + 'getGrupos').done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Grupo']")[0].selectize.addOption({text: v.Grupo, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getColoresXEstilo(Estilo) {
        $.getJSON(master_url + 'getColoresXEstilo', {Estilo: Estilo}).done(function (data, x, jq) {
            console.log(data);
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Color']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            pnlDatos.find("#Color")[0].selectize.focus();
        });
    }

    function getFotoXEstilo(Estilo) {
        $.getJSON(master_url + 'getEstiloByID', {Estilo: Estilo}).done(function (data, x, jq) {
            console.log('getFotoXEstilo', data);
            if (data.length > 0) {
                var dtm = data[0];
                var vp = pnlDetalle.find("#VistaPrevia");
                if (dtm.Foto !== null && dtm.Foto !== undefined && dtm.Foto !== '') {
                    var ext = getExt(dtm.Foto);
                    if (ext === "gif" || ext === "jpg" || ext === "png" || ext === "jpeg") {
                        vp.html('<img src="' + base_url + dtm.Foto + '" class="img-thumbnail img-fluid" width="400px" />');
                    }
                    if (ext !== "gif" && ext !== "jpg" && ext !== "jpeg" && ext !== "png" && ext !== "PDF" && ext !== "Pdf" && ext !== "pdf") {
                        vp.html('<img src="' + base_url + 'img/camera.png" class="img-thumbnail img-fluid"/>');
                    }
                } else {
                    vp.html('<img src="' + base_url + 'img/camera.png" class="img-thumbnail img-fluid"/>');
                }
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }

    function onComprobarExisteEstiloColor(Estilo, Color) {
        $.getJSON(master_url + 'onComprobarExisteEstiloColor', {Estilo: Estilo, Color: Color}).done(function (data, x, jq) {
            if (parseInt(data[0].EXISTE) > 0) {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'EL ESTILO YA HA SIDO CAPTURADO', 'danger');
                pnlDatos.find("[name='Estilo']")[0].selectize.clear();
                pnlDatos.find("[name='Estilo']")[0].selectize.focus();
            } else {
                getFotoXEstilo(Estilo);
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }

    function getArticulosRequeridos(Grupo) {
        if (Grupo !== '' && Grupo !== undefined && Grupo !== null) {
            HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
            $.getJSON(master_url + 'getArticulosRequeridos', {Grupo: Grupo}).done(function (data, x, jq) {
                $.each(data, function (k, v) {
                    pnlDatos.find("#Articulo")[0].selectize.addOption({text: v.Articulo, value: v.ID});
                });
                pnlDatos.find("#Articulo")[0].selectize.focus();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
            });
        }
    }

    function onAgregar() {
        isValid('pnlDatos');
        if (valido) {
            onAgregarFila();
        }
    }

    function onAgregarFila() {
        var Pieza = pnlControlesDetalle.find("[name='Pieza']"), Articulo = pnlControlesDetalle.find("[name='Articulo']");
        var PzXPar = pnlControlesDetalle.find("[name='PzXPar']");
        var Consumo = pnlControlesDetalle.find("[name='Consumo']"), Estilo = pnlDatos.find("[name='Estilo']");
        var Color = pnlDatos.find("[name='Color']");
        /*COMPROBAR SI YA SE AGREGÓ*/
        var registro_existe = false;
        /*VALIDAR QUE ESTEN TODOS LOS CAMPOS LLENOS PARA AGREGARLO*/
        if (Estilo.val() !== "" && Color.val() !== "" && Pieza.val() !== "" && Articulo.val() !== "" && Consumo.val() !== "")
        {
            console.log(pnlDetalle.find("#tblFichaTecnicaDetalle tbody tr").length);
            if (pnlDetalle.find("#tblFichaTecnicaDetalle tbody tr").length > 0) {
                FichaTecnicaDetalle.rows().eq(0).each(function (index) {
                    var row = FichaTecnicaDetalle.row(index);
                    var data = row.data();
                    if (parseFloat(data.Pieza_ID) === parseFloat(Pieza.val())) {
                        registro_existe = true;
                        return false;
                    }
                });
            }

            /*VALIDAR QUE EXISTA*/
            if (!registro_existe) {
                var frm = new FormData();
                frm.append('Estilo', Estilo.val());
                frm.append('Color', Color.val());
                frm.append('Pieza', Pieza.val());
                frm.append('Articulo', Articulo.val());
                frm.append('PzXPar', PzXPar.val());
                frm.append('Consumo', Consumo.val());
                frm.append('AfectaPV', pnlControlesDetalle.find("#AfectaPV")[0].checked ? 1 : 0);
                $.ajax({
                    url: master_url + 'onAgregar',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: frm
                }).done(function (data, x, jq) {
                    debugger;
                    if (nuevo) {
                        Estilo[0].selectize.disable();
                        Color[0].selectize.disable();
                        pnlDetalle.removeClass('d-none');
                        nuevo = false;
                        FichaTecnica.ajax.reload();
                        getFichaTecnicaDetalleByID(Estilo.val(), Color.val());
                    } else {
                        FichaTecnicaDetalle.ajax.reload();
                    }
                    onReset();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            } else {
                swal({
                    title: 'INFO',
                    text: "YA HAS AGREGADO ESTA PIEZA",
                    icon: "warning",
                    closeOnEsc: false,
                    closeOnClickOutside: false
                }).then((action) => {
                    if (action) {
                        onReset();
                    }
                });
            }
        } else {
            swal('INFO', 'DEBES COMPLETAR TODOS LOS CAMPOS', 'warning');
        }
    }

    function onReset() {
        pnlControlesDetalle.find("[name='Articulo']")[0].selectize.clear(true);
        pnlControlesDetalle.find("[name='Pieza']")[0].selectize.focus();
        pnlControlesDetalle.find("[name='Pieza']")[0].selectize.clear(true);
        pnlControlesDetalle.find("[name='Precio']").val('');
        pnlControlesDetalle.find("[name='Consumo']").val('');
        pnlControlesDetalle.find("[name='PzXPar']").val('');
        pnlControlesDetalle.find("[name='Grupo']")[0].selectize.clear(true);
    }

    function onEliminarArticuloID(IDX) {
        swal({
            title: "¿Deseas eliminar el registro? ", text: "*El registro se eliminará de forma permanente*", icon: "warning", buttons: ["Cancelar", "Aceptar"]
        }).then((willDelete) => {
            if (willDelete) {
                $.post(master_url + 'onEliminarArticuloID', {ID: IDX}).done(function () {
                    $.notify({
                        // options
                        message: 'SE HA ELIMINADO EL REGISTRO'
                    }, {
                        // settings
                        type: 'success',
                        delay: 500,
                        animate: {
                            enter: 'animated flipInX',
                            exit: 'animated flipOutX'
                        },
                        placement: {
                            from: "top",
                            align: "right"
                        }
                    });
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    FichaTecnicaDetalle.ajax.reload();
                });
            }
        });
    }
</script>
<style>
    .bold-text{
        font-weight: 400;
    }
    tr.group-start:hover td{
        background-color: #e0e0e0 !important;
        color: #000 !important;
    }
    tr.group-end td{
        background-color: #FFF !important;
        color: #000!important;
    }
    td{
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }
</style>