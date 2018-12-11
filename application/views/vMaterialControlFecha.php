<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-body ">
        <div class="row">
            <div class="col-sm-8 float-left">
                <legend class="float-left">Material a Entregar por Control
                </legend>
            </div>

        </div>
        <div class="row">
            <div class="col-6 col-sm-3 col-md-3 col-lg-2 col-xl-2">
                <label for="Control" >Control*</label>
                <input type="text" class="form-control form-control-sm numbersOnly" maxlength="10" id="Control" name="Control" required="">
            </div>
            <div class="col-6 col-sm-5 col-md-4 col-lg-4 col-xl-4 mt-4">
                <button type="button" class="btn btn-primary" id="btnAceptar" data-toggle="tooltip" data-placement="top" title="Agregar Control">
                    <i class="fa fa-save"></i> ACEPTAR
                </button>
                <button type="button" class="btn btn-success" id="btnImprimir" data-toggle="tooltip" data-placement="right" title="Imprimir Reporte">
                    <i class="fa fa-print"></i> IMPRIMIR
                </button>
            </div>
        </div>
        <div class="card-block mt-4">
            <div id="Controles" class="table-responsive">
                <table id="tblControles" class="table table-sm display " style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Control</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        var master_url = base_url + 'index.php/MaterialControlFecha/';
        var pnlTablero = $("#pnlTablero");
        var btnAceptar = pnlTablero.find('#btnAceptar');
        var btnImprimir = pnlTablero.find('#btnImprimir');
        var tblControles = pnlTablero.find('#tblControles');
        var Controles;
        var n = 1;
        $(document).ready(function () {

            handleEnter();
            init();
            pnlTablero.find('#Control').blur(function () {
                var control = $(this).val().toString();
                if (control !== '') {
                    //---------------Consultar Contro en pedido-------------------
                    $.getJSON(master_url + 'getPedidoByControl', {
                        Control: control
                    }).done(function (data) {
                        if (data.length > 0) { //Si el control existe
                            //---------------Consultar orden de produccion por control-------------------
                            $.getJSON(master_url + 'getOrdenProduccionByControl', {
                                Control: control
                            }).done(function (data) {
                                if (data.length > 0) { //Si la orden existe

                                } else { //Si el orden existe
                                    swal({
                                        title: "ATENCIÓN",
                                        text: "LA ORDEN DE PRODUCCIÓN PARA EL CONTROL " + control + " NO EXISTE ",
                                        icon: "warning",
                                        closeOnClickOutside: false,
                                        closeOnEsc: false
                                    }).then((action) => {
                                        if (action) {
                                            pnlTablero.find('#Control').val('').focus();
                                        }
                                    });
                                }
                            });
                        } else { //Si el control no existe
                            swal({
                                title: "ATENCIÓN",
                                text: "EL CONTROL " + control + " NO EXISTE ",
                                icon: "warning",
                                closeOnClickOutside: false,
                                closeOnEsc: false
                            }).then((action) => {
                                if (action) {
                                    pnlTablero.find('#Control').val('').focus();
                                }
                            });
                        }
                    });
                }
            });
            btnAceptar.click(function () {
                var control = pnlTablero.find('#Control').val();
                if (control !== '') {
                    var existe = false;
                    if (pnlTablero.find("#tblControles tbody tr").length > 0) {
                        Controles.rows().every(function (rowIdx, tableLoop, rowLoop) {
                            var data = this.data();
                            if (data[1] === control) {
                                existe = true;
                                return false;
                            }
                        });
                    }
                    if (!existe) {
                        n = (n > 0) ? n : 1;
                        Controles.row.add([
                            n,
                            control,
                            '<button type="button" class="btn btn-danger btn-sm" onclick="onEliminarRenglon(this)" title="Eliminar"><i class="fa fa-trash"></i> </button>'
                        ]).draw(false);
                        n += 1;
                        pnlTablero.find('#Control').val('').focus();
                    } else {
                        swal({
                            title: "ERROR",
                            text: "YA SE HA AGREGADO ESTE CONTROL, INTRODUCE OTRO",
                            icon: "error",
                            closeOnClickOutside: false,
                            closeOnEsc: false
                        }).then((action) => {
                            if (action) {
                                pnlTablero.find('#Control').val('').focus();
                            }
                        });
                    }

                } else {
                    swal({
                        title: "ATENCIÓN",
                        text: "DEBE DE INTRODUCIR UN CONTROL ",
                        icon: "warning",
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    }).then((action) => {
                        if (action) {
                            pnlTablero.find('#Control').val('').focus();
                        }
                    });
                }

            });
            btnImprimir.click(function () {
                //HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
                var detalle = [];
                //Destruye la instancia de datatable
                if ($.fn.DataTable.isDataTable('#tblControles')) {
                    Controles.destroy();
                }

                //Iteramos en la tabla natural
                pnlTablero.find("#tblControles > tbody > tr").each(function (k, v) {
                    var row = $(this).find("td");
                    //Se declara y llena el objeto obteniendo su valor por el indice y se elimina cualquier espacio
                    var controles = {
                        Control: row.eq(1).text().replace(/\s+/g, '')
                    };
                    //Se mete el objeto al arreglo
                    detalle.push(controles);
                });

                //Imprimir
                $.post(master_url + 'onImprimirReportePorControlDepartamento', {
                    Controles: JSON.stringify(detalle)
                }).done(function (data) {
                    console.log(data);
                    if (data.length > 0) {
                        $.fancybox.open({
                            src: base_url + 'js/pdf.js-gh-pages/web/viewer.html?file=' + data + '#pagemode=thumbs',
                            type: 'iframe',
                            opts: {
                                afterShow: function (instance, current) {
                                    console.info('done!');
                                    //init();
                                },
                                iframe: {
                                    // Iframe template
                                    tpl: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowtransparency="true" src=""></iframe>',
                                    preload: true,
                                    // Custom CSS styling for iframe wrapping element
                                    // You can use this to set custom iframe dimensions
                                    css: {
                                        width: "100%",
                                        height: "100%"
                                    },
                                    // Iframe tag attributes
                                    attr: {
                                        scrolling: "auto"
                                    }
                                }
                            }
                        });
                        HoldOn.close();
                    } else {
                        swal({
                            title: "ATENCIÓN",
                            text: "NO EXISTEN DATOS PARA EL REPORTE",
                            icon: "error"
                        });
                        HoldOn.close();
                    }
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                    HoldOn.close();
                });


            });
        });

        function onEliminarRenglon(v) {
            $(v).parent().parent().remove();
            Controles.row($(v).parent().parent()).remove().draw();
        }
        function init() {
            pnlTablero.find('#Control').focus();
            pnlTablero.find("#tblControles > tbody").html("");
            Controles = tblControles.DataTable({
                "dom": 'frti',
                buttons: buttons,
                orderCellsTop: true,
                fixedHeader: true,
                language: lang,
                "autoWidth": true,
                "colReorder": true,
                "displayLength": 30,
                "bLengthChange": false,
                "deferRender": true,
                "scrollCollapse": false,
                "bSort": true,
                "columnDefs": [
                    {
                        "targets": [0],
                        "visible": false,
                        "searchable": true
                    }],
                "aaSorting": [
                    [0, 'desc']
                ]
            });
            pnlTablero.find('#tblControles tbody').on('click', 'tr', function () {
                pnlTablero.find("#tblControles tbody tr").removeClass("success");
                $(this).addClass("success");
            });
            n = 1;
        }
    </script>
