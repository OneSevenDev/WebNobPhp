<?php 
	session_start();
	include("../class/Muestra.php");
	include("../class/Evaluacion.php");	
	$id_muestras=$_REQUEST['id_muestras'] ;
	$vo_muestra=new Muestra();
	$vo_muestra->reconstruir($id_muestras);
		
	$total= $_POST["tbTotal"];
	$picados=$_POST["tbPicados"];
	
	if(trim($total)!="" && trim($picados)!=""){			
		$vo_muestra->settotal($total);
		$vo_muestra->setpicados($picados);
		$vo_muestra->setporcentaje(100*$picados/$total);
		$band1=$vo_muestra->actualizarDatos();
		if($band1){
			$_SESSION["sMensaje"] ="";	
			$vo_evaluacion=new Evaluacion();
			$id_evaluaciones=$vo_muestra->getid_evaluacion();
			$vo_evaluacion->reconstruir($id_evaluaciones);
			$id_cuartel=$vo_evaluacion->getid_cuartel();
			$vo_evaluacion->recalcularPorcentaje();
			$pagd="../bio_muestrasEvaluaciones.php?id_cuartel=".$id_cuartel."&id_evaluaciones=".$id_evaluaciones;
			header("Location:".$pagd."");
		}
		else{
			$_SESSION["sMensaje"] ="Error Externo";
			$pagd="../bio_editarMuestra.php?id_muestras=".$id_muestras;
			header("Location:".$pagd."");
		}		
	}else{
		$_SESSION["sMensaje"] ="Datos incompletos ...";				
			$pagd="../bio_editarMuestra.php?id_muestras=".$id_muestras;
		header("Location:".$pagd."");
	}
	mysql_close();
?>