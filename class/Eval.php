<?php
class Evalu{
function editarCabEval($nombrecampo,$valor,$id){
  	$sql="Update TC_Eval set ".$nombrecampo."='".$valor."' where Id_Eval=".$id;
  	//echo $sql;
	if($resultado=mysql_query($sql))
		return true;
	else
		return false;
  }
  function editarDetEval($nombrecampo,$valor,$id){
  	$sql="Update TD_Eval set ".$nombrecampo."='".$valor."' where Id_DEval=".$id;
  	//echo $sql;
	if($resultado=mysql_query($sql))
		return true;
	else
		return false;
  }
}
  ?> 