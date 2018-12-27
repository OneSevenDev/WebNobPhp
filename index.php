<?php session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Intranet Bioseguridad</title>

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #;
}
-->
</style>

<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<style type="text/css">
<!--
.style1 {color: #0000CC}
-->
</style>
</head>

<body>
<div id="wrapper">
	<div id="header-wrapper">
	<div id="header">
		<div id="logo">      
			<h1>BioSeguridad</h1>
		</div>
	</div>

	</div>
	<form action="validaciones/validarLogin.php" method="post">
			<table width="1018" border="0">
			  <tr>
				<td width="284" rowspan="6"><img src="imagenes/log.gif" alt="bioseguridad" width="276" height="128" longdesc="complementos/footer.php" /></td>
				<td width="18">&nbsp;</td>
				<td width="90">&nbsp;</td>
				<td width="164">&nbsp;</td>
				<td width="440">&nbsp;</td>
			  </tr>
			  <tr>
				<td height="34">&nbsp;</td>
				<td><span class="style1">Login:</span></td>
				<td>				  
					<input type="text" name="tbLogin" id="tbLogin" />				  
				</td>
				<td>&nbsp;</td>
			  </tr>
			  
			  <tr>
				<td>&nbsp;</td>
				<td><span class="style1">Password:</span></td>
				<td>
				  <input type="password" name="tbPassword" id="tbPassword" />
				</td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><input name="btEnviar" type="submit" class="button" id="btEnviar" value="Enviar" /></td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><?php if(isset($_SESSION['sMensaje'])) echo"".$_SESSION['sMensaje'];?></td>
				<td>&nbsp;</td>
			  </tr>
			</table>	
	</form>
	phpinfo();
	
  <?php  include "complementos/footer.php"; ?>

</div>
</body>
</html>