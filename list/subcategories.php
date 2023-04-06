<div class="subcategories">
    <h2 class="title">Subcategorias</h2>
    <?php
    $sqlCategorias = "SELECT * FROM subcategoria";
    $consultaCategorias = $pdo->prepare($sqlCategorias);
    $consultaCategorias->execute();
    ?>
    <table class="table">
        <thead class="table_head">
            <tr class="row">
                <td class="col">Subcategoria</td>
                <td class="col actions">Ações</td>
            </tr>
        </thead>
        <tbody class="table_body">
            <?php
            while ($dados = $consultaCategorias->fetch(PDO::FETCH_OBJ)) {
                $nome = $dados->nome;
                $id = $dados->id;
            ?>
                <tr class="row">
                    <td class="col">
                        <p><?= $nome ?></p>
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