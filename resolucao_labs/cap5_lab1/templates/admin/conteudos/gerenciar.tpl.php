<form class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Conteúdos</legend>
    
        <div class="btn-toolbar">
            <a href="admin.php?modulo=Conteudos&acao=inserir" class="btn"><i class="icon-plus"></i> <strong>Novo Conteúdo</strong></a>
        </div>    
    
        <div class="well">
            <?php if ($dados): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados as $conteudo): ?>
                        <tr>
                            <td><?php echo $conteudo->id; ?></td>
                            <td><?php echo $conteudo->titulo; ?></td>
                            <td>
                                <a href="admin.php?modulo=Conteudos&acao=editar&id=<?php echo $conteudo->id; ?>"><i class="icon-edit"></i> <strong>Editar</strong></a>
                                -
                                <!-- Capítulo 5 - Laboratorio 1 -->
                                <a href="javascript:confirmaExcluir( 'Conteudos', <?php echo $conteudo->id; ?>)"><i class="icon-trash"></i> <strong>Excluir</strong></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            Nenhum 'Conteúdo' cadastrado
            <?php endif; ?>
        </div>
        
    </fieldset>
</form>