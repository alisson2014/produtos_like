<?php
if (!empty($id)) {
    $sqlCategoria = "SELECT * FROM subcategoria WHERE id = :id LIMIT 1";
    $consultaCategoria = $pdo->prepare($sqlCategoria);
    $consultaCategoria->bindParam(":id", $id);
    $consultaCategoria->execute();

    $dados = $consultaCategoria->fetch(PDO::FETCH_OBJ);
}

$id = $dados->id ?? NULL;
$categoria = $dados->subcatagoria ?? NULL;
?>

<div class="card">
    <h2 class="title">Cadastrar subcategoria</h2>
    <form name="formCadastro" action="save/subcategories" method="post" class="form">
        <label for="id" class="form_label">ID:</label>
        <input type="text" class="form_input" name="id" id="id" value="<?= $id ?>" readonly>

        <br>

        <label for="categorie" class="form_label">Digite o nome da Categoria:</label>
        <input type="text" class="form_input" placeholder="Digite o nome da Categoria" name="categoria" id="categorie" value="<?= $categoria ?>" required>

        <br>

        <button type="submit" class="form_button">
            Salvar Dados
        </button>
    </form>
</div>