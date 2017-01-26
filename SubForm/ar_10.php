<?php
    include_once "../sesion.php";

    include_once "../conexion.php";

    date_default_timezone_set("America/Caracas");

    $sesion = new sesion($link);
   
    $sesion->cookie_post();

	$result = mysql_query("SELECT id, DATE_FORMAT(fecha,'%d-%m-%Y') FROM sisdapro ORDER BY id DESC LIMIT 1;",$link);
    $row = mysql_fetch_array($result);
?>

<div class="form-group has-success">
    <div class="col-sm-3">
        <input id="n_10" name="n_10" type="text"  class="int form-control" title="Numero" maxlength="6" tabindex="" placeholder="Numero" value="<?php echo ($row[0] + 1); ?>" readonly />
    </div>
    <div class="col-sm-3">
        <input id="fecha_10" name="fecha_10" type="text" class="form-control" type-data="input_date" title="Fecha" tabindex="8" foco="foco" value="<?php echo $row[1]; ?>" />
        <small>Ingreso correcto de fecha <b>dd-mm-aaaa</b></small>
    </div>
    <div class="col-sm-3">
        <input id="remi_10" name="remi_10" type="text" class="form-control" title="Remitido A" maxlength="100" tabindex="9" placeholder="Remitido A" />
    </div>
    <div class="col-sm-3">
        <input id="cont_10" name="cont_10" type="text" class="form-control" title="Continuidad" maxlength="50" tabindex="10" placeholder="Continuidad" />
    </div>
</div>
<div class="form-group has-success">
    <div class="col-sm-3">
        <textarea id="desc_10" name="desc_10" class="form-control" title="Descripcion" maxlength="100" tabindex="11" style="width:200px;height:50px;" placeholder="Descripcion"></textarea>
    </div>
</div>

<script src="plugins/plug.js"></script>
<script>
	$('input[foco="foco"]').focus();
</script>