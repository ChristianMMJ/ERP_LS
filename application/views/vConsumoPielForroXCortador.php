<div class="modal" id="mdlConsumosPielForro">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Consumo piel forro, cortador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                        <label>Maquila</label>
                        <input type="text" id="Maquila" name="Maquila" class="form-control form-control-sm" autofocus="">
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                        <label>De sem</label>
                        <input type="text" id="SemanaInicial" name="SemanaInicial" class="form-control form-control-sm">
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                        <label>A sem</label>
                        <input type="text" id="SemanaFinal" name="SemanaFinal" class="form-control form-control-sm">
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                        <label>Año</label>
                        <input type="text" id="Ano" name="Ano" class="form-control form-control-sm">
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label>Cortador</label>
                        <select id="Cortador" name="Cortador" class="form-control form-control-sm">
                        </select>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label>Articulo</label>
                        <select id="Articulo" name="Articulo" class="form-control form-control-sm">
                        </select>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <label>Fecha Inicial</label>
                        <input type="text" id="FechaInicial" name="FechaInicial"  class="form-control form-control-sm date notEnter" placeholder="" >
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <label>Fecha Final</label>
                        <input type="text" id="FechaFinal" name="FechaFinal"  class="form-control form-control-sm date notEnter" placeholder="" >
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="custom-control custom-checkbox"  align="center" style="cursor: pointer !important;">
                            <input type="checkbox" class="custom-control-input selectNotEnter" id="ConEmpleado" name="ConEmpleado" style="cursor: pointer !important;">
                            <label class="custom-control-label text-danger labelCheck" for="ConEmpleado" style="cursor: pointer !important;">Con Empleado</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                        <div class="alert alert-dismissible alert-danger"> 
                            <strong>Nota!</strong> Si desea información entre fechas solo capture maquila y fechas.
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                        <div class="alert alert-dismissible alert-danger"> 
                            <strong>Nota!</strong> El resultado de este reporte es lo que se ha entregado de almacen a corte solamente. No tiene que ser el programa completo.
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"> 
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <button type="button" class="btn btn-primary">Aceptar</button>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" align="right">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div> 
            </div>
        </div>
    </div>
</div>
<script>
    var mdlConsumosPielForro = $("#mdlConsumosPielForro");
    $(document).ready(function () {

        mdlConsumosPielForro.on('shown.bs.modal', function () {
            mdlConsumosPielForro.find("#Maquila").focus();
        });

    });

    function getCortadores() {
        $.getJSON(master_url + 'getCortadores').done(function (data) {
            $.each(data,function(k,v){
                mdlConsumosPielForro.find("#Cortador")[0].selectize.addOption({text: v.EMPLEADO, value: v.CLAVE}); 
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }

    function getArticulos() {
        $.getJSON(master_url + 'getArticulos').done(function (data) {
            $.each(data,function(k,v){
                mdlConsumosPielForro.find("#Cortador")[0].selectize.addOption({text: v.CLAVE_ARTICULO, value: v.CLAVE}); 
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }
</script>