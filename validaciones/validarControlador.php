<?php 
	session_start();
 
	//datos para establecer la conexion con la base de mysql.
	mysql_connect('localhost','biosegur_admin','bio.intranetbd')or die ('Ha fallado la conexi&oacute;n: '.mysql_error());
	mysql_select_db('biosegur_intranet') or die ('Error al seleccionar la Base de Datos: '.mysql_error());
	
	$nombre= $_POST["tbNombre"];
	$descripcion=$_POST["tbDescripcion"];
	
	if(trim($nombre) != ""){		
		$result= mysql_query("select nombre from controladores where nombre='$nombre';");		
		if($row= mysql_fetch_array($result)){
			$_SESSION["sMensaje"] ="El controlador ya esta registrado ...";
			$pagd="../registrarControlador.php";
			header("Location: $pagd");			
		}
		else{
			$band = mysql_query("insert into controladores values (null,'$nombre','$descripcion');");	
			if($band){
				$_SESSION["sMensaje"] ="";
				$pagd="../controladoresBioseguridad.php";
				header("Location: $pagd");
			}
			else{
				$_SESSION["sMensaje"] ="Ocurrio un error externo";
				$pagd="../registrarControlador.php";
				header("Location: $pagd");			
			}
		}				
	}else{
		$_SESSION["sMensaje"] ="Datos incompletos ...";
		$pagd="../registrarControlador.php";
		header("Location: $pagd");
	}
	mysql_close();
?>