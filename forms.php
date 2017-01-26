<?php

    include_once "sesion.php";

    include_once "conexion.php";

    date_default_timezone_set("America/Caracas");

    $sesion = new sesion($link);
    
    $sesion->cookie_post();

    if(!isset($_GET['f']))
        $_GET['f'] = 0;

    if($_GET['f'] == 'u' && $_SESSION['grado'] > 1)
        $_GET['f'] = 0;

	switch($_GET['f'])
    {
        case '2':
        {
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
                "ar_10" => "<option value=\"ar_10\">Sisdapro</option>",
                "ar_11" => "<option value=\"ar_11\">Social</option>",
                "ar_12" => "<option value=\"ar_12\">Taller</option>",
            );
            $vec = array("Todos","ar_01","ar_02","ar_03","ar_04","ar_05","ar_06","ar_07","ar_08","ar_09","ar_10","ar_11","ar_12");
            $opc = ' ';

            if($_SESSION['area'] == '*')
                for($i=0;$i<13;$i++)
                    $opc .= $array[$vec[$i]];
            else
            {
                $porciones = explode(",", $_SESSION['area']);
                for($i=0;$i<count($porciones);$i++)
                    $opc .= $array[$porciones[$i]];
            }

            echo '<legend>Buscar</legend>'.
                '<label for="sel_area_busq">Seleccione Area: </label><select id="sel_area_busq" name="" class="" title="Seleccione Area" tabindex="1" style="width:250px;" autofocus>'.
                    '<option value="0">Seleccione Area</option>'.
                    $opc.
                '</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
                '<label for="desd_busq">Desde: </label><input id="desd_busq" name="" type="date"  class="" title="Desde" tabindex="" />'.
                '<label for="hast_busq">Hasta: </label><input id="hast_busq" name="" type="date"  class="" title="Hasta" tabindex="" />'.
                '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="" name="opc_busq" value="1" type="radio" checked /><label for="">Buscar solo por fecha</label><br />'.
                '<input id="nom_ped_atn_busq" name="nom_ped_atn_busq" type="text"  class="" title="Buscar Nombres Pediatria" maxlength="45" tabindex="1" placeholder="Buscar Nombres Pediatria" style="width:300px;" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
				'<input id="" name="opc_busq" value="6" type="radio" /><select id="acti_busq" name="acti_busq" class="" title="Actividad" tabindex="" style="width:250px;">'.
                    '<option value="01">Violencia Psicologica</option><option value="04">Violencia Fisica</option><option value="02">Acoso u Hostigamiento</option><option value="03">Amenaza</option><option value="05">Violencia Domestica</option>'.
                    '<option value="06">Violencia Sexual</option><option value="07">Acceso Carnal Violento</option><option value="08">Prostitucion Forzada</option><option value="09">Esclavitud Sexual</option>'.
                    '<option value="10">Acoso Sexual</option><option value="11">Violencia Laboral</option><option value="12">Violencia Patrimonial</option><option value="13">Violencia Obstetrica</option>'.
                    '<option value="14">Esterilizacion Forzada</option><option value="15">Violencia Mediatica</option><option value="16">Violencia Institucional</option><option value="17">Violencia Simbolica</option>'.
                    '<option value="18">Trafico de Mujeres, Niñas y Adolecentes</option><option value="19">Trata de Mujeres y Adolecentes</option>'.
                '</select><br />'.
                '<input id="" name="opc_busq" value="2" type="radio" /><input id="cedula_atn_busq" name="cedula_atn_busq" type="text"  class="int" title="Cedula" maxlength="10" tabindex="1" placeholder="Cedula"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
                '<input id="" name="opc_busq" value="3" type="radio" /><select id="municipio_atn_busq" name="municipio_atn" class="" title="Municipios" tabindex="6">'.
                    '<option value="0">Municipios</option><option value="m1">Andrés Bello</option><option value="m2">Boconó</option><option value="m3">Bolívar</option>
                    <option value="m4">Candelaria</option><option value="m5">Carache</option><option value="m6">Escuque</option>
                    <option value="m7">José Felipe Márquez Cañizalez</option><option value="m8"> Juan Vicente Campos Elías</option><option value="m9">La Ceiba</option>
                    <option value="m10">Miranda</option><option value="m11">Monte Carmelo</option><option value="m12">Motatán</option>
                    <option value="m13">Pampán</option><option value="m14">Pampanito</option><option value="m15">Rafael Rangel</option><option value="m16">San Rafael de Carvajal</option>
                    <option value="m17">Sucre</option><option value="m18">Trujillo</option><option value="m19">Urdaneta</option>
                    <option value="m20">Valera</option>'.
                '</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
                '<input id="" name="opc_busq" value="4" type="radio" /><select id="parroquia_atn_busq" name="parroquia_atn" class="" title="Parroquias" tabindex="7" style="width:250px;">'.
                    '<option value="0">Parroquias</option>'.
                '</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
                '<input id="" name="opc_busq" value="5" type="radio" /><input id="cedula_real_busq" name="cedula_real_busq" type="text" class="int" title="Cedula Realizador" maxlength="10" tabindex="1" placeholder="Cedula Realizador" style="width:200px;" />&nbsp;&nbsp;&nbsp;'.
                '<input id="btn_busq" type="button" class="" title="Buscar" tabindex="" value="Buscar" style="width:100px;" />&nbsp;&nbsp;&nbsp;'.
				'<input id="imp_busq" type="button" class="" title="Imprimir" tabindex="" value="Imprimir" style="width:100px;" /><br>'.
				'<input name="vector" type="hidden" value="" />'.
                '<div id="resultados" style="position:absolute;top:170px;left:9px;width:1200px;height:330px;"></div>';
        }
        break;

        case '3':
        {
            echo '<legend>Usuarios</legend>'.
                '<input id="cedula_us" name="cedula_us" type="text"  class="int" title="Cedula" maxlength="10" tabindex="1" placeholder="Cedula" autofocus/>'.
                '<input id="nombre_us" name="nombre_us" type="text"  class="" title="Nombre" maxlength="45" tabindex="2" placeholder="Nombre" />'.
                '<input id="apellido_us" name="apellido_us" type="text"  class="" title="Apellido" maxlength="45" tabindex="3" placeholder="Apellido" />'.
                '&nbsp;&nbsp;&nbsp;<label for="pass_us">Clave: </label><input id="pass_us" name="pass_us" type="password"  class="" title="clave" tabindex="4" />'.
                '&nbsp;&nbsp;&nbsp;<label for="tipo_us">Tipo: </label><input id="tipo_us" name="tipo_us" type="number" min="1" max="3" step="1" value="3" class="" title="Tipo" tabindex="5" style="widht:40px;height:28px;" /><br>'.
                '<label for="">Seleccione Areas</label><br /><br />'.
                '<table border="0" cellspacing="8" cellpadding="8">'.
                '<tr><td><label for="ar1">Medicina:</label></td><td><input id="ar1" name="" value="ar_01" type="checkbox" /></td>'.
                '<td><label for="ar2">Capacitacion:</label></td><td><input id="ar2" name="" value="ar_02" type="checkbox" /></td>'.
                '<td><label for="ar3">Donacion:</label></td><td><input id="ar3" name="" value="ar_03" type="checkbox" /></td></tr>'.
                '<tr><td><label for="ar4">Ginecologia:</label></td><td><input id="ar4" name="" value="ar_04" type="checkbox" /></td>'.
                '<td><label for="ar5">Jornada:</label></td><td><input id="ar5" name="" value="ar_05" type="checkbox" /></td>'.
                '<td><label for="ar6">Legal:</label></td><td><input id="ar6" name="" value="ar_06" type="checkbox" /></td></tr>'.
                '<tr><td><label for="ar7">Pediatria:</label></td><td><input id="ar7" name="" value="ar_07" type="checkbox" /></td>'.
                '<td><label for="ar8">Proyecto:</label></td><td><input id="ar8" name="" value="ar_08" type="checkbox" /></td>'.
                '<td><label for="ar9">Psicologia:</label></td><td><input id="ar9" name="" value="ar_09" type="checkbox" /></td></tr>'.
                '<tr><td><label for="ar10">Sisdapro:</label></td><td><input id="ar10" name="" value="ar_10" type="checkbox" /></td>'.
                '<td><label for="ar11">Social:</label></td><td><input id="ar11" name="" value="ar_11" type="checkbox" /></td>'.
                '<td><label for="ar12">Taller:</label></td><td><input id="ar12" name="" value="ar_12" type="checkbox" /></td></tr>'.
                '<tr><td><label for="ar13">Todos:</label></td><td><input id="ar13" name="" value="*" type="checkbox" /></td></tr></table>'.
                '<hr style="width:800px;" /><br>'.
                '<input id="opr_area" name="opr_area" type="hidden" value="us" />'.
                '<input id="area_us" name="area_us" type="hidden" value="" />'.
                '<input id="send_us" type="button" class="btn_2" title="Guardar" tabindex="8" value="Guardar" style="width:100px;" />'.
                '<input id="edit_us" type="button" class="btn_3" title="Editar" tabindex="9" value="Editar" data-opr="t1" style="width:100px;" disabled />'.
                '<input id="elim_us" type="button" class="btn_4" title="Eliminar" tabindex="10" value="Eliminar" data-opr="t1" style="width:100px;" disabled />'.
                '<input id="canc_us" type="button" class="btn_cancelar" title="Cancelar" tabindex="9" value="Cancelar" style="width:100px;">'.
                '<script>Tconculta_hide();</script>';
        }
        break;

		case '4':
        {
            echo '<legend>Archivo Digital</legend>'.
				'<input id="cedula_atn_arch" name="cedula_atn_arch" type="text"  class="int" title="Cedula" maxlength="10" tabindex="1" placeholder="Cedula" autofocus disabled/><br>'.
				'<input id="archivo" name="archivo" type="file"  class="" title="" tabindex="2" placeholder=""/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.
				'<input id="btn_save" type="button" class="" title="Guardar" tabindex="3" value="Guardar" tabindex="3" style="width:100px;" />'.
				'<input name="opr_area" id="opr_area" type="hidden" value="archivo">'.
				'<input name="opr" id="opr" type="hidden" value="i">'.
				'<input name="arch_del" id="arch_del" type="hidden" value="">'.
                '<div id="resultados_arch" style="position:absolute;top:120px;left:9px;width:1200px;height:330px;"></div>';
        }
        break;
		
		default:
        {
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
                "ar_10" => "<option value=\"ar_10\">Sisdapro</option>",
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

			echo '<legend>Atención</legend>'.
                '<input id="cedula_atn" name="cedula_atn" type="text"  class="int form-horizontal" title="Cedula" maxlength="10" tabindex="1" placeholder="Cedula" autofocus/>'.
                '<input id="nombre_atn" name="nombre_atn" type="text"  class="" title="Nombre" maxlength="45" tabindex="2" placeholder="Nombre" value="" />'.
                '<input id="apellido_atn" name="apellido_atn" type="text"  class="" title="Apellido" maxlength="45" tabindex="3" placeholder="Apellido" />'.
                '&nbsp;&nbsp;&nbsp;<label for="f_nac_atn">Fecha de Nacimiento: </label><input id="f_nac_atn" name="f_nac_atn" type="date"  class="" title="Fecha de Nacimiento" tabindex="4" /><br>'.
                '<label for="sex_mas">Masculino: </label>&nbsp;&nbsp;<input id="sex_mas" name="sexo_atn" value="m" type="radio" />&nbsp;&nbsp;&nbsp;<label for="sex_fen">Femenino: </label>&nbsp;&nbsp;<input id="sex_fen" name="sexo_atn" value="f" type="radio" checked />'.
                '&nbsp;&nbsp;&nbsp;&nbsp;<input id="telefono_atn" name="telefono_atn" type="text"  class="" title="Telefono" maxlength="130" tabindex="" placeholder="Telefono"  />'.
                '<select id="municipio_atn" name="municipio_atn" class="" title="Municipios" tabindex="5">'.
                    '<option value="0">Municipios</option><option value="m1">Andrés Bello</option><option value="m2">Boconó</option><option value="m3">Bolívar</option>
                    <option value="m4">Candelaria</option><option value="m5">Carache</option><option value="m6">Escuque</option>
                    <option value="m7">José Felipe Márquez Cañizalez</option><option value="m8"> Juan Vicente Campos Elías</option><option value="m9">La Ceiba</option>
                    <option value="m10">Miranda</option><option value="m11">Monte Carmelo</option><option value="m12">Motatán</option>
                    <option value="m13">Pampán</option><option value="m14">Pampanito</option><option value="m15">Rafael Rangel</option><option value="m16">San Rafael de Carvajal</option>
                    <option value="m17">Sucre</option><option value="m18">Trujillo</option><option value="m19">Urdaneta</option>
                    <option value="m20">Valera</option>'.
                '</select>'.
                '<select id="parroquia_atn" name="parroquia_atn" class="" title="Parroquias" tabindex="6" style="width:250px;">'.
                    '<option value="0">Parroquias</option>'.
                '</select>&nbsp;&nbsp;&nbsp;'.
				'<input id="edit" type="button" class="btn_2" title="Editar" tabindex="" value="Editar" style="width:100px;" /><br>'.
                '<hr style="width:800px;" /><br>'.
                '<label for="sel_area">Seleccione Area: </label><select id="sel_area" name="" class="" title="Seleccione Area" tabindex="7" style="width:250px;">'.
                    '<option value="0">Seleccione Area</option>'.
                    $opc.
                '</select><br>'.
                '<div id="sub_form"></div>'.
                '<hr style="width:800px;" /><br>'.
                '<input id="opr_area" name="opr_area" type="hidden" value="0" />'.
                '<input id="send" type="button" class="btn_2" title="Guardar" tabindex="" value="Guardar" style="width:100px;" />'.
                '<input id="edit_ing" type="button" class="btn_3" title="Editar" tabindex="" value="Editar" data-opr="t1" style="width:100px;" disabled />'.
                '<input id="elim" type="button" class="btn_4" title="Eliminar" tabindex="" value="Eliminar" data-opr="t1" style="width:100px;" disabled />'.
                '<input id="canc" type="button" class="btn_cancelar" title="Cancelar" tabindex="" value="Cancelar" style="width:100px;">'.
                '<div id="capa_one"></div>'.
                '<div id="capa_two">'.
                    '<div id="cont_capa_two" style="display:none;">'.
                        '<table border="1" id="tab_cont_capa_two"><tbody></tbody></table>'.
                    '</div>'.
                '</div>'.
                '<script>Tconculta_hide();</script>';
        }
        break;
	}
?>