<div class="col-12 row m-2" align="center">
    <div class="card col-12 col-sm-12 col-md-6 col-lg-3 col-xl-2  animated fadeInUp"  onclick="window.location.href = '<?php print base_url('MenuProveedores') ?>';"> 
        <img class="card-img-top  p-2" src="<?php print base_url('img/proveedor.png'); ?>" >
        <div class="card-body">
            <h4 class="card-text">PROVEEDORES</h4>
        </div>
    </div>
    <div class="card col-12 col-sm-12 col-md-6 col-lg-3 col-xl-2  animated fadeInDown" onclick="window.location.href = '<?php print base_url('MenuMateriales') ?>';"> 
        <img class="card-img-top p-2" src="<?php print base_url('img/materiales.png'); ?>" >
        <div class="card-body">
            <h4 class="card-text">MATERIALES</h4>
        </div> 
    </div>
    <div class="card col-12 col-sm-12 col-md-6 col-lg-3 col-xl-2  animated fadeInUp" onclick="window.location.href = '<?php print base_url('MenuClientes') ?>';"> 
        <img class="card-img-top p-2" src="<?php print base_url('img/clientes.png'); ?>" >
        <div class="card-body">
            <h4 class="card-text">CLIENTES</h4>
        </div>
    </div>
    <div class="card col-12 col-sm-12 col-md-6 col-lg-3 col-xl-2  animated fadeInDown" onclick="window.location.href = '<?php print base_url('MenuFichasTecnicas') ?>';"> 
        <img class="card-img-top p-2" src="<?php print base_url('img/fichas.png'); ?>" >
        <div class="card-body">
            <h4 class="card-text">FICHAS TÉCNICAS</h4>
        </div> 
    </div>
    <div class="card col-12 col-sm-12 col-md-6 col-lg-3 col-xl-2  animated fadeInUp" onclick="window.location.href = '<?php print base_url('MenuProduccion') ?>';"> 
        <img class="card-img-top p-2" src="<?php print base_url('img/produccion.png'); ?>" >
        <div class="card-body">
            <h4 class="card-text">PRODUCCIÓN</h4>
        </div> 
    </div>
    <div class="card col-12 col-sm-12 col-md-6 col-lg-3 col-xl-2  animated fadeInDown" onclick="window.location.href = '<?php print base_url() ?>';"> 
        <img class="card-img-top p-2" src="<?php print base_url('img/conta.png'); ?>" >
        <div class="card-body">
            <h4 class="card-text">CONTABILIDAD</h4>
        </div> 
    </div>
    <div class="card col-12 col-sm-12 col-md-6 col-lg-3 col-xl-2  animated fadeInDown" onclick="window.location.href = '<?php print base_url() ?>';"> 
        <img class="card-img-top p-2" src="<?php print base_url('img/nominas.png'); ?>" >
        <div class="card-body">
            <h4 class="card-text">NOMINAS</h4>
        </div> 
    </div>
    <div class="card col-12 col-sm-12 col-md-6 col-lg-3 col-xl-2  animated fadeInDown" onclick="window.location.href = '<?php print base_url('MenuParametros') ?>';"> 
        <img class="card-img-top p-2" src="<?php print base_url('img/parametros.png'); ?>" >
        <div class="card-body">
            <h4 class="card-text">PARÁMETROS</h4>
        </div> 
    </div>
</div>   
<style>
    .card:hover img{
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out;
        z-index: 99  !important;
    }
    .card{
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }
    .card:hover{
        cursor: pointer !important;
        font-weight: bold;
        background-color: #3498DB !important;
        color: #fff;
        -webkit-transform: scale(1.75);
        transform: scale(1.75);
    }
    .card:hover img{
        width: 100%; 
    }
</style>