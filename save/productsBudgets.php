<?php
if (!$_POST)
    mensagem("Erro Requisiçã inválida");

$id = trim($_POST["id"] ?? NULL);
$produto = trim($_POST["produtos"] ?? NULL);
$quantidade = trim($_POST["quantidade"] ?? NULL);

if (empty($produto)) {
    mensagem("Erro, Preencha o nome do produto");
} else if (empty($quantidade)) {
    mensagem("Erro, Preencha o valor");
}

if (empty($id)) {
    //insert
    $sql = "INSERT INTO orcamentoProdutos VALUES
        ('{$produto}', NULL, '{$quantidade}')";
    $consulta = $pdo->prepare($sql);
} else {
    $sql = "UPDATE produto SET nome = '{$produto}', subcategoria = '{$categorias_id}', valor = '{$valor}'
        WHERE id = '{$id}' LIMIT 1";
    $consulta = $pdo->prepare($sql);
}

//executar o sql
if ($consulta->execute()) {
    mensagem("Sucesso, Registro Salvo/Atualizado com sucesso");
} else {
    mensagem("Erro, erro ao Salvar/Atualizar registro");
}
