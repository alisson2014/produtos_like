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
    <h2>Cadastrar subcategoria</h2>
    <form action="save/subcategories" method="POST">
        <label for="id">ID:</label>
        <input type="text" name="id" id="id" value="<?= $id ?>" readonly>

        <br>

        <label for="categorie">Digite o nome da Categoria:</label>
        <input type="text" name="categorie" id="categorie" value="<?= $categoria ?>" required>

        <br>

        <button type="submit">
            Salvar Dados
        </button>
    </form>
</div>