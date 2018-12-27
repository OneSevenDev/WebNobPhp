<?php 
	session_start();
	include("../class/Cultivar.php");
	include("../class/Campo.php");
	include("../class/Evaluacion.php");	
	include("../class/Muestra.php");	
	//datos para establecer la conexion con la base de mysql.
	//mysql_connect('localhost','biosegur_admin','bio.intranetbd')or die ('Ha fallado la conexi&oacute;n: '.mysql_error());
	//mysql_select_db('biosegur_intranet') or die ('Error al seleccionar la Base de Datos: '.mysql_error());
	
	$id_cuartel=$_REQUEST['id_cuartel'];
	$nro_corte=$_POST["tbCorte"];
	$edad= $_POST["tbEdad"];
	$fecha_eva=$_POST["tbFechEva"];
	$fecha_reg=date("Y/m/d");
	$nro_muestras=$_POST["tbNroMuestras"];
	$porcentaje=100;
	
	
	if(trim($edad)!="" && trim($fecha_eva)!="" && trim($nro_muestras)!=""){	
		$vo_evaluacion=new Evaluacion();
		$id_evaluacion=$vo_evaluacion->getLastID();
		$id_evaluacion++;
		
		$vo_evaluacion->setid($id_evaluacion);
		$vo_evaluacion->setid_cuartel($id_cuartel);
		$vo_evaluacion->setnumero_corte($nro_corte);
		$vo_evaluacion->setedad($edad);
		$vo_evaluacion->setfecha_evaluacion($fecha_eva);
		$vo_evaluacion->setfecha_registro($fecha_reg);
		$vo_evaluacion->setnumero_muestras($nro_muestras);
		$vo_evaluacion->setporcentaje_Total($porcentaje);
		
		$band1=$vo_evaluacion->insertarNuevo();
			
		if($band1){
			$_SESSION["edad"]=$edad;
			$_SESSION["fecha_eval"]=$fecha_eva;
			$_SESSION["clave_c"]=$_SESSION["id_campo"];
			$_SESSION["corte_ev"]=$nro_corte;
			$vo_muestra=new Muestra();
			for ( $i = 1 ; $i <= $nro_muestras ; $i++) {
				$vo_muestra->insertarTemporal($id_evaluacion);
			}
			$_SESSION["sMensaje"] ="";			
			$pagd="../bio_muestrasEvaluaciones.php?id_cuartel=".$id_cuartel."&id_evaluaciones=".$id_evaluacion;
			header("Location:".$pagd."");			
		}
		else{
			echo var_dump($vo_evaluacion);
			//$_SESSION["sMensaje"] ="Error Externo";			
			//$pagd="../bio_evaluarCuartel.php?id_cuartel=".$id_cuartel;
			//header("Location:".$pagd."");
		}
		
	}else{
		$_SESSION["sMensaje"] ="Datos incompletos ...";				
		$pagd="../bio_evaluarCuartel.php?id_cuartel=".$id_cuartel;
		header("Location:".$pagd."");
	}
	mysql_close();
?>