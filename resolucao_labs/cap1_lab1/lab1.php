<?php
/**
 * Classe para calculo de horas trabalhadas
 */
class Lab1 
{
	/**
	 * Metodo para calcular horas trabalhadas
	 * 
	 * @param string $hr_entrada
	 * @param string $hr_saida
	 * 
	 * @return array
	 */	
	public function calcular( $hr_entrada, $hr_saida )
	{
		// Modelo de array que deverá ser retornado
		$retorno = array( 'entrada'          => null,
						  'saida'            => null,
		                  'trabalhadas'      => null, );
		
		# Capitulo 1 - Laboratorio 1
		
		// Armazenando os valores no array
		$retorno['entrada'] = $hr_entrada;
		$retorno['saida']	= $hr_saida;
		
		// Definindo objeto DateTime com horario de entrada
		$entrada  = new DateTime( $hr_entrada );
				
		// Definindo objeto DateTime com horario de saida
		$saida    = new DateTime( $hr_saida );
						
		// Calculando horas trabalhadas
		$trabalhadas = $saida->diff( $entrada );		
		
		$retorno['trabalhadas'] = $trabalhadas->format('%H:%I:%S');
		
		// Retorno do array
		return $retorno;
	}
}


// Verifica se formulario foi postado
if( $_POST ) {

	$obj_Lab1 = new Lab1();
	
	$resultado = $obj_Lab1->calcular( $_POST['hr_entrada'], $_POST['hr_saida'] );
	
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<title>Capítulo 1 - Laboratório 1</title>
	</head>
	<body>	
		<form action="" method="post" >
		<table cellpadding="5" border="1">
			<tr><th>Horario Entrada :</th>
				<td><input type="text" name="hr_entrada" /></td>
			</tr>
			<tr><th>Horario Saída :</th>
				<td><input type="text" name="hr_saida" /></td>
			</tr>
			<tr><th> </th>
				<td><input type="submit" value="Calcular" /></td>
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
				<tr><th>Entrada :</th>
					<td><?php echo $resultado['entrada']?></td>
				</tr>
				<tr><th>Saída :</th>
					<td><?php echo $resultado['saida']?></td>
				</tr>
				<tr><th>Horas Trabalhadas:</th>
					<td><?php echo $resultado['trabalhadas']?></td>
				</tr>
			</table>
		<?php 
		endif;
		?>
	</body>
</html>