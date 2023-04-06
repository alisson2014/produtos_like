<div class="card">
    <h2 class="title">Orçamento de produto</h2>
    <?php
    $sqlOrcamentos = "SELECT * FROM orcamento ORDER BY data";
    $consultaOrcamentos = $pdo->prepare($sqlOrcamentos);
    $consultaOrcamentos->execute();
    ?>
    <table class="table">
        <thead class="table_head">
            <tr class="row">
                <td class="col">Cliente</td>
                <td class="col">Data</td>
                <td class="col">Orçamento</td>
                <td class="col actions">Ações</td>
            </tr>
        </thead>
        <?php
        while ($dados = $consultaOrcamentos->fetch(PDO::FETCH_OBJ)) {
            $nomeCliente = $dados->nomeCliente;
            $data = $dados->data;
            $id = $dados->id;
            $data = date("d/m/Y", strtotime($data));
        ?>
            <tbody class="table_body">
                <tr class="row">
                    <td class="col"><?= $nomeCliente ?></td>
                    <td class="col"><?= $data ?></td>
                    <td class="col">valores</td>
                    <td class="col buttons">
                        <button type="button" onclick="registrar('productsBudgets', <?= $id ?>)">Editar</button>
                        <button type="button" onclick="excluir('productsBudgets', <?= $id ?>)">Excluir</button>
                    </td>
            </tbody>
        <?php
        }
        ?>
    </table>
    <button type="button" onclick="registrar('productsBudget')" class="categories_button">
        Novos produtos
    </button>
</div>