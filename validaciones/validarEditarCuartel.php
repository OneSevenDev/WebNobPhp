<?php 
	session_start();
	include("../class/Cuartel.php");	
	$id_cuartel=$_REQUEST['id_cuartel'] ;
	$vo_cuartel=new Cuartel();
	$vo_cuartel->reconstruirCuartel($id_cuartel);
		
	$nombre= $_POST["tbNombreC"];
	$ha=$_POST["tbhaC"];
	
	if(trim($nombre)!="" && trim($ha)!=""){			
		$vo_cuartel->setdescripcion($nombre);
		$vo_cuartel->setha($ha);
		
		$band1=$vo_cuartel->actualizarDatos();
		if($band1){
			$_SESSION["sMensaje"] ="";			
			$pagd="../bio_cuartelesCampo.php?id_campo=".$vo_cuartel->getid_campo();		
			header("Location:".$pagd."");
		}
		else{
			$_SESSION["sMensaje"] ="Error Externo";
			$pagd="../bio_editarCuartel.php?id_cuartel=".$id_cuartel;
			header("Location:".$pagd."");
		}		
	}else{
		$_SESSION["sMensaje"] ="Datos incompletos ...";				
			$pagd="../bio_editarCuartel.php?id_cuartel=".$id_cuartel;
		header("Location:".$pagd."");
	}
	mysql_close();
?>