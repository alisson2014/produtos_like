<div class="subcategories">
    <h2 class="title">Subcategorias</h2>
    <?php
    $sqlCategorias = "SELECT * FROM subcategoria";
    $consultaCategorias = $pdo->prepare($sqlCategorias);
    $consultaCategorias->execute();
    ?>
    <div class="categories_list">
        <?php
        while ($dados = $consultaCategorias->fetch(PDO::FETCH_OBJ)) {
            $nome = $dados->nome;
            $id = $dados->id;
        ?>
            <div class='categories'>
                <div class='categorie'>
                    <p><?= $nome ?></p>
                </div>
                <div class="buttons">
                    <button type="button" onclick="registrar('subcategories', <?= $id ?>)">Editar</button>
                    <button type="button" onclick="excluir('subcategories', <?= $id ?>)">Excluir</button>
                </div>
            </div>
            <hr>
        <?php
        }
        ?>
    </div>
    <button type="button" onclick="registrar('subcategories')" class="categories_button">
        Nova categoria
    </button>
</div>