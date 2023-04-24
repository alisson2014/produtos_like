<?php

use CRUD_PHP\Action\Service\Lister;

if (!$_POST)
    mensagem("Erro Requisiçã inválida");

//recuperar os dados digitados no formulário
$id = trim($_POST["id"] ?? NULL);
$subcategoria = trim($_POST["subcategoria"] ?? NULL);

//verificar se esses campos estão em branco
if (empty($subcategoria))
    mensagem("Erro, preencha a subcategoria");

$consult = new Lister("SELECT id FROM subcategoria 
WHERE nome = '{$subcategoria}'
AND id <> '{$id}' LIMIT 1", $pdo);
$dados = $consult->returnsData()[0];

if (!empty($dados->id))
    mensagem("Erro, já existe um registro com esta subcategoria cadastrada no sistema");

//verificar se vamos dar um insert ou um update
if (empty($id)) {
    //insert
    $sql = "INSERT INTO subcategoria VALUES (NULL, '{$subcategoria}')";
    $consulta = $pdo->prepare($sql);
} else {
    //update
    $sql = "UPDATE subcategoria SET nome = '{$subcategoria}' WHERE id = '{$id}' LIMIT 1";
    $consulta = $pdo->prepare($sql);
}

if ($consulta->execute()) {
    mensagem("Sucesso registro salvo/alterado com sucesso");
} else {
    mensagem("Erro não foi possível salvar ou alterar o registro");
}
