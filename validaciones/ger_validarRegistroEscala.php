<?php 
	session_start();
	include("../class/EscalaII.php");
	include("../class/Campo.php");
	include("../class/EvaluacionCampo.php");
	
	//datos para establecer la conexion con la base de mysql.
	mysql_connect('localhost','biosegur_admin','bio.intranetbd')or die ('Ha fallado la conexi&oacute;n: '.mysql_error());
	mysql_select_db('biosegur_intranet') or die ('Error al seleccionar la Base de Datos: '.mysql_error());

	$id_empresa=$_REQUEST['id_empresa'];
	$vo_campo=new Campo();
	$vo_escala=new EscalaII();
	
	$listaIndices=$vo_campo->getIndicesCampo_from_id_Empresa($id_empresa);
	$vo_escala->borrarEscala_from_id_Empresa($id_empresa);

	for($j=1;$j<=10;$j++){
		$clasificacion= $_POST["tbClasificacion".$j];
		$valor=$_POST["tbValor".$j];		
		if(trim($clasificacion) != "" && trim($valor) != ""){
			$vo_escala->insertarNuevo($clasificacion,$valor,$id_empresa);
		}
	}
	$vo_ec=new EvaluacionCampo();
	$vo_ec->resetearReportes();
	$pagd="../ger_exito.php";
	header("Location: $pagd");
	mysql_close();
	//B60321590
?>