<?php
class Campo{
	var $id;
	var $descripcion;
	var $id_cultivar;
	var $num_ha;
	var $num_cuarteles;
	var $id_fa;
	var $id_empresa;
	
	function setId($var){
		$this->id=$var;
	}	
	function setDescripcion($var){
		$this->descripcion=$var;
	}
	function setId_cultivar($var){
		$this->id_cultivar=$var;
	}
	function setNum_ha($var){
		$this->num_ha=$var;
	}
	function setNum_cuarteles($var){
		$this->num_cuarteles=$var;
	}
	function setId_fa($var){
		$this->id_fa=$var;
	}	
	function setId_empresa($var){
		$this->id_empresa=$var;
	}
	
	function getid(){
		return $this->id;
	}
	function getdescripcion(){
		return $this->descripcion;
	}
	function getid_cultivar(){
		return $this->id_cultivar;
	}
	function getnum_ha(){
		return $this->num_ha;
	}
	function getnum_cuarteles(){
		return $this->num_cuarteles;
	}
	function getid_fa(){
		return $this->id_fa;
	}
	function getid_empresa(){
		return $this->id_empresa;
	}	
  
  function insertarCampo(){
        $sql="insert into campo values(".$this->id.",'".$this->descripcion."',".$this->id_cultivar.",".$this->num_ha.",".$this->num_cuarteles.",".$this->id_fa.",".$this->id_empresa.")";
        //echo $sql;
        if($resultado=mysql_query($sql))
          return true;
        else
          return false;
  }
  
	function getLastID(){
		$sql=mysql_query("select id_campo from campo order by id_campo;");
		$last=0;
		while($row= mysql_fetch_assoc($sql))
			$last=$row['id_campo'];
			
		return $last;
	}
  function editarCampo($nombrecampo,$valor,$id){
  	$sql="Update campo set ".$nombrecampo."='".$valor."' where Id_Campo=".$id;
  	//echo $sql;
	if($resultado=mysql_query($sql))
		return true;
	else
		return false;
  }
  	function getNombre_from_ID($id){
		$sql="select * from campo";
		$resultado=mysql_query($sql);
		$nombre="...";
		while($row = mysql_fetch_array($resultado)){
			if($row['id_campo']==$id){
				$nombre=$row['descripcion'];
			}
		}
		return $nombre;
	}
	function reconstruir($id_campo){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("SELECT * FROM campo WHERE id_campo=".$id_campo."");
		if($row = mysql_fetch_assoc($result)){
				$this->id=$row['id_campo'];
				$this->descripcion=$row['descripcion'];
				$this->id_cultivar=$row['id_cultivar'];
				$this->num_ha=$row['num_hectareas'];
				$this->num_cuarteles=$row['num_cuarteles'];
				$this->id_fa=$row['id_factor_Avance'];
				$this->id_empresa=$row['id_empresa'];
		}	
	}
	function getIndicesCampo_from_id_Empresa($id_empresa){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("select id_campo from campo where id_empresa=".$id_empresa.";");
		$lista;
		$i=0;
		while($row = mysql_fetch_assoc($result)){
				$lista[$i]=$row['id_campo'];
				$i++;
		}
		return $lista;	
	}
}
?>