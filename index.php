<?php
	include_once "sesion.php";

	include_once "conexion.php";

	date_default_timezone_set("America/Caracas");

	$sesion = new sesion($link);

	if(isset($_GET['close']) && !empty($_GET['close']) && isset($_SESSION['cedula']) && !empty($_SESSION['cedula'])) {
		$sesion->close_sesion();
		unset($_SESSION['cedula']);
		session_destroy();
	}

	/*** OPERACIONES ***/

	$_POST['opr_area'] = (!isset($_POST['opr_area']) && empty($_POST['opr_area'])) ? null : $_POST['opr_area'];

	/*** INGRESA ATENDIDOS ***/
	if (
		isset($_POST['cedula_atn']) && 
		!empty($_POST['cedula_atn']) && 
		$_POST['opr_area'] != 'ar_12' && 
		$_POST['opr_area'] != 'ar_02' &&
		$_POST['opr_area'] != 'ar_05'		
	) {
		/*** GENERA CODIGO A LOS NO CEDULADOS ***/
		if ($_POST['cedula_atn'] == 's/c')
			$_POST['cedula_atn'] = codigoSC($_POST['nombres_atn']);

		/*** TRANSFORMA FECHA ***/
		$fecha = date("Y-m-d", strtotime($_POST['f_nac_atn']));

		/*** GUARDA INFORMACION DE LOS ATENDIDOS ***/

		mysql_num_rows(mysql_query("SELECT cedula FROM atendido WHERE (cedula = '{$_POST['cedula_atn']}') LIMIT 1;",$link));

		if (mysql_num_rows(mysql_query("SELECT cedula FROM atendido WHERE (cedula = '{$_POST['cedula_atn']}') LIMIT 1;",$link)) == 0) {
			mysql_query("INSERT INTO atendido VALUES('{$_POST['cedula_atn']}','{$_POST['nombres_atn']}','{$fecha}','{$_POST['sexo_atn']}','{$_POST['procedencia_atn']}','{$_POST['telefono_atn']}');",$link);
		}

		/*** GUARDA INFORMACION DE LOS MOVIMIENTOS DE USUARIOS ***/
		mysql_query("INSERT INTO movimiento(tipo,area,fecha_hora,usuario_cedula) VALUES('ing','{$_POST['opr_area']}','". date("Y-m-d h:m:s") ."','{$_SESSION['cedula']}');",$link);
	}

	if (
		isset($_POST['opr_area']) && 
		!empty($_POST['opr_area'])
	) {
		switch($_POST['opr_area']) {
			case 'ar_01': {
				//INGRESO EN MEDICINA
				$fecha = date("Y-m-d", strtotime($_POST['fecha_01']));
				if(isset($_POST['n_01']) && !empty($_POST['n_01']))
					mysql_query("INSERT INTO medicina VALUES({$_POST['n_01']},'{$_POST['diag_01']}','{$_POST['obse_01']}','{$fecha}','{$_POST['refe_01']}','{$_POST['cedula_atn']}');",$link);
				break;
			}
			case 'ar_02': {
				//INGRESO EN CAPACITACION
				$fecha_desde = date("Y-m-d", strtotime($_POST['desd_02']));
				$fecha_hasta = date("Y-m-d", strtotime($_POST['hast_02']));
				if(isset($_POST['n_02']) && !empty($_POST['n_02']))
					mysql_query("INSERT INTO capacitacion VALUES({$_POST['n_02']},'{$_POST['acti_02']}','{$_POST['arti_02']}','{$fecha_desde}','{$fecha_hasta}','{$_POST['obse_02']}','{$_POST['h_02']}','{$_POST['real_02']}',{$_POST['fem_02']},{$_POST['mas_02']},'{$_POST['procedencia_02']}');",$link);
				break;
			}
			case 'ar_03': {
				//INGRESO EN DONACION
				$fecha = date("Y-m-d", strtotime($_POST['fecha_03']));
				if(isset($_POST['n_03']) && !empty($_POST['n_03']))
					mysql_query("INSERT INTO donacion VALUES({$_POST['n_03']},'{$_POST['tipo_03']}',{$_POST['cant_03']},'{$_POST['obse_03']}','{$_POST['proc_03']}','{$fecha}',{$_POST['mont_03']},'{$_POST['cedula_atn']}');",$link);
				break;
			}
			case 'ar_04': {
				//INGRESO EN GINECOLOGIA
				$fecha = date("Y-m-d", strtotime($_POST['fecha_04']));
				$cita = date("Y-m-d", strtotime($_POST['cita_04']));
				if(isset($_POST['n_04']) && !empty($_POST['n_04']))
					mysql_query("INSERT INTO ginecologia VALUES({$_POST['n_04']},'{$_POST['acti_04']}','{$_POST['obse_04']}','{$fecha}','{$_POST['refe_04']}','{$cita}','{$_POST['cedula_atn']}');",$link);
				break;
			}
			case 'ar_05': {
				//INGRESO EN JORNADA
				$fecha = date("Y-m-d", strtotime($_POST['fecha_05']));
				if(isset($_POST['n_05']) && !empty($_POST['n_05']))
					mysql_query("INSERT INTO jornada VALUES({$_POST['n_05']},'{$_POST['tipo_05']}','{$fecha}','".implode(",",$_POST['aten_05'])."','{$_POST['obse_05']}','{$_POST['procedencia_05']}',{$_POST['fem_05']},{$_POST['mas_05']});",$link);
				break;
			}
			case 'ar_06': {
				//INGRESO EN LEGAL
				$fecha = date("Y-m-d", strtotime($_POST['fecha_06']));
				if(isset($_POST['n_06']) && !empty($_POST['n_06']))
					mysql_query("INSERT INTO legal VALUES({$_POST['n_06']},'".implode(",",$_POST['vio_06'])."','{$_POST['obse_06']}','{$fecha}','{$_POST['remi_06']}','{$_POST['real_06']}','{$_POST['cedula_atn']}');",$link);
				break;
			}
			case 'ar_07': {
			//INGRESO EN PEDIATRIA
			$fecha = date("Y-m-d", strtotime($_POST['fecha_07']));
				if(isset($_POST['n_07']) && !empty($_POST['n_07']))
					mysql_query("INSERT INTO pediatria VALUES({$_POST['n_07']},'{$_POST['diag_07']}','{$fecha}','{$_POST['remi_07']}','{$_POST['cedula_atn']}');",$link);
				break;
			}
			case 'ar_08': {
				//INGRESO EN PROYECTO
				$fecha = date("Y-m-d", strtotime($_POST['fecha_08']));
				if(isset($_POST['n_08']) && !empty($_POST['n_08']))
					mysql_query("INSERT INTO proyecto VALUES({$_POST['n_08']},'{$_POST['rubr_08']}','{$_POST['mont_08']}','{$_POST['obse_08']}','{$fecha}','{$_POST['n_08_ex']}','{$_POST['proc_08']}','{$_POST['opr_08']}','{$_POST['cedula_atn']}');",$link) or die(mysql_error());
				break;
			}
			case 'ar_09':
			{
				//INGRESO EN PSICOLOGIA
				$in = (calculaedad($_POST['f_nac_atn']) < 18) ? 's' : 'n';
				$fecha = date("Y-m-d", strtotime($_POST['fecha_09']));
				$vio = (!empty($_POST['vio_09'])) ? implode(",",$_POST['vio_09']) : '';
				if(isset($_POST['n_09']) && !empty($_POST['n_09']))
					mysql_query("INSERT INTO psicologia VALUES(NULL,'{$_POST['acti_09']}','{$vio}','{$fecha}','{$_POST['remi_a_09']}','{$_POST['remi_p_09']}','{$_POST['real_09']}','{$_POST['cedula_atn']}','{$in}');",$link);
				break;
			}
			case 'ar_10': {
				//INGRESO EN SISDAPRO
				$fecha = date("Y-m-d", strtotime($_POST['fecha_10']));
				if(isset($_POST['n_10']) && !empty($_POST['n_10']))
					mysql_query("INSERT INTO sisdapro VALUES({$_POST['n_10']},'{$_POST['desc_10']}','{$_POST['cont_10']}','{$fecha}','{$_POST['remi_10']}','{$_POST['cedula_atn']}');",$link);
				break;
			}
			case 'ar_11': {
				//INGRESO EN SOCIAL
				$fecha = date("Y-m-d", strtotime($_POST['fecha_11']));
				if(isset($_POST['n_11']) && !empty($_POST['n_11']))
					mysql_query("INSERT INTO social VALUES({$_POST['n_11']},'{$_POST['obse_11']}','{$_POST['desc_11']}','{$_POST['proc_11']}','{$fecha}','{$_POST['remi_11']}','{$_POST['real_11']}','{$_POST['cedula_atn']}');",$link);
				break;
			}
			case 'ar_12': {
				//INGRESO EN TALLER
				$fecha = date("Y-m-d", strtotime($_POST['fecha_12']));
				if(isset($_POST['n_12']) && !empty($_POST['n_12']))
					mysql_query("INSERT INTO taller VALUES({$_POST['n_12']},'{$_POST['tipo_12']}','{$_POST['obse_12']}','{$fecha}','".implode(",",$_POST['real_12'])."',{$_POST['fem_12']},{$_POST['mas_12']},'{$_POST['procedencia_12']}','{$_POST['remi_12']}','{$_POST['hora_12']}','{$_POST['lugar_12']}','{$_POST['equipo_12']}','{$_POST['tel_12']}');",$link);
				break;
			}
			case 'us': {
				//INGRESO USUARIOS
				if(isset($_POST['cedula_us']) && !empty($_POST['cedula_us']))
					mysql_query("INSERT INTO usuario VALUES({$_POST['cedula_us']},'{$_POST['nombre_us']}','{$_POST['apellido_us']}','{$_POST['pass_us']}','{$_POST['tipo_us']}','{$_POST['area_us']}');",$link);
				break;
			}
			case 'archivo': {
				//GESTION DE ARCHIVOS
				if(isset($_POST['opr']) && !empty($_POST['opr']) && isset($_POST['cedula_atn_arch']) && !empty($_POST['cedula_atn_arch'])) {
					$ruta = "/var/www/html/DAIMC/archivo/{$_POST['cedula_atn_arch']}/";
					if($_POST['opr'] == 'i') {
						$uploadfile_tmp = $_FILES['archivo']['tmp_name'];
						$uploadfile_name = $ruta.$_FILES['archivo']['name'];
						if(is_dir($ruta) == 0) {
							mkdir($ruta, 0775);
						}
						if(is_uploaded_file($uploadfile_tmp)) {
							move_uploaded_file($uploadfile_tmp, $uploadfile_name);
						}
					} elseif($_POST['opr'] == 'e') {
						unlink($ruta.$_POST['arch_del']);
					}
				}
				break;
			}
		}
	}

	mysql_close($link);


function calculaedad($fecha) {
	$date2 = date('Y-m-d');
	$diff = abs(strtotime($date2) - strtotime($fecha));
	return $years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
}

function codigoSC($nombres) {
	return substr(md5($nombres.date('Y-m-d H:m:s')),0,10);
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
    	<link rel="shortcut icon" href="img/candado.png" type="image/x-icon" />

		<title>Sistema De DAIMC (IMET)</title>

		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" type="text/css" href="css/datagrid.css">

		<script src="js/jquery-1.10.2.min.js"></script>

		<script src="js/index.js"></script>
		<script src="js/form1.js"></script>
		<script src="js/form2.js"></script>
		<script src="js/form3.js"></script>
		<script src="js/form4.js"></script>
		<script src="js/form5.js"></script>
		<script src="js/form6.js"></script>
		<script src="js/form7.js"></script>
		<script src="js/form8.js"></script>
		<script src="js/form9.js"></script>
		<script src="js/form10.js"></script>
		<script src="js/form11.js"></script>
		<script src="js/form12.js"></script>
		<script src="js/formus.js"></script>

		<link href="plugins/bootstrap/bootstrap.css" rel="stylesheet" />
		<link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
		<link href="plugins/fancybox/jquery.fancybox.css" rel="stylesheet" />
		<link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet" />
		<link href="plugins/xcharts/xcharts.min.css" rel="stylesheet" />
		<link href="plugins/select2/select2.css" rel="stylesheet" />
		<link href="plugins/justified-gallery/justifiedGallery.css" rel="stylesheet" />
		<link href="plugins/chartist/chartist.min.css" rel="stylesheet" />
		<link href="plugins/build.css" rel="stylesheet" />
	</head>

	<body>
		<section id="total">
			<header>
				<img src="img/logo_imet.png">
				<div id="tt0">
					<span id="tt1">Instituto de la Mujer del Estado Trujillo</span><br>
					<span id="tt5">Sistema De Atención</span><br>
					<span id="tt3">DAIMC</span>
				</div>
				<div id="ts0">
					<span id="fch">Fecha <?php  echo date("d-m-Y"); ?> </span><br>
					<?php
						if( (isset($_SESSION['cedula']) && !empty($_SESSION['cedula'])) )
						{
							echo "<span charset=\"UTF-8\" id=\"user\">Sr(a). {$_SESSION['nombre']}</span>
									<a id=\"ico_close_a\" href=\"?close=sesion\">
										<div id=\"ico_close\" title=\"Cerrar Sesion\"></div>
									</a>";
						}
					?>
				</div>
			</header>

			<section id="zonawork">
				<label class="msj_opr"></label>
				<form id="form2" name="form2" method="post" action="consulta_interna.php" ><input id="json" name="json" type="hidden"><input id="vector" name="vector" type="hidden"></form>
				<form id="princ" class="form-horizontal" method="post" action="?" enctype="multipart/form-data">
					<fieldset class="login">

					<?php
						if( (!isset($_SESSION['cedula']) && empty($_SESSION['cedula'])) )
						{
							echo "<img id=\"logo_ini\" src=\"img/candado.png\" style=\"position:absolute;left:42%;width:150px;\"/>
							<div class=\"col-sm-3\">
								<input id=\"cedula_ini\" name=\"cedula_ini\" class=\"int form-control\" type=\"text\" placeholder=\"Cedula\" tabindex=\"1\" style=\"position:absolute;top:170px;left:400px;\" autofocus />
							</div><div class=\"col-sm-3\">
								<input id=\"clave_ini\" name=\"clave_ini\" class=\"form-control\" type=\"password\" placeholder=\"Contraseña\" tabindex=\"2\" style=\"position:absolute;top:210px;left:110px;\" />
							</div>
							<!--<script>Tconculta_hide();</script>-->";
						}
						else
						{
							if(!isset($_GET['f']))
								$_GET['f'] = 0;
							if($_GET['f'] == 'u' && $_SESSION['grado'] > 1)
								$_GET['f'] = 0;

							switch($_GET['f']) {
								default :
										include_once "form/form1.php";
									break;
								case '2':
										include_once "form/form2.php";
									break;
								case '3':
										include_once "form/form3.php";
									break;
								case '4':
										include_once "form/form4.php";
									break;
							}
						}
					?>

					</fieldset>
				</form>
				<div id="show_table">
					<div class="nota">* Presione Esc Para Salir</div>
					<center>
						<iframe src="" width="1200" height="550" style="margin-top:10px;"></iframe>
					</center>
				</div>
			</section>

			<footer style="color:#FFF;font-size:17px;">
				<div style="margin:7px;display:inline-block;">INSTITUTO DE LA MUJER DEL ESTADO TRUJILLO</div>
				<div style="margin:7px;display:inline-block;float:right;">AREÁ DE SISTEMAS</div>
			</footer>

			<nav>

				<a>
					<?php
						if( (isset($_SESSION['cedula']) && !empty($_SESSION['cedula'])) )
						{
							echo "<button id=\"nav_btn_1\" class=\"btn\" style=\"left:0.5%;\">Atención</button>
									<button id=\"nav_btn_2\" class=\"btn\" style=\"left:9.5%;\">Busqueda</button>
									<button id=\"nav_btn_4\" class=\"btn\" style=\"left:18.5%;\">Archivo</button>
								";
								if($_SESSION['grado'] == 1)
									echo "<button id=\"nav_btn_3\" class=\"btn\" style=\"left:89.2%;top:-35px;background-color:#B7347E;border:0px;\">Usuarios</button>";
						}
					?>
				</a>

			</nav>

			<script>

				$(function( ){
					'use strict';

					$(document).ready(function( ){
						var $width = $(document).width();
						$('section#total').css('left',( ($width - 1300) / 2)+'px');
					});

					$('nav a button').click(function(e){

						switch($(this).attr('id'))
						{
							case 'nav_btn_1': $('nav a').attr('href', '?f=1'); break;
							case 'nav_btn_2': $('nav a').attr('href', '?f=2'); break;
							case 'nav_btn_3': $('nav a').attr('href', '?f=3'); break;
							case 'nav_btn_4': $('nav a').attr('href', '?f=4'); break;
						};

					});

					<?php
						if( isset($_GET['f']) && !empty($_GET['f']) )
						{
							echo "$('form').attr('action', '?f=". $_GET['f'] ."');\n";
						}

						if(isset($_SESSION)) {
							if($_SESSION['grado'] == 3)
								echo "$('#send, #canc, #edit').prop('disabled','disabled');\n";


							$porciones = explode(",", $_SESSION['area']);
							for($i=0;$i<count($porciones);$i++)
								if($porciones[$i] == 'ar_09' || $_SESSION['grado'] == '1') {
									echo "$('input#cedula_atn_arch').removeAttr('disabled');\n";
								}
						}

						if(isset($_POST['json']) && !empty($_POST['json']) && isset($_POST['vector']) && !empty($_POST['vector'])) {

							if(file_exists('ReporteDatos.txt'))
								unlink('ReporteDatos.txt');
							if(file_exists('ReporteColumna.txt'))
								unlink('ReporteColumna.txt');

							$file = fopen("ReporteDatos.txt","a") or die("Problemas ReporteDatos.txt");
							fputs($file,$_POST['json']);
							fclose($file);

							$file = fopen("ReporteColumna.txt","a") or die("Problemas ReporteColumna.txt");
							fputs($file,$_POST['vector']);
							fclose($file);

							echo "window.open('reporte.php','_blank');\n";

						}

						if(isset($_POST['opr']) && !empty($_POST['opr']) && $_POST['opr'] == 'd' && isset($_POST['cedula_atn_arch']) && !empty($_POST['cedula_atn_arch']) && isset($_POST['name_atn_arch']) && !empty($_POST['name_atn_arch']) ) {
							echo "window.open('archivo/".$_POST['cedula_atn_arch']."/".$_POST['name_atn_arch']."','_blank');\n";
						}

					?>
				});
			</script>

			<script src="plugins/jquery/jquery.min.js"></script>
			<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
			<script src="plugins/bootstrap/bootstrap.min.js"></script>
			<script src="plugins/tinymce/tinymce.min.js"></script>
			<script src="plugins/select2/select2.min.js"></script>
			<script src="plugins/plug.js"></script>

		</section>
	</body>

</html>
