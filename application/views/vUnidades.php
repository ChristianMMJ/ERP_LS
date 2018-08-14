<div class="card m-2 animated fadeIn" id="pnlTablero">
    <div class="card-body ">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Unidades</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
                <button type="button" class="btn btn-danger" id="btnEliminar" data-toggle="tooltip" data-placement="top" title="Eliminar"><span class="fa fa-trash"></span><br></button>
            </div>
        </div>
        <div class="card-block mt-4">
            <div id="Unidades" class="table-responsive">
                <table id="tblUnidades" class="table table-sm display " style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Clave</th>
                            <th>Descripción</th> 
                            <th>Estatus</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card m-2 d-none animated fadeIn" id="pnlDatos">
    <div class="card-body text-dark">
        <form id="frmNuevo">
            <fieldset>
                <div class="">
                    <div class="col-12 col-sm-12 col-md-12"  align="left">
                        <button type="button" class="btn btn-primary" id="btnCancelar" >
                            <span class="fa fa-arrow-left" ></span> 
                        </button> 
                        <legend >Unidad</legend>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="d-none">
                        <input type="text"  name="ID" class="form-control form-control-sm" >
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label for="Usuario" >Clave*</label>
                        <input type="text" class="form-control form-control-sm" id="Clave" name="Clave" required autofocus="">
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label for="Contrasena" >Descripción*</label>
                        <input type="text" id="Descripcion" name="Descripcion" class="form-control form-control-sm" placeholder="" required>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12">
                        <label for="" >Estatus*</label>
                        <select id="Estatus" name="Estatus" class="form-control form-control-sm" >
                            <option value=""></option>
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                        </select>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-6 col-md-6 ">
                        <h6 class="text-danger">Los campos con * son obligatorios</h6>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6" align="right">
                        <button type="button" class="btn btn-raised btn-info btn-sm" id="btnGuardar">
                            <span class="fa fa-save "></span> GUARDAR
                        </button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<script>
    var btnNuevo = $("#btnNuevo"), btnCancelar = $("#btnCancelar");
    var pnlTablero = $("#pnlTablero"), pnlDatos = $("#pnlDatos");

    $(document).ready(function () {
        handleEnter();
        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass("d-none");
            pnlDatos.find("#Clave").focus();
        });
        
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass("d-none"); 
        });
    });
    
    function getLastID(){
        
    }
</script>