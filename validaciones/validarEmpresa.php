<?php 
	include("../class/EscalaII.php");
	session_start();
 
	//datos para establecer la conexion con la base de mysql.
	mysql_connect('localhost','biosegur_admin','bio.intranetbd')or die ('Ha fallado la conexi&oacute;n: '.mysql_error());
	mysql_select_db('biosegur_intranet') or die ('Error al seleccionar la Base de Datos: '.mysql_error());
	
	$nombreE= $_POST["tbNombre"];
	$direccionE=$_POST["tbDireccion"];
	$rucE=$_POST["tbRuc"];
	$nombreG=$_POST["tbNombreG"];
	$apellidoG= $_POST["tbApellidoG"];
	$telefonoG= $_POST["tbTelefonoG"];
	$loginG= $_POST["tbLoginG"];
	$passwordG= $_POST["tbPasswordG"];
	
	if(trim($nombreE) != "" && trim($direccionE) != "" && trim($rucE) != "" && trim($nombreG) != "" && trim($loginG) != "" && trim($passwordG) != ""){
		$band1 = mysql_query("insert into empresa values (null,'$nombreE','$direccionE','$rucE');");
		$result= mysql_query("select id_empresa from empresa where nombre='$nombreE' and direccion='$direccionE' and RUC='$rucE';");
		$id_e=-1;
		if($row= mysql_fetch_array($result)){
			$id_e=$row["id_empresa"];
		}
		$band2 = mysql_query("insert into gerente values (null,'$nombreG','$apellidoG','$telefonoG','$loginG','$passwordG',$id_e);");	
		if($band1 && $band2){			
			$escala=new EscalaII();
			$escala->insertarClasificacionDefecto($id_e);
			$_SESSION["sMensaje"] ="";
			$pagd="../empresasBioseguridad.php";
			header("Location: $pagd");
		}		
	}else{
		$_SESSION["sMensaje"] ="Datos incompletos ...";
		$pagd="../registrarEmpresa.php";
		header("Location: $pagd");
	}
	mysql_close();
?>