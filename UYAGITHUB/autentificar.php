<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="https://goo.gl/gbgivT" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">  
    <script src="js/scripts.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>     
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
    <link rel='shortcut icon' type='image/x-icon' href='img/birrete.png' />    
    <title>Área Personal</title>
</head>
<body>
  
  <div aria-label="Barra de navegación"class="header">
      <div role="toolbar" class="navbar">
        <a href="index.html">
          <img alt="Logo" title="Inicio" src="img/logo5.png" tabindex="1" class="img-logo left" alt="logo"/>
        </a>
        <div class="topnav hide-on-med-and-down">
          <a class="menu-3" title="Inicio" href="index.html" tabindex="2">Inicio</a>
      <ul id = "dropdown" class = "drop-ul dropdown-content" role="menu">  
        <li class="drop"><a href = "preinscripcion.html" tabindex="4" role="menuitem" aria-expanded="false">Preinscripción 18-19</a></li>  
        <li class="drop"><a href = "horariosycirculares.html" tabindex="5" role="menuitem" aria-expanded="false">Horarios y Circulares</a></li>
        <li class="drop"><a href = "comedor.html" tabindex="6" role="menuitem" aria-expanded="false">Comedor<span></span></a></li>
        <li class="drop"><a href = "sobrenosotros.html" tabindex="7" role="menuitem" aria-expanded="false">Sobre nosotros</a></li>   
      </ul>  
      
      <a class = "dropdown-button menu-1" href = "#" data-activates = "dropdown" tabindex="3" aria-expanded="true">Información  
            <a class="inactive menu-1" title="Contacto" href="contacto.html" tabindex="8">Contacto</a>
            <a title="Inicio de Sesión" href="iniciosesion.html" class="right menu-2 cuadrado" tabindex="10">Iniciar Sesión</a>
            <a title="Registro" href="formulario.html" class="right menu-2 cuadrado lil-espacio-right" tabindex="9">Registrarse</a>
        </div>
      </div>
    </div>
  
</body>


</html>

<?php
	include "/php/conexion.php";
	$con = CrearConexion();
	
	$correo = $_POST['correo'];
	$password = $_POST['passw'];

	$sql = "SELECT * FROM datos_personales WHERE Correo = '$correo' AND Password= '$password' ";
	$result = $con->query($sql);

	if($result->num_rows > 0){
  	$row = $result->fetch_array(MYSQLI_ASSOC);
		$_SESSION['loggedin'] = true;
    $_SESSION['username'] = $row["Nombre"];
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
    $nombre = $_SESSION['username'];
    $apellidos = $row["Apellidos"];
    $correo = $row["Correo"];
    $dni = $row["DNI"];
    $nota = $row["Media"];

    ?><html>
      <body>
        <?php echo '<h1 class="h1-titulo center-align"> Bienvenido/a, ' . $nombre . '</h1>'; ?>
        <h2 class="h2-cuerpo center-align">Aquí encontrarás tus datos.</h2>

        <div class="cuadro-datos">
          <div class="center-align">
            <img src="img/user.png" alt="Icono de usuario" class="img-user">
          </div>
        <div class="center-align">
          <table class="tabla-datos" role="grid">
            <tr role="row">
              <th>Nombre</th>
              <?php echo '<td role="gridcell" class="right-align">' . $nombre . '</td>'; ?>
            </tr>
            <tr role="row">
              <th>Apellidos</th>
              <?php echo '<td role="gridcell" class="right-align">' . $apellidos . '</td>'; ?>
            </tr>
            <tr role="row">
              <th>DNI</th>
              <?php echo '<td role="gridcell" class="right-align">' . $dni . '</td>'; ?>
            </tr>
            <tr role="row">
              <th>Correo</th>
              <?php echo '<td role="gridcell" class="right-align">' . $correo . '</td>'; ?>
            </tr>
            <tr role="row">
              <th>Nota media</th>
              <?php echo '<td role="gridcell" class="right-align">' . $nota . '</td>'; ?>
            </tr>
            </div>
          </table>
        </tr>
        </div>
      </body>
    </html>

    <?php

  }

  else{
    ?><html>
      <body>
        <h1 class="h1-titulo center-align">Error de Autenticidad</h1>
        <h2 class="h2-cuerpo center-align">Correo o contraseña incorrectos, inténtalo de nuevo</h2>
        <a class="center-align" href="iniciosesion.html"><button name="Botón Inicio" alt="Botón inicio" value="Ir_log" type="button" class="btn waves-effect"  tabindex="10" ariarequired="true">Volver al acceso</button></a>
      
      </body>
    </html><?php
  }

  mysqli_close($con);

?>


<html>
  <footer>
    <div class="pie">
      <p class="copyright"> <b>© 2018 Copyright </b></p>
        <div class="pie-redes inline right">
          <i class="fa fa-envelope"></i>
          <a class="letra-blanca"> colegio.uya@2018.com</a>
        </div>
    </div>
  </footer>
</html>


