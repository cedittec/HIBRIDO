<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cambio de contraseña - Híbrido</title>

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
  if(isset($_POST['pass']))
  {
    include 'connectionTools.php';
    
    $query = "select id, password, display_name, email, tipo from (SELECT id, password, display_name, email, 'usuario' as tipo from usuario UNION select id, password, display_name, email, 'cliente' as tipo from cliente) as mitabla where email = '".$_POST['correo']."';";
    
    $array = mysqli_fetch_array(mysqli_query($link, $query), MYSQL_BOTH);
    $nombre= $array['display_name'];
    $pass= $array['password'];
    $userID= $array['id'];  
    $tipo= $array['tipo'];

    if($pass != md5($_POST['pass'])) { echo "<script>alert('Contraseña incorrecta');</script>";}
    else //pass correcto
    {
      if($_POST['passNueva'] == $_POST['passNueva2'])
      {
            $valido = (

                strlen($_POST['passNueva']) < 31 && strlen($_POST['passNueva']) > 9 &&      //longitud
                preg_match("#[0-9]+#", $_POST['passNueva']) &&                              //numeroa
                preg_match("#[a-z]+#", $_POST['passNueva']) &&                              //minus
                preg_match("#[A-Z]+#", $_POST['passNueva']) &&                              //mayus
                preg_match("#\W+#", $pwd)                                                   //simbolo
                );

        if($valido)
        {
            $query = "update ".$tipo." set password = '".md5($_POST['passNueva'])."' where email = '".$_POST['correo']."'";
            //echo "|".$query."|";
            mysqli_query($link, $query);

            //echo "<script>alert('".$_POST['passNueva']."');</script>";
      
              include 'mailer/mailSender.php';
              sendMail(   
                  "energia@emsmx.com", "energiaems",
                  $_POST['correo'],
                  "Híbrido - Cambio de contraseña",
                  "Contraseña: ".$_POST['passNueva']
              ); // user, pass, to, subject, msg.
      
            echo "<meta http-equiv='refresh' content='0;url=logout.php'>";
        }
        else
            echo "<script>alert('Las contraseñas deben de tener longitud de entre 10 y 30 e incluir a lo menos una letra minúscula, una letra mayúscula, un número y un carácter especial.');</script>";
      }
      else
        echo "<script>alert('Las contraseñas deben ser iguales');</script>";
    }
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
                <input type = 'password' name = 'pass' placeholder = 'Contraseña Actual'><br>
                <input type = 'password' name = 'passNueva' placeholder = 'Contraseña Nueva'><br>
                <input type = 'password' name = 'passNueva2' placeholder = 'Repetir Contraseña'><br><br>
                <input type = 'submit' value = 'Cambiar'>
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