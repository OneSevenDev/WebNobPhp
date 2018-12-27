<?php 
	session_start();
	include("../class/Cultivar.php");
	include("../class/Campo.php");
	include("../class/Usuario.php");
	//datos para establecer la conexion con la base de mysql.
	//mysql_connect('localhost','biosegur_admin','bio.intranetbd')or die ('Ha fallado la conexi&oacute;n: '.mysql_error());
	//mysql_select_db('biosegur_intranet') or die ('Error al seleccionar la Base de Datos: '.mysql_error());
	$id_campo=$_REQUEST['id_campo'];
	
	$nombre= $_POST["tbNombreU"];
	$apellido=$_POST["tbApellidoU"];
	$mail=$_POST["tbMailU"];
	$telefono=$_POST["tbTelefonoU"];
	$perfil=$_POST["cbPerfilU"];
	$login=$_POST["tbLoginU"];
	$contrasena= $_POST["tbPasswordU"];	
	
	if($id_campo>0 && trim($nombre)!="" && trim($apellido)!="" && trim($login)!="" && trim($contrasena)!=""){	
		$user=new Usuario();			
		$user->setnombre($nombre);
		$user->setapellido($apellido);
		$user->setmail($mail);
		$user->settelefono($telefono);
		$user->settipo($perfil);
		$user->setlogin($login);
		$user->setpassword($contrasena);
		$user->setIdcampo($id_campo);
		
		$ocupado=$user->comprobarLogin($login);
		if($ocupado==true){
			$_SESSION["sMensaje"] ="Ya existe un usuario registrado con el mismo login. Por favor intente con otro";
			$pagd="../bio_registrarUsuario.php?id_campo=".$id_campo;
			header("Location:".$pagd."");
		}
		else{
			$band1=$user->insertarNuevo();
			if($band1){
				$_SESSION["sMensaje"] ="";			
				$pagd="../bio_usuariosCampo.php?id_campo=".$id_campo;		
				header("Location:".$pagd."");
			}
			else{
				$_SESSION["sMensaje"] ="Error Externo";
				$pagd="../bio_registrarUsuario.php?id_campo=".$id_campo;
				header("Location:".$pagd."");
			}
		}
	}else{
		$_SESSION["sMensaje"] ="Datos incompletos ...";				
		$pagd="../bio_registrarUsuario.php?id_campo=".$id_campo;
		header("Location:".$pagd."");
	}
	mysql_close();
?>