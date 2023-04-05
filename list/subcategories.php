<div class="categories">
    <h2 class="title">Subcategorias</h2>
    <?php
    $sqlCategorias = "SELECT * FROM subcategoria";
    $consultaCategorias = $pdo->prepare($sqlCategorias);
    $consultaCategorias->execute();

    while ($dados = $consultaCategorias->fetch(PDO::FETCH_OBJ)) {
        $name = $dados->nome;
        $id = $dados->id;
    ?>
        <div class='categories_list'>
            <div class='categorie'>
                <p><?= $name ?></p>
            </div>
            <div class='buttons'>
                <button type='button'>
                    <a href="index.php?action=register&table=subcategories">Editar</a>
                </button>
                <button type='button'>Deletar</button>
            </div>
        </div>
    <?php
    }
    ?>
    <button type="button" class="categories_button">
        <a href="index.php?action=register&table=subcategories">
            Nova categoria
        </a>
    </button>
</div>