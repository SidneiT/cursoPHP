<form action="" method="POST" class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Novo Cliente</legend>
    
        <div class="control-group">
            <label class="control-label">Nome / Razão Social:</label>
            <div class="controls">
                <input name="nome_razao" value="<?php echo $dados->nome_razao?>" class="input-xlarge" type="text">
            </div>
        </div>
            
        <div class="control-group">
            <label class="control-label">CPF / CNPJ:</label>
            <div class="controls">
                <input name="cpf_cnpj" value="<?php echo $dados->cpf_cnpj?>" class="input-xlarge" type="text">
            </div>
        </div>
            
        <div class="control-group">
            <label class="control-label">E-mail:</label>
            <div class="controls">
                <input name="email" value="<?php echo $dados->email?>" class="input-xlarge" type="text">
            </div>
        </div>
            
        <div class="control-group">
            <label class="control-label">Telefone:</label>
            <div class="controls">
                <input name="telefone" value="<?php echo $dados->telefone?>" class="input-xlarge" type="text">
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
