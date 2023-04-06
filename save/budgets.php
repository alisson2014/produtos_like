<?php
$id = trim($_POST["id"] ?? NULL);
$nomeCliente = trim($_POST["cliente"] ?? NULL);
$data = trim($_POST["data"] ?? NULL);

if (empty($nomeCliente)) {
    mensagem("Erro, Preencha o nome do cliente");
} else if (empty($data)) {
    mensagem("Erro, Preencha a data");
}

if (empty($id)) {
    //insert
    $sql = "INSERT INTO orcamento VALUES
        (NULL, '{$nomeCliente}', '{$data}')";
    $consulta = $pdo->prepare($sql);
} else {
    $sql = "UPDATE orcamento SET nomeCliente = '{$nomeCliente}', data = '{$data}'
        WHERE id = '{$id}' LIMIT 1";
    $consulta = $pdo->prepare($sql);
}

//executar o sql
if ($consulta->execute()) {
    mensagem("Sucesso, Registro Salvo/Atualizado com sucesso");
} else {
    mensagem("Erro, erro ao Salvar/Atualizar registro");
}
