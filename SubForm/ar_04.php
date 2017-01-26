<?php
    include_once "../sesion.php";

    include_once "../conexion.php";

    date_default_timezone_set("America/Caracas");

    $sesion = new sesion($link);
   
    $sesion->cookie_post();

	$result = mysql_query("SELECT id, DATE_FORMAT(fecha,'%d-%m-%Y') FROM ginecologia ORDER BY id DESC LIMIT 1;",$link);
    $row = mysql_fetch_array($result);
?>

<div class="form-group has-success">
    <div class="col-sm-3">
        <input id="n_04" name="n_04" type="text"  class="int form-control" title="Numero" maxlength="6" tabindex="" placeholder="Numero" value="<?php echo ($row[0] + 1); ?>" readonly />
    </div>
    <div class="col-sm-3">
        <input id="fecha_04" name="fecha_04" type="text" class="form-control" type-data="input_date" title="Fecha" tabindex="8" foco="foco" value="<?php echo $row[1]; ?>" />
        <small>Ingreso correcto de fecha <b>dd-mm-aaaa</b></small>
    </div>
    <div class="col-sm-3">
        <select id="acti_04" name="acti_04" class="" title="Actividad" tabindex="9" style="width:240px;">
            <option value="gin_04_01">Consult. Ginecologica</option><option value="gin_04_02">Consult. Prenatal</option><option value="gin_04_03">Citologia</option><option value="gin_04_04">Otros</option>
        </select>
    </div>
</div>
<div class="form-group has-success">
    <div class="col-sm-2">
        <input id="refe_04" name="refe_04" type="text"  class="form-control" title="Referida" maxlength="100" tabindex="10" placeholder="Referida" />
    </div>
    <div class="col-sm-3">
        <input id="cita_04" name="cita_04" type="text" class="form-control" title="Cita" placeholder="Cita" type-data="input_date" tabindex="11" />
        <small>Ingreso correcto de fecha <b>dd-mm-aaaa</b></small>
    </div>
    <div class="col-sm-3">
        <textarea id="obse_04" name="obse_04" class="form-control" title="Observación" maxlength="130" tabindex="12" style="width:200px;height:50px;" placeholder="Observación"></textarea>
    </div>
</div>

<script src="plugins/plug.js"></script>
<script>
	$('input[foco="foco"]').focus();
</script>