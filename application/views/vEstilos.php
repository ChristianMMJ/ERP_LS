<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-body ">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Estilos</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
            </div>
        </div>
        <div class="card-block mt-4">
            <div id="Estilos" class="table-responsive">
                <table id="tblEstilos" class="table table-sm display " style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Estilo</th>
                            <th>Nombre</th>
                            <th>Linea</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th><input type="text" placeholder="Buscar por Estilo" class="form-control form-control-sm" style="width: 100%;"></th>
                            <th><input type="text" placeholder="Buscar por Nombre" class="form-control form-control-sm" style="width: 100%;"></th>
                            <th><input type="text" placeholder="Buscar por Linea" class="form-control form-control-sm" style="width: 100%;"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card m-3 d-none animated fadeIn" id="pnlDatos">
    <div class="card-body text-dark">
        <form id="frmNuevo">
            <fieldset>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 float-left">
                        <legend>Estilo</legend>
                    </div>
                    <div class="col-12 col-sm-6 col-md-8" align="right">
                        <button type="button" class="btn btn-primary btn-sm" id="btnCancelar" >
                            <span class="fa fa-arrow-left" ></span> REGRESAR
                        </button>
                        <!--                        <button type="button" class="btn btn-danger btn-sm d-none" id="btnEliminar">
                                                    <span class="fa fa-trash fa-1x"></span> ELIMINAR
                                                </button>-->
                    </div>
                </div>
                <hr>

                <div class="row">
                    <!--DATOS DEL ESTILO-->
                    <div class="col-12 col-md-8 col-lg-8">
                        <!--PRIMER RENGLON-->
                        <div class="row">
                            <div class="d-none">
                                <input type="text"  name="ID" class="form-control form-control-sm" >
                            </div>
                            <div class="col-12 mt-2">
                                <legend class="badge badge-info"> INFORMACIÓN GENERAL DEL ESTILO</legend>
                            </div>
                            <div class="col-6 col-sm-2 col-md-2 col-lg-4 col-xl-3">
                                <label for="Clave" >Clave*</label>
                                <input type="text" class="form-control form-control-sm" id="Clave" name="Clave" required >
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <label for="Descripcion" >Descripción*</label>
                                <input type="text" id="Descripcion" name="Descripcion" class="form-control form-control-sm" required>
                            </div>
                            <div class="col-6  col-sm-2 col-md-2 col-lg-2 col-xl-3">
                                <label for="" >F. Alta</label>
                                <input type="text" id="FechaAlta" name="FechaAlta" class="form-control form-control-sm date notEnter required" required="" >
                            </div>
                            <div class="col-6  col-sm-2 col-md-2 col-lg-2 col-xl-3" id="dFechaBaja">
                                <label for="" >F. Baja</label>
                                <input type="text" id="FechaBaja" name="FechaBaja" class="form-control form-control-sm date notEnter" >
                            </div>
                        </div>
                        <!--SEGUNDO RENGLON-->
                        <div class="row">
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="" >Linea*</label>
                                <select id="Linea" name="Linea" class="form-control form-control-sm required" >
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="" >Horma*</label>
                                <select id="Horma" name="Horma" class="form-control form-control-sm required" >
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="" >Genero*</label>
                                <select id="Genero" name="Genero" class="form-control form-control-sm required" >
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <!--TERCER RENGLON-->
                        <div class="row">
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="" >Dificultad</label>
                                <select id="GdoDif" name="GdoDif" class="form-control form-control-sm" >
                                    <option value=""></option>
                                    <option value="1">1 NORMAL</option>
                                    <option value="2">2 DIFÍCIL</option>
                                    <option value="3">3 EXTREMO</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="Serie">Serie*</label>
                                <select class="form-control form-control-sm required" id="Serie" name="Serie" required="">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="" >Corrida</label>
                                <select id="Corrida" name="Corrida" class="form-control form-control-sm" >
                                    <option value=""></option>
                                    <option value="1">1-17/21 &frac12; Nn </option>
                                    <option value="2">2-22/27 Dn</option>
                                    <option value="3">3-25/31 Hn</option>
                                    <option value="4">4-17/21 &frac12; Ne</option>
                                    <option value="5">5-5/11 De</option>
                                    <option value="6">6-6/13 He</option>
                                </select>
                            </div>
                        </div>
                        <!--CUARTO RENGLON-->
                        <div class="row">
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="ConsumoPiel">C. Piel</label>
                                <input type="text" maxlength="3" class="form-control form-control-sm numbersOnly" placeholder="" id="ConsumoPiel" name="ConsumoPiel">
                            </div>
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="ConsumoForro">C. Forro</label>
                                <input type="text" maxlength="3" class="form-control form-control-sm numbersOnly" placeholder="" id="ConsumoForro" name="ConsumoForro">
                            </div>
                        </div>
                        <!--QUINTO RENGLON-->
                        <div class="row">
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="Maquila">Maquila*</label>
                                <select class="form-control form-control-sm required" id="Maquila" name="Maquila" required="">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="Liberado">Liberado Para:</label>
                                <select class="form-control form-control-sm" id="Liberado"  name="Liberado">
                                    <option value=""></option>
                                    <option value="1">1 DISEÑO</option>
                                    <option value="2">2 PRODUCCIÓN</option>
                                    <option value="3">3 CANCELADO</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="Costos">Costos*</label>
                                <select class="form-control form-control-sm required"  id="Costos" name="Costos">
                                    <option value=""></option>
                                    <option value="0">0 SI</option>
                                    <option value="1">1 NO</option>
                                </select>
                            </div>
                        </div>
                        <!--SEXTO RENGLON-->
                        <div class="row">
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="Herramental">Herramental</label>
                                <select class="form-control form-control-sm" id="Herramental"  name="Herramental">
                                    <option value=""></option>
                                    <option value="1">1 PATRÓN BASE</option>
                                    <option value="2">2 CARTÓN Y TESEO</option>
                                    <option value="3">3 TESEO</option>
                                    <option value="4">4 SUAJE</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="Observaciones" > <span class="badge badge-warning">(Observaciones que irán en la orden de producción)</span></label>
                                <input type="text" id="Observaciones" name="Observaciones" class="form-control form-control-sm">
                            </div>
                            <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                <label for="Ano" >Año*</label>
                                <input type="text" id="Ano" onchange="yearValidation(this.value, event, this)"
                                       name="Ano" maxlength="4" class="form-control form-control-sm numbersOnly" placeholder="" >
                            </div>
                        </div>
                        <!--SEPTIMO RENGLON-->
                        <div class="row">
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="PuntoCentra">Punto Central</label>
                                <input type="text" class="form-control form-control-sm numbersOnly" maxlength="4" id="PuntoCentral" name="PuntoCentral">
                            </div>
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="" >Temporada*</label>
                                <select id="Temporada" name="Temporada" class="form-control form-control-sm required" >
                                    <option value=""></option>
                                </select>
                            </div>

                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="EstatusEstilo">Estatus del Estilo*</label>
                                <select class="form-control form-control-sm required" id="EstatusEstilo"  name="EstatusEstilo" required="">
                                    <option value=""></option>
                                    <option value="0">0 PRODUCCIÓN</option>
                                    <option value="1">1 PROTOTIPO</option>
                                    <option value="2">2 MUESTRA</option>
                                    <option value="3">3 EXTENCIÓN</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="TipoConstruccion">Tipo Construcción</label>
                                <select class="form-control form-control-sm"  id="TipoConstruccion" name="TipoConstruccion">
                                    <option value=""></option>
                                    <option value="1">1 OPANCA</option>
                                    <option value="2">2 PEGADO</option>
                                    <option value="3">3 OPANCA Y PEGADO</option>
                                </select>
                            </div>
                        </div>
                        <!--OCTAVO RENGLON-->
                        <div class="row">
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="Observaciones" ><span class="badge badge-warning">Maquila o Plantilla</span> 1 </label>
                                <select class="form-control form-control-sm" id="MaqPlant1"  name="MaqPlant1">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="">2</label>
                                <select class="form-control form-control-sm" id="MaqPlant2"  name="MaqPlant2">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="">3</label>
                                <select class="form-control form-control-sm" id="MaqPlant3"  name="MaqPlant3">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3">
                                <label for="">4</label>
                                <select class="form-control form-control-sm"  id="MaqPlant4" name="MaqPlant4">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <!--NOVENO RENGLON-->
                        <div class="row">
                            <div class="col-12 mt-2">
                                <legend class="badge badge-danger"> INFORMACIÓN PARA COSTOS DE MANO DE OBRA</legend>
                            </div>

                            <div class="col-6 col-md-2 col-sm-2">
                                <label for="">Pzas Corte</label>
                                <input type="text" maxlength="4" class="form-control form-control-sm numbersOnly" placeholder="PIEZAS CORTE" id="PiezasCorte" name="PiezasCorte">
                            </div>
                            <div class="col-6 col-md-2 col-sm-2">
                                <label for="">Glp Corte P.</label>
                                <input type="text" maxlength="4" class="form-control form-control-sm numbersOnly" placeholder="GOLPES CORTE PIEL"  name="GolpesCortePiel">
                            </div>
                            <div class="col-6 col-md-2 col-sm-2">
                                <label for="">Glp Corte F.</label>
                                <input type="text" maxlength="4" class="form-control form-control-sm numbersOnly" placeholder="GOLPES CORTE FORRO"  name="GolpesCorteForro">
                            </div>
                            <div class="col-6 col-md-2 col-sm-2">
                                <label for="">Cm. Pesp.</label>
                                <input type="text" maxlength="4" class="form-control form-control-sm numbersOnly" placeholder="CM PESPUNTE"  name="CmPespunte">
                            </div>
                            <div class="col-6 col-md-2 col-sm-2">
                                <label for="">Cm. Reb.</label>
                                <input type="text" maxlength="4" class="form-control form-control-sm numbersOnly" placeholder="CM REBAJADO"  name="CmRebajado">
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-6 col-md-6 ">
                                <h6 class="text-danger">Los campos con * son obligatorios</h6>
                            </div>
                            <button type="button" class="btn btn-info btn-lg btn-float" id="btnGuardar" data-toggle="tooltip" data-placement="left" title="Guardar">
                                <i class="fa fa-save"></i>
                            </button>
                            <!--                    <div class="col-6 col-sm-6 col-md-6" align="right">
                                                    <button type="button" class="btn btn-raised btn-info btn-sm" id="btnGuardar">
                                                        <span class="fa fa-save "></span> GUARDAR
                                                    </button>
                                                </div>-->
                        </div>
                    </div>

                    <!--FOTO-->
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="row">
                            <div class="col-12 my-2">
                                <legend class="badge badge-success"> FOTOGRAFÍA</legend>
                            </div>
                            <div class="col-12" align='center'>
                                <input type="file" id="Foto" name="Foto" class="d-none">
                                <button type="button" class="btn btn-info btn-sm" id="btnArchivo" name="btnArchivo">
                                    <span class="fa fa-upload fa-1x"></span> SELECCIONA EL ARCHIVO
                                </button>
                                <br><hr>
                                <div id="VistaPrevia" align="center">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
</div>
<script>
    var master_url = base_url + 'index.php/Estilos/';
    var tblEstilos = $('#tblEstilos');
    var Estilos;
    var btnNuevo = $("#btnNuevo"), btnCancelar = $("#btnCancelar"), btnEliminar = $("#btnEliminar"), btnGuardar = $("#btnGuardar");
    var pnlTablero = $("#pnlTablero"), pnlDatos = $("#pnlDatos");
    var nuevo = false;
    var Archivo = $("#Foto");
    var btnArchivo = $("#btnArchivo");
    var VistaPrevia = $("#VistaPrevia");
    var foto;


    $(document).ready(function () {
        /*FUNCIONES INICIALES*/
        init();
        handleEnter();

        validacionSelectPorContenedor(pnlDatos);
        setFocusSelectToSelectOnChange('#Linea', '#Horma', pnlDatos);
        setFocusSelectToSelectOnChange('#Horma', '#Genero', pnlDatos);
        setFocusSelectToSelectOnChange('#Genero', '#GdoDif', pnlDatos);
        setFocusSelectToSelectOnChange('#GdoDif', '#Serie', pnlDatos);
        setFocusSelectToSelectOnChange('#Serie', '#Corrida', pnlDatos);
        setFocusSelectToInputOnChange('#Corrida', '#ConsumoPiel', pnlDatos);
        setFocusSelectToSelectOnChange('#Maquila', '#Liberado', pnlDatos);
        setFocusSelectToSelectOnChange('#Liberado', '#Costos', pnlDatos);
        setFocusSelectToSelectOnChange('#Costos', '#Herramental', pnlDatos);
        setFocusSelectToInputOnChange('#Herramental', '#Observaciones', pnlDatos);
        setFocusSelectToSelectOnChange('#PuntoCentral', '#EstatusEstilo', pnlDatos);
        setFocusSelectToSelectOnChange('#EstatusEstilo', '#TipoConstruccion', pnlDatos);
        setFocusSelectToSelectOnChange('#TipoConstruccion', '#MaqPlant1', pnlDatos);
        setFocusSelectToSelectOnChange('#MaqPlant1', '#MaqPlant2', pnlDatos);
        setFocusSelectToSelectOnChange('#MaqPlant2', '#MaqPlant3', pnlDatos);
        setFocusSelectToSelectOnChange('#MaqPlant3', '#MaqPlant4', pnlDatos);
        setFocusSelectToInputOnChange('#MaqPlant4', '#PiezasCorte', pnlDatos);


        pnlDatos.find("#Clave").focusout(function () {
            if (nuevo) {
                onComprobarClave(this);
            }
        });

        pnlDatos.find("#Ano").change(function () {
            if (($(this).val()) < 2016 || ($(this).val()) > 2025) {

                swal({
                    title: "ATENCIÓN",
                    text: "AÑO INCORRECTO",
                    icon: "warning",
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    buttons: false,
                    timer: 1000
                }).then((action) => {
                    pnlDatos.find("#Ano").val("");
                    pnlDatos.find("#Ano").focus();
                });
            }
        });

        btnArchivo.on("click", function () {
            $('#Foto').attr("type", "file");
            $('#Foto').val('');
            Archivo.change(function () {
                HoldOn.open({theme: "sk-bounce", message: "POR FAVOR ESPERE..."});
                var imageType = /image.*/;
                if (Archivo[0].files[0] !== undefined && Archivo[0].files[0].type.match(imageType)) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var preview = '<button type="button" class="btn btn-danger btn-sm" id="btnQuitarVP" name="btnQuitarVP" onclick="onRemovePreview(this)"><span class="fa fa-times fa-2x danger-icon"></span></button><br><img src="' + reader.result + '" class="img-thumbnail img-fluid rounded mx-auto"><div class="caption"><p>' + Archivo[0].files[0].name + '</p></div>';
                        VistaPrevia.html(preview);
                    };
                    reader.readAsDataURL(Archivo[0].files[0]);
                    foto = true;
                } else {
                    if (Archivo[0].files[0] !== undefined && Archivo[0].files[0].type.match('application/pdf')) {

                        var readerpdf = new FileReader();
                        readerpdf.onload = function (e) {
                            VistaPrevia.html('<div><button type="button" class="btn btn-danger btn-sm" id="btnQuitarVP" name="btnQuitarVP" onclick="onRemovePreview(this)"><span class="fa fa-times fa-2x danger-icon"></span></button><br> <embed src="' + readerpdf.result + '" type="application/pdf" width="90%" height="800px"' +
                                    ' pluginspage="http://www.adobe.com/products/acrobat/readstep2.html"></div>');
                        };
                        readerpdf.readAsDataURL(Archivo[0].files[0]);
                    } else {
                        VistaPrevia.html('EL ARCHIVO SE SUBIRÁ, PERO NO ES POSIBLE RECONOCER SI ES UN PDF O UNA IMAGEN');
                    }
                }
                HoldOn.close();
            });
            Archivo.trigger('click');
        });

        /*FUNCIONES X BOTON*/
        btnGuardar.click(function () {

            if (foto) {
                isValid('pnlDatos');
                if (valido) {
                    var frm = new FormData(pnlDatos.find("#frmNuevo")[0]);
                    if (!nuevo) {
                        $.ajax({
                            url: master_url + 'onModificar',
                            type: "POST",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: frm
                        }).done(function (data, x, jq) {
                            swal('ATENCIÓN', 'SE HA MODIFICADO EL REGISTRO', 'info');
                            Estilos.ajax.reload();
                            pnlDatos.addClass("d-none");
                            pnlTablero.removeClass("d-none");
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    } else {

                        $.ajax({
                            url: master_url + 'onAgregar',
                            type: "POST",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: frm
                        }).done(function (data, x, jq) {
                            pnlDatos.find("[name='ID']").val(data);
                            nuevo = false;
                            Estilos.ajax.reload();
                            pnlDatos.addClass("d-none");
                            pnlTablero.removeClass("d-none");
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    }
                } else {
                    swal('ATENCIÓN', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'error');
                }
            } else {
                swal({
                    title: "ATENCIÓN",
                    text: "DEBE DE SELECCIONAR UNA FOTOFRAFÍA PARA EL ESTILO ",
                    icon: "warning",
                    closeOnClickOutside: false,
                    closeOnEsc: false
                }).then((action) => {
                    btnArchivo.focus();
                });
            }

        });

        btnEliminar.click(function () {
            swal({
                title: "¿Estas seguro?",
                text: "Nota: No se eliminara ninguna unidad que tenga alguna relacion con otro dato dentro del sistema",
                icon: "warning",
                buttons: {
                    cancelar: {
                        text: "Cancelar",
                        value: "cancelar"
                    },
                    eliminar: {
                        text: "Aceptar",
                        value: "eliminar"
                    }
                }
            }).then((value) => {
                switch (value) {
                    case "eliminar":
                        $.post(master_url + 'onEliminar', {ID: temp}).done(function () {
                            swal('ATENCIÓN', 'SE HA ELIMINADO EL REGISTRO', 'success');
                            Estilos.ajax.reload();
                            pnlDatos.addClass("d-none");
                            pnlTablero.removeClass("d-none");
                        }).fail(function (x, y, z) {
                            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
                            console.log(x.responseText);
                        });
                        break;
                    case "cancelar":
                        swal.close();
                        break;
                }
            });
        });

        btnNuevo.click(function () {
            nuevo = true;
            pnlDatos.find("input").val("");
            VistaPrevia.html(' <img src="' + base_url + 'img/camera.png" class="img-thumbnail img-fluid rounded mx-auto " >');
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass("d-none");
            btnEliminar.addClass("d-none");
            pnlDatos.find("[name='Clave']").focus();
            pnlDatos.find("[name='Fechaalta']").focus();
            pnlDatos.find("[name='Clave']").removeClass('disabledForms');
            pnlDatos.find('#FechaAlta').val(getToday());
            pnlDatos.find('#dFechaBaja').addClass('d-none');
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            foto = false;

        });

        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass("d-none");
        });
    });

    function init() {
        getRecords();
        getTemporadas();
        getGeneros();
        getHormas();
        getSeries();
        getMaqPlantillas();
        getMaquilas();
        getLineas();
    }

    function getRecords() {
        temp = 0;
        HoldOn.open({
            theme: 'sk-cube',
            message: 'CARGANDO...'
        });
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblEstilos')) {
            tblEstilos.DataTable().destroy();
        }
        Estilos = tblEstilos.DataTable({
            "dom": 'Bfrtip',
            buttons: buttons,
            "ajax": {
                "url": master_url + 'getRecords',
                "dataSrc": ""
            },
            "columns": [
                {"data": "ID"}, {"data": "Clave"}, {"data": "Descripcion"}, {"data": "Linea"}
            ],
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                }
            ],
            language: lang,
            select: true,
            "autoWidth": true,
            "colReorder": true,
            "displayLength": 20,
            "scrollX": true,
            "bLengthChange": false,
            "deferRender": true,
            "scrollCollapse": false,
            "bSort": true,
            "aaSorting": [
                [0, 'desc']/*ID*/
            ],
            initComplete: function (x, y) {
                HoldOn.close();
            }
        });

        $('#tblEstilos_filter input[type=search]').focus();

        tblEstilos.find('tbody').on('click', 'tr', function () {
            HoldOn.open({
                theme: 'sk-cube',
                message: 'CARGANDO...'
            });
            nuevo = false;
            tblEstilos.find("tbody tr").removeClass("success");
            $(this).addClass("success");
            var dtm = Estilos.row(this).data();
            temp = parseInt(dtm.ID);
            $.getJSON(master_url + 'getEstiloByID', {ID: temp}).done(function (data) {
                var dtm = data[0];
                pnlDatos.find("input").val("");
                $.each(pnlDatos.find("select"), function (k, v) {
                    pnlDatos.find("select")[k].selectize.clear(true);
                });
                $.each(data[0], function (k, v) {
                    if (k !== 'Foto') {
                        pnlDatos.find("[name='" + k + "']").val(v);
                        if (pnlDatos.find("[name='" + k + "']").is('select')) {
                            pnlDatos.find("[name='" + k + "']")[0].selectize.addItem(v, true);
                        }
                    }
                });
                if (dtm.Foto !== null && dtm.Foto !== undefined && dtm.Foto !== '') {
                    var ext = getExt(dtm.Foto);
                    foto = true;

                    if (ext === "gif" || ext === "jpg" || ext === "png" || ext === "jpeg") {
                        pnlDatos.find("#VistaPrevia").html('<button type="button" class="btn btn-danger btn-sm" id="btnQuitarVP" name="btnQuitarVP" onclick="onRemovePreview(this)"><span class="fa fa-times fa-2x danger-icon"></span></button><br><img id="trtImagen" src="' + base_url + dtm.Foto + '" class ="img-thumbnail img-fluid rounded mx-auto"  onclick="printImg(\' ' + base_url + dtm.Foto + ' \')"  />');
                    }
                    if (ext === "PDF" || ext === "Pdf" || ext === "pdf") {
                        pnlDatos.find("#VistaPrevia").html('<div class="col-md-8"></div> <button type="button" class="btn btn-danger btn-sm" id="btnQuitarVP" name="btnQuitarVP" onclick="onRemovePreview(this)"><span class="fa fa-times fa-2x danger-icon"></span></button><br><embed src="' + base_url + dtm.Foto + '" type="application/pdf" width="90%" height="800px" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">');
                    }
                    if (ext !== "gif" && ext !== "jpg" && ext !== "jpeg" && ext !== "png" && ext !== "PDF" && ext !== "Pdf" && ext !== "pdf") {
                        //pnlDatos.find("#VistaPrevia").html('<h1>NO EXISTE ARCHIVO ADJUNTO</h1>');
                        VistaPrevia.html(' <img src="img/camera.png" class="img-thumbnail img-fluid rounded mx-auto " >');
                    }
                } else {
                    //pnlDatos.find("#VistaPrevia").html('<h3>NO EXISTE ARCHIVO ADJUNTO</h3>');
                    VistaPrevia.html(' <img src="img/camera.png" class="img-thumbnail img-fluid rounded mx-auto " >');
                }
                pnlTablero.addClass("d-none");
                pnlDatos.removeClass('d-none');
                btnEliminar.removeClass("d-none");
                pnlDatos.find("#Clave").addClass('disabledForms');
                pnlDatos.find("#Descripcion").focus().select();
                pnlDatos.find('#dFechaBaja').removeClass('d-none');


            }).fail(function (x, y, z) {
                swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');

            }).always(function () {
                HoldOn.close();
            });
        });

        Estilos.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that.search(this.value).draw();
                }
            });
        });



    }
    function getTemporadas() {
        $.ajax({
            url: master_url + 'getTemporadas',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Temporada']")[0].selectize.addOption({text: v.Temporada, value: v.Clave});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }
    function getSeries() {
        $.ajax({
            url: master_url + 'getSeries',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Serie']")[0].selectize.addOption({text: v.Serie, value: v.Clave});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }
    function getHormas() {
        $.ajax({
            url: master_url + 'getHormas',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Horma']")[0].selectize.addOption({text: v.Horma, value: v.Clave});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }
    function getGeneros() {
        $.ajax({
            url: master_url + 'getGeneros',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Genero']")[0].selectize.addOption({text: v.Genero, value: v.Clave});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }
    function getLineas() {

        $.ajax({
            url: master_url + 'getLineas',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Linea']")[0].selectize.addOption({text: v.Linea, value: v.Clave});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }
    function getMaquilas() {
        $.ajax({
            url: master_url + 'getMaquilas',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Maquila']")[0].selectize.addOption({text: v.Maquila, value: v.Clave});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }
    function getMaqPlantillas() {
        $.ajax({
            url: master_url + 'getMaqPlantillas',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='MaqPlant1']")[0].selectize.addOption({text: v.MaquilasPlantillas, value: v.Clave});
                pnlDatos.find("[name='MaqPlant2']")[0].selectize.addOption({text: v.MaquilasPlantillas, value: v.Clave});
                pnlDatos.find("[name='MaqPlant3']")[0].selectize.addOption({text: v.MaquilasPlantillas, value: v.Clave});
                pnlDatos.find("[name='MaqPlant4']")[0].selectize.addOption({text: v.MaquilasPlantillas, value: v.Clave});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }
    function onRemovePreview(e) {
        $(e).parent("#VistaPrevia").html("");
        Archivo.attr("type", "text");
        Archivo.val('N');
        foto = false;
    }
    function printImg(url) {
        var win = window.open('');
        win.document.write('<img src="' + url + '" onload="window.print();window.close()" />');
        win.focus();
    }
    function onComprobarClave(e) {
        if (nuevo) {
            $.getJSON(master_url + 'onComprobarClave', {Clave: $(e).val()}).done(function (data) {

                if (data.length > 0) {
                    swal({
                        title: "ATENCIÓN",
                        text: "LA CLAVE " + pnlDatos.find("#Clave").val() + " YA EXISTE",
                        icon: "warning",
                        buttons: {
                            cancelar: {
                                text: "Cancelar",
                                value: "cancelar"
                            },
                            eliminar: {
                                text: "Aceptar",
                                value: "aceptar"
                            }
                        }
                    }).then((value) => {
                        switch (value) {
                            case "aceptar":
                                pnlDatos.find("#Clave").val('').focus();
                                break;
                            case "cancelar":
                                swal.close();
                                pnlDatos.find("#Clave").val('').focus();
                                break;
                        }
                    });
                }
            }).fail(function (x, y, z) {
                swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
                console.log(x.responseText);
            });
        }
    }

</script>