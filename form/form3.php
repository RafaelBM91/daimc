<legend>Usuarios</legend>
<div class="form-group has-success">
    <div class="col-sm-2">
        <input id="cedula_us" name="cedula_us" type="text"  class="int form-control" title="Cedula" maxlength="10" tabindex="1" placeholder="Cedula" autofocus/>
    </div>
    <div class="col-sm-3">
        <input id="nombre_us" name="nombre_us" type="text"  class="form-control" title="Nombre" maxlength="45" tabindex="2" placeholder="Nombre" />
    </div>
    <div class="col-sm-3">
        <input id="apellido_us" name="apellido_us" type="text"  class="form-control" title="Apellido" maxlength="45" tabindex="3" placeholder="Apellido" />
    </div>
    <div class="col-sm-2">
        <input id="pass_us" name="pass_us" type="password" placeholder="Clave" class="form-control" title="clave" tabindex="4" />
    </div>
    <div class="col-sm-2">
        <input id="tipo_us" name="tipo_us" type="number" min="1" max="3" step="1" value="3" class="form-control" title="Tipo" tabindex="5" style="width:80px;" />
    </div>
</div>
<div class="form-group has-success">
    <div class="col-sm-10">
        <style>
            div.checkbox-success {
                margin: 30px 30px 30px 30px;
                height: 50px;
            }
            div.checkbox-success label {
                font-size:16px;
            }
        </style>
        <label class="control-label">Seleccione Areas</label>
        <table border="0" cellspacing="8" cellpadding="8">
            <tr><td>
                <!--<label for="ar1">Medicina:</label></td><td><input id="ar1" name="" value="ar_01" type="checkbox" />-->
                <div class="checkbox checkbox-success" style="display:inline-block;">
                    <input id="ar1" name="ar_01" value="m" type="checkbox" />
                    <label for="ar1">Medicina</label>
                </div>
            </td>
            <td>
                <!--<label for="ar2">Capacitacion:</label></td><td><input id="ar2" name="" value="ar_02" type="checkbox" />-->
                <div class="checkbox checkbox-success" style="display:inline-block;">
                    <input id="ar2" name="" value="ar_02" type="checkbox" />
                    <label for="ar2">Capacitacion</label>
                </div>
            </td>
            <td>
                <!--<label for="ar3">Donacion:</label></td><td><input id="ar3" name="" value="ar_03" type="checkbox" />-->
                <div class="checkbox checkbox-success" style="display:inline-block;">
                    <input id="ar3" name="" value="ar_03" type="checkbox" />
                    <label for="ar3">Donacion</label>
                </div>
            </td>
            </tr>
            <tr><td>
                <!--<label for="ar4">Ginecologia:</label></td><td><input id="ar4" name="" value="ar_04" type="checkbox" />-->
                <div class="checkbox checkbox-success" style="display:inline-block;">
                    <input id="ar4" name="" value="ar_04" type="checkbox" />
                    <label for="ar4">Ginecologia</label>
                </div>
            </td>
            <td>
                <!--<label for="ar5">Jornada:</label></td><td><input id="ar5" name="" value="ar_05" type="checkbox" />-->
                <div class="checkbox checkbox-success" style="display:inline-block;">
                    <input id="ar5" name="" value="ar_05" type="checkbox" />
                    <label for="ar5">Jornada</label>
                </div>
            </td>
            <td>
                <!--<label for="ar6">Legal:</label></td><td><input id="ar6" name="" value="ar_06" type="checkbox" />-->
                <div class="checkbox checkbox-success" style="display:inline-block;">
                    <input id="ar6" name="" value="ar_06" type="checkbox" />
                    <label for="ar6">Legal</label>
                </div>
            </td></tr>
            <tr><td>
                <!--<label for="ar7">Pediatria:</label></td><td><input id="ar7" name="" value="ar_07" type="checkbox" />-->
                <div class="checkbox checkbox-success" style="display:inline-block;">
                    <input id="ar7" name="" value="ar_07" type="checkbox" />
                    <label for="ar7">Pediatria</label>
                </div>
            </td>
            <td>
                <!--<label for="ar8">Proyecto:</label></td><td><input id="ar8" name="" value="ar_08" type="checkbox" />-->
                <div class="checkbox checkbox-success" style="display:inline-block;">
                    <input id="ar8" name="" value="ar_08" type="checkbox" />
                    <label for="ar8">Proyecto</label>
                </div>
            </td>
            <td>
                <!--<label for="ar9">Psicologia:</label></td><td><input id="ar9" name="" value="ar_09" type="checkbox" />-->
                <div class="checkbox checkbox-success" style="display:inline-block;">
                    <input id="ar9" name="" value="ar_09" type="checkbox" />
                    <label for="ar9">Psicologia</label>
                </div>
            </td></tr>
            <tr><td>
                <!--<label for="ar10">Sisdapro:</label></td><td><input id="ar10" name="" value="ar_10" type="checkbox" />-->
                <div class="checkbox checkbox-success" style="display:inline-block;">
                    <input id="ar10" name="" value="ar_10" type="checkbox" />
                    <label for="ar10">Sisdapro</label>
                </div>
            </td>
            <td>
                <!--<label for="ar11">Social:</label></td><td><input id="ar11" name="" value="ar_11" type="checkbox" />-->
                <div class="checkbox checkbox-success" style="display:inline-block;">
                    <input id="ar11" name="" value="ar_11" type="checkbox" />
                    <label for="ar11">Social</label>
                </div>
            </td>
            <td>
                <!--<label for="ar12">Taller:</label></td><td><input id="ar12" name="" value="ar_12" type="checkbox" />-->
                <div class="checkbox checkbox-success" style="display:inline-block;">
                    <input id="ar12" name="" value="ar_12" type="checkbox" />
                    <label for="ar12">Taller</label>
                </div>
            </td></tr>
            <tr><td>
                <!--<label for="ar13">Todos:</label></td><td><input id="ar13" name="" value="*" type="checkbox" /></td>-->
                <div class="checkbox checkbox-success" style="display:inline-block;">
                    <input id="ar13" name="" value="*" type="checkbox" />
                    <label for="ar13">Todos</label>
                </div>
            </tr>
        </table>
    </div>
</div>
<div class="form-group has-success">
    <div class="col-sm-6">
        <input id="opr_area" name="opr_area" type="hidden" value="us" />
        <input id="area_us" name="area_us" type="hidden" value="" />
        <input id="send_us" type="button" class="btn_2 btn btn-success btn-sm" title="Guardar" tabindex="8" value="Guardar" style="width:100px;" />
        <input id="edit_us" type="button" class="btn_3 btn btn-warning btn-sm" title="Editar" tabindex="9" value="Editar" data-opr="t1" style="width:100px;" disabled />
        <input id="elim_us" type="button" class="btn_4 btn btn-danger btn-sm" title="Eliminar" tabindex="10" value="Eliminar" data-opr="t1" style="width:100px;" disabled />
        <input id="canc_us" type="button" class="btn_cancelar btn btn-default btn-sm" title="Cancelar" tabindex="9" value="Cancelar" style="width:100px;">
    </div>
</div>