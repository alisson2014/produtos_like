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
                    <button type="button">
                        <a href="index.php?action=register&table=subcategories&id=<?= $id ?>">Editar</a>
                    </button>
                    <button type="button" onclick="excluir(<?= $id ?>)">Excluir</button>
                </div>
            </div>
            <hr>
        <?php
        }
        ?>
    </div>
    <button type="button" class="categories_button">
        <a href="index.php?action=register&table=subcategories">
            Nova categoria
        </a>
    </button>
</div>