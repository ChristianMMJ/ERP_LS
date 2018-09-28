<!-- Contenido  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <button class="btn btn-primary text-success btn-sm navbar-brand" id="sidebarCollapse">
        <i class="fa fa-users"></i> Clientes
    </button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav w-100">

            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navCatalogos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-wrench"></span> Catálogos
                </a>
                <div class="dropdown-menu dropdown-menu" aria-labelledby="navCatalogos">
                    <a class="dropdown-item" href="<?php print base_url('Agentes.shoes'); ?>"> Agentes</a>
                    <a class="dropdown-item" href="<?php print base_url('Paises.shoes'); ?>"> Paises</a>
                    <a class="dropdown-item" href="<?php print base_url('Estados.shoes'); ?>"> Estados</a>
                    <a class="dropdown-item" href="<?php print base_url('GruposClientes.shoes'); ?>"> Grupos de Clientes</a>
                    <a class="dropdown-item" href="<?php print base_url('Zonas.shoes'); ?>"> Zonas</a>
                    <a class="dropdown-item" href="<?php print base_url('Transportes.shoes'); ?>"> Transportes</a>
                    <a class="dropdown-item" href="<?php print base_url('Clientes.shoes'); ?>"> Clientes</a>
                    <a class="dropdown-item" href="<?php print base_url('Consignatarios.shoes'); ?>"> Consignatarios</a>
                    <a class="dropdown-item" href="<?php print base_url('MetodosDePago.shoes'); ?>"> Métodos de Pago</a>
                    <a class="dropdown-item" href="<?php print base_url('FormasPago.shoes'); ?>"> Formas de Pagos</a>
                    <a class="dropdown-item" href="<?php print base_url('SemanasProduccion/?origen=CLIENTES'); ?>"> Semanas Prod.</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#mdlTipoCambio"> Tipo Cambio Moneda</a>
                </div>
            </li>


            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navCaptura" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-pencil-alt"></span>  Capturas
                </a>
                <ul class="dropdown-menu" aria-labelledby="navCaptura">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Pedidos</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php print base_url('Pedidos/?origen=CLIENTES'); ?>">Autorizados</a>
                            <a class="dropdown-item" href="#">Pendientes por Anticipo</a>
                            <a class="dropdown-item" href="#">Elimina pedido c/ Control</a>
                            <a class="dropdown-item" href="#">Elimina pedido s/ Control</a>
                        </div>
                    </li>
                    <a class="dropdown-item" href="#">Documentos Directos</a>
                </ul>
            </li>


            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navConsultas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-search"></span> Consultas
                </a>
                <div class="dropdown-menu dropdown-menu" aria-labelledby="navConsultas">
                    <a class="dropdown-item" href="#"> Prueba.</a>
                </div>
            </li>


            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navReportes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-file-pdf"></span> Reportes
                </a>
                <div class="dropdown-menu dropdown-menu" aria-labelledby="navReportes">
                    <a class="dropdown-item" href="#"> Prueba</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navUtilerias" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-atlas"></span>   Utilerías
                </a>
                <div class="dropdown-menu dropdown-menu" aria-labelledby="navUtilerias">
                    <a class="dropdown-item" href="#"> Estadísticas</a>
                </div>
            </li>

            <li class="nav-item mx-1 d-none" id="btnRegresar">
                <a class="btn btn-danger " href="<?php print base_url(isset($_GET['parentMenu']) ? $_GET['parentMenu'] : ""); ?>">
                    <i class="fa fa-arrow-left"></i> Regresar
                </a>
            </li>

            <li class="nav-item dropdown ml-auto">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $this->session->userdata('Nombre') . ' ' . $this->session->userdata('Apellidos'); ?>
                    <i class="fa fa-user-circle fa-lg"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#"><i class="fa fa-question-circle"></i> Reportar un problema</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-key"></i> Cambiar Contraseña</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php print base_url('Sesion/onSalir'); ?>"><i class="fa fa-sign-out-alt"></i> Salir</a>
                </div>
            </li>
        </ul>
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
        if (menu !== '' && menu === 'MenuNomina' || menu === 'MenuContabilidad') {
            $('#btnRegresar').removeClass('d-none');
        } else {
            $('#btnRegresar').addClass('d-none');
        }


    });
</script>

<?php
$this->load->view('vTipoCambio');
