<?php

use CRUD_PHP\Action\Service\Lister;

$consultProducts = new Lister("SELECT p.*,s.nome as nomeCategoria FROM produto as p JOIN subcategoria as s ON s.id = p.subcategoria", $pdo);
?>
<div class="products_page">
    <h2 class="title">Produtos</h2>
    <div class="table-responsive">
        <table class="table table-striped" style="width: 55vw">
            <thead>
                <tr>
                    <th scope="col" class="th">#</th>
                    <th scope="col" class="th">Produto</th>
                    <th scope="col" class="th">Categoria</th>
                    <th scope="col" class="th">Valor</th>
                    <th scope="col" class="th actions">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $consult = $consultProducts->returnsData();
                foreach ($consult as $item) {
                    $nomeCategoria = $item->nomeCategoria;
                    $produto = $item->nome;
                    $valor = $item->valor;
                    $id = $item->id;
                    $valorFormatado = formatarValor($valor);
                ?>
                    <tr>
                        <th scope="row" class="th"><?= $id ?></th>
                        <td class="th"><?= $produto ?></td>
                        <td class="th"><?= $nomeCategoria ?></td>
                        <td class="th">R$<?= $valorFormatado ?></td>
                        <td class="actions buttons">
                            <button type="button" onclick="registrar('products', <?= $id ?>)" class="btn btn-primary">Editar</button>
                            <button type="button" onclick="excluir('products', <?= $id ?>)" class="btn btn-danger">Excluir</button>
                        </td>
                    <?php
                }
                    ?>
            </tbody>
        </table>
    </div>
    <button type="button" onclick="registrar('products')" class="categories_button">
        Novo produto
    </button>
</div>