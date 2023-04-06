<?php
$id = $_GET["id"] ?? NULL;

if (!empty($id)) {
    $id = (int)$id;
    $sqlCategoria = "SELECT * FROM subcategoria WHERE id = '{$id}'";
    $consultaCategoria = $pdo->prepare($sqlCategoria);
    $consultaCategoria->execute();

    $dados = $consultaCategoria->fetch(PDO::FETCH_OBJ);
}

$id = $dados->id ?? NULL;
$categoria = $dados->nome ?? NULL;

?>

<div class="card">
    <h2 class="title">Cadastrar subcategoria</h2>
    <form name="formCadastro" action="?action=save&table=subcategories" method="post" class="form">
        <label for="id" class="form_label">ID:</label>
        <input type="text" class="form_input" name="id" id="id" value="<?= $id ?>" readonly />
        <br />
        <label for="categorie" class="form_label">Categoria</label>
        <input type="text" class="form_input" placeholder="Digite o nome da categoria" name="subcategoria" id="categorie" value="<?= $categoria ?>" minlength="3" maxlength="50" required />
        <br />
        <button type="submit" class="form_button">
            Salvar Dados
        </button>
    </form>
</div>