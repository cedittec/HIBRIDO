<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Login - Híbrido</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
	    
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/pages/signin.css" rel="stylesheet" type="text/css">
</head>



<?php
	//error_reporting( error_reporting() & ~E_NOTICE & ~E_WARNING );
	if($_POST['user']!= "")
	{ // recibe usuario
		$_POST['user'] = strtolower($_POST['user']);
		if (isset($_COOKIE['retry'])){
			if ($_COOKIE['retry']>=4)
				exit();
			else
				$_COOKIE['retry'] =$_COOKIE['retry']+1;
		}
		else
			setcookie("retry", 1, time()+120);
		if ($_POST['recordar'] == 1) //hay cookie
		{
			setcookie("user", $_POST['user'], time()+1800);
			$_COOKIE["user"] = $_POST['user']; 
		}
		else
		{
			setcookie("user", "",-3600);
			$_COOKIE["user"] = "";
		}
		if ( isset($_POST['pass'])) 
		{ 	// recibe pass
			include 'connectionTools.php'; 
			
			$query = "select id, password, display_name, email from (SELECT id, password, display_name, email from usuario UNION select id, password, display_name, email from cliente) as mitabla where email = '".$_POST['user']."';";
			if (!$link)
			{
				 echo "<script>alert('Imposible conectarse con la bd');</script>";
			}
				$array = mysqli_fetch_array(mysqli_query($link, $query), MYSQL_BOTH);
				$nombre= $array['display_name'];	
				$pass= $array['password'];
				$userID= $array['id'];


			if($pass != md5($_POST['pass'])) { echo "<script>alert('Contraseña incorrecta');</script>";}
			else //pass correcto
			{
				session_start();
				$_SESSION['id'] = $userID;	
				$_SESSION['user']=$nombre;
			
				$query = "select display_name, rol_id from usuario_rol, rol where usuario_rol.rol_id = rol.id and usuario_rol.usuario_id = ".$userID.";";
	        	$fila2 = mysqli_fetch_array(mysqli_query($link, $query), MYSQL_BOTH);
				$_SESSION['type'] = $fila2['display_name'];
      			$_SESSION['typeID'] = $fila2['rol_id'];

				$query = "select usuario_id = ".$userID.";";
	        	$fila2 = mysqli_fetch_array(mysqli_query($link, $query), MYSQL_BOTH);
				$_SESSION['sitio'] = $fila2['sitio.display_name'];
				$_SESSION['modulo'] = $fila2['modulo.display_name'];

				header('Location: index.php?elegir=true');
			}
		} 
		else { echo "You must fill in the password";}
	}
?>




<body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				 <a class="brand" href="index.php"><img src="img/logo.png"> &nbsp&nbsp&nbsp&nbsp&nbsp Módulo de energía solar híbrido </a>		
			</div> <!-- /container -->
		</div> <!-- /navbar-inner -->
	</div> <!-- /navbar -->

	<div class="account-container">
		<div class="content clearfix">
				<form action= <?= "'".basename($_SERVER['SCRIPT_NAME'])."'" ?> method="post">
						<h1>Inicio de sesión</h1>	
						<hr><br>
						<div class="login-fields">
							<p>Ingrese sus datos</p>
								<div class="field"> <label for="username">Nombre de usuario:</label>
									<input type="text" id = "username" name="user" value="" placeholder="Nombre de usuario" class="login username-field">
								</div>
								<div class="field"> <label for="password">Contraseña:</label>
									<input type="password" id = "password" name="pass" value="" placeholder="Contraseña" class="login password-field">
								</div>
						</div> <!-- /login-fields -->
						
						<div class="login-actions">
							<br><hr>
								<table width = "100%">
									<tr>
										<td align = "center" style = "vertical-align:top;"><input type="submit" value="Iniciar Sesión"></td> 
										<!-- 
										<td align = "center" style = "vertical-align:top;"><a href="cambio.php">Cambiar contraseña</a></td>
										-->
									</tr>
									<tr>
										<!-- 
										<td colspan = "2" align = "center"><a href = "olvide.php">Olvidé mi contraseña</></td> 
										-->
									</tr>
								</table>
						</div> <!-- .actions -->
				</form>
		</div> <!-- /content -->
	</div> <!-- /account-container -->

	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/signin.js"></script>
</body>

</html>
