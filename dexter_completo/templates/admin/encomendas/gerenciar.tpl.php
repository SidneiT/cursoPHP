<form class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Encomendas</legend>
    
        <div class="btn-toolbar">
            <a href="admin.php?modulo=Encomendas&acao=inserir" class="btn"><i class="icon-plus"></i> <strong>Nova Encomenda</strong></a>
        </div>    
    
        <div class="well">
            <?php if ($dados): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Origem</th>
                        <th>Destino</th>
                        <th>Localização atual</th>
                        <th>Criado em</th>
                        <th>Atualizado em</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados as $encomenda): ?>
                        <tr>
                            <td><?php echo $encomenda->id; ?></td>
                            <td><?php echo $encomenda->origem; ?></td>
                            <td><?php echo $encomenda->destino; ?></td>
                            <td><?php echo $encomenda->atual; ?></td>
                            <td><?php echo $encomenda->dt_criacao; ?></td>
                            <td><?php echo $encomenda->dt_edicao; ?></td>
                            <td>
                                <a href="admin.php?modulo=Encomendas&acao=editar&id=<?php echo $encomenda->id; ?>"><i class="icon-edit"></i> <strong>Editar</strong></a>
                                -
                                <!-- Capítulo 5 - Laboratorio 1 -->
                                <a href="javascript:confirmaExcluir( 'Encomendas', <?php echo $encomenda->id; ?>)"><i class="icon-trash"></i> <strong>Excluir</strong></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            Nenhuma 'Encomenda' cadastrada
            <?php endif; ?>
        </div>
        
    </fieldset>
</form>