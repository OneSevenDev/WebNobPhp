<?php
    session_start();
    include("../includes/conexion.inc.php");
    require_once("../class/Usuario.php");
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
      
		if(trim($newText) != "" && trim($id) != ""){
				//obtenemos el ID del usuario visitante			
			//definimos clase Llamado y asiganamos el ticket del llamado
			$usuario = new Usuario();
			$campo=$_GET['campo'];
			$usuario->editarCampo($campo,$newText,$id);
			
	}
	// Finalmente, imprimimos el texto!!!
	echo($newText);
?>
</BODY></HTML>