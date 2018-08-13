<style>
    .dropdown-item:hover, .dropdown-item:focus {
        color: #fff;
        text-decoration: none;
        background-color: transparent;
    }
    .mr-auto, .mx-auto {
        margin-left: 15px !important;
    }

    .overlay .dropdown {
        cursor:pointer;
        font-size: 16px !important;
        color: #FAFAFA;
    }
    .overlay .dropdown-item {
        padding: 0.5rem .5rem .5rem 1.4rem !important;
        font-size: 15.5px !important;
        color: #A6A6A6;
    }
    .overlay .dropdown-menu {
        background-color: transparent !important;
        border: 0px !important;
        border-radius: 0px !important;
    }
    .overlay {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1040;
        top: 0;
        left: 0;
        background-color: rgba(13, 25, 41, 0.88);
        overflow-x: hidden;
        transition: 0.1s;
    }
    .overlay-content {
        position: relative;
        top: 5%;
        width: 100%;
        margin-top: 5px;
    }
    .overlay a:hover,
    .overlay a:focus {
        color: #F39C12 !important;
    }

    .overlay .closebtn {
        cursor:pointer;
        position: absolute;
        top: 0px;
        right: 20px;
        color: #fff !important;
        font-size: 30px !important;
    }


</style>
<div id="mdlCambiarContrasena" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Cambiar Contraseña</h4>
        </div>
        <div class="modal-body" id="pnlContra">
            <form id="frmEditarContrasena">
                <input type="text" name="ID" class="form-control " >
                <div class=" col-6 col-md-12">
                    <label for="">Usuario</label>
                    <input type="text"  name="Usuario"  class="form-control" readonly="" placeholder="" >
                </div>
                <div class=" col-6 col-md-12">
                    <label for="">Nueva Contraseña*</label>
                    <input type="password" name="Contrasena" id="Pass"  class="form-control"  placeholder="Introduce la nueva contraseña" required="">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-raised btn-primary" id="btnModificar">ACEPTAR</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" >CANCELAR</button>
        </div>
    </div>
</div>
<div id="myNav" class="overlay">
    <a class="closebtn " onclick="closeNav()">&times;</a>
    <div class="overlay-content navbar ">
        <ul class=" navbar-nav mr-auto">
            <img src="<?php print base_url(); ?>img/logo_mediano.png" width="160">
            <br>
            <br>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-circle mr-1"></i>
                    <?php echo $this->session->userdata('Nombre') . ' ' . $this->session->userdata('Apellidos'); ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick="onCambiarContrasena();">Cambiar Contraseña</a>
                    <a class="dropdown-item" href="#">Reportar un problema</a>
                    <div class="divider"></div>
                    <a class="dropdown-item" href="<?php print base_url('Sesion/onSalir'); ?>" >Salir</a>
                </div>
            </li>

            <div class="dropdown-divider"></div>
            <br>
            <li class="nav-item dropdown " id="liPanelCliente">
                <a class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-street-view mr-1"></i> Panel de Clientes
                </a>
                <ul class="dropdown-menu">
                    <li  class="" id="liPedidoCliente"><a class="dropdown-item" href="<?php print base_url('PedidoCliente.py') ?>">Pedidos Cliente</a></li>
                    <div class="dropdown-divider" ></div>
                    <li  class="" id="liVisorCliente"><a class="dropdown-item" href="<?php print base_url('CuboCliente.py') ?>">Cubo</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown " >
                <a class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-chalkboard-teacher mr-1"></i>Mesa de Trabajo
                </a>
                <ul class="dropdown-menu">
                    <li class="" id="liServicios"><a class="dropdown-item" href="<?php print base_url('Trabajos.py') ?>">Servicios</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown " id="liControl">
                <a class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-clipboard-check mr-1"></i> Control
                </a>
                <ul class="dropdown-menu">
                    <li id="liEntregas"><a class="dropdown-item" href="<?php print base_url('Entregas.py') ?>">Entregas</a></li>
                    <li id="liPrefacturas"><a class="dropdown-item" href="<?php print base_url('Prefacturas.py') ?>">Prefacturas</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown " id="liExploradores">
                <a class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-binoculars mr-1"></i>Exploradores
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php print base_url('ExploradorServicios.py') ?>">Servicios</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('CuboInformacionGeneral.py') ?>">Cubo</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown " id="liCatalogos">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-folder-open mr-1"></i>Catálogos
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class="nav-item dropdown dropdown-submenu" id="liPreciarios">
                        <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-tie mr-1"></i>Clientes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li id="liClientes"><a class="dropdown-item" href="<?php print base_url('Clientes.py') ?>">Clientes</a></li>
                            <li id="liSucursales"><a class="dropdown-item" href="<?php print base_url('Sucursal.py') ?>">Sucursales</a></li>
                            <li id="liEspecialidades"><a class="dropdown-item" href="<?php print base_url('Especialidades.py') ?>">Especialidades</a></li>
                            <li id="liCentrosCostos"><a class="dropdown-item" href="<?php print base_url('CentroCostos.py') ?>">Centros de Costo</a></li>
                            <li id="liAreas"><a class="dropdown-item" href="<?php print base_url('Areas.py') ?>">Areas</a></li>
                        </ul>
                    </li>
                    <div class="dropdown-divider" href="#"></div>
                    <li id="liEmpresas"><a class="dropdown-item" href="<?php print base_url('Empresas.py') ?>">Empresas</a></li>
                    <li id="liPreciarios"><a class="dropdown-item" href="<?php print base_url('Preciarios.py') ?>">Preciarios</a></li>
                    <li id="liPlantillas"><a class="dropdown-item" href="<?php print base_url('Plantillas.py') ?>">Plantillas</a></li>
                    <li id="liEmpresasSupervisoras"><a class="dropdown-item" href="<?php print base_url('EmpresasSupervisoras.py') ?>">Empresas Supervisoras</a></li>
                    <li id="liCuadrillas"><a class="dropdown-item" href="<?php print base_url('Cuadrillas.py') ?>">Cuadrillas</a></li>
                    <li id="liCodigosPPTA"><a class="dropdown-item" href="<?php print base_url('CodigosPPTA.py') ?>">Códigos PPTA</a></li>

                </ul>
            </li>
            <li class="nav-item dropdown " id="liUsuarios">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-users mr-1"></i>Usuarios
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php print base_url('Usuario.py') ?>">Usuarios</a></li>
                    <div class="dropdown-divider" ></div>
                    <li><a class="dropdown-item" href="<?php print base_url('RegistroUsuarios.py') ?>">Log de Usuarios</a></li>

                </ul>
            </li>


            <li class="nav-item dropdown " id="liHerramiendas">
                <a class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-wrench mr-1"></i>Herramientas
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php print base_url('HerramientasPreciario.py') ?>">Servicios</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">

    <button class="btn btn-primary btn-sm navbar-brand" onclick="openNav()">
        <i class="fa fa-home"></i> Menú
    </button>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a  class="btn btn-secondary" href="<?php print base_url('Sesion/onSalir'); ?>">
                <i class="fa fa-sign-out-alt"></i> Salir</a>
        </form>
    </div>
</nav>

<script>
    var master_url = base_url + 'Sesion/';
    function openNav() {
        $('#myNav').width(260);
    }

    function closeNav() {
        $('#myNav').width(0);
    }

    $(document).ready(function () {
        handleEnter();
        $('#myNav > li:not(ul)').click(function (event) {
            event.stopPropagation();
        });

        $('.dropdown-submenu a.multinivel').on("click", function (e) {
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
        $('#mdlCambiarContrasena').on('shown.bs.modal', function () {
            $('#Pass').focus();
        });
        $('#btnModificar').on("click", function () {
            var frm = new FormData($('#mdlCambiarContrasena').find("#frmEditarContrasena")[0]);
            isValid('pnlContra');
            if (valido) {
                HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
                $.ajax({
                    url: master_url + 'onCambiarContrasena',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: frm
                }).done(function (data, x, jq) {
                    $('#mdlCambiarContrasena').modal('');
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'CONTRASEÑA MODIFICADA EXITOSAMENTE', 'success');
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });
    });
    function onCambiarContrasena() {
        onRegistrarAccion('INTENTÓ CAMBIAR CONTRASEÑA');
        $('#mdlCambiarContrasena').modal('show');
        $("[name='Contrasena']").val("");
        $("[name='Usuario']").val("<?php echo $this->session->userdata('USERNAME'); ?>");
        $("[name='ID']").val("<?php echo $this->session->userdata('ID'); ?>");
    }

</script>


