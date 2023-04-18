<?php

use CRUD_PHP\Action\Service\Lister;

$consultSucategories = new Lister(
    "SELECT * FROM subcategoria",
    $pdo
);

?>
<div class="subcategories">
    <h2 class="title">Subcategorias</h2>
    <table class="table">
        <thead class="table_head">
            <tr class="row">
                <td class="col">Subcategoria</td>
                <td class="col actions">Ações</td>
            </tr>
        </thead>
        <tbody class="table_body">
            <?php
            $consult = $consultSucategories->returnsData();

            foreach ($consult as $item) {
                $nome = $item->nome;
                $id = $item->id;
            ?>
                <tr class="row">
                    <td class="col">
                        <?= $nome ?>
                    </td>
                    <td class="col buttons">
                        <button type="button" onclick="registrar('subcategories', <?= $id ?>)">Editar</button>
                        <button type="button" onclick="excluir('subcategories', <?= $id ?>)">Excluir</button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <button type="button" onclick="registrar('subcategories')" class="categories_button">
        Nova categoria
    </button>
</div>