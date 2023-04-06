<?php
if (!$_POST)
    mensagem("Erro Requisiçã inválida");

$id = trim($_POST["id"] ?? NULL);
$produto = trim($_POST["produto"] ?? NULL);
$valor = trim($_POST["valor"] ?? NULL);
$categorias_id = trim($_POST["categorias_id"] ?? NULL);

if (empty($produto)) {
    mensagem("Erro, Preencha o nome do produto");
} else if (empty($valor)) {
    mensagem("Erro, Preencha o valor");
} else if (empty($categorias_id)) {
    mensagem("Erro, Selecione uma categoria");
}

if (empty($id)) {
    //insert
    $sql = "INSERT INTO produto VALUES
        (NULL, '{$produto}', '{$valor}', '{$categorias_id}')";
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
