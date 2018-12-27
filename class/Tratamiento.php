<?php
class Tratamiento{
	var $id_tratamiento;
	var $id_evaluacion;
	var $numero_parajeas;
	var $id_controladores;
	var $fecha_tratamiento;
	var $fecha_registro;
	
	function setid_tratamiento ($var){
		$this->id_tratamiento=$var;	
	}
	function setid_evaluacion ($var){
		$this->id_evaluacion=(int)$var;	
	}
	function setnumero_parajeas ($var){
		$this->numero_parajeas=(int)$var;	
	}
	function setid_controladores($var){
		$this->id_controladores=(int)$var;	
	}
	function setfecha_tratamiento ($var){
		$this->fecha_tratamiento=$var;	
	}
	function setfecha_registro ($var){
		$this->fecha_registro=$var;	
	}
	
	function getid_tratamiento(){
		return $this->id_tratamiento;
	}
	function getnumero_parajeas(){
		return $this->numero_parajeas;
	}
	function getid_controladores(){
		return $this->id_controladores;
	}
	function getfecha_tratamiento(){
		return $this->fecha_tratamiento;
	}
	function getfecha_registro(){
		return $this->fecha_registro;
	}
	
function registrarTratamiento($nombrecampo,$valor){
	
		$sql="insert into TD_Trat (".$nombrecampo.") values (".$valor.")";
		if($resultado=mysql_query($sql))
			return true;
		else
			return false;
	

}
function editarTratamiento($nombrecampo,$valor,$id){
	$sql2="select * from TD_Trat where Id_DEval=".$id;
	$r=mysql_query($sql2) or die(mysql_error());
	$num=mysql_num_rows($r);
	if($num==0){
		$sql="insert into TD_Trat (".$nombrecampo.",Id_DEval) values (".$valor.",".$id.")";
		//echo $sql;
		if($resultado=mysql_query($sql))
			return true;
		else
			return false;	
	}
	else{
  	$sql="Update TD_Trat set ".$nombrecampo."='".$valor."' where Id_DEval=".$id;
  	//echo $sql;
	if($resultado=mysql_query($sql))
		return true;
	else
		return false;
	}
  }
function editarEvaluacion($nombrecampo,$valor,$id){
	$sql2="select * from TC_Eval where Id_Eval=".$id;
	
	$r=mysql_query($sql2);
	//validamos si la fecha de evaluacion es menor a la fecha de liberacion
	while($row=mysql_fetch_array($r)){
    if($row['Fech_Eval']>$valor)
      return false;
  }
		//insertamos el dato en el campo respectivo
  	$sql="Update TC_Eval set ".$nombrecampo."='".$valor."' where Id_Eval=".$id;
  	//validamos si fue registrado correctamente
	if($resultado=mysql_query($sql))
		return true;
	else
		return false;
	
  }
	function getNumeroParejas_from_idevaluacion($id_evaluacion){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("SELECT * FROM tratamiento WHERE id_evaluacion=".$id_evaluacion."");
		$total=0;
		if($row = mysql_fetch_assoc($result)){				
				$total=$row['numero_parejas'];			
		}
		return $total;
	}
		
	function getControlador_from_idevaluacion($id_evaluacion){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("SELECT * FROM tratamiento WHERE id_evaluacion=".$id_evaluacion."");
		$nombre="controlador";
		if($row = mysql_fetch_assoc($result)){				
				$id_controladores=$row['id_controladores'];		
				$vo_contro=new Controlador();
				$nombre=$vo_contro->getNombreFromID($id_controladores);
		}
		return $nombre;	
	}
	
	function existe($id_evaluacion){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("SELECT * FROM tratamiento WHERE id_evaluacion=".$id_evaluacion."");
		$band=false;
		if($row = mysql_fetch_assoc($result)){		
			$band=true;
		}
		return $band;	
	}
	
	function insertarNuevo(){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$sql="insert into tratamiento values(null,".$this->id_evaluacion.",".$this->numero_parajeas.",".$this->id_controladores.",'".$this->fecha_tratamiento."','".$this->fecha_registro."');";
		if($resultado=mysql_query($sql))
			return true;
		else
			return false;	
	}
	
	function reconstruir($id_evaluacion){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("SELECT * FROM tratamiento WHERE id_evaluacion=".$id_evaluacion."");
		$nombre="controlador";
		if($row = mysql_fetch_assoc($result)){				
			$this->id_tratamiento=$row['id_tratamiento'];
			$this->id_evaluacion=$row['id_evaluacion'];
			$this->numero_parajeas=$row['numero_parejas'];
			$this->id_controladores=$row['id_controladores'];
			$this->fecha_tratamiento=$row['fecha_tratamiento'];
			$this->fecha_registro=$row['fecha_registro'];
		}		
	
	}
}
?>
