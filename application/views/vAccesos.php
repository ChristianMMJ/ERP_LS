
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
            <div class="col-2 text-center">
                <button type="button" id="modulos_rightAll" class="btn btn-block btn-default" data-toggle="tooltip" data-placement="top" title="ASIGNAR TODOS"><i class="fa fa-forward"></i></button>
                <button type="button" id="modulos_rightSelected" class="btn btn-block  btn-default" data-toggle="tooltip" data-placement="top" title="ASIGNAR"><i class="fa fa-chevron-right"></i></button>
                <button type="button" id="modulos_leftSelected" class="btn btn-block  btn-danger" data-toggle="tooltip" data-placement="top" title="REMOVER"><i class="fa fa-chevron-left"></i></button>
                <button type="button" id="modulos_leftAll" class="btn btn-block  btn-danger" data-toggle="tooltip" data-placement="top" title="REMOVER TODOS"><i class="fa fa-backward"></i></button>

                <button type="button" id="modulo_nuevo" class="btn btn-info mt-2"  data-toggle="tooltip" data-placement="top" title="AGREGAR MODULO"><span class="fa fa-plus"></span></button>
                <button type="button" id="modulo_editor" class="btn btn-warning mt-2" data-toggle="tooltip" data-placement="top" title="EDITAR MODULO"><span class="fa fa-pencil-alt"></span></button>
                <button type="button" id="modulo_eliminar" class="btn btn-danger mt-2" data-toggle="tooltip" data-placement="top" title="ELIMINAR MODULO"><span class="fa fa-trash"></span></button>
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
                <select name="from[]" id="opciones" class="form-control NotSelectize " size="10" multiple="multiple"> 
                </select>
            </div>
            <div class="col-2 text-center">
                <button type="button" id="opciones_rightAll" class="btn btn-block btn-default"  data-toggle="tooltip" data-placement="top" title="ASIGNAR TODOS"><i class="fa fa-forward"></i></button>
                <button type="button" id="opciones_rightSelected" class="btn btn-block  btn-default" data-toggle="tooltip" data-placement="top" title="ASIGNAR TODOS"><i class="fa fa-chevron-right"></i></button>
                <button type="button" id="opciones_leftSelected" class="btn btn-block  btn-danger" data-toggle="tooltip" data-placement="top" title="REMOVER"><i class="fa fa-chevron-left"></i></button>
                <button type="button" id="opciones_leftAll" class="btn btn-block  btn-danger" data-toggle="tooltip" data-placement="top" title="REMOVER TODOS"><i class="fa fa-backward"></i></button>

                <button type="button" id="opciones_nuevo" class="btn btn-info mt-2" data-toggle="tooltip" data-placement="top" title="AGREGAR OPCION"><span class="fa fa-plus"></span></button>
                <button type="button" id="opciones_editor" class="btn btn-warning mt-2" data-toggle="tooltip" data-placement="top" title="EDITAR OPCION"><span class="fa fa-pencil-alt"></span></button>
                <button type="button" id="opciones_eliminar" class="btn btn-danger mt-2" data-toggle="tooltip" data-placement="top" title="ELIMINAR OPCION"><span class="fa fa-trash"></span></button>
            </div>
            <div class="col-5">
                <select name="to[]" id="opciones_to" class="form-control NotSelectize" size="10" multiple="multiple"></select>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-2" align="right">
                <button type="button" class="btn btn-info" id="btnAsignarOpcionesxModulos"><span class="fa fa-save"></span> GUARDAR</button>
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
                <select id="ixoo" name="ixoo" class="form-control form-control-sm">
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
                <select name="from[]" id="items" class="form-control NotSelectize " size="15" multiple="multiple"> 
                </select>
            </div>
            <div class="col-2 text-center">
                <button type="button" id="items_rightAll" class="btn btn-block btn-default" data-toggle="tooltip" data-placement="top" title="ASIGNAR TODOS"><i class="fa fa-forward"></i></button>
                <button type="button" id="items_rightSelected" class="btn btn-block  btn-default" data-toggle="tooltip" data-placement="top" title="ASIGNAR"><i class="fa fa-chevron-right"></i></button>
                <button type="button" id="items_leftSelected" class="btn btn-block  btn-danger" data-toggle="tooltip" data-placement="top" title="REMOVER"><i class="fa fa-chevron-left"></i></button>
                <button type="button" id="items_leftAll" class="btn btn-block  btn-danger"  data-toggle="tooltip" data-placement="top" title="REMOVER TODOS"><i class="fa fa-backward"></i></button>

                <button type="button" id="items_nuevo" class="btn btn-info mt-2" data-toggle="tooltip" data-placement="top" title="AGREGAR ITEM"><span class="fa fa-plus"></span></button>
                <button type="button" id="items_editor" class="btn btn-warning mt-2"  data-toggle="tooltip" data-placement="top" title="EDITAR ITEM"><span class="fa fa-pencil-alt"></span></button>
                <button type="button" id="items_eliminar" class="btn btn-danger mt-2"  data-toggle="tooltip" data-placement="top" title="ELIMINAR ITEM"><span class="fa fa-trash"></span></button>
            </div>
            <div class="col-5">
                <select name="to[]" id="items_to" class="form-control NotSelectize" size="15" multiple="multiple"></select>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-2" align="right">
                <button type="button" class="btn btn-info" id="btnAsignarItemsXOpcionXModulo"><span class="fa fa-save"></span> GUARDAR</button>
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
            <div class="col-2 text-center">
                <button type="button" id="subitems_rightAll" class="btn btn-block btn-default" data-toggle="tooltip" data-placement="top" title="ASIGNAR TODOS"><i class="fa fa-forward"></i></button>
                <button type="button" id="subitems_rightSelected" class="btn btn-block  btn-default" data-toggle="tooltip" data-placement="top" title="ASIGNAR"><i class="fa fa-chevron-right"></i></button>
                <button type="button" id="subitems_leftSelected" class="btn btn-block  btn-danger" data-toggle="tooltip" data-placement="top" title="REMOVER"><i class="fa fa-chevron-left"></i></button>
                <button type="button" id="subitems_leftAll" class="btn btn-block  btn-danger" data-toggle="tooltip" data-placement="top" title="REMOVER TODOS"><i class="fa fa-backward"></i></button>

                <button type="button" id="subitems_nuevo" class="btn btn-info mt-2" data-toggle="tooltip" data-placement="top" title="AGREGAR SUBITEM"><span class="fa fa-plus"></span></button>
                <button type="button" id="subitems_editor" class="btn btn-warning mt-2" data-toggle="tooltip" data-placement="top" title="EDITAR SUBITEM"><span class="fa fa-pencil-alt"></span></button>
                <button type="button" id="subitems_eliminar" class="btn btn-danger mt-2" data-toggle="tooltip" data-placement="top" title="ELIMINAR SUBITEM"><span class="fa fa-trash"></span></button>
            </div>
            <div class="col-5">
                <select name="to[]" id="subitems_to" class="form-control NotSelectize" size="15" multiple="multiple"></select>
            </div>
        </div>     
        <!--FIN SUBITEMS POR ITEM-->
        <!--SUBSUBITEMS POR ITEM-->
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-3 text-center">
                <h4 class="font-italic">SUBSUBITEMS POR SUBITEM</h4> 
                <hr>
                <div class="w-100"></div>
            </div>
            <div class="w-100"></div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pb-3">
                <label>Usuario</label>
                <select id="ssixiu" name="ssixiu" class="form-control form-control-sm">
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
                <h4>SUBSUBITEMS NO ASIGNADOS</h4>
            </div>
            <div class="col-2"></div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <h4>SUBSUBITEMS ASIGNADOS</h4>
            </div>
            <div class="w-100"></div>
            <div class="col-5">
                <select name="from[]" id="subsubitems" class="form-control NotSelectize " size="15" multiple="multiple"> 
                </select>
            </div>
            <div class="col-2 text-center">
                <button type="button" id="subsubitems_rightAll" class="btn btn-block btn-default" data-toggle="tooltip" data-placement="top" title="ASIGNAR TODOS"><i class="fa fa-forward"></i></button>
                <button type="button" id="subsubitems_rightSelected" class="btn btn-block  btn-default" data-toggle="tooltip" data-placement="top" title="ASIGNAR"><i class="fa fa-chevron-right"></i></button>
                <button type="button" id="subsubitems_leftSelected" class="btn btn-block  btn-danger" data-toggle="tooltip" data-placement="top" title="REMOVER"><i class="fa fa-chevron-left"></i></button>
                <button type="button" id="subsubitems_leftAll" class="btn btn-block  btn-danger" data-toggle="tooltip" data-placement="top" title="REMOVER TODOS"><i class="fa fa-backward"></i></button>

                <button type="button" id="subsubitems_nuevo" class="btn btn-info mt-2" data-toggle="tooltip" data-placement="top" title="AGREGAR SUBSUBITEM"><span class="fa fa-plus"></span></button>
                <button type="button" id="subsubitems_editor" class="btn btn-warning mt-2" data-toggle="tooltip" data-placement="top" title="EDITAR SUBSUBITEM"><span class="fa fa-pencil-alt"></span></button>
                <button type="button" id="subsubitems_eliminar" class="btn btn-danger mt-2" data-toggle="tooltip" data-placement="top" title="ELIMINAR SUBSUBITEM"><span class="fa fa-trash"></span></button>
            </div>
            <div class="col-5">
                <select name="to[]" id="subsubitems_to" class="form-control NotSelectize" size="15" multiple="multiple"></select>
            </div>
        </div>     
        <!--FIN SUBSUBITEMS POR ITEM-->
    </div>
</div>
<script type="text/javascript">
    var pnlTablero = $("#pnlTablero"), pnlTableroBody = $("#pnlTablero").find(".card-body");
    var mxu = pnlTableroBody.find("#mxu"), oxmu = pnlTableroBody.find("#oxmu"), ixou = pnlTableroBody.find("#ixou"),
            sixiu = pnlTableroBody.find("#sixiu"), oxmm = $("#oxmm"), ixom = $("#ixom"), ixoo = $("#ixoo");
    ;
    var btnAsignarModulos = pnlTableroBody.find("#btnAsignarModulos"),
            btnAsignarOpcionesxModulos = $("#btnAsignarOpcionesxModulos"),
            btnAsignarItemsXOpcionXModulo = $("#btnAsignarItemsXOpcionXModulo");

    $(document).ready(function () {

        $('#modulos').multiselect();
        $('#opciones').multiselect();
        $('#items').multiselect();

        $('button[id^="modulos"].btn-default').click(function () {
            onBeep(1);
        });

        $('button[id^="modulos"].btn-danger').click(function () {
            onBeep(3);
        });
        /*ITEMS POR OPCIÓN*/

        btnAsignarItemsXOpcionXModulo.click(function () {
            if (ixom.val() && ixou.val() && ixoo.val()) {
                var items = [];
                $.each($("#items_to").find('option'), function (k, v) {
                    items.push({ITEM: $(v).val(), ITEMT: $(v).text()});
                });
                if (items.length > 0) {
                    onEstablecerItems(ixou.val(), ixom.val(), ixoo.val(), items);
                } else {
                    onBeep(2);
                    swal({
                        buttons: ["CANCELAR", "ACEPTAR"],
                        title: 'NO HA SELECCIONADO NINGÚN ITEM ESTO VA A ELIMINAR TODOS LOS ACCESOS A LOS ITEMS POR OPCIÓN, ¿DESEA CONTINUAR?',
                        text: "ESTA ACCIÓN ELIMINARÁ LOS PERMISOS",
                        icon: "warning",
                        closeOnEsc: true,
                        closeOnClickOutside: true
                    }).then((action) => {
                        if (action) { 
                            onEstablecerItems(ixou.val(), ixom.val(), ixoo.val(), items);
                        }
                    });
                }
            } else {
                onBeep(2);
                swal('ATENCIÓN', 'SELECCIONE UN USUARIO', 'warning').then((value) => {
                    ixou[0].selectize.focus();
                    ixou[0].selectize.open();
                });
            }
        });

        ixoo.change(function () {
            $("#items_to").html('');
            getItemsXOpcionXModuloXUsuario();
        });

        ixom.change(function () {
            $("#items").html('');
            $.getJSON('<?php print base_url('accesos_opciones_x_modulo_x_usuario'); ?>', {U: ixou.val(), M: ixom.val()}).done(function (dx) {
                console.log(dx);
                if (dx.length > 0) {
                    ixoo[0].selectize.clear(true);
                    ixoo[0].selectize.clearOptions();
                    $.each(dx, function (k, v) {
                        ixoo[0].selectize.addOption({text: v.Opcion, value: v.ID});
                    });
                    ixoo[0].selectize.focus();
                    ixoo[0].selectize.open();
                } else {
                    onBeep(2);
                    swal('ATENCIÓN', 'ESTE USUARIO NO TIENE OPCIONES EN ESTE MODULO', 'warning');
                }
            }).fail(function (x, y, z) {
                console.log(x.responseText);
            }).always(function () {
            });
        });

        ixou.change(function () {
            $("#items").html('');
            $.getJSON('<?php print base_url('accesos_modulos_x_usuario'); ?>', {U: ixou.val()}).done(function (dx) {
                ixom[0].selectize.clear(true);
                ixom[0].selectize.clearOptions();
                $.each(dx, function (k, v) {
                    ixom[0].selectize.addOption({text: v.Modulo, value: v.ID});
                });
                ixom[0].selectize.focus();
                ixom[0].selectize.open();
            }).fail(function (x, y, z) {
                console.log(x.responseText);
            }).always(function () {
            });
        });
        /* FIN ITEMS POR OPCIÓN*/

        /*OPCIONES POR MODULO*/
        btnAsignarOpcionesxModulos.click(function () {
            if (oxmm.val() && oxmu.val()) {
                var options = [];
                $.each($("#opciones_to").find('option'), function (k, v) {
                    options.push({OPCION: $(v).val(), OPCIONT: $(v).text()});
                });
                if (options.length > 0) {
                    onEstablecerOpciones(oxmu.val(), oxmm.val(), options);
                } else {
                    onBeep(2);
                    swal({
                        buttons: ["CANCELAR", "ACEPTAR"],
                        title: 'NO HA SELECCIONADO NINGÚNA OPCIÓN ESTO VA A ELIMINAR TODOS LOS ACCESOS A LAS OPCIONES, ¿DESEA CONTINUAR?',
                        text: "ESTA ACCIÓN ELIMINARÁ LOS PERMISOS",
                        icon: "warning",
                        closeOnEsc: true,
                        closeOnClickOutside: true
                    }).then((action) => {
                        if (action) {
                            onEstablecerOpciones(oxmu.val(), oxmm.val(), options);
                        }
                    });
                }
            } else {
                onBeep(2);
                swal('ATENCIÓN', 'SELECCIONE UN USUARIO', 'warning').then((value) => {
                    oxmu[0].selectize.focus();
                    oxmu[0].selectize.open();
                });
            }
        });

        oxmm.change(function () {
            $("#opciones_to").html('');
            getOpcionesXModuloXUsuario();
        });

        oxmu.change(function () {
            $("#opciones").html('');
            $.getJSON('<?php print base_url('accesos_modulos_x_usuario'); ?>', {U: oxmu.val()}).done(function (dx) {
                oxmm[0].selectize.clear(true);
                oxmm[0].selectize.clearOptions();
                $.each(dx, function (k, v) {
                    oxmm[0].selectize.addOption({text: v.Modulo, value: v.ID});
                });
                oxmm[0].selectize.focus();
                oxmm[0].selectize.open();
            }).fail(function (x, y, z) {
                console.log(x.responseText);
            }).always(function () {
            });
        });
        /* FIN OPCIONES POR MODULO*/

        /*MODULOS POR USUARIO*/

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

        mxu.change(function () {
            $("#modulos_to").html('');
            getModulosXUsuario();
        });
        /*FIN MODULOS POR USUARIO*/
    });

    /*MODULOS*/
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
    /*FIN MODULOS*/

    /*OPCIONES*/
    function getOpcionesXModuloXUsuario() {
        $.getJSON('<?php print base_url('accesos_opciones_x_modulo_x_usuario') ?>', {U: oxmu.val(), M: oxmm.val()}).done(function (dx) {
            if (dx.length > 0) {
                var opciones_asignadas = [];
                $.each(dx, function (k, v) {
                    $("#opciones_to").append('<option value="' + v.ID + '">' + v.Opcion + '</option>');
                    opciones_asignadas.push(v.ID);
                });
                getOpciones(2, opciones_asignadas, oxmm.val());
            } else {
                onBeep(2);
                $.notify({
                    // options
                    message: 'ESTE USUARIO NO TIENE ASIGNADO NINGÚNA OPCIÓN EN ESTE MODULO'
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
                getOpciones(1, [], oxmm.val());
            }
        }).fail(function (x, y, z) {
            console.log(x.responseText);
        });
    }

    function getOpciones(action, ops, m) {
        var opciones = $("#opciones");
        opciones.html('');
        $.getJSON('<?php print base_url('accesos_opciones') ?>', {M: m}).done(function (dx) {

            switch (action) {
                case 1:
                    $("#opciones_to").html('');
                    $.each(dx, function (k, v) {
                        opciones.append('<option value="' + v.ID + '">' + v.Opcion + '</option>');
                    });
                    break;
                case 2:
                    $.each(dx, function (kk, vv) {
                        if (ops.indexOf(vv.ID) === -1) {
                            opciones.append('<option value="' + vv.ID + '">' + vv.Opcion + '</option>');
                        }
                    });
                    break;
            }
        }).fail(function (x, y, z) {
            console.log(x.responseText);
        });
    }

    function onEstablecerOpciones(usr, mdl, op) {
        var f = new FormData();
        f.append('USR', usr);
        f.append('MDL', mdl);
        f.append('OPTIONS', JSON.stringify(op));
        $.ajax({
            url: '<?php print base_url('accesos_add_opciones_x_modulo_x_usuario'); ?>',
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
    /*FIN OPCIONES*/

    /*ITEMS*/
    function getItemsXOpcionXModuloXUsuario() {
        $.getJSON('<?php print base_url('accesos_items_x_opcion_x_modulo_x_usuario') ?>', {U: ixou.val(), M: ixom.val(), O: ixoo.val()}).done(function (dx) {
            if (dx.length > 0) {
                var items_asignados = [];
                $.each(dx, function (k, v) {
                    $("#items_to").append('<option value="' + v.ID + '">' + v.Item + '</option>');
                    items_asignados.push(v.ID);
                });
                getItems(2, items_asignados, ixom.val(), ixoo.val());
            } else {
                onBeep(2);
                $.notify({
                    // options
                    message: 'ESTE USUARIO NO TIENE ASIGNADO NINGÚNA OPCIÓN EN ESTE MODULO'
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
                getItems(1, [], ixom.val(), ixoo.val());
            }
        }).fail(function (x, y, z) {
            console.log(x.responseText);
        });
    }

    function getItems(action, ops, m, o) {
        var items = $("#items");
        items.html('');
        $.getJSON('<?php print base_url('accesos_items') ?>', {O: o}).done(function (dx) {
            switch (action) {
                case 1:
                    $("#items_to").html('');
                    $.each(dx, function (k, v) {
                        items.append('<option value="' + v.ID + '">' + v.Item + '</option>');
                    });
                    break;
                case 2:
                    $.each(dx, function (kk, vv) {
                        if (ops.indexOf(vv.ID) === -1) {
                            items.append('<option value="' + vv.ID + '">' + vv.Item + '</option>');
                        }
                    });
                    break;
            }
        }).fail(function (x, y, z) {
            console.log(x.responseText);
        });
    }

    function onEstablecerItems(usr, mdl, op, itms) {
        var f = new FormData();
        f.append('USR', usr);
        f.append('MDL', mdl);
        f.append('OPC', op);
        f.append('OPTIONS', JSON.stringify(itms));
        $.ajax({
            url: '<?php print base_url('accesos_add_item_x_opcion_x_modulo_x_usuario'); ?>',
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
    /*FIN ITEMS*/
</script>
<style>
    .btn-default{
        background-color: #8BC34A;
        color: #fff;
    }
</style>