<div class="products_page">
    <h2 class="title">Produtos</h2>
    <?php
    $sqlProdutos = "SELECT p.*,s.nome as nomeCategoria FROM produto as p JOIN subcategoria as s ON s.id = p.subcategoria";
    $consultaProdutos = $pdo->prepare($sqlProdutos);
    $consultaProdutos->execute();
    ?>
    <div class="products_list">
        <?php
        while ($dados = $consultaProdutos->fetch(PDO::FETCH_OBJ)) {
            $nomeCategoria = $dados->nomeCategoria;
            $produto = $dados->nome;
            $valor = $dados->valor;
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
                    <p><?= $nomeCategoria ?></p>
                </div>
                <div class="buttons">
                    <button type="button">
                        <a href="index.php?action=register&table=products&id=<?= $id ?>">Editar</a>
                    </button>
                    <button type="button" onclick="excluir('products', <?= $id ?>)">Excluir</button>
                </div>
            </div>
            <hr>
        <?php
        }
        ?>
    </div>
    <button type="button" class="categories_button">
        <a href="index.php?action=register&table=products">
            Novo produto
        </a>
    </button>
</div>