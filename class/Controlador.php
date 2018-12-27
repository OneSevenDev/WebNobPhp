<?php
class Controlador{
  function registrarControlador($desccont){
        $sql="insert into controladores (Desc_Cont) values 
        ('".$desccont."')";
        //echo $sql;
        if($resultado=mysql_query($sql))
          return true;
        else
          return false;
  }
  function editarCont($nombrecampo,$valor,$id){
  	$sql="Update controladores set ".$nombrecampo."='".$valor."' where id_controladores=".$id;
  	//echo $sql;
	if($resultado=mysql_query($sql))
		return true;
	else
		return false;
  }
  function getNombreFromID($id){
  		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("SELECT * FROM controladores WHERE id_controladores=".$id."");
		$nombre="";
		if($row = mysql_fetch_assoc($result)){				
				$nombre=$row['nombre'];			
		}
		return $nombre;
  }
  
  function getListaDeNombres(){
	$sql=mysql_query("select * from controladores;");
	$lista[0]="";
	$i=0;
	while($row= mysql_fetch_array($sql)){    
		$lista[$i]= $row['nombre'];
		$i=$i+1;
	}
	return $lista;
  } 
    function getID_fromNombre($nombre){
  		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("SELECT * FROM controladores WHERE nombre='".$nombre."';");
		$nombre=-1;
		if($row = mysql_fetch_assoc($result)){				
				$nombre=$row['id_controladores'];			
		}
		return $nombre;
  }
}
?>
