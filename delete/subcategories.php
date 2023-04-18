<?php

use CRUD_PHP\Action\Service\{Lister, Delete};

$id = $_GET["id"] ?? NULL;

if (empty($id)) {
    mensagem("Registro inválido");
}

$id = (int)$id;
$consult = new Lister("SELECT id FROM subcategoria WHERE id = '{$id}' LIMIT 1", $pdo);
$dados = $consult->returnsData()[0];

if (empty($dados->id)) {
    mensagem("Erro, nenhuma categoria encontrada!");
}

$delete = new Delete("DELETE FROM subcategoria WHERE id = '{$id}' LIMIT 1", $pdo);
try {
    $delete->delete();
} catch (Exception $erro) {
    mensagem("Erro, esta categoria não pode ser excluida pois possui produtos cadastrados!");
}
