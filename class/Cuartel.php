<?php
class Cuartel{
	var $id;
	var $descripcion;
	var $ha;
	var $id_campo;
	
	function setid($var){
		$this->id=$var;
	}
	function setdescripcion($var){
		$this->descripcion=$var;
	}
	function setha($var){
		$this->ha=$var;
	}
	function setid_campo($var){
		$this->id_campo=$var;
	}	

	function getid(){
		return $this->id;
	}
	function getdescripcion(){
		return $this->descripcion;
	}
	function getha(){
		return $this->ha;
	}
	function getid_campo(){
		return $this->id_campo;
	}
	
	function editarCuartel($nombrecampo,$valor,$id){
		$sql="Update cuartel set ".$nombrecampo."='".$valor."' where id_cuartel=".$id;
  	//echo $sql;
		if($resultado=mysql_query($sql))
			return true;
		else
			return false;
	}
	function insertarNuevoDefault($des,$ha,$idc){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$sql="insert into cuartel values(null,'".$des."',".$ha.",".$idc.");";		
		if($resultado=mysql_query($sql))
			return true;
		else
			return false;	
	}
	
	function reconstruirCuartel($id_cuartel){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("SELECT * FROM cuartel WHERE id_cuartel=".$id_cuartel."");
		if($row = mysql_fetch_assoc($result)){
				$this->id=$row['id_cuartel'];
				$this->descripcion=$row['Descripcion'];
				$this->ha=$row['hectareas'];
				$this->id_campo=$row['id_campo'];
		}	
	}
	
	function insertarNuevoID(){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$sql="insert into cuartel values(".$this->id.",'".$this->descripcion."',".$this->ha.",".$this->id_campo.");";
		if($resultado=mysql_query($sql))
			return true;
		else
			return false;
	
	}
	
	function actualizarDatos(){
		$sql="update cuartel set descripcion='".$this->descripcion."' , hectareas=".$this->ha." where id_cuartel=".$this->id.";";		
		if($resultado=mysql_query($sql)){
			return true;
		}
		else{
			return false;
		}
	}
}
?>