<?php
class factorAvance{
	var $id;
	var $fa;
	var $precio;
	var $estado;
	
	function setID($var){
		$this->id=(int)$var;
	}
	function setFA($var){
		$this->fa=(int)$var;
	}
	function setPrecio($var){
		$this->precio=(double)$var;
	}
	function setEstado($var){
		$this->estado=$var;
	}	
	
	function getId(){
		return $this->id;		
	}
	function getFA(){
		return $this->fa;		
	}
	function getPrecio(){
		return $this->precio;
	}
	function getEstado(){
		return $this->estado;		
	}	
	
	function insertarNuevo(){
		$sql="insert into factor_Avance values(".$this->id.",".$this->fa.",".$this->precio.",'".$this->estado."');";        
        if($resultado=mysql_query($sql))
          return true;
        else
          return false;	
	}
	function getLastID(){
		$sql=mysql_query("select id_factor_Avance from factor_Avance order by id_factor_Avance;");
		$last=0;
		while($row= mysql_fetch_array($sql))
			$last=$row['id_factor_Avance'];
			
		return $last;
	}
	function reconstruir($id){    
		$sql="select * from factor_Avance where id_factor_Avance=".$id.";";    
		$resultado=mysql_query($sql);		
        if($row=mysql_fetch_assoc($resultado)){
			$this->id=$row['id_factor_Avance'];
			$this->fa=$row['fa'];
			$this->precio=$row['precio_tarea'];
			$this->estado=$row['estado'];
		}
	}
}
?>