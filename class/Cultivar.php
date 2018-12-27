<?php
class Cultivar{
	var $id;
	var $variedad;
	var $codigo;
	var $descripcion;
	
	function setid($var){
		$this->id=$var;
	}
	function setvariedad($var){
		$this->variedad=$var;
	}
	function setcodigo($var){
		$this->codigo=$var;
	}
	function setdescripcion($var){
		$this->descripcion=$var;
	}	
	
	function getid(){
		return $this->id;
	}
	function getvariedad(){
		return $this->variedad;
	}
	function getcodigo(){
		return $this->codigo;
	}
	function getdescripcion(){
		return $this->descripcion;
	}
	
  function registrarCultivar($descripcion,$observacion){
        $sql="insert into TM_Cultivar (Desc_Cult,Obs_Cult) values 
        ('".$descripcion."','".$observacion."')";
        //echo $sql;
        if($resultado=mysql_query($sql))
          return true;
        else
          return false;
  }
  function editarCultivar($nombrecampo,$valor,$id){
  	$sql="Update cultivar set ".$nombrecampo."='".$valor."' where id_cultivar=".$id;
  	//echo $sql;
	if($resultado=mysql_query($sql))
		return true;
	else
		return false;
  }
  function getListaDeNombres(){
	$sql=mysql_query("select * from cultivar;");
	$lista[0]="";
	$i=0;
	while($row= mysql_fetch_array($sql)){    
		$lista[$i]= $row['variedad']." - ".$row['codigo'];
		$i=$i+1;
	}
	return $lista;
  }
  function getID_from_variedadCodigo($cad){
	$sql=mysql_query("select * from cultivar where concat(variedad,' - ',codigo)='".$cad."';");
	$id=-1;
	if($row= mysql_fetch_array($sql)){    
			$id=$row['id_cultivar'];
	}
	return $id;
  }
		function reconstruir($id){    
		$sql="select * from cultivar where id_cultivar=".$id.";";    
		$resultado=mysql_query($sql);		
        if($row=mysql_fetch_assoc($resultado)){
			$this->id=$row['id_cultivar'];
			$this->variedad=$row['variedad'];
			$this->codigo=$row['codigo'];
			$this->descripcion=$row['descripcion'];
		}
	}
}
?>
