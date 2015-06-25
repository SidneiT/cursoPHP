<?php 
use Model\Perfis;
?>
<form class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Menus</legend>
    
        <div class="btn-toolbar">
            <a href="admin.php?modulo=Menus&acao=inserir" class="btn"><i class="icon-plus"></i> <strong>Novo Menu</strong></a>
        </div>    
    
        <div class="well">
            <?php if ($dados): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descricao</th>
                        <th>Link</th>
                        <th>Perfil</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados as $menu): ?>
                        <tr>
                            <td><?php echo $menu->id; ?></td>
                            <td><?php echo $menu->descricao; ?></td>
                            <td><?php echo $menu->link; ?></td>
                            <td><?php echo Perfis::getInstancia()->getPerfil( $menu->prf_id )->descricao; ?></td>
                            <td>
                                <a href="admin.php?modulo=Menus&acao=editar&id=<?php echo $menu->id; ?>"><i class="icon-edit"></i> <strong>Editar</strong></a>
                                -
                                <!-- Capítulo 5 - Laboratorio 1 -->
                                <a href="javascript:confirmaExcluir( 'Menus', <?php echo $menu->id; ?>)"><i class="icon-trash"></i> <strong>Excluir</strong></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            Nenhum 'Menu' cadastrado
            <?php endif; ?>
        </div>
        
    </fieldset>
</form>