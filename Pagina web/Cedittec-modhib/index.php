<?php include 'indexController.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Módulo de energía solar híbrido</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
          rel="stylesheet">
  <link href="css/font-awesome.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="js/guidely/guidely.css" rel="stylesheet">
  <link href="css/pages/reports.css" rel="stylesheet">
  <link href="css/pages/dashboard.css" rel="stylesheet">
</head>
<body>

<?php include 'head.php'; ?>

<div class="main">
  <div class="main-inner">
    <div class="container">
    <div class="row">	      	
	      	<div class="span12">  
                <div class="info-box">
                   <div class="row-fluid stats-box" style="margin-top:15px; margin-bottom:15px">                 
                      <div class="span12">
                        <div class="stats-box-all-info">Paro de emergencia</div>
                        <div class="stats-box-all-info" style="margin:0px">
                        
                        <!--<div class="btn-warning" style="padding-top:10px; padding-bottom:10px; padding-left:0px"><i class="icon-off"  style="color:#F00; "></i> Apagado</div>-->

                        <?php
                          if($lastData['paro_emergencia'])
                          {
                            echo '
                            <div class="alert-success" style="padding-top:10px; padding-bottom:10px; padding-left:0px"><br>Encendido<br>&nbsp;</div>
                         ';
                          }
                          else
                          {
                            echo '
                            <div class="alert-error" style="padding-top:10px; padding-bottom:10px; padding-left:0px"><br>Apagado<br>&nbsp;</div>
                            ';
                          }
                        ?>
                        </div>                    
                      </div>                  
                   </div>   
                </div>
            </div>
         </div>    
      <div class="row">
        
          <!-- /widget -->
           
          <!-- /widget -->
          
          <!-- /widget --> 
        
        <!-- /span6 -->
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bell"></i>
              <h3>Estados del Sistema</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts" > 


                 <?php
                   function palomita($nombre, $bool,  $msgT, $msgF)
                  {
                      echo '
                        <a class="shortcut">
                        <span class="shortcut-label"><h3>'. $nombre .'</h3></span>';
                          if($bool)
                          {
                          echo ' 
                            <i class="icon-ok" style="zoom: 2.0"></i>
                            <span class="shortcut-label"><h5><b >'. $msgT.' </b></h5></span>';
                          }
                          else
                          {
                            echo '             
                            <i class="icon-remove" style="zoom: 2.0"></i>
                            <span class="shortcut-label"><h5><b >'. $msgF.' </b></h5></span>';
                          }
                          echo " </a>";
                  }
                ?>
                         
                  <?php
                    palomita('SISSA>Controlador', $lastData['sc_estado_sissa_rasp_berry'], "SISSA>Controlador");
                    palomita('Controlador>SISSA', $lastData['sc_estado_raspberry_sissa'], "Controlador>SISSA");
                    palomita('Bomba', $lastData['sc_estado_bomba'],"Bomba");
                  ?>
                  <a class="shortcut">
                    <span class="shortcut-label"><h3>Velocidad de la bomba</h3></span>
                    <i class="icon-ok" style="zoom: 2.0"></i>
                    <span class="shortcut-label"><h5><b><?php echo $lastData['se_velocidad_bomba']; ?> %</b></h5></span>
                  </a>
                 
                  <?php
                    palomita('Modo Manual', !$lastData['sc_estado_bomba'], "Modo manual");
                    palomita('Modo Automatico', $lastData['sc_estado_bomba'], "Modo automático");
                  ?>
               
                 </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
         
          <!-- /widget -->
          
          
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
<script>
  function cerrar()
  {
    document.getElementById("modal").innerHTML="";
  }
</script>
<?php include 'foot.php'; ?>
  <div id="modal">
    <?php 
      if(isset($_GET['elegir']))
      {
      ?>
                      <div id="guide-welcome" class="guidely-guide" style="position: absolute; top: 75px; left: 50%; margin-left: -178px; display: block;">
                          <div class="guidely-popup">
                              <div class="guidely-guide-pad" align = "center">
                                <h4>Primero elige tu sitio y módulo!</h4>
                                        <table width = "100%"><tr>
                                          <td align = "center" width = "50%">
                                                      <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-globe"></i><span>Sitios</span> <b class="caret"></b></a>
                                                        <ul class="dropdown-menu">
                                                            <?php
                                                              include 'connectionTools.php'; 

                                                              if(!$rs = mysqli_query($link, 'select sitio.nombre_sitio, sitio.id from sitio, usuario_sitio where usuario_sitio.sitio_id = sitio.id and usuario_sitio.usuario_id = '.$_SESSION['id']))
                                                                echo "Error al ejecutar query.".mysqli_error($link);
                                                              else
                                                                for($i = 0; $fila = mysqli_fetch_array($rs); $i++)
                                                                  echo "<li><a href='".basename($_SERVER['SCRIPT_NAME'])."?sitio=".$fila['id']."&elegir=true'>".$fila['nombre_sitio']."</a></li>";
                                                            ?>
                                                        </ul>
                                                      </li>
                                          </td>
                                          <td align = "center">
                                                      <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-gears"></i><span>Módulos</span> <b class="caret"></b></a>
                                                          <ul class="dropdown-menu">
                                                             <?php
                                                                  if(isset($_SESSION['sitio']))
                                                                  {
                                                                    if(!$rs = mysqli_query($link, 'select nombre_modulo, id from modulo where sitio_id = '.$_SESSION['sitio']))
                                                                      echo "Error al ejecutar query.".mysqli_error($link);
                                                                    else
                                                                      for($i = 0; $fila = mysqli_fetch_array($rs); $i++)
                                                                        echo "<li onclick='cerrar();'><a href='".basename($_SERVER['SCRIPT_NAME'])."?modulo=".$fila['id']."'>".$fila['nombre_modulo']."</a></li>";
                                                                  }                        
                                                              ?>
                                                          </ul>
                                                      </li>
                                          </td>
                                        </tr></table>
                              </div>
                          </div>
                      </div>
      <?php
      }
    ?>

  </div>

</body>
</html>