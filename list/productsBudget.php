<?php

use CRUD_PHP\Action\Service\Lister;

$consultBudgets = new Lister(
    "SELECT o.id AS idOrcamento, o.nomeCliente AS nomeCliente, o.data AS data, p.id AS idProduto, p.nome AS nomeProduto, p.valor AS valorProduto, SUM(p.valor * po.quantidade) as total FROM orcamento as o JOIN produtosorcamento as po ON po.orcamento = o.id JOIN produto as p ON p.id = po.produto GROUP BY o.id",
    $pdo
);
?>
<div class="card">
    <h2 class="title">Orçamento de produto</h2>
    <table class="table">
        <thead class="table_head">
            <tr class="row">
                <td class="col">Cliente</td>
                <td class="col">Data</td>
                <td class="col">Orçamento</td>
                <td class="col actions">Ações</td>
            </tr>
        </thead>
        <?php
        $consult = $consultBudgets->returnsData();
        foreach ($consult as $item) {
            $nomeCliente = $item->nomeCliente;
            $data = $item->data;
            $total = $item->total;
            $idOrcamento = $item->idOrcamento;
            $data = date("d/m/Y", strtotime($data));
        ?>
            <tbody class="table_body">
                <tr class="row">
                    <td class="col"><?= $nomeCliente ?></td>
                    <td class="col"><?= $data ?></td>
                    <td class="col"><?= $total ?></td>
                    <td class="col buttons">
                        <button type="button">
                            <a href="index.php?action=list&table=cart&id=<?= $idOrcamento ?>">Editar</a>
                        </button>
                    </td>
            </tbody>
        <?php
        }
        ?>
    </table>
</div>