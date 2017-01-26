<?php
    include_once "../conexion.php";
    include_once "../consulta_interna.php";

    switch ($_GET['opc_busq']) {
        case '1': {
            // solo fecha
            $str = "SELECT m.id, (SELECT nombre FROM talleres WHERE codigo = m.tipo), m.observacion, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.realizado, m.femenina, m.masculino, m.procedencia, m.remitido_p, m.lugar, m.equipo, m.numero, m.hora FROM taller AS m WHERE (m.fecha >= '{$_GET['desd_busq']}') AND (m.fecha <= '{$_GET['hast_busq']}') ORDER BY m.fecha ASC;";
            break;
        }
        case '3': {
            // fecha + municipio
            $str = "SELECT m.id, (SELECT nombre FROM talleres WHERE codigo = m.tipo), m.observacion, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.realizado, m.femenina, m.masculino, m.procedencia, m.remitido_p, m.lugar, m.equipo, m.numero, m.hora FROM taller AS m WHERE (m.procedencia LIKE '%{$_GET['municipio_atn_busq']}%') AND (m.fecha >= '{$_GET['desd_busq']}') AND (m.fecha <= '{$_GET['hast_busq']}') ORDER BY m.fecha ASC;";
            break;
        }
        case '4': {
            // fecha + parroquia
            $str = "SELECT m.id, (SELECT nombre FROM talleres WHERE codigo = m.tipo), m.observacion, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.realizado, m.femenina, m.masculino, m.procedencia, m.remitido_p, m.lugar, m.equipo, m.numero, m.hora FROM taller AS m WHERE (m.procedencia = '{$_GET['parroquia_atn_busq']}') AND (m.fecha >= '{$_GET['desd_busq']}') AND (m.fecha <= '{$_GET['hast_busq']}') ORDER BY m.fecha ASC;";
            break;
        }
        case '5': {
            // fecha + realizado
            $str = "SELECT m.id, (SELECT nombre FROM talleres WHERE codigo = m.tipo), m.observacion, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.realizado, m.femenina, m.masculino, m.procedencia, m.remitido_p, m.lugar, m.equipo, m.numero, m.hora FROM taller AS m WHERE (m.realizado LIKE '%{$_GET['cedula_real_busq']}%') AND (m.fecha >= '{$_GET['desd_busq']}') AND (m.fecha <= '{$_GET['hast_busq']}') ORDER BY m.fecha ASC;";
            break;
        }
        case '8': {
            // fecha + talleres
            $str = "SELECT m.id, (SELECT nombre FROM talleres WHERE codigo = m.tipo), m.observacion, DATE_FORMAT(m.fecha,'%d-%m-%y'), m.realizado, m.femenina, m.masculino, m.procedencia, m.remitido_p, m.lugar, m.equipo, m.numero, m.hora FROM taller AS m WHERE (m.tipo LIKE '{$_GET['tal_busq']}') AND (m.fecha >= '{$_GET['desd_busq']}') AND (m.fecha <= '{$_GET['hast_busq']}') ORDER BY m.fecha ASC;";
            break;
        }
    }
    
    $result = mysql_query($str,$link);
    $html = '';
    $tr = 0;
    $femeninas = 0;
    $masculinos = 0;

    while ($row = mysql_fetch_array($result)) {

        $vec = explode(",",$row[4]);
        $nombres = '';
        foreach($vec as $c) {
            $rown = mysql_fetch_array( mysql_query( "SELECT CONCAT(nombre,' ',apellido) FROM usuario WHERE cedula = '{$c}';" , $link ) );
            $nombres .= "<li>".$rown[0]."</li>";
        }
        $row[4] = $nombres;

        $row[7] = "<font color=\"red\">".municipios(explode("_",$row[7])[0])."</font>  <strong>|</strong>  <font color=\"blue\">".parroquias($row[7])."</font>";

        $html .= "<tr id=\"datagrid-row-r1-2-{$tr}\">";
        for ($i = 0; $i < (sizeof($row)/2); $i++) {
            $cont = $i + 1;
            $rou = utf8_encode($row[$i]);
            if ($i == 6) {
                $femeninas += (int)$row[$i];
            }
            if ($i == 7) {
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
                    <th data-options="field:'item2',width:350">NOMBRE</th>
                    <th data-options="field:'item3',width:350">OBSERVACION</th>
                    <th data-options="field:'item4',width:100">FECHA</th>
                    <th data-options="field:'item5',width:100">REALIZADO</th>
                    <th data-options="field:'item6',width:100">FEMENINAS</th>
                    <th data-options="field:'item7',width:100">MASCULINOS</th>
                    <th data-options="field:'item8',width:200">MUNICIPIO / PARROQUIA</th>
                    <th data-options="field:'item10',width:200">REMITIDO POR</th>
                    <th data-options="field:'item11',width:200">LUGAR</th>
                    <th data-options="field:'item12',width:200">EQUIPOS</th>
                    <th data-options="field:'item13',width:200">TELEFONO</th>
                    <th data-options="field:'item14',width:200">HORA</th>
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