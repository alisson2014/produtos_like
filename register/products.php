<div class="card">
    <h2 class="title">Cadastrar produto</h2>
    <form name="formCadastro" action="?action=save&table=products" method="post" class="form">
        <label for="id" class="form_label">ID:</label>
        <input type="text" class="form_input" name="id" id="id" value="" readonly>

        <br>

        <label for="produto" class="form_label">Digite o nome do Produto: </label>
        <input type="text" class="form_input" placeholder="Digite o nome do produto" name="produto" id="produto" value="" required>

        <br>

        <label for="categorias" class="form_label">Categoria: </label>
        <select name="categorias" id="categorias" class="form_select">
            <option value=""></option>
            <option value="">Categoria</option>
            <option value="">Categoria</option>
            <option value="">Categoria</option>
            <option value="">Categoria</option>
        </select>

        <button type="submit" class="form_button">
            Salvar Dados
        </button>
    </form>
</div>