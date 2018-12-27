<?php 
	session_start();
	$id_emp=$_REQUEST['id_empresa'] ;
	//datos para establecer la conexion con la base de mysql.
	mysql_connect('localhost','biosegur_admin','bio.intranetbd')or die ('Ha fallado la conexi&oacute;n: '.mysql_error());
	mysql_select_db('biosegur_intranet') or die ('Error al seleccionar la Base de Datos: '.mysql_error());
	
	$nombreE= $_POST["tbNombre"];
	$direccionE=$_POST["tbDireccion"];
	$rucE=$_POST["tbRuc"];
	$nombreG=$_POST["tbNombreG"];
	$apellidoG= $_POST["tbApellidoG"];
	$telefonoG= $_POST["tbTelefonoG"];
	$loginG= $_POST["tbLoginG"];
	$passwordG= $_POST["tbPasswordG"];
	
	if(trim($nombreE) != "" && trim($direccionE) != "" && trim($rucE) != "" && trim($nombreG) != "" && trim($loginG) != "" && trim($passwordG) != ""){
		$band1 = mysql_query("update empresa set nombre='".$nombreE."' , direccion='".$direccionE."' , RUC='".$rucE."' where id_empresa=".$id_emp.";");		
		$band2 = mysql_query("update gerente set nombre='".$nombreG."',apellido='".$apellidoG."', telefono='".$telefonoG."', login='".$loginG."', contrasena='".$passwordG."' where id_empresa=".$id_emp.";");	
		if($band1 && $band2){
			$_SESSION["sMensaje"] ="";
			$pagd="../empresasBioseguridad.php";
			header("Location: $pagd");
		}		
	}else{
		$_SESSION["sMensaje"] ="Datos incompletos ...";
		$pagd="../modificarEmpresa.php?id_empresa=".$id_emp;
		header("Location:".$pagd);
	}
	mysql_close();
?>