<form class="form-horizontal">
    <fieldset>

        <?php if ($dados): ?>
        
        <!-- Form Name -->
        <legend><?php echo $dados->titulo; ?></legend>
        <p align="justify">
            <?php echo $dados->texto; ?>
        </p>
        
        <?php else: ?>
        <legend>Conteúdo não encontrado</legend>
        <?php endif; ?>
        
    </fieldset>
</form>
