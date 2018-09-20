<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-11 col-xl-11 text-center text-danger font-italic">
                <legend class="float-left font-weight-bold">Elimina orden de producción semana / maquila</legend>
            </div> 
        </div>
        <div class="row" aling="center">
            <div class="col-12 col-sm-4 col-md-4 col-lg-5 col-xl-5">
                <label>Del control</label>
                <input type="text" class="form-control form-control-sm column_filter numbersOnly" id="Maquila" autofocus maxlength="4" onkeyup="onChecarMaquilaValida(this)">
            </div>
            <div class="col-12 col-sm-4 col-md-4 col-lg-5 col-xl-5">
                <label>Al control</label>     
                <input type="text" class="form-control form-control-sm column_filter numbersOnly" id="Semana" maxlength="2"  min="1" max="52" onkeyup="onChecarSemanaValida(this)">
            </div> 
            <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2 mt-4">
                <button type="button" class="btn btn-danger" id="btnGenerar">Eliminar</button>
            </div>
            <div class="col-12 m-2"></div>
            <div class="col-12">
                <p class="text-danger font-weight-bold">Nota: Una vez terminado este paso, imprima las tarjetas de producción en su paso normal.</p>
            </div>
            <div class="col-12">
                <p class="text-info font-weight-bold">Nota: Esta rutina no afecta el avance de producción.</p>
            </div>
            <div id="Resultado" class="col-12">

            </div>
        </div>
    </div>
</div>