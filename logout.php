<?php
session_start();
$_SESSION['sMensaje']="";
$_SESSION["sLogin"] = "";
$_SESSION["sPerfil"] = "";
$pagd="http://www.bioseguridad.com.pe";				
header("Location: $pagd");	
?>