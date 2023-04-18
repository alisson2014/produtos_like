<?php

use CRUD_PHP\Action\Service\Lister;

$id = $_GET["id"] ?? NULL;

if (!empty($id)) {
    $id = (int)$id;
    $consult = new Lister("SELECT * FROM subcategoria WHERE id = '{$id}'", $pdo);
    $dados = $consult->returnsData()[0];
}

$id = $dados->id ?? NULL;
$nome = $dados->nome ?? NULL;

?>

<div class="card">
    <h2 class="title">Cadastrar subcategoria</h2>
    <form name="formCadastro" action="?action=save&table=subcategories" method="post" class="form">
        <label for="id" class="form_label">ID:</label>
        <input type="text" class="form_input" name="id" id="id" value="<?= $id ?>" readonly />
        <br />
        <label for="categorie" class="form_label">Categoria</label>
        <input type="text" class="form_input" placeholder="Digite o nome da categoria" name="subcategoria" id="categorie" value="<?= $nome ?>" minlength="3" maxlength="50" required />
        <br />
        <button type="submit" class="form_button">
            Salvar Dados
        </button>
    </form>
</div>