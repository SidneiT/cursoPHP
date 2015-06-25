<form action=""  method="POST" class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Novo Menu</legend>
                
        <div class="control-group">
            <label class="control-label">Descrição:</label>
            <div class="controls">
                <input name="descricao" value="<?php echo $dados->descricao?>" class="input-xlarge" type="text">
            </div>
        </div>
                
        <div class="control-group">
            <label class="control-label">Perfil:</label>
            <div class="controls">
                <select class="span2" name="prf_id">
        		    <option value="">Selecionar</option>
                    <?php
                    use Model\Perfis;
                    foreach (Perfis::getInstancia()->listar() as $perfil) {
                        $selected = ( $perfil->id == $dados->prf_id ) ? 'selected' : '';
                        echo "<option value=\"{$perfil->id}\" {$selected}>{$perfil->descricao}</option>";
                    }
                    ?>
        	    </select>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label">Link:</label>
            <div class="controls">
                <input name="link" value="<?php echo $dados->link?>" class="input-xlarge" type="text">
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