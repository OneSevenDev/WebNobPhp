<?php
class Usuario{
	var $id;
	var $nombre;
	var $apellido;
	var $mail;
	var $telefono;
	var $tipo;
	var $login;
	var $password;
	var $Idcampo;
	
	function id($var){
		$this->id=$var;
	}	
	function setnombre($var){
		$this->nombre=$var;
	}
	function setapellido($var){
		$this->apellido=$var;
	}
	function setmail($var){
		$this->mail=$var;
	}
	function settelefono($var){
		$this->telefono=$var;
	}
	function settipo($var){
		$this->tipo=$var;
	}	
	function setlogin($var){
		$this->login=$var;
	}
	function setpassword($var){
		$this->password=$var;
	}
	function setIdcampo($var){
		$this->Idcampo=$var;
	}	
	function insertarUsuariosDefecto($id_c,$empresa){
		$band=false;
		$sql="insert into usuario values(null,'editar','editar','editar','editar','administrador','admin-".$id_c."','123456',".$id_c.");";
		if($resultado=mysql_query($sql)){
			$sql="insert into usuario values(null,'editar','editar','editar','editar','registrador','reg1-".$id_c."','123456',".$id_c.");";
			if($resultado=mysql_query($sql)){
				$sql="insert into usuario values(null,'editar','editar','editar','editar','registrador','reg2-".$id_c."','123456',".$id_c.");";
				if($resultado=mysql_query($sql)){
					$sql="insert into usuario values(null,'editar','editar','editar','editar','visualizador','otro-".$id_c."','123456',".$id_c.");";
					if($resultado=mysql_query($sql)){
						$band=true;
					}
				}
			}
		}
		return $band;
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
	function getmail(){
		return $this->mail;
	}
	function gettelefono(){
		return $this->telefono;
	}
	function getperfil(){
		return $this->tipo;
	}
	function getlogin(){
		return $this->login;
	}
	function getpassword(){
		return $this->password;
	}	
	function getIdcampo(){
		return $this->Idcampo;
	}	
  function editarCampo($campo,$newText,$id){
  	$sql="Update usuario set ".$campo."='".$newText."' where id_usuario=".$id.";";
  	//echo $sql;
	if($resultado=mysql_query($sql))
		return true;
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
	function insertarNuevo(){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$sql="insert into usuario values(null,'".$this->nombre."','".$this->apellido."','".$this->mail."','".$this->telefono."','".$this->tipo."','".$this->login."','".$this->password."',".$this->Idcampo.");";		
		if($resultado=mysql_query($sql))
			return true;
		else
			return false;
	
	}
	function insertarNuevoID(){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$sql="insert into usuario values(".$this->id.",'".$this->nombre."','".$this->apellido."','".$this->mail."','".$this->telefono."','".$this->tipo."','".$this->login."','".$this->password."',".$this->Idcampo.");";		
		if($resultado=mysql_query($sql))
			return true;
		else
			return false;
	
	}	
	function reconstruirUsuario($id_usuario){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("SELECT * FROM usuario WHERE id_usuario=".$id_usuario."");
		if($row = mysql_fetch_assoc($result)){
				$this->id=$row['id_usuario'];
				$this->nombre=$row['nombre'];
				$this->apellido=$row['apellido'];
				$this->mail=$row['mail'];
				$this->telefono=$row['telefono'];
				$this->tipo=$row['tipoUsuario'];
				$this->login=$row['login'];
				$this->password=$row['contrasena'];
				$this->Idcampo=$row['id_campo'];
		}	
	}
	
	function actualizarDatos(){
		$sql="delete from usuario where id_usuario=".$this->id.";";
		//echo $sql;
		if($resultado=mysql_query($sql))
			return $this->insertarNuevoID();
		else
			return false;
	}
}
?>