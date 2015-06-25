<?php
/**
 * Classe para converter fuso horário
 */
class Lab2
{
	/**
	 * Metodo para processar informacoes
	 * 
	 * @param string $fuso
	 * 
	 * @return array
	 */	
	public function converterHorario( $fuso )
	{
		// Modelo de array que deverá ser retornado
		$retorno = array( 'horario_brasil'   => null,
						  'fuso_escolhido'   => null,
		                  'horario'          => null, );
		
		# Capitulo 1 - Laboratorio 2
		
		$timezone_brasil = new DateTimeZone('America/Sao_Paulo');
				
		$horario  = new DateTime();
		$horario->setTimezone( $timezone_brasil );
		
		$retorno['horario_brasil'] = $horario->format('d/m/Y H:i:s');
		
		# Criando objeto com o fuso escolhi no formulario
		$timezone_escolhido = new DateTimeZone( $fuso );
		
		$retorno['fuso_escolhido'] = $fuso;
		
		# Alterando timezone do horário
		$horario->setTimezone( $timezone_escolhido );

		$retorno['horario'] = $horario->format('d/m/Y H:i:s');
		
		// Retorno do array
		return $retorno;
	}
}


// Verifica se formulario foi postado
if( $_POST ) {

	$obj_Lab2 = new Lab2();
	
	$resultado = $obj_Lab2->converterHorario( $_POST['fuso'] );
	
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<title>Capítulo 1 - Laboratório 2</title>
	</head>
	<body>	
		<form action="" method="post" >
		<table cellpadding="5" border="1">
			<tr><th>Fuso :</th>
				<td><select name="fuso" >
						<option value="America/Argentina/Buenos_Aires">Buenos Aires (Argentina)</option>
						<option value="America/New_York">Nova York (EUA)</option>
						<option value="Asia/Jakarta">Jakarta</option>
						<option value="Africa/Johannesburg">Johannesburg (Africa)</option>
						<option value="Asia/Shanghai">Shanghai (China)</option>
					</select></td>
			</tr>
			<tr><th> </th>
				<td><input type="submit" value="Converter" /></td>
			</tr>			
		</table>
		</form>
		
		<!--  exibindo resultado -->
		<?php 
		if( isset( $resultado ) ):
		?>	
			<hr>
			<h4>Resultado</h4>
			<table cellpadding="5" border="1">
				<tr><th>Horario (BR) :</th>
					<td><?php echo $resultado['horario_brasil']?></td>
				</tr>
				<tr><th>Fuso :</th>
					<td><?php echo $resultado['fuso_escolhido']?></td>
				</tr>
				<tr><th>Horario:</th>
					<td><?php echo $resultado['horario']?></td>
				</tr>
			</table>
		<?php 
		endif;
		?>
	</body>
</html>
