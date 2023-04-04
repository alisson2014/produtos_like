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
            <div class='categories_table'>
                <div class='categorie'>
                    <p>CATEGORIA: {$name}</p>
                </div>
                <div class='buttons'>
                    <button type='button' id='updateCategorie'>Editar</button>
                    <button type='button'>Deletar</button>
                </div>
            </div>
                ";
    }
    ?>
    <button type="button" class="categories_button">
        Nova subcategoria
    </button>
</div>