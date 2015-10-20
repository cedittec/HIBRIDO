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
  <link href="css/pages/dashboard.css" rel="stylesheet">
</head>
<body>


<?php include "head.php"; ?>


<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-globe"></i>
              <h3>Estado</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> 
               
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
                  palomita('Sistema', $lastData['sc_estado_bomba'], "Automático", "Manual");
                  palomita('Nivel', $lastData['tanque_nivel'], "Alto", "Bajo");
                  palomita('Nivel', !$lastData['tanque_nivel'], "Bajo", "Alto");
                ?> 
              </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div><!-- /widget -->
          <div class="widget widget-nopad" >
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Datos del tanque</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content" style="height:150px">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <div id="big_stats" class="cf">
                  
                    <!-- .stat -->
                    
                    <div class="stat"> 

                                                  <table width = "100%">
                                                      <tr>
                                                          <td align = "right" width = "44%">
                                                              <i class="icon-sun"></i>
                                                          </td>
                                                          <td align = "left">
                                                              <i style="font-size:24px">&nbsp;&nbsp;Temperatura</i>
                                                          </td>
                                                      </tr>
                                                  </table>   

                      <span class="value"> <?= $lastData['tanque_temperatura'] ?>°C</span> 
                    </div>
                    <!-- .stat -->
                   
                  </div>
                </div>
                <!-- /widget-content --> 
                
              </div>
            </div>
            <!-- /widget content -->
          </div>
          <!-- /widget -->
        </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->

<?php include 'foot.php'; ?>

</body>
</html>