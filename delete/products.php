<?php

use CRUD_PHP\Action\Service\{Lister, Delete};

$id = $_GET["id"] ?? NULL;

if (empty($id)) {
    mensagem("Registro inválido");
}

$id = (int)$id;

$consult = new Lister("SELECT id FROM produto WHERE id = '{$id}' LIMIT 1", $pdo);
$dados = $consult->returnsData();

if (empty($dados[0]->id)) {
    mensagem("Erro, esta categoria não pode ser excluída pois existe um produto utilizando o registro");
}


$delete = new Delete("DELETE FROM produto WHERE id = {$id} LIMIT 1", $pdo);
try {
    $delete->delete();
} catch (Exception $erro) {
    mensagem("Erro, este produto não pode ser excluido pois possui orçamentos cadastrados!");
}
