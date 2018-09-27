<!-- Contenido  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <button class="btn btn-primary text-success btn-sm navbar-brand" id="sidebarCollapse">
        <i class="fa fa-industry"></i> Producción
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
                    <a class="dropdown-item"  href="<?php print base_url('Agentes'); ?>"> Agentes</a>
                    <a class="dropdown-item" href="<?php print base_url('Maquilas/?origen=PRODUCCION'); ?>"> Maquiladoras</a>
                    <a class="dropdown-item" href="<?php print base_url('Fracciones/?origen=PRODUCCION'); ?>"> Fracciones</a>
                    <a class="dropdown-item" href="<?php print base_url('FraccionesXEstilo/?origen=PRODUCCION'); ?>"> Fracciones Por Estilo</a>
                    <a class="dropdown-item" href="<?php print base_url('SemanasProduccion/?origen=PRODUCCION'); ?>"> Semanas Prod.</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navCapturas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-pencil-alt"></span> Capturas
                </a>
                <ul class="dropdown-menu" aria-labelledby="navCaptura">
                    <a class="dropdown-item" href="<?php print base_url('Pedidos.shoes'); ?>"><span class="fa fa-check"></span> Pedidos</a>
                    <a class="dropdown-item" href="<?php print base_url('CerrarProg'); ?>"><span class="fa fa-hand-pointer"></span> Marcar pedidos para control</a>
                    <a class="dropdown-item" href="<?php print base_url('ReasignarControles'); ?>"><span class="fa fa-retweet"></span> Reasignar controles</a>
                    <a class="dropdown-item" href="<?php print base_url('ControlesCancelados'); ?>"><span class="fa fa-ban"></span> Control pedidos cancelados</a>
                    <div class="dropdown-divider"></div>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Cerrar Semanas Producción.</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php print base_url('CerrarSemanasProd.shoes'); ?>">Cerrar Semanas</a>
                            <a class="dropdown-item" href="<?php print base_url('CerrarSemanasProdXGrupos.shoes'); ?>">Cerrar Semanas por Grupos/Artículos</a>
                        </div>

                    </li>
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


                <ul class="dropdown-menu" aria-labelledby="navReportes">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Explosiones</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#mdlExplosionSemanal"> Explosión Semanal</a>
                        </div>
                    </li>
                    <a class="dropdown-item" href="<?php print base_url('OrdenDeProduccion.shoes'); ?>"><span class="fa fa-exclamation-circle fade-infinite"></span> Genera ordenes de producción semana maquila </a>
                    <a class="dropdown-item" href="<?php print base_url('EliminaOrdenDeProduccion.shoes'); ?>"><span class="fa fa-exclamation-circle fade-infinite"></span> Elimina orden de producción </a>
                    <a class="dropdown-item" href="<?php print base_url('IOrdenDeProduccion.shoes'); ?>"><span class="fa fa-exclamation-circle fade-infinite"></span> Imprime orden de producción </a>

                </ul>
            </li>



            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navUtilerias" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-atlas"></span> Utilerías
                </a>
                <div class="dropdown-menu dropdown-menu" aria-labelledby="navUtilerias">
                    <a class="dropdown-item" href="#"> Estadisticas</a>
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
        if (menu !== '' && menu === 'MenuNomina' || menu === 'MenuFichasTecnicas') {
            $('#btnRegresar').removeClass('d-none');
        } else {
            $('#btnRegresar').addClass('d-none');
        }
    });
    handleEnter();
</script>

<?php
$this->load->view('vExplosionSemanal');
