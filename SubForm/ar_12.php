<?php
    include_once "../sesion.php";

    include_once "../conexion.php";

    date_default_timezone_set("America/Caracas");

    $sesion = new sesion($link);
   
    $sesion->cookie_post();

	$result = mysql_query("SELECT id, DATE_FORMAT(fecha,'%d-%m-%Y') FROM taller ORDER BY id DESC LIMIT 1;",$link);
    $row = mysql_fetch_array($result);
?>

<div class="form-group has-success">
    <div class="col-sm-1">
        <input id="n_12" name="n_12" type="text"  class="int form-control" title="Numero" maxlength="6" tabindex="" placeholder="Numero" value="<?php echo ($row[0] + 1); ?>" readonly />
    </div>
    <div class="col-sm-3">
        <input id="fecha_12" name="fecha_12" type="text" class="form-control" type-data="input_date" title="Fecha" tabindex="8" foco="foco" value="<?php echo $row[1]; ?>" />
        <small>Ingreso correcto de fecha <b>dd-mm-aaaa</b></small>
    </div>
    <div class="col-sm-4">
        <select id="tipo_12" name="tipo_12" class="" title="Tipos" tabindex="9" style="width:320px;">
            <?php
                $result = mysql_query("SELECT * FROM talleres ORDER BY codigo ASC;",$link);
                while($row = mysql_fetch_array($result)) {
                    echo "<option value=\"{$row[0]}\">".utf8_encode($row[1])."</option>";
                }
            ?>
        </select>
    </div>
    <div class="col-sm-1">
        <input type="text" id="hora_12" name="hora_12" class="form-control" placeholder="Hora">
    </div>
</div>
<div class="form-group has-success">
    <div class="col-sm-2">
        <input id="remi_12" name="remi_12" type="text" class="form-control" title="Remitido por" maxlength="100" tabindex="11" placeholder="Remitido por" />
    </div>
    <div class="col-sm-6">
        <select id="procedencia_12" name="procedencia_12" tabindex="5" style="width:100%;">
            <option value="0">Parroquias y Municipios</option>
			<optgroup label="Andrés Bello">
				<option value="m1_p1">Araguaney</option>
				<option value="m1_p2">El Jaguito</option>
				<option value="m1_p3">La Esperanza</option>
				<option value="m1_p4">Santa Isabel</option>
			</optgroup>
			<optgroup label="Boconó">
				<option value="m2_p1">Boconó</option>
				<option value="m2_p2">El Carmen</option>
				<option value="m2_p3">Mosquey</option>
				<option value="m2_p4">Ayacucho</option>
				<option value="m2_p5">Burbusay</option>
				<option value="m2_p6">General Ribas</option>
				<option value="m2_p7">Guaramacal</option>
				<option value="m2_p8">Vega de Guaramacal</option>
				<option value="m2_p9">Monseñor Jáuregui</option>
				<option value="m2_p10">Rafael Rangel</option>
				<option value="m2_p11">San Miguel</option>
				<option value="m2_p12">San José</option>
			</optgroup>
			<optgroup label="Bolívar">
				<option value="m3_p1">Sabana Grande</option>
				<option value="m3_p2">Cheregüé</option>
				<option value="m3_p3">Granados</option>
			</optgroup>
			<optgroup label="Candelaria">
				<option value="m4_p1">Arnoldo Gabaldón</option>
				<option value="m4_p2">Bolivia</option>
				<option value="m4_p3">Carrillo</option>
				<option value="m4_p4">Cegarra</option>
				<option value="m4_p5">Chejendé</option>
				<option value="m4_p6">Manuel Salvador Ulloa</option>
				<option value="m4_p7">San José</option>
			</optgroup>
			<optgroup label="Carache">
				<option value="m5_p1">Carache</option>
				<option value="m5_p2">La Concepción</option>
				<option value="m5_p3">Cuicas</option>
				<option value="m5_p4">Panamericana</option>
				<option value="m5_p5">Santa Cruz</option>
			</optgroup>
			<optgroup label="Escuque">
				<option value="m6_p1">Escuque</option>
				<option value="m6_p2">La Unión (El Alto Escuque)</option>
				<option value="m6_p3">Santa Rita</option>
				<option value="m6_p4">Sabana Libre</option>
			</optgroup>
			<optgroup label="José Felipe Márquez Cañizalez">
				<option value="m7_p1">El Socorro</option>
				<option value="m7_p2">Los Caprichos</option>
				<option value="m7_p3">Antonio José de Sucre</option>
			</optgroup>
			<optgroup label="Juan Vicente Campos Elías">
				<option value="m8_p1">Campo Elías</option>
				<option value="m8_p2">Arnoldo Gabaldón</option>
			</optgroup>
			<optgroup label="La Ceiba">
				<option value="m9_p1">Santa Apolonia</option>
				<option value="m9_p2">El Progreso</option>
				<option value="m9_p3">La Ceiba</option>
				<option value="m9_p4">Tres de Febrero</option>
			</optgroup>
			<optgroup label="Miranda">
				<option value="m10_p1">El Dividive</option>
				<option value="m10_p2">Agua Santa</option>
				<option value="m10_p3">Agua Caliente</option>
				<option value="m10_p4">El Cenizo</option>
				<option value="m10_p5">Valerita</option>
			</optgroup>
			<optgroup label="Monte Carmelo">
				<option value="m11_p1">Monte Carmelo</option>
				<option value="m11_p2">Buena Vista</option>
				<option value="m11_p3">Santa María del Horcón</option>
			</optgroup>
			<optgroup label="Motatán">
				<option value="m12_p1">Motatán</option>
				<option value="m12_p2">El Baño</option>
				<option value="m12_p3">Jalisco</option>
			</optgroup>
			<optgroup label="Pampán">
				<option value="m13_p1">Pampán</option>
				<option value="m13_p2">Flor de Patria</option>
				<option value="m13_p3">La Paz</option>
				<option value="m13_p4">Santa Ana</option>
			</optgroup>
			<optgroup label="Pampanito">
				<option value="m14_p1">Pampanito</option>
				<option value="m14_p2">La Concepción</option>
				<option value="m14_p3">Pampanito II</option>
			</optgroup>
			<optgroup label="Rafael Rangel">
				<option value="m15_p1">Betijoque</option>
				<option value="m15_p2">José Gregorio Hernández</option>
				<option value="m15_p3">La Pueblita</option>
				<option value="m15_p4">Los Cedros</option>
			</optgroup>
			<optgroup label="San Rafael de Carvajal">
				<option value="m16_p1">Carvajal</option>
				<option value="m16_p2">Campo Alegre</option>
				<option value="m16_p3">Antonio Nicolás Briceño</option>
				<option value="m16_p4">José Leonardo Suárez</option>
			</optgroup>
			<optgroup label="Sucre">
				<option value="m17_p1">Sabana de Mendoza</option>
				<option value="m17_p2">Junín</option>
				<option value="m17_p3">Valmore Rodríguez</option>
				<option value="m17_p4">El Paraíso</option>
			</optgroup>
			<optgroup label="Trujillo">
				<option value="m18_p1">Andrés Linares</option>
				<option value="m18_p2">Chiquinquirá</option>
				<option value="m18_p3">Cristóbal Mendoza</option>
				<option value="m18_p4">Cruz Carrillo</option>
				<option value="m18_p5">Matriz</option>
				<option value="m18_p6">Monseñor Carrillo</option>
				<option value="m18_p7">Tres Esquinas</option>
			</optgroup>
			<optgroup label="Urdaneta">
				<option value="m19_p1">Cabimbú</option>
				<option value="m19_p2">Jajó</option>
				<option value="m19_p3">La Mesa de Esnujaque</option>
				<option value="m19_p4">Santiago</option>
				<option value="m19_p5">Tuñame</option>
				<option value="m19_p6">La Quebrada</option>
			</optgroup>
			<optgroup label="Valera">
				<option value="m20_p1">Juan Ignacio Montilla</option>
				<option value="m20_p2">La Beatriz</option>
				<option value="m20_p3">La Puerta</option>
				<option value="m20_p4">Mendoza del Valle de Momboy</option>
				<option value="m20_p5">Mercedes Díaz</option>
				<option value="m20_p6">San Luis</option>
			</optgroup>
		</select>
    </div>
    <div class="col-sm-3">
        <input type="text" id="lugar_12" name="lugar_12" class="form-control" placeholder="lugar">
    </div>
</div>
<div class="form-group has-success">
    <div class="col-sm-1">
        <input id="fem_12" name="fem_12" type="text" class="int form-control" title="N° Femeninas" maxlength="3" tabindex="15" value="F" onfocus="$(this).val(null);" style="width:50px;" />
    </div>
    <div class="col-sm-1">
        <input id="fen_12" name="mas_12" type="text" class="int form-control" title="N° Masculinos" maxlength="3" tabindex="16" value="M" onfocus="$(this).val(null);" style="width:50px;" />
    </div>
    <div class="col-sm-3">
        <select id="real_12" name="real_12[]" class="" title="Realizado" placeholder="Realizado(res)" tabindex="9" style="width:240px;" plaseholder="REALIZADOR(ES)" multiple>
            <?php
                $result = mysql_query("SELECT cedula, CONCAT(nombre,' ',apellido) FROM usuario WHERE area LIKE '%ar_12%';",$link);
                while ($vio = mysql_fetch_array($result)) {
                    echo "<option value=\"{$vio[0]}\">{$vio[1]}</option>";
                }
            ?>
        </select>
    </div>
    <div class="col-sm-2">
        <textarea id="obse_12" name="obse_12" class="form-control" title="Observación" maxlength="130" tabindex="18" style="width:150px;height:50px;" placeholder="Observación"></textarea>
    </div>
    <div class="col-sm-2">
        <textarea id="equipo_12" name="equipo_12" class="form-control" title="Equipo" maxlength="130" tabindex="18" style="width:150px;height:50px;" placeholder="Equipo"></textarea>
    </div>
    <div class="col-sm-2">
        <input type="text" id="tel_12" name="tel_12" class="form-control" placeholder="Telefono">
    </div>
</div>

<script src="plugins/plug.js"></script>
<script>
	$('input[foco="foco"]').focus();
</script>