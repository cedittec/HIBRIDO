<?php
//Datos para EMS

	$db_url = "74.124.24.8";
	$db_user = "emsdid";
	$db_pass = "1nn0v4c10n";
	$db_name = "hibrido";
	$db_port = "1091";

/*
	$db_url = "localhost";
	$db_user = "root";
	$db_pass = "uZ_5vMPWmr.z";
	$db_name = "hibrido";
	$db_port = "3307";
*/	

	if(true) //  $_GET['pass']  
	{
	    // Esta linea hace la conexión con la base de datos, es (ip, usuario, contraseña, base de datos, puerto).
		//Cambiar variables en caso de que sea necesario.
		$conexion = mysqli_connect($db_url,$db_user,$db_pass,$db_name, $db_port);

		$date = date('Y-m-d H-i-s');
	    // Prepare the SQL statement
	    $SQL = "INSERT INTO hibrido_solar (version,date_created,last_updated,modulo_id,sc_estado_bomba,sc_estado_raspberry_sissa,sc_estado_sissa_rasp_berry,
		sc_estado_ventilador_tablero,se_bomba_modo,ss_movimiento_brazo,sssissateclado,tanque_estado_valvula_agua_caliente,tanque_estado_valvula_agua_fria,tanque_nivel,
		paro_emergencia,
		sc_presion_salida_bomba,sc_voltaje_control_bomba,se_flujo_tuberia,
		se_temp_entrada_agua,se_temp_salida_agua,se_temp_tablero_electrico,se_velocidad_bomba,
		sf_iac_inversor,sf_icd_fotovoltaico,sf_radiacion_solar,sf_temp_panel1,sf_temp_panel2,sf_temp_panel3,sf_temp_panel4,sf_temp_panel5,sf_temp_panel6,
		sf_temp_panel7,sf_temp_panel8,sf_temp_panel9,sf_temp_panel10,sf_vac_inversor,sf_vcd_fotovoltaico,tanque_presion,
		tanque_temperatura)
		
		values (0,'{$date}','{$date}',1,'{$_GET["estado_bomba"]}','{$_GET["estado_raspberry_sissa"]}','{$_GET["estado_sissa_rasp_berry"]}',
		'{$_GET["estado_ventilador_tablero"]}','{$_GET["bomba_modo"]}','{$_GET["movimiento_brazo"]}','{$_GET["sssissateclado"]}',
		'{$_GET["tanque_valvula_agua_caliente"]}','{$_GET["tanque_valvula_agua_fria"]}','{$_GET["tanque_nivel"]}','{$_GET["paro_emergencia"]}',
		'{$_GET["presion_salida_bomba"]}','{$_GET["voltaje_control_bomba"]}','{$_GET["flujo_tuberia"]}','{$_GET["temp_entrada_agua"]}',
		'{$_GET["temp_salida_agua"]}','{$_GET["temp_tablero_electrico"]}','{$_GET["velocidad_bomba"]}','{$_GET["iac_inversor"]}',
		'{$_GET["icd_fotovoltaico"]}','{$_GET["radiacion_solar"]}','{$_GET["temp_panel1"]}','{$_GET["temp_panel2"]}',
		'{$_GET["temp_panel3"]}','{$_GET["temp_panel4"]}','{$_GET["temp_panel5"]}','{$_GET["temp_panel6"]}','{$_GET["temp_panel7"]}','{$_GET["temp_panel8"]}',
		'{$_GET["temp_panel9"]}','{$_GET["temp_panel10"]}','{$_GET["vac_inversor"]}','{$_GET["vcd_fotovoltaico"]}','{$_GET["tanque_presion"]}',
		'{$_GET["tanque_temperatura"]}');";
		
	    // Execute SQL statement
	    mysqli_query($conexion,$SQL);

	    /* cerrar la conexión */
		mysqli_close($conexion);
	 }
?>
