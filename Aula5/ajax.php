<?php
	
	$pdo = new PDO("pgsql:host=localhost;dbname=brasil", "postgres", "123456");
	
	
	$sql = "SELECT * FROM estados order by nome";
	$estados = $pdo->query($sql);
	
?>

<html>
	<head>
		<title>WsCalc Client</title>
	<script type="text/javascript">
		function selecionaCidades(e){			
			var ajax = new XMLHttpRequest();
			ajax.open('GET', 'checkEmail.php?id=' + e.value,true);
			ajax.send();
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 4 && ajax.status == 200)
				{
					var resposta = JSON.parse(ajax.responseText, 'reviver');
					document.getElementById('cidade').innerHTML = resposta.cidades;
				}
			}
		}
		
	</script>
	</head>
	<body>
		<table>
			<tr>
				<th>Estado</th>
				<td>
					<select name=estado onchange="selecionaCidades(this)">
						<?php foreach ($estados as $uf):?>
						<option value='<?php echo $uf['id']?>'><?php echo $uf['nome']?></option>
						<?php endforeach;?>
					</select>
				</td>
			</tr>
			<tr>
				<th>Cidades</th>
				<td>
					<select name=cidade id=cidade>
					</select>
				</td>				
			</tr>			
		</table>
	</body>	
</html>
