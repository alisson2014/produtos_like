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
                    <button type='button'>Editar</button>
                    <button type='button'>Deletar</button>
                </div>
            </div>
                ";
    }
    ?>
    <button type="button" class="categories_button" id="viewButton">
        Nova subcategoria
    </button>
    <form action="" class="form" id="formCategories">
        <label for="categorie" class="form_label">Categoria</label>
        <input type="text" name="categorie" id="categorie" class="form_input" placeholder="Digite uma nova categoria" required />
        <button type="submit" class="form_button">Cadastrar</button>
    </form>
</div>