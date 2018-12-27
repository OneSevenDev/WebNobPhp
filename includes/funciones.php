<?php
function Mostrar_Ultimo_Registro($loginid){
$sql="Select * from V_MostrarCabEval ORDER BY Id_Eval DESC LIMIT 1";
//echo $sql;
$resultado=mysql_query($sql);
while($row=mysql_fetch_assoc($resultado)){
         return $row['Id_Eval'];
}
}
function Mostrar_Ultimo_RegistroDEval($id){
$sql="Select * from TD_Eval where Id_Eval=".$id." ORDER BY Id_DEval DESC LIMIT 1";
echo $sql;
$resultado=mysql_query($sql);
while($row=mysql_fetch_assoc($resultado)){
         return $row['Id_DEval'];
}
}
function existeCampo($campoid){
	$sql="Select * from TM_Campo where Id_Campo=".$campoid." LIMIT 1";
	echo $sql;
	$result = mysql_query($sql);
	if (mysql_num_rows($result) != 1)
		return true;
	else
		return false;
}
function verificaFecha($date){
$date = str_replace(' ', '-', $date);
$date = str_replace('/', '-', $date);
$date = str_replace('--', '-', $date);
$date = str_replace('.', '-', $date);

if (preg_match('/^[0-9]{2}-[0-9]{2}-[0-9]{4}$/', $date, $parts) or preg_match('/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/', $date, $parts))  {
            //check weather the date is valid of not
            list($day,$month,$year) = explode('-',$date);
                                            return $year."-".$month."-".$day;
                 }
            else if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $date, $parts) or preg_match('/^[0-9]{4}\/[0-9]{2}\/[0-9]{2}$/', $date, $parts)){
                 list($year , $month , $day) = explode('-',$date);
                                            return $year."-".$month."-".$day;
                      }
            else
                return 0;
}
?>
