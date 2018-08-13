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
        background: #F39C12;
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

</style>

<!-- Sidebar  -->
<nav id="sidebar" class="bg-primary">
    <div id="dismiss">
        <i class="fas fa-arrow-left fa-lg"></i>
    </div>

    <div class="sidebar-header">
        <img src="<?php print base_url(); ?>img/logo_mediano.png" width="160">
    </div>
    <ul class="list-unstyled pl-3 pr-3 pt-4">
        <li>
            <input type="text" class="form-control form-control-sm" autofocus="" placeholder="BUSCAR" id="txtBusqueda">
        </li>
    </ul>
    <ul class="list-unstyled components">

        <li class="">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-folder-open"></i> Catálogos</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#usuarios" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-users"></i> Usuarios</a>
            <ul class="collapse list-unstyled" id="usuarios">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
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
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">

    <button class="btn btn-primary btn-sm navbar-brand" id="sidebarCollapse">
        <i class="fa fa-home"></i> Menú
    </button>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle pr-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $this->session->userdata('Nombre') . ' ' . $this->session->userdata('Apellidos'); ?>
                    <i class="fa fa-user-circle fa-lg"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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


<script type="text/javascript">
    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#dismiss, .overlay').on('click', function () {
            $('#sidebar').removeClass('active');
            $('.overlay').removeClass('active');
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            $('#txtBusqueda').focus();
        });
    });
</script>