<div class="categories">
    <h2 class="categories_title">Subcategorias</h2>
    <?php
    $sqlCategorias = "SELECT * FROM subcategoria";
    $consultaCategorias = $pdo->prepare($sqlCategorias);
    $consultaCategorias->execute();

    while ($dados = $consultaCategorias->fetch(PDO::FETCH_OBJ)) {
        $name = $dados->nome;
        $id = $dados->id;

        echo "
            <div class='categories_list'>
                <div class='categorie'>
                    <p>CATEGORIA: {$name}</p>
                </div>
                <div class='buttons'>
                    <button type='button'>Editar</button>
                    <button type='button'>Deletar</button>
                </div>
            </div>
                ";
    }
    ?>
    <button type="button" class="categories_button">
        <a href="index.php?action=register&table=subcategories">
            Nova categoria
        </a>
    </button>
</div>