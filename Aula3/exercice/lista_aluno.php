<?php
	
require_once 'Aluno.class.php';

$aluno = new Aluno("alunos.xml");

$lista = $aluno->listaAlunos();

?>

<table border=1>
	<tr>
		<td>Nome</td>
		<td>Email</td>
		<td>Acoes</td>
	</tr>
	<?php foreach($lista as $v):?>
		<tr>
			<td>
				<?php echo $v['nome']?>
			</td>
			<td>
				<?php echo $v['email']?>
			</td>			
			<td>
				<a href="alterar_aluno.php?email=<?php echo $v['email']?>">Deletar</a>
				__			
				<a href="deletar_aluno.php?email=<?php echo $v['email']?>">Deletar</a>
			</td>
		</tr>	
	<?php endforeach;?>
</table>