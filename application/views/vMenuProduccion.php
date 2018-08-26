<!-- Contenido  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <button class="btn btn-primary text-success btn-sm navbar-brand" id="sidebarCollapse">
        <i class="fa fa-home"></i> Producción
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
                    <a class="dropdown-item" href="#"> Agentes</a>
                    <a class="dropdown-item" href="<?php print base_url('Maquilas/?origen=PRODUCCION'); ?>"> Maquiladoras</a>
                    <a class="dropdown-item" href="<?php print base_url('Fracciones/?origen=PRODUCCION'); ?>"> Fracciones</a>
                    <a class="dropdown-item" href="<?php print base_url('SemanasProduccion/?origen=PRODUCCION'); ?>"> Semanas Prod.</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navCapturas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Capturas
                </a>
                <div class="dropdown-menu dropdown-menu" aria-labelledby="navCapturas">
                    <a class="dropdown-item" href="#"> Prueba.</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navConsultas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Consultas
                </a>
                <div class="dropdown-menu dropdown-menu" aria-labelledby="navConsultas">
                    <a class="dropdown-item" href="#"> Prueba.</a>
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

            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navEstadisticas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Estadísticas
                </a>
                <div class="dropdown-menu dropdown-menu" aria-labelledby="navEstadisticas">
                    <a class="dropdown-item" href="#"> Prueba</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navUtilerias" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Utilerías
                </a>
                <div class="dropdown-menu dropdown-menu" aria-labelledby="navUtilerias">
                    <a class="dropdown-item" href="#"> Prueba</a>
                </div>
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
