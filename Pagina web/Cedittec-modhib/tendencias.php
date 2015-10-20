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

<script src="js/jquery-1.7.2.min.js"></script> 
<script src="js/excanvas.min.js"></script> 
<script src="js/chart/Chart.js" type="text/javascript"></script> 
<script src="js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="js/full-calendar/fullcalendar.min.js"></script>

<div class="main">
  <div class="main-inner">
    <div class="container">

<!--Formulario-->
      <div class="row">
      <br><br>
          <div class="span12">
            <div class="widget">
              <div class="widget-content">  
                      <?php
                        $fechaInicio =  (isset($_POST['n'])?    $_POST['fechaInicio']   : date("Y-m-d", time() - 3600));
                        $horaInicio =   (isset($_POST['n'])?    $_POST['horaInicio']    : date("H:i:s", time() - 3600));
                        $fechaFin =     (isset($_POST['n'])?    $_POST['fechaFin']      : date("Y-m-d"));
                        $horaFin =      (isset($_POST['n'])?    $_POST['horaFin']       : date("H:i:s"));
                      ?>
                      <form id ="my_form" action = "" method = "post">
                          <div class="span3">
                                Fecha Inicio:<br>
                                <input name = "fechaInicio" type = "date" value = <?php echo "'".$fechaInicio."'"; ?> required/><br>
                                <input name = "horaInicio" type = "time" value = <?php echo "'".$horaInicio."'"; ?> required/>
                          </div><div class="span3">
                                Fecha Fin:<br>
                                <input name = "fechaFin" type = "date" value = <?php echo "'".$fechaFin."'"; ?> required/><br>
                                <input name = "horaFin" type = "time" value = <?php echo "'".$horaFin."'"; ?> required/>
                          </div><div class="span3">
                                Numero de muestras y modo:<br>
                                <select name = "n">
                                <?php
                                for($i = 500; $i <= 1000; $i+=100)
                                  echo "<option value='$i' ".($i == $_POST['n'] ?"selected":"").">$i</option>"
                                ?>
                                </select><br>
                                <select name = "ver" value = "1">
                                  <option value = "0" <?php if($_POST['ver'] == 0) echo "selected";?> >De Impresión (c/fechas)</option>
                                  <option value = "1" <?php if($_POST['ver'] == 1) echo "selected";?> >Interactivo (s/fechas)</option>
                                </select>
                          </div><div class="span2"><br><br>
                                <input type = "submit" value = "Cargar Gráfica">
                          </div>
                      </form>  
              </div>
            </div>
          </div>
        </div>
<!--/Formulario-->

<?php
//<PARAMETROS>
    $start = date('Y-m-d H:i:s', time()-3600);
    $end = date('Y-m-d H:i:s');
    $n = 500;
    $jumper = 1;
    $mode = 0;
    if (isset($_POST['n']))
    {
        $start = str_replace("/", "-", $_POST['fechaInicio'])." ". substr($_POST['horaInicio'],0,8);
        $end =  str_replace("/", "-", $_POST['fechaFin'])." ". substr($_POST['horaFin'],0,8);
    }    
    include 'connectionTools.php';

    $query = "SELECT count(*) as n from hibrido_solar where modulo_id = ".$_SESSION['modulo']." and date_created < '$end' and date_created > '$start';";
    echo "<!-- $query -->";
    if (!$row = mysqli_fetch_array(mysqli_query($link,  $query)))
        echo "<script>alert('Elige un módulo.');</script>";
    if (isset($_POST['n']))
    {
        $n = min($_POST['n'], $row['n']);
        $mode = $_POST['ver'];
    }
    $n = min($n, $row['n']);
    $jumper = $row['n']/$n;
    $residuo = $row['n']%$n;
    echo "<!--Parámetros definidos. residuo: $residuo. n: $n. start: $start. end: $end. mode: $mode. rows: ".$row['n'].". jumper: $jumper -->";
//</PARAMETROS>

    function newCol($grafica, $columna, $nombre, $color, $hex) 
    {
      $GLOBALS['columna'][$grafica][] = $columna;
      $GLOBALS['nombre'][$grafica][$columna] = $nombre;
      $GLOBALS['color'][$grafica][$columna] = $color;
      $GLOBALS['hex'][$grafica][$columna] = $hex;
    }
  
    $columna = null;
    $nombre = null;
    $color = null;
    $hex = null;
    $datasets = null;
    
    $titulo[1] = "Temperatura (°C)";
        newCol(1, 'sf_temp_panel1', 'Sensor panel 1', 'rgba(255,0,0,0.6)', "ff0000");
        newCol(1, 'sf_temp_panel2', 'Sensor panel 2', 'rgba(0,255,0,0.6)', "00ff00");
        newCol(1, 'sf_temp_panel3', 'Sensor panel 3', 'rgba(0,0,255,0.6)', "0000ff");
        newCol(1, 'sf_temp_panel4', 'Sensor panel 4', 'rgba(255,127,0,0.6)', "ff8800");
        newCol(1, 'se_temp_tablero_electrico', 'Sensor gabinete', 'rgba(127,0,0,0.6)', "880000");
        newCol(1, 'se_temp_entrada_agua', 'Sensor entrada de agua', 'rgba(0,127,0,0.6)', "008800");
        newCol(1, 'se_temp_salida_agua', 'Sensor salida de agua', 'rgba(0,0,0,0.6)', "000000");
        newCol(1, 'tanque_temperatura', 'Sensor tanque', 'rgba(127,127,63,0.6)', "888844");
    $titulo[2] = "Voltajes DC";
        newCol(2, 'sc_voltaje_control_bomba', 'Voltaje en bomba', 'rgba(255,0,0,0.6)', "ff0000");
        newCol(2, 'sf_vcd_fotovoltaico', 'Voltaje de fotovoltaico', 'rgba(0,255,0,0.6)', "00ff00");
    $titulo[3] = "Corrientes DC";
        newCol(3, 'sf_icd_fotovoltaico', 'Corriente fotovoltaico', 'rgba(255,0,0,0.6)', "ff0000");
    $titulo[4] = "Voltajes AC";
        newCol(4, 'sf_vac_inversor', 'Voltaje del inversor', 'rgba(255,0,0,0.6)', "ff0000");
    $titulo[5] = "Corrientes AC";
        newCol(5, 'sf_iac_inversor', 'Corriente del inversor', 'rgba(255,0,0,0.6)', "ff0000");

//DECLARACIºON DE ARREGOS EN JS
    echo "<script>";
    echo "var date_created = [];";
    foreach ($columna as $columnaX)
      foreach ($columnaX as $key)
        echo "var $key = [];";
    echo "</script>";

//Esta variable está re-definida en el Graph.js. Define cuantos se dibujarían; por ahora es necesaria para evitar que se pusheen los labels en el arreglo y se dibujen (pequeño).
  if ($mode == 1) echo "<script>var dibujante = 10;</script>";

//PUSHEO A CADA UNO DE LOS ARREGLOS
  if(!$rs = mysqli_query($link, "SET @row=0;"))
    echo "<script>alert('Error query 1.5');</script>".mysqli_error($link)."|".$query;
  
  if($rs = mysqli_query($link, "SELECT * from (SELECT *, @row := @row +1 AS num FROM hibrido_solar where modulo_id = 1 and date_created < '$end' and date_created > '$start') as mytable where not MOD(num - $residuo, ".floor($jumper).");"))
  {
      $cnt = 0; // para saber si imprimir fecha en este jump o no
      while($row = mysqli_fetch_array($rs))
      {
          $cnt++;
          echo "\n<script>";
              if ($mode == 0)
                  echo "\ndate_created.push('".($cnt%floor($n/10) == 0 ? substr($row['date_created'],5,8)."h" : "" ). "');";    
              else
                  echo "\ndate_created.push('".$row['date_created'] ."');";   
              
              foreach ($columna as $columnaX)
                foreach ($columnaX as $key)
                  echo "\n$key.push(".$row[$key].");";   

          echo "\n</script>";
      }
  } else echo "<script>alert('Error query 2 ".mysqli_error($link)."|".$query."');</script>";

//DETERMINACIÓN DE ARREGLO DE GRAFICAS A SER IMPRESAS EN JS
    for($i = 1; $i<=5; $i++)
    {
      foreach ($columna[$i] as $key)
      {  
        $mostrar[$i][$key] = isset($_POST[$key]) || !isset($_POST['n']);
        
        if($mostrar[$i][$key])
          $datasets[$i][] = " {
                        fillColor: '".$color[$i][$key].";', 
                        strokeColor: '".$color[$i][$key].";', 
                        pointColor: '".$color[$i][$key].";', 
                        pointStrokeColor: '#fff',
                        data: ".$key."
                      }, {}";
      }
    }  
?>

<script>
    window.onload = function()
    {
      <?php
        for($i=1; $i<=5; $i++)
        {
          echo "
            new Chart(document.getElementById('grafica$i').getContext('2d')).Line
            (
              {
                labels: date_created, 
                datasets: [ ".implode(',', $datasets[$i])."]
              }, 
              {
                ".($mode?  'pointDot : false, showScale: false, scaleFontSize: 1':
                                  'pointDot : false, responsive : false, datasetStroke : false, tooltipEvents: []').
                "
              }
            );";
        }
      ?>
    };
</script>  


<?php
    for($i = 1; $i <= 5; $i++)
    {
?>
                <div class="row">
                    <div class="span9">
                        <div class="widget">
                          <div class="widget-header"> 
                              <i class="icon-signal"></i>
                                <h3><?php echo $titulo[$i]; ?></h3>
                          </div>
                          <div class="widget-content">
                              <canvas id= <?php echo "'grafica".$i."'"; ?> class="chart-holder" height="500" width="800"> </canvas>
                          </div>
                        </div>
                    </div><!--Span9-->   
                    <div class="span3">
                        <div class="widget">
                          <div class="widget-header"> 
                              <i class="icon-list-alt"></i>
                              <h3><?php echo $titulo[$i]?></h3>
                          </div>
                          <div class="widget-content">
                            <table width = "100%"><font color = "white">
                              <?php foreach ($columna[$i] as $key) 
                              { 
                              echo
                                  "<tr><td align = 'center' bgcolor= '".$hex[$i][$key]."' >
                                    <input type='checkbox' form='my_form' name = '$key' value = 'yes'".($mostrar[$i][$key]? "checked": "")."/>
                                    <font color = 'white'><b>".$nombre[$i][$key]."</b></font>
                                  </td></tr>";
                              } ?>
                            </font></table>
                          </div>
                        </div>
                    </div><!--Span3-->   
              </div>
<?php
    }
?>
    </div> 
  </div>
</div>

<div class="extra">
  <div class="extra-inner">
    <div class="container">
      <div class="row" align = "center"> CEDITTEC 2015. </div>
    </div>
  </div>
</div>

</body>
</html>
