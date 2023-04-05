<div class="products_page">
    <h2 class="title">Produtos</h2>
    <?php
    $sqlProdutos = "SELECT * FROM produto";
    $consultaProdutos = $pdo->prepare($sqlProdutos);
    $consultaProdutos->execute();
    ?>
    <div class="products_list">
        <?php
        while ($dados = $consultaProdutos->fetch(PDO::FETCH_OBJ)) {
            $produto = $dados->nome;
            $valor = $dados->valor;
            $subcategoria = $dados->subcategoria;
            $id = $dados->id;
        ?>
            <div class="products">
                <div class="product">
                    <p><?= $produto ?></p>
                </div>
                <div class="product">
                    <p><?= $valor ?></p>
                </div>
                <div class="product">
                    <p><?= $subcategoria ?></p>
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
            <hr>
        <?php
        }
        ?>
    </div>
    <button type="button" class="categories_button">
        Novo produto
    </button>
</div>