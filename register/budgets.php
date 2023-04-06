<?php
$id = $_GET["id"] ?? NULL;

if (!empty($id)) {
    $id = (int)$id;
    $sqlOrcamento = "SELECT * FROM orcamento
        WHERE id = '{$id}' LIMIT 1";
    $consultaOrcamento = $pdo->prepare($sqlOrcamento);
    $consultaOrcamento->execute();

    $dados = $consultaOrcamento->fetch(PDO::FETCH_OBJ);
}

$id = $dados->id ?? NULL;
$nomeCliente = $dados->nomeCliente ?? NULL;
$data = $dados->data ?? NULL;
?>

<div class="card">
    <h2 class="title">Cadastrar orçamento</h2>
    <form name="formCadastro" action="?action=save&table=budgets" method="post" class="form">
        <label for="id" class="form_label">ID:</label>
        <input type="text" class="form_input" name="id" id="id" value="<?= $id ?>" readonly />

        <br>

        <label for="cliente" class="form_label">Digite o nome do cliente: </label>
        <input type="text" class="form_input" placeholder="Digite o nome do cliente" name="cliente" id="cliente" value="<?= $nomeCliente ?>" required />

        <br>

        <label for="data" class="form_label">Digite a data do orçamento: </label>
        <input class="form_select" type="date" id="data" name="data" value="<?= $data ?>" required />

        <br>

        <button type="submit" class="form_button">
            Salvar Dados
        </button>
    </form>
</div>