<div class="modal " id="mdlFichaTecnicaCompra"  role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Imprimir Ficha Técnica p' Compras</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmFichaTecnicaCompras">
                    <div class="row">

                        <div class="col-12 col-sm-8">
                            <label>Estilo</label>
                            <select class="form-control form-control-sm required" id="Estilo" name="Estilo" required="">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label>Piezas</label>
                            <input type="text" maxlength="6" class="form-control form-control-sm disabledForms" id="Piezas" name="Piezas" >
                        </div>
                        <div class="col-12 col-sm-12">
                            <label>Color</label>
                            <select class="form-control form-control-sm required" id="Color" name="Color" required="">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-12">
                            <label>Maquila</label>
                            <select class="form-control form-control-sm required" id="Maquila" name="Maquila" required="">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label>Mano de Obra</label>
                            <input type="text" maxlength="2" class="form-control form-control-sm numbersOnly" id="ManoObra" name="ManoObra" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label>Gastos</label>
                            <input type="text" maxlength="2" class="form-control form-control-sm numbersOnly" id="Gastos" name="Gastos" " >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label>Utilidad</label>
                            <input type="text" maxlength="4" class="form-control form-control-sm numbersOnly" id="Utilidad" name="Utilidad" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label>% Desperdicio</label>
                            <input type="text" maxlength="4" class="form-control form-control-sm numbersOnly disabledForms" id="Desperdicio" name="Desperdicio" >
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnImprimirFichaTecnica">IMPRIMIR</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
            </div>
        </div>
    </div>
</div>
<script>


    $(document).ready(function () {

        $("#Estilo").change(function () {
            $("#Color")[0].selectize.clear(true);
            $("#Color")[0].selectize.clearOptions();
            getColoresXEstilo($(this).val());
            getEstiloByClave($(this).val());
        });

        $("#Maquila").change(function () {
            var Piezas = parseInt($('#Piezas').val());
            getDesperdicioByMaquilaPiezas($(this).val(), Piezas);
        });

        $('#mdlFichaTecnicaCompra').on('shown.bs.modal', function () {
            $("input").val("");
            $.each($("select"), function (k, v) {
                $("select")[k].selectize.clear(true);
            });
            $('#Estilo')[0].selectize.focus();
        });

        $('#btnImprimirFichaTecnica').on("click", function () {
            HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
            var frm = new FormData($('#mdlFichaTecnicaCompra').find("#frmFichaTecnicaCompras")[0]);
            var maq = $("#Maquila").find("option:selected").text();
            frm.append('NomMaquila', maq);
            $.ajax({
                url: base_url + 'index.php/FichaTecnicaCompra/onImprimirFichaTecnicaCompra',
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: frm
            }).done(function (data, x, jq) {
                console.log(data);
                if (data.length > 0) {

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
                                    width: "85%",
                                    height: "85%"
                                },
                                // Iframe tag attributes
                                attr: {
                                    scrolling: "auto"
                                }
                            }
                        }
                    });


                } else {
                    swal('ATENCIÓN', 'NO EXISTEN DATOS PARA EL REPORTE', 'error');
                }
                HoldOn.close();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
                HoldOn.close();
            });
        });
        handleEnter();
        getEstilos();
        getMaquilas();
    });

    function getMaquilas() {
        $.getJSON(base_url + 'index.php/Estilos/getMaquilas').done(function (data, x, jq) {
            $.each(data, function (k, v) {
                $("#Maquila")[0].selectize.addOption({text: v.Maquila, value: v.Clave});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }

    function getEstilos() {
        $.getJSON(base_url + 'index.php/FichaTecnica/getEstilos').done(function (data, x, jq) {
            $.each(data, function (k, v) {
                $("#Estilo")[0].selectize.addOption({text: v.Estilo, value: v.Clave});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }

    function getEstiloByClave(Estilo) {
        $.getJSON(base_url + 'index.php/Estilos/getEstiloByClave', {Clave: Estilo}).done(function (data, x, jq) {
            $("#Piezas").val(parseInt(data[0].PiezasCorte));
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }

    function getColoresXEstilo(Estilo) {
        $.getJSON(base_url + 'index.php/FichaTecnica/getColoresXEstilo', {Estilo: Estilo}).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                $("#Color")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
            $("#Color")[0].selectize.focus();
            $("#Color")[0].selectize.open();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }

    function getDesperdicioByMaquilaPiezas(Maquila, Piezas) {
        $.getJSON(base_url + 'index.php/Maquilas/getMaquilaByClave', {Clave: Maquila}).done(function (data, x, jq) {
            console.log(data, Piezas);
            if (Piezas <= 10) {
                $("#Desperdicio").val(parseFloat(data[0].PorExtra3a10));
            } else if (Piezas <= 14) {
                $("#Desperdicio").val(parseFloat(data[0].PorExtra11a14));
            } else if (Piezas <= 18) {
                $("#Desperdicio").val(parseFloat(data[0].PorExtra15a18));
            } else if (Piezas > 19) {
                $("#Desperdicio").val(parseFloat(data[0].PorExtra19a));
            }


        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }

</script>