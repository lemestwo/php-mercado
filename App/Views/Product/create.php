<div class="container">

    <h2>Criar Produto</h2>
    <form method="post" action="/products">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Preço</label>
            <input type="text" class="form-control" name="price" id="price" required>
            <div class="form-text">Utilize vírgula como separador decimal.</div>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Imposto</label>
            <select class="form-select" name="type" id="type">
                <?php
                foreach ($taxes as $key => $tax) {
                    echo '<option value="' . $tax['id'] . '" ' . ($key === 0 ? 'selected' : '') . '>' . $tax['name'] . ' - ' . ($tax['percent'] * 100) . '%</option>';
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

</div>