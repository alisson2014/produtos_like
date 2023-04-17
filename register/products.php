<?php

use CRUD_PHP\Action\Service\Consult;

$id = $_GET["id"] ?? NULL;

if (!empty($id)) {
    $id = (int)$id;
    $consult = new Consult("SELECT * FROM produto
    WHERE id = '{$id}' LIMIT 1");
    $dados = $consult->sqlConsult($pdo);
}

$id = $dados[0]->id ?? NULL;
$produto = $dados[0]->nome ?? NULL;
$valor = $dados[0]->valor ?? NULL;
$categorias_id = $dados[0]->subcategoria ?? NULL;
?>

<div class="card">
    <h2 class="title">Cadastrar produto</h2>
    <form name="formCadastro" action="?action=save&table=products" method="post" class="form">
        <label for="id" class="form_label">ID:</label>
        <input type="text" class="form_input" name="id" id="id" value="<?= $id ?>" readonly />
        <br />
        <label for="produto" class="form_label">Nome do produto </label>
        <input type="text" class="form_input" placeholder="Digite o nome do produto" name="produto" id="produto" minlength="3" maxlength="45" value="<?= $produto ?>" required />
        <br />
        <label for="valor" class="form_label">Valor do Produto </label>
        <input type="number" class="form_input" placeholder="Digite o valor do produto" name="valor" min="0" max="10000000" step=".01" id="valor" value="<?= $valor ?>" required />
        <br />
        <label for="categorias_id" class="form_label">Categoria </label>
        <select name="categorias_id" id="categorias_id" class="form_select" required>
            <option value=""></option>
            <?php
            $sqlCategoria = "SELECT * FROM subcategoria ORDER BY nome";
            $consultaCategoria = $pdo->prepare($sqlCategoria);
            $consultaCategoria->execute();

            while ($dadosCategoria = $consultaCategoria->fetch(PDO::FETCH_OBJ)) {
                $idCategoria = $dadosCategoria->id;
                $nomeCategoria = $dadosCategoria->nome;
            ?>
                <option value="<?= $idCategoria ?>" <?= $idCategoria === $categorias_id ? "selected" : "" ?>>
                    <?= $nomeCategoria ?>
                </option>
            <?php
            }
            ?>
        </select>

        <button type="submit" class="form_button">
            Salvar Dados
        </button>
    </form>
</div>