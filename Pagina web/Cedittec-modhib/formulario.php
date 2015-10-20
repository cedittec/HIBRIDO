<html>
<body>

	<div>
		<div>
			<div>
				 <?php
                        if(isset($_POST['n']))
                        {
                          $fechaInicio = $_POST['fechaInicio'];
                          $horaInicio = $_POST['horaInicio'];
                          $fechaFin = $_POST['fechaFin'];
                          $horaFin = $_POST['horaFin'];
                        }
                        else
                        {
                          $fechaInicio = date("Y-m-d", time() - 86400);
                          $horaInicio = date("H:i:s", time() - 86400);
                          $fechaFin = date("Y-m-d");
                          $horaFin = date("H:i:s");
                        }
                      ?>
				  <form id ="myForm" action = "" method = "post" border = 1>
             
                                <input type = "submit" value = "Cargar Gráfica">
                      </form>  
			</div>
		</div>
	</div>

	

	<div>
		<div>
			<div>
				  <table width = "100%"><font color = "white">
                          <tr><td align = "center" bgcolor="red" >
                            <input type="checkbox" form="my_form" name = "sf_temp_panel1" value = "yes"/>
                            <font color = "white"><b>sf_temp_panel1</b></font>
                          </td></tr>
                          <tr><td align = "center"  bgcolor="green">
                            <input type="checkbox" form="my_form" name = "sf_temp_panel2" value = "yes"   <?php if(isset($_POST['sf_temp_panel2'])) echo "checked";?>/>
                            <font color = "white"><b>sf_temp_panel2</b></font>  
                          </td></tr>
                          <tr><td align = "center"  bgcolor="blue">
                            <input type="checkbox" form="my_form" name = "sf_temp_panel3" value = "yes"   <?php if(isset($_POST['sf_temp_panel3'])) echo "checked";?>/>
                            <font color = "white"><b>sf_temp_panel3</b></font>
                          </td></tr>
                          <tr><td align = "center"  bgcolor="yellow">
                            <input type="checkbox" form="my_form" name = "sf_temp_panel4" value = "yes"   <?php if(isset($_POST['sf_temp_panel4'])) echo "checked";?>/>
                            <font color = "white"><b>sf_temp_panel4</b></font>
                          </td></tr>
                          <tr><td align = "center"  bgcolor="#880000">
                            <input type="checkbox" form="my_form" name = "se_temp_tablero_electrico" value = "yes"   <?php if(isset($_POST['se_temp_tablero_electrico'])) echo "checked";?>/>
                            <font color = "white"><b>se_temp_tablero_electrico</b></font>
                          </td></tr>
                          <tr><td align = "center" bgcolor="#008800">
                            <input type="checkbox" form="my_form" name = "se_temp_entrada_agua" value = "yes"   <?php if(isset($_POST['se_temp_entrada_agua'])) echo "checked";?>/>
                            <font color = "white"><b>se_temp_entrada_agua</b></font>
                          </td></tr>
                          <tr><td align = "center"  bgcolor="black">
                            <input type="checkbox" form="my_form" name = "se_temp_salida_agua" value = "yes"   <?php if(isset($_POST['se_temp_salida_agua'])) echo "checked";?>/>
                            <font color = "white"><b>se_temp_salida_agua</b></font>
                          </td></tr>
                          <tr><td align = "center"  bgcolor="#88883F">
                            <input type="checkbox" form="my_form" name = "tanque_temperatura" value = "yes"   <?php if(isset($_POST['tanque_temperatura'])) echo "checked";?>/>
                            <font color = "white"><b>tanque_temperatura</b></font>
                          </td></tr></font>
                        </table>

			</div>
		</div>
	</div>


	<?php		
		if(isset($_POST['sf_temp_panel1']))
			echo "checked";
		else
			echo "unchecked";
	?>
</body>
</html>