<?php
    include_once "../sesion.php";

    include_once "../conexion.php";

    date_default_timezone_set("America/Caracas");

    $sesion = new sesion($link);
   
    $sesion->cookie_post();

	$result = mysql_query("SELECT id, DATE_FORMAT(fecha,'%d-%m-%Y') FROM social ORDER BY id DESC LIMIT 1;",$link);
    $row = mysql_fetch_array($result);
?>

<div class="form-group has-success">
    <div class="col-sm-3">
        <input id="n_11" name="n_11" type="text"  class="int form-control" title="Numero" maxlength="6" tabindex="" placeholder="Numero" value="<?php echo ($row[0] + 1); ?>" readonly />
    </div>
    <div class="col-sm-3">
        <input id="fecha_11" name="fecha_11" type="text" class="form-control" type-data="input_date" title="Fecha" tabindex="8" foco="foco" value="<?php echo $row[1]; ?>" />
        <small>Ingreso correcto de fecha <b>dd-mm-aaaa</b></small>
    </div>
    <div class="col-sm-3">
        <input id="remi_11" name="remi_11" type="text" class="form-control" title="Remitido A" maxlength="100" tabindex="9" placeholder="Remitido A" />
    </div>
    <div class="col-sm-3">
        <select id="real_11" name="real_11" class="" title="Realizado" tabindex="9" style="width:240px;">
            <?php
                $result = mysql_query("SELECT cedula, nombre FROM usuario WHERE area LIKE '%ar_11%';",$link);
                while ($vio = mysql_fetch_array($result)) {
                    echo "<option value=\"{$vio[0]}\">{$vio[1]}</option>";
                }
            ?>
        </select>
    </div>
</div>
<div class="form-group has-success">
    <div class="col-sm-3">
        <label for="" class="control-label">Procede: </label>&nbsp;&nbsp;
        <div class="radio radio-danger" style="display:inline-block;">
            <input id="proc_11_s" name="proc_11" value="s" type="radio" />
            <label for="proc_11_s">Si</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="radio radio-danger" style="display:inline-block;">
            <input id="proc_11_n" name="proc_11" value="n" type="radio" checked />
            <label for="proc_11_n">No</label>
        </div>
    </div>
    <div class="col-sm-3">
        <textarea id="desc_11" name="desc_11" class="form-control" title="Descripcion" maxlength="200" tabindex="11" style="width:200px;height:50px;" placeholder="Descripcion"></textarea>
    </div>
    <div class="col-sm-3">
        <textarea id="obse_11" name="obse_11" class="form-control" title="Observación" maxlength="130" tabindex="12" style="width:200px;height:50px;" placeholder="Observación"></textarea>
    </div>
</div>

<script src="plugins/plug.js"></script>
<script>
	$('input[foco="foco"]').focus();
</script>