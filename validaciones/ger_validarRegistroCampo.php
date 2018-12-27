<?php 
	session_start();
	include("../class/Cultivar.php");
	include("../class/Campo.php");
	include("../class/Cuartel.php");
	include("../class/factorAvance.php");
	include("../class/Empresa.php");	
	include("../class/Usuario.php");
	include("../class/EscalaII.php");
	
	//datos para establecer la conexion con la base de mysql.
	mysql_connect('localhost','biosegur_admin','bio.intranetbd')or die ('Ha fallado la conexi&oacute;n: '.mysql_error());
	mysql_select_db('biosegur_intranet') or die ('Error al seleccionar la Base de Datos: '.mysql_error());
	
	$id_emp=$_REQUEST['id_empresa'] ;	
	$nombreC= $_POST["tbNombreCampo"];
	$HaC=$_POST["tbHaCampo"];
	$cuartel=$_POST["tbCuartelCampos"];
	
	$fa=$_POST["tbfa"];
	$precio= $_POST["tbPrecio"];
	
	$codigo= $_POST["cbCultivar"];	
	$culti= new Cultivar();
	$id_cultivar=$culti->getID_from_variedadCodigo($codigo);
	
	if($id_emp >0 && trim($nombreC) != "" && trim($cuartel)!="" && trim($HaC)!="" && $id_cultivar>0 && trim($fa) != "" && trim($precio) != "" ){	
		$cfa=new factorAvance();
		$id_fa=$cfa->getLastID()+1;
		
		$cfa->setID($id_fa);
		$cfa->setFA($fa);
		$cfa->setPrecio($precio);
		$cfa->setEstado("Actual");
		$band1=$cfa->insertarNuevo();
		
		$campo=new Campo();
		$id_campo=$campo->getLastID()+1;
		$campo->setId($id_campo);		
		$campo->setDescripcion($nombreC);
		$campo->setId_cultivar($id_cultivar);
		$campo->setNum_ha($HaC);
		$campo->setNum_cuarteles($cuartel);
		$campo->setId_empresa($id_emp);		
		$campo->setId_fa($id_fa);
		$band2=$campo->insertarCampo();
		
		$empresa=new Empresa();
		
		
		if($band1 && $band2){
			$_SESSION["sMensaje"] ="";
			$nom_emp=$empresa->getNombre_fromId($id_emp);
			$usuario=new Usuario();
			$usuario->insertarUsuariosDefecto($id_campo,$nom_emp);			
			$i=1;
			$vo_cuartel=new Cuartel();
			while($i<=$cuartel){
				$vo_cuartel->insertarNuevoDefault("cuartel-".$i."",$HaC/$cuartel,$id_campo);
				$i=$i+1;
			}
			$escala=new EscalaII();
			$escala->insertarClasificacionDefecto($id_campo);
			
			$pagd="../ger_exito.php";
			header("Location: $pagd");
		}
		else{
			$_SESSION["sMensaje"] ="Error Externo";
			$pagd="../ger_registrarCampos.php";
			//echo var_dump($campo);
			header("Location: $pagd");
		}
		
	}else{
		$_SESSION["sMensaje"] ="Datos incompletos ...";
		$pagd="../ger_registrarCampos.php";
		header("Location: $pagd");
	}
	mysql_close();
?>