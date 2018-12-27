<?php 
	session_start();
	include("../class/Conclusion.php");
	
	//datos para establecer la conexion con la base de mysql.
	mysql_connect('localhost','biosegur_admin','bio.intranetbd')or die ('Ha fallado la conexi&oacute;n: '.mysql_error());
	mysql_select_db('biosegur_intranet') or die ('Error al seleccionar la Base de Datos: '.mysql_error());

	$id_evaluacioncampo=$_REQUEST['id_evaluacioncampo'];
	$vo_conclusion=new Conclusion();	
		
	$vo_conclusion->borrarConclusiones_segun_idEvaluacioncampo($id_evaluacioncampo);
	
	for($j=1;$j<=10;$j++){
		$valor=$_POST["tbValor".$j];
		if(trim($valor) != ""){
			$vo_conclusion->setdescripcion($valor);
			$vo_conclusion->setid_evaluacionCampo($id_evaluacioncampo);
			$vo_conclusion->insertarNuevo();
		}
	}
	$pagd="../bio_reporteEvaluacionCampo.php?id_evaluacioncampo=".$id_evaluacioncampo;
	header("Location: $pagd");
	mysql_close();
	//B60321590
?>