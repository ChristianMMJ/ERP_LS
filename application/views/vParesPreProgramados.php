<div class="modal animated slideInDown" id="mdlParesPreProgramados">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rep.Pares en preprogramación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row"> 
                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4"> 
                        <label>Cliente</label>
                        <select id="PaPreProCliente" name="PaPreProCliente" class="form-control form-control-sm"></select>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4"> 
                        <label>Maquila</label>
                        <select id="PaPreProMaquila" name="PaPreProMaquila" class="form-control form-control-sm"></select>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4"> 
                        <label>Semana</label>
                        <input type="text" id="PaPreProSemana" name="PaPreProSemana" class="form-control form-control-sm">
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4"> 
                        <label>Fecha</label>
                        <input type="text" id="PaPreProFecha" name="PaPreProFecha"  class="form-control form-control-sm date notEnter" placeholder="" >
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4"> 
                        <label>Linea</label>
                        <select id="PaPreProLinea" name="PaPreProLinea" class="form-control form-control-sm"></select>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4"> 
                        <label>Estilo</label>
                        <select id="PaPreProEstilo" name="PaPreProEstilo" class="form-control form-control-sm"></select>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-12 my-2">
                        <hr>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center"> 
                        <div class="btn-group btn-group-lg" role="group" aria-label="Opciones">
                            <button id="btnClientePreProgramado" type="button" class="btn btn-success"><span class="fa fa-user-circle"></span> Cliente</button>
                            <button id="btnEstiloPreProgramado" type="button" class="btn btn-warning"><span class="fa fa-dot-circle"></span> Estilo</button>
                            <button id="btnLineasPreProgramado" type="button" class="btn btn-info"><span class="fa fa-align-left"></span> Lineas</button> 
                        </div> 
                        <div class="btn-group btn-group-lg" role="group" aria-label="Opciones">
                            <button id="btnMaquilasPreProgramado" type="button" class="btn btn-danger"><span class="fa fa-industry"></span> Maquilas</button>
                            <button id="btnSemanaMaquilaPreProgramado" type="button" class="btn btn-default"><span class="fa fa-calendar"></span> Semana/Maquila</button>
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
        mdlParesPreProgramados.on('show.bs.modal', function () {
            HoldOn.open({
                theme: 'sk-bounce',
                message: 'Espere...'
            });
            PaPreProInit();
        });
        
        mdlParesPreProgramados.on('shown.bs.modal', function () {
            HoldOn.close();
        });
        
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

        mdlParesPreProgramados.find("#btnMaquilasPreProgramado").click(function () {
            console.log('MAQUILAS');
            getParesPreProgramados(4);
        });

        mdlParesPreProgramados.find("#btnSemanaMaquilaPreProgramado").click(function () {
            console.log('SEMANA/MAQUILA');
            getParesPreProgramados(5);
        });
    });

    function getParesPreProgramados(t) {
        var Cliente = mdlParesPreProgramados.find("#PaPreProCliente").val(),
                Maquila = mdlParesPreProgramados.find("#PaPreProMaquila").val(),
                Semana = mdlParesPreProgramados.find("#PaPreProSemana").val(),
                Fecha = mdlParesPreProgramados.find("#PaPreProFecha").val(),
                Linea = mdlParesPreProgramados.find("#PaPreProLinea").val(),
                Estilo = mdlParesPreProgramados.find("#PaPreProEstilo").val();
        $.post(master_url_pares_preprogramados + 'getParesPreProgramados', {
            CLIENTE: Cliente !== '' ? Cliente : '',
            MAQUILA: Maquila !== '' ? Maquila : '',
            SEMANA: Semana !== '' ? Semana : '',
            FECHA: Fecha !== '' ? Fecha : '',
            LINEA: Linea !== '' ? Linea : '',
            ESTILO: Estilo !== '' ? Estilo : '',
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

    function PaPreProInit() {
        $.getJSON(master_url_pares_preprogramados + 'getClientes').done(function (data) {
            $.each(data, function (k, v) {
                mdlParesPreProgramados.find("#PaPreProCliente")[0].selectize.addOption({text: v.CLIENTE, value: v.CLAVE_CLIENTE});
            });
        }).fail(function (x, y, z) {
            console.log("\n *CLIENTES ERROR* \n", x.responseText);
            swal('ATENCIÓN', 'HA OCURRIDO UN ERROR INESPERADO AL OBTENER LOS CLIENTES', 'warning');
        }).always(function () {

        });

        $.getJSON(master_url_pares_preprogramados + 'getMaquilas').done(function (data) {
            $.each(data, function (k, v) {
                mdlParesPreProgramados.find("#PaPreProMaquila")[0].selectize.addOption({text: v.MAQUILA, value: v.CLAVE_MAQUILA});
            });
        }).fail(function (x, y, z) {
            console.log("\n *MAQUILAS ERROR* \n", x.responseText);
            swal('ATENCIÓN', 'HA OCURRIDO UN ERROR INESPERADO AL OBTENER LAS MAQUILAS', 'warning');
        }).always(function () {

        });

        $.getJSON(master_url_pares_preprogramados + 'getLineas').done(function (data) {
//            console.log("*LINEAS*\n",data);
            $.each(data, function (k, v) {
                mdlParesPreProgramados.find("#PaPreProLinea")[0].selectize.addOption({text: v.LINEA, value: v.CLAVE_LINEA});
            });
        }).fail(function (x, y, z) {
            console.log("\n *LINEAS ERROR* \n", x.responseText);
            swal('ATENCIÓN', 'HA OCURRIDO UN ERROR INESPERADO AL OBTENER LOS CLIENTES', 'warning');
        }).always(function () {

        });

        $.getJSON(master_url_pares_preprogramados + 'getEstilos').done(function (data) {
            $.each(data, function (k, v) {
                mdlParesPreProgramados.find("#PaPreProEstilo")[0].selectize.addOption({text: v.CLAVE_ESTILO + ' - ' + v.ESTILO, value: v.CLAVE_ESTILO});
            });
        }).fail(function (x, y, z) {
            console.log("\n *ESTILOS ERROR* \n", x.responseText);
            swal('ATENCIÓN', 'HA OCURRIDO UN ERROR INESPERADO AL OBTENER LOS CLIENTES', 'warning');
        }).always(function () {

        });
    }

</script>