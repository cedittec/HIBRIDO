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

<?php include 'head.php'; ?>

<div class="main">
  <div class="main-inner">
    <div class="container">
    <div class="row">	      	
	      	<div class="span12">  
                <div class="info-box">
                   <div class="row-fluid stats-box" style="margin:15px">                 
                      <div class="span12">
                        <div class="stats-box-all-info">Alarma de temperatura</div>
                        <div class="stats-box-all-info" style="margin:0px">
                          <?php
                            if($high < 75)
                            {
                              echo '
                                <i class="icon-thumbs-up" style="color:#09F;"> </i> &lt; '.round($high, 2).'°C
                              ';
                            }
                            else
                            {
                              echo '
                                <i class="icon-thumbs-down" style="color: #D10000;"></i> &gt; '.round($high, 2).'°C
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
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Temperatura de los sistemas fotovoltaicos</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <div id="big_stats" class="cf">
                    <div class="stat"> <i style="font-size:24px">Fotovoltaico 1</i><div class="alert-success"> (0-75°C) </div><span class="value"> <?= round($lastData['sf_temp_panel1'], 2) ?>°C</span> </div>
                    <div class="stat"> <i style="font-size:24px">Fotovoltaico 2</i> <div class="alert-success"> (0-75°C) </div><span class="value"> <?= round($lastData['sf_temp_panel2'], 2) ?>°C</span> </div>
                    <div class="stat"> <i style="font-size:24px">Fotovoltaico 3</i> <div class="alert-success"> (0-75°C) </div><span class="value"> <?= round($lastData['sf_temp_panel3'], 2) ?>°C</span> </div>                   
                    <div class="stat"> <i style="font-size:24px">Fotovoltaico 4</i> <div class="alert-success"> (0-75°C) </div><span class="value"> <?= round($lastData['sf_temp_panel4'], 2) ?>°C</span> </div> 
                 </div>
                 <!--
                 <div id="big_stats" class="cf">    
                 	  <div class="stat"> <i style="font-size:24px">Fotovoltaico 5</i> <div class="alert-success"> (0-75°C) </div><span class="value"> <?= $lastData['sf_temp_panel5'] ?>°C</span> </div>              
                    <div class="stat"> <i style="font-size:24px">Fotovoltaico 6</i> <div class="alert-success"> (0-75°C) </div><span class="value"> <?= $lastData['sf_temp_panel6'] ?>°C</span> </div>                   
                    <div class="stat"> <i style="font-size:24px">Fotovoltaico 7</i> <div class="alert-success"> (0-75°C) </div><span class="value"> <?= $lastData['sf_temp_panel7'] ?>°C</span> </div>                   
                    <div class="stat"> <i style="font-size:24px">Fotovoltaico 8</i> <div class="alert-success"> (0-75°C) </div><span class="value"> <?= $lastData['sf_temp_panel8'] ?>°C</span> </div>                  
                  </div>
                  <div id="big_stats" class="cf">                                   
                    <div class="stat"> <i style="font-size:24px">Fotovoltaico 9</i> <div class="alert-success"> (0-75°C) </div><span class="value"> <?= $lastData['sf_temp_panel9'] ?>°C</span> </div>               
                    <div class="stat"> <i style="font-size:24px">Fotovoltaico 10</i> <div class="alert-success"> (0-75°C) </div><span class="value"> <?= $lastData['sf_temp_panel10'] ?>°C</span> </div>
                  </div>
                  -->
                </div>
              <!-- /widget-content -->   
              </div>
            </div>
          </div>
          </div>
    </div>   
    <div class="row">
        	
             <div class="span6">
             	<div class="widget">
                    <div class="widget-header"> 
                    	<i class="icon-globe"></i>
                        <h3> Condiciones ambientales</h3>
                    </div><!-- /widget-header -->
                    <div class="widget-content">
                        <center>

                          <?php
                              if($high < 50)
                              {
                                ?>
                                  <img src="img/TemperaturaPanel1.png" style="width: 79%; height: auto;">
                                <?php
                              }
                              if($high >= 50 && $high < 75)
                              {
                                ?>
                                  <img src="img/TemperaturaPanel2.png" style="width: 79%; height: auto;">
                                <?php
                              }
                              if($high >= 75 && $high < 100)
                              {
                                ?>
                                  <img src="img/TemperaturaPanel3.png" style="width: 79%; height: auto;">
                                <?php
                              }
                              if($high >= 100)
                              {
                                ?>
                                  <img src="img/TemperaturaPanel4.png" style="width: 79%; height: auto;">
                                <?php
                              }
                          ?>
                        </center>
                        <div class="widget big-stats-container" >
                        	<div class="widget-content" align = "center">
                            	<div id="big_stats" class="cf" style="margin:0px">
                                	<div class="stat"> 
                                                  <table width = "100%">
                                                      <tr>
                                                          <td align = "right" width = "30%">
                                                              <i class="icon-fire"></i>
                                                          </td>
                                                          <td align = "left">
                                                              <i style="font-size:24px">&nbsp;&nbsp;Temperatura del panel</i>
                                                          </td>
                                                      </tr>
                                                  </table>
                                      <span class="value"><?= round($high, 2) ?>°C</span> 
                                  </div><!-- .stat -->
                                </div>
                            </div><!-- /widget-content Min --> 
                        </div><!-- /widget big-stats-container --> 
                   </div><!-- /widget-content --> 
                   
                </div>
             </div><!--span6-->
             <div class="span6">
             <div class="widget widget-nopad">
                	<div class="widget-header"> 
                    	<i class="icon-list-alt"></i>
                        <h3> Condiciones ambientales</h3>
                  </div><!-- /widget-header -->
                  <div class="widget-content">
                    	<div class="widget big-stats-container">
                        	<div class="widget-content">
                            	<div id="big_stats" class="cf">
                                    <div class="stat">
                                                  <table width = "100%">
                                                      <tr>
                                                          <td align = "right" width = "40%">
                                                              <i class="icon-certificate"></i>
                                                          </td>
                                                          <td align = "left">
                                                              <i style="font-size:24px">&nbsp;&nbsp;Radiación</i>
                                                          </td>
                                                      </tr>
                                                  </table>
                                        <span class="value"><?= round($lastData['sf_radiacion_solar'], 2) ?> Watt/m^2</span> 
                                    </div><!-- .stat -->
                                </div>
                            </div><!-- /widget-content Min --> 
                        </div><!-- /widget big-stats-container --> 
                  </div><!-- /widget-content --> 
               </div><!-- /widget notepad Max --> 
             	<div class="widget">
                	<div class="widget-header"> 
                    	<i class="icon-signal"></i>
                        <h3> Potencia generada (Watt) <?php echo "(". substr($lastData['date_created'],0,strlen($lastData['date_created'])-9) .")"; ?> </h3>
                    </div><!-- /widget-header -->
                    <div class="widget-content">
                    	<canvas id="area2-chart" class="chart-holder" height="290" width="538"> </canvas><!-- /area-chart --> 
                    </div><!-- /widget-content --> 
                </div>
             </div><!--span6-->
             <div class="span12">
             	<div class="widget widget-nopad">
                	<div class="widget-header"> 
                    	<i class="icon-list-alt"></i>
                        <h3> Generación eléctrica</h3>
                    </div><!-- /widget-header -->
                    <div class="widget-content">
                    	<div class="widget big-stats-container">
                        	<div class="widget-content">
                            	<div id="big_stats" class="cf">
                                	<div class="stat"> 
                                                  <table width = "100%">
                                                      <tr>
                                                          <td align = "right" width = "42%">
                                                              <i class="icon-fire"></i>
                                                          </td>
                                                          <td align = "left">
                                                              <i style="font-size:24px">&nbsp;&nbsp;Potencia generada</i>
                                                          </td>
                                                      </tr>
                                                  </table>
                                        <span class="value"><?=  round($lastData['sf_icd_fotovoltaico']*$lastData['sf_vcd_fotovoltaico'], 2) ?> Watt</span> 
                                    </div><!-- .stat -->
                                    <!--
                                    <div class="stat"> 
                                    	<i class="icon-certificate">Energía térmica //falta esta</i> 
                                        <span class="value"><?= $lastData['']?> BTU/kWt</span> 
                                    </div><!-- .stat -->
                                </div>
                            </div><!-- /widget-content Min --> 
                        </div><!-- /widget big-stats-container --> 
                   </div><!-- /widget-content --> 
               </div><!-- /widget notepad Max --> 
             </div> <!--span12-->
             <div class="span6">
             	<div class="widget widget-nopad">
                	<div class="widget-header"> 
                    	<i class="icon-list-alt"></i>
                        <h3> Generación eléctrica: Voltaje</h3>
                    </div><!-- /widget-header -->
                    <div class="widget-content">
                    	<div class="widget big-stats-container">
                        	<div class="widget-content">
                            	<div id="big_stats" class="cf">
                                	<div class="stat"> 
                                                  <table width = "100%">
                                                      <tr>
                                                          <td align = "right" width = "42%">
                                                              <i class="icon-fire"></i>
                                                          </td>
                                                          <td align = "left">
                                                              <i style="font-size:24px">&nbsp;&nbsp;Vdc</i>
                                                          </td>
                                                      </tr>
                                                  </table>
                                        <span class="value"><?= round($lastData['sf_vac_inversor'], 2) ?> V</span> 
                                    </div><!-- .stat -->
                                    <div class="stat"> 
                                                  <table width = "100%">
                                                      <tr>
                                                          <td align = "right" width = "42%">
                                                              <i class="icon-fire"></i>
                                                          </td>
                                                          <td align = "left">
                                                              <i style="font-size:24px">&nbsp;&nbsp;Vac</i>
                                                          </td>
                                                      </tr>
                                                  </table>
                                        <span class="value"><?= round($lastData['sf_vcd_fotovoltaico'], 2) ?> V</span> 
                                    </div><!-- .stat -->
                                </div>
                            </div><!-- /widget-content Min --> 
                        </div><!-- /widget big-stats-container --> 
                   </div><!-- /widget-content --> 
               </div><!-- /widget notepad Max --> 
             </div> <!--span6-->
             <div class="span6">
             	<div class="widget widget-nopad">
                	<div class="widget-header"> 
                    	<i class="icon-list-alt"></i>
                        <h3> Generación eléctrica: Corriente</h3>
                    </div><!-- /widget-header -->
                    <div class="widget-content">
                    	<div class="widget big-stats-container">
                        	<div class="widget-content">
                            	<div id="big_stats" class="cf">
                                	<div class="stat"> 
                                                  <table width = "100%">
                                                      <tr>
                                                          <td align = "right" width = "42%">
                                                              <i class="icon-fire"></i>
                                                          </td>
                                                          <td align = "left">
                                                              <i style="font-size:24px">&nbsp;&nbsp;Idc</i>
                                                          </td>
                                                      </tr>
                                                  </table>         
                                        <span class="value"><?= round($lastData['sf_iac_inversor'], 2) ?> A</span> 
                                    </div><!-- .stat -->
                                    <div class="stat"> 
                                                  <table width = "100%">
                                                      <tr>
                                                          <td align = "right" width = "42%">
                                                              <i class="icon-fire"></i>
                                                          </td>
                                                          <td align = "left">
                                                              <i style="font-size:24px">&nbsp;&nbsp;Iac</i>
                                                          </td>
                                                      </tr>
                                                  </table>   
                                        <span class="value"><?= round($lastData['sf_icd_fotovoltaico'], 2) ?> A</span> 
                                    </div><!-- .stat -->
                                </div>
                            </div><!-- /widget-content Min --> 
                        </div><!-- /widget big-stats-container --> 
                   </div><!-- /widget-content --> 
               </div><!-- /widget notepad Max --> 
             </div> <!--span6-->
             <div class="span6">
             	<div class="widget widget-nopad">
                	<div class="widget-header"> 
                    	<i class="icon-list-alt"></i>
                        <h3> Generación térmica: Temperatura del agua</h3>
                    </div><!-- /widget-header -->
                    <div class="widget-content">
                    	<div class="widget big-stats-container">
                        	<div class="widget-content">
                            	<div id="big_stats" class="cf">
                                	<div class="stat"> 
                                    	<i >Entrada</i> 
                                        <span class="value"> <?= round($lastData['se_temp_entrada_agua'], 2) ?> °C</span> 
                                    </div><!-- .stat -->
                                    <div class="stat"> 
                                    	<i>Salida </i> 
                                        <span class="value"> <?= round($lastData['se_temp_salida_agua'], 2) ?> °C</span> 
                                        
                                    </div><!-- .stat -->
                                </div>
                            </div><!-- /widget-content Min --> 
                        </div><!-- /widget big-stats-container --> 
                   </div><!-- /widget-content --> 
               </div><!-- /widget notepad Max --> 
               <div class="widget widget-nopad">
                	<div class="widget-header"> 
                    	<i class="icon-list-alt"></i>
                        <h3> Generación térmica: Cambio de temperatura</h3>
                    </div><!-- /widget-header -->
                    <div class="widget-content">
                    	<div class="widget big-stats-container">
                        	<div class="widget-content" style="height:80px">
                            	<div id="big_stats" class="cf" >
                                	<div class="stat"> 
                                        <span class="value"> <?= round($lastData['se_temp_salida_agua']-$lastData['se_temp_entrada_agua'], 2) ?> °C</span> 
                                    </div><!-- .stat -->
                                </div>
                            </div><!-- /widget-content Min --> 
                        </div><!-- /widget big-stats-container --> 
                   </div><!-- /widget-content --> 
               </div><!-- /widget notepad Max --> 
             </div><!--span6-->
             <div class="span6">
             	<div class="widget">
                	<div class="widget-header"> 
                    	<i class="icon-signal"></i>
                        <h3> Temperatura del agua (°C) <?php echo "(". substr($lastData['date_created'],0,strlen($lastData['date_created'])-9) .")"; ?> </h3>
                    </div><!-- /widget-header -->
                    <div class="widget-content" style="height:280px">
                    	<canvas id="area3-chart" class="chart-holder" height="270" width="538"> </canvas><!-- /area-chart --> 
                    </div><!-- /widget-content --> 
                </div>
             </div><!--span6-->
    </div><!-- /row --> 
     
    </div><!-- /container --> 
  </div><!-- /main-inner --> 
</div><!-- /main -->

<?php include 'foot.php'; ?>

<script>
  var nombre = [];
  var potencia = [];
  var tEntrada = [];
  var tSalida = [];

  <?php
    for ($i = count($nombres)-1; $i>=0; $i--)
      echo  
        "\n".
            "nombre.push('".$nombres[$i]."'); ".
            "potencia.push(".$potencias[$i]."); ".
            "tEntrada.push(".$tempEntrada[$i]."); ".
            "tSalida.push(".$tempSalida[$i]."); ";
  ?>
     
  var myLine = new Chart(document.getElementById("area2-chart").getContext("2d")).Line(
  {
      labels: nombre, 
      datasets:
      [{
          fillColor: "rgba(187,151,205,0.5)",
          strokeColor: "rgba(187,151,205,0.5)",
          pointColor: "rgba(187,151,205,0.5)",
          pointStrokeColor: "#fff",
          data: potencia
      }]
  });

  var myLine = new Chart(document.getElementById("area3-chart").getContext("2d")).Line(
  {
      labels: nombre, 
      datasets: 
      [{
          fillColor: "rgba(117,181,105,0.5)",
          strokeColor: "rgba(117,181,105,0.5)",
          pointColor: "rgba(117,181,105,0.5)",
          pointStrokeColor: "#fff",
          data: tEntrada
      }, 
      {
          fillColor: "rgba(205,117,205,0.5)",
          strokeColor: "rgba(205,117,205,0.5)",
          pointColor: "rgba(205,117,205,0.5)",
          pointStrokeColor: "#fff",
          data: tSalida
      }]
  });
  </script>  
</body>
</html>
