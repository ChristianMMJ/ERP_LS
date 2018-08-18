<style>


    /* ---------------------------------------------------
        SIDEBAR STYLE
    ----------------------------------------------------- */
    a,
    a:hover,
    a:focus {
        color: inherit;
        text-decoration: none;
        transition: all 0.3s;
    }

    #sidebar {
        width: 250px;
        position: fixed;
        top: 0;
        left: -250px;
        height: 100vh;
        z-index: 1031;
        color: #fff;
        transition: all 0.3s;
        overflow-y: scroll;
        box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);

    }

    #sidebar.active {
        left: 0;
    }

    #dismiss {
        width: 35px;
        height: 35px;
        line-height: 35px;
        text-align: center;
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        color: #000;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }

    #dismiss:hover {
        color: #95a5a6;
    }

    .overlay {
        top:0;
        display: none;
        position: fixed;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.7);
        z-index: 1030;
        opacity: 0;
        transition: all 0.5s ease-in-out;
    }
    .overlay.active {
        display: block;
        opacity: 1;
    }

    #sidebar .sidebar-header {
        padding: 20px;
        color: #000;
        background: #FFF;
    }

    #sidebar ul.collapse.show {
        background: #11181f;
    }


    #sidebar ul.components {
        padding: 10px 0;
        border-bottom: 1px solid #FFF;
    }

    #sidebar ul p {
        color: #fff;
        padding: 10px;
    }

    #sidebar ul li a {
        padding: 10px;
        font-size: 1.1em;
        display: block;
    }



    #sidebar ul li a:hover {
        color: #2C3E50;
        background: #fff;
    }

    #sidebar ul li.active>a,
    #sidebar a[aria-expanded="true"] {
        color: #fff;
        background: #11181f;
    }

    #sidebar a[data-toggle="collapse"] {
        position: relative;
    }



    #sidebar .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
    }

    #sidebar ul ul a {
        font-size: 0.9em !important;
        padding-left: 30px !important;

    }

    #sidebar ul ul ul a {
        font-size: 0.9em !important;
        padding-left: 60px !important;
    }
    .navbar{
        box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
        -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
    }
</style>

<!-- Sidebar  -->
<nav id="sidebar" class="bg-primary">
    <div id="dismiss">
        <i class="fas fa-arrow-left fa-lg"></i>
    </div>
    <div class="sidebar-header">
        <img src="<?php print base_url(); ?>img/logo_mediano.png" width="160">
    </div>
    <ul class="list-unstyled pl-3 pr-3 pt-3">
        <li>
            <input type="text" class="form-control form-control-sm" autofocus="" placeholder="BUSCAR" id="txtBusqueda">
        </li>
    </ul>
    <ul class="list-unstyled components">
        <li class="drop">
            <a href="#fichastec" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-file-invoice"></i> Fichas Técnicas</a>
            <ul class="collapse list-unstyled" id="fichastec">
                <li class="item"><a href="Estilos"><i class="fa fa-capsules"></i> Estilos</a></li>
                <li class="item"><a href="Colores"><i class="fa fa-palette"></i> Colores</a></li>
            </ul>
        </li>
        <li class="drop">
            <a href="#catalogos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-folder-open"></i> Catálogos</a>
            <ul class="collapse list-unstyled" id="catalogos">
                <li class="item"><a href="Proveedores"><i class="fa fa-user-secret"></i> Proveedores</a></li>
                <li class="item"><a href="Maquilas"><i class="fa fa-industry"></i> Maquilas</a></li>
                <li class="item"><a href="Articulos"><i class="fa fa-cube"></i> Articulos</a></li>
                <li class="dropdown-divider"></li>
                <li class="item"><a href="Lineas"><i class="fa fa-coins"></i> Lineas</a></li>
                <li class="item"><a href="Hormas"><i class="fa fa-shoe-prints"></i> Hormas</a></li>
                <li class="item"><a href="Temporadas"><i class="fa fa-cloud"></i> Temporadas</a></li>
                <li class="item"><a href="Generos"><i class="fa fa-transgender"></i> Generos</a></li>
                <li class="dropdown-divider"></li>
                <li class="item"><a href="Series"><i class="fa fa-user-secret"></i> Series</a></li>
                <li class="item"><a href="Grupos"><i class="fa fa-object-group"></i> Grupos</a></li>
                <li class="item"><a href="Unidades"><i class="fa fa-ruler-combined"></i> Unidades</a></li>
                <li class="item"><a href="MaqPlantillas"><i class="fa fa-gavel"></i> Maquilas Plantillas</a></li>

            </ul>
        </li>
        <li class="drop">
            <a href="#config" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-cogs"></i> Configuración</a>
            <ul class="collapse list-unstyled" id="config">

                <li class="item">
                    <a href="#usuarios" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-users"></i> Usuarios</a>
                    <ul class="collapse list-unstyled" id="usuarios">
                        <li class="item"><a href="Usuarios"><i class="fa fa-users-cog"></i> Usuarios</a></li>
                        <li class="item"><a href="Permisos"><i class="fa fa-list-ul"></i> Permisos</a></li>
                        <li class="dropdown-divider"></li>
                        <li class="item"><a href="Token"><i class="fa fa-key"></i> Token</a></li>
                    </ul>
                </li>

                <li class="item">
                    <a href="#general" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-cog"></i> General</a>
                    <ul class="collapse list-unstyled" id="general">
                        <li class="item"><a href="Semanas"><i class="fa fa-calendar-alt"></i> Semanas</a></li>
                        <li class="item"><a href="Departamentos"><i class="fab fa-buromobelexperte"></i> Departamentos</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="list-unstyled pl-3 pr-3">
        <li>
            <span class="badge badge-warning btn-block px-3 py-2">V 1.0.0</span>
        </li>
    </ul>
</nav>
<!-- Contenido  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <button class="btn btn-primary btn-sm navbar-brand" id="sidebarCollapse">
        <i class="fa fa-home"></i> Menú
    </button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav w-100">

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
<div class="overlay"></div>
<script>
    var sidebar = $("#sidebar");
    var components = sidebar.find("ul.list-unstyled.components");
    var options = components.find("li.item");

    $(document).ready(function () {


        /*KEYUP, KEYDOWN, KEYPRESS; SON REQUERIDOS PARA LOS NON-PRINTABLE CHARACTERS*/
        sidebar.find("#txtBusqueda").on('keyup', function (e) {
            onBuscarSideBar(this);
        }).on('keydown', function (e) {
            onBuscarSideBar(this);
        }).on('keypress', function (e) {
            onBuscarSideBar(this);
        });

        sidebar.mCustomScrollbar({
            theme: "minimal"
        });

        $('#dismiss, .overlay').on('click', function () {
            $('#sidebar').removeClass('active');
            $('.overlay').removeClass('active');
            onResetSearch();
            sidebar.find("#txtBusqueda").val('');
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            $('#txtBusqueda').focus();
        });
    });

    function onBuscarSideBar(e) {
        var busqueda = $(e).val();
        onResetSearch();
        if (busqueda.length > 0) {
            /*AGREGANDO CLASES PARA EXPANDIR COMPONENTES*/
            components.find("a.dropdown-toggle.collapsed").removeClass("collapsed");
            components.find("a.dropdown-toggle").attr('aria-expanded', true);
            components.find("a.dropdown-toggle").next().addClass('show');
            /*LEER CADA UNA DE LAS OPCIONES DISPONIBLES*/
            $.each(options, function (k, v) {
                var ul = $(v).parents('li.drop');
                /*ENCUENTRA LA COINCIDENCIA*/
                if ($(v).text().toUpperCase().includes(busqueda.toUpperCase())) {
                    $(v).removeClass("d-none");
                } else {
                    $(v).addClass("d-none");
                    /*VERIFICAR SI LA LISTA TIENE COMPONENTES PARA MOSTRAR DE LO CONTRARIO OCULTARLA*/
                    if (ul.find("li.item").length === ul.find("li.item.d-none").length) {
                        ul.addClass('d-none');
                    }
                }
            });
        } else {
            onResetSearch();
        }
    }
    function onResetSearch() {
        components.find("a.dropdown-toggle").addClass("collapsed");
        components.find("a.dropdown-toggle").attr('aria-expanded', false);
        components.find("a.dropdown-toggle").next().removeClass('show');
        $.each(options, function (k, v) {
            $(v).parents('li.drop').removeClass("d-none");
            $(v).removeClass("d-none");
        });
    }
</script>