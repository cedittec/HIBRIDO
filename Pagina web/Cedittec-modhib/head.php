<?php 
  if(!isset($_SESSION['user'])) 
  {
    header('Location: login.php');
    exit();
  }
   
  if(
      $_SESSION['typeID'] != 1 && 
      (
        basename($_SERVER['SCRIPT_NAME']) == "clientes.php" || 
        basename($_SERVER['SCRIPT_NAME']) == "usuarios.php" || 
        basename($_SERVER['SCRIPT_NAME']) == "sitios.php"
      )
    )
    header('Location: logout.php');
?>

<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
    	<a class="brand" href="index.php"><img src="img/logo.png"> &nbsp&nbsp&nbsp&nbsp&nbsp Módulo de energía solar híbrido </a>
        <div class="nav-collapse">
          
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-user"></i> <?= htmlentities($_SESSION['user'])." - ".$_SESSION['type'] ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a onclick="preguntarSalir();" >Salir</a></li>
              <li><a href="cambio.php" >Cambiar contraseña</a></li>
            </ul>
          </li>
        </ul>
      </div>
     
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container" style = "width: 100%;" align = "center">
      <ul class="mainnav">

        <li <?= (basename($_SERVER['SCRIPT_NAME']) == "index.php"?"class = 'active'":"")?> >
          <a href="index.php"><i class="icon-dashboard"></i><span>Estado del sistema</span> </a> 
        </li>
        <li <?= (basename($_SERVER['SCRIPT_NAME']) == "mhibrido.php"?"class = 'active'":"")?> >
          <a href="mhibrido.php"><i class="icon-file"></i><span>Modulo híbrido</span> </a> 
        </li>
        <li <?= (basename($_SERVER['SCRIPT_NAME']) == "ssolar.php"?"class = 'active'":"")?> >
          <a href="ssolar.php"><i class="icon-sun"></i><span>Seguimiento solar</span> </a> 
        </li>
        <li <?= (basename($_SERVER['SCRIPT_NAME']) == "tanque.php"?"class = 'active'":"")?> >
          <a href="tanque.php"><i class="icon-bitbucket"></i><span>Tanque</span> </a> 
        </li>
        <li <?= (basename($_SERVER['SCRIPT_NAME']) == "bomba.php"?"class = 'active'":"")?> >
          <a href="bomba.php"><i class="icon-retweet"></i><span>Bomba</span> </a>
        </li>
        <li <?= (basename($_SERVER['SCRIPT_NAME']) == "emisiones.php"?"class = 'active'":"")?> >
          <a href="emisiones.php"><i class="icon-list-alt"></i><span>Emisiones</span> </a>
        </li>
        <li <?= (basename($_SERVER['SCRIPT_NAME']) == "tendencias.php"?"class = 'active'":"")?> >
          <a href="tendencias.php"><i class="icon-bar-chart"></i><span>Tendencias</span> </a>
        </li>

        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-globe"></i><span>Sitios</span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <?php
                      include 'connectionTools.php'; 

                      if(!$rs = mysqli_query($link, 'select sitio.nombre_sitio, sitio.id from sitio, usuario_sitio where usuario_sitio.sitio_id = sitio.id and usuario_sitio.usuario_id = '.$_SESSION['id']))
                        echo "Error al ejecutar query.".mysqli_error($link);
                      else
                        for($i = 0; $fila = mysqli_fetch_array($rs); $i++)
                          echo "<li><a href='".basename($_SERVER['SCRIPT_NAME'])."?sitio=".$fila['id']."'>".$fila['nombre_sitio']."</a></li>";
                    ?>
                </ul>
        </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-gears"></i><span>Módulos</span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                   <?php
                        if(isset($_SESSION['sitio']))
                        {
                          if(!$rs = mysqli_query($link, 'select nombre_modulo, id from modulo where sitio_id = '.$_SESSION['sitio']))
                            echo "Error al ejecutar query.".mysqli_error($link);
                          else
                            for($i = 0; $fila = mysqli_fetch_array($rs); $i++)
                              echo "<li><a href='".basename($_SERVER['SCRIPT_NAME'])."?modulo=".$fila['id']."'>".$fila['nombre_modulo']."</a></li>";
                          
                        }                        
                    ?>
                </ul>
        </li>
        
        <?php
          if($_SESSION['typeID'] == 1 )
          {
              ?>
                  <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Configuración</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="clientes.php">Clientes</a></li>
                      <li><a href="usuarios.php">Usuarios</a></li>
                      <li><a href="sitios.php">Sitios</a></li>
                    </ul>
                  </li>
              <?php
            }
          ?> 
        
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->

    <script type = 'text/javascript'>           
        function preguntarSalir()  
        {               
            var eliminar = confirm('Seguro que deseas salir?');                 
            if(eliminar) 
            {
                location.href='logout.php';
            }          
        }
    </script>