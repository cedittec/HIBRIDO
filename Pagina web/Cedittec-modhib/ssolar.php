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
  <link href="css/pages/reports.css" rel="stylesheet">
  <link href="css/pages/dashboard.css" rel="stylesheet">
</head>
<body>
  
<?php include "head.php"; ?>


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
                        

                        <?php
                          if($lastData['paro_emergencia'])
                          {
                        ?>
                            <div class="alert-success" style="padding-top:10px; padding-bottom:10px; padding-left:0px"><br>Encendido<br>&nbsp;</div>
                        <?php 
                          }
                          else
                          {
                        ?>
                            <div class="alert-error" style="padding-top:10px; padding-bottom:10px; padding-left:0px"><br>Apagado<br>&nbsp;</div>
                        <?php
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
                  function palomita($nombre, $bool)
                  {
                      echo '
                        <a class="shortcut">
                        <span class="shortcut-label"><h3>'. $nombre .'</h3></span>';
                          if($bool)
                          {
                          echo ' 
                            <i class="icon-ok" style="zoom: 2.0"></i>
                            <span class="shortcut-label"><h5><b >(Encendido)</b></h5></span>';
                          }
                          else
                          {
                            echo '             
                            <i class="icon-remove" style="zoom: 2.0"></i>
                            <span class="shortcut-label"><h5><b >(Apagado)</b></h5></span>';
                          }
                          echo " </a>";
                  }
                  ?>
                           
                <?php

                    palomita('Brazo manual', !$lastData['ss_movimiento_brazo']);
                    palomita('Brazo automatico', $lastData['ss_movimiento_brazo']);
                    palomita('Comunicación', $lastData['sssissateclado']);
                ?>

                </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
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