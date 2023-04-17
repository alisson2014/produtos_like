<?php

use CRUD_PHP\Action\Service\{Consult, Delete};

$id = $_GET["id"] ?? NULL;

if (empty($id)) {
    mensagem("Registro inválido");
}

$id = (int)$id;

$consult = new Consult("SELECT id FROM orcamento WHERE id = '{$id}' LIMIT 1");
$dados = $consult->sqlConsult($pdo);

if (empty($dados[0]->id)) {
    mensagem("Erro, esta categoria não pode ser excluída pois existe um produto utilizando o registro");
}

$delete = new Delete("DELETE FROM orcamento WHERE id = '{$id}' LIMIT 1");
$delete->delete($pdo);
