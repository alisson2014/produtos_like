<?php
//recuperar o id
$id = $_GET["id"] ?? NULL;

if (empty($id)) {
    mensagem("Registro inválido");
}

$id = (int)$id;

//verificar se existe um produto cadastrado com esta categoria
$sqlProdutos = "SELECT id FROM produto WHERE id = '{$id}' LIMIT 1";
$consultaProdutos = $pdo->prepare($sqlProdutos);
$consultaProdutos->execute();

$dados = $consultaProdutos->fetch(PDO::FETCH_OBJ);

if (empty($dados->id)) {
    mensagem("Erro, esta categoria não pode ser excluída pois existe um produto utilizando o registro");
}

//excluir o registro
$sqlExcluir = "DELETE FROM produto WHERE id = '{$id}' LIMIT 1";
$consultaExcluir = $pdo->prepare($sqlExcluir);

if ($consultaExcluir->execute()) {
    mensagem("Sucesso, registro excluído com sucesso");
} else {
    mensagem("Erro, erro ao tentar excluir o registro");
}
