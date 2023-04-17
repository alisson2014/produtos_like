<?php

use CRUD_PHP\Action\Service\{Consult, Delete};

$id = $_GET["id"] ?? NULL;

if (empty($id)) {
    mensagem("Registro inválido");
}

$id = (int)$id;
$consult = new Consult("SELECT id FROM subcategoria WHERE id = '{$id}' LIMIT 1");
$dados = $consult->sqlConsult($pdo);

if (empty($dados[0]->id)) {
    mensagem("Erro, nenhuma categoria encontrada!");
}


$delete = new Delete("DELETE FROM subcategoria WHERE id = '{$id}' LIMIT 1");
$delete->delete($pdo);
