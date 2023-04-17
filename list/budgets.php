<?php

use CRUD_PHP\Action\Model\Consult\Consult;

$consultClients = new Consult("SELECT * FROM orcamento ORDER BY data DESC");
?>
<div class="budgets">
    <h2 class="title">Clientes</h2>
    <table class="table">
        <thead class="table_head">
            <tr class="row">
                <td class="col">Cliente</td>
                <td class="col actions">Ações</td>
            </tr>
        </thead>
        <tbody class="table_body">
            <?php
            $consult = $consultClients->sqlConsult($pdo);
            foreach ($consult as $item) {
                $nomeCliente = $item->nomeCliente;
                $id = $item->id;
            ?>
                <tr class="row">
                    <td class="col">
                        <?= $nomeCliente ?>
                    </td>
                    <td class="col buttons">
                        <button type="button" onclick="registrar('budgets', <?= $id ?>)">Editar</button>
                        <button type="button" onclick="excluir('budgets', <?= $id ?>)">Excluir</button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <button type="button" onclick="registrar('budgets')" class="categories_button">
        Novo cliente
    </button>
</div>