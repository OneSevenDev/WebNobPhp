<?php
    session_start();
    include("../includes/conexion.inc.php");
    require_once("../class/Cuartel.php");    
?>
<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
</HEAD>
<BODY>
<?php
	   //obtenemos las variables pasadas por POST
	  $newText = $_POST['value'];
      $id_cuartel=$_POST['id'];
      
	//definimos clase Llamado y asiganamos el ticket del llamado
    
	$modo=$_GET['modo'];
	
    $cuartel = new Cuartel();
	$cuartel->reconstruirCuartel($id_cuartel);
	if($modo==1)
		$cuartel->setdescripcion($newText);
	if($modo==2)
		$cuartel->setha($newText);
	
	$cuartel->actualizarDatos();
	// Finalmente, imprimimos el texto!!!
	echo($newText);
?>
</BODY></HTML>