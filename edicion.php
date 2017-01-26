<?php

    include_once "sesion.php";

    include_once "conexion.php";

    date_default_timezone_set("America/Caracas");

    $sesion = new sesion($link);
    
    $sesion->cookie_post();

    if(isset($_POST['cedula_atn']) && !empty($_POST['cedula_atn']) && $_POST['cedula_atn'] != 's/c')
	{
        $fecha = date("Y-m-d", strtotime($_POST['f_nac_atn']));
         echo mysql_query("UPDATE atendido SET nombres = '{$_POST['nombres_atn']}', f_nacimiento = '{$fecha}', sexo = '{$_POST['sexo_atn']}', procedencia = '{$_POST['procedencia_atn']}', telefono = '{$_POST['telefono_atn']}' WHERE cedula = '{$_POST['cedula_atn']}';",$link);
    }
?>