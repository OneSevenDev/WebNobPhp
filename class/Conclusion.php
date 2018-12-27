<?php
class Conclusion{
	var $id;
	var $descripcion;
	var $id_evaluacionCampo;
	
	function setid($var){
		$this->id=$var;
	}
	function setdescripcion($var){
		$this->descripcion=$var;
	}	
	function setid_evaluacionCampo($var){
		$this->id_evaluacionCampo=$var;
	}	
	function getid(){
		return $this->id;
	}
	function getdescripcion(){
		return $this->descripcion;
	}	
	function getid_evaluacionCampo(){
		return $this->id_evaluacionCampo;
	}
	
  function insertarNuevo(){
        $sql="insert into conclusion values(null,'".$this->descripcion."',".$this->id_evaluacionCampo.")";
        //echo $sql;
        if($resultado=mysql_query($sql))
          return true;
        else
          return false;
  }
  function getListaDeConclusiones($id_evaluacioncampo){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("SELECT * FROM conclusion where id_evaluacionCampo=".$id_evaluacioncampo.";");
		$lista;
		$i=0;
		while($row = mysql_fetch_assoc($result)){
				$lista[$i]=$row['valor'];
				$i++;				
		}
		return $lista;
  }
  function borrarConclusiones_segun_idEvaluacioncampo($id_evaluacioncampo){
		$sql="delete from conclusion where id_evaluacionCampo=".$id_evaluacioncampo.";";
		if($resultado=mysql_query($sql))
			return true;
        else
			return false;
  }
}
?>
