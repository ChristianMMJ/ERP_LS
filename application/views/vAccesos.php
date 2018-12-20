
<script src="<?php print base_url('js/multiselectjs/multiselect.min.js'); ?>"></script>
<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-header" align="center">
        <h3 class="font-weight-bold font-italic">Accesos</h3>
    </div>
    <div class="card-body">
        <!--MODULOS POR USUARIO-->
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                <h4 class="font-italic">MODULOS POR USUARIO</h4>
                <hr>
                <div class="w-100"></div>
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 pb-3">
                <label>Usuario</label>
                <select id="mxu" name="mxu" class="form-control form-control-sm">
                </select>
            </div>
            <div class="w-100"></div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <h4>MODULOS NO ASIGNADOS</h4>
            </div>
            <div class="col-2"></div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <h4>MODULOS ASIGNADOS</h4>
            </div>
            <div class="w-100"></div>
            <div class="col-5">
                <select name="from[]" id="modulos" class="form-control NotSelectize " size="10" multiple="multiple"> 
                </select>
            </div>
            <div class="col-2">
                <button type="button" id="modulos_rightAll" class="btn btn-block btn-default"><i class="fa fa-forward"></i></button>
                <button type="button" id="modulos_rightSelected" class="btn btn-block  btn-default"><i class="fa fa-chevron-right"></i></button>
                <button type="button" id="modulos_leftSelected" class="btn btn-block  btn-danger"><i class="fa fa-chevron-left"></i></button>
                <button type="button" id="modulos_leftAll" class="btn btn-block  btn-danger"><i class="fa fa-backward"></i></button>
            </div>
            <div class="col-5">
                <select name="to[]" id="modulos_to" class="form-control NotSelectize" size="10" multiple="multiple"></select>
            </div> 
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-2" align="right">
                <button type="button" class="btn btn-info" id="btnAsignarModulos"><span class="fa fa-save"></span> GUARDAR</button>
            </div>
        </div>
        <!--FIN MODULOS POR USUARIO-->      
        <!--OPCIONES POR MODULO-->
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-3 text-center">
                <h4 class="font-italic">OPCIONES POR MODULO</h4> 
                <hr>
                <div class="w-100"></div>
            </div>
            <div class="w-100"></div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pb-3">
                <label>Usuario</label>
                <select id="oxmu" name="oxmu" class="form-control form-control-sm">
                </select>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pb-3">
                <label>Modulo</label>
                <select id="oxmm" name="oxmm" class="form-control form-control-sm">
                </select>
            </div>
            <div class="w-100"></div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <h4>OPCIONES NO ASIGNADAS</h4>
            </div>
            <div class="col-2"></div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <h4>OPCIONES ASIGNADOS</h4>
            </div>
            <div class="w-100"></div>
            <div class="col-5">
                <select name="from[]" id="opciones" class="form-control NotSelectize " size="30" multiple="multiple"> 
                </select>
            </div>
            <div class="col-2">
                <button type="button" id="opciones_rightAll" class="btn btn-block btn-default"><i class="fa fa-forward"></i></button>
                <button type="button" id="opciones_rightSelected" class="btn btn-block  btn-default"><i class="fa fa-chevron-right"></i></button>
                <button type="button" id="opciones_leftSelected" class="btn btn-block  btn-danger"><i class="fa fa-chevron-left"></i></button>
                <button type="button" id="opciones_leftAll" class="btn btn-block  btn-danger"><i class="fa fa-backward"></i></button>
            </div>
            <div class="col-5">
                <select name="to[]" id="opciones_to" class="form-control NotSelectize" size="30" multiple="multiple"></select>
            </div>
        </div>     
        <!--FIN OPCIONES POR MODULO--> 
        <!--ITEMS POR OPCION-->
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-3 text-center">
                <h4 class="font-italic">ITEMS POR OPCIÓN</h4> 
                <hr>
                <div class="w-100"></div>
            </div>
            <div class="w-100"></div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-3">
                <label>Usuario</label>
                <select id="ixou" name="ixou" class="form-control form-control-sm">
                </select>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-3">
                <label>Modulo</label>
                <select id="ixom" name="ixom" class="form-control form-control-sm">
                </select>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-3">
                <label>Opcion</label>
                <select id="ixo" name="ixo" class="form-control form-control-sm">
                </select>
            </div>
            <div class="w-100"></div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <h4>ITEMS NO ASIGNADOS</h4>
            </div>
            <div class="col-2"></div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <h4>ITEMS ASIGNADOS</h4>
            </div>
            <div class="w-100"></div>
            <div class="col-5">
                <select name="from[]" id="items" class="form-control NotSelectize " size="50" multiple="multiple"> 
                </select>
            </div>
            <div class="col-2">
                <button type="button" id="items_rightAll" class="btn btn-block btn-default"><i class="fa fa-forward"></i></button>
                <button type="button" id="items_rightSelected" class="btn btn-block  btn-default"><i class="fa fa-chevron-right"></i></button>
                <button type="button" id="items_leftSelected" class="btn btn-block  btn-danger"><i class="fa fa-chevron-left"></i></button>
                <button type="button" id="items_leftAll" class="btn btn-block  btn-danger"><i class="fa fa-backward"></i></button>
            </div>
            <div class="col-5">
                <select name="to[]" id="items_to" class="form-control NotSelectize" size="50" multiple="multiple"></select>
            </div>
        </div>     
        <!--FIN ITEMS POR OPCION-->
        <!--SUBITEMS POR ITEM-->
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-3 text-center">
                <h4 class="font-italic">SUBITEMS POR ITEM</h4> 
                <hr>
                <div class="w-100"></div>
            </div>
            <div class="w-100"></div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pb-3">
                <label>Usuario</label>
                <select id="sixiu" name="sixiu" class="form-control form-control-sm">
                </select>
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pb-3">
                <label>Modulo</label>
                <select id="sixim" name="sixim" class="form-control form-control-sm">
                </select>
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pb-3">
                <label>Opcion</label>
                <select id="sixio" name="sixio" class="form-control form-control-sm">
                </select>
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pb-3">
                <label>Item</label>
                <select id="sixit" name="sixit" class="form-control form-control-sm">
                </select>
            </div>
            <div class="w-100"></div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <h4>SUBITEMS NO ASIGNADAS</h4>
            </div>
            <div class="col-2"></div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <h4>SUBITEMS ASIGNADOS</h4>
            </div>
            <div class="w-100"></div>
            <div class="col-5">
                <select name="from[]" id="subitems" class="form-control NotSelectize " size="15" multiple="multiple"> 
                </select>
            </div>
            <div class="col-2">
                <button type="button" id="subitems_rightAll" class="btn btn-block btn-default"><i class="fa fa-forward"></i></button>
                <button type="button" id="subitems_rightSelected" class="btn btn-block  btn-default"><i class="fa fa-chevron-right"></i></button>
                <button type="button" id="subitems_leftSelected" class="btn btn-block  btn-danger"><i class="fa fa-chevron-left"></i></button>
                <button type="button" id="subitems_leftAll" class="btn btn-block  btn-danger"><i class="fa fa-backward"></i></button>
            </div>
            <div class="col-5">
                <select name="to[]" id="subitems_to" class="form-control NotSelectize" size="15" multiple="multiple"></select>
            </div>
        </div>     
        <!--FIN SUBITEMS POR ITEM-->
        <!--SUBSUBITEMS POR ITEM-->
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-3 text-center">
                <h4 class="font-italic">SUBITEMS POR ITEM</h4> 
                <hr>
                <div class="w-100"></div>
            </div>
            <div class="w-100"></div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pb-3">
                <label>Usuario</label>
                <select id="sixiu" name="sixiu" class="form-control form-control-sm">
                </select>
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pb-3">
                <label>Modulo</label>
                <select id="sixim" name="sixim" class="form-control form-control-sm">
                </select>
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pb-3">
                <label>Opcion</label>
                <select id="sixio" name="sixio" class="form-control form-control-sm">
                </select>
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pb-3">
                <label>Item</label>
                <select id="sixit" name="sixit" class="form-control form-control-sm">
                </select>
            </div>
            <div class="w-100"></div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <h4>SUBITEMS NO ASIGNADAS</h4>
            </div>
            <div class="col-2"></div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <h4>SUBITEMS ASIGNADOS</h4>
            </div>
            <div class="w-100"></div>
            <div class="col-5">
                <select name="from[]" id="subitems" class="form-control NotSelectize " size="15" multiple="multiple"> 
                </select>
            </div>
            <div class="col-2">
                <button type="button" id="subitems_rightAll" class="btn btn-block btn-default"><i class="fa fa-forward"></i></button>
                <button type="button" id="subitems_rightSelected" class="btn btn-block  btn-default"><i class="fa fa-chevron-right"></i></button>
                <button type="button" id="subitems_leftSelected" class="btn btn-block  btn-danger"><i class="fa fa-chevron-left"></i></button>
                <button type="button" id="subitems_leftAll" class="btn btn-block  btn-danger"><i class="fa fa-backward"></i></button>
            </div>
            <div class="col-5">
                <select name="to[]" id="subitems_to" class="form-control NotSelectize" size="15" multiple="multiple"></select>
            </div>
        </div>     
        <!--FIN SUBSUBITEMS POR ITEM-->
    </div>
</div>
<script type="text/javascript">
    var pnlTablero = $("#pnlTablero"), pnlTableroBody = $("#pnlTablero").find(".card-body");
    var mxu = pnlTableroBody.find("#mxu"), oxmu = pnlTableroBody.find("#oxmu"), ixou = pnlTableroBody.find("#ixou"),
            sixiu = pnlTableroBody.find("#sixiu");
    var btnAsignarModulos = pnlTableroBody.find("#btnAsignarModulos");
    $(document).ready(function () {
                
        btnAsignarModulos.click(function () {
            if (mxu.val()) {
                var options = [];
                $.each($("#modulos_to").find('option'), function (k, v) {
                    options.push({MODULO: $(v).val(), MODULOT: $(v).text()});
                });
                if (options.length > 0) {
                    onEstablecerModulos(mxu.val(), options);
                } else {
                    onBeep(2);
                    swal({
                        buttons: ["CANCELAR", "ACEPTAR"],
                        title: 'NO HA SELECCIONADO NINGÚN MODULO ESTO VA A ELIMINAR TODOS LOS ACCESOS A LOS MODULOS, ¿DESEA CONTINUAR?',
                        text: "ESTA ACCIÓN ELIMINARÁ LOS PERMISOS",
                        icon: "warning",
                        closeOnEsc: true,
                        closeOnClickOutside: true
                    }).then((action) => {
                        if (action) {
                            onEstablecerModulos(mxu.val(), options);
                        }
                    });
                }
            } else {
                onBeep(2);
                swal('ATENCIÓN', 'SELECCIONE UN USUARIO', 'warning').then((value) => {
                    mxu[0].selectize.focus();
                    mxu[0].selectize.open();
                });
            }
        });

        $('#modulos').multiselect();

        $('button[id^="modulos"].btn-default').click(function () {
            onBeep(1);
        });

        $('button[id^="modulos"].btn-danger').click(function () {
            onBeep(3);
        });

        $.getJSON('<?php print base_url('Accesos/getUsuarios') ?>').done(function (dx) {
            $.each(dx, function (k, v) {
                mxu[0].selectize.addOption({text: v.USUARIO + ' (' + v.TIPO_ACCESO + ')', value: v.ID});
                oxmu[0].selectize.addOption({text: v.USUARIO + ' (' + v.TIPO_ACCESO + ')', value: v.ID});
                ixou[0].selectize.addOption({text: v.USUARIO + ' (' + v.TIPO_ACCESO + ')', value: v.ID});
                sixiu[0].selectize.addOption({text: v.USUARIO + ' (' + v.TIPO_ACCESO + ')', value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x.responseText);
        });

        $.getJSON('<?php print base_url('accesos_modulos') ?>').done(function (dx) {
            $.each(dx, function (k, v) {
                $("#modulos").append('<option value="' + v.ID + '">' + v.Modulo + '</option>');
            });
        }).fail(function (x, y, z) {
            console.log(x.responseText);
        });

        mxu.change(function () {
            $("#modulos_to").html('');
            getModulosXUsuario();
        });
    });

    function getModulosXUsuario() {
        $.getJSON('<?php print base_url('accesos_modulos_x_usuario'); ?>', {U: mxu.val()}).done(function (dx) {
            if (dx.length > 0) {
                var modulos_asignados = [];
                $.each(dx, function (k, v) {
                    $("#modulos_to").append('<option value="' + v.ID + '">' + v.Modulo + '</option>');
                    modulos_asignados.push(v.ID);
                });
                getModulos(2, modulos_asignados);
            } else {
                onBeep(2);
                $.notify({
                    // options
                    message: 'ESTE USUARIO NO TIENE ASIGNADO NINGÚN MODULO'
                }, {
                    // settings
                    type: 'danger',
                    delay: 3500,
                    animate: {
                        enter: 'animated bounceIn',
                        exit: 'animated flipOutX'
                    },
                    placement: {
                        from: "top",
                        align: "center"
                    }
                });
                getModulos(1, []);
            }
        }).fail(function (x, y, z) {
            console.log(x.responseText);
        }).always(function () {

        });
    }

    function onEstablecerModulos(usr, op) {
        var f = new FormData();
        f.append('USR', usr);
        f.append('OPTIONS', JSON.stringify(op));
        $.ajax({
            url: '<?php print base_url('accesos_add_modulos'); ?>',
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: f
        }).done(function (data, x, jq) {
            swal('ATENCIÓN', 'SE HAN GUARDADO LOS CAMBIOS', 'success');
        }).fail(function (x, y, z) {
            console.log(x.responseText);
        }).always(function () {

        });
    }

    function getModulos(action, ma) {
        var modulos = $("#modulos");
        modulos.html('');
        $.getJSON('<?php print base_url('accesos_modulos') ?>').done(function (dx) {
            switch (action) {
                case 1:
                    $("#modulos_to").html('');
                    $.each(dx, function (k, v) {
                        modulos.append('<option value="' + v.ID + '">' + v.Modulo + '</option>');
                    });
                    break;
                case 2:
                    $.each(dx, function (kk, vv) {
                        if (ma.indexOf(vv.ID) === -1) {
                            modulos.append('<option value="' + vv.ID + '">' + vv.Modulo + '</option>');
                        }
                    });
                    break;
            }
        }).fail(function (x, y, z) {
            console.log(x.responseText);
        });
    }
</script>
<style>
    .btn-default{
        background-color: #8BC34A;
        color: #fff;
    }
</style>