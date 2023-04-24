<?php

use CRUD_PHP\Action\Service\{Lister, Delete};

$id = $_GET["id"] ?? NULL;

if (empty($id)) {
    mensagem("Registro inválido");
}

$id = (int)$id;

$consult = new Lister("SELECT id FROM orcamento WHERE id = '{$id}' LIMIT 1", $pdo);
$dados = $consult->returnsData()[0];

if (empty($dados->id)) {
    mensagem("Erro, esta categoria não pode ser excluída pois existe um produto utilizando o registro");
}

$delete = new Delete("DELETE FROM orcamento WHERE id = '{$id}' LIMIT 1", $pdo);
try {
    $delete->delete();
} catch (Throwable) {
    mensagem("Erro, este cliente não pode ser excluido pois possui orçamentos em seu nome!");
}
