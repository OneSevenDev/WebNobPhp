<?php 
	session_start();
	include("../class/Cultivar.php");
	include("../class/Campo.php");
	include("../class/Evaluacion.php");	
	include("../class/Controlador.php");
	include("../class/Tratamiento.php");
	//datos para establecer la conexion con la base de mysql.
	//mysql_connect('localhost','biosegur_admin','bio.intranetbd')or die ('Ha fallado la conexi&oacute;n: '.mysql_error());
	//mysql_select_db('biosegur_intranet') or die ('Error al seleccionar la Base de Datos: '.mysql_error());
	
	
	$nombreC= $_POST["controlador"];
	$parejas=$_POST["tbNp"];
	$fecha_reg=date("Y/m/d");
	$fecha_tra=$_POST["fecha_tra"];
	$porcentaje=100;
	$id_evaluacion=$_SESSION["id_evaluacion"];
	
	if(trim($nombreC)!="" && trim($parejas)!="" && trim($fecha_tra)!=""){	
		$vo_controlador=new Controlador();
		
		$vo_tratamiento=new Tratamiento();
		$vo_tratamiento->setid_evaluacion($id_evaluacion);
		$vo_tratamiento->setnumero_parajeas($parejas);
		$vo_tratamiento->setid_controladores($vo_controlador->getID_fromNombre($nombreC));
		$vo_tratamiento->setfecha_tratamiento($fecha_tra);
		$vo_tratamiento->setfecha_registro($fecha_reg);
		
		$band1=$vo_tratamiento->insertarNuevo();
			
		if($band1){
			$_SESSION["sMensaje"] ="";
			$vo_evaluacion=new Evaluacion();
			$id_cuartel=$vo_evaluacion->buscarid_cuartel($id_evaluacion);			
			$pagd="../bio_evaluacionesCuartel.php?id_cuartel=".$id_cuartel;
			header("Location:".$pagd."");			
		}
		else{
			var_dump($vo_tratamiento);
			$_SESSION["sMensaje"] ="Error Externo";			
			//$pagd="../bio_aplicarTratamiento.php?id_evaluacion=".$id_evaluacion;
			//header("Location:".$pagd."");
		}
		
	}else{
		$_SESSION["sMensaje"] ="Datos incompletos ...";				
		$pagd="../bio_aplicarTratamiento.php?id_evaluacion=".$id_evaluacion;
		header("Location:".$pagd."");
	}
	mysql_close();
?>