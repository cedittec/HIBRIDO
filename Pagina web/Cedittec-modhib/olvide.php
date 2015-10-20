<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Olvidé mi contraseña - Híbrido</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <link href="css/pages/dashboard.css" rel="stylesheet">
</head>

<body>
  <div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="brand" href="index.php"><img src="img/logo.png"> &nbsp&nbsp&nbsp&nbsp&nbsp Módulo de energía solar híbrido </a>
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>

<?php
  if(isset($_POST['correo']))
  {
    include 'connectionTools.php';
    
    $query = ";";
    
    //$array = mysqli_fetch_array(mysqli_query($link, $query), MYSQL_BOTH);
    

    include 'mailer/mailSender.php';
    sendMail(   
        "energia@emsmx.com", "energiaems",
        $_POST['correo'],
        "Híbrido - Cambio de contraseña",
        "Contraseña: ".$_POST['passNueva']
    ); // user, pass, to, subject, msg.
  }
?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      
        <div class="span4" align ='center'>
          <br><br><br><br><br><br><br><br>

          <img src = 'img/logo.png' style="background-color:gray;" width = 122 height = 86>
        </div>

        <div class="span6" align = 'center'>
        
          <br><br><br><br><br><br><br>

          <form action = '' method = 'post'>
            <input type = 'text' name = 'correo' placeholder = 'Correo'><br>
            <input type = 'submit' value = 'Generar contraseña y enviar correo'>
          </form>

          <br><br><br><br><br><br><br>

        </div>
      
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