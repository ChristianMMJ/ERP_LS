<!-- Contenido  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <button class="btn btn-primary text-success btn-sm navbar-brand" id="sidebarCollapse">
        <i class="fa fa-file-invoice"></i> Fichas Técnicas
    </button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav w-100">

            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navCatalogos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Catálogos
                </a>
                <div class="dropdown-menu dropdown-menu" aria-labelledby="navCatalogos">
                    <a class="dropdown-item" href="<?php print base_url('Grupos/?origen=FICHASTECNICAS'); ?>"> Grupos</a>
                    <a class="dropdown-item" href="<?php print base_url('Articulos/?origen=FICHASTECNICAS'); ?>"> Artículos</a>
                    <a class="dropdown-item" href="<?php print base_url('Departamentos/?origen=FICHASTECNICAS'); ?>"> Departamentos</a>
                    <a class="dropdown-item" href="<?php print base_url('Colores/?origen=FICHASTECNICAS'); ?>"> Colores</a>
                    <a class="dropdown-item" href="<?php print base_url('Series/?origen=FICHASTECNICAS'); ?>"> Series</a>
                    <a class="dropdown-item" href="<?php print base_url('Generos/?origen=FICHASTECNICAS'); ?>"> Generos</a>
                    <a class="dropdown-item" href="<?php print base_url('Lineas/?origen=FICHASTECNICAS'); ?>"> Lineas</a>
                    <a class="dropdown-item" href="<?php print base_url('Rangos/?origen=FICHASTECNICAS'); ?>"> Rangos</a>
                    <a class="dropdown-item" href="<?php print base_url('Piezas/?origen=FICHASTECNICAS'); ?>"> Piezas</a>
                    <a class="dropdown-item" href="<?php print base_url('Hormas/?origen=FICHASTECNICAS'); ?>"> Hormas</a>
                    <a class="dropdown-item" href="<?php print base_url('MaqPlantillas/?origen=FICHASTECNICAS'); ?>"> Maq. Plantillas</a>
                    <a class="dropdown-item" href="<?php print base_url('Temporadas/?origen=FICHASTECNICAS'); ?>"> Temporadas</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navFichaTecnica" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ficha Técnica
                </a>
                <div class="dropdown-menu dropdown-menu" aria-labelledby="navFichaTecnica">
                    <a class="dropdown-item" href="<?php print base_url('Estilos/?origen=FICHASTECNICAS'); ?>"> Estilos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php print base_url('FichaTecnicaFija'); ?>"> Mat. Fijos Ficha Técnica</a>
                    <a class="dropdown-item" href="<?php print base_url('FichaTecnica/?origen=FICHASTECNICAS'); ?>"> Ficha Técnica</a>
                    <a class="dropdown-item" href="<?php print base_url('FraccionesXEstilo/?origen=FICHASTECNICAS'); ?>"> Ficha Técnica de Proceso</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navPedidosMuestras" data-toggle="dropdown" anavPedidosria-haspopup="true" aria-expanded="false">
                    Pedidos Muestras
                </a>
                <div class="dropdown-menu dropdown-menu" aria-labelledby="navPedidosMuestras">
                    <a class="dropdown-item" href="#"> Pruebas</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navCostosEst" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Costos Estilos
                </a>
                <div class="dropdown-menu dropdown-menu" aria-labelledby="navCostosEst">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#mdlFichaTecnicaCompra"><span class="fa fa-file-invoice"></span> Ficha Técnica</a>

                </div>
            </li>


            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navReportes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Reportes
                </a>
                <div class="dropdown-menu dropdown-menu" aria-labelledby="navReportes">
                    <a class="dropdown-item" href="#"> Prueba</a>
                </div>
            </li>

            <li class="nav-item mx-1">
                <a class="btn btn-info" href="<?php print base_url('MenuProduccion/?parentMenu=MenuFichasTecnicas'); ?>">
                    Menu Producción
                </a>
            </li>
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
$this->load->view('vFichaTecnicaCompra');
