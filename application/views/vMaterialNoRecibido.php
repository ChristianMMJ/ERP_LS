<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-body ">
        <div class="row">
            <div class="col-sm-8 float-left">
                <legend class="float-left">Material No Recibido</legend>
            </div>
            <div class="col-sm-4" align="right">
                <button type="button" class="btn btn-warning" id="btnLimpiarFiltros" data-toggle="tooltip" data-placement="right" title="Limpiar Filtros">
                    <i class="fa fa-trash"></i>
                </button>
                <button type="button" class="btn btn-info" id="btnImprimirReporte" data-toggle="tooltip" data-placement="top" title="Imprimir Reporte">
                    <i class="fa fa-print"></i>
                </button>
            </div>
        </div>
        <div class="card-block mt-4">
            <div id="Compras" class="table-responsive">
                <table id="tblCompras" class="table table-sm display " style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Departamento</th>
                            <th>Folio</th>
                            <th>Proveedor</th>
                            <th>Fecha Orden</th>
                            <th>Fecha Entrega</th>
                            <th>Fecha Confirmación</th>
                            <th>Observaciones</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Departamento</th>
                            <th>Folio</th>
                            <th>Proveedor</th>
                            <th>Fecha Orden</th>
                            <th>Fecha Entrega</th>
                            <th>Fecha Confirmación</th>
                            <th>Observaciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal " id="mdlReporteConfirmacion"  role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmación de Orden es de Compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmReporte">
                    <div class="row">
                        <div class="col-4">
                            <label>Año</label>
                            <input type="text" maxlength="4" class="form-control form-control-sm numbersOnly" id="Ano" name="Ano" >
                        </div>
                        <div class="col-4">
                            <label>De la maq.</label>
                            <input type="text" maxlength="3" class="form-control form-control-sm numbersOnly" id="Maq" name="Maq" >
                        </div>
                        <div class="col-4">
                            <label>De la sem.</label>
                            <input type="text" maxlength="2" class="form-control form-control-sm numbersOnly" id="Sem" name="Sem" >
                        </div>

                    </div>
                    <div class="row mt-2">
                        <div class="col-12 col-sm-8">
                            <label>Tipo <span class="badge badge-info mb-2" style="font-size: 12px;">10 Piel/Forro, 80 Suela, 90 Peletería</span></label>
                            <select class="form-control form-control-sm required selectize" id="Tipo" name="Tipo" >
                                <option value=""></option>
                                <option value="10">10 PIEL Y FORRO</option>
                                <option value="80">80 SUELA</option>
                                <option value="90">90 INDIRECTOS</option>
                            </select>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnImprimir">ACEPTAR</button>
                <button type="button" class="btn btn-secondary" id="btnSalir" data-dismiss="modal">SALIR</button>
            </div>
        </div>
    </div>
</div>


<script>
    var master_url = base_url + 'index.php/MaterialNoRecibido/';
    var tblCompras = $('#tblCompras');
    var Compras;
    var mdlReporteConfirmacion = $('#mdlReporteConfirmacion');
    var pnlTablero = $("#pnlTablero");
    $(document).ready(function () {




        /*FUNCIONES INICIALES*/
        init();
        handleEnter();
        pnlTablero.find("input").val("");
        validacionSelectPorContenedor(mdlReporteConfirmacion);
        setFocusSelectToInputOnChange('#Tipo', '#btnImprimir', mdlReporteConfirmacion);
        mdlReporteConfirmacion.find("#Ano").change(function () {
            if (parseInt($(this).val()) < 2016 || parseInt($(this).val()) > 2020 || $(this).val() === '') {
                swal({
                    title: "ATENCIÓN",
                    text: "AÑO INCORRECTO",
                    icon: "warning",
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    buttons: false,
                    timer: 1000
                }).then((action) => {
                    mdlReporteConfirmacion.find("#Ano").val("");
                    mdlReporteConfirmacion.find("#Ano").focus();
                });
            }
        });
        mdlReporteConfirmacion.find("#Maq").change(function () {
            onComprobarMaquilas($(this));
        });
        mdlReporteConfirmacion.find("#Sem").change(function () {
            var ano = mdlReporteConfirmacion.find("#Ano");
            onComprobarSemanasProduccion($(this), ano.val());
        });
        mdlReporteConfirmacion.on('shown.bs.modal', function () {
            mdlReporteConfirmacion.find("input").val("");
            $.each(mdlReporteConfirmacion.find("select"), function (k, v) {
                mdlReporteConfirmacion.find("select")[k].selectize.clear(true);
            });
            mdlReporteConfirmacion.find('#Ano').focus();
        });
        mdlReporteConfirmacion.find('#btnImprimir').on("click", function () {
            //HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
            var frm = new FormData(mdlReporteConfirmacion.find("#frmReporte")[0]);
            $.ajax({
                url: master_url + 'onImprimirReporteConfirmacion',
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: frm
            }).done(function (data, x, jq) {
                console.log(data);
                if (data.length > 0) {

                    $.fancybox.open({
                        src: data,
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
                                    width: "85%",
                                    height: "85%"
                                },
                                // Iframe tag attributes
                                attr: {
                                    scrolling: "auto"
                                }
                            }
                        }
                    });
                } else {
                    swal({
                        title: "ATENCIÓN",
                        text: "NO EXISTEN ORDENES DE COMPRA CON ESTOS CRITERIOS",
                        icon: "error"
                    }).then((action) => {
                        mdlReporteConfirmacion.find('#Ano').focus();
                    });
                }
                HoldOn.close();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
                HoldOn.close();
            });
        });
        pnlTablero.find('#btnImprimirReporte').click(function () {
            mdlReporteConfirmacion.modal('show');
        });
        pnlTablero.find('#btnLimpiarFiltros').click(function () {
            pnlTablero.find("input").val("");
            tblCompras.DataTable().columns().search('').draw();
        });
    });
    /**
     * Convert an image
     * to a base64 url
     * @param  {String}   url
     * @param  {Function} callback
     * @param  {String}   [outputFormat=image/png]
     */
    function convertImgToBase64URL(url, callback, outputFormat) {
        var img = new Image();
        img.crossOrigin = 'Anonymous';
        img.onload = function () {
            var canvas = document.createElement('CANVAS'),
                    ctx = canvas.getContext('2d'), dataURL;
            canvas.height = img.height;
            canvas.width = img.width;
            ctx.drawImage(img, 0, 0);
            dataURL = canvas.toDataURL(outputFormat);
            callback(dataURL);
            canvas = null;
        };
        img.src = url;
    }

    var logo = '';
    convertImgToBase64URL('http://127.0.0.1/ERP_LS/img/lsbck.png', function (base64Img) {
        logo = base64Img;
    });
    var buttons2 = [
        {
            extend: 'excelHtml5',
            text: ' <i class="fa fa-file-excel"></i>',
            titleAttr: 'Excel',
            exportOptions: {
                columns: ':visible'
            }
        }
        ,
        {
            extend: 'colvis',
            text: '<i class="fa fa-columns"></i>',
            titleAttr: 'Seleccionar Columnas',
            exportOptions: {
                modifier: {
                    page: 'current'
                },
                columns: ':visible'
            }
        },
        {

            exportOptions: {
                columns: ':visible',
                search: 'applied',
                order: 'applied'
            },
            title: 'Nombre del reporte',
            extend: 'pdfHtml5',
            filename: 'Reporte de material no recibido',
            orientation: 'landscape', //portrait
            pageSize: 'letter', //A3 , A5 , A6 , legal , letter
            text: '<i class="fa fa-file-pdf"></i>',
            titleAttr: 'PDF',
            customize: function (doc) {

                var now = new Date();
                var jsDate = now.getDate() + '/' + (now.getMonth() + 1) + '/' + now.getFullYear();
                //Remove the title created by datatTables
                doc.content.splice(0, 1);
                // Set page margins [left,top,right,bottom] or [horizontal,vertical]
                // Dejar espacio para el header y el footer !!!
                //Margenes para el contenido (solo tabla)
                doc.pageMargins = [15, 50, 15, 30];
                // Set the font size fot the entire document
                doc.defaultStyle.fontSize = 6.5;
                // Set the fontsize for the table header
                doc.styles.tableHeader.fontSize = 7.5;
                doc['header'] = (function () {
                    return {
                        columns: [
                            {
                                image: logo,
                                width: 74
                            },
                            {
                                alignment: 'left',
                                bold: true,
                                //italics: true,
                                text: "CALZADO LOBO SA DE CV " + "\nRelacion de mercancia no recibida de ordenes de compra ",
                                fontSize: 9,
                                //Margen para esta columna solamente
                                margin: [10, 0]
                            },
                            {
                                alignment: 'right',
                                fontSize: 7.5,
                                text: ['Fecha: ', {text: jsDate.toString()}]
                            }
                        ],
                        //Margen general del header
                        margin: 10
                    }
                });
                // Create a footer object with 2 columns
                // Left side: report creation date
                // Right side: current page and total pages
                doc['footer'] = (function (page, pages) {
                    return {
                        columns: [
                            {
                                fontSize: 7.5,
                                alignment: 'right',
                                text: ['Página ', {text: page.toString()}, ' de ', {text: pages.toString()}]
                            }
                        ],
                        margin: 10
                    }
                });
                // Change dataTable layout (Table styling)
                // To use predefined layouts uncomment the line below and comment the custom lines below
                // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly

                doc['styles'] = {
                    header: {
                        fontSize: 7,
                        bold: true,
                        margin: [0, 0, 0, 10]
                    },
                    tableHeader: {
                        bold: true,
                        fontSize: 7,
                        color: 'black'
                    }
                };


                var objLayout = {};
                objLayout['hLineWidth'] = function (i, node) {
                    if (i === 0 || i === node.table.body.length) {
                        return 0;
                    }
                    return (i === node.table.headerRows) ? 1 : 0.5;
                };
                objLayout['vLineWidth'] = function (i, node) {
                    return 0;
                };
                objLayout['hLineColor'] = function (i, node) {
                    return i === 1 ? 'black' : 'black';
                };
                objLayout['vLineColor'] = function (i, node) {
                    return 'black';
                };
                objLayout['paddingLeft'] = function (i, node) {
                    return i === 0 ? 0 : 8;
                };
                objLayout['paddingRight'] = function (i, node) {
                    return (i === node.table.widths.length - 1) ? 0 : 8;
                };
                doc.content[0].layout = objLayout;
//                doc.content[0].layout = 'lightHorizontalLines';

            }
        }

    ];
    function init() {
        getRecords();
    }
    function getRecords() {
        temp = 0;
        HoldOn.open({
            theme: 'sk-cube',
            message: 'CARGANDO...'
        });
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblCompras')) {
            tblCompras.DataTable().destroy();
        }
        Compras = tblCompras.DataTable({
            "dom": 'Brtip',
            buttons: buttons2,
            orderCellsTop: true,
            fixedHeader: true,
            "ajax": {
                "url": master_url + 'getRecords',
                "dataSrc": ""
            },
            "columns": [
                {"data": "ID"}, {"data": "Tp"}, {"data": "Tipo"},
                {"data": "Folio"}, {"data": "Proveedor"}, {"data": "FechaOrden"},
                {"data": "FechaEnt"}, {"data": "FechaConf"}, {"data": "ObsConf"}
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
                    "searchable": true
                },
                {
                    "targets": [2],
                    "visible": false,
                    "searchable": true
                }
            ],
            rowGroup: {
                // Group by office
                dataSrc: "Proveedor"
            },
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
                [1, 'desc'], [3, 'desc']/*Folio*/
            ],
            "createdRow": function (row, data, index) {
                $.each($(row).find("td"), function (k, v) {
                    var c = $(v);
                    var index = parseInt(k);
                    switch (index) {
                        case 2:
                            /*FECHA ORDEN*/
                            c.addClass('text-strong');
                            break;
                        case 3:
                            /*FECHA ENTREGA*/
                            c.addClass('text-success text-strong');
                            break;
                        case 4:
                            /*fecha conf*/
                            c.addClass('text-info text-strong');
                            break;
                        case 5:
                            /*observaciones*/
                            c.addClass('text-info text-strong');
                            break;
                    }
                });
            },
            initComplete: function (a, b) {
                HoldOn.close();
                $(':input:text:enabled:visible:first').focus();
            }
        });
        $('#tblCompras tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input class="form-control form-control-sm" type="text" placeholder="Buscar por ' + title + '" />');
        });
        Compras.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that.search(this.value).draw();
                }
            });
        });
        tblCompras.find('tbody').on('click', 'tr', function () {
            tblCompras.find("tbody tr").removeClass("success");
            $(this).addClass("success");
            var dtm = Compras.row(this).data();
            temp = parseInt(dtm.ID);
            swal("Observaciones", {
                content: "input"
            }).then((value) => {
                $.post(master_url + 'onModificar', {ID: temp, ObservacionesConf: value.toUpperCase()}).done(function (data) {
                    Compras.ajax.reload();
                    pnlTablero.find("input").val("");
                    tblCompras.DataTable().columns().search('').draw();
                    pnlTablero.find('#col1_filter').focus();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                });
            });
        });
    }

</script>
<style>
    .text-strong {
        font-weight: bolder;
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

    td span.badge{
        font-size: 100% !important;
    }
</style>
