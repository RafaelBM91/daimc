<?php
    include_once "../sesion.php";

    include_once "../conexion.php";

    date_default_timezone_set("America/Caracas");

    $sesion = new sesion($link);
   
    $sesion->cookie_post();

	$result = mysql_query("SELECT id, DATE_FORMAT(fecha,'%d-%m-%Y') FROM medicina ORDER BY id DESC LIMIT 1;",$link);
    $row = mysql_fetch_array($result);
?>

<div class="form-group has-success">
    <div class="col-sm-3">
        <input id="n_01" name="n_01" type="text"  class="int form-control" title="Numero" maxlength="" tabindex="" placeholder="Numero" value="<?php echo ($row[0] + 1); ?>" readonly />
    </div>
    <div class="col-sm-3">
        <input id="fecha_01" name="fecha_01" type="text" type-data="input_date" class="form-control" title="Fecha" tabindex="8" foco="foco" value="<?php echo $row[1]; ?>" />
        <small>Ingreso correcto de fecha <b>dd-mm-aaaa</b></small>
    </div>
    <div class="col-sm-3">
        <input id="refe_01" name="refe_01" type="text"  class="form-control" title="Referido" maxlength="100" tabindex="8" placeholder="Referido" />
    </div>
</div>
<div class="form-group has-success">
    <div class="col-sm-3">
        <textarea id="diag_01" name="diag_01" class="form-control" title="Diagnostico" maxlength="100" tabindex="10" style="width:200px;height:50px;" placeholder="Diagnostico"></textarea>
    </div>
    <div class="col-sm-3">
        <textarea id="obse_01" name="obse_01" class="form-control" title="Observación" maxlength="130" tabindex="11" style="width:200px;height:50px;" placeholder="Observación"></textarea>
    </div>
</div>

<script src="plugins/plug.js"></script>
<script>
	$('input[foco="foco"]').focus();
</script>