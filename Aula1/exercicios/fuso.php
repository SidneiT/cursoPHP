<form action="" method="post">
	<table>
		<tr>
			<th>Fuso</th>
			<td>
				<select name="fuso">
					<option value="America/New_York">Nova Iorque</option>
					<option value="America/Sao_Paulo">Sao Paulo</option>
					<option value="America/Vancouver">Vancouver</option>
					<option value="Antarctica/South_Pole">Polo Sul</option>
					<option value="Brazil/Acre">Acre</option>					
				</select>
			</td>
		</tr>		
		<tr>
			<th>&nbsp;</th>
			<td><input type="submit" value="Converter"></td>
		</tr>
	</table>
</form>

<?php

	if($_POST):

	$fuso = new DateTimeZone($_POST['fuso']);
	
	$date = new DateTime();
	
	$data_br = $date->format("d/m/Y H:i:s");	
	
	$date->setTimezone($fuso);
	
	$data_fuso = $date->format("d/m/Y H:i:s");
	
	
 ?>
 <table>
		<tr>
			<th>Horaio (BR):</th>
			<td>
				<?php echo $data_br?>
			</td>
		</tr>		
		<tr>
			<th>Fuso:</th>
			<td><?php echo $_POST['fuso']?></td>
		</tr>
		<tr>
			<th>Horario:</th>
			<td><?php echo $data_fuso?></td>
		</tr>
	</table>
 <?php endif;
 
 	$local = explode("/", $_POST["fuso"]);
 	
 	$dia = $date->format("d");
 	
 	$mes = $date->format("m");
 	
 	$ano = $date->format("Y");
 	
 	$horas = $date->format("H\h \e i\m");
 	
 	echo "La na $local[0] precisamente em $local[1] sao $horas do dia $dia de $mes de $ano";
 ?>
