<?php
class EscalaII{
	var $id;
	var $clasificacion;
	var $valor;
	var $Id_empresa;
	
	function id($var){
		$this->id=$var;
	}	
	function setclasificacion($var){
		$this->clasificacion=$var;
	}
	function setvalor($var){
		$this->valor=$var;
	}
	function setId_empresa($var){
		$this->Id_empresa=$var;
	}	
	function insertarClasificacionDefecto($id_c){
		$band=false;
		$sql="insert into escalaII values(null,'Bajo',9,".$id_c.");";
		if($resultado=mysql_query($sql)){
			$sql="insert into escalaII values(null,'Moderado Bajo',12,".$id_c.");";
			if($resultado=mysql_query($sql)){
				$sql="insert into escalaII values(null,'Moderado Alto',18,".$id_c.");";
				if($resultado=mysql_query($sql)){
					$sql="insert into escalaII values(null,'Alto',100,".$id_c.");";
					if($resultado=mysql_query($sql)){
						$band=true;
					}
				}
			}
		}
		return $band;
	}
	function insertarNuevo($id_clasi,$id_valor,$id_c){
		$band=false;
		$sql="insert into escalaII values(null,'".$id_clasi."',".$id_valor.",".$id_c.");";
		if($resultado=mysql_query($sql)){
			$band=true;
		}
		return $band;	
	}
	
	
	function getid(){
		return $this->id;
	}	
	function getclasificacion(){
		return $this->clasificacion;
	}
	function getvalor(){
		return $this->valor;
	}	
	function getId_empresa(){
		return $this->Id_empresa;
	}
	
  function editarCampo($campo,$newText,$id){
  	$sql="Update escalaII set ".$campo."='".$newText."' where id_escala=".$id.";";
  	//echo $sql;
	if($resultado=mysql_query($sql))
		return true;
	else
		return false;
  }

	function getListaEscala($id_c){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("SELECT * FROM escalaII where id_empresa=".$id_c." order by valor");
		$lista;
		while($row = mysql_fetch_assoc($result)){
				$lista[$row['clasificacion']]=$row['valor'];
		}
		return $lista;
	}
	
	function getLista_from_empresa($id_empresa){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("select DISTINCT escalaII.clasificacion, escalaII.valor from escalaII,empresa where empresa.id_empresa=".$id_empresa." order by escalaII.valor");
		$lista;
		while($row = mysql_fetch_assoc($result)){
				$lista[$row['clasificacion']]=$row['valor'];
		}
		return $lista;	
	}
	
	function borrarEscala_from_id_Empresa($id){
		$sql="delete from escalaII where id_empresa=".$id;
        if($resultado=mysql_query($sql))
          return true;
        else
          return false;
	}
	
}
?>