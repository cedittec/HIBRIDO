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


<?php include 'head.php'; ?>

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
                    palomita('Estado', $lastData['sc_estado_bomba'], "Encendido", "Apagado");
                    palomita('Modo', $lastData['sc_estado_bomba'], "Automático", "Manual");
                  ?>
            </div>
           
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div><!-- /widget -->
        </div>
      
        
       
        <div class="span12">
            <div class="widget widget-nopad">
              <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3> Velocidad</h3>
              </div>
              <!-- /widget-header -->
              <div class="widget-content" style="height:150px">
                <div class="widget big-stats-container" style="margin-bottom:10px">
                	   <?php
                        if (isset($_POST['speed'])){
                            $link = mysqli_connect($db_url, $db_user,$db_pass, $db_name);
                            $date_created = $lastData['date_created'];
                            $se_velocidad_bomba = ($lastData['se_velocidad_bomba']*$_POST['speed'])/10.0;
                            $link->query("update hibrido_solar set se_velocidad_bomba = $se_velocidad_bomba where date_created = '$date_created';");
                        }
                    ?>
                 <div id="modifVelocidad" style=" margin: 15px;"> 
                      	<b style="margin-right:35px; font-size:large; ">Seleccionar velocidad (actual: <?= $lastData['se_velocidad_bomba'] ?>)</b>
                      <br>&nbsp;<br>
                      <form method = "POST" action = "">

                          <select class="form-control" name = "speed" style="width:100%; ">
                              <option value ="0">0%</option>
                              <option  value ="1">10%</option>
                              <option  value ="2">20%</option>
                              <option  value ="3">30%</option>
                              <option  value ="4">40%</option>
                              <option  value ="5">50%</option>
                              <option  value ="6">60%</option>
                              <option  value ="7">70%</option>
                              <option  value ="8">80%</option>
                              <option  value ="9">90%</option>
                              <option  value ="10">100%</option>
                          </select>
                          <button type="submit" class="btn btn-primary pull-right">Aplicar</button> 
                      </form>
                      </div> <!--modifVelocidad--
                 </div> <!--bigstats container-->
              </div><!--widgetcontent-->
          </div> <!-- /widget -->
          </div>
          <!-- /widget nopad --> 
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