<div class="row">
    <div class="col-1"></div>
    <div id="MnuBlock" class="col-10 row mt-2" align="center">
        <div class="card col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 m-2 animated fadeInUp"  onclick="window.location.href = '<?php print base_url('MenuProveedores') ?>';">
            <figure class="figure">
                <span class="fa fa-user-secret fa-2x mt-5"></span>
                <figcaption class="figure-caption text-nowrap mt-4"><h4>PROVEEDORES</h4></figcaption>
            </figure>
        </div>
        <div class="card col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 m-2  animated fadeInDown" onclick="window.location.href = '<?php print base_url('MenuMateriales') ?>';">
            <figure class="figure">
                <span class="fa fa-cube fa-2x  mt-5"></span>
                <figcaption class="figure-caption text-nowrap mt-4"><h4>MATERIALES</h4></figcaption>
            </figure>
        </div>
        <div class="card col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 m-2  animated fadeInUp" onclick="window.location.href = '<?php print base_url('MenuClientes') ?>';">
            <figure class="figure">
                <span class="fa fa-users fa-2x mt-5"></span>
                <figcaption class="figure-caption text-nowrap mt-4"><h4>CLIENTES</h4></figcaption>
            </figure>
        </div>
        <div class="card col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 m-1  animated fadeInDown" onclick="window.location.href = '<?php print base_url('MenuFichasTecnicas') ?>';">
            <figure class="figure">
                <span class="fa fa-file-invoice fa-2x mt-5"></span>
                <figcaption class="figure-caption mt-4"><h4>FICHAS TÉCNICAS</h4></figcaption>
            </figure>
        </div>
        <div class="card col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 m-2  animated fadeInUp" onclick="window.location.href = '<?php print base_url('MenuProduccion') ?>';">
            <figure class="figure">
                <span class="fa fa-industry fa-2x mt-5"></span>
                <figcaption class="figure-caption text-nowrap mt-4"><h4>PRODUCCIÓN</h4></figcaption>
            </figure>
        </div>
        <div class="card col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 m-2  animated fadeInDown" onclick="window.location.href = '<?php print base_url() ?>';">
            <figure class="figure">
                <span class="fa fa-calculator fa-2x mt-5"></span>
                <figcaption class="figure-caption text-nowrap mt-4"><h4>CONTABILIDAD</h4></figcaption>
            </figure>
        </div>
        <div class="card col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 m-2  animated fadeInUp" onclick="window.location.href = '<?php print base_url() ?>';">
            <figure class="figure">
                <span class="fa fa-hand-holding-usd fa-2x mt-5"></span>
                <figcaption class="figure-caption text-nowrap mt-4"><h4>NOMINAS</h4></figcaption>
            </figure>
        </div>
        <div class="card col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 m-2  animated fadeInDown" onclick="window.location.href = '<?php print base_url('MenuParametros') ?>';">
            <figure class="figure">
                <span class="fa fa-cogs fa-2x mt-5"></span>
                <figcaption class="figure-caption text-nowrap mt-4"><h4>PARÁMETROS</h4></figcaption>
            </figure>
        </div>
    </div>
    <div class="col-1"></div>
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
        background-color: #3F51B5 !important;
        color: #fff;
    }
    .card:hover .text-nowrap, .card:hover .figure-caption{
        color: #fff;
    }
    .fa-2x {
        font-size: 7.5em;
    }
    .mt-2, .my-2 {
        margin-top: 0.5rem !important;
        margin-right: 0px;
        margin-left: 0px;
    }

    @media (min-width: 100px) and (max-width: 1199.98px)  {
        #MnuBlock{
            display: none;
        }
    }
</style>