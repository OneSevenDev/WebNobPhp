<?php
class Muestra{
	var $id_muestras;
	var $total;
	var $picados;
	var $porcentaje;
	var $id_evaluacion;
	var $latitud;
	var $altitud;

		function setid_muestras($var){
		$this->id_muestras=$var;
	}	
	function settotal($var){
		$this->total=$var;
	}
	function setpicados($var){
		$this->picados=$var;
	}
	function setporcentaje($var){
		$this->porcentaje=$var;
	}
	function setid_evaluacion($var){
		$this->id_evaluacion=$var;
	}
	function setlatitud($var){
		$this->latitud=$var;
	}	
	function setaltitud($var){
		$this->altitud=$var;
	}
	

	function getid_muestras(){
		return $this->id_muestras;
	}
	function gettotal(){
		return $this->total;
	}
	function getpicados(){
		return $this->picados;
	}
	function getporcentaje(){
		return $this->porcentaje;
	}
	function getid_evaluacion(){
		return $this->id_evaluacion;
	}
	function getlatitud(){
		return $this->latitud;
	}
	function getaltitud(){
		return $this->altitud;
	}

	function insertarNuevoID(){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$sql="insert into muestras values(".$this->id_muestras.",".$this->total.",".$this->picados.",".$this->porcentaje.",".$this->id_evaluacion.",".$this->latitud.",".$this->altitud.");";		
		if($resultado=mysql_query($sql))
			return true;
		else
			return false;
	
	}
	function insertarTemporal($id_evaluacion){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$sql="insert into muestras values(null,1,1,100,".$id_evaluacion.",0,0);";		
		if($resultado=mysql_query($sql))
			return true;
		else
			return false;
	
	}
	function reconstruir($id_muestras){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("SELECT * FROM muestras WHERE id_muestras=".$id_muestras."");
		if($row = mysql_fetch_assoc($result)){
				$this->id_muestras=$row['id_muestras'];
				$this->total=$row['total'];
				$this->picados=$row['picados'];
				$this->porcentaje=$row['porcentaje'];
				$this->id_evaluacion=$row['id_evaluacion'];
				$this->latitud=$row['latitud'];
				$this->altitud=$row['altitud'];
		}	
	}	
	function actualizarDatos(){
		$sql="update muestras set total=".$this->total.", picados=".$this->picados.", porcentaje=".$this->porcentaje." where id_muestras=".$this->id_muestras.";";

		if($resultado=mysql_query($sql))
			return true;
		else
			return false;
	}
	function getTotalEvaluacion($id_evaluacion){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("SELECT * FROM muestras WHERE id_evaluacion=".$id_evaluacion."");
		$total=0;
		while($row = mysql_fetch_assoc($result)){				
				$total=$total+$row['total'];
			
		}
		return $total;
	}
	function getPicadosEvaluacion($id_evaluacion){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("SELECT * FROM muestras WHERE id_evaluacion=".$id_evaluacion."");
		$total=0;
		while($row = mysql_fetch_assoc($result)){				
				$total=$total+$row['picados'];
				
		}
		return $total;
	}
}
?>