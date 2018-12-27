<?php
class Evaluacion{
	var $id;
	var $id_cuartel;
	var $numero_corte;
	var $edad;
	var $fecha_evaluacion;
	var $fecha_registro;
	var $numero_muestras;
	var $porcentaje_Total;
	
	function setid($var){
		$this->id=$var;
	}	
	function setid_cuartel($var){
		$this->id_cuartel=$var;
	}
	function setnumero_corte($var){
		$this->numero_corte=$var;
	}
	function setedad($var){
		$this->edad=$var;
	}
	function setfecha_evaluacion($var){
		$this->fecha_evaluacion=$var;
	}
	function setfecha_registro($var){
		$this->fecha_registro=$var;
	}	
	function setnumero_muestras($var){
		$this->numero_muestras=$var;
	}
	function setporcentaje_Total($var){
		$this->porcentaje_Total=$var;
	}	
	
	function getid(){
		return $this->id;
	}
	function getid_cuartel(){
		return $this->id_cuartel;
	}
	function getnumero_corte(){
		return $this->numero_corte;
	}
	function getedad(){
		return $this->edad;
	}
	function getfecha_evaluacion(){
		return $this->fecha_evaluacion;
	}
	function getfecha_registro(){
		return $this->fecha_registro;
	}
	function getnumero_muestras(){
		return $this->numero_muestras;
	}
	function getporcentaje_Total(){
		return $this->porcentaje_Total;
	}	

	function reconstruir($id_evaluaciones){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("SELECT * FROM evaluacion WHERE id_evaluacion=".$id_evaluaciones."");
		if($row = mysql_fetch_assoc($result)){
				$this->id=$row['id_evaluacion'];
				$this->id_cuartel=$row['id_cuartel'];
				$this->numero_corte=$row['numero_corte'];
				$this->edad=$row['edad'];
				$this->fecha_evaluacion=$row['fecha_evaluacion'];
				$this->fecha_registro=$row['fecha_registro'];
				$this->numero_muestras=$row['numero_muestras'];				
				$this->porcentaje_Total=$row['porcentaje_Total'];							
		}	
	}
	function getLastID(){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");	
		$sql=mysql_query("select id_evaluacion from evaluacion order by id_evaluacion;");
		$last=0;
		$id=0;
		while($row= mysql_fetch_assoc($sql)){
			$last++;
			$id=$row['id_evaluacion'];
		}
		
		if($last<$id)
			$last=$id;
		
		return $last;
	}
	function editarColumna($nombrecampo,$valor,$id){
  	$sql="Update evaluacion set ".$nombrecampo."=".$valor." where id_evaluacion=".$id;
  	//echo $sql;
	if($resultado=mysql_query($sql))
		return true;
	else
		return false;
  }
	function getLastNroCorte($id_cuartel){
		$sql=mysql_query("select * from evaluacion where id_cuartel=".$id_cuartel." order by numero_corte;");
		$last="-";
		while($row= mysql_fetch_assoc($sql))
			$last=$last.$row['numero_corte']."-";
			
		return $last;	
	}
	function insertarNuevo(){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$sql="insert into evaluacion values(".(int)$this->id.",".(int)$this->id_cuartel.",".(int)$this->numero_corte.",".$this->edad.",'".$this->fecha_evaluacion."','".$this->fecha_registro."',".(int)$this->numero_muestras.",".$this->porcentaje_Total.");";
		if($resultado=mysql_query($sql))
			return true;
		else
			return false;	
	}	
	function buscarNroCorte($id_evaluacion){
		$sql=mysql_query("select * from evaluacion where id_evaluacion=".$id_evaluacion.";");
		$n=0;
		if($row= mysql_fetch_assoc($sql))
			$n=$row['numero_corte'];
			
		return $n;	
	}
	function buscarid_cuartel($id_evaluacion){
		$sql=mysql_query("select * from evaluacion where id_evaluacion=".$id_evaluacion.";");
		$n=0;
		if($row= mysql_fetch_assoc($sql))
			$n=$row['id_cuartel'];
			
		return $n;	
	}	
	function recalcularPorcentaje(){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$sql=mysql_query("select * from muestras where id_evaluacion=".$this->id.";");
		$sum=0;
		while($row= mysql_fetch_assoc($sql)){
			$sum=$sum+$row['porcentaje'];
		}
		$sum=$sum/$this->numero_muestras;
		$this->porcentaje_Total=$sum;
		$this->editarColumna("porcentaje_Total",$sum,$this->id);
	}
	
}
?>