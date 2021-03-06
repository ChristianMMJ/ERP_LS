<div class="modal " id="mdlMaterialSemanaProduccionEstilo"  role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Material de la Semana Producción por Estilo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmReporte">

                    <div class="row">
                        <div class="col-6">
                            <label>Año </label>
                            <input type="text" maxlength="4" class="form-control form-control-sm numbersOnly" id="Ano" name="Ano" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label>Semana </label>
                            <input type="text" maxlength="2" class="form-control form-control-sm numbersOnly" id="Sem" name="Sem" >
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 mt-2">
                        <legend class="badge badge-danger" style="font-size: 14px;">Nota: Sólo para maquila</legend>
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
                <button type="button" class="btn btn-primary" id="btnImprimir">IMPRIMIR</button>
                <button type="button" class="btn btn-secondary" id="btnSalir" data-dismiss="modal">SALIR</button>
            </div>
        </div>
    </div>
</div>
<script>

    var mdlMaterialSemanaProduccionEstilo = $('#mdlMaterialSemanaProduccionEstilo');
    $(document).ready(function () {
        setFocusSelectToInputOnChange('#Tipo', '#btnImprimir', mdlMaterialSemanaProduccionEstilo);

        mdlMaterialSemanaProduccionEstilo.on('shown.bs.modal', function () {
            mdlMaterialSemanaProduccionEstilo.find("input").val("");
            $.each(mdlMaterialSemanaProduccionEstilo.find("select"), function (k, v) {
                mdlMaterialSemanaProduccionEstilo.find("select")[k].selectize.clear(true);
            });
            getArticulosMatSemProd();
            mdlMaterialSemanaProduccionEstilo.find('#Ano').focus();
        });

        mdlMaterialSemanaProduccionEstilo.find("#Ano").change(function () {
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
                    mdlMaterialSemanaProduccionEstilo.find("#Ano").val("");
                    mdlMaterialSemanaProduccionEstilo.find("#Ano").focus();
                });
            }
        });

        mdlMaterialSemanaProduccionEstilo.find("#Sem").change(function () {
            var ano = mdlMaterialSemanaProduccionEstilo.find("#Ano");
            onComprobarSemanasProduccion($(this), ano.val());
        });

        mdlMaterialSemanaProduccionEstilo.find('#btnImprimir').on("click", function () {
            HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
            var frm = new FormData(mdlMaterialSemanaProduccionEstilo.find("#frmReporte")[0]);

            $.ajax({
                url: base_url + 'index.php/ReporteMaterialProduccionEstilo/onReporteMaterialSemanaProdEstilo',
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
                        mdlMaterialSemanaProduccionEstilo.find('#Ano').focus();
                    });
                }
                HoldOn.close();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
                HoldOn.close();
            });
        });

    });

    function onComprobarSemanasProduccion(v, ano) {
        $.getJSON(base_url + 'index.php/OrdenCompra/onComprobarSemanasProduccion', {Clave: $(v).val(), Ano: ano}).done(function (data) {
            if (data.length > 0) {

            } else {
                swal({
                    title: "ATENCIÓN",
                    text: "LA SEMANA " + $(v).val() + " DEL " + ano + " " + "NO EXISTE",
                    icon: "warning",
                    buttons: {
                        eliminar: {
                            text: "Aceptar",
                            value: "aceptar"
                        }
                    }
                }).then((value) => {
                    switch (value) {
                        case "aceptar":
                            swal.close();
                            $(v).val('');
                            $(v).focus();
                            break;
                    }
                });
            }
        }).fail(function (x, y, z) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        });
    }

    function getArticulosMatSemProd() {
        mdlMaterialSemanaProduccionEstilo.find("#Articulo")[0].selectize.clear(true);
        mdlMaterialSemanaProduccionEstilo.find("#Articulo")[0].selectize.clearOptions();
        $.getJSON(base_url + 'index.php/ReporteMaterialProduccionEstilo/getArticulos').done(function (data) {
            $.each(data, function (k, v) {
                mdlMaterialSemanaProduccionEstilo.find("#Articulo")[0].selectize.addOption({text: v.Articulo, value: v.Clave});
            });
        }).fail(function (x) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        });
    }

</script>