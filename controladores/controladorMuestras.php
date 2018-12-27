<?php
    session_start();
    include("../includes/conexion.inc.php");
    require_once("../class/Muestra.php");
	require_once("../class/Evaluacion.php");    
?>
<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
</HEAD>
<BODY>
<?php
	   //obtenemos las variables pasadas por POST
	  $newText = $_POST['value'];
      $id=$_POST['id'];
      
	//definimos clase Llamado y asiganamos el ticket del llamado
    
	$modo=$_GET['modo'];
	
    $muestra = new Muestra();
	$muestra->reconstruir($id);
	if($modo==1){
		$muestra->settotal($newText);
		$por=100*($muestra->getpicados()/$newText);
		$muestra->setporcentaje((double)$por);
	}
	if($modo==2){
		$muestra->setpicados($newText);
		$por=100*($newText/$muestra->gettotal());
		$muestra->setporcentaje((double)$por);
	}
	$muestra->actualizarDatos();
	// Finalmente, imprimimos el texto!!!
	echo($newText);
	
	$id_cc=$_SESSION["tmpID_caurtel"];
	$id_eva=$_SESSION["tmpID_Evaluacion"];
	$vo_evaluacion=new Evaluacion();
	$vo_evaluacion->reconstruir($id_eva);
	$vo_evaluacion->recalcularPorcentaje();
	$pagd="bio_muestrasEvaluaciones.php?id_cuartel=".$id_cc."&id_evaluaciones=".$id_eva;
	//header("Refresh: 2; URL=".$pagd."");
	
	//echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=".$pagd."'>";  

?>
</BODY></HTML>