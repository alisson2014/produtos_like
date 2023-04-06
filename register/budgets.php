<div class="card">
    <h2 class="title">Cadastrar orçamento</h2>
    <form name="formCadastro" action="?action=save&table=budgets" method="post" class="form">
        <label for="id" class="form_label">ID:</label>
        <input type="text" class="form_input" name="id" id="id" value="" readonly />

        <br>

        <label for="cliente" class="form_label">Digite o nome do cliente: </label>
        <input type="text" class="form_input" placeholder="Digite o nome do cliente" name="cliente" id="cliente" value="" required />

        <br>

        <label for="data" class="form_label">Digite a data do orçamento: </label>
        <input class="form_select" type="date" id="data" name="data" required />

        <br>

        <button type="submit" class="form_button">
            Salvar Dados
        </button>
    </form>
</div>