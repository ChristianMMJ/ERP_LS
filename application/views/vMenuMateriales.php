<!-- Contenido  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <button class="btn btn-primary text-success btn-sm navbar-brand" id="sidebarCollapse">
        <i class="fa fa-cube"></i> Materiales
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
                    <a class="dropdown-item" href="<?php print base_url('Grupos/?origen=MATERIALES'); ?>"> Grupos</a>
                    <a class="dropdown-item" href="<?php print base_url('Unidades'); ?>"> Unidades de Medida</a>
                    <a class="dropdown-item" href="<?php print base_url('Articulos/?origen=MATERIALES'); ?>"> Artículos</a>
                    <a class="dropdown-item" href="<?php print base_url('Proveedores/?origen=MATERIALES'); ?>"> Proveedores</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#mdlTipoCambio"> Tipo Cambio Moneda</a>
                    <a class="dropdown-item" href="<?php print base_url('FichaTecnica/?origen=MATERIALES'); ?>"> Fichas Tecnicas</a>
                    <a class="dropdown-item" href="<?php print base_url('FraccionesXEstilo/?origen=MATERIALES'); ?>"> Fichas Tecnicas Proceso</a>
                    <a class="dropdown-item" href="<?php print base_url('SuelaPlantaCompras.shoes'); ?>">Suelas, Plantas para Compras</a>
                    <a class="dropdown-item" href="<?php print base_url('ExistenciasSuelasPlantas.shoes'); ?>">Existencias Suelas, Plantas</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navCaptura" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-pencil-alt"></span> Capturas
                </a>
                <ul class="dropdown-menu" aria-labelledby="navCaptura">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Orden de Compra</a>
                        <ul class="dropdown-menu">
                            <a class="dropdown-item" href="<?php print base_url('OrdenCompra.shoes'); ?>">Orden Compra de Piel, Forro, Peletería</a>
                            <a class="dropdown-item" href="<?php print base_url('OrdenCompraTallas.shoes'); ?>">Orden de Compra Planta, Suela, Entresuela</a>
                            <a class="dropdown-item" href="<?php print base_url('RecibeOrdenCompra.shoes'); ?>">Recibe Órdenes de Compras</a>
                            <div class="dropdown-divider"></div>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Herr. Ordenes de Compra</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php print base_url('ConfirmarOrdenCompra.shoes'); ?>" >Confirmación de Ordenes de Compra</a>
                                    <a class="dropdown-item" href="<?php print base_url('MaterialRecibido.shoes'); ?>" >Consulta de Órdenes de Compra</a>
                                    <a class="dropdown-item" href="<?php print base_url('ActualizaPrecioOrdenCompra.shoes'); ?>" >Actualizar Precios a Orden de Compra</a>
                                    <a class="dropdown-item" href="#">Copiar O.C. a O.C ***</a>
                                    <a class="dropdown-item" href="#">Marca Material No Recibido ***</a>
                                    <a class="dropdown-item" href="#">Modifica Orden Compra No Recibida ***</a>
                                    <a class="dropdown-item" href="#">Ordenes de Compra Por Semana***</a>
                                    <a class="dropdown-item" href="#">Ordenes de Compra por Tipo/Grupo***</a>
                                    <a class="dropdown-item" href="#">Consulta Material y Orden de Compra***</a>
                                    <a class="dropdown-item" href="<?php print base_url('MarcaCompraInservible.shoes'); ?>">Marca Orden de Compra Inservible</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Documentos Directos</a>
                        <ul class="dropdown-menu">
                            <a class="dropdown-item" href="<?php print base_url('DocDirecSinAfectacion.shoes'); ?>">Sin Afectación a Maquilas</a>
                            <a class="dropdown-item" href="<?php print base_url('DocDirecConAfectacion.shoes'); ?>">Con Afectación a Maquilas</a>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Movimientos al almacén Mat. Prima</a>
                        <ul class="dropdown-menu">
                            <a class="dropdown-item" href="<?php print base_url('EntradasAlmacenMP.shoes'); ?>">Entradas</a>
                            <a class="dropdown-item" href="<?php print base_url('SalidasAlmacenMP.shoes'); ?>">Salidas</a>
                        </ul>
                    </li>
                    <a class="dropdown-item" href="<?php print base_url('InicialMaterialPrima.shoes'); ?>">Inicial Materia Prima</a>
                    <a class="dropdown-item" href="<?php print base_url('EntregaSuelaPlantaFabrica.shoes'); ?>">Entrega Suela/Planta a Fábrica</a>
                    <a class="dropdown-item" href="#">Cancela Entradas/Salidas ***</a>
                    <a class="dropdown-item" href="#">Elimina Entrada por Compra ***</a>

                    <a class="dropdown-item" href="#">Notas de Cargo ***</a>

                    <a class="dropdown-item" href="#">Cargos diferentes a Maquilas ***</a>
                    <a class="dropdown-item" href="#">Cargos a Empleados ***</a>
                    <a class="dropdown-item" href="#">Material Control Fecha ***</a>
                    <a class="dropdown-item" href="#">Asigna Día/Semana a Controles ***</a>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Inspeccion Mat. Piel/Forro</a>
                        <ul class="dropdown-menu">
                            <a class="dropdown-item" href="#">Captura Inspección ***</a>
                            <a class="dropdown-item" href="#">Reporte de Inspección ***</a>
                            <a class="dropdown-item" href="#">Captura revisión 10% ***</a>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" id="navReportes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-file-pdf"></span>  Reportes
                </a>
                <ul class="dropdown-menu" aria-labelledby="navCaptura">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Explosiones</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#mdlExplosionSemanal" data-backdrop='true'> Explosión Semanal</a>
                        </div>
                    </li>
                </ul>
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
$this->load->view('vExplosionSemanal');
