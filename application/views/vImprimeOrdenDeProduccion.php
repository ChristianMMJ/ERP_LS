<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-11 col-xl-11 text-center text-danger font-italic">
                <legend class="float-left font-weight-bold">Imprime orden de producción</legend>
            </div> 
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                <label>Del control</label>
                <input type="text" class="form-control form-control-sm column_filter numbersOnly" id="ControlInicial" autofocus maxlength="4" onkeyup="">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                <label>Al control</label>     
                <input type="text" class="form-control form-control-sm column_filter numbersOnly" id="ControlFinal" maxlength="2"  min="1" max="52" onkeyup="">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                <label>Semana</label>
                <input type="text" class="form-control form-control-sm column_filter numbersOnly" id="Semana" maxlength="4" minlength="1" onkeypress="onVerificarFormValido()" onkeyup="onVerificarFormValido()" onfocus="onVerificarFormValido()">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                <label>Año</label>
                <input type="text" class="form-control form-control-sm column_filter numbersOnly" id="Anio" maxlength="4" minlength="1" onkeypress="onVerificarFormValido()" onkeyup="onVerificarFormValido()" onfocus="onVerificarFormValido()">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-12 col-xl-12 mt-4" align="right">
                <button type="button" class="btn btn-primary" id="btnGenerar">Aceptar</button>
            </div>
            <div id="Resultado" class="col-12">

            </div>
        </div>
    </div>
</div>
<script>
 // IIFE - Immediately Invoked Function Expression
    (function (yc) {
        // The global jQuery object is passed as a parameter
        yc(window.jQuery, window, document);
    }(function ($, window, document) {
        // The $ is now locally scoped
        // Listen for the jQuery ready event on the document
        $(function () {
            handleEnter();
            
        });
    }));
</script>