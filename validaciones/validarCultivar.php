<?php 
	session_start();
 
	//datos para establecer la conexion con la base de mysql.
	mysql_connect('localhost','biosegur_admin','bio.intranetbd')or die ('Ha fallado la conexi&oacute;n: '.mysql_error());
	mysql_select_db('biosegur_intranet') or die ('Error al seleccionar la Base de Datos: '.mysql_error());
	
	$variedad= $_POST["tbVariedad"];
	$codigo=$_POST["tbCodigo"];
	$descripcion=$_POST["tbDescripcion"];
	
	if(trim($variedad) != "" && trim($codigo) != ""){		
		$result= mysql_query("select codigo from cultivar where codigo='$codigo';");		
		if($row= mysql_fetch_array($result)){
			$_SESSION["sMensaje"] ="El codigo ya esta registrado ...";
			$pagd="../registrarCultivar.php";
			header("Location: $pagd");			
		}
		else{
			$band = mysql_query("insert into cultivar values (null,'$variedad','$codigo','$descripcion');");	
			if($band){
				$_SESSION["sMensaje"] ="";
				$pagd="../cultivarBioseguridad.php";
				header("Location: $pagd");
			}
			else{
				$_SESSION["sMensaje"] ="Ocurrio un error externo";
				$pagd="../registrarCultivar.php";
				header("Location: $pagd");			
			}
		}				
	}else{
		$_SESSION["sMensaje"] ="Datos incompletos ...";
		$pagd="../registrarCultivar.php";
		header("Location: $pagd");
	}
	mysql_close();
?>