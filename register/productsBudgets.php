<?php

use CRUD_PHP\Action\Service\Consult;

$id = $_GET["id"] ?? NULL;

if (!empty($id)) {
    $id = (int)$id;
    $consult = new Consult("SELECT * FROM orcamento
    WHERE id = '{$id}' LIMIT 1");
    $dados = $consult->sqlConsult($pdo)[0];
}

$id = $dados->id ?? NULL;
$nomeCliente = $dados->nomeCliente ?? NULL;
?>
<div class="card">
    <h2 class="title">Adicionar produtos</h2>
    <form name="formCadastro" action="?action=save&table=productsBudgets" method="post" class="form">
        <label for="id" class="form_label">ID:</label>
        <input type="text" class="form_input" name="id" id="id" value="<?= $id ?>" readonly />

        <br>

        <label for="cliente" class="form_label">Cliente</label>
        <input class="form_input" type="text" id="cliente" name="cliente1" value="<?= $nomeCliente ?>" readonly>

        <br>

        <label for="produtos" class="form_label">Escolha um produto:</label>
        <select name="produtos" id="produtos" class="form_select">
            <option value=""></option>
            <?php
            $sqlProdutos = "SELECT * FROM produto ORDER BY nome";
            $consultaProdutos = $pdo->prepare($sqlProdutos);
            $consultaProdutos->execute();

            while ($dadosCategoria = $consultaProdutos->fetch(PDO::FETCH_OBJ)) {
                $idProduto = $dadosCategoria->id;
                $nomeProduto = $dadosCategoria->nome;
            ?>
                <option value="<?= $idProduto ?>">
                    <?= $nomeProduto ?>
                </option>
            <?php
            }
            ?>
        </select>

        <br>

        <label for="quantidade" class="form_label">Quantidade:</label>
        <input type="number" id="quntidade" name="quantidade" min="1" class="form_select" />

        <br>

        <button type="submit" class="form_button">
            Salvar Dados
        </button>
    </form>
</div>