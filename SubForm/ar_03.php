<?php
    include_once "../sesion.php";

    include_once "../conexion.php";

    date_default_timezone_set("America/Caracas");

    $sesion = new sesion($link);
   
    $sesion->cookie_post();

	$result = mysql_query("SELECT id, DATE_FORMAT(fecha,'%d-%m-%Y') FROM donacion ORDER BY id DESC LIMIT 1;",$link);
    $row = mysql_fetch_array($result);
?>

<div class="form-group has-success">
    <div class="col-sm-3">
        <input id="n_03" name="n_03" type="text"  class="int form-control" title="Numero" maxlength="6" tabindex="" placeholder="Numero" value="<?php echo ($row[0] + 1); ?>" readonly />
    </div>
    <div class="col-sm-3">
        <input id="fecha_03" name="fecha_03" type="text" class="form-control" type-data="input_date" title="Fecha" tabindex="8" foco="foco" value="<?php echo $row[1]; ?>" />
        <small>Ingreso correcto de fecha <b>dd-mm-aaaa</b></small>
    </div>
    <div class="col-sm-3">
        <select id="tipo_03" name="tipo_03" class="" title="Tipo" tabindex="9" style="width:240px;">
            <option value="don_03_01">Ferulas</option><option value="don_03_02">Protesis</option><option value="don_03_03">Medicamento</option>
            <option value="don_03_04">Silla de Ruedas</option><option value="don_03_05">Andadera</option><option value="don_03_06">Bastones</option>
            <option value="don_03_07">Colchon Orto.</option><option value="don_03_08">Aporte Eco.</option><option value="don_03_09">Examenes Medicos</option>
            <option value="don_03_10">Otros</option>
        </select>
    </div>
</div>
<div class="form-group has-success">
    <div class="col-sm-2">
        <input id="cant_03" name="cant_03" type="text"  class="int form-control" title="Cantidad" maxlength="4" tabindex="10" placeholder="Cantidad" />
    </div>
    <div class="col-sm-3">
        <input id="proc_03" name="proc_03" type="text" class="form-control" title="Procedencia" maxlength="50" tabindex="11" placeholder="Procedencia" />
    </div>
    <div class="col-sm-3">
        <input id="mont_03" name="mont_03" type="text"  class="float form-control" title="Monto" placeholder="Monto" tabindex="12" value="0" />
    </div>
    <div class="col-sm-3">
        <textarea id="obse_03" name="obse_03" class="form-control" title="Observación" maxlength="130" tabindex="13" style="width:200px;height:50px;" placeholder="Observación"></textarea>
    </div>
</div>

<script src="plugins/plug.js"></script>
<script>
	$('input[foco="foco"]').focus();
</script>