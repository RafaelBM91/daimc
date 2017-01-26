<?php
    include_once "../conexion.php";
    include_once "../consulta_interna.php";

    switch ($_GET['opc_busq']) {
        case '1': {
            // solo fecha
            $str = "SELECT m.id, (SELECT nombre FROM cursos WHERE codigo = m.actividad), m.articula, CONCAT(DATE_FORMAT(m.desde, '%d-%m-%Y'),' - ',DATE_FORMAT(m.hasta, '%d-%m-%Y')), m.observacion, m.n_horas, CONCAT(u.nombre,' ',u.apellido), m.femenina, m.masculino, m.procedencia FROM capacitacion AS m, usuario AS u WHERE (m.desde >= '{$_GET['desd_busq']}') AND (m.hasta <= '{$_GET['hast_busq']}') AND (m.realizado = u.cedula) ORDER BY m.desde ASC;";
            break;
        }
        case '3': {
            // fecha + municipio
            // $str = "SELECT m.id, (SELECT nombre FROM cursos WHERE codigo = m.actividad), m.articula, CONCAT(DATE_FORMAT(m.desde, '%d-%m-%Y'),' - ',DATE_FORMAT(m.hasta, '%d-%m-%Y')), m.observacion, m.n_horas, CONCAT(u.nombre,' ',u.apellido), m.femenina, m.masculino, m.municipio, m.parroquia FROM capacitacion AS m, usuario AS u WHERE (a.procedencia LIKE '%{$_GET['municipio_atn_busq']}%') AND (m.desde >= '{$_GET['desd_busq']}') AND (m.hasta <= '{$_GET['hast_busq']}') AND (m.realizado = u.cedula) ORDER BY m.desde ASC;";
            break;
        }
        case '4': {
            // fecha + parroquia
            // $str = "SELECT m.id, (SELECT nombre FROM cursos WHERE codigo = m.actividad), m.articula, CONCAT(DATE_FORMAT(m.desde, '%d-%m-%Y'),' - ',DATE_FORMAT(m.hasta, '%d-%m-%Y')), m.observacion, m.n_horas, CONCAT(u.nombre,' ',u.apellido), m.femenina, m.masculino, m.municipio, m.parroquia FROM capacitacion AS m, usuario AS u WHERE (m.procedencia = '{$_GET['parroquia_atn_busq']}') AND (m.desde >= '{$_GET['desd_busq']}') AND (m.hasta <= '{$_GET['hast_busq']}') AND (m.realizado = u.cedula) ORDER BY m.desde ASC;";
            break;
        }
        case '5': {
            // fecha + realizado
            $str = "SELECT m.id, (SELECT nombre FROM cursos WHERE codigo = m.actividad), m.articula, CONCAT(DATE_FORMAT(m.desde, '%d-%m-%Y'),' - ',DATE_FORMAT(m.hasta, '%d-%m-%Y')), m.observacion, m.n_horas, CONCAT(u.nombre,' ',u.apellido), m.femenina, m.masculino, m.procedencia FROM capacitacion AS m, usuario AS u WHERE (m.desde >= '{$_GET['desd_busq']}') AND (m.hasta <= '{$_GET['hast_busq']}') AND (m.realizado = '{$_GET['cedula_real_busq']}') AND (m.realizado = u.cedula) ORDER BY m.desde ASC;";
            break;
        }
        case '9': {
            // fecha + curso
            $str = "SELECT m.id, (SELECT nombre FROM cursos WHERE codigo = m.actividad), m.articula, CONCAT(DATE_FORMAT(m.desde, '%d-%m-%Y'),' - ',DATE_FORMAT(m.hasta, '%d-%m-%Y')), m.observacion, m.n_horas, CONCAT(u.nombre,' ',u.apellido), m.femenina, m.masculino, m.procedencia FROM capacitacion AS m, usuario AS u WHERE (m.desde >= '{$_GET['desd_busq']}') AND (m.hasta <= '{$_GET['hast_busq']}') AND (m.actividad = '{$_GET['cur_busq']}') AND (m.realizado = u.cedula) ORDER BY m.desde ASC;";
            break;
        }
    }
    
    $result = mysql_query($str,$link);
    $html = '';
    $tr = 0;
    $femeninas = 0;
    $masculinos = 0;

    while ($row = mysql_fetch_array($result)) {

        $row[9] = "<font color=\"red\">".municipios(explode("_",$row[9])[0])."</font>  <strong>|</strong>  <font color=\"blue\">".parroquias($row[9])."</font>";

        $html .= "<tr id=\"datagrid-row-r1-2-{$tr}\">";
        for ($i = 0; $i < (sizeof($row)/2); $i++) {
            $cont = $i + 1;
            $rou = utf8_encode($row[$i]);
            if ($i == 7) {
                $femeninas += (int)$row[$i];
            }
            if ($i == 8) {
                $masculinos += (int)$row[$i];
            }

            $html .= "<td field=\"item{$cont}\"><div class=\"\">{$rou}</div></td>";
        }
        $html .= "</tr>";
        $tr++;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../grid/easyui.css" rel="stylesheet">
        <style>
            html, body {
                padding: 0px;
                margin: 0px;
                border: 0px;
            }
            tr.datagrid-row > td > div > div.fem {
                text-align: center;
                background-color: #FF008B;
            }
            tr.datagrid-row > td > div > div.mas {
                text-align: center;
                background-color: #009CFF;
            }
        </style>
    </head>
    <body>
        <?php
            $total = $femeninas + $masculinos;
            $title = "title=\"DAIMC &nbsp;&nbsp;&nbsp;&nbsp; FEMENINAS: {$femeninas} &nbsp;&nbsp;&nbsp;&nbsp; MASCULINOS: {$masculinos} &nbsp;&nbsp;&nbsp;&nbsp; TOTAL: {$total} \"";
        ?>
        <table class="easyui-datagrid" <?php echo $title; ?> style="width:1196px;height:530px;">
	        <thead>
	        	<tr>
                    <th data-options="field:'item1',width:60">CODIGO</th>
                    <th data-options="field:'item2',width:150">TIPO DE CAPACITACION</th>
                    <th data-options="field:'item3',width:100">ARTICULACION</th>
                    <th data-options="field:'item4',width:150">DESDE - HASTA</th>
                    <th data-options="field:'item5',width:100">OBSERVACION</th>
                    <th data-options="field:'item6',width:100">N° HORAS</th>
                    <th data-options="field:'item7',width:100">REALIZADO</th>
                    <th data-options="field:'item8',width:100">FEMENINO</th>
                    <th data-options="field:'item9',width:100">MASCULINO</th>
                    <th data-options="field:'item10',width:200">MUNICIPIO / PARROQUIA</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $html; ?>
            </tbody>
        </table>
        <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="../grid/jquery.easyui.min.js"></script>
    </body>
</html>