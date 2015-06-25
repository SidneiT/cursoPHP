<form class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Banners</legend>
    
        <div class="btn-toolbar">
            <a href="admin.php?modulo=Banners&acao=inserir" class="btn"><i class="icon-plus"></i> <strong>Novo Banner</strong></a>
        </div>    
    
        <div class="well">
            <?php if ($dados): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descricao</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados as $banner): ?>
                        <tr>
                            <td><?php echo $banner->id; ?></td>
                            <td><?php echo $banner->descricao; ?></td>
                            <td>
                                <a href="admin.php?modulo=Banners&acao=editar&id=<?php echo $banner->id; ?>"><i class="icon-edit"></i> <strong>Editar</strong></a>
                                -
                                <!-- Capítulo 5 - Laboratorio 1 -->
                                <a href="javascript:confirmaExcluir( 'Banners', <?php echo $banner->id; ?>)"><i class="icon-trash"></i> <strong>Excluir</strong></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            Nenhum 'Banner' cadastrado
            <?php endif; ?>
        </div>
        
    </fieldset>
</form>