<?php

use CRUD_PHP\Action\Service\Lister;

$consultSucategories = new Lister(
    "SELECT * FROM subcategoria",
    $pdo
);

?>
<div class="subcategories">
    <h2 class="title">Categorias</h2>
    <div class="table-responsive">
        <table class="table table-striped" style="width: 55vw">
            <thead>
                <tr>
                    <th scope="col" class="th">#</th>
                    <th scope="col" class="th">Categoria</th>
                    <th scope="col" class="th actions">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($consultSucategories->returnsData() as $data) {
                    $id = $data->id;
                    $nome = $data->nome;
                ?>
                    <tr>
                        <th scope="row" class="th"><?= $id ?></th>
                        <td class="th"><?= $nome ?></td>
                        <td class="actions buttons">
                            <button type="button" onclick="registrar('subcategories', <?= $id ?>)" class="btn btn-primary btn-md">Editar</button>
                            <button type="button" onclick="excluir('subcategories', <?= $id ?>)" class="btn btn-danger btn-md">Excluir</button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <button type="button" onclick="registrar('subcategories')" class="btn btn-info btn-lg">
        Nova categoria
    </button>
</div>