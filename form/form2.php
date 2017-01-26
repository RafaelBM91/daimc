<?php
    
    // include_once "conexion.php";

    $array = array(
        "Todos" => "<option value=\"todos\">TODOS</option>",
        "ar_01" => "<option value=\"ar_01\">Medicina</option>",
        "ar_02" => "<option value=\"ar_02\">Capacitación</option>",
        "ar_03" => "<option value=\"ar_03\">Donación</option>",
        "ar_04" => "<option value=\"ar_04\">Ginecologia</option>",
        "ar_05" => "<option value=\"ar_05\">Jornada</option>",
        "ar_06" => "<option value=\"ar_06\">Legal</option>",
        "ar_07" => "<option value=\"ar_07\">Pediatria</option>",
        "ar_08" => "<option value=\"ar_08\">Proyecto</option>",
        "ar_09" => "<option value=\"ar_09\">Psicologia</option>",
        "ar_13" => "<option value=\"ar_13\">Psicologia Infantil</option>",
        "ar_10" => "<option value=\"ar_10\">Atencion al Ciudadano</option>",
        "ar_11" => "<option value=\"ar_11\">Social</option>",
        "ar_12" => "<option value=\"ar_12\">Taller</option>",
    );
    $vec = array("Todos","ar_01","ar_02","ar_03","ar_04","ar_05","ar_06","ar_07","ar_08","ar_09","ar_13","ar_10","ar_11","ar_12");
    $opc = ' ';

    if($_SESSION['area'] == '*')
        for($i=0;$i<14;$i++)
            $opc .= $array[$vec[$i]];
    else
    {
        $porciones = explode(",", $_SESSION['area']);
        for($i=0;$i<count($porciones);$i++)
            $opc .= $array[$porciones[$i]];
    }

    $link = mysql_connect("localhost", "root", "ata");
    mysql_select_db("daimctest", $link);

?>

<legend>Busqueda</legend>

<div class="form-group has-success">
    <div class="col-sm-3">
        <select id="sel_area_busq" name="sel_area_busq" class="" title="Seleccione Area" tabindex="1" style="width:240px;" autofocus>
            <option value="0">SELECCIONE ÁREA</option>
            <?php echo $opc; ?>
        </select>
    </div>
    <label for="desd_busq" class="col-sm-1 control-label">Desde</label>
    <div class="col-sm-2">
        <input id="desd_busq" name="desd_busq" type="text" type-data="input_date" class="form-control" title="Desde" tabindex="" value="2016-01-01" readonly />
    </div>
    <label for="hast_busq" class="col-sm-1 control-label">Hasta</label>
    <div class="col-sm-2">
        <input id="hast_busq" name="hast_busq" type="text" type-data="input_date" class="form-control" title="Hasta" tabindex="" value="<?php echo date("Y-m-d"); ?>" readonly />
    </div>
    <div class="radio radio-danger busq-radio" style="display:inline-block;">
        <input id="opc_busq_1" name="opc_busq" value="1" type="radio" checked="checked" />
        <label for="opc_busq_1">Buscar Solo Por Fecha</label>
    </div>
</div>

<div class="form-group has-success">
    

    <!--TIPO DE VIOLENCIA-->
    <div class="col-sm-1 bloque_busq_1" style="width:30px;">
        <div class="radio radio-danger busq-radio" style="display:inline-block;">
            <input id="opc_busq_6" name="opc_busq" value="6" type="radio" />
            <label for="opc_busq_6">&nbsp;</label>
        </div>
    </div>
    <div class="col-sm-3 bloque_busq_1" style="border: solid 0px;">
        <select id="vio_busq" name="vio_busq" class="" title="Tipo de Violencia" tabindex="" style="width:250px;">
            <?php
                $result = mysql_query("SELECT * FROM violencia;",$link);
                while ($vio = mysql_fetch_array($result)) {
                    $nombre = utf8_encode($vio[1]);
                    echo "<option value=\"{$vio[0]}\">{$vio[1]}</option>";
                }
            ?>
        </select>
    </div>
    

    <!--TIPO DE TALLERS-->
    <div class="col-sm-1 bloque_busq_2" style="width:30px;">
        <div class="radio radio-danger busq-radio" style="display:inline-block;">
            <input id="opc_busq_6" name="opc_busq" value="8" type="radio" />
            <label for="opc_busq_6">&nbsp;</label>
        </div>
    </div>
    <div class="col-sm-3 bloque_busq_2" style="border: solid 0px;">
        <select id="tal_busq" name="tal_busq" class="" title="Tipos de Talleres" tabindex="" style="width:250px;">
            <?php
                $result = mysql_query("SELECT * FROM talleres;",$link);
                while ($vio = mysql_fetch_array($result)) {
                    $nombre = utf8_encode($vio[1]);
                    echo "<option value=\"{$vio[0]}\">{$nombre}</option>";
                }
            ?>
        </select>
    </div>


    <!--TIPO DE CURSOS-->
    <div class="col-sm-1 bloque_busq_3" style="width:30px;">
        <div class="radio radio-danger busq-radio" style="display:inline-block;">
            <input id="opc_busq_6" name="opc_busq" value="9" type="radio" />
            <label for="opc_busq_6">&nbsp;</label>
        </div>
    </div>
    <div class="col-sm-3 bloque_busq_3" style="border: solid 0px;">
        <select id="cur_busq" name="cur_busq" class="" title="Tipo de Cursos" tabindex="" style="width:250px;">
            <?php
                $result = mysql_query("SELECT * FROM cursos;",$link);
                while ($vio = mysql_fetch_array($result)) {
                    $nombre = utf8_encode($vio[1]);
                    echo "<option value=\"{$vio[0]}\">{$nombre}</option>";
                }
            ?>
        </select>
    </div>


    <!--CEDULA DE ATENDIDO-->
    <div class="col-sm-1 bloque_busq_4" style="width:30px;">
        <div class="radio radio-danger busq-radio" style="display:inline-block;">
            <input id="opc_busq_2" name="opc_busq" value="2" type="radio" />
            <label for="opc_busq_2">&nbsp;</label>
        </div>
    </div>
    <div class="col-sm-2 bloque_busq_4">
        <input id="cedula_atn_busq" name="cedula_atn_busq" type="text"  class="int form-control" title="Cedula" maxlength="10" tabindex="1" placeholder="Cedula"/>
    </div>



    <!--CEDULA DE QUIEN ATENDIO-->
    <div class="col-sm-1 bloque_busq_5" style="width:30px;">
        <div class="radio radio-danger busq-radio" style="display:inline-block;">
            <input id="opc_busq_5" name="opc_busq" value="5" type="radio" />
            <label for="opc_busq_5">&nbsp;</label>
        </div>
    </div>
    <div class="col-sm-3 bloque_busq_5">
        <select id="cedula_real_busq" name="cedula_real_busq" class="" title="Realizado" tabindex="" style="width:250px;"></select>
    </div>



    <!--EDAD DEL ATENDIDO-->
    <div class="col-sm-1 bloque_busq_6" style="width:30px;">
        <div class="radio radio-danger busq-radio" style="display:inline-block;">
            <input id="opc_busq_7" name="opc_busq" value="7" type="radio" />
            <label for="opc_busq_7">&nbsp;</label>
        </div>
    </div>
    <div class="col-sm-2 bloque_busq_6">
        <select id="edad_busq" name="edad_busq" class="" title="Seleccione Edad" tabindex="1" style="width:150px;">
            <option value="">Edad</option>
            <?php
                $result = mysql_query("SELECT DISTINCT DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(f_nacimiento)), '%Y')+0 AS n FROM atendido ORDER BY n ASC;", $link);
                while ($row = mysql_fetch_array($result)) {
                    if($row[0] != NULL) {
                        echo "<option value=\"{$row[0]}\">{$row[0]}</option>";
                    } else {
                        echo "<option value=\"-1\">No Presento</option>";
                    }
                }
            ?>
        </select>
    </div>





</div>

<div class="form-group has-success">


    <!--MUNICIPIO-->
    <div class="col-sm-1 bloque_busq_7" style="width:30px;">
        <div class="radio radio-danger busq-radio" style="display:inline-block;">
            <input id="opc_busq_3" name="opc_busq" value="3" type="radio" />
            <label for="opc_busq_3">&nbsp;</label>
        </div>
    </div>
    <div class="col-sm-3 bloque_busq_7">
        <select id="municipio_atn_busq" name="municipio_atn_busq" class="" title="Municipios" tabindex="" style="width:240px;" >
            <option value="0">Municipios</option><option value="m1">Andrés Bello</option><option value="m2">Boconó</option><option value="m3">Bolívar</option>
            <option value="m4">Candelaria</option><option value="m5">Carache</option><option value="m6">Escuque</option>
            <option value="m7">José Felipe Márquez Cañizalez</option><option value="m8"> Juan Vicente Campos Elías</option><option value="m9">La Ceiba</option>
            <option value="m10">Miranda</option><option value="m11">Monte Carmelo</option><option value="m12">Motatán</option>
            <option value="m13">Pampán</option><option value="m14">Pampanito</option><option value="m15">Rafael Rangel</option><option value="m16">San Rafael de Carvajal</option>
            <option value="m17">Sucre</option><option value="m18">Trujillo</option><option value="m19">Urdaneta</option>
            <option value="m20">Valera</option>
        </select>
    </div>
    
    <!--PARROQUIA-->
    <div class="col-sm-1 bloque_busq_8" style="width:30px;">
        <div class="radio radio-danger busq-radio" style="display:inline-block;">
            <input id="opc_busq_4" name="opc_busq" value="4" type="radio" />
            <label for="opc_busq_4">&nbsp;</label>
        </div>
    </div>
    <div class="col-sm-3 bloque_busq_8">
        <select id="parroquia_atn_busq" name="parroquia_atn_busq" title="Parroquias" tabindex="7" style="width:100%;">
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
        <input id="btn_busq" type="button" class="btn btn-danger btn-sm btn_2" title="Buscar" tabindex="" value="Buscar" />
        &nbsp;&nbsp;&nbsp;
        <input id="imp_busq" type="button" class="btn btn-danger btn-sm btn_2" title="Imprimir" tabindex="" value="Imprimir" />
        <input name="vector" type="hidden" value="" />
    </div>



</div>