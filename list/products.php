<div class="products">
    <h2 class="title">Produtos</h2>
    <?php
    $sqlProdutos = "SELECT * FROM produto";
    $consultaProdutos = $pdo->prepare($sqlProdutos);
    $consultaProdutos->execute();

    while ($dados = $consultaProdutos->fetch(PDO::FETCH_OBJ)) {
        $produto = $dados->nome;
        $valor = $dados->valor;
        $subcategoria = $dados->subcategoria;
        $id = $dados->id;
    ?>
        <div class='categories_list'>
            <div class='categorie'>
                <p><?= $subcategoria ?></p>
            </div>
            <div class="product">
                <p><?= $produto ?></p>
            </div>
            <div class="value">
                <p><?= $valor ?></p>
            </div>
            <div class='buttons'>
                <button type='button'>
                    <a href="index.php?action=register&table=subcategories&id=<?= $id ?>">Editar</a>
                </button>
                <button type='button'>
                    <a href="index.php?action=delete&table=subcategories&id=<?= $id ?>">Deletar</a>
                </button>
            </div>
        </div>
    <?php
    }
    ?>
    <button type="button" class="categories_button">
        Novo produto
    </button>
</div>