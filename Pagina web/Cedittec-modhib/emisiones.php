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
                    
                    <a class="shortcut">
                      <div class="stat"> 
                        <i style="font-size:24px">Emisiones panel</i>
                        <div class="alert-success">  </div>
                        <span class="value"> {variable} {unidades}</span> 
                      </div>
                    </a>
                    <a class="shortcut">
                      <div class="stat"> 
                        <i style="font-size:24px">Reducción de emisiones</i>
                        <span class="value"> {variable} {unidades}</span> 
                      </div>
                    </a>

            </div>
           
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div><!-- /widget -->
        </div>
      
        
       
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 

<br />
<br />
<br />
<br />
<br />

<br />
<br />
<br />
<br />
<br />
</div>
<!-- /main -->
<?php include 'foot.php'; ?>

    
</body>
</html>