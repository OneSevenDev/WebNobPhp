<?php
    session_start();
    include("../includes/conexion.inc.php");
    require_once("../class/Tratamiento.php");
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
      
	
	    //obtenemos el ID del usuario visitante
      $idu=$_SESSION['loginid'];
	
	//definimos clase Llamado y asiganamos el ticket del llamado
    $trat = new Tratamiento();
    $campo=$_GET['campo'];
    $trat->editarTratamiento($campo,$newText,$id);
	

	// Finalmente, imprimimos el texto!!!
	echo($newText);
?>
</BODY></HTML>