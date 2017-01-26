<?php

    include_once "conexion.php";

    $array = array(
        "ar_01" => "<option value=\"ar_01\">Medicina</option>",
        "ar_02" => "<option value=\"ar_02\">Capacitación</option>",
        "ar_03" => "<option value=\"ar_03\">Donación</option>",
        "ar_04" => "<option value=\"ar_04\">Ginecologia</option>",
        "ar_05" => "<option value=\"ar_05\">Jornada</option>",
        "ar_06" => "<option value=\"ar_06\">Legal</option>",
        "ar_07" => "<option value=\"ar_07\">Pediatria</option>",
        "ar_08" => "<option value=\"ar_08\">Proyecto</option>",
        "ar_09" => "<option value=\"ar_09\">Psicologia</option>",
        "ar_10" => "<option value=\"ar_10\">Atencion al Ciudadano</option>",
        "ar_11" => "<option value=\"ar_11\">Social</option>",
        "ar_12" => "<option value=\"ar_12\">Taller</option>",
    );
    $vec = array("ar_01","ar_02","ar_03","ar_04","ar_05","ar_06","ar_07","ar_08","ar_09","ar_10","ar_11","ar_12");
    $opc = ' ';

    if($_SESSION['area'] == '*')
        for($i=0;$i<12;$i++)
            $opc .= $array[$vec[$i]];
    else
    {
        $porciones = explode(",", $_SESSION['area']);
        for($i=0;$i<count($porciones);$i++)
            $opc .= $array[$porciones[$i]];
    }
    
?>
<legend>Atención<!--&nbsp;&nbsp;-&nbsp;&nbsp;<span>Nombre</span>--></legend>
<!--<form id="f1" class="form-horizontal" role="form" method="post" action="?">-->
<div class="form-group has-success">
    <!--<label class="col-sm-1 control-label">Cedula</label>-->
    <div class="col-sm-2">
        <input id="cedula_atn" name="cedula_atn" type="text" class="int form-control" title="Cedula" placeholder="Cedula" maxlength="10" tabindex="1" autofocus />
    </div>
    <div class="col-sm-6">
        <input id="nombres_atn" name="nombres_atn" type="text"  class="form-control" title="Nombre" placeholder="Nombres" maxlength="255" tabindex="2" />
    </div>
    <div class="col-sm-3">
        <input id="f_nac_atn" name="f_nac_atn" type="text"  class="form-control" type-data="input_date" title="Fecha de Nacimiento" placeholder="Fecha de Nacimiento" maxlength="10" tabindex="4" />
        <small>Ingreso correcto de fecha <b>dd-mm-aaaa</b></small>
    </div>
</div>
<div class="form-group has-success has-feedback">
    <div class="col-sm-2">
        <div class="radio radio-success" style="display:inline-block;">
            <input id="sex_mas" name="sexo_atn" value="m" type="radio" />
            <label for="sex_mas">M</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="radio radio-success" style="display:inline-block;">
            <input id="sex_fen" name="sexo_atn" value="f" type="radio" checked />
            <label for="sex_fen">F</label>
        </div>
    </div>
    <div class="col-sm-3">
        <input id="telefono_atn" name="telefono_atn" type="text"  class="form-control" title="Telefono" placeholder="Telefono" maxlength="120" tabindex="" />
    </div>
    <div class="col-sm-6">
        <select id="procedencia_atn" name="procedencia_atn" tabindex="5" style="width:100%;">
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
    <div class="col-sm-1">
        <input id="edit" type="button" class="btn btn-warning btn-sm btn_2" title="Editar" tabindex="" value="Editar" style="width:100px;"/>
    </div>
</div>
<div class="form-group has-success">
    <div class="col-sm-1">
        <select id="sel_area" name="" class="" title="Seleccione Area" tabindex="7" style="width:250px;">'.
            <option value="0">Seleccione Area</option>
            <?php echo $opc; ?>
        </select>
    </div>
</div><br><br>
<div id="sub_form"></div>
<div class="form-group has-success">
    <div class="col-sm-3">
        <input id="opr_area" name="opr_area" type="hidden" value="0" />
        <button id="send" type="button" class="btn btn-success btn-sm">Guardar</button>&nbsp;&nbsp;&nbsp;
        <button id="canc" type="button" class="btn btn-default btn-sm">Cancelar</button>
    </div>
</div>
<div id="capa_one"></div>
<div id="capa_two">
    <div id="cont_capa_two" style="display:none;">
        <table border="1" id="tab_cont_capa_two"><tbody></tbody></table>
    </div>
</div>
<div id="cne" style="display:none;"></div>
<!--<script>Tconculta_hide();</script>-->