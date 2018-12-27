<?php

function show_userbox()
{
    // retrieve the session information
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    
    echo "
    
      <div id='page'>
	<div id='page-bgtop'>
	<div id='page-bgbtm'>
		<div id='content'>
			<div class='post'>
				<h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>

				<div style='clear: both;'>&nbsp;</div>
				<div class='entry'>
					<p>Le damos la bienvenida a nuestro portal para clientes exclusivos.</p>
					<p>Aqu&iacute podr&aacute gestionar la información relativa a nuestro servicio.</p>
				</div>
			</div>

		<div style='clear: both;'>&nbsp;</div>
		</div>
		<!-- end #content -->
  
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";

 }
 
 //mostramos la lista de localidades
 function show_mostrarcampos(){
  // retrieve the session information
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    echo "
      <div id='page'>
	<div id='page-bgtop'>
	<div id='page-bgbtm'>
		<div id='content'>
			<div class='post'>
				<h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>
        
				<div style='clear: both;'>&nbsp;</div>
				<div class='entry'>
					<p>Listado de Localidades registradas con TI asignado.</p>
          <div id='tabs11'>
                <ul>
                                <!-- CSS Tabs -->
<li><a href='campos.php'><span>Registrar</span></a></li>
<li><a href='mostrarcampos.php'><span>Mostrar</span></a></li>

                        </ul>
                </div><div style='clear: both;'></div>";
                    include('datagrid/paginador_campos.php');
	echo"			</div>
			</div>

		<div style='clear: both;'>&nbsp;</div>
		</div>
		<!-- end #content -->
  <div id='sidebar'>
			<ul>
				<li>
					<!--	<div id='search' >
				    <form method='get' action='#'>
						<div>
							<input type='text' name='s' id='search-text' value='' />
							<input type='submit' id='search-submit' value='BUSCAR' />
						</div>
					</form>
					</div> -->
					<div style='clear: both;'>&nbsp;</div>
				</li>"  ;

      //include("menu_principal.php");
echo "
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";
 }

//mostramos la lista de usuarios
 function show_mostrarusuarios(){
  // retrieve the session information
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    echo "
      <div id='page'>
	<div id='page-bgtop'>
	<div id='page-bgbtm'>
		<div id='content'>
			<div class='post'>
				<h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>
        
				<div style='clear: both;'>&nbsp;</div>
				<div class='entry'>
					<p>Listado de Usuarios.</p>
          <div id='tabs11'>
                <ul>
                                <!-- CSS Tabs -->
<li><a href='usuarios.php'><span>Registrar</span></a></li>
<li><a href='mostrarusuarios.php'><span>Mostrar</span></a></li>

                        </ul>
                </div><div style='clear: both;'></div>";
                    include('datagrid/paginador_usuarios.php');
	echo"			</div>
			</div>

		<div style='clear: both;'>&nbsp;</div>
		</div>
		<!-- end #content -->
  <div id='sidebar'>
			<ul>
				<li>
					<!--	<div id='search' >
				    <form method='get' action='#'>
						<div>
							<input type='text' name='s' id='search-text' value='' />
							<input type='submit' id='search-submit' value='BUSCAR' />
						</div>
					</form>
					</div> -->
					<div style='clear: both;'>&nbsp;</div>
				</li>"  ;

      //include("menu_principal.php");
echo "
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";
 }

//mostramos la lista de empresas
 function show_mostrarempresas(){
  // retrieve the session information
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    echo "
      <div id='page'>
	<div id='page-bgtop'>
	<div id='page-bgbtm'>
		<div id='content'>
			<div class='post'>
				<h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>
        
				<div style='clear: both;'>&nbsp;</div>
				<div class='entry'>
					<p>Listado de Empresas registradas.</p>
          <div id='tabs11'>
                <ul>
                                <!-- CSS Tabs -->
<li><a href='empresas.php'><span>Registrar</span></a></li>
<li><a href='mostrarempresas.php'><span>Mostrar</span></a></li>

                        </ul>
                </div><div style='clear: both;'></div>";
                    include('datagrid/paginador_empresas.php');
	echo"			</div>
			</div>

		<div style='clear: both;'>&nbsp;</div>
		</div>
		<!-- end #content -->
  <div id='sidebar'>
			<ul>
				<li>
					<!--	<div id='search' >
				    <form method='get' action='#'>
						<div>
							<input type='text' name='s' id='search-text' value='' />
							<input type='submit' id='search-submit' value='BUSCAR' />
						</div>
					</form>
					</div> -->
					<div style='clear: both;'>&nbsp;</div>
				</li>"  ;

      //include("menu_principal.php");
echo "
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";
 } 
 
 //mostramos la lista de controladores
 function show_mostrarcontroladores(){
  // retrieve the session information
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    echo "
      <div id='page'>
	<div id='page-bgtop'>
	<div id='page-bgbtm'>
		<div id='content'>
			<div class='post'>
				<h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>
        
				<div style='clear: both;'>&nbsp;</div>
				<div class='entry'>
					<p>Listado de Empresas registradas.</p>
          <div id='tabs11'>
                <ul>
                                <!-- CSS Tabs -->
<li><a href='controladores.php'><span>Registrar</span></a></li>
<li><a href='mostrarcontroladores.php'><span>Mostrar</span></a></li>

                        </ul>
                </div><div style='clear: both;'></div>";
                    include('datagrid/paginador_controladores.php');
	echo"			</div>
			</div>

		<div style='clear: both;'>&nbsp;</div>
		</div>
		<!-- end #content -->
  <div id='sidebar'>
			<ul>
				<li>
					<!--	<div id='search' >
				    <form method='get' action='#'>
						<div>
							<input type='text' name='s' id='search-text' value='' />
							<input type='submit' id='search-submit' value='BUSCAR' />
						</div>
					</form>
					</div> -->
					<div style='clear: both;'>&nbsp;</div>
				</li>"  ;

      //include("menu_principal.php");
echo "
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";
 } 

//mostramos la lista de cabeceras de evaluacion
 function show_mostrarcabeval(){
  // retrieve the session information
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    echo "
      <div id='page'>
	<div id='page-bgtop'>
	<div id='page-bgbtm'>
		<div id='content'>
			<div class='post'>
				<h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>
        
				<div style='clear: both;'>&nbsp;</div>
				<div class='entry'>
					<p>Cabecera de Evaluaci&oacute;n.</p>
          <div id='tabs11'>
                <ul>
                                <!-- CSS Tabs -->
<li><a href='evaluacion.php'><span>Registrar</span></a></li>
<li><a href='mostrareval.php'><span>Mostrar</span></a></li>

                        </ul>
                </div><div style='clear: both;'></div>";
                    include('datagrid/paginador_cabeval.php');
	echo"			</div>
			</div>

		<div style='clear: both;'>&nbsp;</div>
		</div>
		<!-- end #content -->
  <div id='sidebar'>
			<ul>
				<li>
					<!--	<div id='search' >
				    <form method='get' action='#'>
						<div>
							<input type='text' name='s' id='search-text' value='' />
							<input type='submit' id='search-submit' value='BUSCAR' />
						</div>
					</form>
					</div> -->
					<div style='clear: both;'>&nbsp;</div>
				</li>"  ;

      //include("menu_principal.php");
echo "
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";
 } 

//mostramos la lista de detalles de evaluacion
 function show_mostrardeteval($id){
  // retrieve the session information
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    echo "
      <div id='page'>
	<div id='page-bgtop'>
	<div id='page-bgbtm'>
		<div id='content'>
			<div class='post'>
				<h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>
        
				<div style='clear: both;'>&nbsp;</div>
				<div class='entry'>
					<p>Detalle de evaluaci&oacute;n.</p>
					
          <div id='tabs11'>
                <ul>
                                <!-- CSS Tabs -->
<li><a href='evaluacion.php'><span>Registrar</span></a></li>
<li><a href='mostrareval.php'><span>Mostrar</span></a></li>

                        </ul>
                </div><div style='clear: both;'></div>";
                    include('datagrid/paginador_deteval.php');
	echo"			</div>
			</div>

		<div style='clear: both;'>&nbsp;</div>
		</div>
		<!-- end #content -->
  <div id='sidebar'>
			<ul>
				<li>
					<!--	<div id='search' >
				    <form method='get' action='#'>
						<div>
							<input type='text' name='s' id='search-text' value='' />
							<input type='submit' id='search-submit' value='BUSCAR' />
						</div>
					</form>
					</div> -->
					<div style='clear: both;'>&nbsp;</div>
				</li>"  ;

      //include("menu_principal.php");
echo "
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";
 } 

//mostramos la lista de cultivares
 function show_mostrarcultivares(){
  // retrieve the session information
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    echo "
      <div id='page'>
	<div id='page-bgtop'>
	<div id='page-bgbtm'>
		<div id='content'>
			<div class='post'>
				<h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>
        
				<div style='clear: both;'>&nbsp;</div>
				<div class='entry'>
					<p>Listado de Cultivares registrados.</p>
          <div id='tabs11'>
                <ul>
                                <!-- CSS Tabs -->
<li><a href='cultivares.php'><span>Registrar</span></a></li>
<li><a href='mostrarcultivares.php'><span>Mostrar</span></a></li>

                        </ul>
                </div><div style='clear: both;'></div>";
                    include('datagrid/paginador_cultivares.php');
	echo"			</div>
			</div>

		<div style='clear: both;'>&nbsp;</div>
		</div>
		<!-- end #content -->
  <div id='sidebar'>
			<ul>
				<li>
					<!--	<div id='search' >
				    <form method='get' action='#'>
						<div>
							<input type='text' name='s' id='search-text' value='' />
							<input type='submit' id='search-submit' value='BUSCAR' />
						</div>
					</form>
					</div> -->
					<div style='clear: both;'>&nbsp;</div>
				</li>"  ;

      //include("menu_principal.php");
echo "
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";
 } 
 
 //registrar campos
 function show_registrarcampos(){
  // Obtenemos informacion de las sesiones
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    echo "
      <div id='page'>
	<div id='page-bgtop'>
	<div id='page-bgbtm'>
		<div id='content'>
			<div class='post'>
				<h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>
         
				<div style='clear: both;'>&nbsp;</div>
				<div class='entry'>
					<p>Registro de campos asociados a un cliente.</p>
          <div id='tabs11'>
                <ul>
                                <!-- CSS Tabs -->
<li><a href='campos.php'><span>Registrar</span></a></li>
<li><a href='mostrarcampos.php'><span>Mostrar</span></a></li>

                        </ul>
                </div><div style='clear: both;'></div>";
                   include('formularios/formregistrocampo.php');
	echo"			</div>
			</div>
    
		
		</div>
		<!-- end #content -->
		
  <div id='sidebar'>
			<ul>
				<li>
					<!--	<div id='search' >
				    <form method='get' action='#'>
						<div>
							<input type='text' name='s' id='search-text' value='' />
							<input type='submit' id='search-submit' value='BUSCAR' />
						</div>
					</form>
					</div> -->
					<div style='clear: both;'>&nbsp;</div>
				</li>"  ;

      //include("menu_principal.php");
echo "
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";
 }

 //registrar funcionario
 function show_registrarfunc(){
  // Obtenemos informacion de las sesiones
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    echo "
      <div id='page'>
	     <div id='page-bgtop'>
	       <div id='page-bgbtm'>
		        <div id='content'>
			         <div class='post'>
				          <h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>
         
				        <div style='clear: both;'>&nbsp;</div>
				        <div class='entry'>
					       <p>Registro de Usuarios.</p>
                <div id='tabs11'>
                  <ul>
                      <!-- CSS Tabs -->
                  <li><a href='usuarios.php'><span>Registrar</span></a></li>
                  <li><a href='mostrarusuarios.php'><span>Mostrar</span></a></li>

                  </ul>
                </div>
                <div style='clear: both;'></div>";
                   include('formularios/formregistrousuario.php');
	echo"			</div>
			</div>
    
		
		</div>
		<!-- end #content -->
		
  <div id='sidebar'>
			<ul>
				<li>
					<!--	<div id='search' >
				    <form method='get' action='#'>
						<div>
							<input type='text' name='s' id='search-text' value='' />
							<input type='submit' id='search-submit' value='BUSCAR' />
						</div>
					</form>
					</div> -->
					<div style='clear: both;'>&nbsp;</div>
				</li>"  ;

      //include("menu_principal.php");
echo "
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";
 }
 
//registrar cultivares
 function show_registrarcultivares(){
  // Obtenemos informacion de las sesiones
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    echo "
      <div id='page'>
	<div id='page-bgtop'>
	<div id='page-bgbtm'>
		<div id='content'>
			<div class='post'>
				<h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>
         
				<div style='clear: both;'>&nbsp;</div>
				<div class='entry'>
					<p>Registro de cultivar.</p>
          <div id='tabs11'>
                <ul>
                                <!-- CSS Tabs -->
<li><a href='cultivares.php'><span>Registrar</span></a></li>
<li><a href='mostrarcultivares.php'><span>Mostrar</span></a></li>

                        </ul>
                </div><div style='clear: both;'></div>";
                   include('formularios/formregistrocultivar.php');
	echo"			</div>
			</div>
    
		
		</div>
		<!-- end #content -->
		
  <div id='sidebar'>
			<ul>
				<li>
					<!--	<div id='search' >
				    <form method='get' action='#'>
						<div>
							<input type='text' name='s' id='search-text' value='' />
							<input type='submit' id='search-submit' value='BUSCAR' />
						</div>
					</form>
					</div> -->
					<div style='clear: both;'>&nbsp;</div>
				</li>"  ;

      //include("menu_principal.php");
echo "
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";
 } 
 
 //registrar campos
 function show_registrarcontrolador(){
  // Obtenemos informacion de las sesiones
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    echo "
      <div id='page'>
	<div id='page-bgtop'>
	<div id='page-bgbtm'>
		<div id='content'>
			<div class='post'>
				<h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>
         
				<div style='clear: both;'>&nbsp;</div>
				<div class='entry'>
					<p>Registro de campos asociados a un cliente.</p>
          <div id='tabs11'>
                <ul>
                                <!-- CSS Tabs -->
<li><a href='controladores.php'><span>Registrar</span></a></li>
<li><a href='mostrarcontroladores.php'><span>Mostrar</span></a></li>

                        </ul>
                </div><div style='clear: both;'></div>";
                   include('formularios/formregistrocontrolador.php');
	echo"			</div>
			</div>
    
		
		</div>
		<!-- end #content -->
		
  <div id='sidebar'>
			<ul>
				<li>
					<!--	<div id='search' >
				    <form method='get' action='#'>
						<div>
							<input type='text' name='s' id='search-text' value='' />
							<input type='submit' id='search-submit' value='BUSCAR' />
						</div>
					</form>
					</div> -->
					<div style='clear: both;'>&nbsp;</div>
				</li>"  ;

      //include("menu_principal.php");
echo "
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";
 }
 
//registrar cultivares
 function show_registrarcontroladores(){
  // Obtenemos informacion de las sesiones
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    echo "
      <div id='page'>
	<div id='page-bgtop'>
	<div id='page-bgbtm'>
		<div id='content'>
			<div class='post'>
				<h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>
         
				<div style='clear: both;'>&nbsp;</div>
				<div class='entry'>
					<p>Registro de cultivar.</p>
          <div id='tabs11'>
                <ul>
                                <!-- CSS Tabs -->
<li><a href='controlador.php'><span>Registrar</span></a></li>
<li><a href='mostrarcontroladores.php'><span>Mostrar</span></a></li>
                        </ul>
						<!--Fin-->
                </div><div style='clear: both;'></div>";
                   include('formularios/formregistrocultivar.php');
	echo"			</div>
			</div>
    
		
		</div>
		<!-- end #content -->
		
  <div id='sidebar'>
			<ul>
				<li>
					<!--	<div id='search' >
				    <form method='get' action='#'>
						<div>
							<input type='text' name='s' id='search-text' value='' />
							<input type='submit' id='search-submit' value='BUSCAR' />
						</div>
					</form>
					</div> -->
					<div style='clear: both;'>&nbsp;</div>
				</li>"  ;

      //include("menu_principal.php");
echo "
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";
 } 
 
//registrar empresas
 function show_registrarempresas(){
  // Obtenemos informacion de las sesiones
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    echo "
      <div id='page'>
	<div id='page-bgtop'>
	<div id='page-bgbtm'>
		<div id='content'>
			<div class='post'>
				<h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>
         
				<div style='clear: both;'>&nbsp;</div>
				<div class='entry'>
					<p>Registro de empresas clientes.</p>
          <div id='tabs11'>
                <ul>
                                <!-- CSS Tabs -->
<li><a href='empresas.php'><span>Registrar</span></a></li>
<li><a href='mostrarempresas.php'><span>Mostrar</span></a></li>

                        </ul>
                </div><div style='clear: both;'></div>";
                   include('formularios/formregistroempresa.php');
	echo"			</div>
			</div>
    
		
		</div>
		<!-- end #content -->
		
  <div id='sidebar'>
			<ul>
				<li>
					<!--	<div id='search' >
				    <form method='get' action='#'>
						<div>
							<input type='text' name='s' id='search-text' value='' />
							<input type='submit' id='search-submit' value='BUSCAR' />
						</div>
					</form>
					</div> -->
					<div style='clear: both;'>&nbsp;</div>
				</li>"  ;

      //include("menu_principal.php");
echo "
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";
 }

 //registrar campos
 function show_registrarevaluacion(){
  // Obtenemos informacion de las sesiones
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    echo "
      <div id='page'>
	<div id='page-bgtop'>
	<div id='page-bgbtm'>
		<div id='content'>
			<div class='post'>
				<h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>
         
				<div style='clear: both;'>&nbsp;</div>
				<div class='entry'>
					<p>Registro de Evaluaci&oacuten de Campo.</p>
          <div id='tabs11'>
                <ul>
                                <!-- CSS Tabs -->
<li><a href='evaluacion.php'><span>Registrar</span></a></li>
<li><a href='mostrareval.php'><span>Mostrar</span></a></li>

                        </ul>
                </div><div style='clear: both;'></div>";
                   include('formularios/formregistroeval.php');
	echo"			</div>
			</div>
    
		
		</div>
		<!-- end #content -->
		
  <div id='sidebar'>
			<ul>
				<li>
					<!--	<div id='search' >
				    <form method='get' action='#'>
						<div>
							<input type='text' name='s' id='search-text' value='' />
							<input type='submit' id='search-submit' value='BUSCAR' />
						</div>
					</form>
					</div> -->
					<div style='clear: both;'>&nbsp;</div>
				</li>"  ;

      //include("menu_principal.php");
echo "
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";
 } 
  
//para reportear las evaluaciones 
 function show_mostrarcabevaltrat($id){
  // retrieve the session information
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    echo "
      <div id='page'>
	<div id='page-bgtop'>
	<div id='page-bgbtm'>
		<div id='content'>
			<div class='post'>
				<h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>
        
				<div style='clear: both;'>&nbsp;</div>
				<div class='entry'>
					<p>Tratamiento de Campos conforme a la Evaluaci&oacute;n.</p>
          ";
				if($id=='')
                    include('datagrid/paginador_tratamientocabeval.php');
				else{
					
					include('datagrid/paginador_tratamientodeteval.php');
					
					
					}
					
	echo"
				<div style='clear: both;'>&nbsp;</div>
				<div id='container' style='width: 800px; height: 400px; margin: 0 auto'></div>";
				
				if($id<>''){
				include('charts/chartspicados.php');
				echo "<div id='container2' style='width: 800px; height: 400px; margin: 0 auto'></div>";
				}
					
	echo "
				
				</div>
			</div>

		<div style='clear: both;'>&nbsp;</div>
		</div>
		<!-- end #content -->
  <div id='sidebar'>
			<ul>
				<li>
					<!--	<div id='search' >
				    <form method='get' action='#'>
						<div>
							<input type='text' name='s' id='search-text' value='' />
							<input type='submit' id='search-submit' value='BUSCAR' />
						</div>
					</form>
					</div> -->
					<div style='clear: both;'>&nbsp;</div>
				</li>"  ;

      //include("menu_principal.php");
echo "
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";
 }
 
 //para reportear las evaluaciones 
 function show_reporteseval($id){
  // retrieve the session information
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    echo "
      <div id='page'>
	<div id='page-bgtop'>
	<div id='page-bgbtm'>
		<div id='content'>
			<div class='post'>
				<h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>
        
				<div style='clear: both;'>&nbsp;</div>
				<div class='entry'>
					<p>Cabecera de Evaluaci&oacute;n.</p>
					";
					if($id<>''){
					echo "
          <div id='tabs11'>
                <ul>
                                <!-- CSS Tabs -->
<li><a href='reportes.php'><span>Reporte Evaluaci&oacute;n</span></a></li>
<li><a href='dosisparathe.php?ideval=".$id."'><span>Dosis Parathe</span></a></li>
<li><a href='dosistricho.php?ideval=".$id."''><span>Dosis Tricho</span></a></li>
<li><a href='dosiscrisop.php?ideval=".$id."''><span>Dosis Crisop</span></a></li>
                        </ul>
						</div>";
				}
				echo "
                <div style='clear: both;'></div>";
				if($id=='')
                    include('datagrid/paginador_reporteeval.php');
				else{
					include('datagrid/paginador_reporteeval1.php');
					include('datagrid/paginador_reportedeteval.php');
					
					include('charts/chartsjs.php');
					include('datagrid/paginador_analisiseval.php');
					}
					
	echo"
				<div style='clear: both;'>&nbsp;</div>
				<div id='container' style='width: 800px; height: 400px; margin: 0 auto'></div>";
				
				if($id<>''){
				include('charts/chartspicados.php');
				echo "<div id='container2' style='width: 800px; height: 400px; margin: 0 auto'></div>";
				include('charts/chartsHaPicadas.php');
				echo "<div id='container3' style='width: 800px; height: 400px; margin: 0 auto'></div>";
				include('includes/conclusion.php');
				}
					
	echo "
				
				</div>
			</div>

		<div style='clear: both;'>&nbsp;</div>
		</div>
		<!-- end #content -->
  <div id='sidebar'>
			<ul>
				<li>
					<!--	<div id='search' >
				    <form method='get' action='#'>
						<div>
							<input type='text' name='s' id='search-text' value='' />
							<input type='submit' id='search-submit' value='BUSCAR' />
						</div>
					</form>
					</div> -->
					<div style='clear: both;'>&nbsp;</div>
				</li>"  ;

      //include("menu_principal.php");
echo "
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";
 }

function show_reportedosparathe($id){
  // retrieve the session information
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    echo "
      <div id='page'>
	<div id='page-bgtop'>
	<div id='page-bgbtm'>
		<div id='content'>
			<div class='post'>
				<h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>
        
				<div style='clear: both;'>&nbsp;</div>
				<div class='entry'>
					<p><b>Reporte por Dosis de Paratheresia.</b></p>
					";
					if($id<>''){
					echo "
          <div id='tabs11'>
                <ul>
                                <!-- CSS Tabs -->
<li><a href='reportes.php?id=".$id."''><span>Reporte Evaluaci&oacute;n</span></a></li>
<li><a href='dosisparathe.php?ideval=".$id."'><span>Dosis Parathe</span></a></li>
<li><a href='dosistricho.php?ideval=".$id."''><span>Dosis Tricho</span></a></li>
<li><a href='dosiscrisop.php?ideval=".$id."''><span>Dosis Crisop</span></a></li>
                </ul>
		</div>";
				}
				echo "
                <div style='clear: both;'></div>";
				if($id=='')
                    include('datagrid/paginador_reporteeval.php');
				else{
					include('datagrid/paginador_reporteeval1.php');
					include('datagrid/paginador_reportedosisparathe.php');
					
					include('charts/chartsdosparathe.php');
					}
					
	echo"
				<div style='clear: both;'>&nbsp;</div>
				<div id='container' style='width: 800px; height: 400px; margin: 0 auto'></div>
				</div>
			</div>

		<div style='clear: both;'>&nbsp;</div>
		</div>
		<!-- end #content -->
  <div id='sidebar'>
			<ul>
				<li>
					<!--	<div id='search' >
				    <form method='get' action='#'>
						<div>
							<input type='text' name='s' id='search-text' value='' />
							<input type='submit' id='search-submit' value='BUSCAR' />
						</div>
					</form>
					</div> -->
					<div style='clear: both;'>&nbsp;</div>
				</li>"  ;

      //include("menu_principal.php");
echo "
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";
 }
 
function show_reportedostricho($id){
  // retrieve the session information
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    echo "
      <div id='page'>
	<div id='page-bgtop'>
	<div id='page-bgbtm'>
		<div id='content'>
			<div class='post'>
				<h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>
        
				<div style='clear: both;'>&nbsp;</div>
				<div class='entry'>
					<p><b>Reporte por Dosis de Trichogramma.</b></p>
					";
					if($id<>''){
					echo "
          <div id='tabs11'>
                <ul>
                                <!-- CSS Tabs -->
<li><a href='reportes.php?id=".$id."''><span>Reporte Evaluaci&oacute;n</span></a></li>
<li><a href='dosisparathe.php?ideval=".$id."'><span>Dosis Parathe</span></a></li>
<li><a href='dosistricho.php?ideval=".$id."''><span>Dosis Tricho</span></a></li>
<li><a href='dosiscrisop.php?ideval=".$id."''><span>Dosis Crisop</span></a></li>
                </ul>
		</div>";
				}
				echo "
                <div style='clear: both;'></div>";
				if($id=='')
                    include('datagrid/paginador_reporteeval.php');
				else{
					include('datagrid/paginador_reporteeval1.php');
					include('datagrid/paginador_reportedosistricho.php');
					
					include('charts/chartsdostricho.php');
					}
					
	echo"
				<div style='clear: both;'>&nbsp;</div>
				<div id='container' style='width: 800px; height: 400px; margin: 0 auto'></div>
				</div>
			</div>

		<div style='clear: both;'>&nbsp;</div>
		</div>
		<!-- end #content -->
  <div id='sidebar'>
			<ul>
				<li>
					<!--	<div id='search' >
				    <form method='get' action='#'>
						<div>
							<input type='text' name='s' id='search-text' value='' />
							<input type='submit' id='search-submit' value='BUSCAR' />
						</div>
					</form>
					</div> -->
					<div style='clear: both;'>&nbsp;</div>
				</li>"  ;

      //include("menu_principal.php");
echo "
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";
 }
function show_reportedoscrisop($id){
  // retrieve the session information
    $u = $_SESSION['nomfunc'];
    //$nom=explode(" ",$u);
    $uid = $_SESSION['loginid'];
    // display the user box
    echo "
      <div id='page'>
	<div id='page-bgtop'>
	<div id='page-bgbtm'>
		<div id='content'>
			<div class='post'>
				<h2 class='title'><a href='#'>Bienvenido ".$u."   </a></h2>
        
				<div style='clear: both;'>&nbsp;</div>
				<div class='entry'>
					<p><b>Reporte por Dosis de Crisop.</b></p>
					";
					if($id<>''){
					echo "
          <div id='tabs11'>
                <ul>
                                <!-- CSS Tabs -->
<li><a href='reportes.php?id=".$id."''><span>Reporte Evaluaci&oacute;n</span></a></li>
<li><a href='dosisparathe.php?ideval=".$id."'><span>Dosis Parathe</span></a></li>
<li><a href='dosistricho.php?ideval=".$id."''><span>Dosis Tricho</span></a></li>
<li><a href='dosiscrisop.php?ideval=".$id."''><span>Dosis Crisop</span></a></li>
                </ul>
		</div>";
				}
				echo "
                <div style='clear: both;'></div>";
				if($id=='')
                    include('datagrid/paginador_reporteeval.php');
				else{
					include('datagrid/paginador_reporteeval1.php');
					include('datagrid/paginador_reportedosiscrisop.php');
					
					include('charts/chartsdoscrisop.php');
					}
					
	echo"
				<div style='clear: both;'>&nbsp;</div>
				<div id='container' style='width: 800px; height: 400px; margin: 0 auto'></div>
				</div>
			</div>

		<div style='clear: both;'>&nbsp;</div>
		</div>
		<!-- end #content -->
  <div id='sidebar'>
			<ul>
				<li>
					<!--	<div id='search' >
				    <form method='get' action='#'>
						<div>
							<input type='text' name='s' id='search-text' value='' />
							<input type='submit' id='search-submit' value='BUSCAR' />
						</div>
					</form>
					</div> -->
					<div style='clear: both;'>&nbsp;</div>
				</li>"  ;

      //include("menu_principal.php");
echo "
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style='clear: both;'>&nbsp;</div>
	</div>
	</div>
	</div> ";
 }

 ?>