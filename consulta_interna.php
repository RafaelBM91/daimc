<?php

    include_once "sesion.php";

    include_once "conexion.php";

    date_default_timezone_set("America/Caracas");

    $sesion = new sesion($link);

    $sesion->cookie_post();

    if(isset($_POST['cedula_atn']) && !empty($_POST['cedula_atn']))
    {
    	$result = mysql_query("SELECT cedula,nombres,DATE_FORMAT(f_nacimiento,'%d-%m-%Y'),sexo,procedencia,telefono FROM atendido WHERE cedula = '{$_POST['cedula_atn']}' LIMIT 1;",$link);
        $row = mysql_fetch_array($result);
        echo json_encode($row);
    }

    function municipios($m)
    {
        switch($m)
        {
            case 'm1': return "Andrés Bello"; break;
            case 'm2': return "Boconó"; break;
            case 'm3': return "Bolívar"; break;
            case 'm4': return "Candelaria"; break;
            case 'm5': return "Carache"; break;
            case 'm6': return "Escuque"; break;
            case 'm7': return "José Felipe Márquez Cañizalez"; break;
            case 'm8': return "Juan Vicente Campos Elías"; break;
            case 'm9': return "La Ceiba"; break;
            case 'm10': return "Miranda"; break;
            case 'm11': return "Monte Carmelo"; break;
            case 'm12': return "Motatán"; break;
            case 'm13': return "Pampán"; break;
            case 'm14': return "Pampanito"; break;
            case 'm15': return "Rafael Rangel"; break;
            case 'm16': return "San Rafael de Carvajal"; break;
            case 'm17': return "Sucre"; break;
            case 'm18': return "Trujillo"; break;
            case 'm19': return "Urdaneta"; break;
            case 'm20': return "Valera"; break;
        }
    }

    function parroquias($p)
    {
        switch($p)
        {
            case 'm1_p1': return "Araguaney"; break;
            case 'm1_p2': return "El Jaguito"; break;
            case 'm1_p3': return "La Esperanza"; break;
            case 'm1_p4': return "Santa Isabel"; break;
            case 'm2_p1': return "Boconó"; break;
            case 'm2_p2': return "El Carmen"; break;
            case 'm2_p3': return "Mosquey"; break;
            case 'm2_p4': return "Ayacucho"; break;
            case 'm2_p5': return "Burbusay"; break;
            case 'm2_p6': return "General Ribas"; break;
            case 'm2_p7': return "Guaramacal"; break;
            case 'm2_p8': return "Vega de Guaramacal"; break;
            case 'm2_p9': return "Monseñor Jáuregui"; break;
            case 'm2_p10': return "Rafael Rangel"; break;
            case 'm2_p11': return "San Miguel"; break;
            case 'm2_p12': return "San José"; break;
            case 'm3_p1': return "Sabana Grande"; break;
            case 'm3_p2': return "Cheregüé"; break;
            case 'm3_p3': return "Granados"; break;
            case 'm4_p1': return "Arnoldo Gabaldón"; break;
            case 'm4_p2': return "Bolivia"; break;
            case 'm4_p3': return "Carrillo"; break;
            case 'm4_p4': return "Cegarra"; break;
            case 'm4_p5': return "Chejendé"; break;
            case 'm4_p6': return "Manuel Salvador Ulloa"; break;
            case 'm4_p7': return "San José"; break;
            case 'm5_p1': return "Carache"; break;
            case 'm5_p2': return "La Concepción"; break;
            case 'm5_p3': return "Cuicas"; break;
            case 'm5_p4': return "Panamericana"; break;
            case 'm5_p5': return "Santa Cruz"; break;
            case 'm6_p1': return "Escuque"; break;
            case 'm6_p2': return "La Unión (El Alto Escuque)"; break;
            case 'm6_p3': return "Santa Rita"; break;
            case 'm6_p4': return "Sabana Libre"; break;
            case 'm7_p5': return "El Socorro"; break;
            case 'm7_p6': return "Los Caprichos"; break;
            case 'm7_p7': return "Antonio José de Sucre"; break;
            case 'm8_p1': return "Campo Elías"; break;
            case 'm8_p2': return "Arnoldo Gabaldón"; break;
            case 'm9_p1': return "Santa Apolonia"; break;
            case 'm9_p2': return "El Progreso"; break;
            case 'm9_p3': return "La Ceiba"; break;
            case 'm9_p4': return "Tres de Febrero"; break;
            case 'm10_p1': return "El Dividive"; break;
            case 'm10_p2': return "Agua Santa"; break;
            case 'm10_p3': return "Agua Caliente"; break;
            case 'm10_p4': return "El Cenizo"; break;
            case 'm10_p5': return "Valerita"; break;
            case 'm11_p1': return "Monte Carmelo"; break;
            case 'm11_p2': return "Buena Vista"; break;
            case 'm11_p3': return "Santa María del Horcón"; break;
            case 'm12_p1': return "Motatán"; break;
            case 'm12_p2': return "El Baño"; break;
            case 'm12_p3': return "Jalisco"; break;
            case 'm13_p1': return "Pampán"; break;
            case 'm13_p2': return "Flor de Patria"; break;
            case 'm13_p3': return "La Paz"; break;
            case 'm13_p4': return "Santa Ana"; break;
            case 'm14_p1': return "Pampanito"; break;
            case 'm14_p2': return "La Concepción"; break;
            case 'm14_p3': return "Pampanito II"; break;
            case 'm15_p1': return "Betijoque"; break;
            case 'm15_p2': return "José Gregorio Hernández"; break;
            case 'm15_p3': return "La Pueblita"; break;
            case 'm15_p4': return "Los Cedros"; break;
            case 'm16_p1': return "Carvajal"; break;
            case 'm16_p2': return "Campo Alegre"; break;
            case 'm16_p3': return "Antonio Nicolás Briceño"; break;
            case 'm16_p4': return "José Leonardo Suárez"; break;
            case 'm17_p1': return "Sabana de Mendoza"; break;
            case 'm17_p2': return "Junín"; break;
            case 'm17_p3': return "Valmore Rodríguez"; break;
            case 'm17_p4': return "El Paraíso"; break;
            case 'm18_p1': return "Andrés Linares"; break;
            case 'm18_p2': return "Chiquinquirá"; break;
            case 'm18_p3': return "Cristóbal Mendoza"; break;
            case 'm18_p4': return "Cruz Carrillo"; break;
            case 'm18_p5': return "Matriz"; break;
            case 'm18_p6': return "Monseñor Carrillo"; break;
            case 'm18_p7': return "Tres Esquinas"; break;
            case 'm19_p1': return "Cabimbú"; break;
            case 'm19_p2': return "Jajó"; break;
            case 'm19_p3': return "La Mesa de Esnujaque"; break;
            case 'm19_p4': return "Santiago"; break;
            case 'm19_p5': return "Tuñame"; break;
            case 'm19_p6': return "La Quebrada"; break;
            case 'm20_p1': return "Juan Ignacio Montilla"; break;
            case 'm20_p2': return "La Beatriz"; break;
            case 'm20_p3': return "La Puerta"; break;
            case 'm20_p4': return "Mendoza del Valle de Momboy"; break;
            case 'm20_p5': return "Mercedes Díaz"; break;
            case 'm20_p6': return "San Luis"; break;
        }
    }

    function capacitacion($c)
    {
        switch($c)
        {
            case 'cap_02_01': return "nociones basicas de costura"; break;
            case 'cap_02_02': return "lenceria de baño"; break;
            case 'cap_02_03': return "lenceria de cocina"; break;
            case 'cap_02_04': return "basico de cortinas"; break;
            case 'cap_02_05': return "ganchos decorativos"; break;
            case 'cap_02_06': return "peluqueria"; break;
            case 'cap_02_07': return "decoracion de fiestas infantiles"; break;
            case 'cap_02_08': return "tecnicas de dibujo"; break;
            case 'cap_02_09': return "tallado en anime"; break;
            case 'cap_02_10': return "piñateria avanzada"; break;
            case 'cap_02_11': return "elaboracion de cintillos"; break;
            case 'cap_02_12': return "manualidades con materiales alternativos"; break;
            case 'cap_02_13': return "teatro"; break;
        }
    }

    function donacion($c)
    {
        switch($c)
        {
            case 'don_03_01': return "Ferulas"; break;
            case 'don_03_02': return "Protesis"; break;
            case 'don_03_03': return "medicamentos"; break;
            case 'don_03_04': return "silla de ruedas"; break;
            case 'don_03_05': return "andadera"; break;
            case 'don_03_06': return "bastones"; break;
            case 'don_03_07': return "colchon orto."; break;
            case 'don_03_08': return "aporte eco."; break;
            case 'don_03_09': return "examenes medicos"; break;
            case 'don_03_10': return "otros"; break;
        }
    }

    function ginecologia($c)
    {
        switch($c)
        {
            case 'gin_04_01': return "consulta ginecologica"; break;
            case 'gin_04_02': return "consulta prenatal"; break;
            case 'gin_04_03': return "citologia"; break;
            case 'gin_04_04': return "otos"; break;
        }
    }

    function jornada($c)
    {
        switch($c)
        {
            case 'jor_05_t01': return "social"; break;
            case 'jor_05_t02': return "gobernacion"; break;
            case 'jor_05_t03': return "instituto"; break;
            case 'jor_05_t04': return "gobierno de calle"; break;
			case 'jor_05_t05': return "jornada"; break;
            case 'jor_05_a01': return "legal"; break;
            case 'jor_05_a02': return "social"; break;
            case 'jor_05_a03': return "psicologica"; break;
            case 'jor_05_a04': return "medica"; break;
			case 'jor_05_a05': return "capacitacion"; break;
			case 'jor_05_a06': return "ginecologia"; break;
        }
    }

    function legal($c)
    {
        switch($c)
        {
            case 'leg_06_01': return "violencia psicologica"; break;
            case 'leg_06_02': return "acoso u hostigamiento"; break;
            case 'leg_06_03': return "amenaza"; break;
            case 'leg_06_04': return "violencia fisica"; break;
            case 'leg_06_05': return "violencia domestica"; break;
            case 'leg_06_06': return "violencia sexual"; break;
            case 'leg_06_07': return "acceso carnal violento"; break;
            case 'leg_06_08': return "prostitucion forzada"; break;
            case 'leg_06_09': return "esclavitud sexual"; break;
            case 'leg_06_10': return "acoso sexual"; break;
            case 'leg_06_11': return "violencia laboral"; break;
            case 'leg_06_12': return "violencia patrimonial"; break;
            case 'leg_06_13': return "violencia obstetrica"; break;
            case 'leg_06_14': return "esterilizacion forzada"; break;
            case 'leg_06_15': return "violencia mediatica"; break;
            case 'leg_06_16': return "violencia institucional"; break;
            case 'leg_06_17': return "violencia simbolica"; break;
            case 'leg_06_18': return "trafico de mujeres, niñas y adolecentes"; break;
            case 'leg_06_19': return "trata de mujeres y adolecentes"; break;
            case 'leg_06_20': return "asesoria"; break;
        }
    }

    function psicologica($c)
    {
        switch($c)
        {
            case 'psi_09_a01': return "v. psicologica"; break;
            case 'psi_09_a02': return "acoso u hostigamiento"; break;
            case 'psi_09_a03': return "amenaza"; break;
            case 'psi_09_a04': return "v. fisica"; break;
            case 'psi_09_a05': return "v. domestica"; break;
            case 'psi_09_a06': return "v. sexual"; break;
            case 'psi_09_a07': return "acceso carnal violento"; break;
            case 'psi_09_a08': return "prostitucion forzada"; break;
            case 'psi_09_a09': return "esclavitud sexual"; break;
            case 'psi_09_a10': return "acoso sexual"; break;
            case 'psi_09_a11': return "v. laboral"; break;
            case 'psi_09_a12': return "v. patrimonial"; break;
            case 'psi_09_a13': return "v. obstetrica"; break;
            case 'psi_09_a14': return "esterilizacion forzada"; break;
            case 'psi_09_a15': return "v. mediatica"; break;
            case 'psi_09_a16': return "v. institucional"; break;
            case 'psi_09_a17': return "v. simbolica"; break;
            case 'psi_09_a18': return "trafico de mujeres, niñas y adolecentes"; break;
            case 'psi_09_a19': return "trata de mujeres y adolecentes"; break;
            case 'psi_09_a20': return "v. verbal"; break;
            case 'psi_09_a21': return "evaluacion de credito"; break;
            case 'psi_09_a22': return "orientacion"; break;
			case 'psi_09_a23': return "evaluacion"; break;
            case 'psi_09_o01': return "individual"; break;
            case 'psi_09_o02': return "infantil"; break;
            case 'psi_09_o03': return "pareja"; break;
            case 'psi_09_o04': return "familiar"; break;
        }
    }

    function taller($c, $link)
    {
        $result = mysql_query("SELECT * FROM lista_talleres WHERE codigo LIKE '{$c}';",$link);
        $row = mysql_fetch_array($result);
        return utf8_encode($row[1]);
    }

    if( (isset($_POST['area_busq']) && !empty($_POST['area_busq'])) && (isset($_POST['desde_busq']) && !empty($_POST['desde_busq'])) && (isset($_POST['hasta_busq']) && !empty($_POST['hasta_busq'])) && (isset($_POST['tipo_busq']) && !empty($_POST['tipo_busq'])) && (isset($_POST['param_busq']) && !empty($_POST['param_busq'])) )
    {
    	$vector = array();

    	switch($_POST['area_busq'])
    	{
    		case 'ar_01':
                if($_POST['tipo_busq'] == '1')
                    $str = "SELECT m.id, a.cedula, a.nombres, IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.procedencia, a.telefono, m.diagnostico, m.observacion, DATE_FORMAT(m.fecha, '%d-%m-%Y'), m.referido FROM medicina AS m, atendido AS a WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '2')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.diagnostico, m.observacion, DATE_FORMAT(m.fecha, '%d-%m-%Y'), m.referido FROM medicina AS m, atendido AS a WHERE (m.atendido_cedula = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '3')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.diagnostico, m.observacion, DATE_FORMAT(m.fecha, '%d-%m-%Y'), m.referido FROM medicina AS m, atendido AS a WHERE (a.municipio = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '4')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.diagnostico, m.observacion, DATE_FORMAT(m.fecha, '%d-%m-%Y'), m.referido FROM medicina AS m, atendido AS a WHERE (a.parroquia = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                else
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.diagnostico, m.observacion, DATE_FORMAT(m.fecha, '%d-%m-%Y'), m.referido FROM medicina AS m, atendido AS a WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND IF(-1 = {$_POST['param_busq']},a.f_nacimiento = '0000-00-00',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0 = {$_POST['param_busq']}) ORDER BY m.fecha ASC;";
        	break;
            case 'ar_02':
                if($_POST['tipo_busq'] == '1')
                    $str = "SELECT m.id, m.actividad, m.articula, CONCAT(DATE_FORMAT(m.desde, '%d-%m-%Y'),' - ',DATE_FORMAT(m.hasta, '%d-%m-%Y')), m.observacion, m.n_horas, CONCAT(u.nombre,' ',u.apellido), m.femenina, m.masculino, m.municipio, m.parroquia FROM capacitacion AS m, usuario AS u WHERE (m.desde >= '{$_POST['desde_busq']}') AND (m.hasta <= '{$_POST['hasta_busq']}') AND (m.realizado = u.cedula) ORDER BY m.desde ASC;";
                elseif($_POST['tipo_busq'] == '3')
                    $str = "SELECT m.id, m.actividad, m.articula, CONCAT(DATE_FORMAT(m.desde, '%d-%m-%Y'),' - ',DATE_FORMAT(m.hasta, '%d-%m-%Y')), m.observacion, m.n_horas, CONCAT(u.nombre,' ',u.apellido), m.femenina, m.masculino, m.municipio, m.parroquia FROM capacitacion AS m, usuario AS u WHERE (m.municipio = '{$_POST['param_busq']}') AND (m.desde >= '{$_POST['desde_busq']}') AND (m.hasta <= '{$_POST['hasta_busq']}') AND (m.realizado = u.cedula) ORDER BY m.desde ASC;";
                elseif($_POST['tipo_busq'] == '4')
                    $str = "SELECT m.id, m.actividad, m.articula, CONCAT(DATE_FORMAT(m.desde, '%d-%m-%Y'),' - ',DATE_FORMAT(m.hasta, '%d-%m-%Y')), m.observacion, m.n_horas, CONCAT(u.nombre,' ',u.apellido), m.femenina, m.masculino, m.municipio, m.parroquia FROM capacitacion AS m, usuario AS u WHERE (m.parroquia = '{$_POST['param_busq']}') AND (m.desde >= '{$_POST['desde_busq']}') AND (m.hasta <= '{$_POST['hasta_busq']}') AND (m.realizado = u.cedula) ORDER BY m.desde ASC;";
                elseif($_POST['tipo_busq'] == '5')
                    $str = "SELECT m.id, m.actividad, m.articula, CONCAT(DATE_FORMAT(m.desde, '%d-%m-%Y'),' - ',DATE_FORMAT(m.hasta, '%d-%m-%Y')), m.observacion, m.n_horas, CONCAT(u.nombre,' ',u.apellido), m.femenina, m.masculino, m.municipio, m.parroquia FROM capacitacion AS m, usuario AS u WHERE (m.realizado = '{$_POST['param_busq']}') AND (m.desde >= '{$_POST['desde_busq']}') AND (m.hasta <= '{$_POST['hasta_busq']}') AND (m.realizado = u.cedula) ORDER BY m.desde ASC;";
				else
					$str = "SELECT m.id, m.actividad, m.articula, CONCAT(DATE_FORMAT(m.desde, '%d-%m-%Y'),' - ',DATE_FORMAT(m.hasta, '%d-%m-%Y')), m.observacion, m.n_horas, CONCAT(u.nombre,' ',u.apellido), m.femenina, m.masculino, m.municipio, m.parroquia FROM capacitacion AS m, usuario AS u WHERE (m.actividad = '{$_POST['param_busq']}') AND (m.desde >= '{$_POST['desde_busq']}') AND (m.hasta <= '{$_POST['hasta_busq']}') AND (m.realizado = u.cedula) ORDER BY m.desde ASC;";
            break;
            case 'ar_03':
                if($_POST['tipo_busq'] == '1')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.tipo, m.cantidad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.procedencia, m.monto, m.observacion FROM donacion AS m, atendido AS a WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '2')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.tipo, m.cantidad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.procedencia, m.monto, m.observacion FROM donacion AS m, atendido AS a WHERE (m.atendido_cedula = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '3')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.tipo, m.cantidad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.procedencia, m.monto, m.observacion FROM donacion AS m, atendido AS a WHERE (a.municipio = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '4')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.tipo, m.cantidad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.procedencia, m.monto, m.observacion FROM donacion AS m, atendido AS a WHERE (a.parroquia = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                else
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.tipo, m.cantidad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.procedencia, m.monto, m.observacion FROM donacion AS m, atendido AS a WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND IF(-1 = {$_POST['param_busq']},a.f_nacimiento = '0000-00-00',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0 = {$_POST['param_busq']}) ORDER BY m.fecha ASC;";
            break;
            case 'ar_04':
                if($_POST['tipo_busq'] == '1')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.actividad, m.remitido, DATE_FORMAT(m.fecha, '%d-%m-%Y'), DATE_FORMAT(m.cita, '%d-%m-%Y'), m.observacion FROM ginecologia AS m, atendido AS a WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '2')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.actividad, m.remitido, DATE_FORMAT(m.fecha, '%d-%m-%Y'), DATE_FORMAT(m.cita, '%d-%m-%Y'), m.observacion FROM ginecologia AS m, atendido AS a WHERE (m.atendido_cedula = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '3')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.actividad, m.remitido, DATE_FORMAT(m.fecha, '%d-%m-%Y'), DATE_FORMAT(m.cita, '%d-%m-%Y'), m.observacion FROM ginecologia AS m, atendido AS a WHERE (a.municipio = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '4')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.actividad, m.remitido, DATE_FORMAT(m.fecha, '%d-%m-%Y'), DATE_FORMAT(m.cita, '%d-%m-%Y'), m.observacion FROM ginecologia AS m, atendido AS a WHERE (a.parroquia = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                else
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.actividad, m.remitido, DATE_FORMAT(m.fecha, '%d-%m-%Y'), DATE_FORMAT(m.cita, '%d-%m-%Y'), m.observacion FROM ginecologia AS m, atendido AS a WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND IF(-1 = {$_POST['param_busq']},a.f_nacimiento = '0000-00-00',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0 = {$_POST['param_busq']}) ORDER BY m.fecha ASC;";
            break;
            case 'ar_05':
                if($_POST['tipo_busq'] == '1')
                    $str = "SELECT m.id, m.tipo, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.atencion, m.observacion, m.municipio, m.parroquia, m.femenina, m.masculino FROM jornada AS m WHERE (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '3')
                    $str = "SELECT m.id, m.tipo, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.atencion, m.observacion, m.municipio, m.parroquia, m.femenina, m.masculino FROM jornada AS m WHERE (m.municipio = '{$_POST['param_busq']}') AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                else
                    $str = "SELECT m.id, m.tipo, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.atencion, m.observacion, m.municipio, m.parroquia, m.femenina, m.masculino FROM jornada AS m WHERE (m.parroquia = '{$_POST['param_busq']}') AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";

            break;
            case 'ar_06':
                if($_POST['tipo_busq'] == '1')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.actividad, m.remitido, DATE_FORMAT(m.fecha,'%d-%m-%y'), CONCAT(u.nombre,' ',u.apellido), m.observacion FROM legal AS m, atendido AS a, usuario AS u WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '2')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.actividad, m.remitido, DATE_FORMAT(m.fecha,'%d-%m-%y'), CONCAT(u.nombre,' ',u.apellido), m.observacion FROM legal AS m, atendido AS a, usuario AS u WHERE (m.atendido_cedula = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '3')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.actividad, m.remitido, DATE_FORMAT(m.fecha,'%d-%m-%y'), CONCAT(u.nombre,' ',u.apellido), m.observacion FROM legal AS m, atendido AS a, usuario AS u WHERE (a.municipio = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '4')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.actividad, m.remitido, DATE_FORMAT(m.fecha,'%d-%m-%y'), CONCAT(u.nombre,' ',u.apellido), m.observacion FROM legal AS m, atendido AS a, usuario AS u WHERE (a.parroquia = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '5')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.actividad, m.remitido, DATE_FORMAT(m.fecha,'%d-%m-%y'), CONCAT(u.nombre,' ',u.apellido), m.observacion FROM legal AS m, atendido AS a, usuario AS u WHERE (m.realizado = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '7')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.actividad, m.remitido, DATE_FORMAT(m.fecha,'%d-%m-%y'), CONCAT(u.nombre,' ',u.apellido), m.observacion FROM legal AS m, atendido AS a, usuario AS u WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) AND IF(-1 = {$_POST['param_busq']},a.f_nacimiento = '0000-00-00',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0 = {$_POST['param_busq']}) ORDER BY m.fecha ASC;";
				else
					$str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.actividad, m.remitido, DATE_FORMAT(m.fecha,'%d-%m-%y'), CONCAT(u.nombre,' ',u.apellido), m.observacion FROM legal AS m, atendido AS a, usuario AS u WHERE (m.actividad LIKE '%leg_06_{$_POST['param_busq']}%') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) ORDER BY m.fecha ASC;";
			break;
            case 'ar_07':
                if($_POST['tipo_busq'] == '1')
                    $str = "SELECT m.id, a.cedula, UPPER(CONCAT(a.nombre,' ',a.apellido)), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, UPPER(m.diagnostico), UPPER(m.remitido), DATE_FORMAT(m.fecha, '%d-%m-%Y') FROM pediatria AS m, atendido AS a WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '2')
                    $str = "SELECT m.id, a.cedula, UPPER(CONCAT(a.nombre,' ',a.apellido)), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, UPPER(m.diagnostico), UPPER(m.remitido), DATE_FORMAT(m.fecha, '%d-%m-%Y') FROM pediatria AS m, atendido AS a WHERE (m.atendido_cedula = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '3')
                    $str = "SELECT m.id, a.cedula, UPPER(CONCAT(a.nombre,' ',a.apellido)), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, UPPER(m.diagnostico), UPPER(m.remitido), DATE_FORMAT(m.fecha, '%d-%m-%Y') FROM pediatria AS m, atendido AS a WHERE (a.municipio = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '4')
                    $str = "SELECT m.id, a.cedula, UPPER(CONCAT(a.nombre,' ',a.apellido)), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, UPPER(m.diagnostico), UPPER(m.remitido), DATE_FORMAT(m.fecha, '%d-%m-%Y') FROM pediatria AS m, atendido AS a WHERE (a.parroquia = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                else
                    $str = "SELECT m.id, a.cedula, UPPER(CONCAT(a.nombre,' ',a.apellido)), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, UPPER(m.diagnostico), UPPER(m.remitido), DATE_FORMAT(m.fecha, '%d-%m-%Y') FROM pediatria AS m, atendido AS a WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND IF(-1 = {$_POST['param_busq']},a.f_nacimiento = '0000-00-00',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0 = {$_POST['param_busq']}) ORDER BY m.fecha ASC;";
                    //$str = "SELECT m.id, a.cedula, UPPER(CONCAT(a.nombre,' ',a.apellido)), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, UPPER(m.diagnostico), UPPER(m.remitido), DATE_FORMAT(m.fecha, '%d-%m-%Y') FROM pediatria AS m, atendido AS a WHERE ( (a.nombre LIKE '%{$_POST['param_busq']}%') OR (a.apellido LIKE '%{$_POST['param_busq']}%') ) AND (a.cedula = m.atendido_cedula) ORDER BY m.fecha ASC;";
            break;
            case 'ar_08':
                if($_POST['tipo_busq'] == '1')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.rubro, m.monto, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.observacion FROM proyecto AS m, atendido AS a WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '2')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.rubro, m.monto, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.observacion FROM proyecto AS m, atendido AS a WHERE (m.atendido_cedula = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '3')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.rubro, m.monto, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.observacion FROM proyecto AS m, atendido AS a WHERE (a.municipio = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '4')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.rubro, m.monto, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.observacion FROM proyecto AS m, atendido AS a WHERE (a.parroquia = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                else
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.rubro, m.monto, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.observacion FROM proyecto AS m, atendido AS a WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND IF(-1 = {$_POST['param_busq']},a.f_nacimiento = '0000-00-00',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0 = {$_POST['param_busq']}) ORDER BY m.fecha ASC;";
            break;
            case 'ar_09':
                if($_POST['tipo_busq'] == '1')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, IF(m.seguimiento = 's', 'Si', 'No'), m.actividad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.remitido_a, m.remitido_p, CONCAT(u.nombre,' ',u.apellido), IF(m.infantil = 'n', 'Adulto', 'Infantil') FROM psicologia AS m, atendido AS a, usuario AS u WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '2')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, IF(m.seguimiento = 's', 'Si', 'No'), m.actividad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.remitido_a, m.remitido_p, CONCAT(u.nombre,' ',u.apellido), IF(m.infantil = 'n', 'Adulto', 'Infantil') FROM psicologia AS m, atendido AS a, usuario AS u WHERE (m.atendido_cedula = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '3')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, IF(m.seguimiento = 's', 'Si', 'No'), m.actividad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.remitido_a, m.remitido_p, CONCAT(u.nombre,' ',u.apellido), IF(m.infantil = 'n', 'Adulto', 'Infantil') FROM psicologia AS m, atendido AS a, usuario AS u WHERE (a.municipio = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '4')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, IF(m.seguimiento = 's', 'Si', 'No'), m.actividad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.remitido_a, m.remitido_p, CONCAT(u.nombre,' ',u.apellido), IF(m.infantil = 'n', 'Adulto', 'Infantil') FROM psicologia AS m, atendido AS a, usuario AS u WHERE (a.parroquia = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '5')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, IF(m.seguimiento = 's', 'Si', 'No'), m.actividad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.remitido_a, m.remitido_p, CONCAT(u.nombre,' ',u.apellido), IF(m.infantil = 'n', 'Adulto', 'Infantil') FROM psicologia AS m, atendido AS a, usuario AS u WHERE (m.realizado = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) ORDER BY m.fecha ASC;";
				elseif($_POST['tipo_busq'] == '7')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, IF(m.seguimiento = 's', 'Si', 'No'), m.actividad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.remitido_a, m.remitido_p, CONCAT(u.nombre,' ',u.apellido), IF(m.infantil = 'n', 'Adulto', 'Infantil') FROM psicologia AS m, atendido AS a, usuario AS u WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) AND IF(-1 = {$_POST['param_busq']},a.f_nacimiento = '0000-00-00',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0 = {$_POST['param_busq']}) ORDER BY m.fecha ASC;";
                else
					$str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, IF(m.seguimiento = 's', 'Si', 'No'), m.actividad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.remitido_a, m.remitido_p, CONCAT(u.nombre,' ',u.apellido), IF(m.infantil = 'n', 'Adulto', 'Infantil') FROM psicologia AS m, atendido AS a, usuario AS u WHERE (m.actividad LIKE '%psi_09_a{$_POST['param_busq']}%') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) ORDER BY m.fecha ASC;";
			break;
            case 'ar_13':
                if($_POST['tipo_busq'] == '1')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, IF(m.seguimiento = 's', 'Si', 'No'), m.actividad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.remitido_a, m.remitido_p, CONCAT(u.nombre,' ',u.apellido), IF(m.infantil = 'n', 'Adulto', 'Infantil') FROM psicologia AS m, atendido AS a, usuario AS u WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) AND (m.infantil = 's') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '2')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, IF(m.seguimiento = 's', 'Si', 'No'), m.actividad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.remitido_a, m.remitido_p, CONCAT(u.nombre,' ',u.apellido), IF(m.infantil = 'n', 'Adulto', 'Infantil') FROM psicologia AS m, atendido AS a, usuario AS u WHERE (m.atendido_cedula = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) AND (m.infantil = 's') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '3')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, IF(m.seguimiento = 's', 'Si', 'No'), m.actividad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.remitido_a, m.remitido_p, CONCAT(u.nombre,' ',u.apellido), IF(m.infantil = 'n', 'Adulto', 'Infantil') FROM psicologia AS m, atendido AS a, usuario AS u WHERE (a.municipio = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) AND (m.infantil = 's') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '4')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, IF(m.seguimiento = 's', 'Si', 'No'), m.actividad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.remitido_a, m.remitido_p, CONCAT(u.nombre,' ',u.apellido), IF(m.infantil = 'n', 'Adulto', 'Infantil') FROM psicologia AS m, atendido AS a, usuario AS u WHERE (a.parroquia = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) AND (m.infantil = 's') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '5')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, IF(m.seguimiento = 's', 'Si', 'No'), m.actividad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.remitido_a, m.remitido_p, CONCAT(u.nombre,' ',u.apellido), IF(m.infantil = 'n', 'Adulto', 'Infantil') FROM psicologia AS m, atendido AS a, usuario AS u WHERE (m.realizado = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) AND (m.infantil = 's') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '7')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, IF(m.seguimiento = 's', 'Si', 'No'), m.actividad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.remitido_a, m.remitido_p, CONCAT(u.nombre,' ',u.apellido), IF(m.infantil = 'n', 'Adulto', 'Infantil') FROM psicologia AS m, atendido AS a, usuario AS u WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) AND IF(-1 = {$_POST['param_busq']},a.f_nacimiento = '0000-00-00',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0 = {$_POST['param_busq']}) AND (m.infantil = 's') ORDER BY m.fecha ASC;";
                else
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, IF(m.seguimiento = 's', 'Si', 'No'), m.actividad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.remitido_a, m.remitido_p, CONCAT(u.nombre,' ',u.apellido), IF(m.infantil = 'n', 'Adulto', 'Infantil') FROM psicologia AS m, atendido AS a, usuario AS u WHERE (m.actividad LIKE '%psi_09_a{$_POST['param_busq']}%') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) AND (m.infantil = 's') ORDER BY m.fecha ASC;";
            break;
            case 'ar_10':
                if($_POST['tipo_busq'] == '1')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.descripcion, m.continuidad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.remitido FROM sisdapro AS m, atendido AS a WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '2')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.descripcion, m.continuidad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.remitido FROM sisdapro AS m, atendido AS a WHERE (m.atendido_cedula = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '3')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.descripcion, m.continuidad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.remitido FROM sisdapro AS m, atendido AS a WHERE (a.municipio = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '4')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.descripcion, m.continuidad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.remitido FROM sisdapro AS m, atendido AS a WHERE (a.parroquia = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') ORDER BY m.fecha ASC;";
                else
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.descripcion, m.continuidad, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.remitido FROM sisdapro AS m, atendido AS a WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND IF(-1 = {$_POST['param_busq']},a.f_nacimiento = '0000-00-00',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0 = {$_POST['param_busq']}) ORDER BY m.fecha ASC;";
            break;
            case 'ar_11':
                if($_POST['tipo_busq'] == '1')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.observacion, m.descripcion, m.procede, DATE_FORMAT(m.fecha,'%d-%m-%y'), CONCAT(u.nombre,' ',u.apellido), m.realizado FROM social AS m, atendido AS a, usuario AS u WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '2')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.observacion, m.descripcion, m.procede, DATE_FORMAT(m.fecha,'%d-%m-%y'), CONCAT(u.nombre,' ',u.apellido), m.realizado FROM social AS m, atendido AS a, usuario AS u WHERE (m.atendido_cedula = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '3')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.observacion, m.descripcion, m.procede, DATE_FORMAT(m.fecha,'%d-%m-%y'), CONCAT(u.nombre,' ',u.apellido), m.realizado FROM social AS m, atendido AS a, usuario AS u WHERE (a.municipio = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '4')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.observacion, m.descripcion, m.procede, DATE_FORMAT(m.fecha,'%d-%m-%y'), CONCAT(u.nombre,' ',u.apellido), m.realizado FROM social AS m, atendido AS a, usuario AS u WHERE (a.parroquia = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '7')
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.observacion, m.descripcion, m.procede, DATE_FORMAT(m.fecha,'%d-%m-%y'), CONCAT(u.nombre,' ',u.apellido), m.realizado FROM social AS m, atendido AS a, usuario AS u WHERE (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) AND IF(-1 = {$_POST['param_busq']},a.f_nacimiento = '0000-00-00',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0 = {$_POST['param_busq']}) ORDER BY m.fecha ASC;";
                else
                    $str = "SELECT m.id, a.cedula, CONCAT(a.nombre,' ',a.apellido), IF(f_nacimiento = '0000-00-00','No Presenta',DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0), a.sexo, a.municipio, a.parroquia, a.telefono, m.observacion, m.descripcion, m.procede, DATE_FORMAT(m.fecha,'%d-%m-%y'), CONCAT(u.nombre,' ',u.apellido), m.realizado FROM social AS m, atendido AS a, usuario AS u WHERE (m.realizado = '{$_POST['param_busq']}') AND (a.cedula = m.atendido_cedula) AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (u.cedula = m.realizado) ORDER BY m.fecha ASC;";
            break;
            // AND DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(a.f_nacimiento)), '%Y')+0 = {$_POST['param_busq']}
            case 'ar_12':
                if($_POST['tipo_busq'] == '1')
                    $str = "SELECT m.id, m.tipo, m.observacion, DATE_FORMAT(m.fecha,'%d-%m-%y'), CONCAT(u.nombre,' ',u.apellido), m.femenina, m.masculino, m.municipio, m.parroquia, m.remitido_p, m.lugar, m.equipo, m.numero, m.hora FROM taller AS m, usuario AS u WHERE (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (m.realizado = u.cedula) ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '3')
                    $str = "SELECT m.id, m.tipo, m.observacion, DATE_FORMAT(m.fecha,'%d-%m-%y'), CONCAT(u.nombre,' ',u.apellido), m.femenina, m.masculino, m.municipio, m.parroquia, m.remitido_p, m.lugar, m.equipo, m.numero, m.hora FROM taller AS m, usuario AS u WHERE (m.municipio = '{$_POST['param_busq']}') AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (m.realizado = u.cedula) ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '4')
                    $str = "SELECT m.id, m.tipo, m.observacion, DATE_FORMAT(m.fecha,'%d-%m-%y'), CONCAT(u.nombre,' ',u.apellido), m.femenina, m.masculino, m.municipio, m.parroquia, m.remitido_p, m.lugar, m.equipo, m.numero, m.hora FROM taller AS m, usuario AS u WHERE (m.parroquia = '{$_POST['param_busq']}') AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (m.realizado = u.cedula) ORDER BY m.fecha ASC;";
                elseif($_POST['tipo_busq'] == '5')
                    $str = "SELECT m.id, m.tipo, m.observacion, DATE_FORMAT(m.fecha,'%d-%m-%y'), CONCAT(u.nombre,' ',u.apellido), m.femenina, m.masculino, m.municipio, m.parroquia, m.remitido_p, m.lugar, m.equipo, m.numero, m.hora FROM taller AS m, usuario AS u WHERE (m.realizado = '{$_POST['param_busq']}') AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (m.realizado = u.cedula) ORDER BY m.fecha ASC;";
				else
					$str = "SELECT m.id, m.tipo, m.observacion, DATE_FORMAT(m.fecha,'%d-%m-%y'), CONCAT(u.nombre,' ',u.apellido), m.femenina, m.masculino, m.municipio, m.parroquia, m.remitido_p, m.lugar, m.equipo, m.numero, m.hora FROM taller AS m, usuario AS u WHERE (m.tipo = '{$_POST['param_busq']}') AND (m.fecha >= '{$_POST['desde_busq']}') AND (m.fecha <= '{$_POST['hasta_busq']}') AND (m.realizado = u.cedula) ORDER BY m.fecha ASC;";
			break;
			case 'todos':
					mysql_query("SET @desde := '{$_POST['desde_busq']}', @hasta := '{$_POST['hasta_busq']}';",$link);
					$str = @"SELECT
								'MEDICINA' AS 'AREA',
								COUNT(IF(a.sexo = 'f', a.sexo, NULL)) AS 'FEMENINO',
								COUNT(IF(a.sexo = 'm', a.sexo, NULL)) AS 'MASCULINO',
								COUNT(*) AS 'TOTAL'
							FROM
								medicina AS m,
								atendido AS a
							WHERE
								(a.cedula = m.atendido_cedula)
									AND (m.fecha >= @desde)
									AND (m.fecha <= @hasta)
							UNION SELECT
								'CAPACITACION',
								COALESCE(SUM(c.femenina),0),
							    COALESCE(SUM(c.masculino),0),
								COALESCE(SUM(c.femenina + c.masculino),0)
							FROM
								capacitacion AS c
							WHERE
								(c.desde >= @desde)
									AND (c.hasta <= @hasta)
							UNION SELECT
								'DONACION',
								COUNT(IF(a.sexo = 'f', a.sexo, NULL)),
								COUNT(IF(a.sexo = 'm', a.sexo, NULL)),
								COUNT(*)
							FROM
								donacion AS d,
								atendido AS a
							WHERE
								(a.cedula = d.atendido_cedula)
									AND (d.fecha >= @desde)
									AND (d.fecha <= @hasta)
							UNION SELECT
								'GINECOLOGIA',
								COUNT(IF(a.sexo = 'f', a.sexo, NULL)),
								COUNT(IF(a.sexo = 'm', a.sexo, NULL)),
								COUNT(*)
							FROM
								ginecologia AS g,
								atendido AS a
							WHERE
								(a.cedula = g.atendido_cedula)
									AND (g.fecha >= @desde)
									AND (g.fecha <= @hasta)
							UNION SELECT
								'JORNADA',
								COALESCE(SUM(j.femenina),0),
							    COALESCE(SUM(j.masculino),0),
								COALESCE(SUM(j.femenina + j.masculino),0)
							FROM
								jornada AS j
							WHERE
								(j.fecha >= @desde)
									AND (j.fecha <= @hasta)
							UNION SELECT
								'LEGAL',
								COUNT(IF(a.sexo = 'f', a.sexo, NULL)),
								COUNT(IF(a.sexo = 'm', a.sexo, NULL)),
								COUNT(*)
							FROM
								legal AS l,
								atendido AS a
							WHERE
								(a.cedula = l.atendido_cedula)
									AND (l.fecha >= @desde)
									AND (l.fecha <= @hasta)
							UNION SELECT
								'PEDIATRIA',
								COUNT(IF(a.sexo = 'f', a.sexo, NULL)),
								COUNT(IF(a.sexo = 'm', a.sexo, NULL)),
								COUNT(*)
							FROM
								pediatria AS p,
								atendido AS a
							WHERE
								(a.cedula = p.atendido_cedula)
									AND (p.fecha >= @desde)
									AND (p.fecha <= @hasta)
							UNION SELECT
								'PROYECTO',
								COUNT(IF(a.sexo = 'f', a.sexo, NULL)),
								COUNT(IF(a.sexo = 'm', a.sexo, NULL)),
								COUNT(*)
							FROM
								proyecto AS p,
								atendido AS a
							WHERE
								(a.cedula = p.atendido_cedula)
									AND (p.fecha >= @desde)
									AND (p.fecha <= @hasta)
							UNION SELECT
								'PSICOLOGIA',
								COUNT(IF(a.sexo = 'f', a.sexo, NULL)),
								COUNT(IF(a.sexo = 'm', a.sexo, NULL)),
								COUNT(*)
							FROM
								psicologia AS p,
								atendido AS a
							WHERE
								(a.cedula = p.atendido_cedula)
									AND (p.fecha >= @desde)
									AND (p.fecha <= @hasta)
							UNION SELECT
								'ATENCION AL CIUDADANO',
								COUNT(IF(a.sexo = 'f', a.sexo, NULL)),
								COUNT(IF(a.sexo = 'm', a.sexo, NULL)),
								COUNT(*)
							FROM
								sisdapro AS s,
								atendido AS a
							WHERE
								(a.cedula = s.atendido_cedula)
									AND (s.fecha >= @desde)
									AND (s.fecha <= @hasta)
							UNION SELECT
								'SOCIAL',
								COUNT(IF(a.sexo = 'f', a.sexo, NULL)),
								COUNT(IF(a.sexo = 'm', a.sexo, NULL)),
								COUNT(*)
							FROM
								social AS s,
								atendido AS a
							WHERE
								(a.cedula = s.atendido_cedula)
									AND (s.fecha >= @desde)
									AND (s.fecha <= @hasta)
							UNION SELECT
								'GINECOLOGIA',
								COUNT(IF(a.sexo = 'f', a.sexo, NULL)),
								COUNT(IF(a.sexo = 'm', a.sexo, NULL)),
								COUNT(*)
							FROM
								ginecologia AS g,
								atendido AS a
							WHERE
								(a.cedula = g.atendido_cedula)
									AND (g.fecha >= @desde)
									AND (g.fecha <= @hasta)
							UNION SELECT
								'TALLER',
								COALESCE(SUM(t.femenina),0),
							    COALESCE(SUM(t.masculino),0),
								COALESCE(SUM(t.femenina + t.masculino),0)
							FROM
								taller AS t
							WHERE
								(t.fecha >= @desde)
									AND (t.fecha <= @hasta)";
			break;
        }

        $result = mysql_query($str,$link);

        while($row = mysql_fetch_array($result))
        {
            $vector[ ] = $row;
        }

        for($i=0; $i<sizeof($vector); $i++)
        {
			if($_POST['area_busq'] != 'ar_02' && $_POST['area_busq'] != 'ar_12' && $_POST['area_busq'] != 'todos') {
				// $vector[$i][5] = municipios($vector[$i][5]);
				$vector[$i][4] = parroquias($vector[$i][4]);
			}
        }

        switch($_POST['area_busq'])
        {
            case 'ar_02':
                for($i=0; $i<sizeof($vector); $i++)
                {
					$vector[$i][1] = capacitacion($vector[$i][1]);
					$vector[$i][9] = municipios($vector[$i][9]);
					$vector[$i][10] = parroquias($vector[$i][10]);
                }
            break;
            case 'ar_03':
                for($i=0; $i<sizeof($vector); $i++)
                {
                    $vector[$i][8] = donacion($vector[$i][8]);
                }
            break;
            case 'ar_04':
                for($i=0; $i<sizeof($vector); $i++)
                {
                    $vector[$i][8] = ginecologia($vector[$i][8]);
                }
            break;
            case 'ar_05':
                for($i=0; $i<sizeof($vector); $i++)
                {
                    $vector[$i][1] = jornada($vector[$i][1]);
                    $vector[$i][3] = jornada($vector[$i][3]);
                }
            break;
            case 'ar_06':
                for($i=0; $i<sizeof($vector); $i++)
                {
                    $porciones = explode(",", $vector[$i][8]);
                    $cadena = '';
                    for($j=0; $j<sizeof($porciones); $j++)
                        if(strlen($cadena) == 0) $cadena = legal($porciones[$j]);
                        else $cadena .= '<br />'.legal($porciones[$j]);
                    $vector[$i][8] = $cadena;
                }
            break;
            case 'ar_09':
                for($i=0; $i<sizeof($vector); $i++)
                {
                    $porciones = explode(",", $vector[$i][9]);
                    $cadena = '';
                    for($j=0; $j<sizeof($porciones); $j++)
                        if(strlen($cadena) == 0) $cadena = psicologica($porciones[$j]);
                        else $cadena .= '<br />'.psicologica($porciones[$j]);
                    $vector[$i][9] = $cadena;
                }
            break;
            case 'ar_13':
                for($i=0; $i<sizeof($vector); $i++)
                {
                    $porciones = explode(",", $vector[$i][9]);
                    $cadena = '';
                    for($j=0; $j<sizeof($porciones); $j++)
                        if(strlen($cadena) == 0) $cadena = psicologica($porciones[$j]);
                        else $cadena .= '<br />'.psicologica($porciones[$j]);
                    $vector[$i][9] = $cadena;
                }
            break;
            case 'ar_12':
                for($i=0; $i<sizeof($vector); $i++)
                {
                    $vector[$i][1] = taller($vector[$i][1], $link);
					$vector[$i][7] = municipios($vector[$i][7]);
					$vector[$i][8] = parroquias($vector[$i][8]);
                }
            break;
        }

        echo json_encode($vector);
    }

    if( (isset($_POST['area_form']) && !empty($_POST['area_form'])) && (isset($_POST['param']) && !empty($_POST['param'])) )
    {
        switch($_POST['area_form'])
        {
            case 'ar_02':
                $str = "SELECT * FROM capacitacion WHERE (id = {$_POST['param']}) ORDER BY id ASC LIMIT 1;";
            break;
            case 'ar_05':
                $str = "SELECT * FROM jornada WHERE (id = {$_POST['param']}) ORDER BY id ASC LIMIT 1;";
            break;
            case 'ar_12':
                $str = "SELECT * FROM taller WHERE (id = {$_POST['param']}) ORDER BY id ASC LIMIT 1;";
            break;
        }

        $result = mysql_query($str,$link);
        $row = mysql_fetch_array($result);
        echo json_encode($row);
    }

    if( (isset($_POST['area_real']) && !empty($_POST['area_real'])) )
    {
        $str = "SELECT cedula, CONCAT(nombre,' ',apellido) FROM usuario WHERE area LIKE '%{$_POST['area_real']}%' ORDER BY cedula ASC;";
        $vector = array();
        $result = mysql_query($str,$link);
        while($row = mysql_fetch_array($result))
        {
            $vector[ ] = $row;
        }

        echo json_encode($vector);
    }

    if(isset($_POST['cedula_us']) && !empty($_POST['cedula_us']))
    {
        $result = mysql_query("SELECT * FROM usuario WHERE cedula = '{$_POST['cedula_us']}' LIMIT 1;",$link);
        $row = mysql_fetch_array($result);

        echo json_encode($row);
    }

    if( (isset($_POST['remi_09']) && !empty($_POST['remi_09'])) && (isset($_POST['value']) && !empty($_POST['value'])) )
    {
        if($_POST['remi_09'] == 'remi_p_09') $str = "SELECT remitido_p FROM psicologia WHERE remitido_p LIKE '%{$_POST['value']}%' LIMIT 1;";
        else $str = "SELECT remitido_a FROM psicologia WHERE remitido_a LIKE '%{$_POST['value']}%' LIMIT 1;";

        $result = mysql_query($str,$link);
        $row = mysql_fetch_array($result);

        echo $row[0];
    }

    if(isset($_POST['refresh']) && !empty($_POST['refresh']))
    {
        switch ($_POST['refresh']) {
            case '01': $str = "SELECT id FROM medicina ORDER BY id DESC LIMIT 1;"; break;
            case '02': $str = "SELECT id FROM capacitacion ORDER BY id DESC LIMIT 1;"; break;
            case '03': $str = "SELECT id FROM donacion ORDER BY id DESC LIMIT 1;"; break;
            case '04': $str = "SELECT id FROM ginecologia ORDER BY id DESC LIMIT 1;"; break;
            case '05': $str = "SELECT id FROM jornada ORDER BY id DESC LIMIT 1;"; break;
            case '06': $str = "SELECT id FROM legal ORDER BY id DESC LIMIT 1;"; break;
            case '07': $str = "SELECT id FROM pediatria ORDER BY id DESC LIMIT 1;"; break;
            case '08': $str = "SELECT id FROM proyecto ORDER BY id DESC LIMIT 1;"; break;
            case '09': $str = "SELECT id FROM psicologia ORDER BY id DESC LIMIT 1;"; break;
            case '10': $str = "SELECT id FROM sisdapro ORDER BY id DESC LIMIT 1;"; break;
            case '11': $str = "SELECT id FROM social ORDER BY id DESC LIMIT 1;"; break;
            case '12': $str = "SELECT id FROM taller ORDER BY id DESC LIMIT 1;"; break;
        }
        $result = mysql_query($str,$link);
        $row = mysql_fetch_array($result);

        echo $row[0];
    }

    if(isset($_POST['value_obse_06']) && !empty($_POST['value_obse_06']))
    {
        $result = mysql_query("SELECT observacion FROM legal WHERE observacion LIKE '%{$_POST['value_obse_06']}%' LIMIT 1;",$link);
        $row = mysql_fetch_array($result);

        echo $row[0];
    }

	if(isset($_POST['cedula_arch']) && !empty($_POST['cedula_arch']))
    {
        $ruta = "archivo/".$_POST['cedula_arch'];
		$vec = array();
        if(is_dir($ruta) != 0) {
            $directorio = opendir($ruta);
            while ($archivo = readdir($directorio)) {
                if (!is_dir($archivo)) {
                    $vec[] = $archivo;
                }
            }
        }
        echo json_encode($vec);
    }

    if(isset($_POST['cedula_atn_cne']) && !empty($_POST['cedula_atn_cne'])) {
        try {
            echo file_get_contents("http://www.cne.gob.ve/web/registro_electoral/ce_simulacro.php?nacionalidad=V&cedula=".$_POST['cedula_atn_cne']);
        } catch (Exception $e) {
            echo "false";
        }
    }
?>
