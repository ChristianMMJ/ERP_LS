<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-11 col-xl-11 text-center text-danger font-italic">
                <legend class="float-left font-weight-bold">Genera orden de producción semana / maquila</legend>
            </div> 
        </div>
        <div class="row">
            <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-1"></div>
            <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-3">
                <label>Maquila</label>
                <input type="text" class="form-control form-control-sm column_filter numbersOnly" id="Maquila" autofocus maxlength="4" onkeyup="onChecarMaquilaValida(this)">
            </div>
            <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-3">
                <label>Semana</label>     
                <input type="text" class="form-control form-control-sm column_filter numbersOnly" id="Semana" maxlength="2"  min="1" max="52" onkeyup="onChecarSemanaValida(this)">
            </div>
            <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-3">
                <label>Año</label>
                <input type="text" class="form-control form-control-sm column_filter numbersOnly" id="Anio" maxlength="4" minlength="1" onkeypress="onVerificarFormValido()" onkeyup="onVerificarFormValido()" onfocus="onVerificarFormValido()">
            </div>
            <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2 mt-4">
                <button type="button" class="btn btn-primary" id="btnGenerar">Generar</button>
            </div>
            <div id="Resultado" class="col-12">

            </div>
        </div>
    </div>
</div>
<script>
    var master_url = base_url + 'index.php/OrdenDeProduccion/';
    var pnlTablero = $("#pnlTablero"), Maquila = pnlTablero.find("#Maquila"),
            Semana = pnlTablero.find("#Semana"), Anio = pnlTablero.find("#Anio"),
            btnGenerar = pnlTablero.find("#btnGenerar"), AnioValido = (new Date()).getFullYear();

    // IIFE - Immediately Invoked Function Expression
    (function (yc) {
        // The global jQuery object is passed as a parameter
        yc(window.jQuery, window, document);
    }(function ($, window, document) {
        // The $ is now locally scoped
        // Listen for the jQuery ready event on the document
        $(function () {
            handleEnter();
            btnGenerar.prop("disabled", true);
            pnlTablero.find("#Anio").val((new Date()).getFullYear());
            btnGenerar.click(function () {
                onAgregarAOrdenDeProduccion();
            });
        });
    }));

    function onAgregarAOrdenDeProduccion() {
        $.post(master_url + 'onAgregarAOrdenDeProduccion', {MAQUILA: Maquila.val(), SEMANA: Semana.val(), ANO: Anio.val()}).done(function (data) {
            console.log(data);
            $("#Resultado").html(data);
            swal('ATENCIÓN', 'SE HAN CREADO LAS ORDENES DE PRODUCCION DE LA MAQUILA ' + Maquila.val() + ', SEMANA ' + Semana.val(), 'success');
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {

        });
    }

    function onChecarMaquilaValida(e) {
        var n = $(e);
        if (n.val() !== '') {
            $.getJSON(master_url + 'onChecarMaquilaValida', {ID: $(e).val()}).done(function (data) {
                if (parseInt(data[0].Maquila) <= 0) {
                    swal({
                        title: "Indique una maquila válida",
                        text: "La maquila " + $(e).val() + " no existe.",
                        icon: "warning",
                        focusConfirm: true,
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    }).then((value) => {
                        onVerificarFormValido();
                        $(e).val('').focus().select();
                    });
                }
            }).fail(function (x) {
                swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
                console.log(x.responseText);
            }).always(function () {
                onVerificarFormValido();
            });
        }
    }

    function onChecarSemanaValida(e) {
        var n = $(e);
        if (n.val() !== '') {
            $.getJSON(master_url + 'onChecarSemanaValida', {ID: $(e).val()}).done(function (data) {
                if (parseInt(data[0].Semana) <= 0) {
                    var options = {
                        title: "Indique una semana de producción válida",
                        text: "La semana " + $(e).val() + " no existe o no ha sido generada.",
                        icon: "warning",
                        focusConfirm: true,
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    };
                    swal(options).then((value) => {
                        onVerificarFormValido();
                        $(e).val('').focus().select();
                    });
                }
            }).fail(function (x) {
                swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
                console.log(x.responseText);
            }).always(function () {
                onVerificarFormValido();
            });
        }
    }

    function onVerificarFormValido() {
        if (parseInt(AnioValido) <= Anio.val()) {
            if (Maquila.val() !== '' && Semana.val() !== '' && Anio.val() !== '') {
                btnGenerar.prop("disabled", false);
            } else {
                btnGenerar.prop("disabled", true);
            }
        } else {
            swal({
                title: "Imposible realizar esta acción",
                text: "El año no puede ser mayor al año actual " + AnioValido + ", escriba un año valido para este proposito.",
                icon: "warning",
                focusConfirm: true,
                closeOnClickOutside: false,
                closeOnEsc: false
            }).then((value) => {
                onVerificarFormValido();
                Anio.val('').focus().select();
            });
        }
    }
</script>