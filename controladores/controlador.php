<?php
    session_start();
    include("../includes/conexion.inc.php");
    require_once("../class/Campo.php");
    require_once("../includes/funciones.php");
    require_once ("../includes/function.inc.php");
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
    $campo = new Campo();
    $camp=$_GET['campo'];
    $campo->editarCampo($camp,$newText,$id);
	

	// Finalmente, imprimimos el texto!!!
	echo($newText);
?>
</BODY></HTML>