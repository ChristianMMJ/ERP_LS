<div class="col-12">
    <div class="row">
        <div id="MnuBlock" class="col-12 row justify-content-center mt-2" align="center">
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 m-2 animated fadeInUp" onclick="onMenuDisplay('MenuProveedores');">
                <div class="card text-center">
                    <div class="card-body">
                        <span class="fa fa-user-secret fa-2x  mt-5"></span>
                    </div>
                    <div class="card-footer">
                        <h4>PROVEEDORES</h4>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 m-2 animated fadeInDown" onclick="onMenuDisplay('MenuMateriales');">
                <div class="card text-center">
                    <div class="card-body">
                        <span class="fa fa-cube fa-2x  mt-5"></span>
                    </div>
                    <div class="card-footer">
                        <h4>MATERIALES</h4>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 m-2 animated fadeInUp" onclick="onMenuDisplay('MenuClientes');">
                <div class="card text-center">
                    <div class="card-body">
                        <span class="fa fa-users fa-2x  mt-5"></span>
                    </div>
                    <div class="card-footer">
                        <h4>CLIENTES</h4>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 m-2 animated fadeInDown" onclick="onMenuDisplay('MenuFichasTecnicas');">
                <div class="card text-center">
                    <div class="card-body">
                        <span class="fa fa-file-invoice fa-2x  mt-5"></span>
                    </div>
                    <div class="card-footer">
                        <h4>FICHAS TÉCNICAS</h4>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 m-2 animated fadeInUp" onclick="onMenuDisplay('MenuProduccion');">
                <div class="card text-center">
                    <div class="card-body">
                        <span class="fa fa-industry fa-2x  mt-5"></span>
                    </div>
                    <div class="card-footer">
                        <h4>PRODUCCIÓN</h4>
                    </div>
                </div>
            </div>  
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 m-2 animated fadeInDown" onclick="onMenuDisplay('MenuContabilidad');">
                <div class="card text-center">
                    <div class="card-body">
                        <span class="fa fa-calculator fa-2x  mt-5"></span>
                    </div>
                    <div class="card-footer">
                        <h4>CONTABILIDAD</h4>
                    </div>
                </div>
            </div>  
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 m-2 animated fadeInUp" onclick="onMenuDisplay('MenuNomina');">
                <div class="card text-center">
                    <div class="card-body">
                        <span class="fa fa-hand-holding-usd fa-2x  mt-5"></span>
                    </div>
                    <div class="card-footer">
                        <h4>NOMINAS</h4>
                    </div>
                </div>
            </div>  
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 m-2 animated fadeInDown" onclick="onMenuDisplay('MenuParametros');">
                <div class="card text-center">
                    <div class="card-body">
                        <span class="fa fa-cogs fa-2x  mt-5"></span>
                    </div>
                    <div class="card-footer">
                        <h4>PARÁMETROS</h4>
                    </div>
                </div>
            </div>
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
        background-color: #2384c6 !important;
        color: #fff;
    }
    .card:hover .card-body{
        cursor: pointer !important;
        font-weight: bold;
        background-color: #2384c6 !important;
        color: #fff;
    }
    .card:hover .card-footer{
        cursor: pointer !important;
        font-weight: bold;
        background-color: #2384c6 !important;
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
<script>
    function onMenuDisplay(e) {
        window.location.href = '<?php print base_url(); ?>' + e + '.shoes/';
    }
</script>