<?php 
use Model\Perfis;
?>
<form class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Funcionários</legend>
    
        <div class="btn-toolbar">
            <a href="admin.php?modulo=Funcionarios&acao=inserir" class="btn"><i class="icon-plus"></i> <strong>Novo Funcionário</strong></a>
        </div>    
    
        <div class="well">
            <?php if ($dados): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Perfil</th>
                        <th>E-mail</th>
                        <th>Senha</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados as $funcionario): ?>
                        <tr>
                            <td><?php echo $funcionario->id; ?></td>
                            <td><?php echo $funcionario->nome; ?></td>
                            <td><?php echo Perfis::getInstancia()->getPerfil( $funcionario->prf_id )->descricao; ?></td>
                            <td><?php echo $funcionario->email; ?></td>
                            <td><?php echo $funcionario->senha; ?></td>
                            <td>
                                <a href="admin.php?modulo=Funcionarios&acao=editar&id=<?php echo $funcionario->id; ?>"><i class="icon-edit"></i> <strong>Editar</strong></a>
                                -
                                <!-- Capítulo 5 - Laboratorio 1 -->
                                <a href="javascript:confirmaExcluir( 'Funcionarios', <?php echo $funcionario->id; ?>)"><i class="icon-trash"></i> <strong>Excluir</strong></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            Nenhum 'Funcionário' cadastrado
            <?php endif; ?>
        </div>
        
    </fieldset>
</form>