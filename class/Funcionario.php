<?php
class Funcionario{
function registrarFuncionario($nomfunc,$apefunc,$telfunc,$mailfunc,$idemp,$login,$pass,$perfil){
	
		$sql="insert into TM_Funcionario (Nom_Func,Ape_Func,Tel_Func,Mail_Func,ID_Emp) values 
    ('".$nomfunc."','".$apefunc."','".$telfunc."','".$mailfunc."',".$idemp.")";
		if($resultado=mysql_query($sql)){
     $sql="select Id_Func from TM_Funcionario order by Id_Func DESC LIMIT 1";
     $result=mysql_query($sql);
     
     while($r=mysql_fetch_assoc($result)){
      $id=$r['Id_Func'];
     }
     $sql="Insert into TM_Usuario values(".$id.",'".$login."','".$pass."')";
     //echo $sql;
     if($res=mysql_query($sql) or die(mysql_error())){
      $sql1="Insert into TC_PerfilFunc values(".$id.",".$perfil.")";
      if($r1=mysql_query($sql1))
        return true;
     } 
     else
      return false;
    }	
		else
			return false;
	

}
function editarDatosFuncionario($idfunc,$nomfunc,$apefunc,$telfunc,$mailfunc,$idemp,$login,$pass,$perfil){
	
		$sql="update TM_Funcionario set 
    Nom_Func='".$nomfunc."',
    Ape_Func='".$apefunc."',
    Tel_Func='".$telfunc."',
    Mail_Func='".$mailfunc."',
    ID_Emp=".$idemp." 
    where Id_Func=".$idfunc."";
		if($res1=mysql_query($sql) or die(mysql_error())){
    $sql="Update TM_Usuario SET Login_Us='".$login."',Pass_Us='".$pass."' where Id_Func=".$idfunc;
     //echo $sql;
     if($res=mysql_query($sql) or die(mysql_error())){
      $sql1="Update TC_PerfilFunc SET Id_Perfil=".$perfil." where Id_Func=".$idfunc;
     if($r1=mysql_query($sql1))
        return true;
     } 
     else
      return false;
    }	
		else
			return false;
	

}
function editarFuncionario($nombrecampo,$valor,$id){
	
  	$sql="Update TM_Funcionario set ".$nombrecampo."='".$valor."' where Id_Func=".$id;
  	//echo $sql;
	if($resultado=mysql_query($sql))
		return true;
	else
		return false;
	}
  

}

?>
