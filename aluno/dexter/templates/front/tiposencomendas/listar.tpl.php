<form class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Tipos de Encomendas</legend>
    
        <?php if ($dados): ?>
        <div class="well">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Valor KM</th>
                        <th>Prazo Máximo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados as $tipos_encomenda): ?>
                        <tr>
                            <td><?php echo $tipos_encomenda->nome; ?></td>
                            <td><?php echo $tipos_encomenda->valor; ?></td>
                            <td><?php echo $tipos_encomenda->prazo; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            Nenhum tipo de encomenda cadastrado
        <?php endif; ?>
        </div>
        
    </fieldset>
</form>