<div class="modal animated slideInDown" id="mdlParesPreProgramados">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rep.Pares en preprogramación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row"> 
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center"> 
                        <div class="btn-group btn-group-lg" role="group" aria-label="Opciones">
                            <button id="btnClientePreProgramado" type="button" class="btn btn-success"><span class="fa fa-user-circle"></span> Cliente</button>
                            <button id="btnEstiloPreProgramado" type="button" class="btn btn-warning"><span class="fa fa-dot-circle"></span> Estilo</button>
                            <button id="btnLineasPreProgramado" type="button" class="btn btn-info"><span class="fa fa-dot-circle"></span> Lineas</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" align="right">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="fa fa-times"></span> Cerrar</button>
                </div> 
            </div>
        </div>
    </div>
</div>
<script>
    var mdlParesPreProgramados = $("#mdlParesPreProgramados");
    var master_url_pares_preprogramados = base_url + 'index.php/ParesPreProgramados/';
    
    $(document).ready(function () {
        mdlParesPreProgramados.find("#btnClientePreProgramado").click(function () {
            console.log('CLIENTE');
            getParesPreProgramados(1);
        });
        mdlParesPreProgramados.find("#btnEstiloPreProgramado").click(function () {
            console.log('ESTILO');
            getParesPreProgramados(2);
        });
        mdlParesPreProgramados.find("#btnLineasPreProgramado").click(function () {
            console.log('LINEAS');
            getParesPreProgramados(3);
        });
    });

    function getParesPreProgramados(t) {
        $.post(master_url_pares_preprogramados + 'getParesPreProgramados', {
            TIPO: t
        }).done(function (data, x, jq) {
            onBeep(1);
            onImprimirReporteFancy(base_url + 'js/pdf.js-gh-pages/web/viewer.html?file=' + data);
        }).fail(function (x, y, z) {
            console.log(x.responseText);
            swal('ATENCIÓN', 'HA OCURRIDO UN ERROR INESPERADO AL OBTENER EL REPORTE,CONSULTE LA CONSOLA PARA MÁS DETALLES.', 'warning');
        }).always(function () {

        });
    }
</script>