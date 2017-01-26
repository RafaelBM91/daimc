<?php
    include_once "../sesion.php";

    include_once "../conexion.php";

    date_default_timezone_set("America/Caracas");

    $sesion = new sesion($link);
   
    $sesion->cookie_post();

	$result = mysql_query("SELECT id, DATE_FORMAT(fecha,'%d-%m-%Y') FROM legal ORDER BY id DESC LIMIT 1;",$link);
    $row = mysql_fetch_array($result);
?>

<div class="form-group has-success">
    <div class="col-sm-3">
        <input id="n_06" name="n_06" type="text"  class="int form-control" title="Numero" maxlength="6" tabindex="" placeholder="Numero" value="<?php echo ($row[0] + 1); ?>" readonly />
    </div>
    <div class="col-sm-3">
        <input id="fecha_06" name="fecha_06" type="text" class="form-control" type-data="input_date" title="Fecha" tabindex="8" foco="foco" value="<?php echo $row[1]; ?>" />
        <small>Ingreso correcto de fecha <b>dd-mm-aaaa</b></small>
    </div>
    <div class="col-sm-3">
        <select id="vio_06" name="vio_06[ ]" class="" title="Actividad" tabindex="9" style="width:240px;" placeholder="TIPOS DE VIOLENCIAS" multiple>
            <option value="asesoria">Asesoria</option>
            <?php
                $result = mysql_query("SELECT * FROM violencia;",$link);
                while ($vio = mysql_fetch_array($result)) {
                    echo "<option value=\"{$vio[0]}\">{$vio[1]}</option>";
                }
            ?>
        </select>
    </div>
</div>
<div class="form-group has-success">
    <div class="col-sm-3">
        <input id="remi_06" name="remi_06" type="text" class="form-control" title="Remitido" maxlength="100" tabindex="10" placeholder="Remitido" />
    </div>
    <div class="col-sm-3">
        <select id="real_06" name="real_06" class="" title="Realizado" tabindex="9" style="width:240px;">
            <?php
                $result = mysql_query("SELECT cedula, nombre FROM usuario WHERE area LIKE '%ar_06%';",$link);
                while ($vio = mysql_fetch_array($result)) {
                    echo "<option value=\"{$vio[0]}\">{$vio[1]}</option>";
                }
            ?>
        </select>
    </div>
    <div class="col-sm-3">
        <textarea id="obse_06" name="obse_06" class="form-control" title="Observación" maxlength="130" tabindex="12" style="width:200px;height:50px;" placeholder="Observación"></textarea>
    </div>
</div>

<script src="plugins/plug.js"></script>
<script>
	$('input[foco="foco"]').focus();
</script>