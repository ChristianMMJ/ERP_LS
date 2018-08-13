<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    .div-login {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }

</style>
<div id="mdlOlvideContrasena" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-content ">
        <div class="modal-header">
            <h5 class="modal-title">Confirmar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="frmEditarContrasena">
                <div class=" col-12 col-md-12">
                    <label for="">Correo con el que accesas: *</label>
                    <input type="email" id="ocUsuario" autofocus name="ocUsuario"  class="form-control" required="" placeholder="" >
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-raised btn-primary" id="btnEnviar">ENVIAR</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" >CANCELAR</button>
        </div>
    </div>
</div>
<form id="frmIngresar" class="div-login text-center">
    <h4 class="mb-3">Control de Acceso</h4>
    <input type="email" id="Usuario" name="Usuario" class="form-control" placeholder="Usuario" required autofocus>
    <input type="password" id="Contrasena" name="Contrasena" class="form-control" placeholder="Contraseña" required>
    <br>
    <button class="btn btn-primary btn-block" id="btnIngresar" type="button">Ingresar</button>
    <hr>
    <button class="btn btn-warning btn-block" id="btnOlvidasteContrasena" type="button">Olvidaste tu contraseña?</button>
    <p class="mt-3 mb-3 text-muted">&copy; <?php echo date("Y") . ' All Rights Reserved for <br> CALZADO LOBO SA de CV'; ?></p>
</form>
<script>
    var master_url = base_url + "Sesion/";
    var btnResetear = $("#btnResetear");
    var btnIngresar = $("#btnIngresar");
    var Usuario = $("#Usuario");
    var Contrasena = $("#Contrasena");
    var mdlOlvideContrasena = $("#mdlOlvideContrasena");
    var btnEnviar = $("#btnEnviar");
    var btnOlvidasteContrasena = $("#btnOlvidasteContrasena");

    function login() {
        if (Usuario.val() !== '' && Contrasena.val() !== '') {
            HoldOn.open({
                theme: 'sk-bounce',
                message: 'ESPERE...'
            });
            setTimeout(function () {
                var frm = $("#frmIngresar");
                $.ajax({
                    url: master_url + "onIngreso",
                    type: "POST",
                    data: {
                        USUARIO: frm.find("#Usuario").val(),
                        CONTRASENA: frm.find("#Contrasena").val()
                    }
                }).done(function (data, x, jq) {
                    if (parseInt(data) === 1) {
                        location.reload(true);
                    } else {
                        onNotify('<span class="fa fa-exclamation fa-lg"></span>', data, 'danger');
                    }
                    HoldOn.close();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                    HoldOn.close();
                }).always(function () {
                });
            }, 1000);
        } else {
        }
    }

    $(document).ready(function () {
        handleEnter();
        Usuario.val("");
        Contrasena.val("");
        btnIngresar.click(function () {
            login();
        });
        btnIngresar.keypress(function (e) {
            if (e.which === 13) {
                login();
            }
            e.preventDefault();
        });
        mdlOlvideContrasena.on('shown.bs.modal', function () {
            $("#ocUsuario").focus();
        });
        btnOlvidasteContrasena.on("click", function () {
            mdlOlvideContrasena.modal('show');
            btnEnviar.on("click", function () {
                if ($("#ocUsuario").val() !== '') {
                    HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
                    $.ajax({
                        url: master_url + "onSendMail",
                        type: "POST",
                        data: {
                            USUARIO: $("#ocUsuario").val()
                        }
                    }).done(function (data, x, jq) {
                        if (parseInt(data) === 1) {
                            mdlOlvideContrasena.modal('d-none');
                            swal('GRACIAS', 'SU PETICION HA SIDO ENVIADA CON ÉXITO', 'success');
                        } else if (parseInt(data) === 0) {
                            onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'OCURRIÓ UN ERROR, EL CORREO NO FUE ENVIADO', 'danger');
                        } else if (parseInt(data) === 2) {
                            onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'EL USUARIO NO EXISTE, VERIFICA LA INFORMACIÓN', 'danger');
                        }
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                } else {
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBES INGRESAR EL CORREO DE USUARIO', 'danger');
                }
            });
        });
    });
</script>

