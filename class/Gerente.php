<?php
class Gerente{
	var $id;
	var $nombre;
	var $apellido;
	var $telefono;
	var $login;
	var $password;
	var $id_empresa;
	
	function id($var){
		$this->id=$var;
	}	
	function setnombre($var){
		$this->nombre=$var;
	}
	function setapellido($var){
		$this->apellido=$var;
	}
	function settelefono($var){
		$this->telefono=$var;
	}
	function setlogin($var){
		$this->login=$var;
	}
	function setpassword($var){
		$this->password=$var;
	}
	function setid_empresa($var){
		$this->id_empresa=$var;
	}	
		
	function getid(){
		return $this->id;
	}
	function getnombre(){
		return $this->nombre;
	}
	function getapellido(){
		return $this->apellido;
	}
	function gettelefono(){
		return $this->telefono;
	}
	function getlogin(){
		return $this->login;
	}
	function getpassword(){
		return $this->password;
	}	
	function getid_empresa(){
		return $this->id_empresa;
	}	
  function editarCampo($campo,$newText,$id){
  	$sql="Update gerente set ".$campo."='".$newText."' where id_usuario=".$id.";";
  	//echo $sql;
	if($resultado=mysql_query($sql))
		return true;
	else
		return false;
  }
	
	function insertarNuevoID(){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$sql="insert into gerente values(".$this->id.",'".$this->nombre."','".$this->apellido."','".$this->telefono."','".$this->login."','".$this->password."',".$this->id_empresa.");";
		if($resultado=mysql_query($sql))
			return true;
		else
			return false;
	}
	
	function reconstruir_x_login($login){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("SELECT * FROM gerente WHERE login='".$login."'");
		if($row = mysql_fetch_assoc($result)){
				$this->id=$row['id_gerente'];
				$this->nombre=$row['nombre'];
				$this->apellido=$row['apellido'];
				$this->telefono=$row['telefono'];
				$this->login=$row['login'];
				$this->password=$row['contrasena'];
				$this->id_empresa=$row['id_empresa'];
		}
	}
	
	function actualizarDatos(){
		$sql="delete from gerente where id_gerente=".$this->id.";";
		//echo $sql;
		if($resultado=mysql_query($sql))
			return $this->insertarNuevoID();
		else
			return false;
	}
	
	function comprobarLogin($login){		
		$band=false;
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("SELECT * FROM usuario WHERE login='".$login."'");
		if($row = mysql_fetch_row($result)){
			$band=true;
		}		
		else{
			$result = mysql_query("SELECT * FROM gerente WHERE login='".$login."'");
			if($row= mysql_fetch_row($result)){
				$band=true;
			}
			else{
				$result = mysql_query("SELECT * FROM bioseguridad WHERE login='".$login."'");
				if($row = mysql_fetch_row($result)){
					$band=true;
				}
			}
		}
		return $band;
	}
}
?>