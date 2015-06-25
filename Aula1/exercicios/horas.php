<form action="" method="post">
	<table>
		<tr>
			<th>Horario Entrada:</th>
			<td><input type="time" name="entrada"></td>
		</tr>
		<tr>
			<th>Horario Saida:</th>
			<td><input type="time" name="saida"></td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<td><input type="submit" value="Salvar"></td>
		</tr>
	</table>
</form>
<?php
	if($_POST):
		
		//hora entrada
		$date1 = new DateTime($_POST['entrada']);
		
		//hora saida				
		$date2 = new DateTime($_POST['saida']);
		
		//calcula diff		
		$intervalo = $date1->diff($date2);

		var_dump($date1);
		
	 
?>
<table>
		<tr>
			<th>Entrada:</th>
			<td><?php echo $_POST['entrada']?></td>
		</tr>
		<tr>
			<th>Saida:</th>
			<td><?php echo $_POST['saida']?></td>
		</tr>
		<tr>
			<th>Horas Trampadas</th>
			<td><?php echo $intervalo->format('%H:%I')?></td>
		</tr>
	</table>

<?php endif;?>