<?php
    session_start();
    include("../includes/conexion.inc.php");
    require_once("../class/Cultivar.php");
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
    $cultivar = new Cultivar();
    $campo=$_GET['campo'];
    $cultivar->editarCultivar($campo,$newText,$id);
	

	// Finalmente, imprimimos el texto!!!
	echo($newText);
?>
</BODY></HTML>