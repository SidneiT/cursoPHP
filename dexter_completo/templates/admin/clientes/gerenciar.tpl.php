<form class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Clientes</legend>
    
        <div class="btn-toolbar">
            <a href="admin.php?modulo=Clientes&acao=inserir" class="btn"><i class="icon-plus"></i> <strong>Novo Cliente</strong></a>
        </div>    
    
        <div class="well">
            <?php if ($dados): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome / Razão Social</th>
                        <th>CPF / CNPJ</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados as $cliente): ?>
                        <tr>
                            <td><?php echo $cliente->nome_razao; ?></td>
                            <td><?php echo $cliente->cpf_cnpj; ?></td>
                            <td><?php echo $cliente->email; ?></td>
                            <td><?php echo $cliente->telefone; ?></td>
                            <td>
                                <a href="admin.php?modulo=Clientes&acao=editar&id=<?php echo $cliente->id; ?>"><i class="icon-edit"></i> <strong>Editar</strong></a>
                                -
                                <!-- Capítulo 5 - Laboratorio 1 -->
                                <a href="javascript:confirmaExcluir( 'Clientes', <?php echo $cliente->id; ?>)"><i class="icon-trash"></i> <strong>Excluir</strong></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            Nenhum 'Cliente' cadastrado
            <?php endif; ?>
        </div>
        
    </fieldset>
</form>