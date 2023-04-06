<div class="budgets">
    <h2 class="title">Orçamentos</h2>
    <?php
    $sqlOrcamentos = "SELECT * FROM orcamento ORDER BY data DESC";
    $consultaOrcamento = $pdo->prepare($sqlOrcamentos);
    $consultaOrcamento->execute();
    ?>
    <table class="table">
        <thead class="table_head">
            <tr class="row">
                <td class="col">Cliente</td>
                <td class="col">Data</td>
                <td class="col actions">Ações</td>
            </tr>
        </thead>
        <tbody class="table_body">
            <?php
            while ($dados = $consultaOrcamento->fetch(PDO::FETCH_OBJ)) {
                $nomeCliente = $dados->nomeCliente;
                $data = $dados->data;
                $id = $dados->id;
            ?>
                <tr class="row">
                    <td class="col">
                        <?= $nomeCliente ?>
                    </td>
                    <td class="col"><?= $data ?></td>
                    <td class="col buttons">
                        <button type="button" onclick="registrar('budgets', <?= $id ?>)">Editar</button>
                        <button type="button" onclick="excluir('budgets', <?= $id ?>)">Excluir</button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <button type="button" onclick="registrar('budgets')" class="categories_button">
        Novo orçamento
    </button>
</div>