<form action="" method="POST" class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Editar Tipo de Encomenda</legend>
    
        <div class="control-group">
            <label class="control-label">Nome:</label>
            <div class="controls">
                <input name="nome" value="<?php echo $dados->nome?>" class="input-xlarge" type="text">
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label">Valor KM:</label>
            <div class="controls">
                <input name="valor" value="<?php echo $dados->valor?>" class="input-xlarge" type="text">
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label">Prazo Máximo:</label>
            <div class="controls">
                <input name="prazo" value="<?php echo $dados->prazo?>" class="input-xlarge" type="text">
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label"></label>
            <div class="controls">
                <button class="btn btn-primary">Salvar</button>
            </div>
        </div>

    </fieldset>
</form>