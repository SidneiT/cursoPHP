<form class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Tipos de Encomenda</legend>
    
        <div class="btn-toolbar">
            <a href="admin.php?modulo=TiposEncomendas&acao=inserir" class="btn"><i class="icon-plus"></i> <strong>Novo Tipo de Encomenda</strong></a>
        </div>    
    
        <div class="well">
            <?php if ($dados): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Valor KM</th>
                        <th>Prazo Máximo</th>
                        <th>Criado em</th>
                        <th>Atualizado em</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados as $tipos_encomenda): ?>
                        <tr>
                            <td><?php echo $tipos_encomenda->id; ?></td>
                            <td><?php echo $tipos_encomenda->nome; ?></td>
                            <td><?php echo $tipos_encomenda->valor; ?></td>
                            <td><?php echo $tipos_encomenda->prazo; ?></td>
                            <td><?php echo $tipos_encomenda->dt_criacao; ?></td>
                            <td><?php echo $tipos_encomenda->dt_edicao; ?></td>
                            <td>
                                <a href="admin.php?modulo=TiposEncomendas&acao=editar&id=<?php echo $tipos_encomenda->id; ?>"><i class="icon-edit"></i> <strong>Editar</strong></a>
                                -
                                <!-- Capítulo 5 - Laboratorio 1 -->
                                <a href="javascript:confirmaExcluir( 'TiposEncomendas', <?php echo $tipos_encomenda->id; ?>)"><i class="icon-trash"></i> <strong>Excluir</strong></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            Nenhum 'Tipo de Encomenda' cadastrado
            <?php endif; ?>
        </div>
        
    </fieldset>
</form>