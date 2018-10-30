<div class="modal animated fadeIn" id="mdlParesAsignados">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pares asignados en preprogramación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <label>De la Maquila</label>
                        <input type="text" id="ParesMaquilaInicial" name="ParesMaquilaInicial" class="form-control form-control-sm" autofocus="">
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <label>A la Maquila</label>
                        <input type="text" id="ParesMaquilaFinal" name="ParesMaquilaFinal" class="form-control form-control-sm">
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <label>De sem</label>
                        <input type="text" id="ParesSemanaInicial" name="ParesSemanaInicial" class="form-control form-control-sm">
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <label>A sem</label>
                        <input type="text" id="ParesSemanaFinal" name="ParesSemanaFinal" class="form-control form-control-sm">
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <label>Año</label>
                        <input type="text" id="ParesAnio" name="ParesAnio" class="form-control form-control-sm">
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="rCteFechaEntrega" name="rCheck" class="custom-control-input">
                                <label class="custom-control-label" for="rCteFechaEntrega">Cte fecha entrega</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="rPedido" name="rCheck" class="custom-control-input">
                                <label class="custom-control-label" for="rPedido">Pedido</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6"> 
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="rEstiloColor" name="rCheck" class="custom-control-input">
                                <label class="custom-control-label" for="rEstiloColor">Estilo-Color</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="rFechaEntregaCliente" name="rCheck" class="custom-control-input">
                                <label class="custom-control-label" for="rFechaEntregaCliente">Fecha entrega cte</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"> 
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" align="left">
                    <button type="button" class="btn btn-primary" id="btnAceptar">Aceptar</button>
                </div> 
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" align="right">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div> 
            </div>
        </div>
    </div>
</div>
<script>
    var master_url_pares_asignados = base_url + 'index.php/ParesAsignados/';
    var mdlParesAsignados = $("#mdlParesAsignados");
    var ParesMaquilaInicial = mdlParesAsignados.find("#ParesMaquilaInicial"),
            ParesMaquilaFinal = mdlParesAsignados.find("#ParesMaquilaFinal"),
            ParesSemanaInicial = mdlParesAsignados.find("#ParesSemanaInicial"),
            ParesSemanaFinal = mdlParesAsignados.find("#ParesSemanaFinal"),
            ParesAnio = mdlParesAsignados.find("#ParesAnio");
    var is_showed = false;

    $(document).ready(function () {

        mdlParesAsignados.find("input[type='radio']").change(function () {
            onBeep(3);
        });

        mdlParesAsignados.on('hidden.bs.modal', function () {
            mdlParesAsignados.find("input").val('');
        });

        mdlParesAsignados.on('shown.bs.modal', function () {
            ParesMaquilaInicial.focus();
        });

        mdlParesAsignados.find("#btnAceptar").click(function () {
            console.log(mdlParesAsignados.find("[name='rCheck']"));
            $.post(master_url_pares_asignados + 'getParesAsignados', {
                MAQUILA_INICIAL: ParesMaquilaInicial.val().trim() !== '' ? ParesMaquilaInicial.val() : '',
                MAQUILA_FINAL: ParesMaquilaFinal.val().trim() !== '' ? ParesMaquilaFinal.val() : '',
                SEMANA_INICIAL: ParesSemanaInicial.val().trim() !== '' ? ParesSemanaInicial.val() : '',
                SEMANA_FINAL: ParesSemanaFinal.val().trim() !== '' ? ParesSemanaFinal.val() : '',
                ANIO: ParesAnio.val().trim() !== '' ? ParesAnio.val() : '',
                TIPO: mdlParesAsignados.find("#rCteFechaEntrega")[0].checked ? 1 : mdlParesAsignados.find("#rPedido")[0].checked ? 2 : mdlParesAsignados.find("#rEstiloColor")[0].checked ? 3 : mdlParesAsignados.find("#rFechaEntregaCliente")[0].checked ? 4 : 0
            }).done(function (data, x, jq) {
                console.log(data);
                onImprimirReporteFancy(base_url + 'js/pdf.js-gh-pages/web/viewer.html?file=' + data);
            }).fail(function (x, y, z) {
                console.log(x.responseText);
                swal('ATENCIÓN', 'HA OCURRIDO UN INESPERADO AL OBTENER EL REPORTE,CONSULTE LA CONSOLA PARA MÁS DETALLES.', 'warning');
            }).always(function () {

            });
        });

        ParesMaquilaInicial.on('keydown', function (e) {
            onComprobarMaquilasPares(e, $(this));
        });

        ParesMaquilaFinal.on('keydown', function (e) {
            onComprobarMaquilasPares(e, $(this));
        });

        ParesSemanaInicial.on('keydown', function (e) {
            onVerificarSemanaPares(e, $(this));
        });

        ParesSemanaFinal.on('keydown', function (e) {
            onVerificarSemana(e, $(this));
        });
    });

    function onComprobarMaquilasPares(e, input) {
        if (e.keyCode === 13 && input.val() !== '') {
            $.getJSON(master_url_pares_asignados + 'onComprobarMaquilas', {MAQUILA: input.val()}).done(function (data, x, jq) {
                if (parseInt(data[0].EXISTE_MAQUILA) <= 0) {
                    swal('ATENCIÓN', 'LA MAQUILA ESPECIFICADA NO EXISTE', 'warning').then((value) => {
                        input.focus();
                    });
                }
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {

            });
        }
    }

    function onVerificarSemanaPares(e, input) {
        if (e.keyCode === 13 && input.val() !== '') {
            $.getJSON(master_url_modal + 'onChecarSemanaValida', {SEMANA: input.val()}).done(function (data, x, jq) {
                if (parseInt(data[0].SEMANA_NO_CERRADA) === 1) {
                    swal('ATENCIÓN', 'LA SEMANA ESPECIFICADA NO EXISTE', 'warning').then((value) => {
                        input.focus();
                    });
                }
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {

            });
        }
    }
</script>
<style>
    input[type="radio"]:hover, div.custom-radio:hover, div.custom-radio label{
        cursor: pointer !important;
    }
    div.custom-radio label{
        margin: 0px !important;
    }
</style>