<!-- Contenido  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <button class="btn btn-primary text-success btn-sm navbar-brand" id="sidebarCollapse">
        <i class="fa fa-user-secret"></i> Proveedores
    </button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav w-100"></ul>
    </div>
</nav>
<script>
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    var menu;
    $(document).ready(function () {
        menu = getParameterByName('parentMenu');
        if (menu !== '' && menu === 'MenuNomina' || menu !== '' && menu === 'MenuContabilidad') {
            $('#btnRegresar').removeClass('d-none');
        } else {
            $('#btnRegresar').addClass('d-none');
        } 
        getMenu(1);
    });
    
</script>
<?php
$this->load->view('vEstadoCuentaProveedor');
$this->load->view('vAntiguedadSaldosProveedor');
$this->load->view('vReciboPagoProveedores');
$this->load->view('vCostoMaterialesMaqSemFecha');
