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
                            <th>Agente</th> 
                            <th>Pares</th> 
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
                        <div class="col-12 col-sm-3 col-md-8" align="right">
                            <button type="button" class="btn btn-info btn-sm d-none" id="btnImprimir" >
                                <span class="fa fa-print" ></span> IMPRIMIR
                            </button> 
                            <button type="button" class="btn btn-primary btn-sm" id="btnCancelar" >
                                <span class="fa fa-arrow-left" ></span> REGRESAR
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="d-none">
                            <input type="text" id="ID" name="ID" class="form-control form-control-sm d-none" readonly="" >
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1">
                            <label for="Pedido" >Pedido*</label>
                            <input type="text" class="form-control form-control-sm numbersOnly" id="Clave" required="" placeholder="">
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-4">
                            <label for="Cliente" >Cliente*</label> 
                            <select class="form-control form-control-sm" id="Cliente" name="Cliente" required="" placeholder="">
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                            <label for="Agente" >Agente*</label>
                            <select class="form-control form-control-sm" id="Agente" name="Agente" required="" placeholder="">
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-1">
                            <label for="FechaPedido" >Fecha Pedido*</label>
                            <input type="text" id="FechaPedido" name="FechaPedido" class="form-control form-control-sm date notEnter" required="">
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-1">
                            <label for="FechaEntrega" >Fecha Entrega*</label>
                            <input type="text" id="FechaEntrega" name="FechaEntrega" class="form-control form-control-sm date notEnter">
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-1">
                            <label for="FechaRecepcion" >Fecha Recepción*</label>
                            <input type="text" id="FechaRecepcion" name="FechaRecepcion" class="form-control form-control-sm date notEnter" required="">
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-1">
                            <label for="Recibido" >Recibido*</label>
                            <select class="form-control form-control-sm" id="Recibido" name="Recibido" required placeholder="">
                                <option></option>
                                <option value="1">1 - Agente</option>
                                <option value="3">3 - Tel</option>
                                <option value="4">4 - Per</option>
                                <option value="5">5 - Int</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-1 mt-4">
                            <button type="button" class="btn btn-info " id="AgregaObservaciones" name="AgregaObservaciones" data-toggle="tooltip" data-placement="top" title="Agregar observaciones">
                                <i class="fa fa-eye"></i> Obs.
                                </span>
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
                            <label for="Maquila" >Maquila*</label>
                            <select class="form-control form-control-sm"  type="text" id="Maquila" name="Maquila">
                            </select>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                            <label for="Semana" >Semana*</label>
                            <input type="text" id="Semana" name="Semana" class="form-control form-control-sm" placeholder="No ha especificado una fecha de entrega">
                        </div>
                        <!--BREAK-->
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-1">
                            <label for="Recio" >Recio*</label>
                            <input type="text" id="Recio" name="Recio" class="form-control form-control-sm" maxlength="5">
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-1">
                            <label for="ProduccionMaquilaSemana" >Prod. Maq/Sem*</label>
                            <input type="text" id="ProduccionMaquilaSemana" name="ProduccionMaquilaSemana" class="form-control form-control-sm" placeholder="0" disabled="">
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                            <label for="Precio" >Precio*</label>
                            <div class="input-group">
                                <input type="text" id="Precio" name="Precio" class="form-control form-control-sm numbersOnly" maxlength="8" readonly="">
                                <span class="input-group-prepend">
                                    <span class="input-group-text text-dark " id="AgregaObservaciones" name="AgregaObservaciones" data-toggle="tooltip" data-placement="top" title="Agregar observaciones">
                                        <i class="fa fa-eye"></i>
                                    </span>
                                </span>
                            </div>
                            <input type="text" id="Serie" class="form-control form-control-sm d-none" readonly="" >
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 d-none">
                            <label for="Observaciones" >Observaciones*</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" id="Observacion" name="Observacion" class="form-control form-control-sm" placeholder="Titulo" maxlength="99">
                                </div>
                                <div class="col-6">
                                    <input type="text" id="ObservacionDetalle" name="ObservacionDetalle" class="form-control form-control-sm" placeholder="Descripción" maxlength="99">
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
                            <button type="button" class="btn btn-info btn-lg btn-float animated slideInUp d-none" disabled="" id="btnGuardar" data-toggle="tooltip" data-placement="left" title="Guardar">
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
                        <table id="tblPedidoDetalle" class="table table-hover display">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th><!--0-->
                                    <th scope="col">Recibido</th><!--1-->
                                    <th scope="col">Estilo</th><!--2-->
                                    <th scope="col">EstiloT</th><!--3-->
                                    <th scope="col">Color</th><!--4-->
                                    <th scope="col">ColorT</th><!--5-->
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
                                    <th scope="col">F. Ent</th><!--32-->
                                    <th scope="col">Eliminar</th><!--33-->
                                    <!--OUT-->
                                    <th scope="col">Recio</th><!--34-->
                                    <th scope="col">Titulo Observaciones</th><!--35-->
                                    <th scope="col">Observaciones</th><!--36-->
                                    <th scope="col">Serie</th><!--37-->
                                    <th scope="col">Estatus Registro</th><!--38-->
                                    <th scope="col">Importe</th><!--39-->
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table> 
                    </div>
                    <div class="row mt-3">
                        <div class="col-8 font-weight-bold" align="right">Pares</div> 
                        <div id="ParesTotales" class="col-1 font-weight-bold zoom"></div>
                        <div class="col-1 font-weight-bold">Total</div>
                        <div id="Total" class="col-1 font-weight-bold zoom"></div>
                        <div class="col-1 font-weight-bold "></div>
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
    var btnNuevo = $("#btnNuevo"), btnCancelar = $("#btnCancelar"), btnEliminar = $("#btnEliminar"), btnGuardar = $("#btnGuardar"), btnImprimir = $("#btnImprimir");
    var pnlTablero = $("#pnlTablero"), pnlDatos = $("#pnlDatos"), pnlDatosDetalle = $("#pnlDatosDetalle");
    var PedidoDetalle, tblPedidoDetalle = pnlDatos.find("#tblPedidoDetalle");
    var nuevo = false;
    var _animate_ = {enter: 'animated fadeInLeft', exit: 'animated fadeOutDown'}, _placement_ = {from: "bottom", align: "left"};
    var Cliente = '';

    $(document).ready(function () {
        init();
        handleEnter();

        pnlDatos.find("#AgregaObservaciones").click(function () {
            onAgregarObservaciones();
        });

        $.each(pnlDatos.find("select"), function () {
            verificarValorSelect('#' + $(this).attr('id'), pnlDatos);
        });

        btnImprimir.click(function () {
            if (temp > 0) {
                //HoldOn.open({  message: 'Espere...', theme: 'sk-cube'});
                $.post(master_url + 'onImprimirPedido', {ID: temp}).done(function (data) {
                    console.log(data);

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
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            } else {
                swal('ATENCIÓN', 'NO HA SIDO POSIBLE MOSTRAR EL PEDIDO PARA SU IMPRESIÓN', 'warning');
            }
        });

        pnlDatos.find("#Precio").focusout(function () {
            var Precio = pnlDatos.find("#Precio").val();
            if (Precio.length <= 0) {
                swal({
                    title: "ATENCIÓN",
                    text: "Debe de establecer un precio",
                    icon: "warning",
                    focusConfirm: true,
                    closeOnClickOutside: false,
                    closeOnEsc: false
                }).then((value) => {
                    pnlDatos.find("#Precio").val('');
                    pnlDatos.find("#Precio").focus();
                });
            }
        });

        pnlDatos.find("[name*='T']").change(function () {
            console.log("T: ", $(this).val());
        });

        pnlDatos.find("#FechaEntrega").focusout(function () {
            //OBTENER ANOS DE ENTREGA
            $.getJSON(master_url + 'getAnosValidos').done(function (data) {
                console.log('DTA: ', data);
                var anos = data[0];
                var fecha_valida = false;
                var fe = pnlDatos.find("#FechaEntrega").val();
                if (fe !== '') {
                    $.each(data, function (k, v) {
                        console.log(k, ',', v);
                        if (fe.includes(v.Anos)) {
                            fecha_valida = true;
                            return false;
                        }
                    });
                    if (!fecha_valida) {
                        swal({
                            title: "ATENCIÓN",
                            text: "NO EXISTEN SEMANAS DE PRODUCCIÓN PARA ESTA FECHA ",
                            icon: "warning",
                            closeOnClickOutside: false,
                            closeOnEsc: false,
                            buttons: false,
                            timer: 1200
                        }).then((value) => {
                            pnlDatos.find("#FechaEntrega").val('');
                            pnlDatos.find("#Semana").val('');
                            pnlDatos.find("#FechaEntrega").focus();
                        });
                    }
                }
            }).fail(function (x, y, z) {
                console.log(x.responseText);
            }).always(function () {

            });
            //OBTENER AGENTE POR CLIENTE
            $.getJSON(master_url + 'getSemanaXFechaDeEntrega', {Fecha: $(this).val()}).done(function (data) {
                if (data.length > 0) {
                    pnlDatos.find("#Semana").val(data[0].Semana);
                    getProduccionMaquilaSemana(pnlDatos.find("#Maquila").val(), data[0].Semana);
                }
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
            });
        });

        btnGuardar.click(function () {
            isValid('pnlDatos');
            if (valido) {
                var f = new FormData();
                f.append('Clave', pnlDatos.find("#Clave").val());
                f.append('Cliente', Cliente);
                f.append('Agente', pnlDatos.find("#Agente").val());
                f.append('FechaPedido', pnlDatos.find("#FechaPedido").val());
                f.append('Observacion', pnlDatos.find("#Observacion").val());
                f.append('FechaRecepcion', pnlDatos.find("#FechaRecepcion").val());
                if (!nuevo) {
                    var detalle = [];
                    $.each(tblPedidoDetalle.find("tbody tr"), function (k, v) {
                        var tr = PedidoDetalle.row($(this)).data();
                        if (tr[38] === 'N') {
                            var d = new Date(tr[32]);
                            var n = d.getFullYear();
                            detalle.push({
                                Estilo: tr[2],
                                EstiloT: tr[3],
                                Color: tr[4],
                                ColorT: tr[5],
                                FechaEntrega: tr[32],
                                Maquila: tr[7],
                                Semana: tr[6],
                                Recio: tr[34],
                                Precio: tr[30],
                                Observacion: tr[35],
                                ObservacionDetalle: tr[36],
                                Serie: tr[37],
                                Control: 0,
                                Ano: n,
                                Recibido: tr[1],
                                Pares: tr[31],
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
                    f.append('Detalle', JSON.stringify(detalle));
                    f.append('ID', pnlDatos.find("#ID").val());
                    onSave('onModificar', f, function (e) {
                        swal({
                            title: "ATENCIÓN",
                            text: "SE HA MODIFICADO EL REGISTRO",
                            icon: "success",
                            closeOnClickOutside: false,
                            closeOnEsc: false,
                            buttons: false,
                            timer: 1200
                        });
                        nuevo = false;
                        Pedidos.ajax.reload();
                        getPedidoByID(pnlDatos.find("#ID").val());
//                        $.each(tblPedidoDetalle.find("tbody tr"), function (k, v) {
//                            PedidoDetalle.cell($(this), 38).data('N').draw();
//                        }); 
                    });
                } else {
                    var detalle = [];
                    $.each(tblPedidoDetalle.find("tbody tr"), function (k, v) {
                        var tr = PedidoDetalle.row($(this)).data();
                        var d = new Date(tr[32]);
                        var n = d.getFullYear();
                        detalle.push({
                            Estilo: tr[2],
                            EstiloT: tr[3],
                            Color: tr[4],
                            ColorT: tr[5],
                            FechaEntrega: tr[32],
                            Maquila: tr[7],
                            Semana: tr[6],
                            Recio: tr[34],
                            Precio: tr[30],
                            Observacion: tr[35],
                            ObservacionDetalle: tr[36],
                            Serie: tr[37],
                            Control: 0,
                            Ano: n,
                            Recibido: tr[1],
                            Pares: tr[31],
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
                    onSave('onAgregar', f, function (e) {
                        console.log('onAgregar: ', e);
                        nuevo = false;
                        var dtm = JSON.parse(e);
                        getPedidoByID(dtm.ID);
                        temp = dtm.ID;
//                        $.each(tblPedidoDetalle.find("tbody tr"), function (k, v) {
//                            PedidoDetalle.cell($(this), 38).data('N').draw();
//                        });
                        Pedidos.ajax.reload();
                        //NUEVO > MODIFICAR
                        pnlDatos.find("#Clave").prop('readonly', true);
                        pnlDatos.find("#FechaPedido").prop('readonly', true);
                        pnlDatos.find("#FechaRecepcion").prop('readonly', true);
                        pnlDatos.find("#FechaEntrega").prop('readonly', true);
                        pnlDatos.find("#Cliente")[0].selectize.disable();
                        pnlDatos.find("#Agente")[0].selectize.disable();
                    });
                }
            } else {
                swal('ATENCIÓN', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'error');
            }
        });

        btnNuevo.click(function () {
            nuevo = true;
            pnlDatos.find("#FechaEntrega").prop('readonly', false);
            pnlDatos.find("#Semana").prop('readonly', false);
            pnlDatos.find("#Recibido")[0].selectize.enable();
            pnlDatos.find("#Precio").prop('readonly', true);
            pnlDatos.find("#Clave").prop('readonly', false);
            pnlDatos.find("#Cliente")[0].selectize.enable();
            pnlDatos.find("#Agente")[0].selectize.enable();
            pnlDatos.find("#FechaPedido").prop('readonly', false);
            pnlDatos.find("#FechaRecepcion").prop('readonly', false);
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
            btnGuardar.prop("disabled", true);
            pnlDatos.find("#Cliente")[0].selectize.enable();
            pnlDatos.find("#Agente")[0].selectize.enable();
            pnlDatos.find("#FechaEntrega").prop('readonly', true);
            pnlDatos.find("#Semana").prop('readonly', true);
            pnlDatos.find("#Recibido")[0].selectize.disable();
            pnlDatos.find("#Clave").prop('readonly', true);
            pnlDatos.find("#FechaPedido").prop('readonly', true);
            pnlDatos.find("#FechaRecepcion").prop('readonly', true);
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass("d-none");
            btnImprimir.addClass("d-none");
            PedidoDetalle.clear().draw();
            Pedidos.ajax.reload();
            Cliente = 0;
        });

        pnlDatos.find("#Cliente").change(function () {
            if ($(this).val() !== '' && nuevo) {
                //OBTENER AGENTE POR CLIENTE
                Cliente = pnlDatos.find("#Cliente").val();
                console.log('this:', $(this).val(), ',', Cliente);
                $.getJSON(master_url + 'getAgenteXCliente', {Cliente: Cliente}).done(function (data) {
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

        pnlDatos.find("#Color").change(function () {
            var color = $(this).val();
            if (color !== '') {
                pnlDatos.find("#Precio").prop('readonly', false);
            } else {
                pnlDatos.find("#Precio").prop('readonly', true);
            }
        });

        pnlDatos.find("#Estilo").change(function () {
            var estilo = $(this).val();
            if (estilo !== '') {
                pnlDatos.find("#spin").removeClass("d-none");
                pnlDatos.find("#Color").addClass("d-none");
                pnlDatos.find("#Color")[0].selectize.clear(true);
                pnlDatos.find("#Color")[0].selectize.clearOptions();
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
                {"data": "ID"}, {"data": "Clave"}, {"data": "Cliente"}, {"data": "Agente"}, {"data": "Pares"}, {"data": "FechaPedido"}
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
            "scrollX": false,
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
            getPedidoByID(temp);
        });
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblPedidoDetalle')) {
            tblPedidoDetalle.DataTable().destroy();
        }
        PedidoDetalle = tblPedidoDetalle.DataTable({
            "dom": 'rt',
            buttons: buttons,
            "ajax": {
                "url": master_url + 'getPedidosByID',
                "dataSrc": "",
                "data": {
                    "ID": temp
                }
            },
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
                    "targets": [3],
                    "visible": false,
                    "searchable": false
                },
                //COLOR ID
                {
                    "targets": [5],
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
                },
                //IMPORTE
                {
                    "targets": [39],
                    "visible": false,
                    "searchable": false
                }
            ],
            language: lang,
            "autoWidth": true,
            "colReorder": true,
            "displayLength": 50,
            "scrollY": 500,
            "scrollX": true,
            "bLengthChange": false,
            "deferRender": true,
            "bSort": true,

            "createdRow": function (row, data, index) {
                console.log(index,', Row', row);
                console.log('Row data',data[3]/*Estilo*/, data[5]/*Color*/,);
                $.each($(row).find("td"), function (k, v) {
                    var c = $(v);
                    var index = parseInt(k);
                    switch (index) {
                        case 0:
                            /*ESTILO*/
                            c.not(".Serie").attr('title', data[35]);
                            c.addClass('Estilo');
                            break;
                        case 1:
                            /*COLOR*/
                            c.not(".Serie").attr('title', data[36]);
                            c.addClass('Color');
                            break;
                        case 2:
                            /*SEMANA*/
                            c.addClass('Semana');
                        case 3:
                            /*Maquila*/
                            c.addClass('Maquila');
                            break;
                    }
                });
                $(row).find("td").slice(4, 26).addClass("zoom");
            },
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api();//Get access to Datatable API
                // Update footer
                var pares = api.column(31).data().reduce(function (a, b) {
                    var ax = 0, bx = 0;
                    ax = $.isNumeric(a) ? parseFloat(a) : 0;
                    bx = $.isNumeric(b) ? parseFloat(b) : 0;
                    return  (ax + bx);
                }, 0);
                var total = api.column(39).data().reduce(function (a, b) {
                    var ax = 0, bx = 0;
                    ax = $.isNumeric(a) ? parseFloat(a) : 0;
                    bx = $.isNumeric(b) ? parseFloat(b) : 0;
                    return  (ax + bx);
                }, 0);
                $("#ParesTotales").html("<span class='text-warning'>" + pares + "</span>");
                $("#Total").html("<span class='text-info'>$" + $.number(total, 3, '.', ',') + "</span>");
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
            console.log('onSave: ', data);
            fu(data);
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

    var added = false, agregado = 0;
    function onCalcularPares(e) {
        pnlDatos.find("#Recibido")[0].selectize.enable();
        var Estilo = pnlDatos.find("#Estilo");
        var Color = pnlDatos.find("#Color");
        var Semana = pnlDatos.find("#Semana");
        var Maquila = pnlDatos.find("#Maquila");
        var Precio = pnlDatos.find("#Precio");
        var FechaDeEntrega = pnlDatos.find("#FechaEntrega");
        var Recibido = pnlDatos.find("#Recibido");
        var Recio = pnlDatos.find("#Recio");
        var Titulo = pnlDatos.find("#Observacion");
        var Observaciones = pnlDatos.find("#ObservacionDetalle");
        var total_pares = 0;
        $.each(pnlDatos.find("#tblTallas input[name*='C']"), function (k, v) {
            total_pares += (parseInt($(v).val()) > 0) ? parseInt($(v).val()) : 0;
        });
        pnlDatos.find("#TPares").addClass('animated bounceOut faster').one('animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd', function () {
            $(this).removeClass('animated bounceOut faster');
            $(this).addClass('animated bounceIn faster');
            pnlDatos.find("#TPares").val(total_pares);
        });
        var encabezados = pnlDatos.find("#tblTallas tbody tr:eq(0)");
        var input = $(e);
        var padre = input.parent().index();
        var indice_valor = encabezados.find("td").eq(padre).find("input").val();
        //VALIDACIONES
        if (Estilo.val() !== '' && Color.val() !== '' && Semana.val() !== '' && Maquila.val() !== '' && parseInt(pnlDatos.find("#TPares").val()) > 0
                && Estilo.text() !== '' && Precio.val() !== '') {
            if (Precio.val() !== '' && Precio.val().length > 0) {
                if (indice_valor === '') {
                    if (total_pares > 0) {
                        //REVISAR SI ESE ESTILO/COLOR NO HA SIDO AGREGADO CON ANTERIORIDAD
                        onRevisarRegistro(Estilo.val(), Color.val());
                        if (!added) {
                            //AÑADIR FILA 
                            var tal = '<div class="row"><div class="col-12 text-danger text-nowrap talla" align="center">';
                            var cnt = '</div><div class="col-12 cantidad" align="center">';
                            var dtm = [
                                0, //ID 
                                Recibido.val(), //Recibido 
                                Estilo.val(), //EstiloID
                                Estilo.text(), //Estilo
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
                                total_pares,
                                FechaDeEntrega.val(),
                                '<button type="button" class="btn btn-danger" onclick="onEliminar(this,1)"><span class="fa fa-trash"></span></button>',
                                Recio.val(),
                                Titulo.val(),
                                Observaciones.val(),
                                pnlDatos.find("#Serie").val(),
                                'N', (total_pares * Precio.val())
                            ];
                            PedidoDetalle.row.add(dtm).draw(false);
                            //CLEAR
                            total_pares = 0;
                            pnlDatos.find("#TPares").val(0);
                            pnlDatos.find("[name*='C']").val('');
                            Estilo[0].selectize.clear(true);
                            Estilo[0].selectize.focus();
                            Estilo[0].selectize.open();
                            FechaDeEntrega.prop('readonly', true);
                            Semana.prop('readonly', true);
                            Recibido[0].selectize.disable();
                            Maquila[0].selectize.clear(true);
                            Recio.val('');
                            Precio.val('');
                            Estilo[0].selectize.clear(true);
                            agregado = 1;
                            console.log("\nAGREGADO: ", agregado);
                            btnGuardar.trigger('click');
                        } else {
                            swal({
                                title: "ATENCIÓN",
                                text: "ESTA COMBINACION DE ESTILO/COLOR YA HA SIDO AGREGADA",
                                icon: "warning",
                                closeOnClickOutside: false,
                                closeOnEsc: false,
                                buttons: false,
                                timer: 2000
                            });
                        }
                    } else {
                        //ZERO PARES
                    }
                }
            } else {
                swal('ATENCIÓN', 'EL PRECIO NO ES VÁLIDO', 'warning');
            }
        }
//FIN VALIDACIONES
    }

    function onEliminar(r, index) {
        swal({
            title: "¿Deseas eliminar el registro? ",
            text: "*El registro se eliminará de forma permanente*",
            icon: "warning",
            buttons: ["Cancelar", "Aceptar"],
            closeOnClickOutside: false,
            closeOnEsc: false,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                switch (index) {
                    case 1:
                        //REMOVER (NO GUARDADO)
                        PedidoDetalle.row($(r).parents('tr')).remove().draw();
                        break;
                    case 2:
                        var dt = PedidoDetalle.row($(r).parents('tr')).data();
                        $.post(master_url + 'onEliminar', {ID: dt[0]}).done(function (data) {
                            //REMOVER AL EDITAR (GUARDADO)
                            PedidoDetalle.row($(r).parents('tr')).remove().draw();
                            swal({
                                title: "ATENCIÓN",
                                text: "SE HA ELIMINADO EL REGISTRO",
                                icon: "success",
                                closeOnClickOutside: false,
                                closeOnEsc: false,
                                buttons: false,
                                timer: 1500
                            });
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                        });
                        break;
                }
            }
        });
    }

    function getTalla(e) {
        return parseInt(pnlDatos.find("#tblTallas tbody tr:eq(0)").find("[name='" + e + "']").val()) !== '' ? pnlDatos.find("#tblTallas tbody tr:eq(0)").find("[name='" + e + "']").val() : '';
    }

    function getCantidad(e) {
        return parseInt(pnlDatos.find("#tblTallas tbody tr:eq(1)").find("[name='" + e + "']").val()) > 0 ? pnlDatos.find("#tblTallas tbody tr:eq(1)").find("[name='" + e + "']").val() : 0;
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

    function getPedidoByID(temp) {
        PedidoDetalle.clear().draw();
        $.getJSON(master_url + 'getPedidosByID', {ID: temp}).done(function (data) {
            console.log(data);
            pnlDatos.find("input").val("");
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            var dt = data[0];//Encabezado
            //SEGURIDAD 
            pnlDatos.find("#ID").val(dt.PDID);
            pnlDatos.find("#Clave").val(dt.Clave);
            pnlDatos.find("#Cliente")[0].selectize.setValue(dt.Cliente);
            pnlDatos.find("#FechaPedido").val(dt.FechaPedido);
            pnlDatos.find("#FechaRecepcion").val(dt.FechaRecepcion);
            pnlDatos.find("#Agente")[0].selectize.setValue(dt.Agente);

            pnlDatos.find("#FechaEntrega").val(dt.FechaEntrega);
            pnlDatos.find("#Semana").val(dt.Semana);
            pnlDatos.find("#Recibido")[0].selectize.setValue(dt.Recibido);

            pnlDatos.find("#Clave").prop('readonly', true);
            pnlDatos.find("#FechaPedido").prop('readonly', true);
            pnlDatos.find("#FechaRecepcion").prop('readonly', true);
            pnlDatos.find("#FechaEntrega").prop('readonly', true);
            pnlDatos.find("#Recibido")[0].selectize.disable();
            pnlDatos.find("#Cliente")[0].selectize.disable();
            pnlDatos.find("#Agente")[0].selectize.disable();

            btnImprimir.removeClass("d-none");
            //ASIGNAR DETALLE
            var tal = '<div class="row"><div class="col-12 text-danger text-nowrap talla" align="center">';
            var cnt = '</div><div class="col-12 cantidad" align="center">';
            $.each(data, function (k, v) {
                var dtm = [
                    v.PDID, //ID 
                    v.Recibido, //Recibido 
                    v.Estilo, //EstiloID
                    v.EstiloT, //Estilo
                    v.Color, //ColorID
                    v.ColorT,
                    v.Semana,
                    v.Maquila,
                    tal + v.T1 + cnt + v.C1 + '</div></div>',
                    tal + v.T2 + cnt + v.C2 + '</div></div>',
                    tal + v.T3 + cnt + v.C3 + '</div></div>',
                    tal + v.T4 + cnt + v.C4 + '</div></div>',
                    tal + v.T5 + cnt + v.C5 + '</div></div>',
                    tal + v.T6 + cnt + v.C6 + '</div></div>',
                    tal + v.T7 + cnt + v.C7 + '</div></div>',
                    tal + v.T8 + cnt + v.C8 + '</div></div>',
                    tal + v.T9 + cnt + v.C9 + '</div></div>',
                    tal + v.T10 + cnt + v.C10 + '</div></div>',
                    tal + v.T11 + cnt + v.C11 + '</div></div>',
                    tal + v.T12 + cnt + v.C12 + '</div></div>',
                    tal + v.T13 + cnt + v.C13 + '</div></div>',
                    tal + v.T14 + cnt + v.C14 + '</div></div>',
                    tal + v.T15 + cnt + v.C15 + '</div></div>',
                    tal + v.T16 + cnt + v.C16 + '</div></div>',
                    tal + v.T17 + cnt + v.C17 + '</div></div>',
                    tal + v.T18 + cnt + v.C18 + '</div></div>',
                    tal + v.T19 + cnt + v.C19 + '</div></div>',
                    tal + v.T20 + cnt + v.C20 + '</div></div>',
                    tal + v.T21 + cnt + v.C21 + '</div></div>',
                    tal + v.T22 + cnt + v.C22 + '</div></div>',
                    v.Precio,
                    v.Pares,
                    v.FechaEntrega,
                    '<button type="button" class="btn btn-danger" onclick="onEliminar(this,2)"><span class="fa fa-trash"></span></button>',
                    v.Recio,
                    v.Observacion,
                    v.ObservacionDetalle,
                    v.Serie,
                    'A', (v.Pares * v.Precio)];
                PedidoDetalle.row.add(dtm).draw(false);
            });
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass('d-none');
            $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
        }).fail(function (x, y, z) {
            swal('ERROR', 'HA OCURRIDO UN ERROR INESPERADO, VERIFIQUE LA CONSOLA PARA MÁS DETALLE', 'info');
        }).always(function () {
            HoldOn.close();
        });
    }
    function onReload() {
        console.log(temp);
        PedidoDetalle.ajax.reload();
    }

    function getProduccionMaquilaSemana(M, S) {
        $.getJSON(master_url + 'getProduccionMaquilaSemana', {Maquila: M, Semana: S}).done(function (data) {
            if (data.length > 0) {
                pnlDatos.find("#ProduccionMaquilaSemana").val(data[0].Pares);
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            console.log('OK');
        });
    }

    function onAgregarObservaciones() {
        swal({
            text: 'Observaciones',
            content: "input",
            button: {
                text: "Aceptar",
                closeModal: true
            },
            closeOnClickOutside: false,
            closeOnEsc: false
        }).then((Observaciones) => {
            pnlDatos.find("#Observacion").val(Observaciones);
            pnlDatos.find("#ObservacionDetalle").val(Observaciones);
            pnlDatos.find("[name='C1']").focus();
        });
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
        -webkit-transform: scale(2);
        transform: scale(2);
        top:-10px;
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23)!important;
        cursor: pointer;
    }

    div.zoom:hover{
        cursor: pointer;
        background-color: #fff;
    }
    .container-fluid {
        width: 100%;
        padding-right: 0px; 
        padding-left: 0px; 
        margin-right: auto;
        margin-left: auto;
    }
    
    td:hover {
        position: relative;
    }

    td[title]:hover:after {
        text-align: center;
        content: attr(title);
        padding: 4px 8px 0px 0px;
        position: absolute;
        left: 0;
        top: 100%;
        white-space: nowrap;
        z-index: 1;
        background: #0099cc;
        color: #fff;
    }
</style>