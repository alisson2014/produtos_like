<?php
if (!$_POST)
    mensagem("Erro Requisiçã inválida");

//recuperar os dados digitados no formulário
//print_r($_POST);
$id = trim($_POST["id"] ?? NULL);
$subcategoria = trim($_POST["subcategoria"] ?? NULL);

//verificar se esses campos estão em branco
if (empty($subcategoria))
    mensagem("Erro, preencha a subcategoria");

$sqlsubcategoria = "select id from subcategoria 
    where nome = :subcategoria
AND id <> :id limit 1";
$consultasubcategoria = $pdo->prepare($sqlsubcategoria);
$consultasubcategoria->bindParam(":id", $id);
$consultasubcategoria->bindParam(":subcategoria", $subcategoria);
$consultasubcategoria->execute();

$dados = $consultasubcategoria->fetch(PDO::FETCH_OBJ);

if (!empty($dados->id))
    mensagem("Erro, já existe um registro com esta subcategoria cadastrada no sistema");

//verificar se vamos dar um insert ou um update
if (empty($id)) {
    //insert
    $sql = "insert into subcategoria values (NULL, :subcategoria)";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":subcategoria", $subcategoria);
} else {
    //update
    $sql = "update subcategoria set nome = :subcategoria where id = :id limit 1";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":subcategoria", $categoria);
    $consulta->bindParam(":id", $id);
}

if ($consulta->execute()) {
    mensagem("Sucesso registro salvo/alterado com sucesso");
} else {
    mensagem("Erro não foi possível salvar ou alterar o registro");
}

function mensagem(string $msg): string
{
    return "
        <script>
            alert($msg);
            history.back();
        </script>
    ";
}
