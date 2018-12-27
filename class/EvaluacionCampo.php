<?php
class EvaluacionCampo{
	var $id_evaluacionCampo;	
	var $numero_corte;
	var $edad;	
	var $porcentaje_resumen;
	var $id_campo;	
	var $fecha_evaluacion;	
	
	function setid_evaluacionCampo($var){
		$this->id_evaluacionCampo=$var;
	}
	function setnumero_corte($var){
		$this->numero_corte=$var;
	}
	function setporcentaje_resumen($var){
		$this->porcentaje_resumen=$var;
	}
	function setfecha_evaluacion($var){
		$this->fecha_evaluacion=$var;
	}
	function setid_campo($var){
		$this->id_campo=$var;
	}
	
	function getid_evaluacionCampo(){
		return $this->id_evaluacionCampo;
	}
	function getnumero_corte(){
		return $this->numero_corte;
	}
	function getedad(){
		return $this->edad;
	}	
	function getfecha_evaluacion(){
		return $this->fecha_evaluacion;
	}
	function getporcentaje_resumen(){
		return $this->porcentaje_resumen;
	}	
	function getid_campo(){
		return $this->id_campo;
	}
	
	function getLastID(){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");	
		$sql=mysql_query("select id_evaluacionCampo from evaluacionCampo order by id_evaluacionCampo;");
		$last=0;
		$id=0;
		while($row= mysql_fetch_assoc($sql)){
			$last++;
			$id=$row['id_evaluacionCampo'];
		}
		
		if($last<$id)
			$last=$id;
		
		return $last;
	}
	
	function reconstruir($id_evaluacionCampo){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result = mysql_query("SELECT * FROM evaluacionCampo WHERE id_evaluacionCampo=".$id_evaluacionCampo);
		if($row = mysql_fetch_assoc($result)){
				$this->id_evaluacionCampo=$row['id_evaluacionCampo'];
				$this->numero_corte=$row['numero_corte'];
				$this->edad=$row['edad'];
				$this->porcentaje_resumen=$row['porcentaje_resumen'];
				$this->id_campo=$row['id_campo'];
				$this->fecha_evaluacion=$row['fecha_evaluacion'];				
		}
	}
	
	function insertarNuevo(){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$sql="insert into evaluacionCampo values(null,".$this->numero_corte.",".$this->edad.",".$this->porcentaje_resumen.",".$this->id_campo.",'".$this->fecha_evaluacion."');";
		if($resultado=mysql_query($sql)){
			return true;
		}
		else{
			return false;	
		}
	}
	function comprobarInserccion($id_campo){
		include("class/Muestra.php");
		$vo_muestra=new Muestra();
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$result1=mysql_query("select distinct evaluacion.fecha_evaluacion from evaluacion, cuartel where evaluacion.id_cuartel=cuartel.id_cuartel and cuartel.id_campo=".$id_campo.";");
		$result2=mysql_query("select distinct fecha_evaluacion from evaluacionCampo where evaluacionCampo.id_campo=".$id_campo.";");
		$fech1[]="";
		$i=0;
		$fech2[]="";
		while($row = mysql_fetch_assoc($result1)){
				$fech1[$i]=$row['fecha_evaluacion'];
				$i++;
		}
		$j=0;
		if($result2)
		while($row = mysql_fetch_assoc($result2)){
				$fech2[$i]=$row['fecha_evaluacion'];
				$j++;
		}
		while($j<$i){
			$fecha=$fech1[$j];					
			$this->prepararInserccion($fecha,$id_campo,$vo_muestra);
			$this->insertarNuevo();
			$this->insertarConclusiones($id_campo);
			$j++;
		}		
	}		
	
	function insertarConclusiones($id_campo){
		include("class/Conclusion.php");
		include("class/EscalaII.php");			
		include("class/Tratamiento.php");
		include("class/Controlador.php");
		
		$vo_campo=new Campo();
		$vo_campo->reconstruir($id_campo);
		$vo_escala=new EscalaII();
		$lista=$vo_escala->getListaEscala($vo_campo->getid_empresa());
		$id=$this->getLastID(); //obtengo el id del recien ingresado

		$tmp=0;
		foreach ($lista as $indice=>$actual){
          	if($this->porcentaje_resumen<=$actual && $tmp==0){
				$clasi=$indice;
				$tmp=1;
			}
		}
		
		$vo_conclusion=new Conclusion();		
		$vo_conclusion->setdescripcion("De la Evaluacion del Campo tenemos que se encuentra en un rango ".$clasi.".");
		$vo_conclusion->setid_evaluacionCampo($id);
		$vo_conclusion->insertarNuevo();
		
		$vo_conclusion->setdescripcion("Del analisis se tiene que el ".$this->porcentaje_resumen." del total de hectareas estan infestadas con un grado de intensidad de infestacion ".$clasi.".");
		$vo_conclusion->insertarNuevo();

		$sql="select * from evaluacion,cuartel where evaluacion.id_cuartel=cuartel.id_cuartel and cuartel.id_campo=".$id_campo." and evaluacion.fecha_evaluacion='".$this->fecha_evaluacion."';";
		$resultado=mysql_query($sql);
		$vo_tratamiento=new Tratamiento();
		if($row=mysql_fetch_assoc($resultado))
		$controlador=$vo_tratamiento->getControlador_from_idevaluacion($row['id_evaluacion']);
		
		if($controlador=="Trichogramma"){
			$vo_conclusion->setdescripcion("Se recomienda liberar de 50 a 100 Pulgadas de Trichogramma por hectarea.");
			$vo_conclusion->insertarNuevo();
		}
		else if($controlador=="Paratheresia"){
			$vo_conclusion->setdescripcion("Se recomienda liberar 20 - 30 parejas de Paratheresia por hectarea.");
			$vo_conclusion->insertarNuevo();
		}
	}
		
	function prepararInserccion($fecha,$id_campo,$vo_muestra){
		$nc="";
		$porc=0;
		$rs=mysql_query("select * from evaluacion,cuartel where evaluacion.id_cuartel=cuartel.id_cuartel and cuartel.id_campo=".$id_campo." and evaluacion.fecha_evaluacion='".$fecha."';");
		$i=0;
		$ed=0.0;
		$total=0;
		$picados=0;
		while($row = mysql_fetch_assoc($rs)){
			$i++;
			$nc=$row['numero_corte'];
			$ed=$row['edad'];
			$total+=$vo_muestra->getTotalEvaluacion($row['id_evaluacion']);
			$picados+=$vo_muestra->getPicadosEvaluacion($row['id_evaluacion']);
		}
		$porc=(round(10000*$picados/$total)/100);
		$this->numero_corte=(int)$nc;
		$this->edad=$ed;
		$this->porcentaje_resumen=$porc;
		$this->id_campo=((int)$id_campo+0);
		$this->fecha_evaluacion=$fecha;
	}
	function resetearReportes(){
		$conn = mysql_connect("localhost", "biosegur_admin", "bio.intranetbd");
		$db = mysql_select_db("biosegur_intranet");
		$sql="delete from evaluacionCampo;";
		if($resultado=mysql_query($sql)){
			return true;
		}
		else{
			return false;	
		}		
	}
}
?>