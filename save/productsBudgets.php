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

$sql = "UPDATE produtosorcamento SET produto = '{$produto}', orcamento = '{$id}', quantidade = '{$quantidade}'
    WHERE orcamento = '{$id}' LIMIT 1";
$consulta = $pdo->prepare($sql);


//executar o sql
if ($consulta->execute()) {
    mensagem("Sucesso, Registro Salvo/Atualizado com sucesso");
} else {
    mensagem("Erro, erro ao Salvar/Atualizar registro");
}
