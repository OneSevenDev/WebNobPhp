<?php 
	session_start();
	include("../class/Gerente.php");
		
	$id_gerente=$_REQUEST['id_gerente'] ;
	//datos para establecer la conexion con la base de mysql.
	mysql_connect('localhost','biosegur_admin','bio.intranetbd')or die ('Ha fallado la conexi&oacute;n: '.mysql_error());
	mysql_select_db('biosegur_intranet') or die ('Error al seleccionar la Base de Datos: '.mysql_error());
	
	$nombreG=$_POST["tbNombreG"];
	$apellidoG= $_POST["tbApellidoG"];
	$telefonoG= $_POST["tbTelefonoG"];
	$loginG= $_POST["tbLoginG"];
	$passwordG= $_POST["tbPasswordG"];
	
	if(trim($nombreG) != "" && trim($loginG) != "" && trim($passwordG) != ""){
		$vo_gerente=new Gerente();
		$ocupado=$vo_gerente->comprobarLogin($loginG);
		
		if($loginG==$_SESSION["sLogin"])
			$ocupado=false;
			
		if($ocupado==false){
			$band2 = mysql_query("update gerente set nombre='".$nombreG."',apellido='".$apellidoG."', telefono='".$telefonoG."', login='".$loginG."', contrasena='".$passwordG."' where id_gerente=".$id_gerente.";");
			if($band2){
				$_SESSION["sMensaje"] ="";
				$pagd="../ger_exito.php";
				header("Location: $pagd");
			}
		}
		else{
			$_SESSION["sMensaje"] ="El login ya se encuentra registrado.. por favor intente con otros ...";
			$pagd="../ger_miPerfil.php?id_gerente=".$id_gerente;
			header("Location:".$pagd);			
		}			
	}
	else{
		$_SESSION["sMensaje"] ="Datos incompletos ...";
		$pagd="../ger_miPerfil.php?id_gerente=".$id_gerente;
		header("Location:".$pagd);
	}
	mysql_close();
?>