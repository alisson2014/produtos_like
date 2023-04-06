<div class="card">
    <h2 class="title">Adicionar produtos</h2>
    <form name="formCadastro" action="?action=save&table=productsBudget" method="post" class="form">
        <label for="id" class="form_label">ID:</label>
        <input type="text" class="form_input" name="id" id="id" value="" readonly />

        <br>

        <label for="cliente" class="form_label">Cliente</label>
        <input class="form_input" type="text" id="cliente" name="cliente1" value="Cliente" readonly>

        <br>

        <label for="produto1" class="form_label">Escolha um produto:</label>
        <select name="produto1" id="produto1" class="form_select">
            <option value=""></option>
            <option value="">Produto</option>
            <option value="">Produto</option>
            <option value="">Produto</option>
        </select>

        <br>

        <label for="quantidade" class="form_label">Quantidade:</label>
        <input type="number" min="1" class="form_select" />

        <br>

        <button type="submit" class="form_button">
            Salvar Dados
        </button>
    </form>
</div>