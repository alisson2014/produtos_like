<?php

use CRUD_PHP\Action\Service\Lister;

$id = $_GET["id"] ?? NULL;

$consultCart = new Lister("SELECT p.id as idProduto, p.nome, p.valor, o.*, po.quantidade FROM produtosorcamento as po JOIN orcamento as o ON o.id = po.orcamento JOIN produto as p ON p.id = po.produto WHERE o.id = '{$id}'", $pdo);
?>
<div class="cart">
    <h2 class="title">Carrinho</h2>
    <table class="table">
        <thead class="table_head">
            <tr class="row">
                <td class="col">Produtos</td>
                <td class="col">Quantidade</td>
                <td class="col">Valor</td>
            </tr>
        </thead>
        <?php
        $consult = $consultCart->returnsData();
        foreach ($consult as $item) {
            $nomeProduto = $item->nome;
            $valor = $item->valor;
            $quantidade = $item->quantidade;
            $idOrcamento = $item->id;
            $valorFormatado = formatarValor($valor);
        ?>
            <tbody class="table_body">
                <tr class="row">
                    <td class="col"><?= $nomeProduto ?></td>
                    <td class="col"><?= $quantidade ?></td>
                    <td class="col"><?= $valorFormatado ?></td>
            </tbody>
        <?php
        }
        ?>
    </table>
    <button type="button" onclick="registrar('productsBudgets', <?= $idOrcamento ?>)" class="categories_button">Novo produto</button>
</div>