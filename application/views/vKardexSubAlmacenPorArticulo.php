<div class="modal " id="mdlKardexSubAlmacen"  role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kardex del Sub-Almacen por Artículo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmCaptura">

                    <div class="row">
                        <div class="col-4">
                            <label>Del: </label>
                            <input type="text" class="form-control form-control-sm date notEnter" id="FechaIni" name="FechaIni" >
                        </div>
                        <div class="col-4">
                            <label>Hasta: </label>
                            <input type="text" class="form-control form-control-sm date notEnter" id="FechaFin" name="FechaFin" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <label>Artículo</label>
                            <select class="form-control form-control-sm" id="Articulo" name="Articulo" >
                                <option value=""></option>
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

    var mdlKardexSubAlmacen = $('#mdlKardexSubAlmacen');

    $(document).ready(function () {
        validacionSelectPorContenedor(mdlSalidasMaquilasPorDia);
        setFocusSelectToInputOnChange('#Articulo', '#btnImprimir', mdlKardexSubAlmacen);

        mdlKardexSubAlmacen.on('shown.bs.modal', function () {
            mdlKardexSubAlmacen.find("input").val("");
            $.each(mdlKardexSubAlmacen.find("select"), function (k, v) {
                mdlKardexSubAlmacen.find("select")[k].selectize.clear(true);
            });
            getArticulosKardexSubAlm();

            mdlKardexSubAlmacen.find('#FechaIni').val(getFirstDayMonth());
            mdlKardexSubAlmacen.find('#FechaFin').val(getLastDayMonth());
            mdlKardexSubAlmacen.find('#FechaIni').focus();
        });
        mdlKardexSubAlmacen.find('#btnImprimir').on("click", function () {
            var Art = parseInt(mdlKardexSubAlmacen.find('#Articulo').val());

            if (Art > 0) {
                HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
                var frm = new FormData(mdlKardexSubAlmacen.find("#frmCaptura")[0]);

                $.ajax({
                    url: base_url + 'index.php/ReportesKardex/onReporteKardexSubAlmacePorArticulo',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: frm
                }).done(function (data, x, jq) {
                    console.log(data);
                    if (data.length > 0) {

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


                    } else {
                        swal({
                            title: "ATENCIÓN",
                            text: "NO EXISTEN DATOS PARA ESTE REPORTE",
                            icon: "error"
                        }).then((action) => {
                            mdlKardexSubAlmacen.find('#Articulo')[0].selectize.focus();
                        });
                    }
                    HoldOn.close();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                    HoldOn.close();
                });
            } else {
                swal({
                    title: "ATENCIÓN",
                    text: "DEBES DE SELECCIONAR UN ARTÍCULO",
                    icon: "error"
                }).then((action) => {
                    mdlKardexSubAlmacen.find('#Articulo')[0].selectize.focus();
                });
            }
        });

    });

    function getArticulosKardexSubAlm() {
        mdlKardexSubAlmacen.find("#Articulo")[0].selectize.clear(true);
        mdlKardexSubAlmacen.find("#Articulo")[0].selectize.clearOptions();
        $.getJSON(base_url + 'index.php/ReportesKardex/getArticulos').done(function (data) {
            $.each(data, function (k, v) {
                mdlKardexSubAlmacen.find("#Articulo")[0].selectize.addOption({text: v.Articulo, value: v.Clave});
            });
        }).fail(function (x) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        });
    }

</script>