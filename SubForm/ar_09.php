<?php
    include_once "../sesion.php";

    include_once "../conexion.php";

    date_default_timezone_set("America/Caracas");

    $sesion = new sesion($link);
   
    $sesion->cookie_post();

	$result = mysql_query("SELECT id, DATE_FORMAT(fecha,'%d-%m-%Y') FROM psicologia ORDER BY id DESC LIMIT 1;",$link);
    $row = mysql_fetch_array($result);
?>

<div class="form-group has-success">
    <div class="col-sm-3">
        <input id="n_09" name="n_09" type="text"  class="int form-control" title="Numero" maxlength="6" tabindex="" placeholder="Numero" value="<?php echo ($row[0] + 1); ?>" readonly />
    </div>
    <div class="col-sm-3">
        <input id="fecha_09" name="fecha_09" type="text" class="form-control" type-data="input_date" title="Fecha" tabindex="8" foco="foco" value="<?php echo $row[1]; ?>" />
        <small>Ingreso correcto de fecha <b>dd-mm-aaaa</b></small>
    </div>
    <div class="col-sm-6">
        <label for="" class="control-label">Actividad: </label>&nbsp;&nbsp;
        <div class="radio radio-danger" style="display:inline-block;">
            <input id="acti_09_e" name="acti_09" value="Evaluacion" type="radio" />
            <label for="acti_09_e">Evaluacion</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="radio radio-danger" style="display:inline-block;">
            <input id="acti_09_o" name="acti_09" value="Orientacion" type="radio" />
            <label for="acti_09_o">Orientacion</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="radio radio-danger" style="display:inline-block;">
            <input id="acti_09_s" name="acti_09" value="Seguimiento" type="radio" />
            <label for="acti_09_s">Seguimiento</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="radio radio-danger" style="display:inline-block;">
            <input id="acti_09_t" name="acti_09" value="Otro" type="radio" checked />
            <label for="acti_09_t">Otro</label>
        </div>
    </div>
</div>
<div class="form-group has-success">
    <div class="col-sm-3">
        <select id="Vio_09" name="vio_09[ ]" class="" title="Violencia" tabindex="10" style="width:240px;" placeholder="TIPOS DE VIOLENCIAS" multiple>
            <?php
                $result = mysql_query("SELECT * FROM violencia;",$link);
                while ($vio = mysql_fetch_array($result)) {
                    echo "<option value=\"{$vio[0]}\">{$vio[1]}</option>";
                }
            ?>
        </select>
    </div>
    <div class="col-sm-3">
        <input id="remi_p_09" name="remi_p_09" type="text" class="form-control" title="Remitido Por" maxlength="100" tabindex="11" placeholder="Remitido Por" />
    </div>
    <div class="col-sm-3">
        <input id="remi_a_09" name="remi_a_09" type="text" class="form-control" title="Remitido A" placeholder="Remitido A" tabindex="12" />
        <span id="opc_remi_09" style="display:none;position:absolute;top:15px;left:280px;background-color:#009CFF;font-size:13px;width:100px;"></span>
    </div>
    <div class="col-sm-3">
        <select id="real_09" name="real_09" class="" title="Realizado" tabindex="9" style="width:240px;">
            <?php
                $result = mysql_query("SELECT cedula, nombre FROM usuario WHERE area LIKE '%ar_09%';",$link);
                while ($vio = mysql_fetch_array($result)) {
                    echo "<option value=\"{$vio[0]}\">{$vio[1]}</option>";
                }
            ?>
        </select>
    </div>
</div>

<script src="plugins/plug.js"></script>
<script>
	$('input[foco="foco"]').focus();
</script>