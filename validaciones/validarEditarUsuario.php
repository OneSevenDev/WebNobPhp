<?php 
	session_start();
	include("../class/Usuario.php");
	//datos para establecer la conexion con la base de mysql.
	//mysql_connect('localhost','biosegur_admin','bio.intranetbd')or die ('Ha fallado la conexi&oacute;n: '.mysql_error());
	//mysql_select_db('biosegur_intranet') or die ('Error al seleccionar la Base de Datos: '.mysql_error());
	$id_usuario=$_REQUEST['id_usuario'];
	$user=new Usuario();		
	$user->reconstruirUsuario($id_usuario);
	
	$nombre= $_POST["tbNombreU"];
	$apellido=$_POST["tbApellidoU"];
	$mail=$_POST["tbMailU"];
	$telefono=$_POST["tbTelefonoU"];	
	$login=$_POST["tbLoginU"];
	$contrasena= $_POST["tbPasswordU"];	
	
	if(trim($nombre)!="" && trim($apellido)!="" && trim($login)!="" && trim($contrasena)!=""){			
		$user->setnombre($nombre);
		$user->setapellido($apellido);
		$user->setmail($mail);
		$user->settelefono($telefono);				
		$user->setpassword($contrasena);		
		
		$ocupado=$user->comprobarLogin($login);
		if($ocupado==true && $login!=$user->getlogin()){
			$_SESSION["sMensaje"] ="Ya existe un usuario registrado con el mismo login. Por favor intente con otro";
			$pagd="../bio_editarUsuario.php?id_usuario=".$id_usuario;
			header("Location:".$pagd."");
		}
		else{
			$user->setlogin($login);
			$band1=$user->actualizarDatos();
			if($band1){
				$_SESSION["sMensaje"] ="";			
				$pagd="../bio_usuariosCampo.php?id_campo=".$user->getIdcampo();		
				header("Location:".$pagd."");
			}
			else{
				$_SESSION["sMensaje"] ="Error Externo";
				$pagd="../bio_editarUsuario.php?id_usuario=".$id_usuario;
				header("Location:".$pagd."");
			}
		}
	}else{
		$_SESSION["sMensaje"] ="Datos incompletos ...";				
		$pagd="../bio_editarUsuario.php?id_usuario=".$id_usuario;
		header("Location:".$pagd."");
	}
	mysql_close();
?>