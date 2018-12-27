<?php
class Empresa{
	var $id;
	var $nombre;
	var $direccion;	
	var $ruc;

	function id($var){
		$this->id=$var;
	}	
	function setnombre($var){
		$this->nombre=$var;
	}
	function setdireccion($var){
		$this->direccion=$var;
	}
	function setruc($var){
		$this->ruc=$var;
	}
	function getid(){
		return $this->id;
	}
	function getnombre(){
		return $this->nombre;
	}
	function getdireccion(){
		return $this->direccion;
	}
	function getruc(){
		return $this->ruc;
	}
			
	function registrarEmpresa($nombre,$direccion,$ruc){
		$sql="insert into TM_Empresa (Nom_Emp,Dir_Emp,Ruc_Emp) values 
		('".$nombre."','".$direccion."','".$ruc."')";
		//echo $sql;
		if($resultado=mysql_query($sql))
		  return true;
		else
		  return false;
	}
	
	function editarEmpresa($nombrecampo,$valor,$id){
	$sql="Update TM_Empresa set ".$nombrecampo."='".$valor."' where Id_Emp=".$id;
	//echo $sql;
	if($resultado=mysql_query($sql))
		return true;
	else
		return false;
	}
	
	function getNombre_fromId($id){		
		$sql=mysql_query("select nombre from empresa where id_empresa=".(int)$id.";");
		if($row= mysql_fetch_array($sql))
			return $row['nombre'];
		else
			return "?????";  
	}
	
	function reconstruir($id_empresa){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("SELECT * FROM empresa WHERE id_empresa=".$id_empresa."");
		if($row = mysql_fetch_assoc($result)){
				$this->id=$row['id_empresa'];
				$this->nombre=$row['nombre'];				
				$this->direccion=$row['direccion'];
				$this->ruc=$row['RUC'];
		}
	}
}
?>
