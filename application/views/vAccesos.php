
<script src="<?php print base_url('js/multiselectjs/multiselect.min.js'); ?>"></script>
<div class="card m-3 animated fadeIn" id="pnlTablero">
    <div class="card-header" align="center">
        <h3 class="font-weight-bold">Accesos</h3>
    </div>
    <div class="card-body row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pb-3">
            <label>Usuario</label>
            <select id="Usuario" name="Usuario" class="form-control form-control-sm">
            </select>
        </div>
        <div class="col-5">
            <select name="from[]" id="multiselect" class="form-control NotSelectize " size="8" multiple="multiple">
                <option value="1">Item 1</option>
                <option value="2">Item 5</option>
                <option value="2">Item 2</option>
                <option value="2">Item 4</option>
                <option value="3">Item 3</option>
            </select>
        </div>
        <div class="col-2">
            <button type="button" id="multiselect_rightAll" class="btn btn-block btn-primary"><i class="fa fa-forward"></i></button>
            <button type="button" id="multiselect_rightSelected" class="btn btn-block  btn-primary"><i class="fa fa-chevron-right"></i></button>
            <button type="button" id="multiselect_leftSelected" class="btn btn-block  btn-danger"><i class="fa fa-chevron-left"></i></button>
            <button type="button" id="multiselect_leftAll" class="btn btn-block  btn-danger"><i class="fa fa-backward"></i></button>
        </div>
        <div class="col-5">
            <select name="to[]" id="multiselect_to" class="form-control NotSelectize" size="8" multiple="multiple"></select>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#multiselect').multiselect();
        $('button[id^="multiselect"].btn-primary').click(function () {
            onBeep(1);
        });
        $('button[id^="multiselect"].btn-danger').click(function () {
            onBeep(3);
        });

        $.getJSON('<?php print base_url('Accesos/getUsuarios') ?>').done(function (dx) {
            $.each(dx, function (k, v) {
                $("#Usuario")[0].selectize.addOption({text: v.USUARIO + ' (' + v.TIPO_ACCESO + ')', value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    });


</script>
