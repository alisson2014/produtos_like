<?php
$id = $_GET["id"] ?? NULL;

if (!empty($id)) {
    $id = (int)$id;
    $sqlProduto = "SELECT * FROM produto
        WHERE id = '{$id}' LIMIT 1";
    $consultaProduto = $pdo->prepare($sqlProduto);
    $consultaProduto->execute();

    //recuperar os dados do sql
    $dados = $consultaProduto->fetch(PDO::FETCH_OBJ);
}

$id = $dados->id ?? NULL;
$produto = $dados->nome ?? NULL;
$valor = $dados->valor ?? NULL;
$categorias_id = $dados->subcategoria ?? NULL;
?>

<div class="card">
    <h2 class="title">Cadastrar produto</h2>
    <form name="formCadastro" action="?action=save&table=products" method="post" class="form">
        <label for="id" class="form_label">ID:</label>
        <input type="text" class="form_input" name="id" id="id" value="<?= $id ?>" readonly>

        <br>

        <label for="produto" class="form_label">Digite o nome do Produto: </label>
        <input type="text" class="form_input" placeholder="Digite o nome do produto" name="produto" id="produto" value="<?= $produto ?>" required>

        <br>

        <label for="valor" class="form_label">Digite o valor do Produto: </label>
        <input type="text" class="form_input" placeholder="Digite o valor do produto" name="valor" id="valor" value="<?= $valor ?>" required>

        <br>

        <label for="categorias" class="form_label">Categoria: </label>
        <select name="categorias" id="categorias" class="form_select">
            <option value="">Selecione</option>
            <?php
            $sqlCategoria = "SELECT * FROM subcategoria ORDER BY nome";
            $consultaCategoria = $pdo->prepare($sqlCategoria);
            $consultaCategoria->execute();

            while ($dadosCategoria = $consultaCategoria->fetch(PDO::FETCH_OBJ)) {
                $idCategoria = $dadosCategoria->id;
                $nomeCategoria = $dadosCategoria->nome;
            ?>
                <option value="<?= $idCategoria ?>">
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