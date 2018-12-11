<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-header" align="center">
        <h3 class="font-weight-bold">Avance</h3>
    </div>
    <div class="card-body row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <input type="text" id="usuario" name="usuario" class="form-control form-control-sm">
            <div class="w-100"></div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <label>Fecha</label>
                    <input type="text" id="Fecha" name="Fecha" class="form-control form-control-sm date">
                </div>
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                    <label>Departamento</label>
                    <select type="text" id="Departamento" name="Departamento" class="form-control form-control-sm"></select>
                </div>
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <label>Semana</label>
                    <input type="text" id="Semana" name="Semana" class="form-control form-control-sm numbersOnly" maxlength="2">
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 text-center">
            <h3>Fracciones pagadas en nomina de este control</h3>
            <table id="tblAvance" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Emp</th>
                        <th scope="col">Semana</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Control</th>
                        <th scope="col">Maq</th>
                        <th scope="col">Estilo</th>
                        <th scope="col">Frac</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Pares</th>
                        <th scope="col">SubTotal</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center">
            <img src="<?= base_url('img/LS.png'); ?>" class="img-responsive">
        </div>
    </div>
</div>
<script>
    var master_url = '<?= base_url('Avance/') ?>', pnlTablero = $("#pnlTablero");
    var Fecha = pnlTablero.find("#Fecha"), Departamento = pnlTablero.find("#Departamento"),
            Semana = pnlTablero.find("#Semana"), tblAvance = pnlTablero.find("#tblAvance"),
            Avances;

    $(document).ready(function () {
        getDepartamentos();
    });

    function getRecords() {
        
    }

    function getDepartamentos() {
        $.getJSON(master_url + 'getDepartamentos').done(function (data) {
            $.each(data, function (k, v) {
                pnlTablero.find("#Departamento")[0].selectize.addOption({text: v.Departamento, value: v.Clave});
            });
        }).fail(function (x, y, z) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        });
    }
</script>