<?php
//recuperar o id
$id = $_GET["id"] ?? NULL;

if (empty($id)) {
    mensagem("Registro inválido");
}

$id = (int)$id;

//verificar se existe um produto cadastrado com esta categoria
$sqlCategoria = "SELECT id FROM subcategoria WHERE id = '{$id}' LIMIT 1";
$consultaCategoria = $pdo->prepare($sqlCategoria);
$consultaCategoria->execute();

$dados = $consultaCategoria->fetch(PDO::FETCH_OBJ);

if (!empty($dados->id)) {
    mensagem("Erro, esta categoria não pode ser excluída pois existe um produto utilizando o registro");
}

//excluir o registro
$sqlExcluir = "DELETE FROM subcategoria WHERE id = '{$id}' LIMIT 1";
$consultaExcluir = $pdo->prepare($sqlExcluir);

if ($consultaExcluir->execute()) {
    mensagem("Sucesso, registro excluído com sucesso");
} else {
    mensagem("Erro, erro ao tentar excluir o registro");
}
