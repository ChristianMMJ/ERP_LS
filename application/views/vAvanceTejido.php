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
                <input type="text" id="Frac" name="Frac" class="form-control form-control-sm numeric"  data-toggle="tooltip" data-placement="top" title="401 TEJIDA A MANO | 402	TEJIDA A MANO MUESTRA |
                       403	TEJIDA MAQUINA 1 |
                       404	TEJIDA MAQUINA  2 |
                       405	TEJIDO DE FLORETA">
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
                <input id="Fecha" name="Fecha" class="form-control form-control-sm" readonly="">
            </div>
            <div class="col-12 col-xs-12 col-sm-1 col-lg-1 col-xl-1 mt-4">
                <button type="button" id="btnAceptar" name="btnAceptar" class="btn btn-primary"><span class="fa fa-check"></span></button>
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
                <div class="row">
                    <div class="col-10">
                        <h4>Controles entregados</h4>     
                    </div>
                    <div class="col-2">
                        <button type="button" id="btnImprimirVale" name="btnImprimirVale" class="btn btn-warning"  data-toggle="tooltip" data-placement="top" title="Imprimir vale"><span class="fa fa-print"></span></button>
                        <button type="button" id="btnImprimirValeAyuda" name="btnImprimirValeAyuda" class="btn btn-info"  data-toggle="tooltip" data-placement="top" title="Como se usa?"><span class="fa fa-question-circle"></span></button>
                    </div>
                </div>
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
    var Chofer = pnlTablero.find("#Chofer"), Tejedora = pnlTablero.find("#Tejedora"),
            Estilo = pnlTablero.find("#Estilo"), Control = pnlTablero.find("#Control");
    var ControlesListosParaTejido, tblControlesListosParaTejido = pnlTablero.find("#tblControlesListosParaTejido"),
            ControlesEntregados, tblControlesEntregados = pnlTablero.find("#tblControlesEntregados"),
            Color = pnlTablero.find("#Color"),
            btnAgregar = pnlTablero.find("#btnAgregar"), Control = pnlTablero.find("#Control"),
            Pares = pnlTablero.find("#Pares"), Semana = pnlTablero.find("#Sem"),
            Frac = pnlTablero.find("#Frac"), Fecha = pnlTablero.find("#Fecha"),
            Documento = pnlTablero.find("#Documento"), btnAceptar = pnlTablero.find("#btnAceptar"),
            btnImprimirVale = pnlTablero.find("#btnImprimirVale"), btnImprimirValeAyuda = pnlTablero.find("#btnImprimirValeAyuda");

    $(document).ready(function () {

        btnImprimirValeAyuda.click(function () {
        });

        btnImprimirVale.click(function () {
            if (Documento.val()) {
                HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
                var f = new FormData();
                f.append('DOCUMENTO', Documento.val());
                $.ajax({
                    url: '<?php print base_url('AvanceTejido/getVale'); ?>',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: f
                }).done(function (data, x, jq) {
                    console.log(data);
                    var ext = getExt(data);
                    if (data.length > 0) {
                        if (ext === "pdf" || ext === "PDF" || ext === "Pdf") {
                            $.fancybox.defaults.animationEffect = "zoom-in-out";
                            $.fancybox.defaults.animationDuration = 366;
                            $.fancybox.open({
                                src: base_url + 'js/pdf.js-gh-pages/web/viewer.html?file=' + data + '#pagemode=thumbs',
                                type: 'iframe',
                                opts: {
                                    afterShow: function (instance, current) {
                                        console.info('done!');
                                    },
                                    iframe: {
                                        // Iframe template
                                        tpl: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowtransparency="true" src=""></iframe>',
                                        preload: true,
                                        // Custom CSS styling for iframe wrapping element
                                        // You can use this to set custom iframe dimensions
                                        css: {
                                            width: "95%",
                                            height: "95%"
                                        },
                                        // Iframe tag attributes
                                        attr: {
                                            scrolling: "auto"
                                        }
                                    }
                                }
                            });
                        } else if (ext === "xls" || ext === "XLS" || ext === "Xls") {
                            window.open(data, '_blank');
                        }
                    } else {
                        swal({
                            title: "ATENCIÓN",
                            text: "NO EXISTEN DOCUMENTOS PARA ESTE PROVEEDOR",
                            icon: "error"
                        }).then((action) => {

                        });
                    }
                    HoldOn.close();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                    HoldOn.close();
                }).always(function () {
                    HoldOn.close();
                });
            } else {
                swal('ATENCIÓN', 'DEBE DE ESPECIFICAR UN DOCUMENTO', 'warning').then((value) => {
                    Documento.focus().select();
                });
            }
        });

        Fecha.val('<?php print Date("d/m/Y"); ?>');
        getChoferes();

        getTejedoras();

        Tejedora.change(function () {
            getUltimoDocumento();
            Documento.focus();
        });

        btnAceptar.click(function () {
            if (Chofer.val() && Tejedora.val() && Documento.val() &&
                    Control.val() && Frac.val() && Estilo.val() &&
                    Color.val() && Pares.val() && Semana.val()
                    && Fecha.val()) {

                /*1.- REVISAR SI YA TIENE UN AVANCE, DE LO CONTRARIO ARROJAR UN MENSAJE SOBRE ELLO*/
                $.getJSON('<?php print base_url('AvanceTejido/onVerificarAvance') ?>',
                        {CONTROL: Control.val()}).done(function (a) {
                    console.log(a)
                    if (parseInt(a[0].EXISTE) > 0) {
                        swal('ATENCIÓN', 'ESTE CONTROL YA TIENE UN AVANCE DENTRO DE ESTE MODULO, ESPECIFIQUE OTRO CONTROL').then((value) => {
                            Control.focus().select();
                        });
                    } else {
                        getUltimoDocumento();
                        /*2.-  */
                        var nomchofer = Chofer.find("option:selected").text(), nomteje = Tejedora.find("option:selected").text();

                        $.post('<?php print base_url('AvanceTejido/onAvanzar') ?>', {
                            NUM_CHOFER: Chofer.val(),
                            CHOFER: getNombre(nomchofer),
                            NUM_TEJEDORA: Tejedora.val(),
                            TEJEDORA: getNombre(nomteje),
                            FECHA: Fecha.val(),
                            CONTROL: Control.val(),
                            ESTILO: Estilo.val(),
                            COLOR: Color.val(),
                            COLORT: Color.find("option:selected").text(),
                            DOCUMENTO: Documento.val(),
                            PARES: Pares.val(),
                            FRACCION: Frac.val()
                        }).done(function (a) {
                            console.log(a);
                            swal('ATENCIÓN', 'SE HA GENERADO UN AVANCE A TEJIDO EN EL CONTROL ' + Control.val(), 'success').then((value) => {
                                onClearFields(pnlTablero);
                            });
                        }).fail(function (x) {
                            getError(x);
                        }).always(function () {
                            HoldOn.close();
                        });
                    }
                }).fail(function (x) {
                    getError(x);
                }).always(function () {
                    HoldOn.close();
                });
            } else {
                swal('ATENCIÓN', 'TODOS LOS CAMPOS SON REQUERIDOS', 'warning');
            }
        });

        Frac.on('keydown', function (e) {
            if (e.keyCode === 13 && Frac.val()) {
                onVerificarAvance();
                getUltimoDocumento();
            }
        });

        Estilo.on('keydown', function (e) {
            if (e.keyCode === 13) {
                $.getJSON("<?php print base_url('colores_x_estilo') ?>").done(function (x, y, z) {
                    getUltimoDocumento();
                }).fail(function (x, y, z) {
                    getError(x);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });

        Control.on('keydown', function (e) {
            if (e.keyCode === 13) {
                $.getJSON('<?php print base_url('AvanceTejido/onVerificarAvance') ?>',
                        {CONTROL: Control.val()}).done(function (ax) {
                    if (parseInt(ax[0].EXISTE) > 0) {
                        swal('ATENCIÓN', 'ESTE CONTROL YA TIENE UN AVANCE DENTRO DE ESTE MODULO, ESPECIFIQUE OTRO CONTROL').then((value) => {
                            Control.focus().select();
                            onClearFields(pnlTablero);
                        });
                    } else {
                        if (Control.val() && e.keyCode === 13) {
                            getUltimoAvanceXControl();
                            $.getJSON("<?php print base_url('AvancePespunteMaquila/getInfoControl'); ?>", {
                                CONTROL: Control.val()
                            }).done(function (a, b, c) {
                                console.log(a);
                                if (a.length > 0) {
                                    var rq = a[0];

                                    Estilo.val(rq.Estilo);
                                    getColoresXEstilo(rq.Estilo, rq);
                                    Pares.val(rq.Pares);
                                    getSemanaNomina();
                                    Fecha.val('<?php print Date("d/m/Y"); ?>');
                                    Frac.val(401);
                                    /*
                                     * 401	TEJIDA A MANO->DEFAULT
                                     * 402	TEJIDA A MANO MUESTRA
                                     * 403	TEJIDA MAQUINA 1
                                     * 404	TEJIDA MAQUINA  2
                                     * 405	TEJIDO DE FLORETA
                                     */
                                } else {
                                    swal('ATENCIÓN', 'NO SE TIENE INFORMACIÓN SOBRE ESTE CONTROL, PUEDE QUE NO EXISTA O QUE NO HAYA SIDO AVANZADO AL DEPTO CORRESPONDIENTE', 'warning').then((value) => {
                                        Control.focus().select();
                                    });
                                }
                            }).fail(function (x, y, z) {
                                getError(x);
                            }).always(function () {
                                HoldOn.close();
                            });
                        }
                    }
                });
            }
        });

        var cols = [
            {"data": "ID"}/*0*/, {"data": "CONTROL"}/*1*/,
            {"data": "ESTILO"}/*2*/, {"data": "COLOR"},
            {"data": "PARES"}, {"data": "ENTREGA"}, {"data": "MAQUILA"}
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
            "ajax": {
                "url": '<?php print base_url('AvanceTejido/getControlesParaTejido'); ?>',
                "type": "POST",
                "contentType": "application/json",
                "dataSrc": ""
            },
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
            "scrollY": "498px",
            "scrollX": true,
            createdRow: function (row, data, dataIndex) {
            }
        };

        ControlesListosParaTejido = tblControlesListosParaTejido.DataTable(xoptions);
        cols = [
            {"data": "ID"}/*0*/, {"data": "CHOFER"}/*1*/,
            {"data": "TEJEDORA"}/*2*/, {"data": "FECHA"},
            {"data": "CONTROL"}, {"data": "ESTILO"},
            {"data": "COLOR"}, {"data": "COLORT"},
            {"data": "PARES"}, {"data": "DOCTO"}
        ];
        coldefs = [
            {
                "targets": [0],
                "visible": false,
                "searchable": false
            }
        ];
        var xoptions = {
            "dom": 'rit',
            "ajax": {
                "url": '<?php print base_url('AvanceTejido/getControlesEnTejido'); ?>',
                "type": "POST",
                "contentType": "application/json",
                "dataSrc": ""
            },
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
            getError(x);
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
            getError(x);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getColoresXEstilo(e, rq) {
        $.getJSON("<?php print base_url('avance_a_pespunte_x_maquila_colores_x_estilo') ?>", {ESTILO: e}).done(function (x, y, z) {
            x.forEach(function (i) {
                Color[0].selectize.addOption({text: i.COLOR, value: i.CLAVE});
            });
            if (rq) {
                Color[0].selectize.setValue(rq.Color);
            }
        }).fail(function (x, y, z) {
            getError(x);
        }).always(function () {
            HoldOn.close();
        });
    }

    function onVerificarAvance() {
        $.getJSON('<?php print base_url('AvanceTejido/onVerificarAvance') ?>',
                {CONTROL: Control.val()}).done(function (a) {
            if (a.length > 0) {
                if (parseInt(a[0].EXISTE) > 0) {
                    swal('ATENCIÓN', 'ESTE CONTROL YA TIENE UN AVANCE DENTRO DE ESTE MODULO, ESPECIFIQUE OTRO CONTROL').then((value) => {
                        Control.focus().select();
                        Fra.val('');
                        Estilo.val('');
                        Color[0].selectize.clear(true);
                        Pares.val('');
                        Semana.val('');
                        Fecha.val('');
                    });
                }
            }
        }).fail(function (x) {
            getError(x);
        }).always(function () {
            HoldOn.close();
        });
    }

    function zeroFill(number, width)
    {
        width -= number.toString().length;
        if (width > 0)
        {
            return new Array(width + (/\./.test(number) ? 2 : 1)).join('0') + number;
        }
        return number + ""; // always return a string
    }

    function onClearFields(parent) {
        parent.find("input").val("");
        $.each(parent.find("select"), function (k, v) {
            parent.find("select")[k].selectize.clear(true);
        });
    }

    function getUltimoDocumento() {
        HoldOn.open({
            theme: 'sk-rect'
        });
        var documento = "";
        $.getJSON('<?php print base_url('AvanceTejido/getUltimoDocumento'); ?>').done(function (a) {
            console.log(a);
            /*19(ANO) 03(MES) 07(DIA) 001(CONSECUTIVO) = 190307001*/
            if (a.length > 0) {
                var udoc = a[0];
                documento = udoc.ANO + "" + udoc.MES + "" + udoc.DIA + "" + udoc.CONSECUTIVO;
                Documento.val(documento);
                ControlesEntregados.ajax.reload();
            } else {
                swal('ERROR', 'NO FUE POSIBLE OBTENER EL ULTIMO DOCUMENTO, REVISE LA CONSOLA PARA MAS DETALLE', 'error');
            }
        }).fail(function (x) {
            getError(x);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getUltimoAvanceXControl() {
        $.getJSON('<?php print base_url('AvanceTejido/getUltimoAvanceXControl'); ?>',
                {CONTROL: Control.val()}).done(function (a) {
            console.log(a);
        }).fail(function (x) {
            getError(x);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getSemanaNomina() {
        $.getJSON('<?php print base_url('AvanceTejido/getSemanaNomina') ?>', {
            FECHA: Fecha.val()
        }).done(function (a) {
            if (a.length > 0) {
                Semana.val(a[0].SEMANA);
            }
        }).fail(function (x) {
            getError(x);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getNombre(e) {
        return e.replace((e.split(" "))[0], '').replace("0", '');
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