<?php
    include_once "../conexion.php";

    mysql_query("SET @desde := '{$_GET['desd_busq']}', @hasta := '{$_GET['hast_busq']}';",$link);

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

    
    $result = mysql_query($str,$link);
    $html = '';
    $tr = 0;
    $femeninas = 0;
    $masculinos = 0;
    $error = mysql_error($link);

    while ($row = mysql_fetch_array($result)) {
        $html .= "<tr id=\"datagrid-row-r1-2-{$tr}\">";
        for ($i = 0; $i < (sizeof($row)/2); $i++) {
            $cont = $i + 1;
            $rou = utf8_encode($row[$i]);
            if ($i == 1) {
                $femeninas += (int)$row[$i];
            }
            if ($i == 2) {
                $masculinos += (int)$row[$i];
            }
            $html .= "<td field=\"item{$cont}\"><div class=\"{$class}\">{$rou}</div></td>";
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
        <table class="easyui-datagrid" <?php echo $title; ?> style="width:1198px;height:548px">
	        <thead>
	        	<tr>
                    <th data-options="field:'item1',width:200">AREA</th>
                    <th data-options="field:'item2',width:80">FEMENINAS</th>
                    <th data-options="field:'item3',width:90">MASCULINOS</th>
                    <th data-options="field:'item4',width:80">TOTAL</th>
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