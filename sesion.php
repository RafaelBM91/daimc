<?php

	class sesion
	{
		var $link;

		function sesion($link){
			$this->link = $link;
			$this->init();
		}

		function init( )
		{
			if( (isset($_COOKIE['cedula']) && !empty($_COOKIE['cedula'])) && (isset($_COOKIE['clave']) && !empty($_COOKIE['clave'])) )
			{
				$result = mysql_query("SELECT CONCAT(nombre,' ',apellido), grado, area FROM usuario WHERE (cedula = '{$_COOKIE['cedula']}') AND (clave = '{$_COOKIE['clave']}') LIMIT 1;",$this->link);

				if(mysql_num_rows($result) > 0)
				{
					session_start();
					$row = mysql_fetch_array($result);
					$_SESSION['cedula'] = $_COOKIE['cedula'];
					$_SESSION['clave'] = $_COOKIE['clave'];
					$_SESSION['nombre'] = $row[0];
					$_SESSION['grado'] = $row[1];
					$_SESSION['area'] = $row[2];
				}
				else
					$this->close_sesion();
			}
			elseif( (isset($_POST['cedula_ini']) && !empty($_POST['cedula_ini'])) && (isset($_POST['clave_ini']) && !empty($_POST['clave_ini'])) )
			{
				$result = mysql_query("SELECT cedula, clave, CONCAT(nombre,' ',apellido), grado, area FROM usuario WHERE (cedula = '{$_POST['cedula_ini']}') AND (clave = '{$_POST['clave_ini']}') LIMIT 1;",$this->link);

				if(mysql_num_rows($result) > 0)
				{
					session_start();
					$row = mysql_fetch_array($result);
					setcookie('cedula', $row[0], time()+1800);
					setcookie('clave', $row[1], time()+1800);
					$_SESSION['cedula'] = $row[0];
					$_SESSION['clave'] = $row[1];
					$_SESSION['nombre'] = $row[2];
					$_SESSION['grado'] = $row[3];
					$_SESSION['area'] = $row[4];

					mysql_query("INSERT INTO movimiento(tipo,area,fecha_hora,usuario_cedula) VALUES('ini','{$row[4]}','". date("Y-m-d h:m:s") ."','{$row[0]}');",$this->link);
				}
				else {
					$this->close_sesion();
				}
			}
		}

		function cookie_post()
		{
			if( (isset($_COOKIE['cedula']) && !empty($_COOKIE['cedula'])) && (isset($_COOKIE['clave']) && !empty($_COOKIE['clave'])) )
			{
				setcookie('cedula', $_COOKIE['cedula'], time()+1800);
				setcookie('clave', $_COOKIE['clave'], time()+1800);
			}
		}

		function close_sesion()
		{
			setcookie('cedula', null, time() - 1);
			setcookie('clave', null, time() - 1);
		}
	}
?>