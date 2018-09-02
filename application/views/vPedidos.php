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
                            <th>Pedido</th> 
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
                            <input type="text" class="form-control form-control-sm numbersOnly" id="Clave" name="Clave" required placeholder="">
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
                            <input type="text" id="Maquila" name="Maquila" class="form-control form-control-sm date notEnter" >
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                            <label for="Semana" >Semana*</label>
                            <input type="text" id="Semana" name="Semana" class="form-control form-control-sm" >
                        </div>
                        <!--BREAK-->
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                            <label for="Recio" >Recio*</label>
                            <input type="text" id="Recio" name="Recio" class="form-control form-control-sm" >
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                            <label for="Recio" >Produccion maquila/semana*</label>
                            <input type="text" id="Recio" name="Recio" class="form-control form-control-sm" >
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                            <label for="Precio" >Precio*</label>
                            <input type="text" id="Precio" name="Precio" class="form-control form-control-sm" >
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <label for="Observaciones" >Observaciones*</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" id="Precio" name="Precio" class="form-control form-control-sm">
                                </div>
                                <div class="col-6">
                                    <input type="text" id="Precio" name="Precio" class="form-control form-control-sm">
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
                                                print '<td><input type="text" style="width: 45px;" maxlength="4" class="form-control form-control-sm numbersOnly" name="C' . $index . '"></td>';
                                            }
                                            ?>
                                            <td><input type="text" style="width: 55px;" maxlength="4" class="numbersOnly" disabled=""  name="TPares"></td>
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
                            <button type="button" class="btn btn-info btn-lg btn-float animated slideInUp" id="btnGuardar" data-toggle="tooltip" data-placement="left" title="Guardar">
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
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Recibido</th>
                                    <th scope="col">EstiloID</th>
                                    <th scope="col">Estilo</th>
                                    <th scope="col">ColorID</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Semana</th>
                                    <th scope="col">Maquila</th>
                                    
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th><!--5-->
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th><!--5-->
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th><!--5-->
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th><!--5-->
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    
                                    <th scope="col">Precio</th>
                                    <th scope="col">Pares</th>
                                    <th scope="col">Fecha de entrega</th>
                                    <th scope="col">Eliminar</th>
                                    <!--OUT-->
                                    <th scope="col">Recio</th>
                                    <th scope="col">Titulo Observaciones</th>
                                    <th scope="col">Observaciones</th>
                                    <th scope="col">Serie</th>
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

    $(document).ready(function () {
        init();
        handleEnter();

        btnGuardar.click(function () {
            isValid('pnlDatos');
            if (valido) {
                var frm = new FormData(pnlDatos.find("#frmNuevo")[0]);
                if (!nuevo) {
                    onSave('onModificar', frm, function () {
                        swal('ATENCIÓN', 'SE HA MODIFICADO EL REGISTRO', 'info');
                        nuevo = false;
                        Pedidos.ajax.reload();
                        pnlDatos.addClass("d-none");
                        pnlTablero.removeClass("d-none");
                    });
                } else {
                    onSave('onAgregar', frm, function () {
                        nuevo = false;
                        Pedidos.ajax.reload();
                        pnlDatos.addClass("d-none");
                        pnlTablero.removeClass("d-none");
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
        });

        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass("d-none");
        });

        pnlDatos.find("#Estilo").change(function () {
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
                pnlDatos.find("#Color")[0].selectize.open().focus();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            });
            //OBTENER MAQUILA            
            $.getJSON(master_url + 'getMaquilaXEstilo', {Estilo: $(this).val()}).done(function (data) {
                console.log(data);
                $.each(data, function (k, v) {
                    pnlDatos.find("#Color")[0].selectize.addOption({text: v.Color, value: v.Clave});
                });
                pnlDatos.find("#spin").addClass("d-none");
                pnlDatos.find("#Color").removeClass("d-none");
                pnlDatos.find("#Color")[0].selectize.open().focus();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            });
        });
    });

    function init() {
        getRecords();
        getOptions("getClientes", "Cliente", "Clave", "Cliente");//Clientes
        getOptions("getAgentes", "Agente", "Clave", "Agente");//Agentes
        getOptions("getEstilos", "Estilo", "Clave", "Estilo");//Estilos
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
                {"data": "ID"}, {"data": "Clave"}, {"data": "Pedido"}, {"data": "Cliente"}, {"data": "Pedido"}
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
            fu();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
</script>
<style>
    table tbody tr:hover {
        background-color: transparent;
        color: #000 !important;
    } 
</style>