<?php
    
    include_once "sesion.php";

    include_once "conexion.php";

    date_default_timezone_set("America/Caracas");

    $sesion = new sesion($link);
   
    $sesion->cookie_post();

	switch($_POST['sub_form'])
    {
		case 'ar_01':

            $result = mysql_query("SELECT id, fecha FROM medicina ORDER BY id DESC LIMIT 1;",$link);
            $row = mysql_fetch_array($result);

			echo '<input id="n_01" name="n_01" type="text"  class="int" title="Numero" maxlength="6" tabindex="" placeholder="Numero" value="'. ($row[0] + 1) .'" readonly />'.
                '<label for="fecha_01">Fecha: </label><input id="fecha_01" name="fecha_01" type="date"  class="" title="Fecha" tabindex="8" value="'. $row[1] .'" />'.
                '<input id="refe_01" name="refe_01" type="text"  class="" title="Referido" maxlength="100" tabindex="9" placeholder="Referido" /><br />'.
                '<textarea id="diag_01" name="diag_01" class="" title="Diagnostico" maxlength="100" tabindex="10" style="width:200px;height:50px;" placeholder="Diagnostico"></textarea>'.
                '<textarea id="obse_01" name="obse_01" class="" title="Observación" maxlength="130" tabindex="11" style="width:200px;height:50px;" placeholder="Observación"></textarea>';
        break;
        case 'ar_02':

            $result = mysql_query("SELECT id, desde, hasta FROM capacitacion ORDER BY id DESC LIMIT 1;",$link);
            $row = mysql_fetch_array($result);

            echo '<input id="n_02" name="n_02" type="text"  class="int" title="Numero Curso" maxlength="6" tabindex="" placeholder="Numero" value="'. ($row[0] + 1) .'" readonly />'.
                '<input id="arti_02" name="arti_02" type="text"  class="" title="Articula" maxlength="100" tabindex="8" placeholder="Articula" />'.
                '<label for="desd_02">Desde: </label><input id="desd_02" name="desd_02" type="date"  class="" title="Desde" tabindex="9" value="'. $row[1] .'" />'.
                '<label for="hast_02">Hasta: </label><input id="hast_02" name="hast_02" type="date"  class="" title="Hasta" tabindex="10" value="'. $row[2] .'" />'.
                '<input id="h_02" name="h_02" type="text"  class="int" title="Numero Horas" maxlength="2" tabindex="11" placeholder="Horas" />'.
                '<input id="real_02" name="real_02" type="text"  class="int" title="Realizado" maxlength="10" tabindex="17" placeholder="Realizado" /><br />'.
                '<select id="acti_02" name="acti_02" class="" title="Actividades" tabindex="12" style="width:250px;">'.
                    '<option value="0">Actividades</option><option value="cap_02_01">Nociones Basicas de Costura</option><option value="cap_02_02">Lenceria de Baño</option>'.
                    '<option value="cap_01_03">Lenceria de Cocina</option><option value="cap_02_04">Basico de Cortinas</option><option value="cap_02_05">Ganchos Decorativos</option>'.
                    '<option value="cap_02_06">Peluqueria</option><option value="cap_02_07">Decoracion de Fiestas Infantiles</option><option value="cap_02_08">Tecnicas de Dibujo</option>'.
                    '<option value="cap_02_09">Tallado en Anime</option><option value="cap_02_10">Piñateria Avanzada</option><option value="cap_02_11">Elaboracion de Cintillos</option>'.
                    '<option value="cap_02_12">Manualidades con Materiales Alternativos</option><option value="cap_02_13">Teatro</option>'.
                '</select>&nbsp;&nbsp;&nbsp;'.
				'<label for="fem_02">F: </label><input id="fem_02" name="fem_02" type="text"  class="int" title="N° Femeninas" maxlength="3" tabindex="13" value="0" onfocus="$(this).val(null);" style="width:50px;" />&nbsp;&nbsp;&nbsp;'.
				'<label for="mas_02">M: </label><input id="fen_02" name="mas_02" type="text"  class="int" title="N° Masculinos" maxlength="3" tabindex="14" value="0" onfocus="$(this).val(null);" style="width:50px;" />&nbsp;&nbsp;&nbsp;'.
				'<select id="municipio_02" name="municipio_02" class="" title="Municipios" tabindex="15">'.
                    '<option value="0">Municipios</option><option value="m1">Andrés Bello</option><option value="m2">Boconó</option><option value="m3">Bolívar</option>
                    <option value="m4">Candelaria</option><option value="m5">Carache</option><option value="m6">Escuque</option>
                    <option value="m7">José Felipe Márquez Cañizalez</option><option value="m8"> Juan Vicente Campos Elías</option><option value="m9">La Ceiba</option>
                    <option value="m10">Miranda</option><option value="m11">Monte Carmelo</option><option value="m12">Motatán</option>
                    <option value="m13">Pampán</option><option value="m14">Pampanito</option><option value="m15">Rafael Rangel</option><option value="m16">San Rafael de Carvajal</option>
                    <option value="m17">Sucre</option><option value="m18">Trujillo</option><option value="m19">Urdaneta</option>
                    <option value="m20">Valera</option>'.
                '</select>&nbsp;&nbsp;&nbsp;'.
				'<select id="parroquia_02" name="parroquia_02" class="" title="Parroquias" tabindex="16" style="width:250px;">'.
                    '<option value="0">Parroquias</option>'.
                '</select><br />'.
                '<textarea id="obse_02" name="obse_02" class="" title="Observación" maxlength="130" tabindex="18" style="width:200px;height:50px;" placeholder="Observación"></textarea>';
        break;
        case 'ar_03':

            $result = mysql_query("SELECT id, fecha FROM donacion ORDER BY id DESC LIMIT 1;",$link);
            $row = mysql_fetch_array($result);

            echo '<input id="n_03" name="n_03" type="text"  class="int" title="Numero" maxlength="6" tabindex="" placeholder="Numero" value="'. ($row[0] + 1) .'" readonly />'.
                '<label for="fecha_03">Fecha: </label><input id="fecha_03" name="fecha_03" type="date"  class="" title="Fecha" tabindex="8" value="'. $row[1] .'" /><br />'.
                '<select id="tipo_03" name="tipo_03" class="" title="Tipo" tabindex="9" style="width:250px;">'.
                    '<option value="don_03_01">Ferulas</option><option value="don_03_02">Protesis</option><option value="don_03_03">Medicamento</option>'.
                    '<option value="don_03_04">Silla de Ruedas</option><option value="don_03_05">Andadera</option><option value="don_03_06">Bastones</option>'.
                    '<option value="don_03_07">Colchon Orto.</option><option value="don_03_08">Aporte Eco.</option><option value="don_03_09">Examenes Medicos</option>'.
                    '<option value="don_03_10">Otros</option>'.
                '</select>'.
                '<input id="cant_03" name="cant_03" type="text"  class="int" title="Cantidad" maxlength="4" tabindex="10" placeholder="Cantidad" />'.
                '<input id="proc_03" name="proc_03" type="text"  class="" title="Procedencia" maxlength="50" tabindex="11" placeholder="Procedencia" />'.
                '<input id="mont_03" name="mont_03" type="text"  class="float" title="Monto" placeholder="Monto" tabindex="12" value="0" /><br />'.
                '<textarea id="obse_03" name="obse_03" class="" title="Observación" maxlength="130" tabindex="13" style="width:200px;height:50px;" placeholder="Observación"></textarea>';
        break;
        case 'ar_04':

            $result = mysql_query("SELECT id, fecha FROM ginecologia ORDER BY id DESC LIMIT 1;",$link);
            $row = mysql_fetch_array($result);

            echo '<input id="n_04" name="n_04" type="text"  class="int" title="Numero" maxlength="6" tabindex="" placeholder="Numero" value="'. ($row[0] + 1) .'" readonly />'.
                '<label for="fecha_04">Fecha: </label><input id="fecha_04" name="fecha_04" type="date"  class="" title="Fecha" tabindex="8" value="'. $row[1] .'" /><br />'.
                '<select id="acti_04" name="acti_04" class="" title="Actividad" tabindex="9" style="width:250px;">'.
                    '<option value="gin_04_01">Consult. Ginecologica</option><option value="gin_04_02">Consult. Prenatal</option><option value="gin_04_03">Citologia</option><option value="gin_04_04">Otros</option>'.
                '</select>'.
                '<input id="refe_04" name="refe_04" type="text"  class="" title="Referida" maxlength="100" tabindex="10" placeholder="Referida" />'.
                '<label for="cita_04">Cita: </label><input id="cita_04" name="cita_04" type="date"  class="" title="Cita" tabindex="11" /><br />'.
                '<textarea id="obse_04" name="obse_04" class="" title="Observación" maxlength="130" tabindex="12" style="width:200px;height:50px;" placeholder="Observación"></textarea>';
        break;
        case 'ar_05':

            $result = mysql_query("SELECT id, fecha FROM jornada ORDER BY id DESC LIMIT 1;",$link);
            $row = mysql_fetch_array($result);

            echo '<input id="n_05" name="n_05" type="text"  class="int" title="Numero" maxlength="6" tabindex="" placeholder="Numero" value="'. ($row[0] + 1) .'" readonly />'.
                '<label for="fecha_05">Fecha: </label><input id="fecha_05" name="fecha_05" type="date"  class="" title="Fecha" tabindex="8" value="'. $row[1] .'" />&nbsp;&nbsp;&nbsp;'.
				'<select id="municipio_05" name="municipio_05" class="" title="Municipios" tabindex="9">'.
                    '<option value="0">Municipios</option><option value="m1">Andrés Bello</option><option value="m2">Boconó</option><option value="m3">Bolívar</option>
                    <option value="m4">Candelaria</option><option value="m5">Carache</option><option value="m6">Escuque</option>
                    <option value="m7">José Felipe Márquez Cañizalez</option><option value="m8"> Juan Vicente Campos Elías</option><option value="m9">La Ceiba</option>
                    <option value="m10">Miranda</option><option value="m11">Monte Carmelo</option><option value="m12">Motatán</option>
                    <option value="m13">Pampán</option><option value="m14">Pampanito</option><option value="m15">Rafael Rangel</option><option value="m16">San Rafael de Carvajal</option>
                    <option value="m17">Sucre</option><option value="m18">Trujillo</option><option value="m19">Urdaneta</option>
                    <option value="m20">Valera</option>'.
                '</select>&nbsp;&nbsp;&nbsp;'.
				'<select id="parroquia_05" name="parroquia_05" class="" title="Parroquias" tabindex="10" style="width:250px;">'.
                    '<option value="0">Parroquias</option>'.
                '</select><br />'.
                '<label for="tipo_05">Tipo: </label><select id="tipo_05" name="tipo_05" class="" title="Tipos" tabindex="11" style="width:250px;">'.
                    '<option value="jor_05_t05">Jornada</option><option value="jor_05_t01">Social</option><option value="jor_05_t02">Gobernacion</option><option value="jor_05_t03">Instituto</option>'.
                    '<option value="jor_05_t04">Gobierno de Calle</option>'.
                '</select>'.
                '<label for="aten_05">Atendido: </label><select id="aten_05" name="aten_05" class="" title="Atencion" tabindex="12" style="width:250px;">'.
                    '<option value="0">Area</option><option value="jor_05_a01">Legal</option><option value="jor_05_a02">Social</option><option value="jor_05_a03">Psicologia</option>'.
                    '<option value="jor_05_a04">Medicina</option><option value="jor_05_a05">Capacitacion</option><option value="jor_05_a06">Ginecologia</option>'.
                '</select>&nbsp;&nbsp;&nbsp;'.
				'<label for="fem_05">F: </label><input id="fem_05" name="fem_05" type="text"  class="int" title="N° Femeninas" maxlength="3" tabindex="13" value="0" onfocus="$(this).val(null);" style="width:50px;" />&nbsp;&nbsp;&nbsp;'.
				'<label for="mas_05">M: </label><input id="fen_05" name="mas_05" type="text"  class="int" title="N° Masculinos" maxlength="3" tabindex="14" value="0" onfocus="$(this).val(null);" style="width:50px;" /><br />'.
                '<textarea id="obse_05" name="obse_05" class="" title="Observación" maxlength="130" tabindex="15" style="width:200px;height:50px;" placeholder="Observación"></textarea>';
        break;
        case 'ar_06':

            $result = mysql_query("SELECT id, fecha FROM legal ORDER BY id DESC LIMIT 1;",$link);
            $row = mysql_fetch_array($result);

            echo '<input id="n_06" name="n_06" type="text"  class="int" title="Numero" maxlength="6" tabindex="" placeholder="Numero" value="'. ($row[0] + 1) .'" readonly />'.
                '<label for="fecha_06">Fecha: </label><input id="fecha_06" name="fecha_06" type="date"  class="" title="Fecha" tabindex="8" value="'. $row[1] .'" /><br />'.
                '<select id="acti_06" name="acti_06" class="" title="Actividad" tabindex="9" style="width:250px;">'.
                    '<option value="0">ACTIVIDADES</option><option value="leg_06_20">Asesoria</option><option value="leg_06_04">Violencia Fisica</option>'.
                    '<option value="leg_06_01">Violencia Psicologica</option><option value="leg_06_02">Acoso u Hostigamiento</option><option value="leg_06_03">Amenaza</option>'.
                    '<option value="leg_06_05">Violencia Domestica</option><option value="leg_06_06">Violencia Sexual</option><option value="leg_06_07">Acceso Carnal Violento</option><option value="leg_06_08">Prostitucion Forzada</option>'.
                    '<option value="leg_06_09">Esclavitud Sexual</option><option value="leg_06_10">Acoso Sexual</option><option value="leg_06_11">Violencia Laboral</option><option value="leg_06_12">Violencia Patrimonial</option>'.
                    '<option value="leg_06_13">Violencia Obstetrica</option><option value="leg_06_14">Esterilizacion Forzada</option><option value="leg_06_15">Violencia Mediatica</option><option value="leg_06_16">Violencia Institucional</option>'.
                    '<option value="leg_06_17">Violencia Simbolica</option><option value="leg_06_18">Trafico de Mujeres, Niñas y Adolecentes</option><option value="leg_06_19">Trata de Mujeres y Adolecentes</option>'.
                '</select>'.
                '<input id="acti_06_tol" name="acti_06_tol" type="hidden" value="" />'.
                '<div id="acti_06_list" style="position:absolute;top:230px;left:700px;width:300px;height:150px;border:1px solid;overflow-y:scroll;font-size:13px;"></div><input id="acti_06_del" type="button" style="position:absolute;top:362px;left:1010px;width:22px;height:20px;" value="×" />'.
                '<input id="remi_06" name="remi_06" type="text"  class="" title="Remitido" maxlength="100" tabindex="10" placeholder="Remitido" />'.
                '<input id="real_06" name="real_06" type="text"  class="int" title="Realizado" tabindex="12" placeholder="Realizado" /><br />'.
                '<textarea id="obse_06" name="obse_06" class="" title="Observación" maxlength="130" tabindex="11" style="width:200px;height:50px;" placeholder="Observación"></textarea><span id="obse_opc_06" style="display:none;position:absolute;top:375px;background-color:#009CFF;font-size:13px;"></span>';
        break;
        case 'ar_07':

            $result = mysql_query("SELECT id, fecha FROM pediatria ORDER BY id DESC LIMIT 1;",$link);
            $row = mysql_fetch_array($result);

            echo '<input id="n_07" name="n_07" type="text"  class="int" title="Numero" maxlength="6" tabindex="" placeholder="Numero" value="'. ($row[0] + 1) .'" readonly />'.
                '<label for="fecha_07">Fecha: </label><input id="fecha_07" name="fecha_07" type="date"  class="" title="Fecha" tabindex="" value="'. $row[1] .'" />'.
                '<input id="remi_07" name="remi_07" type="text"  class="" title="Remitido" maxlength="100" tabindex="" placeholder="Remitido" /><br />'.
                '<textarea id="diag_07" name="diag_07" class="" title="Diagnostico" maxlength="100" tabindex="" style="width:200px;height:50px;" placeholder="Diagnostico"></textarea>';
        break;
        case 'ar_08':

            $result = mysql_query("SELECT id, fecha FROM proyecto ORDER BY id DESC LIMIT 1;",$link);
            $row = mysql_fetch_array($result);

            echo '<input id="n_08" name="n_08" type="text"  class="int" title="Numero" maxlength="6" tabindex="" placeholder="Numero" value="'. ($row[0] + 1) .'" readonly />'.
                '<label for="fecha_08">Fecha: </label><input id="fecha_08" name="fecha_08" type="date"  class="" title="Fecha" tabindex="8" value="'. $row[1] .'" />'.
                '<label for="opr_08">Operacion: </label><select id="opr_08" name="opr_08" class="" title="Orientacion" tabindex="9" style="width:250px;">'.
                    '<option value="pro_08_01">Informacion</option><option value="pro_08_02">Recepcion de Carpeta</option><option value="pro_08_03">Entrega de Carpeta</option>'.
                '</select><br />'.
                '<label for="">Procede: </label>&nbsp;&nbsp;<label for="proc_08_s">Si: </label>&nbsp;&nbsp;<input id="proc_08_s" name="proc_08" value="s" type="radio" />&nbsp;&nbsp;&nbsp;<label for="proc_08_n">No: </label>&nbsp;&nbsp;<input id="proc_08_s" name="proc_08" value="n" type="radio" checked />&nbsp;&nbsp;&nbsp;&nbsp;'.
                '<input id="rubr_08" name="rubr_08" type="text"  class="" title="Rubro" maxlength="100" tabindex="10" placeholder="Rubro" />'.
                '<input id="n_08_ex" name="n_08_ex" type="text"  class="" title="N° Expediente" maxlength="3" tabindex="11" placeholder="N° Expediente" />'.
                '<input id="mont_08" name="mont_08" type="text"  class="float" title="Monto" placeholder="Monto" tabindex="12" value="0" /><br />'.
                '<textarea id="obse_08" name="obse_08" class="" title="Observacion" maxlength="100" tabindex="13" style="width:200px;height:50px;" placeholder="Observacion"></textarea>';
        break;
        case 'ar_09':

            $result = mysql_query("SELECT id, fecha FROM psicologia ORDER BY id DESC LIMIT 1;",$link);
            $row = mysql_fetch_array($result);

            echo '<input id="n_09" name="n_09" type="text"  class="int" title="Numero" maxlength="6" tabindex="" placeholder="Numero" value="'. ($row[0] + 1) .'" readonly />'.
                '<label for="fecha_09">Fecha: </label><input id="fecha_09" name="fecha_09" type="date"  class="" title="Fecha" tabindex="8" value="'. $row[1] .'" /><br />'.
                '<label for="segu_09_s">Seguimiento: &nbsp;&nbsp;&nbsp; Si: </label><input id="segu_09_s" name="segu_09" type="radio" value="s" />&nbsp;&nbsp;&nbsp;<label for="segu_09_n">No: </label><input id="segu_09_n" name="segu_09" value="n" type="radio" checked />'.
                '&nbsp;&nbsp;&nbsp; <select id="acti_09" name="acti_09" class="" title="Actividad" tabindex="10" style="width:250px;">'.
                    '<option value="0">ACTIVIDADES</option>'.
                    '<option value="psi_09_a23">Evaluacion</option><option value="psi_09_a01">Violencia Psicologica</option><option value="psi_09_a20">Violencia verbal</option><option value="psi_09_a04">Violencia Fisica</option><option value="psi_09_a22">Orientacion</option><option value="psi_09_a02">Acoso u Hostigamiento</option><option value="psi_09_a03">Amenaza</option><option value="psi_09_a05">Violencia Domestica</option>'.
                    '<option value="psi_09_a06">Violencia Sexual</option><option value="psi_09_a07">Acceso Carnal Violento</option><option value="psi_09_a08">Prostitucion Forzada</option><option value="psi_09_a09">Esclavitud Sexual</option>'.
                    '<option value="psi_09_a10">Acoso Sexual</option><option value="psi_09_a11">Violencia Laboral</option><option value="psi_09_a12">Violencia Patrimonial</option><option value="psi_09_a13">Violencia Obstetrica</option>'.
                    '<option value="psi_09_a14">Esterilizacion Forzada</option><option value="psi_09_a15">Violencia Mediatica</option><option value="psi_09_a16">Violencia Institucional</option><option value="psi_09_a17">Violencia Simbolica</option>'.
                    '<option value="psi_09_a18">Trafico de Mujeres, Niñas y Adolecentes</option><option value="psi_09_a19">Trata de Mujeres y Adolecentes</option><option value="psi_09_a21">Evaluacion de Credito</option>'.
                '</select><br />'.
                '<input id="acti_09_tol" name="acti_09_tol" type="hidden" value="" />'.
                '<div id="acti_09_list" style="position:absolute;top:210px;left:700px;width:300px;height:150px;border:1px solid;overflow-y:scroll;font-size:13px;"></div><input id="acti_09_del" type="button" style="position:absolute;top:342px;left:1010px;width:22px;height:20px;" value="×" />'.
                '<input id="remi_p_09" name="remi_p_09" type="text"  class="" title="Remitido Por" maxlength="100" tabindex="11" placeholder="Remitido Por" />'.
                '<input id="remi_a_09" name="remi_a_09" type="text"  class="" title="Remitido A" placeholder="Remitido A" tabindex="12" /><span id="opc_remi_09" style="display:none;position:absolute;top:338px;background-color:#009CFF;font-size:13px;"></span>'.
                '<input id="real_09" name="real_09" type="text"  class="int" title="Realizado" placeholder="Realizado" tabindex="13" />';
        break;
        case 'ar_10':

            $result = mysql_query("SELECT id, fecha FROM sisdapro ORDER BY id DESC LIMIT 1;",$link);
            $row = mysql_fetch_array($result);

            echo '<input id="n_10" name="n_10" type="text"  class="int" title="Numero" maxlength="6" tabindex="" placeholder="Numero" value="'. ($row[0] + 1) .'" readonly />'.
                '<label for="fecha_10">Fecha: </label><input id="fecha_10" name="fecha_10" type="date"  class="" title="Fecha" tabindex="8" value="'. $row[1] .'" />'.
                '<input id="remi_10" name="remi_10" type="text"  class="" title="Remitido A" maxlength="100" tabindex="9" placeholder="Remitido A" />'.
                '<input id="cont_10" name="cont_10" type="text"  class="" title="Continuidad" maxlength="50" tabindex="10" placeholder="Continuidad" /><br />'.
                '<textarea id="desc_10" name="desc_10" class="" title="Descripcion" maxlength="100" tabindex="11" style="width:200px;height:50px;" placeholder="Descripcion"></textarea>';
        break;
        case 'ar_11':

            $result = mysql_query("SELECT id, fecha FROM social ORDER BY id DESC LIMIT 1;",$link);
            $row = mysql_fetch_array($result);

            echo '<input id="n_11" name="n_11" type="text"  class="int" title="Numero" maxlength="6" tabindex="" placeholder="Numero" value="'. ($row[0] + 1) .'" readonly />'.
                '<label for="fecha_11">Fecha: </label><input id="fecha_11" name="fecha_11" type="date"  class="" title="Fecha" tabindex="8" value="'. $row[1] .'" />'.
                '<input id="remi_11" name="remi_11" type="text"  class="" title="Remitido A" maxlength="100" tabindex="9" placeholder="Remitido A" />'.
                '<input id="real_11" name="real_11" type="text"  class="int" title="Realizado" placeholder="Realizado" tabindex="12" /><br />'.
                '<label for="proc_11_s">Procede: &nbsp;&nbsp;&nbsp; Si: </label><input id="proc_11_s" name="proc_11" type="radio" value="s" />&nbsp;&nbsp;&nbsp;<label for="proc_11_n">No: </label><input id="proc_11_n" name="proc_11" value="n" type="radio" checked /><br />'.
                '<textarea id="desc_11" name="desc_11" class="" title="Descripcion" maxlength="200" tabindex="10" style="width:200px;height:50px;" placeholder="Descripcion"></textarea>'.
                '<textarea id="obse_11" name="obse_11" class="" title="Observación" maxlength="130" tabindex="11" style="width:200px;height:50px;" placeholder="Observación"></textarea>';
        break;
        case 'ar_12':

            $result = mysql_query("SELECT id, fecha FROM taller ORDER BY id DESC LIMIT 1;",$link);
            $row = mysql_fetch_array($result);

            echo '<input id="n_12" name="n_12" type="text"  class="int" title="Numero" maxlength="6" tabindex="" placeholder="Numero" value="'. ($row[0] + 1) .'" readonly />'.
                '<label for="fecha_12">Fecha: </label><input id="fecha_12" name="fecha_12" type="date"  class="" title="Fecha" tabindex="8" value="'. $row[1] .'" />'.
                '<label for="tipo_12">Tipo: </label><select id="tipo_12" name="tipo_12" class="" title="Tipos" tabindex="9" style="width:250px;">'.
                    '<option value="tal_12_01">L.O.M</option><option value="tal_12_02">Valores</option><option value="tal_12_03">Violencia Intrafam.</option>'.
                    '<option value="tal_12_04">Edu. Sexual</option><option value="tal_12_05">Acoso Esco.</option><option value="tal_12_06">Com. Afect. Y Asert</option>'.
                    '<option value="tal_12_07">Maltra. Infantil</option><option value="tal_12_08">Auto Estima</option><option value="tal_12_09">Violencia Esco.</option>'.
                    '<option value="tal_12_10">Violencia de Genero</option><option value="tal_12_11">Otros</option>'.
                '</select>'.
                '<input id="arti_12" name="arti_12" type="text"  class="" title="Articula" maxlength="100" tabindex="10" placeholder="Articula" />'.
                '<input id="remi_12" name="remi_12" type="text"  class="" title="Remitido por" maxlength="100" tabindex="11" placeholder="Remitido por" /><br />'.
				'<select id="municipio_12" name="municipio_12" class="" title="Municipios" tabindex="12">'.
                    '<option value="0">Municipios</option><option value="m1">Andrés Bello</option><option value="m2">Boconó</option><option value="m3">Bolívar</option>
                    <option value="m4">Candelaria</option><option value="m5">Carache</option><option value="m6">Escuque</option>
                    <option value="m7">José Felipe Márquez Cañizalez</option><option value="m8"> Juan Vicente Campos Elías</option><option value="m9">La Ceiba</option>
                    <option value="m10">Miranda</option><option value="m11">Monte Carmelo</option><option value="m12">Motatán</option>
                    <option value="m13">Pampán</option><option value="m14">Pampanito</option><option value="m15">Rafael Rangel</option><option value="m16">San Rafael de Carvajal</option>
                    <option value="m17">Sucre</option><option value="m18">Trujillo</option><option value="m19">Urdaneta</option>
                    <option value="m20">Valera</option>'.
                '</select>&nbsp;&nbsp;&nbsp;'.
				'<select id="parroquia_12" name="parroquia_12" class="" title="Parroquias" tabindex="13" style="width:250px;">'.
                    '<option value="0">Parroquias</option>'.
                '</select>&nbsp;&nbsp;&nbsp;'.
                '<label for="fem_12">F: </label><input id="fem_12" name="fem_12" type="text"  class="int" title="N° Femeninas" maxlength="3" tabindex="14" value="0" onfocus="$(this).val(null);" style="width:50px;" />&nbsp;&nbsp;&nbsp;'.
				'<label for="mas_12">M: </label><input id="fen_12" name="mas_12" type="text"  class="int" title="N° Masculinos" maxlength="3" tabindex="15" value="0" onfocus="$(this).val(null);" style="width:50px;" />&nbsp;&nbsp;&nbsp;'.
				'<input id="real_12" name="real_12" type="text"  class="" title="Realizado" maxlength="10" tabindex="16" placeholder="Realizado" />&nbsp;&nbsp;&nbsp;'.
				'<input id="nombre_12" name="nombre_12" type="text"  class="" title="Nombre del Taller" maxlength="150" tabindex="17" placeholder="Nombre del Taller" style="width:250px;" /><br />'.
                '<textarea id="obse_12" name="obse_12" class="" title="Observación" maxlength="130" tabindex="18" style="width:200px;height:50px;" placeholder="Observación"></textarea>';
        break;
	}
?>