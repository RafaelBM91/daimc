<?php
    include_once "../sesion.php";

    include_once "../conexion.php";

    date_default_timezone_set("America/Caracas");

    $sesion = new sesion($link);
   
    $sesion->cookie_post();

	$result = mysql_query("SELECT id, DATE_FORMAT(fecha,'%d-%m-%Y') FROM proyecto ORDER BY id DESC LIMIT 1;",$link);
    $row = mysql_fetch_array($result);
?>

<div class="form-group has-success">
    <div class="col-sm-3">
        <input id="n_08" name="n_08" type="text"  class="int form-control" title="Numero" maxlength="6" tabindex="" placeholder="Numero" value="<?php echo ($row[0] + 1); ?>" readonly />
    </div>
    <div class="col-sm-3">
        <input id="fecha_08" name="fecha_08" type="text" class="form-control" type-data="input_date" title="Fecha" tabindex="8" foco="foco" value="<?php echo $row[1]; ?>" />
        <small>Ingreso correcto de fecha <b>dd-mm-aaaa</b></small>
    </div>
    <div class="col-sm-3">
        <select id="opr_08" name="opr_08" class="" title="Orientacion" tabindex="9" style="width:250px;">
            <option value="pro_08_01">Informacion</option><option value="pro_08_02">Recepcion de Carpeta</option><option value="pro_08_03">Entrega de Carpeta</option>
        </select>
    </div>
</div>
<div class="form-group has-success">
    <div class="col-sm-3">
        <label for="" class="control-label">Procede: </label>&nbsp;&nbsp;
        <div class="radio radio-danger" style="display:inline-block;">
            <input id="proc_08_s" name="proc_08" value="s" type="radio" />
            <label for="proc_08_s">Si</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="radio radio-danger" style="display:inline-block;">
            <input id="proc_08_n" name="proc_08" value="n" type="radio" checked />
            <label for="proc_08_n">No</label>
        </div>
    </div>
    <div class="col-sm-3">
        <input id="rubr_08" name="rubr_08" type="text" class="form-control" title="Rubro" maxlength="100" tabindex="10" placeholder="Rubro" />
    </div>
    <div class="col-sm-3">
        <input id="n_08_ex" name="n_08_ex" type="text" class="form-control" title="N° Expediente" maxlength="3" tabindex="11" placeholder="N° Expediente" />
    </div>
</div>
<div class="form-group has-success">
    <div class="col-sm-3">
        <input id="mont_08" name="mont_08" type="text" class="float form-control" title="Monto" placeholder="Monto" tabindex="12" />
    </div>
    <div class="col-sm-3">
        <textarea id="obse_08" name="obse_08" class="form-control" title="Observacion" maxlength="100" tabindex="13" style="width:200px;height:50px;" placeholder="Observacion"></textarea>
    </div>
</div>

<script src="plugins/plug.js"></script>
<script>
	$('input[foco="foco"]').focus();
</script>