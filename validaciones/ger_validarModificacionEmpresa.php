<?php 
	session_start();
	
	$id_emp=$_REQUEST['id_empresa'] ;
	//datos para establecer la conexion con la base de mysql.
	mysql_connect('localhost','biosegur_admin','bio.intranetbd')or die ('Ha fallado la conexi&oacute;n: '.mysql_error());
	mysql_select_db('biosegur_intranet') or die ('Error al seleccionar la Base de Datos: '.mysql_error());
	
	$nombreE= $_POST["tbNombre"];
	$direccionE=$_POST["tbDireccion"];
	$rucE=$_POST["tbRuc"];
		
	if(trim($nombreE) != "" && trim($direccionE) != "" && trim($rucE)){

			$band1 = mysql_query("update empresa set nombre='".$nombreE."' , direccion='".$direccionE."' , RUC='".$rucE."' where id_empresa=".$id_emp.";");				
			if($band1){
				$_SESSION["sMensaje"] ="";
				$pagd="../ger_exito.php";
				header("Location: $pagd");
			}

	}else{
		$_SESSION["sMensaje"] ="Datos incompletos ...";
		$pagd="../ger_modificarEmpresa.php?id_empresa=".$id_emp;
		header("Location:".$pagd);
	}
	mysql_close();
?>