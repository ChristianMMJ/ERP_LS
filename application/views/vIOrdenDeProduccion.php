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
                <input type="text" class="form-control form-control-sm column_filter numbersOnly" id="ControlInicial" autofocus maxlength="10" onkeyup="">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                <label>Al control</label>     
                <input type="text" class="form-control form-control-sm column_filter numbersOnly" id="ControlFinal" maxlength="10"  min="1" max="10" onkeyup="">
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                <label>Semana</label>
                <input type="text" class="form-control form-control-sm column_filter numbersOnly" id="Semana" maxlength="2" minlength="1" onkeypress="onVerificarFormValido()" onkeyup="onVerificarFormValido()" onfocus="onVerificarFormValido()">
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
    var btnGenerar = $("#btnGenerar");
    var controlinicial = $("#ControlInicial"), controlfinal = $("#ControlFinal"), semana = $("#Semana"), Anio = $("#Anio");
    // IIFE - Immediately Invoked Function Expression
    (function (yc) {
        // The global jQuery object is passed as a parameter
        yc(window.jQuery, window, document);
    }(function ($, window, document) {
        // The $ is now locally scoped
        // Listen for the jQuery ready event on the document
        $(function () {
            handleEnter();
            btnGenerar.click(function () {
                var params = {INICIO: controlinicial.val(), FIN: controlfinal.val(), SEMANA: semana.val(), ANIO: Anio.val()};
                $.post(master_url + 'getOrdenDeProduccion', params).done(function (data) {
                    //check Apple device
                    if (isAppleDevice() || isMobile) {
                        window.open(data, '_blank');
                    } else {
                        $.fancybox.open({
                            src: data,
                            type: 'iframe',
                            opts: {
                                afterShow: function (instance, current) {
                                    console.info('done!');
                                },
                                iframe: {
                                    // Iframe template
                                    tpl: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowtransparency="true" src=""></iframe>',
                                    preload: true,
                                    // Custom CSS styling for iframe wrapping element
                                    // You can use this to set custom iframe dimensions
                                    css: {
                                        width: "100%",
                                        height: "100%"
                                    },
                                    // Iframe tag attributes
                                    attr: {
                                        scrolling: "auto"
                                    }
                                }
                            }
                        });
                    }
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            });
        });
    }));

    function isAppleDevice() {
        return (
                (navigator.userAgent.toLowerCase().indexOf("ipad") > -1) ||
                (navigator.userAgent.toLowerCase().indexOf("iphone") > -1) ||
                (navigator.userAgent.toLowerCase().indexOf("ipod") > -1)
                );
    }
</script>