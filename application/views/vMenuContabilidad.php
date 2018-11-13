<!-- Contenido  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <button class="btn btn-primary text-success btn-sm navbar-brand" id="sidebarCollapse">
        <i class="fa fa-calculator"></i> CONTABILIDAD
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
                    <a class="dropdown-item" href="<?php print base_url('ConceptosTesoreria'); ?>"> Conceptos de Tesorería</a>
                    <a class="dropdown-item" href="<?php print base_url('Bancos/?origen=CONTABILIDAD'); ?>"> Bancos</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#mdlTipoCambio"> Tipo Cambio Moneda</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navCapturas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-pencil-alt"></span> Capturas
                </a>
                <div class="dropdown-menu dropdown-menu" aria-labelledby="navCapturas">
                    <a class="dropdown-item" href="#"> --</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navConsultas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-search"></span> Consultas
                </a>
                <div class="dropdown-menu dropdown-menu" aria-labelledby="navConsultas">
                    <a class="dropdown-item" href="#"> --</a>
                </div>
            </li>

            <li class="nav-item mx-1">
                <a class="btn btn-info" href="<?php print base_url('MenuMateriales/?parentMenu=MenuContabilidad'); ?>">
                    <span class="fas fa-cube"></span> Menú Materiales
                </a>
            </li>
            <li class="nav-item mx-1">
                <a class="btn btn-info" href="<?php print base_url('MenuClientes/?parentMenu=MenuContabilidad'); ?>">
                    <span class="fa fa-users"></span> Menú Clientes
                </a>
            </li>
            <li class="nav-item mx-1">
                <a class="btn btn-info" href="<?php print base_url('MenuProveedores/?parentMenu=MenuContabilidad'); ?>">
                    <span class="fa fa-user-secret"></span> Menú Proveedores
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
<?php
$this->load->view('vTipoCambio');
