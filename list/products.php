<?php

use CRUD_PHP\Action\Service\Consult;

$consultProducts = new Consult("SELECT p.*,s.nome as nomeCategoria FROM produto as p JOIN subcategoria as s ON s.id = p.subcategoria");
?>
<div class="products_page">
    <h2 class="title">Produtos</h2>
    <table class="table">
        <thead class="table_head">
            <tr class="row">
                <td class="col">Produto</td>
                <td class="col">Valor</td>
                <td class="col">Subcategoria</td>
                <td class="col actions">Ações</td>
            </tr>
        </thead>
        <?php
        $consult = $consultProducts->sqlConsult($pdo);
        foreach ($consult as $item) {
            $nomeCategoria = $item->nomeCategoria;
            $produto = $item->nome;
            $valor = $item->valor;
            $id = $item->id;
            $valorFormatado = formatarValor($valor);
        ?>
            <tbody class="table_body">
                <tr class="row">
                    <td class="col"><?= $produto ?></td>
                    <td class="col"><?= $valorFormatado ?></td>
                    <td class="col"><?= $nomeCategoria ?></td>
                    <td class="col buttons">
                        <button type="button" onclick="registrar('products', <?= $id ?>)">Editar</button>
                        <button type="button" onclick="excluir('products', <?= $id ?>)">Excluir</button>
                    </td>
            </tbody>
        <?php
        }
        ?>
    </table>
    <button type="button" onclick="registrar('products')" class="categories_button">
        Novo produto
    </button>
</div>