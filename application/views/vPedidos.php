<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-body ">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Pedidos</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar">
                    <span class="fa fa-plus"></span><br>
                </button>
            </div>
        </div>
        <div class="card-block mt-4">
            <div id="Pedidos" class="table-responsive">
                <table id="tblPedidos" class="table table-sm display " style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Clave</th> 
                            <th>Cliente</th> 
                            <th>Fecha de entrega</th> 
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="d-none animated fadeIn text-dark" id="pnlDatos">
    <form id="frmNuevo">
        <fieldset>
            <!--PRIMER CONTENEDOR-->
            <div class="card  m-3 ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 float-left">
                            <legend >Pedido</legend>
                        </div>
                        <div class="col-12 col-sm-6 col-md-8" align="right">
                            <button type="button" class="btn btn-primary btn-sm" id="btnCancelar" >
                                <span class="fa fa-arrow-left" ></span> REGRESAR
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="d-none">
                            <input type="text" id="ID" name="ID" class="form-control form-control-sm" >
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                            <label for="Pedido" >Pedido*</label>
                            <input type="text" class="form-control form-control-sm numbersOnly" id="Clave" required placeholder="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-3">
                            <label for="Cliente" >Cliente*</label> 
                            <select class="form-control form-control-sm" id="Cliente" name="Cliente" required placeholder="">
                            </select>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-3">
                            <label for="Agente" >Agente*</label>
                            <select class="form-control form-control-sm" id="Agente" name="Agente" required placeholder="">
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                            <label for="FechaPedido" >Fecha Pedido*</label>
                            <input type="text" id="FechaPedido" name="FechaPedido" class="form-control form-control-sm date notEnter" >
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                            <label for="FechaRecepcion" >Fecha Recepción*</label>
                            <input type="text" id="FechaRecepcion" name="FechaRecepcion" class="form-control form-control-sm date notEnter" >
                        </div>
                    </div>  
                </div>
            </div>
            <!--SEGUNDO CONTENEDOR-->
            <div class="card  m-3 ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                            <label for="Estilo" >Estilo*</label>
                            <select class="form-control form-control-sm" id="Estilo" name="Estilo" required placeholder="">
                            </select>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                            <label for="Color" >Color*</label>
                            <select class="form-control form-control-sm" id="Color" name="Color" required placeholder="">
                            </select>
                            <div id="spin" class="d-none" align="center"><span class="fa fa-cog fa-spin fa-2x"></span></div>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                            <label for="FechaEntrega" >Fecha Entrega*</label>
                            <input type="text" id="FechaEntrega" name="FechaEntrega" class="form-control form-control-sm date notEnter" >
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                            <label for="Recibido" >Recibido*</label>
                            <select class="form-control form-control-sm" id="Recibido" name="Recibido" required placeholder="">
                                <option></option>
                                <option value="1">1 - Agente</option>
                                <option value="3">3 - Tel</option>
                                <option value="4">4 - Per</option>
                                <option value="5">5 - Int</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                            <label for="Maquila" >Maquila*</label>
                            <select class="form-control form-control-sm"  type="text" id="Maquila" name="Maquila">
                            </select>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                            <label for="Semana" >Semana*</label>
                            <input type="text" id="Semana" name="Semana" class="form-control form-control-sm" placeholder="No ha especificado una fecha de entrega">
                        </div>
                        <!--BREAK-->
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                            <label for="Recio" >Recio*</label>
                            <input type="text" id="Recio" name="Recio" class="form-control form-control-sm" >
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                            <label for="Recio" >Produccion maquila/semana*</label>
                            <input type="text" id="ProduccionMaquilaSemana" name="ProduccionMaquilaSemana" class="form-control form-control-sm" placeholder="0" >
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                            <label for="Precio" >Precio*</label>
                            <input type="text" id="Precio" name="Precio" class="form-control form-control-sm numbersOnly" >
                            <input type="text" id="Serie" class="form-control form-control-sm d-none" readonly="" >
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label for="Observaciones" >Observaciones*</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" id="Observacion" name="Observacion" class="form-control form-control-sm" placeholder="Titulo">
                                </div>
                                <div class="col-6">
                                    <input type="text" id="ObservacionDetalle" name="ObservacionDetalle" class="form-control form-control-sm" placeholder="Descripción">
                                </div>
                            </div>
                        </div>
                        <!--TALLAS-->
                        <div class="col-12">
                            <div class="table-responsive" style="overflow-x:auto; white-space: nowrap;">
                                <label class="font-weight-bold" for="Tallas">Tallas</label>
                                <table id="tblTallas" class="Tallas" >
                                    <thead></thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            for ($index = 1; $index < 23; $index++) {
                                                print '<td><input type="text" style="width: 45px;" maxlength="4" class="numbersOnly" name="T' . $index . '" disabled></td>';
                                            }
                                            ?>
                                            <td class="font-weight-bold">Pares</td>
                                        </tr>
                                        <tr>
                                            <?php
                                            for ($index = 1; $index < 23; $index++) {
                                                print '<td><input type="text" style="width: 45px;" maxlength="4" class="form-control form-control-sm numbersOnly" name="C' . $index . '" onfocus="onCalcularPares(this);" on change="onCalcularPares(this);" keyup="onCalcularPares(this);" onfocusout="onCalcularPares(this);"></td>';
                                            }
                                            ?>
                                            <td><input type="text" style="width: 55px;" maxlength="4" class="form-control form-control-sm numbersOnly animated bounceIn font-weight-bold" disabled=""  id="TPares"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                            <h6 class="text-danger">Los campos con * son obligatorios</h6>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6" align="right">
                            <button type="button" class="btn btn-info btn-lg btn-float animated slideInUp" disabled="" id="btnGuardar" data-toggle="tooltip" data-placement="left" title="Guardar">
                                <i class="fa fa-save"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--FIN SEGUNDO CONTENEDOR-->
            <!--DETALLE-->
            <!--SEGUNDO CONTENEDOR-->
            <div class="card  m-3 ">
                <div class="card-body">
                    <div class="row">
                        <table id="tblPedidoDetalle" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th><!--0-->
                                    <th scope="col">Recibido</th><!--1-->
                                    <th scope="col">EstiloID</th><!--2-->
                                    <th scope="col">Estilo</th><!--3-->
                                    <th scope="col">ColorID</th><!--4-->
                                    <th scope="col">Color</th><!--5-->
                                    <th scope="col">Semana</th><!--6-->
                                    <th scope="col">Maquila</th><!--7-->

                                    <th scope="col"></th><!--8-->
                                    <th scope="col"></th>
                                    <th scope="col"></th><!--5-->
                                    <th scope="col"></th>
                                    <th scope="col"></th><!--12-->

                                    <th scope="col"></th><!--13-->
                                    <th scope="col"></th>
                                    <th scope="col"></th><!--5-->
                                    <th scope="col"></th>
                                    <th scope="col"></th><!--17-->

                                    <th scope="col"></th><!--18-->
                                    <th scope="col"></th>
                                    <th scope="col"></th><!--5-->
                                    <th scope="col"></th>
                                    <th scope="col"></th><!--22-->

                                    <th scope="col"></th><!--23-->
                                    <th scope="col"></th>
                                    <th scope="col"></th><!--5-->
                                    <th scope="col"></th>
                                    <th scope="col"></th><!--27-->

                                    <th scope="col"></th><!--28-->
                                    <th scope="col"></th><!--29-->

                                    <th scope="col">Precio</th><!--30-->
                                    <th scope="col">Pares</th><!--31-->
                                    <th scope="col">Fecha de entrega</th><!--32-->
                                    <th scope="col">Eliminar</th><!--33-->
                                    <!--OUT-->
                                    <th scope="col">Recio</th><!--34-->
                                    <th scope="col">Titulo Observaciones</th><!--35-->
                                    <th scope="col">Observaciones</th><!--36-->
                                    <th scope="col">Serie</th><!--37-->
                                    <th scope="col">Estatus Registro</th><!--38-->
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<script>
    var master_url = base_url + 'index.php/Pedidos/';
    var tblPedidos = $('#tblPedidos');
    var Pedidos;
    var btnNuevo = $("#btnNuevo"), btnCancelar = $("#btnCancelar"), btnEliminar = $("#btnEliminar"), btnGuardar = $("#btnGuardar");
    var pnlTablero = $("#pnlTablero"), pnlDatos = $("#pnlDatos"), pnlDatosDetalle = $("#pnlDatosDetalle");
    var PedidoDetalle, tblPedidoDetalle = pnlDatos.find("#tblPedidoDetalle");
    var nuevo = false;
    var _animate_ = {enter: 'animated fadeInLeft', exit: 'animated fadeOutDown'}, _placement_ = {from: "bottom", align: "left"};

    $(document).ready(function () {
        init();
        handleEnter();

        var d = new Date("03/12/2018");
        var n = d.getFullYear();
        console.log("AÑO ", n);

        pnlDatos.find("#frmNuevo").change(function () {
            isValid('pnlDatos');
            if (tblPedidoDetalle.find("tbody tr").length > 0) {
                if (valido) {
                    btnGuardar.prop("disabled", false);
                } else {
                    btnGuardar.prop("disabled", true);
                }
            }
        });

        pnlDatos.find("input[id='Estilo-selectized']").blur(function () {
            onNextFocus('Estilo', 'Color');
        });

        pnlDatos.find("#Precio").focusout(function () {

        });

        pnlDatos.find("[name*='T']").change(function () {
            console.log("T: ", $(this).val());
        });

        pnlDatos.find("#FechaEntrega").focusout(function () {
            //OBTENER AGENTE POR CLIENTE
            $.getJSON(master_url + 'getSemanaXFechaDeEntrega', {Fecha: $(this).val()}).done(function (data) {
                if (data.length > 0) {
                    pnlDatos.find("#Semana").val(data[0].Semana);
                }
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            });
        });

        btnGuardar.click(function () {
            isValid('pnlDatos');
            if (valido) {
                var f = new FormData();
                f.append('Clave', pnlDatos.find("#Clave").val());
                f.append('Cliente', pnlDatos.find("#Cliente").val());
                f.append('Agente', pnlDatos.find("#Agente").val());
                f.append('FechaPedido', pnlDatos.find("#FechaPedido").val());
                f.append('FechaRecepcion', pnlDatos.find("#FechaRecepcion").val());
                if (!nuevo) {
                    var detalle = [];
                    $.each(tblPedidoDetalle.find("tbody tr"), function (k, v) {
                        var tr = PedidoDetalle.row($(this)).data();
                        console.log(tr);
                        if (tr[38] === 'N') {
                            var d = new Date(tr[32]);
                            var n = d.getFullYear();
                            detalle.push({
                                Estilo: tr[2],
                                Color: tr[4],
                                FechaEntrega: tr[32],
                                Maquila: tr[6],
                                Semana: tr[7],
                                Recio: tr[34],
                                Precio: tr[30],
                                Observacion: tr[35],
                                ObservacionDetalle: tr[36],
                                Serie: tr[37],
                                Control: 0,
                                Ano: n,
                                C1: $(tr[8]).find("div.cantidad").text(),
                                C2: $(tr[9]).find("div.cantidad").text(),
                                C3: $(tr[10]).find("div.cantidad").text(),
                                C4: $(tr[11]).find("div.cantidad").text(),
                                C5: $(tr[12]).find("div.cantidad").text(),
                                C6: $(tr[13]).find("div.cantidad").text(),
                                C7: $(tr[14]).find("div.cantidad").text(),
                                C8: $(tr[15]).find("div.cantidad").text(),
                                C9: $(tr[16]).find("div.cantidad").text(),
                                C10: $(tr[17]).find("div.cantidad").text(),
                                C11: $(tr[18]).find("div.cantidad").text(),
                                C12: $(tr[19]).find("div.cantidad").text(),
                                C13: $(tr[20]).find("div.cantidad").text(),
                                C14: $(tr[21]).find("div.cantidad").text(),
                                C15: $(tr[22]).find("div.cantidad").text(),
                                C16: $(tr[23]).find("div.cantidad").text(),
                                C17: $(tr[24]).find("div.cantidad").text(),
                                C18: $(tr[25]).find("div.cantidad").text(),
                                C19: $(tr[26]).find("div.cantidad").text(),
                                C20: $(tr[27]).find("div.cantidad").text(),
                                C21: $(tr[28]).find("div.cantidad").text(),
                                C22: $(tr[29]).find("div.cantidad").text()
                            });
                        }
                    });
                    onSave('onModificar', f, function () {
                        swal('ATENCIÓN', 'SE HA MODIFICADO EL REGISTRO', 'info');
                        nuevo = false;
                        Pedidos.ajax.reload();
                    });
                } else {
                    var detalle = [];
                    $.each(tblPedidoDetalle.find("tbody tr"), function (k, v) {
                        var tr = PedidoDetalle.row($(this)).data(); 
                        var d = new Date(tr[32]);
                        var n = d.getFullYear();
                        detalle.push({
                            Estilo: tr[2],
                            Color: tr[4],
                            FechaEntrega: tr[32],
                            Maquila: tr[6],
                            Semana: tr[7],
                            Recio: tr[34],
                            Precio: tr[30],
                            Observacion: tr[35],
                            ObservacionDetalle: tr[36],
                            Serie: tr[37],
                            Control: 0,
                            Ano: n,
                            C1: $(tr[8]).find("div.cantidad").text(),
                            C2: $(tr[9]).find("div.cantidad").text(),
                            C3: $(tr[10]).find("div.cantidad").text(),
                            C4: $(tr[11]).find("div.cantidad").text(),
                            C5: $(tr[12]).find("div.cantidad").text(),
                            C6: $(tr[13]).find("div.cantidad").text(),
                            C7: $(tr[14]).find("div.cantidad").text(),
                            C8: $(tr[15]).find("div.cantidad").text(),
                            C9: $(tr[16]).find("div.cantidad").text(),
                            C10: $(tr[17]).find("div.cantidad").text(),
                            C11: $(tr[18]).find("div.cantidad").text(),
                            C12: $(tr[19]).find("div.cantidad").text(),
                            C13: $(tr[20]).find("div.cantidad").text(),
                            C14: $(tr[21]).find("div.cantidad").text(),
                            C15: $(tr[22]).find("div.cantidad").text(),
                            C16: $(tr[23]).find("div.cantidad").text(),
                            C17: $(tr[24]).find("div.cantidad").text(),
                            C18: $(tr[25]).find("div.cantidad").text(),
                            C19: $(tr[26]).find("div.cantidad").text(),
                            C20: $(tr[27]).find("div.cantidad").text(),
                            C21: $(tr[28]).find("div.cantidad").text(),
                            C22: $(tr[29]).find("div.cantidad").text()
                        });
                    });
                    f.append('Detalle', JSON.stringify(detalle));
                    onSave('onAgregar', f, function () {
                        nuevo = true;
                        Pedidos.ajax.reload();
                    });
                }
            } else {
                swal('ATENCIÓN', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'error');
            }
        });

        btnNuevo.click(function () {
            nuevo = true;
            pnlDatos.find("input,textarea").val("");
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass("d-none");
            pnlDatos.find("#Clave").focus();
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            PedidoDetalle.clear().draw();
            getID();
        });

        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass("d-none");
            PedidoDetalle.clear().draw();
        });

        pnlDatos.find("#Cliente").change(function () {
            if ($(this).val() !== '') {
                //OBTENER AGENTE POR CLIENTE
                $.getJSON(master_url + 'getAgenteXCliente', {Cliente: $(this).val()}).done(function (data) {
                    if (data.length > 0) {
                        pnlDatos.find("#Agente")[0].selectize.clear(true);
                        pnlDatos.find("#Agente")[0].selectize.setValue(data[0].Agente);
                        pnlDatos.find("#Agente")[0].selectize.focus();
                    }
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                });
            } else {
                pnlDatos.find("#Agente")[0].selectize.clear(true);
            }
        });

        pnlDatos.find("#Estilo").change(function () {
            var estilo = $(this).val();
            if (estilo !== '') {
                pnlDatos.find("#spin").removeClass("d-none");
                pnlDatos.find("#Color").addClass("d-none");
                pnlDatos.find("#Color")[0].selectize.clear(true);
                //OBTENER COLORES POR ESTILO
                $.getJSON(master_url + 'getColoresXEstilo', {Estilo: $(this).val()}).done(function (data) {
                    $.each(data, function (k, v) {
                        pnlDatos.find("#Color")[0].selectize.addOption({text: v.Color, value: v.Clave});
                    });
                    pnlDatos.find("#spin").addClass("d-none");
                    pnlDatos.find("#Color").removeClass("d-none");
                    pnlDatos.find("#Color")[0].selectize.open();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                });
                //OBTENER MAQUILA/SERIE      
                $.getJSON(master_url + 'getMaquilaSerieXEstilo', {Estilo: $(this).val()}).done(function (data) {
                    if (data.length > 0) {
                        var dtm = data[0];
                        pnlDatos.find("#Serie").val(data[0].Serie);
                        pnlDatos.find("#Maquila")[0].selectize.clear(true);
                        pnlDatos.find("#Maquila")[0].selectize.setValue(data[0].Maquila);
                        //SET TALLAS
                        var indice = 0;
                        $.each(data[0], function (k, v) {
                            if (parseInt(v) > 0) {
//                                pnlDatos.find("[name='C" + indice + "']").prop('disabled',false); 
                                pnlDatos.find("[name='" + k + "']").val(v);
                            } else {
//                                pnlDatos.find("[name='C" + indice + "']").prop('disabled',true);
                                pnlDatos.find("[name='C" + indice + "']").val('');
                            }
                            indice += 1;
                        });
                        //MOSTRAR FOTO
                        console.log(data[0].Foto);
                        //MOSTRAR FOTO
                        console.log(data[0].Foto);
                        if (dtm.Foto !== null && dtm.Foto !== undefined && dtm.Foto !== '') {
                            var ext = getExt(dtm.Foto);
                            if (ext === "gif" || ext === "jpg" || ext === "png" || ext === "jpeg") {
                                $.notify({
                                    // options
                                    icon: base_url + dtm.Foto
                                }, {
                                    // settings
                                    placement: _placement_,
                                    animate: _animate_,
                                    icon_type: 'img',
                                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                                            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                                            '<img  data-notify="icon" class="col-12 img-circle pull-left">' +
                                            '</div>'
                                });
                            }
                            if (ext !== "gif" && ext !== "jpg" && ext !== "jpeg" && ext !== "png" && ext !== "PDF" && ext !== "Pdf" && ext !== "pdf") {
                                $.notify({
                                    // options
                                    icon: base_url + dtm.Foto
                                }, {
                                    // settings
                                    placement: _placement_,
                                    animate: _animate_,
                                    icon_type: 'img',
                                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                                            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                                            '<img  data-notify="icon" class="col-12 img-circle pull-left">' +
                                            '</div>'
                                });
                            }
                        } else {
                            $.notify({
                                // options
                                icon: base_url + dtm.Foto
                            }, {
                                // settings
                                placement: _placement_,
                                animate: _animate_,
                                icon_type: 'img',
                                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                                        '<img  data-notify="icon" class="col-12 img-circle pull-left">' +
                                        '</div>'
                            });
                        }
                    }
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                });
            } else {
                pnlDatos.find("#Color")[0].selectize.clear(true);
                pnlDatos.find("#Maquila")[0].selectize.clear(true);
                pnlDatos.find("[name*='T']").val('');
                pnlDatos.find("[name*='C']").val('');
            }
        }).focusout(function () {
            console.log('Estilo; ', $(this).val());
        });
    });


    function init() {
        getRecords();
        getOptions("getClientes", "Cliente", "Clave", "Cliente"); //Clientes
        getOptions("getAgentes", "Agente", "Clave", "Agente"); //Agentes
        getOptions("getEstilos", "Estilo", "Clave", "Estilo"); //Estilos
        getOptions("getMaquilas", "Maquila", "Clave", "Maquila"); //Maquilas
    }

    function getRecords() {
        temp = 0;
        HoldOn.open({
            theme: 'sk-cube',
            message: 'CARGANDO...'
        });
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblPedidos')) {
            tblPedidos.DataTable().destroy();
        }
        Pedidos = tblPedidos.DataTable({
            "dom": 'Bfrtip',
            buttons: buttons,
            "ajax": {
                "url": master_url + 'getRecords',
                "dataSrc": ""
            },
            "columns": [
                {"data": "ID"}, {"data": "Clave"}, {"data": "Cliente"}, {"data": "FechaPedido"}
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
            pageResize: true,
            "aaSorting": [
                [1, 'ASC']
            ],
            initComplete: function (x, y) {
                HoldOn.close();
            }
        });
        $('#tblPedidos_filter input[type=search]').focus();
        tblPedidos.find('tbody').on('click', 'tr', function () {
            HoldOn.open({
                theme: 'sk-cube',
                message: 'CARGANDO...'
            });
            nuevo = false;
            tblPedidos.find("tbody tr").removeClass("success");
            $(this).addClass("success");
            var dtm = Pedidos.row(this).data();
            temp = parseInt(dtm.ID);
            $.getJSON(master_url + 'getPedidosByID', {ID: temp}).done(function (data) {
                pnlDatos.find("input").val("");
                $.each(pnlDatos.find("select"), function (k, v) {
                    pnlDatos.find("select")[k].selectize.clear(true);
                });
                $.each(data[0], function (k, v) {
                    pnlDatos.find("[name='" + k + "']").val(v);
                    if (pnlDatos.find("[name='" + k + "']").is('select')) {
                        pnlDatos.find("[name='" + k + "']")[0].selectize.setValue(v);
                    }
                });
                pnlTablero.addClass("d-none");
                pnlDatos.removeClass('d-none');
                pnlDatos.find("#Descripcion").focus().select();
            }).fail(function (x, y, z) {
                swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            }).always(function () {
                HoldOn.close();
            });
        });
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblPedidoDetalle')) {
            tblPedidoDetalle.DataTable().destroy();
        }
        PedidoDetalle = tblPedidoDetalle.DataTable({
            "dom": 'rtip',
            buttons: buttons,
            "columnDefs": [
                //ID
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                },
                //RECIBIDO
                {
                    "targets": [1],
                    "visible": false,
                    "searchable": false
                },
                //ESTILO ID
                {
                    "targets": [2],
                    "visible": false,
                    "searchable": false
                },
                //COLOR ID
                {
                    "targets": [4],
                    "visible": false,
                    "searchable": false
                },
                //RECIO
                {
                    "targets": [34],
                    "visible": false,
                    "searchable": false
                },
                //TITULO OBSERVACIONES
                {
                    "targets": [35],
                    "visible": false,
                    "searchable": false
                },
                //TITULO OBSERVACIONES
                {
                    "targets": [36],
                    "visible": false,
                    "searchable": false
                },
                //SERIE
                {
                    "targets": [37],
                    "visible": false,
                    "searchable": false
                },
                //ESTATUS REGISTRO
                {
                    "targets": [38],
                    "visible": false,
                    "searchable": false
                }
            ],
            language: lang,
            select: true,
            "autoWidth": true,
            "colReorder": true,
            "displayLength": 50,
            "scrollX": true,
            "scrollY": 300,
            "bLengthChange": false,
            "deferRender": true,
            "scrollCollapse": false,
            "bSort": true,
            "aaSorting": [
                [1, 'ASC']
            ],
            "createdRow": function (row, data, index) {
                $(row).find("td").slice(4, 26).addClass("zoom");
            },
            initComplete: function (x, y) {
                HoldOn.close();
            }
        });
    }

    function getOptions(url, comp, key, field) {
        $.getJSON(master_url + url).done(function (data) {
            $.each(data, function (k, v) {
                pnlDatos.find("#" + comp)[0].selectize.addOption({text: v[field], value: v[key]});
            });
        }).fail(function (x, y, z) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
            console.log(x.responseText);
        });
    }

    function onSave(u, f, fu) {
        $.ajax({
            url: master_url + u,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: f
        }).done(function (data, x, jq) {
            console.log(data);
            fu();
        }).fail(function (x, y, z) {
            console.log(x.responseText, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getID() {
        $.getJSON(master_url + 'getID').done(function (data, x, jq) {
            if (data.length > 0) {
                var ID = $.isNumeric(data[0].CLAVE) ? parseInt(data[0].CLAVE) + 1 : 1;
                pnlDatos.find("#Clave").val(ID);
            } else {
                pnlDatos.find("#Clave").val('1');
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    var added = false;
    function onCalcularPares(e) {
        var Estilo = pnlDatos.find("#Estilo");
        var Color = pnlDatos.find("#Color");
        var Semana = pnlDatos.find("#Semana");
        var Maquila = pnlDatos.find("#Maquila");
        var Precio = pnlDatos.find("#Precio");
        var FechaDeEntrega = pnlDatos.find("#FechaEntrega");
        var Recio = pnlDatos.find("#Recio");
        var Titulo = pnlDatos.find("#Observacion");
        var Observaciones = pnlDatos.find("#ObservacionDetalle");
        var tp = 0;
        $.each(pnlDatos.find("#tblTallas input[name*='C']"), function (k, v) {
            tp += (parseInt($(v).val()) > 0) ? parseInt($(v).val()) : 0;
        });
        pnlDatos.find("#TPares").addClass('animated bounceOut faster').one('animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd', function () {
            $(this).removeClass('animated bounceOut faster');
            $(this).addClass('animated bounceIn faster');
            pnlDatos.find("#TPares").val(tp);
        });
        var encabezados = pnlDatos.find("#tblTallas tbody tr:eq(0)");
        var input = $(e);
        var padre = input.parent().index();
        var indice_valor = encabezados.find("td").eq(padre).find("input").val();
        //VALIDACIONES
        if (Estilo.val() !== '' && Color.val() !== '' && Semana.val() !== '' && Maquila.val() !== '' && parseInt(pnlDatos.find("#TPares").val()) > 0
                && Estilo.text() !== '') {
            if (indice_valor === '') {
                if (tp > 0) {
                    //REVISAR SI ESE ESTILO/COLOR NO HA SIDO AGREGADO CON ANTERIORIDAD
                    onRevisarRegistro(Estilo.val(), Color.val());
                    if (!added) {
                        //AÑADIR FILA 
                        var tal = '<div class="row"><div class="col-12 text-danger text-nowrap talla" align="center">';
                        var cnt = '</div><div class="col-12 cantidad" align="center">';
                        PedidoDetalle.row.add([
                            0, //ID 
                            pnlDatos.find("#Recibido").val(), //Recibido 
                            Estilo.val(), //EstiloID
                            '<p class="text-nowrap">' + Estilo.text() + '</p>', //Estilo
                            Color.val(), //ColorID
                            Color.text(),
                            Semana.val(),
                            Maquila.val(),
                            tal + getTalla('T1') + cnt + getCantidad('C1') + '</div></div>',
                            tal + getTalla('T2') + cnt + getCantidad('C2') + '</div></div>',
                            tal + getTalla('T3') + cnt + getCantidad('C3') + '</div></div>',
                            tal + getTalla('T4') + cnt + getCantidad('C4') + '</div></div>',
                            tal + getTalla('T5') + cnt + getCantidad('C5') + '</div></div>',
                            tal + getTalla('T6') + cnt + getCantidad('C6') + '</div></div>',
                            tal + getTalla('T7') + cnt + getCantidad('C7') + '</div></div>',
                            tal + getTalla('T8') + cnt + getCantidad('C8') + '</div></div>',
                            tal + getTalla('T9') + cnt + getCantidad('C9') + '</div></div>',
                            tal + getTalla('T10') + cnt + getCantidad('C10') + '</div></div>',
                            tal + getTalla('T11') + cnt + getCantidad('C11') + '</div></div>',
                            tal + getTalla('T12') + cnt + getCantidad('C12') + '</div></div>',
                            tal + getTalla('T13') + cnt + getCantidad('C13') + '</div></div>',
                            tal + getTalla('T14') + cnt + getCantidad('C14') + '</div></div>',
                            tal + getTalla('T15') + cnt + getCantidad('C15') + '</div></div>',
                            tal + getTalla('T16') + cnt + getCantidad('C16') + '</div></div>',
                            tal + getTalla('T17') + cnt + getCantidad('C17') + '</div></div>',
                            tal + getTalla('T18') + cnt + getCantidad('C18') + '</div></div>',
                            tal + getTalla('T19') + cnt + getCantidad('C19') + '</div></div>',
                            tal + getTalla('T20') + cnt + getCantidad('C20') + '</div></div>',
                            tal + getTalla('T21') + cnt + getCantidad('C21') + '</div></div>',
                            tal + getTalla('T22') + cnt + getCantidad('C22') + '</div></div>',
                            Precio.val(),
                            tp,
                            FechaDeEntrega.val(),
                            '<button type="button" class="btn btn-danger" onclick="onEliminar(this)"><span class="fa fa-trash"></span></button>',
                            Recio.val(),
                            Titulo.val(),
                            Observaciones.val(),
                            pnlDatos.find("#Serie").val(),
                            'N']).draw(false);
                        tp = 0;
                        pnlDatos.find("#TPares").val(0);
                        pnlDatos.find("[name*='C']").val('');
                        Estilo[0].selectize.clear(true);
                        Estilo[0].selectize.focus();
                        Estilo[0].selectize.open();
                    } else {
                        swal('ATENCIÓN', 'ESTA COMBINACION DE ESTILO/COLOR YA HA SIDO AGREGADA', 'warning');
                    }
                } else {

                }
            }
        }
//FIN VALIDACIONES
    }

    function onEliminar(r)
    {
        PedidoDetalle.row($(r).parents('tr')).remove().draw();
    }

    function getTalla(e) {
        return parseInt(pnlDatos.find("#tblTallas tbody tr:eq(0)").find("[name='" + e + "']").val()) !== '' ? pnlDatos.find("#tblTallas tbody tr:eq(0)").find("[name='" + e + "']").val() : '';
    }

    function getCantidad(e) {
        return parseInt(pnlDatos.find("#tblTallas tbody tr:eq(1)").find("[name='" + e + "']").val()) > 0 ? pnlDatos.find("#tblTallas tbody tr:eq(1)").find("[name='" + e + "']").val() : 0;
    }

    function onNextFocus(main_component, next_component) {
        if (pnlDatos.find("#" + main_component).val() === '') {
            pnlDatos.find("#" + main_component)[0].selectize.focus();
        } else {
            if (next_component !== '') {
                pnlDatos.find("#" + next_component)[0].selectize.focus();
            }
        }
    }

    function onRevisarRegistro(estilo, color) {
        added = false;
        if (PedidoDetalle.rows().count() > 0) {
            $.each(tblPedidoDetalle.find("tbody tr"), function () {
                console.log($(this));
                var tr = PedidoDetalle.row($(this)).data();
                if (tr[2] === estilo && tr[4] === color) {
                    added = true;
                    return false;
                }
            });
        } else {
            added = false;
        }
    }
</script>
<style>
    #tblPedidoDetalle table tbody{
        height: 300px !important;
    }
    table tbody tr:hover {
        font-weight: bold; 
        color:#000 !important;
        background-color: transparent;
    } 
    #tblPedidoDetalle tbody td{
        font-weight: bold; 
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
        left: 20px;
        top: -5px; 
    } 

    #tblPedidoDetalle tr:hover td{
        color:#000;
        background-color: #fff;
    }

    #tblPedidoDetalle td:hover{ 
    }
    /* width */
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey; 
        border-radius: 1px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #666666; 
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #666666; 
    }

    .zoom{
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }
    .zoom:hover{ 
        transform-origin: 100% 0;
        width:40%;
        height:100%;
        float:left;
        z-index:4;
        position:relative;
        -webkit-transform: scale(1.75);
        transform: scale(1.75);
        top:-10px;
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23)!important;
    }
</style>