<form action="" method="POST" class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Editar Encomenda</legend>
    
        <div class="control-group">
            <label class="control-label">Origem:</label>
            <div class="controls">
                <input name="origem" class="input-xlarge" type="text" value="<?php echo $dados->origem; ?>" />
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label">Destino:</label>
            <div class="controls">
                <input name="destino" class="input-xlarge" type="text" value="<?php echo $dados->destino; ?>" />
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label">Localização Atual:</label>
            <div class="controls">
                <input name="atual" class="input-xlarge" type="text" value="<?php echo $dados->atual; ?>" />
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